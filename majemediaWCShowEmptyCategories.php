<?php

/*
Plugin Name: WooCommerce: Show Empty Categories
Plugin URI: https://www.majemedia.com/plugins/woocommerce-show-empty-categories
Description: Show empty WooCommerce categories on product archives when options are set to display categories
Version: 1.0
Author: Maje Media LLC
Author URI: https://www.majemedia.com
Copyright: 2017
Text Domain: majemedia-wc-show-empty-cats
Domain Path: /lang

*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/*
 *
 */

class majemediaWCShowEmptyCategories {

	private static $instance;
	public         $plugin_url;
	public         $plugin_path;

	public static function get_instance() {

		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {

		$this->set_class_vars();

		$this::actions();
		$this::filters();

	}

	public function set_class_vars() {

		$this->plugin_path = realpath( dirname( __FILE__ ) );
		$this->plugin_url  = plugins_url( '', __FILE__ );

	}

	public static function activate() {

	}

	public static function deactivate() {

	}

	public static function actions() {

	}

	public static function filters() {

		add_filter( 'woocommerce_product_subcategories_hide_empty', array(
			'MMWCSEC_WCInteract',
			'hide_empty_categories',
		), 10, 1 );

	}

}

$majemediaWCShowEmptyCategories = majemediaWCShowEmptyCategories::get_instance();