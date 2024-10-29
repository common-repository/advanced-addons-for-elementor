<?php 
class aae_Admin {

// Widgets keys

     public $aae_elements_keys = [
        'widget-alert',
        'widget-featured',
        'widget-team',
        'widget-buttons',
        'widget-caldera-forms',
        'widget-call-to-action',
        'widget-cf7',
        'widget-clients-slider',
        'widget-countdown',
        'widget-divider',
        'widget-dual-button',
        'widget-fun-factor',
        'widget-gravity-forms',
        'widget-image-compare',
        'widget-inline-notice',
        'widget-mailchimp-wp',
        'widget-ninjaform',
        'widget-testimonia-slider',
        'widget-testimonial',
        'widget-twitter',
        'widget-promo-box',
        'widget-social-links',
        'widget-quotes',
        'widget-progressbar',
        'widget-search-box',
        'widget-table',
        'widget-tabs',
        'widget-timeline',
        'widget-weform',
        'widget-wpform',
        'widget-post-grid',
        'widget-post-carousel',
        'widget-post-list',
        'widget-accordion',
        'widget-instagram',
    ];

	// Default settings
	private $aae_default_settings;
	// Switch settings
	private $aae_settings;
    // Switch get settings
    private $aae_get_settings;

/**
 * Register construct
 */
	public function __construct() {
        //$this->includes();
        $this->init_hooks();

    }

/**
 * Register a custom opitons.
 */
	public function aae_for_elementor_admin_options(){

        add_submenu_page(
            'elementor',
            esc_html__( 'Advanced Addons', 'aa_elementor' ),
            esc_html__( 'Advanced Addons', 'aa_elementor' ),
            'manage_options',
            'aae-settings',
            array($this, 'display_settings_pages')
        );
        
	}
/**
 * Register all hooks
 */
    public function init_hooks() {

        // Build admin main menu
        add_action('admin_menu', array($this, 'aae_for_elementor_admin_options'),99);
        // Build admin notice
        //add_action('admin_notices', array($this, 'switch_lite_welcome_admin_notice'));
        // Build admin script
        add_action('init', array( $this, 'aae_for_elementor_admin_page_scripts' ) );

        // Param check
        add_action('admin_init', array( $this, 'aae_for_elementor_admin_get_param_check' ) );
        // Build admin view and save
        add_action( 'wp_ajax_aae_save_admin_addons_settings', array( $this, 'aae_for_elementor_sections_with_ajax') );

        // font-awesome
       wp_enqueue_style(
         'font-awesome',
         AAE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
         null,
         AAE_VERSION
     );

        add_action('admin_enqueue_scripts', array( $this, 'aae_for_elementor_admin_script'));
    }


/**
 * Register scripts
 */
    public function aae_for_elementor_admin_page_scripts () {
    	// admin css
        wp_enqueue_style( 'aae-admin',  plugins_url('/assets/css/admin.css', __FILE__  ));


        // sweetalart css
        wp_enqueue_style( 'aae-sweetalert2-css', plugins_url('/assets/css/sweetalert2.min.css', __FILE__ ));

        // Admin script
        wp_enqueue_script('aae-elementor-admin-js', plugins_url('/assets/js/admin.js', __FILE__) , array('jquery','jquery-ui-tabs'), '1.0' , true );

        // Core script
        wp_enqueue_script( 'aae-sweet-js',  plugins_url('/assets/js/core.js', __FILE__), array( 'jquery' ), '1.0', true );

        // Sweetalert2 script
		wp_enqueue_script( 'aae-sweetalert2-js', plugins_url('/assets/js/sweetalert2.min.js', __FILE__), array( 'jquery', 'aae-sweet-js' ), '1.0', true );
       
    }

function aae_for_elementor_admin_script(){

    wp_enqueue_script( 'admin-notice-js', plugins_url('/assets/js/admin-notice.js', __FILE__), array( 'jquery' ), '1.0', true );
}

function aae_for_elementor_admin_get_param_check(){

    if (isset($_GET['dismissed']) && $_GET['dismissed'] == 1) {
        update_option("notice_dissmissed", 1);
    }

   
}

    /**
 * Register display view
 */

    public function display_settings_pages() {

        $js_info = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		);
		wp_localize_script( 'aae-elementor-admin-js', 'settings', $js_info );
       
	   $this->aae_default_settings = array_fill_keys( $this->aae_elements_keys, true );
       
	   $this->aae_get_settings = get_option( 'aae_save_settings', $this->aae_default_settings );
       
	   $aae_new_settings = array_diff_key( $this->aae_default_settings, $this->aae_get_settings );
       
	   if( ! empty( $aae_new_settings ) ) {
	   	$aae_updated_settings = array_merge( $this->aae_get_settings, $aae_new_settings );
	   	update_option( 'aae_save_settings', $aae_updated_settings );
	   }
	   $this->aae_get_settings = get_option( 'aae_save_settings', $this->aae_default_settings );

?>


    <div class="wrap aae-wrap ">
        <div class="response-wrap"></div>
        <form action="" method="POST" id="aae-settings" name="aae-settings">

            <div class="aae-settings-tabs">
                <div class="aae-settings-tabs-head">
                    <ul class="aae-settings-tabs-list">
                        <li><a class="aae-tab-list-item" href="#aae-elements">
                            <span class="dashicons dashicons-admin-tools"></span>
                        Free Elements
                    </a></li>
                        <li><a class="aae-tab-list-item" href="#pro-elements">
                            <span class="dashicons dashicons-admin-appearance"></span>
                        Extentions
                    </a></li>
                        <li><a class="aae-tab-list-item" href="#api">
                            <span class="dashicons dashicons-admin-plugins"></span>
                        API Settings
                    </a></li>
                        <li><a class="aae-tab-list-item" href="#go-pro">
                           <span class="dashicons dashicons-upload"></span>
                        Go Pro
                    </a></li>
                        <li><a class="aae-tab-list-item" href="#support">
                            <span class="dashicons dashicons-groups"></span>
                        Support</a></li>
                    </ul>
                    <div class="aae-settings-tab-head-right">
                        <img src="assets/images/icon-aae.png" alt="">
                    </div>
                </div>
            
                <div id="aae-elements" class="aae-settings-tab">

                <div class="aae-elements-table">
                    
                        <div class="row">
                           
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Alert', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-alert" name="widget-alert" <?php checked(1, $this->aae_get_settings['widget-alert'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Featured', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                        <input type="checkbox" id="widget-featured" name="widget-featured" <?php checked(1, $this->aae_get_settings['widget-featured'], true) ?>>
                                        <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                             </div>   
                             <!--  -->

                             <!-- col -->
                             <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Team', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                    <input type="checkbox" id="widget-team" name="widget-team" <?php checked(1, $this->aae_get_settings['widget-team'], true) ?>>
                                    <span class="rectangle round"></span>
                                </label>
                                    </div>
                                </div>
                             </div> 
                             <!-- col -->
                        </div>
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                             <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Accordion', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                    <input type="checkbox" id="widget-accordion" name="widget-accordion" <?php checked(1, $this->aae_get_settings['widget-accordion'], true) ?>>
                                    <span class="rectangle round"></span>
                                </label>
                                    </div>
                                </div>
                             </div> 
                             <!-- col -->

                            <!-- col -->
                             <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Buttons', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-buttons" name="widget-buttons" <?php checked(1, $this->aae_get_settings['widget-buttons'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                             </div> 
                             <!-- col -->

                             <!-- col -->
                             <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Call To Action', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-call-to-action" name="widget-call-to-action" <?php checked(1, $this->aae_get_settings['widget-call-to-action'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                             </div> 
                             <!-- col -->

                             
                        </div>
                        <!-- row -->
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                             <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Clients Slider', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-clients-slider" name="widget-clients-slider" <?php checked(1, $this->aae_get_settings['widget-clients-slider'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                             </div> 
                             <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Countdown', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-countdown" name="widget-countdown" <?php checked(1, $this->aae_get_settings['widget-countdown'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                             <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Divider', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-divider" name="widget-divider" <?php checked(1, $this->aae_get_settings['widget-divider'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->


                        <!-- row -->
                        <div class="row">
                            
                           

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Dual Button', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-dual-button" name="widget-dual-button" <?php checked(1, $this->aae_get_settings['widget-dual-button'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Fun Factor', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-fun-factor" name="widget-fun-factor" <?php checked(1, $this->aae_get_settings['widget-fun-factor'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Image Compare', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-image-compare" name="widget-image-compare" <?php checked(1, $this->aae_get_settings['widget-image-compare'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                            
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Inline Notice', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-inline-notice" name="widget-inline-notice" <?php checked(1, $this->aae_get_settings['widget-inline-notice'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Testimonial Slider', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-testimonia-slider" name="widget-testimonia-slider" <?php checked(1, $this->aae_get_settings['widget-testimonia-slider'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Testimonial', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-testimonial" name="widget-testimonial" <?php checked(1, $this->aae_get_settings['widget-testimonial'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Twitter Slider', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-twitter" name="widget-twitter" <?php checked(1, $this->aae_get_settings['widget-twitter'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                            
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('ProgressBar', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-progressbar" name="widget-progressbar" <?php checked(1, $this->aae_get_settings['widget-progressbar'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Promo Box', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-promo-box" name="widget-promo-box" <?php checked(1, $this->aae_get_settings['widget-promo-box'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                           
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                             <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Quotes', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-quotes" name="widget-quotes" <?php checked(1, $this->aae_get_settings['widget-quotes'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('search Box', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-search-box" name="widget-search-box" <?php checked(1, $this->aae_get_settings['widget-search-box'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Social Links', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-social-links" name="widget-social-links" <?php checked(1, $this->aae_get_settings['widget-social-links'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                            
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Table', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-table" name="widget-table" <?php checked(1, $this->aae_get_settings['widget-table'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Tabs', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-tabs" name="widget-tabs" <?php checked(1, $this->aae_get_settings['widget-tabs'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Timeline', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-timeline" name="widget-timeline" <?php checked(1, $this->aae_get_settings['widget-timeline'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Instagram', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-instagram" name="widget-instagram" <?php checked(1, $this->aae_get_settings['widget-instagram'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>

                        <!-- row -->
                        <div class="row">
                            <div class="col">
                                <div class="aae-content-title">
                                    <h3>Blog Post</h3>
                                </div>
                            </div>
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                            
                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Post Grid', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-post-grid" name="widget-post-grid" <?php checked(1, $this->aae_get_settings['widget-post-grid'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Post Carousel', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-post-carousel" name="widget-post-carousel" <?php checked(1, $this->aae_get_settings['widget-post-carousel'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Post List', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-post-list" name="widget-post-list" <?php checked(1, $this->aae_get_settings['widget-post-list'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                            <div class="col">
                                <div class="aae-content-title">
                                    <h3>Third Party Widgets</h3>
                                </div>
                            </div>
                        </div>
                        <!-- row -->

                        <!-- row -->
                        <div class="row">
                            
                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Caldera Forms', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-caldera-forms" name="widget-caldera-forms" <?php checked(1, $this->aae_get_settings['widget-caldera-forms'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Contact Form 7', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-cf7" name="widget-cf7" <?php checked(1, $this->aae_get_settings['widget-cf7'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Gravity Forms', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-gravity-forms" name="widget-gravity-forms" <?php checked(1, $this->aae_get_settings['widget-gravity-forms'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Mailchimp WP', 'aa_elementor'); ?>
                                         <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-mailchimp-wp" name="widget-mailchimp-wp" <?php checked(1, $this->aae_get_settings['widget-mailchimp-wp'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                            
                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('Ninjaform', 'aa_elementor'); ?>
                                         <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-ninjaform" name="widget-ninjaform" <?php checked(1, $this->aae_get_settings['widget-ninjaform'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                        <?php echo esc_html__('WeForms', 'aa_elementor'); ?>
                                        <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-weform" name="widget-weform" <?php checked(1, $this->aae_get_settings['widget-weform'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->

                            <!-- col -->
                            <div class="col-sm-4">
                                <div class="aae-widget-box">
                                    <div class="aae-widget-box-title">
                                       <?php echo esc_html__('WpForms', 'aa_elementor'); ?>
                                       <a href="#" class="aae-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                    <div class="aae-widget-box-content">
                                         <label class="switch">
                                            <input type="checkbox" id="widget-wpform" name="widget-wpform" <?php checked(1, $this->aae_get_settings['widget-wpform'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <!-- col -->
                        </div>
                        <!-- row -->
                </div>
                <button  class="button aae-btn aae-save-button" type="submit">
                    Save Settings
                </button>
                    
            </div>

            <div id="pro-elements" class="aae-settings-tab">
                
                    <h2>  
                        <?php 
                        echo  __( 'Why upgrade to Pro Version of the plugin?', 'aa_elementor' ) ;
                        ?> 
                     </h2>
                    
                             
            </div>

            <div id="api" class="aae-settings-api">
                
                    <h2>  
                        <?php 
                        echo  __( 'Api Setting :', 'aa_elementor' ) ;
                        ?> 
                     </h2>

                    <table>
                        <tr>
                            <td> <label for="" class="api-text-label"> Maps Api</label></td>
                            <td> <input type="text" placeholder="Maps Key" id="maps-api" name="maps-api" value="<?php echo $this->aae_get_settings['maps-api'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Facebook App</label></td>
                            <td> <input type="text" placeholder="Facebook App Id" id="facebook_app_id" name="facebook_app_id" value="<?php echo $this->aae_get_settings['facebook_app_id'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Instagram user ID</label></td>
                            <td> <input type="text" placeholder="Instagram user ID" id="instagram_user_id" name="instagram_user_id" value="<?php echo $this->aae_get_settings['instagram_user_id'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Instagram Access Token</label></td>
                            <td> <input type="text" placeholder="Instagram Access Token" id="instagram_access_token" name="instagram_access_token" value="<?php echo $this->aae_get_settings['instagram_access_token'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Twitter UserName</label></td>
                            <td> <input type="text" placeholder="Twitter UserName" id="twitter_userName" name="twitter_userName" value="<?php echo $this->aae_get_settings['twitter_userName'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Twitter Consumer Key</label></td>
                            <td> <input type="text" placeholder="Twitter Consumer Key" id="twitter_consumer_key" name="twitter_consumer_key" value="<?php echo $this->aae_get_settings['twitter_consumer_key'] ?>"></td>
                        </tr>

                        <tr>
                            <td> <label for="" class="api-text-label">Twitter Consumer Secret</label></td>
                            <td> <input type="text" placeholder="Twitter Consumer Secret" id="twitter_consumer_secret" name="twitter_consumer_secret" value="<?php echo $this->aae_get_settings['twitter_consumer_secret'] ?>"></td>
                        </tr>

                        <tr>
                            <td></td>
                                <td>
                                    <button  class="button aae-btn aae-save-button" type="submit">
                                        Save Settings
                                    </button>
                                </td>
                        </tr>
                    </table>
                       
                       
                        
                 
                             
            </div>

            <div id="go-pro" class="aae-settings-api">
                <label>
                    <h2>  
                        <?php 
                        echo  __( 'Go Pro', 'aa_elementor' ) ;
                        ?> 
                     </h2>
                    
                </label>
                <div class="aae-activation-key-area">
                    <form action="#">
                        <input type="text" placeholder="Activation Key">
                        <span class="dashicons dashicons-unlock"></span>
                        <button class="btn" type="submit">
                            Activate
                        </button>
                    </form>
                </div>           
            </div>

            <div id="supports" class="aae-settings-api">
               
                    <h2>  
                        <?php 
                        echo  __( 'Supports', 'aa_elementor' ) ;
                        ?> 
                     </h2>
                    
                       
                       
            </div>

            <div class="ade-footer">
                <p><?php echo  __( 'Did you like Our plugin? Please');?><a href="https://wordpress.org/plugins/advanced-addons-for-elementor/ target="_blank"> <?php echo  __( 'Click Here to Rate it ★★★★★');?></a></p>
            </div>
        </form>
    </div>
<?php

    }
/**
 * Register sections
 */
    public function aae_for_elementor_sections_with_ajax() {

        if( isset( $_POST['fields'] ) ) {
            parse_str( $_POST['fields'], $settings );
        }else {
            return;
        }

        $this->aae_settings = array(
            'widget-alert'             => intval( $settings['widget-alert'] ? 1 : 0 ),
            'widget-featured'          => intval( $settings['widget-featured'] ? 1 : 0 ),
            'widget-team'              => intval( $settings['widget-team'] ? 1 : 0 ),
            'widget-buttons'           => intval( $settings['widget-buttons'] ? 1 : 0 ),
            'widget-caldera-forms'     => intval( $settings['widget-caldera-forms'] ? 1 : 0 ),
            'widget-call-to-action'    => intval( $settings['widget-call-to-action'] ? 1 : 0 ),
            'widget-cf7'               => intval( $settings['widget-cf7'] ? 1 : 0 ),
            'widget-clients-slider'    => intval( $settings['widget-clients-slider'] ? 1 : 0 ),
            'widget-countdown'         => intval( $settings['widget-countdown'] ? 1 : 0 ),
            'widget-divider'           => intval( $settings['widget-divider'] ? 1 : 0 ),
            'widget-dual-button'       => intval( $settings['widget-dual-button'] ? 1 : 0 ),
            'widget-fun-factor'        => intval( $settings['widget-fun-factor'] ? 1 : 0 ),
            'widget-gravity-forms'     => intval( $settings['widget-gravity-forms'] ? 1 : 0 ),
            'widget-image-compare'     => intval( $settings['widget-image-compare'] ? 1 : 0 ),
            'widget-inline-notice'     => intval( $settings['widget-inline-notice'] ? 1 : 0 ),
            'widget-mailchimp-wp'      => intval( $settings['widget-mailchimp-wp'] ? 1 : 0 ),
            'widget-ninjaform'         => intval( $settings['widget-ninjaform'] ? 1 : 0 ),
            'widget-testimonia-slider' => intval( $settings['widget-testimonia-slider'] ? 1 : 0 ),
            'widget-testimonial'       => intval( $settings['widget-testimonial'] ? 1 : 0 ),
            'widget-twitter'           => intval( $settings['widget-twitter'] ? 1 : 0 ),
            'widget-progressbar'       => intval( $settings['widget-progressbar'] ? 1 : 0 ),
            'widget-promo-box'         => intval( $settings['widget-promo-box'] ? 1 : 0 ),
            'widget-quotes'            => intval( $settings['widget-quotes'] ? 1 : 0 ),
            'widget-search-box'        => intval( $settings['widget-search-box'] ? 1 : 0 ),
            'widget-social-links'      => intval( $settings['widget-social-links'] ? 1 : 0 ),
            'widget-table'             => intval( $settings['widget-table'] ? 1 : 0 ),
            'widget-tabs'              => intval( $settings['widget-tabs'] ? 1 : 0 ),
            'widget-timeline'          => intval( $settings['widget-timeline'] ? 1 : 0 ),
            'widget-weform'            => intval( $settings['widget-weform'] ? 1 : 0 ),
            'widget-wpform'            => intval( $settings['widget-wpform'] ? 1 : 0 ),
            'widget-post-grid'         => intval( $settings['widget-post-grid'] ? 1 : 0 ),
            'widget-post-carousel'     => intval( $settings['widget-post-carousel'] ? 1 : 0 ),
            'widget-post-list'         => intval( $settings['widget-post-list'] ? 1 : 0 ),
            'widget-accordion'         => intval( $settings['widget-accordion'] ? 1 : 0 ),
            'widget-instagram'         => intval( $settings['widget-instagram'] ? 1 : 0 ),
            'maps-api'                  =>  $settings['maps-api'],
            'facebook_app_id'           =>  $settings['facebook_app_id'],
            'instagram_access_token'    =>  $settings['instagram_access_token'],
            'instagram_user_id'         =>  $settings['instagram_user_id'],
            'twitter_consumer_secret'   =>  $settings['twitter_consumer_secret'],
            'twitter_consumer_key'      =>  $settings['twitter_consumer_key'] ,
            'twitter_userName'          =>  $settings['twitter_userName'],
        );
        update_option( 'aae_save_settings', $this->aae_settings );
        
        return true;
        die();


    }

}


new aae_Admin;