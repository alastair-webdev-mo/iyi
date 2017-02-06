<?php
/**
 * Template part for displaying single post content in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package isa_version_one
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
?>

<div id="hero">
	<img src="<?php echo $url; ?>" alt="<?php echo the_title_attribute(); ?>">
	<div class="hero-title">
		<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
		<h3><span><?php echo the_subtitle(); ?></span></h3>
	</div>
	<div class="hero-overlay"></div>
</div>

<div class="content-wrapper">

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'isa_version_one' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>
	<?php endif; ?>
</div>