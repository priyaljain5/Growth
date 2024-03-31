<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction
 *
 * recent_news section
 */

$wp_customize->add_section(
	'bond_construction_recent_news',
	array(
		'title' => esc_html__( 'Blog Section', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// recent_news enable settings
$wp_customize->add_setting(
	'bond_construction_recent_news',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bond_construction_recent_news',
	array(
		'section'		=> 'bond_construction_recent_news',
		'label'			=> esc_html__( 'Content type:', 'bond-construction' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bond-construction' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bond-construction' ),
				'page' => esc_html__( 'Page', 'bond-construction' ),
				'cat' => esc_html__( 'Category', 'bond-construction' ),
		 	)
	)
);

$wp_customize->add_setting(
	'bond_construction_recent_news_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Lorem Ipsum available, but the majority have suffered alteration in some form', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_recent_news_sub_title',
	array(
		'section'		=> 'bond_construction_recent_news',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback' => 'bond_construction_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_recent_news_sub_title', 
	array(
        'selector'            => '#recent-news p.section-subtitle',
		'render_callback'     => 'bond_construction_recent_news_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'bond_construction_recent_news_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Choose Your Perfect Plan', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_recent_news_title',
	array(
		'section'		=> 'bond_construction_recent_news',
		'label'			=> esc_html__( 'Title:', 'bond-construction' ),		
		'active_callback' => 'bond_construction_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_recent_news_title', 
	array(
        'selector'            => '#recent-news h2.section-title',
		'render_callback'     => 'bond_construction_recent_news_partial_title',
	) 
);

for ($i=1; $i <= 6; $i++) { 

	// recent_news page setting
	$wp_customize->add_setting(
		'bond_construction_recent_news_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'bond_construction_recent_news_page_'.$i,
		array(
			'section'		=> 'bond_construction_recent_news',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_recent_news_page'
		)
	);
}

// recent_news category setting
$wp_customize->add_setting(
	'bond_construction_recent_news_cat',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
	)
);

$wp_customize->add_control(
	'bond_construction_recent_news_cat',
	array(
		'section'		=> 'bond_construction_recent_news',
		'label'			=> esc_html__( 'Category:', 'bond-construction' ),
		'active_callback' => 'bond_construction_if_recent_news_cat',
		'type'			=> 'select',
		'choices'		=> bond_construction_get_post_cat_choices(),
	)
);
