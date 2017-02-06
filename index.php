<?php
/**
 * Index File
 */

get_header();

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);

?>

<main>
	<div class="wrapper">
		<div class="content-wrapper">
			<div class="blog-wrapper">

			<?php
				if ( have_posts() ) :

					while ( have_posts() ) : the_post(); ?>

				<?php

						get_template_part( 'parts/content-index', get_post_format() ); ?>

				<?php 	endwhile; ?>

				</div>

				<?php

						get_sidebar();


					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );
					get_sidebar();

			endif; ?>
		</div>
	</div>
</main>

<?php if ( is_active_sidebar( 'cta' ) ): ?>
	<div id="widget-area-footer">
		<div class="widget-full-contain">
			<?php dynamic_sidebar( 'cta' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
