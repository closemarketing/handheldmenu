<?php
/**
 * Admin defaults
 *
 * Has functions customize the WordPress Admins
 *
 * @author   closemarketing
 * @category Functions
 * @package  Admin
 */

/**
 * Class for admin fields
 */
class HHM_Frontend {

	/**
	 * Construct of Class
	 */
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'handheld_footer_bar' ), 999 );
	}

	/**
	 * # Functions
	 * ---------------------------------------------------------------------------------------------------- */

	/**
	 * Display a menu intended for use on handheld devices
	 *
	 * @since 2.0.0
	 */
	public function handheld_footer_bar() {
		$links = array(
			'my-account' => array(
				'priority' => 10,
				'callback' => 'handheld_footer_bar_account_link',
			),
			'search'     => array(
				'priority' => 20,
				'callback' => 'handheld_footer_bar_search',
			),
			'cart'       => array(
				'priority' => 30,
				'callback' => 'handheld_footer_bar_cart_link',
			),
		);

		if ( wc_get_page_id( 'myaccount' ) === -1 ) {
			unset( $links['my-account'] );
		}

		if ( wc_get_page_id( 'cart' ) === -1 ) {
			unset( $links['cart'] );
		}

		$links = apply_filters( 'handheld_footer_bar_links', $links );
		?>
		<div class="genesis-handheld-footer-bar">
			<ul class="columns-<?php echo count( $links ); ?>">
				<?php foreach ( $links as $key => $link ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>">
						<?php
						if ( $link['callback'] ) {
							call_user_func( $link['callback'], $key, $link );
						}
						?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}

	/**
	 * The search callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function handheld_footer_bar_search() {
		echo '<a href="">' . esc_attr__( 'Search', 'storefront' ) . '</a>';
		//product_search();
	}

	/**
	 * The cart callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function handheld_footer_bar_cart_link() {
		?>
			<a class="footer-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>
		<?php
	}

	/**
	 * The account callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function handheld_footer_bar_account_link() {
		echo '<a href="' . esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) . '">' . esc_attr__( 'My Account', 'storefront' ) . '</a>';
	}

}

new HHM_Frontend();
