<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction
 *
 * cta section
 */
$wp_customize->add_section(
	'bond_construction_cta',
	array(
		'title' => esc_html__( 'Cta', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);


// blog enable settings
$wp_customize->add_setting(
	'bond_construction_cta',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'bond_construction_cta',
	array(
		'section'		=> 'bond_construction_cta',
		'label'			=> esc_html__( 'Content type:', 'bond-construction' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bond-construction' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' 	=> esc_html__( '--Disable--', 'bond-construction' ),
				'page' 		=> esc_html__( 'Page', 'bond-construction' ),
		 	)
	)
);

$wp_customize->add_setting(
	'bond_construction_cta_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET SOLUTIONS FAST', 'bond-construction' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_cta_sub_title',
	array(
		'section'		=> 'bond_construction_cta',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback'	=> 'bond_construction_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_cta_sub_title', 
	array(
        'selector'            => '#call-to-action p.section-subtitle',
		'render_callback'     => 'bond_construction_cta_partial_subtitle',
	) 
);

$wp_customize->add_setting( 
		'bond_construction_cta_bg_image',
		array(
			'sanitize_callback' => 'bond_construction_sanitize_image',
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'bond_construction_cta_bg_image',
		array(
			'label'       		=> esc_html__( 'cta Image', 'bond-construction' ),
			'section'     		=> 'bond_construction_cta',
			'active_callback'	=> 'bond_construction_if_cta_enabled',
		)
	) );

for ($i=1; $i <= 1 ; $i++) {
	
	// blog page setting
	$wp_customize->add_setting(
		'bond_construction_cta_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'bond_construction_cta_page_'.$i,
		array(
			'section'		=> 'bond_construction_cta',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_cta_page'
		)
	);
}

$wp_customize->add_setting(
	'bond_construction_cta_btn',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET A QUOTE HERE', 'bond-construction' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_cta_btn',
	array(
		'section'		=> 'bond_construction_cta',
		'label'			=> esc_html__( 'Button Label:', 'bond-construction' ),
		'active_callback'	=> 'bond_construction_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_cta_btn', 
	array(
        'selector'            => '#call-to-action div.read-more a',
		'render_callback'     => 'bond_construction_cta_partial_btn',
	) 
);

