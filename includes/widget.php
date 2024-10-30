<?php

/**
 * The Widget
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class Last_Posts_Modified_widget extends WP_Widget {

    /**
     * Sets up the widgets
     */
    function __construct()
    {
        parent::__construct(
                'last-posts-modified', // Base ID of widget
                esc_html__('Last Modified Posts', 'last-posts-modified'), // Widget name will appear in UI
                array('description' => esc_html__('Display the list of the last modified posts.', 'last-posts-modified'),) // Widget description
            );
    }

    /**
     * processes widget options to be saved
     */    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['nbposttoshow'] = ( !empty( $new_instance['nbposttoshow'] ) ) ? $new_instance['nbposttoshow'] : '';
        $instance['showmodifieddate'] = $new_instance['showmodifieddate'];
        $instance['showthumbnail'] = $new_instance['showthumbnail'];
        $instance['nopost'] = ( !empty( $new_instance['nopost'] ) ) ? strip_tags( $new_instance['nopost'] ) : '';
        return $instance;
    }

    /**
     * Displays the widget control options in the Widgets admin screen.
     */
    function form($instance) {

        // Loads the widget form.
        include(LMP_INCLUDES . 'form.php');
    }

    public function widget($args, $instance){
        extract($args);
        echo $before_widget;
        echo $before_title . $instance['title'] . $after_title;
        
        //Set up default Thumbnail
        $defaultthumbnail = '<img src="'. urlDefaultThumbnail . '">';
         
        $output = '<div class="LPM_Widget">';

        $posts = lmp_get_posts_modified($instance['nbposttoshow']);
    
        // Si nous avons des posts modifiés
       If ($posts){
           foreach ($posts as $post) {
               // on récupère la date de création de l'article et on la formatte
               $post_date_modification = mysql2date('j M Y', $post->post_modified);
               // On récupère le titre
               $post_title = stripslashes($post->post_title);
               //extraire l'ID du post pour faire hyperlien
               $permalink = get_permalink($post->ID);
   
               // check for a Featured Image and then assign it to a PHP variable for later use
               // check if showthumbnail = true/flase
               // False = null
               // True = go to if/else
               if ($instance['showthumbnail']==false) {
                   $featured_image = null;
                   }
                   elseif ( has_post_thumbnail($post->ID)  ) {
                       $featured_image = get_the_post_thumbnail($post->ID, 'my-custom-size') ;
                   }
               else {
                       $featured_image = $defaultthumbnail;
                   }
               
   
               if ($instance['showmodifieddate']) {
                   $output .= '<div class="LPM_post-modified">';    
                   $output .= '<p class="flotte">'. $featured_image .'</p>';
                   $output .= '<p class="textleft"><a href="'.$permalink.'">' . $post_title. '</a><span class="lightinfo"> (' .$post_date_modification.')</span></p>';
                   $output .= '</div>';
                   }
               else {
                   $output .= '<div class="LPM_post-modified">';    
                   $output .= '<p class="flotte">'. $featured_image .'</p>';
                   $output .= '<p class="textleft"><a href="'.$permalink.'">' . $post_title. '</a></p>';
                   $output .= '</div>';
                   }
               }
       }   
       Else {
           $output .= $instance['nopost'];
       }
   
       echo $output . '</div>';
       echo $after_widget;

    }
}

