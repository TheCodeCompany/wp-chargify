/* global hljs: false */

( function ( $ ) {
	$( () => {
		$( 'pre code' ).each( ( i, block ) => hljs.highlightBlock( block ) );
	} );
} )( jQuery );
