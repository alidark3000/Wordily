<?php
/**
 * @package simple content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	
		

		<div class="entry-meta">
			<?php simple_content_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->



	<div class="entry-content">
	 <?php if (has_excerpt() ) : ?>
		<div class="entry-summary">
		 <?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
	
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simple-content' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

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

<?php if (get_comments_number()==0) : ?>
<?php else : ?>
    <span class="sep">|</span> 
<?php endif; ?>

<span class="comments-link"><?php comments_popup_link( __( '', 'simple-content' ), __( '1 Comment', 'simple-content' ), __( ' % Comments', 'simple-content' ) ); ?></span>
		<?php endif; ?>


<!-- TAGS -->
	
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'simple-content' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
  				<span class="sep">|</span>
				<?php printf( $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

<!-- EDIT LINK -->		

		<?php if ( current_user_can('edit_post') ) : ?>
			<span class="sep">|</span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'simple-content' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->