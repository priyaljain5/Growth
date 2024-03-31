<?php
/**
 * Bond Construction Customizer
 *
 * @package Bond Construction
 *
 * featured_courses section
 */

$wp_customize->add_section(
	'bond_construction_featured_courses',
	array(
		'title' => esc_html__( 'Featured Section', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// featured_courses enable settings
$wp_customize->add_setting(
	'bond_construction_featured_courses',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bond_construction_featured_courses',
	array(
		'section'		=> 'bond_construction_featured_courses',
		'label'			=> esc_html__( 'Content type:', 'bond-construction' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bond-construction' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bond-construction' ),
				'page' => esc_html__( 'Page', 'bond-construction' ),
		 	)
	)
);

$wp_customize->add_setting(
	'bond_construction_featured_courses_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Working Process', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_featured_courses_title',
	array(
		'section'		=> 'bond_construction_featured_courses',
		'label'			=> esc_html__( 'Title:', 'bond-construction' ),		
		'active_callback' => 'bond_construction_if_featured_courses_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_featured_courses_title', 
	array(
        'selector'            => '#featured-courses h2.section-title',
		'render_callback'     => 'bond_construction_featured_courses_partial_title',
	) 
);

$wp_customize->add_setting(
	'bond_construction_featured_courses_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Lorem Ipsum available, but the majority have suffered alteration in some form.', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_featured_courses_sub_title',
	array(
		'section'		=> 'bond_construction_featured_courses',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback' => 'bond_construction_if_featured_courses_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_featured_courses_sub_title', 
	array(
        'selector'            => '#featured-courses p.section-subtitle',
		'render_callback'     => 'bond_construction_featured_courses_partial_sub_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 

	// featured_courses page setting
	$wp_customize->add_setting(
		'bond_construction_featured_courses_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'bond_construction_featured_courses_page_'.$i,
		array(
			'section'		=> 'bond_construction_featured_courses',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_featured_courses_page'
		)
	);
}

