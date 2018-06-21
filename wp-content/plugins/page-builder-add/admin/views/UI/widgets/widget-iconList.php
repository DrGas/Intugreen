<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="tabs" style="width: 99%; min-width: 400px;">
  <ul class="tab-links">
    <li class="active"><a href="#iconList_cf1" class="tab_link">List Items</a></li>
    <li><a href="#iconList_cf2" class="tab_link">List Style</a></li>
  </ul>
<div class="tab-content" style="box-shadow:none;">
    <div id="iconList_cf1" class="tab active">
          <div class="btn" id="addNewIconList" > <span class="dashicons dashicons-plus-alt"></span> Add List Item </div>
          <br>
          <br>
          <ul class="sortableAccordionWidget  iconListItemsContainer">
          </ul>
    </div>
    <div id="iconList_cf2" class="tab">
        <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
        <br>
        <label>Line Height</label>
        <input type="number" class="iconListLineHeight" value=''>
        <br><br><hr><br>
        <label>Alignment</label>
        <select class="iconListAlignment">
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
        </select>
        <br>
        <br>
        <hr>
        <h3>Icon</h3>
        <br>
        <div>
            <h4>Icon Size
                <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
            </h4>
            <div class="responsiveOps responsiveOptionsContainterLarge">
                <label></label>
                <input type="number" class="iconListIconSize">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                <label></label>
                <input type="number" class="iconListIconSizeTablet">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                <label></label>
                <input type="number" class="iconListIconSizeMobile">px
            </div>
        </div>
        <br><br><hr><br>
        <label>Icon Color</label>
        <input type="text" id="iconListIconColor" class="color-picker_btn_two iconListIconColor"  >
        <br>
        <br>
        <hr>
        <br>
        <h3>Text</h3>
        <br>
        <div>
            <h4>Text Size
                <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
            </h4>
            <div class="responsiveOps responsiveOptionsContainterLarge">
                <label></label>
                <input type="number" class="iconListTextSize">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                <label></label>
                <input type="number" class="iconListTextSizeTablet">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                <label></label>
                <input type="number" class="iconListTextSizeMobile">px
            </div>
        </div>
        <br><br><hr><br> 
        <div>
            <h4>Text Indent
                <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
            </h4>
            <div class="responsiveOps responsiveOptionsContainterLarge">
                <label></label>
                <input type="number" class="iconListTextIndent">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                <label></label>
                <input type="number" class="iconListTextIndentTablet">px
            </div>
            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                <label></label>
                <input type="number" class="iconListTextIndentMobile">px
            </div>
        </div>
        <br><br><hr><br>   
        <label>Text Color: </label>   
        <input type="text" id="iconListTextColor" class="color-picker_btn_two iconListTextColor"  >
        <br><br><hr><br> 
        <label>Font Family :</label>
        <input class="iconListTextFontFamily gFontSelectorulpb" id="iconListTextFontFamily">
        <br><br><hr><br><br><br><br><br><br><br>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    (function($){
        var slideCountA = 1;
        jQuery('#addNewIconList').click(function(){
        jQuery('.iconListItemsContainer').append('<li> <h3 class="handleHeader">List Item <span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> </h3> <div  class="accordContentHolder"> <label>List Text</label> <input type="text" class="iconListItemText" value="List Item"> <br> <br> <label>Select Icon:  </label> <input  data-placement="bottomRight" class="icp pbIconListPicker iconListItemIcon" value="fa-archive" type="text" /> <span class="input-group-addon" style="font-size: 16px;"></span> <br> <br> <label>Link : </label> <input type="url" class="iconListItemLink"> <br> <br> <label>Open Link in :</label> <select class="iconListItemLinkOpen"> <option value="_blank">New Tab</option> <option value="_self">Same Tab</option> </select> </div> </li>');

        jQuery( '.iconListItemsContainer' ).accordion( "refresh" );

        jQuery('.pbIconListPicker').iconpicker({ });
        
        slideCountA++;
        jQuery('.closeWidgetPopup').click();

        
    }); // CLICK function ends here.


        $(document).on( 'change','.iconListItemText', function(){
            if ($(this).val() == '') {
                
            } else{
                $(this).parent().siblings('.handleHeader').html($(this).val() + '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span> ');
                jQuery('.closeWidgetPopup').click();
            }
        });

    $(document).on( 'click','.slideRemoveButton', function(){
        $(this).parent().parent().remove();
        jQuery('.closeWidgetPopup').click();
    });

    })(jQuery);
</script>

<style type="text/css">
    .handleHeader{
        margin:0;
        background:#F1F5F9;
        color: #737e89;
        cursor: move !important;
    }
    .slideRemoveButton{
        cursor: pointer;
        padding: 7px;
        border-radius: 100px;
        background: #d2dde9;
        text-align: center;
        margin-top: -5px;
    }
    .iconListItemsContainer div{
        background: #fff;
    }

    .iconpicker-container .iconpicker-popover{
        z-index: 9;
    }
</style>