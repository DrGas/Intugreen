( function( $ ) {
pageBuilderApp.rowList = new pageBuilderApp.RowCollection();
pageBuilderApp.widgetList = new pageBuilderApp.WidgetCollection();
pageBuilderApp.PageBuilderModel = new pageBuilderApp.ULPBPage();

pageBuilderApp.row = new pageBuilderApp.Row();
var widget = new pageBuilderApp.ColWidget();
//var savedPage = pageBuilderApp.PageBuilderModel.fetch();
pageBuilderApp.PageBuilderModel.fetch({
    success: function() { 
      var Rows = pageBuilderApp.PageBuilderModel.get('Rows');
      var pageOptions = pageBuilderApp.PageBuilderModel.get('pageOptions');
      var pageStatus = pageBuilderApp.PageBuilderModel.get('pageStatus');
      var frontPage = pageOptions['frontPage'];
      var loadWpHead = pageOptions['loadWpHead'];
      var loadWpFooter = pageOptions['loadWpFooter'];
      var pageSeoName = pageOptions['pageSeoName'];
      var pageLink = pageOptions['pageLink'];
      var pageSeoDescription = pageOptions['pageSeoDescription'];
      var pageSeoKeywords = pageOptions['pageSeoKeywords'];
      var pageLogoUrl = pageOptions['pageLogoUrl'];
      var pageFavIconUrl = pageOptions['pageFavIconUrl'];
      var VariantB_ID = pageOptions['VariantB_ID'];

      var pageBgColor = pageOptions['pageBgColor'];
      var pageBgImage = pageOptions['pageBgImage'];
      var pagePadding = pageOptions['pagePadding'];
      var pagePaddingTop = pagePadding['pagePaddingTop'];
      var pagePaddingBottom = pagePadding['pagePaddingBottom'];
      var pagePaddingRight = pagePadding['pagePaddingRight'];
      var pagePaddingLeft = pagePadding['pagePaddingLeft'];

      var formMailchimp = pageBuilderApp.PageBuilderModel.get('formMailchimp');
      var mailchimpListIdHolder = formMailchimp['listId'];
      var mailchimpApiKeyHolder = formMailchimp['apiKey'];

      var POcustomCSS = pageOptions['POcustomCSS'];
      var POcustomJS = pageOptions['POcustomJS'];


      POPBDefaults = '';
      if (typeof(pageOptions['POPBDefaults'])  != 'undefined') {
        var POPBDefaults = pageOptions['POPBDefaults'];
      }
      
      POPBDefaultsEnable = '';
      if (typeof(POPBDefaults['POPBDefaultsEnable'])  != 'undefined') {
        var POPBDefaultsEnable = POPBDefaults['POPBDefaultsEnable'];
      }

      POPB_typefaces = '';
      if (typeof(POPBDefaults['POPB_typefaces'])  != 'undefined') {
        var POPB_typefaces = POPBDefaults['POPB_typefaces'];
      }

      POPB_typeSizes = '';
      if (typeof(POPBDefaults['POPB_typeSizes'])  != 'undefined') {
        var POPB_typeSizes = POPBDefaults['POPB_typeSizes'];
      }

      if (POPB_typefaces != '') {
        
        $.each(POPB_typefaces, function(index,val){
          $('.'+index).val(val);

          $('.'+index).next('.font-select').children('a').children('.font_select_placeholder').html($('.'+index).val().replace(/\+/g, ' '));

        });
      }

      $.each(POPB_typeSizes, function(index,val){
        $('.'+index).val(val);
      });


      if (typeof(pageOptions['POPBDefaults'])  != 'undefined') {

        $('.POPBDefaultsEnable').val(POPBDefaultsEnable);

        if (POPBDefaultsEnable == 'true') {

          $('#fontLoaderContainer').html('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+POPB_typefaces['typefaceHOne']+'|'+POPB_typefaces['typefaceHTwo']+'|'+POPB_typefaces['typefaceParagraph']+'|'+POPB_typefaces['typefaceButton']+'|'+POPB_typefaces['typefaceAnchorLink']+' ">');

          var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHOne']+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHTwo']+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeParagraph']+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeButton']+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeAnchorLink']+'px; } \n';

          $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);
        }else{
          $('#POPBGlobalStylesTag').html('');
        }
      }



      if (typeof(pageOptions['POcustomCSS']) == 'undefined') { POcustomCSS = '/*Add your custom CSS here.*/'}

      $('.POcustomCSS').val(POcustomCSS);
      if (POcustomCSS !== '') {
        PbPOaceEditorCSS.setValue(POcustomCSS);
      } else {
        PbPOaceEditorCSS.setValue('/* Add your custom CSS here.*/');
      }

      if (typeof(pageOptions['POcustomJS']) == 'undefined') { POcustomJS = '/*Add your custom CSS here.*/'}

      $('.POcustomJS').val(POcustomJS);
      if (POcustomJS !== '') {
        PbPOaceEditorJS.setValue(POcustomJS);
      } else {
        PbPOaceEditorJS.setValue('/* Add your custom Javascript here.*/');
      }

      
    $('#title').val(pageSeoName);
    $('#new-post-slug').val(pageLink);
    $('#title-prompt-text').html(' ');
    $('.PbPageStatus').val(pageStatus);
    $('.pageSeoDescription').val(pageSeoDescription);
    $('.pageSeoKeywords').val(pageSeoKeywords);
    $('.pageBgImage').val(pageBgImage);
    $('.pageBgColor').val(pageBgColor);
    $('.pagePaddingTop').val(pagePaddingTop);
    $('.pagePaddingBottom').val(pagePaddingBottom);
    $('.pagePaddingLeft').val(pagePaddingLeft);
    $('.pagePaddingRight').val(pagePaddingRight); 
    $('.pageLogoUrl').val(pageLogoUrl);
    $('.pageFavIconUrl').val(pageFavIconUrl);
    $('.VariantB_ID').val(VariantB_ID);

    if (pageStatus == 'publish') {
      $('.draftBtn').css('display','none');
      $('#pbbtnRedo').css('margin-right','18%');
      $('.publishBtn').text('Update');
    }else{
      $('#pbbtnRedo').css('margin-right','8.5%');
    }

    if (typeof(pageOptions['pagePaddingTablet']) !== 'undefined') {
      pagePaddingTablet = pageOptions['pagePaddingTablet'];
      pagePaddingMobile = pageOptions['pagePaddingMobile'];

      $('.pagePaddingTopTablet').val(pagePaddingTablet['pagePaddingTopTablet']);
      $('.pagePaddingBottomTablet').val(pagePaddingTablet['pagePaddingBottomTablet']);
      $('.pagePaddingLeftTablet').val(pagePaddingTablet['pagePaddingLeftTablet']);
      $('.pagePaddingRightTablet').val(pagePaddingTablet['pagePaddingRightTablet']); 

      $('.pagePaddingTopMobile').val(pagePaddingMobile['pagePaddingTopMobile']);
      $('.pagePaddingBottomMobile').val(pagePaddingMobile['pagePaddingBottomMobile']);
      $('.pagePaddingLeftMobile').val(pagePaddingMobile['pagePaddingLeftMobile']);
      $('.pagePaddingRightMobile').val(pagePaddingMobile['pagePaddingRightMobile']); 

    }

    $('.mailchimpListIdHolder').val(mailchimpListIdHolder); 
    $('.mailchimpApiKeyHolder').val(mailchimpApiKeyHolder)
    
    $('.pageBgColor').parent().prev().css('background-color',pageBgColor);
    $('#pbWrapper').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover; background-color:'+pageBgColor+'; padding: '+pagePaddingTop+'% '+pagePaddingRight+'% '+pagePaddingBottom+'% '+pagePaddingLeft+'%  ;  ');


      _.each( Rows, function(Row, index ) {
        pageBuilderApp.rowList.add(Row);
      });
    // console.log(JSON.stringify(pageBuilderApp.PageBuilderModel) );
    },
    error: function() {
        console.log('Failed to fetch!');
    }
});


var PgCollectionView = new Backbone.CollectionView( {
    el : $( "#container" ),
    modelView : pageBuilderApp.RowView,
    collection : pageBuilderApp.rowList,
    sortable: true,
    selectable: false,
    emptyListCaption: '<div class="newRowBtnContainerVisible" > <div class="newRowBtnContainerSections"> <div class="addNewRowVisible  row-section-btn" style="background:#5AB1F7;" > ADD NEW ROW</div> </div> <div class="newRowBtnContainerSections" style="display: none;">    <div class="addNewGlobalRowVisible  row-section-btn" style="background:#F1D204;" > INSERT GLOBAL ROW</div> </div> </div> <br> <br> <br> <h3>Add some rows.</h3>'
} );




/*
var PgFullWidthCollectionView = new Backbone.CollectionView( {
    el : $( "#fullWidthContainer" ),
    modelView : pageBuilderApp.RowView,
    collection : pageBuilderApp.rowList,
    sortable: true,
    selectable: false,
    emptyListCaption: '<h3>Add some rows.</h3>'
} );
*/

var widgetCollectionView = new Backbone.CollectionView( {
    el : $( "#widgets" ),
    modelView : pageBuilderApp.WidgetView,
    collection : pageBuilderApp.widgetList,
    sortable: true,
    selectable: false,
    emptyListCaption: 'Add some widgets.',

} );



widgetCollectionView.on('sortStop',function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
});

PgCollectionView.render();
//PgFullWidthCollectionView.render();
widgetCollectionView.render();

pageBuilderApp.rowUndoManager = new Backbone.UndoManager({
  track: true, // changes will be tracked right away
  register: [pageBuilderApp.rowList ] // pass an object or an array of objects
});


$(document).ready(function(){
  $('#pbbtnUndo').click(function(){
    pageBuilderApp.rowUndoManager.undo();
    PgCollectionView.render();
  });

  $('#pbbtnRedo').click(function(){
    pageBuilderApp.rowUndoManager.redo();
    PgCollectionView.render();
  });

});

}( jQuery ) );