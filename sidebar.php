<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package isa_version_one
 */

?>

<aside class="sidebar" role="complementary">

    <?php if(is_page('contact')) : ?>

        <?php if ( is_active_sidebar( 'contact' ) ): ?>
            <?php dynamic_sidebar( 'contact' ); ?>
        <?php endif; ?>

    <?php else : ?>

    <div class="side-item recent" style="display: none;">
        <h2>Recent Posts</h2>
        <ul>
            <?php
                $args = array( 'numberposts' => '5' );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></li>';
                }
                wp_reset_query();
            ?>
        </ul>
    </div>

    <?php if ( is_active_sidebar( 'social' ) ): ?>
        <?php dynamic_sidebar( 'social' ); ?>
    <?php endif; ?>
    

    <?php if ( is_active_sidebar( 'report' ) ): ?>
        <?php dynamic_sidebar( 'report' ); ?>
    <?php endif; ?>
    
    <?php if ( is_active_sidebar( 'apply' ) ): ?>
        <?php dynamic_sidebar( 'apply' ); ?>
    <?php endif; ?>

    <?php endif;?>

</aside>
