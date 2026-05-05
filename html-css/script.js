/**
 * Website Script - Agência Criativa Digital
 * Functionality for navigation, animations, and user interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
        
        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', function() {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });
    }
    
    // Header scroll effect
    const header = document.querySelector('.header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        // Add/remove scrolled class
        if (currentScroll > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Hide header on scroll down, show on scroll up
        if (currentScroll <= 0) {
            header.style.transform = 'translateY(0)';
            lastScroll = currentScroll;
            return;
        }
        
        if (currentScroll > lastScroll && currentScroll > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
        
        // Back to top button visibility
        const backToTop = document.querySelector('.back-to-top');
        if (backToTop) {
            if (currentScroll > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        }
    });
    
    // Update active navigation link on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinksAll = document.querySelectorAll('.nav-links a[href^="#"]');
    
    window.addEventListener('scroll', function() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            const sectionHeight = section.offsetHeight;
            const id = section.getAttribute('id');
            
            if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
                current = id;
            }
        });
        
        navLinksAll.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerOffset = 80;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Animate elements on scroll (Intersection Observer)
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.service-card, .portfolio-item, .about-image, .about-text, .contact-form, .contact-info, .info-item, .stat-item');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        elements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }();
    
    // Stats counter animation
    const animateStats = function() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const finalValue = target.textContent;
                    const numericValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
                    
                    if (!isNaN(numericValue)) {
                        let current = 0;
                        const increment = numericValue / 100;
                        const duration = 2000; // 2 seconds
                        const stepTime = duration / 100;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= numericValue) {
                                current = numericValue;
                                clearInterval(timer);
                            }
                            target.textContent = Math.floor(current) + (finalValue.includes('+') ? '+' : '');
                        }, stepTime);
                    }
                    observer.unobserve(target);
                }
            });
        }, {
            threshold: 0.5
        });
        
        statNumbers.forEach(stat => observer.observe(stat));
    }();
    
    // Form submission handler
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const phone = this.querySelector('input[type="tel"]') ? this.querySelector('input[type="tel"]').value : '';
            const message = this.querySelector('textarea').value;
            
            // Simple validation
            if (!name || !email || !message) {
                alert('Por favor, preencha todos os campos obrigatórios!');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Por favor, insira um email válido!');
                return;
            }
            
            // Simulate form submission (in a real site, this would send to a server)
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;
            
            // Show success message
            setTimeout(() => {
                alert(`Obrigado, ${name}! Sua mensagem foi enviada com sucesso. Entraremos em contato em breve.`);
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                this.reset();
            }, 1500);
        });
    }
    
    // Portfolio item hover effects
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    portfolioItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        item.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });
    
    // Service card hover effects
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.service-icon');
            if (icon) {
                icon.style.transform = 'scale(1.2)';
            }
        });
        card.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.service-icon');
            if (icon) {
                icon.style.transform = 'scale(1)';
            }
        });
    });
    
    // Typing effect for hero title (optional enhancement)
    const heroTitle = document.querySelector('.hero-content h1');
    if (heroTitle) {
        const originalText = heroTitle.textContent;
        let currentIndex = 0;
        heroTitle.textContent = '';
        
        function typeWriter() {
            if (currentIndex < originalText.length) {
                heroTitle.textContent += originalText.charAt(currentIndex);
                currentIndex++;
                setTimeout(typeWriter, 50);
            }
        }
        
        // Start typing after a short delay
        setTimeout(typeWriter, 500);
    }
    
    // Console message
    console.log('%c🎨 Agência Criativa Digital', 'font-size: 24px; color: #4361ee; font-weight: bold;');
    console.log('%cBem-vindo ao nosso site! 🚀', 'font-size: 16px; color: #6c757d;');
});

// Load external content (if needed for future expansion)
window.onload = function() {
    // Additional onload functions can be added here
};
