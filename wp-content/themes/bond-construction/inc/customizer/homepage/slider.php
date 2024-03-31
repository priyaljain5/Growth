<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction
 *
 * slider section
 */

$wp_customize->add_section(
	'bond_construction_slider',
	array(
		'title' => esc_html__( 'Slider Section', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'bond_construction_slider',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bond_construction_slider',
	array(
		'section'		=> 'bond_construction_slider',
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
	
	// slider page setting
	$wp_customize->add_setting(
		'bond_construction_slider_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'bond_construction_slider_page_'.$i,
		array(
			'section'		=> 'bond_construction_slider',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_slider_page'
		)
	);
}

$wp_customize->add_setting(
	'bond_construction_slider_button_label',
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Learn More', 'bond-construction' ),
	'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bond_construction_slider_button_label',
	array(
	'label'       => __('Button Label', 'bond-construction'),  
	'section'     => 'bond_construction_slider',   		
	'type'        => 'text',
	'active_callback'	=> 'bond_construction_if_slider_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_slider_button_label', 
	array(
        'selector'            => '#hero-slider div.read-more a',
		'render_callback'     => 'bond_construction_slider_partial_button',
	) 
);
