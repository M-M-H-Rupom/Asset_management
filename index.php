<?php
/**
 * Plugin Name: Asset manage
 * Author: Rupom
 * Version: 1.0
 * Description: asset manage for a plugin
 * 
 */
define('AST_DIR',plugin_dir_url( __FILE__ )."/assets");
 class assetmanage{
    function __construct(){
        add_action('wp_enqueue_scripts',array($this,'wp_enqueue_assets'));
        add_action('admin_enqueue_scripts', array($this,'admin_enqueue_assets'),9);
    }
    function wp_enqueue_assets(){
        // wp_enqueue_script( 'ast_main_js', AST_DIR.'/js/main.js',array('jquery','ast_another_js'),time(),true);
        // wp_enqueue_script( 'ast_another_js',AST_DIR.'/js/another.js',array('jquery'),time(),true);
        wp_enqueue_style( 'ast_css', AST_DIR.'/css/style.css', null, time());

        $file = array(
            'ast_main_js' => array('path' => AST_DIR.'/js/main.js' , 'dep' => array('jquery','ast_another_js')),
            'ast_another_js' => array('path' => AST_DIR.'/js/another.js' , 'dep' => array('jquery')),
        );
        foreach($file as $handle => $file_info){
            wp_enqueue_script( $handle, $file_info['path'],$file_info['dep'] ,time(),true);
        }
        $data = array(
            'name'=> 'Rupom',
            'home' => 'Rangpur'
        );
        wp_localize_script('ast_main_js','personal_data', $data);
    }
    function admin_enqueue_assets($screen){
        $_screen = get_current_screen($screen);
        if('edit.php' == $screen && 'page' == $_screen->post_type){
            wp_enqueue_script( 'ast_another_js',AST_DIR.'/js/another.js',array('jquery'),time(),true);
        }
    }
 }
 new assetmanage();
?>