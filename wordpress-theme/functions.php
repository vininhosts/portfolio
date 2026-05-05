<?php
/**
 * Agência Criativa Digital Theme Functions
 * 
 * @package Agência Criativa Digital
 */

// Define theme constants
define('CRIATIVA_DIGITAL_VERSION', '1.0.0');
define('CRIATIVA_DIGITAL_THEME_DIR', get_template_directory());
define('CRIATIVA_DIGITAL_THEME_URI', get_template_directory_uri());

// Theme setup
if (!function_exists('criativa_digital_setup')) :
    function criativa_digital_setup() {
        // Load text domain for translation
        load_theme_textdomain('criativa-digital', CRIATIVA_DIGITAL_THEME_DIR . '/languages');
        
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');
        
        // Let WordPress manage the document title
        add_theme_support('title-tag');
        
        // Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');
        
        // Switch default core markup to output valid HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ));
        
        // Add theme support for Custom Logo
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
        
        // Add theme support for Custom Background
        add_theme_support('custom-background', array(
            'default-color' => 'ffffff',
        ));
        
        // Add theme support for Custom Header
        add_theme_support('custom-header', array(
            'default-image' => '',
            'width' => 1920,
            'height' => 1080,
            'flex-width' => true,
            'flex-height' => true,
        ));
        
        // Register navigation menus
        register_nav_menus(array(
            'primary' => esc_html__('Menu Principal', 'criativa-digital'),
            'footer' => esc_html__('Menu Rodapé', 'criativa-digital'),
        ));
        
        // Set up the WordPress core custom header feature
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('editor-color-palette');
        add_theme_support('editor-font-sizes');
    }
endif;
add_action('after_setup_theme', 'criativa_digital_setup');

// Enqueue styles and scripts
function criativa_digital_scripts() {
    // Load theme styles
    wp_enqueue_style('criativa-digital-style', get_stylesheet_uri(), array(), CRIATIVA_DIGITAL_VERSION);
    
    // Load theme scripts
    wp_enqueue_script('criativa-digital-script', CRIATIVA_DIGITAL_THEME_URI . '/js/main.js', array('jquery'), CRIATIVA_DIGITAL_VERSION, true);
    
    // Localize script for translation
    wp_localize_script('criativa-digital-script', 'criativaDigitalData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'theme_url' => CRIATIVA_DIGITAL_THEME_URI,
    ));
    
    // Add inline styles for custom colors
    $custom_css = criativa_digital_custom_styles();
    if (!empty($custom_css)) {
        wp_add_inline_style('criativa-digital-style', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'criativa_digital_scripts');

// Admin enqueue scripts
function criativa_digital_admin_scripts($hook) {
    if ('appearance_page_custom-header' === $hook || 'appearance_page_custom-background' === $hook) {
        wp_enqueue_style('criativa-digital-admin', CRIATIVA_DIGITAL_THEME_URI . '/css/admin.css', array(), CRIATIVA_DIGITAL_VERSION);
    }
}
add_action('admin_enqueue_scripts', 'criativa_digital_admin_scripts');

// Generate custom CSS from theme options
function criativa_digital_custom_styles() {
    $css = '';
    
    // Primary color
    $primary_color = get_theme_mod('primary_color', '#4361ee');
    if ($primary_color !== '#4361ee') {
        $css .= '--primary-color: ' . esc_attr($primary_color) . ';';
        $css .= '--primary-dark: ' . esc_attr(criativa_digital_darken_color($primary_color, 15)) . ';';
    }
    
    // Secondary color
    $secondary_color = get_theme_mod('secondary_color', '#3f37c9');
    if ($secondary_color !== '#3f37c9') {
        $css .= '--secondary-color: ' . esc_attr($secondary_color) . ';';
    }
    
    // Light color
    $light_color = get_theme_mod('light_color', '#f8f9fa');
    if ($light_color !== '#f8f9fa') {
        $css .= '--light-color: ' . esc_attr($light_color) . ';';
    }
    
    // If we have custom CSS, wrap it in :root
    if (!empty($css)) {
        $css = ':root {' . $css . '}';
    }
    
    return $css;
}

// Helper function to darken hex color
function criativa_digital_darken_color($hex, $percent) {
    // Validate hex color
    $hex = preg_replace('/[^0-9a-fA-F]/', '', $hex);
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    if (strlen($hex) !== 6) {
        return $hex;
    }
    
    // Convert to RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    // Darken
    $r = max(0, min(255, $r * (100 - $percent) / 100));
    $g = max(0, min(255, $g * (100 - $percent) / 100));
    $b = max(0, min(255, $b * (100 - $percent) / 100));
    
    // Convert back to hex
    return sprintf('#%02x%02x%02x', $r, $g, $b);
}

// Register customizer settings
function criativa_digital_customizer($wp_customize) {
    // Theme Options Panel
    $wp_customize->add_panel('criativa_digital_options', array(
        'title' => esc_html__('Opções do Tema', 'criativa-digital'),
        'priority' => 120,
    ));
    
    // Hero Section
    $wp_customize->add_section('criativa_digital_hero', array(
        'title' => esc_html__('Seção Hero', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Transformamos Ideias em Soluções Digitais',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => esc_html__('Título do Hero', 'criativa-digital'),
        'section' => 'criativa_digital_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Criamos sites incríveis, aplicativos modernos e estratégias de marketing que impulsionam seus negócios.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label' => esc_html__('Subtítulo do Hero', 'criativa-digital'),
        'section' => 'criativa_digital_hero',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Fale Conosco',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label' => esc_html__('Texto do Botão', 'criativa-digital'),
        'section' => 'criativa_digital_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_link', array(
        'default' => '#contato',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_button_link', array(
        'label' => esc_html__('Link do Botão', 'criativa-digital'),
        'section' => 'criativa_digital_hero',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => esc_html__('Imagem do Hero', 'criativa-digital'),
        'section' => 'criativa_digital_hero',
        'settings' => 'hero_image',
    )));
    
    // Services Section
    $wp_customize->add_section('criativa_digital_services', array(
        'title' => esc_html__('Seção de Serviços', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('services_title', array(
        'default' => 'Nossos Serviços',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label' => esc_html__('Título', 'criativa-digital'),
        'section' => 'criativa_digital_services',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Oferecemos soluções completas para sua presença digital',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_subtitle', array(
        'label' => esc_html__('Subtítulo', 'criativa-digital'),
        'section' => 'criativa_digital_services',
        'type' => 'textarea',
    ));
    
    // About Section
    $wp_customize->add_section('criativa_digital_about', array(
        'title' => esc_html__('Seção Sobre', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default' => 'Sobre Nós',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => esc_html__('Título', 'criativa-digital'),
        'section' => 'criativa_digital_about',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('about_subtitle', array(
        'default' => 'Conheça nossa história e valores',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_subtitle', array(
        'label' => esc_html__('Subtítulo', 'criativa-digital'),
        'section' => 'criativa_digital_about',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('about_content', array(
        'default' => 'Somos uma agência digital fundada em 2020 com o objetivo de ajudar empresas a se destacarem no mundo digital. Nossa equipe é composta por profissionais apaixonados por tecnologia e design.<br><br>Ao longo dos anos, já atendemos mais de 200 clientes em diversos segmentos, entregando soluções personalizadas que realmente fazem a diferença.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_content', array(
        'label' => esc_html__('Conteúdo', 'criativa-digital'),
        'section' => 'criativa_digital_about',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => esc_html__('Imagem', 'criativa-digital'),
        'section' => 'criativa_digital_about',
        'settings' => 'about_image',
    )));
    
    // Portfolio Section
    $wp_customize->add_section('criativa_digital_portfolio', array(
        'title' => esc_html__('Seção Portifólio', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('portfolio_title', array(
        'default' => 'Nosso Portifólio',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('portfolio_title', array(
        'label' => esc_html__('Título', 'criativa-digital'),
        'section' => 'criativa_digital_portfolio',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('portfolio_subtitle', array(
        'default' => 'Confira alguns dos nossos projetos recentes',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('portfolio_subtitle', array(
        'label' => esc_html__('Subtítulo', 'criativa-digital'),
        'section' => 'criativa_digital_portfolio',
        'type' => 'textarea',
    ));
    
    // Contact Section
    $wp_customize->add_section('criativa_digital_contact', array(
        'title' => esc_html__('Seção Contato', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('contact_title', array(
        'default' => 'Entre em Contato',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_title', array(
        'label' => esc_html__('Título', 'criativa-digital'),
        'section' => 'criativa_digital_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Estamos prontos para ajudar no seu próximo projeto',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_subtitle', array(
        'label' => esc_html__('Subtítulo', 'criativa-digital'),
        'section' => 'criativa_digital_contact',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('address', array(
        'default' => 'Rua das Flores, 123 - Centro<br>São Paulo - SP, 01234-567',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('address', array(
        'label' => esc_html__('Endereço', 'criativa-digital'),
        'section' => 'criativa_digital_contact',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('phone', array(
        'default' => '(11) 1234-5678<br>(11) 98765-4321',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('phone', array(
        'label' => esc_html__('Telefone', 'criativa-digital'),
        'section' => 'criativa_digital_contact',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('email', array(
        'default' => 'contato@criativadigital.com.br<br>suporte@criativadigital.com.br',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('email', array(
        'label' => esc_html__('Email', 'criativa-digital'),
        'section' => 'criativa_digital_contact',
        'type' => 'textarea',
    ));
    
    // Colors Section
    $wp_customize->add_section('criativa_digital_colors', array(
        'title' => esc_html__('Cores do Tema', 'criativa-digital'),
        'panel' => 'criativa_digital_options',
    ));
    
    $wp_customize->add_setting('primary_color', array(
        'default' => '#4361ee',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => esc_html__('Cor Primária', 'criativa-digital'),
        'section' => 'criativa_digital_colors',
    )));
    
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#3f37c9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => esc_html__('Cor Secundária', 'criativa-digital'),
        'section' => 'criativa_digital_colors',
    )));
    
    $wp_customize->add_setting('light_color', array(
        'default' => '#f8f9fa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light_color', array(
        'label' => esc_html__('Cor de Fundo Clarão', 'criativa-digital'),
        'section' => 'criativa_digital_colors',
    )));
}
add_action('customize_register', 'criativa_digital_customizer');

// Default menu fallback
function criativa_digital_default_menu() {
    echo '<ul class="main-navigation">';
    echo '<li><a href="#inicio">' . esc_html__('Início', 'criativa-digital') . '</a></li>';
    echo '<li><a href="#servicos">' . esc_html__('Serviços', 'criativa-digital') . '</a></li>';
    echo '<li><a href="#sobre">' . esc_html__('Sobre', 'criativa-digital') . '</a></li>';
    echo '<li><a href="#portifolio">' . esc_html__('Portifólio', 'criativa-digital') . '</a></li>';
    echo '<li><a href="#contato">' . esc_html__('Contato', 'criativa-digital') . '</a></li>';
    echo '</ul>';
}

// Add body classes
function criativa_digital_body_classes($classes) {
    if (is_front_page() || is_home()) {
        $classes[] = 'home-page';
    }
    
    return $classes;
}
add_filter('body_class', 'criativa_digital_body_classes');

// Remove default gallery styles
function criativa_digital_remove_gallery_css($css) {
    return preg_replace("!\s*\.gallery\s*{\s*margin:\s*1px;\s*}\s*", '', $css);
}
add_filter('style_loader_src', 'criativa_digital_remove_gallery_css');

// Load text domain for child themes
function criativa_digital_child_theme_textdomain() {
    load_child_theme_textdomain('criativa-digital', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'criativa_digital_child_theme_textdomain');

// Theme widget areas
function criativa_digital_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Barra Lateral', 'criativa-digital'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Adicione widgets aqui para aparecer na barra lateral.', 'criativa-digital'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Área do Rodapé', 'criativa-digital'),
        'id' => 'footer-1',
        'description' => esc_html__('Adicione widgets aqui para aparecer no rodapé.', 'criativa-digital'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'criativa_digital_widgets_init');

// Create required directories
function criativa_digital_create_directories() {
    $upload_dir = wp_upload_dir();
    $directories = array(
        CRIATIVA_DIGITAL_THEME_DIR . '/images',
        CRIATIVA_DIGITAL_THEME_DIR . '/js',
        CRIATIVA_DIGITAL_THEME_DIR . '/css',
        CRIATIVA_DIGITAL_THEME_DIR . '/languages',
    );
    
    foreach ($directories as $dir) {
        if (!file_exists($dir)) {
            wp_mkdir_p($dir);
        }
    }
}
add_action('after_setup_theme', 'criativa_digital_create_directories');

// Enqueue block editor styles
function criativa_digital_block_editor_styles() {
    wp_enqueue_style('criativa-digital-editor', CRIATIVA_DIGITAL_THEME_URI . '/css/editor.css', array(), CRIATIVA_DIGITAL_VERSION);
    
    // Add theme colors to editor
    add_theme_support('editor-color-palette', array(
        array(
            'name' => esc_html__('Primary', 'criativa-digital'),
            'slug' => 'primary',
            'color' => get_theme_mod('primary_color', '#4361ee'),
        ),
        array(
            'name' => esc_html__('Secondary', 'criativa-digital'),
            'slug' => 'secondary',
            'color' => get_theme_mod('secondary_color', '#3f37c9'),
        ),
        array(
            'name' => esc_html__('Dark', 'criativa-digital'),
            'slug' => 'dark',
            'color' => '#212529',
        ),
        array(
            'name' => esc_html__('Light', 'criativa-digital'),
            'slug' => 'light',
            'color' => get_theme_mod('light_color', '#f8f9fa'),
        ),
        array(
            'name' => esc_html__('Gray', 'criativa-digital'),
            'slug' => 'gray',
            'color' => '#6c757d',
        ),
    ));
}
add_action('enqueue_block_editor_assets', 'criativa_digital_block_editor_styles');

// Add custom image sizes
function criativa_digital_image_sizes() {
    add_image_size('criativa-digital-hero', 1200, 800, true);
    add_image_size('criativa-digital-card', 400, 300, true);
    add_image_size('criativa-digital-thumbnail', 150, 150, true);
}
add_action('after_setup_theme', 'criativa_digital_image_sizes');

// Create placeholder images directory
function criativa_digital_create_placeholder_images() {
    $placeholder_dir = CRIATIVA_DIGITAL_THEME_DIR . '/images';
    $placeholder_files = array(
        'hero-image.jpg' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200',
        'about-image.jpg' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=600',
    );
    
    foreach ($placeholder_files as $filename => $url) {
        $filepath = $placeholder_dir . '/' . $filename;
        if (!file_exists($filepath)) {
            // Create a simple placeholder
            $placeholder = imagecreate(100, 100);
            $bg_color = imagecolorallocate($placeholder, 230, 230, 230);
            $text_color = imagecolorallocate($placeholder, 100, 100, 100);
            imagestring($placeholder, 5, 10, 40, 'Placeholder', $text_color);
            imagejpeg($placeholder, $filepath);
            imagedestroy($placeholder);
        }
    }
}
// add_action('after_setup_theme', 'criativa_digital_create_placeholder_images');

// Theme activation hook
function criativa_digital_activate() {
    // Set default options on activation
    if (get_option('criativa_digital_activated') !== 'yes') {
        update_option('criativa_digital_activated', 'yes');
        update_option('criativa_digital_version', CRIATIVA_DIGITAL_VERSION);
        
        // Flush rewrite rules
        flush_rewrite_rules();
    }
}
register_activation_hook(__FILE__, 'criativa_digital_activate');

// Theme deactivation hook
function criativa_digital_deactivate() {
    // Clean up on deactivation if needed
}
register_deactivation_hook(__FILE__, 'criativa_digital_deactivate');
