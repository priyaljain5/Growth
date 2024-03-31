<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction
 *
 * about section
 */
$wp_customize->add_section(
	'bond_construction_about',
	array(
		'title' => esc_html__( 'About', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'bond_construction_about',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'bond_construction_about',
	array(
		'section'		=> 'bond_construction_about',
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
	'bond_construction_about_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'About Us', 'bond-construction' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_about_sub_title',
	array(
		'section'		=> 'bond_construction_about',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback'	=> 'bond_construction_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_about_sub_title', 
	array(
        'selector'            => '#about p.section-subtitle',
		'render_callback'     => 'bond_construction_about_partial_subtitle',
	) 
);

for ($i=1; $i <= 1 ; $i++) {

	// blog page setting
	$wp_customize->add_setting(
		'bond_construction_about_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'bond_construction_about_page_'.$i,
		array(
			'section'		=> 'bond_construction_about',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_about_page'
		)
	);
}