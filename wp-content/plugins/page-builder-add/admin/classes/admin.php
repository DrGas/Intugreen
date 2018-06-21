<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class ULPB_AdminClass {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		global $pagenow;
		if ( 'plugins.php' === $pagenow ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'POPB_feedback_load_scripts' ) );
			add_action( 'admin_footer', array( $this, 'POPB_deactivation_feedback_form' ) );
		}
	}

	function _hooks(){
		
		add_action( 'init', array( $this, 'ulpb_register_page_builder_post_types' ) );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ));

		add_action('edit_form_after_title' ,array( $this, 'wssf_custom_UI_without_metabox' ));

		add_action('admin_print_scripts', array($this,'ulpb_disable_autosave_cpt') );


		add_action( 'pre_get_posts', array($this,'pbp_custom_parse_request_tricksy') );
		
		add_filter( 'single_template', array( $this,'ulpb_main_front_html') );
		//add_filter( 'get_pages', array($this,'add_pbp_tabs_to_dropdown') );
		add_filter( 'hidden_meta_boxes',array($this,'remove_meta_boxes_all'),10, 3 );

		add_filter( 'post_type_link', array($this,'pbp_custom_remove_cpt_slug'), 10, 3 );

		add_filter('template_redirect', array($this,'replace_default_front_page') );

		add_filter('manage_ulpb_post_posts_columns', array($this,'ulpb_columns_admin') );

		add_action('manage_ulpb_post_posts_custom_column',array($this,'ulpb_column_visitors_data'),10, 2);
		add_action('manage_ulpb_post_posts_custom_column',array($this,'ulpb_front_page_column'),10, 2);
		

		add_action('admin_menu',array($this,'ulpb_menupages_add') );

		add_shortcode( 'pb_samlple_nav', array($this,'pb_shortcode_sample_nav'
		) );

	}

	function _filters(){
		add_filter('the_content',array($this,'ulpb_pagebuilder_content_filter'), 25 );
	}


	function POPB_feedback_load_scripts() {
		wp_enqueue_style( 'wp-jquery-ui-dialog' );
		wp_enqueue_script( 'POPB_Send_feedback',ULPB_PLUGIN_URL.'/js/get-feedback.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ), false, true );
		wp_localize_script( 'POPB_Send_feedback', 'POPB_feedback_URL',array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) ) );
	}


	function POPB_deactivation_feedback_form() {
		/*
			Code Snippet from POST SMTP : https://wordpress.org/plugins/post-smtp/
			License : GPL V2
		*/
			$pb_current_user = wp_get_current_user(); 
		?>
		<div id="POPB_feedback_form_container" style="display: none;">
			<p>
				<b>It is really sad to see you leaving me. 😢 <br>
				I would love to get a small feedback from you. </b>
			</p>
			<form>
				<?php wp_nonce_field(); ?>
				<ul id="POPB-deactivate-reasons">

					<li class="POPB-reason">
						<label>
							<span><input value="Plugin is not good" type="radio" name="reason" checked="checked" /></span>
							<span>Plugin is not good</span>
						</label>					
					</li>
					<li class="POPB-reason">
						<label>
							<span><input value="bad support" type="radio" name="reason" /></span>
							<span>Bad Support</span>
						</label>					
					</li>				
					<li class="POPB-reason POPB-custom-input">
						<label>
							<span><input value="Found a better plugin" type="radio" name="reason" /></span>
							<span>Found a better plugin</span>
						</label>				
					</li>
					<li class="POPB-reason POPB-custom-input">
						<label>
							<span><input value="The plugin didn't work" type="radio" name="reason" /></span>
							<span>The plugin didn't work</span>
						</label>					
					</li>					
					<li class="POPB-reason POPB-custom-input">
						<label>
							<span><input value="Other Reason" type="radio" name="reason" /></span>
							<span>Other Reason</span>
						</label>
					</li>
					<li class="POPB-reason POPB-support-input">
						<label>
							<span><input value="Support Ticket" type="radio" name="reason" /></span>
							<span>Open A support ticket for me</span>
						</label>
						<div class="POPB-reason-input" style="display: none;">
							<input type="email" name="support[email]" placeholder="Your Email Address" required>
							<input type="text" name="support[title]" placeholder="The Title" required>
							<textarea name="support[text]" placeholder="Describe the issue" required></textarea>
						</div>
					</li>
					<li class="POPB-reason">
						<label>
							<span><input type="checkbox" value="<?php echo($pb_current_user->user_email) ?>" name="followUpEmail"  checked /></span>
							<span>Share your email address. (We can get in touch with you to fix this)</span>
						</label>
					</li>																			
				</ul>
				<div class="POPB-reason-input" style="display: none;">
					<input type="text" class="regular-text" name="other_input" placeholder="Do you mind help and give more detailes?">
				</div>				
			</form>
		</div>
		<style type="text/css">
			.POPB_feedback_form_form .ui-dialog-buttonset {
				float: none !important;
			}

			#POPB_feedback_form_go {
				float: left;
			}

			#POPB_feedback_form_skip, #POPB_feedback_form_cancel {
				float: right;
			}

			#POPB_feedback_form_container p {
				font-size: 1.1em;
			}

			.POPB-reason-input textarea {
				margin-top: 10px;
				width: 100%;
				height: 150px;
			}

			.POPB_feedback_form_form .ui-icon {
				display: none;
			}

			#POPB_feedback_form_go.POPB-ajax-progress .ui-icon {
				text-indent: inherit;
				display: inline-block !important;
				vertical-align: middle;
				animation: rotate 2s infinite linear;
			}

			#POPB_feedback_form_go.POPB-ajax-progress .ui-button-text {
				vertical-align: middle;
			}			

			@keyframes rotate {
			  0%    { transform: rotate(0deg); }
			  100%  { transform: rotate(360deg); }
			}			
		</style>
	<?php
	}


function ulpb_register_page_builder_post_types() {

	$labels_one = array(
		'name'                => __( 'Landing Pages by PluginOps Page Builder', 'page-builder-add' ),
		'singular_name'       => __( 'Landing Page', 'page-builder-add' ),
		'all_items'       	  => __( 'Landing Pages', 'page-builder-add' ),
		'add_new'             => _x( 'Add New Page', 'page-builder-add', 'page-builder-add' ),
		'add_new_item'        => __( 'Add New Page', 'page-builder-add' ),
		'edit_item'           => __( 'Edit Page', 'page-builder-add' ),
		'new_item'            => __( 'New Page', 'page-builder-add' ),
		'view_item'           => __( 'View Page', 'page-builder-add' ),
		'search_items'        => __( 'Search Pages', 'page-builder-add' ),
		'not_found'           => __( 'No Pages found', 'page-builder-add' ),
		'not_found_in_trash'  => __( 'No Pages found in Trash', 'page-builder-add' ),
		'parent_item_colon'   => __( 'Parent Page:', 'page-builder-add' ),
		'menu_name'           => __( 'Landing Page Builder', 'page-builder-add' ),
	);

	$args_one = array(
		'labels'              => $labels_one,
		'hierarchical'        => false,
		'description'         => 'Add Pages',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => ULPB_PLUGIN_URL.'/images/dashboard/page-builder-templates-icon.png',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title'
			)
	);

	register_post_type( 'ulpb_post', $args_one );


}

function ulpb_disable_autosave_cpt(){
    global $post;
    global $pagenow;

    if ('post.php' == $pagenow || 'post-new.php' == $pagenow) {
    	
    
	    if(get_post_type($post->ID) === 'ulpb_post'){
	        wp_deregister_script('autosave');
	    }

	    $selectedPostTypes = get_option( 'page_builder_SupportedPostTypes' );

		if (!is_array($selectedPostTypes)) {
			$selectedPostTypes = array();
		}
		
		if (in_array($post->post_type , $selectedPostTypes, false) ) {

			$ispbactive = get_post_meta( $post->id, 'ulpb_page_builder_active', false );

			if ($ispbactive == true) {
				wp_deregister_script('autosave');
			}
			
		}

	}
}

function pbp_custom_remove_cpt_slug( $post_link, $post, $leavename ) {
 
    if ( 'ulpb_post' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
 
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
 
    return $post_link;
}

function pbp_custom_parse_request_tricksy( $query ) {
 
    if ( ! $query->is_main_query() )
        return;
 
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'ulpb_post', 'page' ) );
    }
}


function load_admin_scripts( ) {
	global $pagenow;
	$screen_id = get_current_screen();

	$screenIDsToShow = array('ulpb_post','ulpb_global_rows');

	if ('post.php' == $pagenow || 'post-new.php' == $pagenow || 'edit.php' == $pagenow) {
	
		if (in_array($screen_id->post_type  , $screenIDsToShow, false) ){
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'underscore');
			wp_enqueue_script( 'backbone');
			wp_enqueue_style( 'wp-color-picker' );
			//wp_enqueue_script( 'jquery-ui');
			wp_enqueue_script( 'wssf-backbone-builder-jqueryUI', ULPB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-undo-script', ULPB_PLUGIN_URL.'/js/Backbone-resources/undo.js', array( 'backbone' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-collectionView', ULPB_PLUGIN_URL.'/js/Backbone-resources/backbone.collectionView.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-pbb-model-1', ULPB_PLUGIN_URL.'/admin/scripts/pbb-model-1.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-pbb-model-2', ULPB_PLUGIN_URL.'/admin/scripts/pbb-model-2.js', array( 'jquery' ), false, true );
			
			wp_enqueue_script( 'wssf-backbone-builder-script-bb3', ULPB_PLUGIN_URL.'/admin/scripts/bb3.js', array( 'jquery' ), false, true );

			wp_enqueue_script( 'wssf-backbone-builder-script-widget-render', ULPB_PLUGIN_URL.'/admin/scripts/widget-render.js', array( 'jquery' ), false, true );

			wp_enqueue_script( 'wssf-backbone-builder-script-widget-render', ULPB_PLUGIN_URL.'/admin/scripts/widget-render.js', array( 'jquery' ), false, true );
			
			wp_enqueue_script( 'wssf-backbone-builder-script-row-view', ULPB_PLUGIN_URL.'/admin/scripts/row-view.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-widget-view', ULPB_PLUGIN_URL.'/admin/scripts/widget-view.js', array( 'jquery' ), false, true );
			wp_localize_script( 'wssf-backbone-builder-script-widget-view', 'widgetViewLinks',array( 'templatesFolder' => ULPB_PLUGIN_URL.'/admin/scripts/templates/', 'pluginsUrl' => ULPB_PLUGIN_URL ) );
			wp_enqueue_script( 'wssf-backbone-builder-script-save-page', ULPB_PLUGIN_URL.'/admin/scripts/save-page.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-new-row', ULPB_PLUGIN_URL.'/admin/scripts/new-row.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-side-panel', ULPB_PLUGIN_URL.'/admin/scripts/side-panel.js', array( 'jquery' ), false, true );

			wp_enqueue_style( 'wp-color-picker' );

			if ( is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
				
			}else{
				wp_enqueue_script( 'wssf-backbone-builder-script-bb4', ULPB_PLUGIN_URL.'/admin/scripts/bb4.js', array( 'jquery' ), false, true );
				wp_localize_script( 'wssf-backbone-builder-script-bb4', 'bbfourLinks',array( 'templatesFolder' => ULPB_PLUGIN_URL.'/admin/scripts/templates/', 'pluginsUrl' => ULPB_PLUGIN_URL ) );
			}
			
			wp_enqueue_script( 'wssf-backbone-builder-script_collectionView', ULPB_PLUGIN_URL.'/admin/scripts/pbb-CollectionView.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-pbb-drag-n-drop', ULPB_PLUGIN_URL.'/admin/scripts/pbb-drag-n-drop.js', array( 'jquery' ), false, true );
			
			wp_enqueue_style( 'wssf-backbone-builder-jqueryUI-style', ULPB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css' );
			wp_enqueue_style( 'wssf-adminUI-styling', ULPB_PLUGIN_URL.'/styles/admin-style.css' );
			wp_enqueue_style( 'wssf-adminUI-animations', ULPB_PLUGIN_URL.'/public/templates/animate.min.css' );

		    wp_enqueue_script( 'wssf-color-picker-script', ULPB_PLUGIN_URL.'/js/alpha-picker.js', array( 'wp-color-picker' ), false, true );
		    wp_enqueue_script( 'wssf-imgUpload-script', ULPB_PLUGIN_URL.'/js/image-upload.js', array( 'jquery' ), false, true );
		    wp_enqueue_script( 'wssf-faIconPicker-script', ULPB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );
		    wp_enqueue_style( 'wssf-faIconPicker-styling', ULPB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.css' );

		    wp_enqueue_script( 'wssf-countdown-script', ULPB_PLUGIN_URL.'/js/countdown.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-countdowntimezone-script', ULPB_PLUGIN_URL.'/js/moment.min.js', array( 'jquery' ), false, true );
		    wp_enqueue_script( 'ulpb-countdowntzdata-script', ULPB_PLUGIN_URL.'/js/moment-timezone-with-data-2010-2020.min.js', array( 'jquery' ), false, true );
		    
		    wp_enqueue_script( 'wssf-imageSliderWidget-script', ULPB_PLUGIN_URL.'/js/slider.min.js', array( 'jquery' ), false, true );


		    wp_enqueue_script( 'wssf-carousel-script', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.js', array( 'jquery' ), false, true );
		    wp_enqueue_style( 'wssf-carousel-styling', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.css' );
		    wp_enqueue_style( 'wssf-carousel-theme', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.theme.css' );
		    wp_enqueue_style( 'wssf-carousel-transitions', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.transitions.css' );

		    wp_enqueue_script( 'ulpb-g-font-selector', ULPB_PLUGIN_URL.'/js/g-font-family.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-pen-editor-js-script', ULPB_PLUGIN_URL.'/js/pen-editor/src/pen.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-pen-editor-js-script', ULPB_PLUGIN_URL.'/js/pen-editor/src/markdown.js', array( 'jquery' ), false, true );

		    wp_enqueue_style( 'ulpb-pen-editor-js-style', ULPB_PLUGIN_URL.'/js/pen-editor/src/pen.css' );

		}

	}

	wp_register_script( 'ulpbExt_menu_old_forms_enqueue', ULPB_PLUGIN_URL.'/js/menu.js', array( 'jquery' ), false, true );

	if ( is_plugin_active( 'page-builder-add-embed-anywhere-template-extension/page-builder-add-anywhere-template.php' ) || is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
	  	$smfb_extension_pack_active = 'true';
	}else{
		$smfb_extension_pack_active = 'false';
	}

	wp_localize_script( 'ulpbExt_menu_old_forms_enqueue', 'ulpb_oldf_site_url',  array( 'siteurl' => admin_url().'edit.php?post_type=subscribe_me_forms', 'premActive'=> $smfb_extension_pack_active, 'newformsurl' => admin_url().'edit.php?post_type=ulpb_post', ) );

	wp_enqueue_script( 'ulpbExt_menu_old_forms_enqueue' );

}

function wssf_custom_UI_without_metabox($post){
	global $post;

	$screen_id = get_current_screen();


	$selectedPostTypes = get_option( 'page_builder_SupportedPostTypes' );

	if (!is_array($selectedPostTypes)) {
		$selectedPostTypes = array();
	}
	
	if (in_array($screen_id->post_type  , $selectedPostTypes, false) ) {

		include_once(ULPB_PLUGIN_PATH.'/admin/views/admin-ui-pageType.php');

		$checkPbActive = get_post_meta( $post->ID, 'ulpb_page_builder_active', true );
		if ($checkPbActive === 'true') {

			include(ULPB_PLUGIN_PATH.'/admin/views/UI/admin-ui.php');
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'underscore');
			wp_enqueue_script( 'backbone');
			wp_enqueue_style( 'wp-color-picker' );
			//wp_enqueue_script( 'jquery-ui');
			wp_enqueue_script( 'wssf-backbone-builder-jqueryUI', ULPB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.js', array( 'jquery' ), false, false );
			wp_enqueue_script( 'wssf-backbone-builder-undo-script', ULPB_PLUGIN_URL.'/js/Backbone-resources/undo.js', array( 'backbone' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-collectionView', ULPB_PLUGIN_URL.'/js/Backbone-resources/backbone.collectionView.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-pbb-model-1', ULPB_PLUGIN_URL.'/admin/scripts/pbb-model-1.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-pbb-model-2', ULPB_PLUGIN_URL.'/admin/scripts/pbb-model-2.js', array( 'jquery' ), false, true );
			
			wp_enqueue_script( 'wssf-backbone-builder-script-bb3', ULPB_PLUGIN_URL.'/admin/scripts/bb3.js', array( 'jquery' ), false, true );

			wp_enqueue_script( 'wssf-backbone-builder-script-widget-render', ULPB_PLUGIN_URL.'/admin/scripts/widget-render.js', array( 'jquery' ), false, true );
			
			wp_enqueue_script( 'wssf-backbone-builder-script-row-view', ULPB_PLUGIN_URL.'/admin/scripts/row-view.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-widget-view', ULPB_PLUGIN_URL.'/admin/scripts/widget-view.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-save-page', ULPB_PLUGIN_URL.'/admin/scripts/save-page.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-new-row', ULPB_PLUGIN_URL.'/admin/scripts/new-row.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-side-panel', ULPB_PLUGIN_URL.'/admin/scripts/side-panel.js', array( 'jquery' ), false, true );

			wp_enqueue_style( 'wp-color-picker' );

			if ( is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
				
			}else{
				wp_enqueue_script( 'wssf-backbone-builder-script-bb4', ULPB_PLUGIN_URL.'/admin/scripts/bb4.js', array( 'jquery' ), false, true );
				wp_localize_script( 'wssf-backbone-builder-script-bb4', 'bbfourLinks',array( 'templatesFolder' => ULPB_PLUGIN_URL.'/admin/scripts/templates/', 'pluginsUrl' => ULPB_PLUGIN_URL ) );
			}
			
			wp_enqueue_script( 'wssf-backbone-builder-script_collectionView', ULPB_PLUGIN_URL.'/admin/scripts/pbb-CollectionView.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wssf-backbone-builder-script-pbb-drag-n-drop', ULPB_PLUGIN_URL.'/admin/scripts/pbb-drag-n-drop.js', array( 'jquery' ), false, true );
			
			wp_enqueue_style( 'wssf-backbone-builder-jqueryUI-style', ULPB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css' );
			wp_enqueue_style( 'wssf-adminUI-styling', ULPB_PLUGIN_URL.'/styles/admin-style.css' );
			wp_enqueue_style( 'wssf-adminUI-animations', ULPB_PLUGIN_URL.'/public/templates/animate.min.css' );

		    wp_enqueue_script( 'wssf-color-picker-script', ULPB_PLUGIN_URL.'/js/alpha-picker.js', array( 'wp-color-picker' ), false, true );
		    wp_enqueue_script( 'wssf-imgUpload-script', ULPB_PLUGIN_URL.'/js/image-upload.js', array( 'jquery' ), false, true );
		    wp_enqueue_script( 'wssf-faIconPicker-script', ULPB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );
		    wp_enqueue_style( 'wssf-faIconPicker-styling', ULPB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.css' );

		    wp_enqueue_script( 'wssf-countdown-script', ULPB_PLUGIN_URL.'/js/countdown.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-countdowntimezone-script', ULPB_PLUGIN_URL.'/js/moment.min.js', array( 'jquery' ), false, true );
		    wp_enqueue_script( 'ulpb-countdowntzdata-script', ULPB_PLUGIN_URL.'/js/moment-timezone-with-data-2010-2020.min.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'wssf-imageSliderWidget-script', ULPB_PLUGIN_URL.'/js/slider.min.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'wssf-carousel-script', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.js', array( 'jquery' ), false, true );
		    wp_enqueue_style( 'wssf-carousel-styling', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.css' );
		    wp_enqueue_style( 'wssf-carousel-theme', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.theme.css' );
		    wp_enqueue_style( 'wssf-carousel-transitions', ULPB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.transitions.css' );

		    wp_enqueue_script( 'ulpb-g-font-selector', ULPB_PLUGIN_URL.'/js/g-font-family.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-pen-editor-js-script', ULPB_PLUGIN_URL.'/js/pen-editor/src/pen.js', array( 'jquery' ), false, true );

		    wp_enqueue_script( 'ulpb-pen-editor-js-script', ULPB_PLUGIN_URL.'/js/pen-editor/src/markdown.js', array( 'jquery' ), false, true );

		    wp_enqueue_style( 'ulpb-pen-editor-js-style', ULPB_PLUGIN_URL.'/js/pen-editor/src/pen.css' );

		}
	}
	if ($screen_id->post_type === 'ulpb_post' || $screen_id->post_type === 'ulpb_global_rows'){
		include_once(ULPB_PLUGIN_PATH.'/admin/views/UI/admin-ui-redirect.php');
	}
	
} /// wssf_custom_UI_without_metabox ends here










// Render Template
function ulpb_main_front_html($single_template) {
     global $post;
     //$ulpb_template_select = get_post_meta($post->ID,'ulpb_template_select',true);

    $ulpb_template = ULPB_PLUGIN_PATH.'public/templates/template.php';
  
     if ($post->post_type == 'ulpb_post' || $post->post_type === 'ulpb_global_rows') {
          $single_template = $ulpb_template;
     }
     return $single_template;
}



function remove_meta_boxes_all( $hidden, $screen, $use_defaults ){
    global $wp_meta_boxes;
    $cpt = 'ulpb_post'; // Modify this to your needs!

    if( $cpt === $screen->id || $screen->id === 'ulpb_global_rows' && isset( $wp_meta_boxes[$cpt] ) )
    {
        $tmp = array();
        foreach( (array) $wp_meta_boxes[$cpt] as $context_key => $context_item )
        {
            foreach( $context_item as $priority_key => $priority_item )
            {
                foreach( $priority_item as $metabox_key => $metabox_item )
                    $tmp[] = $metabox_key;
            }
        }
        $hidden = $tmp;  // Override the current user option here.
    }
    return $hidden;
}

/*
function add_pbp_tabs_to_dropdown( $pages ){
    $args = array(
        'post_type' => 'ulpb_post'
    );
    $items = get_posts($args);
    $pages = array_merge($pages, $items);

    return $pages;
}
*/



function replace_default_front_page() {

    $args = array(
        'offset'           => 0,
        'posts_per_page'   => 100,
        'orderby'          => 'date',
        'order'            => 'ASC',
        'post_type'        => 'ulpb_post',
        'post_status'      => 'publish',
    );
    
    $ulpb_pages = get_posts( $args );

    if (!empty($ulpb_pages)) {
        foreach ($ulpb_pages as $post) {
            $currentID = $post->ID;
            $ulpb_is_front_page = get_post_meta( $currentID, 'ULPB_FrontPage', true );

            if ($ulpb_is_front_page === 'true') {
	            $ulpb_template_select = get_post_meta($currentID,'ULPB_FrontPage',true);
	            $ulpb_template = ULPB_PLUGIN_PATH.'public/templates/template.php';
	            
	            if (is_home() || is_front_page() ) {
	                    include($ulpb_template);
	                    exit();

	            }
    		}

   	 	}

    }

}


function ulpb_columns_admin($defaults) {
    $date = $defaults['date'];
    unset($defaults['date']);
    $defaults['ulpb_visitors']  = __('Visitor Count','page-builder-add');
    $defaults['ulpb_front_page'] =  __('Front Page','page-builder-add');

    if (is_plugin_active( 'page-builder-add-embed-anywhere-template-extension/page-builder-add-anywhere-template.php' ) || is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
    	$defaults['ulpb_template_shortcode']  = __('Template Shortcode','page-builder-add');
    }

    $defaults['date'] = $date;

    return $defaults;
}


function ulpb_column_visitors_data($column_name, $post_ID) {
    if ($column_name == 'ulpb_visitors') {
        $current_count = get_post_meta($post_ID,'ulpb_page_hit_counter',true);
        if (empty($current_count)) {
            $current_count = 0;
        }
        echo "<div style='padding: 7px 10px 8px 31px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:100px;font-weight: bold; font-size:12px;' >$current_count - Visits</div>";
    }
}


function ulpb_front_page_column($column_name, $post_ID) {
    if ($column_name == 'ulpb_front_page') {
        $ulpb_is_front_page = get_post_meta($post_ID,'ULPB_FrontPage',true);
        if ($ulpb_is_front_page === 'true') {
            $is_landing_page = 'background:#8bc34a;';
        }else{
            $is_landing_page = 'background:#f44336;';
        }
        echo "<div style='width:30px; height:30px; border-radius:100px; $is_landing_page'></div>";
    }
}




function ulpb_menupages_add(){

	add_menu_page( 'PluginOps', __('PluginOps','page-builder-add') , 'manage_options', 'pluginops', array($this,'ulpb_pageBuilder_dashboard_page'), $icon_url = ULPB_PLUGIN_URL.'/images/dashboard/page-builder-templates-icon.png', $position = null );

	add_submenu_page(
			'edit.php?post_type=ulpb_post',
			__('Tracking Codes','page-builder-add'),
			__('Tracking & Analytics','page-builder-add'),
			'manage_options',
			'page-builder-tracking-ulpb',
			array($this,'ulpb_pageBuilder_trackingCodes_page')
		);


	add_submenu_page(
			'edit.php?post_type=ulpb_post',
			__('Page Builder Dashboard','page-builder-add'),
			__('Dashboard','page-builder-add'),
			'manage_options',
			'page-builder-dashboard-ulpb',
			array($this,'ulpb_pageBuilder_dashboard_page')
		);

	add_submenu_page(
			'edit.php?post_type=ulpb_post',
			__('Page Builder Extensions','page-builder-add'),
			__('Go Pro','page-builder-add'),
			'manage_options',
			'page-builder-extensions-ulpb',
			array($this,'ulpb_pageBuilder_extensions_page')
		);

	add_submenu_page( 
					'pluginops',
					 __('PluginOps Settings','page-builder-add'),
					 __('Settings','page-builder-add'),
					 'manage_options',
					 'pluginops-settings',
					 array($this,'ulpb_pluginOps_settings_page') 
				);

	add_submenu_page(
			'edit.php?post_type=ulpb_post',
			__('Edit Landing Page','page-builder-add'),
			__('Blank Page','page-builder-add'),
			'manage_options',
			'page-builder-new-landing-page',
			array($this,'ulpb_pageBuilder_new_landingpage')
		);

}

function ulpb_pageBuilder_new_landingpage(){
	include_once(ULPB_PLUGIN_PATH.'/admin/views/UI/admin-ui.php');
}

function ulpb_pluginOps_settings_page(){
	include_once(ULPB_PLUGIN_PATH.'/admin/views/Dashboard/settings-page.php');
}


function ulpb_pageBuilder_dashboard_page(){
	include_once(ULPB_PLUGIN_PATH.'/admin/views/Dashboard/admin-dashboard.php');
}

function ulpb_pageBuilder_trackingCodes_page(){
	include_once(ULPB_PLUGIN_PATH.'/admin/views/Dashboard/admin-tracking-code.php');
}

function ulpb_pageBuilder_extensions_page(){
	include_once(ULPB_PLUGIN_PATH.'/admin/views/Dashboard/admin-extensions.php');
}



function ulpb_pagebuilder_content_filter($content){

	global $post;
	$ulpb_is_active = get_post_meta($post->ID,'ulpb_page_builder_active',true);

	if ($ulpb_is_active == 'true') {
		
		 ob_start();
		 include(ULPB_PLUGIN_PATH.'public/templates/template.php');
		
		$content = ob_get_contents();
		ob_end_clean();
		
		return do_shortcode($content) ;
		
	}else{
		return do_shortcode( $content );
	}


}













function pb_shortcode_sample_nav($atts, $content){
	if( current_user_can('editor') || current_user_can('administrator') ) {
	   ob_start();
	    
		  extract( shortcode_atts( array(

				'pb_menu' => '',
				'pb_logo_url' => '',
				'menucolor' => '',
				'menu_class' => '',
				'menu_font' => '',
				'menu_fonthovercolor' => '',
				'menu_fonthoverbgcolor' => '',
				'menu_fontsize' => '',
				
			), $atts ) );

		$menuName = $pb_menu;
		$pageLogoUrl = $pb_logo_url;
		$menuColor = $menucolor;
		$menufont = $menu_font;
		$menufontHoverColor = $menu_fonthovercolor;
		$menuFontHoverBgColor = $menu_fonthoverbgcolor;
		$menuFontSize = $menu_fontsize;

		switch ($menu_class) {
			case 'menu-style-1':
				include(ULPB_PLUGIN_PATH.'admin/views/menus/menu-style-1.php');
			break;
			case 'menu-style-2':
				include(ULPB_PLUGIN_PATH.'admin/views/menus/menu-style-2.php');
			break;
			case 'menu-style-3':
				include(ULPB_PLUGIN_PATH.'admin/views/menus/menu-style-3.php');
			break;
			case 'menu-style-4':
				include(ULPB_PLUGIN_PATH.'admin/views/menus/menu-style-4.php');
			break;
			default:
				include(ULPB_PLUGIN_PATH.'admin/views/menus/menu-style-1.php');
			break;
		}
		

		echo $this_widget_menu;
	   return ob_get_clean();

	}

}






} //class ends

?>