<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bond Construction
 */

// Get the content type.
$team = get_theme_mod( 'bond_construction_team', 'disable' );
$subtitle   = get_theme_mod('bond_construction_team_sub_title',__('Lorem Ipsum available, but the majority have suffered alteration in some form','bond-construction') );
$team_title   = get_theme_mod('bond_construction_team_title', __('Here is Our Awesome Team','bond-construction') );
// Bail if the section is disabled.
if ( 'disable' === $team ) {
	return;
}

$get_content = bond_construction_get_section_content( 'team', $team, 3 );

?>

<div id="our-team" class="pt">
    <div class="container">
        <div id="box4" class="section-header aos_container">
            <?php if( !empty( $team_title ) ): ?>
                <h2 class="section-title"><?php echo esc_html( $team_title ); ?></h2>
            <?php endif; 

            if( !empty( $subtitle ) ): ?>
                <p class="section-subtitle aos_content"><?php echo esc_html( $subtitle ); ?></p>
            <?php endif; ?>
        </div><!-- .section-header -->

        <div class="section-content col-3 clear">

            <?php foreach ($get_content as $i=>$content): ?>

            <article>
                <div class="team-item-wrapper">
                    <div class="featured-image">
                        <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($content['id'],'medium_large')); ?>" alt="team"></a>
                    </div><!-- .featured-image -->

                    <header class="entry-header">
                        <span class="team-position"><?php echo esc_html(get_theme_mod('bond_construction_team_position_'.($i+1))); ?></span>
                        <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo $content['title']; ?></a></h2>
                    </header>
                    
                </div><!-- team-item-wrapper -->
            </article>

            <?php endforeach; ?>

        </div><!-- .section-content -->
    </div><!-- .container -->
</div><!-- #our-team -->