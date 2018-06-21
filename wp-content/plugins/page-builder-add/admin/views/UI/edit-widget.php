<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="lpp_modal_2 columnWidgetPopup">
  <div class="lpp_modal_wrapper_widget">
  <div class="edit_form" style="width: 100% !important; overflow: hidden !important;">
      <div class="tabs" style="background: #fff;">
        <ul class="tab-links" style="background: #2fa8f9;">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px 25px; text-align: center;" href="#tabBasicWidgetOptions" class="tab_link"> <i class="fa fa-puzzle-piece" style="font-size: 20px;"></i> <br>Widget</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabAdvancedWidgetOptions" class="tab_link"> <i class="fa fa-paint-brush" style="font-size: 20px;"></i> <br> Advanced Options</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabWidgetBlocks" class="tab_link"> <i class="fa fa-pagelines" style="font-size: 20px;"></i> <br> Widget Blocks</a></li>
        </ul>
        <div class="tab-content" style="box-shadow: none;">
          <div id="tabBasicWidgetOptions" class="tab active" style="min-height:400px;">
            <div class="wdt-left" style="width: 100% !important;">
              
              <br>
              <br>
              <div class="pbp-widgets wdt-editor" style="display:none">
                  <?php 
                  $settings = array('media_buttons'=> true,'columnContent','tinymce' => true, 'editor_height' => 425);
                  wp_editor(" ","columnContent",$settings); ?>
              </div>
              <div class="pbp-widgets wdt-img" style="display:none">
                <div class="pbp_form" style=" background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                  <label>Upload Image :</label>
                  <input id="image_location1" type="text" class=" ftr-img upload_image_button2"  name='lpp_add_img_1' value=' ' placeholder='Insert Image URL here' />
                  <input id="image_location1" type="button" class="upload_bg" data-id="2" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Select Size :</label>
                  <select name="ftr-img-size" id="ftr-img-size">
                    <option value="original">Original</option>
                    <option value="large">Large</option>
                    <option value="medium">Medium</option>
                    <option value="small">Small</option>
                    <option value="custom">Custom</option>
                  </select>
                  <br><br><hr><br>
                  <div>
                    <h4> Image Alignment 
                      <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                      <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                      <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                    </h4>
                    <div class="responsiveOps responsiveOptionsContainterLarge">
                      <label></label>
                      <select  class="imgAlignment">
                        <option value="default">Default</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                      </select>
                    </div>
                    <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                      <label></label>
                      <select  class="imgAlignmentTablet">
                        <option value="default">Default</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                      </select>
                    </div>
                    <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                      <label></label>
                      <select  class="imgAlignmentMobile">
                        <option value="default">Default</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                      </select>
                    </div>
                  </div>
                  <br><br><br><hr><br>
                  <label>Image Link :</label>
                  <input type="url" id="imgLink" class="imgLink">
                  <br><br><hr><br>
                  <label>Lightbox :</label>
                  <select class="imgLightBox" id="imgLightBox">
                    <option value="true">Enable</option>
                    <option value="false">Disable</option>
                  </select>
                  <br><br>
                  <hr>
                  <br>
                  <div style="display: none;" class="customImageSizeDiv">
                    <h3>Custom Image Size :</h3>
                    <br>
                    <div>
                      <h4> Width
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="imgSizeCustomWidth" id="imgSizeCustomWidth" style="width:14%;margin-right: 46%;">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="imgSizeCustomWidthTablet" id="imgSizeCustomWidthTablet" style="width:14%;margin-right: 46%;">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="imgSizeCustomWidthMobile" id="imgSizeCustomWidthMobile" style="width:14%;margin-right: 46%;">
                      </div>
                    </div>
                    <br><br><hr><br>
                    <div>
                      <h4> Height
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="imgSizeCustomHeight" id="imgSizeCustomHeight" style="width:14%;margin-right: 46%;">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="imgSizeCustomHeightTablet" id="imgSizeCustomHeightTablet" style="width:14%;margin-right: 46%;">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="imgSizeCustomHeightMobile" id="imgSizeCustomHeightMobile" style="width:14%;margin-right: 46%;">
                      </div>
                    </div>
                  </div>
                  <script type="text/javascript">
                    jQuery('#ftr-img-size').on('change',function(e){
                      selectedValue = jQuery(this).val();

                      if (selectedValue == 'custom') {
                        jQuery('.customImageSizeDiv').show();
                      } else{
                        jQuery('.customImageSizeDiv').hide();
                      }
                    });
                  </script>
                </div>
              </div>
              <div class="pbp-widgets wdt-menu" style="display:none">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-menu.php'); ?>
                
              </div>
              <div class="pbp-widgets wdt-btn-gen" style="display:none; ">
                <br><br>
                <div class="tabs" style="width: 107%;">
                  <ul class="tab-links">
                    <li class="active"><a href="#btntab1" class="tab_link">Button</a></li>
                    <li><a href="#btntab2" class="tab_link">Icon</a></li>
                  </ul>
                  <div class="tab-content" style="box-shadow:none;">
                    <div id="btntab1" class="tab active">
                      <div id="btn-gen" class="pbp_form" style="margin:0 0 0 0; background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                        <br>
                        <br>
                        <label>Button Text :</label>
                        <input type="text" class="btnText" style="width: 250px;" placeholder="Button Text">
                        <br>
                        <br>
                        <br><br><br>
                        <label>Button Link :</label>
                        <input type="URL" class="btnLink" placeholder="Link URL">
                        <br><br><hr><br>
                        <label>Open Link :</label>
                        <select class="btnBlankAttr" id="btnBlankAttr">
                          <option value="_self">Same Tab</option>
                          <option value="_blank">New Tab</option>
                        </select>
                        <br><br><hr><br>
                        <div>
                          <h4>Height 
                            <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                            <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                            <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                          </h4>
                          <div class="responsiveOps responsiveOptionsContainterLarge">
                            <label></label>
                            <input type="number" class="btnHeight">px
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="btnHeightTablet">px
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                            <label></label>
                            <input type="number" class="btnHeightMobile">px
                          </div>
                        </div>
                        <br><br><hr><br>
                        <div>
                          <h4>Width 
                            <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                            <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                            <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                          </h4>
                          <div class="responsiveOps responsiveOptionsContainterLarge">
                            <label></label>
                            <input type="number" class="btnWidthPercent" style="width:70px;">
                            <select style="width:70px;" class="btnWidthUnit">
                              <option value='%'>Percent</option>
                              <option value="px">Pixel</option>
                            </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="btnWidthPercentTablet" style="width:70px;">
                              <select style="width:70px;" class="btnWidthUnitTablet">
                                <option value='%'>Percent</option>
                                <option value="px">Pixel</option>
                              </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                            <label></label>
                            <input type="number" class="btnWidthPercentMobile" style="width:70px;">
                            <select style="width:70px;" class="btnWidthUnitMobile">
                              <option value='%'>Percent</option>
                              <option value="px">Pixel</option>
                            </select>
                          </div>
                        </div>
                        <br><br><hr><br>
                        <label>Background Color :</label>
                        <input type="text" class="color-picker_btn_two btnBgColor" id="btnBgColor" data-alpha='true'>
                        <br><br><hr><br>
                        <label>Hover Background Color :</label>
                        <input type="text" class="color-picker_btn_two btnHoverBgColor" id="btnHoverBgColor" data-alpha='true'>
                        <br><br><hr><br>
                        <label>Button Text Color :</label>
                        <input type="text" class="color-picker_btn_two btnColor" id="btnColor">
                        <br><br><hr><br>
                        <label>Hover Text Color :</label>
                        <input type="text" class="color-picker_btn_two btnHoverTextColor" data-alpha='true'>
                        <br><br><hr><br> 
                        <div>
                          <h4>Font size 
                            <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                            <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                            <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                          </h4>
                          <div class="responsiveOps responsiveOptionsContainterLarge">
                            <label></label>
                            <input type="number" class="btnFontSize">px
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="btnFontSizeTablet">px
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                            <label></label>
                            <input type="number" class="btnFontSizeMobile">px
                          </div>
                        </div>
                        <br><br><hr><br>
                        <label>Border Width: </label>
                        <input type="number" class="btnBorderWidth">
                        <br><br><hr><br>
                        <label>Border Color: </label>
                        <input type="text" class="color-picker_btn_two btnBorderColor" id="btnBorderColor" >
                        <br><br><hr><br>
                        <label>Border Radius: </label>
                        <input type="number" class="btnBorderRadius" max="100" min="0">
                        <br><br><hr><br>
                        <div>
                          <h4>Button Alignment 
                            <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                            <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                            <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                          </h4>
                          <div class="responsiveOps responsiveOptionsContainterLarge">
                            <label></label>
                            <select class="btnButtonAlignment">
                              <option value="default">Default</option>
                              <option value="left">Left</option>
                              <option value="right">Right</option>
                              <option value="center">Center</option>
                            </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                            <label></label>
                            <select class="btnButtonAlignmentTablet">
                              <option value="default">Default</option>
                              <option value="left">Left</option>
                              <option value="right">Right</option>
                              <option value="center">Center</option>
                            </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                            <label></label>
                            <select class="btnButtonAlignmentMobile">
                              <option value="default">Default</option>
                              <option value="left">Left</option>
                              <option value="right">Right</option>
                              <option value="center">Center</option>
                            </select>
                          </div>
                        </div>
                        <br><br><hr><br>
                        <label>Button Font :</label>
                        <input class="btnButtonFontFamily gFontSelectorulpb" id="btnButtonFontFamily">
                        
                        <br><br><hr><br><br><br><br><br><br><br><br><br><br><br>
                      </div>
                    </div>
                    <div id="btntab2" class="tab">
                      <div id="btn-gen" class="pbp_form" style="margin:0 0 0 0; background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                        <label>Select Icon </label>
                        <input  data-placement="bottomRight" class="icp pbicp-auto btnSelectedIconpbicp-auto" value="" type="text" />
                        <span class="input-group-addon btnSelectedIcon" style="font-size: 16px;"></span>
                        <br><br><hr><br>
                        <label>Icon Position </label>
                        <select class="btnIconPosition">
                          <option value="before">Before Text</option>
                          <option value="after">After Text</option>
                        </select>
                        <br><br><hr><br>
                        <label>Icon Gap </label>
                        <input type="number" class="btnIconGap">px
                        <br><br><hr><br>
                        <label>Icon Hover Animation </label>
                        <select class="btnIconAnimation">
                          <option value="">None</option>
                          <optgroup label="Attention Seekers">
                            <option value="bounce">bounce</option>
                            <option value="flash">flash</option>
                            <option value="pulse">pulse</option>
                            <option value="rubberBand">rubberBand</option>
                            <option value="shake">shake</option>
                            <option value="swing">swing</option>
                            <option value="tada">tada</option>
                            <option value="wobble">wobble</option>
                            <option value="jello">jello</option>
                            <option value="flip">flip</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                  </div>
                  </div>

              </div>
              
              <div class="pbp-widgets wdt-pb-form pbp_form" style="display: none;">
                  <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-form.php'); ?>
              </div>
              <div class="pbp-widgets wdt-video pbp_video" style="display: none;">
                <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                  <br>
                  <br>
                  <label>Video (MP4) :</label>
                  <input id="image_location7" type="text" class="videoMpfour upload_image_button7"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' style="width:40%;" />
                  <label></label>
                  <input id="image_location7" type="button" class="upload_bg" data-id="7" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Video (WebM) :</label>
                  <input id="image_location6" type="text" class="videoWebM upload_image_button6"  name='lpp_add_img_6' value='' placeholder='Insert Video URL here' style="width:40%;" />
                  <label></label>
                  <input id="image_location6" type="button" class="upload_bg" data-id="6" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Video Thumbnail :</label>
                  <input id="image_location8" type="text" class="videoThumb upload_image_button8"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' style="width:40%;" />
                  <label></label>
                  <input id="image_location8" type="button" class="upload_bg" data-id="8" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Auto Play</label>
                  <select class="vidAutoPlay">
                    <option value="no">No</option>
                    <option value="autoplay">Yes</option>
                  </select>
                  <br><br><hr><br>
                  <label>Loop</label>
                  <select class="vidLoop">
                    <option value="no">No</option>
                    <option value="loop">Yes</option>
                  </select> 
                  <br><br><hr><br>
                  <label>Video Controls</label>
                  <select class="vidControls">
                    <option value="controls">Yes</option>
                    <option value="no">No</option>
                  </select> 
                </div>
              </div>
              <div class="pbp-widgets wdt-audio pbp_audio" style="display: none;">
                <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                  <br>
                  <br>
                  <label>Audio (MP3) :</label>
                  <input id="image_location4" type="text" class="audioMpThree upload_image_button4"  name='lpp_add_img_1' value='' placeholder='Insert Audio URL here' style="width:40%;" />
                  <label></label>
                  <input id="image_location4" type="button" class="upload_bg" data-id="4" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Audio (OGG) :</label>
                  <input id="image_location5" type="text" class="audioOgg upload_image_button5"  name='lpp_add_img_5' value='' placeholder='Insert Video URL here' style="width:40%;" />
                  <label></label>
                  <input id="image_location5" type="button" class="upload_bg" data-id="5" value="Upload" />
                  <br><br><br><br><hr><br>
                  <label>Auto Play</label>
                  <select class="audioAutoPlay">
                    <option value="no">No</option>
                    <option value="autoplay">Yes</option>
                  </select>
                  <br><br><hr><br>
                  <label>Loop</label>
                  <select class="audioLoop">
                    <option value="no">No</option>
                    <option value="loop">Yes</option>
                  </select> 
                  <br><br><hr><br>
                  <label>Audio Controls</label>
                  <select class="audioControls">
                    <option value="controls">Yes</option>
                    <option value="no">No</option>
                  </select> 
                </div>
              </div>
              <div class="pbp-widgets wdt-pbPostSlider pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/post-slider.php'); ?>
              </div>
              <div class="pbp-widgets wdt-icons pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/icons-widget.php'); ?>
              </div>
              <div class="pbp-widgets wdt-counter pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/counter-widget.php'); ?>
              </div>
              <div class="pbp-widgets wdt-card pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/card-widget.php'); ?>
              </div>
              <div class="pbp-widgets wdt-testimonial pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/testimonial-widget.php'); ?>
              </div>
              <div class="pbp-widgets wdt-shortcode pbp_form" style="display: none;">
                  <br>
                  <label>Enter Shortcode :</label>
                  <input type="text" class="shortCodeInput" id="shortCodeInput" style="width: 250px;">
                  <br>
                  <br>
                  <br>
                  <br>
                  <p style="font-size: 14px;"><i>Note :</i> Use onle one shortcode using multiple shortcodes in a single widget might cause errors. </p>
                  <br>
              </div>
              <div class="pbp-widgets wdt-countdown pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-countdown.php'); ?>
              </div>
              <div class="pbp-widgets wdt-imageSlider pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-slider.php'); ?>
              </div>
              <div class="pbp-widgets wdt-progressBar pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-progressBar.php'); ?>
              </div>
              <div class="pbp-widgets wdt-pricing pbp_form" style="display: none; width: ">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-pricing.php'); ?>
              </div>
              <div class="pbp-widgets wdt-imgCarousel pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-imgCarousel.php'); ?>
              </div>
              <div class="pbp-widgets wdt-wooCommerceProducts pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-wooCommerceProducts.php'); ?>
              </div>
              <div class="pbp-widgets wdt-iconList pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-iconList.php'); ?>
              </div>
              <div class="pbp-widgets wdt-formBuilder pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-formBuilder.php'); ?>
              </div>
              <div class="pbp-widgets wdt-spacer pbp_form" style="display: none;">
                <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">

                  <div>
                      <h4>Space 
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                          <label></label>
                        <input type="number" class="widgetVerticalSpaceValue"> px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                          <label></label>
                        <input type="number" class="widgetVerticalSpaceValueTablet"> px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                          <label></label>
                        <input type="number" class="widgetVerticalSpaceValueMobile"> px
                      </div>
                  </div>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
              <div class="pbp-widgets wdt-breaker pbp_form" style="display: none;">
                <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
                  <label>Style :</label>
                  <select class="widgetBreakerStyle">
                    <option value="solid">Solid</option>
                    <option value="dotted">Dotted</option>
                    <option value="dashed">Dashed</option>
                    <option value="double">Double</option>
                  </select>
                  <br><br><hr><br>
                  <label> Weight : </label>
                  <input type="number" class="widgetBreakerWeight"  min="1" max="100">
                  <br><br><hr><br>
                  <label>Color :</label>
                  <input type="text" id="widgetBreakerColor" class="color-picker_btn_two widgetBreakerColor" data-alpha='true'  >
                  <br><br><hr><br>
                  <label> Width : </label>
                  <input type="number" class="widgetBreakerWidth" min="1" max="100">
                  <br><br><hr><br>
                  <label>Alignment :</label>
                  <select class="widgetBreakerAlignment">
                    <option value="left">Left</option>
                    <option value="center">Center</option>
                    <option value="right">Right</option>
                  </select>
                  <br><br><hr><br>
                  <label> Space : </label>
                  <input type="number" class="widgetBreakerSpacing">
                  <br><br><hr><br>
                </div>
              </div>
              <div class="pbp-widgets wdt-text pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-text.php'); ?>
              </div>
              <div class="pbp-widgets wdt-embededVideo pbp_form" style="display: none;">
                <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widget-embededVideo.php'); ?>
              </div>
            </div>
          </div>
          <div id="tabAdvancedWidgetOptions" class="tab" style="min-height:400px;">
            <div class="wdt-right" style="width: 100% !important;">
              <div class="PB_accordion">
                <h4>Widget Background</h4>
                <div>
                  <div class="wdt-fields pbp_form" style="margin:10px 0 0 5px; width: 100%;">
                    <h4>Background</h4>
                    <div style="width:350px">
                        <div class="tabs">
                            <ul class="tab-links tabEditFields">
                                <li class="active"><a href="#defaultWidgBgOptions" class="tab_link">Default</a></li>
                                <li><a href="#hoverWidgBgOptions" class="tab_link">Hover</a></li>
                            </ul>
                            <div class="tab-content" style="box-shadow: none;">
                                <div id="defaultWidgBgOptions" class="tab active">
                                    <br>
                                    <br>
                                    <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                                        <p style="display: inline;"> Background Type </p>
                                        <div class="iputTabNav">
                                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                                <label for="inputIDWidg1"> <i class="fa fa-paint-brush"></i></label>
                                                <input type="radio" name="widgBackgroundType" id="inputIDWidg1" value='solid' class="widgBackgroundType widgBackgroundTypeSolid widgOptionsFields tabbedInputRadio"> </div>
                                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                                <label for="inputIDWidg2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                                <input type="radio" name="widgBackgroundType" id="inputIDWidg2" class="widgBackgroundType widgBackgroundTypeGradient widgOptionsFields tabbedInputRadio" value="gradient"> </div>
                                        </div>
                                        <div class="popb_input_tabContent">
                                            <div class="content_popb_tab_1 popb_tab_content popb_widg_fields_container ">
                                              <br>
                                              <br>
                                              <br>
                                              <label>Color :</label>
                                              <input type="text" name="widgetBgColor" class="color-picker_btn_two widgetBgColor" data-alpha='true' id="widgetBgColor" value='#fff'>
                                              <br>
                                              <br>
                                              <label>Image :</label>
                                              <input id="image_location1" type="text" class=" widgBgImg upload_image_button2994" name='lpp_add_img_1' value='' placeholder='Insert Image URL here' />
                                              <br>
                                              <br>
                                              <label></label>
                                              <input id="image_location1" type="button" class="upload_bg pb_upload_btn" data-id="2994" value="Upload" style="" />
                                              <br>
                                            </div>
                                            <div class="content_popb_tab_2 popb_tab_content popb_widg_fields_container ">
                                              <br>
                                              <br>
                                              <br>
                                              <label>First Color </label>
                                              <input type="text" name="widgGradientColorFirst" class="color-picker_btn_two widgGradientColorFirst" data-alpha='true' id="widgGradientColorFirst" value='#fff'>
                                              <p>Location</p>
                                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='widgGradientLocationFirst'></div>
                                              <input type="number" class="widgGradientLocationFirst">
                                              <br>
                                              <br>
                                              <hr>
                                              <br>
                                              <br>
                                              <label>Second Color </label>
                                              <input type="text" name="widgGradientColorSecond" class="color-picker_btn_two widgGradientColorSecond" data-alpha='true' id="widgGradientColorSecond" value='#fff'>
                                              <p>Location</p>
                                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='widgGradientLocationSecond'></div>
                                              <input type="number" class="widgGradientLocationSecond">
                                              <br>
                                              <br>
                                              <hr>
                                              <br>
                                              <br>
                                              <label>Type </label>
                                              <select class="widgGradientType">
                                                <option value="linear">Linear</option>
                                                <option value="radial">Radial</option>
                                              </select>
                                              <br>
                                              <br>
                                              <div class="radialInputWidg" style="display: none;">
                                                    <br>
                                                    <label>Position </label>
                                                    <select class="widgGradientPosition">
                                                        <option value="center center">Center Center</option>
                                                        <option value="center left">Center Left</option>
                                                        <option value="center right">Center Right</option>
                                                        <option value="top center">Top Center</option>
                                                        <option value="top left">Top Left</option>
                                                        <option value="top right">Top Right</option>
                                                        <option value="bottom center">Bottom Center</option>
                                                        <option value="bottom left">Bottom Left</option>
                                                        <option value="bottom right">Bottom Right</option>
                                                    </select>
                                                    <br>
                                                    <br>
                                              </div>
                                              <div class="linearInputWidg" style="display: none;">
                                                    <p>Angle</p>
                                                    <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='widgGradientAngle'></div>
                                                    <input type="number" class="widgGradientAngle"> </div>
                                              <br>
                                              <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hoverWidgBgOptions" class="tab">
                                    <br>
                                    <br>
                                    <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalwidg POPBInputHoverwidg">
                                        <p style="display: inline;"> Background Type </p>
                                        <div class="iputTabNav">
                                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                                <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                                                <input type="radio" name="widgBackgroundTypeHover" id="inputIDHover1" class="widgBackgroundTypeHover widgBackgroundTypeSolidHover widgOptionsFields tabbedInputRadio" value='solid'> </div>
                                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                                <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                                <input type="radio" name="widgBackgroundTypeHover" id="inputIDHover2" class="widgBackgroundTypeHover widgBackgroundTypeGradientHover  widgOptionsFields tabbedInputRadio" value="gradient"> </div>
                                        </div>
                                        <div class="popb_input_tabContent">
                                            <div class="content_popb_tab_1 popb_tab_content popb_widg_fields_container">
                                                <br>
                                                <br>
                                                <label>Color :</label>
                                                <input type="text" name="widgBgColorHover" class="color-picker_btn_two widgBgColorHover" data-alpha='true' id="widgBgColorHover" value='#fff'>
                                                <br>
                                            </div>
                                            <div class="content_popb_tab_2 popb_tab_content popb_widg_fields_container">
                                                <br>
                                                <br>
                                                <br>
                                                <label>First Color </label>
                                                <input type="text" name="widgGradientColorFirstHover" class="color-picker_btn_two widgGradientColorFirstHover" data-alpha='true' id="widgGradientColorFirstHover" value='#fff'>
                                                <p>Location</p>
                                                <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='widgGradientLocationFirstHover'></div>
                                                <input type="number" class="widgGradientLocationFirstHover">
                                                <br>
                                                <br>
                                                <hr>
                                                <br>
                                                <br>
                                                <label>Second Color </label>
                                                <input type="text" name="widgGradientColorSecondHover" class="color-picker_btn_two widgGradientColorSecondHover" data-alpha='true' id="widgGradientColorSecondHover" value='#fff'>
                                                <p>Location</p>
                                                <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='widgGradientLocationSecondHover'></div>
                                                <input type="number" class="widgGradientLocationSecondHover">
                                                <br>
                                                <br>
                                                <hr>
                                                <br>
                                                <br>
                                                <label>Type </label>
                                                <select class="widgGradientTypeHover">
                                                    <option value="linear">Linear</option>
                                                    <option value="radial">Radial</option>
                                                </select>
                                                <br>
                                                <br>
                                                <div class="radialInputWidgHover" style="display: none;">
                                                    <br>
                                                    <label>Position </label>
                                                    <select class="widgGradientPositionHover">
                                                        <option value="center center">Center Center</option>
                                                        <option value="center left">Center Left</option>
                                                        <option value="center right">Center Right</option>
                                                        <option value="top center">Top Center</option>
                                                        <option value="top left">Top Left</option>
                                                        <option value="top right">Top Right</option>
                                                        <option value="bottom center">Bottom Center</option>
                                                        <option value="bottom left">Bottom Left</option>
                                                        <option value="bottom right">Bottom Right</option>
                                                    </select>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="linearInputWidgHover" style="display: none;">
                                                    <p>Angle</p>
                                                    <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='widgGradientAngleHover'></div>
                                                    <input type="number" class="widgGradientAngleHover"> </div>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <label>Hover Animation :</label>
                                    <select class="widgetHoverAnimation" style="width: 70px">
                                      <option value="">None</option>
                                      <optgroup label="Attention Seekers">
                                        <option value="bounce">bounce</option>
                                        <option value="flash">flash</option>
                                        <option value="pulse">pulse</option>
                                        <option value="rubberBand">rubberBand</option>
                                        <option value="shake">shake</option>
                                        <option value="swing">swing</option>
                                        <option value="tada">tada</option>
                                        <option value="wobble">wobble</option>
                                        <option value="jello">jello</option>
                                      </optgroup>
                                      <optgroup label="Flippers">
                                        <option value="flip">flip</option>
                                        <option value="flipInX">flipInX</option>
                                        <option value="flipInY">flipInY</option>
                                      </optgroup>
                                    </select>
                                    <br>
                                    <br>
                                    <hr>
                                    <br>
                                    <p>Transition Duration</p>
                                    <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='widgHoverTransitionDuration'></div>
                                    <input type="number" class="widgHoverTransitionDuration">
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
                <h4>Widget Display Options</h4>
                <div>
                    <div class="wdt-fields pbp_form" style="width: 100%;">
                      <br><br>
                      <label>Widget Animation :</label>
                      <select class="widgetAnimation" style="width: 70px">
                        <option value="">None</option>
                        <optgroup label="Attention Seekers">
                          <option value="bounce">bounce</option>
                          <option value="flash">flash</option>
                          <option value="pulse">pulse</option>
                          <option value="rubberBand">rubberBand</option>
                          <option value="shake">shake</option>
                          <option value="swing">swing</option>
                          <option value="tada">tada</option>
                          <option value="wobble">wobble</option>
                          <option value="jello">jello</option>
                        </optgroup>

                        <optgroup label="Bouncing Entrances">
                          <option value="bounceIn">bounceIn</option>
                          <option value="bounceInDown">bounceInDown</option>
                          <option value="bounceInLeft">bounceInLeft</option>
                          <option value="bounceInRight">bounceInRight</option>
                          <option value="bounceInUp">bounceInUp</option>
                        </optgroup>

                        <optgroup label="Fading Entrances">
                          <option value="fadeIn">fadeIn</option>
                          <option value="fadeInDown">fadeInDown</option>
                          <option value="fadeInDownBig">fadeInDownBig</option>
                          <option value="fadeInLeft">fadeInLeft</option>
                          <option value="fadeInLeftBig">fadeInLeftBig</option>
                          <option value="fadeInRight">fadeInRight</option>
                          <option value="fadeInRightBig">fadeInRightBig</option>
                          <option value="fadeInUp">fadeInUp</option>
                          <option value="fadeInUpBig">fadeInUpBig</option>
                        </optgroup>

                        <optgroup label="Flippers">
                          <option value="flip">flip</option>
                          <option value="flipInX">flipInX</option>
                          <option value="flipInY">flipInY</option>
                        </optgroup>

                        <optgroup label="Lightspeed">
                          <option value="lightSpeedIn">lightSpeedIn</option>
                        </optgroup>

                        <optgroup label="Rotating Entrances">
                          <option value="rotateIn">rotateIn</option>
                          <option value="rotateInDownLeft">rotateInDownLeft</option>
                          <option value="rotateInDownRight">rotateInDownRight</option>
                          <option value="rotateInUpLeft">rotateInUpLeft</option>
                          <option value="rotateInUpRight">rotateInUpRight</option>
                        </optgroup>

                        <optgroup label="Sliding Entrances">
                          <option value="slideInUp">slideInUp</option>
                          <option value="slideInDown">slideInDown</option>
                          <option value="slideInLeft">slideInLeft</option>
                          <option value="slideInRight">slideInRight</option>
                        </optgroup>
                        
                        <optgroup label="Zoom Entrances">
                          <option value="zoomIn">zoomIn</option>
                          <option value="zoomInDown">zoomInDown</option>
                          <option value="zoomInLeft">zoomInLeft</option>
                          <option value="zoomInRight">zoomInRight</option>
                          <option value="zoomInUp">zoomInUp</option>
                        </optgroup>
                        

                        <optgroup label="Specials">
                          <option value="rollIn">rollIn</option>
                        </optgroup>
                      </select>
                      <div class="widgetAnimateBtn">Animate</div>
                      <br><br><br>
                      <div>
                          <p>Display Inline
                            <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                            <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                            <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                          </p>
                          <div class="responsiveOps responsiveOptionsContainterLarge">
                            <label></label>
                            <select class="widgetIsInline" >
                              <option value="true">Yes</option>
                              <option value="false">No</option>
                            </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                            <label></label>
                            <select class="widgetIsInlineTablet" >
                              <option value="true">Yes</option>
                              <option value="false">No</option>
                            </select>
                          </div>
                          <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                            <label></label>
                            <select class="widgetIsInlineMobile" >
                              <option value="true">Yes</option>
                              <option value="false">No</option>
                            </select>
                          </div>
                      </div>
                      <br><br><hr><br>
                      <label>Custom Widget Class : </label>
                      <input type="text" class="widgetCustomClass">
                      <div>
                        <br><br><hr><br>
                        <h4>Hide Widget  
                          <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                          <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                          <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                        </h4>
                        <div class="responsiveOps responsiveOptionsContainterLarge">
                          <label>Desktop </label>
                          <select class=" widgHideOnDesktop">
                            <option value="show">Show</option>
                            <option value="hide">Hide</option>
                          </select>
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                          <label>Tablet </label>
                          <select class=" widgHideOnTablet">
                            <option value="show">Show</option>
                            <option value="hide">Hide</option>
                          </select>
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                          <label>Mobile </label>
                          <select class=" widgHideOnMobile">
                            <option value="show">Show</option>
                            <option value="hide">Hide</option>
                          </select>
                        </div>
                      </div>
                    </div>
                </div>
                <h4>Widget Margins & Paddings</h4>
                <div>
                    <div class="wdt-fields pbp_form" style="width: 100%;">
                      
                      <div>
                        <p>Widget Margin 
                          <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                          <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                          <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                        </p>
                        <div class="responsiveOps responsiveOptionsContainterLarge">
                          <input type="number" class="padding_inline_inp widgetMtop" placeholder="Top">
                      
                          <input type="number" class="padding_inline_inp widgetMbottom" placeholder="Bottom">
                          
                          <input type="number" class="padding_inline_inp widgetMleft" placeholder="Left">
                          
                          <input type="number" class="padding_inline_inp widgetMright" placeholder="Right"> %
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                          <input type="number" name="widgetMTopTablet" class="padding_inline_inp  widgetMTopTablet " id="widgetMTopTablet"  placeholder="Top" >
                          
                          <input type="number" name="widgetMBottomTablet" class="padding_inline_inp  widgetMBottomTablet " id="widgetMBottomTablet"  placeholder="Bottom">
                          
                          <input type="number" name="widgetMLeftTablet" class="padding_inline_inp  widgetMLeftTablet " id="widgetMLeftTablet"  placeholder="Left">
                          
                          <input type="number" name="widgetMRightTablet" class="padding_inline_inp  widgetMRightTablet " id="widgetMRightTablet"  placeholder="Right">
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                          <input type="number" name="widgetMTopMobile" class="padding_inline_inp  widgetMTopMobile " id="widgetMTopMobile"  placeholder="Top" >
                          
                          <input type="number" name="widgetMBottomMobile" class="padding_inline_inp  widgetMBottomMobile " id="widgetMBottomMobile"  placeholder="Bottom">
                          
                          <input type="number" name="widgetMLeftMobile" class="padding_inline_inp  widgetMLeftMobile " id="widgetMLeftMobile"  placeholder="Left">
                          
                          <input type="number" name="widgetMRightMobile" class="padding_inline_inp  widgetMRightMobile " id="widgetMRightMobile"  placeholder="Right">
                        </div>
                      </div>
                      <br>
                      <br>
                      <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                      <br>
                      <br>  
                      <br>
                      <hr>
                      <br>
                      <div>
                        <p>Widget Padding
                          <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                          <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                          <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                        </p>
                        <div class="responsiveOps responsiveOptionsContainterLarge">
                          <input type="number" class="padding_inline_inp widgetPtop" placeholder="Top">
                      
                          <input type="number" class="padding_inline_inp widgetPbottom" placeholder="Bottom">
                          
                          <input type="number" class="padding_inline_inp widgetPleft" placeholder="Left">
                          
                          <input type="number" class="padding_inline_inp widgetPright" placeholder="Right"> %
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                          <input type="number" name="widgetPTopTablet" class="padding_inline_inp  widgetPTopTablet " id="widgetPTopTablet"  placeholder="Top">
                          
                          <input type="number" name="widgetPBottomTablet" class="padding_inline_inp  widgetPBottomTablet " id="widgetPBottomTablet"  placeholder="Bottom">
                          
                          <input type="number" name="widgetPLeftTablet" class="padding_inline_inp  widgetPLeftTablet " id="widgetPLeftTablet"  placeholder="Left">
                          
                          <input type="number" name="widgetPRightTablet" class="padding_inline_inp  widgetPRightTablet " id="widgetPRightTablet"  placeholder="Right">
                        </div>
                        <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                          <input type="number" name="widgetPTopMobile" class="padding_inline_inp  widgetPTopMobile " id="widgetPTopMobile"  placeholder="Top">
                          
                          <input type="number" name="widgetPBottomMobile" class="padding_inline_inp  widgetPBottomMobile " id="widgetPBottomMobile"  placeholder="Bottom">
                          
                          <input type="number" name="widgetPLeftMobile" class="padding_inline_inp  widgetPLeftMobile " id="widgetPLeftMobile"  placeholder="Left">
                          
                          <input type="number" name="widgetPRightMobile" class="padding_inline_inp  widgetPRightMobile " id="widgetPRightMobile"  placeholder="Right">
                        </div>
                      </div>
                      <br>
                      <br>
                      <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                      <br>
                      <br>  
                      <br>
                      <hr>
                      <br>

                    </div>
                </div>
                <h4>Widget Border & Box Shadow</h4>
                <div>
                    <div class="wdt-fields pbp_form" style="width: 100%;">
                      <br>
                      <p>Border</p>
                      <br>
                      <label>Set Border Width: </label>
                      <input type="number" class="widgetBorderWidth" min="0" max="100" > px
                      <br>
                      <br>
                      <label>Set Border Style: </label>
                      <select class="widgetBorderStyle">
                        <option value="solid">Solid</option>
                        <option value="dotted">Dotted</option>
                        <option value="dashed">Dashed</option>
                        <option value="double">Double</option>
                      </select>
                      <br>
                      <br>
                      <label>Set Border Color : </label>
                      <input type="text" id="widgetBorderColor" class="color-picker_btn_two widgetBorderColor" data-alpha='true'  >
                      <br>
                      <br>
                      <label>Border Radius: </label>
                      <input type="number" class="widgetBorderRadius" min="0" max="100" > px
                      <br>
                      <br>
                      <hr>
                      <p>Box Shadow</p>
                      <br>
                      <label>Shadow Horizontal Position : </label>
                      <input type="number" class="widgetBoxShadowH"> px
                      <br>
                      <br>
                      <label>Shadow Vertcal Position : </label>
                      <input type="number" class="widgetBoxShadowV"> px
                      <br>
                      <br>
                      <label>Shadow Distance (Blur) : </label>
                      <input type="number" class="widgetBoxShadowBlur"> px
                      <br>
                      <br>
                      <br>
                      <label>Shadow Color : </label>
                      <input type="text" id="widgetBoxShadowColor" class="color-picker_btn_two widgetBoxShadowColor" data-alpha='true'  >
                    </div>
                </div>
                <h4>Widget Custom CSS</h4>
                <div>
                  <label>Custom Styling (CSS) :</label>
                  <br>
                  <br>
                  <br>
                  <textarea  style="min-width: 250px; min-height: 250px;" class="widgetStyling"></textarea>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <div id="tabWidgetBlocks" class="tab" style="min-height:400px;">
            <?php include(ULPB_PLUGIN_PATH.'admin/views/UI/widgets/widgetBlocks.php'); ?>
          </div>
          
        </div>
      </div> 
    

    <div class="btn closeWidgetPopup" style="display: none;"><span class="dashicons dashicons-yes closeWidgetPopupIcon"></span></div>
    </div>
    <br>
    <br>
    <div  class="editWidgetSaveButton" style="">
      <div id="editWidgetSaveVisible" data-col_id="column1"><span  class="dashicons dashicons-arrow-left editSaveVisibleIcon" data-col_id="column1"></span></div><p></p><br></div>

  </div>
</div>