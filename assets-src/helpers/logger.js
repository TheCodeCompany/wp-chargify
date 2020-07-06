const logColors = {
	error: 'background: #242424; color: red',
	warning: 'background: #242424; color: yellow;',
	info: 'background: #242424; color: cyan;',
	pass: 'background: #242424; color: green;',
	debug: 'background: #242424; color: orchid;',
	event: 'background: #242424; color: magenta;',
};

/**
 * Checks if the query string is available currently supports
 * log=error
 * log=info
 * log=all
 * Or you can use an array of values to display specific messages
 * ?log[]=info&log[]=error&log[]=warning
 *
 * @param {string} string The string to assess.
 *
 * @return {boolean} Is the log a query string present in the url.
 */
function checkUrlQueryString( string ) {
	const url = window.location.href;
	let result = false;
	if ( url.indexOf( `?log=${ string }` ) !== -1 || url.indexOf( `&log=${ string }` ) !== -1 ||
		url.indexOf( `?log[]=${ string }` ) !== -1 || url.indexOf( `&log[]=${ string }` ) !== -1 ) {
		result = true;
	}
	return result;
}

function logMessage( logDetails ) {
	// Ensure logDetails message is present as its required.
	if ( 'undefined' !== typeof logDetails.message ) {
		if ( 'undefined' !== typeof logDetails.details ) {
			// eslint-disable-next-line no-console
			console.group();
		}
		if ( 'undefined' !== typeof logDetails.message ) {
			// eslint-disable-next-line no-console
			console.log( `%c${ logDetails.message }`, logColors[ logDetails.type ] );
		} else {
			// eslint-disable-next-line no-console
			console.log( logDetails.message );
		}

		if ( 'undefined' !== typeof logDetails.details ) {
			// eslint-disable-next-line no-console
			console.log( logDetails.details );
			// eslint-disable-next-line no-console
			console.groupEnd();
		}
	} else {
		// eslint-disable-next-line no-console
		console.group();
		// eslint-disable-next-line no-console
		console.log( `%cIssue with use of log(), please ensure a object is passed to log(). in form of:`, logColors.error );
		// eslint-disable-next-line no-console
		console.log( {
			type: 'String either error, warning, info or pass',
			message: 'Message to be highlighted for details.',
			details: 'Mixed/Not Required',
		} );
		// eslint-disable-next-line no-console
		console.groupEnd();
	}
}

/**
 * Logger to log to console if query string is present in url.
 *
 * Message is displayed in correct color for type. Details can be a array, object,
 * Type can be one of error, warning, info or pass.
 *
 * @param {Object} logDetails = {type: 'string', message: 'string', details = 'mixed'}
 * logDetails.type        String either error, warning, info or pass.
 * logDetails.message    Message to be highlighted for details.
 * logDetails.details    Details.
 */
export function log( logDetails = {} ) {
	// ensure that the query string is one of, error, warning, info, pass or all.
	if ( checkUrlQueryString( 'info' ) || checkUrlQueryString( 'pass' ) ||
		checkUrlQueryString( 'debug' ) || checkUrlQueryString( 'event' ) ||
		checkUrlQueryString( 'all' ) ) {
		// eslint-disable-next-line no-console
		if ( 'undefined' !== typeof console && console.log !== undefined ) {
			// Ensure only matching type logs get displayed.
			if ( 'undefined' !== typeof logDetails.type &&
				( checkUrlQueryString( logDetails.type ) || checkUrlQueryString( 'all' ) ) ) {
				// Error and warnings are handled differently, always displayed.
				if ( 'undefined' !== typeof logDetails.type && ( logDetails.type !== 'error' && logDetails.type !== 'warning' ) ) {
					// Log errors and warnings.
					logMessage( logDetails );
				}
			}
		}
	}

	if ( 'undefined' !== typeof logDetails.type && ( logDetails.type === 'error' || logDetails.type === 'warning' ) ) {
		// Log errors and warnings.
		logMessage( logDetails );
	}
}
