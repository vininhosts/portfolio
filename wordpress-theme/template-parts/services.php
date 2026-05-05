<?php
/**
 * Services Section Template Part
 * 
 * @package Agência Criativa Digital
 */

$services = array(
    array(
        'icon' => '💻',
        'title' => 'Desenvolvimento Web',
        'description' => 'Criação de sites responsivos e modernos com as melhores tecnologias do mercado.',
        'link' => '#'
    ),
    array(
        'icon' => '🎨',
        'title' => 'Design UI/UX',
        'description' => 'Interfaces intuitivas e atraentes que proporcionam ótima experiência ao usuário.',
        'link' => '#'
    ),
    array(
        'icon' => '📈',
        'title' => 'Marketing Digital',
        'description' => 'Estratégias de marketing para aumentar sua visibilidade e vendas online.',
        'link' => '#'
    ),
    array(
        'icon' => '📱',
        'title' => 'Aplicativos Mobile',
        'description' => 'Desenvolvimento de aplicativos para iOS e Android sob medida.',
        'link' => '#'
    ),
    array(
        'icon' => '⚡',
        'title' => 'Otimização SEO',
        'description' => 'Melhore seu posicionamento nos buscadores e atraia mais clientes.',
        'link' => '#'
    ),
    array(
        'icon' => '🛒',
        'title' => 'E-commerce',
        'description' => 'Lojas virtuais completas com integração de pagamento e gestão.',
        'link' => '#'
    )
);

$services_title = get_theme_mod('services_title', 'Nossos Serviços');
$services_subtitle = get_theme_mod('services_subtitle', 'Oferecemos soluções completas para sua presença digital');

?>

<!-- Services Section -->
<section id="servicos" class="services-section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($services_title); ?></h2>
            <p><?php echo esc_html($services_subtitle); ?></p>
        </div>
        <div class="services-grid">
            <?php foreach ($services as $index => $service): ?>
                <div class="service-card">
                    <div class="service-icon"><?php echo $service['icon']; ?></div>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p><?php echo esc_html($service['description']); ?></p>
                    <a href="<?php echo esc_url($service['link']); ?>" class="btn-small">
                        <?php esc_html_e('Saiba Mais', 'criativa-digital'); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
