<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rahulpranami.co
 * @since      1.0.0
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/admin
 * @author     Rahul Pranami <rahulpranami101@gmail.com>
 */
class Page_Template_Checker_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Page_Template_Checker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Page_Template_Checker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/page-template-checker-admin.css', array(), $this->version, 'all' );

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			wp_enqueue_style('tailwindcss', plugin_dir_url(__FILE__) . 'css/output.css', array(), microtime(), 'all');
			// wp_enqueue_style('tailwindcss-min', plugin_dir_url(__FILE__) . 'css/output.min.css');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Page_Template_Checker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Page_Template_Checker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/page-template-checker-admin.js', array( 'jquery' ), $this->version, false );

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			// wp_enqueue_script('htmx', plugin_dir_url(__FILE__) . 'js/htmx.min.js', array(), '1.9.10', false);
		}
	}

	public function page_template_checker_page() {
		add_submenu_page(
			'tools.php',
			'Page Template Statistics',
			'Page Template Statistics',
			'manage_options',
			'page-template-statistics',
			[$this, 'template_page_statistics']
		);
	}

	// Function that renders the page added above
	public function template_page_statistics() {
		require_once plugin_dir_path(__FILE__) . 'partials/page-template-checker-admin-display.php';
	}
}
