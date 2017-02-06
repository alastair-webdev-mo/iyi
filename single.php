<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package isa_version_one
 */

get_header(); ?>

<main>
	<div class="wrapper">

		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'parts/content', 'single' );
				get_sidebar();

				// End of the loop.
			endwhile;
		?>
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

<?php
get_footer();