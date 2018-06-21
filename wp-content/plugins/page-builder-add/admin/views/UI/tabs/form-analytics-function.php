<?php if ( ! defined( 'ABSPATH' ) ) exit;
$pluginOpsUserTimeZone = get_option('timezone_string');
date_default_timezone_set($pluginOpsUserTimeZone);
$todaysDate =  date('d-m-Y');

$uniqueImpressions = get_post_meta($post->ID,'ulpb_page_hit_counter',true);
$allImpressions = get_post_meta($post->ID,'ulpb_page_views_counter',true);
$totalConversions = get_post_meta($post->ID,'ssm_conversion_count',true);

$uniqueImpressionsToday = get_post_meta($post->ID,"ulpb_page_hit_counter_$todaysDate",true);
$allImpressionsToday = get_post_meta($post->ID,"ulpb_page_views_counter_$todaysDate",true);

if ($uniqueImpressions == '') {
    $uniqueImpressions = 0;
}
if ($allImpressions == '') {
    $allImpressions = 0;
}
if ($allImpressions == '') {
    $allImpressions = 0;
}

if ($totalConversions == '') {
    $totalConversions = 0;
}

if ($totalConversions > 0 && $allImpressions > 0) {
    $conversionRate = ((int)$totalConversions / $allImpressions)*100;
} else{
    $conversionRate = 0;
}
$conversionRate =  round( $conversionRate, 1, PHP_ROUND_HALF_UP);


// Divide conversions by date.
$ssm_subscribers_list = get_post_meta($post->ID,'ssm_subscribers_list',true);
$smfb_formBuilder_data_list = get_post_meta($post->ID,'ulpb_formBuilder_data_submission',true);


$numberOfConversions = array();
$lastThirtyDates = array();
$lastThirtyDatesForChart = array();
$lastThirtyDaysImpressions = array();
for ($i=0; $i <=30 ; $i++) {
    $numberOfConversions[$i] = 0;
    $lastThirtyDates[$i] = date('d-m-Y',strtotime("-$i days"));
    $lastThirtyDatesForChart[$i] = date('d-M',strtotime("-$i days"));

    $thisDate = date('d-m-Y',strtotime("-$i days"));
    $lastThirtyDaysImpressions[$i] = get_post_meta($post->ID,"ulpb_page_views_counter_$thisDate",true);
}

if (is_array($ssm_subscribers_list)) {
    foreach ($ssm_subscribers_list as $ssm_result) {
        if (isset($ssm_result['date']) ) {
          $dateOfssm = $ssm_result['date'];
        }else{
          $dateOfssm = 'Not Set';
        }

        for ($i=0; $i <=30 ; $i++) {
            if ($dateOfssm == $lastThirtyDates[$i]) {
                $numberOfConversions[$i]++;
            }
        }
            
    }
}
    

if (is_array($smfb_formBuilder_data_list)) {
    foreach ($smfb_formBuilder_data_list as $smfb_formBuilder_each_data) {
        if (isset($smfb_formBuilder_each_data['date']) ) {
          $dateOfssm = $smfb_formBuilder_each_data['date'];
        }else{
          $dateOfssm = 'Not Set';
        }

        for ($i=0; $i <=30 ; $i++) {
            if ($dateOfssm == $lastThirtyDates[$i]) {
                $numberOfConversions[$i]++;
            }
        }
        
    }
}
    

?>