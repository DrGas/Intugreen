<?php if ( ! defined( 'ABSPATH' ) ) exit;

//include 'temp-functions.php';

$loadWpHead = $data['pageOptions']['loadWpHead'];
$loadWpFooter = $data['pageOptions']['loadWpFooter'];
$pageSeoDescription = $data['pageOptions']['pageSeoDescription'];
$pageSeoKeywords = $data['pageOptions']['pageSeoKeywords'];
$pageSeoName = $data['pageOptions']['pageSeoName'];
$pageBgImage = $data['pageOptions']['pageBgImage'];
$pageBgColor = $data['pageOptions']['pageBgColor'];
$pagePadding = $data['pageOptions']['pagePadding'];
$pagePaddingTop = $pagePadding['pagePaddingTop'];
$pagePaddingBottom = $pagePadding['pagePaddingBottom'];
$pagePaddingLeft = $pagePadding['pagePaddingLeft'];
$pagePaddingRight = $pagePadding['pagePaddingRight'];

if (isset($data['pageOptions']['pageFavIconUrl'])) {
  $pageFavIconUrl = $data['pageOptions']['pageFavIconUrl'];
}
if (isset($data['pageOptions']['pageLogoUrl'])) {
  $pageLogoUrl = $data['pageOptions']['pageLogoUrl'];
}

if (isset($data['pageOptions']['POcustomCSS'])) {
  $POcustomCSS = $data['pageOptions']['POcustomCSS'];
}

$POPBDefaultsEnable = '';
if (isset($data['pageOptions']['POPBDefaults'])) {
  $POPBDefaults = $data['pageOptions']['POPBDefaults'];
  $POPBDefaultsEnable = $POPBDefaults['POPBDefaultsEnable'];
  $POPB_typefaces = $POPBDefaults['POPB_typefaces'];
  $POPB_typeSizes = $POPBDefaults['POPB_typeSizes'];
}


if (isset($data['pageOptions']['pagePaddingTablet'])) {
  
  $pagePaddingTablet = $data['pageOptions']['pagePaddingTablet'];
  $pagePaddingMobile = $data['pageOptions']['pagePaddingMobile'];


          $POPBPagePaddingResponsiveTablet = "\n".

            '.ulpb_PageBody_'.$current_pageID.' body { padding-top:'.$pagePaddingTablet['pagePaddingTopTablet'].'%; padding-bottom:'.$pagePaddingTablet['pagePaddingBottomTablet'].'%; padding-left:'.$pagePaddingTablet['pagePaddingLeftTablet'].'%; padding-right:'.$pagePaddingTablet['pagePaddingRightTablet'].'%;  }  '.
            ' ';

          $POPBPagePaddingResponsiveMobile = "\n".

            '.ulpb_PageBody_'.$current_pageID.' body { padding-top:'.$pagePaddingMobile['pagePaddingTopMobile'].'%; padding-bottom:'.$pagePaddingMobile['pagePaddingBottomMobile'].'%; padding-left:'.$pagePaddingMobile['pagePaddingLeftMobile'].'%; padding-right:'.$pagePaddingMobile['pagePaddingRightMobile'].'%;  }  '.
            ' ';

            array_push($POPBNallRowStylesResponsiveTablet, $POPBPagePaddingResponsiveTablet);
            array_push($POPBNallRowStylesResponsiveMobile, $POPBPagePaddingResponsiveMobile);
}


if (isset($data['pageOptions']['POcustomJS'])) {
  $POcustomJS = $data['pageOptions']['POcustomJS'];
}



$pbLocale = get_locale();

?>
<?php if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){} else{ echo "<head>"; }   ?>
  
<?php if ($isShortCodeTemplate == true) {
} else{ ?>

  <meta charset="UTF-8">
  <meta property="og:locale" content="<?php echo $pbLocale; ?>" />
  <meta property="og:type" content="object" />
  <meta property="og:title" content="<?php echo the_title(); ?>" />
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:url" content="<?php $url = site_url(); echo $url; ?>">
  <meta name="description" content="<?php echo $pageSeoDescription; ?>">
  <meta name="keywords" content="<?php echo $pageSeoKeywords; ?>">

  <title><?php echo the_title(); ?></title>
  <?php 
  if (isset($pageFavIconUrl)) {
    echo "<link rel='shortcut icon' href='$pageFavIconUrl' />";
  }

}
?>

<?php  if ($loadWpHead === 'true') { wp_head(); }  ?>


<?php
if (isset($isShortCodeTemplate)) {
  if ($isShortCodeTemplate == true) {
  }else{
    echo '<script type="text/javascript" src="'.ULPB_PLUGIN_URL.'/js/jquery.min.js"></script>';
  }
}
?>


<script src="<?php echo ULPB_PLUGIN_URL.'/js/jquery-ui.js'; ?>"></script>


<?php include 'style.css'; ?>


  <style type="text/css">
  <?php if (!empty($pageBgImage)) {
    if ($isShortCodeTemplate !== true) {
      ?>
      .ulpb_PageBody_<?php echo $current_pageID ?> {
      background:url("<?php echo $pageBgImage; ?>")no-repeat center center; background-size:cover;
      }
      <?php
    }
      
    } ?>
  <?php if (!empty($pageBgColor)){
    if (isset($isShortCodeTemplate)) {
      if ($isShortCodeTemplate !== true) {
        ?>
        .ulpb_PageBody_<?php echo $current_pageID ?> {
          background-color: <?php echo $pageBgColor; ?> ;
        }
        <?php
      }
    }
    


    
    }
    if (isset($isShortCodeTemplate)) {
      if ($isShortCodeTemplate !== true) {
        ?>
        .ulpb_PageBody_<?php echo $current_pageID ?>{
          padding: <?php echo "$pagePaddingTop"."% $pagePaddingRight"."% $pagePaddingBottom"."% $pagePaddingLeft"."%"; ?>;
        }
        <?php  
        if ($pagePaddingRight != '0' && $pagePaddingLeft != '0') {
          if ( $pagePaddingRight != '' && $pagePaddingLeft != '') {
          ?>
            @media screen and (max-width: 1310px) {
              .ulpb_PageBody_<?php echo $current_pageID ?> {padding-left: 3% !important; padding-right: 3% !important; }
            }
        <?php
          }
        }
      }
    }
      
    ?>
  
  </style>
<script type="text/javascript">
  (function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
  })(jQuery);
</script>

<!-- Custom head styling  -->
<style type="text/css">
  

  <?php 
    if (isset($POcustomCSS)) {
      echo "$POcustomCSS";
    }
  ?>
</style>

<!-- Custom head script  -->
<script>
  <?php 
    if (isset($POcustomJS)) {
      echo "$POcustomJS";
    }
  ?>
</script>


<!-- Tracking Scripts -->
<?php
$ulpb_global_tracking_scripts = get_option( 'ulpb_global_tracking_scripts' );
echo $ulpb_global_tracking_scripts;
?>

<?php


        if ($POPBDefaultsEnable == 'true') {

          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceHOne']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceHTwo']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceParagraph']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceButton']);
          array_push($thisColFontsToLoad, $POPB_typefaces['typefaceAnchorLink']);

          $POPBGlobalStylesTag = "\n".

            '.ulpb_PageBody_'.$current_pageID.' h1 { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceHOne']).'; font-size:'.$POPB_typeSizes['typeSizeHOne'].'px; }  '.

            '.ulpb_PageBody_'.$current_pageID.' h2 { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceHTwo']).'; font-size:'.$POPB_typeSizes['typeSizeHTwo'].'px; }  '.

            '.ulpb_PageBody_'.$current_pageID.' p { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceParagraph']).'; font-size:'.$POPB_typeSizes['typeSizeParagraph'].'px; }  '.

            '.ulpb_PageBody_'.$current_pageID.' button { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceButton']).'; font-size:'.$POPB_typeSizes['typeSizeButton'].'px; }  '.
            
            '.ulpb_PageBody_'.$current_pageID.' a { font-family:'.str_replace('+',' ',$POPB_typefaces['typefaceAnchorLink']).'; font-size:'.$POPB_typeSizes['typeSizeAnchorLink'].'px; } ';

          echo '<style type="text/css" id="POPBGlobalStylesTag">'.$POPBGlobalStylesTag.'</style>'."\n";


          if (isset($POPB_typeSizes['typeSizeHOneTablet'])) {

            $POPBGlobalStylesResponsiveTablet = "\n".

              '.ulpb_PageBody_'.$current_pageID.' h1 { font-size:'.$POPB_typeSizes['typeSizeHOneTablet'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' h2 { font-size:'.$POPB_typeSizes['typeSizeHTwoTablet'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' p { font-size:'.$POPB_typeSizes['typeSizeParagraphTablet'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' button { font-size:'.$POPB_typeSizes['typeSizeButtonTablet'].'px !important; }  '.
              
              '.ulpb_PageBody_'.$current_pageID.' a {  font-size:'.$POPB_typeSizes['typeSizeAnchorLinkTablet'].'px !important; } '.
              ' ';

            $POPBGlobalStylesResponsiveMobile = "\n".

              '.ulpb_PageBody_'.$current_pageID.' h1 { font-size:'.$POPB_typeSizes['typeSizeHOneMobile'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' h2 { font-size:'.$POPB_typeSizes['typeSizeHTwoMobile'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' p { font-size:'.$POPB_typeSizes['typeSizeParagraphMobile'].'px !important; }  '.

              '.ulpb_PageBody_'.$current_pageID.' button { font-size:'.$POPB_typeSizes['typeSizeButtonMobile'].'px !important; }  '.
              
              '.ulpb_PageBody_'.$current_pageID.' a {  font-size:'.$POPB_typeSizes['typeSizeAnchorLinkMobile'].'px !important; } '.
              ' ';

              array_push($POPBNallRowStylesResponsiveTablet, $POPBGlobalStylesResponsiveTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $POPBGlobalStylesResponsiveMobile);

          }

        }



?>



<?php if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){} else{ echo "</head>"; }   ?>
