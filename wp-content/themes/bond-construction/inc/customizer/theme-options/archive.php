<?php
/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'bond_construction_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'bond-construction' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'bond-construction' ),
		'panel' => 'bond_construction_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'bond_construction_archive_excerpt_length',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'bond_construction_archive_excerpt_length',
	array(
		'section'		=> 'bond_construction_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'bond-construction' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'bond_construction_archive_pagination_type',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'numeric',
	)
);

$archive_pagination_description = '';
$archive_pagination_choices = array( 
			'disable' => esc_html__( '--Disable--', 'bond-construction' ),
			'numeric' => esc_html__( 'Numeric', 'bond-construction' ),
			'older_newer' => esc_html__( 'Older / Newer', 'bond-construction' ),
		);

$wp_customize->add_control(
	'bond_construction_archive_pagination_type',
	array(
		'section'		=> 'bond_construction_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'bond-construction' ),
		'description'			=>  $archive_pagination_description,
		'type'			=> 'select',
		'choices'		=> $archive_pagination_choices,
	)
);

$wp_customize->add_setting(
	'bond_construction_archive_layout',
	array(
		'sanitize_callback' => 'bond_construction_sanitize_select',
		'default' => 'col-2',
	)
);

$wp_customize->add_control(
	'bond_construction_archive_layout',
	array(
		'section'		=> 'bond_construction_archive_settings',
		'label'			=> esc_html__( 'Archive Layout', 'bond-construction' ),
		'type'			=> 'select',
		'choices'		=> array(
				'list-layout' 	=> esc_html__( 'List Layout', 'bond-construction' ),
				'col-1' 		=> esc_html__( 'Column One', 'bond-construction' ),
				'col-2' 		=> esc_html__( 'Column Two', 'bond-construction' ),
				'col-3' 		=> esc_html__( 'Column Three', 'bond-construction' ),
		),
	)
);