<?php

/*
	Plugin Name: Concerts
	Description: A plugin created for Lulacruza Concerts.
	Version: 0.1
	Author: Rick Boykin
	Author URI: http://www.mondorobot.com
*/

include('includes/installdb.php'); 
include('includes/concert_functions.php');

// ----------- INSTALL ------------ //

if (!class_exists('DateTime')) {
	class DateTime {
	    var $date;
	    
	    function DateTime($date) {
	        $this->date = strtotime($date);
			
	    }
	    
	    function setTimeZone($timezone) {
	        return;
	    }
	    
	    function __getDate() {
	        return date(DATE_ATOM, $this->date);    
	    }
	    
	    function modify($multiplier) {
	        $this->date = strtotime($this->__getDate() . ' ' . $multiplier);
	    }
	    
	    function format($format) {
	        return date($format, $this->date);
	    }
	}
}

// Runs when plugin is activated
register_activation_hook(__FILE__,'lc_concerts_install'); 

function lc_concerts_install() {
	lc_install_concert_database();
	add_option('concerts_notify', 'default@email.com');
	add_option('concerts_accounts', 'default@email.com');
	add_option('concerts_notify_from_name', 'Your Name');
	add_option('concerts_notify_from_email', 'default@email.com');
	}

// Runs on plugin deactivation
register_deactivation_hook( __FILE__, 'lc_concerts_deactivate' );
function lc_concerts_deactivate() {}

// ----------- FUNCTIONS -------------//

function lc_concerts_plugin_uri($file)
{
	return plugins_url( $file, __FILE__ );
}

// ----------- SCRIPTS -------------//

add_action('wp_footer', 'lc_concerts_print_scripts');
function lc_concerts_print_scripts()
{
	wp_print_scripts();
}

wp_deregister_script('jquery-validate');
wp_register_script('jquery-validate', plugins_url( 'js/jquery.validate.min.js', __FILE__ ), array( 'jquery' ), false, true);
wp_deregister_script('lc-concerts');
wp_register_script('lc-concerts', plugins_url( 'js/concerts.js', __FILE__ ), array( 'jquery', 'jquery-watermark', 'jquery-validate' ), false, true);


// ----------- ADMIN ------------ //

add_action('admin_head', 'lc_concerts_custom_css');
function lc_concerts_custom_css() 
{
	$css_file = plugin_dir_url( __FILE__ ) . "css/lc_concerts_admin.css";
  echo "<link rel='stylesheet' id='lc-custom_-css'  href='" . $css_file . "' type='text/css' media='all' />";
}

add_action('admin_menu', 'lc_concerts_plugin_menu');
function lc_concerts_plugin_menu() 
{
	$menu_page = add_menu_page('Concerts', 'Concerts', 'manage_options', 'concerts', 'lc_concerts_admin_func','../wp-content/plugins/concerts/images/calendar-16.png',31);
	add_action( "admin_print_scripts-$menu_page", 'lc_concerts_admin_head' );
	$menu_page = add_submenu_page('concerts','Settings for Concerts', 'Settings', 'manage_options', 'concerts-settings', 'lc_concerts_sub_func');
	add_action( "admin_print_scripts-$menu_page", 'lc_concerts_admin_head' );
	$menu_page = add_submenu_page('concerts','Settings for Concerts', 'Region Schedule', 'manage_options', 'concerts-regions', 'lc_concerts_region_func');
	add_action( "admin_print_scripts-$menu_page", 'lc_concerts_admin_head' );
}

function lc_concerts_admin_head() 
{
	$css_file = plugin_dir_url( __FILE__ ) . "css/concerts_admin.css";
  echo "<link rel='stylesheet' id='lc-custom_-css'  href='" . $css_file . "' type='text/css' media='all' />\n";
  
  $js_file = plugin_dir_url( __FILE__ ) . "js/concerts_admin.js";
  wp_enqueue_script('myscript', $js_file, array('jquery') );
}


// Concerts Menu
function lc_concerts_admin_func() {
	if (!current_user_can('manage_options'))  
	{
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	extract(lc_concerts_get_vars(array('action')));

	switch($action)
	{
		case 'concert_activate':
			include('includes/admin/concert_activate.php'); 	
		break;
		case 'concert_delete':
			include('includes/admin/concert_delete.php'); 
		break;
		case 'concert_status':
			include('includes/admin/concert_full.php');
		break;
		case 'concert_view':
			include('includes/admin/concert_view.php'); 
		break;
		case 'concert_new':
			include('includes/admin/concert_edit.php');
		break;
		case 'concert_edit':
			include('includes/admin/concert_edit.php');
		break;
		case 'concert_update':
			include('includes/admin/concert_update.php'); 	
		break;
		case 'concert_add':
			include('includes/admin/concert_update.php'); 	
		break;
		default:
			include('includes/admin/concerts.php'); 	
		break;
	}
}

// Settings Menu
function lc_concerts_sub_func() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	$updateSucces = false;
	if ($_POST['concerts_option']){
		update_option('concerts_notify', $_POST['concerts_notify']);
		update_option('concerts_notify_from_name', $_POST['concerts_notify_from_name']);
		update_option('concerts_notify_from_email', $_POST['concerts_notify_from_email']);
		update_option('concerts_accounts', $_POST['concerts_accounts']);
		$updateSucces = true;
	}

	include('includes/admin/settings.php'); 	
}

// concert region

function lc_delete_region_schedule($itemID) {
	
	
}

function lc_concerts_region_func() {
	global $wpdb;
	
	if (!current_user_can('manage_options'))  
	{
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	$vars = lc_concerts_get_vars(array('action', 'sched_id', 'sched_region_id', 'sched_name', 'sched_desc', 'sched_startdate', 'sched_enddate', 'schedcheck[]'));
	extract($vars);
	
	switch ($action) {
		case "delete":
		  check_admin_referer('delete-concert-sched_' . $sched_id);
		  $wpdb->query("DELETE FROM " . $wpdb->prefix . "concerts_region_schedule WHERE id = '$sched_id'");
		  include('includes/admin/schedule_show.php');
		  exit;
			break;
		case "edit":

		  if (!$schedule = get_lc_region_schedule($sched_id))
			   wp_die(__('Schedule not found.'));
			     
		  include('includes/admin/schedule_edit.php'); 
		  
		break;
		case "new":

		  include('includes/admin/schedule_edit.php'); 
		  
		break;
		case "add":
		  check_admin_referer('add-concert-schedule');

			$rows = array( 
			  'region_id' => $sched_region_id,
				'name' => $sched_name,
				'desc' => $sched_desc,
				'startdate' => $sched_startdate,
				'enddate' => $sched_enddate,
				);

				$wpdb->insert($wpdb->prefix . 'concerts_region_schedule', $rows);

				include('includes/admin/schedule_show.php'); 
				
		break;
		case "save":
			check_admin_referer('update-concert-schedule_' . $sched_id);

			$rows = array( 
			  'region_id' => $sched_region_id,
				'name' => $sched_name,
				'desc' => $sched_desc,
				'startdate' => $sched_startdate,
				'enddate' => $sched_enddate,
				);

				$wpdb->update($wpdb->prefix . 'concerts_region_schedule', $rows, array( 'id' => $sched_id));
				include('includes/admin/schedule_show.php'); 
				
			break;
		default:
			include('includes/admin/schedule_show.php'); 
			break;
	}
}

// ----------- FRONTEND ------------ //

function lc_concerts_contents($filename, $values = 0) {
	
	if($values)
	{
		extract($values);
	}
	
	ob_start();
	include ($filename);
	return ob_get_clean();
}

// SHORTCODE FOR SCREENINGS PAGE [concerts]
add_shortcode('concerts', 'lc_concerts_show_func');
function lc_concerts_show_func() {
	$output = lc_concerts_contents('includes/frontend/concerts.php'); 
	return $output;
}

// SHORTCODE FOR SCREENINGS PAGE [concerts_past]
add_shortcode('concerts_past', 'lc_concerts_show_past_func');
function lc_concerts_show_past_func() {
	$output = lc_concerts_contents('includes/frontend/concert_past.php'); 
	return $output;
}

// SHORTCODE FOR HOST A SCREENINGS PAGE [host_concert]
add_shortcode('concerts_host', 'lc_concerts_host_func');
function lc_concerts_host_func() {
	
	extract(lc_concerts_get_vars(array('action')));
	
	if($action == "concerts_host_add") 
	{
		$output = include('includes/frontend/user_concert_add.php'); 		
	}
	else if($action == "concerts_host_lookup") 
	{
		$output = lc_concerts_contents('includes/frontend/user_concert_host_2.php'); 
	}
	else 
	{
		$output = lc_concerts_contents('includes/frontend/user_concert_host_1.php'); 
	}
	
	return $output;
}

// SHORTCODE FOR LOGIN PAGE [concert_manage]
add_shortcode('concerts_manage', 'lc_concerts_manage_func');
function lc_concerts_manage_func() 
{	
	$logged_in_check = lc_concerts_check_logged_in();
	
	if ($logged_in_check != 1)
	{
		$values = 0;
		if($logged_in_check == -1)
		{
			$values = array('lc_message' => 'No Concerts were found for the username and password. Please try again.');
		}
		
		return lc_concerts_contents('includes/frontend/user_login.php', $values);
	}
	else {
		
		extract(lc_concerts_get_vars(array('action')));
		//echo "action $action <br/>";
		
		if ($action == "concerts_user_delete")
		{
			$output = lc_concerts_contents('includes/frontend/user_concert_delete.php'); 	
		}
		else if ($action == "concerts_user_status")
		{
			$output = lc_concerts_contents('includes/frontend/user_concert_full.php'); 	
		}
		else if ($action == "concerts_user_update")
		{
			$output = lc_concerts_contents('includes/frontend/user_concert_update.php') . "<br/>" .
			lc_concerts_contents('includes/frontend/user_concerts.php');
			
		}
		else if ($action == "concerts_user_edit")
		{
			$output = lc_concerts_contents('includes/frontend/user_concert_edit.php');
		}
		else if($action == "concerts_user_logout")
		{
			$output = lc_concerts_contents('includes/frontend/user_logout.php') . " " . lc_concerts_contents('includes/frontend/user_login.php');
		}
		else {
			$output = lc_concerts_contents('includes/frontend/user_concerts.php'); 
		}
		
		$logout_button = lc_concerts_contents('includes/frontend/user_logout_button.php');
		return $output.$logout_button;
	}
}

// SHORTCODE FOR HOST A SCREENINGS PAGE [attend_concert]
add_shortcode('concerts_attend', 'lc_concerts_attend_func');
function lc_concerts_attend_func() 
{	
	extract(lc_screenings_get_vars(array('action')));

	if ($action == "concerts_user_request_invite")
	{
		$output = lc_concerts_contents('includes/frontend/user_concert_request_invite.php'); 
	}
	else if ($action == "concerts_user_request_invite_send")
	{
		$output = lc_concerts_contents('includes/frontend/user_concert_request_invite_send.php'); 	
	}

  return $output;	
}

// SHORTCODE FOR HOST A SCREENINGS PAGE [country_select]
add_shortcode('concerts_country_select', 'lc_country_select_func');
function lc_country_select_func() {
	$output = lc_concerts_contents('includes/frontend/country_select.php'); 
	return $output;
		
}

// SHORTCODE FOR HOST A SCREENINGS PAGE [concerts_user]
add_shortcode('concerts_user', 'lc_concerts_user');
function lc_concerts_user() {
  $output = include('includes/frontend/user_login.php'); 
	return $output;
}
?>
