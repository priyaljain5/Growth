<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bond Construction
 */

?>

<?php
 if ( has_post_thumbnail() ) {
	$classes ='has-post-thumbnail';
} else {
	$classes ='no-post-thumbnail';
}?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="<?php echo esc_attr($classes); ?>">
	<?php

	$img_url = '';
	if ( has_post_thumbnail() ) :
		$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	?>
		<div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ); ?>');">
			<?php
			if ( ! empty( $img_url ) ) : ?>
		    	<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
			<?php endif; ?>
		</div><!-- .featured-image -->
	<?php	
	endif;
	?>
		
		<div class="entry-container">
			<?php the_category('', ''); ?>
	        <header class="entry-header">
	            <?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
	        </header>
	        <div class="entry-content">
	            <?php the_excerpt(); ?>
					
	       </div><!-- .entry-content -->
        	
	    <div class="entry-meta">
	    	<?php bond_construction_posted_on(); ?>
	    </div>
</article><!-- #post-<?php the_ID(); ?> -->
