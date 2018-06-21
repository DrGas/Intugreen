<?php if ( ! defined( 'ABSPATH' ) ) exit;
$current_pageID = $post->ID;

if (isset($isShortCodeTemplate)) {
  if ($isShortCodeTemplate == true) {
    $current_pageID = $template_id;
  }
} else{ 
  $isShortCodeTemplate = '';
}



$data = get_post_meta( $current_pageID, 'ULPB_DATA', true );

if (isset( $data['RowsDivided'] )) {
  if ($data['RowsDivided'] > 0 ) {
    $rowsCollection = array();
    for($i = 0; $i< $data['RowsDivided']; $i++ ){
      $theseRows =  get_post_meta($current_pageID, 'ULPB_DATA_Rows_Part_'.$i, true);
      foreach ($theseRows as $value) {
        array_push($data['Rows'], $value );
      }
    }
  }
}

$current_postType = get_post_type( $current_pageID );

if (isset($data['pageOptions']['VariantB_ID'])) {
  $VariantB_ID = $data['pageOptions']['VariantB_ID'];
  
  if ($VariantB_ID !== 'none') {
    include 'AB/phpab.php';
    $FirstTest = new phpab('AbTestOne');
    if ($FirstTest->get_user_segment() == 'testVariantOne') {
      $data = get_post_meta( $VariantB_ID, 'ULPB_DATA', true );

      $current_pageID = $VariantB_ID;
    } else{
      $data = get_post_meta( $current_pageID, 'ULPB_DATA', true );
    }
  }

}

$lp_thisPostType = get_post_type( $current_pageID );
if ($lp_thisPostType == 'ulpb_post') {
  include 'counter.php';
}


  $widgetAnimationTriggerScript = '';
  $widgetCounterLoadScripts = false;
  $widgetCountDownLoadScripts = false;
  $widgetSliderLoadScripts = false;
  $widgetFALoadScripts = false;
  $widgetVideoLoadScripts = false;
  $widgetOwlLoadScripts = false;
  $widgetWooCommLoadScripts = false;
  $widgetPostsSliderExternalScripts = false;


  $POPBNallRowStyles = array();
  $POPBNallRowStylesResponsiveTablet = array();
  $POPBNallRowStylesResponsiveMobile = array();
  $POPBallColumnStylesArray = array();
  $POPBallWidgetsStylesArray = array();
  $thisColFontsToLoad = array('Allerta');




if (!empty($data)) {
  include('header.php');
?>

<?php if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){ echo "<div class='ulpb_PageBody ulpb_PageBody_$current_pageID'>";} else{ echo "<body class='ulpb_PageBody ulpb_PageBody_$current_pageID'>"; }   ?>

  <?php
  $rows = $data['Rows'];

  $rowCount = 0;

  

  foreach ($rows as $row) {

    if (isset($row['globalRow'])) {

      if (isset($row['globalRow']['globalRowPid'])) {
        $isGlobalRow = $row['globalRow']['isGlobalRow'];
        if ($isGlobalRow == true) {
          $globalRowPostData = get_post_meta( $row['globalRow']['globalRowPid'], 'ULPB_DATA', true );
          $row = $globalRowPostData['Rows'][0]; 
        }
      }
    }
    $rowID = $row["rowID"];
  	$columns = $row['columns'];
  	$rowHeight = $row['rowHeight'];
  	$rowData = $row['rowData'];
    $rowMargins = $rowData['margin'];
    $rowPadding = $rowData['padding'];
  	$rowBgColor = $rowData['bg_color'];
  	$rowBgImg = $rowData['bg_img'];
    $currentRowcustomCss = $rowData['customStyling'];
    $currentRowcustomJS = $rowData['customJS'];

    $rowMarginTop = $rowMargins['rowMarginTop'];
    $rowMarginBottom = $rowMargins['rowMarginBottom'];
    $rowMarginLeft = $rowMargins['rowMarginLeft'];
    $rowMarginRight = $rowMargins['rowMarginRight'];

    $rowPaddingTop = $rowPadding['rowPaddingTop'];
    $rowPaddingBottom = $rowPadding['rowPaddingBottom'];
    $rowPaddingLeft = $rowPadding['rowPaddingLeft'];
    $rowPaddingRight = $rowPadding['rowPaddingRight'];

    if (!isset($row['rowHeightUnit']) ) {
      $rowHeightUnit = 'px';
    }else{  
      if ($row['rowHeightUnit'] == '') {
        $rowHeightUnit = 'px';
      } else{
        $rowHeightUnit = $row['rowHeightUnit'];
      }
    }

    if (isset($row['rowHeightTablet']) ) {
      $rowHeightTablet = $row['rowHeightTablet'];
      $rowHeightUnitTablet = $row['rowHeightUnitTablet'];
      $rowHeightMobile = $row['rowHeightMobile'];
      $rowHeightUnitMobile = $row['rowHeightUnitMobile'];
    }else{
      $rowHeightTablet = '';
      $rowHeightUnitTablet = '';
      $rowHeightMobile = '';
      $rowHeightUnitMobile = '';
    }

    $rowBackgroundParallax = '';
    if (isset($rowData['rowBackgroundParallax'])) {
      if ($rowData['rowBackgroundParallax'] == 'true') {
        $rowBackgroundParallax = 'background-attachment:fixed !important;';
      }
    }

    $rowBackgroundOptions  = "background:url($rowBgImg)no-repeat center center; background-size:cover; background-color:$rowBgColor ; ";
    if (isset($rowData['rowBackgroundType'])) {
      if ($rowData['rowBackgroundType'] == 'gradient') {
        $rowGradient = $rowData['rowGradient'];
        if ($rowGradient['rowGradientType'] == 'linear') {
          $rowBackgroundOptions = 'background: linear-gradient('.$rowGradient['rowGradientAngle'].'deg, '.$rowGradient['rowGradientColorFirst'].' '.$rowGradient['rowGradientLocationFirst'].'%,'.$rowGradient['rowGradientColorSecond'].' '.$rowGradient['rowGradientLocationSecond'].'%) ;';
        }
        if ($rowGradient['rowGradientType'] == 'radial') {
          $rowBackgroundOptions = 'background: radial-gradient(at '.$rowGradient['rowGradientPosition'].', '.$rowGradient['rowGradientColorFirst'].' '.$rowGradient['rowGradientLocationFirst'].'%,'.$rowGradient['rowGradientColorSecond'].' '.$rowGradient['rowGradientLocationSecond'].'%) ;';
        }
      }
    }

    $rowOverlayBackgroundOptions = '';
    if (isset($rowData['rowBgOverlayColor'])) {
      $rowOverlayBackgroundOptions  = " background:".$rowData['rowBgOverlayColor']." ; background-color:".$rowData['rowBgOverlayColor']." ;";
    }
    if (isset($rowData['rowOverlayBackgroundType'])) {
      if ($rowData['rowOverlayBackgroundType'] == 'gradient') {
        $rowOverlayGradient = $rowData['rowOverlayGradient'];
        if ($rowOverlayGradient['rowOverlayGradientType'] == 'linear') {
          $rowOverlayBackgroundOptions = 'background: linear-gradient('.$rowOverlayGradient['rowOverlayGradientAngle'].'deg, '.$rowOverlayGradient['rowOverlayGradientColorFirst'].' '.$rowOverlayGradient['rowOverlayGradientLocationFirst'].'%,'.$rowOverlayGradient['rowOverlayGradientColorSecond'].' '.$rowOverlayGradient['rowOverlayGradientLocationSecond'].'%) ;';
        }
        if ($rowOverlayGradient['rowOverlayGradientType'] == 'radial') {
          $rowOverlayBackgroundOptions = 'background: radial-gradient(at '.$rowOverlayGradient['rowOverlayGradientPosition'].', '.$rowOverlayGradient['rowOverlayGradientColorFirst'].' '.$rowOverlayGradient['rowOverlayGradientLocationFirst'].'%,'.$rowOverlayGradient['rowOverlayGradientColorSecond'].' '.$rowOverlayGradient['rowOverlayGradientLocationSecond'].'%) ;';
        }
      }
    }


    $thisRowHoverOption = '';
    if (isset($rowData['rowHoverOptions'])) {
        $rowHoverOptions = $rowData['rowHoverOptions'];
        if (isset($rowHoverOptions['rowBackgroundTypeHover'])) {
          if ($rowHoverOptions['rowBackgroundTypeHover'] == 'solid') {
            $thisRowHoverOption = ' #'.$row['rowID'].':hover { background:'.$rowHoverOptions['rowBgColorHover'].' !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
          }
          if ($rowHoverOptions['rowBackgroundTypeHover'] == 'gradient') {
            $rowGradientHover = $rowHoverOptions['rowGradientHover'];

            if ($rowGradientHover['rowGradientTypeHover'] == 'linear') {
              $thisRowHoverOption = ' #'.$row['rowID'].':hover { background: linear-gradient('.$rowGradientHover['rowGradientAngleHover'].'deg, '.$rowGradientHover['rowGradientColorFirstHover'].' '.$rowGradientHover['rowGradientLocationFirstHover'].'%,'.$rowGradientHover['rowGradientColorSecondHover'].' '.$rowGradientHover['rowGradientLocationSecondHover'].'%) !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
            }

            if ($rowGradientHover['rowGradientTypeHover'] == 'radial') {

              $thisRowHoverOption = ' #'.$row['rowID'].':hover { background: radial-gradient(at '.$rowGradientHover['rowGradientPositionHover'].', '.$rowGradientHover['rowGradientColorFirstHover'].' '.$rowGradientHover['rowGradientLocationFirstHover'].'%,'.$rowGradientHover['rowGradientColorSecondHover'].' '.$rowGradientHover['rowGradientLocationSecondHover'].'%) !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
            }
          }
        }

      }


    $rowCustomClass ='';
    if (isset($rowData['rowCustomClass'])) {
      $rowCustomClass = $rowData['rowCustomClass'];
    }

    $rowHideOnDesktop = "display:block"; $rowHideOnTablet = "display:block"; $rowHideOnMobile = "display:block";
    if (isset($rowData['rowHideOnDesktop']) ) {
      if ($rowData['rowHideOnDesktop'] == 'hide') {
        $rowHideOnDesktop ="display:none";
      }
      if ($rowData['rowHideOnTablet'] == 'hide') {
        $rowHideOnTablet ="display:none !important;";
      }
      if ($rowData['rowHideOnMobile'] == 'hide') {
        $rowHideOnMobile ="display:none !important;";
      }
    }
    
    if (isset($rowData['marginTablet'])) {

      $rowMarginTablet = $rowData['marginTablet'];
      $rowMarginMobile = $rowData['marginMobile'];
      $rowPaddingTablet = $rowData['paddingTablet'];
      $rowPaddingMobile = $rowData['paddingMobile'];
      
      $thisRowResponsiveRowStylesTablet = "
        #".$row["rowID"]." {
         margin-top: ".$rowMarginTablet['rMTT']."% !important;
         margin-bottom: ".$rowMarginTablet['rMBT']."% !important;
         margin-left: ".$rowMarginTablet['rMLT']."% !important;
         margin-right: ".$rowMarginTablet['rMRT']."% !important;

         padding-top: ".$rowPaddingTablet['rPTT']."% !important;
         padding-bottom: ".$rowPaddingTablet['rPBT']."% !important;
         padding-left: ".$rowPaddingTablet['rPLT']."% !important;
         padding-right: ".$rowPaddingTablet['rPRT']."% !important;

         min-height:".$rowHeightTablet."$rowHeightUnitTablet !important;
         $rowHideOnTablet
        }
      
      ";
      $thisRowResponsiveRowStylesMobile = "
      
        #".$row["rowID"]." {
         margin-top: ".$rowMarginMobile['rMTM']."% !important;
         margin-bottom: ".$rowMarginMobile['rMBM']."% !important;
         margin-left: ".$rowMarginMobile['rMLM']."% !important;
         margin-right: ".$rowMarginMobile['rMRM']."% !important;

         padding-top: ".$rowPaddingMobile['rPTM']."% !important;
         padding-bottom: ".$rowPaddingMobile['rPBM']."% !important;
         padding-left: ".$rowPaddingMobile['rPLM']."% !important;
         padding-right: ".$rowPaddingMobile['rPRM']."% !important;

         min-height:".$rowHeightMobile."$rowHeightUnitMobile !important;
         $rowHideOnMobile
        }
      ";

      array_push($POPBNallRowStylesResponsiveTablet, $thisRowResponsiveRowStylesTablet);
      array_push($POPBNallRowStylesResponsiveMobile, $thisRowResponsiveRowStylesMobile);
    }

    /*
    $rowMarginTop = floor( ($rowMarginTop/1268)*100);
    $rowMarginBottom = floor( ($rowMarginBottom/1268)*100);
    $rowMarginLeft = floor( ($rowMarginLeft/1268)*100);
    $rowMarginRight = floor( ($rowMarginRight/1268)*100);

    $rowPaddingTop = floor( ($rowPaddingTop/1268)*100);
    $rowPaddingBottom = floor( ($rowPaddingBottom/1268)*100);
    $rowPaddingLeft = floor( ($rowPaddingLeft/1268)*100);
    $rowPaddingRight = floor( ($rowPaddingRight/1268)*100);
    */

    $rowMarginStyle = "margin:$rowMarginTop"."% $rowMarginRight"."% $rowMarginBottom"."% $rowMarginLeft"."%;";

    $rowPaddingStyle = "padding:$rowPaddingTop"."% $rowPaddingRight"."% $rowPaddingBottom"."% $rowPaddingLeft"."%;";

  	$currentRowStyles = "#".$row["rowID"]."{   min-height:$rowHeight"."$rowHeightUnit; $rowPaddingStyle  $rowMarginStyle  $rowBackgroundOptions  $rowBackgroundParallax  $currentRowcustomCss  $rowHideOnDesktop }     $thisRowHoverOption ";

    array_push($POPBNallRowStyles, $currentRowStyles);

  	//echo($row['rowID']."<br>");
  	include_once 'column-width-resize.php';

  	?>

    <script type="text/javascript">
      <?php echo $currentRowcustomJS; ?>
    </script>
  	<div class='row w3-row  <?php echo $rowCustomClass ?>' data-row_id='<?php echo $row["rowID"]; ?>' id='<?php echo $row["rowID"]; ?>'>
      <div class="overlay-row" style="<?php echo "$rowOverlayBackgroundOptions"; ?>"></div>

      <?php
      if (isset($rowData['video'])) {
        $rowVideo = $rowData['video'];
        $rowBgVideoEnable = $rowVideo['rowBgVideoEnable'];
        if ($rowBgVideoEnable == 'true') {
          $rowBgVideoLoop = $rowVideo['rowBgVideoLoop'];
          $rowVideoMpfour = $rowVideo['rowVideoMpfour'];
          $rowVideoWebM = $rowVideo['rowVideoWebM'];
          $rowVideoThumb = $rowVideo['rowVideoThumb'];
          ?>
          <video poster="<?php echo $rowVideoThumb; ?>" id="bgVid-<?php echo $row["rowID"]; ?>" playsinline autoplay muted <?php echo $rowBgVideoLoop; ?> >
            <source src="<?php echo $rowVideoWebM; ?>" type="video/webm">
            <source src="<?php echo $rowVideoMpfour; ?>" type="video/mp4">
            </video>
            <style type="text/css">
            #bgVid-<?php echo $row["rowID"]; ?> { 
              position: absolute;
              min-width: 100%;
              min-height: 100%;
              width: auto;
              height: auto;
              z-index: -100;
              background: url('<?php echo $rowVideoThumb; ?>') no-repeat;
              background-size: cover;
              transition: 1s opacity;
          }
          </style>

          <?php
        }
        
      }
      ?>
      
  	<?php include('columns.php'); ?>

  	</div>
  	<?php 
    $rowCount++;
  } // ForEach loop for rows ends here

  echo '<style type="text/css">';
  foreach ($POPBNallRowStyles as $value) {
    echo $value . "  ";
  }

  foreach ($POPBallColumnStylesArray as $value) {
    echo $value . "  ";
  }

  foreach ($POPBallWidgetsStylesArray as $value) {
    echo $value . "  ";
  }


  echo " \n @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) { ";
  foreach ($POPBNallRowStylesResponsiveTablet as $value) {
    echo $value . "  ";
  }
  echo " } ";

  echo " \n @media only screen and (min-device-width : 320px) and (max-device-width : 480px) { ";
  foreach ($POPBNallRowStylesResponsiveMobile as $value) {
    echo $value . "  ";
  }
  echo " } ";

  echo '</style>';

  $thisColFontsToLoadSeparatedValue = 'Allerta';
      foreach ($thisColFontsToLoad as $value) {

        if ($value !== '') {
          $aller = strpos($thisColFontsToLoadSeparatedValue, $value);
        }
        
        if ($value == 'Select' || $value == 'select' || $value == 'Arial' || $value == 'sans-serif' || $value == 'Arial Black' || $value == 'sans' || $value == 'Helvetica' || $value == 'Serif' || $value == 'Tahoma' || $value == 'Verdana' || $value == 'Monaco' || $aller !== false) {
        }else{
          if ($value != '') {
            $thisColFontsToLoadSeparatedValue = $thisColFontsToLoadSeparatedValue . '|' .$value;
          }
        }
        
      }

      echo '<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='.$thisColFontsToLoadSeparatedValue.'">';



  ?>

  <?php
      if ($loadWpFooter === 'true') { wp_footer(); }
    ?>

<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('.pb_img_thumbnail').on('click',function(){
    var clikedElID = jQuery(this).attr('id');
    jQuery('#pb_lightbox'+clikedElID).css('display','block');
  });

  jQuery('.pb_single_img_lightbox').on('click',function(){
    jQuery(this).css('display','none');
  });
});
  
</script>

<?php  echo  '<script type="text/javascript">  jQuery(window).scroll(function(event) {  '.   $widgetAnimationTriggerScript  . "  }); </script>  \n" ; ?>

<?php


if ($widgetSliderLoadScripts == true) {
  echo "<script src='".ULPB_PLUGIN_URL."/js/slider.min.js'></script>";
}

if ($widgetFALoadScripts == true) {
  echo "<script src='".ULPB_PLUGIN_URL."/js/fa.js'></script>";
} 

if ($widgetVideoLoadScripts == true) {
  echo "<link href='".ULPB_PLUGIN_URL."/js/videoJS/video-js.css' rel='stylesheet'>";
  echo "<script src='".ULPB_PLUGIN_URL."/js/videoJS/video.js'></script>";
} 

if ($widgetOwlLoadScripts == true) {
  echo "
  <link rel='stylesheet' type='text/css' href='".ULPB_PLUGIN_URL."/public/scripts/owl-carousel/owl.carousel.css'>
  <link rel='stylesheet' type='text/css' href='".ULPB_PLUGIN_URL."/public/scripts/owl-carousel/owl.theme.css'>
  <link rel='stylesheet' type='text/css' href='".ULPB_PLUGIN_URL."/public/scripts/owl-carousel/owl.transitions.css'>";
} 

if ($widgetWooCommLoadScripts == true) {
  echo "<link href='".ULPB_PLUGIN_URL."/styles/wooStyles.css' rel='stylesheet'>";
} 


?>

<link rel="stylesheet" type="text/css" href="<?php echo ULPB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo ULPB_PLUGIN_URL."/public/templates/animate.min.css"; ?>">

<?php     ?>


<?php if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){ echo "</div>";} else{ echo "</body>"; }   ?>

<?php
} else{
  echo "<h3> Please add some content in your page.</h3>";
}

?>