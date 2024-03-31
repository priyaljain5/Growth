<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bond Construction
 */

// Get the content type.
$featured_courses = get_theme_mod( 'bond_construction_featured_courses', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $featured_courses ) {
	return;
}
$featured_courses_count    = get_theme_mod( 'bond_construction_featured_courses_count', 3 ) ;

$featured_courses_title    = get_theme_mod( 'bond_construction_featured_courses_title', __( 'Working Process', 'bond-construction') );
$featured_courses_subtitle    = get_theme_mod( 'bond_construction_featured_courses_sub_title', __( 'Lorem Ipsum available, but the majority have suffered alteration in some form.', 'bond-construction') );

$featured_courses_excerpt = get_theme_mod( 'bond_construction_featured_courses_excerpt', 30 );

$get_content = bond_construction_get_section_content( 'featured_courses', $featured_courses, $featured_courses_count  );
?>

<div id="featured-courses" class="pt">
    <div class="container">
        <div class="section-header">
           <?php if( !empty( $featured_courses_title ) ):

                ?>
                <h2 class="section-title"><?php echo esc_html( $featured_courses_title ); ?></h2>
            <?php endif; 

            if( !empty( $featured_courses_subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $featured_courses_subtitle ); ?></p>
            <?php endif; ?>
        </div><!-- .section-header -->

    <div class="section-content col-3 clear">

        <?php foreach ( $get_content as $content ): ?>

            <article>
                <div class="featured-courses-wrapper">
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html( wp_trim_words( $content['content'], $featured_courses_excerpt ) ); ?></p>
                        </div><!-- .entry-content -->

                         <div class="featured-image">
                            <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>" alt="news"></a>
                        </div><!-- .featured-image -->
                    </div><!-- .entry-container -->
                </div><!-- featured-courses-wrapper -->
            </article>

        <?php endforeach; ?>

    </div><!-- .section-content -->
</div><!-- .wrapper -->
</div><!-- #featured-courses -->