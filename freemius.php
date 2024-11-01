<?php

// Create a helper function for easy SDK access.
function isswscr_fs() {
	global $isswscr_fs;

	if ( ! isset( $isswscr_fs ) ) {
		// Activate multisite network integration.
		if ( ! defined( 'WP_FS__PRODUCT_2751_MULTISITE' ) ) {
			define( 'WP_FS__PRODUCT_2751_MULTISITE', true );
		}

		// Include Freemius SDK.
		if ( file_exists( dirname( dirname( __FILE__ ) ) . '/seo-content-randomizer/freemius/start.php' ) ) {
			// Try to load SDK from parent plugin folder.
			require_once dirname( dirname( __FILE__ ) ) . '/seo-content-randomizer/freemius/start.php';
		} else if ( file_exists( dirname( dirname( __FILE__ ) ) . '/seo-content-randomizer-premium/freemius/start.php' ) ) {
			// Try to load SDK from premium parent plugin folder.
			require_once dirname( dirname( __FILE__ ) ) . '/seo-content-randomizer-premium/freemius/start.php';
		} else {
			require_once dirname(__FILE__) . '/freemius/start.php';
		}

		$isswscr_fs = fs_dynamic_init( array(
				'id'                  => '2751',
				'slug'                => 'woocommerce-seo-content-randomizer',
				'type'                => 'plugin',
				'public_key'          => 'pk_c31077eeaf2055e7e9426bd85ce49',
				'is_premium'          => false,
				'has_paid_plans'      => false,
				'parent'              => array(
						'id'         => '2386',
						'slug'       => 'seo-content-randomizer',
						'public_key' => 'pk_01f914f8b8c0ed1284ca918710c42',
						'name'       => 'SEO Content Randomizer',
				),
				'menu'                => array(
						'first-path'     => 'plugins.php',
						'support'        => false,
				),
		) );
	}

	return $isswscr_fs;
}