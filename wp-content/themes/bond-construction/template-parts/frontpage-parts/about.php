<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bond Construction
 */

// Get the content type.
$about = get_theme_mod( 'bond_construction_about', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $about ) {
    return;
}

$sub_title    = get_theme_mod( 'bond_construction_about_sub_title', __( 'About Us', 'bond-construction') ) ;
$get_content = bond_construction_get_section_content( 'about', $about, 1  );
?>

<div id="about" class="pt" >
    <div class="container">
        <div id="box5" class="aos_container">
            <?php foreach ( $get_content as $content ): ?>

            <article class="has-post-thumbnail aos_content" >
                <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');" >
                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                </div>
                <div class="entry-container">
                    <div class="section-header" >
                        <?php if( !empty( $sub_title ) ): ?>
                        <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
                    <?php endif; ?>
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </div><!-- .section-header -->

                    <div class="entry-content" >
                        <p><?php echo esc_html( wp_trim_words( $content['content'], 45 ) ); ?></p>

                        <div class="read-more" >
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="button"><?php echo esc_html( 'Learn More', 'bond-construction' ); ?></a>
                        </div><!-- .read-more -->

                    </div><!-- .entry-content -->
                </div><!-- .entry-container -->
            </article>

            <?php endforeach; ?>
        </div>
    </div><!-- .container -->
</div><!-- #about -->