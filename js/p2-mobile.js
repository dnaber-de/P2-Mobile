/**
 * some miscellanious js stuff
 *
 * @package P2 Mobile
 */

( function( $ ) {
	var p2Mobile = {

		init : function() {

			p2Mobile.permalinkToDate();
		},

		permalinkToDate : function () {

			$( 'li.comment span.meta' ).each(
				function( i, el ) {
					var self = $( el );
					var date = self.children( 'abbr' );
					var link = $( '<a/>' );
					link.attr(
						'href',
						self.find( '.thepermalink' ).attr( 'href' )
					);
					date.wrap( link );

				}
			);
		}

	};

	$( document ).ready( p2Mobile.init );

} )( jQuery );
