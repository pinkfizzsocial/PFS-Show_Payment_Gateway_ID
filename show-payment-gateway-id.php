<?php
/*
* Plugin Name: PFS-Show Payment Gateway ID
* Description: On Woocommerce show the Payment Gateway ID for use when hiding payments in functions.php
* Version: 1.0.2
* Author: Pink Fizz Social
* Author URI: http://pinkfizz.social
* License: GPL2
*/
// Show Payment Gateway ID in Woocommerce Payment Settings
// woocommerce_payment_gateways_setting_column_{COLUMN ID}

add_filter( 'woocommerce_payment_gateways_setting_columns', 'rudr_add_payment_method_column' );

function rudr_add_payment_method_column( $default_columns ) {

	$default_columns = array_slice( $default_columns, 0, 2 ) + array( 'id' => 'ID' ) + array_slice( $default_columns, 2, 3 );
	return $default_columns;

}

add_action( 'woocommerce_payment_gateways_setting_column_id', 'rudr_populate_gateway_column' );

function rudr_populate_gateway_column( $gateway ) {

	echo '<td style="width:10%">' . $gateway->id . '</td>';

}