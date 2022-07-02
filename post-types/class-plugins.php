<?php
/**
 * Plugin Post Type and Taxonomy Init.
 *
 * @package CP_Directory
 */
class CP_Directory_Plugins {

	public function register() {
		add_action( 'init', [$this, 'cp_dir_plugins_init'], 10 );
		add_action( 'init', [$this, 'cp_dir_plugins_cat_init'], 11 );
	}

	/**
	 * Videos Cards Category Arguments.
	 *
	 * @return void
	 */
	public function cp_dir_plugins_cat_init() {

		$labels = array(
            'name'              => __( 'Plugin Categories', 'cp-directory' ),
            'singular_name'     => __( 'Plugin Category', 'cp-directory' ),
            'search_items'      => __( 'Search Plugin Categories', 'cp-directory' ),
            'all_items'         => __( 'All Plugin Categories', 'cp-directory' ),
            'parent_item'       => __( 'Parent Plugin Category', 'cp-directory' ),
            'parent_item_colon' => __( 'Parent Plugin Category:', 'cp-directory' ),
            'edit_item'         => __( 'Edit Plugin Category', 'cp-directory' ),
            'update_item'       => __( 'Update Plugin Category', 'cp-directory' ),
            'add_new_item'      => __( 'List New Plugin Category', 'cp-directory' ),
            'new_item_name'     => __( 'New Plugin Category Name', 'cp-directory' ),
            'menu_name'         => __( 'Plugin Category', 'cp-directory' ),
        );
		
		register_taxonomy(
			'cp_directory_plugins_cat',                       
			'cp_directory_plugins',                           
			array(
				'hierarchical' => true,
				'labels'       => $labels,    
				'query_var'    => true,
				'show_in_rest' => true,
				'rewrite'      => array(
					'slug'       => 'cp-directory-plugins-cat', 
					'with_front' => true                     
				),
				'show_admin_column'   => true,
			)
		);
	
	}

	/**
	 * Videos Post Type Arguments.
	 *
	 * @return void
	 */
	public function cp_dir_plugins_init() {

		//register the Video Post Type for rentals
		$labels = array(
			'name'               => __( 'Directory Plugins',  'cp-directory' ),
			'singular_name'      => __( 'Plugin', 'cp-directory' ),
			'add_new'            => __( 'List New Plugin', 'cp-directory' ),
			'add_new_item'       => __( 'List New Plugin', 'cp-directory' ),
			'edit_item'          => __( 'Edit Plugin', 'cp-directory' ),
			'new_item'           => __( 'New Plugin', 'cp-directory' ),
			'all_items'          => __( 'All Plugins', 'cp-directory' ),
			'view_item'          => __( 'View Plugin', 'cp-directory' ),
			'search_items'       => __( 'Search Plugins', 'cp-directory' ),
			'not_found'          => __( 'No Plugins found', 'cp-directory' ),
			'not_found_in_trash' => __( 'No Plugins found in the Trash', 'cp-directory' ),
			'menu_name'          => __( 'Dir Plugins', 'cp-directory' )
		);

		$args = array(
			'labels'              => $labels,
			'description'         => __( 'Holds Plugin related data', 'cp-directory' ),
			'public'              => true,
			'menu_position'       => 30,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-admin-plugins',
			'hierarchical'        => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'taxonomies'          => array( 'cp_dir_plugins_cat' ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => [
				'slug'       => 'cp_directory_plugins',
				'with_front' => true
			],
		);

		register_post_type( 'cp_dir_plugins', $args );

	}

}

$cp_directory_plugins = new CP_Directory_Plugins();
$cp_directory_plugins->register();