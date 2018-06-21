( function( $ ) {

$('.updateTemplate').live('click', function () {

	$('.popb_confirm_action_popup').css('display','block');

	$('.popb_confirm_subMessage').text('This template will replace all your exisiting page content.');

	$('.confirm_no').click(function(){
		isConfirmTrue_c = false;
		$('.popb_confirm_action_popup').css('display','none');
	});

	$('.confirm_yes').click(function(){
		$('.popb_confirm_action_popup').css('display','none');
		isConfirmTrue_c = true;

	   var popb_selected_template = $('input[name=template_select]:checked').val();
	   var pageOptions = "";
	   if (isConfirmTrue_c == true) {
	   	var pageSeoName = $('#title').val();
	   	var PbPageStatus = $('.PbPageStatus').val();
	   	var pageLink = $('#editable-post-name-full').html();
	   	$('.pb_loader_container').slideDown(200);
	   	
	   	if (pageSeoName == '') {
	   		$('#title').val('PluginOps Page  - '+P_ID);
	   		pageSeoName = $('#title').val();
	   	}
	   	switch (popb_selected_template){
	   		case 'temp1':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp2':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp3':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp4':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp5':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"false","pageBgImage":"http://smuzthemes.com/wp-content/uploads/2017/02/photo-1433360405326-e50f909805b3.jpg","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"10","pagePaddingBottom":"10","pagePaddingLeft":"5","pagePaddingRight":"5"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp6':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":"#e64b50 ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"3","pagePaddingBottom":"6","pagePaddingLeft":"5","pagePaddingRight":"5"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp7':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"http://smuzthemes.com/wp-content/uploads/2017/02/5f468e98-compressor.jpg","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp8':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"http://smuzthemes.com/wp-content/uploads/2017/02/riciardus-189738-compressor.png","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp9':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp10':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp11':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp12':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"https://images.unsplash.com/uploads/141103282695035fa1380/95cdfeef?dpr=1&auto=compress","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"4","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp13':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp14':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"1","pagePaddingBottom":"0","pagePaddingLeft":"4","pagePaddingRight":"4"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp15':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp16':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp17':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp18':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp19':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp20':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp21':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"http://smuzthemes.com/wp-content/uploads/2017/07/stock-0001.jpg","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp22':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp23':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'tempftp1':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'tempftp2':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'tempftp3':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'tempftp4':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp24':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp25':
	   		var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp26':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"https://images.unsplash.com/photo-1503945438517-f65904a52ce6?dpr=1&auto=compress,format&fit=crop&w=1950&h=&q=80&cs=tinysrgb&crop=","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp27':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp28':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp29':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;

	   		case 'temp30':
	   			var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"","pageFavIconUrl":"","VariantB_ID":null,"POcustomCSS":".formWidgetOne input {  margin-top:20px; }\\n.formWidgetOne button {  margin-top:20px; }","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp31':
	   			var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#F2F2F1","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"http:\/\/smuzthemes.com\/wp-content\/uploads\/2018\/04\/dummy-logo-WHITE.png","pageFavIconUrl":"","VariantB_ID":null,"POcustomCSS":"\/* Add your custom CSS here.*\/","POcustomJS":"\/* Add your custom Javascript here.*\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp32':
	   			var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"","pageFavIconUrl":"","VariantB_ID":null,"POcustomCSS":".temp-22-sub-form input {\\n    border:none !important;\\n    border-bottom:1px solid #00C2A6 !important;\\n}","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;


	   		case 'temp105':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp106':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"false","pageBgImage":"https://images.unsplash.com/photo-1438955185657-797f29aeaea8?auto=format&fit=crop&w=1350&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"","pageFavIconUrl":"","VariantB_ID":null,"POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"true","POPB_typefaces":{"typefaceHOne":"Brawler","typefaceHTwo":"Cardo","typefaceParagraph":"Cardo","typefaceButton":"Arial Black","typefaceAnchorLink":"Helvetica"},"POPB_typeSizes":{"typeSizeHOne":"42","typeSizeHTwo":"20","typeSizeParagraph":"16","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"30","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"19","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"14","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}} }';
	   		break;
	   		case 'temp107':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp108':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"true","pageBgImage":"","pageBgColor":" ","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":""}';
	   		break;
	   		case 'temp109':
	   			var pageOptions = '{"loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"","pageFavIconUrl":"","VariantB_ID":null,"POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"true","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"34","typeSizeHTwo":"22","typeSizeParagraph":"13","typeSizeButton":"14","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		default: 
	   		alert('No template selected');
	   		break;
	   	}


	   	var model = '';
		$.ajax({
		  type: 'GET',
		  dataType: "json",
		  url: bbfourLinks.templatesFolder+popb_selected_template+".json",
		  data: { get_param: 'value' },
		  success: function( data ) {
	   		model = data;
		  },
		  error: function( xhr, ajaxOptions, thrownError ) {
	   		alert('Some Error Occurred');
		  },
		  async:false
		});

		if (model == '') {
			$('.pb_loader_container').slideUp(200);
		}else{
			pageBuilderApp.PageBuilderModel.set( 'Rows', model );
		    pageBuilderApp.PageBuilderModel.set( 'pageStatus', PbPageStatus );
		    if (pageOptions !== "") {
		    	pageBuilderApp.PageBuilderModel.set( 'pageOptions', JSON.parse(pageOptions) );
		    }
		    var savedPageID = pageBuilderApp.PageBuilderModel.get('pageID');
		    if (P_ID !== savedPageID ) {
		    	pageBuilderApp.PageBuilderModel.set('pageID', P_ID );
		    	var savedPageID = pageBuilderApp.PageBuilderModel.get('pageID');
		    	console.log(savedPageID);
		    }
		

			pageBuilderApp.PageBuilderModel.save({ wait:true }).success(function(response){

		    	setTimeout(function(){
			      $('.pb_loader_container').slideUp(200);
			      
			        window.location.href = admURL+'post.php?post='+P_ID+'&action=edit'; 
			    }, 1000);
			    console.log('Saved');

			}).error(function(response){

			    alert('Page Not Saved - Some Error Occurred! ');
			    $('.pb_loader_container').slideUp(200);

			});

		}
		    

	   }

   });

});



$(document).ready(function(){

  $('.rowBlockUpdateBtn').click(function(ev){
    var blockName = $(ev.target).attr('data-rowBlockName');
    var rowBlock = '';
    var modelIndex = $('.insertRowBlockAtIndex').val();
    modelIndex = parseInt(modelIndex);
    $.ajax({
      type: 'GET',
      dataType: "json",
      url: bbfourLinks.pluginsUrl+'/admin/scripts/blocks/rowBlocks/'+blockName+''+".json",
      data: { get_param: 'value' },
      success: function( data ) {
        rowBlock = data;
      },
      error: function(  thrownError ) {
        alert('Some Error Occurred');
        console.log(thrownError);
      },
      async:false
    });
    rowBlock['rowID'] = 'ulpb_Row'+Math.floor((Math.random() * 200000) + 100);
    if (rowBlock !='' ) {
      pageBuilderApp.rowList.add( rowBlock , {at: modelIndex+1} );
      $('.insertRowBlock').hide("slide", { direction: "left" }, 500);
    }else{
    }
    
    $('.insertRowBlockAtIndex').val('');
  });
  $('.addNewRowBlockVisible').click(function(ev){
    modelIndex = pageBuilderApp.rowList.length;
    $('.insertRowBlockAtIndex').val(modelIndex);

    $('.ulpb_column_controls').hide();
    $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
    $('.pageops_modal').hide("slide", { direction: "left" }, 500);
    $('.edit_column').hide("slide", { direction: "left" }, 500);

    $('.insertRowBlock').show("slide", { direction: "left" }, 500);
  });
  $('.insertRowBlockClosebutton').click(function(ev){
    $('.insertRowBlock').hide("slide", { direction: "left" }, 500);
  });

});

}( jQuery ) );