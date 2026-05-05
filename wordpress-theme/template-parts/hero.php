<?php
/**
 * Hero Section Template Part
 * 
 * @package Agência Criativa Digital
 */

$hero_title = get_theme_mod('hero_title', 'Transformamos Ideias em Soluções Digitais');
$hero_subtitle = get_theme_mod('hero_subtitle', 'Criamos sites incríveis, aplicativos modernos e estratégias de marketing que impulsionam seus negócios.');
$hero_button_text = get_theme_mod('hero_button_text', 'Fale Conosco');
$hero_button_link = get_theme_mod('hero_button_link', '#contato');
$hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/images/hero-image.jpg');

?>

<!-- Hero Section -->
<section id="inicio" class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_subtitle); ?></p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url($hero_button_link); ?>" class="btn btn-primary">
                    <?php echo esc_html($hero_button_text); ?>
                </a>
                <a href="#servicos" class="btn btn-secondary">
                    <?php esc_html_e('Nossos Serviços', 'criativa-digital'); ?>
                </a>
            </div>
        </div>
        <div class="hero-image">
            <?php if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Equipe de desenvolvimento', 'criativa-digital'); ?>">
            <?php else: ?>
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600" alt="<?php esc_attr_e('Equipe de desenvolvimento', 'criativa-digital'); ?>">
            <?php endif; ?>
        </div>
    </div>
</section>
