( function( $ ) {
	
	const bodyEl = $( 'body' );

	// Initial check
	if ( $( '.cmb-tabs' ).length ) {

		$( '.cmb-tabs' ).each( function() {
			// Activate first tab
			if ( ! $( this ).find( '.cmb-tab.active' ).length ) {
				$( this ).find( '.cmb-tab' ).first().addClass( 'active' );

				$( $( this ).find( '.cmb-tab' ).first().data( 'fields' ) ).addClass( 'cmb-tab-active-item' );

				// Support for groups and repeatable fields
				$( $( this ).find( '.cmb-tab' ).first().data( 'fields' ) ).find( '.cmb-repeat .cmb-row, .cmb-repeatable-group .cmb-row' ).addClass( 'cmb-tab-active-item' );
			}
		} );
	}

	bodyEl.on( 'click.cmbTabs', '.cmb-tabs .cmb-tab', function( e ) {
		let tab = $( this );

		if ( ! tab.hasClass( 'active' ) ) {
			let tabs = tab.closest( '.cmb-tabs' );
			let form = tabs.next( '.cmb2-wrap' );

			// Hide current active tab fields
			form.find( tabs.find( '.cmb-tab.active' ).data( 'fields' ) ).fadeOut( 'fast', function() {
				$( this ).removeClass( 'cmb-tab-active-item' );

				form.find( tab.data( 'fields' ) ).fadeIn( 'fast', function() {
					$( this ).addClass( 'cmb-tab-active-item' );

					// Support for groups and repeatable fields
					$( this ).find( '.cmb-repeat-table .cmb-row, .cmb-repeatable-group .cmb-row' ).addClass( 'cmb-tab-active-item' );
				} );
			} );

			// Update tab active class
			tabs.find( '.cmb-tab.active' ).removeClass( 'active' );
			tab.addClass( 'active' );
		}
	} );

	// Adding a new group element needs to get the active class also
	bodyEl.on( 'click', '.cmb-add-group-row', function() {
		$( this ).closest( '.cmb-repeatable-group' ).find( '.cmb-row' ).addClass( 'cmb-tab-active-item' );
	} );

	// Adding a new repeatable element needs to get the active class also
	bodyEl.on( 'click', '.cmb-add-row-button', function() {
		$( this ).closest( '.cmb-repeat' ).find( '.cmb-row' ).addClass( 'cmb-tab-active-item' );
	} );

	// Initialize on widgets area
	$( document ).on( 'ready', function( e ) {
		const widgetEl = $( '.postbox' );

		if ( widgetEl.length ) {
			const widgetTabsEl = widgetEl.find( '.cmb-tabs' );

			if ( widgetTabsEl.length ) {

				widgetTabsEl.each( function() {
					const tabEl = $( this );

					// Activate first tab
					if ( ! tabEl.find( '.cmb-tab.active' ).length ) {
						tabEl.find( '.cmb-tab' ).first().addClass( 'active' );

						$( tabEl.find( '.cmb-tab' ).first().data( 'fields' ) ).addClass( 'cmb-tab-active-item' );

						// Support for groups and repeatable fields
						$( tabEl.find( '.cmb-tab' ).first().data( 'fields' ) ).find( '.cmb-repeat .cmb-row, .cmb-repeatable-group .cmb-row' ).addClass( 'cmb-tab-active-item' );
					}
				} );

			}
		}

	} );

} )( jQuery );