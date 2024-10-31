<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Isotope
Plugin URI: https://wordpress.org/plugins/oxsn-isotope/
Description: This plugin adds helpful isotope shortcodes with quicktags!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.4
*/


define( 'oxsn_isotope_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_isotope_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_isotope_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_isotope_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_isotope_settings_link', 10, 2 );
	function oxsn_isotope_settings_link( $links, $file ) {

		if ( $file != oxsn_isotope_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-isotope', false ) . '">' . esc_html( __( 'Settings', 'oxsn-isotope' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_isotope_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_isotope_plugin_tab_nav_item', 99);
	function oxsn_isotope_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Isotope', 'Isotope', 'manage_options', 'oxsn-isotope', 'oxsn_isotope_plugin_tab');

	}

}

if ( !function_exists('oxsn_isotope_plugin_tab') ) {

	function oxsn_isotope_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Isotope Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-isotope" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Shortcodes */

//[oxsn_isotope_parent class=""]
if ( ! function_exists ( 'oxsn_isotope_parent_shortcode' ) ) {

	add_shortcode('oxsn_isotope_parent', 'oxsn_isotope_parent_shortcode');
	function oxsn_isotope_parent_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_isotope_parent_class = esc_attr($a['class']);
		if ($oxsn_isotope_parent_class != '') :

			$oxsn_isotope_parent_class = ' class="oxsn_isotope_parent ' . $oxsn_isotope_parent_class . '" ';

		else : 

			$oxsn_isotope_parent_class = ' class="oxsn_isotope_parent" ';

		endif;

		$oxsn_isotope_parent_id = esc_attr($a['id']);
		if ($oxsn_isotope_parent_id != '') :

			$oxsn_isotope_parent_id = ' id="' . $oxsn_isotope_parent_id . '" ';

		endif;

		return '<div ' . $oxsn_isotope_parent_id . ' ' . $oxsn_isotope_parent_class . '"><div class="oxsn_isotope_child_column_width"></div><div class="oxsn_isotope_gutter_width"></div> ' . do_shortcode($content) . '</div>';
	
	}

}

//[oxsn_isotope_child class=""]
if ( ! function_exists ( 'oxsn_isotope_child_shortcode' ) ) {

	add_shortcode('oxsn_isotope_child', 'oxsn_isotope_child_shortcode');
	function oxsn_isotope_child_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_isotope_child_class = esc_attr($a['class']);
		if ($oxsn_isotope_child_class != '') :

			$oxsn_isotope_child_class = ' class="oxsn_isotope_child ' . $oxsn_isotope_child_class . '" ';

		else : 

			$oxsn_isotope_child_class = ' class="oxsn_isotope_child" ';

		endif;

		$oxsn_isotope_child_id = esc_attr($a['id']);
		if ($oxsn_isotope_child_id != '') :

			$oxsn_isotope_child_id = ' id="' . $oxsn_isotope_child_id . '" ';

		endif;

		return '<div ' . $oxsn_isotope_parent_id . ' ' . $oxsn_isotope_child_class . ' >' . do_shortcode($content) . '</div>';
	
	}

}


?><?php


/* OXSN Quicktags */

if ( ! function_exists ( 'oxsn_isotope_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_isotope_quicktags' );
	function oxsn_isotope_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">

				QTags.addButton( 'oxsn_isotope_parent_quicktag', '[oxsn_isotope_parent]', '[oxsn_isotope_parent class=""]', '[/oxsn_isotope_parent]', 'oxsn_isotope_parent', 'Quiktags ISOTOPE PARENT', 301 );
				QTags.addButton( 'oxsn_isotope_child_quicktag', '[oxsn_isotope_child]', '[oxsn_isotope_child class=""]', '[/oxsn_isotope_child]', 'oxsn_isotope_child', 'Quiktags ISOTOPE CHILD', 302 );

			</script>

		<?php

		}

	}

}


?><?php


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_isotope_inc_css' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_isotope_inc_css' );
	function oxsn_isotope_inc_css() {

		wp_enqueue_style( 'oxsn_isotope_css', oxsn_isotope_plugin_dir_url . 'inc/css/isotope.css', array(), '1.0.0', 'all' ); 

	}

}


?><?php


/* OXSN Include JS */

if ( ! function_exists ( 'oxsn_isotope_inc_js' ) ) {

	add_action( 'wp_enqueue_scripts', 'oxsn_isotope_inc_js' );
	function oxsn_isotope_inc_js() {

		wp_enqueue_script( 'oxsn_isotope_isotope_min_js', oxsn_isotope_plugin_dir_url . 'inc/js/isotope.pkgd.min.js', array(), '3.0.1', 'all' ); 
		wp_enqueue_script( 'oxsn_isotope_imagesloaded_min_js', oxsn_isotope_plugin_dir_url . 'inc/js/imagesloaded.pkgd.min.js', array(), '4.1.0', 'all' );
		wp_enqueue_script( 'oxsn_isotope_inc_js', oxsn_isotope_plugin_dir_url . 'inc/js/isotope-inc.js', array(), '0.0.1', 'all' );

	}

}


?>