<?php
/**
 * Template Name: ONGEkUNSTELD Team
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );

					//Toon alle Hoofdredacteuren
						$blogusers = get_users( 'orderby=nicename&role=editor' );
							// Array of WP_User objects.
							foreach ( $blogusers as $user ) {
								echo '<span>' . esc_html( $user->display_name ) . '</span>';
							}
							
					//Toon alle Redacteuren
						$blogusers = get_users( 'orderby=nicename&role=author' );
							// Array of WP_User objects.
							foreach ( $blogusers as $user ) {
								echo '<span>' . esc_html( $user->display_name ) . '</span>';
							}



				?>
			</article><!-- #post-## -->

			<?php
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
