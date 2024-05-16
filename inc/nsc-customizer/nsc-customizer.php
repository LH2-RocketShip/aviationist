<?php
function nsc_blog_add_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/nsc-customizer/nsc-toggle-controls.php' );
}
add_action( 'customize_register', 'nsc_blog_add_custom_controls' );

function nsc_blog_customizer_register( $wp_customize ){

	//  site title and tagline
	$wp_customize->add_setting( 'nsc_blog_site_title',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
	));
	$wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_site_title',array(
		'label' => esc_html__( 'Show / Hide Title','nsc-blog' ),
		'section' => 'title_tagline'
	)));

	$wp_customize->add_setting( 'nsc_blog_site_description',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
	));
	$wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_site_description',array(
		'label' => esc_html__( 'Show / Hide Description','nsc-blog' ),
		'section' => 'title_tagline'
	)));

	$wp_customize->add_setting( 'nsc_blog_site_content_aside',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
	));
	$wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_site_content_aside',array(
		'label' => esc_html__( 'Show Title Beside the Logo ','nsc-blog' ),
		'section' => 'title_tagline'
	)));


  //  menu list
  $menus = wp_get_nav_menus();
  $menu_list = array();

  if ($menus) {
      foreach ($menus as $menu) {
          $menu_list[$menu->name] = esc_html($menu->name);
      }
  } else {
      echo 'No menus found.';
  }

  $wp_customize->add_panel( 'nsc_blog_add_panel', array(
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__( 'NSC Home Page', 'nsc-blog' ),
    'priority' => 10,
  ));

  $wp_customize->add_section('nsc_blog_header' , array(
    'title' => __( 'Header', 'nsc-blog' ),
    'panel' => 'nsc_blog_add_panel'
  ) );

  // menu
  $wp_customize->add_setting('nsc_blog_header_menu',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'nsc_blog_customizer_sanitize_choices'
	));
	$wp_customize->add_control('nsc_blog_header_menu',array(
		'type' => 'select',
		'label' => __('Select the Menu','nsc-blog'),
		'section' => 'nsc_blog_header',
		'choices' 	=> $menu_list,
  ));

  $wp_customize->add_setting( 'nsc_blog_header_search',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_header_search',array(
		'label' => esc_html__( 'Show / Hide Search','nsc-blog' ),
		'section' => 'nsc_blog_header'
  )));

	$wp_customize->add_setting( 'nsc_blog_header_settings',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_header_settings',array(
		'label' => esc_html__( 'Show / Hide Settings','nsc-blog' ),
		'section' => 'nsc_blog_header'
  )));

	$wp_customize->add_setting('nsc_blog_theme_settings_main_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_theme_settings_main_heading',array(
		'label'	=> esc_html__('Setting Heading','nsc-blog'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Customize', 'nsc-blog' ),
      ),
		'section'=> 'nsc_blog_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('nsc_blog_theme_settings_direction_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_theme_settings_direction_heading',array(
		'label'	=> esc_html__('Direction Heading','nsc-blog'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Theme dir', 'nsc-blog' ),
      ),
		'section'=> 'nsc_blog_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('nsc_blog_theme_settings_direction_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_theme_settings_direction_heading',array(
		'label'	=> esc_html__('Direction Heading','nsc-blog'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Theme dir', 'nsc-blog' ),
      ),
		'section'=> 'nsc_blog_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('nsc_blog_theme_settings_theme_modes',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_theme_settings_theme_modes',array(
		'label'	=> esc_html__('Theme Modes','nsc-blog'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Dark mode', 'nsc-blog' ),
      ),
		'section'=> 'nsc_blog_header',
		'type'=> 'text'
	));


  //  latest post section
  $wp_customize->add_section('nsc_blog_latest_post' , array(
    'title' => __( 'Latest Post', 'nsc-blog' ),
    'panel' => 'nsc_blog_add_panel'
  ) );

  $wp_customize->add_setting( 'nsc_blog_latest_posts_like_button',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_posts_like_button',array(
		'label' => esc_html__( 'Show / Hide Like Button','nsc-blog' ),
		'section' => 'nsc_blog_latest_post'
  )));

  $wp_customize->add_setting( 'nsc_blog_latest_posts_comments_count',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_posts_comments_count',array(
		'label' => esc_html__( 'Show / Hide Comment Button','nsc-blog' ),
		'section' => 'nsc_blog_latest_post'
  )));

  $wp_customize->add_setting( 'nsc_blog_latest_posts_cats',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_posts_cats',array(
		'label' => esc_html__( 'Show / Hide Category','nsc-blog' ),
		'section' => 'nsc_blog_latest_post'
  )));

  $wp_customize->add_setting( 'nsc_blog_latest_posts_title',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_posts_title',array(
		'label' => esc_html__( 'Show / Hide Title','nsc-blog' ),
		'section' => 'nsc_blog_latest_post'
  )));

  // latest articles
  $wp_customize->add_section('nsc_blog_latest_articles' , array(
    'title' => __( 'Latest Article', 'nsc-blog' ),
    'panel' => 'nsc_blog_add_panel'
  ) );

  $wp_customize->add_setting('nsc_blog_latest_articles_main_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_latest_articles_main_heading',array(
		'label'	=> esc_html__('Latest Article Heading','nsc-blog'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Latest Articles', 'nsc-blog' ),
      ),
		'section'=> 'nsc_blog_latest_articles',
		'type'=> 'text'
	));

  $wp_customize->add_setting('nsc_blog_latest_articles_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_latest_articles_description',array(
		'label'	=> esc_html__('Latest Article Description','nsc-blog'),
		'section'=> 'nsc_blog_latest_articles',
		'type'=> 'textarea'
	));

  $wp_customize->add_setting( 'nsc_blog_latest_articles_category',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_category',array(
    'label' => esc_html__( 'Show / Hide Category','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));

  $wp_customize->add_setting( 'nsc_blog_latest_articles_title',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_title',array(
    'label' => esc_html__( 'Show / Hide Title','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));

	$wp_customize->add_setting( 'nsc_blog_latest_articles_author_image',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_author_image',array(
    'label' => esc_html__( 'Show / Hide Author Image','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));

	$wp_customize->add_setting( 'nsc_blog_latest_articles_author_name',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_author_name',array(
    'label' => esc_html__( 'Show / Hide Author Name','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));

	$wp_customize->add_setting( 'nsc_blog_latest_articles_post_date',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_post_date',array(
    'label' => esc_html__( 'Show / Hide Date','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));

	$wp_customize->add_setting( 'nsc_blog_latest_articles_sidebar',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_latest_articles_sidebar',array(
    'label' => esc_html__( 'Show / Hide Sidebar','nsc-blog' ),
    'section' => 'nsc_blog_latest_articles'
  )));


	// single post page customizer settings
	$wp_customize->add_section('nsc_blog_single_post_page' , array(
    'title' => __( 'Single Post Page', 'nsc-blog' ),
    'panel' => 'nsc_blog_add_panel'
  ) );

	$wp_customize->add_setting( 'nsc_blog_single_post_cats',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_cats',array(
    'label' => esc_html__( 'Show / Hide Category','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_title',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_title',array(
    'label' => esc_html__( 'Show / Hide Post Title','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_except',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_except',array(
    'label' => esc_html__( 'Show / Hide Post Excerpt','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_author_image',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_author_image',array(
    'label' => esc_html__( 'Show / Hide Author Image','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_author_name',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_author_name',array(
    'label' => esc_html__( 'Show / Hide Author Name','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_date',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_date',array(
    'label' => esc_html__( 'Show / Hide Date','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_like_button',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_like_button',array(
    'label' => esc_html__( 'Show / Hide Like Button','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_comment_button',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_comment_button',array(
    'label' => esc_html__( 'Show / Hide Comment Button','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_share_button',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_share_button',array(
    'label' => esc_html__( 'Show / Hide Share Button','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_link_button',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_link_button',array(
    'label' => esc_html__( 'Show / Hide Links Button','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_image',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_image',array(
    'label' => esc_html__( 'Show / Hide Post Image','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_content',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_content',array(
    'label' => esc_html__( 'Show / Hide Post Content','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_tags',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_tags',array(
    'label' => esc_html__( 'Show / Hide Post Tags','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_author_details',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_author_details',array(
    'label' => esc_html__( 'Show / Hide Author Details','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_comments_form',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_comments_form',array(
    'label' => esc_html__( 'Show / Hide Comment Form','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_related_posts',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_related_posts',array(
    'label' => esc_html__( 'Show / Hide Related Posts','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_single_post_sidebar',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_single_post_sidebar',array(
    'label' => esc_html__( 'Show / Hide Sidebar','nsc-blog' ),
    'section' => 'nsc_blog_single_post_page'
  )));


  // $wp_customize->add_setting('nsc_blog_latest_articles_main_heading',array(
	// 	'default'=> '',
	// 	'sanitize_callback'	=> 'sanitize_text_field'
	// ));
	// $wp_customize->add_control('nsc_blog_latest_articles_main_heading',array(
	// 	'label'	=> esc_html__('Latest Article Heading','nsc-blog'),
	// 	'input_attrs' => array(
  //     'placeholder' => esc_html__( 'Latest Articles', 'nsc-blog' ),
  //     ),
	// 	'section'=> 'nsc_blog_single_post_page',
	// 	'type'=> 'text'
	// ));

	//  category and tag page
	$wp_customize->add_section('nsc_blog_cats_tags_page' , array(
    'title' => __( 'Post Category/Tags', 'nsc-blog' ),
    'panel' => 'nsc_blog_add_panel'
  ) );

  $wp_customize->add_setting( 'nsc_blog_category_page_banner',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_page_banner',array(
		'label' => esc_html__( 'Show / Hide Banner','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

  $wp_customize->add_setting( 'nsc_blog_category_name',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_name',array(
		'label' => esc_html__( 'Show / Hide Category Name','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

  $wp_customize->add_setting( 'nsc_blog_category_post_count',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_post_count',array(
		'label' => esc_html__( 'Show / Hide Post Count','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

  $wp_customize->add_setting( 'nsc_blog_category_post_image',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_post_image',array(
		'label' => esc_html__( 'Show / Hide Post Image','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

  $wp_customize->add_setting( 'nsc_blog_category_author_image',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_author_image',array(
		'label' => esc_html__( 'Show / Hide Author Image','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

  $wp_customize->add_setting( 'nsc_blog_category_author_name',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_author_name',array(
		'label' => esc_html__( 'Show / Hide Author Name','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_category_post_date',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_post_date',array(
		'label' => esc_html__( 'Show / Hide Post Date','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_category_post_title',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_post_title',array(
		'label' => esc_html__( 'Show / Hide Post Title','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));

	$wp_customize->add_setting( 'nsc_blog_category_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'nsc_blog_toggle_sanitization'
  ));
  $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_sidebar',array(
		'label' => esc_html__( 'Show / Hide Sidebar','nsc-blog' ),
		'section' => 'nsc_blog_cats_tags_page'
  )));


	//  404 page
	$wp_customize->add_section('nsc_blog_404_error_page' , array(
		'title' => __( '404 Error Page', 'nsc-blog' ),
		'panel' => 'nsc_blog_add_panel'
	) );

	$wp_customize->add_setting('nsc_blog_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_404_page_title',array(
		'label'	=> esc_html__('Heading','nsc-blog'),
		'input_attrs' => array(
			'placeholder' => esc_html__( '404 Not Found', 'nsc-blog' ),
			),
		'section'=> 'nsc_blog_404_error_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('nsc_blog_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_404_page_content',array(
		'label'	=> esc_html__('Description','nsc-blog'),
		'input_attrs' => array(
			'placeholder' => esc_html__( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'nsc-blog' ),
			),
		'section'=> 'nsc_blog_404_error_page',
		'type'=> 'textarea'
	));

	$wp_customize->add_setting('nsc_blog_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nsc_blog_404_page_button_text',array(
		'label'	=> esc_html__('Description','nsc-blog'),
		'input_attrs' => array(
			'placeholder' => esc_html__( 'Go Back', 'nsc-blog' ),
			),
		'section'=> 'nsc_blog_404_error_page',
		'type'=> 'text'
	));

	// $wp_customize->add_setting( 'nsc_blog_category_page_banner',array(
	// 	'default' => 1,
	// 	'transport' => 'refresh',
	// 	'sanitize_callback' => 'nsc_blog_toggle_sanitization'
	// ));
	// $wp_customize->add_control( new NSC_BLOG_TOGGLE_SWITCH_CUSTOM_CONTROL( $wp_customize, 'nsc_blog_category_page_banner',array(
	// 	'label' => esc_html__( 'Show / Hide Banner','nsc-blog' ),
	// 	'section' => 'nsc_blog_404_error_page'
	// )));


}
add_action( 'customize_register', 'nsc_blog_customizer_register' );


 ?>
