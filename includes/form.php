<?php

/**
 * The widget form - backend wp
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Last Modified Posts', 'last-posts-modified');
$nbposttoshow = ! empty( $instance['nbposttoshow'] ) ? $instance['nbposttoshow'] : esc_html__( '3', 'last-posts-modified');
$showmodifieddate = $instance[ 'showmodifieddate' ] ? true : false;
$showthumbnail = $instance[ 'showthumbnail' ] ? true : false;
$nopost = ! empty( $instance['nopost'] ) ? $instance['nopost'] : esc_html__( 'No post has been modified', 'last-posts-modified');
?>

    <!-- 
        Initialisation des valeurs des champs, si aucun param n'a été saisi par l'utilisateur, on affiche les valeurs par défauts 
    -->
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'last-posts-modified' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'nbposttoshow' ) ); ?>"><?php echo esc_html__( 'Post to show:', 'last-posts-modified' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nbposttoshow' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nbposttoshow' ) ); ?>" type="number" size="3" value="<?php echo esc_attr( $nbposttoshow ); ?>">
    </p>
    <p>
        <input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showmodifieddate' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showmodifieddate' ) ); ?>" type="checkbox" <?php checked( $showmodifieddate); ?>">
        <label for="<?php echo esc_attr( $this->get_field_id( 'showmodifieddate' ) ); ?>"><?php echo esc_html__( 'Show modified date:', 'last-posts-modified' ); ?></label>
   </p>
    <p>
        <input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showthumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showthumbnail' ) ); ?>" type="checkbox" <?php checked( $showthumbnail); ?>">
        <label for="<?php echo esc_attr( $this->get_field_id( 'showthumbnail' ) ); ?>"><?php echo esc_html__( 'Show thumbnail:', 'last-posts-modified' ); ?></label>
    </p>

    <hr>

    <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'nopost' ) ); ?>"><?php echo esc_html__( 'Message to display if we not found modified post:', 'last-posts-modified' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nopost' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nopost' ) ); ?>" type="text" value="<?php echo esc_attr( $nopost ); ?>">
    </p>
