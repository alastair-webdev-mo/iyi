<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Favicon -->

<!-- Analytics -->

<!-- SEO -->

<!-- Scripts -->
<script src="https://use.fontawesome.com/3cf330e970.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="top">
	<div class="contain">
		<div class="top-wrap">
			<div class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/iyi_logo.png" alt="Improve Your ISA" width="167">
				<a href="<?php echo get_home_url(); ?>" class="logo-link"></a>
			</div>
			<nav class="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
		</div>
	</div>
</header>
