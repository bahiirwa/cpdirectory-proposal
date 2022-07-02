<?php
/**
 * Create new Developer Admin Role.
 * Role equivalent to contributor.
 * Allows the Dev to see his plugin and themes details only.
 * Make edits to the plugins and themes.
 * 
 * @package CP_Directory
 */

if ( ! class_exists( 'CP_Directory_Admin_Roles' ) ) {

    class CP_Directory_Admin_Roles {
		
		/**
		 * Init the class.
		 *
		 * @return void
		 */
		public function register() {}

	}

}

$cp_directory_admin_roles = new CP_Directory_Admin_Roles;
$cp_directory_admin_roles->register();
