// Library Imports.
import $ from 'jquery';
import hljs from 'highlight.js';

( function ( $ ) {
	$( () => {
		$( 'pre code' ).each( ( i, block ) => hljs.highlightBlock( block ) );
	} );
} )( jQuery );
