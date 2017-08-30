<?php
/**
 * The template for displaying front page
 */

get_header(); ?>
    <div class="jumbotron row wpbs-site-icon">
    	<div class="col-md-7">
    		<div><img src="<?php site_icon_url(); ?>"></div>
    	</div>
    	<div class="col-md-5">
    		<div>
    			<h1><?php echo get_bloginfo('name'); ?></h1>
    			<h3><?php echo get_bloginfo('description'); ?></h3>
    		</div>
    	</div>
    </div>
    <div class="col-lg-9 wpbs-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

            <?php
            if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content-list', get_post_format() );

                endwhile;

                if ( function_exists('wp_bootstrap_pagination') ):
                	wp_bootstrap_pagination();
                endif;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
<?php
get_sidebar();
get_footer();
