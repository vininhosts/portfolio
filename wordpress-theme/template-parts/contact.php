<?php
/**
 * Contact Section Template Part
 * 
 * @package Agência Criativa Digital
 */

$contact_title = get_theme_mod('contact_title', 'Entre em Contato');
$contact_subtitle = get_theme_mod('contact_subtitle', 'Estamos prontos para ajudar no seu próximo projeto');

// Contact info
$address = get_theme_mod('address', 'Rua das Flores, 123 - Centro<br>São Paulo - SP, 01234-567');
$phone = get_theme_mod('phone', '(11) 1234-5678<br>(11) 98765-4321');
$email = get_theme_mod('email', 'contato@criativadigital.com.br<br>suporte@criativadigital.com.br');

?>

<!-- Contact Section -->
<section id="contato" class="contact-section">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($contact_title); ?></h2>
            <p><?php echo esc_html($contact_subtitle); ?></p>
        </div>
        <div class="contact-content">
            <form class="contact-form" action="#" method="POST">
                <div class="form-group">
                    <input type="text" name="name" placeholder="<?php esc_attr_e('Seu Nome', 'criativa-digital'); ?>" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="<?php esc_attr_e('Seu Email', 'criativa-digital'); ?>" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="<?php esc_attr_e('Seu Telefone', 'criativa-digital'); ?>">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="<?php esc_attr_e('Sua Mensagem', 'criativa-digital'); ?>" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <?php esc_html_e('Enviar Mensagem', 'criativa-digital'); ?>
                </button>
            </form>
            
            <div class="contact-info">
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div class="info-text">
                        <h4><?php esc_html_e('Endereço', 'criativa-digital'); ?></h4>
                        <p><?php echo wp_kses_post($address); ?></p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-text">
                        <h4><?php esc_html_e('Telefone', 'criativa-digital'); ?></h4>
                        <p><?php echo wp_kses_post($phone); ?></p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div class="info-text">
                        <h4><?php esc_html_e('Email', 'criativa-digital'); ?></h4>
                        <p><?php echo wp_kses_post($email); ?></p>
                    </div>
                </div>
                <div class="social-links">
                    <h4><?php esc_html_e('Redes Sociais', 'criativa-digital'); ?></h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon">Facebook</a>
                        <a href="#" class="social-icon">Instagram</a>
                        <a href="#" class="social-icon">LinkedIn</a>
                        <a href="#" class="social-icon">Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
