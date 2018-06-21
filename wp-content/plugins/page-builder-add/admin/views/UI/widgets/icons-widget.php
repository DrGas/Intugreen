<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
	<br>
	<br>
	<label>Select Icon:  </label>
	<input  data-placement="bottomRight" class="icp pbicp-auto" value="fa-archive" type="text" />
	<span class="input-group-addon pbSelectedIcon pbselIconStyles" style="font-size: 16px;"></span>
	<br><br><hr><br>
	<label>Size: </label>
	<input type="number" class="pbIconSize">
	<br><br><hr><br>
	<label>Rotate: </label>
	<input type="number" class="pbIconRotation">
	<br><br><hr><br>
	<label>Color :</label>
	<input type="text" class="color-picker_btn_two pbIconColor" id="pbIconColor">
	<br><br><hr><br>
	<label>Icon Link :</label>
	<input type="url" class="pbIconLink" id="pbIconLink">
	<br><br><hr><br>

</div>


<style type="text/css">
	.pbicp-auto{
		width: 200px !important;
		font-size: 18px;
	}
	.popover-title > input{
		float: none;
		width:160px !important;
		margin: 0 auto !important;
		display: block !important;
	}
	.input-group-addon{
		font-size: 40px !important;
		margin-right : 20px !important;
		float: none;
	}
	.pbSelectedIcon > i {
		margin-top: 25px !important;
	}
</style>

<script type="text/javascript">
  	jQuery('.pbIconRotation').change(function(){
    	var pbIconRotation = jQuery('.pbIconRotation').val();
    	jQuery('.pbselIconStyles').css('transform','rotate('+pbIconRotation+ 'deg)');
  	});
  	jQuery('.pbIconColor').change(function(){
    	var pbIconColor = jQuery('.pbIconColor').val();
    	jQuery('.pbselIconStyles').css('color',pbIconColor);
  	});

</script>