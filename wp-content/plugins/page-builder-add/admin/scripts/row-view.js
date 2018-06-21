( function( $ ) { 

function POPB_strip(html) {
        html = html.replace(/<br>/g, "$br$");
        
        html = html.replace(/<div>/g, "$br$");
        
        html = html.replace(/(?:\r\n|\r|\n)/g, '$br$');
        
        var tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        html = tmp.textContent || tmp.innerText;
        
        html = html.replace(/\$br\$/g, "<br>");
        
        return html;
}

var WidgetDraggedAttr = '';
var isRenderDropLoop = false;
var checkIEUL = false;
pageBuilderApp.RowView = Backbone.View.extend({
    tagName: 'section',
    className: 'row',
    template: _.template($('#item-template').html()),
    events: {
      'click #rowDelete': 'deleteRow',
      'click #rowEdit': 'EditRow',
      'click #rowDuplicate': 'DuplicateRow',
      'click #editRowSave': 'updateRow',
      'click #setGlobalRow': 'setGlobalRow',
      'click #WidthSave': 'updateWidth',
      'click #RowHeightSave': 'updateRowHeight',
      'click div.editColumn': 'EditColumn',
      'click #editColumnSave': 'updateColumn',
      'click #editColumnSaveWidget': 'updateColumnWidgetTrigger',
      'click .draggableWidgets': 'widgetDrag',
      'click .wdgt-dropped': 'widgetDropped',
      'click .wdgt-dragRemove': 'widgetDragRemove',
      'click .widgetDeleteHandle': 'deleteWidget',
      'click .widgetDuplicateHandle': 'duplicateWidget',
      'click .widgetEditHandle' : 'editWidget',
      'click .addNewRow' : 'addNewRow',
      'click .addNewGlobalRow' : 'addNewGlobalRow',
      'click .addNewRowBlock' : 'addNewRowBlock',
      'click .setColbtn' : 'setColumnsOfThisModel',
      'click #widgetInlineEditor': 'widgetWinlineEditingEnable',
      'click .inlineEditingSaveTrigger': 'widgetInlineEditorSave',
    },
    attributes: function() {
        if(this.model) {
            return {
                RowID: this.model.get('rowID')
            }
        }
        return {}
    },
    initialize: function(){
      _.bindAll(this, 'render','deleteRow','updateRow','EditRow','EditColumn','updateColumn','updateWidth','DuplicateRow','widgetDrag','widgetDropped','setGlobalRow','addNewRow','addNewGlobalRow','addNewRowBlock','setColumnsOfThisModel','widgetWinlineEditingEnable','widgetInlineEditorSave','updateRowHeight','deleteWidgetFromList','updateColumnWidgetTrigger');
    },
    render: function(){
      this.$el.html(this.template(this.model.toJSON() )  );
      var rowCID = this.model.cid;

      if (thisPostType == 'ulpb_global_rows') {
        $('.newRowBtnContainerVisible').remove();
      }
      else{

        var ifIsGlobal = this.model.get('globalRow');
        if (typeof(ifIsGlobal) != 'undefined') {

          if (ifIsGlobal['isGlobalRow'] == true) {

            getGlobalRowDataFromDb(ifIsGlobal['globalRowPid']);

            retrievedGlobalRowAttributes = $('.globalRowRetrievedAttributes').val();
            
            if (retrievedGlobalRowAttributes != '') {
              this.model.set(JSON.parse(retrievedGlobalRowAttributes) );
            }
            

            rowHeight = this.model.get('rowHeight');
            rowHeightUnit = this.model.get('rowHeightUnit');

            if (typeof(rowHeightUnit) == 'undefined' || rowHeightUnit == '') {
              rowHeightUnit = 'px';
            }else{
              rowHeightUnit = this.model.get('rowHeightUnit');
            }

            $('li[data-model-cid="'+rowCID+'"] section').append('<div class="globalRowOverlay" style=" position:absolute; height:100%; z-index:9; "> <br><br><br> <h3 style="color:#fff;"> This is a Global Row </h3> <br> <a href="'+admURL+'/post.php?post='+ifIsGlobal['globalRowPid']+'&action=edit"  target="_blank" >You can edit it here </a> </div>');

            $('li[data-model-cid="'+rowCID+'"]').mouseenter(function(){
              $('li[data-model-cid="'+rowCID+'"] section .globalRowOverlay').css('display', 'block');
            });
            $('li[data-model-cid="'+rowCID+'"]').mouseleave(function(){
              $('li[data-model-cid="'+rowCID+'"] section .globalRowOverlay').css('display', 'none');
            });

          }
        }
      }

      var rowID = this.model.get('rowID');
      var rowCID = this.model.cid;
      rowColumns = this.model.get('columns');
      rowHeight = this.model.get('rowHeight');
      rowHeightUnit = this.model.get('rowHeightUnit');
      var rowData = this.model.get('rowData');
      var row_bg_img = rowData['bg_img'];
      var row_bg_color = rowData['bg_color'];
      var row_margin = rowData['margin'];
      var row_padding = rowData['padding'];
      var custom_styling = rowData['customStyling'];
      var custom_JS = rowData['customJS'];

      if (typeof(rowHeightUnit) == 'undefined' || rowHeightUnit == '') {
          rowHeightUnit = 'px';
      }else{
          rowHeightUnit = this.model.get('rowHeightUnit');
      }

      var rowHideOnDesktop ="'display':'block'", rowHideOnTablet = "'display':'block'", rowHideOnMobile = "'display':'block'";
      if (typeof(rowData['rowHideOnDesktop']) !== 'undefined' ) {
        if (rowData['rowHideOnDesktop'] == 'hide') {
          rowHideOnDesktop = "display:'none' ,";
        }

        if (rowData['rowHideOnTablet'] == 'hide') {
          rowHideOnTablet = "display:'none' ,";
        }
        if (rowData['rowHideOnMobile'] == 'hide') {
          rowHideOnMobile = "display:'none' ,";
        }
      }

      var currRowDefaultMarginPadding  = ''+
        '<script>'+
        "jQuery('.responsiveBtn').live('click',function(){"+
        " if (jQuery(this).hasClass('rbt-l') ) { "+
        "  jQuery('#"+rowID+"').css({'margin-top':'"+row_margin['rowMarginTop']+"%', 'margin-bottom':'"+row_margin['rowMarginBottom']+"%', 'margin-left':'"+row_margin['rowMarginLeft']+"%', 'margin-right':'"+row_margin['rowMarginRight']+"%', });"+
        "  jQuery('#"+rowID+"').css({'padding-top':'"+row_padding['rowPaddingTop']+"%', 'padding-bottom':'"+row_padding['rowPaddingBottom']+"%', 'padding-left':'"+row_padding['rowPaddingLeft']+"%', 'padding-right':'"+row_padding['rowPaddingRight']+"%', "+rowHideOnDesktop+" });"+
        " }"+
        "});"+
        "var currentVPS = jQuery('.currentViewPortSize').val();"+
        "if ( currentVPS == 'rbt-l' ) { "+
        "  jQuery('#"+rowID+"').css({'margin-top':'"+row_margin['rowMarginTop']+"%', 'margin-bottom':'"+row_margin['rowMarginBottom']+"%', 'margin-left':'"+row_margin['rowMarginLeft']+"%', 'margin-right':'"+row_margin['rowMarginRight']+"%', });"+
        "  jQuery('#"+rowID+"').css({'padding-top':'"+row_padding['rowPaddingTop']+"%', 'padding-bottom':'"+row_padding['rowPaddingBottom']+"%', 'padding-left':'"+row_padding['rowPaddingLeft']+"%', 'padding-right':'"+row_padding['rowPaddingRight']+"%', "+rowHideOnDesktop+" });"+
        "}"+
        " "+
        '</script> ';

      if (typeof(rowData['rowCustomClass']) !== 'undefined' ) {
        $('li[data-model-cid="'+rowCID+'"] section').addClass(rowData['rowCustomClass']);
      }

      if (typeof(this.model.get('rowHeightTablet')) !== 'undefined') {
        rowHeightTablet = this.model.get('rowHeightTablet');
        rowHeightUnitTablet = this.model.get('rowHeightUnitTablet');
        rowHeightMobile = this.model.get('rowHeightMobile');
        rowHeightUnitMobile = this.model.get('rowHeightUnitMobile');
      }else{
        rowHeightTablet ='';
        rowHeightUnitTablet ='';
        rowHeightMobile ='';
        rowHeightUnitMobile ='';
      }


      var currRowMarginTablet = '';
      if (typeof(rowData['marginTablet']) !== 'undefined' ) {
        rowMarginTablet = rowData['marginTablet'];
        rowPaddingTablet = rowData['paddingTablet'];

        var currRowMarginTablet  = ''+
          '<script>'+
          "jQuery('.responsiveBtn').live('click',function(){"+
          " if (jQuery(this).hasClass('rbt-m') ) { "+
          "  jQuery('#"+rowID+"').css({'margin-top':'"+rowMarginTablet['rMTT']+"%', 'margin-bottom':'"+rowMarginTablet['rMBT']+"%', 'margin-left':'"+rowMarginTablet['rMLT']+"%', 'margin-right':'"+rowMarginTablet['rMRT']+"%',  "+rowHideOnTablet+" });"+

          "  jQuery('#"+rowID+"').css({'padding-top':'"+rowPaddingTablet['rPTT']+"%', 'padding-bottom':'"+rowPaddingTablet['rPBT']+"%', 'padding-left':'"+rowPaddingTablet['rPLT']+"%', 'padding-right':'"+rowPaddingTablet['rPRT']+"%', });"+
          " }"+
          "});"+
          "var currentVPS = jQuery('.currentViewPortSize').val();"+
          "if ( currentVPS == 'rbt-m' ) { "+
          "  jQuery('#"+rowID+"').css({'margin-top':'"+rowMarginTablet['rMTT']+"%', 'margin-bottom':'"+rowMarginTablet['rMBT']+"%', 'margin-left':'"+rowMarginTablet['rMLT']+"%', 'margin-right':'"+rowMarginTablet['rMRT']+"%', "+rowHideOnTablet+" });"+

          "  jQuery('#"+rowID+"').css({'padding-top':'"+rowPaddingTablet['rPTT']+"%', 'padding-bottom':'"+rowPaddingTablet['rPBT']+"%', 'padding-left':'"+rowPaddingTablet['rPLT']+"%', 'padding-right':'"+rowPaddingTablet['rPRT']+"%', });"+
          "}"+
          " "+
          '</script> ';
      }

      var currRowMarginMobile = '';
      if (typeof(rowData['marginMobile']) !== 'undefined' ) {
        rowMarginMobile = rowData['marginMobile'];
        rowPaddingMobile = rowData['paddingMobile'];
        var currRowMarginMobile  = ''+
        '<script>'+
        "jQuery('.responsiveBtn').live('click',function(){"+
        " if (jQuery(this).hasClass('rbt-s') ) { "+
        "  jQuery('#"+rowID+"').css({'margin-top':'"+rowMarginMobile['rMTM']+"%', 'margin-bottom':'"+rowMarginMobile['rMBM']+"%', 'margin-left':'"+rowMarginMobile['rMLM']+"%', 'margin-right':'"+rowMarginMobile['rMRM']+"%', "+rowHideOnMobile+" });"+

        "  jQuery('#"+rowID+"').css({'padding-top':'"+rowPaddingMobile['rPTM']+"%', 'padding-bottom':'"+rowPaddingMobile['rPBM']+"%', 'padding-left':'"+rowPaddingMobile['rPLM']+"%', 'padding-right':'"+rowPaddingMobile['rPRM']+"%', });"+
        " }"+
        "});"+
        "var currentVPS = jQuery('.currentViewPortSize').val();"+
        "if ( currentVPS == 'rbt-s' ) { "+
        "  jQuery('#"+rowID+"').css({'margin-top':'"+rowMarginMobile['rMTM']+"%', 'margin-bottom':'"+rowMarginMobile['rMBM']+"%', 'margin-left':'"+rowMarginMobile['rMLM']+"%', 'margin-right':'"+rowMarginMobile['rMRM']+"%', "+rowHideOnMobile+" });"+

        "  jQuery('#"+rowID+"').css({'padding-top':'"+rowPaddingMobile['rPTM']+"%', 'padding-bottom':'"+rowPaddingMobile['rPBM']+"%', 'padding-left':'"+rowPaddingMobile['rPLM']+"%', 'padding-right':'"+rowPaddingMobile['rPRM']+"%', });"+
        "}"+
        " "+
        '</script> ';

      }


      var currentRowResponsiveTriggerScripts = '\n'+ currRowMarginTablet + '\n' + currRowMarginMobile + '\n' +currRowDefaultMarginPadding;

      var currRowPadding  = 'padding:'+row_padding['rowPaddingTop'] +'% '+row_padding['rowPaddingRight']+'% '+ row_padding['rowPaddingBottom'] +'% '+ row_padding['rowPaddingLeft']+'%; ';
      var currRowMargins  = 'margin:'+row_margin['rowMarginTop'] +'% '+row_margin['rowMarginRight']+'% '+ row_margin['rowMarginBottom'] +'% '+ row_margin['rowMarginLeft']+'%; ';

      var rowBackgroundOptions = 'background-color:'+row_bg_color+';';

      rowBackgroundParallax = '';
      if (typeof(rowData['rowBackgroundParallax']) !== 'undefined') {
        if (rowData['rowBackgroundParallax'] == 'true') {
          rowBackgroundParallax = 'background-attachment:fixed;';
        }
      }
      if (row_bg_img != '') {
        rowBackgroundOptions = 'background: url('+row_bg_img+');';
      }

      if (typeof(rowData['rowBackgroundType']) !== 'undefined') {
        if (rowData['rowBackgroundType'] == 'gradient') {
          var rowGradient = rowData['rowGradient'];

          if (rowGradient['rowGradientType'] == 'linear') {
            rowBackgroundOptions = 'background: linear-gradient('+rowGradient['rowGradientAngle']+'deg, '+rowGradient['rowGradientColorFirst']+' '+rowGradient['rowGradientLocationFirst']+'%,'+rowGradient['rowGradientColorSecond']+' '+rowGradient['rowGradientLocationSecond']+'%);';
          }

          if (rowGradient['rowGradientType'] == 'radial') {
            rowBackgroundOptions = 'background: radial-gradient(at '+rowGradient['rowGradientPosition']+', '+rowGradient['rowGradientColorFirst']+' '+rowGradient['rowGradientLocationFirst']+'%,'+rowGradient['rowGradientColorSecond']+' '+rowGradient['rowGradientLocationSecond']+'%);';
          }
          
        }
      }

      var thisRowHoverStyleTag = '';
      var thisRowHoverOption = '';
      if (typeof(rowData['rowHoverOptions']) !== 'undefined') {
        var rowHoverOptions = rowData['rowHoverOptions'];
        if (rowHoverOptions['rowBackgroundTypeHover'] == 'solid') {
          var thisRowHoverOption = ' #'+rowID+':hover { background:'+rowHoverOptions['rowBgColorHover']+' !important; transition: all '+rowHoverOptions['rowHoverTransitionDuration']+'s; }';
        }
        if (rowHoverOptions['rowBackgroundTypeHover'] == 'gradient') {
          var rowGradientHover = rowHoverOptions['rowGradientHover'];

          if (rowGradientHover['rowGradientTypeHover'] == 'linear') {
            thisRowHoverOption = ' #'+rowID+':hover { background: linear-gradient('+rowGradientHover['rowGradientAngleHover']+'deg, '+rowGradientHover['rowGradientColorFirstHover']+' '+rowGradientHover['rowGradientLocationFirstHover']+'%,'+rowGradientHover['rowGradientColorSecondHover']+' '+rowGradientHover['rowGradientLocationSecondHover']+'%) !important; transition: all '+rowHoverOptions['rowHoverTransitionDuration']+'s; }';
          }

          if (rowGradientHover['rowGradientTypeHover'] == 'radial') {

            thisRowHoverOption = ' #'+rowID+':hover { background: radial-gradient(at '+rowGradientHover['rowGradientPositionHover']+', '+rowGradientHover['rowGradientColorFirstHover']+' '+rowGradientHover['rowGradientLocationFirstHover']+'%,'+rowGradientHover['rowGradientColorSecondHover']+' '+rowGradientHover['rowGradientLocationSecondHover']+'%) !important; transition: all '+rowHoverOptions['rowHoverTransitionDuration']+'s; }';
          }
        }

        thisRowHoverStyleTag = '<style> '+thisRowHoverOption+' </style>';
      }

      rowOverlayBackgroundOptions = '';
      if (typeof(rowData['rowBgOverlayColor']) !== 'undefined') {
        var rowOverlayBackgroundOptions = 'background:'+rowData['rowBgOverlayColor']+'; background-color:'+rowData['rowBgOverlayColor']+';';
      }
      
      if (typeof(rowData['rowOverlayBackgroundType']) !== 'undefined') {
        if (rowData['rowOverlayBackgroundType'] == 'gradient') {
          var rowOverlayGradient = rowData['rowOverlayGradient'];

          if (rowOverlayGradient['rowOverlayGradientType'] == 'linear') {
            rowOverlayBackgroundOptions = 'background: linear-gradient('+rowOverlayGradient['rowOverlayGradientAngle']+'deg, '+rowOverlayGradient['rowOverlayGradientColorFirst']+' '+rowOverlayGradient['rowOverlayGradientLocationFirst']+'%,'+rowOverlayGradient['rowOverlayGradientColorSecond']+' '+rowOverlayGradient['rowOverlayGradientLocationSecond']+'%);';
          }

          if (rowOverlayGradient['rowOverlayGradientType'] == 'radial') {
            rowOverlayBackgroundOptions = 'background: radial-gradient(at '+rowOverlayGradient['rowOverlayGradientPosition']+', '+rowOverlayGradient['rowOverlayGradientColorFirst']+' '+rowOverlayGradient['rowOverlayGradientLocationFirst']+'%,'+rowOverlayGradient['rowOverlayGradientColorSecond']+' '+rowOverlayGradient['rowGradientLocationSecond']+'%);';
          }
          
        }
      }

      $(this.el).attr('style','height:auto; overflow:hidden; '+rowBackgroundOptions+' '+rowBackgroundParallax+' '+currRowMargins+' '+currRowPadding +custom_styling);

      $(this.el).attr('id',rowID);

      $(this.el).append(' <div class="row-overlay" style="height:100%; '+rowOverlayBackgroundOptions+' top:0; left: 0; width: 100%; position:absolute;"></div> <div id="ulpb_row_controls" class="ulpb_row_controls" style="display:none;"> <div id="edit_form_close" class="btn-red btn" style="display:none;"><span class="dashicons dashicons-no-alt"></span></div><div id="editRowSave" style="display:none;"><span style="padding: 25px 0px 25px 0px;background: transparent;border-radius: 5px;display:unset;font-size: 35px;color: #585858;border-top-left-radius: 0;border-bottom-left-radius: 0;" class="dashicons dashicons-arrow-left"></span> </div>  <div id="editRowSaveVisible" class=""><span class="dashicons dashicons-arrow-left editSaveVisibleIcon"></span> </div>  </div> </div></div> <div id="thisRowScripts" style="display:none !important;">'+ currentRowResponsiveTriggerScripts + thisRowHoverStyleTag +'</div>');


      /*
      var RowWidth = $('section[RowID="'+rowID+'"]').width();
      var videoRowHeight = $('section[RowID="'+rowID+'"]').height();
      if (rowData['video'] != 'undefined')  {
        var rowVideo = rowData['video'];
        rowBgVideoEnable = rowVideo['rowBgVideoEnable'];
        if (rowBgVideoEnable == 'true') {
          rowBgVideoLoop = rowVideo['rowBgVideoLoop'];
          rowVideoMpfour = rowVideo['rowVideoMpfour'];
          rowVideoWebM = rowVideo['rowVideoWebM'];
          rowVideoThumb = rowVideo['rowVideoThumb'];

          rowVideoID = 'bgVid-'+rowID;
          
          var VideoBgHtml = '<video poster="'+rowVideoThumb+'" id="'+rowVideoID+'" playsinline autoplay muted '+rowBgVideoLoop+' > <source src="'+rowVideoWebM+'" type="video/webm"> <source src="'+rowVideoMpfour+'" type="video/mp4"> </video>';
          var VideoBgStyling = '<style type="text/css">#'+rowVideoID+' { position: absolute;max-width:'+RowWidth+'px; width: auto;height: auto;background: url("'+rowVideoThumb+'") no-repeat;background-size: cover;transition: 1s opacity;  } </style>';

          $(this.el).append(VideoBgHtml + VideoBgStyling);
        }
        
      }
    
      */
      colControlsArray = [];
      for(var i = 1; i <= rowColumns; i++){
        var this_column = 'column'+i;
        var thisColumnModelData = this.model.get(this_column);
        
        var this_column_options = thisColumnModelData['columnOptions'];
        var this_column_bg_color = this_column_options['bg_color'];
        var this_column_margin = this_column_options['margin'];
        var this_column_padding = this_column_options['padding'];
        var colWidth = this_column_options['width'];
        var columnCSS = this_column_options['columnCSS'];
        //var colWidthInPx = Math.floor( (1268*colWidth)/100);
        var columnMarginTop = this_column_margin['columnMarginTop'];
        var columnMarginRight = this_column_margin['columnMarginRight'];
        var columnMarginBottom = this_column_margin['columnMarginBottom'];
        var columnMarginLeft = this_column_margin['columnMarginLeft'];

        var columnPaddingTop = this_column_padding['columnPaddingTop'];
        var columnPaddingRight = this_column_padding['columnPaddingRight'];
        var columnPaddingBottom = this_column_padding['columnPaddingBottom'];
        var columnPaddingLeft = this_column_padding['columnPaddingLeft'];

        var this_column_margins = "margin:"+columnMarginTop+"% "+columnMarginRight+"% "+columnMarginBottom+"% "+columnMarginLeft+"%;   padding:"+columnPaddingTop+"% "+columnPaddingRight+"% "+columnPaddingBottom+"% "+columnPaddingLeft+"%;";

        this_col_shadow = '';
        if (typeof(this_column_options['colBoxShadow']) !== 'undefined') {
          colBoxShadow = this_column_options['colBoxShadow'];
          var this_col_shadow = 'box-shadow: '+colBoxShadow['colBoxShadowH']+'px  '+colBoxShadow['colBoxShadowV']+'px  '+colBoxShadow['colBoxShadowBlur']+'px '+colBoxShadow['colBoxShadowColor']+' ;  ';
        }
        this_col_border = '';
        if (typeof(this_column_options['colBorder']) !== 'undefined') {
          colBorder = this_column_options['colBorder'];
          var this_col_border =' border:'+colBorder['colBorderWidth']+'px  '+colBorder['colBorderStyle']+'  '+colBorder['colBorderColor']+ '; border-radius:'+colBorder['colBorderRadius']+'px;';
        }
        this_col_shadow = this_col_shadow + this_col_border;

        var colWidthUnit = '%';
        if (colWidth == "") {
          switch (rowColumns) {
          case '1':
            colWidth = 100;
            break;
          case '2':
            colWidth = 49;
            break;
          case '3':
            colWidth = 33;
            break;
          case '4':
            colWidth = 24;
            break;
          case '5':
            colWidth = 19;
            break;
          case '6':
            colWidth = 16.5;
            break;
          case '7':
            colWidth = 14.1;
            break;
          case '8':
            colWidth = 12;
            break;
          case '9':
            colWidth = 11;
            break;
          case '10':
            colWidth = 9.5;
            break;  
          default:
            colWidth = 99;
            break;
          }
        }

          columnCustomClass = '';
        if (typeof(this_column_options['columnCustomClass']) !== 'undefined') {
          columnCustomClass = this_column_options['columnCustomClass'];
        }

        var colHideOnDesktop ="'display':'inline-block'", colHideOnTablet = "'display':'inline-block'", colHideOnMobile = "'display':'inline-block'";
        if (typeof(this_column_options['colHideOnDesktop']) !== 'undefined' ) {
          if (this_column_options['colHideOnDesktop'] == 'hide') {
            colHideOnDesktop = "display:'none' ,";
          }

          if (this_column_options['colHideOnTablet'] == 'hide') {
            colHideOnTablet = "display:'none' ,";
          }
          if (this_column_options['colHideOnMobile'] == 'hide') {
            colHideOnMobile = "display:'none' ,";
          }
        }
        

        currColmarginDefault = '';
        currColmarginTablet = '';
        currColmarginMobile = '';
        if (typeof(this_column_options['paddingTablet']) !== 'undefined') {

          colPaddingTablet = this_column_options['paddingTablet'];
          colMarginTablet = this_column_options['marginTablet'];
          colWidthTablet = this_column_options['widthTablet'];

          if (colWidthTablet == '') {
            colWidthTablet = '99.9';
          }

          var currColmarginDefault  = ''+
            '<script>'+
            "jQuery('.responsiveBtn').live('click',function(){"+
            " if (jQuery(this).hasClass('rbt-l') ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+columnMarginTop+"%', 'margin-bottom':'"+columnMarginBottom+"%', 'margin-left':'"+columnMarginLeft+"%', 'margin-right':'"+columnMarginRight+"%', 'min-height':'"+rowHeight+rowHeightUnit+"',  "+colHideOnDesktop+"});"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+columnPaddingTop+"%', 'padding-bottom':'"+columnPaddingBottom+"%', 'padding-left':'"+columnPaddingLeft+"%', 'padding-right':'"+columnPaddingRight+"%', 'width':'"+colWidth+colWidthUnit+"', });"+
            " }"+
            "});"+

            "var currentVPS = jQuery('.currentViewPortSize').val();"+
            "if ( currentVPS == 'rbt-l' ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+columnMarginTop+"%', 'margin-bottom':'"+columnMarginBottom+"%', 'margin-left':'"+columnMarginLeft+"%', 'margin-right':'"+columnMarginRight+"%', 'min-height':'"+rowHeight+rowHeightUnit+"', "+colHideOnDesktop+" });"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+columnPaddingTop+"%', 'padding-bottom':'"+columnPaddingBottom+"%', 'padding-left':'"+columnPaddingLeft+"%', 'padding-right':'"+columnPaddingRight+"%', 'width':'"+colWidth+colWidthUnit+"', });"+
            "}"+
            " "+
            '</script> ';

          var currColmarginTablet  = ''+
            '<script>'+
            "jQuery('.responsiveBtn').live('click',function(){"+
            " if (jQuery(this).hasClass('rbt-m') ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+colMarginTablet['rMTT']+"%', 'margin-bottom':'"+colMarginTablet['rMBT']+"%', 'margin-left':'"+colMarginTablet['rMLT']+"%', 'margin-right':'"+colMarginTablet['rMRT']+"%',  'min-height':'"+rowHeightTablet+rowHeightUnitTablet+"', "+colHideOnTablet+" });"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+colPaddingTablet['rPTT']+"%', 'padding-bottom':'"+colPaddingTablet['rPBT']+"%', 'padding-left':'"+colPaddingTablet['rPLT']+"%', 'padding-right':'"+colPaddingTablet['rPRT']+"%', 'width':'"+colWidthTablet+"%', });"+
            " }"+
            "});"+

            "var currentVPS = jQuery('.currentViewPortSize').val();"+
            "if ( currentVPS == 'rbt-m' ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+colMarginTablet['rMTT']+"%', 'margin-bottom':'"+colMarginTablet['rMBT']+"%', 'margin-left':'"+colMarginTablet['rMLT']+"%', 'margin-right':'"+colMarginTablet['rMRT']+"%', 'min-height':'"+rowHeightTablet+rowHeightUnitTablet+"', "+colHideOnTablet+" });"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+colPaddingTablet['rPTT']+"%', 'padding-bottom':'"+colPaddingTablet['rPBT']+"%', 'padding-left':'"+colPaddingTablet['rPLT']+"%', 'padding-right':'"+colPaddingTablet['rPRT']+"%', 'width':'"+colWidthTablet+"%', });"+
            "}"+
            " "+
            '</script> ';
          
        }

        var currColmarginMobile  = ''+
            '<script>'+
            "jQuery('.responsiveBtn').live('click',function(){"+
            " if (jQuery(this).hasClass('rbt-s') || jQuery(this).hasClass('rbt-m') ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+''+"%', 'margin-bottom':'"+'30px'+"', 'margin-left':'"+''+"%', 'margin-right':'"+''+"%', 'min-height':'"+ rowHeightMobile+rowHeightUnitMobile+"',});"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+''+"%', 'padding-bottom':'"+''+"%', 'padding-left':'"+''+"%', 'padding-right':'"+''+"%', 'width':'"+'99.9'+"%', });"+
            " }"+
            "});"+

            "var currentVPS = jQuery('.currentViewPortSize').val();"+
            "if ( currentVPS == 'rbt-s' || currentVPS == 'rbt-m' ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+''+"%', 'margin-bottom':'"+'30px'+"', 'margin-left':'"+''+"%', 'margin-right':'"+''+"%', 'min-height':'"+ rowHeightMobile+rowHeightUnitMobile+"',});"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+''+"%', 'padding-bottom':'"+''+"%', 'padding-left':'"+''+"%', 'padding-right':'"+''+"%', 'width':'"+'99.9'+"%', });"+
            "}"+
            " "+
            '</script> ';
        if (typeof(this_column_options['paddingMobile']) !== 'undefined') {
          colPaddingMobile = this_column_options['paddingMobile'];
          colMarginMobile = this_column_options['marginMobile'];
          colWidthMobile = this_column_options['widthMobile'];

          if (colWidthMobile == '') {
            colWidthMobile = '99.9';
          }

          colMarginMobileBottomUnit = '%';
          if (colMarginMobile['rMBM'] == '') {
            colMarginMobile['rMBM'] = '';
            colMarginMobileBottomUnit = 'px';
          }

          currColmarginMobile  = ''+
            '<script>'+
            "jQuery('.responsiveBtn').live('click',function(){"+
            " if (jQuery(this).hasClass('rbt-s') ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+colMarginMobile['rMTM']+"%', 'margin-bottom':'"+colMarginMobile['rMBM']+colMarginMobileBottomUnit+"', 'margin-left':'"+colMarginMobile['rMLM']+"%', 'margin-right':'"+colMarginMobile['rMRM']+"%', 'min-height':'"+rowHeightMobile+rowHeightUnitMobile+"', "+colHideOnMobile+" });"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+colPaddingMobile['rPTM']+"%', 'padding-bottom':'"+colPaddingMobile['rPBM']+"%', 'padding-left':'"+colPaddingMobile['rPLM']+"%', 'padding-right':'"+colPaddingMobile['rPRM']+"%', 'width':'"+colWidthMobile+"%', });"+
            " }"+
            "});"+

            "var currentVPS = jQuery('.currentViewPortSize').val();"+
            "if ( currentVPS == 'rbt-s' ) { "+
            "  jQuery('#"+rowID+"-"+this_column+"').css({'margin-top':'"+colMarginMobile['rMTM']+"%', 'margin-bottom':'"+colMarginMobile['rMBM']+colMarginMobileBottomUnit+"', 'margin-left':'"+colMarginMobile['rMLM']+"%', 'margin-right':'"+colMarginMobile['rMRM']+"%', 'min-height':'"+rowHeightMobile+rowHeightUnitMobile+"', "+colHideOnMobile+" });"+

            "  jQuery('#"+rowID+"-"+this_column+"').css({'padding-top':'"+colPaddingMobile['rPTM']+"%', 'padding-bottom':'"+colPaddingMobile['rPBM']+"%', 'padding-left':'"+colPaddingMobile['rPLM']+"%', 'padding-right':'"+colPaddingMobile['rPRM']+"%', 'width':'"+colWidthMobile+"%', });"+
            "}"+
            " "+
            '</script> ';
        }

        var currColResponsiveScriptsTrigger = ' <div id="columnResponsiveScripts" style="display:none;">  \n ' + currColmarginTablet + ' \n ' + currColmarginMobile + ' \n ' +currColmarginDefault + '</div>';

        var colBackgroundOptions = 'background:'+this_column_bg_color+';';

        this_column_bg_img = '';
        if (typeof(this_column_options['colBgImg']) !== 'undefined') {
          this_column_bg_img = this_column_options['colBgImg'];
          if (this_column_bg_img !== '') {
            colBackgroundOptions = 'background: url('+this_column_bg_img+') no-repeat center; background-size:cover;';
          }
        }
        

        if (typeof(this_column_options['colBackgroundType']) !== 'undefined') {

          if (this_column_options['colBackgroundType'] == 'gradient') {
            var colGradient = this_column_options['colGradient'];

            if (colGradient['colGradientType'] == 'linear') {
              colBackgroundOptions = 'background: linear-gradient('+colGradient['colGradientAngle']+'deg, '+colGradient['colGradientColorFirst']+' '+colGradient['colGradientLocationFirst']+'%,'+colGradient['colGradientColorSecond']+' '+colGradient['colGradientLocationSecond']+'%);';
            }

            if (colGradient['colGradientType'] == 'radial') {
              colBackgroundOptions = 'background: radial-gradient(at '+colGradient['colGradientPosition']+', '+colGradient['colGradientColorFirst']+' '+colGradient['colGradientLocationFirst']+'%,'+colGradient['colGradientColorSecond']+' '+colGradient['colGradientLocationSecond']+'%);';
            }
            
          }
        }

        var colID = rowID+'-'+this_column;
        var thisColHoverStyleTag = '';
        var thisColHoverOption = '';
        if (typeof(this_column_options['colHoverOptions']) !== 'undefined') {
          var colHoverOptions = this_column_options['colHoverOptions'];
          if (colHoverOptions['colBackgroundTypeHover'] == 'solid') {
            var thisColHoverOption = ' #'+colID+':hover { background:'+colHoverOptions['colBgColorHover']+' !important; transition: all '+colHoverOptions['colHoverTransitionDuration']+'s; }';
          }
          if (colHoverOptions['colBackgroundTypeHover'] == 'gradient') {
            var colGradientHover = colHoverOptions['colGradientHover'];

            if (colGradientHover['colGradientTypeHover'] == 'linear') {
              thisColHoverOption = ' #'+colID+':hover { background: linear-gradient('+colGradientHover['colGradientAngleHover']+'deg, '+colGradientHover['colGradientColorFirstHover']+' '+colGradientHover['colGradientLocationFirstHover']+'%,'+colGradientHover['colGradientColorSecondHover']+' '+colGradientHover['colGradientLocationSecondHover']+'%) !important; transition: all '+colHoverOptions['colHoverTransitionDuration']+'s; }';
            }

            if (colGradientHover['colGradientTypeHover'] == 'radial') {

              thisColHoverOption = ' #'+colID+':hover { background: radial-gradient(at '+colGradientHover['colGradientPositionHover']+', '+colGradientHover['colGradientColorFirstHover']+' '+colGradientHover['colGradientLocationFirstHover']+'%,'+colGradientHover['colGradientColorSecondHover']+' '+colGradientHover['colGradientLocationSecondHover']+'%) !important; transition: all '+colHoverOptions['colHoverTransitionDuration']+'s; }';
            }
          }

          thisColHoverStyleTag = '<div id="columnStyleTag" style="display:none;"> <style> '+thisColHoverOption+' </style> </div> ';
        }

        var colEditBtn = "<div class='editColumn editColBtnTop' style='float: left; background: #2B87DA; padding: 8px 10px; display: none; cursor: pointer;  z-index: 99; position: absolute; ' data-col_id="+this_column+" data-overlay_id="+this_column+" ><span class='dashicons dashicons-edit' style='color:#fff;' data-col_id="+this_column+" data-overlay_id="+this_column+"></span></div>  "+currColResponsiveScriptsTrigger + thisColHoverStyleTag +"</div>";

        var colControls = '<div id="ulpb_column_controls" class="ulpb_column_controls  ulpb_column_controls'+this_column+'" style="display:none;" ><div id="edit_form_closeCol" style="display:none;" class="btn-red btn"><span class="dashicons dashicons-no-alt"></span></div><div id="editColumnSave" style="display:none;" data-col_id='+this_column+' ></div>  <div id="editColumnSaveWidget" style="display:none;" data-col_id='+this_column+' ></div>      <div id="editColumnSaveVisible" data-col_id='+this_column+' ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon"  data-col_id='+this_column+'></span></div><br></div> \n';
        
        $(this.el).append('<div class="column '+this_column+' '+columnCustomClass+' " id='+rowID+'-'+this_column+' data-col_id='+this_column+' style="width:' + colWidth +colWidthUnit+';  min-height:'+rowHeight+rowHeightUnit+'; '+colBackgroundOptions+' '+this_column_margins+'  '+this_col_shadow +'  '+columnCSS+'"> <div id="WidthSave" class="pb_hidden"></div> <div id="RowHeightSave" class="pb_hidden"></div>  <div class="wdgt-dropped" style="display:none;" data-this_col_id='+this_column+'></div> '+colEditBtn+'</div>');


        $('#'+rowID+'-'+this_column).mouseenter(function(ev){
          $(this).children('.editColumn').css('display','block');
          $(this).css('border','2px solid #2B87DA');
        });
        $('#'+rowID+'-'+this_column).mouseleave(function(){
          $('.editColBtnTop').css('display','none');
          $(this).css('border','none');
        });

        // Column Widgets
        var this_column_widgets = thisColumnModelData['colWidgets'];
        var this_column_widgets_array = _.values(this_column_widgets);

        var thisColFontsToLoad = [];

        for (var j = 0; j < this_column_widgets_array.length; j++) {
          this_column_widgets_array_C = this_column_widgets_array[j];
          var thisRenderredWidget = completeWidgetRender(this_column_widgets_array_C, j, this_column, rowID, thisColFontsToLoad);

          $('section[RowID="'+rowID+'"] '+'.'+this_column).append(thisRenderredWidget['RenderredWidgetHtmlDefault']);

          $('#'+rowID+'-'+this_column + ' .widget-Draggable').mouseenter(function(ev){
            
            $(this).children('.widgetHandle').css('display','block');
          });
          $('#'+rowID+'-'+this_column + ' .widget-Draggable').mouseleave(function(){ $('.widgetHandle').css('display','none'); });

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

        } // Widget Loop

        if (this_column_widgets_array.length == 0) {
        $('section[RowID="'+rowID+'"] '+'.'+this_column).append("<div class='editColumn emptyColumnIcon' style='background: #dadada;padding: 18px 4px 18px 0px;cursor: pointer;position: relative;margin: 2% auto 0px;text-align: center;max-width: 85px;border-radius: 10px;display: block;' data-col_id="+this_column+" data-overlay_id="+this_column+" title='Add Widgets'><span class='dashicons dashicons-plus' style='color:#fff; font-size:2em;' data-col_id="+this_column+" data-overlay_id="+this_column+"></span></div></div> <div id='WidthSave' class='pb_hidden'></div>");
        }

        thisColFontsToLoadSeparatedValue = 'Allerta';
        for(var w = 0; w < thisColFontsToLoad.length; w++){
          thisColFontsToLoadSeparatedNewValue = thisColFontsToLoad[w];

          if (thisColFontsToLoadSeparatedValue !== 'Select' || thisColFontsToLoadSeparatedValue !== 'Arial' || thisColFontsToLoadSeparatedValue !== 'Arial Black' || thisColFontsToLoadSeparatedValue !== 'sans-serif' || thisColFontsToLoadSeparatedValue !== 'Helvetica' || thisColFontsToLoadSeparatedValue !== 'Serif' || thisColFontsToLoadSeparatedValue !== 'Arial' || thisColFontsToLoadSeparatedValue !== 'Tahoma' || thisColFontsToLoadSeparatedValue !== 'Verdana' || thisColFontsToLoadSeparatedValue !== 'Monaco' || thisColFontsToLoadSeparatedValue !== 'select') {
            filteredFontFamilyName = '|' +thisColFontsToLoadSeparatedNewValue;
          }else{
            filteredFontFamilyName = '';
          }

          thisColFontsToLoadSeparatedValue = thisColFontsToLoadSeparatedValue + filteredFontFamilyName;
        }

        $('section[RowID="'+rowID+'"] '+'.'+this_column).append('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+thisColFontsToLoadSeparatedValue+'">');

        colControlsArray.push(colControls);

      } // column loop

      colControlsArrayAllValues = '';
      for(var w = 0; w < colControlsArray.length; w++){
          colControlsArraySeparatedNewValue = colControlsArray[w];

          colControlsArrayAllValues = colControlsArrayAllValues + '\n' +colControlsArraySeparatedNewValue;
        }

        $(this.el).append(colControlsArrayAllValues);


      if (rowColumns < 1) {
        rowWithNoColumnContainer = $('.rowWithNoColumnContainer').html();

        $(this.el).append(rowWithNoColumnContainer);

      }


      var pbContainer = $('#container');
      var pbWrapperWidth = $('#container').width();
      var prevDoppableBgColor = '';
        $('.column').droppable({
          accept: ".widget-Draggable",
          snap:'.column',
          drop: function(event,ui){
            //$(ui.draggable).click();
            // $(".widget-Draggable").trigger("dragstop");
            var curr_droppable = $(this).attr('id');
            $('.widgetDroppedAtIndex').val('');
            $('.isDroppedOnDroppable').val('true');
           $('#'+curr_droppable +' .wdgt-dropped').click();
          },
          over: function(){
            var curr_droppable = $(this).attr('id');
            prevDoppableBgColor = $('#'+curr_droppable).css('background');
            $(this).css('background','rgba(224, 241, 255, 0.85)');
          },
          out: function(){
            var curr_droppable = $(this).attr('id');
            $('#'+curr_droppable).css('background',prevDoppableBgColor);
          }

        } );

        $('.droppableBelowWidget').droppable({
          accept: ".widget-Draggable",
          snap:'.droppableBelowWidget',
          greedy: true,
          drop: function(event,ui){
            //$(ui.draggable).click();
            // $(".widget-Draggable").trigger("dragstop");
            var curr_droppable = $(this).attr('data-targetColId');
            var thisDroppableWidgetIndex = $(this).attr('data-widgetIndex');
            $('.widgetDroppedAtIndex').val(thisDroppableWidgetIndex);
              $('.isDroppedOnDroppable').val('true');

           $('#'+curr_droppable +' .wdgt-dropped').click();
          },
          over: function(){
            $(this).css('background','rgba(213, 249, 215, 0.85)');
          },
          out: function(){
            $(this).css('background','transparent');
          }

        } );

        var PbWrapperWidth = $('#container').width();
      $('.column').resizable({
        containment: '#container',
        handles: 'e,s',
        start: function (event, ui) {
          ui.element.css('min-height', 'auto');
          resizedAxis = ui.element.data('ui-resizable').axis;
          if (resizedAxis == 'e') {
            this.widthOfNextEl = ui.originalSize.width + ui.element.next().innerWidth();
            $(this).prepend('<div style="text-align:center; color:#fff; padding:5px;" id="thisElWidth"> '+$(this).width() +' </div>');

            $( ui.element.next() ).prepend('<div style="text-align:center; color:#fff; padding:5px;" id="nextElWidth"> '+$( ui.element.next() ).width() +' </div>');
          }
            
        },
        resize: function (event, ui) {
          resizedAxis = ui.element.data('ui-resizable').axis;
          if (resizedAxis == 'e') {
            var currentPbWrapperWidth = ui.element.parent().width();
            ui.element.next().width( (this.widthOfNextEl - ui.size.width) - 1 );
            ui.element.children('.overlay').width(ui.size.width);
            ui.element.next().children('.overlay').width(ui.element.next().width());

            $(this).children('#thisElWidth').html( Math.round(ui.element.outerWidth()/ currentPbWrapperWidth * 100) + '<span>%</span>'  );
            var nextElWidthOutput = ui.element.next().width()/ currentPbWrapperWidth * 100;
            ui.element.next().children('#nextElWidth').html( Math.round(nextElWidthOutput ) + '<span>%</span>' );
          }
          if (resizedAxis == 's') {

          }
            
        },
        stop: function(event, ui) {
          resizedAxis = ui.element.data('ui-resizable').axis;

          if (resizedAxis == 'e') {
            var currentPbWrapperWidth = ui.element.parent().width();
            var colPercentageWidth = ui.element.outerWidth()/ currentPbWrapperWidth * 100;
            ui.element.css('width', colPercentageWidth + '%');
            var nextCol = ui.element.next();
            var nextColPercentWidth= nextCol.outerWidth()/ currentPbWrapperWidth * 100;
            nextCol.css('width', nextColPercentWidth + '%');
            //console.log(currentPbWrapperWidth);
            ui.element.children('.overlay').css('width','100' + '%');
            ui.element.next().children('.overlay').css('width','100' + '%');
            var thisResizedColID = $(ui.element).attr('data-col_id');
            $('.currentResizedRowColTarget').val(thisResizedColID);
            nextResizedColID = thisResizedColID.replace(/\D/g,'');
            $('.currentResizedRowColTargetNext').val(nextResizedColID);
            $(ui.element).children('#WidthSave').trigger('click');
            
            var curreViewportS = $('.currentViewPortSize').val();

            if (curreViewportS == 'rbt-l') {
              $('.columnWidth').val(colPercentageWidth.toFixed(2));
            }
            if (curreViewportS == 'rbt-m') {
              $('.columnWidthTablet').val(colPercentageWidth.toFixed(2));
            }
            if (curreViewportS == 'rbt-s') {
              $('.columnWidthMobile').val(colPercentageWidth.toFixed(2));
            }

            $(this).children('#thisElWidth').remove();
            ui.element.next().children('#nextElWidth').remove();
          }
          if (resizedAxis == 's') {
            var currentPbWrapperHeight = $(window).height();
            var elHeight = ui.element.height();
            var colPercentageHeight = ui.element.height()/ currentPbWrapperHeight * 100;

            if (rowHeightUnit == 'px') {}
              ui.element.css('height', elHeight + 'px');

            if (curreViewportS == 'rbt-l') {
                ui.element.css('height', elHeight + 'px');
            }
            if (curreViewportS == 'rbt-m') {
                ui.element.css('height', elHeight + 'px');
            }
            if (curreViewportS == 'rbt-s') {
                ui.element.css('height', elHeight + 'px');
            }
            $('.currentResizedRowHeight').val(elHeight);

            $(ui.element).children('#RowHeightSave').trigger('click');

          }
            
        }
      });

      // Row and column buttons
      displayGButton = 'none';
      if (isGlobalRowActive == "true") {
        displayGButton = 'inline-block';
      }

      $(this.el).append('<div style=" display:block;clear:left;position: absolute;z-index:99;bottom: 4px;right: 5px; "><div id="rowDelete" class="row-btn btn-red btn" title="Delete Row" ><span class="dashicons dashicons-trash"></span></div> <div id="rowEdit" class="row-btn btn"  title="Edit Row"> <span class="dashicons dashicons-edit"></span></div> <div id="rowDuplicate" class="row-btn btn" title="Duplicate"> <span class="dashicons dashicons-admin-page"></span></div> <div id="setGlobalRow" style="background:#F0D53D;diplay:none;" class="row-btn btn globalRowBtn" title="Set Global"> <span class="dashicons dashicons-networking"></span></div> <div class="pbHandle row-btn btn" style="background: rgb(45, 60, 60) !important;"><span class="dashicons dashicons-move" title="Move"></span></div>    <div class="addNewRowSection row-btn btn" style="background:#2196f3 !important;"><span class="dashicons dashicons-plus" title="Add New Section"></span></div> </div>');
      
        $(this.el).append('<div class="newRowBtnContainer" >  <div class="newRowBtnContainerSections"> <div class="addNewRow  row-section-btn" style="background:#5AB1F7;" > ADD NEW SECTION</div> </div>      <div class="newRowBtnContainerSections" style="display:'+displayGButton+';">    <div class="addNewGlobalRow  row-section-btn" style="background:#F1D204; " > INSERT GLOBAL ROW</div> </div> <div class="newRowBtnContainerSections"  > <div class="addNewRowBlock  row-section-btn" style="background:#4CAF50; " > INSERT ROW BLOCK</div>   </div>  </div>   </div>');


        $('li[data-model-cid="'+rowCID+'"] .addNewRowSection').click( function(){

          $('li[data-model-cid="'+rowCID+'"] .newRowBtnContainer').css('display','block');
        } );

      $('li[data-model-cid="'+rowCID+'"]').mouseenter(function(){
        $('li[data-model-cid="'+rowCID+'"] .row-btn').css('display','block');

        if (isGlobalRowActive !== 'true') {
          $('.globalRowBtn').css('display','none');
        }

        if (thisPostType == 'ulpb_global_rows') {
          jQuery('.addNewRowSection').css('display','none');
          jQuery('#rowDuplicate').css('display','none');
          jQuery('#setGlobalRow').css('display','none');
        }
        
      });
      $('.row').mouseleave(function(){

       $('.row-btn').css('display','none');
       $('.newRowBtnContainer').css('display','none');
      });

      // Save the current model
      return this;
    },
    widgetDrag: function(ev){

      var this_row = $(ev.target).attr('data-widg_row_id');
      var this_column = $(ev.target).attr('data-wid_col_id');
      var this_widget = $(ev.target).attr('data-widget_id');
      var thisColumnData = this.model.get(this_column);
      //  console.log($(ev.target) );
      var this_column_widgets = thisColumnData['colWidgets'];
      var WidgetDraggedAttr = this_column_widgets[this_widget];

      $('.widgetDraggedRowId').val(this_row);
      $('.widgetDraggedColIndex').val(this_column);
      $('.widgetDraggedIndex').val(this_widget);

      /*
     this_column_widgets.splice(this_widget, 1);
      
      var thisColumnModelData = this.model.get(this_column);
        var this_column_widgets = thisColumnModelData['colWidgets'];
        var this_column_options = thisColumnModelData['columnOptions'];

        this.model.set({
          [this_column] : {
            colWidgets: this_column_widgets,
            columnOptions: this_column_options,
          }
        });
        */
      
      //$(this.el).html('');
      //$('.edit_column').slideUp();
      //$('#ulpb_column_controls').remove();

      
      jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
      
     // this.render();

      $('.draggedWidgetAttributes').val(JSON.stringify(WidgetDraggedAttr));
       thisColumnData = this.model.get(this_column);
      
    },
    widgetDropped: function(ev){

      var widgetDroppedAttributes = $('.draggedWidgetAttributes').val();
      var widgetDroppedAtIndex = $('.widgetDroppedAtIndex').val();
      var this_column = $(ev.target).attr('data-this_col_id');
      var thisColumnData = this.model.get(this_column);
      var this_column_widgets = thisColumnData['colWidgets'];
      if (widgetDroppedAttributes != '' && typeof(widgetDroppedAttributes) !='undefined' ) {
        if (this_column_widgets == 0) {
          this_column_widgets = [];
          this_column_widgets.push(JSON.parse(widgetDroppedAttributes) );
        } else if(typeof(this_column_widgets) == 'undefined' ) {
          this_column_widgets = [];
          this_column_widgets.push(JSON.parse(widgetDroppedAttributes) );
        } else{
            if (widgetDroppedAtIndex == '') {
              this_column_widgets.push(JSON.parse(widgetDroppedAttributes) );
            } else{
              this_column_widgets.splice(widgetDroppedAtIndex, 0, JSON.parse(widgetDroppedAttributes));
            }
          
         
         // this_column_widgets.push(JSON.parse(widgetDroppedAttributes) );
        }

        
      }

        $('.widgetDroppedRowId').val( this.model.get('rowID') );
        $('.widgetDroppedColIndex').val( this_column );
        $('.widgetDroppedIndex').val( widgetDroppedAtIndex );
        var dragged_widg_row = $('.widgetDraggedRowId').val();
        var dragged_widg_col = $('.widgetDraggedColIndex').val();
        var dragged_widg_widg = $('.widgetDraggedIndex').val();

        $(".draggedRemove_"+dragged_widg_row+"_"+dragged_widg_col+"_widg_"+dragged_widg_widg+" ").trigger('click');
      //  console.log(this_column_widgets);
      //console.log(WidgetDraggedAttr);
      
      //var widgets = pageBuilderApp.widgetList.toJSON();
      var thisColumnModelData = this.model.get(this_column);
        var this_column_options = thisColumnModelData['columnOptions'];

        this.model.set({
          [this_column] : {
            colWidgets: this_column_widgets,
            columnOptions: this_column_options,
          }
        });
      
      
        pageBuilderApp.widgetList.reset();
        pageBuilderApp.widgetList.add(this_column_widgets);

      $(this.el).html('');
      //$('.edit_column').slideUp();
      //$('#ulpb_column_controls').remove();
      this.render();
      jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
      $('.isChagesMade').val('true');
    },
    widgetDragRemove: function(ev){
      var droppedOnRow = $('.widgetDroppedRowId').val();
      var widgetDroppedColIndex = $('.widgetDroppedColIndex').val();
      var widgetDroppedIndex = $('.widgetDroppedIndex').val();
      var this_row = $('.widgetDraggedRowId').val();
      var this_column = $('.widgetDraggedColIndex').val();
      var this_widget = parseInt($('.widgetDraggedIndex').val() );
      

      var thisColumnData = this.model.get(this_column);
        
      var this_column_widgets = thisColumnData['colWidgets'];
      if (widgetDroppedIndex == '') {
        widgetDroppedIndex = this_widget;
      }
      if (droppedOnRow == this_row && widgetDroppedColIndex == this_column) {
        if (widgetDroppedIndex < this_widget ) {
          this_column_widgets.splice((this_widget+1), 1);
        }
        if (widgetDroppedIndex > this_widget) {
          if (this_widget != 0) {
            this_column_widgets.splice(this_widget, 1);
          }else{
            this_column_widgets.splice(this_widget, 1);
          }
        }
        if (widgetDroppedIndex == this_widget ) {
          this_column_widgets.splice(this_widget, 1);
        }
        
      }else{
        this_column_widgets.splice(this_widget, 1);
      }
      
      
      var thisColumnModelData = this.model.get(this_column);
        var this_column_widgets = thisColumnModelData['colWidgets'];
        var this_column_options = thisColumnModelData['columnOptions'];

        this.model.set({
          [this_column] : {
            colWidgets: this_column_widgets,
            columnOptions: this_column_options,
          }
        });

          $('.widgetDraggedRowId').val('');
          $('.widgetDraggedColIndex').val('');
          $('.widgetDraggedIndex').val('');
          $('.widgetDroppedRowId').val( '' );
          $('.widgetDroppedColIndex').val( '' );
          $('.widgetDroppedIndex').val('')
        $(this.el).html('');
        //$('.edit_column').slideUp();
        //$('#ulpb_column_controls').remove();
        this.render();
    },
    deleteWidget: function(ev){
      
      // var confDeletion = confirm('Do you want to delete this Widget ?');
      $('.popb_confirm_action_popup').css('display','block');

      $('.popb_confirm_subMessage').text("Do you want to delete this Widget ? Deleted Items can't be restored.");
        this_column = $(ev.target).attr('data-wid_col_id');
        this_widget = $(ev.target).attr('data-widget_id');
      $('.widgDeleteColIndex').val( this_column );
      $('.widgDeleteIndex').val( this_widget );

      var thatThis = this;

      $('.confirm_no').click(function(){
        $('.popb_confirm_action_popup').css('display','none');
        $('.widgDeleteColIndex').val('');
        $('.widgDeleteIndex').val('');
      });

      $('.confirm_yes').one('click',function(){
        var this_column = $('.widgDeleteColIndex').val();
        var this_widget = $('.widgDeleteIndex').val();
        if (this_column != '' && this_widget != '') {
          thatThis.deleteWidgetFromList();
        }else{
          $('.popb_confirm_action_popup').css('display','none');
          return;
        }
        $('.widgDeleteColIndex').val('');
        $('.widgDeleteIndex').val('');
        $('.popb_confirm_action_popup').css('display','none');
      });
      

    },
    deleteWidgetFromList: function(){

          var this_column = $('.widgDeleteColIndex').val();
          var this_widget = $('.widgDeleteIndex').val();
          if (this_column != '' && this_widget != '') {
            var thisColumnData = this.model.get(this_column);
            var this_column_widgets = thisColumnData['colWidgets'];
            var WidgetDraggedAttr = this_column_widgets[this_widget];
            this_column_widgets.splice(this_widget, 1);
            //console.log(this_column_widgets);
              var thisColumnModelData = this.model.get(this_column);
              var this_column_widgets = thisColumnModelData['colWidgets'];
              var this_column_options = thisColumnModelData['columnOptions'];

              this.model.set({
                [this_column] : {
                  colWidgets: this_column_widgets,
                  columnOptions: this_column_options,
                }
              });
              jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
            jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
            
            $(this.el).html('');
            this.render();
            
            $('.isChagesMade').val('true');
          }
          return;
    },
    duplicateWidget: function(ev){
      var this_column = $(ev.target).attr('data-wid_col_id');
      var this_widget = $(ev.target).attr('data-widget_id');
      var thisColumnData = this.model.get(this_column);
      var this_column_widgets = thisColumnData['colWidgets'];
      var WidgetDraggedAttr = jQuery.extend(true, {}, this_column_widgets[this_widget]);
      var currentItemIndex = this_column_widgets.indexOf(this_column_widgets[this_widget]);
     this_column_widgets.splice(currentItemIndex, 0, WidgetDraggedAttr);

      //  console.log(this_column_widgets);
      
      var thisColumnModelData = this.model.get(this_column);
        var this_column_widgets = thisColumnModelData['colWidgets'];
        var this_column_options = thisColumnModelData['columnOptions'];

        this.model.set({
          [this_column] : {
            colWidgets: this_column_widgets,
            columnOptions: this_column_options,
          }
        });
      
      jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
      pageBuilderApp.widgetList.reset();
      pageBuilderApp.widgetList.add(this_column_widgets);
      $(this.el).html('');
      this.render();
      $('.isChagesMade').val('true');
    },
    editWidget: function(ev){
      thisWidgetEl = $(ev.target );

      thisWidgetParentColID = thisWidgetEl.attr('data-parentwidgetid');
      thisWidgetIndex = parseInt( thisWidgetEl.attr('data-widget_id') );

      pageBuilderApp.currentlyEditedColId = thisWidgetParentColID;
      pageBuilderApp.currentlyEditedWidgId = thisWidgetIndex;
      pageBuilderApp.currentlyEditedThisCol = thisWidgetEl.attr('data-wid_col_id');
      pageBuilderApp.currentlyEditedThisRow = this.model.get('rowID');

      $('#'+thisWidgetParentColID).children('.editColumn').click();

      $('#widgets li:nth-child('+(thisWidgetIndex+1)+')').children().children('.wdt-edit-controls').children('#widgetEdit').click();



      $('.animateWidgetId').val(thisWidgetIndex);
      $('.pageops_modal').hide("slide", { direction: "left" }, 500);
      $('.insertRowBlock').hide("slide", { direction: "left" }, 500);
    },
    deleteRow: function(){

      $('.deleteRowIndex').val( this.model.get('rowID') );
      var thatThis = this;

      $('.popb_confirm_action_popup').css('display','block');

      $('.popb_confirm_subMessage').text("Do you want to delete this Row ? Deleted Items can't be restored.");

      $('.confirm_no').click(function(){
        $('.popb_confirm_action_popup').css('display','none');
        $('.deleteRowIndex').val('');
        return;
      });

      $('.confirm_yes').one('click',function(){
        var deleteRowIndex = $('.deleteRowIndex').val();
        thisRowIndex = thatThis.model.get('rowID');
        if (deleteRowIndex != '') {
          if (thisRowIndex == deleteRowIndex) {
            thatThis.model.destroy();
            $(thatThis.el).remove();
            $('.deleteRowIndex').val('');
          }
        }
        $('.edit_row').hide("slide", { direction: "left" }, 500);
        $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
        $('.pageops_modal').hide("slide", { direction: "left" }, 500);
        $('.insertRowBlock').hide("slide", { direction: "left" }, 500);
        $('.edit_column').hide("slide", { direction: "left" }, 500);
        $('.ulpb_row_controls').css('display','none');
        $('.popb_confirm_action_popup').css('display','none');
        return;
      });
      return;
    },
    EditRow: function(){
      $('.ulpb_column_controls').hide();
      $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      $('.pageops_modal').hide("slide", { direction: "left" }, 500);
      $('.edit_column').hide("slide", { direction: "left" }, 500);
      $('.insertRowBlock').hide("slide", { direction: "left" }, 500);

      var rowID = this.model.get('rowID');
      $('.currentEditingRow').val(rowID);
      var row_height = this.model.get('rowHeight');
      var row_height_unit = this.model.get('rowHeightUnit');
      var row_no_columns = this.model.get('columns');
      var rowData = this.model.get('rowData');
      var row_bg_img = rowData['bg_img'];
      var row_bg_color = rowData['bg_color'];

      var row_margin = rowData['margin'];
      var rowMarginTop = row_margin['rowMarginTop'];
      var rowMarginBottom = row_margin['rowMarginBottom'];
      var rowMarginLeft = row_margin['rowMarginLeft'];
      var rowMarginRight = row_margin['rowMarginRight'];

      var row_padding = rowData['padding'];
      var rowPaddingTop = row_padding['rowPaddingTop'];
      var rowPaddingBottom = row_padding['rowPaddingBottom'];
      var rowPaddingLeft = row_padding['rowPaddingLeft'];
      var rowPaddingRight = row_padding['rowPaddingRight'];

      var row_video = rowData['video'];
      if (typeof(row_video) != "undefined"){
        var rowBgVideoEnable = row_video['rowBgVideoEnable'];
        var rowBgVideoLoop = row_video['rowBgVideoLoop'];
        var rowVideoMpfour = row_video['rowVideoMpfour'];
        var rowVideoWebM = row_video['rowVideoWebM'];
        var rowVideoThumb = row_video['rowVideoThumb'];
      }

      if (typeof(rowData['rowGradient']) !== "undefined"){
        var rowGradient = rowData['rowGradient'];

        $.each(rowGradient, function(index,val){
          $('.'+index).val(val);

          if (index == 'rowGradientColorFirst') {
            $('.rowGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'rowGradientColorSecond') {
            $('.rowGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }

        });

        if (rowGradient['rowGradientType'] == 'linear') {
          $('.radialInput').css('display','none');
          $('.linearInput').css('display','block');
        } else if (rowGradient['rowGradientType'] == 'radial') {
          $('.radialInput').css('display','block');
          $('.linearInput').css('display','none');
        }

      }else{
        $('.rowGradientColorFirst').val('');
        $('.rowGradientLocationFirst').val('');
        $('.rowGradientColorSecond').val('');
        $('.rowGradientLocationSecond').val('');
        $('.rowGradientType').val('');
        $('.rowGradientPosition').val('');
        $('.rowGradientAngle').val('');
      }

      if (typeof(rowData['rowBackgroundType']) !== "undefined"){
        if (rowData['rowBackgroundType'] == 'solid') {
          $(".POPBInputNormalRow .rowBackgroundTypeSolid").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalRow .rowBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_1').css('display','block');
        }
        if (rowData['rowBackgroundType'] == 'gradient') {
          $(".rowBackgroundTypeGradient").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.rowBackgroundTypeGradient').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_2').css('display','block');
        }
      }else{
          $(".POPBInputNormalRow .rowBackgroundTypeSolid").prop("checked", true);
          $('.popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalRow .rowBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.popb_tab_content').css('display','none');
          $('.content_popb_tab_1').css('display','block');
      }

      if (typeof(rowData['rowHoverOptions']) !== "undefined") {
        var rowHoverOptions = rowData['rowHoverOptions'];

        if (rowHoverOptions['rowBgColorHover'] != '' || typeof(rowHoverOptions['rowBgColorHover']) != 'undefined' ) {
          $('.rowBgColorHover').val(rowHoverOptions['rowBgColorHover']);
          $('.rowBgColorHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',rowHoverOptions['rowBgColorHover']);
        }else{
          $('.rowBgColorHover').val('');
        }
        
        $('.rowHoverTransitionDuration').val(rowHoverOptions['rowHoverTransitionDuration']);
        
        if (rowHoverOptions['rowBackgroundTypeHover'] == 'solid') {
          $(".rowBackgroundTypeSolidHover").prop("checked", true);
          $('.POPBInputHoverRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.rowBackgroundTypeSolidHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHoverRow .popb_tab_content').css('display','none');
          $('.POPBInputHoverRow .content_popb_tab_1').css('display','block');
        }
        if (rowHoverOptions['rowBackgroundTypeHover'] == 'gradient') {
          $(".rowBackgroundTypeGradientHover").prop("checked", true);
          $('.POPBInputHoverRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.rowBackgroundTypeGradientHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHoverRow .popb_tab_content').css('display','none');
          $('.POPBInputHoverRow .content_popb_tab_2').css('display','block');
        }
        if (rowHoverOptions['rowBackgroundTypeHover'] == '' || typeof(rowHoverOptions['rowBackgroundTypeHover']) == 'undefined' ) {
          $(".rowBackgroundTypeSolidHover").prop("checked", false);
          $(".rowBackgroundTypeGradientHover").prop("checked", false);
          $('.POPBInputHoverRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
        }

        var rowGradientHover = rowHoverOptions['rowGradientHover'];
        $.each(rowGradientHover, function(index,val){
          $('.'+index).val(val);

          if (index == 'rowGradientColorFirstHover') {
            $('.rowGradientColorFirstHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'rowGradientColorSecondHover') {
            $('.rowGradientColorSecondHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
        });

        if (rowGradientHover['rowGradientTypeHover'] == 'linear') {
          $('.radialInputHover').css('display','none');
          $('.linearInputHover').css('display','block');
        } else if (rowGradientHover['rowGradientTypeHover'] == 'radial') {
          $('.radialInputHover').css('display','block');
          $('.linearInputHover').css('display','none');
        }

      }else{
        $('.rowBgColorHover').val('');
        $('.rowGradientColorFirstHover').val('');
        $('.rowGradientLocationFirstHover').val('');
        $('.rowGradientColorSecondHover').val('');
        $('.rowGradientLocationSecondHover').val('');
        $('.rowGradientTypeHover').val('');
        $('.rowGradientPositionHover').val('');
        $('.rowGradientAngleHover').val('');
        $(".rowBackgroundTypeSolidHover").prop("checked", false);
        $(".rowBackgroundTypeGradientHover").prop("checked", false);
      }


      if (typeof(rowData['rowBgOverlayColor']) !== "undefined"){
        $('.rowBgOverlayColor').val(rowData['rowBgOverlayColor']);
        $('.rowBgOverlayColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',rowData['rowBgOverlayColor']);
      }else{
        $('.rowBgOverlayColor').val('');
      }
      if (typeof(rowData['rowOverlayGradient']) !== "undefined"){
        var rowOverlayGradient = rowData['rowOverlayGradient'];

        $.each(rowOverlayGradient, function(index,val){
          $('.'+index).val(val);

          if (index == 'rowOverlayGradientColorFirst') {
            $('.rowOverlayGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'rowOverlayGradientColorSecond') {
            $('.rowOverlayGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }

        });

        if (rowOverlayGradient['rowOverlayGradientType'] == 'linear') {
          $('.radialInput').css('display','none');
          $('.linearInput').css('display','block');
        } else if (rowOverlayGradient['rowOverlayGradientType'] == 'radial') {
          $('.radialInput').css('display','block');
          $('.linearInput').css('display','none');
        }

      }else{
        $('.rowOverlayGradientColorFirst').val('');
        $('.rowOverlayGradientLocationFirst').val('');
        $('.rowOverlayGradientColorSecond').val('');
        $('.rowOverlayGradientLocationSecond').val('');
        $('.rowOverlayGradientType').val('');
        $('.rowOverlayGradientPosition').val('');
        $('.rowOverlayGradientAngle').val('');
      }

      if (typeof(rowData['rowOverlayBackgroundType']) !== "undefined"){
        if (rowData['rowOverlayBackgroundType'] == 'solid') {
          $(".POPBInputNormalRow .rowOverlayBackgroundTypeSolid").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalRow .rowOverlayBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_1').css('display','block');
        }
        if (rowData['rowOverlayBackgroundType'] == 'gradient') {
          $(".rowOverlayBackgroundTypeGradient").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.rowOverlayBackgroundTypeGradient').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_2').css('display','block');
        }
      }else{
          $(".POPBInputNormalRow .rowOverlayBackgroundTypeSolid").prop("checked", false);
          $(".POPBInputNormalRow .rowOverlayBackgroundTypeGradient").prop("checked", false);
          $('.popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.popb_tab_content').css('display','none');
          $('.content_popb_tab_1').css('display','block');
      }

      if (typeof(rowData['rowBackgroundParallax']) !== 'undefined') {
        if (rowData['rowBackgroundParallax'] == 'true') {
          $('.rowBackgroundParallax').val('true');
        }else{
          $('.rowBackgroundParallax').val('false');
        }
      }else{
        $('.rowBackgroundParallax').val('');
      }


      if (typeof(rowData['rowCustomClass']) !== "undefined"){
        $('.rowCustomClass').val(rowData['rowCustomClass']);
      }else{
        $('.rowCustomClass').val('');
      }

      if (typeof(rowData['rowHideOnDesktop']) !== "undefined"){
        $('.rowHideOnDesktop').val(rowData['rowHideOnDesktop']);
        $('.rowHideOnTablet').val(rowData['rowHideOnTablet']);
        $('.rowHideOnMobile').val(rowData['rowHideOnMobile']);
      }else{
        $('.rowHideOnDesktop').val('');
        $('.rowHideOnTablet').val('');
        $('.rowHideOnMobile').val('');
      }

      if (typeof(this.model.get('rowHeightTablet')) !== "undefined"){

        $('.rowHeightTablet').val(this.model.get('rowHeightTablet'));
        $('.rowHeightUnitTablet').val(this.model.get('rowHeightUnitTablet'));
        $('.rowHeightMobile').val(this.model.get('rowHeightMobile'));
        $('.rowHeightUnitMobile').val(this.model.get('rowHeightUnitMobile'));
      }else{
        $('.rowHeightTablet').val('');
        $('.rowHeightUnitTablet').val('');
        $('.rowHeightMobile').val('');
        $('.rowHeightUnitMobile').val('');
      }

      if (typeof(rowData['marginTablet']) !== "undefined"){
        var marginTablet = rowData['marginTablet'];
        $('.rowMarginTopTablet').val(marginTablet['rMTT']);
        $('.rowMarginBottomTablet').val(marginTablet['rMBT']);
        $('.rowMarginLeftTablet').val(marginTablet['rMLT']);
        $('.rowMarginRightTablet').val(marginTablet['rMRT']);
      }else{
        $('.rowMarginTopTablet').val('');
        $('.rowMarginBottomTablet').val('');
        $('.rowMarginLeftTablet').val('');
        $('.rowMarginRightTablet').val('');
      }

      if (typeof(rowData['marginMobile']) !== "undefined"){
        var marginMobile = rowData['marginMobile'];
        $('.rowMarginTopMobile').val(marginMobile['rMTM']);
        $('.rowMarginBottomMobile').val(marginMobile['rMBM']);
        $('.rowMarginLeftMobile').val(marginMobile['rMLM']);
        $('.rowMarginRightMobile').val(marginMobile['rMRM']);
      } else{
        $('.rowMarginTopMobile').val('');
        $('.rowMarginBottomMobile').val('');
        $('.rowMarginLeftMobile').val('');
        $('.rowMarginRightMobile').val('');
      }

      if (typeof(rowData['paddingTablet']) !== "undefined"){
        var paddingTablet = rowData['paddingTablet'];
        $('.rowPaddingTopTablet').val(paddingTablet['rPTT']);
        $('.rowPaddingBottomTablet').val(paddingTablet['rPBT']);
        $('.rowPaddingLeftTablet').val(paddingTablet['rPLT']);
        $('.rowPaddingRightTablet').val(paddingTablet['rPRT']);
      } else{
        $('.rowPaddingTopTablet').val(' ');
        $('.rowPaddingBottomTablet').val(' ');
        $('.rowPaddingLeftTablet').val(' ');
        $('.rowPaddingRightTablet').val(' ');
      }

      if (typeof(rowData['paddingMobile']) !== "undefined"){
        var paddingMobile = rowData['paddingMobile'];
        $('.rowPaddingTopMobile').val(paddingMobile['rPTM']);
        $('.rowPaddingBottomMobile').val(paddingMobile['rPBM']);
        $('.rowPaddingLeftMobile').val(paddingMobile['rPLM']);
        $('.rowPaddingRightMobile').val(paddingMobile['rPRM']);
      } else{
        $('.rowPaddingTopMobile').val('');
        $('.rowPaddingBottomMobile').val('');
        $('.rowPaddingLeftMobile').val('');
        $('.rowPaddingRightMobile').val('');
      }

      var customStyling = rowData['customStyling'];
      var customJS = rowData['customJS'];

      $('#row_height').val(row_height);
      $('.row_height_unit').val(row_height_unit);
      $('#number_of_columns').val(row_no_columns);
      $('.rowBgImg').val(row_bg_img);
      $('.rowBgColor').val(row_bg_color);
      $('.rowMarginTop').val(rowMarginTop);
      $('.rowMarginBottom').val(rowMarginBottom);
      $('.rowMarginLeft').val(rowMarginLeft);
      $('.rowMarginRight').val(rowMarginRight);
      $('.rowPaddingTop').val(rowPaddingTop);
      $('.rowPaddingBottom').val(rowPaddingBottom);
      $('.rowPaddingLeft').val(rowPaddingLeft);
      $('.rowPaddingRight').val(rowPaddingRight);
      $('.rowCustomStyling').val(customStyling);
      $('.rowCustomJS').val(customJS);

      if (customJS !== '') {
        PbaceEditorJS.setValue(customJS);
      } else {
        PbaceEditorJS.setValue('/* Add your custom Javascript here.*/');
      }

      if (customStyling !== '') {
        PbaceEditorCSS.setValue(customStyling);
      } else {
        PbaceEditorCSS.setValue('/* Insert your custom CSS for this row here. */');
      }

      $('.rowBgVideoEnable').val(rowBgVideoEnable);
      $('.rowBgVideoLoop').val(rowBgVideoLoop);
      $('.rowVideoMpfour').val(rowVideoMpfour);
      $('.rowVideoWebM').val(rowVideoWebM);
      $('.rowVideoThumb').val(rowVideoThumb);

      $('.rowBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',row_bg_color);
      //$('.wp-picker-container').css('margin-left','24%');

      $('.edit_options_right').append('<div class="column rules"></div>');

      
        $('.color-picker_btn_two').iris('hide');
        CPtopParent = $('.color-picker_btn_two').parent().parent().parent();
        $('.color-picker_btn_two').css('display','block');
        $('.color-picker_btn_two').parent().parent().addClass('hidden');
        $(CPtopParent).removeClass( 'wp-picker-active');
        $(CPtopParent).children('.wp-color-result').removeClass( 'wp-picker-open');

      $('.edit_row').show("slide", { direction: "left" }, 500);
      jQuery('section[rowid="'+rowID+'"]').children('#ulpb_row_controls').show();
      $('#edit_form_close').live('click',function(){
        $('.edit_row').hide("slide", { direction: "left" }, 500);
        $('#ulpb_row_controls').hide();
      });
    },
    updateRow: function(){

      var rowheight = $('#row_height').val();
      var rowHeightUnit = $('.row_height_unit').val();
      var numberComlumns = $('#number_of_columns').val();
      var rowBgImg = $('.rowBgImg').val();
      var rowBgColor = $('.rowBgColor').val();
      var rowMargin = $('.rowMargin').val();
      var customJS = PbaceEditorJS.getValue();
      var customStyling = PbaceEditorCSS.getValue(customStyling);

      var rowMarginTop      =   $('.rowMarginTop').val();
      var rowMarginBottom   =   $('.rowMarginBottom').val();
      var rowMarginLeft     =   $('.rowMarginLeft').val();
      var rowMarginRight    =   $('.rowMarginRight').val();
      var rowPaddingTop     =   $('.rowPaddingTop').val();
      var rowPaddingBottom  =   $('.rowPaddingBottom').val();
      var rowPaddingLeft    =   $('.rowPaddingLeft').val();
      var rowPaddingRight   =   $('.rowPaddingRight').val();

      var rowBgVideoEnable   =   $('.rowBgVideoEnable').val();
      var rowBgVideoLoop     =   $('.rowBgVideoLoop').val();
      var rowVideoMpfour     =   $('.rowVideoMpfour').val();
      var rowVideoWebM       =   $('.rowVideoWebM').val();
      var rowVideoThumb       =   $('.rowVideoThumb').val();

      var rowMargin = {
        rowMarginTop: rowMarginTop,
        rowMarginBottom: rowMarginBottom,
        rowMarginLeft: rowMarginLeft,
        rowMarginRight: rowMarginRight,
      };

      var rowMarginTablet = {
        rMTT:$('.rowMarginTopTablet').val(),
        rMBT:$('.rowMarginBottomTablet').val(),
        rMLT:$('.rowMarginLeftTablet').val(),
        rMRT:$('.rowMarginRightTablet').val(),
      };

      var rowMarginMobile = {
        rMTM:$('.rowMarginTopMobile').val(),
        rMBM:$('.rowMarginBottomMobile').val(),
        rMLM:$('.rowMarginLeftMobile').val(),
        rMRM:$('.rowMarginRightMobile').val(),
      };

      var rowPadding = {
        rowPaddingTop: rowPaddingTop,
        rowPaddingBottom: rowPaddingBottom,
        rowPaddingLeft: rowPaddingLeft,
        rowPaddingRight: rowPaddingRight,
      };

      var rowPaddingTablet = {
        rPTT:$('.rowPaddingTopTablet').val(),
        rPBT:$('.rowPaddingBottomTablet').val(),
        rPLT:$('.rowPaddingLeftTablet').val(),
        rPRT:$('.rowPaddingRightTablet').val(),
      };

      var rowPaddingMobile = {
        rPTM:$('.rowPaddingTopMobile').val(),
        rPBM:$('.rowPaddingBottomMobile').val(),
        rPLM:$('.rowPaddingLeftMobile').val(),
        rPRM:$('.rowPaddingRightMobile').val(),
      };

      var rowVideo = {
        rowBgVideoEnable: rowBgVideoEnable,
        rowBgVideoLoop: rowBgVideoLoop,
        rowVideoMpfour: rowVideoMpfour,
        rowVideoWebM: rowVideoWebM,
        rowVideoThumb: rowVideoThumb,
      };

      var rowHoverOptions = {
        rowBgColorHover:$('.rowBgColorHover').val(),
        rowBackgroundTypeHover:$('.rowBackgroundTypeHover:checked').val(),
        rowHoverTransitionDuration:$('.rowHoverTransitionDuration').val(),
        rowGradientHover:{
          rowGradientColorFirstHover: $('.rowGradientColorFirstHover').val(),
          rowGradientLocationFirstHover:$('.rowGradientLocationFirstHover').val(),
          rowGradientColorSecondHover:$('.rowGradientColorSecondHover').val(),
          rowGradientLocationSecondHover:$('.rowGradientLocationSecondHover').val(),
          rowGradientTypeHover:$('.rowGradientTypeHover').val(),
          rowGradientPositionHover:$('.rowGradientPositionHover').val(),
          rowGradientAngleHover:$('.rowGradientAngleHover').val(),
        }
      }

      var rowBackgroundType = $('.rowBackgroundType:checked').val();
      var rowOverlayBackgroundType = $('.rowOverlayBackgroundType:checked').val();
      if (rowheight) {
        this.model.set({
          rowHeight: rowheight,
          rowHeightUnit:rowHeightUnit,
          rowHeightTablet: $('.rowHeightTablet').val(),
          rowHeightUnitTablet:$('.rowHeightUnitTablet').val(),
          rowHeightMobile: $('.rowHeightMobile').val(),
          rowHeightUnitMobile:$('.rowHeightUnitMobile').val(),
          columns: numberComlumns,
          rowData: {
            rowCustomClass: $('.rowCustomClass').val(),
            bg_color: rowBgColor,
            bg_img: rowBgImg,
            margin: rowMargin,
            marginTablet: rowMarginTablet,
            marginMobile: rowMarginMobile,
            padding:rowPadding,
            paddingTablet: rowPaddingTablet,
            paddingMobile: rowPaddingMobile,
            video: rowVideo,
            customStyling: customStyling,
            customJS: customJS,
            rowBackgroundType:rowBackgroundType,
            rowBackgroundParallax:$('.rowBackgroundParallax').val(),
            rowGradient:{
              rowGradientColorFirst: $('.rowGradientColorFirst').val(),
              rowGradientLocationFirst:$('.rowGradientLocationFirst').val(),
              rowGradientColorSecond:$('.rowGradientColorSecond').val(),
              rowGradientLocationSecond:$('.rowGradientLocationSecond').val(),
              rowGradientType:$('.rowGradientType').val(),
              rowGradientPosition:$('.rowGradientPosition').val(),
              rowGradientAngle:$('.rowGradientAngle').val(),
            },
            rowHoverOptions: rowHoverOptions,
            rowOverlayBackgroundType: rowOverlayBackgroundType,
            rowOverlayGradient:{
              rowOverlayGradientColorFirst: $('.rowOverlayGradientColorFirst').val(),
              rowOverlayGradientLocationFirst:$('.rowOverlayGradientLocationFirst').val(),
              rowOverlayGradientColorSecond:$('.rowOverlayGradientColorSecond').val(),
              rowOverlayGradientLocationSecond:$('.rowOverlayGradientLocationSecond').val(),
              rowOverlayGradientType:$('.rowOverlayGradientType').val(),
              rowOverlayGradientPosition:$('.rowOverlayGradientPosition').val(),
              rowOverlayGradientAngle:$('.rowOverlayGradientAngle').val(),
            },
            rowBgOverlayColor:$('.rowBgOverlayColor').val(),
            rowHideOnDesktop:$('.rowHideOnDesktop').val(),
            rowHideOnTablet:$('.rowHideOnTablet').val(),
            rowHideOnMobile:$('.rowHideOnMobile').val(),
          }
        });
      }
      
      rowID = this.model.get('rowID');
      rowCID = this.model.cid;
      rowColumns = this.model.get('columns');
      rowHeightUnit = this.model.get('rowHeightUnit');
      rowData = this.model.get('rowData');
      rowHeightTablet = this.model.get('rowHeightTablet');
      rowHeightUnitTablet = this.model.get('rowHeightUnitTablet');
      rowHeightMobile = this.model.get('rowHeightMobile');
      rowHeightUnitMobile = this.model.get('rowHeightUnitMobile');
      
      rowOptionsRender(rowID,rowCID,rowColumns,rowHeightUnit,rowData, rowHeightTablet,rowHeightUnitTablet,rowHeightMobile,rowHeightUnitMobile);
      
      $('.isChagesMade').val('true');
      jQuery('section[rowid="'+rowID+'"]').children('#ulpb_row_controls').show();
    },
    setGlobalRow: function(){

      if (isGlobalRowActive !== 'true') {
          alert('Global Row Extension is not active.');
        }else{
          var askGlobalRowName = prompt('Name of the row ?');
          var globalRowAttrToSet  = this.model.attributes;

          if (askGlobalRowName != null) {
            if (askGlobalRowName == '') {
              askGlobalRowName = "Global Row";
            }
            var ifIsGlobal = this.model.get('globalRow');

            if (typeof(ifIsGlobal) != 'undefined') {
            } else {

              var retrievedPostID = sendGlobalRowDataToDb(globalRowAttrToSet,askGlobalRowName);

                this.model.set({
                  globalRow:{
                    isGlobalRow: true,
                    globalRowPid: $('.globalRowRetrievedPostID').val()
                  }
                });
                
            } 
            $('.isChagesMade').val('true');
            $(this.el).html('');
            this.render();
          }
        }

    },
    DuplicateRow: function(){
      newRowModel = this.model.clone();
      var modelIndex = pageBuilderApp.rowList.indexOf(this.model);
      newRowModel.set({
        rowID: 'ulpb_Row'+Math.floor((Math.random() * 200000) + 100),
        globalRow: 'unset'
      });
      newRowModel.unset('globalRow');
      var stuffedModel = JSON.stringify(newRowModel.attributes);
      var unStuffedModel = JSON.parse(stuffedModel);
      pageBuilderApp.rowList.add(unStuffedModel, {at: modelIndex+1} );
      $('.isChagesMade').val('true');
      $(this.el).html('');
      this.render();
    },
    addNewRow: function(){
      var modelIndex = pageBuilderApp.rowList.indexOf(this.model);

      pageBuilderApp.rowList.add({
      rowID: 'ulpb_Row'+Math.floor((Math.random() * 200000) + 100),
      rowHeight: 100,
      columns: 0,
      rowData: {
          rowCustomClass:'',
          bg_color: 'transparent',
          bg_img: '',
          margin: {
            rowMarginTop: 0,
            rowMarginBottom: 0,
            rowMarginLeft: 0,
            rowMarginRight: 0,
          },
          marginTablet:{
            rMTT:'',
            rMBT:'',
            rMLT:'',
            rMRT:'',
          },
          marginMobile:{
            rMTM:'',
            rMBM:'',
            rMLM:'',
            rMRM:'',
          },
          padding:{
            rowPaddingTop: 0,
            rowPaddingBottom: 0,
            rowPaddingLeft: 0,
            rowPaddingRight: 0,
          },
          paddingTablet:{
            rPTT:'',
            rPBT:'',
            rPLT:'',
            rPRT:'',
          },
          paddingMobile:{
            rPTM:'',
            rPBM:'',
            rPLM:'',
            rPRM:'',
          },
          video:{
            rowBgVideoEnable: 'false',
            rowBgVideoLoop: 'loop',
            rowVideoMpfour: ' ',
            rowVideoWebM: ' ',
            rowVideoThumb: ' ',
          },
          customStyling: '',
          customJS: ' ',
          rowBackgroundType:'solid',
          rowGradient:{
            rowGradientColorFirst: '#dd9933',
            rowGradientLocationFirst:'40',
            rowGradientColorSecond:'#eeee22',
            rowGradientLocationSecond:'60',
            rowGradientType:'linear',
            rowGradientPosition:'top left',
            rowGradientAngle:'135',
          }
        } }, {at: modelIndex+1} );
      $('.isChagesMade').val('true');
    },
    addNewRowBlock: function(ev){
      var modelIndex = pageBuilderApp.rowList.indexOf(this.model);
      $('.insertRowBlockAtIndex').val(modelIndex);

      $('.ulpb_column_controls').hide();
      $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      $('.pageops_modal').hide("slide", { direction: "left" }, 500);
      $('.edit_column').hide("slide", { direction: "left" }, 500);

      $('.insertRowBlock').show("slide", { direction: "left" }, 500);
    },
    addNewGlobalRow: function(){
      var modelIndex = pageBuilderApp.rowList.indexOf(this.model);
      
      $('.insert_Global_row').show("slide", { direction: "left" }, 500);
        
      $('.addNewGlobalRowClosebutton').one('click',function(){
                $('.globalRowRetrievedAttributes').val('');
                selectGlobalRowToInsert = $('.selectGlobalRowToInsert').val();

                if (selectGlobalRowToInsert != '') {
                  getGlobalRowDataFromDb(selectGlobalRowToInsert);
                }
                
                retrievedGlobalRowAttributes = $('.globalRowRetrievedAttributes').val();
                
                if (retrievedGlobalRowAttributes != '') {
                  pageBuilderApp.rowList.add(  JSON.parse(retrievedGlobalRowAttributes), {at: modelIndex+1} );
                }

          $('.insert_Global_row').hide("slide", { direction: "left" }, 500);
      });
      $('.isChagesMade').val('true');
    },
    EditColumn: function(ev){

      $('.pbSearchWidget').val('');
      jQuery('.widget').show();
      $('.checkIfWidgetsAreLoadedInColumn').val('false');
      $('.columnWidgetPopup, .edit_row').hide("slide", { direction: "left" }, 500);
      $('.ulpb_row_controls, .edit_row').hide("slide", { direction: "left" }, 500);
      $('.pageops_modal').hide("slide", { direction: "left" }, 500);
      $('.insertRowBlock').hide("slide", { direction: "left" }, 500);

      var this_column = $(ev.target).attr('data-col_id');
      var rowID = this.model.get('rowID');
      $('.ColcurrentEditableRowID').val(rowID);
      $('.currentEditableColId').val(this_column);
      var pbWrapperWidth = $('section[RowID="'+rowID+'"]').width();
      var thisColumnData = this.model.get(this_column);
      var this_column_widgets = thisColumnData['colWidgets'];
      var this_column_content = thisColumnData['columnContent'];
      var this_column_type = thisColumnData['columnType'];
      var this_column_options = thisColumnData['columnOptions'];
      var this_column_bg_color = this_column_options['bg_color'];
      var this_column_width = this_column_options['width'];
      var columnCSS = this_column_options['columnCSS'];
      var this_column_margin = this_column_options['margin'];
      var columnMarginTop = this_column_margin['columnMarginTop'];
      var columnMarginBottom = this_column_margin['columnMarginBottom'];
      var columnMarginLeft = this_column_margin['columnMarginLeft'];
      var columnMarginRight = this_column_margin['columnMarginRight'];

      var this_column_padding = this_column_options['padding'];
      var columnPaddingTop = this_column_padding['columnPaddingTop'];
      var columnPaddingBottom = this_column_padding['columnPaddingBottom'];
      var columnPaddingLeft = this_column_padding['columnPaddingLeft'];
      var columnPaddingRight = this_column_padding['columnPaddingRight'];
      
      var colWidth = $('section[RowID="'+rowID+'"]'+' .'+this_column).width();
      var colWidthPercentage  = ( (colWidth/pbWrapperWidth) * 100);
      colWidthPercentage = colWidthPercentage.toFixed(2);
      $('#columnBgColor').val(this_column_bg_color);
      $('#columnMargin').val(this_column_margin);
      $('#columnPadding').val(this_column_padding);
      $('#columnWidth').val(this_column_width);
      $('.widget-type-field').val(this_column_type);

      $('#columnBgColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',this_column_bg_color);

      if (typeof(this_column_options['columnCSS']) == 'undefined') { columnCSS = '/* Add your custom CSS for this column here.*/'}
      $('.columnCustomStyling').val(columnCSS);
      if (columnCSS !== '') {
        PbColaceEditorCSS.setValue(columnCSS);
      } else {
        PbColaceEditorCSS.setValue('/* Add your custom CSS for this column here.*/');

      }

      $('.columnMarginTop').val(columnMarginTop);
      $('.columnMarginBottom').val(columnMarginBottom);
      $('.columnMarginLeft').val(columnMarginLeft);
      $('.columnMarginRight').val(columnMarginRight);
      $('.columnPaddingTop').val(columnPaddingTop);
      $('.columnPaddingBottom').val(columnPaddingBottom);
      $('.columnPaddingLeft').val(columnPaddingLeft);
      $('.columnPaddingRight').val(columnPaddingRight);

      if (typeof(this_column_options['columnCustomClass']) !== 'undefined') {
        $('.columnCustomClass').val(this_column_options['columnCustomClass']);
      }else{
        $('.columnCustomClass').val('');
      }

      if (typeof(this_column_options['colHideOnDesktop']) !== 'undefined') {
        $('.colHideOnDesktop').val(this_column_options['colHideOnDesktop']);
        $('.colHideOnTablet').val(this_column_options['colHideOnTablet']);
        $('.colHideOnMobile').val(this_column_options['colHideOnMobile']);
      }else{
        $('.colHideOnDesktop').val('');
        $('.colHideOnTablet').val('');
        $('.colHideOnMobile').val('');
      }

      if (typeof(this_column_options['colBoxShadow']) !== 'undefined') {
        colBoxShadow = this_column_options['colBoxShadow'];
        $('.colBoxShadowH').val(colBoxShadow['colBoxShadowH']);
        $('.colBoxShadowV').val(colBoxShadow['colBoxShadowV']);
        $('.colBoxShadowBlur').val(colBoxShadow['colBoxShadowBlur']);
        $('.colBoxShadowColor').val(colBoxShadow['colBoxShadowColor']);
      }else{
        $('.colBoxShadowH').val('');
        $('.colBoxShadowV').val('');
        $('.colBoxShadowBlur').val('');
        $('.colBoxShadowColor').val('');
      }

      if (typeof(this_column_options['colBorder']) !== 'undefined') {
        colBorder = this_column_options['colBorder'];
        $('.colBorderWidth').val(colBorder['colBorderWidth']);
        $('.colBorderStyle').val(colBorder['colBorderStyle']);
        $('.colBorderColor').val(colBorder['colBorderColor']);
        $('.colBorderRadius').val(colBorder['colBorderRadius']);
      }else{
        $('.colBorderWidth').val('');
        $('.colBorderStyle').val('');
        $('.colBorderColor').val('');
        $('.colBorderRadius').val('');
      }

      if (typeof(this_column_options['paddingTablet']) !== 'undefined'){
        colMarginTablet = this_column_options['marginTablet'];
        colPaddingTablet = this_column_options['paddingTablet'];

        colMarginMobile = this_column_options['marginMobile'];
        colPaddingMobile = this_column_options['paddingMobile'];

        $('.columnWidthTablet').val(this_column_options['widthTablet']);
        $('.columnWidthMobile').val(this_column_options['widthMobile']);

        $('.columnMarginTopTablet').val(colMarginTablet['rMTT']);
        $('.columnMarginBottomTablet').val(colMarginTablet['rMBT']);
        $('.columnMarginLeftTablet').val(colMarginTablet['rMLT']);
        $('.columnMarginRightTablet').val(colMarginTablet['rMRT']);

        $('.columnPaddingTopTablet').val(colPaddingTablet['rPTT']);
        $('.columnPaddingBottomTablet').val(colPaddingTablet['rPBT']);
        $('.columnPaddingLeftTablet').val(colPaddingTablet['rPLT']);
        $('.columnPaddingRightTablet').val(colPaddingTablet['rPRT']);

        $('.columnMarginTopMobile').val(colMarginMobile['rMTM']);
        $('.columnMarginBottomMobile').val(colMarginMobile['rMBM']);
        $('.columnMarginLeftMobile').val(colMarginMobile['rMLM']);
        $('.columnMarginRightMobile').val(colMarginMobile['rMRM']);

        $('.columnPaddingTopMobile').val(colPaddingMobile['rPTM']);
        $('.columnPaddingBottomMobile').val(colPaddingMobile['rPBM']);
        $('.columnPaddingLeftMobile').val(colPaddingMobile['rPLM']);
        $('.columnPaddingRightMobile').val(colPaddingMobile['rPRM']);

      } else{
        $('.columnWidthTablet').val('');
        $('.columnWidthMobile').val('');

        $('.columnMarginTopTablet').val('');
        $('.columnMarginBottomTablet').val('');
        $('.columnMarginLeftTablet').val('');
        $('.columnMarginRightTablet').val('');

        $('.columnPaddingTopTablet').val('');
        $('.columnPaddingBottomTablet').val('');
        $('.columnPaddingLeftTablet').val('');
        $('.columnPaddingRightTablet').val('');

        $('.columnMarginTopMobile').val('');
        $('.columnMarginBottomMobile').val('');
        $('.columnMarginLeftMobile').val('');
        $('.columnMarginRightMobile').val('');

        $('.columnPaddingTopMobile').val('');
        $('.columnPaddingBottomMobile').val('');
        $('.columnPaddingLeftMobile').val('');
        $('.columnPaddingRightMobile').val('');
      }

      if (typeof(this_column_options['colBgImg']) !== "undefined"){
        $('.colBgImg').val(this_column_options['colBgImg']);
      }else{
        $('.colBgImg').val('');
      }

      if (typeof(this_column_options['colGradient']) !== "undefined"){
        var colGradient = this_column_options['colGradient'];

        $.each(colGradient, function(index,val){
          $('.'+index).val(val);

          if (index == 'colGradientColorFirst') {
            $('.colGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'colGradientColorSecond') {
            $('.colGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }

        });

        if (colGradient['colGradientType'] == 'linear') {
          $('.radialInput').css('display','none');
          $('.linearInput').css('display','block');
        } else if (colGradient['colGradientType'] == 'radial') {
          $('.radialInput').css('display','block');
          $('.linearInput').css('display','none');
        }

      }else{
        $('.colGradientColorFirst').val('');
        $('.colGradientLocationFirst').val('');
        $('.colGradientColorSecond').val('');
        $('.colGradientLocationSecond').val('');
        $('.colGradientType').val('');
        $('.colGradientPosition').val('');
        $('.colGradientAngle').val('');
      }



      if (typeof(this_column_options['colBackgroundType']) !== "undefined"){
        if (this_column_options['colBackgroundType'] == 'solid') {
          $(".POPBInputNormalRow .colBackgroundTypeSolid").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalRow .colBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_1').css('display','block');
        }
        if (this_column_options['colBackgroundType'] == 'gradient') {
          $(".colBackgroundTypeGradient").prop("checked", true);
          $('.POPBInputNormalRow .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.colBackgroundTypeGradient').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputNormalRow .popb_tab_content').css('display','none');
          $('.POPBInputNormalRow .content_popb_tab_2').css('display','block');
        }
      }else{
          $(".POPBInputNormalRow .colBackgroundTypeSolid").prop("checked", true);
          $('.popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.POPBInputNormalRow .colBackgroundTypeSolid').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.popb_tab_content').css('display','none');
          $('.content_popb_tab_1').css('display','block');
      }



      if (typeof(this_column_options['colHoverOptions']) !== "undefined") {
        var colHoverOptions = this_column_options['colHoverOptions'];
        if (colHoverOptions['colBgColorHover'] != '') {
          $('.colBgColorHover').val(colHoverOptions['colBgColorHover']);
          $('.colBgColorHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',colHoverOptions['colBgColorHover']);
        }else{
          $('.colBgColorHover').val('');
        }

        $('.colHoverTransitionDuration').val(colHoverOptions['colHoverTransitionDuration']);

        

        if (colHoverOptions['colBackgroundTypeHover'] == 'solid') {
          $(".colBackgroundTypeSolidHover").prop("checked", true);
          $(".colBackgroundTypeGradientHover").prop("checked", false);
          $('.POPBInputHovercol .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.colBackgroundTypeSolidHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHovercol .popb_tab_content').css('display','none');
          $('.POPBInputHovercol .content_popb_tab_1').css('display','block');
        }
        if (colHoverOptions['colBackgroundTypeHover'] == 'gradient') {
          $(".colBackgroundTypeGradientHover").prop("checked", true);
          $(".colBackgroundTypeSolidHover").prop("checked", false);
          $('.POPBInputHovercol .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
          $('.colBackgroundTypeGradientHover').prev('label').css({'background':'#a5a5a5', 'color':'#fff'});
          $('.POPBInputHovercol .popb_tab_content').css('display','none');
          $('.POPBInputHovercol .content_popb_tab_2').css('display','block');
        }
        if (colHoverOptions['colBackgroundTypeHover'] == '' || typeof(colHoverOptions['colBackgroundTypeHover']) == 'undefined' ) {
          $(".colBackgroundTypeSolidHover").prop("checked", false);
          $(".colBackgroundTypeGradientHover").prop("checked", false);
          $('.POPBInputHovercol .popbNavItem label').css({'background':'#f1f1f1', 'color':'#333'});
        }

        var colGradientHover = colHoverOptions['colGradientHover'];
        $.each(colGradientHover, function(index,val){
          $('.'+index).val(val);

          if (index == 'colGradientColorFirstHover') {
            $('.colGradientColorFirstHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
          if (index == 'colGradientColorSecondHover') {
            $('.colGradientColorSecondHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background',val);
          }
        });

        if (colGradientHover['colGradientTypeHover'] == 'linear') {
          $('.radialInputHover').css('display','none');
          $('.linearInputHover').css('display','block');
        } else if (colGradientHover['colGradientTypeHover'] == 'radial') {
          $('.radialInputHover').css('display','block');
          $('.linearInputHover').css('display','none');
        }

      }else{
        $('.colBgColorHover').val('');
        $('.colHoverTransitionDuration').val('');
        $('.colGradientColorFirstHover').val('');
        $('.colGradientLocationFirstHover').val('');
        $('.colGradientColorSecondHover').val('');
        $('.colGradientLocationSecondHover').val('');
        $('.colGradientTypeHover').val('');
        $('.colGradientPositionHover').val('');
        $('.colGradientAngleHover').val('');
      }







      $('.columnBgColor').css('background-color',this_column_bg_color);
      $('.columnBgColor').parent().siblings('.wp-color-result').children().css('background-color',this_column_bg_color);
      

      pageBuilderApp.widgetList.reset();
      if (this_column_widgets) {
        pageBuilderApp.widgetList.add(this_column_widgets);

        $('.wdt-droppable').droppable({
        accept: ".widget",
        drop: function(event,ui){
          var type = ui.draggable.data('type');
          var curr_droppable = $(this).attr('data-widgetid');
          $('input[data-widgetType-id="'+curr_droppable+'"]').val(type);
          switch(type){
            case 'wigt-WYSIWYG': var texta = "HTML Editor"; break;
            case 'wigt-img': var texta = "Image Widget"; break;
            case 'wigt-menu': var texta = "Menu Widget"; break;
            case 'wigt-slider': var texta = "Slider Extension"; break;
            case 'wigt-smuzform': var texta = "Form Extension"; break;
            case 'wigt-btn-gen': var texta = "Button Generator Extension"; break;
            default : var texta = 'No widget or extension'; break;
          }


          $('.widget-area-'+curr_droppable).html(texta+ ' is selected <br> To edit click the green button below. <br> To change widget just drop any other widget here.');

          $('.editWidget-'+curr_droppable).trigger('click');
        }
       });
        }

        $('.checkIfWidgetsAreLoadedInColumn').val('true');
        
        jQuery('.edit_column').show("slide", { direction: "left" }, 500);
        var rowID = this.model.get('rowID');
        jQuery('section[rowid="'+rowID+'"]').children('.ulpb_column_controls'+this_column).show();
        $('#edit_form_closeCol').click(function(){
          jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
          $('.ulpb_column_controls').hide();
        });

        if($(ev.target).hasClass('emptyColumnIcon') ){
          $('.colNewWidgetTabBtn').click();
          var currentAttrValue = jQuery('.colNewWidgetTabBtn').children('a').attr('href');
          jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
          jQuery('.colNewWidgetTabBtn').addClass('active').siblings().removeClass('active');
        }else{
          $('.colOpsTabBtn').click();
   
          var currentAttrValue = jQuery('.colOpsTabBtn').children('a').attr('href');    
     
          jQuery('.tabs ' + currentAttrValue).show().siblings().hide();      
          jQuery('.colOpsTabBtn').addClass('active').siblings().removeClass('active');

        }
        $('.color-picker_btn_two').iris('hide');
        CPtopParent = $('.color-picker_btn_two').parent().parent().parent();
        $('.color-picker_btn_two').css('display','block');
        $('.color-picker_btn_two').parent().parent().addClass('hidden');
        $(CPtopParent).removeClass( 'wp-picker-active');
        $(CPtopParent).children('.wp-color-result').removeClass( 'wp-picker-open');
    },
    updateColumn: function(ev){
      var columnToUpdate =  $(ev.target).attr('data-col_id');
      var columnBgColor     = $('.columnBgColor').val();
      var columnMargin      = $('.columnMargin').val();
      var columnPadding     = $('.columnPadding').val();
      var colWidth          = $('.columnWidth').val();
      var columnCSS         = PbColaceEditorCSS.getValue();

      var columnMarginTop = $('.columnMarginTop').val();
      var columnMarginBottom = $('.columnMarginBottom').val();
      var columnMarginLeft = $('.columnMarginLeft').val();
      var columnMarginRight = $('.columnMarginRight').val();
      var columnPaddingTop = $('.columnPaddingTop').val();
      var columnPaddingBottom = $('.columnPaddingBottom').val();
      var columnPaddingLeft = $('.columnPaddingLeft').val();
      var columnPaddingRight = $('.columnPaddingRight').val();


      var columnMargin = {
        columnMarginTop: columnMarginTop,
        columnMarginBottom: columnMarginBottom,
        columnMarginLeft: columnMarginLeft,
        columnMarginRight: columnMarginRight,
      };

      var columnPadding = {
        columnPaddingTop: columnPaddingTop,
        columnPaddingBottom: columnPaddingBottom,
        columnPaddingLeft: columnPaddingLeft,
        columnPaddingRight: columnPaddingRight,
      };


      var colHoverOptions = {
        colBgColorHover:$('.colBgColorHover').val(),
        colBackgroundTypeHover:$('.colBackgroundTypeHover:checked').val(),
        colHoverTransitionDuration:$('.colHoverTransitionDuration').val(),
        colGradientHover:{
          colGradientColorFirstHover: $('.colGradientColorFirstHover').val(),
          colGradientLocationFirstHover:$('.colGradientLocationFirstHover').val(),
          colGradientColorSecondHover:$('.colGradientColorSecondHover').val(),
          colGradientLocationSecondHover:$('.colGradientLocationSecondHover').val(),
          colGradientTypeHover:$('.colGradientTypeHover').val(),
          colGradientPositionHover:$('.colGradientPositionHover').val(),
          colGradientAngleHover:$('.colGradientAngleHover').val(),
        }
      }

      
        var widgets = pageBuilderApp.widgetList.toJSON();
        this.model.set({
          [columnToUpdate] : {
            colWidgets: widgets,
            columnOptions:{
            bg_color: columnBgColor,
            margin: columnMargin,
            padding:columnPadding,
            paddingTablet:{
              rPTT:$('.columnPaddingTopTablet').val(),
              rPBT:$('.columnPaddingBottomTablet').val(),
              rPLT:$('.columnPaddingLeftTablet').val(),
              rPRT:$('.columnPaddingRightTablet').val(),
            },
            paddingMobile:{
              rPTM:$('.columnPaddingTopMobile').val(),
              rPBM:$('.columnPaddingBottomMobile').val(),
              rPLM:$('.columnPaddingLeftMobile').val(),
              rPRM:$('.columnPaddingRightMobile').val(),
            },
            marginTablet:{
              rMTT:$('.columnMarginTopTablet').val(),
              rMBT:$('.columnMarginBottomTablet').val(),
              rMLT:$('.columnMarginLeftTablet').val(),
              rMRT:$('.columnMarginRightTablet').val(),
            },
            marginMobile:{
              rMTM:$('.columnMarginTopMobile').val(),
              rMBM:$('.columnMarginBottomMobile').val(),
              rMLM:$('.columnMarginLeftMobile').val(),
              rMRM:$('.columnMarginRightMobile').val(),
            },
            width: colWidth,
            widthTablet: $('.columnWidthTablet').val(),
            widthMobile: $('.columnWidthMobile').val(),
            columnCSS: columnCSS,
            columnCustomClass: $('.columnCustomClass').val(),
            colHideOnDesktop:$('.colHideOnDesktop').val(),
            colHideOnTablet:$('.colHideOnTablet').val(),
            colHideOnMobile:$('.colHideOnMobile').val(),
            colBoxShadow: {
              colBoxShadowH:$('.colBoxShadowH').val(),
              colBoxShadowV:$('.colBoxShadowV').val(),
              colBoxShadowBlur:$('.colBoxShadowBlur').val(),
              colBoxShadowColor:$('.colBoxShadowColor').val(),
            },
            colBorder: {
              colBorderWidth:$('.colBorderWidth').val(),
              colBorderStyle:$('.colBorderStyle').val(),
              colBorderColor:$('.colBorderColor').val(),
              colBorderRadius:$('.colBorderRadius').val(),
            },
            colBgImg:$('.colBgImg').val(),
            colBackgroundType:$('.colBackgroundType:checked').val(),
            colGradient:{
              colGradientColorFirst: $('.colGradientColorFirst').val(),
              colGradientLocationFirst:$('.colGradientLocationFirst').val(),
              colGradientColorSecond:$('.colGradientColorSecond').val(),
              colGradientLocationSecond:$('.colGradientLocationSecond').val(),
              colGradientType:$('.colGradientType').val(),
              colGradientPosition:$('.colGradientPosition').val(),
              colGradientAngle:$('.colGradientAngle').val(),
            },
            colHoverOptions: colHoverOptions,
            }
          }
        });

      var rowID = this.model.get('rowID');
      var rowColumns = this.model.get('columns');
      var thisColumnModelData = this.model.get(columnToUpdate);
      rowColumnSingleRender(thisColumnModelData, rowID ,columnToUpdate,rowColumns);

        $('section[rowid="'+rowID+'"]').children('.ulpb_column_controls'+columnToUpdate).show();
        $('.isChagesMade').val('true');
    },
    updateColumnWidgetTrigger: function(ev){
      var columnToUpdate =  $(ev.target).attr('data-col_id');
      var columnBgColor     = $('.columnBgColor').val();
      var columnMargin      = $('.columnMargin').val();
      var columnPadding     = $('.columnPadding').val();
      var colWidth          = $('.columnWidth').val();
      var columnCSS         = PbColaceEditorCSS.getValue();

      var columnMarginTop = $('.columnMarginTop').val();
      var columnMarginBottom = $('.columnMarginBottom').val();
      var columnMarginLeft = $('.columnMarginLeft').val();
      var columnMarginRight = $('.columnMarginRight').val();
      var columnPaddingTop = $('.columnPaddingTop').val();
      var columnPaddingBottom = $('.columnPaddingBottom').val();
      var columnPaddingLeft = $('.columnPaddingLeft').val();
      var columnPaddingRight = $('.columnPaddingRight').val();


      var columnMargin = {
        columnMarginTop: columnMarginTop,
        columnMarginBottom: columnMarginBottom,
        columnMarginLeft: columnMarginLeft,
        columnMarginRight: columnMarginRight,
      };

      var columnPadding = {
        columnPaddingTop: columnPaddingTop,
        columnPaddingBottom: columnPaddingBottom,
        columnPaddingLeft: columnPaddingLeft,
        columnPaddingRight: columnPaddingRight,
      };


      var colHoverOptions = {
        colBgColorHover:$('.colBgColorHover').val(),
        colBackgroundTypeHover:$('.colBackgroundTypeHover:checked').val(),
        colHoverTransitionDuration:$('.colHoverTransitionDuration').val(),
        colGradientHover:{
          colGradientColorFirstHover: $('.colGradientColorFirstHover').val(),
          colGradientLocationFirstHover:$('.colGradientLocationFirstHover').val(),
          colGradientColorSecondHover:$('.colGradientColorSecondHover').val(),
          colGradientLocationSecondHover:$('.colGradientLocationSecondHover').val(),
          colGradientTypeHover:$('.colGradientTypeHover').val(),
          colGradientPositionHover:$('.colGradientPositionHover').val(),
          colGradientAngleHover:$('.colGradientAngleHover').val(),
        }
      }

      
        var widgets = pageBuilderApp.widgetList.toJSON();
        this.model.set({
          [columnToUpdate] : {
            colWidgets: widgets,
            columnOptions:{
            bg_color: columnBgColor,
            margin: columnMargin,
            padding:columnPadding,
            paddingTablet:{
              rPTT:$('.columnPaddingTopTablet').val(),
              rPBT:$('.columnPaddingBottomTablet').val(),
              rPLT:$('.columnPaddingLeftTablet').val(),
              rPRT:$('.columnPaddingRightTablet').val(),
            },
            paddingMobile:{
              rPTM:$('.columnPaddingTopMobile').val(),
              rPBM:$('.columnPaddingBottomMobile').val(),
              rPLM:$('.columnPaddingLeftMobile').val(),
              rPRM:$('.columnPaddingRightMobile').val(),
            },
            marginTablet:{
              rMTT:$('.columnMarginTopTablet').val(),
              rMBT:$('.columnMarginBottomTablet').val(),
              rMLT:$('.columnMarginLeftTablet').val(),
              rMRT:$('.columnMarginRightTablet').val(),
            },
            marginMobile:{
              rMTM:$('.columnMarginTopMobile').val(),
              rMBM:$('.columnMarginBottomMobile').val(),
              rMLM:$('.columnMarginLeftMobile').val(),
              rMRM:$('.columnMarginRightMobile').val(),
            },
            width: colWidth,
            widthTablet: $('.columnWidthTablet').val(),
            widthMobile: $('.columnWidthMobile').val(),
            columnCSS: columnCSS,
            columnCustomClass: $('.columnCustomClass').val(),
            colHideOnDesktop:$('.colHideOnDesktop').val(),
            colHideOnTablet:$('.colHideOnTablet').val(),
            colHideOnMobile:$('.colHideOnMobile').val(),
            colBoxShadow: {
              colBoxShadowH:$('.colBoxShadowH').val(),
              colBoxShadowV:$('.colBoxShadowV').val(),
              colBoxShadowBlur:$('.colBoxShadowBlur').val(),
              colBoxShadowColor:$('.colBoxShadowColor').val(),
            },
            colBorder: {
              colBorderWidth:$('.colBorderWidth').val(),
              colBorderStyle:$('.colBorderStyle').val(),
              colBorderColor:$('.colBorderColor').val(),
              colBorderRadius:$('.colBorderRadius').val(),
            },
            colBgImg:$('.colBgImg').val(),
            colBackgroundType:$('.colBackgroundType:checked').val(),
            colGradient:{
              colGradientColorFirst: $('.colGradientColorFirst').val(),
              colGradientLocationFirst:$('.colGradientLocationFirst').val(),
              colGradientColorSecond:$('.colGradientColorSecond').val(),
              colGradientLocationSecond:$('.colGradientLocationSecond').val(),
              colGradientType:$('.colGradientType').val(),
              colGradientPosition:$('.colGradientPosition').val(),
              colGradientAngle:$('.colGradientAngle').val(),
            },
            colHoverOptions: colHoverOptions,
            }
          }
        });
      
      var rowID = this.model.get('rowID');
        $('section[rowid="'+rowID+'"]').children('.ulpb_column_controls'+columnToUpdate).show();
        $('.isChagesMade').val('true');
    },
    updateWidth: function() {
        rowColumns = this.model.get('columns');
        var this_column = $('.currentResizedRowColTarget').val();
        var thisColumnModelData = this.model.get(this_column);
        var this_column_widgets = thisColumnModelData['colWidgets'];
        var this_column_options = thisColumnModelData['columnOptions'];
        var this_column_bg_color = this_column_options['bg_color'];
        var this_column_margin = this_column_options['margin'];
        var this_column_padding = this_column_options['padding'];
        var columnCSS = this_column_options['columnCSS'];

        var rowID = this.model.get('rowID');
        var colWidth = $('section[RowID="'+rowID+'"]'+' .'+this_column).width();
        var pbWrapperWidth = $('section[RowID="'+rowID+'"]').width();
        var colWidthPercentage  = ( (colWidth/pbWrapperWidth) * 100);
        colWidthPercentage = colWidthPercentage.toFixed(2);
        var savedColWidth = this_column_options['width'];

        if (typeof(this_column_options['paddingTablet']) !== 'undefined') {
          var ColpaddingMobile = this_column_options['paddingMobile'];
          var ColmarginTablet = this_column_options['marginTablet'];
          var ColmarginMobile = this_column_options['marginMobile'];
          var ColpaddingTablet = this_column_options['paddingTablet'];
          var ColwidthTablet = this_column_options['widthTablet'];
          var ColwidthMobile = this_column_options['widthMobile'];
        }else{

          ColpaddingTablet = {
            rPTT:'',
            rPBT:'',
            rPLT:'',
            rPRT:'',
          }
          ColmarginTablet = {
            rMTT:'',
            rMBT:'',
            rMLT:'',
            rMRT:'',
          }
          ColpaddingMobile = {
            rPTM:'',
            rPBM:'',
            rPLM:'',
            rPRM:'',
          }

          ColmarginMobile = {
            rMTM:'',
            rMBM:'',
            rMLM:'',
            rMRM:'',
          }

          ColwidthTablet = '';
          ColwidthMobile = '';

        }

        var currentViewPortColOps = $('.currentViewPortSize').val();
        if (currentViewPortColOps == 'rbt-l') {
          savedColWidth = colWidthPercentage;
        }
        if (currentViewPortColOps == 'rbt-m') {
          ColwidthTablet = colWidthPercentage;
        }
        if (currentViewPortColOps == 'rbt-s') {
          ColwidthMobile = colWidthPercentage;
        }

        this_column_options['width'] = savedColWidth;
        this_column_options['widthTablet'] = ColwidthTablet;
        this_column_options['widthMobile'] = ColwidthMobile;

       var widgets = this_column_widgets;
        this.model.set({
          [this_column] : {
            colWidgets: widgets,
            columnOptions:this_column_options
          }
        });
        currentResizedRowColTargetNext = $('.currentResizedRowColTargetNext').val();
        if (currentResizedRowColTargetNext != 'false') {
          currentResizedRowColTargetNext++;
          nextColumn = 'column'+currentResizedRowColTargetNext;
          $('.currentResizedRowColTarget').val(nextColumn);
          $('.currentResizedRowColTargetNext').val('false');
          $('section[RowID="'+rowID+'"]'+' .'+nextColumn).children('#WidthSave').trigger('click');
        }
      $('.isChagesMade').val('true');
    },
    updateRowHeight: function() {
      var rowID = this.model.get('rowID');
      var currentResizedRowHeight = $('.currentResizedRowHeight').val();
      var curreViewportS = $('.currentViewPortSize').val();
      if (curreViewportS == 'rbt-l') {
        this.model.set('rowHeight',currentResizedRowHeight);
        this.model.set('rowHeightUnit','px');
      } else if (curreViewportS == 'rbt-m') {
        this.model.set('rowHeightTablet',currentResizedRowHeight);
        this.model.set('rowHeightUnitTablet','px');
      } else if (curreViewportS == 'rbt-s') {
        this.model.set('rowHeightMobile',currentResizedRowHeight);
        this.model.set('rowHeightUnitMobile','px')
      } else{
        this.model.set('rowHeight',currentResizedRowHeight);
        this.model.set('rowHeightUnit','px');
      }
      
    },
    setColumnsOfThisModel: function(ev){
      var numberOfColumnsSelected =  $(ev.target).parent().attr('data-colNumber');
      this.model.set({columns:numberOfColumnsSelected });

      $(this.el).html('');
      this.render();
      $('.isChagesMade').val('true');
    },
    widgetWinlineEditingEnable: function(ev){

      jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      jQuery('.edit_column').hide("slide", { direction: "left" }, 500);
      jQuery('.ulpb_column_controls').css('display','none');

        var inlineEditorTarget = $(ev.target);
        var this_widget_type = $(ev.currentTarget).attr('data-widgettype');
        
        
        if (typeof(POpen) != 'undefined') {
          POpen.destroy();
          delete POpen;
          jQuery( "[data-InlineEditor='POpenActive']" ).removeClass('POulpb_text');
          jQuery( "[data-InlineEditor='POpenActive']" ).removeAttr('contenteditable');
          jQuery( "[data-InlineEditor='POpenActive']" ).removeAttr('data-InlineEditor');
        }

        $(inlineEditorTarget).attr('data-InlineEditor','POpenActive');

        if (this_widget_type == 'wigt-pb-text') {

          var options = {
            editor: document.querySelector('[data-InlineEditor="POpenActive"]'),
            class:'POulpb_text',
            list: [
              ''
            ],
          };

        }else if(this_widget_type == 'wigt-WYSIWYG'){

          var options = {
            editor: document.querySelector('[data-InlineEditor="POpenActive"]'),
            class:'POulpb_text',
            linksInNewWindow: true,
            debug: false,
            list: [
              'h1','h2', 'h3', 'p', 'insertorderedlist', 'insertunorderedlist',
              'indent', 'outdent', 'bold', 'italic', 'underline', 'createlink','insertimage','inserthorizontalrule'
            ],
          };
        }else{

          var options = {
            editor: document.querySelector('[data-InlineEditor="POpenActive"]'),
            class:'POulpb_text',
            list: [
              ''
            ],
          };
        }

        
        var POpen = new Pen(options);

        checkIEUL = false;

        $('.POulpb_text-menu').on('click',function(evga){
         thisELClassImageBtn = $(evga.target).hasClass('icon-insertimage');
         thisELClassLinkBtn = $(evga.target).hasClass('icon-createlink');
         thisELClassInput = $(evga.target).hasClass('pen-input');
         //console.log(thisELClassLinkBtn);
         if (thisELClassImageBtn == true || thisELClassLinkBtn == true || thisELClassInput == true) {
         }else{
          $(this).remove();
         }
        } );

         $( "[data-InlineEditor='POpenActive']" ).on('click',function(){
          $(inlineEditorTarget).attr('data-PopenActive','true');
         });

         
        $('body').on('click',{parentTarget: ev.currentTarget, currentWidgetType: this_widget_type  },function(evta){

          thisClickedEL = $(evta.target).attr('class');
          thisClickedELClass = $(evta.target).hasClass('pen-icon');
          thisClickedELInpClass = $(evta.target).hasClass('pen-input');

          if (thisClickedEL == 'POulpb_text' || thisClickedELClass == true || thisClickedELInpClass == true) {
            return;
          } else{
            POpen.destroy();
            delete POpen;
            parentTarget = evta.data.parentTarget;
            jQuery( "[data-InlineEditor='POpenActive']" ).removeClass('POulpb_text');
            jQuery( "[data-InlineEditor='POpenActive']" ).removeAttr('contenteditable');
            jQuery( "[data-InlineEditor='POpenActive']" ).removeAttr('data-InlineEditor');
            jQuery( "[data-InlineEditor='POpenActive']" ).removeAttr('data-PopenActive');
            jQuery( "[data-popenactive='true']" ).removeAttr('data-PopenActive');
            $('.POulpb_text-menu').remove();
            if (checkIEUL == true) {
              $("body").unbind("click");
              return;
            }else{
              if (evta.data.currentWidgetType == 'wigt-pb-testimonial') {
                $(parentTarget).next('.inlineEditingSaveTrigger ').trigger('click');
              }else{
                $(parentTarget).siblings('.inlineEditingSaveTrigger ').trigger('click');
              }
              
            }
            $("body").unbind("click");
          }

          return;
        }); //body click event
    },
    widgetInlineEditorSave: function(ev){

      var this_column = $(ev.currentTarget).attr('data-wid_col_id');
      var this_widget = $(ev.currentTarget).attr('data-widget_id');
      var this_widget_type = $(ev.currentTarget).attr('data-widgettype');
      var thisColumnData = this.model.get(this_column);

      var EditedData = $(ev.currentTarget).siblings('#widgetInlineEditor').html();

      if (this_widget_type == 'wigt-pb-text') {
        var EditedData = $(ev.currentTarget).siblings('#widgetInlineEditor').html();
        thisColumnData['colWidgets'][this_widget]['widgetText']['widgetTextContent'] = POPB_strip(EditedData);

      }else if(this_widget_type == 'wigt-WYSIWYG'){

        thisColumnData['colWidgets'][this_widget]['widgetWYSIWYG']['widgetContent'] = EditedData;
      } else if(this_widget_type == 'wigt-btn-gen'){
        var EditedData = $(ev.currentTarget).siblings('#widgetInlineEditor').html();
        thisColumnData['colWidgets'][this_widget]['widgetButton']['btnText'] = POPB_strip(EditedData);
      } else if(this_widget_type == 'wigt-pb-testimonial'){

        var thisFieldName = $(ev.currentTarget).attr('data-fieldName');
        var EditedData = $(ev.currentTarget).prev('#widgetInlineEditor').html();
        thisColumnData['colWidgets'][this_widget]['widgetTestimonial'][thisFieldName] = POPB_strip(EditedData);
      }
      
      var this_column_widgets = thisColumnData['colWidgets'];
      var this_column_options = thisColumnData['columnOptions'];

        this.model.set({
          [this_column] : {
            colWidgets: this_column_widgets,
            columnOptions: this_column_options,
          }
        });

      checkIEUL = true;
      $("body").unbind("click");
      $('.isChagesMade').val('true');

      //jQuery('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
      //jQuery('.edit_column').hide("slide", { direction: "left" }, 500);

      return;
    },


});

}( jQuery ) );