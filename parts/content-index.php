<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package isa_version_one
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

?>

<div class="index-post">
	<div class="index-post--image" style="background: url('<?php echo $url; ?>');background-size:cover;background-position: center;background-repeat:no-repeat;"><a href="<?php echo esc_url( get_permalink() ); ?>" class="image-link"></a></div>
	<article <?php post_class(); ?>>
        <div class="index-post--content">
            <div class="index-post--title">
              <?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            </div>
            <?php if ( 'post' === get_post_type() ) : ?>
	            <div class="index-post--readmore">
	            	<p><a href="<?php echo esc_url( get_permalink() ); ?>" class="read-link"><span>Read More</span></a></p>
	            </div>
            <?php endif; ?>
          </div>
    </article>
</div>