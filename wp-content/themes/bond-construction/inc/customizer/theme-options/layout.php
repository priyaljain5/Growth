<?php
/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'bond_construction_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'bond-construction' ),
		'panel' => 'bond_construction_general_panel',
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'bond_construction_archive_sidebar',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bond_construction_archive_sidebar',
	array(
		'section'		=> 'bond_construction_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'bond-construction' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'bond-construction' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'bond-construction' ), 
			'no' => esc_html__( 'No Sidebar', 'bond-construction' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'bond_construction_global_page_layout',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bond_construction_global_page_layout',
	array(
		'section'		=> 'bond_construction_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'bond-construction' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'bond-construction' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'bond-construction' ), 
			'no' => esc_html__( 'No Sidebar', 'bond-construction' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'bond_construction_global_post_layout',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bond_construction_global_post_layout',
	array(
		'section'		=> 'bond_construction_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'bond-construction' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'bond-construction' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'bond-construction' ), 
			'no' => esc_html__( 'No Sidebar', 'bond-construction' ), 
		),
	)
);