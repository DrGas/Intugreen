<?php if ( ! defined( 'ABSPATH' ) ) exit;
  $colWidgets = $currentColumn['colWidgets'];
  
      for ($j = 0; $j < count($colWidgets); $j++) {  // widgets loop
          $thisWidget = $colWidgets[$j];
          $this_column_type = $thisWidget['widgetType'];
          $widgetStyling = $thisWidget['widgetStyling'];

          $widgetMtop = $thisWidget['widgetMtop'];
          $widgetMleft = $thisWidget['widgetMleft'];
          $widgetMbottom = $thisWidget['widgetMbottom'];
          $widgetMright = $thisWidget['widgetMright'];
          $widgetBgColor = $thisWidget['widgetBgColor'];

          if (isset($thisWidget['widgetPtop'])) {
            $widgetPtop = $thisWidget['widgetPtop'];
            $widgetPleft = $thisWidget['widgetPleft'];
            $widgetPbottom = $thisWidget['widgetPbottom'];
            $widgetPright = $thisWidget['widgetPright'];

            $widgetPaddings = "padding:".$widgetPtop."% ".$widgetPright."% ".$widgetPbottom."% ".$widgetPleft."%;";
          } else{
            $widgetPaddings = "";
          }

          $widgHideOnDesktop = ""; $widgHideOnTablet = ""; $widgHideOnMobile = "";
          if (isset($thisWidget['widgHideOnDesktop']) ) {
            if ($thisWidget['widgHideOnDesktop'] == 'hide') {
              $widgHideOnDesktop ="display:none";
            }
            if ($thisWidget['widgHideOnTablet'] == 'hide') {
              $widgHideOnTablet ="display:none !important;";
            }
            if ($thisWidget['widgHideOnMobile'] == 'hide') {
              $widgHideOnMobile ="display:none !important;";
            }
          }


          if (isset($thisWidget['widgetPaddingTablet'])) {
            $widgetMarginTablet = $thisWidget['widgetMarginTablet'];
            $widgetMarginMobile = $thisWidget['widgetMarginMobile'];
            $widgetPaddingTablet = $thisWidget['widgetPaddingTablet'];
            $widgetPaddingMobile = $thisWidget['widgetPaddingMobile'];

            $displayWidgetInlineTablet = '';
            $displayWidgetInlineMobile = '';

            if (isset($thisWidget['widgetIsInlineTablet'])) {

              if ($thisWidget['widgetIsInlineTablet'] == 'true') {
                $displayWidgetInlineTablet = "display: inline-block !important;";
              }elseif ($thisWidget['widgetIsInlineTablet'] == 'false') {
                $displayWidgetInlineTablet = "display: block !important;";
              }
              if ($thisWidget['widgetIsInlineMobile'] == 'true') {
                $displayWidgetInlineMobile = "display: inline-block !important;";
              }elseif ($thisWidget['widgetIsInlineMobile'] == 'false') {
                $displayWidgetInlineMobile = "display: block !important;";
              }
              
            }

            $thisWidgetResponsiveWidgetStylesTablet = "
              #widget-$j-$Columni-".$row["rowID"]." {
               margin-top: ".$widgetMarginTablet['rMTT']."% !important;
               margin-bottom: ".$widgetMarginTablet['rMBT']."% !important;
               margin-left: ".$widgetMarginTablet['rMLT']."% !important;
               margin-right: ".$widgetMarginTablet['rMRT']."% !important;

               padding-top: ".$widgetPaddingTablet['rPTT']."% !important;
               padding-bottom: ".$widgetPaddingTablet['rPBT']."% !important;
               padding-left: ".$widgetPaddingTablet['rPLT']."% !important;
               padding-right: ".$widgetPaddingTablet['rPRT']."% !important;
               ".$displayWidgetInlineTablet."
              }
            ";

            $thisWidgetResponsiveWidgetStylesMobile = "
             #widget-$j-$Columni-".$row["rowID"]." {
               margin-top: ".$widgetMarginMobile['rMTM']."% !important;
               margin-bottom: ".$widgetMarginMobile['rMBM']."% !important;
               margin-left: ".$widgetMarginMobile['rMLM']."% !important;
               margin-right: ".$widgetMarginMobile['rMRM']."% !important;

               padding-top: ".$widgetPaddingMobile['rPTM']."% !important;
               padding-bottom: ".$widgetPaddingMobile['rPBM']."% !important;
               padding-left: ".$widgetPaddingMobile['rPLM']."% !important;
               padding-right: ".$widgetPaddingMobile['rPRM']."% !important;
               ".$displayWidgetInlineMobile."
              }
            ";

            array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
            array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);
          }
          

          if (isset($thisWidget['widgetAnimation'])) {

              $widgetAnimation = ' animated '.$thisWidget['widgetAnimation'];

          }else{
            $widgetAnimation = '';
          }

          $widgetIsInline = 'block';
          if (isset($thisWidget['widgetIsInline'])) {
              if ($thisWidget['widgetIsInline'] == 'true') {
                $widgetIsInline = 'inline-block';
              }
          }

          $widgetCustomClass = '';
          if (isset($thisWidget['widgetCustomClass'])) {
              $widgetCustomClass = $thisWidget['widgetCustomClass'];
          }


          if (isset($thisWidget['widgetBorderWidth'])) {
            $widgetBorderRadius = '';
            if (isset($thisWidget['widgetBorderRadius'])) {
              $widgetBorderRadius = 'border:'.$thisWidget['widgetBorderRadius'].';';
            }
            
            $this_widget_border_shadow = 'border: '.$thisWidget['widgetBorderWidth'].'px  '.$thisWidget['widgetBorderStyle'].' '.$thisWidget['widgetBorderColor'].'; box-shadow: '.$thisWidget['widgetBoxShadowH'].'px  '.$thisWidget['widgetBoxShadowV'].'px  '.$thisWidget['widgetBoxShadowBlur'].'px '.$thisWidget['widgetBoxShadowColor'].' ; '.$widgetBorderRadius.' ';
          }else{
            $this_widget_border_shadow = '';
          }
          

          $imgAlignment  = '';
          


          

          //Menu Widget
          $menuSpecificStyles = " ";
          $menuSpecificClass = " ";
          if ($this_column_type == 'wigt-menu') {
            $this_widget_menu_content = $thisWidget['widgetMenu'];
            $menuName = $this_widget_menu_content['menuName'];
            $menuStyle = $this_widget_menu_content['menuStyle'];
            $menuColor = $this_widget_menu_content['menuColor'];

              if (isset($this_widget_menu_content['pbMenuFontFamily'])) {
                $pbMenuFontFamily = str_replace('+', ' ', $this_widget_menu_content['pbMenuFontFamily']);
                array_push($thisColFontsToLoad, $this_widget_menu_content['pbMenuFontFamily']);
              }else{
                $pbMenuFontFamily = '';
              }

              if (isset($this_widget_menu_content['pbMenuFontHoverColor'])) {
                $pbMenuFontHoverColor = $this_widget_menu_content['pbMenuFontHoverColor'];
              }else{
                $pbMenuFontHoverColor = '';
              }
              if (isset($this_widget_menu_content['pbMenuFontHoverBgColor'])) {
                $pbMenuFontHoverBgColor = $this_widget_menu_content['pbMenuFontHoverBgColor'];
              }else{
                $pbMenuFontHoverBgColor = '';
              }
              if (isset($this_widget_menu_content['pbMenuFontSize'])) {
                $pbMenuFontSize = $this_widget_menu_content['pbMenuFontSize'];
              }else{
                $pbMenuFontSize = '16';
              }


            
            if ($menuStyle == 'menu-style-1' || $menuStyle == 'menu-style-4') {
              $menuSpecificStyles = "display: flex; justify-content: center; align-items: center;";
            } elseif ($menuStyle == 'menu-style-2') {
              $menuSpecificClass = "widget-$j-menuFixed";
            }

            include(ULPB_PLUGIN_PATH.'public/templates/menus/'.$menuStyle.'.php');
            
          }


          switch ($this_column_type) {
            case 'wigt-WYSIWYG':
              //WYSIWYG Widget
              $this_widget_editor = $thisWidget['widgetWYSIWYG'];
              $thisWidgetContentEditor =  $this_widget_editor['widgetContent'];

              $widgetContent = do_shortcode( $thisWidgetContentEditor );
              $contentAlignment = ' ';
              break;
            case 'wigt-img':
              // IMG Widget
              $this_widget_img_content = $thisWidget['widgetImg'];
              $imgUrl  = $this_widget_img_content['imgUrl'];
              $imgSize = $this_widget_img_content['imgSize'];
              $imgSize = $this_widget_img_content['imgSize'];
              $imgAlignment = $this_widget_img_content['imgAlignment'];
              $uniqueImgId = 'pb_img'.(rand(10,99)*120+200) ;
              $imgCustomSize = '';
              if ($imgSize == 'custom') {
                  if ($this_widget_img_content['imgSizeCustomWidth'] != "undefined") {
                    $imgSizeCustomWidth = $this_widget_img_content['imgSizeCustomWidth'];
                  }
                  if ($this_widget_img_content['imgSizeCustomHeight'] != "undefined") {
                    $imgSizeCustomHeight = $this_widget_img_content['imgSizeCustomHeight'];
                  }

                  $imgCustomSize = 'width:'.$imgSizeCustomWidth.'px; height:'.$imgSizeCustomHeight.'px;';
              }

              $imgLinkTag = '';
              $imgLinkTagClose = '';
              if (isset($this_widget_img_content['imgLink']) && !empty($this_widget_img_content['imgLink'])) {
                $imgLink = $this_widget_img_content['imgLink'];
                $imgLinkTag = '<a href="'.$imgLink.'" target="_blank">';
                $imgLinkTagClose = '</a>';
              }


              $this_column_img = "<div id='".$uniqueImgId."' style='text-align:".$imgAlignment.";'><img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize."'> </div>";

              if (isset($this_widget_img_content['imgLightBox']) ) {
                $imgLightBox = $this_widget_img_content['imgLightBox'];
                if ($imgLightBox == 'true') {
                  
                  $this_column_img = "<div class='pb_img_thumbnail'  id='".$uniqueImgId."' style='text-align: $imgAlignment ;'> $imgLinkTag <img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize." '> $imgLinkTagClose </div>                          <div class='pb_single_img_lightbox' id='pb_lightbox".$uniqueImgId."'> <img src='".$imgUrl."'> </div> <br> ";
                } else{
                  $this_column_img = "<div id='".$uniqueImgId."' style='text-align:".$imgAlignment.";'> $imgLinkTag <img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize."'> $imgLinkTagClose </div>";

                }
              }

              if ($imgSize == 'custom') {
                if (isset($this_widget_img_content['imgSizeCustomWidthTablet'])) {
                  $thisImgSizeResponsiveWidgetStylesTablet = "
                    #$uniqueImgId img{
                     width: ".$this_widget_img_content['imgSizeCustomWidthTablet']."px !important;
                     height: ".$this_widget_img_content['imgSizeCustomHeightTablet']."px !important;
                    }
                  ";
                  $thisImgSizeResponsiveWidgetStylesMobile = "
                    #$uniqueImgId img{
                     width: ".$this_widget_img_content['imgSizeCustomWidthMobile']."px !important;
                     height: ".$this_widget_img_content['imgSizeCustomHeightMobile']."px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisImgSizeResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisImgSizeResponsiveWidgetStylesMobile);
                }
              }

              if (isset($this_widget_img_content['imgAlignmentTablet'])) {
                  
                  $thisImgWidgetResponsiveWidgetStylesTablet = "
                    #$uniqueImgId {
                     text-align: ".$this_widget_img_content['imgAlignmentTablet']." !important;
                    }
                  ";
                  $thisImgWidgetResponsiveWidgetStylesMobile = "
                    #$uniqueImgId {
                     text-align: ".$this_widget_img_content['imgAlignmentMobile']." !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisImgWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisImgWidgetResponsiveWidgetStylesMobile);
                }
              $widgetStyling = '';
              $widgetContent = $this_column_img;
              $contentAlignment = $imgAlignment;
            break;
            case 'wigt-menu':
              $widgetContent = $this_widget_menu;
              $contentAlignment = ' ';
            break;
            case 'wigt-btn-gen':

              // BTN Widget
              $randomBtnClass = rand(10,99)*200+100;
              $this_widget_btn_content = $thisWidget['widgetButton'];
              $btnText = $this_widget_btn_content['btnText'];
              $btnLink = $this_widget_btn_content['btnLink'];
              $btnAllignment = $this_widget_btn_content['btnButtonAlignment'];
              $btnTextColor = $this_widget_btn_content['btnTextColor'];
              $btnFontSize = $this_widget_btn_content['btnFontSize'];
              $btnBgColor = $this_widget_btn_content['btnBgColor'];
              $btnHeight = $this_widget_btn_content['btnHeight'];
              $btnHoverBgColor = $this_widget_btn_content['btnHoverBgColor'];
              if (isset($this_widget_btn_content['btnBlankAttr'])) {
                $btnBlankAttr = $this_widget_btn_content['btnBlankAttr'];
              }else{
                $btnBlankAttr = '';
              }
              if (isset($this_widget_btn_content['btnWidth'])) {
                $btnWidth = $this_widget_btn_content['btnWidth'];
              }else{
                $btnWidth = '5';
              }

              if (isset($this_widget_btn_content['btnButtonFontFamily'])) {
                $btnButtonFontFamily = $this_widget_btn_content['btnButtonFontFamily'];
              }else{
                $btnButtonFontFamily = '';
              }

              $btnWidthUnit = '%';
              $btnWidthUnitTablet = '%';
              $btnWidthUnitMobile = '%';
              if (isset($this_widget_btn_content['btnWidthUnit']) ) {
                $btnWidthUnit = $this_widget_btn_content['btnWidthUnit'];
                $btnWidthUnitTablet = $this_widget_btn_content['btnWidthUnitTablet'];
                $btnWidthUnitMobile = $this_widget_btn_content['btnWidthUnitMobile'];
              }


              $btnIcon = ''; $btnIconBefore = ''; $btnIconAfter = ''; $btnIconAnimation = ''; $btnIconHoverAnimationScript = '';
              if (isset($this_widget_btn_content['btnSelectedIcon']) ) {
                $btnSelectedIcon = $this_widget_btn_content['btnSelectedIcon'];
                $btnIconPosition = $this_widget_btn_content['btnIconPosition'];
                $btnIconAnimation = $this_widget_btn_content['btnIconAnimation'];
                $btnIconGap = $this_widget_btn_content['btnIconGap'];

                if ($btnSelectedIcon != '') {
                  if ($btnIconPosition == 'before') {
                    $btnIconGap = 'margin-right:'.$btnIconGap.'px;';
                  }else{
                    $btnIconGap = 'margin-left:'.$btnIconGap.'px;';
                  }
                  $btnIcon = '<i style="'.$btnIconGap.'" class="fa '.$btnSelectedIcon.'  btnIcon-'.$randomBtnClass.'"></i>';

                  if ($btnIconAnimation != '') {
                    $btnIconHoverAnimationScript = " <script>
                      jQuery('.btn-".$randomBtnClass."').mouseenter(function(){
                        jQuery('.btnIcon-".$randomBtnClass."').addClass('animated ".$btnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                           jQuery('.btnIcon-".$randomBtnClass."').removeClass('animated ".$btnIconAnimation."') 
                          });
                     });
                     </script> " ;
                  }
                  
                  $widgetFALoadScripts = true;
                }else{
                  $btnIcon = '';
                }

                if ($btnIconPosition == 'before') {
                  $btnIconBefore = $btnIcon;
                  $btnIconAfter = '';
                }else{
                  $btnIconAfter = $btnIcon;
                  $btnIconBefore = '';
                }
              }

              if (isset($this_widget_btn_content['btnHoverTextColor'])) {
                  $btnHoverTextColor = $this_widget_btn_content['btnHoverTextColor'];
                } else{
                  $btnHoverTextColor = '';
                }

              $POPB_buton_width = "padding: $btnHeight"."px $btnWidth"."px !important;";
              if (isset($this_widget_btn_content['btnWidthPercent'])) {
                $btnWidthPercent = $this_widget_btn_content['btnWidthPercent'];
                if ($btnWidthPercent !== '') {
                  $POPB_buton_width = "padding: $btnHeight"."px 5"."px !important; width:$btnWidthPercent"."$btnWidthUnit;";
                }
              }else{
                $btnWidthPercent = '';
              }

              $btnpreventDefault = '' ; $btnredirectToLink = '';
              if ($btnBlankAttr !== '_blank') {
                $btnpreventDefault = 'e.preventDefault();';
                $btnredirectToLink  = "location.href = '".$btnLink."';";
              }
              
              $btnBorderColor = $this_widget_btn_content['btnBorderColor'];
              $btnBorderWidth = $this_widget_btn_content['btnBorderWidth'];
              $btnBorderRadius = $this_widget_btn_content['btnBorderRadius'];
              
              $POPB_verify_clicked_el = wp_create_nonce( 'POPB_verify_clicked_el' );
              $this_btn_click_detectionAJAX_url = admin_url('admin-ajax.php?action=ulpb_cta_click_conversion_record&pID='.$current_pageID.'&POPB_CTA_Nonce='.$POPB_verify_clicked_el );
              $this_btn_click_detectionScript = "
                <script>
                jQuery( '#btnLink-$randomBtnClass' ).click(function(e) {
                  $btnpreventDefault 
                  var clickedLink = jQuery( this ).attr( 'href' );
                  jQuery.ajax({
                    url: '$this_btn_click_detectionAJAX_url',
                    type: 'POST',
                    data: 'result',
                    error: function(){},
                    success: function(msg){},
                    beforeSend: function() {},
                    complete: function() { 
                        $btnredirectToLink
                    }
                  });
                });
                </script> 
                <style> .btn-$randomBtnClass:hover{ background-color: $btnHoverBgColor !important; background: $btnHoverBgColor !important; color:$btnHoverTextColor !important; transition: all .5s;}  </style>
                ";
              $this_widget_btn = "<br>
                <div class='wdt-$this_column_type parent-btn-$randomBtnClass' style='text-align:$btnAllignment;'><a href='$btnLink' style='text-decoration:none !important;' target='$btnBlankAttr' id='btnLink-$randomBtnClass'> <button class='btn-$randomBtnClass' style='color:$btnTextColor ;font-size:$btnFontSize"."px ; background: $btnBgColor ; background-color: $btnBgColor;  $POPB_buton_width  border: $btnBorderWidth"."px solid $btnBorderColor !important; border-radius: $btnBorderRadius"."px !important; text-align:center; font-family:".str_replace('+', ' ', $btnButtonFontFamily)." ,sans-serif;'>$btnIconBefore $btnText  $btnIconAfter</button></a></div> $this_btn_click_detectionScript   $btnIconHoverAnimationScript
                ";

                if (isset($this_widget_btn_content['btnButtonAlignmentTablet'])) {
                  $thisButtonWidgetResponsiveAlignmentTablet = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_btn_content['btnButtonAlignmentTablet']." !important;
                  }
                  ";
                  $thisButtonWidgetResponsiveAlignmentMobile = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_btn_content['btnButtonAlignmentMobile']." !important;
                  }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveAlignmentTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveAlignmentMobile);
                }
                if (isset($this_widget_btn_content['btnFontSizeTablet'])) {
                  
                  $thisButtonWidgetResponsiveWidgetStylesTablet = "            

                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_btn_content['btnFontSizeTablet']."px !important;
                     width: ".$this_widget_btn_content['btnWidthPercentTablet']."$btnWidthUnitTablet !important;
                     padding: ".$this_widget_btn_content['btnHeightTablet']."px 5px !important;
                    }
                  ";

                  $thisButtonWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_btn_content['btnFontSizeMobile']."px !important;
                     width: ".$this_widget_btn_content['btnWidthPercentMobile']."$btnWidthUnitMobile !important;
                     padding: ".$this_widget_btn_content['btnHeightMobile']."px 5px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveWidgetStylesMobile);
                }



                array_push($thisColFontsToLoad, $btnButtonFontFamily);
                $widgetContent = $this_widget_btn;
                $contentAlignment = ' ';
            break;
              case 'wigt-pb-form':

                ob_start();
                $this_widget_subscribeForm = $thisWidget['widgetSubscribeForm'];
                $pbFormID = rand(10,99)*120+200;
                $formLayout = $this_widget_subscribeForm['formLayout'];
                $showNameField = $this_widget_subscribeForm['showNameField'];
                $successAction = $this_widget_subscribeForm['successAction'];
                $successURL = $this_widget_subscribeForm['successURL'];
                $successMessage = $this_widget_subscribeForm['successMessage'];
                $formBtnText = $this_widget_subscribeForm['formBtnText'];
                $formBtnHeight = $this_widget_subscribeForm['formBtnHeight'];
                $formBtnBgColor = $this_widget_subscribeForm['formBtnBgColor'];
                $formBtnColor = $this_widget_subscribeForm['formBtnColor'];
                $formBtnHoverBgColor = $this_widget_subscribeForm['formBtnHoverBgColor'];
                $formBtnFontSize = $this_widget_subscribeForm['formBtnFontSize'];
                $formBtnBorderWidth = $this_widget_subscribeForm['formBtnBorderWidth'];
                $formBtnBorderColor = $this_widget_subscribeForm['formBtnBorderColor'];
                $formBtnBorderRadius = $this_widget_subscribeForm['formBtnBorderRadius'];

                if (isset($this_widget_subscribeForm['formDataSaveType'])) {
                  $formDataSaveType = $this_widget_subscribeForm['formDataSaveType'];
                } else{
                  $formDataSaveType = '';
                }
                if (isset($this_widget_subscribeForm['formBtnFontFamily'])) {
                  $formBtnFontFamily = $this_widget_subscribeForm['formBtnFontFamily'];
                  $formBtnFontFamily = str_replace('+', ' ', $this_widget_subscribeForm['formBtnFontFamily']);

                  array_push($thisColFontsToLoad, $this_widget_subscribeForm['formBtnFontFamily']);
                } else{
                  $formBtnFontFamily = '';
                }

                if (isset($this_widget_subscribeForm['formSuccessMessageColor'])) {
                  $formSuccessMessageColor = $this_widget_subscribeForm['formSuccessMessageColor'];
                } else{
                  $formSuccessMessageColor = '#333';
                }
                if (isset($this_widget_subscribeForm['formBtnHoverTextColor'])) {
                  $formBtnHoverTextColor = $this_widget_subscribeForm['formBtnHoverTextColor'];
                } else{
                  $formBtnHoverTextColor = '';
                }

                if (isset($this_widget_subscribeForm['formBtnHeightTablet'])) {
                  $formBtnHeightTablet = $this_widget_subscribeForm['formBtnHeightTablet'];
                  $formBtnHeightMobile = $this_widget_subscribeForm['formBtnHeightMobile'];

                  $formBtnFontSizeTablet = $this_widget_subscribeForm['formBtnFontSizeTablet'];
                  $formBtnFontSizeMobile = $this_widget_subscribeForm['formBtnFontSizeMobile'];
                }else{
                  $formBtnHeightTablet = '';
                  $formBtnHeightMobile = '';
                  $formBtnFontSizeTablet = '';
                  $formBtnFontSizeMobile = '';
                }

                $randomFormBtnClass = rand(10,99)*120+200;
                $formbtnIcon = ''; $formbtnIconBefore = ''; $formbtnIconAfter = ''; $formbtnIconAnimation = ''; $formbtnIconHoverAnimationScript = '';
                if (isset($this_widget_subscribeForm['formbtnSelectedIcon']) ) {
                  $formbtnSelectedIcon = $this_widget_subscribeForm['formbtnSelectedIcon'];
                  $formbtnIconPosition = $this_widget_subscribeForm['formbtnIconPosition'];
                  $formbtnIconAnimation = $this_widget_subscribeForm['formbtnIconAnimation'];
                  $formbtnIconGap = $this_widget_subscribeForm['formbtnIconGap'];

                  if ($formbtnSelectedIcon != '') {
                    if ($formbtnIconPosition == 'before') {
                      $formbtnIconGap = 'margin-right:'.$formbtnIconGap.'px;';
                    }else{
                      $formbtnIconGap = 'margin-left:'.$formbtnIconGap.'px;';
                    }
                    $formbtnIcon = '<i style="'.$formbtnIconGap.'" class="fa '.$formbtnSelectedIcon.'  btnIcon-'.$randomFormBtnClass.'"></i>';

                    if ($formbtnIconAnimation != '') {
                      $formbtnIconHoverAnimationScript = " <script>
                        jQuery('.form-btn-".$randomFormBtnClass."').mouseenter(function(){
                          jQuery('.btnIcon-".$randomFormBtnClass."').addClass('animated ".$formbtnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                             jQuery('.btnIcon-".$randomFormBtnClass."').removeClass('animated ".$formbtnIconAnimation."') 
                            });
                       });
                       </script> " ;
                    }
                    
                    $widgetFALoadScripts = true;
                  }else{
                    $formbtnIcon = '';
                  }

                  if ($formbtnIconPosition == 'before') {
                    $formbtnIconBefore = $formbtnIcon;
                    $formbtnIconAfter = '';
                  }else{
                    $formbtnIconAfter = $formbtnIcon;
                    $formbtnIconBefore = '';
                  }
                }

                 $formLayoutAction = " ";
                $formFieldWidth = '60%';
                $formButtonWidth = '30%';
                $showNameFieldType = 'hidden';
                $fieldsMarginTop = ' margin-top : 0;';
                $fieldsMarginRight = '';
                $showNameFieldValue = ' ';
                $showFieldsInline = 'inline-block';
                if ($showNameField  == 'block') { $formFieldWidth = '33%';  $showNameFieldType = 'text';  $showNameFieldValue = ''; }
                if ($showNameField  == 'block' && $formLayout  == 'inline' ){
                  $showNameField = 'inline-block';
                  $showFieldsInline = 'inline-block';
                  $formButtonWidth = '25%';
                  $fieldsMarginTop = ' margin-top : 0;';
                  $fieldsMarginRight = 'margin-right:2.5%;';
                }
                if ($formLayout  == 'stacked') { $showFieldsInline = '';  $formLayoutAction = " "; $formFieldWidth = '99%'; $formButtonWidth = '99%'; $fieldsMarginTop = ' margin-top : 20px;'; }
                
                $inputNameStyles = "display:".$showNameField."; width:".$formFieldWidth."; padding: ".$formBtnHeight."px 5px; height:auto; font-size:".$formBtnFontSize."px; $fieldsMarginTop  $fieldsMarginRight";
                $inputEmailStyles = "display:$showFieldsInline; width:".$formFieldWidth."; padding: ".$formBtnHeight."px 5px; height:auto; font-size:".$formBtnFontSize."px; $fieldsMarginTop  $fieldsMarginRight";
                $inputButtonStyles = "display:$showFieldsInline; width:".$formButtonWidth."; padding: ".$formBtnHeight."px ".'10'."px; font-size:".$formBtnFontSize."px; background:".$formBtnBgColor."; color:".$formBtnColor."; border: ".$formBtnBorderWidth."px solid ".$formBtnBorderColor." !important; border-radius: ".$formBtnBorderRadius."px !important; font-family:$formBtnFontFamily;   $fieldsMarginTop ";

                $this_widget_form_inputID = " <input type='hidden' name='sm_pID' value='".$current_pageID."'> ";
                $this_widget_form_inputName = "<input type='$showNameFieldType' name='sm_name' placeholder='Your name' style='".$inputNameStyles."' value='$showNameFieldValue' >".$formLayoutAction;
                $this_widget_form_inputEmail = "<input type='email' name='sm_email' placeholder='Your e-mail' style='".$inputEmailStyles."' >".$formLayoutAction.$formLayoutAction;
                $this_widget_form_inputSubmit = "<button type='submit' class='form-btn-$randomFormBtnClass'  style='".$inputButtonStyles."'> $formbtnIconBefore ".$formBtnText." $formbtnIconAfter </button>";

                $this_widget_form_ExtraFields = " <input type='hidden' name='postsID' value='$current_pageID'>       
                                <input type='hidden' name='pbFormTargetInfo' value='$rowCount \n  $Columni \n $j '>
                                <input type='text' id='yourMessageHP' name='messageFBHP'> "; 

                $SfactionURL = admin_url('admin-ajax.php?action=ulpb_subscribeForm_data');
                if (empty($formDataSaveType)) {
                  $SfactionURL = admin_url('admin-ajax.php?action=ulpb_subscribeForm_data');
                } elseif ($formDataSaveType == 'database') {
                  $SfactionURL = admin_url('admin-ajax.php?action=ulpb_subscribeForm_data');
                } elseif ($formDataSaveType == 'mailchimp') { 
                  $SfactionURL = admin_url('admin-ajax.php?action=ulpb_subscribeForm_mailchimp_data');
                }


               echo $this_widget_form = "<form id='ulpb_form".$pbFormID."' action='".$SfactionURL."' method='post' class='pluginops-subscribe-form'> ".$this_widget_form_inputID.$this_widget_form_inputName." ".$this_widget_form_inputEmail. '  ' .$this_widget_form_ExtraFields."  ".wp_nonce_field('POPB_send_Subsform_data','POPB_SubsForm_Nonce')." ".$this_widget_form_inputSubmit."<p id='pluginops-response' style='color:".$formSuccessMessageColor.";'></p> </form>
                  <style>.form-btn-$randomFormBtnClass:hover{ background:$ !important; background-color:$formBtnHoverBgColor !important; color:$formBtnHoverTextColor !important; transition:all 0.5s;}  </style>
                ";
                if (!isset($widgetSubscribeFormWidget)) {
                  $widgetSubscribeFormWidget = '';
                }
                if ($widgetSubscribeFormWidget !== true) {
                  echo "<script src='".ULPB_PLUGIN_URL."/js/cookie.js'></script>";
                  $widgetSubscribeFormWidget = true;
                }
                echo $formbtnIconHoverAnimationScript;
                ?>
                <script type="text/javascript">
                  (function($){
                    $(document).ready(function() {

                    $('#ulpb_form'+'<?php echo $pbFormID; ?>').on('submit', function()  {
                      var successAction = "<?php echo $successAction; ?>";
                      var successMessage = "<?php echo $successMessage; ?>";
                      var successURL = "<?php echo $successURL; ?>";
                      $('#pluginops-response').hide();
                      var formActionType = '<?php echo "$formDataSaveType"; ?>';
                      var form = $(this);
                      var result = " ";
                        $.ajax({
                          url: form.attr('action'),
                          method: form.attr('method'),
                          data: form.serialize(),
                          success: function(result){
                            var result = JSON.parse(result);

                            if (formActionType == 'mailchimp') {
                              var mcResult = result['mailchimp'];
                            }if (formActionType == 'getresponse') {
                              var mcResult = result['getResponse'];
                            }else{
                              var mcResult = result['database'];
                            }
                            
                            if(mcResult == 'success'){
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(successMessage);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                              $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                              setTimeout(function(){
                                $('.pluginops-modal').fadeOut();
                              } , 2000);

                              if (successAction == 'redirect') {
                                location.href = successURL;
                              }
                            } else if(mcResult == 'Subscriber Already Exists'){
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(successMessage);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                              $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                              setTimeout(function(){
                                $('.pluginops-modal').fadeOut();
                              } , 2000);
                              if (successAction == 'redirect') {
                                location.href = successURL;
                              }
                            } else{
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(mcResult);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                            }

                            console.log('MailChimp Result  : ' + result['mailchimp']);
                            console.log('Database Result  : ' + result['database']);
                            console.log('GetResponse Result  : ' + result['getResponse']);
                            console.log('Campaign Monitor Result  : ' + result['campaignMonitor']);
                            console.log('Active Campaign Result  : ' + result['activeCampaign']);
                            console.log('Drip Result  : ' + result['drip']);

                          }
                      });
                         
                        // Prevents default submission of the form after clicking on the submit button. 
                        return false;   
                    });

                  });

                    })(jQuery);

                  </script>
                <?php 
                $this_form = ob_get_contents();
                ob_end_clean();

                $thisWidgetResponsiveWidgetStylesTablet = "
                  #ulpb_form$pbFormID input {
                    font-size: ".$formBtnFontSizeTablet."px !important;
                    padding-top: ".$formBtnHeightTablet."px !important;
                    padding-bottom: ".$formBtnHeightTablet."px !important;
                  }
                ";
                $thisWidgetResponsiveWidgetStylesMobile = "
                  #ulpb_form$pbFormID input {
                    font-size: ".$formBtnFontSizeMobile."px !important;
                    padding-top: ".$formBtnHeightMobile."px !important;
                    padding-bottom: ".$formBtnHeightMobile."px !important;
                  }
                ";


                array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
                array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);

                $widgetContent = $this_form;
                $contentAlignment = ' ';
              break;
              case 'wigt-video':
                $this_widget_widgetVideo = $thisWidget['widgetVideo'];
                $videoWebM = $this_widget_widgetVideo['videoWebM'];
                $videoMpfour = $this_widget_widgetVideo['videoMpfour'];
                $videoThumb = $this_widget_widgetVideo['videoThumb'];
                $vidAutoPlay = $this_widget_widgetVideo['vidAutoPlay'];
                $vidLoop = $this_widget_widgetVideo['vidLoop']; 
                $vidControls = $this_widget_widgetVideo['vidControls'];

                $widgetVideoRender = "<video ".$vidLoop." ".$vidAutoPlay." poster='".$videoThumb."' class='pbp_renderVideo video-js vjs-default-skin vjs-big-play-centered vjs-fluid' style='width:100%;' ".$vidControls."='true'  data-setup='{}' ><source src='".$videoWebM."' type='video/webm'><source src='".$videoMpfour."' type='video/mp4'></video>";
                $widgetContent = $widgetVideoRender;

                $widgetVideoLoadScripts = true;
              break;
              case 'wigt-pb-postSlider':
                $this_widget_postsSlider = $thisWidget['widgetPBPostsSlider'];
                
               

                if ($widgetPostsSliderExternalScripts == true) {
                  $widget_postsSliderLibrary == ' ';
                }else{
                  $widget_postsSliderLibrary =  "<script type='text/javascript' src='".ULPB_PLUGIN_URL."/public/scripts/owl-carousel/owl.carousel.js'></script> ";
                }
                $widgetPostsSliderExternalScripts = true;
                include ULPB_PLUGIN_PATH.'/public/templates/widgets/widget-postslider.php';
                $widgetContent = $widget_postsSliderLibrary." \n  ".$PSlider.$psInitJS;

                $widgetOwlLoadScripts = true;
              break;
              case 'wigt-pb-icons':
                $this_widget_widgetIcons = $thisWidget['widgetIcons'];
                $pbSelectedIcon = $this_widget_widgetIcons['pbSelectedIcon'];
                $pbIconSize = $this_widget_widgetIcons['pbIconSize'];
                $pbIconRotation = $this_widget_widgetIcons['pbIconRotation'];
                $pbIconColor = $this_widget_widgetIcons['pbIconColor'];
                

                $widgetIconStyles = 'transform: rotate('.$pbIconRotation. 'deg); color:'.$pbIconColor.'; font-size:'.$pbIconSize.'px; margin:0 auto;' ;
                if (isset($this_widget_widgetIcons['pbIconLink']) && !empty($this_widget_widgetIcons['pbIconLink'])) {
                  $pbIconLink = $this_widget_widgetIcons['pbIconLink'];
                  $pbIconLinkHTMl = '<a href='.$pbIconLink.' style="text-decoration:none; ">';
                  $pbIconLinkHTMlclose = '</a>';
                }else{
                  $pbIconLinkHTMl = '';
                  $pbIconLinkHTMlclose = '';
                }
                
                $widgetIconRender = "<div style='text-align:center;' > $pbIconLinkHTMl <i class='$pbSelectedIcon' style='$widgetIconStyles' ></i> $pbIconLinkHTMlclose </div>";

                $widgetContent = $widgetIconRender;

                $widgetFALoadScripts = true;
              break;
              case 'wigt-pb-counter':
                $this_widget_counter = $thisWidget['widgetCounter'];
                $pbCounterID = rand(10,99)*120+200;
                $counterStartingNumber = $this_widget_counter['counterStartingNumber'];
                $counterEndingNumber = $this_widget_counter['counterEndingNumber'];
                $counterNumberPrefix = $this_widget_counter['counterNumberPrefix'];
                $counterNumberSuffix = $this_widget_counter['counterNumberSuffix'];
                $counterAnimationTime = $this_widget_counter['counterAnimationTime'];
                $counterTitle = $this_widget_counter['counterTitle'];
                $counterTextColor = $this_widget_counter['counterTextColor'];
                $counterTitleColor = $this_widget_counter['counterTitleColor'];
                $counterNumberFontSize = $this_widget_counter['counterNumberFontSize'];
                $counterTitleFontSize = $this_widget_counter['counterTitleFontSize'];

                $counterScript = "
                <script> 
                $(window).scroll(function(event){
                  jQuery('#pb_counter-".$pbCounterID."').each(function (i, el){
                    var el = $(el);
                    if (el.visible(true)) {
                      el.html('$counterEndingNumber');
                      var currElementCounter = el; 
                      jQuery({ Counter: ".$counterStartingNumber." }).animate({ 
                        Counter: currElementCounter.text() 
                      },
                      { 
                        duration: ".$counterAnimationTime.", easing: 'swing',
                        step: function () { currElementCounter.text(Math.ceil(this.Counter)); 
                      }
                      });
                    }
                  }); 
                });
                </script>";

                $counterHTMLStyles = 'color:'.$counterTextColor.'; font-size:'.$counterNumberFontSize.'px; line-height:1.5; text-align:center;';

                $counterTitleStyles = 'color:'.$counterTitleColor.'; font-size:'.$counterTitleFontSize.'px; line-height:1.5; text-align:center;';

                $counterTitleHTML = '<div style="'.$counterTitleStyles.'" >'.$counterTitle.'</div>';

                $counterHTML = '<div style="'.$counterHTMLStyles.'" >'.$counterNumberPrefix.'<span id="pb_counter-'.$pbCounterID.'">'.$counterEndingNumber.'</span>'.$counterNumberSuffix.' </div> '.$counterTitleHTML;

                $widgetContent = $counterHTML . $counterScript;
                $widgetCounterLoadScripts = true;
              break;
            case 'wigt-pb-audio':
                $this_widget_audio = $thisWidget['widgetAudio'];
                $audioOgg = $this_widget_audio['audioOgg'];
                $audioMpThree = $this_widget_audio['audioMpThree'];
                $audioAutoPlay = $this_widget_audio['audioAutoPlay'];
                $audioLoop = $this_widget_audio['audioLoop'];
                $audioControls = $this_widget_audio['audioControls'];

                $audioPlayerHTML = '<br><audio '.$audioLoop.' '.$audioControls.' '.$audioAutoPlay.' style="width:100%;" > 
                  <source src="'.$audioOgg.'" type="audio/ogg">
                  <source src="'.$audioMpThree.'" type="audio/mpeg">
                  Your browser does not support the audio player. 
                </audio> <br>';
              $widgetContent = $audioPlayerHTML;
            break;
            case 'wigt-pb-cards':
              $this_widget_card = $thisWidget['widgetCard'];
              $pbSelectedCardIcon = $this_widget_card['pbSelectedCardIcon'];
              $pbCardIconSize = $this_widget_card['pbCardIconSize'];
              $pbCardIconRotation = $this_widget_card['pbCardIconRotation'];
              $pbCardIconColor = $this_widget_card['pbCardIconColor'];
              $pbCardTitleColor = $this_widget_card['pbCardTitleColor'];
              $pbCardTitleSize = $this_widget_card['pbCardTitleSize'];
              $pbCardDescColor = $this_widget_card['pbCardDescColor'];
              $pbCardDescSize = $this_widget_card['pbCardDescSize'];
              $pbCardTitle = $this_widget_card['pbCardTitle'];
              $pbCardDesc = $this_widget_card['pbCardDesc'];


              if (isset($this_widget_card['pbCardTitleSizeTablet'])) {
                  $thisCardWidgetResponsiveWidgetStylesTablet = "
                    #widget-$j-$Columni-".$row["rowID"]."  div h2 {
                     font-size: ".$this_widget_card['pbCardTitleSizeTablet']."px !important;
                    }
                    #widget-$j-$Columni-".$row["rowID"]."  div p {
                     font-size: ".$this_widget_card['pbCardDescSizeTablet']."px !important;
                    }
                  ";

                  $thisCardWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  div h2 {
                     font-size: ".$this_widget_card['pbCardTitleSizeMobile']."px !important;
                    }
                    #widget-$j-$Columni-".$row["rowID"]."  div p {
                     font-size: ".$this_widget_card['pbCardDescSizeMobile']."px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisCardWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisCardWidgetResponsiveWidgetStylesMobile);
              }


              $cardWidgetIconStyles = 'transform: rotate('.$pbCardIconRotation. 'deg); color:'.$pbCardIconColor.'; font-size:'.$pbCardIconSize.'px;';

              $cardWidgetIcon = '<i class="'.$pbSelectedCardIcon.'" style="'.$cardWidgetIconStyles.'" ></i>';

              $cardWidgetHeading = '<h2 style="color:'.$pbCardTitleColor.'; font-size:'.$pbCardTitleSize.'px;">'.$pbCardTitle.'</h2>';

              $cardWidgetDesc = '<p style="color:'.$pbCardDescColor.'; font-size:'.$pbCardDescSize.'px;">'.$pbCardDesc.'</p>';

              $cardWidgetHTML = '<div style="text-align:center;padding:4%;">'.$cardWidgetIcon . $cardWidgetHeading . $cardWidgetDesc.'</div>';

              $widgetContent =  $cardWidgetHTML;

              $widgetFALoadScripts = true;
            break;
            case 'wigt-pb-testimonial':

              $this_widget_testimonial = $thisWidget['widgetTestimonial'];
              $tsAuthorName = $this_widget_testimonial['tsAuthorName'];
              $tsJob = $this_widget_testimonial['tsJob'];
              $tsCompanyName = $this_widget_testimonial['tsCompanyName'];
              $tsTestimonial = $this_widget_testimonial['tsTestimonial'];
              $tsUserImg = $this_widget_testimonial['tsUserImg'];
              $tsImageShape = $this_widget_testimonial['tsImageShape'];
              $tsIconColor = $this_widget_testimonial['tsIconColor'];
              $tsIconSize = $this_widget_testimonial['tsIconSize'];
              $tsTextColor = $this_widget_testimonial['tsTextColor'];
              $tsTextSize = $this_widget_testimonial['tsTextSize'];
              $tsTestimonialColor = $this_widget_testimonial['tsTestimonialColor'];
              $tsTestimonialSize = $this_widget_testimonial['tsTestimonialSize'];
              $tsTextAlignment = $this_widget_testimonial['tsTextAlignment'];

              $iconHTML = '<i class="fa fa-quote-right" style="border:2px solid '.$tsIconColor.'; padding:15px; font-size:'.$tsIconSize.'px; color:'.$tsIconColor.'; text-align:center; margin:5px 0 5px 0; border-radius:'.$tsImageShape.'; "></i>';

              if ($tsUserImg !== '') {
                $imgHTMLCenter = '<img src='.$tsUserImg.' style="width:25%; border-radius:'.$tsImageShape.';"    />';
                $imgHTMLLeft = '<img src='.$tsUserImg.' style="width:75%; border-radius:'.$tsImageShape.';"    />';
                $imgArea = 'visible';
              } else{
                $imgHTMLCenter = ''; $imgHTMLLeft = '';
                $imgArea = 'none';
              }

              $authorName = '<p style="color:'.$tsTextColor.'; font-size:'.$tsTextSize.'px;"> '.$tsAuthorName.' </p>';

              $authorinfo =  '<p style="color:'.$tsTextColor.'; font-size: calc(3 - '.$tsTextSize.'px);" >'.$tsJob.', '.$tsCompanyName.'</p>';

              $testimonialText = '<p style="color:'.$tsTestimonialColor.'; font-size:'.$tsTestimonialSize.'px ;" >'.$tsTestimonial.'</p>';


              $testimonialCardHTMLCenter = '<div style="text-align:center; padding:3% 1% 3% 1%;"> '.$iconHTML.' <br> <br>   '.$imgHTMLCenter.' '.$testimonialText.' <b>'.$authorName.'</b> '.$authorinfo.'</div>';

              $testimonialCardHTMLLeft = '<div style="padding:3% 1% 3% 1%; text-align:center;"> <div style="width:16%; display:inline-block; text-align:center; display:'.$imgArea.'; ">'.$imgHTMLLeft.' </div>   <div style="width:80%; display:inline-block; text-align:left;">'.$testimonialText.' '.$authorName.' '.$authorinfo.'</div> </div>';

              $testimonialCardHTMLRight = '<div style="padding:3% 1% 3% 1%; text-align:center;"> <div style="width:80%; display:inline-block; text-align:left; margin-left:2%; ">'.$testimonialText.' '.$authorName.' '.$authorinfo.' </div> <div style="width:16%; display:inline-block; text-align:center; display:'.$imgArea.'; ">'.$imgHTMLLeft.' </div>   </div>';

              if ($tsTextAlignment == 'center') {
                $testimonialCardHTML = $testimonialCardHTMLCenter;
              } else if ($tsTextAlignment == 'left'){
                $testimonialCardHTML = $testimonialCardHTMLLeft;
              } else if ($tsTextAlignment == 'right'){
                $testimonialCardHTML = $testimonialCardHTMLRight;
              } else{
                $testimonialCardHTML = $testimonialCardHTMLCenter;
              }

              $widgetContent = $testimonialCardHTML;
              $widgetFALoadScripts = true;
            break;
            case 'wigt-pb-shortcode':
              $this_widget_shortcode = $thisWidget['widgetShortCode'];
              $shortCodeInput = $this_widget_shortcode['shortCodeInput'];
              $widgetContent = do_shortcode( $shortCodeInput );
              $contentAlignment = ' ';
              break;
            case 'wigt-pb-countdown':
              
              $this_widget_countdown = $thisWidget['widgetCowntdown'];
              $pbCountDownDate = $this_widget_countdown['pbCountDownDate'];
              $pbCountDownLabel = $this_widget_countdown['pbCountDownLabel'];
              $pbCountDownColor = $this_widget_countdown['pbCountDownColor'];
              $pbCountDownLabelColor = $this_widget_countdown['pbCountDownLabelColor'];
              $pbCountDownTextSize = $this_widget_countdown['pbCountDownTextSize'];
              $pbCountDownLabelTextSize = $this_widget_countdown['pbCountDownLabelTextSize'];

              if (isset($this_widget_countdown['pbCountDownTextSizeTablet'])) {
                $pbCountDownTextSizeTablet =  $this_widget_countdown['pbCountDownTextSizeTablet'];
                $pbCountDownTextSizeMobile =  $this_widget_countdown['pbCountDownTextSizeMobile'];
                
                $pbCountDownLabelTextSizeTablet =  $this_widget_countdown['pbCountDownLabelTextSizeTablet'];
                $pbCountDownLabelTextSizeMobile =  $this_widget_countdown['pbCountDownLabelTextSizeMobile'];

                $pbCountDownLabelFontFamily =  $this_widget_countdown['pbCountDownLabelFontFamily'];
                $pbCountDownNumberFontFamily =  $this_widget_countdown['pbCountDownNumberFontFamily'];

                array_push($thisColFontsToLoad, $pbCountDownLabelFontFamily);
                array_push($thisColFontsToLoad, $pbCountDownNumberFontFamily);

              }else{
                $pbCountDownTextSizeTablet =  '';
                $pbCountDownTextSizeMobile =  '';
                
                $pbCountDownLabelTextSizeTablet =  '';
                $pbCountDownLabelTextSizeMobile =  '';

                $pbCountDownLabelFontFamily = '';
                $pbCountDownNumberFontFamily =  '';
              }

              $pbCountDownType = 'fixed' ; $pbCountDownNumberBgColor = 'transparent'; $pbCountDownHGap = 0; $pbCountDownHGapTablet = 0; $pbCountDownHGapMobile = 0; $pbCountDownVGap = ''; $pbCountDownNumberBorderRadius = '';
              $pbCountDownDateDays = ''; $pbCountDownDateHours = ''; $pbCountDownDateMins = ''; $pbCountDownDateSecs = '';
              if ( isset($this_widget_countdown['pbCountDownType']) ) {
                $pbCountDownType = $this_widget_countdown['pbCountDownType'];
                $pbCountDownNumberBgColor = $this_widget_countdown['pbCountDownNumberBgColor'];
                $pbCountDownHGap = $this_widget_countdown['pbCountDownHGap'];
                $pbCountDownHGapTablet = $this_widget_countdown['pbCountDownHGapTablet'];
                $pbCountDownHGapMobile = $this_widget_countdown['pbCountDownHGapMobile'];
                $pbCountDownVGap = ( (int)$this_widget_countdown['pbCountDownVGap'] / 2);
                $pbCountDownVGapTablet = ( (int)$this_widget_countdown['pbCountDownVGapTablet'] / 2);
                $pbCountDownVGapMobile = ( (int)$this_widget_countdown['pbCountDownVGapMobile'] / 2);

                if ($this_widget_countdown['pbCountDownVGap'] == '') {
                  $pbCountDownVGap = ( 45 / 2);
                }

                $pbCountDownNumberBorderRadius = $this_widget_countdown['pbCountDownNumberBorderRadius'];

                if ($pbCountDownType == 'evergreen') {
                  $pbCountDownDateDays = $this_widget_countdown['pbCountDownDateDays'];
                  $pbCountDownDateHours = $this_widget_countdown['pbCountDownDateHours'];
                  $pbCountDownDateMins = $this_widget_countdown['pbCountDownDateMins'];
                  $pbCountDownDateSecs = $this_widget_countdown['pbCountDownDateSecs'];

                  

                }
              }

              // set 0
                    if ($pbCountDownDateDays == '') {
                      $pbCountDownDateDays = 0;
                    }
                    if ($pbCountDownDateHours == '') {
                      $pbCountDownDateHours = 0;
                    }
                    if ($pbCountDownDateMins == '') {
                      $pbCountDownDateMins = 0;
                    }
                    if ($pbCountDownDateSecs == '') {
                      $pbCountDownDateSecs = 0;
                    }

              $pbCountDownHGapWidth = (25- (int)$pbCountDownHGap );
              $pbCountDownHGapWidthTablet = (25- (int)$pbCountDownHGapTablet );
              $pbCountDownHGapWidthMobile = (25- (int)$pbCountDownHGapMobile );
              
              $pbCountDownTimezone = '';
              if ( isset($this_widget_countdown['pbCountDownTimezone']) ) {
                $pbCountDownTimezone = $this_widget_countdown['pbCountDownTimezone'];
              }


              if ($widgetCountDownLoadScripts == true) {
                $pbCountDownLibrary = ' ';
              }else{
                $pbCountDownLibrary = " <script src='".ULPB_PLUGIN_URL."/js/countdown.js'></script>   <script src='".ULPB_PLUGIN_URL."/js/moment.min.js'></script>   <script src='".ULPB_PLUGIN_URL."/js/moment-timezone-with-data-2010-2020.min.js'></script> ";
              }

              $widgetCountDownLoadScripts = true;

              $hideDays = 'inline-block';  $hideHours = 'inline-block'; $hideMinutes = 'inline-block';  $hideSeconds = 'inline-block'; 
              $daysText = 'DAYS'; $hoursText= 'HOURS'; $minutesText = 'MINUTES'; $secondsText = 'SECONDS';
              if (isset($this_widget_countdown['daysText']) ) {
                if ($this_widget_countdown['daysText'] != '') {
                  $daysText = $this_widget_countdown['daysText'];
                }
                if ($this_widget_countdown['hoursText'] != '') {
                  $hoursText = $this_widget_countdown['hoursText'];
                }
                if ($this_widget_countdown['minutesText'] != '') {
                  $minutesText = $this_widget_countdown['minutesText'];
                }
                if ($this_widget_countdown['secondsText'] != '') {
                  $secondsText = $this_widget_countdown['secondsText'];
                }

                if ($this_widget_countdown['hideDays'] != '' && $this_widget_countdown['hideDays'] != null) {
                  $hideDays = $this_widget_countdown['hideDays'];
                }
                if ($this_widget_countdown['hideHours'] != '' && $this_widget_countdown['hideHours'] != null) {
                  $hideHours = $this_widget_countdown['hideHours'];
                }
                if ($this_widget_countdown['hideMinutes'] != '' && $this_widget_countdown['hideMinutes'] != null) {
                  $hideMinutes = $this_widget_countdown['hideMinutes'];
                }
                if ($this_widget_countdown['hideSeconds'] != '' && $this_widget_countdown['hideSeconds'] != null) {
                  $hideSeconds = $this_widget_countdown['hideSeconds'];
                }
              }

              $countDownId = rand(10,99)*120+200;
              $countDownScript = " <script> 

                if('$pbCountDownType' == 'evergreen'){
                  var todaysDate = new Date();
                  todaysDate.setDate(todaysDate.getDate() + parseInt('$pbCountDownDateDays'));
                  var dd = todaysDate.getDate();
                  var mm = todaysDate.getMonth() + 1;
                  var y = todaysDate.getFullYear();

                  var someFormattedDate = y + '/'+ mm + '/'+ dd;
                  pbCountDownDate = someFormattedDate+' '+$pbCountDownDateHours+':'+$pbCountDownDateMins+':'+$pbCountDownDateSecs;
                }else{
                  pbCountDownDate = '$pbCountDownDate';
                }

                if (pbCountDownDate != '') {
                  if ('$pbCountDownTimezone' != '') {
                    pbCountDownDate = moment.tz(pbCountDownDate,'$pbCountDownTimezone' );
                    pbCountDownDate = pbCountDownDate.format('YYYY/MM/DD HH:mm:ss');
                  }
                }

                numberBlockStyles = 'width: $pbCountDownHGapWidth%; margin-right:$pbCountDownHGap%; background:$pbCountDownNumberBgColor; border-radius:".$pbCountDownNumberBorderRadius."px ;';

                jQuery('#pb_countDown-".$countDownId."').countdown(pbCountDownDate, function(event) {
                  hideDays = '$hideDays'; hideHours = '$hideHours';
                  if (hideDays == 'none') { totalHours = event.offset.totalDays * 24 + event.offset.hours; } 
                  else { totalHours =  event.offset.hours; if (totalHours < 10) { totalHours = '0'+totalHours; } }
                  if (hideHours == 'none') { totalMins = totalHours * 60 + event.offset.minutes; } 
                  else { totalMins =  event.offset.minutes;  if (totalMins < 10) { totalMins = '0'+totalMins; } }
                  jQuery(this).html(event.strftime(
                  '<div style=\"width: 100%; letter-spacing:5px; \">'+
                    '<div class=\" numberBlock \" style=\" display:$hideDays; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\" > %D </p> <p class=\"pluginOpsCountDownLabels\" >$daysText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideHours; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> '+totalHours+' </p> <p class=\"pluginOpsCountDownLabels\" >$hoursText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideMinutes; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> '+totalMins+' </p> <p class=\"pluginOpsCountDownLabels\" >$minutesText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideSeconds; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> %S </p> <p class=\"pluginOpsCountDownLabels\" >$secondsText</p></div> '+
                  '</div>' ) );
                });
              </script> ";

              $countDownContainer = "<div id=pb_countDown-".$countDownId." style='text-align:center; padding:2% 3%;'></div>";

              $thisWidgetStyles = " <style>
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  margin-top:".$pbCountDownVGap."px; margin-bottom:".$pbCountDownVGap."px; 
                  font-size:".$pbCountDownTextSize."px; color:".$pbCountDownColor."; line-height:0;
                  font-family:".str_replace('+', ' ', $pbCountDownNumberFontFamily).";

                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  margin-top:".$pbCountDownVGap."px; margin-bottom:".$pbCountDownVGap."px; 
                  font-size:".$pbCountDownLabelTextSize."px; color:".$pbCountDownLabelColor."; display:".$pbCountDownLabel."; line-height:0;
                  font-family:".str_replace('+', ' ', $pbCountDownLabelFontFamily).";
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidth."%; margin-right:".$pbCountDownHGap."%; }
              </style> ";

              $thisWidgetResponsiveWidgetStylesTablet = "
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  font-size: ".$pbCountDownTextSizeTablet."px !important;
                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  font-size: ".$pbCountDownLabelTextSizeTablet."px !important;
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidthTablet."%; margin-right:".$pbCountDownHGapTablet."%; }
              ";
              $thisWidgetResponsiveWidgetStylesMobile = "
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  font-size: ".$pbCountDownTextSizeMobile."px !important;
                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  font-size: ".$pbCountDownLabelTextSizeMobile."px !important;
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidthMobile."%; margin-right:".$pbCountDownHGapMobile."%; }
              ";


              array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);

              $widgetContent = $countDownContainer .$pbCountDownLibrary. $countDownScript . $thisWidgetStyles;
            break;
            case 'wigt-pb-imageSlider':
              include(ULPB_PLUGIN_PATH.'public/templates/widgets/widget-imageSlider.php');
              break;
            case 'wigt-pb-progressBar':
              $this_widget_progressBar = $thisWidget['widgetProgressBar'];

              $pbProgressBarTitle = $this_widget_progressBar['pbProgressBarTitle'];
              $pbProgressBarPrecentage = $this_widget_progressBar['pbProgressBarPrecentage'];
              $pbProgressBarText = $this_widget_progressBar['pbProgressBarText'];
              $pbProgressBarDisplayPrecentage = $this_widget_progressBar['pbProgressBarDisplayPrecentage'];
              $pbProgressBarTitleColor = $this_widget_progressBar['pbProgressBarTitleColor'];
              $pbProgressBarTextColor = $this_widget_progressBar['pbProgressBarTextColor'];
              $pbProgressBarColor = $this_widget_progressBar['pbProgressBarColor'];
              $pbProgressBarBgColor = $this_widget_progressBar['pbProgressBarBgColor'];
              $pbProgressBarTitleSize = $this_widget_progressBar['pbProgressBarTitleSize'];
              $pbProgressBarHeight = $this_widget_progressBar['pbProgressBarHeight'];
              $pbProgressBarTextSize = $this_widget_progressBar['pbProgressBarTextSize'];

              if (isset($this_widget_progressBar['pbProgressBarTextFontFamily'])) {

                $pbProgressBarTextFontFamily = str_replace('+', ' ', $this_widget_progressBar['pbProgressBarTextFontFamily']);

                array_push($thisColFontsToLoad, $this_widget_progressBar['pbProgressBarTextFontFamily']);
              }else{
                $pbProgressBarTextFontFamily = '';
              }

              
              $pbProgressBarUniqueId = 'pb_progressBar_'.(rand(10,99)*120+200);

              $pbProgressBarHTML = '
              <p style="font-size:'.$pbProgressBarTitleSize.'px; color:'.$pbProgressBarTitleColor.';line-height:0; font-family:'.$pbProgressBarTextFontFamily.',sans-serif;" >'.$pbProgressBarTitle.'</p>

              <div id='.$pbProgressBarUniqueId.' style="background-color:'.$pbProgressBarBgColor.'; height:'.$pbProgressBarHeight.'px; position:relative;">

                <div style="position:absolute; top:'.($pbProgressBarHeight/2).'px; line-height:0; color:'.$pbProgressBarTextColor.'; font-size:'.$pbProgressBarTextSize.'px; left:2%; font-family:'.$pbProgressBarTextFontFamily.',sans-serif;">'.$pbProgressBarText.'</div>

                <div class="progressBarNumber" style="position:absolute;left:'.($pbProgressBarPrecentage-6).'%; top:'.($pbProgressBarHeight/2).'px; line-height:0; color:'.$pbProgressBarTextColor.'; font-size:'.$pbProgressBarTextSize.'px; font-family:'.$pbProgressBarTextFontFamily.',sans-serif; ">%</div>
              </div>';

              $pbProgressBarScript = '
              <script> 
               var thisProgressBar_'.$pbProgressBarUniqueId.' = jQuery( "#'.$pbProgressBarUniqueId.'" );
               var progressNumber_'.$pbProgressBarUniqueId.' = jQuery("#'.$pbProgressBarUniqueId.'  .progressBarNumber");

               thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar({ value: 0, change: function(){
                progressNumber_'.$pbProgressBarUniqueId.'.text(thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar("value")+ "%"); 
                progressNumber_'.$pbProgressBarUniqueId.'.css("left",thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar("value")-10 + "%");
                }   
              });
                function '.$pbProgressBarUniqueId.'_pb_progress() { 
                  var val = thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar( "value" ) || 0;
                  thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar( "value", val + 1 );

                  if ( val <= '.($pbProgressBarPrecentage -2).' ) {
                    setTimeout( '.$pbProgressBarUniqueId.'_pb_progress, 20 ); 
                  }
                } 
                  setTimeout( '.$pbProgressBarUniqueId.'_pb_progress, 500 );

              </script>

                <style> #'.$pbProgressBarUniqueId.' .ui-progressbar-value{background-color:'.$pbProgressBarColor.' !important; margin:0 !important; } </style>  ';


              $pbProgressBarHTMLContainer = $pbProgressBarHTML . $pbProgressBarScript;

              $widgetContent = $pbProgressBarHTMLContainer;
            break;
            case 'wigt-pb-pricing':
              $this_widget_pricing = $thisWidget['widgetPricing'];
              $pbPricingHeaderText = $this_widget_pricing['pbPricingHeaderText'];
              $pbPricingContent = $this_widget_pricing['pbPricingContent'];
              $pbPricingHeaderTextColor = $this_widget_pricing['pbPricingHeaderTextColor'];
              $pbPricingHeaderBgColor = $this_widget_pricing['pbPricingHeaderBgColor'];
              $pbPricingHeaderTextSize = $this_widget_pricing['pbPricingHeaderTextSize'];
              $pbPricingBorderWidth = $this_widget_pricing['pbPricingBorderWidth'];
              $pbPricingBorderColor = $this_widget_pricing['pbPricingBorderColor'];
              $pricingbtnButtonAlignment = $this_widget_pricing['pricingbtnButtonAlignment'];
              if (isset($this_widget_pricing['pbPricingButtonSectionBgColor'])) {
                $pbPricingButtonSectionBgColor = $this_widget_pricing['pbPricingButtonSectionBgColor'];
              }else{
                $pbPricingButtonSectionBgColor = '';
              }
              

              if ($pbPricingHeaderText !== '') {
                $pricingHeader = '<div class="pb_prcingHeader" style="color:'.$pbPricingHeaderTextColor.'; background:'.$pbPricingHeaderBgColor.'; font-size:'.$pbPricingHeaderTextSize.'px; width:100%; text-align:center; padding:30px 0 35px 0; border-bottom:1px solid '.$pbPricingBorderColor.';"> <b>'.$pbPricingHeaderText.'</b> </div>';
              } else{
                $pricingHeader = '';
              }
              
              $randomBtnClass = rand(10,99)*200+100;
              $btnText = $this_widget_pricing['pricingbtnText'];
              $btnLink = $this_widget_pricing['pricingbtnLink'];
              $btnAllignment = $this_widget_pricing['pricingbtnButtonAlignment'];
              $btnTextColor = $this_widget_pricing['pricingbtnTextColor'];
              $btnFontSize = $this_widget_pricing['pricingbtnFontSize'];
              $btnBgColor = $this_widget_pricing['pricingbtnBgColor'];
              $btnHeight = $this_widget_pricing['pricingbtnHeight'];
              $btnHoverBgColor = $this_widget_pricing['pricingbtnHoverBgColor'];
              if (isset($this_widget_pricing['pricingbtnBlankAttr'])) {
                $btnBlankAttr = $this_widget_pricing['pricingbtnBlankAttr'];
              }else{
                $btnBlankAttr = '';
              }
              if (isset($this_widget_pricing['pricingbtnWidth'])) {
                $btnWidth = $this_widget_pricing['pricingbtnWidth'];
              }else{
                $btnWidth = '5';
              }

              if (isset($this_widget_pricing['pricingbtnButtonFontFamily'])) {
                $btnButtonFontFamily = $this_widget_pricing['pricingbtnButtonFontFamily'];
              }else{
                $btnButtonFontFamily = '';
              }

              $btnWidthUnit = '%';
              $btnWidthUnitTablet = '%';
              $btnWidthUnitMobile = '%';
              if (isset($this_widget_pricing['pricingbtnWidthUnit']) ) {
                $btnWidthUnit = $this_widget_pricing['pricingbtnWidthUnit'];
                $btnWidthUnitTablet = $this_widget_pricing['pricingbtnWidthUnitTablet'];
                $btnWidthUnitMobile = $this_widget_pricing['pricingbtnWidthUnitMobile'];
              }


              $btnIcon = ''; $btnIconBefore = ''; $btnIconAfter = ''; $btnIconAnimation = ''; $btnIconHoverAnimationScript = '';
              if (isset($this_widget_pricing['pricingbtnSelectedIcon']) ) {
                $btnSelectedIcon = $this_widget_pricing['pricingbtnSelectedIcon'];
                $btnIconPosition = $this_widget_pricing['pricingbtnIconPosition'];
                $btnIconAnimation = $this_widget_pricing['pricingbtnIconAnimation'];
                $btnIconGap = $this_widget_pricing['pricingbtnIconGap'];

                if ($btnSelectedIcon != '') {
                  if ($btnIconPosition == 'before') {
                    $btnIconGap = 'margin-right:'.$btnIconGap.'px;';
                  }else{
                    $btnIconGap = 'margin-left:'.$btnIconGap.'px;';
                  }
                  $btnIcon = '<i style="'.$btnIconGap.'" class="fa '.$btnSelectedIcon.'  btnIcon-'.$randomBtnClass.'"></i>';

                  if ($btnIconAnimation != '') {
                    $btnIconHoverAnimationScript = " <script>
                      jQuery('.btn-".$randomBtnClass."').mouseenter(function(){
                        jQuery('.btnIcon-".$randomBtnClass."').addClass('animated ".$btnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                           jQuery('.btnIcon-".$randomBtnClass."').removeClass('animated ".$btnIconAnimation."') 
                          });
                     });
                     </script> " ;
                  }
                  
                  $widgetFALoadScripts = true;
                }else{
                  $btnIcon = '';
                }

                if ($btnIconPosition == 'before') {
                  $btnIconBefore = $btnIcon;
                  $btnIconAfter = '';
                }else{
                  $btnIconAfter = $btnIcon;
                  $btnIconBefore = '';
                }
              }

              if (isset($this_widget_pricing['pricingbtnHoverTextColor'])) {
                  $btnHoverTextColor = $this_widget_pricing['pricingbtnHoverTextColor'];
                } else{
                  $btnHoverTextColor = '';
                }

              $POPB_buton_width = "padding: $btnHeight"."px $btnWidth"."px !important;";
              if (isset($this_widget_pricing['pricingbtnWidthPercent'])) {
                $btnWidthPercent = $this_widget_pricing['pricingbtnWidthPercent'];
                if ($btnWidthPercent !== '') {
                  $POPB_buton_width = "padding: $btnHeight"."px 5"."px !important; width:$btnWidthPercent"."$btnWidthUnit;";
                }
              }else{
                $btnWidthPercent = '';
              }

              $btnpreventDefault = '' ; $btnredirectToLink = '';
              if ($btnBlankAttr !== '_blank') {
                $btnpreventDefault = 'e.preventDefault();';
                $btnredirectToLink  = "location.href = '".$btnLink."';";
              }
              
              $btnBorderColor = $this_widget_pricing['pricingbtnBorderColor'];
              $btnBorderWidth = $this_widget_pricing['pricingbtnBorderWidth'];
              $btnBorderRadius = $this_widget_pricing['pricingbtnBorderRadius'];
              
              $POPB_verify_clicked_el = wp_create_nonce( 'POPB_verify_clicked_el' );
              $this_btn_click_detectionAJAX_url = admin_url('admin-ajax.php?action=ulpb_cta_click_conversion_record&pID='.$current_pageID.'&POPB_CTA_Nonce='.$POPB_verify_clicked_el );
              $this_btn_click_detectionScript = "
                <script>
                jQuery( '#btnLink-$randomBtnClass' ).click(function(e) {
                  $btnpreventDefault 
                  var clickedLink = jQuery( this ).attr( 'href' );
                  jQuery.ajax({
                    url: '$this_btn_click_detectionAJAX_url',
                    type: 'POST',
                    data: 'result',
                    error: function(){},
                    success: function(msg){},
                    beforeSend: function() {},
                    complete: function() { 
                        $btnredirectToLink
                    }
                  });
                });
                </script> 
                <style> .btn-$randomBtnClass:hover{ background-color: $btnHoverBgColor !important; background: $btnHoverBgColor !important; color:$btnHoverTextColor !important; transition: all .5s;}  </style>
                ";
              $this_widget_btn = "<br>
                <div class='wdt-$this_column_type parent-btn-$randomBtnClass' style='text-align:$btnAllignment;'><a href='$btnLink' style='text-decoration:none !important;' target='$btnBlankAttr' id='btnLink-$randomBtnClass'> <button class='btn-$randomBtnClass' style='color:$btnTextColor ;font-size:$btnFontSize"."px ; background: $btnBgColor ; background-color: $btnBgColor;  $POPB_buton_width  border: $btnBorderWidth"."px solid $btnBorderColor !important; border-radius: $btnBorderRadius"."px !important; text-align:center; font-family:".str_replace('+', ' ', $btnButtonFontFamily)." ,sans-serif;'>$btnIconBefore $btnText  $btnIconAfter</button></a></div> $this_btn_click_detectionScript   $btnIconHoverAnimationScript
                ";

                if (isset($this_widget_pricing['pricingbtnButtonAlignmentTablet'])) {
                  $thisButtonWidgetResponsiveAlignmentTablet = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_pricing['pricingbtnButtonAlignmentTablet']." !important;
                  }
                  ";
                  $thisButtonWidgetResponsiveAlignmentMobile = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_pricing['pricingbtnButtonAlignmentMobile']." !important;
                  }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveAlignmentTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveAlignmentMobile);
                }
                if (isset($this_widget_pricing['pricingbtnFontSizeTablet'])) {
                  if (!isset($this_widget_pricing['pricingbtnWidthPercentTablet'])) {
                    $this_widget_pricing['pricingbtnWidthPercentTablet'] = '';
                  }
                  if (!isset($this_widget_pricing['pricingbtnWidthPercentMobile'])) {
                    $this_widget_pricing['pricingbtnWidthPercentMobile'] = '';
                  }
                  
                  $thisButtonWidgetResponsiveWidgetStylesTablet = "            

                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_pricing['pricingbtnFontSizeTablet']."px !important;
                     width: ".$this_widget_pricing['pricingbtnWidthPercentTablet']."$btnWidthUnitTablet !important;
                     padding: ".$this_widget_pricing['pricingbtnHeightTablet']."px 5px !important;
                    }
                  ";

                  $thisButtonWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_pricing['pricingbtnFontSizeMobile']."px !important;
                     width: ".$this_widget_pricing['pricingbtnWidthPercentMobile']."$btnWidthUnitMobile !important;
                     padding: ".$this_widget_pricing['pricingbtnHeightMobile']."px 5px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveWidgetStylesMobile);
                }

                array_push($thisColFontsToLoad, $btnButtonFontFamily);

              if ($btnLink !== '') {
                $randomBtnClass = rand(10,99)*200+100;
                
                $pricingButton = "<br>
                  <div class='wdt-$this_column_type' style='text-align:".$pricingbtnButtonAlignment."; padding:20px 0 40px 0; background:".$pbPricingButtonSectionBgColor.";'> $this_widget_btn </div>";
              }else{
                $pricingButton = '';
              }

              $pricingContainer = '<div class="pb_pricingContainer"  style="border:'.$pbPricingBorderWidth.'px solid '.$pbPricingBorderColor.'; border-radius:5px; box-shadow:0px 0px 10px '.$pbPricingBorderColor.';"> '.$pricingHeader.' <div>'.$pbPricingContent.'</div> '.$pricingButton.' </div>';
              $widgetContent = $pricingContainer;
            break;
            case 'wigt-pb-imgCarousel':
              $this_widget_img_carousel = $thisWidget['widgetImgCarousel'];
              $pbImgCarouselAutoplay = $this_widget_img_carousel['pbImgCarouselAutoplay'];
              $pbImgCarouselDelay = $this_widget_img_carousel['pbImgCarouselDelay'];
              $imgCarouselSlideLoop = $this_widget_img_carousel['imgCarouselSlideLoop'];
              $imgCarouselSlideTransition = $this_widget_img_carousel['imgCarouselSlideTransition'];
              $imgCarouselPagination = $this_widget_img_carousel['imgCarouselPagination'];
              $pbImgCarouselNav = $this_widget_img_carousel['pbImgCarouselNav'];
              $imgCarouselSlidesURL = $this_widget_img_carousel['imgCarouselSlidesURL'];

              ob_start();

              if ($widgetPostsSliderExternalScripts == true) {
                  $widget_postsSliderLibrary == ' ';
                }else{
                  echo  "<script type='text/javascript' src='".ULPB_PLUGIN_URL."/public/scripts/owl-carousel/owl.carousel.js'></script> ";
                }

                $widgetOwlLoadScripts = true;

              $pbImgCarouselUniqueId = 'pb_imgCarousel_'.(rand(10,99)*120+200);

              echo "\n <div  id='$pbImgCarouselUniqueId' class='pbOwl-carousel'> \n";

              foreach ($imgCarouselSlidesURL as $imgCarouselThisSlideURL) {
                echo "<div class='carouselSingleSlide'> <img src='$imgCarouselThisSlideURL' alt='slideImg' style='width:100%;' ></div> \n";
              }

              echo "</div> \n";


              
              $pbCarouselSlidesWrapper = ob_get_contents();
              ob_end_clean();

              $carouselScript = "<script> 

                jQuery('#$pbImgCarouselUniqueId').owlCarousel({
                      singleItem: false,
                      autoPlay : ".$pbImgCarouselAutoplay.",   
                      stopOnHover : true,   
                      navigation: ".$pbImgCarouselNav." ,    
                      paginationSpeed : ".$pbImgCarouselDelay."00,   
                      goToFirstSpeed : ".$pbImgCarouselDelay."00,    
                      autoHeight : true,    
                      slideSpeed : ".$pbImgCarouselDelay."000,   
                      transitionStyle: '".$imgCarouselSlideTransition."',    
                      pagination : ".$imgCarouselPagination.",   
                      paginationNumbers: false,   
                      navigationText : ['<span class=\"dashicons dashicons-arrow-left-alt2\" > </span>', '<span class=\"dashicons dashicons-arrow-right-alt2\" > </span>'],
                      theme: 'pbOwl-theme',
                      baseClass: 'pbOwl-carousel'
                    });
                    </script> \n";

              $widgetContent = $pbCarouselSlidesWrapper  ."\n". $carouselScript;

              $widgetOwlLoadScripts = true;

              break;
            case 'wigt-pb-wooCommerceProducts':
              $this_widget_wooCommerceProducts = $thisWidget['widgetWooPorducts'];
              $wooProductsColumn = $this_widget_wooCommerceProducts['wooProductsColumn'];
              $wooProductsCount = $this_widget_wooCommerceProducts['wooProductsCount'];
              $wooProductsCategories = $this_widget_wooCommerceProducts['wooProductsCategories'];
              //$wooProductsTags = $this_widget_wooCommerceProducts['wooProductsTags'];
              $wooProductsOrderBy = $this_widget_wooCommerceProducts['wooProductsOrderBy'];
              $wooProductsOrder = $this_widget_wooCommerceProducts['wooProductsOrder'];

              $generateWooProductsShortcode = '[products columns="'.$wooProductsColumn.'" per_page="'.$wooProductsCount.'" orderby="'.$wooProductsOrderBy.'" order="'.$wooProductsOrder.'" ]';

              if ($wooProductsCategories !== '') {
                $generateWooProductsShortcode = '[product_category columns="'.$wooProductsColumn.'" per_page="'.$wooProductsCount.'" orderby="'.$wooProductsOrderBy.'" order="'.$wooProductsOrder.'" category="'.$wooProductsCategories.'" ]';
              }

              if ($wooProductsOrderBy == 'popularity') {
                $generateWooProductsShortcode = '[best_selling_products columns="'.$wooProductsColumn.'" per_page="'.$wooProductsCount.'" orderby="'.$wooProductsOrderBy.'" order="'.$wooProductsOrder.'" category="'.$wooProductsCategories.'" ]';
              }

              $widgetContent = do_shortcode( esc_html( $generateWooProductsShortcode) );

              $widgetWooCommLoadScripts = true;
              break;
              case 'wigt-pb-spacer':

                $this_widget_spacer = $thisWidget['widgetVerticalSpace'];
                $widgetSpacer = '<div style="height:'.$this_widget_spacer['widgetVerticalSpaceValue'].'px ;"></div>';

                if (isset($this_widget_spacer['widgetVerticalSpaceValueTablet'])) {
                  $thisSpacerWidgetResponsiveWidgetStylesTablet = "
                    #widget-$j-$Columni-".$row["rowID"]."  div {
                     height: ".$this_widget_spacer['widgetVerticalSpaceValueTablet']."px !important;
                    }
                  ";

                  $thisSpacerWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  div {
                     height: ".$this_widget_spacer['widgetVerticalSpaceValueMobile']."px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisSpacerWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisSpacerWidgetResponsiveWidgetStylesMobile);
                }


                $widgetContent = $widgetSpacer;
              break;
              case 'wigt-pb-break':
              
                $this_widget_breaker = $thisWidget['widgetBreaker'];
                $widgetBreaker = '<div style=" padding:'.$this_widget_breaker['widgetBreakerSpacing'].'px 0; text-align: '.$this_widget_breaker['widgetBreakerAlignment'].' ; "> <span style=" border-top:'.$this_widget_breaker['widgetBreakerWeight'].'px  '.$this_widget_breaker['widgetBreakerStyle'].'   '.$this_widget_breaker['widgetBreakerColor'].'; width:'.$this_widget_breaker['widgetBreakerWidth'].'%; display:inline-block; line-height:0;" ></span> </div>';

                $widgetContent = $widgetBreaker;
              break;
              case 'wigt-pb-iconList':
              
                $this_widget_icon_list = $thisWidget['widgetIconList'];
                
                $iconListLineHeight = $this_widget_icon_list['iconListLineHeight'];
                $iconListAlignment = $this_widget_icon_list['iconListAlignment'];
                $iconListIconSize = $this_widget_icon_list['iconListIconSize'];
                $iconListIconColor = $this_widget_icon_list['iconListIconColor'];
                $iconListTextSize = $this_widget_icon_list['iconListTextSize'];
                $iconListTextIndent = $this_widget_icon_list['iconListTextIndent'];
                $iconListTextColor = $this_widget_icon_list['iconListTextColor'];
                

                if (isset($this_widget_icon_list['iconListItemLinkOpen'])) {
                  $iconListItemLinkOpen = $this_widget_icon_list['iconListItemLinkOpen'];
                }

                if (isset($this_widget_icon_list['iconListIconSizeTablet'])) {
                  $iconListIconSizeTablet = $this_widget_icon_list['iconListIconSizeTablet'];
                  $iconListIconSizeMobile = $this_widget_icon_list['iconListIconSizeMobile'];

                  $iconListTextSizeTablet = $this_widget_icon_list['iconListTextSizeTablet'];
                  $iconListTextSizeMobile = $this_widget_icon_list['iconListTextSizeMobile'];

                  $iconListTextIndentTablet = $this_widget_icon_list['iconListTextIndentTablet'];
                  $iconListTextIndentMobile = $this_widget_icon_list['iconListTextIndentMobile'];

                  $thisWidgetResponsiveWidgetStylesTablet = "
                    #$pbIconListUniqueId li i {
                      font-size: ".$iconListIconSizeTablet."px !important;
                    }
                    #$pbIconListUniqueId li span {
                      font-size: ".$iconListTextSizeTablet."px !important;
                      margin-left: ".$iconListTextIndentTablet."px !important;
                    }
                  ";
                  $thisWidgetResponsiveWidgetStylesMobile = "
                    #$pbIconListUniqueId li i {
                      font-size: ".$iconListIconSizeMobile."px !important;
                    }
                    #$pbIconListUniqueId li span {
                      font-size: ".$iconListTextSizeMobile."px !important;
                      margin-left: ".$iconListTextIndentMobile."px !important;
                    }
                  ";


                  array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);
                }
                
                $iconListComplete = $this_widget_icon_list['iconListComplete'];


                $pbIconListAllItems = '';

                ob_start();
                  $pbIconListUniqueId = 'pb_IconList_'.(rand(10,99)*120+200);

                  echo "\n <ul id='$pbIconListUniqueId' > \n";

                  foreach ($iconListComplete as $iconListItem) {
                    $pbThisListIcon = '<i class="fa '.$iconListItem['iconListItemIcon'].'"></i>';
                    if ($iconListItem['iconListItemLink'] !== '') {
                      $pbThisListItemLinkOpen = '<a href='.$iconListItem['iconListItemLink'].' target="_blank" >';
                      $pbThisListItemLinkClose = '</a>';
                    } else{
                      $pbThisListItemLinkOpen = '';
                      $pbThisListItemLinkClose = '';
                    }
                    $pbListThisItem = $pbThisListItemLinkOpen. " <li> ".$pbThisListIcon."  <span>".$iconListItem['iconListItemText']."</span>  </li> " . $pbThisListItemLinkClose;
                    
                    echo $pbListThisItem;
                  }

                  echo "</ul> \n";


                  
                  $pbIconListWrapper = ob_get_contents();
                ob_end_clean();

                $pbIconListUniqueStyles = ' <style> 
                #'.$pbIconListUniqueId.' { line-height:'.$iconListLineHeight.'px; text-align:'.$iconListAlignment.'; text-decoration:none; list-style:none; } 
                 #'.$pbIconListUniqueId.' li i { font-size:'.$iconListIconSize.'px; color:'.$iconListIconColor.';  } 
                 #'.$pbIconListUniqueId.' li span { font-size:'.$iconListTextSize.'px; color:'.$iconListTextColor.';  margin-left:'.$iconListTextIndent.'px; }
                 #'.$pbIconListUniqueId.' a { text-decoration:none; } </style>  ';


                $widgetContent = $pbIconListWrapper ."\n". $pbIconListUniqueStyles;

                $widgetFALoadScripts = true;
              break;

              case 'wigt-pb-formBuilder':

                include(ULPB_PLUGIN_PATH.'public/templates/form-builder-widget.php');

              break;
              case 'wigt-pb-text':
                $this_widget_text = $thisWidget['widgetText'];

                $widgetTextContent = str_replace("\n","<br>",$this_widget_text['widgetTextContent']);
                $widgetTextAlignment = $this_widget_text['widgetTextAlignment'];
                $widgetTextTag = $this_widget_text['widgetTextTag'];
                $widgetTextColor = $this_widget_text['widgetTextColor'];
                $widgetTextSize = $this_widget_text['widgetTextSize'];
                $widgetTextFamily = $this_widget_text['widgetTextFamily'];
                $widgetTextWeight = $this_widget_text['widgetTextWeight'];
                $widgetTextTransform = $this_widget_text['widgetTextTransform'];

                $widgetTextBold = ''; $widgetTextItalic = ''; $widgetTextUnderlined = '';

                if (isset($this_widget_text['widgetTextBold'])) {
                  if ($this_widget_text['widgetTextBold'] == true) { $widgetTextBold = 'bold'; }
                }
                if (isset($this_widget_text['widgetTextItalic'])) {
                  if ($this_widget_text['widgetTextItalic'] == true) { $widgetTextItalic = 'italic'; }
                }

                if (isset($this_widget_text['widgetTextUnderlined'])) {
                  if ($this_widget_text['widgetTextUnderlined'] == true) { $widgetTextUnderlined = 'underline'; }
                }
                $widgetTextAlignmentTablet = ''; $widgetTextAlignmentMobile = '';
                if (isset($this_widget_text['widgetTextAlignmentTablet'])) {
                  $widgetTextAlignmentTablet = $this_widget_text['widgetTextAlignmentTablet'];
                  $widgetTextAlignmentMobile = $this_widget_text['widgetTextAlignmentMobile'];
                }

                if (isset($this_widget_text['widgetTextSizeTablet'])) {
                  
                  $thisTextWidgetResponsiveWidgetStylesTablet = "
                    #widget-$j-$Columni-".$row["rowID"]."  $widgetTextTag {
                     font-size: ".$this_widget_text['widgetTextSizeTablet']."px !important;
                     line-height: ".$this_widget_text['widgetTextLineHeightTablet']."em !important;
                     letter-spacing: ".$this_widget_text['widgetTextSpacingTablet']."px !important;
                     text-align:$widgetTextAlignmentTablet !important;
                    }
                  ";

                  $thisTextWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  $widgetTextTag {
                     font-size: ".$this_widget_text['widgetTextSizeMobile']."px !important;
                     line-height: ".$this_widget_text['widgetTextLineHeightMobile']."em !important;
                     letter-spacing: ".$this_widget_text['widgetTextSpacingMobile']."px !important;
                     text-align:$widgetTextAlignmentMobile !important;
                    }
                  ";


                  array_push($POPBNallRowStylesResponsiveTablet, $thisTextWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisTextWidgetResponsiveWidgetStylesMobile);
                }
                

                $widgetTextLineHeight = '';
                if (isset($this_widget_text['widgetTextLineHeight'])) {
                  $widgetTextLineHeight = $this_widget_text['widgetTextLineHeight'];
                }

                $widgetTextSpacing = '';
                if (isset($this_widget_text['widgetTextSpacing'])) {
                  $widgetTextSpacing = $this_widget_text['widgetTextSpacing'];
                }

                $textWidgetContentStyles = 'text-align:'.$widgetTextAlignment.'; color:'.$widgetTextColor.'; font-size:'.$widgetTextSize.'px; font-weight:'.$widgetTextWeight.'; text-transform:'.$widgetTextTransform.';  font-family:'.str_replace('+', ' ', $widgetTextFamily).',sans-serif; '.$widgetStyling.' font-weight:'.$widgetTextBold.';'
                  .' font-style:'.$widgetTextItalic.';'
                  .'  text-decoration:'.$widgetTextUnderlined.'; line-height:'.$widgetTextLineHeight.'em;  letter-spacing:'.$widgetTextSpacing.'px;';

                $textWidgetContentComplete = '<'.$widgetTextTag.' style="'.$textWidgetContentStyles.'"> '.$widgetTextContent.' </'.$widgetTextTag.'> ';

                $widgetContent = $textWidgetContentComplete;

                $widgetStyling = '';
                array_push($thisColFontsToLoad, $widgetTextFamily);
              break;
              case 'wigt-pb-embededVideo':

                include(ULPB_PLUGIN_PATH.'public/templates/widgets/widget-embededVideo.php');

              break;
              default:
              $widgetContent = $thisWidgetContentEditor;
              $contentAlignment = ' ';
                break;
          } // column type switch ends here


          /*
          $widgetMtop = floor( ($widgetMtop/1268)*100);
          $widgetMright = floor( ($widgetMright/1268)*100);
          $widgetMbottom = floor( ($widgetMbottom/1268)*100);
          $widgetMleft = floor( ($widgetMleft/1268)*100); */
          
         /// $columnContentOld = 





          $widgBackgroundOptions = 'background:'.$widgetBgColor.';';

          if (isset($thisWidget['widgBgImg']) ) {
            $thisWidgBgImg = $thisWidget['widgBgImg'];
            if ($thisWidgBgImg !== '') {
              $widgBackgroundOptions = 'background: url('.$thisWidgBgImg.') no-repeat center; background-size:cover;';
            }
          }

          if (isset($thisWidget['widgBackgroundType']) ) {
            if ($thisWidget['widgBackgroundType'] == 'gradient') {
              $widgGradient = $thisWidget['widgGradient'];

              if ($widgGradient['widgGradientType'] == 'linear') {
                $widgBackgroundOptions = 'background: linear-gradient('.$widgGradient['widgGradientAngle'].'deg, '.$widgGradient['widgGradientColorFirst'].' '.$widgGradient['widgGradientLocationFirst'].'%,'.$widgGradient['widgGradientColorSecond'].' '.$widgGradient['widgGradientLocationSecond'].'%);';
              }

              if ($widgGradient['widgGradientType'] == 'radial') {
                $widgBackgroundOptions = 'background: radial-gradient(at '.$widgGradient['widgGradientPosition'].', '.$widgGradient['widgGradientColorFirst'].' '.$widgGradient['widgGradientLocationFirst'].'%,'.$widgGradient['widgGradientColorSecond'].' '.$widgGradient['widgGradientLocationSecond'].'%);';
              }
              
            }
          }

          $thisWidgHoverStyleTag = '';
          $thisWidgHoverOption = '';
          $widgetHoverAnimationScript = '';
          if (isset($thisWidget['widgHoverOptions']) ) {
            $widgID = "widget-$j-$Columni-".$row["rowID"];
            $widgHoverOptions = $thisWidget['widgHoverOptions'];

            if (isset($widgHoverOptions['widgBackgroundTypeHover'])) {
              if ($widgHoverOptions['widgBackgroundTypeHover'] == 'solid') {
                $thisWidgHoverOption = ' #'.$widgID.':hover { background:'.$widgHoverOptions['widgBgColorHover'].' !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
              }
              if ($widgHoverOptions['widgBackgroundTypeHover'] == 'gradient') {
                $widgGradientHover = $widgHoverOptions['widgGradientHover'];

                if ($widgGradientHover['widgGradientTypeHover'] == 'linear') {
                  $thisWidgHoverOption = ' #'.$widgID.':hover { background: linear-gradient('.$widgGradientHover['widgGradientAngleHover'].'deg, '.$widgGradientHover['widgGradientColorFirstHover'].' '.$widgGradientHover['widgGradientLocationFirstHover'].'%,'.$widgGradientHover['widgGradientColorSecondHover'].' '.$widgGradientHover['widgGradientLocationSecondHover'].'%) !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
                }

                if ($widgGradientHover['widgGradientTypeHover'] == 'radial') {

                  $thisWidgHoverOption = ' #'.$widgID.':hover { background: radial-gradient(at '.$widgGradientHover['widgGradientPositionHover'].', '.$widgGradientHover['widgGradientColorFirstHover'].' '.$widgGradientHover['widgGradientLocationFirstHover'].'%,'.$widgGradientHover['widgGradientColorSecondHover'].' '.$widgGradientHover['widgGradientLocationSecondHover'].'%) !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
                }
              }
            }
              
            $widgetHoverAnimationScript = '';
            if (isset($widgHoverOptions['widgetHoverAnimation']) ) {
              $widgetHoverAnimation = $widgHoverOptions['widgetHoverAnimation'];
              if ($widgetHoverAnimation != '') {
                $widgetHoverAnimationScript = " <script>
                 jQuery('#".$widgID."').mouseenter(function(){
                    jQuery(this).addClass('animated ".$widgetHoverAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                       jQuery(this).removeClass('animated ".$widgetHoverAnimation."') 
                      }); 
                 });
                 </script> " ;
              }
            }
            $thisWidgHoverStyleTag = ' '.$thisWidgHoverOption.'  ';
            array_push($POPBallWidgetsStylesArray, $thisWidgHoverStyleTag);
          }


          
          $widgetMarigns = "margin:".$widgetMtop."% ".$widgetMright."% ".$widgetMbottom."% ".$widgetMleft."%; $widgetPaddings  $this_widget_border_shadow  background: $widgetBgColor; $widgBackgroundOptions  display:$widgetIsInline; text-align:$imgAlignment;";
          $columnContent = $columnContent."\n"."<div class='widget-$j $menuSpecificClass $widgetCustomClass'  id='widget-$j-$Columni-".$row["rowID"]."'  style='$widgetMarigns $menuSpecificStyles  $widgetStyling $widgHideOnDesktop ' >".$widgetContent."</div>  \n $widgetHoverAnimationScript";
          
          ?>

          <?php if (!empty($thisWidget['widgetAnimation']) && $thisWidget['widgetAnimation'] !== 'none' && $thisWidget['widgetAnimation'] !== '') {
            ob_start();

          echo "
              jQuery('#".$row["rowID"]."-$Columni > .widget-$j' ).each( function(i, el){
                var el = ".'$(el);'."
                if (el.visible(true)) {
                  setTimeout(function(){
                    el.addClass('$widgetAnimation');
                  },2000);
                  
                }
              });
          ";

          $thisWidgetAnimationTrigger =  ob_get_contents();
          ob_end_clean();

          $prevWidgetAnimationTriggers = $widgetAnimationTriggerScript;

          $widgetAnimationTriggerScript = $prevWidgetAnimationTriggers. "\n" . $thisWidgetAnimationTrigger;

          }
      } // widget loop ends here
?>