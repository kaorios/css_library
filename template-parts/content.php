<?php
/**
 * Template part for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CSS_library
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php css_library_post_thumbnail(); ?>
	<header class="entry-header">
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

	<?php
		if ( 'post' === get_post_type() ) {
		?>
		<div class="entry-meta">
		<?php css_library_posted_on(); 

			/* translators: used between list items, there is a space */
			$categories_list = get_the_category_list( esc_html__( ' ', 'css-library' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'css-library' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
		?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt();
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'css-library' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php css_library_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
