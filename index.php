
<?php

/*
  Plugin Name: Task-management-plugin
  Description: Plugin
  Version: 1
  Author: Dilip Meka
  Author URI: http://dilipmeka.com
 */

global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'task';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		address text NOT NULL,
		role text NOT NULL,
		date date,
        user_nicename varchar(100),
        status varchar(10),
		PRIMARY KEY  (id)
	) $charset_collate;";

    $sql2 = "INSERT INTO task(user_nicename)
    SELECT user_nicename FROM wp_users";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    dbDelta( $sql2 );

    add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );


//adding menu to admin panel
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('task_managament', //page title
        'Task Management', //menu title
        'manage_options', //capabilities
        'Task_Management', //menu slug
        'task_list' //function
    );
    
    //adding submenu to a menu
    add_submenu_page('Task_Management',//parent page slug
        'add_task',//page title
        'Add Task',//menu titel
        'manage_options',//manage optios
        'Task_Insert',//slug
        'task_insert'//function
    );
   
    add_submenu_page( null,//parent page slug
        'task_update',//$page_title
        'Task Update',// $menu_title
        'manage_options',// $capability
        'Task_Update',// $menu_slug,
        'task_update'// $function
    );
    
    add_submenu_page( null,//parent page slug
        'task_delete',//$page_title
        'Task Delete',// $menu_title
        'manage_options',// $capability
        'Task_Delete',// $menu_slug,
        'task_delete'// $function
    );
    
    add_dashboard_page('task_managament_editor', //page title
        'Task Management', //menu title
        'read', //capabilities
        'Task_Management_Editor', //menu slug
        'task_list_editor' //function
    );
    add_submenu_page( null,//parent page slug
        'task_update_editor',//$page_title
        'Task Update',// $menu_title
        'read',// $capability
        'Task_Update_Editor',// $menu_slug,
        'task_update_editor'// $function
    );
}




define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'task_list.php');
require_once (ROOTDIR.'task_insert.php');
require_once (ROOTDIR.'task_update.php');
require_once (ROOTDIR.'task_delete.php');
require_once (ROOTDIR.'task_list_editor.php');
require_once (ROOTDIR.'task_update_editor.php');

?>

?>