<?php
/**
 * searchform
 *
 * @package P2 Mobile
 */
?><form accept-charset="UTF-8" action="<?php echo get_home_url(); ?>" id="p2m-searchform">
	<fieldset>
		<p>
			<input
				type="search"
				name="s"
				title="<?php esc_attr_e( 'Search for', 'p2m_textdomain' ); ?>"
				placeholder="<?php esc_attr_e( 'Search for', 'p2m_textdomain' ); ?>"
				value="<?php echo esc_attr( get_search_query() ); ?>"
				required="required"
				pattern=".+"
			/>
			<input
				type="submit"
				value="<?php esc_attr_e( 'Find', 'p2m_textdomain' ); ?>"
				class="p2m-button-secondary"
			/>
		</p>
	</fieldset>
	</form>
