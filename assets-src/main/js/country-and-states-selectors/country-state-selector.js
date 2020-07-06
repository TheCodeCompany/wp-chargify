import $ from 'jquery';
import 'select2';
import 'select2/dist/css/select2.css';

import { log } from '../../../helpers/logger';
import { countries } from './config-countries';
import { states } from './config-states';

const {
	signupDefaultCountry,
	signupCountries,
	signupCountriesPopular,
} = window.wpChargifyMainConfig;

/**
 * Country and state selector
 */
export class CountryStateSelector {

	// Fields.
	_selectFieldCountry;
	_selectFieldState;

	// Full configs.
	_countriesConfig;
	_statesConfig;

	// Selected options.
	_selectedCountry = '';
	_selectedState = '';

	// list above divider, defaults as below
	countriesPopularList = {
		AU: 'Australia',
		NZ: 'New Zealand',
		US: 'United States',
		GB: 'United Kingdom',
		ZA: 'South Africa',
		SG: 'Singapore',
		CA: 'Canada',
		FR: 'France',
		IN: 'India',
		DE: 'Germany',
	};

	// list under divider. If left empty no divider.
	countriesFullList = {};

	constructor( selectFieldCountrySelector, selectFieldStateSelector = null ) {

		this._selectFieldCountry = $( selectFieldCountrySelector );
		if ( this.selectFieldCountry.length ) {

			// Set the defaults.
			this.selectedCountry = signupDefaultCountry;
			this.countriesConfig = countries;
			this.statesConfig = states;

			// Build the country list.
			this.buildCountryLists();

			// TODO delete.
			console.log( this.countriesPopularList );
			console.log( this.countriesFullList );

			// Add select 2.
			$( this.selectFieldCountry ).select2( {
				dropdownAutoWidth: true,
				width: 'auto'
			} );


			// Build out the options with select2, starting with countries.
			this.addCountryOptions();

			if ( null !== selectFieldStateSelector ) {
				this._selectFieldState = $( selectFieldStateSelector );

				if ( this.selectFieldState.length ) {

					// Add select 2.
					$( this.selectFieldState ).select2( {
						dropdownAutoWidth: true,
						width: '100%'
					} );

					// Build out the options with select2
					this.addStateOptions();

					// Add event.
					this.countrySelectEvent();

				} else {
					log( {
						type: 'warning',
						message: 'Form state select element does not exist on this page.',
					} );
				}
			}
		} else {
			log( {
				type: 'debug',
				message: 'Form with a countries select element does not exist on this page.',
			} );
		}

	}

	/**
	 * Update the state select field.
	 */
	countrySelectEvent() {
		$( this.selectFieldCountry ).on( 'change', ( e ) => {
			this.selectedCountry = $( e.target ).val();
			this.addStateOptions();
		} );
	}

	/**
	 * Add country options.
	 */
	addCountryOptions() {
		$( this.selectFieldCountry ).empty().trigger( "change" );

		// Add the default option.
		let newOption = new Option( 'Select Country', '', false, false );
		$( this.selectFieldCountry ).append( newOption ).trigger( 'change' );
		$( this.selectFieldCountry ).val( '' );
		$( this.selectFieldCountry ).trigger( 'change' );

		// Add the popular list first.
		if ( this.hasCountriesInPopularList() ) {
			Object.entries( this.countriesPopularList ).forEach( ( [ key, value ] ) => {
				newOption = new Option( value, key, false, false );
				$( this.selectFieldCountry ).append( newOption ).trigger( 'change' );
			} );
		}

		// Add a disabled divider option between lists, if both lists have something.
		if ( this.hasCountriesInPopularList() && this.hasCountriesInFullList() ) {
			const divider = $( '<option>', {
				value: '',
				text: '-----',
				disabled: 'disabled'
			} );
			$( this.selectFieldCountry ).append( divider ).trigger( 'change' );
		}

		// Add the full list if any.
		if ( this.hasCountriesInFullList() ) {
			// Add the full list.
			Object.entries( this.countriesFullList ).forEach( ( [ key, value ] ) => {
				newOption = new Option( value, key, false, false );
				$( this.selectFieldCountry ).append( newOption ).trigger( 'change' );
			} );
		}

		// Set default country based from selected country if in a list.
		if ( this.selectedCountry &&
			( ( this.hasCountriesInPopularList() && this.countriesPopularList[ this.selectedCountry ] ) ||
			( this.hasCountriesInFullList() && this.countriesFullList[ this.selectedCountry ] ) ) ) {

			$( this.selectFieldCountry ).val( this.selectedCountry );
			$( this.selectFieldCountry ).trigger( 'change' );
		} else {
			this.selectedCountry = '';
		}

	}

	/**
	 * Add the state options based on selected country.
	 */
	addStateOptions() {
		$( this.selectFieldState ).empty().trigger( "change" );

		// Default if no country has been selected.
		let newOption = new Option( 'Select Country First', '', false, false );

		// If there is a country selected use a different default option.
		if ( ! this.selectedCountry || '' === this.selectedCountry ) {
			this.addDefaultStateOption( newOption );
		} else {
			const noStates = Object.keys( this.statesConfig[ this.selectedCountry ] ).length === 0 &&
				this.statesConfig[ this.selectedCountry ].constructor === Object;

			// Add the default state option or no states ins ome cases.
			if ( noStates ) {
				newOption = new Option( 'No State', '', true, true );
			} else {
				newOption = new Option( 'Select State', '', false, false );
			}
			this.addDefaultStateOption( newOption );

			if ( ! noStates ) {
				Object.entries( this.statesConfig[ this.selectedCountry ] ).forEach( ( [ key, value ] ) => {
					newOption = new Option( value, key, false, false );
					$( this.selectFieldState ).append( newOption ).trigger( 'change' );
				} );
			}
		}
	}

	/**
	 * Add a default option for state dropdown.
	 *
	 * @param option
	 */
	addDefaultStateOption( option ) {
		$( this.selectFieldState ).append( option ).trigger( 'change' );
		$( this.selectFieldState ).val( '' );
		$( this.selectFieldState ).trigger( 'change' );
	}

	/**
	 * Build the country list ready for the select dropdown.
	 */
	buildCountryLists() {

		// Reset defaults, and preserve order from signupCountriesPopular array.
		if ( signupCountriesPopular && signupCountriesPopular.length ) {
			this.countriesPopularList = {};
			for ( let countryCode of signupCountriesPopular ) {
				this.countriesPopularList[ countryCode ] = this.countriesConfig[ countryCode ];
			}
		} else if ( signupCountriesPopular && 0 === signupCountriesPopular.length )  {
			this.countriesPopularList = {};
		}

		// Clear defaults replace with full list, preserve alphabetic order from config.
		if ( signupCountries && signupCountries.length ) {
			this.countriesFullList = this.countriesConfig;

			// Remove any that is not in signupCountries, this preserves alphabetic order from config.
			Object.entries( this.countriesFullList ).forEach( ( [ key, value ] ) => {
				if ( ! signupCountries.includes( key ) ) {
					delete this.countriesFullList[ key ];
				}
			} );
		}

	}
	
	hasCountriesInPopularList() {
		return Object.keys( this.countriesPopularList ).length !== 0 &&
			this.countriesPopularList.constructor === Object;
	}

	hasCountriesInFullList() {
		return Object.keys( this.countriesFullList ).length !== 0 &&
			this.countriesFullList.constructor === Object;
	}

	/** ------------------------------------------------------------------------------------------
	 * Setters.
	 * ------------------------------------------------------------------------------------------ */

	set countriesConfig( value ) {

		const isEmpty = Object.keys( value ).length === 0 &&
		value.constructor === Object;

		if ( isEmpty ) {
			this._countriesConfig = {};
		} else {
			this._countriesConfig = value;
		}
	}
	set statesConfig( value ) {

		const isEmpty = Object.keys( value ).length === 0 &&
			value.constructor === Object;

		if ( isEmpty ) {
			this._statesConfig = {};
		} else {
			this._statesConfig = value;
		}
	}

	set selectedCountry( value ) {

		if ( value && ( typeof value === 'string' || value instanceof String ) ) {
			this._selectedCountry = value;
		} else {
			this._selectedCountry = '';
		}
	}

	set selectedState( value ) {
		this._selectedState = value;
	}

	/** ------------------------------------------------------------------------------------------
	 * Getters.
	 * ------------------------------------------------------------------------------------------ */

	get selectFieldCountry() {
		return this._selectFieldCountry;
	}

	get selectFieldState() {
		return this._selectFieldState;
	}

	get countriesConfig() {
		return this._countriesConfig;
	}

	get statesConfig() {
		return this._statesConfig;
	}

	get selectedCountry() {
		return this._selectedCountry;
	}

	get selectedState() {
		return this._selectedState;
	}

}
