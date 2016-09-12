
<?php
/*
 * Template Name: The front page template of YS Magazine.
 */

get_header(); ?>

	<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-8">
		<main id="main" class="site-main" role="main">


		<?php
			// The soliloquy image slider:
			if ( function_exists( 'soliloquy' ) ) {
				soliloquy( 'home-page-slider', 'slug' );
			}
		?>




<section class="front-page">

<div class="row first-row">
<!--The first category section			-->
	<section class="ys_category col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php
			$categoryID = get_theme_mod( 'first_category' );
			$categoryName = get_cat_name( $categoryID );
			echo'<h1 class="category-title">';
			echo $categoryName;
			echo '</h1>';
			?>
			<?php
				$catID = get_theme_mod( 'first_category' );
				$query = new WP_Query( array(
				'post_type' => 'post',
				'category__in' => $catID,
				'posts_per_page' => 2
			) );
			while ($query->have_posts()) : $query->the_post(); ?>
			<ul><li><a href="<?php the_permalink(); ?>">
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="index-thumbnail clear">';
					echo the_post_thumbnail('ys-magazine-index-thumb');
					echo '</div>';
				}
			?>
			<h2><?php the_title();?></h2>
			</a></li></ul>
			<?php the_excerpt();?>
			<div class="continue-reading">
				<?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Continue Reading', 'ys_magazine') . get_the_title() . __( 'Continue Reading', 'ys-magazine' ) . '</a>'; ?>
			</div><!-- .continue-reading -->
			<div class="posted-on">
				<?php ys_magazine_posted_on(); ?>
		    </div><!-- .entry-meta -->
			<?php endwhile; ?>
	</section>

<!--The second category section			-->
	<section class="ys_category col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php
			$categoryID = get_theme_mod( 'second_category' );
			$categoryName = get_cat_name( $categoryID );
			echo'<h1 class="category-title">';
			echo $categoryName;
			echo '</h1>';
			?>
			<?php
				$catID = get_theme_mod( 'second_category' );
				$query = new WP_Query( array(
				'post_type' => 'post',
				'category__in' => $catID,
				'posts_per_page' => 2
			) );
			while ($query->have_posts()) : $query->the_post(); ?>
			<ul><li><a href="<?php the_permalink(); ?>">
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="index-thumbnail clear">';
					echo the_post_thumbnail('ys-magazine-index-thumb');
					echo '</div>';
				}
			?>
			<h2><?php the_title();?></h2>
			</a></li></ul>
			<?php the_excerpt();?>
			<div class="continue-reading">
				<?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Continue Reading', 'ys_magazine') . get_the_title() . __( 'Continue Reading', 'ys-magazine' ) . '</a>'; ?>
			</div><!-- .continue-reading -->
			<div class="posted-on">
				<?php ys_magazine_posted_on(); ?>
		    </div><!-- .entry-meta -->
			<?php endwhile; ?>
	</section>
 </div> <!--end of first-row -->

<div class="row second-row">
<!--The third category section			-->
	<section class="ys_category col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php
			$categoryID = get_theme_mod( 'third_category' );
			$categoryName = get_cat_name( $categoryID );
			echo'<h1 class="category-title">';
			echo $categoryName;
			echo '</h1>';
			?>
			<?php
				$catID = get_theme_mod( 'third_category' );
				$query = new WP_Query( array(
				'post_type' => 'post',
				'category__in' => $catID,
				'posts_per_page' => 2
			) );
			while ($query->have_posts()) : $query->the_post(); ?>
			<ul><li><a href="<?php the_permalink(); ?>">
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="index-thumbnail clear">';
					echo the_post_thumbnail('ys-magazine-index-thumb');
					echo '</div>';
				}
			?>
			<h2><?php the_title();?></h2>
			</a></li></ul>
			<?php the_excerpt();?>
			<div class="continue-reading">
				<?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Continue Reading', 'ys_magazine') . get_the_title() . __( 'Continue Reading', 'ys-magazine' ) . '</a>'; ?>
			</div><!-- .continue-reading -->
			<div class="posted-on">
				<?php ys_magazine_posted_on(); ?>
		    </div><!-- .entry-meta -->
			<?php endwhile; ?>
	</section>

<!--The fourth category section			-->
	<section class="ys_category col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<?php
			$categoryID = get_theme_mod( 'fourth_category' );
			$categoryName = get_cat_name( $categoryID );
			echo'<h1 class="category-title">';
			echo $categoryName;
			echo '</h1>';
			?>
			<?php
				$catID = get_theme_mod( 'fourth_category' );
				$query = new WP_Query( array(
				'post_type' => 'post',
				'category__in' => $catID,
				'posts_per_page' => 2
			) );
			while ($query->have_posts()) : $query->the_post(); ?>
			<ul><li><a href="<?php the_permalink(); ?>">
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="index-thumbnail clear">';
					echo the_post_thumbnail('ys-magazine-index-thumb');
					echo '</div>';
				}
			?>
			<h2><?php the_title();?></h2>
			</a></li></ul>
			<?php the_excerpt();?>
			<div class="continue-reading">
				<?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Continue Reading', 'ys_magazine') . get_the_title() . __( 'Continue Reading', 'ys-magazine' ) . '</a>'; ?>
			</div><!-- .continue-reading -->
			<div class="posted-on">
				<?php ys_magazine_posted_on(); ?>
		    </div><!-- .entry-meta -->
			<?php endwhile; ?>
	</section> <!-- end of front page -->
</div> <!--end of second-row -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
