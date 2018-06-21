<?php if ( ! defined( 'ABSPATH' ) ) exit; 

if (isset( $_GET['thisPostID'] )) {
  $postId = $_GET['thisPostID'];
  $post = get_post($postId);
}elseif(isset( $_GET['post'] )) {
  $postId = $_GET['post'];
}else{
  $postId = $post->ID;
}

$post_slug = $post->post_name;

if ($post_slug == '') {
  $hidePermalink = 'display:none !important;';
}else{
  $hidePermalink = '';
}

$is_front_page = get_post_meta($postId, 'ULPB_FrontPage', true );
$loadWpHead = get_post_meta($postId, 'ULPB_loadWpHead', true );
$loadWpFooter = get_post_meta($postId, 'ULPB_loadWpFooter', true );

if (isset( $_GET['thisPostID'] ) ) {
  ?>
  <br><br><br>
  <div id="titlediv">
    <div id="titlewrap">
        <label class="screen-reader-text" id="title-prompt-text" for="title"> </label>
      <input type="text" name="post_title" size="30" value="" id="title" spellcheck="true" autocomplete="off" placeholder="Enter Page Title">
    </div>
    <div class="inside">
      <div id="edit-slug-box" class="hide-if-no-js" style="<?php echo "$hidePermalink"; ?>">
      <strong>Permalink:</strong>
      <span id="sample-permalink">
        <a href="<?php echo(site_url( ) ); ?>/?post_type=ulpb_post&amp;p=<?php echo($postId); ?>&amp;preview=true" target="wp-preview-4882"><?php echo(site_url( ) ); ?>/<span id="editable-post-name"><?php echo $post_slug; ?></span>/</a>
      </span>
      ‎<span id="edit-slug-buttons">
        <input type="text" class="editable-post-name-field" style="display: none; width: auto; height:24px; font-size: 13px; ">
        <button type="button" class="edit-slug button button-small hide-if-no-js" aria-label="Edit permalink">Edit</button>
        <button type="button" class="savePermalink  button button-small" style="display: none;">OK</button>
    </span>
      </div>
    </div>
    <span id="editable-post-name-full"><?php echo $post_slug; ?></span>
  </div>
  </div>
  <script type="text/javascript">
    ( function( $ ) {
      $('.edit-slug').click(function(){
          var prevTxt = $('#editable-post-name').text();
          $('.editable-post-name-field').val(prevTxt);
          $('#editable-post-name').css('display','none');
          $('.edit-slug').css('display','none');
          $('.editable-post-name-field').css('display','inline-block');
          $('.savePermalink').css('display','inline-block');
      });

      $('.savePermalink').click(function(){
          $('#editable-post-name').html( $('.editable-post-name-field').val() );
          $('#editable-post-name-full').html( $('.editable-post-name-field').val() );
          $('#editable-post-name').css('display','inline-block');
          $('.edit-slug').css('display','inline-block');
          $('.editable-post-name-field').css('display','none');
          $('.savePermalink').css('display','none');
      });
    })(jQuery);
  </script>
  <?php
}



?>
  <!-- ========= -->
  <!-- Your HTML -->
  <!-- ========= -->



  <?php include('tabs.php'); ?>
  <?php include('edit-column.php'); ?>
  <?php include('edit-row.php'); ?>
  <?php include('edit-widget.php'); ?>
  <?php include('new-row.php'); ?>
  <?php include('side-panel.php'); ?>
  <?php include('row-blocks.php'); ?>


<style type="text/css" id="PBPO_customCSS"></style>
  

<script src="<?php echo ULPB_PLUGIN_URL.'/js/aceSRC/ace.js' ?>" type="text/javascript" charset="utf-8"></script>


<script>
  
    var PbaceEditorJS = ace.edit("PbaceEditorJS");
    PbaceEditorJS.setTheme("ace/theme/dawn");
    PbaceEditorJS.getSession().setMode("ace/mode/javascript");

    var PbPOaceEditorJS = ace.edit("PbPOaceEditorJS");
    PbPOaceEditorJS.setTheme("ace/theme/dawn");
    PbPOaceEditorJS.getSession().setMode("ace/mode/javascript");

    var PbPOaceEditorCSS = ace.edit("PbPOaceEditorCSS");
    PbPOaceEditorCSS.setTheme("ace/theme/dawn");
    PbPOaceEditorCSS.getSession().setMode("ace/mode/css");

    var PbaceEditorCSS = ace.edit("PbaceEditorCSS");
    PbaceEditorCSS.setTheme("ace/theme/dawn");
    PbaceEditorCSS.getSession().setMode("ace/mode/css");

    var PbColaceEditorCSS = ace.edit("PbColaceEditorCSS");
    PbColaceEditorCSS.setTheme("ace/theme/dawn");
    PbColaceEditorCSS.getSession().setMode("ace/mode/css");

</script>

<div class="lpp_modal pb_loader_container">
  <div class="pb_loader"></div>
</div>

<div class="lpp_modal pb_preview_container" style="">
  <div class="pb_temp_prev" style="text-align: center; overflow: visible; position: absolute;" ></div>
</div>

<div class="lpp_modal popb_confirm_action_popup">
  <div class="popb_confirm_container">
    <h2 class="popb_confirm_message">Are you sure you want to do this ? </h2>
    <h4 class="popb_confirm_subMessage">You will lose any unsaved changes.</h4>
    <div id="confirm_yes" class="confirm_btn confirm_btn_green confirm_yes">Yes</div>
    <div class="confirm_btn confirm_btn_grey confirm_no">Cancel</div>
  </div>
</div>

<div class="lpp_modal pb_preview_fields_container" style="">
  <div class="pb_fields_prev" style="overflow: visible;position: absolute;background: #fff;width: 70%;margin-top: 5%;margin-left: 15%;border-radius: 4px;" >
    <span class="dashicons dashicons-no formEntriesPreviewClose" style="float: right; font-size:29px; margin: 5px 10px;cursor: pointer;"></span>
    <br><h2 style="text-align: center; color: #333; font-size:24px;">Form Entries</h2>
    <table class='w3-table w3-striped w3-bordered w3-card-4 formFieldsPreviewTable' style="margin-top: 50px;">
    </table>
  </div>
</div>

<input type="hidden" class="draggedWidgetAttributes" value='' >
<input type="hidden" class="draggedWidgetIndex" value='' >
<input type="hidden" class="widgetDroppedAtIndex" value='' >


<input type="hidden" class="mailchimpListIdHolder" value='' >
<input type="hidden" class="mailchimpApiKeyHolder" value='' >


<input type="hidden" class="globalRowRetrievedPostID" value='' >
<input type="hidden" class="globalRowRetrievedAttributes" value='' >

<input type="hidden" class="insertRowBlockAtIndex" value='' >


<input type="hidden" class="allTextEditableWidgetIds">

<input type="hidden" class="checkIfWidgetsAreLoadedInColumn">

<input type="hidden" class="isChagesMade" value="false">


<input type="hidden" class="currentViewPortSize" value="rbt-l">

<input type="hidden" class="currentResizedRowTarget">
<input type="hidden" class="currentResizedRowColTarget">
<input type="hidden" class="currentResizedRowColTargetNext">
<input type="hidden" class="currentResizedRowHeight">

<input type="hidden" class="isAnimateTrue">
<input type="hidden" class="animateWidgetId">


<input type="hidden" class="widgetDroppedRowId">
<input type="hidden" class="widgetDroppedColIndex">
<input type="hidden" class="widgetDroppedIndex">

<input type="hidden" class="widgetDraggedRowId">
<input type="hidden" class="widgetDraggedIndex">
<input type="hidden" class="widgetDraggedColIndex">

<input type="hidden" class="widgetDeletionCompleted" value="false">

<input type="hidden" class="isDroppedOnDroppable">

<input type="hidden" class="deleteRowIndex">
<input type="hidden" class="widgDeleteColIndex">
<input type="hidden" class="widgDeleteIndex">

<input type="hidden" class="currentlyEditedColId">
<input type="hidden" class="currentlyEditedWidgId">
<input type="hidden" class="currentlyEditedThisCol">
<input type="hidden" class="currentlyEditedThisRow">


<div id="pageStatusHolder" style="display: none;">
</div>

<div style="display: none;" class="rowWithNoColumnContainer">
  <div class="rowWithNoColumn" >
    <h5> SELECT COLUMN STRUCTURE </h5>
    <div class=" setColbtn" data-colNumber="1">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/1.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="2">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/2.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="3">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/3.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="4">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/4.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="5">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/5.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="6">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/6.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="7">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/7.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="8">
      <img src="<?php echo ULPB_PLUGIN_URL.'/images/icons/8.png' ?>">
    </div>


  </div>
</div>

<?php 

$plugData = get_plugin_data(ULPB_PLUGIN_PATH.'/page-builder-add.php',false,true);

$pb_current_user = wp_get_current_user(); 

$plugOps_pageBuilder_data_nonce = wp_create_nonce( 'POPB_data_nonce' );

$mcActive = 'false';  $GRisActive = 'false';
if ( is_plugin_active('page-builder-add-mailchimp-extension/page-builder-add-mailchimp-extension.php') || is_plugin_active('PluginOps-Extensions-Pack/extension-pack.php') ) {
  $mcActive = 'true';
}

if ( is_plugin_active('page-builder-add-global-row-extension/page-builder-add-global-row.php') || is_plugin_active('PluginOps-Extensions-Pack/extension-pack.php') ) {
  $GRisActive = 'true';
}


?>
<script type="text/javascript">
  var pageBuilderApp = {};
  pageBuilderApp.currentlyEditedColId = '';
  pageBuilderApp.currentlyEditedWidgId = '';
  pageBuilderApp.currentlyEditedThisCol = '';
  pageBuilderApp.currentlyEditedThisRow = '';
  pageBuilderApp.animateWidgetId = '';
  var URLL = "<?php echo admin_url('admin-ajax.php?action=ulpb_admin_data&page_id='.$postId.'&POPB_nonce='.$plugOps_pageBuilder_data_nonce ); ?>";
  var PageBuilderAdminImageFolderPath = '<?php echo ULPB_PLUGIN_URL."/images/menu/"; ?>';
  var P_ID = "<?php echo $postId; ?>";
  var P_menu  = "<?php foreach($menus as $menu){  echo "$menu->name"; } ?>";
  var PageBuilder_Version = "<?php echo $plugData['Version']; ?>";
  var admURL = "<?php echo admin_url(); ?>";
  var siteURLpb = "<?php echo site_url(); ?>";
  var isPub = "<?php echo get_post_status( $postId ); ?>";
  var thisPostType = "<?php echo get_post_type($postId); ?>";
  var pbWrapperWidth = jQuery('#container').width();
  var pluginURL  = '<?php echo ULPB_PLUGIN_URL; ?>';
  var admEMail = '<?php echo  $pb_current_user->user_email; ?>';
  var isMCActive = "<?php echo $mcActive; ?>";
  var isGlobalRowActive = "<?php echo $GRisActive; ?>";

  var shortCodeRenderWidgetNO = '<?php echo $plugOps_pageBuilder_data_nonce; ?>';

</script>
<script src="<?php echo ULPB_PLUGIN_URL.'/js/fa.js'; ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

      if (thisPostType == 'ulpb_post') {
        jQuery('.postbox-container').css('display','none');
      }
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });

    jQuery('.TemplateTabs .Templatetab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.TemplateTabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });

    jQuery( function() {
      jQuery( "#PB_accordion, .PB_accordion" ).accordion({
        collapsible: true,
        heightStyle: "content"
      });
  });

    jQuery( function() {
      jQuery( "#PB_accordion_forms, .PB_accordion_forms" ).accordion({
        collapsible: true,
        heightStyle: "content"
      });
  });
    
    jQuery( function() {
      jQuery( "#accordion1" ).accordion({
        collapsible: true,
        heightStyle: "content"
      });
  });

  jQuery( ".sortableAccordionWidget" )
  .accordion({
    header: '> li > h3',
    collapsible: true,
    heightStyle: "content"
  })
  .sortable({
        axis: "y",
        handle: ".handleHeader",
        stop: function( event, ui ) {
          // IE doesn't register the blur when sorting
          // so trigger focusout handlers to remove .ui-state-focus
          ui.item.children( ".handleHeader" ).triggerHandler( "focusout" );
 
          // Refresh accordion to handle new order
          jQuery( this ).accordion( "refresh" );
        }
      });

    jQuery('.pbicp-auto').iconpicker({ });

    jQuery('.pbIconListPicker').iconpicker({ });
    
  jQuery(document).on('click','.pb_img_thumbnail',function(){
    var clikedElID = jQuery(this).attr('id');
    jQuery('#pb_lightbox'+clikedElID).css('display','block');
  });

  jQuery(document).on('click','.pb_single_img_lightbox',function(){
    jQuery(this).css('display','none');
  });

});


  jQuery('.row_edit_fields').change(function(){
    currentEditableRowID = jQuery('.currentEditingRow').val();

    jQuery('section[rowid="'+currentEditableRowID+'"]').children('#ulpb_row_controls').children('#editRowSave').click();
  });
  
  jQuery('.row_edit_fieldBG').change(function(){
    currentEditableRowID = jQuery('.currentEditingRow').val();
    var rowBGcolor = jQuery('.row_edit_fieldBG').val();
    jQuery('section[rowid="'+currentEditableRowID+'"]').css('background',rowBGcolor);
  });
  jQuery('#edit_form_close').live('click',function(ev){
        jQuery('.edit_row').slideUp();

        jQuery('#ulpb_row_controls').hide();
      });

  jQuery('#editRowSaveVisible').live('click',function(){

    currentEditableRowID = jQuery('.currentEditingRow').val();

    jQuery('section[rowid="'+currentEditableRowID+'"]').children('#ulpb_row_controls').children('#editRowSave').click();

    jQuery('.edit_row').hide("slide", { direction: "left" }, 500);
    jQuery('.ulpb_row_controls').hide();
  });


  jQuery('.colOptionsFields').change(function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  });

  jQuery('.popb_col_fields_container input').change(function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  });
  jQuery('.popb_col_fields_container select').change(function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  }); 

  jQuery('#columnBgColor').change(function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    columnBgColor = jQuery('#columnBgColor').val();
   // jQuery('#'+ColcurrentEditableRowID+'-'+currentEditableColId).css('background',columnBgColor);
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  });

  jQuery('#editColumnSaveVisible').live('click',function(){

    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();

    jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
    jQuery('.ulpb_column_controls').hide();
  });
  

  jQuery('.pbp-widgets input').change(function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery('.pbp-widgets select').change(function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery('.pbp-widgets textarea').change(function(){
    jQuery('.closeWidgetPopup').click();
  });

  jQuery('.widgetAnimateBtn').click(function(){
    jQuery('.isAnimateTrue').val('animate');
    jQuery('.closeWidgetPopup').click();
  });

  jQuery('.wdt-fields input').change(function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery('.wdt-fields select, .wdt-fields textarea').change(function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery('#widgetBgColor').change(function(){ 
    jQuery('.closeWidgetPopup').click();
  });
  jQuery('.widgetStyling').change(function(){ 
    jQuery('.closeWidgetPopup').click();
  });

  jQuery('.wdt-img input, .wdt-img select').change(function(){ 
    jQuery('.closeWidgetPopup').click();
  });

  jQuery(document).on('change','.slideImgURL',function(){
    jQuery('.closeWidgetPopup').click();
  });
  
  jQuery(document).on('change','.carouselImgURL',function(){
    jQuery('.closeWidgetPopup').click();
  });

  jQuery(document).on('change','.formFieldItemsContainer select',function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery(document).on('change','.formFieldItemsContainer input',function(){
    jQuery('.closeWidgetPopup').click();
  });
  jQuery(document).on('keyup','.formFieldItemsContainer textarea',function(){
    jQuery('.closeWidgetPopup').click();
  });


  jQuery('.editWidgetSaveButton').click( function(){
    jQuery('.closeWidgetPopup').click();
    jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
    jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
    jQuery('.ulpb_column_controls').css('display','none');
    
  });

  var widgetDroppedTypeTwo = false;

  jQuery(function ($) {
        setTimeout(function () {
            for (var i = 0; i < tinymce.editors.length; i++) {
                tinymce.editors[i].on('change', function (ed, e) {
                    $('.closeWidgetPopup').click();
                });
            }
        }, 1000);

    });

jQuery(function ($) {

  $('#pbWrapper').css('display','none');
  $('.newRowBtnContainerVisible').css('display','none');

  jQuery('.pb_fullScreenEditorButton').click(function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background: #fff;position: absolute;width: 100%;left: 0;right: 15;top: 0;');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2, .postbox').css('display','none');
    $('#wpcontent').attr('style','margin-left:0; padding-left:0;');
    $('.pb_fullScreenEditorButtonClose').show();
    $('#pbWrapper').css('display','block');
    $('.newRowBtnContainerVisible').css('display','block');

    $(this).addClass('EditorActive');
  });

  jQuery('.pb_fullScreenEditorButtonClose').click(function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background: #fff;');
    $('.pb_fullScreenEditorButtonClose').css('display','none');
    $('#wpcontent').attr('style','');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2 , .postbox').show();

    $('#submitdiv').css('display','none');
    $('#pbWrapper').css('display','none');
    $('.newRowBtnContainerVisible').css('display','none');
    $('.pb_fullScreenEditorButton').removeClass('EditorActive');
      $('.edit_row').hide("slide", { direction: "left" }, 500);
        $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
        $('.pageops_modal').hide("slide", { direction: "left" }, 500);
        $('.edit_column').hide("slide", { direction: "left" }, 500);
        $('.ulpb_column_controls, .ulpb_row_controls').css('display','none');
  });

  $(document).ready(function(){
    $('.pb_fullScreenEditorButton').css('display','block');
    $('.pb_loader_container_pageload').css('display','none');
  });

});



if (isGlobalRowActive == "true") {
    jQuery('.addNewGlobalRowVisible').parent().css('display','inline-block');
}

jQuery("input").keypress(function (evt) {
  
  var keycode = evt.charCode || evt.keyCode;
  if (keycode  == 13) { //Enter key's keycode
    return false;
  }
});

jQuery('#menuWrap').click(function(){return false;});
jQuery('#lpb_menu_widget').click(function(){return false;});


jQuery(document).ready(function() {
  jQuery('.gFontSelectorulpb').fontselect().change(function(){

  });
});


String.prototype.PBSearchStrcapitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
  }
  
  jQuery('.pbSearchWidget').on('keyup', function(){
    var WidgetSearchQuery =  jQuery(this).val().PBSearchStrcapitalize();
    jQuery('.POPB_widget').hide();
    
    jQuery('.POPB_widget:contains("'+WidgetSearchQuery+'")').show();

  });

</script> 


<script type="text/javascript">

  jQuery('.insertTemplateFormSubmit').on('click', function(e)  {

    var confirmIt =  confirm('Are you sure ? It will insert the temlate below your existing content.');
    if (confirmIt == true) {

        var insSubmit_URl = "<?php echo admin_url('admin-ajax.php?action=ulpb_insert_template'); ?>&insertTemplateNonce="+shortCodeRenderWidgetNO;
        var result = " ";
        var form = jQuery('.insertTemplateForm');

        jQuery.ajax({
            url: insSubmit_URl,
            method: 'post',
            data: form.serialize(),
            success: function(result){
                resonse = JSON.parse(result);
                if (resonse['Message'] == 'Success'){
                  jQuery.each(resonse['Rows'], function(index,val){
                    val['rowID'] = 'ulpb_Row'+Math.floor((Math.random() * 200000) + 100);
                    collectionSize = pageBuilderApp.rowList.length;
                    pageBuilderApp.rowList.add(val, {at: collectionSize+1} );
                  });
                  alert('Selected Template Added Successfully.');
                }else{
                  jQuery('.upt_response').html('There is some bug which is preventing this page to be updated, Contact the <a href="https://wordpress.org/support/plugin/page-builder-add" target="_blank" > Bug Killers </a>');
                }
            }
        });
         
        
    }
        return false;
    });



  (function($){
    $(document).ready(function() {
    $('.empty_button_form').on('submit',function(){
         
         
        $('#response').text('Processing'); 
         
        var form = $(this);
        $.ajax({
            url: form.attr('action')+'&subsListEmpty='+shortCodeRenderWidgetNO,
            method: form.attr('method'),
            data: form.serialize(),
            success: function(result){
                $('.download_file_link').css('display','none');
                if (result == 'Success'){
                    $('#response').text(result);  
                }else {
                    $('#response').text(result);
                }
            }
        });
         
        
        return false;   
    });

    $('.download_button_form').on('submit',function(){
         
         
        $('#response').text('Processing'); 
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(result){
                if (result == 'success'){
                    $('#response').text(result);  
                }else {
                    $('#response').text(result);
                }
            }
        });
         
        
        return false;   
    });

    jQuery('.emptyFormDataBtn').on('click', function(e)  {

    var confirmIt =  confirm('Are you sure ? It will delete all your form data for eternity.');
    if (confirmIt == true) {

        var insSubmit_URl = "<?php echo admin_url('admin-ajax.php?action=ulpb_empty_form_builder_data'); ?>&submitNonce="+shortCodeRenderWidgetNO;
        var result = " ";
        var form = jQuery('#formBuilderDataListEmpty');

        jQuery.ajax({
            url: insSubmit_URl,
            method: 'post',
            data: form.serialize(),
            success: function(result){
                if (result == 'Success'){
                  console.log(result);

                  $('.emptyFormDataBtn').hide();
                  $('#formBuilderDataListEmpty p ').text('All data has been dumped successfully.');
                }else{
                  $('#formBuilderDataListEmpty p ').text('Already empty.');
                }
            }
        });
         
       
    }
        return false;
    });


    jQuery('.entryDeleteBtn').on('click', function(e)  {

      var entryIndex = $(this).attr('data-entryIndex');
      var confirmIt =  confirm('Are you sure ? It will delete this data entry for eternity.');
      if (confirmIt == true) {

        var insSubmit_URl = "<?php echo admin_url('admin-ajax.php?action=ulpb_delete_form_builder_entry'); ?>&postID="+P_ID+"&dataEntryIndex="+entryIndex+"&submitNonce="+shortCodeRenderWidgetNO;
        var result = " ";
        var form = jQuery('#formBuilderDataListEmpty');
        jQuery.ajax({
            url: insSubmit_URl,
            method: 'post',
            data: form.serialize(),
            success: function(result){
                if (result == 'success'){
                  $('.edb-'+entryIndex).parent().parent().hide();
                  console.log($('.edb-'+entryIndex));
                }else{
                  $('#formBuilderDataListEmpty p ').text('Already empty.');
                }
            }
        });
         
       
      }
        return false;
    });


  $('.popb_checkbox').checkboxradio({
      icon: false
  });


  $('#aweberConnectButton').click(function(){
        $('.aweberLoader').text('Connecting...');
        $('.aweberLoader').show();
        var form = $('#aweberConnectForm');
        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php?action=ulpb_aweber_connect&POPB_nonce='.$plugOps_pageBuilder_data_nonce ); ?>",
            method: form.attr('method'),
            data: form.serialize(),
            success: function(result){
                var parsedResult= JSON.parse(result);
                if (parsedResult['queryMessage'] == 'success' ) {
                  $('.aweberLoader').hide();
                  $('.aweberConnectionSetupOne').hide('slow');
                  $('.aweberConnectionSetupTwo').show('slow');
                  $('#formBuilderAweberList').html(parsedResult['allLists']);
                }else{
                  $('.aweberLoader').text('Connection unsuccesful, Please try getting your authorization code again.');
                }
                
            }
        });
  });

  $(document).ready( function() {
    $.ajax({
            url: "<?php echo admin_url('admin-ajax.php?action=ulpb_aweber_connection_check&POPB_nonce='.$plugOps_pageBuilder_data_nonce ); ?>",
            method: 'post',
            data: '',
            success: function(result){
                var parsedResult= JSON.parse(result);
                if (parsedResult['queryMessage'] == 'success' ) {

                  $('.aweberConnectionSetupOne').hide('slow');
                  $('.aweberConnectionSetupTwo').show('slow');
                  $('#formBuilderAweberList').html(parsedResult['allLists']);
                }else{
                  $('.aweberLoader').text(' ');
                  $('.aweberConnectionSetupOne').show('slow');
                  $('.aweberConnectionSetupTwo').hide('slow');
                }
                
            }
    });
  });



});


})(jQuery);

</script>


<script type="text/javascript">
    ( function( $ ) {
        
        $(document).ready(function(){

          <?php
            if ( is_plugin_active('PluginOps-Extensions-Pack/extension-pack.php') ) {
              echo "var isProActive = 'true';";
            }else{
              echo "var isProActive = 'false';";
            }
          ?>
            var rowBlockNames = {
                1:{
                    tempname : 1,
                    tempCat:'Header',
                    isPro:false,
                },
                2:{
                    tempname : 2,
                    tempCat:'Header',
                    isPro:true,
                },
                3:{
                    tempname : 3,
                    tempCat:'Header',
                    isPro:true,
                },
                4:{
                    tempname : 4,
                    tempCat:'Header',
                    isPro:true,
                },
                5:{
                    tempname : 5,
                    tempCat:'Feature',
                    isPro:true,
                },
                6:{
                    tempname : 6,
                    tempCat:'Feature Text',
                    isPro:true,
                },
                7:{
                    tempname : 7,
                    tempCat:'Feature',
                    isPro:true,
                },
                8:{
                    tempname : 8,
                    tempCat:'Feature Text',
                    isPro:true,
                },
                9:{
                    tempname : 9,
                    tempCat:'Text',
                    isPro:true,
                },
                10:{
                    tempname : 10,
                    tempCat:'Feature Text',
                    isPro:true,
                },
                11:{
                    tempname : 11,
                    tempCat:'Pricing',
                    isPro:true,
                },
                12:{
                    tempname : 12,
                    tempCat:'Pricing',
                    isPro:true,
                },
                13:{
                    tempname : 13,
                    tempCat:'Pricing',
                    isPro:true,
                },
                14:{
                    tempname : 14,
                    tempCat:'Pricing',
                    isPro:true,
                },
            };
            $.each(rowBlockNames, function(index,val){
                if (val['isPro'] == true  && isProActive == 'false') {
                    var insertBtn = '<div class="rowBlockProUpdateBtn" data-rowBlockName="'+'protemp'+'"> Pro <i class="fa fa-ban"></i> </div>';
                }else{
                    var insertBtn = '<div class="rowBlockUpdateBtn" data-rowBlockName="'+val['tempname']+'"> Insert <i class="fa fa-download" data-rowBlockName="'+val['tempname']+'" ></i> </div>';
                }

                $('#rowBlocksContainer').append(
                    '<div id="rowBlock" class="rowBlock-'+val['tempname']+' rowBlock template-card">'
                        +'<div id="rowBlock-'+val['tempname']+'" class="tempPrev"> <p id="rowBlock-'+val['tempname']+'"><b>Preview</b></p></div>'
                        +'<label for="rowBlock-'+val['tempname']+'"> <img src="<?php echo $rowBlockImagesURL; ?>'+val['tempname']+'.png" data-img_src="https://ps.w.org/page-builder-add/assets/screenshot-'+val['tempname']+'.png" class="card-img rowBlock-'+val['tempname']+'">'
                        +'<p class="card-desc"></p> </label>'
                        +insertBtn
                        +'<span class="block-cats-displayed">'+val['tempCat']+'</span>'
                    +'</div>'
                );
            });

            jQuery('.rowBlocksFilterSelector').on('change', function(){
                var WidgetSearchQuery =  jQuery(this).val();
                jQuery('.rowBlock').hide();
                
                jQuery('.rowBlock:contains("'+WidgetSearchQuery+'")').show();

                if (WidgetSearchQuery == 'All') {
                  jQuery('.rowBlock').show();
                }
            });


            if (isProActive == 'true') {
              $('.nonPremUserNotice').css('display','none');
            }
        });
    }( jQuery ) );
</script>


<div id="fontLoaderContainer"></div>
<link rel="stylesheet" type="text/css" href="<?php echo ULPB_PLUGIN_URL.'/styles/wooStyles.css'; ?>">
<style type="text/css">
  #PbaceEditorJS, #PbaceEditorCSS,#PbColaceEditorCSS, #PbPOaceEditorCSS, #PbPOaceEditorJS { 
        padding: 20px; margin: 20px;
        width: 80%; min-height: 450px;
    }
    #pbWrapper{
      display: none;
    }
</style>

<style type="text/css" id="POPBGlobalStylesTag"></style>

<style type="text/css" id="POPBDeafaultResponsiveStylesTag"></style>