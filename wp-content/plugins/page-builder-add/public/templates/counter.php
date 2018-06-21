<?php if ( ! defined( 'ABSPATH' ) ) exit;

 // 86400 = 1 day
$allowed = array();
$pluginOpsUserTimeZone = get_option('timezone_string');
date_default_timezone_set($pluginOpsUserTimeZone);
$todaysDate = date('d-m-Y');

if (!isset($_COOKIE['ulpb_count']) && !is_user_logged_in()) {

	$current_count = get_post_meta($current_pageID,'ulpb_page_hit_counter',true);
	$Todays_count = get_post_meta($current_pageID,"ulpb_page_hit_counter_$todaysDate",true);
	$new_count = $current_count + 1;
	$Todays_new_count = $Todays_count + 1;
	update_post_meta( $current_pageID, 'ulpb_page_hit_counter', wp_kses("$new_count", $allowed ) );
	update_post_meta( $current_pageID, "ulpb_page_hit_counter_$todaysDate", wp_kses("$Todays_new_count", $allowed ) );
	
	setcookie('ulpb_count', '1', time() + (86400 * 2), "/");

}

if (!is_user_logged_in()) {
	$current_view_count = get_post_meta($current_pageID,'ulpb_page_views_counter',true);
	$new_view_count = $current_view_count + 1;
	update_post_meta( $current_pageID, 'ulpb_page_views_counter', wp_kses("$new_view_count", $allowed ) );
	$Todays_count = get_post_meta($current_pageID,"ulpb_page_views_counter_$todaysDate",true);
	$Todays_new_count = $Todays_count + 1;
	update_post_meta( $current_pageID, "ulpb_page_views_counter_$todaysDate", wp_kses("$Todays_new_count", $allowed ) );
}

?>