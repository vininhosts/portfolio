<?php
/**
 * Portfolio Section Template Part
 * 
 * @package Agência Criativa Digital
 */

$portfolio_title = get_theme_mod('portfolio_title', 'Nosso Portifólio');
$portfolio_subtitle = get_theme_mod('portfolio_subtitle', 'Confira alguns dos nossos projetos recentes');

// Sample portfolio items
$portfolio_items = array(
    array(
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400',
        'title' => 'Loja Virtual Moda',
        'description' => 'E-commerce completo com integração de pagamento',
        'link' => '#'
    ),
    array(
        'image' => 'https://images.unsplash.com/photo-1551650975-87deedd944c3?w=400',
        'title' => 'Sistema de Gestão',
        'description' => 'Plataforma de gestão para empresas',
        'link' => '#'
    ),
    array(
        'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400',
        'title' => 'Aplicativo Mobile',
        'description' => 'App para delivery de alimentos',
        'link' => '#'
    ),
    array(
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400',
        'title' => 'Site Institucional',
        'description' => 'Site para empresa de advocacia',
        'link' => '#'
    ),
    array(
        'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=400',
        'title' => 'Blog de Viagens',
        'description' => 'Plataforma de conteúdo para viajantes',
        'link' => '#'
    ),
    array(
        'image' => 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=400',
        'title' => 'Dashboard Analytics',
        'description' => 'Painel de controle com visualização de dados',
        'link' => '#'
    )
);

?>

<!-- Portfolio Section -->
<section id="portifolio" class="portfolio-section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($portfolio_title); ?></h2>
            <p><?php echo esc_html($portfolio_subtitle); ?></p>
        </div>
        <div class="portfolio-grid">
            <?php foreach ($portfolio_items as $index => $item): ?>
                <div class="portfolio-item">
                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                    <div class="portfolio-overlay">
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['description']); ?></p>
                        <a href="<?php echo esc_url($item['link']); ?>" class="btn-small">
                            <?php esc_html_e('Ver Projeto', 'criativa-digital'); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
