<?php
function isswscr_fs_is_parent_active_and_loaded() {
	// Check if the parent's init SDK method exists.
	return function_exists( 'issscr_fs' );
}

function isswscr_fs_is_parent_active() {
	$active_plugins = get_option( 'active_plugins', array() );

	if ( is_multisite() ) {
		$network_active_plugins = get_site_option( 'active_sitewide_plugins', array() );
		$active_plugins         = array_merge( $active_plugins, array_keys( $network_active_plugins ) );
	}

	foreach ( $active_plugins as $basename ) {
		if ( 0 === strpos( $basename, 'seo-content-randomizer/' ) ||
		     0 === strpos( $basename, 'seo-content-randomizer-premium/' )
		) {
			return true;
		}
	}

	return false;
}

function isswscr_fs_init() {
	if ( isswscr_fs_is_parent_active_and_loaded() ) {
		// Init Freemius.
		isswscr_fs();

		// Parent is active, add your init code here.
		isswscr_fs()->add_action( 'after_uninstall', 'isswscr_fs_uninstall_cleanup' );
	} else {
		// Parent is inactive, add your error handling here.
	}
}

if ( isswscr_fs_is_parent_active_and_loaded() ) {
	// If parent already included, init add-on.
	isswscr_fs_init();
} else if ( isswscr_fs_is_parent_active() ) {
	// Init add-on only after the parent is loaded.
	add_action( 'issscr_fs_loaded', 'isswscr_fs_init' );
} else {
	// Even though the parent is not activated, execute add-on for activation / uninstall hooks.
	isswscr_fs_init();
}