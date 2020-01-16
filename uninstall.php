<?php 

/**
* Trigger this file on Plugin uninstall 
*
* @package GalleryPlugin
*/

if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

// clear database
$books = get_posts(array('post_type' => 'gallery', 'numberposts' => -1));

foreach($books as $book){
    wp_delete_post($book->ID, true);
}