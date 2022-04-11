<?php

/**
 * Class WOOMULTI_CURRENCY_Plugin_Extra_Product_Options
 * Author: ThemeHigh
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOOMULTI_CURRENCY_Plugin_Extra_Product_Options {
	protected $settings;

	public function __construct() {
		if ( ! is_plugin_active( 'woocommerce-extra-product-options-pro/woocommerce-extra-product-options-pro.php' ) ) {
			return;
		}
		$this->settings = WOOMULTI_CURRENCY_Data::get_ins();
		if ( $this->settings->get_enable() ) {
			add_filter( 'thwepo_extra_option_display_price', array(
				$this,
				'thwepo_extra_option_display_price'
			), 10, 2 );

			add_filter( 'woocommerce_add_cart_item_data', array( $this, 'woocommerce_add_cart_item_data' ), 20, 4 );
		}
	}

	/**
	 * @param $cart_item_data
	 * @param $product_id
	 * @param $variation_id
	 * @param $quantity
	 *
	 * @return mixed
	 */
	public function woocommerce_add_cart_item_data( $cart_item_data, $product_id, $variation_id, $quantity ) {
		$current_currency = $this->settings->get_current_currency();
		$default_currency = $this->settings->get_default_currency();
		if ( is_array( $cart_item_data['thwepo_options'] ) && count( $cart_item_data['thwepo_options'] ) ) {
			foreach ( $cart_item_data['thwepo_options'] as $key => $value ) {
				if ( $value['price_type'] == 'custom' ) {
					if ( $current_currency != $default_currency ) {
						$cart_item_data['thwepo_options'][ $key ]['value'] *= 1 / wmc_get_price( 1, $current_currency );
					}
				}
			}
		}

		return $cart_item_data;
	}

	/**
	 * @param $display_price
	 * @param $price
	 *
	 * @return string
	 */
	public function thwepo_extra_option_display_price( $display_price, $price ) {
		return wc_price( wmc_get_price( $price ) );
	}
}