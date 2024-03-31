<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction Theme
 *
 * service section
 */

$wp_customize->add_section(
	'bond_construction_service',
	array(
		'title' => esc_html__( 'service', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// service enable settings
$wp_customize->add_setting(
	'bond_construction_service',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bond_construction_service',
	array(
		'section'		=> 'bond_construction_service',
		'label'			=> esc_html__( 'Content type:', 'bond-construction' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bond-construction' ),
		'type'			=> 'select',		
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bond-construction' ),
				'page' => esc_html__( 'Page', 'bond-construction' ),
		 	)
	)
);

for ($i=1; $i <= 3; $i++) { 

	// service page setting
	$wp_customize->add_setting(
		'bond_construction_service_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'bond_construction_service_page_'.$i,
		array(
			'section'		=> 'bond_construction_service',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_service_page'
		)
	);
}