<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://webdesign-ninjas.com
 * @since      1.0.0
 *
 * @package    Book_Crud_System
 * @subpackage Book_Crud_System/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Book_Crud_System
 * @subpackage Book_Crud_System/admin
 * @author     Shiv Srivastava <ninjatech.design@gmail.com>
 */
class Book_Crud_System_Admin {

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
		 * defined in Book_Crud_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_Crud_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/book-crud-system-admin.css', array(), $this->version, 'all' );

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
		 * defined in Book_Crud_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_Crud_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/book-crud-system-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function book_crud_menu(){
		add_menu_page("Book Management Tool", "Book Management Tool", "manage_options", "book-management-tool", array($this, "book_management_plugin"), "dashicons-book-alt", 22);
		// create plugin submenus
		add_submenu_page("book-management-tool", "Dashboard", "Dashboard", "manage_options", "book-management-tool", array($this, "book_management_plugin"));
		add_submenu_page("book-management-tool", "Create Book", "Create Book", "manage_options", "book-management-create-book", array($this, "book_management_create_book"));
		add_submenu_page("book-management-tool", "List Book", "List Book", "manage_options", "book-management-list-book", array($this, "book_management_list_book"));
	}

	public function book_management_plugin(){
		global $wpdb;
		echo "<h3>Welcome to Book Management Tools</h3>";
		
		// get single value like row 1 : col2's values. Uses sql to get the single value as desired.
		// $wpdb->get_var()
		// $user_email = $wpdb->get_var("SELECT user_email from gpesv1_users WHERE ID = 1");
		// echo $user_email;

		// get single row of data from selected table using sql
		// $wpdb->get_row()
		// $user_data = $wpdb->get_row("SELECT * from gpesv1_users WHERE ID = 1");
		// echo "<pre>";

		// print_r($user_data);
		// echo "</pre>";

		// get single column values from a selected table - sql query
		// $wpdb->get_col()
		$product_titles = $wpdb->get_col("SELECT post_title from gpesv1_posts WHERE post_type = 'product' AND post_status = 'publish'");
		// $product_variation_titles = $wpdb->get_col("SELECT post_title from gpesv1_posts WHERE post_type = 'product_variation'");
		
		// get all the rows of sql query
		// $wpdb->get_results()
		$all_products = $wpdb->get_results("SELECT * from gpesv1_posts WHERE post_type = 'product' AND post_status = 'publish'");
		echo "<pre>";

		print_r($all_products);
		echo "</pre>";
	}
	public function book_management_dashboard(){
		echo "<h3>Welcome to Submenu of Book Management Tools</h3>";
	}

	public function book_management_create_book(){
		echo "<h3>Create new book entries here.</h3>";
	}

	public function book_management_list_book(){
		echo "<h3>book listing page.</h3>";
	}
}
