<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div id="ulpb_dash_container">
	<h2 style="font-size:20px; font-weight: normal;"> <?php _e( 'Page Builder Dashboard', 'page-builder-add' ); ?>  </h2>

	<div class="tabs">
		<ul class="tab-links">
		    <li class="active"><a href="#tab1" class="tab_link"> <?php _e( 'Welcome', 'page-builder-add' ); ?> </a></li>
		    <li><a href="#tab2" class="tab_link"> <?php _e( 'Video Tutorials', 'page-builder-add' ); ?>  </a></li>
        <!--<li><a href="#tabUpdates" class="tab_link">Update Log</a></li> -->
	  </ul>

		<div class="tab-content" style="min-height: 930px;">
			<div id="tab1" class="tab active" > 
				<h2> <?php _e( 'Welcome to Page Builder by PluginOps', 'page-builder-add' ); ?>  </h2>
				<p> <?php _e( 'Thank you for choosing the Page Builder plugin and welcome to the community. Find some useful information below and learn how to create beautiful pages in minutes.', 'page-builder-add' ); ?>  </p>
				<br>
				<h3> <?php _e( 'Getting Started - Build Your First Standalone Landing Page', 'page-builder-add' ); ?> </h3>
        <br>
        <a href="<?php echo admin_url('post-new.php?post_type=ulpb_post'); ?>" target="_blank" style="font-size:14px; font-weight: bold;"><?php _e( 'Page Builder - Add New Landing Page', 'page-builder-add' ); ?></a>
        <p> <?php _e( 'Ready to start creating pages ? Jump into the page builder by clicking the Add new Page button under the Page builder menu.', 'page-builder-add' ); ?> </p>
        <br>
        <br>
        <div style="float: left; width: 60%;">
        <h3><?php _e( 'Or Build a Simple Page With your Theme\'s Wrapper ', 'page-builder-add' ); ?> </h3>
        <br>
        <a href="<?php echo admin_url('post-new.php?post_type=page'); ?>" target="_blank" style="font-size:14px; font-weight: bold;"><?php _e( 'Pages - Add New Page', 'page-builder-add' ); ?> </a>
        <p><?php _e( 'Add new Page and jump into the page builder by clicking the Switch to Page Builder tab.', 'page-builder-add' ); ?> </p>
        </div>
        <div style='width: 40%; float: right;'><img src="<?php echo ULPB_PLUGIN_URL.'/images/dashboard/page-builder-menu-pointer.png'; ?>" style='width:90%;'></div>
        <br>
        <br>
        <div style="float: left; width: 100%;">
          <hr>
          <br>
          <h2><?php _e( 'User Guide', 'page-builder-add' ); ?> </h2>
          <br>
          <h3><?php _e( 'PluginOps Page Builder - Documentation', 'page-builder-add' ); ?> </h3>
          <a href="https://pluginops.com/docs/home" target="_blank"> <?php _e( 'PluginOps Page Builder - Docs Home', 'page-builder-add' ); ?>  </a>
          <br><br>
          <h3><?php _e( 'PluginOps Page Builder - Getting Started Usage Guide', 'page-builder-add' ); ?> </h3>
          <a href="https://pluginops.com/pluginops-page-builder-docs-getting-started/" target="_blank"> <?php _e( 'PluginOps Page Builder - Getting Started', 'page-builder-add' ); ?>  </a>
          <br><br>
          <h3><?php _e( 'Page not found error - Fix', 'page-builder-add' ); ?> </h3>
          <a href="http://pluginops.com/fix-404-page-not-found-error-wordpress/" target="_blank"><?php _e( 'How to fix page not found error.', 'page-builder-add' ); ?> </a>
        </div>
      </div>
      <div id="tab2" class="tab" style="background: #F3F6F8;">
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/or8liQOYCLs" frameborder="0" allowfullscreen></iframe>
          <h3>Quick Tour</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/VozvCV-xLro" frameborder="0" allowfullscreen></iframe>
          <h3>Intro to Rows, Columns & Widgets</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/YX7aQW47Nkk" frameborder="0" allowfullscreen></iframe>
          <h3>How To Add Forms</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/a0yb1Ce2ac8" frameborder="0" allowfullscreen></iframe>
          <h3>How To Add Pricing Table</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/6tHjM3SxDa8" frameborder="0" allowfullscreen></iframe>
          <h3>How to use templates</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/5oRCB-7dZkY" frameborder="0" allowfullscreen></iframe>
          <h3>What is Margin & Padding</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/3rK4jL3oTRs" frameborder="0" allowfullscreen></iframe>
          <h3> Design A Landing Page</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/6W42KjrxM58" frameborder="0" allowfullscreen></iframe>
          <h3> Fix WordPress Page Not Found Error </h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/39oK8mFVMnA" frameborder="0" allowfullscreen></iframe>
          <h3> How To Create Full Page Slider </h3>
        </div>
      </div>
      <div id="tabUpdates" class="tab">
        <h3>V. 1.5.4</h3> 
        <li>Whole New UI With Live Changes Preview</li>
        <li>Added WooCommerce Widget</li>
        <br>
        <br>
        <hr>

        <h3>V. 1.4.2</h3> 
        <li>Body Padding bug fixed.</li>
        <li>Added Two new Templates</li>
        <li>Added Icons, Cards & Audio widget.</li>
        <li>Editor Bug fixes.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.3.1</h3> 
        <li>Duplicate and insert other page templates (With Same Content)</li>
        <li>Side Panel Moved in collapsible container.</li>
        <li>Duplicate Row Bug Fix</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.8</h3>
        <li> Drag and drop Widgets.</li>
        <li> Duplicate and delete widgets from front panel.</li>
        <li> New templates.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.6</h3>
        <li> Set Video as background of rows.</li>
        <li> Set the opacity of colors.</li>
        <li> Page duplication Bug Fixed.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.5</h3>
        <li>4 New Templates Added.</li>
        <li>Video Widget Added.</li>
        <li>Responsive Navigations.</li>
        <br>
        <br>
        <h3>V. 1.2.3</h3>
        <li>Added Subscribe Form Widget.</li>
        <li>Fixed Responsiveness of templates.</li>
        <br>
        <br>
        <hr>
      </div>
		</div>
	</div>
</div>

<style type="text/css">
	.tab_link{
  text-decoration:none;
}
.tabs {
  width:auto;
  display:inline-block;
}
 
   
.tab-links:after {
  display:block;
  clear:both;
  content:'';
}

.video-card{
  display: inline-block;
  max-width:660px;
  max-height:500px;
  background: #fff;
  border:1px solid #d3d3d3;
  text-align: center;
  margin-right: 15px;
  margin-bottom: 40px;
}
.tab-links li {
  margin:0px 5px;
  float:left;
  list-style:none;
}

.tab-links a {
  padding:9px 20px;
  display:inline-block;
  border-radius:7px 7px 0px 0px;
  background:#7fc9fb;
  font-size:16px;
  font-weight:600;
  color:#fff;
  transition:all linear 0.15s;
}
 
.tab-links a:hover {
background:#2fa8f9;
text-decoration:none;
}
 
li.active a, li.active a:hover {
  background:#fff;
  color:#2fa8f9;
}
 

.tab-content {
  border-radius:3px;
  box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
  background:#fff;
}
 
.tab {
	padding: 20px 40px;
  display:none;
  min-width: 60%;
  min-height: 600px
}
 
.tab.active {
  display:block;
}

body{
  background: #F3F6F8 !important;
}


</style>

<script type="text/javascript">
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
</script>