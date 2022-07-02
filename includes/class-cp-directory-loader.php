<?php
/**
 * Loader class for the required files.
 * 
 * @package CP_Directory
 */

if ( ! class_exists( 'CP_Directory_Loader' ) ) {

    class CP_Directory_Loader {
		
		/**
		 * Init the class.
		 *
		 * @return void
		 */
		public function register() {

			// New role for plugin and theme authors.
			// require_once CP_DIRECTORY_DIR_PATH . '/admin/class-cp-directory-admin-roles.php';
			// require_once CP_DIRECTORY_DIR_PATH . '/admin/class-cp-directory-hooks.php';

			// Post Types Load.
			require_once CP_DIRECTORY_DIR_PATH . 'post-types/class-themes.php';
			require_once CP_DIRECTORY_DIR_PATH . 'post-types/class-plugins.php';
			
			// Include Post Types Fields.
			// require_once CP_DIRECTORY_DIR_PATH . 'post-types/class-themes-fields.php';
			// require_once CP_DIRECTORY_DIR_PATH . 'post-types/class-plugins-fields.php';

			// Include REST API Endpoints.
			require_once CP_DIRECTORY_DIR_PATH . '/includes/class-cp-directory-rest-api-endpoints.php';

		}

	}

}

$cp_directory_loader = new CP_Directory_Loader;
$cp_directory_loader->register();
