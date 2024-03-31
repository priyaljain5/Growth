<?php
/**
 * Bond Construction Customizer
 *
 * @package Bond Construction
 *
 * video section
 */
$wp_customize->add_section(
	'bond_construction_video',
	array(
		'title' => esc_html__( 'Video', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'bond_construction_video',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'page',
	)
);
$wp_customize->add_control(
	'bond_construction_video',
	array(
		'section'		=> 'bond_construction_video',
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
	'bond_construction_video_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Our Video', 'bond-construction' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_video_sub_title',
	array(
		'section'		=> 'bond_construction_video',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback'	=> 'bond_construction_if_video_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_video_sub_title', 
	array(
        'selector'            => '#video p.section-subtitle',
		'render_callback'     => 'bond_construction_video_partial_subtitle',
	) 
);

// post_video number setting
$wp_customize->add_setting(
	'bond_construction_video_excerpt',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_number_range',
		'default' => 45,
	)
);

$wp_customize->add_control(
	'bond_construction_video_excerpt',
	array(
		'section'		=> 'bond_construction_video',
		'label'			=> esc_html__( 'Number of excerpt text:', 'bond-construction' ),
		'description'			=> esc_html__( 'Min: 5 | Max: 100', 'bond-construction' ),
		'type'			=> 'number',
		'input_attrs'	=> array( 'min' => 5, 'max' => 100 ),
		'active_callback'	=> 'bond_construction_if_video_enabled',
	)
);
for ($i=1; $i <= 1 ; $i++) {
	// blog page setting
	$wp_customize->add_setting(
		'bond_construction_video_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'bond_construction_video_page_'.$i,
		array(
			'section'		=> 'bond_construction_video',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_video_page'
		)
	);
}

$wp_customize->add_setting(
	'bond_construction_video_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Learn More', 'bond-construction' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_video_btn_title',
	array(
		'section'		=> 'bond_construction_video',
		'label'			=> esc_html__( 'Btn Title:', 'bond-construction' ),
		'active_callback'	=> 'bond_construction_if_video_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_video_btn_title', 
	array(
        'selector'            => '#video div.read-more a',
		'render_callback'     => 'bond_construction_video_partial_btn_title',
	) 
);
