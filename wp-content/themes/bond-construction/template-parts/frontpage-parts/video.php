<?php
/**
* Template part for displaying front page introduction.
*
* @package Bond Construction
*/

// Get the content type.
$video = get_theme_mod( 'bond_construction_video', 'page' );
// Bail if the section is disabled.
if ( 'disable' === $video ) {
    return;
}
$video_excerpt = get_theme_mod( 'bond_construction_video_excerpt', 45 ) ;
$video_btn    = get_theme_mod( 'bond_construction_video_btn_title', __( 'EXPLORE MORE', 'bond-construction') ) ;
$sub_title    = get_theme_mod( 'bond_construction_video_sub_title', __( 'Our Video', 'bond-construction') ) ;
$get_content = bond_construction_get_section_content( 'video', $video, 1  );
?>

<div id="video" class="pt">
    <div class="container">
        <?php foreach ( $get_content as $content ): ?>
            <article class="has-post-thumbnail">
                <div class="entry-container">
                    <div class="section-header">
                        <?php if( !empty( $sub_title ) ): ?>
                            <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif; ?>
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </div><!-- .section-header -->

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( $content['content'], $video_excerpt ) ); ?></p> 
                    </div><!-- .entry-content -->

                    <?php if( !empty( $video_btn ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="button"><?php echo esc_html( $video_btn ); ?></a>
                        </div>
                    <?php endif; ?>
                </div><!-- .entry-container -->

                <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                </div><!-- .featured-image -->
            </article>
        <?php endforeach; ?>    
    </div><!-- .container -->
</div><!-- #video -->