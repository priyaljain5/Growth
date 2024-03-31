<?php
/**
 * Wild Themes Customizer
 *
 * @package Bond Construction Theme
 *
 * Team section
 */

$wp_customize->add_section(
	'bond_construction_team',
	array(
		'title' => esc_html__( 'Team', 'bond-construction' ),
		'panel' => 'bond_construction_home_panel',
	)
);

// team enable settings
$wp_customize->add_setting(
	'bond_construction_team',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bond_construction_team',
	array(
		'section'		=> 'bond_construction_team',
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
	'bond_construction_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Here is Our Awesome Team', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_team_title',
	array(
		'section'		=> 'bond_construction_team',
		'label'			=> esc_html__( 'Title:', 'bond-construction' ),		
		'active_callback' => 'bond_construction_if_team_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_team_title', 
	array(
        'selector'            => '#our-team h2.section-title',
		'render_callback'     => 'bond_construction_team_partial_title',
	) 
);

$wp_customize->add_setting(
	'bond_construction_team_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Lorem Ipsum available, but the majority have suffered alteration in some form.', 'bond-construction'),
	)
);

$wp_customize->add_control(
	'bond_construction_team_sub_title',
	array(
		'section'		=> 'bond_construction_team',
		'label'			=> esc_html__( 'Sub Title:', 'bond-construction' ),
		'active_callback' => 'bond_construction_if_team_enabled',	
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bond_construction_team_sub_title', 
	array(
        'selector'            => '#our-team p.section-subtitle',
		'render_callback'     => 'bond_construction_team_partial_sub_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 

	// team page setting
	$wp_customize->add_setting(
		'bond_construction_team_page_'.$i,
		array(
			'sanitize_callback' => 'bond_construction_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'bond_construction_team_page_'.$i,
		array(
			'section'		=> 'bond_construction_team',
			'label'			=> esc_html__( 'Page ', 'bond-construction' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'bond_construction_if_team_page'
		)
	);

	$wp_customize->add_setting(
		'bond_construction_team_position_'.$i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'	=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'bond_construction_team_position_'.$i,
		array(
			'section'		=> 'bond_construction_team',
			'label'			=> esc_html__( 'Members Position:', 'bond-construction' ). $i,
			'active_callback' => 'bond_construction_if_team_enabled',	
		)
	);

}