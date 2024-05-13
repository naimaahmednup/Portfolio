<?php

if ( class_exists( 'TruemanPlugin' ) && class_exists( 'ACF' ) && class_exists( 'OCDI_Plugin' ) ) {

function trueman_ocdi_import_files() {
    return array(
        array(
            'import_file_name'             => esc_attr__( 'Default', 'trueman' ),
            'categories'                   => array( esc_attr__( 'Main', 'trueman' ) ),
            'import_file_url'              => TRUEMAN_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/01/content.xml',
            'preview_url'                  => esc_url( 'https://1.envato.market/c/1790164/275988/4415?u=https://preview.themeforest.net/item/trueman-cv-resume-wordpress-theme/full_screen_preview/37364785' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'trueman_ocdi_import_files' );

function trueman_ocdi_after_import_setup( $selected_import ) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'posts_per_page', 6 );

    $ocdi_fields_static = array(
      'options_vcard_name' => esc_html__( 'Emma Trueman', 'trueman' ),
      '_options_vcard_name' => 'field_5f35b0ba705a6',
      'options_vcard_short_desc' => esc_html__( 'Front-end Deweloper
              Ui/UX Designer', 'trueman' ),
      '_options_vcard_short_desc' => 'field_5f35b0d2705a7',
      'options_vcard_available' => 1,
      '_options_vcard_available' => 'field_5f35bc9fd2ee1',
      'options_vcard_info_0_label' => esc_html__( 'Residence:', 'trueman' ),
      '_options_vcard_info_0_label' => 'field_5f35b17b705a9',
      'options_vcard_info_0_value' => esc_html__( 'Canada', 'trueman' ),
      '_options_vcard_info_0_value' => 'field_5f35b182705aa',
      'options_vcard_info_1_label' => esc_html__( 'City:', 'trueman' ),
      '_options_vcard_info_1_label' => 'field_5f35b17b705a9',
      'options_vcard_info_1_value' => esc_html__( 'Toronto', 'trueman' ),
      '_options_vcard_info_1_value' => 'field_5f35b182705aa',
      'options_vcard_info_2_label' => esc_html__( 'Age:', 'trueman' ),
      '_options_vcard_info_2_label' => 'field_5f35b17b705a9',
      'options_vcard_info_2_value' => 26,
      '_options_vcard_info_2_value' => 'field_5f35b182705aa',
      'options_vcard_info' => 3,
      '_options_vcard_info' => 'field_5f35b15e705a8',
      'options_vcard_buttons_0_label' => esc_html__( 'Contact me', 'trueman' ),
      '_options_vcard_buttons_0_label' => 'field_5f35b36f705b4',
      'options_vcard_buttons_0_url' => '#trm-order',
      '_options_vcard_buttons_0_url' => 'field_5f35b413705b8',
      'options_vcard_buttons_0_icon' => 'fas fa-envelope',
      '_options_vcard_buttons_0_icon' => 'field_5f35bae7568c2',
      'options_vcard_buttons_0_attributes_download' => 0,
      '_options_vcard_buttons_0_attributes_download' => 'field_5f35b45d705ba',
      'options_vcard_buttons_0_attributes_new_window' => 0,
      '_options_vcard_buttons_0_attributes_new_window' => 'field_5f35b49a705bb',
      'options_vcard_buttons_0_attributes' => '',
      '_options_vcard_buttons_0_attributes' => 'field_5f35b420705b9',
      'options_vcard_buttons' => 1,
      '_options_vcard_buttons' => 'field_5f35b36f705b3',
      'options_footer_text' => esc_html__( '© 2022 All Rights Reserved.', 'trueman' ),
      '_options_footer_text' => 'field_5b68cceac1b66',
      'options_footer_text2' => esc_html__( 'Email: admin@bslthemes.com', 'trueman' ),
      '_options_footer_text2' => 'field_5f5892ca12b9a',
      'options_social_links_0_icon' => 'fab fa-linkedin',
      '_options_social_links_0_icon' => 'field_5d879352bc7a2',
      'options_social_links_0_url' => 'https://linkedin.com/',
      '_options_social_links_0_url' => 'field_5b68ccd7c1b65',
      'options_social_links_1_icon' => 'fab fa-dribbble',
      '_options_social_links_1_icon' => 'field_5d879352bc7a2',
      'options_social_links_1_url' => 'https://dribble.com/',
      '_options_social_links_1_url' => 'field_5b68ccd7c1b65',
      'options_social_links_2_icon' => 'fab fa-behance',
      '_options_social_links_2_icon' => 'field_5d879352bc7a2',
      'options_social_links_2_url' => 'https://behance.com/',
      '_options_social_links_2_url' => 'field_5b68ccd7c1b65',
      'options_social_links_3_icon' => 'fab fa-github',
      '_options_social_links_3_icon' => 'field_5d879352bc7a2',
      'options_social_links_3_url' => 'https://github.com/',
      '_options_social_links_3_url' => 'field_5b68ccd7c1b65',
      'options_social_links_4_icon' => 'fab fa-twitter',
      '_options_social_links_4_icon' => 'field_5d879352bc7a2',
      'options_social_links_4_url' => 'https://twitter.com/',
      '_options_social_links_4_url' => 'field_5b68ccd7c1b65',
      'options_social_links' => 5,
      '_options_social_links' => 'field_5b68ccabc1b63',
      'options_post_page' => 166,
      '_options_post_page' => 'field_5f588f84087e0',
      'options_blog_categories' => 1,
      '_options_blog_categories' => 'field_5b81b6d930cb9',
      'options_blog_excerpt' => 0,
      '_options_blog_excerpt' => 'field_5b81b7ca30cba',
      'options_blog_featured_img' => 0,
      '_options_blog_featured_img' => 'field_5ee8e1ce18975',
      'options_social_share' => 'a:5:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:8:"linkedin";i:3;s:6:"reddit";i:4;s:9:"pinterest";}',
      '_options_social_share' => 'field_5c610c399cf20',
      'options_portfolio_page' => 158,
      '_options_portfolio_page' => 'field_5f58901c087e1',
      'options_portfolio_lightbox_disable' => 1,
      '_options_portfolio_lightbox_disable' => 'field_5f58eee9befad',
      'options_p404_title' => esc_html__( 'Whoops!', 'trueman' ),
      '_options_p404_title' => 'field_5d180fd559b7f',
      'options_p404_content' => esc_html__( 'The page you\'re looking for doesn\'t exist or has been moved.', 'trueman' ),
      '_options_p404_content' => 'field_5d180feb59b80',
      'options_vcard_image' => 308,
      '_options_vcard_image' => 'field_5ed404ad72663',
      'options_vcard_full_image' => 63,
      '_options_vcard_full_image' => 'field_5f35af34705a5',
      'options_theme_ui' => 0,
      '_options_theme_ui' => 'field_5f8d7f0483d71',
      'options_vcard_live' => esc_html__( 'Available for hire', 'trueman' ),
      '_options_vcard_live' => 'field_6113f8df021fe',
      'options_vcard_typed' => 1,
      '_options_vcard_typed' => 'field_6184127dd6e45',
      'options_vcard_typed_start' => esc_html__( 'I`m', 'trueman' ),
      '_options_vcard_typed_start' => 'field_5f35b0d2705a7',
      'options_vcard_typed_list_0_text' => esc_html__( 'UI/UX Designer', 'trueman' ),
      '_options_vcard_typed_list_0_text' => 'field_605b6f984e30c',
      'options_vcard_typed_list_1_text' => esc_html__( 'Web Developer', 'trueman' ),
      '_options_vcard_typed_list_1_text' => 'field_605b6f984e30c',
      'options_vcard_typed_list_2_text' => esc_html__( 'Photographer', 'trueman' ),
      '_options_vcard_typed_list_2_text' => 'field_605b6f984e30c',
      'options_vcard_typed_list_3_text' => esc_html__( 'Dreamer :)', 'trueman' ),
      '_options_vcard_typed_list_3_text' => 'field_605b6f984e30c',
      'options_vcard_typed_list' => 4,
      '_options_vcard_typed_list' => 'field_5f35b1b2705ab',
      'options_header_logo_type' => 'text',
      '_options_header_logo_type' => 'field_61a3ef5b6d70f',
      'options_header_logo_text' => esc_html__( 'True', 'trueman' ),
      '_options_header_logo_text' => 'field_61a3efc36d711',
      'options_header_logo_text_h' => esc_html__( 'man', 'trueman' ),
      '_options_header_logo_text_h' => 'field_61a3efda6d712',
      'options_header_ui_switch' => 1,
      '_options_header_ui_switch' => 'field_61a41c59a1e80',
      'options_header_button_text' => esc_html__( 'Download cv', 'trueman' ),
      '_options_header_button_text' => 'field_61a41cd5a1e84',
      'options_header_button_url' => 'https://bslthemes.com/trueman/wp-content/uploads/2021/11/cv.txt',
      '_options_header_button_url' => 'field_61a41cc4a1e83',
      'options_header_button_download' => 1,
      '_options_header_button_download' => 'field_61a41ce7a1e85',
      'options_header_button_show' => 1,
      '_options_header_button_show' => 'field_61a41cb0a1e82',
      'options_header_button' => '',
      '_options_header_button' => 'field_61a41c99a1e81',
      'options_popup_title' => esc_html__( 'Write me a message', 'trueman' ),
      '_options_popup_title' => 'field_61a7dfee0da4c',
      'options_popup_form' => 80,
      '_options_popup_form' => 'field_61a7e00e0da4d',
      'options_popup_image' => 625,
      '_options_popup_image' => 'field_61a7e11e70279',
      'options_social_links_0_title' => esc_html__( 'Linkedin', 'trueman' ),
      '_options_social_links_0_title' => 'field_62576471e0004',
      'options_social_links_1_title' => esc_html__( 'Dribbble', 'trueman' ),
      '_options_social_links_1_title' => 'field_62576471e0004',
      'options_social_links_2_title' => esc_html__( 'Behance', 'trueman' ),
      '_options_social_links_2_title' => 'field_62576471e0004',
      'options_social_links_3_title' => esc_html__( 'GitHub', 'trueman' ),
      '_options_social_links_3_title' => 'field_62576471e0004',
      'options_social_links_4_title' => esc_html__( 'Twitter', 'trueman' ),
      '_options_social_links_4_title' => 'field_62576471e0004',
      'options_blog_intro_image' => 414,
      '_options_blog_intro_image' => 'field_625da8d907fa9',
    );
    $ocdi_fields_to_change = array();

    if( 'Default' === $selected_import['import_file_name'] ) {
        $ocdi_fields_to_change = array(
          'options_theme_transition' => 1,
          '_options_theme_transition' => 'field_5f5c89409b5e6',
          'options_theme_color' => '',
          '_options_theme_color' => 'field_5b68d509665d9',
          'options_heading_color' => '',
          '_options_heading_color' => 'field_5b68d5d8665da',
          'options_text_color' => '',
          '_options_text_color' => 'field_5b68d617665db',
          'options_menu_font_color' => '',
          '_options_menu_font_color' => 'field_5eea679c5ad20',
          'options_heading_font_size' => '',
          '_options_heading_font_size' => 'field_5eea66185ad1d',
          'options_text_font_size' => '',
          '_options_text_font_size' => 'field_5eea66ad5ad1e',
          'options_menu_font_size' => '',
          '_options_menu_font_size' => 'field_5eea67685ad1f',
          'options_heading_font_family' => 0,
          '_options_heading_font_family' => 'field_5b68cfc4906fc',
          'options_text_font_family' => 0,
          '_options_text_font_family' => 'field_5b68d188906fd',
          'options_menu_font_family' => 0,
          '_options_menu_font_family' => 'field_5eea67ef5ad21',
          'options_header_bg' => '',
          '_options_header_bg' => 'field_5d11763c9ed10',
          'options_bg_color' => '',
          '_options_bg_color' => 'field_625d47376dbc7',
          'options_card_color' => '',
          '_options_card_color' => 'field_625d47d76dbca',
          'options_preloader_hide' => 1,
          '_options_preloader_hide' => 'field_5f58b3fc5f79f',
          'options_bg_color_light' => '',
          '_options_bg_color_light' => 'field_625d475a6dbc8',
          'options_card_color_light' => '',
          '_options_card_color_light' => 'field_625d47976dbc9',
          'options_heading_light_color' => '',
          '_options_heading_light_color' => 'field_5f8d7fd483d72',
          'options_text_light_color' => '',
          '_options_text_light_color' => 'field_5f8d800183d73',
          'options_menu_font_light_color' => '',
          '_options_menu_font_light_color' => 'field_5f8d801d83d74',
        );
    }

    global $wpdb;
    foreach ( array_merge( $ocdi_fields_static, $ocdi_fields_to_change ) as $field => $value ) {
        if ( $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->options WHERE option_name = %s", $field ) ) == 0 ) {
            $wpdb->query( $wpdb->prepare( "INSERT INTO $wpdb->options ( option_name, option_value, autoload ) VALUES (%s, %s, 'no')", $field, $value ) );
        } else {
            $wpdb->query( $wpdb->prepare( "UPDATE $wpdb->options SET option_value = %s WHERE option_name = %s", $value, $field ) );
        }
    }

}
add_action( 'pt-ocdi/after_import', 'trueman_ocdi_after_import_setup' );

}
