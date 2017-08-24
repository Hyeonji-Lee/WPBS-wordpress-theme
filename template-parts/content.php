<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPBS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<?php if(post_password_required()) : ?>
		<div class="post-thumbnail" style="background-color:#303030;">
			<h3 style="margin:60px 20px;">미리보기 없음<h3>
		</div><!-- .post-thumbnail -->
		<?php else : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'wpbs-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
	<?php endif; ?>
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title page-header">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title page-header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wpbs_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_single() ) :
			/* translators: %s: Name of current post */
			the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpbs' ),
					get_the_title()
					) );
			
			wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'wpbs' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
			) );
			
			else :
			
			the_excerpt( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpbs' ),
					get_the_title()
					) );
			
			wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'wpbs' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
			) );
			
			endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wpbs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
