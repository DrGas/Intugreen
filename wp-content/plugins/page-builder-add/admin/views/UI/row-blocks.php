<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$rowBlockImagesURL = ULPB_PLUGIN_URL.'/images/templates/rowBlocks/';
?>
<div class="lpp_modal_row insertRowBlock" >
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <h1 class="banner-h1">Insert Row Block</h1>
      <div style=" margin: 10px 30px; font-size: 18px; color: #7d7d7d;">
        <label>Filter Blocks </label>
        <select class="rowBlocksFilterSelector">
          <option value="All">All</option>
          <option value="Header">Header</option>
          <option value="Feature">Feature</option>
          <option value="Text">Text</option>
          <option value="Pricing">Pricing Table</option>
        </select>
      </div>
      <div id="rowBlocksContainer">
          <!-- Append Here -->
        
      </div>
    </div>
    <div  id="insertRowBlockClosebutton" class="insertRowBlockClosebutton" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>