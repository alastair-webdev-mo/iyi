<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package isa_version_one
 */

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);

?>

<?php if(is_page('home')) : ?>

<div id="top-home">
	<div class="contain">

		<h1>Advice simplified, straightforward investment solutions</h1>
		<a href=""><button id="apply-now">Get Started</button></a>

	</div>
</div>

<?php endif; ?>

<?php if(is_page('home')) : ?>

<div class="slider">
	<ul>
		<li>
			<div id="hero" class="quote">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/coins-in-jar.jpg" alt="coins-in-jar">
				<div class="hero-title">
					<h3><span>"Don't work for money; Make it work for you."</span></h3>
					<h4><span>- Robert Kiyosaki <small>(Author of Rich Dad Poor Dad)</small></span></h4>
				</div>
				<div class="hero-overlay"></div>
			</div>
		</li>
		<li>
			<div id="hero" class="quote">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/couple-deal.jpg" alt="couple-deal">
				<div class="hero-title">
					<h3><span>"The stock market is a device for transferring money from the impatient to the patient."</span></h3>
					<h4><span>- Warren Buffett <small>(Investor)</small></span></h4>
				</div>
				<div class="hero-overlay"></div>
			</div>
		</li>
		<li>
			<div id="hero" class="quote">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/couple-investing.jpg" alt="couple-investing">
				<div class="hero-title">
					<h3><span>"Never depend on single income. Make investment to create a second source."</span></h3>
					<h4><span>- Warren Buffett <small>(Investor)</small></span></h4>
				</div>
				<div class="hero-overlay"></div>
			</div>
		</li>
		<li>
			<div id="hero" class="quote">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/girl-piggybank.jpg" alt="girl-piggybank">
				<div class="hero-title">
					<h3><span>"Poor people spend their money and invest what's left. The rich invest their money and spend what's left."</span></h3>
					<h4><span>- Jim Rohn <small>(Entrepreneur &amp; Author)</small></span></h4>
				</div>
				<div class="hero-overlay"></div>
			</div>
		</li>
	</ul>
</div>

<?php else : ?>

<div id="hero">
	<img src="<?php echo $url; ?>" alt="<?php echo the_title_attribute(); ?>">
	<div class="hero-title">
		<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
		<h3><span><?php echo the_subtitle(); ?></span></h3>
	</div>
	<div class="hero-overlay"></div>
</div>

<?php endif; ?>

<?php if(is_page('home')) : ?>

	<?php if ( is_active_sidebar( 'three-col-widget' ) ): ?>
		<div id="widget-area">
			<?php dynamic_sidebar( 'three-col-widget' ); ?>
		</div>
	<?php endif; ?>

<?php endif; ?>

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