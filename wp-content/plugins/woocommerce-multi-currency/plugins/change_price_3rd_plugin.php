<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOOMULTI_CURRENCY_Plugin_Change_Price_3rd_Plugin {
	protected $settings;

	public function __construct() {
		$this->settings = WOOMULTI_CURRENCY_Data::get_ins();
		if ( $this->settings->get_enable() ) {
			add_filter( 'woocommerce_product_addons_option_price_raw', array( $this, 'change_price' ) );
			add_filter( 'wmc_change_3rd_plugin_price', array( $this, 'change_price' ) );
			add_filter( 'wmc_change_raw_price', array( $this, 'change_price' ) );

			// Compatible with WC Name Your Price
			if ( is_callable( array(
					'WC_Name_Your_Price_Compatibility',
					'is_nyp_gte'
				) ) && WC_Name_Your_Price_Compatibility::is_nyp_gte( '3.0' ) ) {
				add_filter( 'wc_nyp_raw_minimum_variation_price', array( $this, 'change_price' ) );
				add_filter( 'wc_nyp_raw_minimum_price', array( $this, 'change_price' ) );
				add_filter( 'wc_nyp_raw_suggested_price', array( $this, 'change_price' ) );
				add_filter( 'wc_nyp_raw_maximum_price', array( $this, 'change_price' ) );
			} else {
				add_filter( 'woocommerce_raw_minimum_variation_price', array( $this, 'change_price' ) );
				add_filter( 'woocommerce_raw_minimum_price', array( $this, 'change_price' ) );
				add_filter( 'woocommerce_raw_suggested_price', array( $this, 'change_price' ) );
				add_filter( 'woocommerce_raw_maximum_price', array( $this, 'change_price' ) );
			}

			// TM extra product option
			add_filter( 'wc_epo_option_price_correction', array( $this, 'revert_price' ) );
			add_filter( 'wc_epo_cs_convert', array( $this, 'change_price' ) );
			add_filter( 'woocommerce_tm_epo_price_on_cart', array( $this, 'change_price' ) );
			add_filter( 'wc_epo_calculate_price', array( $this, 'wc_epo_calculate_price' ), 10, 13 );
			add_filter( 'wc_epo_cart_options_prices', array( $this, 'change_price' ), 10, 2 );
			add_filter( 'wc_epo_get_current_currency_price', array(
				$this,
				'wc_epo_get_current_currency_price'
			), 10, 2 );
//		add_filter( 'wc_epo_add_cart_item_calculated_price1', array( $this, 'revert_price' ) );
//		add_filter( 'wc_epo_add_cart_item_calculated_price2', array( $this, 'change_price' ) );

			// Table Rate shipping
			add_filter( 'betrs_condition_tertiary_subtotal', array( $this, 'change_price' ) );

			// Advanced shipping
			add_filter( 'wcml_shipping_price_amount', array( $this, 'change_price' ), 10 );
//		add_filter( 'wcml_shipping_price_amount', array( $this, 'number_format' ), 11 );

			/*PPOM for WooCommerce(Najeeb Ahmad https://wordpress.org/plugins/woocommerce-product-addon/)*/
			add_filter( 'ppom_cart_fixed_fee', array( $this, 'change_price' ) );

			/*Flexible shipping*/
			add_filter( 'flexible_shipping_value_in_currency', array( $this, 'change_price' ) );

			// Discussion on RnB - WooCommerce Booking & Rental Plugin
			add_filter( 'redq_pickup_locations', array( $this, 'redq_change_price' ) );
			add_filter( 'redq_dropoff_locations', array( $this, 'redq_change_price' ) );
			add_filter( 'redq_payable_resources', array( $this, 'redq_change_price' ) );
			add_filter( 'redq_payable_security_deposite', array( $this, 'redq_change_price' ) );
			add_filter( 'redq_rnb_cat_categories', array( $this, 'redq_change_price' ) );
			add_filter( 'redq_payable_person', array( $this, 'redq_person_change_price' ) );
			add_filter( 'wmc_product_get_price_condition', array( $this, 'rnb_plugin_condition' ), 10, 3 );

			// WooCommerce PDF Vouchers - WordPress Plugin
			add_filter( 'woo_vou_get_product_price', array( $this, 'woo_vou_reverse_price' ), 10, 2 );

			/*https://wordpress.org/plugins/woo-wallet/*/
//			add_filter( 'woo_wallet_current_balance', array( $this, 'woo_wallet_current_balance' ) );
//			add_filter( 'woo_wallet_amount', array( $this, 'woo_wallet_amount' ), 10, 2 );
//			add_filter( 'woo_wallet_rechargeable_amount', array( $this, 'woo_wallet_rechargeable_amount' ) );
		}
	}

	public function woo_wallet_current_balance( $amount ) {
		return wmc_get_price( $amount );
	}

	public function woo_wallet_rechargeable_amount( $amount ) {
		if ( $this->settings->get_current_currency() !== $this->settings->get_default_currency() ) {
			$amount = wmc_revert_price( $amount );
		}

		return $amount;
	}

	public function woo_wallet_amount( $amount, $currency ) {
		$wmc_current_currency = $this->settings->get_current_currency();
		$default_currency     = $this->settings->get_default_currency();
		if ( $currency === $default_currency && $wmc_current_currency !== $default_currency ) {
			$amount = wmc_get_price( $amount );
		}

		return $amount;
	}

	public function wc_epo_calculate_price( $_price, $post_data, $element, $key, $attribute, $per_product_pricing, $cpf_product_price, $variation_id, $price_default_value, $currency, $current_currency, $price_per_currencies, $_price_type ) {
		if ( in_array( $_price_type, array( 'percent', 'percentcurrenttotal' ) ) ) {
			$wmc_current_currency = $this->settings->get_current_currency();
			$default_currency     = $this->settings->get_default_currency();
			if ( $current_currency !== false ) {
				if ( $wmc_current_currency === $default_currency ) {
					$_price = wmc_revert_price( $_price, $current_currency );
				}
			}
		}

		return $_price;
	}

	public function rnb_plugin_condition( $condition, $price, $product ) {
		if ( is_a( $product, 'WC_Product_Redq_Rental' ) ) {
			$condition = false;
		}

		return $condition;
	}

	public function change_price( $price_raw ) {
		return wmc_get_price( $price_raw );
	}

	public function number_format( $price ) {
		$current_currency = $this->settings->get_current_currency();
		$currencies_list  = $this->settings->get_list_currencies();

		return number_format( $price, $currencies_list[ $current_currency ]['decimals'] );
	}

	public function wc_epo_get_current_currency_price( $price, $type ) {
		if ( ! $type && ! is_product() ) {
			$price = wmc_revert_price( $price );
		}

		return $price;
	}

	public function revert_price( $price ) {
		return wmc_revert_price( $price );
	}

	public function redq_person_change_price( $data ) {
		$new_data = $data;
		if ( is_array( $data ) && count( $data ) ) {
			foreach ( $data as $key => $value ) {
				$new_data[ $key ] = $this->redq_change_price( $value );
			}
		}

		return $new_data;
	}

	public function redq_change_price( $data ) {
		$new_data = $data;

		if ( is_array( $data ) && count( $data ) ) {
			foreach ( $data as $el_key => $element ) {
				if ( is_array( $element ) && count( $element ) ) {
					foreach ( $element as $key => $value ) {
						if ( substr( $key, - 4 ) == 'cost' && is_numeric( $value ) ) {
							$new_data[ $el_key ][ $key ] = $this->change_price( $value );
						}
					}
				}
			}
		}

		return $new_data;
	}

	public function woo_vou_reverse_price( $subtotal, $order_id ) {
		$order          = wc_get_order( $order_id );
		$wmc_order_info = get_post_meta( $order_id, 'wmc_order_info', true );
		$order_currency = $order->get_currency();
		$rate           = ! empty( $wmc_order_info[ $order_currency ]['rate'] ) ? $wmc_order_info[ $order_currency ]['rate'] : '';
		$decimals       = ! empty( $wmc_order_info[ $order_currency ]['decimals'] ) ? $wmc_order_info[ $order_currency ]['decimals'] : '';

		$subtotal = $rate ? $subtotal / $rate : $subtotal;
		$subtotal = $decimals ? number_format( $subtotal, $decimals ) : $subtotal;

		return $subtotal;
	}


}
