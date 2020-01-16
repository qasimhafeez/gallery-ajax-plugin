<?php
/**
* @package GalleryPlugin
*/
/*
Plugin Name: Gallery ALAX Plugin
Plugin URI: https://www.github.com/qasimhafeez/gallery-plugin
Description: Gallery plugin to load images by categories using AJAX
Version: 1.0.0
Author: Qasim Hafeez
Author URI: https://www.github.com/qasimhafeez
License: MIT
*/
defined('ABSPATH') or die("Error accessing it!");

class GalleryPlugin{

    function __construct(){
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate(){
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate(){

        flush_rewrite_rules();
    }

    function custom_post_type(){
        register_post_type('gallery', ['public' => true, 'label' => "Gallery"]);
    }
}

if(class_exists('GalleryPlugin')){
    $galleryPlugin = new GalleryPlugin();
}

//activation
register_activation_hook(__FILE__, array($galleryPlugin, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($galleryPlugin, 'deactivate'));
