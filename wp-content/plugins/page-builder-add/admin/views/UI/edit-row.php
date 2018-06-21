<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="lpp_modal_row edit_row">
  <div class="lpp_modal_wrapper_row">
  <div class="edit_options_left_row">
      <input type="hidden" class="currentEditingRow" value='' >
      <div class="tabs">
        <ul class="tab-links">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Row Options</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowVideo" class="tab_link"> <i class="fa fa-youtube-play" style="font-size: 20px;"></i> <br> Background Video</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabCustomCss" class="tab_link"> <i class="fa fa-code" style="font-size: 20px;"></i> <br> Custom CSS & JS</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabRowOptions" class="tab active" style="min-height:400px;">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <div>
                <h4>Min Height  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label></label>
                  <input type="number" name="row_height" id="row_height" placeholder="Set row height" class="edit_fields row_edit_fields" value='200' style="width:60px;">
                  <select class="row_height_unit row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label></label>
                  <input type="number" name="rowHeightTablet" class="rowHeightTablet row_edit_fields" placeholder="Set row height" value='200' style="width:60px;">
                  <select class="rowHeightUnitTablet row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label></label>
                  <input type="number" name="rowHeightMobile" class="rowHeightMobile row_edit_fields" placeholder="Set row height" value='200' style="width:60px;">
                  <select class="rowHeightUnitMobile row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
              </div>
              <br>
              <br>
              <label>Number of Columns :</label>
              <input type="number" name="number_of_columns" id="number_of_columns" placeholder="Number of columns in row" min="1" max="8"  class="edit_fields row_edit_fields" value='1'>
              <br>
              <br>
              <br>
              <hr><br>
              <h4>Background</h4>
              <div>
                <div class="tabs">
                  <ul class="tab-links tabEditFields">
                    <li class="active"><a  href="#defaultRowBgOptions" class="tab_link">Default</a></li>
                    <li><a  href="#hoverRowBgOptions" class="tab_link">Hover</a></li>
                  </ul>
                  <div class="tab-content" style="box-shadow: none;">
                    <div id="defaultRowBgOptions" class="tab active">
                      <br><br>
                      <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                        <p style="display: inline;"> Background Type </p>
                        <div class="iputTabNav">
                          <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                            <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                            <input type="radio" name="rowBackgroundType" id="inputID1" value='solid' class="rowBackgroundType rowBackgroundTypeSolid tabbedInputRadio row_edit_fields">
                          </div>
                          <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                            <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                            <input type="radio" name="rowBackgroundType" id="inputID2" class="rowBackgroundType rowBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient">
                          </div>
                        </div>
                        <div class="popb_input_tabContent">
                          <div class="content_popb_tab_1 popb_tab_content">
                            <br><br><br>
                            <label>Color :</label>
                            <input type="text" name="rowBgColor" class="color-picker_btn_two rowBgColor row_edit_fields" data-alpha='true' id="rowBgColor" value='#fff'>
                            <br> <br>
                            <label>Image :</label>
                            <input id="image_location1" type="text" class=" rowBgImg upload_image_button2992 row_edit_fields"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' /> <br> <br>
                            <label></label>
                            <input id="image_location1" type="button" class="upload_bg pb_upload_btn" data-id="2992" value="Upload"  style="" />
                            <br>
                            <br>
                            <br>
                            <label for="rowBackgroundParallax">Parallax Background</label>
                            <select class="rowBackgroundParallax row_edit_fields" id="rowBackgroundParallax">
                              <option value="">Select</option>
                              <option value="true">Yes</option>
                              <option value="false">No</option>
                            </select>
                            <br>
                            <br>
                            <br>
                          </div>
                          <div class="content_popb_tab_2 popb_tab_content">
                            <br><br><br>
                            <label>First Color </label>
                            <input type="text" name="rowGradientColorFirst" class="color-picker_btn_two rowGradientColorFirst row_edit_fields" data-alpha='true' id="rowGradientColorFirst" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirst'></div>
                            <input type="number" class="rowGradientLocationFirst row_edit_fields">
                            <br><br><hr>
                            <br><br>
                            <label>Second Color </label>
                            <input type="text" name="rowGradientColorSecond" class="color-picker_btn_two rowGradientColorSecond row_edit_fields" data-alpha='true' id="rowGradientColorSecond" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecond'></div>
                            <input type="number" class="rowGradientLocationSecond row_edit_fields">
                            <br><br>
                            <hr>
                            <br>
                            <br>
                            <label>Type </label>
                            <select class="rowGradientType row_edit_fields">
                              <option value="linear">Linear</option>
                              <option value="radial">Radial</option>
                            </select>
                            <br>
                            <br>
                            <div class="radialInput" style="display: none;">
                              <br>
                              <label>Position </label>
                              <select class="rowGradientPosition row_edit_fields">
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
                              <br><br>
                            </div>
                            <div class="linearInput" style="display: none;">
                            <p>Angle</p>
                              <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngle'></div>
                              <input type="number" class="rowGradientAngle row_edit_fields">
                            </div>
                            <br>
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="hoverRowBgOptions" class="tab" >
                      <br><br>
                      <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow POPBInputHoverRow">
                        <p style="display: inline;"> Background Type </p>
                        <div class="iputTabNav">
                          <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                            <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                            <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover1"  class="rowBackgroundTypeHover rowBackgroundTypeSolidHover tabbedInputRadio row_edit_fields" value='solid'>
                          </div>
                          <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                            <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                            <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover2" class="rowBackgroundTypeHover rowBackgroundTypeGradientHover tabbedInputRadio row_edit_fields" value="gradient">
                          </div>
                        </div>
                        <div class="popb_input_tabContent">
                          <div class="content_popb_tab_1 popb_tab_content">
                            <br><br>
                            <label>Color :</label>
                            <input type="text" name="rowBgColorHover" class="color-picker_btn_two rowBgColorHover row_edit_fields" data-alpha='true' id="rowBgColorHover" value='#fff'>
                            <br>
                          </div>
                          <div class="content_popb_tab_2 popb_tab_content">
                            <br><br><br>
                            <label>First Color </label>
                            <input type="text" name="rowGradientColorFirstHover" class="color-picker_btn_two rowGradientColorFirstHover row_edit_fields" data-alpha='true' id="rowGradientColorFirstHover" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirstHover'></div>
                            <input type="number" class="rowGradientLocationFirstHover row_edit_fields">
                            <br><br><hr>
                            <br><br>
                            <label>Second Color </label>
                            <input type="text" name="rowGradientColorSecondHover" class="color-picker_btn_two rowGradientColorSecondHover row_edit_fields" data-alpha='true' id="rowGradientColorSecondHover" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecondHover'></div>
                            <input type="number" class="rowGradientLocationSecondHover row_edit_fields">
                            <br><br>
                            <hr>
                            <br>
                            <br>
                            <label>Type </label>
                            <select class="rowGradientTypeHover row_edit_fields">
                              <option value="linear">Linear</option>
                              <option value="radial">Radial</option>
                            </select>
                            <br>
                            <br>
                            <div class="radialInputHover" style="display: none;">
                              <br>
                              <label>Position </label>
                              <select class="rowGradientPositionHover row_edit_fields">
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
                              <br><br>
                            </div>
                            <div class="linearInputHover" style="display: none;">
                            <p>Angle</p>
                              <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngleHover'></div>
                              <input type="number" class="rowGradientAngleHover row_edit_fields">
                            </div>
                            <br>
                            <br>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <br>
                      <p>Transition Duration</p>
                      <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='rowHoverTransitionDuration'></div>
                      <input type="number" class="rowHoverTransitionDuration row_edit_fields">
                      <br><br>
                    </div>
                  </div>
                </div> 
              </div>
              <br>
              <hr>
              <br>
              <h4>Overlay</h4>
              <div>
                    <div id="defaultRowBgOptions">
                      <br><br>
                      <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                        <p style="display: inline;"> Overlay Type </p>
                        <div class="iputTabNav">
                          <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                            <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                            <input type="radio" name="rowOverlayBackgroundType" id="inputID1" value='solid' class="rowOverlayBackgroundType rowOverlayBackgroundTypeSolid tabbedInputRadio row_edit_fields">
                          </div>
                          <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                            <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                            <input type="radio" name="rowOverlayBackgroundType" id="inputID2" class="rowOverlayBackgroundType rowOverlayBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient">
                          </div>
                        </div>
                        <div class="">
                          <div class="content_popb_tab_1 popb_tab_content">
                            <br><br><br>
                            <label>Color :</label>
                            <input type="text" name="rowBgOverlayColor" class="color-picker_btn_two rowBgOverlayColor row_edit_fields" data-alpha='true' id="rowBgOverlayColor" value='#fff'>
                            <br> <br>
                          </div>
                          <div class="content_popb_tab_2 popb_tab_content">
                            <br><br><br>
                            <label>First Color </label>
                            <input type="text" name="rowOverlayGradientColorFirst" class="color-picker_btn_two rowOverlayGradientColorFirst row_edit_fields" data-alpha='true' id="rowOverlayGradientColorFirst" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationFirst'></div>
                            <input type="number" class="rowOverlayGradientLocationFirst row_edit_fields">
                            <br><br><hr>
                            <br><br>
                            <label>Second Color </label>
                            <input type="text" name="rowOverlayGradientColorSecond" class="color-picker_btn_two rowOverlayGradientColorSecond row_edit_fields" data-alpha='true' id="rowOverlayGradientColorSecond" value='#fff'>
                            <p>Location</p>
                            <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationSecond'></div>
                            <input type="number" class="rowOverlayGradientLocationSecond row_edit_fields">
                            <br><br>
                            <hr>
                            <br>
                            <br>
                            <label>Type </label>
                            <select class="rowOverlayGradientType row_edit_fields">
                              <option value="linear">Linear</option>
                              <option value="radial">Radial</option>
                            </select>
                            <br>
                            <br>
                            <div class="radialInput" style="display: none;">
                              <br>
                              <label>Position </label>
                              <select class="rowOverlayGradientPosition row_edit_fields">
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
                              <br><br>
                            </div>
                            <div class="linearInput" style="display: none;">
                            <p>Angle</p>
                              <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientAngle'></div>
                              <input type="number" class="rowOverlayGradientAngle row_edit_fields">
                            </div>
                            <br>
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <br>
              <br><hr><br>
              <div>
                <h4>Row Margin   
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <input type="number" name="rowMarginTop" class="padding_inline_inp  rowMarginTop row_edit_fields" id="rowMarginTop"  placeholder="Top" >
                  
                  <input type="number" name="rowMarginBottom" class="padding_inline_inp  rowMarginBottom row_edit_fields" id="rowMarginBottom"  placeholder="Bottom">
                  
                  <input type="number" name="rowMarginLeft" class="padding_inline_inp  rowMarginLeft row_edit_fields" id="rowMarginLeft"  placeholder="Left">
                  
                  <input type="number" name="rowMarginRight" class="padding_inline_inp  rowMarginRight row_edit_fields" id="rowMarginRight"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <input type="number" name="rowMarginTopTablet" class="padding_inline_inp  rowMarginTopTablet row_edit_fields" id="rowMarginTopTablet"  placeholder="Top" >
                  
                  <input type="number" name="rowMarginBottomTablet" class="padding_inline_inp  rowMarginBottomTablet row_edit_fields" id="rowMarginBottomTablet"  placeholder="Bottom">
                  
                  <input type="number" name="rowMarginLeftTablet" class="padding_inline_inp  rowMarginLeftTablet row_edit_fields" id="rowMarginLeftTablet"  placeholder="Left">
                  
                  <input type="number" name="rowMarginRightTablet" class="padding_inline_inp  rowMarginRightTablet row_edit_fields" id="rowMarginRightTablet"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <input type="number" name="rowMarginTopMobile" class="padding_inline_inp  rowMarginTopMobile row_edit_fields" id="rowMarginTopMobile"  placeholder="Top" >
                  
                  <input type="number" name="rowMarginBottomMobile" class="padding_inline_inp  rowMarginBottomMobile row_edit_fields" id="rowMarginBottomMobile"  placeholder="Bottom">
                  
                  <input type="number" name="rowMarginLeftMobile" class="padding_inline_inp  rowMarginLeftMobile row_edit_fields" id="rowMarginLeftMobile"  placeholder="Left">
                  
                  <input type="number" name="rowMarginRightMobile" class="padding_inline_inp  rowMarginRightMobile row_edit_fields" id="rowMarginRightMobile"  placeholder="Right">
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
                <h4>Row Padding
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <input type="number" name="rowPaddingTop" class="padding_inline_inp  rowPaddingTop row_edit_fields" id="rowPaddingTop"  placeholder="Top">
                  
                  <input type="number" name="rowPaddingBottom" class="padding_inline_inp  rowPaddingBottom row_edit_fields" id="rowPaddingBottom"  placeholder="Bottom">
                  
                  <input type="number" name="rowPaddingLeft" class="padding_inline_inp  rowPaddingLeft row_edit_fields" id="rowPaddingLeft"  placeholder="Left">
                  
                  <input type="number" name="rowPaddingRight" class="padding_inline_inp  rowPaddingRight row_edit_fields" id="rowPaddingRight"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <input type="number" name="rowPaddingTopTablet" class="padding_inline_inp  rowPaddingTopTablet row_edit_fields" id="rowPaddingTopTablet"  placeholder="Top">
                  
                  <input type="number" name="rowPaddingBottomTablet" class="padding_inline_inp  rowPaddingBottomTablet row_edit_fields" id="rowPaddingBottomTablet"  placeholder="Bottom">
                  
                  <input type="number" name="rowPaddingLeftTablet" class="padding_inline_inp  rowPaddingLeftTablet row_edit_fields" id="rowPaddingLeftTablet"  placeholder="Left">
                  
                  <input type="number" name="rowPaddingRightTablet" class="padding_inline_inp  rowPaddingRightTablet row_edit_fields" id="rowPaddingRightTablet"  placeholder="Right">
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <input type="number" name="rowPaddingTopMobile" class="padding_inline_inp  rowPaddingTopMobile row_edit_fields" id="rowPaddingTopMobile"  placeholder="Top">
                  
                  <input type="number" name="rowPaddingBottomMobile" class="padding_inline_inp  rowPaddingBottomMobile row_edit_fields" id="rowPaddingBottomMobile"  placeholder="Bottom">
                  
                  <input type="number" name="rowPaddingLeftMobile" class="padding_inline_inp  rowPaddingLeftMobile row_edit_fields" id="rowPaddingLeftMobile"  placeholder="Left">
                  
                  <input type="number" name="rowPaddingRightMobile" class="padding_inline_inp  rowPaddingRightMobile row_edit_fields" id="rowPaddingRightMobile"  placeholder="Right">
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
              <label>Custom Row Class : </label>
              <input type="text" class="rowCustomClass row_edit_fields">
              <br>
              <br>  
              <br>
              <hr>
              <br>
              <div>
                <h4>Hide Row  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label>DeskTop </label>
                  <select class="row_edit_fields rowHideOnDesktop">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label>Tablet </label>
                  <select class="row_edit_fields rowHideOnTablet">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label>Mobile </label>
                  <select class="row_edit_fields rowHideOnMobile">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
              </div>
              </div>
            </div>
          <div id="tabRowVideo" class="tab" style="min-height:400px;">
            <div class="pbp_form" style="margin: 10px; width: 400px;">
            <label>Background Video :</label> 
            <select class="rowBgVideoEnable">
              <option value="false">Disable</option>
              <option value="true">Enable</option>
            </select>
            <br>
            <br>
            <label>Loop</label> 
            <select class="rowBgVideoLoop">
              <option value="no">No</option>
              <option value="loop">Yes</option>
            </select>
            <br>
            <br>
            <hr>
            <br>
            <label>Video (MP4) :</label>
            <input id="image_location9" type="text" class="rowVideoMpfour upload_image_button9"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' /> <br> <br>
            <label></label>
            <input id="image_location9" type="button" class="upload_bg" data-id="9" value="Upload" />
            <br><br> <hr><br>
            <label>Video (WebM) :</label>
            <input id="image_location10" type="text" class="rowVideoWebM upload_image_button10"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' /> <br> <br>
            <label></label>
            <input id="image_location10" type="button" class="upload_bg" data-id="10" value="Upload" />
            <br><br> <hr><br>
            <label>Video Thumbnail :</label>
            <input id="image_location11" type="text" class="rowVideoThumb upload_image_button11"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' /> <br> <br>
            <label></label>
            <input id="image_location11" type="button" class="upload_bg" data-id="11" value="Upload" />
            <br>
            <br>
            <br>
            <p><i>Note : </i> The background video will only be displayed in front end.</p>
            </div>
          </div>
          <div id="tabCustomCss" class="tab">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <h4>Custom CSS</h4>
              <div style="height: 388px; margin-bottom: 150px;">
                <div id="PbaceEditorCSS"  class="rowCustomStyling"></div>
              </div>
              <h4>Custom JS</h4>
              <div style="height: 388px;">
                <div id="PbaceEditorJS"  class="rowCustomJS"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h3 class="nonPremUserNotice"> Tip You can edit your row at one place and changes will appear everywhere : <a href="https://pluginops.com/page-builder-global-row/" target="_blank"> Learn More </a></h3>
    </div>
  </div>
</div>








<div class="lpp_modal_row insert_Global_row">
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <h1 class="banner-h1">Select Global Row</h1>
      <?php 
        $ULP_GlobalRow_args = array(
          'post_type' => 'ulpb_global_rows',
          'orderby' => 'date',
          'post_status'   => 'any',
          'posts_per_page'    => 100,
        );
        $ULPB_GlobalRow_posts = get_posts( $ULP_GlobalRow_args );

        echo "<br><br><br>
            <label style='margin-right:7%;'> Select a Global Row to Insert </label>
            <select class='selectGlobalRowToInsert' name='selectGlobalRowToInsert'>
            <option value=''  > Select Row </option>
        ";
        foreach ($ULPB_GlobalRow_posts as  $ulpost) {
          $currentPostId = $ulpost->ID;
          $currentPostName = get_the_title( $currentPostId);
          $currentPostLink = get_permalink($currentPostId);
          echo "<option value='$currentPostId' data-pagelink='$currentPostLink' > $currentPostName </option>";
        }

        echo "</select> 
        ";

      ?>
    </div>
    <div  class="addNewGlobalRowClosebutton" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>












<div class="lpp_modal_row pageops_modal">
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <div class="tabs">
        <ul class="tab-links" style="background: #2fa8f9;">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabPageOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Page Options</a></li>
          
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabPOnewWidget" class="tab_link"> <i class="fa  fa-plus-square" style="font-size: 20px;"></i> <br> New Widget</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabPageOptions" class="tab active" style="min-height:400px;">
            <div class="tabs">
              <ul class="tab-links" style="background: #2fa8f9;">
                <li style="margin: 0;" class="active"><a href="#bodyStyleTab" class="tab_link">Body Style</a></li>
                <li style="margin: 0;"><a href="#PoGlobalStylestab" class="tab_link">Global Styles</a></li>
                <li style="margin: 0;"><a href="#PocustomCSStab" class="tab_link">Custom CSS</a></li>
                <li style="margin: 0;"><a href="#PocustomJStab" class="tab_link">Custom JS</a></li>
              </ul>
              <div class="tab-content" style="overflow: hidden; background: #fff;">
                <div id="bodyStyleTab" class="tab active">
                  <div class="pbp_form" style="min-height: 400px;padding:20px;">
                    <br>
                    <label>Body Background Color :</label>
                    <input type="text" name="pageBgColor" class="color-picker_btn_two  pageBgColor pageOpsField" id="pageBgColor" data-alpha='true' value='transparent'>
                    <br>
                    <br><br><br>
                    <label>Body Background Image :</label>
                    <input id="image_location_b" type="url" class=" pageBgImage upload_image_button0 pageOpsField"  name='lpp_add_img_0' value=' ' placeholder='Insert Image URL here' style="width:40%;" />
                    <label></label>
                    <input id="image_location_b" type="button" class="upload_bg0 pb_upload_btn" data-id="0" value="Upload"  />
                    <br><br><br><br><br><br>
                    
                    <label>Logo Image :</label>
                    <input id="image_location_b" type="url" class=" pageLogoUrl upload_image_button10 pageOpsField"  name='lpp_add_img_10' value=' ' placeholder='Insert Image URL here' style="width:40%;" />
                    <label></label>
                    <input id="image_location_b" type="button" class="upload_bg0 pb_upload_btn" data-id="10" value="Upload"  />
                    <br><br><br><br><br><br>
                    <label>FavIcon Image :</label>
                    <input id="image_location_b" type="url" class=" pageFavIconUrl upload_image_button9 pageOpsField"  name='lpp_add_img_9' value=' ' placeholder='Insert Image URL here' style="width:40%;" />
                    <label></label>
                    <input id="image_location_b" type="button" class="upload_bg0 pb_upload_btn" data-id="9" value="Upload"  />
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div>
                      <h4>Body Padding    
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <input type="number" name="pagePaddingTop" class=" pageOpsField padding_inline_inp pagePaddingTop" id="pagePaddingTop" value="0"  placeholder="Top">

                        <input type="number" name="pagePaddingBottom" class=" pageOpsField padding_inline_inp pagePaddingBottom" id="pagePaddingBottom"  value="0" placeholder="Botom">

                        <input type="number" name="pagePaddingLeft" class=" pageOpsField padding_inline_inp pagePaddingLeft" id="pagePaddingLeft"  value="0" placeholder="Left">
                        
                        <input type="number" name="pagePaddingRight" class=" pageOpsField padding_inline_inp pagePaddingRight" id="pagePaddingRight"  value="0" placeholder="Right">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <input type="number" name="pagePaddingTopTablet" class=" pageOpsField padding_inline_inp  pagePaddingTopTablet " id="pagePaddingTopTablet"  placeholder="Top" >
                        
                        <input type="number" name="pagePaddingBottomTablet" class=" pageOpsField padding_inline_inp  pagePaddingBottomTablet " id="pagePaddingBottomTablet"  placeholder="Bottom">
                        
                        <input type="number" name="pagePaddingLeftTablet" class=" pageOpsField padding_inline_inp  pagePaddingLeftTablet " id="pagePaddingLeftTablet"  placeholder="Left">
                        
                        <input type="number" name="pagePaddingRightTablet" class=" pageOpsField padding_inline_inp  pagePaddingRightTablet " id="pagePaddingRightTablet"  placeholder="Right">
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <input type="number" name="pagePaddingTopMobile" class=" pageOpsField padding_inline_inp  pagePaddingTopMobile " id="pagePaddingTopMobile"  placeholder="Top" >
                        
                        <input type="number" name="pagePaddingBottomMobile" class=" pageOpsField padding_inline_inp  pagePaddingBottomMobile " id="pagePaddingBottomMobile"  placeholder="Bottom">
                        
                        <input type="number" name="pagePaddingLeftMobile" class=" pageOpsField padding_inline_inp  pagePaddingLeftMobile " id="pagePaddingLeftMobile"  placeholder="Left">
                        
                        <input type="number" name="pagePaddingRightMobile" class=" pageOpsField padding_inline_inp  pagePaddingRightMobile " id="pagePaddingRightMobile"  placeholder="Right">
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                    <br>
                    <br>
                    <br>
                    <h1 class="seoHeader"> Page SEO </h1>
                    <br>
                    <br>
                    <label>Page Keywords <span class="text_small">(Separated with Commas)</span> :</label>
                    <input type="text" class="pageSeoKeywords" style="width:60%">
                    <br>
                    <br>
                    <br>
                    <label> Short Page Description :</label>
                    <textarea class="pageSeoDescription" cols="60"></textarea>
                    <br>
                    <br>
                  </div>
                </div>
                <div id="PocustomCSStab" class="tab">
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <h4>Head Section Custom CSS <span style="font-size:10px;"> Without <\style> tags.</span> </h4>
                    <div style="height: 388px; margin-bottom: 150px; width: 390px;">
                      <div id="PbPOaceEditorCSS"  class="POcustomCSS"></div>
                    </div>
                  </div>
                </div>
                <div id="PocustomJStab" class="tab">
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <h4>Head Section Custom JS <span style="font-size:10px;"> Without <\script> tags.</span> </h4>
                    <div style="height: 388px; margin-bottom: 150px; width: 390px;">
                      <div id="PbPOaceEditorJS"  class="POcustomJS"></div>
                    </div>
                  </div>
                </div>
                <div id="PoGlobalStylestab" class="tab">
                  
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <br>
                    <label>Enable Global Styles</label>
                    <select class="pageOpsField POPBDefaultsEnable">
                      <option value="false">Disable</option>
                      <option value="true">Enable</option>
                    </select>
                    <br><br><br><hr><br>
                    <h4>Font Family</h4>
                    <label>Main Heading Font :</label>
                    <input class="pageOpsField typefaceHOne gFontSelectorulpb" id="typefaceHOne">
                    <br><br><br><hr><br>
                    <label>Sub Heading Font :</label>
                    <input class="pageOpsField typefaceHTwo gFontSelectorulpb" id="typefaceHTwo">
                    <br><br><br><hr><br>
                    <label>Paragraph Font :</label>
                    <input class="pageOpsField typefaceParagraph gFontSelectorulpb" id="typefaceParagraph">
                    <br><br><br><hr><br>
                    <label>Button Font :</label>
                    <input class="pageOpsField typefaceButton gFontSelectorulpb" id="typefaceButton">
                    <br><br><br><hr><br>
                    <label>Anchor Link Font :</label>
                    <input class="pageOpsField typefaceAnchorLink gFontSelectorulpb" id="typefaceAnchorLink">
                    <br><br><br><hr><br>
                    <h4>Global Page Font Sizes</h4>
                    <br><br>
                    <div>
                      <p>Main Heading Size (H1)   
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOne" id="typeSizeHOne">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOneTablet" id="typeSizeHOneTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOneMobile" id="typeSizeHOneMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Sub Heading Size   
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwo" id="typeSizeHTwo">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwoTablet" id="typeSizeHTwoTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwoMobile" id="typeSizeHTwoMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Paragraph Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraph" id="typeSizeParagraph">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraphTablet" id="typeSizeParagraphTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraphMobile" id="typeSizeParagraphMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Button Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButton" id="typeSizeButton">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButtonTablet" id="typeSizeButtonTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButtonMobile" id="typeSizeButtonMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Anchor Link Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLink" id="typefaceAnchorLink">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLinkTablet" id="typeSizeAnchorLinkTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLinkMobile" id="typeSizeAnchorLinkMobile">px
                      </div>
                    </div>
                    <br><br><br><hr><br>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="tabPOnewWidget" class="tab" style="min-height:550px;">
            
            <div class="edit_column_widgets">
            <div class="tabs">
              <ul class="tab-links">
              </ul>
              <div class="tab-content" style="padding:10px 0px 15px 15px; background: #fff;">
                <input type="text" class="pbSearchWidget" placeholder="Search a widget" style="width: 90%;">
                <div id="tabFreeWidgets" class="tab active" style="" >
                  
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

                </div>
                <div id="tabAdvancedWidgets" class="tab">
                  
                  
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>

            



    </div>
    <div  class="closePageOpsBtn" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>
    <div  class="openPageOpsBtn" style="">
        <div ><span  class="dashicons dashicons-arrow-right editSaveVisibleIcon" ></span></div><p></p><br>
    </div>