<?php

/**
 * Functions used by the plugin 
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function lmp_get_posts_modified(int $NbPost){
    
    $argsModifiedPosts = array(
        'numberposts'   => $NbPost,
        'post_type'     =>'post',
        'post_status'   => 'publish', 
        'orderby'       => 'post_modified', 
        'order'         => 'DESC', 
        'meta_query'	=> array(
            'relation'		=> 'AND',
            array(
                'column'	=> 'post_modified',
                'compare' 	=> '!=',
            ),
            array(
                'column'	=> 'post_date',
                'compare' 	=> '!=',
            ),
        )
    );   

    $posts = get_posts( $argsModifiedPosts );

    return $posts;
} 