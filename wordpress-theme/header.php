<?php
/**
 * The header for our theme
 * 
 * @package Agência Criativa Digital
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?php wp_head(); ?>
    
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php 
            $site_name = get_bloginfo('name');
            $parts = explode(' ', $site_name, 2);
            if (count($parts) > 1) {
                echo esc_html($parts[0]) . '<span>' . esc_html($parts[1]) . '</span>';
            } else {
                echo esc_html($site_name);
            }
            ?>
        </a>
        
        <nav class="site-navigation">
            <button class="menu-toggle" aria-label="<?php esc_attr_e('Menu', 'criativa-digital'); ?>" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'main-navigation',
                'fallback_cb' => 'criativa_digital_default_menu'
            ));
            ?>
        </nav>
    </div>
</header>

<main id="page-content">
