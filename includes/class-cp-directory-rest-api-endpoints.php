<?php
/**
 * Rest Endpoints for plugins and core to leverage.
 * Theme and Plugin data Endpoints.
 * 
 * @see domain/wp-json/directory/v1/plugins
 * @see domain/wp-json/directory/v1/themes.
 * 
 * @package cpdirectory-proposal
 */

 /**
  * New Theme and Plugin Data Endpoints.
  */
class REST_API_Endpoints {

	/**
	 * Init the class.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'rest_api_init', array( $this, 'register_themes_and_plugins_endpoints' ), 10 );
	}

	/**
	 * Register the Plugins and themes REST API Endpoints.
	 *
	 * @return void
	 */
	public function register_themes_and_plugins_endpoints() {

		register_rest_route(
			'directory/v1',
			'/themes',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'cp_directory_get_themes_fields' ),
				'permission_callback' => '__return_true',
			)
		);

		register_rest_route(
			'directory/v1',
			'/plugins',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'cp_directory_get_plugins_fields' ),
				'permission_callback' => '__return_true',
			)
		);

	}

	/**
	 * Expose Plugins fields for to the REST API.
	 * 
	 * @see domain/wp-json/directory/v1/plugins
	 *
	 * @param [type] $object
	 * @param [type] $field_name
	 * @param [type] $request
	 * @return void
	 */
	public function cp_directory_get_plugins_fields( $object ) {

		$data       = [];
		$posts_args = array(
			'post_type'      => 'cp_dir_plugins',
			'posts_per_page' => 1000000,
			'post_status'	 => 'publish'
		);

		$posts_query = new WP_Query( $posts_args );

		if ( $posts_query->have_posts() ) {
			
			while( $posts_query->have_posts() ){ 
				
				$posts_query->the_post();

				$post_id = get_the_ID();
				
				$data['id']          = $post_id;
				$data['title']       = get_the_title( $post_id );
				$data['description'] = get_the_content();
				// $data['tags']        = array( $this, 'cp_directory_get_themes_category_terms' );
			}

		}

		return $data;
	}

	/**
	 * Expose Themes fields for to the REST API.
	 * 
	 * @see domain/wp-json/directory/v1/themes
	 *
	 * @param [type] $object
	 * @param [type] $field_name
	 * @param [type] $request
	 * @return void
	 */
	public function cp_directory_get_themes_fields( $object ) {
		
		$data       = [];
		$posts_args = array(
			'post_type'      => 'cp_dir_themes',
			'posts_per_page' => 1000000,
			'post_status'	 => 'publish'
		);

		$posts_query = new WP_Query( $posts_args );

		if ( $posts_query->have_posts() ) {
			
			while( $posts_query->have_posts() ){ 
				
				$posts_query->the_post();
				$post_id = get_the_ID();
				
				$data['id']          = $post_id;
				$data['title']       = get_the_title( $post_id );
				$data['description'] = get_the_content();
				// $data['tags']        = array( $this, 'cp_directory_get_themes_category_terms' );
			}

		}

		return $data;
	}

	public function cp_directory_get_themes_category_terms() {

		$terms_string = null;
		// 	if ( ! empty( $post_id ) ) {
				// $term_obj_list = get_the_terms( $post_id, $taxonomy . '_cat' );
		// 		if ( !empty( $term_obj_list ) ) {
		// 			$terms_string  = join( ', ', wp_list_pluck( $term_obj_list, 'name' ) );
		// 			$terms_string;
		// 		}
		// 	}
		return $terms_string;

	}

}

$rest_api_endpoints = new REST_API_Endpoints;
$rest_api_endpoints->register();
