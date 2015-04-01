<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
					<!--vervang met goeie cpyright datum code!-->
					&copy; <?php 
				$copyYear = 2011; 
				$curYear = date('Y'); 
				echo $copyYear . (($copyYear != $curYear) ? '–' . $curYear : '');
				?> ONGEkUNSTELD
				<div class="rss">
	<a href="feed:https://www.ongekunsteld.net/feed/">R</a></div>
	<div class="twitter">
	<a href="https://twitter.com/ongekunsteld">T</a>
	</div>
	<div class="facebook">
	<a href="https://www.facebook.com/ongekunsteld.net">F</a>
	</div>
				
				<a href="#top" id="smoothup" title="Back to top"></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>