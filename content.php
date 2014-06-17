<?php
/**
 * @package simple content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Delete these marks to enable post thumbnails in blog - not ideal in a responsive/mobile-friendly environment... 
<?php if(has_post_thumbnail() ) : ?>
	  <?php the_post_thumbnail( 'medium' ); ?>
	<?php endif; ?>-->

	<header class="entry-header">
		
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
	
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->


	<footer class="entry-footer">
	 <?php the_time('F j, Y'); ?>
	 <span class="sep">|</span>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'simple-content' ) );
				if ( $categories_list && simple_content_categorized_blog() ) :
			?>	
			<span class="cat-links">
			
				<?php printf( $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>


<!-- COMMENTS -->

<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		
		<span class="comments-link"><?php comments_popup_link( __( '', 'simple-content' ), __( '<span class="sep">|</span>1 Comment', 'simple-content' ), __( '<span class="sep">|</span> % Comments', 'simple-content' ) ); ?></span>
		<?php endif; ?>


			

		<?php endif; // End if 'post' == get_post_type() ?>

		

		<?php edit_post_link( __( '<span class="sep">|</span> Edit', 'simple-content' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->