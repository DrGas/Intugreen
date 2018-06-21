( function( $ ) {
pageBuilderApp.ULPBPage = Backbone.Model.extend({
      defaults:{
        pageID: P_ID,
        postType: thisPostType,
        pageLink: '',
        pageTitle:'',
        pageStatus:'unpublished',
        pageBuilderVersion: PageBuilder_Version,
        pageOptions: {
          setFrontPage: 0,
          loadWpHead:0,
          loadWpFooter:0,
          pageBgImage: ' ',
          pageBgColor: 'transparent',
          pagePadding: {
            pagePaddingTop : '',
            pagePaddingBottom : '',
            pagePaddingLeft : '',
            pagePaddingRight : '',
          },
          pagePaddingTablet: {
            pagePaddingTopTablet : '',
            pagePaddingBottomTablet : '',
            pagePaddingLeftTablet : '',
            pagePaddingRightTablet : '',
          },
          pagePaddingMobile: {
            pagePaddingTopMobile : '',
            pagePaddingBottomMobile : '',
            pagePaddingLeftMobile : '',
            pagePaddingRightMobile : '',
          },
          pageSeoName: '',
          pageSeoDescription: '',
          pageSeoKeywords: '',
          pageFavIconUrl: '',
          pageLogoUrl: '',
          VariantB_ID: '',
          POcustomCSS:'',
          POcustomJS:'',
          POPBDefaults: {
            POPBDefaultsEnable : 'false',
            POPB_typefaces: {
              typefaceHOne:'Arial',
              typefaceHTwo:'Arial',
              typefaceParagraph:'Arial',
              typefaceButton:'Arial',
              typefaceAnchorLink:'Arial'
            },
            POPB_typeSizes: {
              typeSizeHOne:'45',
              typeSizeHOneTablet:'',
              typeSizeHOneMobile:'',
              typeSizeHTwo:'29',
              typeSizeHTwoTablet:'',
              typeSizeHTwoMobile:'',
              typeSizeParagraph:'15',
              typeSizeParagraphTablet:'',
              typeSizeParagraphMobile:'',
              typeSizeButton:'16',
              typeSizeButtonTablet:'',
              typeSizeButtonMobile:'',
              typeSizeAnchorLink:'15',
              typeSizeAnchorLinkTablet:'',
              typeSizeAnchorLinkMobile:'',
            }
          }
        },
        formMailchimp:{
          listId:'',
          apiKey:'',
        },
        Rows:{}
      },
      url: URLL
});

pageBuilderApp.ColWidget = Backbone.Model.extend({
      defaults:{
        widgetType:' ',
        widgetStyling:'/* Custom CSS for widget here. */',
        widgetMtop:'0',
        widgetMleft:'0',
        widgetMbottom:'0',
        widgetMright:'0',
        widgetPtop:'0',
        widgetPleft:'0',
        widgetPbottom:'0',
        widgetPright:'0',
          widgetPaddingTablet:{
            rPTT:'',
            rPBT:'',
            rPLT:'',
            rPRT:'',
          },
          widgetPaddingMobile:{
            rPTM:'',
            rPBM:'',
            rPLM:'',
            rPRM:'',
          },
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
        widgetBgColor: 'transparent',
        widgetAnimation: 'none',
        widgetBorderWidth: '',
        widgetBorderStyle:'',
        widgetBorderColor:'',
        widgetBoxShadowH: '',
        widgetBoxShadowV: '',
        widgetBoxShadowBlur: '',
        widgetBoxShadowColor: '',
        widgetIsInline:false,
        widgetIsInlineTablet:'',
        widgetIsInlineMobile:'',
        widgetCustomClass: '',
        widgBgImg:'',
        widgBackgroundType:'solid',
        widgGradient:{
          widgGradientColorFirst: '#dd9933',
          widgGradientLocationFirst:'55',
          widgGradientColorSecond:'#eeee22',
          widgGradientLocationSecond:'50',
          widgGradientType:'linear',
          widgGradientPosition:'top left',
          widgGradientAngle:'135',
        },
        widgHoverOptions: {
          widgBgColorHover:'',
          widgBackgroundTypeHover:'',
          widgHoverTransitionDuration:'',
          widgGradientHover:{
            widgGradientColorFirstHover: '',
            widgGradientLocationFirstHover:'',
            widgGradientColorSecondHover:'',
            widgGradientLocationSecondHover:'',
            widgGradientTypeHover:'linear',
            widgGradientPositionHover:'top left',
            widgGradientAngleHover:'',
          }
        },
        widgHideOnDesktop:'',
        widgHideOnTablet:'',
        widgHideOnMobile:'',
      },
      url: '/'
});


pageBuilderApp.RowCollection = Backbone.Collection.extend({
    model:pageBuilderApp.Row
});

pageBuilderApp.WidgetCollection = Backbone.Collection.extend({
    model:pageBuilderApp.ColWidget
});


}( jQuery ) );