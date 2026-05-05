/**
 * Agência Criativa Digital Theme - Main JavaScript
 * Handles theme functionality and interactions
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-navigation ul').toggleClass('active');
            $(this).attr('aria-expanded', $(this).hasClass('active') ? 'true' : 'false');
        });
        
        // Close mobile menu when clicking a link
        $('.main-navigation a').on('click', function() {
            $('.menu-toggle').removeClass('active');
            $('.main-navigation ul').removeClass('active');
            $('.menu-toggle').attr('aria-expanded', 'false');
        });
        
        // Header scroll effect
        var header = $('.site-header');
        var lastScroll = 0;
        
        $(window).on('scroll', function() {
            var currentScroll = $(this).scrollTop();
            
            // Add/remove scrolled class
            if (currentScroll > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
            
            // Hide header on scroll down, show on scroll up
            if (currentScroll <= 0) {
                header.css('transform', 'translateY(0)');
                lastScroll = currentScroll;
                return;
            }
            
            if (currentScroll > lastScroll && currentScroll > 100) {
                header.css('transform', 'translateY(-100%)');
            } else {
                header.css('transform', 'translateY(0)');
            }
            lastScroll = currentScroll;
            
            // Back to top button visibility
            var backToTop = $('.back-to-top');
            if (backToTop.length) {
                if (currentScroll > 500) {
                    backToTop.addClass('visible');
                } else {
                    backToTop.removeClass('visible');
                }
            }
            
            // Update active navigation link on scroll
            updateActiveNavLink();
        });
        
        // Smooth scroll for anchor links
        $('a[href*="#"]').not('[href="#"]').on('click', function(e) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                var headerOffset = 80;
                var targetOffset = target.offset().top - headerOffset;
                
                $('html, body').animate({
                    scrollTop: targetOffset
                }, 800, 'easeInOutQuart');
                
                // Update URL hash
                history.pushState(null, null, this.hash);
            }
        });
        
        // Animate elements on scroll (Intersection Observer)
        if ('IntersectionObserver' in window) {
            var animateElements = '.service-card, .portfolio-item, .about-image, .about-text, .contact-form, .contact-info, .info-item, .stat-item';
            
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            $(animateElements).each(function() {
                $(this).css({
                    'opacity': '0',
                    'transform': 'translateY(30px)',
                    'transition': 'opacity 0.6s ease, transform 0.6s ease'
                });
                observer.observe(this);
            });
        } else {
            // Fallback for older browsers
            $(window).on('scroll resize', function() {
                $( '.service-card, .portfolio-item, .about-image, .about-text, .contact-form, .contact-info' ).each(function() {
                    var elementTop = $(this).offset().top;
                    var elementVisible = 150;
                    if (elementTop < $(window).scrollTop() + $(window).height() - elementVisible) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }).trigger('scroll');
        }
        
        // Stats counter animation
        var statsAnimated = false;
        $(window).on('scroll', function() {
            var statsSection = $('.stats');
            if (statsSection.length && !statsAnimated) {
                var statsTop = statsSection.offset().top;
                var statsHeight = statsSection.outerHeight();
                var windowTop = $(window).scrollTop();
                var windowHeight = $(window).height();
                
                if (windowTop + windowHeight > statsTop + statsHeight / 2) {
                    statsAnimated = true;
                    $('.stat-number').each(function() {
                        var $this = $(this);
                        var finalValue = $this.text();
                        var numericValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
                        
                        if (!isNaN(numericValue)) {
                            var current = 0;
                            var increment = numericValue / 100;
                            var duration = 2000;
                            var stepTime = duration / 100;
                            
                            var timer = setInterval(function() {
                                current += increment;
                                if (current >= numericValue) {
                                    current = numericValue;
                                    clearInterval(timer);
                                }
                                $this.text(Math.floor(current) + (finalValue.includes('+') ? '+' : ''));
                            }, stepTime);
                        }
                    });
                }
            }
        }).trigger('scroll');
        
        // Form submission handler
        $('.contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var name = form.find('input[name="name"]').val();
            var email = form.find('input[name="email"]').val();
            var phone = form.find('input[name="phone"]').val();
            var message = form.find('textarea[name="message"]').val();
            var submitBtn = form.find('button[type="submit"]');
            var originalText = submitBtn.text();
            
            // Simple validation
            if (!name || !email || !message) {
                alert('Por favor, preencha todos os campos obrigatórios!');
                return;
            }
            
            // Email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Por favor, insira um email válido!');
                return;
            }
            
            // Simulate form submission
            submitBtn.text('Enviando...').prop('disabled', true);
            
            // In a real implementation, you would use AJAX to send to a server
            // For now, we'll just simulate success
            setTimeout(function() {
                alert('Obrigado, ' + name + '! Sua mensagem foi enviada com sucesso. Entraremos em contato em breve.');
                submitBtn.text(originalText).prop('disabled', false);
                form[0].reset();
            }, 1500);
        });
        
        // Portfolio item hover effects
        $('.portfolio-item').on({
            mouseenter: function() {
                $(this).css('z-index', '10');
            },
            mouseleave: function() {
                $(this).css('z-index', '1');
            }
        });
        
        // Service card hover effects
        $('.service-card').on({
            mouseenter: function() {
                $(this).find('.service-icon').css('transform', 'scale(1.2)');
            },
            mouseleave: function() {
                $(this).find('.service-icon').css('transform', 'scale(1)');
            }
        });
        
        // Typing effect for hero title
        var heroTitle = $('.hero-content h1');
        if (heroTitle.length) {
            var originalText = heroTitle.text();
            var currentIndex = 0;
            heroTitle.text('');
            
            function typeWriter() {
                if (currentIndex < originalText.length) {
                    heroTitle.text(heroTitle.text() + originalText.charAt(currentIndex));
                    currentIndex++;
                    setTimeout(typeWriter, 50);
                }
            }
            
            setTimeout(typeWriter, 500);
        }
        
        // Initialize tooltips if they exist
        if ($.fn.tooltip) {
            $('[data-toggle="tooltip"]').tooltip();
        }
        
        // Console message
        console.log('%c🎨 Agência Criativa Digital', 'font-size: 24px; color: #4361ee; font-weight: bold;');
        console.log('%cBem-vindo ao nosso site! 🚀', 'font-size: 16px; color: #6c757d;');
    });
    
    // Update active navigation link on scroll
    function updateActiveNavLink() {
        var sections = $('section[id]');
        var navLinks = $('.main-navigation a[href^="#"]');
        var current = '';
        
        sections.each(function() {
            var sectionTop = $(this).offset().top - 150;
            var sectionHeight = $(this).outerHeight();
            var id = $(this).attr('id');
            
            if ($(window).scrollTop() >= sectionTop && $(window).scrollTop() < sectionTop + sectionHeight) {
                current = id;
            }
        });
        
        navLinks.each(function() {
            $(this).parent().removeClass('current-menu-item');
            if ($(this).attr('href') === '#' + current) {
                $(this).parent().addClass('current-menu-item');
            }
        });
    }
    
    // JQuery easing extensions for smooth scrolling
    $.easing.easeInOutQuart = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    };
    
})(jQuery);

// Window load function
window.onload = function() {
    // Additional onload functions can be added here
};
