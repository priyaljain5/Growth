<?php
/**
 * The template for displaying archive pages
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
                <h2 class="page-title">
                    <?php 
                    if ( bond_construction_is_latest_posts() ) {
                        echo esc_html( get_theme_mod( 'bond_construction_your_latest_posts_title', esc_html__( 'Blogs', 'bond-construction' ) ) ); 
                    } elseif( bond_construction_is_frontpage_blog() ) {
                        single_post_title();
                    } 
                    ?>
                </h2>
            </header>
        </div><!-- #page-header -->
    </div><!-- #page-header -->

    <div id="content-wrapper" class="pt">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php 
                    $archive_layout = get_theme_mod( 'bond_construction_archive_layout', 'col-2' ); 
                    ?>
                    <div class="blog-post-wrapper <?php echo esc_attr( $archive_layout ); ?> clear">

                        <?php
                        if ( have_posts() ) :

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            wp_reset_postdata();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>
                    </div><!-- .posts-wrapper -->
                    <?php bond_construction_posts_pagination(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->
            
            <?php get_sidebar(); ?>

        </div>
    </div>

<?php
get_footer();
