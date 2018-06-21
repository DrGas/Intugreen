( function( $ ) {


$('.card input').click(function(){

  $('.card').children('.updateTemplate').remove();
  $('.card').css('background-color','#f0f0f0');
  $(this).parent('.card').css('background-color','#89d8fb');
  if ($(this).parent('.card').hasClass('tempPack1')) {
  }else{
    $(this).parent('.card').append('<div id="updateTemplate" class="btn-green  updateTemplate" style=" margin-left:70px;">Update Template</div>');
  }
  
  $('.updateTemplate').effect( "shake",{
    distance:10,
    times:2
  } );
});


$('.openPageOpsBtn').click(function(){
  $('.pageops_modal').show("slide", { direction: "left" }, 500);
});

$('.closePageOpsBtn').click(function(){

  var pageBgImage = $('.pageBgImage').val();
  var pageBgColor = $('.pageBgColor').val();
  var pagePaddingTop = $('.pagePaddingTop').val();
  var pagePaddingBottom = $('.pagePaddingBottom').val();
  var pagePaddingLeft = $('.pagePaddingLeft').val();
  var pagePaddingRight = $('.pagePaddingRight').val(); 

  $('#pbWrapper').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover; background-color:'+pageBgColor+'; padding: '+pagePaddingTop+'% '+pagePaddingRight+'% '+pagePaddingBottom+'% '+pagePaddingLeft+'%; display:block;  ');

  $('.pageops_modal').hide("slide", { direction: "left" }, 500);
});

$('.pageOpsField').on('change',function(){
  
  var pageBgImage = $('.pageBgImage').val();
  var pageBgColor = $('.pageBgColor').val();
  var pagePaddingTop = $('.pagePaddingTop').val();
  var pagePaddingBottom = $('.pagePaddingBottom').val();
  var pagePaddingLeft = $('.pagePaddingLeft').val();
  var pagePaddingRight = $('.pagePaddingRight').val(); 
  var POPBDefaultsEnable = $('.POPBDefaultsEnable').val(); 

  $('#pbWrapper').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover; background-color:'+pageBgColor+'; padding: '+pagePaddingTop+'% '+pagePaddingRight+'% '+pagePaddingBottom+'% '+pagePaddingLeft+'%; display:block;  ');

  var currentVPSPageOps = $('.currentViewPortSize').val();
  if (currentVPSPageOps == 'rbt-l') {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTop').val()+'%',
      'padding-bottom':$('.pagePaddingBottom').val()+'%',
      'padding-left':$('.pagePaddingLeft').val()+'%',
      'padding-right':$('.pagePaddingRight').val()+'%',
    });
  }

  if (currentVPSPageOps == 'rbt-m') {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopTablet').val()+'%',
      'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
      'padding-left':$('.pagePaddingLeftTablet').val()+'%',
      'padding-right':$('.pagePaddingRightTablet').val()+'%',
    });
  }

  if (currentVPSPageOps == 'rbt-s') {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopMobile').val()+'%',
      'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
      'padding-left':$('.pagePaddingLeftMobile').val()+'%',
      'padding-right':$('.pagePaddingRightMobile').val()+'%',
    });
  }



  if (POPBDefaultsEnable == 'true') {

    var POPB_typefaces =  {
      typefaceHOne:$('.typefaceHOne').val(),
      typefaceHTwo:$('.typefaceHTwo').val(),
      typefaceParagraph:$('.typefaceParagraph').val(),
      typefaceButton:$('.typefaceButton').val(),
      typefaceAnchorLink:$('.typefaceAnchorLink').val()
    };

    var POPB_typeSizes = {
      typeSizeHOne:$('.typeSizeHOne').val(),
      typeSizeHTwo:$('.typeSizeHTwo').val(),
      typeSizeParagraph:$('.typeSizeParagraph').val(),
      typeSizeButton:$('.typeSizeButton').val(),
      typeSizeAnchorLink:$('.typeSizeAnchorLink').val(),
    };

    $('#fontLoaderContainer').html('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+POPB_typefaces['typefaceHOne']+'|'+POPB_typefaces['typefaceHTwo']+'|'+POPB_typefaces['typefaceParagraph']+'|'+POPB_typefaces['typefaceButton']+'|'+POPB_typefaces['typefaceAnchorLink']+' ">');

          var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHOne']+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHTwo']+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeParagraph']+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeButton']+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeAnchorLink']+'px; } \n';


          if (currentVPSPageOps == 'rbt-m') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px; } \n';

          }
          if (currentVPSPageOps == 'rbt-s') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px; } \n';

          }
          

          $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);

  }else{
    $('#POPBGlobalStylesTag').html('');
  }

  $('.isChagesMade').val('true');

});



$('.responsiveBtn').click(function(){

  var POPBDeafaultResponsiveStyles = 'h1{font-size:2em ; } h2{ font-size:1.5em ; } h3{ font-size:1.3em ; } h4{ font-size:1em ; } h5{ font-size:1em ; } h6{ font-size:1em ; } p, p span, input, button, label{ font-size: 15px ; } p{  } video{ min-height: auto ; max-width: 100%; } }  .row {width:100% ; padding:30px  0 ; margin: 0 auto ;}  .column {width:99.9% ; margin-bottom: 30px ; } .column > div { padding:10px ; margin: 0 auto ; }';


  if ( $(this).hasClass('rbt-l') ) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTop').val()+'%',
      'padding-bottom':$('.pagePaddingBottom').val()+'%',
      'padding-left':$('.pagePaddingLeft').val()+'%',
      'padding-right':$('.pagePaddingRight').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOne').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwo').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraph').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButton').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLink').val()+'px; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(' ');
  }

  if ($(this).hasClass('rbt-m')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopTablet').val()+'%',
      'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
      'padding-left':$('.pagePaddingLeftTablet').val()+'%',
      'padding-right':$('.pagePaddingRightTablet').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  if ($(this).hasClass('rbt-s')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopMobile').val()+'%',
      'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
      'padding-left':$('.pagePaddingLeftMobile').val()+'%',
      'padding-right':$('.pagePaddingRightMobile').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px; } \n';
      $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);
});


PbPOaceEditorCSS.getSession().on('change',function(e){
  POcustomCSS = PbPOaceEditorCSS.getValue();

  $('#PBPO_customCSS').text(POcustomCSS);
});


$('.checkIfWidgetsAreLoadedInColumn').val('false');
PbColaceEditorCSS.getSession().on('change',function(e){
  POcustomCSS = PbColaceEditorCSS.getValue();

  var checkIfWidgetsAreLoadedInColumn = $('.checkIfWidgetsAreLoadedInColumn').val();

  if (checkIfWidgetsAreLoadedInColumn == 'true') {
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  }
    

});





$('.closeWidgetPopup').click(function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').click();

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').click();
});

$('.closeWidgetPopupIcon').click(function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').click();

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
  currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').click();
});


$('.pageBgImage').change(function(){
    var pageBgImage = $('.pageBgImage').val();
    $('#container').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover;');
  });

$('.card-img').mouseover(function(ev) {
  //console.log($(ev.target).children());
  var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
  //console.log(tempprevbtn);
  $('#'+tempprevbtn).width($(ev.target).width());
  $('#'+tempprevbtn).height($(ev.target).height());
  var tempPhieght = $(ev.target).height();
  $('.tempPrev p').css('margin-top',tempPhieght/2);
  $('#'+tempprevbtn).slideDown(100);
});
$('.card').mouseleave(function(ev){
  $('.tempPrev').slideUp('100');
});

$('.tempPrev').click(function(ev) {
  var ths_tempprev = $(ev.target).attr('id');
  $('.pb_preview_container').attr('style','display:block;overflow:auto;');
  $('.pb_temp_prev').append('<img src='+$('img.'+ths_tempprev).attr('data-img_src')+' class="pb_temp_prev_img" >');
});

$('.pb_preview_container').click(function(){
  $('.pb_preview_container').attr('style','display:none;');
  $('.pb_temp_prev').html(' ');
});




//Responsive Options Buttons Global Script
$('.pb_editor_tab_content #tab1').css('margin','0 auto');

$('.responsiveBtn').on('click',function(){
  $('.responsiveBtn').css('background','#a5a5a5');
  


  $('.responsiveOps').css('display','none');

  if ($(this).hasClass('rbt-l') ) {
    $('.rbt-l').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:'100%' },500 );
    $('.responsiveOptionsContainterLarge').css('display','block');

    $('.currentViewPortSize').val('rbt-l');
    $('.pb_fullScreenEditorButtonClose').css('display','block');
     $('.newRowBtnContainerVisible').css('display','block');
    $('.pb_editor_tab_content').css('background','#fff');
  }

  if ($(this).hasClass('rbt-m') ) {
    $('.rbt-m').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:'768px' },500 );
    $('.responsiveOptionsContainterMedium').css('display','block');

    $('.currentViewPortSize').val('rbt-m');
    $('.pb_editor_tab_content').css('background','#5d5d5d');
    $('.newRowBtnContainerVisible').css('display','none');
    
  }

  if ($(this).hasClass('rbt-s') ) {
    $('.rbt-s').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:'395px' },500 );
    $('.responsiveOptionsContainterSmall').css('display','block');

    $('.currentViewPortSize').val('rbt-s');

    $('.pb_editor_tab_content').css('background','#5d5d5d');
    $('.newRowBtnContainerVisible').css('display','none');
  }


});




// POPB Tabs 

$('.popbNavItem').on('click',function(){
  var clickedPOPBTab = $(this).attr('data-inptabID');
  var currentOptionType = $(this).children('input').attr("name");
  $(this).siblings('.popbNavItem').children('label').css({'background':'#f1f1f1', 'color':'#333'});
  $(this).children('label').css({'background':'#a5a5a5', 'color':'#fff'});
  $(this).parent().next('.popb_input_tabContent').children('.popb_tab_content').css('display','none');
  $(this).parent().next().children('.'+clickedPOPBTab).css('display','block');
  $("."+currentOptionType).prop("checked", false);
  $(this).children('input').prop("checked", true);
  $(this).children('input').trigger("change");
});


$('.popbinputTabsWrapper').tooltip({
  tooltipClass: "inp-tab-tooltip-styling"
});




// Number Sliders 
$('.rowGradientType').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInput').css('display','none');
    $('.linearInput').css('display','block');
  }else{
    $('.radialInput').css('display','block');
    $('.linearInput').css('display','none');
  }
});


$('.rowGradientTypeHover').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInputHover').css('display','none');
    $('.linearInputHover').css('display','block');
  }else{
    $('.radialInputHover').css('display','block');
    $('.linearInputHover').css('display','none');
  }
});

$('.rowOverlayGradientType').on('change',function(){
  var rowOverlayGradientType = $(this).val();
  if (rowOverlayGradientType == 'linear') {
    $('.radialInput').css('display','none');
    $('.linearInput').css('display','block');
  }else{
    $('.radialInput').css('display','block');
    $('.linearInput').css('display','none');
  }
});


$('.colGradientType').on('change',function(){
  var colGradientType = $(this).val();
  if (colGradientType == 'linear') {
    $('.radialInputCol').css('display','none');
    $('.linearInputCol').css('display','block');
  }else{
    $('.radialInputCol').css('display','block');
    $('.linearInputCol').css('display','none');
  }
});


$('.widgGradientType').on('change',function(){
  var widgGradientType = $(this).val();
  if (widgGradientType == 'linear') {
    $('.radialInputWidg').css('display','none');
    $('.linearInputWidg').css('display','block');
  }else{
    $('.radialInputWidg').css('display','block');
    $('.linearInputWidg').css('display','none');
  }
});


$('.colGradientTypeHover').on('change',function(){
  var colGradientTypeHover = $(this).val();
  if (colGradientTypeHover == 'linear') {
    $('.radialInputColHover').css('display','none');
    $('.linearInputColHover').css('display','block');
  }else{
    $('.radialInputColHover').css('display','block');
    $('.linearInputColHover').css('display','none');
  }
});

$('.widgGradientTypeHover').on('change',function(){
  var widgGradientTypeHover = $(this).val();
  if (widgGradientTypeHover == 'linear') {
    $('.radialInputWidgHover').css('display','none');
    $('.linearInputWidgHover').css('display','block');
  }else{
    $('.radialInputWidgHover').css('display','block');
    $('.linearInputWidgHover').css('display','none');
  }
});

$( ".PoPbrangeSlider" ).slider({
  value:0,
  min: 0,
  max: 100,
  step: 5,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});

$( ".PoPbrangeSliderAngle" ).slider({
  value:0,
  min: 0,
  max: 360,
  step: 5,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});

$( ".PoPbrangeSliderTransition" ).slider({
  value:1,
  min: 0.1,
  max: 3,
  step: 0.1,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});




jQuery('#pbCountDownDate').datepicker({
  dateFormat: 'yy/mm/dd'
});





}( jQuery ) );
















(function ($) {

  // Detect touch support
  $.support.touch = 'ontouchend' in document;

  // Ignore browsers without touch support
  if (!$.support.touch) {
    return;
  }

  var mouseProto = $.ui.mouse.prototype,
      _mouseInit = mouseProto._mouseInit,
      _mouseDestroy = mouseProto._mouseDestroy,
      touchHandled;

  /**
   * Simulate a mouse event based on a corresponding touch event
   * @param {Object} event A touch event
   * @param {String} simulatedType The corresponding mouse event
   */
  function simulateMouseEvent (event, simulatedType) {

    // Ignore multi-touch events
    if (event.originalEvent.touches.length > 1) {
      return;
    }

    event.preventDefault();

    var touch = event.originalEvent.changedTouches[0],
        simulatedEvent = document.createEvent('MouseEvents');
    
    // Initialize the simulated mouse event using the touch event's coordinates
    simulatedEvent.initMouseEvent(
      simulatedType,    // type
      true,             // bubbles                    
      true,             // cancelable                 
      window,           // view                       
      1,                // detail                     
      touch.screenX,    // screenX                    
      touch.screenY,    // screenY                    
      touch.clientX,    // clientX                    
      touch.clientY,    // clientY                    
      false,            // ctrlKey                    
      false,            // altKey                     
      false,            // shiftKey                   
      false,            // metaKey                    
      0,                // button                     
      null              // relatedTarget              
    );

    // Dispatch the simulated event to the target element
    event.target.dispatchEvent(simulatedEvent);
  }

  /**
   * Handle the jQuery UI widget's touchstart events
   * @param {Object} event The widget element's touchstart event
   */
  mouseProto._touchStart = function (event) {

    var self = this;

    // Ignore the event if another widget is already being handled
    if (touchHandled || !self._mouseCapture(event.originalEvent.changedTouches[0])) {
      return;
    }

    // Set the flag to prevent other widgets from inheriting the touch event
    touchHandled = true;

    // Track movement to determine if interaction was a click
    self._touchMoved = false;

    // Simulate the mouseover event
    simulateMouseEvent(event, 'mouseover');

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');

    // Simulate the mousedown event
    simulateMouseEvent(event, 'mousedown');
  };

  /**
   * Handle the jQuery UI widget's touchmove events
   * @param {Object} event The document's touchmove event
   */
  mouseProto._touchMove = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    // Interaction was not a click
    this._touchMoved = true;

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');
  };

  /**
   * Handle the jQuery UI widget's touchend events
   * @param {Object} event The document's touchend event
   */
  mouseProto._touchEnd = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    simulateMouseEvent(event, 'mouseup');

    simulateMouseEvent(event, 'mouseout');

    if (!this._touchMoved) {

      simulateMouseEvent(event, 'click');
    }

    touchHandled = false;
  };

  
  mouseProto._mouseInit = function () {
    
    var self = this;

    self.element.bind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    _mouseInit.call(self);
  };

  
  mouseProto._mouseDestroy = function () {
    
    var self = this;

    // Delegate the touch handlers to the widget's element
    self.element.unbind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    // Call the original $.ui.mouse destroy method
    _mouseDestroy.call(self);
  };

})(jQuery);