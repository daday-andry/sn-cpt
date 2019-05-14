<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       andrynirina.portfoliobox.net
 * @since      1.0.0
 *
 * @package    Sn_Cpt
 * @subpackage Sn_Cpt/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sn_Cpt
 * @subpackage Sn_Cpt/admin
 * @author     DADAY Andry <andrysahaedena@gmail.com>
 */
class Sn_Cpt_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sn_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sn_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sn-cpt-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sn_Cpt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sn_Cpt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sn-cpt-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function add_admin_menu(){
		add_menu_page("Social Network CPT", "SN CPT Config", "manage_options","cpt_config",array($this,'admin_page'));
	}
	public function admin_page(){
		include_once 'partials/sn-cpt-admin-display.php';
	}
	
	public function register_widgets(){
		register_widget('FB_Page_Widget');
	}

	//FORM Social Network Posttype

	public function register_social_network_cpt(){
		$cpt_args = array(
			'label' => __( 'Social Net. Post' ),
			'singular_label' => __( 'Social Network post' ),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'has_archive' => true,
			'supports' => array('title','editor','thumbnail'),
			'rewrite' => array( 'slug' => 'social_network_cpt', 'with_front' => false ),
			);
		register_post_type("social_network_cpt", $cpt_args);
		$tax_args=array(
			'hierarchical'=>true,
			'label' => __('Catégories'),
			'singular_label'=>__('Catégorie'),
			'slug' => 'social_network_cpt_categ_tax',
			'rewrite'=> true
		);
		register_taxonomy("social_network_cpt_categ_tax","social_network_cpt",$tax_args);
	
	}
	
	// publier avant enregistrer
	public function publish_post(){
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/function-sn-cpt-publish_post.php';
	}
	public function un_publish_post(){
		echo "poste deleted";
		exit();
	}

}
