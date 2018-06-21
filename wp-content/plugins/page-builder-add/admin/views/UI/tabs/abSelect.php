<?php if ( ! defined( 'ABSPATH' ) ) exit;?>

<div class="tabs">
  <ul class="tab-links">
    <li class="active"><a href="#selectVariantTab" class="tab_link">Select Variant</a></li>
    <li><a href="#tabAbAnalytics" class="tab_link">Analytics</a></li>
  </ul>
  <div class="tab-content" style="overflow: hidden;">
    <div id="selectVariantTab" class="tab active">
    	<?php
    	
		$AB_ULPB_args = array(
			'post_type' => 'ulpb_post',
			'orderby' => 'date',
			'post_status'	=> 'any',
			'posts_per_page'	=> 100,
		);

		$AB_ULPB_PrevPosts = get_posts( $AB_ULPB_args );
		echo "<br> <p style='  font-size:18px; font-family:tahoma; margin-left: 50px; line-height:2.5em;'> Test with two different variations of page to see which one performs better. To get started select the second variant template from drop down below. <span>(When you select the preview of selected page will be displayed below.)</span> Then click on save button to save the changes.</p>";
		echo "<br><br><br> <form class='insertTemplateForm' >
				<label style='margin-right:7%;'> Select the second variant page. </label>
			 	<select class='VariantB_ID' name='VariantB_ID'>
		        <option value='none' > Disable A/B Testing </option>
		";
		foreach ($AB_ULPB_PrevPosts as  $ulpost) {
			$currentPostId = $ulpost->ID;
			$currentPostName = get_the_title( $currentPostId);
			$currentPostLink = get_permalink($currentPostId);
			echo "<option value='$currentPostId' data-pagelink='$currentPostLink' > $currentPostName </option>";
		}

		echo "</select> 
		<input type='hidden' value='$postId' name='pageToUpdate'>
		</form>";
		?>
		<br><br> <p class="upt_response"></p>
		<div id="iframePreviewB" style="margin:3% 3% 3% 0%; background: #333; padding: 15px; min-height: 500px; min-width:100%;"> </div>
		<script type="text/javascript">
		    jQuery('.VariantB_ID').on('change',function(e) {
		    	var selectedOption = jQuery(this).find('option:selected');
		    	var OptionValue = selectedOption.data('pagelink');
		    	jQuery('#iframePreviewB').html('<iframe src='+OptionValue+' style="width:98%; min-height:750px;" ></iframe>');
		    });
		</script>
    </div>
    <div id="tabAbAnalytics" class="tab">
    	
    	<?php
    	$data = get_post_meta( $postId, 'ULPB_DATA', true );

		if (isset($data['pageOptions']['VariantB_ID'])) {

		  $VariantB_ID = $data['pageOptions']['VariantB_ID'];

		}
	    $VariantA_subscribers_list = get_post_meta($postId,'ssm_subscribers_list',true);
	    $VariantB_subscribers_list = get_post_meta($VariantB_ID,'ssm_subscribers_list',true);
	    //update_post_meta( $postId, 'ssm_subscribers_list', '', $unique = false);
	    //var_dump($VariantA_subscribers_list);

		?>
		<div style='padding:50px; margin:0 auto; margin-top:50px; font-family:sans-serif,arial;font-size:17px; display: inline-block; width: 43%;'>
			<h3 style="background: #03A9F4;color: #fff;width: 50%;padding: 10px;">Variant A Conversions </h3>

			<?php $VAcount = 0;
				if (!empty($VariantA_subscribers_list) ) {
					foreach ( $VariantA_subscribers_list as $ssm_result ) { $VAcount++; } 
				}
				 ?>
				 <h3 id="conversionCounterVA"> <?php echo $VAcount;   ?></h3>
			<h3>Variant A Page Unique Views : <?php echo get_post_meta( $postId, 'ulpb_page_hit_counter', true ); ?></h3>
			<br>
			<hr>
			<h3>Variant A Page Total Visits : <?php echo get_post_meta( $postId, 'ulpb_page_views_counter', true ); ?></h3>
		</div>

		<div style='padding:50px; margin:0 auto; margin-top:50px; font-family:sans-serif,arial;font-size:17px; display: inline-block; width: 43%;'>
			<h3 style="background: #03A9F4;color: #fff;width: 50%;padding: 10px;">Variant B Conversions </h3>

			<?php
			if (!empty($VariantB_ID)) {
			
			
			 $VBcount = 0;
				if (!empty($VariantB_subscribers_list) ) {
					foreach ( $VariantB_subscribers_list as $ssm_result ) { $VBcount++; }
				}
				 ?>
				 <h3 id='conversionCounterVB' > <?php echo $VBcount;   ?></h3>
			<h3>Variant B Page Unique Views : <?php echo get_post_meta( $VariantB_ID, 'ulpb_page_hit_counter', true ); ?></h3>

			<br>
			<hr>
			<h3>Variant B Total Page Visits : <?php echo get_post_meta( $VariantB_ID, 'ulpb_page_views_counter', true ); ?></h3>

			<?php } else{ echo "<h3>Variant B not selected.<h3>";} ?>
		</div>

		<p> <i>Note : </i> These conversions are only from the Page Builder Form. (If you are using some other form for collecting conversions its analytics will not be visible here.)</p>
    </div>
  </div>
  <br>
</div>

<style type="text/css">
	#conversionCounterVA, #conversionCounterVB {
		padding: 50px 65px 50px 25px;
	    border: 14px solid #03a9f4;
	    border-radius: 200px;
	    color: #03a9f4;
	    max-width: 25px;
	    background: transparent;
	    font-size: 40px;

	}
</style>

<script> 
	(function($) {

	/**
	 * Copyright 2012, Digital Fusion
	 * Licensed under the MIT license.
	 * http://teamdf.com/jquery-plugins/license/
	 *
	 * @author Sam Sehnert
	 * @desc A small plugin that checks whether elements are within
	 *     the user visible viewport of a web browser.
	 *     only accounts for vertical position, not horizontal.
	 */

	$.fn.visible = function(partial) {
	  
	    var $t            = $(this),
	        $w            = $(window),
	        viewTop       = $w.scrollTop(),
	        viewBottom    = viewTop + $w.height(),
	        _top          = $t.offset().top,
	        _bottom       = _top + $t.height(),
	        compareTop    = partial === true ? _bottom : _top,
	        compareBottom = partial === true ? _top : _bottom;
	  
	  return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

	};
	  
	})(jQuery);

	var conversionCounterVAcount = jQuery('#conversionCounterVA').html();
	var conversionCounterVBcount = jQuery('#conversionCounterVB').html();



                jQuery(window).scroll(function(event){
                  jQuery('#conversionCounterVA').each(function (i, el){
                    var el = jQuery(el);
                    if (el.visible(true)) {
                      el.html(conversionCounterVAcount);
                      var currElementCounter = el; 
                      jQuery({ Counter: 0 }).animate({ 
                        Counter: currElementCounter.text() 
                      },
                      { 
                        duration: 1000, easing: 'swing',
                        step: function () { currElementCounter.text(Math.ceil(this.Counter)); 
                      }
                      });
                    }
                  });

                  jQuery('#conversionCounterVB').each(function (i, el){
                    var el = jQuery(el);
                    if (el.visible(true)) {
                      el.html(conversionCounterVBcount);
                      var currElementCounter = el; 
                      jQuery({ Counter: 0 }).animate({ 
                        Counter: currElementCounter.text() 
                      },
                      { 
                        duration: 1000, easing: 'swing',
                        step: function () { currElementCounter.text(Math.ceil(this.Counter)); 
                      }
                      });
                    }
                  }); 
                });
</script>