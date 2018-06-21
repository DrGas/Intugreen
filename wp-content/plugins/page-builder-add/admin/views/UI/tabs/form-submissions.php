<?php if ( ! defined( 'ABSPATH' ) ) exit;

if (function_exists('ULPB_formBuilder_database_renderFormDataTable')) {
  echo ULPB_formBuilder_database_renderFormDataTable($post->ID);
}else{
	echo "<h1> Please get Form Builder Database extension to access all the submissions. </h1>";
}

?>