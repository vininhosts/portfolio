<?php
/**
 * About Section Template Part
 * 
 * @package Agência Criativa Digital
 */

$about_title = get_theme_mod('about_title', 'Sobre Nós');
$about_subtitle = get_theme_mod('about_subtitle', 'Conheça nossa história e valores');
$about_content = get_theme_mod('about_content', 'Somos uma agência digital fundada em 2020 com o objetivo de ajudar empresas a se destacarem no mundo digital. Nossa equipe é composta por profissionais apaixonados por tecnologia e design.<br><br>Ao longo dos anos, já atendemos mais de 200 clientes em diversos segmentos, entregando soluções personalizadas que realmente fazem a diferença.');
$about_image = get_theme_mod('about_image', get_template_directory_uri() . '/images/about-image.jpg');

// Stats
$stats = array(
    array(
        'number' => '200+',
        'label' => 'Clientes Satisfeitos'
    ),
    array(
        'number' => '500+',
        'label' => 'Projetos Entregues'
    ),
    array(
        'number' => '10',
        'label' => 'Anos de Experiência'
    )
);

?>

<!-- About Section -->
<section id="sobre" class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                <?php if ($about_image): ?>
                    <img src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('Escritório moderno', 'criativa-digital'); ?>">
                <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=600" alt="<?php esc_attr_e('Escritório moderno', 'criativa-digital'); ?>">
                <?php endif; ?>
            </div>
            <div class="about-text">
                <div class="section-header">
                    <h2><?php echo esc_html($about_title); ?></h2>
                    <p><?php echo esc_html($about_subtitle); ?></p>
                </div>
                <?php echo wp_kses_post($about_content); ?>
                
                <div class="stats">
                    <?php foreach ($stats as $stat): ?>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo esc_html($stat['number']); ?></span>
                            <span class="stat-label"><?php echo esc_html($stat['label']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
