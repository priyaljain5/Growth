<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bond Construction
 */

// Get the content type.
$slider = get_theme_mod( 'bond_construction_slider', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $slider ) {
	return;
}

$slider_btn    = get_theme_mod( 'bond_construction_slider_button_label', __( 'Learn More', 'bond-construction') );

$get_content = bond_construction_get_section_content( 'slider', $slider, 3  );
?>

<div id="hero-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": false, "fade": true }'>

    <?php foreach ( $get_content as $content ): ?>

    <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-slider-wrapper">
                <header class="entry-header" >
                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                </header>

                <div class="entry-content" >
                    <p ><?php echo esc_html( wp_trim_words( $content['content'], 35 ) ); ?></p>
                </div><!-- .entry-content -->

                <?php if( !empty( $slider_btn ) ): ?>
                <div id="box3" class="read-more aos_container" >
                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="button aos_content" tabindex="0"><?php echo esc_html( $slider_btn ); ?></a>
                </div>
            <?php endif; ?>
            </div><!-- .hero-slider-wrapper -->
        </div><!-- .container -->
    </article>

<?php endforeach; ?>

</div><!-- #featured-slider -->