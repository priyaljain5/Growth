<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bond Construction
 */

get_header(); ?>
	<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( get_header_image() ) ; ?>');">
	 	<div class="overlay"></div>
        <div class="container"> 
	        <header class="page-header">
	            <?php
				if ( is_singular() ) :
					the_title( '<h1 class="page-title">', '</h1>' );
				else :
					the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
	        </header>
	        <?php  
	        $breadcrumb_enable = get_theme_mod( 'bond_construction_breadcrumb_enable', true );
	        if ( $breadcrumb_enable ) : 
	            ?>
	            <div id="breadcrumb-list">
	                    <?php echo bond_construction_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
	            </div><!-- #breadcrumb-list -->
	        <?php endif; ?>
	    </div><!-- .wrapper -->
	</div><!-- #page-site-header -->
	 
	<div id="content-wrapper" class="pt container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
                		<div class="single-wrapper">
							<?php get_template_part( 'template-parts/content', 'page' );
						?>
						</div>
						<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

					endwhile; // End of the loop.
					?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
    </div><!-- #inner-content-wrapper-->

<?php
get_footer();
