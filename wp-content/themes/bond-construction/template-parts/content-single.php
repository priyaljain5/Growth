<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bond Construction
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php

	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
	        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</div><!-- .featured-post-image -->
	<?php endif; ?>

	<div class="entry-meta">
	    <?php bond_construction_posted_on(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-container">
	    <div class="entry-content">

	        <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bond-construction' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bond-construction' ),
				'after'  => '</div>',
			) );
			?>
	    </div><!-- .entry-content -->
	    <?php bond_construction_post_author(); ?>
	</div><!-- .entry-container -->
    <div class="entry-meta">
    	<?php echo bond_construction_cats(); bond_construction_tags(); ?>
    </div><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->