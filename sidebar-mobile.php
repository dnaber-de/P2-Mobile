<?php

/**
 * sidebar for mobile devices
 *
 * @package P2 Mobile
 */

if ( is_dynamic_sidebar( 'p2m_sidebar' ) ) : ?>

	<div id="sidebar">
		<?php dynamic_sidebar( 'p2m_sidebar' ); ?>
	</div>

	<?php
endif;
