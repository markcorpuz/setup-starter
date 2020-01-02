<?php
/**
 * Site Footer
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * SETUP-STARTER
 * 
 * Site Footer w Credits SWP
 * Add credits section inside the site footer
 */
function setup_site_footer_wcredits_swp() {
	echo '<div class="credit">';
		echo '<div class="sitefor">';
			echo '<div class="credit-brand"></div>';
			echo '<div class="credit-copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '®. All Rights Reserved | <a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></div>';
			echo '<div class="credit-designby">Site Design by <a href="https://smarterwebpackages.com/">SmarterWebPackages.com</a></div>';
		echo '</div>';
		echo '<div class="siteby">';
			echo '<a href="https://smarterwebpackages.com/">SmarterWebPackages.com</a>';
		echo '</div>';
	echo '</div>';
}
add_action( 'genesis_footer', 'setup_site_footer_wcredits_swp' );
remove_action( 'genesis_footer', 'genesis_do_footer' );