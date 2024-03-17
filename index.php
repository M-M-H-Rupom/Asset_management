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
        add_action('wp_enqueue_scripts',array($this,'enqueue_assets'));
    }
    function enqueue_assets(){
        wp_enqueue_script( 'ast_main_js', AST_DIR.'/js/main.js',array('jquery','ast_another_js'),time(),true);
        wp_enqueue_script( 'ast_another_js',AST_DIR.'/js/another.js',array('jquery'),time(),true);
        wp_enqueue_style( 'ast_css', AST_DIR.'/css/style.css', null, time());

        $data = array(
            'name'=> 'Rupom',
            'home' => 'Rangpur'
        );
        wp_localize_script('ast_main_js','personal_data', $data);
    }
 }
 new assetmanage();
?>