<?php
/**
 * Wild Themes 
 *
 * @package Bond Construction
 * active callbacks.
 * 
 */

/*========================slider==============================*/
/**
 * Check if the slider is enabled
 */
function bond_construction_if_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_slider' )->value();
}

/**
 * Check if the slider is category
 */
function bond_construction_if_slider_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'bond_construction_slider' )->value();
}

/**
 * Check if the slider is page
 */
function bond_construction_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_slider' )->value();
}

/**
 * Check if the slider is post
 */
function bond_construction_if_slider_post( $control ) {
	return 'post' === $control->manager->get_setting( 'bond_construction_slider' )->value();
}

/*========================Service==============================*/
/**
 * Check if the service is enabled
 */
function bond_construction_if_service_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_service' )->value();
}

/**
 * Check if the gallery is page
 */
function bond_construction_if_service_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_service' )->value();
}

/*========================Team==============================*/
/**
 * Check if the team is enabled
 */
function bond_construction_if_team_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_team' )->value();
}

/**
 * Check if the gallery is page
 */
function bond_construction_if_team_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_team' )->value();
}

/*========================recent_news==============================*/
/**
 * Check if the recent_news is enabled
 */
function bond_construction_if_recent_news_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_recent_news' )->value();
}

/**
 * Check if the recent_news is category
 */
function bond_construction_if_recent_news_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'bond_construction_recent_news' )->value();
}

/**
 * Check if the recent_news is page
 */
function bond_construction_if_recent_news_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_recent_news' )->value();
}

/*==========================About=========================*/
/**
 * Check if the about is enabled
 */
function bond_construction_if_about_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_about' )->value();
}

/**
 * Check if the about is page
 */
function bond_construction_if_about_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_about' )->value();
}

/*========================featured_courses==============================*/
/**
 * Check if the featured_courses is enabled
 */

function bond_construction_if_featured_courses_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_featured_courses' )->value();
}

/**
 * Check if the featured_courses is page
 */
function bond_construction_if_featured_courses_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_featured_courses' )->value();
}


/*==========================CTA=========================*/
/**
 * Check if the cta is enabled
 */
function bond_construction_if_cta_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_cta' )->value();
}

/**
 * Check if the cta is page
 */
function bond_construction_if_cta_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_cta' )->value();
}

/**
 * Check if custom color scheme is enabled
 */
function bond_construction_if_custom_color_scheme( $control ) {
	return 'custom' === $control->manager->get_setting( 'bond_construction_color_scheme' )->value();
}

/*==========================video=========================*/
/**
 * Check if the video is enabled
 */
function bond_construction_if_video_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bond_construction_video' )->value();
}

/**
 * Check if the video is page
 */
function bond_construction_if_video_page( $control ) {
	return 'page' === $control->manager->get_setting( 'bond_construction_video' )->value();
}

