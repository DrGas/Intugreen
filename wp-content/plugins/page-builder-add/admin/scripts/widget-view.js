( function( $ ) { 
pageBuilderApp.WidgetView = Backbone.View.extend({
  tagName: 'div',
  className: 'wdt-droppable',
  template: _.template($('#widget-template').html()),
  attributes: function() {
        if(this.model) {
            return {
                'data-widgetID': this.model.cid
            }
        }
        return {}
    },
  events: {
    'click #widgetDelete': 'deleteWidget',
    'click #widgetEdit': 'EditWidget',
    'click #widgetSave': 'updateWidget',
    'click #widgetDuplicate': 'duplicateWidget',
    'click #updateWidgetTemplate': 'updateWidgetTemplate',
  },
  initialize: function () {
    _.bindAll(this,'render','deleteWidget','EditWidget','updateWidget','duplicateWidget','updateWidgetTemplate' );
  },
  render: function () {
    this.$el.html(this.template(this.model.toJSON() )  );

    var widgetType = this.model.get('widgetType');
    var textb = "<br> To edit this widget click the edit button. <br><br> To change widget just drop any other widget here.";
    switch(widgetType){
        case 'wigt-WYSIWYG': textc = 'Text Widget';      var texta = 'fa-file-text-o'; break;
        case 'wigt-img': textc = 'Image Widget';      var texta = 'fa-picture-o'; break;
        case 'wigt-menu': textc = 'Menu Widget';     var texta = 'fa-picture-o'; break;
        case 'wigt-slider': textc = 'Slider Widget';   var texta = "Slider Extension"; break;
        case 'wigt-smuzform': textc = 'Form Builder Widget';     var texta = "Form Extension"; break;
        case 'wigt-btn-gen': textc = 'Button Widget';      var texta = 'fa-mouse-pointer'; break;
        case 'wigt-Sform': textc = 'Subscribe Form Widget';    var texta = "Subscribe Form Extension"; break;
        case 'wigt-PostSlider': textc = 'Posts Slider Widget';   var texta = "Posts Slider Extension"; break;
        case 'wigt-TestimonialSlider': textc = 'Testimonial Slider Widget';    var texta = "Testimonial Slider Extension"; break;
        case 'wigt-SocialFeed': textc = 'Social Stream Widget';   var texta = "Social Feed Extension"; break;
        case 'wigt-pb-form': textc = 'Subscribe Form Widget';      var texta = 'fa-envelope-o'; break;
        case 'wigt-video': textc = 'Video Widget';    var texta = 'fa-video-camera'; break;
        case 'wigt-pb-postSlider': textc = 'Posts Slider Widget';    var texta = 'fa-file-image-o'; break;
        case 'wigt-pb-icons': textc = 'Icon Widget';     var texta = 'fa-fonticons'; break;
        case 'wigt-pb-counter': textc = 'Number Counter Widget';   var texta = 'fa-sort-numeric-desc'; break;
        case 'wigt-pb-audio': textc = 'Audio Widget';     var texta = 'fa-file-audio-o'; break;
        case 'wigt-pb-cards': textc = 'Card Widget';     var texta = 'fa-fonticons'; break;
        case 'wigt-pb-testimonial': textc = 'Testimonial Widget';   var texta = 'fa-quote-left'; break;
        case 'wigt-pb-shortcode': textc = 'Shortcode Widget';     var texta = 'fa-code'; break;
        case 'wigt-pb-countdown': textc = 'Countdown Timer Widget';     var texta = 'fa-sort-numeric-desc'; break;
        case 'wigt-pb-imageSlider': textc = 'Image Slider Widget';     var texta = 'fa-file-image-o'; break;
        case 'wigt-pb-progressBar': textc = 'Progress Bar Widget';     var texta = 'fa-align-left'; break;
        case 'wigt-pb-pricing': textc = 'Pricing Widget';     var texta = 'fa-tags'; break;
        case 'wigt-pb-iconList': textc = 'Icon List';     var texta = 'fa-list'; break;
        case 'wigt-pb-break': textc = 'Break';     var texta = 'fa-ellipsis-h'; break;
        case 'wigt-pb-spacer': textc = 'Spacer';     var texta = 'fa-arrows-v'; break;
        case 'wigt-pb-formBuilder': textc = 'Form Builder';     var texta = 'fa-wpforms'; break;

        case 'wigt-pb-imgCarousel': textc = 'Image Carousel';     var texta = ' "> <i class="fa fa-image"></i><i class="fa fa-image"></i " '; break;

        case 'wigt-pb-wooCommerceProducts': textc = 'WooCommerce Products';     var texta = 'fa-shopping-cart'; break;
        case 'wigt-pb-text': textc = 'Text Widget';     var texta = 'fa-text-width'; break;
        case 'wigt-pb-embededVideo': textc = 'Embed Video';     var texta = 'fa-youtube-play'; break;
        case 'wigt-pb-popupClose': textc = 'Button Close';     var texta = 'fa-remove'; break;


        default : textc = 'No Widget Selected';     var texta = 'Drag a widget or extension and drop it here to use it.'; var textb = " ";  break;
      }

    $(this.el).append('<p class="widget-area-'+this.model.cid+'" style="margin-top:-45px; font-size:14px;"> <i style="font-size:28px; color:#40AFF9;" class="fa '+texta+'"></i> <br>'+textc+' <br> '+textb+'</p> <div style=" display:none;margin-top:-3px; margin-right:5px; "  class="wdt-edit-controls"><div class="btn btn-red remove-widgets" id="widgetDelete" " ><span class="dashicons dashicons-trash"></span></div><div id="widgetEdit" class="btn editWidget-'+this.model.cid+'" "> <span class="dashicons dashicons-edit"></span></div><div id="widgetDuplicate" class="btn" "> <span class="dashicons dashicons-admin-page"></span></div>  <div id="updateWidgetTemplate" class="pb_hidden" data-thisWidgetCid="'+this.model.cid+'"  data-selected_widget_template=""></div>  </div>  <input type="text" name="widget-type" class="bp_hidden" style="display:none"  data-widgetType-id="'+this.model.cid+'" value="'+widgetType+'">');

    $('.wdt-droppable').mouseover(function(ev){
        $(ev.target).children(' .wdt-edit-controls').css('display','block');
    });
    $('.wdt-droppable').mouseleave(function(ev){
        $('.wdt-edit-controls').css('display','none');
    });

    $(this.el).append('<div id="widgetSave" class="pb_hidden" data-saveCurrWidget="'+this.model.cid+'"></div>');
  },
  deleteWidget: function () {
    this.model.destroy();
    $(this.el).remove();
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
    jQuery('#'+pageBuilderApp.currentlyEditedColId).children('.wdgt-colChange').click();
    //alert('deleted');
  },
  EditWidget: function () {
    $('.lpp_modal_2').show('slide',{ direction : 'left' },500);  
    var this_widget_type = $('input[data-widgetType-id="'+this.model.cid+'"]').val();

    thisWidgetIndex = pageBuilderApp.widgetList.indexOf(this.model);
    if (pageBuilderApp.currentlyEditedWidgId != thisWidgetIndex) {
      pageBuilderApp.currentlyEditedWidgId = thisWidgetIndex
    }
    

    //console.log( JSON.stringify(this.model.attributes ) );

    var widgetStyling = this.model.get('widgetStyling');
    var widgetMtop = this.model.get('widgetMtop');
    var widgetMbottom = this.model.get('widgetMbottom');
    var widgetMleft = this.model.get('widgetMleft');
    var widgetMright = this.model.get('widgetMright');
    var widgetPtop = this.model.get('widgetPtop');
    var widgetPbottom = this.model.get('widgetPbottom');
    var widgetPleft = this.model.get('widgetPleft');
    var widgetPright = this.model.get('widgetPright');
    var widgetBgColor = this.model.get('widgetBgColor');
    var widgetAnimation = this.model.get('widgetAnimation');
    

    //setting values to empty fields
    $('.widgetStyling').val(widgetStyling);
    $('.widgetMtop').val(widgetMtop);
    $('.widgetMbottom').val(widgetMbottom);
    $('.widgetMleft').val(widgetMleft);
    $('.widgetMright').val(widgetMright);
    $('.widgetPtop').val(widgetPtop);
    $('.widgetPbottom').val(widgetPbottom);
    $('.widgetPleft').val(widgetPleft);
    $('.widgetPright').val(widgetPright);
    $('.widgetBgColor').val(widgetBgColor); 
    $('.widgetAnimation').val(widgetAnimation); 
    
    $('.widgetBorderWidth').val(this.model.get('widgetBorderWidth'));
    $('.widgetBorderStyle').val(this.model.get('widgetBorderStyle'));
    $('.widgetBorderColor').val(this.model.get('widgetBorderColor'));
    $('.widgetBorderRadius').val(this.model.get('widgetBorderRadius'));
    $('.widgetBoxShadowH').val(this.model.get('widgetBoxShadowH'));
    $('.widgetBoxShadowV').val(this.model.get('widgetBoxShadowV'));
    $('.widgetBoxShadowBlur').val(this.model.get('widgetBoxShadowBlur'));
    $('.widgetBoxShadowColor').val(this.model.get('widgetBoxShadowColor'));

    widgetborderRadius = this.model.get('borderRadius');
    widgetborderWidth = this.model.get('borderWidth');

    if (typeof(widgetborderRadius) != 'undefined' && widgetborderRadius != null) {
      $('.wbrt').val(widgetborderRadius['wbrt'] );
      $('.wbrb').val(widgetborderRadius['wbrb'] );
      $('.wbrl').val(widgetborderRadius['wbrl'] );
      $('.wbrr').val(widgetborderRadius['wbrr'] );
    }else{
      $('.wbrt').val( this.model.get('widgetBorderRadius') );
      $('.wbrb').val( this.model.get('widgetBorderRadius') );
      $('.wbrl').val( this.model.get('widgetBorderRadius') );
      $('.wbrr').val( this.model.get('widgetBorderRadius') );
    }
    if (typeof(widgetborderWidth) != 'undefined' && widgetborderWidth != null) {
      $('.wbwt').val(widgetborderWidth['wbwt'] );
      $('.wbwb').val(widgetborderWidth['wbwb'] );
      $('.wbwl').val(widgetborderWidth['wbwl'] );
      $('.wbwr').val(widgetborderWidth['wbwr'] );
    }else{
      $('.wbwt').val( this.model.get('widgetBorderWidth') );
      $('.wbwb').val( this.model.get('widgetBorderWidth') );
      $('.wbwl').val( this.model.get('widgetBorderWidth') );
      $('.wbwr').val( this.model.get('widgetBorderWidth') );
    }
    

    $('.widgetBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',widgetBgColor);
    
    $('.widgetIsInline').val('');
    if (typeof(this.model.get('widgetIsInline')) !== 'undefined' ) {
        widgetIsInline = this.model.get('widgetIsInline');
        $('.widgetIsInline').val(widgetIsInline);
    }

    $('.widgetCustomClass').val('');
    if (typeof(this.model.get('widgetCustomClass')) !== 'undefined' ) {
        widgetCustomClass = this.model.get('widgetCustomClass');
        $('.widgetCustomClass').val(widgetCustomClass);
    }

    if (typeof(this.model.get('widgetIsInlineTablet')) !== 'undefined' ) {
        widgetIsInlineTablet = this.model.get('widgetIsInlineTablet');
        $('.widgetIsInlineTablet').val(widgetIsInlineTablet);

        widgetIsInlineMobile = this.model.get('widgetIsInlineMobile');
        $('.widgetIsInlineMobile').val(widgetIsInlineMobile);
    }

    if (typeof(this.model.get('widgHideOnDesktop')) !== 'undefined' ) {
        widgHideOnDesktop = this.model.get('widgHideOnDesktop');
        $('.widgHideOnDesktop').val(widgHideOnDesktop);

        widgHideOnTablet = this.model.get('widgHideOnTablet');
        $('.widgHideOnTablet').val(widgHideOnTablet);

        widgHideOnMobile = this.model.get('widgHideOnMobile');
        $('.widgHideOnMobile').val(widgHideOnMobile);
    }



    if (typeof(this.model.get('widgetPaddingTablet')) !== 'undefined' ) {
        widgetPaddingTablet = this.model.get('widgetPaddingTablet');
        widgetPaddingMobile = this.model.get('widgetPaddingMobile');
        widgetMarginTablet = this.model.get('widgetMarginTablet');
        widgetMarginMobile = this.model.get('widgetMarginMobile');

        $('.widgetMTopTablet').val(widgetMarginTablet['rMTT']);
        $('.widgetMBottomTablet').val(widgetMarginTablet['rMBT']);
        $('.widgetMLeftTablet').val(widgetMarginTablet['rMLT']);
        $('.widgetMRightTablet').val(widgetMarginTablet['rMRT']);

        $('.widgetPTopTablet').val(widgetPaddingTablet['rPTT']);
        $('.widgetPBottomTablet').val(widgetPaddingTablet['rPBT']);
        $('.widgetPLeftTablet').val(widgetPaddingTablet['rPLT']);
        $('.widgetPRightTablet').val(widgetPaddingTablet['rPRT']);


        $('.widgetMTopMobile').val(widgetMarginMobile['rMTM']);
        $('.widgetMBottomMobile').val(widgetMarginMobile['rMBM']);
        $('.widgetMLeftMobile').val(widgetMarginMobile['rMLM']);
        $('.widgetMRightMobile').val(widgetMarginMobile['rMRM']);

        $('.widgetPTopMobile').val(widgetPaddingMobile['rPTM']);
        $('.widgetPBottomMobile').val(widgetPaddingMobile['rPBM']);
        $('.widgetPLeftMobile').val(widgetPaddingMobile['rPLM']);
        $('.widgetPRightMobile').val(widgetPaddingMobile['rPRM']);

    } else{
        $('.widgetMTopTablet').val('');
        $('.widgetMBottomTablet').val('');
        $('.widgetMLeftTablet').val('');
        $('.widgetMRightTablet').val('');

        $('.widgetPTopTablet').val('');
        $('.widgetPBottomTablet').val('');
        $('.widgetPLeftTablet').val('');
        $('.widgetPRightTablet').val('');


        $('.widgetMTopMobile').val('');
        $('.widgetMBottomMobile').val('');
        $('.widgetMLeftMobile').val('');
        $('.widgetMRightMobile').val('');

        $('.widgetPTopMobile').val('');
        $('.widgetPBottomMobile').val('');
        $('.widgetPLeftMobile').val('');
        $('.widgetPRightMobile').val('');
    }



    if (typeof( this.model.get('widgGradient') ) !== "undefined"){
        var widgGradient = this.model.get('widgGradient');

        $.each(widgGradient, function(index,val){
          $('.'+index).val(val);

          if (index == 'widgGradientColorFirst') {
            $('.widgGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'widgGradientColorSecond') {
            $('.widgGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }

        });

        if (widgGradient['widgGradientType'] == 'linear') {
          $('.radialInput').css('display','none');
          $('.linearInput').css('display','block');
        } else if (widgGradient['widgGradientType'] == 'radial') {
          $('.radialInput').css('display','block');
          $('.linearInput').css('display','none');
        }

      }else{
        $('.widgGradientColorFirst').val('');
        $('.widgGradientLocationFirst').val('');
        $('.widgGradientColorSecond').val('');
        $('.widgGradientLocationSecond').val('');
        $('.widgGradientType').val('');
        $('.widgGradientPosition').val('');
        $('.widgGradientAngle').val('');
      }

    if (typeof(this.model.get('widgBackgroundType')) !== "undefined"){
        if (this.model.get('widgBackgroundType') == 'solid') {
          $(".POPBInputNormalWidg .widgBackgroundTypeSolid").prop("checked", true);
          $('.POPBInputNormalWidg .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalWidg .widgBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalWidg .popb_tab_content').css('display','none');
          $('.POPBInputNormalWidg .content_popb_tab_1').css('display','block');
        }
        if (this.model.get('widgBackgroundType') == 'gradient') {
          $(".widgBackgroundTypeGradient").prop("checked", true);
          $('.POPBInputNormalWidg .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.widgBackgroundTypeGradient').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalWidg .popb_tab_content').css('display','none');
          $('.POPBInputNormalWidg .content_popb_tab_2').css('display','block');
        }
      }else{
          $(".POPBInputNormalWidg .widgBackgroundTypeSolid").prop("checked", true);
          $('.popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalWidg .widgBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.popb_tab_content').css('display','none');
          $('.content_popb_tab_1').css('display','block');
      }

    if (typeof(this.model.get('widgHoverOptions')) !== "undefined") {
        var widgHoverOptions = this.model.get('widgHoverOptions');

        $('.widgBgColorHover').val(widgHoverOptions['widgBgColorHover']);
        $('.widgHoverTransitionDuration').val(widgHoverOptions['widgHoverTransitionDuration']);

        $('.widgBgColorHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',widgHoverOptions['widgBgColorHover']);

        if (widgHoverOptions['widgBackgroundTypeHover'] == 'solid') {
          $(".widgBackgroundTypeSolidHover").prop("checked", true);
          $('.POPBInputHoverWidg .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.widgBackgroundTypeSolidHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHoverWidg .popb_tab_content').css('display','none');
          $('.POPBInputHoverWidg .content_popb_tab_1').css('display','block');
        }
        if (widgHoverOptions['widgBackgroundTypeHover'] == 'gradient') {
          $(".widgBackgroundTypeGradientHover").prop("checked", true);
          $('.POPBInputHoverWidg .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.widgBackgroundTypeGradientHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHoverWidg .popb_tab_content').css('display','none');
          $('.POPBInputHoverWidg .content_popb_tab_2').css('display','block');
        }

        var widgGradientHover = widgHoverOptions['widgGradientHover'];
        $.each(widgGradientHover, function(index,val){
          $('.'+index).val(val);

          if (index == 'widgGradientColorFirstHover') {
            $('.widgGradientColorFirstHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'widgGradientColorSecondHover') {
            $('.widgGradientColorSecondHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
        });

        if (widgGradientHover['widgGradientTypeHover'] == 'linear') {
          $('.radialInputHover').css('display','none');
          $('.linearInputHover').css('display','block');
        } else if (widgGradientHover['widgGradientTypeHover'] == 'radial') {
          $('.radialInputHover').css('display','block');
          $('.linearInputHover').css('display','none');
        }

        if (typeof(widgHoverOptions['widgetHoverAnimation']) !== "undefined") {
          var widgetHoverAnimation = widgHoverOptions['widgetHoverAnimation'];
          $('.widgetHoverAnimation').val(widgetHoverAnimation);
        }else{
          $('.widgetHoverAnimation').val('');
        }

      }else{
        $('.widgGradientColorFirstHover').val('');
        $('.widgGradientLocationFirstHover').val('');
        $('.widgGradientColorSecondHover').val('');
        $('.widgGradientLocationSecondHover').val('');
        $('.widgGradientTypeHover').val('');
        $('.widgGradientPositionHover').val('');
        $('.widgGradientAngleHover').val('');
      }



    jQuery('.widgetblock').hide();

    jQuery('.widgetblock:contains("'+this_widget_type+'")').show();
    //$('#columnContent').val(this_column_content);

    switch (this_widget_type) { 
        case 'wigt-WYSIWYG':
            // WYISWYG Options
            var this_widget_editor_content = this.model.get('widgetWYSIWYG');
            var editorContent = this_widget_editor_content['widgetContent'];

            // Editor Widget Options
            var editorID = 'columnContent';
            if ($('#wp-'+editorID+'-wrap').hasClass("tmce-active"))
                tinyMCE.get(editorID).setContent(editorContent);
            else
              $('#'+editorID).val(editorContent);
          $('.pbp-widgets').hide(100);
          $('.wdt-editor').slideDown(500);
          break;
        case 'wigt-img':
            //Image widget Options
            var this_widget_img_content = this.model.get('widgetImg');
            var imgUrl  = this_widget_img_content['imgUrl'];
            var imgSize = this_widget_img_content['imgSize'];
            var imgAlignment = this_widget_img_content['imgAlignment'];
            var imgSizeCustomWidth = this_widget_img_content['imgSizeCustomWidth'];
            var imgSizeCustomHeight = this_widget_img_content['imgSizeCustomHeight'];
            var imgLightBox = this_widget_img_content['imgLightBox'];
            var imgLink = this_widget_img_content['imgLink'];

            $('.ftr-img').val(imgUrl);
            $('#ftr-img-size').val(imgSize);
            $('.imgAlignment').val(imgAlignment);
            $('.imgAlignmentTablet').val(this_widget_img_content['imgAlignmentTablet']);
            $('.imgAlignmentMobile').val(this_widget_img_content['imgAlignmentMobile']);
            $('.ftr-img').val(imgUrl);
            $('.imgSizeCustomWidth').val(imgSizeCustomWidth);
            $('.imgSizeCustomWidthTablet').val(this_widget_img_content['imgSizeCustomWidthTablet']);
            $('.imgSizeCustomWidthMobile').val(this_widget_img_content['imgSizeCustomWidthMobile']);
            $('.imgSizeCustomHeight').val(imgSizeCustomHeight);
            $('.imgSizeCustomHeightTablet').val(this_widget_img_content['imgSizeCustomHeightTablet']);
            $('.imgSizeCustomHeightMobile').val(this_widget_img_content['imgSizeCustomHeightMobile']);
            $('.imgLightBox').val(imgLightBox);
            $('.imgLink').val(imgLink);

            $('.pbp-widgets').hide(100);
            $('.wdt-img').slideDown(500);
          break;
        case 'wigt-menu':
            // Menu Widget
            var this_widget_menu_content = this.model.get('widgetMenu');
            var menuName = this_widget_menu_content['menuName'];
            var menuStyle = this_widget_menu_content['menuStyle'];
            var menuColor = this_widget_menu_content['menuColor'];

            if (typeof(this_widget_menu_content['pbMenuFontFamily']) != 'undefined') {
                pbMenuFontFamily = this_widget_menu_content['pbMenuFontFamily'];
            } else{
                pbMenuFontFamily = ' none';
            }

            if (typeof(this_widget_menu_content['pbMenuFontHoverColor']) != 'undefined') {
                pbMenuFontHoverColor = this_widget_menu_content['pbMenuFontHoverColor'];
            } else{
                pbMenuFontHoverColor = '';
            }
            if (typeof(this_widget_menu_content['pbMenuFontHoverBgColor']) != 'undefined') {
                pbMenuFontHoverBgColor = this_widget_menu_content['pbMenuFontHoverBgColor'];
            } else{
                pbMenuFontHoverBgColor = '';
            }
            if (typeof(this_widget_menu_content['pbMenuFontSize']) != 'undefined') {
                pbMenuFontSize = this_widget_menu_content['pbMenuFontSize'];
            } else{
                pbMenuFontSize = '';
            }

            $('#ftr-menu-select').val(menuName);
            $('input[value='+menuStyle+']').attr('checked','checked');
            $('#ftr-menu-color').val(menuColor);
            $('.pbMenuFontFamily').val(pbMenuFontFamily);
            $('.pbMenuFontHoverColor').val(pbMenuFontHoverColor);
            $('.pbMenuFontHoverBgColor').val(pbMenuFontHoverBgColor);
            $('.pbMenuFontSize').val(pbMenuFontSize);

            $('.pbMenuFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html(pbMenuFontFamily.replace(/\+/g, ' '));
            $('#ftr-menu-color').parent().parent().siblings('.wp-color-result').css('background-color',menuColor);

            $('.pbMenuFontHoverColor').parent().parent().siblings('.wp-color-result').css('background-color',pbMenuFontHoverColor);
            $('.pbMenuFontHoverBgColor').parent().parent().siblings('.wp-color-result').css('background-color',pbMenuFontHoverBgColor);

          $('.pbp-widgets').hide(100);
          $('.wdt-menu').slideDown(500);
          break;
        case 'wigt-btn-gen':
          $('.btnHoverTextColor').val('');
            var this_widget_btn = this.model.get('widgetButton');
            $('.btnButtonAlignmentTablet').val('');
            $('.btnButtonAlignmentMobile').val('');
            $.each(this_widget_btn,function(index, val){
                $('.'+index).val(val);

                if (index == 'btnTextColor') {
                    $('.btnColor').val(val);
                }
                if (index == 'btnBgColor') {
                    $('.btnBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'btnHoverBgColor') {
                    $('.btnHoverBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'btnHoverTextColor') {
                    $('.btnHoverTextColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'btnColor') {
                    $('.btnColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'btnBorderColor') {
                    $('.btnBorderColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }

                if (index == 'btnButtonFontFamily') {
                    if (val !== '') {
                        $('.btnButtonFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html(val.replace(/\+/g, ' '));
                    }
                }

                if (index == 'btnSelectedIcon') {
                  $('.btnSelectedIconpbicp-auto').val(val);
                  $('.btnSelectedIcon').children().attr('class',val);
                }
                
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-btn-gen').slideDown(500);
          break;
          case 'wigt-pb-form':
            // Subscribe Form Widget
            var this_widget_subscribeForm = this.model.get('widgetSubscribeForm');
            var formLayout = this_widget_subscribeForm['formLayout'];
            var showNameField = this_widget_subscribeForm['showNameField'];
            var successAction = this_widget_subscribeForm['successAction'];
            var successURL = this_widget_subscribeForm['successURL'];
            var successMessage = this_widget_subscribeForm['successMessage'];

            var formBtnText = this_widget_subscribeForm['formBtnText'];
            var formBtnHeight = this_widget_subscribeForm['formBtnHeight'];
            var formBtnWidth = this_widget_subscribeForm['formBtnWidth'];
            var formBtnBgColor = this_widget_subscribeForm['formBtnBgColor'];
            var formBtnColor = this_widget_subscribeForm['formBtnColor'];
            var formBtnHoverBgColor = this_widget_subscribeForm['formBtnHoverBgColor'];
            var formBtnFontSize = this_widget_subscribeForm['formBtnFontSize'];
            var formBtnBorderWidth = this_widget_subscribeForm['formBtnBorderWidth'];
            var formBtnBorderColor = this_widget_subscribeForm['formBtnBorderColor'];
            var formBtnBorderRadius = this_widget_subscribeForm['formBtnBorderRadius'];

            if (this_widget_subscribeForm['formDataSaveType'] != 'undefined') {
                var formDataSaveType = this_widget_subscribeForm['formDataSaveType'];
            }
            if (this_widget_subscribeForm['formBtnHeightTablet'] != 'undefined') {
                $('.formBtnHeightTablet').val(this_widget_subscribeForm['formBtnHeightTablet']);
                $('.formBtnHeightMobile').val(this_widget_subscribeForm['formBtnHeightMobile']);
                $('.formBtnFontSizeTablet').val(this_widget_subscribeForm['formBtnFontSizeTablet']);
                $('.formBtnFontSizeMobile').val(this_widget_subscribeForm['formBtnFontSizeMobile']);
            }else{
                $('.formBtnHeightTablet').val('');
                $('.formBtnHeightMobile').val('');
                $('.formBtnFontSizeTablet').val('');
                $('.formBtnFontSizeMobile').val('');
            }
            formBtnFontFamily = 'select';
            if (typeof(this_widget_subscribeForm['formBtnFontFamily']) != 'undefined') {
                var formBtnFontFamily = this_widget_subscribeForm['formBtnFontFamily'];
            }

            formSuccessMessageColor = '#333';
            if (typeof(this_widget_subscribeForm['formSuccessMessageColor']) != 'undefined') {
                var formSuccessMessageColor = this_widget_subscribeForm['formSuccessMessageColor'];
            }
            formBtnHoverTextColor = '';
            if (typeof(this_widget_subscribeForm['formBtnHoverTextColor']) != 'undefined') {
                var formBtnHoverTextColor = this_widget_subscribeForm['formBtnHoverTextColor'];
            }

            if (this_widget_subscribeForm['formbtnSelectedIcon'] != 'undefined') {
              $('.formbtnIconPosition').val(this_widget_subscribeForm['formbtnIconPosition']);
              $('.formbtnIconGap').val(this_widget_subscribeForm['formbtnIconGap']);
              $('.formbtnIconAnimation').val(this_widget_subscribeForm['formbtnIconAnimation']);

              $('.formbtnSelectedIconpbicp-auto').val(this_widget_subscribeForm['formbtnSelectedIcon']);
              $('.formbtnSelectedIcon').children().attr('class',this_widget_subscribeForm['formbtnSelectedIcon']);
            }else{
              $('.formbtnSelectedIcon').val('');
              $('.formbtnIconPosition').val('');
              $('.formbtnIconGap').val('');
              $('.formbtnIconAnimation').val('');
              $('.formbtnSelectedIcon').children().attr('class','');
            }

            var formAccountName = $('.mailchimpListIdHolder').val();
            var formApiKey = $('.mailchimpApiKeyHolder').val();

            formDataMailChimpApi = $('.mailchimpApiKeyHolder').val();
            formDataMailChimpListId = $('.mailchimpListIdHolder').val();
            if (typeof(this_widget_subscribeForm['formDataMailChimpApi']) != 'undefined') {
                var formDataMailChimpApi = this_widget_subscribeForm['formDataMailChimpApi'];
                var formDataMailChimpListId = this_widget_subscribeForm['formDataMailChimpListId'];
            }

            if (typeof(this_widget_subscribeForm['isMcActive']) != 'undefined') {
              $('.isMcActive').val(this_widget_subscribeForm['isMcActive']);
            }

            var formIntegrations = '';
            if (typeof(this_widget_subscribeForm['formIntegrations']) != 'undefined' ) {
              formIntegrations = this_widget_subscribeForm['formIntegrations'];
              $.each(formIntegrations['getResponse'], function(index,val){
                $('.'+index).val(val);
              });
              $.each(formIntegrations['campaignMonitor'], function(index,val){
                $('.'+index).val(val);
              });

              $.each(formIntegrations['activeCampaign'], function(index,val){
                $('.'+index).val(val);
              });

              if (typeof(formIntegrations['drip']) != 'undefined') {
                $.each(formIntegrations['drip'], function(index,val){
                  $('.'+index).val(val);
                });
              }

            }


            //  Subs Form
            $('.formLayout').val(formLayout);
            $('.showNameField').val(showNameField);
            $('.successAction').val(successAction);
            $('.successURL').val(successURL);
            $('.successMessage').val(successMessage);
            $('.formBtnText').val(formBtnText);
            $('.formBtnHeight').val(formBtnHeight);
            $('.formBtnWidth').val(formBtnWidth);
            $('.formBtnBgColor').val(formBtnBgColor);
            $('.formBtnHoverTextColor').val(formBtnHoverTextColor);
            $('.formBtnColor').val(formBtnColor);
            $('.formBtnHoverBgColor').val(formBtnHoverBgColor);
            $('.formBtnFontSize').val(formBtnFontSize);
            $('.formBtnBorderWidth').val(formBtnBorderWidth);
            $('.formBtnBorderColor').val(formBtnBorderColor);
            $('.formBtnBorderRadius').val(formBtnBorderRadius); 
            $('.formBtnFontFamily').val(formBtnFontFamily);
            $('.formSuccessMessageColor').val(formSuccessMessageColor);
            $('.formDataSaveType').val(formDataSaveType);
            $('.formDataMailChimpListId').val(formDataMailChimpListId);
            $('.formDataMailChimpApi').val(formDataMailChimpApi);   

            $('.formBtnFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html(formBtnFontFamily.replace(/\+/g, ' '));
            
            $('.formBtnBgColor').parent().parent().siblings('.wp-color-result').css('background-color',formBtnBgColor);
            $('.formBtnColor').parent().parent().siblings('.wp-color-result').css('background-color',formBtnColor);
            $('.formBtnHoverBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',formBtnHoverBgColor);
            $('.formBtnBorderColor').parent().parent().siblings('.wp-color-result').css('background-color',formBtnBorderColor);


          $('.pbp-widgets').hide(100);
          $('.wdt-pb-form').slideDown(500);
          break;
          case 'wigt-video':

            //Video Widget
            var this_widget_video = this.model.get('widgetVideo');
            var videoWebM = this_widget_video['videoWebM'];
            var videoMpfour = this_widget_video['videoMpfour'];
            var videoThumb = this_widget_video['videoThumb'];
            var vidAutoPlay = this_widget_video['vidAutoPlay'];
            var vidLoop = this_widget_video['vidLoop'];
            var vidControls = this_widget_video['vidControls'];

            //video
            $('.videoMpfour').val(videoMpfour);
            $('.videoWebM').val(videoWebM);
            $('.videoThumb').val(videoThumb);
            $('.vidAutoPlay').val(vidAutoPlay);
            $('.vidLoop').val(vidLoop); 
            $('.vidControls').val(vidControls);  

          $('.pbp-widgets').hide(100);
          $('.wdt-video').slideDown(500);
          break;
          case 'wigt-pb-postSlider':

            //post slider
            var this_widget_pbPS = this.model.get('widgetPBPostsSlider');
            psAutoplay = this_widget_pbPS['psAutoplay'];
            psSlideDelay = this_widget_pbPS['psSlideDelay'];
            psSlideLoop = this_widget_pbPS['psSlideLoop'];
            psSlideTransition = this_widget_pbPS['psSlideTransition'];
            psPostsNumber = this_widget_pbPS['psPostsNumber'];
            psDots = this_widget_pbPS['psDots'];
            psArrows = this_widget_pbPS['psArrows'];
            psFtrImage = this_widget_pbPS['psFtrImage'];
            psFtrImageSize = this_widget_pbPS['psFtrImageSize'];
            psExcerpt = this_widget_pbPS['psExcerpt'];
            psReadMore = this_widget_pbPS['psReadMore'];
            psMoreLinkText = this_widget_pbPS['psMoreLinkText'];
            psHeadingSize = this_widget_pbPS['psHeadingSize'];
            psTextAlignment = this_widget_pbPS['psTextAlignment'];
            psBgColor = this_widget_pbPS['psBgColor'];
            psTxtColor = this_widget_pbPS['psTxtColor'];
            psHeadingTxtColor = this_widget_pbPS['psHeadingTxtColor'];
            psPostType = this_widget_pbPS['psPostType'];
            psPostsOrderBy = this_widget_pbPS['psPostsOrderBy'];
            psPostsOrder = this_widget_pbPS['psPostsOrder'];
            psPostsFilterBy = this_widget_pbPS['psPostsFilterBy'];
            psFilterValue = this_widget_pbPS['psFilterValue'];

            // Widget Posts Slider
            $('.psAutoplay').val(psAutoplay);
            $('.psSlideDelay').val(psSlideDelay);
            $('.psSlideLoop').val(psSlideLoop);
            $('.psSlideTransition').val(psSlideTransition);
            $('.psPostsNumber').val(psPostsNumber);
            $('.psDots').val(psDots);
            $('.psArrows').val(psArrows);
            $('.psFtrImage').val(psFtrImage);
            $('.psFtrImageSize').val(psFtrImageSize);
            $('.psExcerpt').val(psExcerpt);
            $('.psReadMore').val(psReadMore);
            $('.psMoreLinkText').val(psMoreLinkText);
            $('.psHeadingSize').val(psHeadingSize);
            $('.psTextAlignment').val(psTextAlignment);
            $('.psBgColor').val(psBgColor);
            $('.psTxtColor').val(psTxtColor);
            $('.psHeadingTxtColor').val(psHeadingTxtColor);
            $('.psPostType').val(psPostType);
            $('.psPostsOrderBy').val(psPostsOrderBy);
            $('.psPostsOrder').val(psPostsOrder);
            $('.psPostsFilterBy').val(psPostsFilterBy);
            $('.psFilterValue').val(psFilterValue);

            $('.psBgColor').parent().parent().siblings('.wp-color-result').css('background-color',psBgColor);
            $('.psTxtColor').parent().parent().siblings('.wp-color-result').css('background-color',psTxtColor);
            $('.psHeadingTxtColor').parent().parent().siblings('.wp-color-result').css('background-color',psHeadingTxtColor);

          $('.pbp-widgets').hide(100);
          $('.wdt-pbPostSlider').slideDown(500);
          break;
          case 'wigt-pb-icons':

            // Icons Widget
            var this_widget_pbIcon = this.model.get('widgetIcons');
            pbSelectedIcon = this_widget_pbIcon['pbSelectedIcon'];
            pbIconSize = this_widget_pbIcon['pbIconSize'];
            pbIconRotation = this_widget_pbIcon['pbIconRotation'];
            pbIconColor = this_widget_pbIcon['pbIconColor'];
            pbIconLink = this_widget_pbIcon['pbIconLink']; 

            $('.pbicp-auto').val(pbSelectedIcon);
            $('.pbSelectedIcon').children().attr('class',pbSelectedIcon);
            $('.pbIconSize').val(pbIconSize);
            $('.pbIconRotation').val(pbIconRotation);
            $('.pbIconColor').val(pbIconColor);
            $('.pbIconLink').val(pbIconLink);

            $('.pbIconColor').parent().parent().siblings('.wp-color-result').css('background-color',pbIconColor);

          $('.pbp-widgets').hide(100);
          $('.wdt-icons').slideDown(500);
          break;
          case 'wigt-pb-counter': 

            // Counter Widget
            var this_widget_pbCounter = this.model.get('widgetCounter');
            counterStartingNumber = this_widget_pbCounter['counterStartingNumber'];
            counterEndingNumber = this_widget_pbCounter['counterEndingNumber'];
            counterNumberPrefix = this_widget_pbCounter['counterNumberPrefix'];
            counterNumberSuffix = this_widget_pbCounter['counterNumberSuffix'];
            counterAnimationTime = this_widget_pbCounter['counterAnimationTime'];
            counterTitle = this_widget_pbCounter['counterTitle'];
            counterTextColor = this_widget_pbCounter['counterTextColor'];
            counterNumberFontSize = this_widget_pbCounter['counterNumberFontSize'];
            counterTitleFontSize = this_widget_pbCounter['counterTitleFontSize'];

            $('.counterStartingNumber').val(counterStartingNumber);
            $('.counterEndingNumber').val(counterEndingNumber);
            $('.counterNumberPrefix').val(counterNumberPrefix);
            $('.counterNumberSuffix').val(counterNumberSuffix);
            $('.counterAnimationTime').val(counterAnimationTime);
            $('.counterTitle').val(counterTitle);
            $('.counterTextColor').val(counterTextColor);
            $('.counterTitleColor').val(counterTitleColor);
            $('.counterNumberFontSize').val(counterNumberFontSize);
            $('.counterTitleFontSize').val(counterTitleFontSize);

            

          $('.pbp-widgets').hide(100);
          $('.wdt-counter').slideDown(500);
          break;
          case 'wigt-pb-audio':

            // Audio Widget
            var this_widget_audio = this.model.get('widgetAudio'); 

            $('.audioOgg').val(this_widget_audio['audioOgg']);
            $('.audioMpThree').val(this_widget_audio['audioMpThree']);
            $('.audioAutoPlay').val(this_widget_audio['audioAutoPlay']);
            $('.audioLoop').val(this_widget_audio['audioLoop']);
            $('.audioControls').val(this_widget_audio['audioControls']);

          $('.pbp-widgets').hide(100);
          $('.wdt-audio').slideDown(500);
          break;
          case 'wigt-pb-cards': 

            // Card Widget 
            var this_widget_card = this.model.get('widgetCard');
                
            $.each(this_widget_card, function(index,val){
                $('.'+index).val(val);

                if (index == 'pbSelectedCardIcon') {
                    $('.pbSelectedCardIcon').children().attr('class','fa '+this_widget_card['pbSelectedCardIcon']);
                }

                if (index == 'pbCardIconColor') {
                    $('.pbCardIconColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pbCardTitleColor') {
                    $('.pbCardTitleColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pbCardDescColor') {
                    $('.pbCardDescColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }

            });

          $('.pbp-widgets').hide(100);
          $('.wdt-card').slideDown(500);
          break;
          case 'wigt-pb-testimonial': 

            // Testimonial widget
            var this_widget_testimonial = this.model.get('widgetTestimonial');

            $('.tsAuthorName').val(this_widget_testimonial['tsAuthorName']);
            $('.tsJob').val(this_widget_testimonial['tsJob']);
            $('.tsCompanyName').val(this_widget_testimonial['tsCompanyName']);
            $('.tsTestimonial').val(this_widget_testimonial['tsTestimonial']);
            $('.tsUserImg').val(this_widget_testimonial['tsUserImg']);
            $('.tsImageShape').val(this_widget_testimonial['tsImageShape']);
            $('.tsIconColor').val(this_widget_testimonial['tsIconColor']);
            $('.tsIconSize').val(this_widget_testimonial['tsIconSize']);
            $('.tsTextColor').val(this_widget_testimonial['tsTextColor']);
            $('.tsTextSize').val(this_widget_testimonial['tsTextSize']);
            $('.tsTestimonialColor').val(this_widget_testimonial['tsTestimonialColor']);
            $('.tsTestimonialSize').val(this_widget_testimonial['tsTestimonialSize']);
            $('.tsTextAlignment').val(this_widget_testimonial['tsTextAlignment']);

            $('.tsIconColor').parent().parent().siblings('.wp-color-result').css('background-color',this_widget_testimonial['tsIconColor']);
            $('.tsTextColor').parent().parent().siblings('.wp-color-result').css('background-color',this_widget_testimonial['tsTextColor']);
            $('.tsTestimonialColor').parent().parent().siblings('.wp-color-result').css('background-color',this_widget_testimonial['tsTestimonialColor']);

          $('.pbp-widgets').hide(100);
          $('.wdt-testimonial').slideDown(500);
          break;
          case 'wigt-pb-shortcode':
            // Shortcode Widget
            var this_widget_shortcode = this.model.get('widgetShortCode');

            $('.shortCodeInput').val(this_widget_shortcode['shortCodeInput']);

          $('.pbp-widgets').hide(100);
          $('.wdt-shortcode').slideDown(500);
          break;
          case 'wigt-pb-countdown':

            // Countdown Widget
            var this_widget_countdown = this.model.get('widgetCowntdown');

            $('.daysText').val('');
            $('.hoursText').val('');
            $('.minutesText').val('');
            $('.secondsText').val('');
            $('.hideDays').val('');
            $('.hideHours').val('');
            $('.hideMinutes').val('');
            $('.hideSeconds').val('');

            $.each(this_widget_countdown, function(index,val){
              $('.'+index).val(val);

              if (index == 'pbCountDownColor' || index == 'pbCountDownLabelColor' || index == 'pbCountDownNumberBgColor' || index == 'pbCountDownLabelBgColor') {
                $('.'+index).parent().parent().siblings('.wp-color-result').css('background-color',val);
              }

              if (index == 'pbCountDownLabelFontFamily' || index == 'pbCountDownNumberFontFamily'){
                  if (val !== '') {
                    $('.'+index).siblings('.font-select').children('a').children('.font_select_placeholder').html(val.replace(/\+/g, ' '));
                  }
                }
              
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-countdown').slideDown(500);
          break;
          case 'wigt-pb-imageSlider':

            // Image Slider Widget
            var this_widget_image_slider = this.model.get('widgetImageSlider');
            // Image Slider Widget
            $('.pbSliderHeight').val(this_widget_image_slider['pbSliderHeight']);
            $('.pbSliderHeightUnit').val(this_widget_image_slider['pbSliderHeightUnit']);
            $('.pbSliderContentBgColor').val(this_widget_image_slider['pbSliderContentBgColor']);
            $('.pbSliderAuto').val(this_widget_image_slider['pbSliderAuto']);
            $('.pbSliderDelay').val(this_widget_image_slider['pbSliderDelay']);
            $('.pbSliderPager').val(this_widget_image_slider['pbSliderPager']);
            $('.pbSliderPager').val(this_widget_image_slider['pbSliderPager']);
            $('.pbSliderRandom').val(this_widget_image_slider['pbSliderRandom']);
            $('.pbSliderPause').val(this_widget_image_slider['pbSliderPause']);

            if ( typeof(this_widget_image_slider['pbSliderHeightTablet'])!= 'undefined' ) {
              $('.pbSliderHeightTablet').val(this_widget_image_slider['pbSliderHeightTablet']);
              $('.pbSliderHeightMobile').val(this_widget_image_slider['pbSliderHeightMobile']);

              $('.pbSliderHeightUnitTablet').val(this_widget_image_slider['pbSliderHeightUnitTablet']);
              $('.pbSliderHeightUnitMobile').val(this_widget_image_slider['pbSliderHeightUnitMobile']);
            }else{
              $('.pbSliderHeightTablet').val('');
              $('.pbSliderHeightMobile').val('');
              $('.pbSliderHeightUnitTablet').val('');
              $('.pbSliderHeightUnitMobile').val('');
            }

            pbSliderImagesURL = this_widget_image_slider['pbSliderImagesURL'];
            pbSliderContent = this_widget_image_slider['pbSliderContent'];
            $('.sliderImageSlidesContainer').html('');
            
            $.each(pbSliderImagesURL,function(index, val){
                
                var slideCountA = index + 30;

                if (typeof(pbSliderContent) == 'undefined') {
                    imageSlideHeading = '';
                    imageSlideDesc = '';
                    imageSlideButtonText = '';
                    imageSlideButtonURL = '';
                }else{
                    imageSlideHeading = pbSliderContent[index]['imageSlideHeading'];
                    imageSlideDesc = pbSliderContent[index]['imageSlideDesc'];
                    imageSlideButtonText = pbSliderContent[index]['imageSlideButtonText'];
                    imageSlideButtonURL = pbSliderContent[index]['imageSlideButtonURL'];
                }
                

                jQuery('.sliderImageSlidesContainer').append('<li> <h3 class="handleHeader widgetOpsAccordionHandle">Slide <span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span>  </h3> <div class="accordContentHolder"> <br><br> <label>Slide Image :</label> <input id="image_location'+slideCountA+'" type="text" class="slideImgURL upload_image_button'+slideCountA+'" name="lpp_add_img_'+slideCountA+'" value="'+val+'" placeholder="Insert Image URL here" style="width:40%;" /> <input id="image_location'+slideCountA+'" type="button" class="upload_bg_btn_imageSlider" data-id="'+slideCountA+'" value="Upload" /> <br> <br> <br> <br> <hr> <br> <br> <h4>Slide Content</h4> <br> <label>Slide Heading :</label> <input type="text" class="imageSlideHeading" value="'+imageSlideHeading+'"> <br> <br> <br> <label>Slide Description :</label> <textarea class="imageSlideDesc" value="'+imageSlideDesc+'">'+imageSlideDesc+'</textarea> <br> <br> <br> <label>Slide Button Text :</label> <input type="text" class="imageSlideButtonText" value="'+imageSlideButtonText+'"> <br> <br> <br> <label>Slide Button URL :</label> <input type="url" class="imageSlideButtonURL" value="'+imageSlideButtonURL+'"> <br> <br> <br> </div> </li>');

                $( '.sliderImageSlidesContainer' ).accordion( "refresh" );
            });

            if (typeof(this_widget_image_slider['slideHeadingStyles']) != 'undefined' ) {
                slideHeadingStyles = this_widget_image_slider['slideHeadingStyles'];
                $.each(slideHeadingStyles,function(index, val){
                    $('.'+index).val(val);
                    
                    if (index == 'slideHeadingColor') {
                      $('.slideHeadingColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                    }
                    if (index == 'slideHeadingBold' || index == 'slideHeadingItalic' || index == 'slideHeadingUnderlined') {
                        if(val == true){
                            if( $('.'+index).is(':checked') ){
                            }else{
                                $('.'+index).click();
                                $('.'+index).attr('checked', 'checked');
                            }
                        }else{
                            if( $('.'+index).is(':checked') ){
                                $('.'+index).click();
                            }
                        }
                    }

                    if (index == 'slideHeadingFontFamily') {
                        $('.'+index).siblings('.font-select').children('a').children('.font_select_placeholder').html($('.'+index).val().replace(/\+/g, ' '));
                    }
                    
                 });
            }

            slideDescStyles = this_widget_image_slider['slideDescStyles'];
            $.each(slideDescStyles,function(index, val){
                $('.'+index).val(val);
                if (index == 'slideDescColor') {
                  $('.slideDescColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                }

                if (index == 'slideDescBold' || index == 'slideDescItalic' || index == 'slideDescUnderlined') {
                    if(val == true){
                        if( $('.'+index).is(':checked') ){
                        }else{
                            $('.'+index).click();
                            $('.'+index).attr('checked', 'checked');
                        }
                    }else{
                        if( $('.'+index).is(':checked') ){
                            $('.'+index).click();
                        }
                    }
                }

                if (index == 'slideDescFontFamily') {
                    $('.'+index).siblings('.font-select').children('a').children('.font_select_placeholder').html($('.'+index).val().replace(/\+/g, ' '));
                }
             });

            slideButtonStyles = this_widget_image_slider['slideButtonStyles'];
            $.each(slideButtonStyles,function(index, val){
                $('.'+index).val(val);
                $('.'+index).parent().siblings('.wp-color-result').find('span').css('background',val);
                
                if (index == 'slideButtonBtnBgColor') {
                  $('.slideButtonBtnBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                }
                if (index == 'slideButtonBtnHoverBgColor') {
                  $('.slideButtonBtnHoverBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                }
                if (index == 'slideButtonBtnHoverTextColor') {
                  $('.slideButtonBtnHoverTextColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                }
                if (index == 'slideButtonBtnColor') {
                  $('.slideButtonBtnColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background-color',val);
                }
                if (index == 'slideButtonBtnBorderColor') {
                  $('.slideButtonBtnBorderColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }

                if (index == 'slideButtonBtnFontFamily') {
                    $('.'+index).siblings('.font-select').children('a').children('.font_select_placeholder').html($('.'+index).val().replace(/\+/g, ' '));
                }
             });

          $('.pbp-widgets').hide(100);
          $('.wdt-imageSlider').slideDown(500);
          break;
          case 'wigt-pb-progressBar':

            var this_widget_progressBar = this.model.get('widgetProgressBar');
            $.each(this_widget_progressBar, function(index,val){
                $('.'+index).val(val);

                if (index == 'pbProgressBarTitleColor') {
                  $('.pbProgressBarTitleColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pbProgressBarTextColor') {
                  $('.pbProgressBarTextColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pbProgressBarColor') {
                  $('.pbProgressBarColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pbProgressBarBgColor') {
                  $('.pbProgressBarBgColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
            });

            if (typeof(this_widget_progressBar['pbProgressBarTextFontFamily']) != 'undefined') {
                pbProgressBarTextFontFamily = this_widget_progressBar['pbProgressBarTextFontFamily'];
            } else{
                pbProgressBarTextFontFamily = ' none';
            }

            $('.pbProgressBarTextFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html($('.pbProgressBarTextFontFamily').val().replace(/\+/g, ' '));

          $('.pbp-widgets').hide(100);
          $('.wdt-progressBar').slideDown(500);
          break;
          case 'wigt-pb-pricing':

            // Pricing Widget
            var this_widget_pricing = this.model.get('widgetPricing');
            pbPricingContent = this_widget_pricing['pbPricingContent'];
            $.each(this_widget_pricing, function(index,val){
                $('.'+index).val(val);

                if (index == 'pricingbtnTextColor') {
                    $('.pricingbtnColor').val(val);
                }
                if (index == 'pricingbtnBgColor') {
                    $('.pricingbtnBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'pricingbtnHoverBgColor') {
                    $('.pricingbtnHoverBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'pricingbtnHoverTextColor') {
                    $('.pricingbtnHoverTextColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'pricingbtnColor') {
                    $('.pricingbtnColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                if (index == 'pricingbtnBorderColor') {
                    $('.pricingbtnBorderColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }

                if (index == 'pricingbtnButtonFontFamily') {
                    if (val !== '') {
                        $('.pricingbtnButtonFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html(val.replace(/\+/g, ' '));
                    }
                }
                if (index == 'pricingbtnSelectedIcon') {
                  $('.pricingbtnSelectedIconpbicp-auto').val(val);
                  $('.pricingbtnSelectedIcon').children().attr('class',val);
                }
            });

            var pricingeditorID = 'pbPricingContent';
            if ($('#wp-'+pricingeditorID+'-wrap').hasClass("tmce-active"))
                tinyMCE.get(pricingeditorID).setContent(pbPricingContent);
            else
              $('#'+pricingeditorID).val(pbPricingContent);

          $('.pbp-widgets').hide(100);
          $('.wdt-pricing').slideDown(500);
          break;
          case 'wigt-pb-imgCarousel':

            var this_widget_image_carousel = this.model.get('widgetImgCarousel');

            $('.pbImgCarouselAutoplay').val(this_widget_image_carousel['pbImgCarouselAutoplay']);
            $('.pbImgCarouselDelay').val(this_widget_image_carousel['pbImgCarouselDelay']);
            $('.imgCarouselSlideLoop').val(this_widget_image_carousel['imgCarouselSlideLoop']);
            $('.imgCarouselSlideTransition').val(this_widget_image_carousel['imgCarouselSlideTransition']);
            $('.imgCarouselPagination').val(this_widget_image_carousel['imgCarouselPagination']);
            $('.pbImgCarouselNav').val(this_widget_image_carousel['pbImgCarouselNav']);

            imgCarouselSlidesURL = this_widget_image_carousel['imgCarouselSlidesURL'];

            $('.carouselSlidesContainer').html('');
            $.each(imgCarouselSlidesURL,function(index, val){
                
                var slideCountA = index + 180;

                jQuery('.carouselSlidesContainer').append('<li><h3 class="handleHeader">Slide <span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span>  </h3><div  class="accordContentHolder"><label>Slide Image :</label><input id="image_location'+slideCountA+'" type="text" class="carouselImgURL upload_image_button'+slideCountA+'"  name="lpp_add_img_'+slideCountA+'" value="'+val+'"   placeholder="Insert Video URL here" style="width:40%;" /><input id="image_location'+slideCountA+'" type="button" class="upload_bg_btn_imageSlider" data-id="'+slideCountA+'" value="Upload" /></div></li>');

                $( '.carouselSlidesContainer' ).accordion( "refresh" );

            });

          $('.pbp-widgets').hide(100);
          $('.wdt-imgCarousel').slideDown(500);
          break;
          case 'wigt-pb-wooCommerceProducts':

            var this_widget_wooPorducts = this.model.get('widgetWooPorducts');

            $.each(this_widget_wooPorducts, function(index,val){
                $('.'+index).val(val);
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-wooCommerceProducts').slideDown(500);
          break;
          case 'wigt-pb-iconList':

            var this_widget_icon_list = this.model.get('widgetIconList');

            $('.iconListLineHeight').val(this_widget_icon_list['iconListLineHeight']);
            $('.iconListAlignment').val(this_widget_icon_list['iconListAlignment']);
            $('.iconListIconSize').val(this_widget_icon_list['iconListIconSize']);
            $('.iconListIconColor').val(this_widget_icon_list['iconListIconColor']);
            $('.iconListTextSize').val(this_widget_icon_list['iconListTextSize']);
            $('.iconListTextIndent').val(this_widget_icon_list['iconListTextIndent']);
            $('.iconListTextColor').val(this_widget_icon_list['iconListTextColor']);
            $('.iconListTextFontFamily').val(this_widget_icon_list['iconListTextFontFamily']);

            if (typeof(this_widget_icon_list['iconListIconSizeTablet']) !== 'undefined') {
              $('.iconListIconSizeTablet').val(this_widget_icon_list['iconListIconSizeTablet']);
              $('.iconListIconSizeMobile').val(this_widget_icon_list['iconListIconSizeMobile']);

              $('.iconListTextSizeTablet').val(this_widget_icon_list['iconListTextSizeTablet']);
              $('.iconListTextSizeMobile').val(this_widget_icon_list['iconListTextSizeMobile']);

              $('.iconListTextIndentTablet').val(this_widget_icon_list['iconListTextIndentTablet']);
              $('.iconListTextIndentMobile').val(this_widget_icon_list['iconListTextIndentMobile']);
            }else{
              $('.iconListIconSizeTablet').val('');
              $('.iconListIconSizeMobile').val('');
              $('.iconListTextSizeTablet').val('');
              $('.iconListTextSizeMobile').val('');
              $('.iconListTextIndentTablet').val('');
              $('.iconListTextIndentMobile').val('');
            }

            $('.'+'iconListTextFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html($('.'+'iconListTextFontFamily').val().replace(/\+/g, ' '));

            iconListComplete = this_widget_icon_list['iconListComplete'];

            $('.iconListItemsContainer').html('');
            $.each(iconListComplete,function(index, val){

                jQuery('.iconListItemsContainer').append('<li> <h3 class="handleHeader">'+val['iconListItemText']+'<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span>  </h3> <div  class="accordContentHolder"> <label>List Text</label> <input type="text" class="iconListItemText" value="'+val['iconListItemText']+'"> <br> <br> <label>Select Icon:  </label> <input  data-placement="bottomRight" class="icp pbIconListPicker iconListItemIcon" value="'+val['iconListItemIcon']+'" type="text" /> <span class="input-group-addon" style="font-size: 16px;"></span> <br> <br> <label>Link : </label> <input type="url" class="iconListItemLink" value="'+val['iconListItemLink']+'"> <br> <br> <label>Open Link in :</label> <select class="iconListItemLinkOpen" value="'+val['iconListItemLinkOpen']+'"> <option value="_blank">New Tab</option> <option value="_self">Same Tab</option> </select> </div> </li>');

                $( '.iconListItemsContainer' ).accordion( "refresh" );

            });

            $('.iconListIconColor').parent().parent().siblings('.wp-color-result').css('background-color',this_widget_icon_list['iconListIconColor']);
            $('.iconListTextColor').parent().parent().siblings('.wp-color-result').css('background-color',this_widget_icon_list['iconListTextColor']);

            jQuery('.pbIconListPicker').iconpicker({ });

          $('.pbp-widgets').hide(100);
          $('.wdt-iconList').slideDown(500);
          break;
          case 'wigt-pb-spacer':

            var this_widget_Spacer = this.model.get('widgetVerticalSpace');

            $.each(this_widget_Spacer, function(index,val){
                $('.'+index).val(val);
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-spacer').slideDown(500);
          break;
          case 'wigt-pb-break':

            var this_widget_Breaker = this.model.get('widgetBreaker');

            $.each(this_widget_Breaker, function(index,val){
                $('.'+index).val(val);

                if (index == 'widgetBreakerColor') {
                  $('.widgetBreakerColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-breaker').slideDown(500);
          break;
          case 'wigt-pb-formBuilder':

            var this_widget_FormBuilder = this.model.get('widgetFormBuilder');

            widgetPbFbFormFeilds = this_widget_FormBuilder['widgetPbFbFormFeilds'];
            widgetPbFbFormFeildOptions = this_widget_FormBuilder['widgetPbFbFormFeildOptions'];
            widgetPbFbFormSubmitOptions = this_widget_FormBuilder['widgetPbFbFormSubmitOptions'];
            widgetPbFbFormEmailOptions = this_widget_FormBuilder['widgetPbFbFormEmailOptions'];
            widgetPbFbFormMailChimp = this_widget_FormBuilder['widgetPbFbFormMailChimp'];

            $('.formFieldItemsContainer').html('');
            $('.formBuilderFieldFontFamily').val('');
            $('.formBuilderBtnFontFamily').val('');

            $.each(widgetPbFbFormFeilds,function(index, val){

                fieldLabel = val["thisFieldOptions"]["fbFieldLabel"];
                if (fieldLabel == '') {
                    fieldLabel = 'Field ';
                }
                jQuery('.formFieldItemsContainer').append('<li class="fieldNo-'+index+'"> <h3 class="handleHeader">'+fieldLabel+'<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span>  </h3> <div  class="accordContentHolder" style="background: #fff;"> <label>Type : </label> <select class="fbFieldType"> <option value="text">Text</option> <option value="tel">Tel</option> <option value="email">Email</option> <option value="number">Number</option> <option value="url">URL</option> <option value="textarea">Textarea</option> <option value="select">Select</option> <option value="radio">Radio</option> <option value="checkbox">Checkbox</option> </select> <br> <br> <hr> <br> <div class="thisFieldOptions"> <label> Label :</label> <input type="text" class="fbFieldLabel" value="'+val["thisFieldOptions"]["fbFieldLabel"]+'"> <br> <br> <hr> <br> <label> Placeholder :</label> <input type="text" class="fbFieldPlaceHolder" value="'+val["thisFieldOptions"]["fbFieldPlaceHolder"]+'"> <br> <br> <hr> <br> <label> Required :</label> <select class="fbFieldRequired"> <option value="false">No</option> <option value="true">Yes</option> </select> <br> <br> <hr> <br> <label> Field Width :</label> <select class="fbFieldWidth"> <option value="100">Default</option> <option value="20">20%</option> <option value="25">25%</option> <option value="33">33%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="66">66%</option> <option value="75">75%</option> <option value="80">80%</option> <option value="100">100%</option> </select> <br> <br> <hr> <br> </div> <br> <br> <div class="textareaOptions pb_hidden"> <label>Textarea Rows: </label> <input type="number" class="fbtextareaRows" value="'+val["thisFieldOptions"]["fbtextareaRows"]+'"> <br> <hr> <br> <br> </div> <div class="multiOptionField pb_hidden"> <label>Options: </label> <textarea class="multiOptionFieldValues" rows="5" value="'+val["thisFieldOptions"]["multiOptionFieldValues"]+'">'+val["thisFieldOptions"]["multiOptionFieldValues"]+'</textarea> <br> <span> Enter each option in separate line.</span> <br> <hr> <br> <br> <label>Display Inline :</label> <select class="displayFieldsInline"> <option value="inline-block">Yes</option> <option value="block">No</option> </select> <br> <hr> <br> <br> </div> </div> </li>');

                $( '.formFieldItemsContainer' ).accordion( "refresh" );

                $('.fieldNo-'+index).children('.accordContentHolder').children('.fbFieldType').val(val["fbFieldType"]);
                $('.fieldNo-'+index).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldRequired').val(val["thisFieldOptions"]["fbFieldRequired"]);
                $('.fieldNo-'+index).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldWidth').val(val["thisFieldOptions"]["fbFieldWidth"]);

                $('.fieldNo-'+index).children('.accordContentHolder').children('.multiOptionField').children('.displayFieldsInline').val(val["thisFieldOptions"]["displayFieldsInline"]);

                if (val["fbFieldType"] == 'textarea') {
                    $('.fieldNo-'+index).children('.accordContentHolder').children('.textareaOptions').removeClass('pb_hidden');
                } else if(val["fbFieldType"] == 'select' || val["fbFieldType"] == 'checkbox' || val["fbFieldType"] == 'radio'){
                    $('.fieldNo-'+index).children('.accordContentHolder').children('.multiOptionField').removeClass('pb_hidden');
                }

            }); //loops end

            $.each(widgetPbFbFormFeildOptions, function(index,val){
                $('.'+index).val(val);

                if (index == 'formBuilderLabelColor') {
                  $('.formBuilderLabelColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderFieldColor') {
                  $('.formBuilderFieldColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderFieldBgColor') {
                  $('.formBuilderFieldBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderFieldBorderColor') {
                  $('.formBuilderFieldBorderColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
            });

            $('.formBuilderbtnSelectedIconpbicp-auto').val('');
            $('.formBuilderbtnSelectedIcon').children().attr('class','');

            $.each(widgetPbFbFormSubmitOptions, function(index,val){
                $('.'+index).val(val);

                if (index == 'formBuilderBtnBgColor') {
                  $('.formBuilderBtnBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderBtnHoverBgColor') {
                  $('.formBuilderBtnHoverBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderBtnHoverTextColor') {
                  $('.formBuilderBtnHoverTextColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderBtnColor') {
                  $('.formBuilderBtnColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
                }
                if (index == 'formBuilderBtnBorderColor') {
                  $('.formBuilderBtnBorderColor').parent().parent().siblings('.wp-color-result').css('background',val);
                }

                if (index == 'formBuilderbtnSelectedIcon') {
                  $('.formBuilderbtnSelectedIconpbicp-auto').val(val);
                  $('.formBuilderbtnSelectedIcon').children().attr('class',val);
                }

            });

            $.each(widgetPbFbFormEmailOptions, function(index,val){
                $('.'+index).val(val);
            });

            if (isMCActive == 'true') {
              $.each(widgetPbFbFormMailChimp, function(index,val){
                  $('.'+index).val(val);
              });
            }

            if (typeof(this_widget_FormBuilder['widgetPbFbFormAllowDuplicates']) != 'undefined') {
              $('.widgetPbFbFormAllowDuplicates').val(this_widget_FormBuilder['widgetPbFbFormAllowDuplicates']);
            }

          $('.pbp-widgets').hide(100);
          $('.wdt-formBuilder').slideDown(500);
          break;
          case 'wigt-pb-text':

          var this_widget_Text = this.model.get('widgetText');
            $('.widgetTextAlignmentTablet').val('');
            $('.widgetTextAlignmentMobile').val('');
            $.each(this_widget_Text, function(index,val){
                if (index == 'widgetTextContent') {
                    fieldParentValue = val;
                    fieldValArraySplit = fieldParentValue.replace(/<br>/g, "\n");

                    val = fieldValArraySplit;
                }

                $('.'+index).val(val);

                if (index == 'widgetTextFamily') {
                    $('.'+index).siblings('.font-select').children('a').children('.font_select_placeholder').html($('.'+index).val().replace(/\+/g, ' '));
                }

                if (index == 'widgetTextBold' || index == 'widgetTextItalic' || index == 'widgetTextUnderlined') {
                        if(val == true){
                            if( $('.'+index).is(':checked') ){
                            }else{
                                $('.'+index).click();
                                $('.'+index).attr('checked', 'checked');
                            }
                        }else{
                            if( $('.'+index).is(':checked') ){
                                $('.'+index).click();
                            }
                        }
                }

                if (index == 'widgetTextColor') {
                  $('.widgetTextColor').parent().parent().siblings('.wp-color-result').css('background-color',val);
                }
                

            });

          $('.pbp-widgets').hide(100);
          $('.wdt-text').slideDown(500);
          break;
          case 'wigt-pb-embededVideo':

          var this_widget_widgetEmbedVideo = this.model.get('widgetEmbedVideo');

            $.each(this_widget_widgetEmbedVideo, function(index,val){
                $('.'+index).val(val);
            });

          $('.pbp-widgets').hide(100);
          $('.wdt-embededVideo').slideDown(500);
          break;
          case 'wigt-pb-popupClose':

          var this_widget_close_btn = this.model.get('widgetClosePopUp');

            $.each(this_widget_close_btn, function(index,val){
                $('.'+index).val(val);


                if (index == 'closeBtnButtonFontFamily') {
                  $('.' + index).siblings('.font-select').children('a').children('.font_select_placeholder').html($('.' + index).val().replace(/\+/g, ' '));
                }
                if (index == 'closeBtnBold' || index == 'closeBtnItalic' || index == 'closeBtnUnderlined') {
                  if (val == true) {
                    if ($('.' + index).is(':checked')) {} else {
                      $('.' + index).click();
                      $('.' + index).attr('checked', 'checked');
                    }
                  } else {
                    if ($('.' + index).is(':checked')) {
                      $('.' + index).click();
                    }
                  }
                }

                $('.'+index).parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);

            });

          $('.pbp-widgets').hide(100);
          $('.wdt-closeBtn').slideDown(500);
          break;
        default:
          $('.pbp-widgets').hide(100);
          $('.wdt-droppable').slideDown(100);
          $('.wdt-editor, .wdt-img, .wdt-menu, .wdt-smuzform').css('display','none');
          break;
      }



    var that = this.model.cid;
      $('.closeWidgetPopup').attr('data-CurrWidget',that);
      $('.closeWidgetPopupIcon').attr('data-CurrWidget',that);



        $('.color-picker_btn_two').iris('hide');
        CPtopParent = $('.color-picker_btn_two').parent().parent().parent();
        $('.color-picker_btn_two').css('display','block');
        $('.color-picker_btn_two').parent().parent().addClass('hidden');
        $(CPtopParent).removeClass( 'wp-picker-active');
        $(CPtopParent).children('.wp-color-result').removeClass( 'wp-picker-open');
    },
  updateWidget: function () {

    var widgetType = $('input[data-widgetType-id="'+this.model.cid+'"]').val();
    var widgetStyling     = $('.widgetStyling').val();
    var widgetMtop        = $('.widgetMtop').val();
    var widgetMbottom     = $('.widgetMbottom').val();
    var widgetMleft       = $('.widgetMleft').val();
    var widgetMright      = $('.widgetMright').val();
    var widgetPtop        = $('.widgetPtop').val();
    var widgetPbottom     = $('.widgetPbottom').val();
    var widgetPleft       = $('.widgetPleft').val();
    var widgetPright      = $('.widgetPright').val();
    var widgetBgColor     = $('.widgetBgColor').val();
    var widgetAnimation   = $('.widgetAnimation').val();
    



    

    this.model.set({
                widgetType:widgetType,
                widgetStyling:widgetStyling,
                widgetMtop:widgetMtop,
                widgetMleft:widgetMleft,
                widgetMbottom:widgetMbottom,
                widgetMright:widgetMright,
                widgetPtop:widgetPtop,
                widgetPleft:widgetPleft,
                widgetPbottom:widgetPbottom,
                widgetPright:widgetPright,
                widgetBgColor: widgetBgColor,
                widgetAnimation: widgetAnimation,
                  widgetPaddingTablet:{
                    rPTT:$('.widgetPTopTablet').val(),
                    rPBT:$('.widgetPBottomTablet').val(),
                    rPLT:$('.widgetPLeftTablet').val(),
                    rPRT:$('.widgetPRightTablet').val(),
                  },
                  widgetPaddingMobile:{
                    rPTM:$('.widgetPTopMobile').val(),
                    rPBM:$('.widgetPBottomMobile').val(),
                    rPLM:$('.widgetPLeftMobile').val(),
                    rPRM:$('.widgetPRightMobile').val(),
                  },
                  widgetMarginTablet:{
                    rMTT:$('.widgetMTopTablet').val(),
                    rMBT:$('.widgetMBottomTablet').val(),
                    rMLT:$('.widgetMLeftTablet').val(),
                    rMRT:$('.widgetMRightTablet').val(),
                  },
                  widgetMarginMobile:{
                    rMTM:$('.widgetMTopMobile').val(),
                    rMBM:$('.widgetMBottomMobile').val(),
                    rMLM:$('.widgetMLeftMobile').val(),
                    rMRM:$('.widgetMRightMobile').val(),
                  },
                widgetBorderWidth: $('.widgetBorderWidth').val(),
                widgetBorderStyle:$('.widgetBorderStyle').val(),
                widgetBorderColor:$('.widgetBorderColor').val(),
                widgetBorderRadius: $('.widgetBorderRadius').val(),
                borderRadius:{
                  wbrt:$('.wbrt').val(),
                  wbrb:$('.wbrb').val(),
                  wbrl:$('.wbrl').val(),
                  wbrr:$('.wbrr').val(),
                },
                borderWidth:{
                  wbwt:$('.wbwt').val(),
                  wbwb:$('.wbwb').val(),
                  wbwl:$('.wbwl').val(),
                  wbwr:$('.wbwr').val(),
                },
                widgetBoxShadowH: $('.widgetBoxShadowH').val(),
                widgetBoxShadowV: $('.widgetBoxShadowV').val(),
                widgetBoxShadowBlur: $('.widgetBoxShadowBlur').val(),
                widgetBoxShadowColor: $('.widgetBoxShadowColor').val(),
                widgetIsInline:$('.widgetIsInline').val(),
                widgetIsInlineTablet:$('.widgetIsInlineTablet').val(),
                widgetIsInlineMobile:$('.widgetIsInlineMobile').val(),
                widgetCustomClass:$('.widgetCustomClass').val(),
                widgBgImg:$('.widgBgImg').val(),
                widgBackgroundType:$('.widgBackgroundType:checked').val(),
                widgGradient:{
                  widgGradientColorFirst: $('.widgGradientColorFirst').val(),
                  widgGradientLocationFirst:$('.widgGradientLocationFirst').val(),
                  widgGradientColorSecond:$('.widgGradientColorSecond').val(),
                  widgGradientLocationSecond:$('.widgGradientLocationSecond').val(),
                  widgGradientType:$('.widgGradientType').val(),
                  widgGradientPosition:$('.widgGradientPosition').val(),
                  widgGradientAngle:$('.widgGradientAngle').val(),
                },
                widgHoverOptions: {
                  widgBgColorHover:$('.widgBgColorHover').val(),
                  widgBackgroundTypeHover:$('.widgBackgroundTypeHover:checked').val(),
                  widgHoverTransitionDuration:$('.widgHoverTransitionDuration').val(), 
                  widgetHoverAnimation:$('.widgetHoverAnimation').val(),
                  widgGradientHover:{
                    widgGradientColorFirstHover: $('.widgGradientColorFirstHover').val(),
                    widgGradientLocationFirstHover:$('.widgGradientLocationFirstHover').val(),
                    widgGradientColorSecondHover:$('.widgGradientColorSecondHover').val(),
                    widgGradientLocationSecondHover:$('.widgGradientLocationSecondHover').val(),
                    widgGradientTypeHover:$('.widgGradientTypeHover').val(),
                    widgGradientPositionHover:$('.widgGradientPositionHover').val(),
                    widgGradientAngleHover:$('.widgGradientAngleHover').val(),
                  }
                },
                widgHideOnDesktop:$('.widgHideOnDesktop').val(),
                widgHideOnTablet:$('.widgHideOnTablet').val(),
                widgHideOnMobile:$('.widgHideOnMobile').val(),
    });

    switch(widgetType){
        case 'wigt-WYSIWYG': 

            var editorID = 'columnContent';
            if($('#wp-'+editorID+'-wrap').hasClass("tmce-active")){
                var widgetEditorData = tinyMCE.get(editorID).getContent({format : 'raw'});
            }else{
                var widgetEditorData = $('#'+editorID).val();
            }

            this.model.set({
                widgetWYSIWYG: {
                  widgetContent:widgetEditorData
                }
            });

            var widgetCurrentType = 'widgetWYSIWYG';
        break;
        case 'wigt-img': 

            var widgetImgUrl      = $('.ftr-img').val();
            var widgetImgSize     = $('#ftr-img-size').val();
            var widgetImgAlignment = $('.imgAlignment').val();
            var imgSizeCustomWidth = $('.imgSizeCustomWidth').val();
            var imgSizeCustomHeight = $('.imgSizeCustomHeight').val();
            var imgLightBox       = $('.imgLightBox').val();
            var imgLink           = $('.imgLink').val(); 

            this.model.set({
                widgetImg:{
                  imgUrl: widgetImgUrl,
                  imgSize: widgetImgSize,
                  imgAlignment: widgetImgAlignment,
                  imgAlignmentTablet: $('.imgAlignmentTablet').val(),
                  imgAlignmentMobile: $('.imgAlignmentMobile').val(),
                  imgSizeCustomWidth: imgSizeCustomWidth,
                  imgSizeCustomWidthTablet: $('.imgSizeCustomWidthTablet').val(),
                  imgSizeCustomWidthMobile: $('.imgSizeCustomWidthMobile').val(),
                  imgSizeCustomHeight: imgSizeCustomHeight,
                  imgSizeCustomHeightTablet: $('.imgSizeCustomHeightTablet').val(),
                  imgSizeCustomHeightMobile: $('.imgSizeCustomHeightMobile').val(),
                  imgLightBox: imgLightBox,
                  imgLink: imgLink,
                }
            });
        break;
        case 'wigt-menu':

            var widgetMenuName    = $('#ftr-menu-select').val();
            var widgetMenuStyle   = $('input[name=ftr-menu-select-style]:checked').val();
            var widgetMenuColor   = $('#ftr-menu-color').val();
            var pbMenuFontFamily   = $('.pbMenuFontFamily').val();

            this.model.set({
                widgetMenu:{
                  menuName: widgetMenuName,
                  menuStyle: widgetMenuStyle,
                  menuColor: widgetMenuColor,
                  pbMenuFontFamily: pbMenuFontFamily,
                  pbMenuFontHoverColor: $('.pbMenuFontHoverColor').val(),
                  pbMenuFontHoverBgColor:$('.pbMenuFontHoverBgColor').val(),
                  pbMenuFontSize: $('.pbMenuFontSize').val(),
                }
            });
        break;
        case 'wigt-btn-gen':
            btnicon = $('.btnSelectedIconpbicp-auto').val();
            if (btnicon != '') {
             btnSelectedIcon = $('.btnSelectedIcon').children().attr('class');
            }else{
             btnSelectedIcon = '';
            }

            var btnLink = $('.btnLink').val();
            if (btnLink != '#') {
              if (!/^(f|ht)tps?:\/\//i.test(btnLink)) {
                btnLink = "http://" + btnLink;
              }
            }

            this.model.set({
                widgetButton:{
                  btnText: $('.btnText').val(),
                  btnLink: btnLink,
                  btnTextColor: $('.btnColor').val(),
                  btnFontSize: $('.btnFontSize').val(),
                  btnFontSizeTablet:$('.btnFontSizeTablet').val(),
                  btnFontSizeMobile:$('.btnFontSizeMobile').val(),
                  btnBgColor: $('.btnBgColor').val(),
                  btnWidth: $('.btnWidth').val(),
                  btnWidthPercent: $('.btnWidthPercent').val(),
                  btnWidthPercentTablet:$('.btnWidthPercentTablet').val(),
                  btnWidthPercentMobile:$('.btnWidthPercentMobile').val(),
                  btnWidthUnit: $('.btnWidthUnit').val(),
                  btnWidthUnitTablet: $('.btnWidthUnitTablet').val(),
                  btnWidthUnitMobile: $('.btnWidthUnitMobile').val(),
                  btnHeight: $('.btnHeight').val(),
                  btnHeightTablet:$('.btnHeightTablet').val(),
                  btnHeightMobile:$('.btnHeightMobile').val(),
                  btnHoverBgColor: $('.btnHoverBgColor').val(),
                  btnHoverTextColor: $('.btnHoverTextColor').val(),
                  btnBlankAttr: $('.btnBlankAttr').val(),
                  btnBorderColor: $('.btnBorderColor').val(),
                  btnBorderWidth: $('.btnBorderWidth').val(),
                  btnBorderRadius: $('.btnBorderRadius').val(),
                  btnButtonAlignment: $('.btnButtonAlignment').val(),
                  btnButtonAlignmentTablet: $('.btnButtonAlignmentTablet').val(),
                  btnButtonAlignmentMobile: $('.btnButtonAlignmentMobile').val(),
                  btnButtonFontFamily: $('.btnButtonFontFamily').val(),
                  btnSelectedIcon: btnSelectedIcon,
                  btnIconPosition: $('.btnIconPosition').val(),
                  btnIconAnimation: $('.btnIconAnimation').val(),
                  btnIconGap: $('.btnIconGap').val(),
                }
            });
        break;
        case 'wigt-pb-form': 
            var this_widget_subscribeForm = this.model.get('widgetSubscribeForm');
            pbFormID = this_widget_subscribeForm['pbFormID'];


            // subs form
            formLayout = $('.formLayout').val();
            showNameField = $('.showNameField').val();
            successAction = $('.successAction').val();
            successURL = $('.successURL').val();
            successMessage = $('.successMessage').val();
            formBtnText = $('.formBtnText').val();
            formBtnHeight = $('.formBtnHeight').val();
            formBtnWidth = $('.formBtnWidth').val();
            formBtnColor = $('.formBtnColor').val();
            formBtnFontSize = $('.formBtnFontSize').val();
            formBtnBgColor = $('.formBtnBgColor').val();
            formBtnHoverBgColor = $('.formBtnHoverBgColor').val();
            formBtnBorderWidth = $('.formBtnBorderWidth').val();
            formBtnBorderColor = $('.formBtnBorderColor').val();
            formBtnBorderRadius = $('.formBtnBorderRadius').val();
            formDataSaveType = $('.formDataSaveType').val();
            formAccountName = $('.formAccountName').val();
            formApiKey = $('.formApiKey').val();

            $('.mailchimpApiKeyHolder').val(formApiKey);
            $('.mailchimpListIdHolder').val(formAccountName);

            btnicon = $('.formbtnSelectedIconpbicp-auto').val();
            if (btnicon != '') {
             formbtnSelectedIcon = $('.formbtnSelectedIcon').children().attr('class');
            }else{
             formbtnSelectedIcon = '';
            }

            this.model.set({
                widgetSubscribeForm:{
                  pbFormID: pbFormID,
                  formLayout: formLayout,
                  showNameField: showNameField,
                  successAction:successAction,
                  successURL:successURL,
                  successMessage:successMessage,
                  formBtnText:formBtnText,
                  formBtnHeight:formBtnHeight,
                  formBtnHeightTablet:$('.formBtnHeightTablet').val(),
                  formBtnHeightMobile:$('.formBtnHeightMobile').val(),
                  formBtnWidth:formBtnWidth,
                  formBtnBgColor:formBtnBgColor,
                  formBtnHoverTextColor: $('.formBtnHoverTextColor').val(),
                  formBtnColor:formBtnColor,
                  formBtnHoverBgColor:formBtnHoverBgColor,
                  formBtnFontSize:formBtnFontSize,
                  formBtnFontSizeTablet:$('.formBtnFontSizeTablet').val(),
                  formBtnFontSizeMobile:$('.formBtnFontSizeMobile').val(),
                  formBtnBorderWidth:formBtnBorderWidth,
                  formBtnBorderColor:formBtnBorderColor,
                  formBtnBorderRadius:formBtnBorderRadius,
                  formBtnFontFamily:$('.formBtnFontFamily').val(),
                  formSuccessMessageColor:$('.formSuccessMessageColor').val(),
                  formDataSaveType: formDataSaveType,
                  formDataMailChimpApi:$('.formDataMailChimpApi').val(),
                  formDataMailChimpListId:$('.formDataMailChimpListId').val(),
                  isMcActive:$('.isMcActive').val(),
                  formbtnSelectedIcon:formbtnSelectedIcon,
                  formbtnIconPosition:$('.formbtnIconPosition').val(),
                  formbtnIconGap:$('.formbtnIconGap').val(),
                  formbtnIconAnimation:$('.formbtnIconAnimation').val(),
                  formIntegrations:{
                    getResponse:{
                      isGrActive:$('.isGrActive').val(),
                      GrApiKey:$('.GrApiKey').val(),
                      GrAccountName:$('.GrAccountName').val(),
                    },
                    campaignMonitor:{
                      isCmActive: $('.isCmActive').val(),
                      CmApiKey: $('.CmApiKey').val(),
                      CmAccountName: $('.CmAccountName').val(),
                    },
                    activeCampaign:{
                      isAcActive: $('.isAcActive').val(),
                      AcApiKey: $('.AcApiKey').val(),
                      AcApiURL: $('.AcApiURL').val(),
                      AcAccountName: $('.AcAccountName').val(),
                    },
                    drip:{
                      isDripActive: $('.isDripActive').val(),
                      DripApiKey: $('.DripApiKey').val(),
                      DripAccountName: $('.DripAccountName').val(),
                    },
                  }
                }
            });
        break;
        case 'wigt-video': 

            videoMpfour = $('.videoMpfour').val();
            videoWebM = $('.videoWebM').val();
            videoThumb = $('.videoThumb').val();
            vidAutoPlay = $('.vidAutoPlay').val();
            vidLoop = $('.vidLoop').val(); 
            vidControls = $('.vidControls').val();

            this.model.set({
                widgetVideo:{
                  videoWebM: videoWebM,
                  videoMpfour: videoMpfour,
                  videoThumb: videoThumb,
                  vidAutoPlay: vidAutoPlay,
                  vidLoop: vidLoop,
                  vidControls: vidControls
                }
            });
        break;
        case 'wigt-pb-postSlider': 

            psAutoplay = $('.psAutoplay').val();
            psSlideDelay = $('.psSlideDelay').val();
            psSlideLoop = $('.psSlideLoop').val();
            psSlideTransition = $('.psSlideTransition').val();
            psPostsNumber = $('.psPostsNumber').val();
            psDots = $('.psDots').val();
            psArrows = $('.psArrows').val();
            psFtrImage = $('.psFtrImage').val();
            psFtrImageSize = $('.psFtrImageSize').val();
            psExcerpt = $('.psExcerpt').val();
            psReadMore = $('.psReadMore').val();
            psMoreLinkText = $('.psMoreLinkText').val();
            psHeadingSize = $('.psHeadingSize').val();
            psTextAlignment = $('.psTextAlignment').val();
            psBgColor = $('.psBgColor').val();
            psTxtColor = $('.psTxtColor').val();
            psHeadingTxtColor = $('.psHeadingTxtColor').val();
            psPostType = $('.psPostType').val();
            psPostsOrderBy = $('.psPostsOrderBy').val();
            psPostsOrder = $('.psPostsOrder').val();
            psPostsFilterBy = $('.psPostsFilterBy').val();
            psFilterValue = $('.psFilterValue').val();

            this.model.set({
                widgetPBPostsSlider:{
                  psAutoplay: psAutoplay,
                  psSlideDelay: psSlideDelay,
                  psSlideLoop: psSlideLoop,
                  psSlideTransition: psSlideTransition,
                  psPostsNumber: psPostsNumber,
                  psDots: psDots,
                  psArrows: psArrows,
                  psFtrImage: psFtrImage,
                  psFtrImageSize: psFtrImageSize,
                  psExcerpt: psExcerpt,
                  psReadMore: psReadMore,
                  psMoreLinkText: psMoreLinkText,
                  psHeadingSize: psHeadingSize,
                  psTextAlignment: psTextAlignment,
                  psBgColor: psBgColor,
                  psTxtColor: psTxtColor,
                  psHeadingTxtColor: psHeadingTxtColor,
                  psPostType: psPostType,
                  psPostsOrderBy: psPostsOrderBy,
                  psPostsOrder: psPostsOrder,
                  psPostsFilterBy: psPostsFilterBy,
                  psFilterValue: psFilterValue,
                }
            });
        break;
        case 'wigt-pb-icons':

            pbSelectedIcon = $('.pbSelectedIcon').children().attr('class');
            pbIconSize = $('.pbIconSize').val();
            pbIconRotation = $('.pbIconRotation').val();
            pbIconColor = $('.pbIconColor').val();
            pbIconLink = $('.pbIconLink').val();

            this.model.set({
                widgetIcons:{
                  pbSelectedIcon: pbSelectedIcon,
                  pbIconSize: pbIconSize,
                  pbIconRotation: pbIconRotation,
                  pbIconColor: pbIconColor,
                  pbIconLink: pbIconLink,
                }
            });
        break;
        case 'wigt-pb-counter': 
            var this_widget_counter = this.model.get('widgetCounter');
            pbCounterID = this_widget_counter['pbCounterID'];

            counterStartingNumber = $('.counterStartingNumber').val();
            counterEndingNumber = $('.counterEndingNumber').val();
            counterNumberPrefix = $('.counterNumberPrefix').val();
            counterNumberSuffix = $('.counterNumberSuffix').val();
            counterAnimationTime = $('.counterAnimationTime').val(); 
            counterTitle = $('.counterTitle').val();
            counterTextColor = $('.counterTextColor').val();
            counterTitleColor = $('.counterTitleColor').val();
            counterNumberFontSize = $('.counterNumberFontSize').val();
            counterTitleFontSize = $('.counterTitleFontSize').val();

            this.model.set({
                widgetCounter:{
                  pbCounterID: pbCounterID,
                  counterStartingNumber: counterStartingNumber,
                  counterEndingNumber:counterEndingNumber,
                  counterNumberPrefix: counterNumberPrefix,
                  counterNumberSuffix: counterNumberSuffix,
                  counterAnimationTime: counterAnimationTime,
                  counterTitle: counterTitle,
                  counterTextColor: counterTextColor,
                  counterTitleColor: counterTitleColor,
                  counterNumberFontSize: counterNumberFontSize,
                  counterTitleFontSize: counterTitleFontSize,
                }
            });
        break;
        case 'wigt-pb-audio':

            //audio widget
            audioOgg = $('.audioOgg').val();
            audioMpThree = $('.audioMpThree').val();
            audioAutoPlay = $('.audioAutoPlay').val();
            audioLoop = $('.audioLoop').val();
            audioControls = $('.audioControls').val();

            this.model.set({
                widgetAudio:{
                  audioOgg: audioOgg,
                  audioMpThree: audioMpThree,
                  audioAutoPlay: audioAutoPlay,
                  audioLoop: audioLoop,
                  audioControls: audioControls
                }
            });
        break;
        case 'wigt-pb-cards': 

            // Card Widget
            pbSelectedCardIcon = $('.pbSelectedCardIcon').children().attr('class');
            pbCardIconSize = $('.pbCardIconSize').val();
            pbCardIconRotation = $('.pbCardIconRotation').val();
            pbCardIconColor = $('.pbCardIconColor').val();
            pbCardTitleColor = $('.pbCardTitleColor').val();
            pbCardTitleSize = $('.pbCardTitleSize').val();
            pbCardDescColor = $('.pbCardDescColor').val();
            pbCardDescSize = $('.pbCardDescSize').val();
            pbCardTitle = $('.pbCardTitle').val();
            pbCardDesc = $('.pbCardDesc').val();

            this.model.set({
                widgetCard:{
                  pbSelectedCardIcon: pbSelectedCardIcon,
                  pbCardIconSize: pbCardIconSize,
                  pbCardIconRotation: pbCardIconRotation,
                  pbCardIconColor: pbCardIconColor,
                  pbCardTitleColor: pbCardTitleColor,
                  pbCardTitleSize: pbCardTitleSize,
                  pbCardDescColor: pbCardDescColor,
                  pbCardDescSize: pbCardDescSize,
                  pbCardTitle: pbCardTitle,
                  pbCardDesc: pbCardDesc,
                  pbCardTitleSizeTablet: $('.pbCardTitleSizeTablet').val(),
                  pbCardTitleSizeMobile: $('.pbCardTitleSizeMobile').val(),
                  pbCardDescSizeTablet:$('.pbCardDescSizeTablet').val(),
                  pbCardDescSizeMobile:$('.pbCardDescSizeMobile').val(),
                }
            });
        break;
        case 'wigt-pb-testimonial':

            //testimonial widget
            tsAuthorName = $('.tsAuthorName').val();
            tsJob = $('.tsJob').val();
            tsCompanyName = $('.tsCompanyName').val();
            tsTestimonial = $('.tsTestimonial').val();
            tsUserImg = $('.tsUserImg').val();
            tsImageShape = $('.tsImageShape').val();
            tsIconColor = $('.tsIconColor').val();
            tsIconSize = $('.tsIconSize').val();
            tsTextColor = $('.tsTextColor').val();
            tsTextSize = $('.tsTextSize').val();
            tsTestimonialColor = $('.tsTestimonialColor').val();
            tsTestimonialSize = $('.tsTestimonialSize').val();
            tsTextAlignment = $('.tsTextAlignment').val();

            this.model.set({
                widgetTestimonial: {
                  tsAuthorName: tsAuthorName,
                  tsJob: tsJob,
                  tsCompanyName: tsCompanyName,
                  tsTestimonial: tsTestimonial,
                  tsUserImg: tsUserImg,
                  tsImageShape: tsImageShape,
                  tsIconColor: tsIconColor,
                  tsIconSize: tsIconSize,
                  tsTextColor: tsTextColor,
                  tsTextSize: tsTextSize,
                  tsTestimonialColor: tsTestimonialColor,
                  tsTestimonialSize:tsTestimonialSize,
                  tsTextAlignment: tsTextAlignment,
                }
            });
        break;
        case 'wigt-pb-shortcode': 

            shortCodeInput = $('.shortCodeInput').val();
            this.model.set({
                widgetShortCode: {
                  shortCodeInput: shortCodeInput,
                }
            });
        break;
        case 'wigt-pb-countdown': 

            this.model.set({
              widgetCowntdown: {
                pbCountDownDate: $('.pbCountDownDate').val(),
                pbCountDownTimezone: $('.pbCountDownTimezone').val(),
                pbCountDownLabel: $('.pbCountDownLabel').val(),
                pbCountDownColor: $('.pbCountDownColor').val(),
                pbCountDownLabelColor: $('.pbCountDownLabelColor').val(),
                pbCountDownTextSize: $('.pbCountDownTextSize').val(),
                pbCountDownTextSizeTablet:$('.pbCountDownTextSizeTablet').val(),
                pbCountDownTextSizeMobile:$('.pbCountDownTextSizeMobile').val(),
                pbCountDownLabelTextSize: $('.pbCountDownLabelTextSize').val(),
                pbCountDownLabelTextSizeTablet:$('.pbCountDownLabelTextSizeTablet').val(),
                pbCountDownLabelTextSizeMobile:$('.pbCountDownLabelTextSizeMobile').val(),
                pbCountDownLabelFontFamily:$('.pbCountDownLabelFontFamily').val(),
                pbCountDownNumberFontFamily:$('.pbCountDownNumberFontFamily').val(),
                pbCountDownType:$('.pbCountDownType').val(),
                pbCountDownNumberBgColor:$('.pbCountDownNumberBgColor').val(),
                pbCountDownNumberBorderRadius:$('.pbCountDownNumberBorderRadius').val(),
                pbCountDownHGap:$('.pbCountDownHGap').val(),
                pbCountDownHGapTablet:$('.pbCountDownHGapTablet').val(),
                pbCountDownHGapMobile:$('.pbCountDownHGapMobile').val(),
                pbCountDownVGap:$('.pbCountDownVGap').val(),
                pbCountDownVGapTablet:$('.pbCountDownVGapTablet').val(),
                pbCountDownVGapMobile:$('.pbCountDownVGapMobile').val(),
                pbCountDownDateDays:$('.pbCountDownDateDays').val(),
                pbCountDownDateHours:$('.pbCountDownDateHours').val(),
                pbCountDownDateMins:$('.pbCountDownDateMins').val(),
                pbCountDownDateSecs:$('.pbCountDownDateSecs').val(),
                daysText:$('.daysText').val(),
                hoursText:$('.hoursText').val(),
                minutesText:$('.minutesText').val(),
                secondsText:$('.secondsText').val(),
                hideDays:$('.hideDays').val(),
                hideHours:$('.hideHours').val(),
                hideMinutes:$('.hideMinutes').val(),
                hideSeconds:$('.hideSeconds').val(),
              }
            });
        break;
        case 'wigt-pb-imageSlider': 

            // Image Slider Widget
            pbSliderAuto = $('.pbSliderAuto').val();
            pbSliderDelay = $('.pbSliderDelay').val();
            pbSliderPager = $('.pbSliderPager').val();
            pbSliderNav = $('.pbSliderNav').val();
            pbSliderRandom = $('.pbSliderRandom').val();
            pbSliderPause = $('.pbSliderPause').val();


            var pbSliderSlideList = [];
            var pbSliderContentList = [];

            $('.sliderImageSlidesContainer li').each(function(index){

                pbSliderSlideList.push($( this ).children('.accordContentHolder').children('.slideImgURL').val() );

                pbSliderContentThisObject = {};
                pbSliderContentThisObject = {
                    imageSlideHeading: $( this ).children('.accordContentHolder').children('.imageSlideHeading').val(),
                    imageSlideDesc:$( this ).children('.accordContentHolder').children('.imageSlideDesc').val(),
                    imageSlideButtonText:$( this ).children('.accordContentHolder').children('.imageSlideButtonText').val(),
                    imageSlideButtonURL:$( this ).children('.accordContentHolder').children('.imageSlideButtonURL').val()
                };

                pbSliderContentList.push(pbSliderContentThisObject);

            });

            pbSliderImagesURL = pbSliderSlideList;

            slideHeadingBold = false; 
            slideHeadingItalic = false;
            slideHeadingUnderlined = false;
            if( $('.slideHeadingBold').is(':checked') ){
                slideHeadingBold = true;
            }
            if( $('.slideHeadingItalic').is(':checked') ){
                slideHeadingItalic = true;
            }
            if( $('.slideHeadingUnderlined').is(':checked') ){
                slideHeadingUnderlined = true;
            }

            slideHeadingStyles = {
                slideHeadingColor: $('.slideHeadingColor').val(),
                slideHeadingSize: $('.slideHeadingSize').val(),
                slideHeadingSizeTablet: $('.slideHeadingSizeTablet').val(),
                slideHeadingSizeMobile: $('.slideHeadingSizeMobile').val(),
                slideHeadingLetterSpacing: $('.slideHeadingLetterSpacing').val(),
                slideHeadingLetterSpacingTablet:$('.slideHeadingLetterSpacingTablet').val(),
                slideHeadingLetterSpacingMobile:$('.slideHeadingLetterSpacingMobile').val(),
                slideHeadingLineHeight:$('.slideHeadingLineHeight').val(),
                slideHeadingLineHeightTablet:$('.slideHeadingLineHeightTablet').val(),
                slideHeadingLineHeightMobile:$('.slideHeadingLineHeightMobile').val(),
                slideHeadingFontFamily: $('.slideHeadingFontFamily').val(),
                slideHeadingBold: slideHeadingBold,
                slideHeadingItalic: slideHeadingItalic,
                slideHeadingUnderlined: slideHeadingUnderlined,
            };

            slideDescBold = false; 
            slideDescItalic = false;
            slideDescUnderlined = false;
            if( $('.slideDescBold').is(':checked') ){
                slideDescBold = true;
            }
            if( $('.slideDescItalic').is(':checked') ){
                slideDescItalic = true;
            }
            if( $('.slideDescUnderlined').is(':checked') ){
                slideDescUnderlined = true;
            }

            slideDescStyles = {
                slideDescColor: $('.slideDescColor').val(),
                slideDescSize: $('.slideDescSize').val(),
                slideDescSizeTablet:$('.slideDescSizeTablet').val(),
                slideDescSizeMobile:$('.slideDescSizeMobile').val(),
                slideDescLetterSpacing: $('.slideDescLetterSpacing').val(),
                slideDescLetterSpacingTablet:$('.slideDescLetterSpacingTablet').val(),
                slideDescLetterSpacingMobile:$('.slideDescLetterSpacingMobile').val(),
                slideDescLineHeight:$('.slideDescLineHeight').val(),
                slideDescLineHeightTablet:$('.slideDescLineHeightTablet').val(),
                slideDescLineHeightMobile:$('.slideDescLineHeightMobile').val(),
                slideDescFontFamily: $('.slideDescFontFamily').val(),
                slideDescBold: slideDescBold,
                slideDescItalic: slideDescItalic,
                slideDescUnderlined: slideDescUnderlined,
            };

            slideButtonStyles = {
                slideButtonBtnHeight: $('.slideButtonBtnHeight').val(),
                slideButtonBtnHeightTablet:$('.slideButtonBtnHeightTablet').val(),
                slideButtonBtnHeightMobile:$('.slideButtonBtnHeightMobile').val(),
                slideButtonBtnWidth: $('.slideButtonBtnWidth').val(),
                slideButtonBtnWidthTablet:$('.slideButtonBtnWidthTablet').val(),
                slideButtonBtnWidthMobile:$('.slideButtonBtnWidthMobile').val(),
                slideButtonBtnBgColor:$('.slideButtonBtnBgColor').val(),
                slideButtonBtnColor:$('.slideButtonBtnColor').val(),
                slideButtonBtnHoverBgColor:$('.slideButtonBtnHoverBgColor').val(),
                slideButtonBtnHoverTextColor:$('.slideButtonBtnHoverTextColor').val(),
                slideButtonBtnFontSize:$('.slideButtonBtnFontSize').val(),
                slideButtonBtnFontSizeTablet:$('.slideButtonBtnFontSizeTablet').val(),
                slideButtonBtnFontSizeMobile:$('.slideButtonBtnFontSizeMobile').val(),
                slideButtonBtnFontFamily:$('.slideButtonBtnFontFamily').val(),
                slideButtonBtnFontLetterSpacing:$('.slideButtonBtnFontLetterSpacing').val(),
                slideButtonBtnFontLetterSpacingTablet:$('.slideButtonBtnFontLetterSpacingTablet').val(),
                slideButtonBtnFontLetterSpacingMobile:$('.slideButtonBtnFontLetterSpacingMobile').val(),
                slideButtonBtnBorderWidth:$('.slideButtonBtnBorderWidth').val(),
                slideButtonBtnBorderColor:$('.slideButtonBtnBorderColor').val(),
                slideButtonBtnBorderRadius:$('.slideButtonBtnBorderRadius').val()
            }

            this.model.set({
                widgetImageSlider: {
                  pbSliderImagesURL: pbSliderImagesURL,
                  pbSliderContent: pbSliderContentList,
                  slideHeadingStyles: slideHeadingStyles,
                  slideDescStyles: slideDescStyles,
                  slideButtonStyles: slideButtonStyles,
                  pbSliderHeight: $('.pbSliderHeight').val(),
                  pbSliderHeightTablet:$('.pbSliderHeightTablet').val(),
                  pbSliderHeightMobile:$('.pbSliderHeightMobile').val(),
                  pbSliderHeightUnit: $('.pbSliderHeightUnit').val(),
                  pbSliderHeightUnitTablet:$('.pbSliderHeightUnitTablet').val(),
                  pbSliderHeightUnitMobile:$('.pbSliderHeightUnitMobile').val(),
                  pbSliderContentBgColor: $('.pbSliderContentBgColor').val(),
                  pbSliderAuto:  $('.pbSliderAuto').val(),
                  pbSliderDelay:  $('.pbSliderDelay').val(),
                  pbSliderPager:  $('.pbSliderPager').val(),
                  pbSliderNav:  $('.pbSliderNav').val(),
                  pbSliderRandom:  $('.pbSliderRandom').val(),
                  pbSliderPause:  $('.pbSliderPause').val(),
                }
            });
        break;
        case 'wigt-pb-progressBar': 
            this.model.set({
                widgetProgressBar: {
                  pbProgressBarTitle: $('.pbProgressBarTitle').val(),
                  pbProgressBarPrecentage: $('.pbProgressBarPrecentage').val(),
                  pbProgressBarDisplayPrecentage: $('.pbProgressBarDisplayPrecentage').val(),
                  pbProgressBarText: $('.pbProgressBarText').val(),
                  pbProgressBarTitleColor: $('.pbProgressBarTitleColor').val(),
                  pbProgressBarTextColor: $('.pbProgressBarTextColor').val(),
                  pbProgressBarColor: $('.pbProgressBarColor').val(),
                  pbProgressBarBgColor: $('.pbProgressBarBgColor').val(),
                  pbProgressBarTitleSize: $('.pbProgressBarTitleSize').val(),
                  pbProgressBarHeight: $('.pbProgressBarHeight').val(),
                  pbProgressBarTextSize: $('.pbProgressBarTextSize').val(),
                  pbProgressBarTextFontFamily: $('.pbProgressBarTextFontFamily').val(),
                }
            });
        break;
        case 'wigt-pb-pricing': 
            var pricingeditorID = 'pbPricingContent';
            if($('#wp-'+pricingeditorID+'-wrap').hasClass("tmce-active")){
                var pbPricingContent = tinyMCE.get(pricingeditorID).getContent({format : 'raw'});
            }else{
                var pbPricingContent = $('#'+pricingeditorID).val();
            }
            btnicon = $('.pricingbtnSelectedIconpbicp-auto').val();
            if (btnicon != '') {
             pricingbtnSelectedIcon = $('.pricingbtnSelectedIcon').children().attr('class');
            }else{
             pricingbtnSelectedIcon = '';
            }
            this.model.set({
                widgetPricing: {
                  pbPricingHeaderText: $('.pbPricingHeaderText').val(),
                  pbPricingContent: pbPricingContent,
                  pbPricingHeaderTextColor: $('.pbPricingHeaderTextColor').val(),
                  pbPricingHeaderBgColor: $('.pbPricingHeaderBgColor').val(),
                  pbPricingHeaderTextSize: $('.pbPricingHeaderTextSize').val(),
                  pbPricingBorderWidth: $('.pbPricingBorderWidth').val(),
                  pbPricingBorderColor: $('.pbPricingBorderColor').val(),
                  pbPricingButtonSectionBgColor: $('.pbPricingButtonSectionBgColor').val(),
                  pricingbtnText: $('.pricingbtnText').val(),
                  pricingbtnLink: $('.pricingbtnLink').val(),
                  pricingbtnTextColor: $('.pricingbtnTextColor').val(),
                  pricingbtnFontSize: $('.pricingbtnFontSize').val(),
                  pricingbtnFontSizeTablet:$('.pricingbtnFontSizeTablet').val(),
                  pricingbtnFontSizeMobile:$('.pricingbtnFontSizeMobile').val(),
                  pricingbtnBgColor: $('.pricingbtnBgColor').val(),
                  pricingbtnWidth: $('.pricingbtnWidth').val(),
                  pricingbtnWidthPercent: $('.pricingbtnWidthPercent').val(),
                  pricingbtnWidthPercentTablet:$('.pricingbtnWidthPercentTablet').val(),
                  pricingbtnWidthPercentMobile:$('.pricingbtnWidthPercentMobile').val(),
                  pricingbtnWidthUnit: $('.pricingbtnWidthUnit').val(),
                  pricingbtnWidthUnitTablet: $('.pricingbtnWidthUnitTablet').val(),
                  pricingbtnWidthUnitMobile: $('.pricingbtnWidthUnitMobile').val(),
                  pricingbtnHeight: $('.pricingbtnHeight').val(),
                  pricingbtnHeightTablet:$('.pricingbtnHeightTablet').val(),
                  pricingbtnHeightMobile:$('.pricingbtnHeightMobile').val(),
                  pricingbtnHoverBgColor: $('.pricingbtnHoverBgColor').val(),
                  pricingbtnHoverTextColor: $('.pricingbtnHoverTextColor').val(),
                  pricingbtnBlankAttr: $('.pricingbtnBlankAttr').val(),
                  pricingbtnBorderColor: $('.pricingbtnBorderColor').val(),
                  pricingbtnBorderWidth: $('.pricingbtnBorderWidth').val(),
                  pricingbtnBorderRadius: $('.pricingbtnBorderRadius').val(),
                  pricingbtnButtonAlignment: $('.pricingbtnButtonAlignment').val(),
                  pricingbtnButtonAlignmentTablet: $('.pricingbtnButtonAlignmentTablet').val(),
                  pricingbtnButtonAlignmentMobile: $('.pricingbtnButtonAlignmentMobile').val(),
                  pricingbtnButtonFontFamily: $('.pricingbtnButtonFontFamily').val(),
                  pricingbtnSelectedIcon: pricingbtnSelectedIcon,
                  pricingbtnIconPosition: $('.pricingbtnIconPosition').val(),
                  pricingbtnIconAnimation: $('.pricingbtnIconAnimation').val(),
                  pricingbtnIconGap: $('.pricingbtnIconGap').val(),
                }
            });
        break;

        case 'wigt-pb-imgCarousel': 

            // Image Carousel Widget
            var pbCarouselSlideList = [];

            $('.carouselSlidesContainer li').each(function(index){
                pbCarouselSlideList.push($( this ).children('.accordContentHolder').children('.carouselImgURL').val() );
            });

            imgCarouselSlidesURL = pbCarouselSlideList;

            this.model.set({
                widgetImgCarousel:{
                  pbImgCarouselAutoplay: $('.pbImgCarouselAutoplay').val(),
                  pbImgCarouselDelay: $('.pbImgCarouselDelay').val(),
                  imgCarouselSlideLoop: $('.imgCarouselSlideLoop').val(),
                  imgCarouselSlideTransition: $('.imgCarouselSlideTransition').val(),
                  imgCarouselPagination: $('.imgCarouselPagination').val(),
                  pbImgCarouselNav: $('.pbImgCarouselNav').val(),
                  imgCarouselSlidesURL: imgCarouselSlidesURL,
                }
            });
        break;

        case 'wigt-pb-wooCommerceProducts': 
            this.model.set({
                widgetWooPorducts:{
                  wooProductsColumn: $('.wooProductsColumn').val(),
                  wooProductsCount: $('.wooProductsCount').val(),
                  wooProductsCategories: $('.wooProductsCategories').val(),
                  wooProductsTags:$('.wooProductsTags').val(),
                  wooProductsOrderBy:$('.wooProductsOrderBy').val(),
                  wooProductsOrder:$('.wooProductsOrder').val(),
                }
            });
        break;
        case 'wigt-pb-iconList':
            // iconList Widget
            var pbIconListAllItems = [];

            $('.iconListItemsContainer li').each(function(index){
                var thisListValues = {
                    iconListItemText: $( this ).children('.accordContentHolder').children('.iconListItemText').val(),
                    iconListItemIcon: $( this ).children('.accordContentHolder').children('.iconListItemIcon').val(),
                    iconListItemLink: $( this ).children('.accordContentHolder').children('.iconListItemLink').val(),
                    iconListItemLinkOpen: $( this ).children('.accordContentHolder').children('.iconListItemLinkOpen').val()
                }
                pbIconListAllItems.push( thisListValues );
            });

            pbIconListAllItemsArray = pbIconListAllItems;
            this.model.set({
                widgetIconList:{
                  iconListComplete: pbIconListAllItemsArray,
                  iconListLineHeight:$('.iconListLineHeight').val(),
                  iconListAlignment:$('.iconListAlignment').val(),
                  iconListIconSize:$('.iconListIconSize').val(),
                  iconListIconSizeTablet:$('.iconListIconSizeTablet').val(),
                  iconListIconSizeMobile:$('.iconListIconSizeMobile').val(),
                  iconListIconColor: $('.iconListIconColor').val(),
                  iconListTextSize:$('.iconListTextSize').val(),
                  iconListTextSizeTablet:$('.iconListTextSizeTablet').val(),
                  iconListTextSizeMobile:$('.iconListTextSizeMobile').val(),
                  iconListTextIndent:$('.iconListTextIndent').val(),
                  iconListTextIndentTablet:$('.iconListTextIndentTablet').val(),
                  iconListTextIndentMobile:$('.iconListTextIndentMobile').val(),
                  iconListTextColor:$('.iconListTextColor').val(),
                  iconListTextFontFamily:$('.iconListTextFontFamily').val(),
                }
            });
        break;
        case 'wigt-pb-spacer': 
            this.model.set({
                widgetVerticalSpace:{
                  widgetVerticalSpaceValue: $('.widgetVerticalSpaceValue').val(),
                  widgetVerticalSpaceValueTablet:$('.widgetVerticalSpaceValueTablet').val(),
                  widgetVerticalSpaceValueMobile:$('.widgetVerticalSpaceValueMobile').val()
                }
            });
        break;
        case 'wigt-pb-break': 
            this.model.set({
                widgetBreaker:{
                  widgetBreakerStyle: $('.widgetBreakerStyle').val(),
                  widgetBreakerWeight: $('.widgetBreakerWeight').val(),
                  widgetBreakerColor: $('.widgetBreakerColor').val(),
                  widgetBreakerWidth: $('.widgetBreakerWidth').val(),
                  widgetBreakerAlignment: $('.widgetBreakerAlignment').val(),
                  widgetBreakerSpacing: $('.widgetBreakerSpacing').val(),
                }
            });
        break;
        case 'wigt-pb-formBuilder': 

            var pbFormBuilderAllFields = [];

                $('.formFieldItemsContainer li').each(function(index){
                    var thisListValues = {
                        fbFieldType: $( this ).children('.accordContentHolder').children('.fbFieldType').val(),
                        thisFieldOptions: {
                            fbFieldLabel: $( this ).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldLabel').val(),
                            fbFieldPlaceHolder: $( this ).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldPlaceHolder').val(),
                            fbFieldRequired: $( this ).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldRequired').val(),
                            fbFieldWidth: $( this ).children('.accordContentHolder').children('.thisFieldOptions').children('.fbFieldWidth').val(),
                            multiOptionFieldValues: $( this ).children('.accordContentHolder').children('.multiOptionField').children('.multiOptionFieldValues').val(),
                            fbtextareaRows: $( this ).children('.accordContentHolder').children('.textareaOptions').children('.fbtextareaRows').val(),
                            displayFieldsInline: $( this ).children('.accordContentHolder').children('.multiOptionField').children('.displayFieldsInline').val(),
                        }
                    }
                    pbFormBuilderAllFields.push( thisListValues );

                });

                pbFormBuilderAllFieldsArray = pbFormBuilderAllFields;

                btnicon = $('.formBuilderbtnSelectedIconpbicp-auto').val();
                if (btnicon != '') {
                 formBuilderbtnSelectedIcon = $('.formBuilderbtnSelectedIcon').children().attr('class');
                }else{
                 formBuilderbtnSelectedIcon = '';
                }

            var formSuccessActionURL = $('.formSuccessActionURL').val();
            if (formSuccessActionURL != '#') {
              if (!/^(f|ht)tps?:\/\//i.test(formSuccessActionURL)) {
                formSuccessActionURL = "http://" + formSuccessActionURL;
              }
            }

            this.model.set({
                widgetFormBuilder:{
                  widgetPbFbFormFeilds:pbFormBuilderAllFieldsArray, 
                  widgetPbFbFormFeildOptions: {
                    formBuilderFieldSize: $('.formBuilderFieldSize').val() ,
                    formBuilderFieldLabelDisplay: $('.formBuilderFieldLabelDisplay').val() ,
                    formBuilderFieldBgColor: $('.formBuilderFieldBgColor').val() ,
                    formBuilderFieldColor: $('.formBuilderFieldColor').val() ,
                    formBuilderFieldBorderColor: $('.formBuilderFieldBorderColor').val() ,
                    formBuilderFieldBorderWidth: $('.formBuilderFieldBorderWidth').val() ,
                    formBuilderFieldBorderRadius: $('.formBuilderFieldBorderRadius').val() ,
                    formBuilderLabelSize: $('.formBuilderLabelSize').val(),
                    formBuilderLabelSizeTablet: $('.formBuilderLabelSizeTablet').val(),
                    formBuilderLabelSizeMobile: $('.formBuilderLabelSizeMobile').val(),
                    formBuilderLabelColor:$('.formBuilderLabelColor').val(),
                    formBuilderFieldVGap:$('.formBuilderFieldVGap').val(),
                    formBuilderFieldHGap:$('.formBuilderFieldHGap').val(),
                    formBuilderFieldFontFamily:$('.formBuilderFieldFontFamily').val(),
                  },
                  widgetPbFbFormSubmitOptions:{
                    formBuilderBtnText: $('.formBuilderBtnText').val(),
                    formBuilderBtnSize: $('.formBuilderBtnSize').val(),
                    formBuilderBtnWidth: $('.formBuilderBtnWidth').val(),
                    formBuilderBtnBgColor: $('.formBuilderBtnBgColor').val(),
                    formBuilderBtnColor: $('.formBuilderBtnColor').val(),
                    formBuilderBtnHoverBgColor: $('.formBuilderBtnHoverBgColor').val(),
                    formBuilderBtnHoverTextColor: $('.formBuilderBtnHoverTextColor').val(),
                    formBuilderBtnFontSize: $('.formBuilderBtnFontSize').val(),
                    formBuilderBtnFontSizeTablet:$('.formBuilderBtnFontSizeTablet').val(),
                    formBuilderBtnFontSizeMobile:$('.formBuilderBtnFontSizeMobile').val(),
                    formBuilderBtnBorderWidth: $('.formBuilderBtnBorderWidth').val(),
                    formBuilderBtnBorderColor: $('.formBuilderBtnBorderColor').val(),
                    formBuilderBtnBorderRadius: $('.formBuilderBtnBorderRadius').val(),
                    formBuilderBtnAlignment: $('.formBuilderBtnAlignment').val(),
                    formBuilderBtnHGap: $('.formBuilderBtnHGap').val(),
                    formBuilderBtnVGap: $('.formBuilderBtnVGap').val(),
                    formBuilderbtnSelectedIcon:formBuilderbtnSelectedIcon,
                    formBuilderbtnIconPosition:$('.formBuilderbtnIconPosition').val(),
                    formBuilderbtnIconGap:$('.formBuilderbtnIconGap').val(),
                    formBuilderbtnIconAnimation:$('.formBuilderbtnIconAnimation').val(),
                    formBuilderBtnFontFamily:$('.formBuilderBtnFontFamily').val(),
                  },
                  widgetPbFbFormEmailOptions:{
                    formEmailformName: $('.formEmailformName').val(),
                    formEmailTo: $('.formEmailTo').val(),
                    formEmailSubject: $('.formEmailSubject').val(),
                    formEmailFromEmail: $('.formEmailFromEmail').val(),
                    formEmailName: $('.formEmailName').val(),
                    formEmailFormat: $('.formEmailFormat').val(),
                    formSuccessMessage: $('.formSuccessMessage').val(),
                    formSuccessAction:$('.formSuccessAction').val(),
                    formSuccessActionURL:formSuccessActionURL,
                    formSuccessCustomAction:$('.formSuccessCustomAction').val(),
                    formFailureMessage: $('.formFailureMessage').val(),
                  },
                  widgetPbFbFormMailChimp: {
                    formBuilderEnableMailChimp: $('.formBuilderEnableMailChimp').val(),
                    formBuilderMCAccountName: $('.formBuilderMCAccountName').val(),
                    formBuilderMCApiKey: $('.formBuilderMCApiKey').val(),
                    formBuilderEnableGetResponse: $('.formBuilderEnableGetResponse').val(),
                    formBuilderGRAccountName: $('.formBuilderGRAccountName').val(),
                    formBuilderGRApiKey: $('.formBuilderGRApiKey').val(),
                    formBuilderEnableCM: $('.formBuilderEnableCM').val(),
                    formBuilderCMAccountName: $('.formBuilderCMAccountName').val(),
                    formBuilderCMApiKey: $('.formBuilderCMApiKey').val(),
                    formBuilderEnableAC: $('.formBuilderEnableAC').val(),
                    formBuilderACAccountName: $('.formBuilderACAccountName').val(),
                    formBuilderACApiKey: $('.formBuilderACApiKey').val(),
                    formBuilderACApiUrl: $('.formBuilderACApiUrl').val(),
                    formBuilderEnableDrip: $('.formBuilderEnableDrip').val(),
                    formBuilderDripAccountName: $('.formBuilderDripAccountName').val(),
                    formBuilderDripApiKey: $('.formBuilderDripApiKey').val(),
                    formBuilderEnableAweber: $('.formBuilderEnableAweber').val(),
                    formBuilderAweberList: $('.formBuilderAweberList').val(),
                    formBuilderEnableConvertKit: $('.formBuilderEnableConvertKit').val(),
                    formBuilderConvertKitApiKey: $('.formBuilderConvertKitApiKey').val(),
                    formBuilderConvertKitAccountName: $('.formBuilderConvertKitAccountName').val(),
                  },
                  widgetPbFbFormAllowDuplicates:$('.widgetPbFbFormAllowDuplicates').val(),
                }
            });
        break;
        case 'wigt-pb-text': 
            widgetTextBold = false; 
            widgetTextItalic = false;
            widgetTextUnderlined = false;
            if( $('.widgetTextBold').is(':checked') ){
                widgetTextBold = true;
            }
            if( $('.widgetTextItalic').is(':checked') ){
                widgetTextItalic = true;
            }
            if( $('.widgetTextUnderlined').is(':checked') ){
                widgetTextUnderlined = true;
            }


            this.model.set({
                widgetText:{
                  widgetTextContent:  $('.widgetTextContent').val(),
                  widgetTextAlignment: $('.widgetTextAlignment').val(),
                  widgetTextAlignmentTablet: $('.widgetTextAlignmentTablet').val(),
                  widgetTextAlignmentMobile: $('.widgetTextAlignmentMobile').val(),
                  widgetTextTag: $('.widgetTextTag').val(),
                  widgetTextColor: $('.widgetTextColor').val(),
                  widgetTextSize: $('.widgetTextSize').val(),
                  widgetTextFamily: $('.widgetTextFamily').val(),
                  widgetTextWeight: $('.widgetTextWeight').val(),
                  widgetTextTransform: $('.widgetTextTransform').val(),
                  widgetTextLineHeight: $('.widgetTextLineHeight').val(),
                  widgetTextSpacing: $('.widgetTextSpacing').val(),
                  widgetTextBold: widgetTextBold,
                  widgetTextItalic: widgetTextItalic,
                  widgetTextUnderlined: widgetTextUnderlined,
                  widgetTextSizeTablet:$('.widgetTextSizeTablet').val(),
                  widgetTextSizeMobile:$('.widgetTextSizeMobile').val(),
                  widgetTextLineHeightTablet:$('.widgetTextLineHeightTablet').val(),
                  widgetTextLineHeightMobile:$('.widgetTextLineHeightMobile').val(),
                  widgetTextSpacingTablet:$('.widgetTextSpacingTablet').val(),
                  widgetTextSpacingMobile:$('.widgetTextSpacingMobile').val()
                }
            });
            var widgetCurrentType = 'widgetText';
        break;
        case 'wigt-pb-embededVideo':
            this.model.set({
                widgetEmbedVideo:{
                  widgetEvidVideoType: $('.widgetEvidVideoType').val(),
                  widgetEvidVideoLink: $('.widgetEvidVideoLink').val(),
                  widgetEvidVideoAutoplay:$('.widgetEvidVideoAutoplay').val(),
                  widgetEvidVideoPlayerControls:$('.widgetEvidVideoPlayerControls').val(),
                  widgetEvidVideoTitle:$('.widgetEvidVideoTitle').val(),
                  widgetEvidVideoSuggested:$('.widgetEvidVideoSuggested').val(),
                  widgetEvidImageOverlay: $('.widgetEvidImageOverlay').val(),
                  widgetEvidImageUrl:$('.widgetEvidImageUrl').val(),
                  widgetEvidImageIcon:$('.widgetEvidImageIcon').val(),
                  widgetEvidImageIconColor:$('.widgetEvidImageIconColor').val(),
                  widgetEvidImageLightbox:$('.widgetEvidImageLightbox').val()
                }
            });
        break;
        case 'wigt-pb-popupClose':

            closeBtnBold = false; 
            closeBtnItalic = false;
            closeBtnUnderlined = false;
            if( $('.closeBtnBold').is(':checked') ){
                closeBtnBold = true;
            }
            if( $('.closeBtnItalic').is(':checked') ){
                closeBtnItalic = true;
            }
            if( $('.closeBtnUnderlined').is(':checked') ){
                closeBtnUnderlined = true;
            }

            this.model.set({
              widgetClosePopUp:{
                closeBtnText: $('.closeBtnText').val(),
                closeBtnTextColor: $('.closeBtnTextColor').val(),
                closeBtnFontSize: $('.closeBtnFontSize').val(),
                closeBtnFontSizeTablet:$('.closeBtnFontSizeTablet').val(),
                closeBtnFontSizeMobile:$('.closeBtnFontSizeMobile').val(),
                closeBtnBgColor: $('.closeBtnBgColor').val(),
                closeBtnWidth: $('.closeBtnWidth').val(),
                closeBtnWidthPercent:$('.closeBtnWidthPercent').val(),
                closeBtnWidthUnit: $('.closeBtnWidthUnit').val(),
                closeBtnWidthUnitTablet: $('.closeBtnWidthUnitTablet').val(),
                closeBtnWidthUnitMobile: $('.closeBtnWidthUnitMobile').val(),
                closeBtnWidthPercentTablet:$('.closeBtnWidthPercentTablet').val(),
                closeBtnWidthPercentMobile:$('.closeBtnWidthPercentMobile').val(),
                closeBtnHeight: $('.closeBtnHeight').val(),
                closeBtnHeightTablet:$('.closeBtnHeightTablet').val(),
                closeBtnHeightMobile:$('.closeBtnHeightMobile').val(),
                closeBtnHoverBgColor: $('.closeBtnHoverBgColor').val(),
                closeBtnHoverColor: $('.closeBtnHoverColor').val(),
                closeBtnBlankAttr: $('.closeBtnBlankAttr').val(),
                closeBtnBorderColor: $('.closeBtnBorderColor').val(),
                closeBtnBorderWidth: $('.closeBtnBorderWidth').val(),
                closeBtnBorderRadius: $('.closeBtnBorderRadius').val(),
                closeBtnButtonAlignment: $('.closeBtnButtonAlignment').val(),
                closeBtnButtonFontFamily: $('.closeBtnButtonFontFamily').val(),
                closeBtnBold: closeBtnBold,
                closeBtnItalic: closeBtnItalic,
                closeBtnUnderlined: closeBtnUnderlined,
                }
            });
        break;

        default :  break;

        $('.isChagesMade').val('true');
    }
    

    var thisWidgetDataAttr = this.model.attributes;
    var thisColFontsToLoad = [];

    //console.log( JSON.stringify(thisWidgetDataAttr) );

    currentlyEditedColId = pageBuilderApp.currentlyEditedColId;
    currentlyEditedWidgId = pageBuilderApp.currentlyEditedWidgId;
    currentlyEditedThisCol = pageBuilderApp.currentlyEditedThisCol;
    currentlyEditedThisRow = pageBuilderApp.currentlyEditedThisRow;

    var renderredWidget = completeWidgetRender(thisWidgetDataAttr,currentlyEditedWidgId, currentlyEditedThisCol , currentlyEditedThisRow, thisColFontsToLoad );

    
    $('#'+currentlyEditedColId+' '+'.widget-'+currentlyEditedWidgId).replaceWith(renderredWidget['WidgetHtml']);

    $('#'+currentlyEditedColId+' '+'.widget-'+currentlyEditedWidgId + ' #thisRenderredWidgetScritps ').append(renderredWidget['WidgetScript']);
    $('#'+currentlyEditedThisRow+'-'+currentlyEditedThisCol + ' .widget-Draggable').mouseenter(function(ev){   
      $(this).children('.widgetHandle').css('display','block');
    });
    $('#'+currentlyEditedThisRow+'-'+currentlyEditedThisCol + ' .widget-Draggable').mouseleave(function(){
      $('.widgetHandle').css('display','none');
    });

    $('.widget-Draggable').draggable({
                helper: function(event){
                  var thisELE  = $(event.currentTarget);
                  
                  var elMarigns  = thisELE.css('margin-top') + ' ' + thisELE.css('margin-right') + ' ' +thisELE.css('margin-bottom') + ' ' +thisELE.css('margin-left');

                  return $("<div class='widgetDragHelper' style='margin:"+elMarigns+"; padding: 20px; background: #333; border-radius: 100px;'> <span class='dashicons dashicons-move' style='color:#fff;' title='Move'></span> </div>");
                }, cursor: "move", appendTo: "#container", handle:'.widgetMoveHandle',
                start: function(event,ui){
                  $(event.target).attr('style','display:none;');
                  $('.isDroppedOnDroppable').val('false');
                  $('.droppableBelowWidget').css('display','block');
                  //  console.log(this);
                  $(this).children('.draggableWidgets').click();
                },
                stop: function(event,ui){
                  $('.droppableBelowWidget').hide(250);

                  var isDroppedOnDroppable = $('.isDroppedOnDroppable').val();

                  if (isDroppedOnDroppable != 'true') {
                    $(event.target).attr('style','display:block;');
                  }
                },
    });

      //$('.columnWidgetPopup').slideUp('200');

      $(this.el).html('');
      this.render();
  },
  duplicateWidget: function () {
      newModel = this.model.clone();
      var modelIndex = pageBuilderApp.widgetList.indexOf(this.model);
      pageBuilderApp.widgetList.add(newModel.attributes, {at: modelIndex+1});
      $(this.el).html('');
      this.render();
      ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
        currentEditableColId = jQuery('.currentEditableColId').val();
        jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
        jQuery('#'+pageBuilderApp.currentlyEditedColId).children('.wdgt-colChange').click();

        $('.isChagesMade').val('true');
  },
  updateWidgetTemplate: function(ev){
    var blockName = $(ev.target).attr('data-selected_widget_template');
    var widgetBlock = '';
    var modelIndex = $('.insertwidgBlockAtIndex').val();
    modelIndex = parseInt(modelIndex);
    $.ajax({
      type: 'GET',
      dataType: "json",
      url: widgetViewLinks.pluginsUrl+'/admin/scripts/blocks/widgetBlocks/'+blockName+''+".json",
      data: { get_param: 'value' },
      success: function( data ) {
        widgetBlock = data;
      },
      error: function(  thrownError ) {
        alert('Some Error Occurred :'+thrownError);
      },
      async:false
    });

    if ( widgetBlock !='' ) {

      this.model.set(widgetBlock);

      this.model.set({
        widgetMtop:0,
        widgetMleft:0,
        widgetMbottom:0,
        widgetMright:0,
        widgetMarginTablet:{
          rMTT:'',
          rMBT:'',
          rMLT:'',
          rMRT:'',
        },
        widgetMarginMobile:{
          rMTM:'',
          rMBM:'',
          rMLM:'',
          rMRM:'',
        },
      });

      var thisWidgetDataAttr = this.model.attributes;
      var thisColFontsToLoad = [];

      currentlyEditedColId = pageBuilderApp.currentlyEditedColId;
      currentlyEditedWidgId = pageBuilderApp.currentlyEditedWidgId;
      currentlyEditedThisCol = pageBuilderApp.currentlyEditedThisCol;
      currentlyEditedThisRow = pageBuilderApp.currentlyEditedThisRow;

      var renderredWidget = completeWidgetRender(thisWidgetDataAttr,currentlyEditedWidgId, currentlyEditedThisCol , currentlyEditedThisRow, thisColFontsToLoad );

      
      $('#'+currentlyEditedColId+' '+'.widget-'+currentlyEditedWidgId).replaceWith(renderredWidget['WidgetHtml']);

      $('#'+currentlyEditedColId+' '+'.widget-'+currentlyEditedWidgId + ' #thisRenderredWidgetScritps ').append(renderredWidget['WidgetScript']);
      $('#'+currentlyEditedThisRow+'-'+currentlyEditedThisCol + ' .widget-Draggable').mouseenter(function(ev){   
        $(this).children('.widgetHandle').css('display','block');
      });
      $('#'+currentlyEditedThisRow+'-'+currentlyEditedThisCol + ' .widget-Draggable').mouseleave(function(){
        $('.widgetHandle').css('display','none');
      });

      $('.widget-Draggable').draggable({
                  helper: function(event){
                    var thisELE  = $(event.currentTarget);
                    
                    var elMarigns  = thisELE.css('margin-top') + ' ' + thisELE.css('margin-right') + ' ' +thisELE.css('margin-bottom') + ' ' +thisELE.css('margin-left');

                    return $("<div class='widgetDragHelper' style='margin:"+elMarigns+"; padding: 20px; background: #333; border-radius: 100px;'> <span class='dashicons dashicons-move' style='color:#fff;' title='Move'></span> </div>");
                  }, cursor: "move", appendTo: "#container", handle:'.widgetMoveHandle',
                  start: function(event,ui){
                    $(event.target).attr('style','display:none;');
                    $('.isDroppedOnDroppable').val('false');
                    $('.droppableBelowWidget').css('display','block');
                    //  console.log(this);
                    $(this).children('.draggableWidgets').click();
                  },
                  stop: function(event,ui){
                    $('.droppableBelowWidget').hide(250);

                    var isDroppedOnDroppable = $('.isDroppedOnDroppable').val();

                    if (isDroppedOnDroppable != 'true') {
                      $(event.target).attr('style','display:block;');
                    }
                  },
      });

        //$('.columnWidgetPopup').slideUp('200');
        ColcurrentEditableRowID = $('.ColcurrentEditableRowID').val();
        currentEditableColId = $('.currentEditableColId').val();
        $('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').click();

        $(this.el).html('');
        this.render();
        this.EditWidget();
        //$('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
        //$('.edit_column').hide("slide", { direction: "left" }, 500);
        //$('.ulpb_column_controls').css('display','none');
        $('.popb_confirm_action_popup').css('display','none');
        
    }
  }

});

}( jQuery ) );