<?php
/*

Plugin Name: Sahih al Bukhari Hadiths

Description: Sahih al-Bukhari is a collection of hadith compiled by Abu Abdullah Muhammad Ibn Isma`il al-Bukhari(rahimahullah). His collection is recognized by the overwhelming majority of the Muslim world to be one of the most authentic collections of the Sunnah of the Prophet Salla Allah `Alaihi Wa Sallam. It contains roughly 7563 hadith (with repetitions) in 97 books.
The translation provided here is by Dr. M. Muhsin Khan. 

Version: 1.2.3

Author: Bahmed karim

Author URI: http://gp-codex.fr

*/
		defined( 'ABSPATH' ) or die( 'Salem aleykoum!' );


		define( 'HADITH_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

		add_action('admin_menu' , 'qtm_hadithadmin');


		function qtm_hadithadmin(){

			add_menu_page('Bukhari Hadith', 'Bukhari Hadith', 'activate_plugins', 'qtm_hadithadmin', 'qtm_renderhadithadmin', ''.HADITH_PLUGIN_URL. 'icon_hadith.png', 3); 

			add_action( 'admin_init', 'qtm_registerhadithoptions' );	

		}

		function qtm_registerhadithoptions(){
			
			register_setting( 'hadith-options', 'border_hadith_bloc');

			register_setting( 'hadith-options', 'background_hadith_bloc');
		}


		function hadith_js_scripts() {
			wp_enqueue_script( 'loadhadith', plugin_dir_url(__FILE__).'/template/js/load_hadiths.js', array('jquery'), '1.0', true );
			wp_localize_script('loadhadith', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
		}


		add_action('wp_enqueue_scripts', 'hadith_js_scripts');
		add_action( 'wp_ajax_qtm_chapterhadith', 'qtm_chapterhadith' );
		add_action( 'wp_ajax_nopriv_qtm_chapterhadith', 'qtm_chapterhadith' );

		require('inc/functions_hadith.php');

		function qtm_renderhadithadmin(){

		include('admin/hadith-admin.php');

		}

//COPY CHAPTERS IN BDD && ADD_OPTION COLOR
		function qtm_hadithinstall(){

		include "data/hadiths_data.php";

		global jQuerywpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( jQuerybukhari_chapter );

		add_option( 'border_hadith_bloc', '005a8c', '', 'yes' );

		add_option( 'background_hadith_bloc', 'EEF4F8', '', 'yes' );
				
		add_option( 'color_hadith_ref', 'FFFFFF', '', 'yes' );
		
		add_option( 'background_hadith_ref', '005a8c', '', 'yes' );

		}

		register_activation_hook(__FILE__,'qtm_hadithinstall'); 

//DELETE PLUGIN AND ALL OPTIONS
		function qtm_hadithuninstall(){
			
			delete_option('border_hadith_bloc');

			delete_option('background_hadith_bloc');
			
			delete_option('color_hadith_ref');
			
			delete_option('background_hadith_ref');
			
			global jQuerywpdb;

			jQuerytable_name = 'bukhari_chapters';

			jQuerywpdb->query("DROP TABLE IF EXISTS {jQuerytable_name}");	
			
		}
 
		register_uninstall_hook(__FILE__, 'qtm_hadithuninstall'); 

//RENDER HADITHS
		function qtm_renderhadiths(){
		require 'inc/hadith_style.php';
		include 'template/render_hadith.php';
			
		}

		add_shortcode('bukhari-hadiths', 'hadith_shortcode');

		function hadith_shortcode() {

			return qtm_renderhadiths();

		}
