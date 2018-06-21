<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="lpp_modal_column edit_column">
  <div class="lpp_modal_wrapper_column">
    <div class="edit_options_left_row">
      <div class="tabs colEditTabs">
        <ul class="tab-links" style="background: #2fa8f9;">
          <li style="margin: 0;"  class="active colOpsTabBtn"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabColumnOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Column Options</a></li>
          
          <li style="margin: 0;" class="colNewWidgetTabBtn"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabColumnWidgets" class="tab_link"> <i class="fa  fa-plus-square" style="font-size: 20px;"></i> <br> New Widget</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabColumnWidgetArea" class="tab_link"> <i class="fa fa-puzzle-piece" style="font-size: 20px;"></i> <br> Column Widgets</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabColumnOptions" class="tab active" style="min-height:400px;">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
            <br>
            <div>
                <h4>Column Width 
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label></label>
                  <input type="number" name="columnWidth" class="columnWidth colOptionsFields" id="columnWidth" value='0'>%
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label></label>
                  <input type="number" name="columnWidthTablet" class="columnWidthTablet colOptionsFields" id="columnWidthTablet" >%
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label></label>
                  <input type="number" name="columnWidthMobile" class="columnWidthMobile colOptionsFields" id="columnWidthMobile" >%
                </div>
            </div>
            <hr>
            <h4>Background</h4>
            <div>
                <div class="tabs">
                    <ul class="tab-links tabEditFields">
                        <li class="active"><a href="#defaultColBgOptions" class="tab_link">Default</a></li>
                        <li><a href="#hoverColBgOptions" class="tab_link">Hover</a></li>
                    </ul>
                    <div class="tab-content" style="box-shadow: none;">
                        <div id="defaultColBgOptions" class="tab active">
                            <br>
                            <br>
                            <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                                <p style="display: inline;"> Background Type </p>
                                <div class="iputTabNav">
                                    <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                        <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                                        <input type="radio" name="colBackgroundType" id="inputID1" value='solid' class="colBackgroundType colBackgroundTypeSolid colOptionsFields tabbedInputRadio"> </div>
                                    <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                        <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                        <input type="radio" name="colBackgroundType" id="inputID2" class="colBackgroundType colBackgroundTypeGradient colOptionsFields tabbedInputRadio" value="gradient"> </div>
                                </div>
                                <div class="popb_input_tabContent">
                                    <div class="content_popb_tab_1 popb_tab_content popb_col_fields_container ">
                                        <br>
                                        <br>
                                        <br>
                                        <label>Color :</label>
                                        <input type="text" name="columnBgColor" class="color-picker_btn_two columnBgColor" data-alpha='true' id="columnBgColor" value=''>
                                        <br>
                                        <br>
                                        <label>Image :</label>
                                        <input id="image_location1" type="text" class=" colBgImg upload_image_button2993" name='lpp_add_img_1' value='' placeholder='Insert Image URL here' />
                                        <br>
                                        <br>
                                        <label></label>
                                        <input id="image_location1" type="button" class="upload_bg pb_upload_btn" data-id="2993" value="Upload" style="" />
                                        <br>
                                    </div>
                                    <div class="content_popb_tab_2 popb_tab_content popb_col_fields_container ">
                                        <br>
                                        <br>
                                        <br>
                                        <label>First Color </label>
                                        <input type="text" name="colGradientColorFirst" class="color-picker_btn_two colGradientColorFirst" data-alpha='true' id="colGradientColorFirst" value=''>
                                        <p>Location</p>
                                        <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='colGradientLocationFirst'></div>
                                        <input type="number" class="colGradientLocationFirst">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                        <label>Second Color </label>
                                        <input type="text" name="colGradientColorSecond" class="color-picker_btn_two colGradientColorSecond" data-alpha='true' id="colGradientColorSecond" value=''>
                                        <p>Location</p>
                                        <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='colGradientLocationSecond'></div>
                                        <input type="number" class="colGradientLocationSecond">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                        <label>Type </label>
                                        <select class="colGradientType">
                                            <option value="linear">Linear</option>
                                            <option value="radial">Radial</option>
                                        </select>
                                        <br>
                                        <br>
                                        <div class="radialInputCol" style="display: none;">
                                            <br>
                                            <label>Position </label>
                                            <select class="colGradientPosition">
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
                                        <div class="linearInputCol" style="display: none;">
                                            <p>Angle</p>
                                            <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='colGradientAngle'></div>
                                            <input type="number" class="colGradientAngle"> </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hoverColBgOptions" class="tab">
                            <br>
                            <br>
                            <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalcol POPBInputHovercol">
                                <p style="display: inline;"> Background Type </p>
                                <div class="iputTabNav">
                                    <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                        <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                                        <input type="radio" name="colBackgroundTypeHover" id="inputIDHover1" class="colBackgroundTypeHover colBackgroundTypeSolidHover colOptionsFields tabbedInputRadio" value='solid'> </div>
                                    <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                        <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                        <input type="radio" name="colBackgroundTypeHover" id="inputIDHover2" class="colBackgroundTypeHover colBackgroundTypeGradientHover  colOptionsFields tabbedInputRadio" value="gradient"> </div>
                                </div>
                                <div class="popb_input_tabContent">
                                    <div class="content_popb_tab_1 popb_tab_content popb_col_fields_container">
                                        <br>
                                        <br>
                                        <label>Color :</label>
                                        <input type="text" name="colBgColorHover" class="color-picker_btn_two colBgColorHover" data-alpha='true' id="colBgColorHover" value=''>
                                        <br>
                                    </div>
                                    <div class="content_popb_tab_2 popb_tab_content popb_col_fields_container">
                                        <br>
                                        <br>
                                        <br>
                                        <label>First Color </label>
                                        <input type="text" name="colGradientColorFirstHover" class="color-picker_btn_two colGradientColorFirstHover" data-alpha='true' id="colGradientColorFirstHover" value=''>
                                        <p>Location</p>
                                        <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='colGradientLocationFirstHover'></div>
                                        <input type="number" class="colGradientLocationFirstHover">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                        <label>Second Color </label>
                                        <input type="text" name="colGradientColorSecondHover" class="color-picker_btn_two colGradientColorSecondHover" data-alpha='true' id="colGradientColorSecondHover" value=''>
                                        <p>Location</p>
                                        <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='colGradientLocationSecondHover'></div>
                                        <input type="number" class="colGradientLocationSecondHover">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                        <label>Type </label>
                                        <select class="colGradientTypeHover">
                                            <option value="linear">Linear</option>
                                            <option value="radial">Radial</option>
                                        </select>
                                        <br>
                                        <br>
                                        <div class="radialInputColHover" style="display: none;">
                                            <br>
                                            <label>Position </label>
                                            <select class="colGradientPositionHover">
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
                                        <div class="linearInputColHover" style="display: none;">
                                            <p>Angle</p>
                                            <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='colGradientAngleHover'></div>
                                            <input type="number" class="colGradientAngleHover"> </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <p>Transition Duration</p>
                            <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='colHoverTransitionDuration'></div>
                            <input type="number" class="colHoverTransitionDuration">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <br><hr>
              <div>
                <h4>Column Margin   
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <input type="number" name="columnMarginTop" class=" padding_inline_inp columnMarginTop colOptionsFields" id="columnMarginTop" value='0' placeholder="Top" >
                   
                  <input type="number" name="columnMarginBottom" class=" padding_inline_inp columnMarginBottom colOptionsFields" id="columnMarginBottom" value='0' placeholder="Bottom">
                     
                  <input type="number" name="columnMarginLeft" class=" padding_inline_inp columnMarginLeft colOptionsFields" id="columnMarginLeft" value='0' placeholder="Left">
                     
                  <input type="number" name="columnMarginRight" class=" padding_inline_inp columnMarginRight colOptionsFields" id="columnMarginRight" value='0' placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <input type="number" name="columnMarginTopTablet" class="padding_inline_inp  columnMarginTopTablet colOptionsFields" id="columnMarginTopTablet"  placeholder="Top" >
                  
                  <input type="number" name="columnMarginBottomTablet" class="padding_inline_inp  columnMarginBottomTablet colOptionsFields" id="columnMarginBottomTablet"  placeholder="Bottom">
                  
                  <input type="number" name="columnMarginLeftTablet" class="padding_inline_inp  columnMarginLeftTablet colOptionsFields" id="columnMarginLeftTablet"  placeholder="Left">
                  
                  <input type="number" name="columnMarginRightTablet" class="padding_inline_inp  columnMarginRightTablet colOptionsFields" id="columnMarginRightTablet"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <input type="number" name="columnMarginTopMobile" class="padding_inline_inp  columnMarginTopMobile colOptionsFields" id="columnMarginTopMobile"  placeholder="Top" >
                  
                  <input type="number" name="columnMarginBottomMobile" class="padding_inline_inp  columnMarginBottomMobile colOptionsFields" id="columnMarginBottomMobile"  placeholder="Bottom">
                  
                  <input type="number" name="columnMarginLeftMobile" class="padding_inline_inp  columnMarginLeftMobile colOptionsFields" id="columnMarginLeftMobile"  placeholder="Left">
                  
                  <input type="number" name="columnMarginRightMobile" class="padding_inline_inp  columnMarginRightMobile colOptionsFields" id="columnMarginRightMobile"  placeholder="Right">
                </div>
              </div>
              <br>
              <br>
              <span class="ulp-note">The unit is percentage so set values accordingly.</span>
              <br>
              <br>  
              <br>
              <hr>

              <div>
                <h4>Column Padding
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <input type="number" name="columnPaddingTop" class=" padding_inline_inp columnPaddingTop colOptionsFields" id="columnPaddingTop" value='0' placeholder="Top" >
                
                  <input type="number" name="columnPaddingBottom" class=" padding_inline_inp columnPaddingBottom colOptionsFields" id="columnPaddingBottom" value='0' placeholder="Bottom">
                  
                  <input type="number" name="columnPaddingLeft" class=" padding_inline_inp columnPaddingLeft colOptionsFields" id="columnPaddingLeft" value='0' placeholder="Left">
                  
                  <input type="number" name="columnPaddingRight" class=" padding_inline_inp columnPaddingRight colOptionsFields" id="columnPaddingRight" value='0' placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <input type="number" name="columnPaddingTopTablet" class="padding_inline_inp  columnPaddingTopTablet colOptionsFields" id="columnPaddingTopTablet"  placeholder="Top">
                  
                  <input type="number" name="columnPaddingBottomTablet" class="padding_inline_inp  columnPaddingBottomTablet colOptionsFields" id="columnPaddingBottomTablet"  placeholder="Bottom">
                  
                  <input type="number" name="columnPaddingLeftTablet" class="padding_inline_inp  columnPaddingLeftTablet colOptionsFields" id="columnPaddingLeftTablet"  placeholder="Left">
                  
                  <input type="number" name="columnPaddingRightTablet" class="padding_inline_inp  columnPaddingRightTablet colOptionsFields" id="columnPaddingRightTablet"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <input type="number" name="columnPaddingTopMobile" class="padding_inline_inp  columnPaddingTopMobile colOptionsFields" id="columnPaddingTopMobile"  placeholder="Top">
                  
                  <input type="number" name="columnPaddingBottomMobile" class="padding_inline_inp  columnPaddingBottomMobile colOptionsFields" id="columnPaddingBottomMobile"  placeholder="Bottom">
                  
                  <input type="number" name="columnPaddingLeftMobile" class="padding_inline_inp  columnPaddingLeftMobile colOptionsFields" id="columnPaddingLeftMobile"  placeholder="Left">
                  
                  <input type="number" name="columnPaddingRightMobile" class="padding_inline_inp  columnPaddingRightMobile colOptionsFields" id="columnPaddingRightMobile"  placeholder="Right">
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
              <label>Custom Column Class :</label>
              <input type="text" class="colOptionsFields columnCustomClass">
              <br>
              <br>  
              <br>
              <hr>
              <br>
              <div>
                <h4>Hide Column  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label>Desktop </label>
                  <select class="colOptionsFields colHideOnDesktop">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label>Tablet </label>
                  <select class="colOptionsFields colHideOnTablet">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label>Mobile </label>
                  <select class="colOptionsFields colHideOnMobile">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
              </div>
              <br>
              <br>  
              <br>
              <hr>
              <br>
              <div class="PB_accordion">
                <h4>Box Shadow & Border </h4>
                <div>
                    <div class="pbp_form" style="width: 100%;">
                      <br>
                      <p>Border</p>
                      <br>
                      <label>Border Width : </label>
                      <input type="number" class="colBorderWidth colOptionsFields">px
                      <br>
                      <br>
                      <label>Border Style : </label>
                      <select class="colBorderStyle colOptionsFields">
                        <option value="solid">Solid</option>
                        <option value="dotted">Dotted</option>
                        <option value="dashed">Dashed</option>
                        <option value="double">Double</option>
                      </select>
                      <br>
                      <br>
                      <label>Border Color : </label>
                      <input type="text" id="colBorderColor" class="color-picker_btn_two  colBorderColor colOptionsFields">
                      <br>
                      <label>Border Radius : </label>
                      <input type="number" class="colBorderRadius colOptionsFields">px
                      <br>
                      <hr>
                      <br>
                      <br>
                      <p>Box Shadow</p>
                      <br>
                      <label>Shadow Horizontal Position : </label>
                      <input type="number" class="colOptionsFields colBoxShadowH"> px
                      <br>
                      <br>
                      <label>Shadow Vertcal Position : </label>
                      <input type="number" class="colOptionsFields colBoxShadowV"> px
                      <br>
                      <br>
                      <label>Shadow Distance (Blur) : </label>
                      <input type="number" class="colOptionsFields colBoxShadowBlur"> px
                      <br>
                      <br>
                      <br>
                      <label>Shadow Color : </label>
                      <input type="text" id="colBoxShadowColor" class="color-picker_btn_two  colBoxShadowColor colOptionsFields" data-alpha='true'  >
                    </div>
                </div>
              </div>


            </div>
          </div>
          <div id="tabColumnWidgetArea" class="tab" style="min-height:400px;">

            <!-- <div class="btn add-widgets"> <span class="dashicons dashicons-plus"></span> Add Widget Area</div> -->
            <div class="tabs">
              <ul class="tab-links">
                <li class="active"><a href="#colWidgetsTab" class="tab_link">Widgets</a></li>
                <li><a href="#columnTabCustomCss" class="tab_link">Custom CSS</a></li>
              </ul>
              <div class="tab-content">
                <div id="colWidgetsTab" class="tab active" style="min-height:400px;">
                  <ul id="widgets">
                    <script type="text/template" id="widget-template"></script>
                  </ul> 
                </div>
                <div id="columnTabCustomCss" class="tab">
                  <div id="PbColaceEditorCSS"  class="columnCustomStyling"></div>
                </div>
              </div>
            </div>
          </div>
          <div id="tabColumnWidgets" class="tab" style="min-height:550px;">
            
            <div class="edit_column_widgets">
            <div class="tabs">
              <ul class="tab-links">
              </ul>
              <div class="tab-content" style="padding:10px 0px 15px 15px; background: #fff;">
                <input type="text" class="pbSearchWidget" placeholder="Search a widget" style="width: 90%;">
                <?php
                    if (is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
                        ?>
                          <div style="display: inline-block; width: 49%; float: left;">
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-text"><i class="fa fa-text-width"></i> <br> Text Widget</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-img"><i class="fa fa-picture-o"></i> <br> Image</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-menu"><i class="fa fa-navicon"></i> <br> Menu</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-formBuilder"> <i class="fa fa-wpforms"></i> <br> Form Builder</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-video"> <i class="fa fa-video-camera"></i> <br>  Video</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-audio"> <i class="fa fa-file-audio-o"></i> <br>  Audio</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-shortcode"> <i class="fa fa-code"></i> <br> ShortCode</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-break"> <i class="fa fa-ellipsis-h"></i> <br> Break </div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-imageSlider"><i class="fa fa-file-image-o"></i> <br> Image Slider</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-pricing"><i class="fa fa-tags"></i> <br> Pricing</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-imgCarousel"><i class="fa fa-image"></i><i class="fa fa-image"></i>  <br> Image Carousel</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-iconList"> <i class="fa fa-list"></i> <br> Icon List</div>
                            
                          </div>
                          <div style="display: inline-block; width: 49%;">
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-WYSIWYG"><i class="fa fa-file-text-o"></i> <br> Text Editor</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-btn-gen"><i class="fa fa-mouse-pointer"></i> <br> Button</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-form"> <i class="fa fa-envelope-o"></i> <br> Subscribe Form</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-postSlider"><i class="fa fa-file-image-o"></i> <br> Posts Slider</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-embededVideo"> <i class="fa fa-youtube-play"></i> <br> Embed Video </div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-icons"><i class="fa fa-fonticons"></i> <br> Icons</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-cards"><i class="fa fa-fonticons"></i> <br> Card</div>
                            
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-testimonial"><i class="fa fa fa-quote-left"></i> <br> Testimonial</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-spacer"> <i class="fa fa-arrows-v"></i> <br> Spacer </div>

                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-progressBar"><i class="fa fa-align-left"></i> <br> Progress Bar </div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-countdown"><i class="fa fa-sort-numeric-desc"></i> <br> Countdown</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-counter"> <i class="fa fa-sort-numeric-desc"></i> <br> Counter</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-wooCommerceProducts"> <i class="fa fa-shopping-cart"></i> <br> WooCommerce Products</div>
                          </div>
                        <?php 
                    }else{
                        ?>
                          <div style="display: inline-block; width: 49%; float: left;">
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-text"><i class="fa fa-text-width"></i> <br> Text Widget</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-img"><i class="fa fa-picture-o"></i> <br> Image</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-menu"><i class="fa fa-navicon"></i> <br> Menu</div>
                            <div class="widget POPB_widget" data-type="wigt-video"> <i class="fa fa-video-camera"></i> <br>  Video</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-audio"> <i class="fa fa-file-audio-o"></i> <br>  Audio</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-break"> <i class="fa fa-ellipsis-h"></i> <br> Break </div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-formBuilder"> <i class="fa fa-wpforms"></i> <br> Form Builder <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-shortcode"> <i class="fa fa-code"></i> <br> ShortCode <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-imageSlider"><i class="fa fa-file-image-o"></i> <br> Image Slider <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-pricing"><i class="fa fa-tags"></i> <br> Pricing <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-imgCarousel"><i class="fa fa-image"></i><i class="fa fa-image"></i>  <br> Image Carousel <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-iconList"> <i class="fa fa-list"></i> <br> Icon List <p>Pro Only</p></div>
                            
                          </div>
                          <div style="display: inline-block; width: 49%;">
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-WYSIWYG"><i class="fa fa-file-text-o"></i> <br> Text Editor</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-btn-gen"><i class="fa fa-mouse-pointer"></i> <br> Button</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-form"> <i class="fa fa-envelope-o"></i> <br> Subscribe Form</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-postSlider"><i class="fa fa-file-image-o"></i> <br> Posts Slider</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-embededVideo"> <i class="fa fa-youtube-play"></i> <br> Embed Video </div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-icons"><i class="fa fa-fonticons"></i> <br> Icons</div>
                            <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-spacer"> <i class="fa fa-arrows-v"></i> <br> Spacer </div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-cards"><i class="fa fa-fonticons"></i> <br> Card <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-testimonial"><i class="fa fa fa-quote-left"></i> <br> Testimonial <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-progressBar"><i class="fa fa-align-left"></i> <br> Progress Bar <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-countdown"><i class="fa fa-sort-numeric-desc"></i> <br> Countdown <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-counter"> <i class="fa fa-sort-numeric-desc"></i> <br> Counter <p>Pro Only</p></div>
                            <div class="widget POPB_widget prem-widget" data-widgType="wigt-pb-wooCommerceProducts"> <i class="fa fa-shopping-cart"></i> <br> WooCommerce Products <p>Pro Only</p></div>
                          </div>
                        <?php
                    }

                ?>
                

                  <div style="display: inline-block; width: 49%; float: left;">
                    
                  </div>

                  <div style="display: inline-block; width: 49%;">
                    
                  </div>
                </div>
            
                </div>
              </div>
              </div>

          </div>
        </div>
      </div>
    </div>
    
    
    </div>
  </div>
<input type="hidden" class="ColcurrentEditableRowID" value="">
<input type="hidden" class="currentEditableColId" value="">
