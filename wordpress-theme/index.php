<?php
/**
 * The main template file
 * 
 * @package Agência Criativa Digital
 */

get_header();

// Hero Section
get_template_part('template-parts/hero');

// Services Section
get_template_part('template-parts/services');

// About Section
get_template_part('template-parts/about');

// Portfolio Section
get_template_part('template-parts/portfolio');

// Contact Section
get_template_part('template-parts/contact');

get_footer();
