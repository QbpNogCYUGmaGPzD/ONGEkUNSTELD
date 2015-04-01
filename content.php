<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfourteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list(); ?></span>
		
		<?php
				if ( 'post' == get_post_type() ) ?>
					 <span class="entry-meta-functie">TEKSt</span> <span class="entry-meta-naam"><?php the_author_posts_link(); ?></span> &nbsp; &nbsp; 
					 <span class="entry-meta-functie">BEELD</span> <span class="entry-meta-naam"><?php echo get_post_meta( get_the_ID(), 'Beeldnaam', true); ?></span>
					 <?php
					/*twentyfourteen_posted_on();*/

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				/*edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );*/
			?>
			
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		

	<?php if ( is_search() || is_home() || is_archive() ) : ?>
	<div class="entry-summary">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav"></span>', 'twentyfourteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>

	
	
	<!--   Plaats deel icons    -->
	<?php	if ( function_exists( 'sharing_display' ) ) {
		sharing_display( '', true );
		}
 
		if ( class_exists( 'Jetpack_Likes' ) ) {
			$custom_likes = new Jetpack_Likes;
			echo $custom_likes->post_likes( '' );
	
		}
		?>
		<!-- einde social Jetpack-->
		

	</div><!-- .entry-content -->
	
	<?php endif; ?>
	
	<!--<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>-->
</article><!-- #post-## -->

<!-- Doe Mee -->
	<?php 
	if ( is_single() ) : ?>
	
	<div id="teaserWrapper">
		<span class="teaserThumb">
			<a href="<?php echo site_url(); ?>/meedoen/"><img src="<?php echo get_stylesheet_directory_uri();  ?>/images/DOEMEE.gif"/ style="width:260px; height:227px"></a>
		</span>
	<div id="teaserText">
		<span class="teaserTitle">Ben je het oneens met de schrijver of heb 
je een interessante toevoeging?</span>
		<span class="teaserP"><p><a href="<?php echo site_url(); ?>/registreren/">Schrijf</a> je artikel!<p></span>

		<span class="teaserTitle">Wees niet bang:</span><br>
		<span class="teaserP">Je wordt goed begeleid door de eindredactie. Bovendien krijgt je artikel een visuele prikkel van onze beeldredactie.</span>	
		</div>
	</div><!--einde doemee -->
	
		<?php endif; ?>


<!--   gerelateerde artikelen hieronder   -->
		<?php if ( is_single() ) :?> 
<div id="gerelateerdWrapper">	
	<div class="gerelateerdContainer">
		<div class="relatedposts">
			<h3>ook in jouw straatje</h3>
			<?php
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);
				
				if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=>6, // Number of related posts to display.
				'caller_get_posts'=>1
				);
				
				$my_query = new wp_query( $args );

				while( $my_query->have_posts() ) {
				$my_query->the_post();
				?>
				
				<div class="relatedthumb">
					<a href="<? the_permalink()?>"><?php the_post_thumbnail(array(200,96)); ?></a><br />
					<span class="categorie-related-link"><?php the_category(); ?></span><br />
					<a href="<? the_permalink()?>"><span class="related-title"><?php the_title(); ?></span></a>
					
				</div>
				
				<?php }
				}
				$post = $orig_post;
				wp_reset_query();
				?>
				</div><!--eind gerelateerdContainer-->
	</div><!--eind relatedposts-->
</div><!--eind gerelateerdWrapper-->
<?php endif; 