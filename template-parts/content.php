<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simpla_dois
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		$post_thumbnail_ID = get_post_thumbnail_id($post->ID);
		if ( $post_thumbnail_ID != "" ){
			$img_src = wp_get_attachment_image_url( $post_thumbnail_ID, 'medium' );
			$img_srcset = wp_get_attachment_image_srcset( $post_thumbnail_ID, 'medium' ); ?>
			<img src="<?php echo esc_url( $img_src ); ?>"
					 srcset="<?php echo esc_attr( $img_srcset ); ?>" />
			<?php } ?>

		<div class="entry-header__wrapper">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>

			<?php
			endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'simpla_dois' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simpla_dois' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php simpla_dois_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php simpla_dois_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
