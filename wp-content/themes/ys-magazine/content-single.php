<?php
/**
 * @package YS Magazine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--	Prints the thumbnail image only if a thumbnail is set in a post.-->
	<?php
		if (has_post_thumbnail()) {
			echo '<div class="single-post-thumbnail clear">';
			echo the_post_thumbnail('ys-magazine-large-thumb');
			echo '</div>';
		}
	?>
	<header class="entry-header row between-xs">

		<!--Outputs the title of ys-magazine-->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<!--Outputs the meta of ys-magazine-->
		<div class="entry-meta col-sm-12 col-md-5">
			<?php ys_magazine_posted_on(); ?>
		</div><!-- .entry-meta -->

		<!--Outputs the categories of ys-magazine-->
		<?php
			/*translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'ys-magazine' ) );

			if ( ys_magazine_categorized_blog() ) {
				echo '<div class="category-list col-sm-12 col-md-5">' .__( 'Category ', 'ys-magazine' ). $category_list . '</div>';
			}
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ys-magazine' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php ys_magazine_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
