<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPBS
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpbs' ); ?></a>
<div class="container">
	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="col-md-3">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->
			</div><!-- .col-md-3 -->
		
		
			<div class="col-md-9">
				<nav id="site-navigation" class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#wpbs-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo home_url(); ?>">
								<?php bloginfo('name'); ?>
							</a>
						</div>

						<?php
						wp_nav_menu( array(
							'manu'				=> 'primary',
							'theme_location'	=> 'primary',
							'depth'				=>  2,
							'container'			=> 'div',
							'container_class'	=> 'collapse navbar-collapse',
							'container_id'		=> 'wpbs-navbar-collapse-1',
							'menu_class'		=> 'nav navbar-nav',
							'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
							'walker'      		 => new WP_Bootstrap_Navwalker()
						) );
					?>
					</div>	
				</nav><!-- #site-navigation -->
			</div><!-- .col-md-9 -->
		</div><!-- .row -->
	</header><!-- #masthead -->
</div><!-- .container -->


	<div id="content" class="site-content">
