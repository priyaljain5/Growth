<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bond Construction
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function bond_construction_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// When  color scheme is light or dark.
	$color_scheme = get_theme_mod( 'bond_construction_color_scheme', 'default' );
	$classes[] = esc_attr( $color_scheme ) . '-version';
	
	// When global archive layout is checked.
	if ( is_archive() || bond_construction_is_latest_posts() || is_404() || is_search() ) {
		$archive_sidebar = get_theme_mod( 'bond_construction_archive_sidebar', 'right' ); 
		$classes[] = esc_attr( $archive_sidebar ) . '-sidebar';
	} else if ( is_single() ) { // When global post sidebar is checked.
    	$bond_construction_post_sidebar_meta = get_post_meta( get_the_ID(), 'bond-construction-select-sidebar', true );
    	if ( ! empty( $bond_construction_post_sidebar_meta ) ) {
			$classes[] = esc_attr( $bond_construction_post_sidebar_meta ) . '-sidebar';
    	} else {
			$global_post_sidebar = get_theme_mod( 'bond_construction_global_post_layout', 'right' ); 
			$classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
    	}
	} elseif ( bond_construction_is_frontpage_blog() || is_page() ) {
		if ( bond_construction_is_frontpage_blog() ) {
			$page_id = get_option( 'page_for_posts' );
		} else {
			$page_id = get_the_ID();
		}

    	$bond_construction_page_sidebar_meta = get_post_meta( $page_id, 'bond-construction-select-sidebar', true );
		if ( ! empty( $bond_construction_page_sidebar_meta ) ) {
			$classes[] = esc_attr( $bond_construction_page_sidebar_meta ) . '-sidebar';
		} else {
			$global_page_sidebar = get_theme_mod( 'bond_construction_global_page_layout', 'right' ); 
			$classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
		}
	}
    

	return $classes;
}
add_filter( 'body_class', 'bond_construction_body_classes' );

function bond_construction_post_classes( $classes ) {
	if ( bond_construction_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );

		if( has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'bond_construction_post_classes' );

/**
 * Excerpt length
 * 
 * @since Bond Construction 1.0.0
 * @return Excerpt length
 */
function bond_construction_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'bond_construction_archive_excerpt_length', 60 );
	return $length;
}
add_filter( 'excerpt_length', 'bond_construction_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bond_construction_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bond_construction_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function bond_construction_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'bond-construction' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
    wp_reset_postdata();
}

/**
 * Get an array of cat id and title.
 * 
 */
function bond_construction_get_post_cat_choices() {
  $choices = array( '' => esc_html__( '--Select--', 'bond-construction' ) );
	$cats = get_categories();

	foreach ( $cats as $cat ) {
		$id = $cat->term_id;
		$title = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get an list of category sluf.
 * 
 */
function bond_construction_get_category_slug_list($post_id) {
    $cat_list = wp_get_post_categories($post_id);
    $cat_slug = "";
    foreach($cat_list as $cat_id){
        $cat = get_category($cat_id);
        $cat_slug = $cat_slug . "".$cat->slug . " ";
    }

    return $cat_slug;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function bond_construction_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function bond_construction_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function bond_construction_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function bond_construction_is_page_displays_posts() {
	return ( bond_construction_is_frontpage_blog() || is_search() || is_archive() || bond_construction_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function bond_construction_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Pagination in archive/blog/search pages.
 */
function bond_construction_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'bond_construction_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => bond_construction_get_svg( array( 'icon' => 'left-arrow' ) ),
            'next_text'          => bond_construction_get_svg( array( 'icon' => 'left-arrow' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => bond_construction_get_svg( array( 'icon' => 'left' ) ) . '<span>'. esc_html__( 'Older', 'bond-construction' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'bond-construction' ) .'</span>' . bond_construction_get_svg( array( 'icon' => 'right' ) ),
        )  );
	}
}

function bond_construction_get_svg_by_url( $url = false ) {
	if ( ! $url ) {
		return false;
	}

	$social_icons = bond_construction_social_links_icons();

	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $url, $attr ) ) {
			return bond_construction_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

if ( ! function_exists( 'bond_construction_the_excerpt' ) ) :

  /**
   * Generate excerpt.
   *
   * @since 1.0.0
   *
   * @param int     $length Excerpt length in words.
   * @param WP_Post $post_obj WP_Post instance (Optional).
   * @return string Excerpt.
   */
  function bond_construction_the_excerpt( $length = 0, $post_obj = null ) {

    global $post;

    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }

    $length = absint( $length );

    if ( 0 === $length ) {
      return;
    }

    $source_content = $post_obj->post_content;

    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }

    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
    return $trimmed_content;

  }

endif;

function bond_construction_get_section_content( $section_name, $content_type, $content_count ){

    $content = array();


    if (  in_array( $content_type, array( 'post', 'page' ) ) ) {
    $content_id = array();
    if ( 'post' === $content_type ) {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "bond_construction_{$section_name}_{$content_type}_" . $i );
            } 
    }else {
        for ( $i=1; $i <= $content_count; $i++ ) { 
            $content_id[] = get_theme_mod( "bond_construction_{$section_name}_{$content_type}_" . $i );
        }
    }
    $args = array(
        'post_type' => $content_type,
        'post__in' => (array)$content_id,   
        'orderby'   => 'post__in',
        'posts_per_page' => absint( $content_count ),
        'ignore_sticky_posts' => true,
    );

    } else {
        $cat_content_id = get_theme_mod( "bond_construction_{$section_name}_{$content_type}" );
        $args = array(
            'cat' => $cat_content_id,   
            'posts_per_page' =>  absint( $content_count ),
        );
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $i = 0;
        while ( $query->have_posts() ) {
            $query->the_post();

            $content[$i]['id'] = get_the_id();
            $content[$i]['title'] = get_the_title();
            $content[$i]['url'] = get_the_permalink();
            $content[$i]['content'] = get_the_content();
            $i++;
        }
        wp_reset_postdata();
    }

    return $content;
}

// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );