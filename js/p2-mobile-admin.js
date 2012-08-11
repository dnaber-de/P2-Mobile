/**
 * @package P2 Mobile
 */
( function( $ ) {

	var p2MobileAdmin = {

		init : function() {

			if ( 'themes.php' === p2mAdmin.pagenow )
			p2MobileAdmin.removeHideSidebarOption();
		},

		removeHideSidebarOption : function ()  {
			$( 'input#p2_hide_sidebar' ).closest( 'tr' ).css( 'visibility', 'hidden' );
		}
	};

	$( document ).ready( p2MobileAdmin.init );

} )( jQuery );
