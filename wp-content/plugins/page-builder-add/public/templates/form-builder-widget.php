<?php
if ( ! defined( 'ABSPATH' ) ) exit; 


  $this_widget_form_builder = $thisWidget['widgetFormBuilder'];


  $widgetPbFbFormFeilds = $this_widget_form_builder['widgetPbFbFormFeilds'];
  $widgetPbFbFormFeildOptions = $this_widget_form_builder['widgetPbFbFormFeildOptions'];
  $widgetPbFbFormSubmitOptions = $this_widget_form_builder['widgetPbFbFormSubmitOptions'];
  $widgetPbFbFormEmailOptions = $this_widget_form_builder['widgetPbFbFormEmailOptions'];

  $formBuilderFieldSize = 'pbField-'.$widgetPbFbFormFeildOptions['formBuilderFieldSize'];

  $formBuilderFieldVGap = ''; $formBuilderFieldHGap = '2.5'; 
  if (isset($widgetPbFbFormFeildOptions['formBuilderFieldVGap']) ) {
    
    if ($widgetPbFbFormFeildOptions['formBuilderFieldVGap'] != '') {
      $formBuilderFieldVGap = $widgetPbFbFormFeildOptions['formBuilderFieldVGap'];
    }
    if ($widgetPbFbFormFeildOptions['formBuilderFieldHGap'] != '') {
      $formBuilderFieldHGap = $widgetPbFbFormFeildOptions['formBuilderFieldHGap'];
    }
  }

  $formBuilderBtnVGap = ''; $formBuilderBtnHGap = '';
  if (isset($widgetPbFbFormSubmitOptions['formBuilderBtnVGap']) ) {
    
    if ($widgetPbFbFormSubmitOptions['formBuilderBtnVGap'] != '') {
      $formBuilderBtnVGap = $widgetPbFbFormSubmitOptions['formBuilderBtnVGap'];
    }
    if ($widgetPbFbFormSubmitOptions['formBuilderBtnHGap'] != '') {
      $formBuilderBtnHGap = $widgetPbFbFormSubmitOptions['formBuilderBtnHGap'];
    }
  }

  $pbFormBuilderUniqueId = 'pb_FormBuilder_'.(rand(10,99)*120+200);
  
  $formBuilderbtnIcon = '';$formBuilderbtnIconBefore = '';$formBuilderbtnIconAfter = '';$formBuilderbtnIconAnimation = '';$formBuilderbtnIconHoverAnimationScript = '';
  if (isset($widgetPbFbFormSubmitOptions['formBuilderbtnSelectedIcon'])) {
    $formBuilderbtnSelectedIcon = $widgetPbFbFormSubmitOptions['formBuilderbtnSelectedIcon'];
    $formBuilderbtnIconPosition = $widgetPbFbFormSubmitOptions['formBuilderbtnIconPosition'];
    $formBuilderbtnIconAnimation = $widgetPbFbFormSubmitOptions['formBuilderbtnIconAnimation'];
    $formBuilderbtnIconGap = $widgetPbFbFormSubmitOptions['formBuilderbtnIconGap'];
    if ($formBuilderbtnSelectedIcon != '') {
      if ($formBuilderbtnIconPosition == 'before') {
        $formBuilderbtnIconGap = 'margin-right:'.$formBuilderbtnIconGap.
        'px;';
      } else {
        $formBuilderbtnIconGap = 'margin-left:'.$formBuilderbtnIconGap.
        'px;';
      }
      $formBuilderbtnIcon = '<i style="'.$formBuilderbtnIconGap.'" class="fa '.$formBuilderbtnSelectedIcon.'  btnIcon-'.$pbFormBuilderUniqueId.'"></i>';
      if ($formBuilderbtnIconAnimation != '') {
        $formBuilderbtnIconHoverAnimationScript = " <script>
          jQuery('.form-btn-".$pbFormBuilderUniqueId."').mouseenter(function(){
            jQuery('.btnIcon-".$pbFormBuilderUniqueId."').addClass('animated ".$formBuilderbtnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                jQuery('.btnIcon-".$pbFormBuilderUniqueId."').removeClass('animated ".$formBuilderbtnIconAnimation."') 
            });
          });
          </script> " ;
      }
      $widgetFALoadScripts = true;
    } else {
      $formBuilderbtnIcon = '';
    }
    if ($formBuilderbtnIconPosition == 'before') {
      $formBuilderbtnIconBefore = $formBuilderbtnIcon;
      $formBuilderbtnIconAfter = '';
    } else {
      $formBuilderbtnIconAfter = $formBuilderbtnIcon;
      $formBuilderbtnIconBefore = '';
    }
  }

  if (isset($widgetPbFbFormSubmitOptions['formBuilderBtnFontFamily'])) {
    array_push($thisColFontsToLoad, $widgetPbFbFormSubmitOptions['formBuilderBtnFontFamily']);
  }else{
    $widgetPbFbFormSubmitOptions['formBuilderBtnFontFamily'] = ' ';
  }
  if (isset($widgetPbFbFormFeildOptions['formBuilderFieldFontFamily'])) {
    array_push($thisColFontsToLoad, $widgetPbFbFormFeildOptions['formBuilderFieldFontFamily']);
  }else{
    $widgetPbFbFormFeildOptions['formBuilderFieldFontFamily'] = ' ';
  }


  ob_start();

  $widgetPbFbFormFeildsIndex = 0;
  foreach($widgetPbFbFormFeilds as $widgetPbFbFormFeild){

    $thisFieldOptions = $widgetPbFbFormFeild['thisFieldOptions'];
    $fbFieldRequired = '';
    if ($thisFieldOptions['fbFieldRequired'] == 'true') {
      $fbFieldRequired = 'required="required"';
    }
    $thisFieldAttr = 'style="width:99%;  "  placeholder="'.$thisFieldOptions['fbFieldPlaceHolder'].'" '.$fbFieldRequired.' "  id="fieldID-'.$widgetPbFbFormFeildsIndex.'" ' ;
    $multiFieldStyleAttr = 'style="margin-right:25px; display:'.$thisFieldOptions['displayFieldsInline'].'; line-height:2em; font-size:16px; "';
    $thisFieldName = $thisFieldOptions['fbFieldLabel'];

    if ($thisFieldName == '') {
      $thisFieldName = $widgetPbFbFormFeild['fbFieldType'];
    }

    switch ($widgetPbFbFormFeild['fbFieldType']) {
      case 'textarea':
           $pbThisFormField = '<textarea rows="'.$thisFieldOptions['fbtextareaRows'].'" name="field-'.$widgetPbFbFormFeildsIndex.'-'.$thisFieldName.'" '.$thisFieldAttr.' class="pbFormField  '.$formBuilderFieldSize.'" ></textarea>';
      break;
      case 'radio':

           $multiOptionFieldValues = explode("\n", $thisFieldOptions['multiOptionFieldValues']);
           $allRadioItems = '';

           for ($pb_widget_form_loopi =0; $pb_widget_form_loopi< count($multiOptionFieldValues); $pb_widget_form_loopi++) {
             $thisRadioLabel = '<label for="fieldID-'.$widgetPbFbFormFeildsIndex.'-'.$pb_widget_form_loopi.'-'.$pbFormBuilderUniqueId.'">'.$multiOptionFieldValues[$pb_widget_form_loopi].'</label>';
             $thisRadioItem = '<span '.$multiFieldStyleAttr.'>  <input type="radio" name="field-'.$widgetPbFbFormFeildsIndex.'-'.$thisFieldName.'"  id="fieldID-'.$widgetPbFbFormFeildsIndex.'-'.$pb_widget_form_loopi.'-'.$pbFormBuilderUniqueId.'" value="'.$multiOptionFieldValues[$pb_widget_form_loopi].'" > ' .$thisRadioLabel. ' </span>';
             
             $prevRadioFields = $allRadioItems;
             $allRadioItems = $prevRadioFields .  $thisRadioItem;
           }
           $pbThisFormField = $allRadioItems;

      break;
      case 'checkbox':
           $multiOptionFieldValues = explode("\n", $thisFieldOptions['multiOptionFieldValues']);
           $allRadioItems = '';

           for ($pb_widget_form_loopi =0; $pb_widget_form_loopi< count($multiOptionFieldValues); $pb_widget_form_loopi++) {
             $thisRadioLabel = '<label for="fieldID-'.$widgetPbFbFormFeildsIndex.'-'.$pb_widget_form_loopi.'-'.$pbFormBuilderUniqueId.'">'.$multiOptionFieldValues[$pb_widget_form_loopi].'</label>';
             $thisRadioItem = '<span '.$multiFieldStyleAttr.'>  <input type="checkbox" name="field-'.$widgetPbFbFormFeildsIndex.'-'.$thisFieldName.'[]"  id="fieldID-'.$widgetPbFbFormFeildsIndex.'-'.$pb_widget_form_loopi.'-'.$pbFormBuilderUniqueId.'" value="'.$multiOptionFieldValues[$pb_widget_form_loopi].'" > ' .$thisRadioLabel. ' </span>';
             
             $prevRadioFields = $allRadioItems;
             $allRadioItems = $prevRadioFields .  $thisRadioItem;
           }
           $pbThisFormField = $allRadioItems;
      break;
      case 'select':
           $multiOptionFieldValues = explode("\n", $thisFieldOptions['multiOptionFieldValues']);
           $allRadioItems = '';

           for ($pb_widget_form_loopi =0; $pb_widget_form_loopi< count($multiOptionFieldValues); $pb_widget_form_loopi++) {

             $thisRadioItem = '<option  value="'.$multiOptionFieldValues[$pb_widget_form_loopi].'" > '.$multiOptionFieldValues[$pb_widget_form_loopi].' </option> ';
             
             $prevRadioFields = $allRadioItems;
             $allRadioItems = $prevRadioFields .  $thisRadioItem;
           }


           $pbThisFormField = '<select name="field-'.$widgetPbFbFormFeildsIndex.'-'.$thisFieldName.'"  id="fieldID-'.$widgetPbFbFormFeildsIndex.'"  '.$thisFieldAttr.' class="pbFormField  '.$formBuilderFieldSize.'">'. $allRadioItems .'</select>';  
      break;
      default: 
           $pbThisFormField = '<input type="'.$widgetPbFbFormFeild['fbFieldType'].'" name="field-'.$widgetPbFbFormFeildsIndex.'-'.$thisFieldName.'"  '.$thisFieldAttr.' class="pbFormField  '.$formBuilderFieldSize.'" >';
      break;
    } //switch end

      $pbThisFormFieldLabel = '<label for="fieldID-'.$widgetPbFbFormFeildsIndex.'" class="pbFormLabel"> '.$thisFieldOptions['fbFieldLabel'].' </label>';
      $pbThisFormFieldWrapped =  '<div class="pluginops_form_inp_wrapper" style="width:'.($thisFieldOptions['fbFieldWidth']-3).'%; margin-right:'.$formBuilderFieldHGap.'%; margin-top:'.$formBuilderFieldVGap.'%; display:inline-block;">' . $pbThisFormFieldLabel.' <br> '.$pbThisFormField .'</div>';

      echo $pbThisFormFieldWrapped;

      $widgetPbFbFormFeildsIndex++;
  }; //each loop end

  $pbFormAllFields = ob_get_contents();
  ob_end_clean();

  $buttonMargin = '2% 2.5% 2% 0';
  if ($widgetPbFbFormSubmitOptions['formBuilderBtnAlignment'] == 'center') {
    $calcMargin = 50 - ($widgetPbFbFormSubmitOptions['formBuilderBtnWidth']/2);
    $buttonMargin = '2% 2.5% 2% '.$calcMargin.'%';
  } else if($widgetPbFbFormSubmitOptions['formBuilderBtnAlignment'] == 'right') {
    $calcMargin = 100 - ($widgetPbFbFormSubmitOptions['formBuilderBtnWidth']);
    $buttonMargin = '2% 2.5% 2% '.$calcMargin.'%';
  }

  $pbFormBuilderSubmitStyles = ' style=" width:100%; background:'.$widgetPbFbFormSubmitOptions['formBuilderBtnBgColor'].'; color:'.$widgetPbFbFormSubmitOptions['formBuilderBtnColor'].'; font-size:'.$widgetPbFbFormSubmitOptions['formBuilderBtnFontSize'].'px;  border:'.$widgetPbFbFormSubmitOptions['formBuilderBtnBorderWidth'].'px solid '.$widgetPbFbFormSubmitOptions['formBuilderBtnBorderColor'].'; border-radius:'.$widgetPbFbFormSubmitOptions['formBuilderBtnBorderRadius'].'px; font-family:'.str_replace('+', ' ', $widgetPbFbFormSubmitOptions['formBuilderBtnFontFamily'] ).', sans-serif; " ';

  $pbFormBuilderSubmit = '<div class="pluginops_form_inp_wrapper" style="text-align:'.$widgetPbFbFormSubmitOptions['formBuilderBtnAlignment'].'; width:'.($widgetPbFbFormSubmitOptions['formBuilderBtnWidth']-3).'%;  margin:'.$buttonMargin.';  margin-left:'.$formBuilderBtnHGap.'%; margin-top:'.$formBuilderBtnVGap.'%; display:inline-block;">  <button type="submit" '.$pbFormBuilderSubmitStyles.' class="pbField-'.$widgetPbFbFormSubmitOptions['formBuilderBtnSize'].' form-btn-'.$pbFormBuilderUniqueId.' "> '.$formBuilderbtnIconBefore.' '.$widgetPbFbFormSubmitOptions['formBuilderBtnText'].' '.$formBuilderbtnIconAfter.' </button> </div>';


  $pbFormBuilderExtraFields = " <input type='hidden' name='psID' value='$current_pageID'>       
                                <input type='hidden' name='pbFormTargetInfo' value='$rowCount \n  $Columni \n $j '>
                                <input type='text' id='yourMessageHP' name='messageFBHP'> "; 

  $pbFormBuilderWrapper = '<form id="'.$pbFormBuilderUniqueId.'" action="'.admin_url('admin-ajax.php?action=ulpb_formBuilderEmail_ajax').'"  method="post"  > '.$pbFormAllFields.'  '.$pbFormBuilderExtraFields.'  '.wp_nonce_field('POPB_send_form_data','POPB_Form_Nonce'). ' '. $pbFormBuilderSubmit.' </form>';

  $pbFormBuilderStylesID = '#'.$pbFormBuilderUniqueId;

  $pbThisFormBuilderStyles = '<style>  '.$pbFormBuilderStylesID.' .pbFormField {   background:'.$widgetPbFbFormFeildOptions['formBuilderFieldBgColor'].';  color:'.$widgetPbFbFormFeildOptions['formBuilderFieldColor'].'; border:'.$widgetPbFbFormFeildOptions['formBuilderFieldBorderWidth'].'px solid '.$widgetPbFbFormFeildOptions['formBuilderFieldBorderColor'].'; border-radius:'.$widgetPbFbFormFeildOptions['formBuilderFieldBorderRadius'].'px; font-family:'.str_replace('+', ' ', $widgetPbFbFormFeildOptions['formBuilderFieldFontFamily'] ).', sans-serif;   }           '.$pbFormBuilderStylesID.' .pbFormLabel{ font-size:'.$widgetPbFbFormFeildOptions['formBuilderLabelSize'].'px; color:'.$widgetPbFbFormFeildOptions['formBuilderLabelColor'].'; display:'.$widgetPbFbFormFeildOptions['formBuilderFieldLabelDisplay'].'; line-height:3em; }  '.$pbFormBuilderStylesID.' button:hover { background:'.$widgetPbFbFormSubmitOptions['formBuilderBtnHoverBgColor'].' !important; color:'.$widgetPbFbFormSubmitOptions['formBuilderBtnHoverTextColor'].' !important; transition:all .5s; } </style>';
  if (!isset($widgetSubscribeFormWidget)) {
    $widgetSubscribeFormWidget = false;
  }
  if ($widgetSubscribeFormWidget !== true) {
    echo "<script src='".ULPB_PLUGIN_URL."/js/cookie.js'></script>";
    $widgetSubscribeFormWidget = true;
  }

  $formSuccessAction = ''; $formSuccessActionURL = '';
  if (isset($widgetPbFbFormEmailOptions['formSuccessAction']) ) {
    $formSuccessAction = $widgetPbFbFormEmailOptions['formSuccessAction'];
    $formSuccessActionURL = $widgetPbFbFormEmailOptions['formSuccessActionURL'];
  }

  ob_start();
  ?>
  <script type="text/javascript">
    (function($){
      $(document).ready(function() {
        $('#yourMessageHP').hide();
      $('#'+'<?php echo $pbFormBuilderUniqueId; ?>').on('submit', function()  {
        var successMessage = "<?php echo $widgetPbFbFormEmailOptions['formSuccessMessage']; ?>";
        var successAction = "<?php echo $formSuccessAction; ?>";
        var successActionUrl = "<?php echo $formSuccessActionURL; ?>";

        var form = $(this);
        var result = " ";
          $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(result){
              var result = JSON.parse(result);
              var emailResult = result['email'];
              var mcResult = result['mailchimp'];
              var grResult = result['getResponse'];
              var cmResult = result['campaignMonitor'];
              var acResult = result['activeCampaign'];
              var dripResult = result['drip'];
              var aweberResult = result['aweber'];
              var convertkitResult = result['convertkit'];

                if (emailResult == 'success') {
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);

                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }

                }else if(mcResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                }else if(grResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                }else if(cmResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                } else if(acResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                }else if(dripResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                }else if(aweberResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                } else if(convertkitResult == 'success'){
                  form.siblings('.pb_success').children('p').html(successMessage);
                  form.siblings('.pb_success').show();
                  $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : 30 });
                  setTimeout(function(){
                    $('.pluginops-modal').fadeOut();
                  } , 2000);
                  if (successAction == 'redirect') {
                    location.href = successActionUrl;
                  }
                } else{
                   form.siblings('.pb_error').children('p').html(emailResult);
                   form.siblings('.pb_error').show();
                }

                console.log('Database Result  : ' + result['database']);
                console.log('MailChimp Result  : ' + result['mailchimp']);
                console.log('GetResponse Result  : ' + result['getResponse']);
                console.log('Campaign Monitor Result  : ' + result['campaignMonitor']);
                console.log('Active Campaign Result  : ' + result['activeCampaign']);
                console.log('Drip Result  : ' + result['drip']);
                console.log('Aweber Result  : ' + result['aweber']);
                console.log('Convertkit Result  : ' + result['convertkit']);
            }
          });
                         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
      });

    });

  })(jQuery);

  </script>
  <?php 

  echo $formBuilderbtnIconHoverAnimationScript;

  $thisFormScript = ob_get_contents();
  ob_end_clean();

  $pb_On_complete_messages = '<div class="w3-panel w3-green pb_success" style="display:none;"><p></p></div>
  <div class="w3-panel w3-red pb_error" style="display:none;"><p></p></div>
';

  if (isset($widgetPbFbFormFeildOptions['formBuilderLabelSizeTablet'])) {
    $thisWidgetResponsiveWidgetStylesTablet = "
      #$pbFormBuilderUniqueId label {
        font-size: ".$widgetPbFbFormFeildOptions['formBuilderLabelSizeTablet']."px !important;
      }
      #$pbFormBuilderUniqueId button {
        font-size: ".$widgetPbFbFormSubmitOptions['formBuilderBtnFontSizeTablet']."px !important;
      }
    ";
    $thisWidgetResponsiveWidgetStylesMobile = "
      #$pbFormBuilderUniqueId label {
        font-size: ".$widgetPbFbFormFeildOptions['formBuilderLabelSizeMobile']."px !important;
      }
      #$pbFormBuilderUniqueId button {
        font-size: ".$widgetPbFbFormSubmitOptions['formBuilderBtnFontSizeMobile']."px !important;
      }
    ";

    array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
    array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);
  }


                



$widgetContent = $pbFormBuilderWrapper . " $pb_On_complete_messages  ". $pbThisFormBuilderStyles . '  '.$thisFormScript;


?>