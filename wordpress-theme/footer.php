<?php
/**
 * The footer for our theme
 * 
 * @package Agência Criativa Digital
 */

?>

</main><!-- #page-content -->

<!-- Back to Top Button -->
<a href="#page-content" class="back-to-top">↑</a>

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php bloginfo('name'); ?></h3>
                <p><?php bloginfo('description'); ?></p>
            </div>
            
            <div class="footer-section">
                <h4><?php esc_html_e('Links Rápidos', 'criativa-digital'); ?></h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'footer-links',
                    'fallback_cb' => false
                ));
                ?>
            </div>
            
            <div class="footer-section">
                <h4><?php esc_html_e('Serviços', 'criativa-digital'); ?></h4>
                <ul>
                    <li><a href="#servicos"><?php esc_html_e('Desenvolvimento Web', 'criativa-digital'); ?></a></li>
                    <li><a href="#servicos"><?php esc_html_e('Design UI/UX', 'criativa-digital'); ?></a></li>
                    <li><a href="#servicos"><?php esc_html_e('Marketing Digital', 'criativa-digital'); ?></a></li>
                    <li><a href="#servicos"><?php esc_html_e('Aplicativos Mobile', 'criativa-digital'); ?></a></li>
                    <li><a href="#servicos"><?php esc_html_e('Otimização SEO', 'criativa-digital'); ?></a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Todos os direitos reservados.', 'criativa-digital'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
