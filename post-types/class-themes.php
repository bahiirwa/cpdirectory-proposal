<?php
/**
 * Theme Post Type and Taxonomy Init.
 *
 * @package CP_Directory
 */
class CP_Directory_Themes {

	public function register() {
		add_action( 'init', [$this, 'cp_dir_themes_init'], 10 );
		add_action( 'init', [$this, 'cp_dir_themes_cat_init'], 11 );
	}

	/**
	 * Videos Cards Category Arguments.
	 *
	 * @return void
	 */
	public function cp_dir_themes_cat_init() {

		$labels = array(
            'name'              => __( 'Theme Categories', 'cp-directory' ),
            'singular_name'     => __( 'Theme Category', 'cp-directory' ),
            'search_items'      => __( 'Search Theme Categories', 'cp-directory' ),
            'all_items'         => __( 'All Theme Categories', 'cp-directory' ),
            'parent_item'       => __( 'Parent Theme Category', 'cp-directory' ),
            'parent_item_colon' => __( 'Parent Theme Category:', 'cp-directory' ),
            'edit_item'         => __( 'Edit Theme Category', 'cp-directory' ),
            'update_item'       => __( 'Update Theme Category', 'cp-directory' ),
            'add_new_item'      => __( 'List New Theme Category', 'cp-directory' ),
            'new_item_name'     => __( 'New Theme Category Name', 'cp-directory' ),
            'menu_name'         => __( 'Theme Category', 'cp-directory' ),
        );
		
		register_taxonomy(
			'cp_directory_themes_cat',                       
			'cp_directory_themes',                           
			array(
				'hierarchical' => true,
				'labels'       => $labels,    
				'query_var'    => true,
				'show_in_rest' => true,
				'rewrite'      => array(
					'slug'       => 'cp-directory-themes-cat', 
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
	public function cp_dir_themes_init() {

		//register the Video Post Type for rentals
		$labels = array(
			'name'               => __( 'Directory Themes',  'cp-directory' ),
			'singular_name'      => __( 'Theme', 'cp-directory' ),
			'add_new'            => __( 'List New Theme', 'cp-directory' ),
			'add_new_item'       => __( 'List New Theme', 'cp-directory' ),
			'edit_item'          => __( 'Edit Theme', 'cp-directory' ),
			'new_item'           => __( 'New Theme', 'cp-directory' ),
			'all_items'          => __( 'All Themes', 'cp-directory' ),
			'view_item'          => __( 'View Theme', 'cp-directory' ),
			'search_items'       => __( 'Search Themes', 'cp-directory' ),
			'not_found'          => __( 'No Themes found', 'cp-directory' ),
			'not_found_in_trash' => __( 'No Themes found in the Trash', 'cp-directory' ),
			'menu_name'          => __( 'Dir Themes', 'cp-directory' )
		);

		$args = array(
			'labels'              => $labels,
			'description'         => __( 'Holds Theme related data', 'cp-directory' ),
			'public'              => true,
			'menu_position'       => 30,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-admin-appearance',
			'hierarchical'        => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'taxonomies'          => array( 'cp_dir_themes_cat' ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => [
				'slug'       => 'cp_directory_themes',
				'with_front' => true
			],
		);

		register_post_type( 'cp_dir_themes', $args );

	}

}

$cp_directory_themes = new CP_Directory_Themes();
$cp_directory_themes->register();