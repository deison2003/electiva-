document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive elements
    initializeButtons();
    initializeScrollEffects();
    initializeAnimations();
    initializeFormHandling();
});

// Button animations and interactions
function initializeButtons() {
    const buttons = document.querySelectorAll('button, a.btn');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // If the button is a submit button, don't interfere
            if (button.type === 'submit') return;

            // Visual scale animation
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 120);

            // Development message
            if (!button.hasAttribute('data-bs-toggle')) {
                alert('¡Funcionalidad en desarrollo!');
                if (button.tagName === 'A') e.preventDefault();
            }
        });
    });
}

// Scroll effects for navbar and animations
function initializeScrollEffects() {
    const navbar = document.querySelector('.navbar');
    const animatedElements = document.querySelectorAll('.fade-in, .slide-up');
    
    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
        
        // Check for elements to animate
        animatedElements.forEach(element => {
            if (isElementInViewport(element)) {
                element.classList.add('visible');
            }
        });
    });
}

// Initialize animations on page load
function initializeAnimations() {
    const animatedElements = document.querySelectorAll('.fade-in, .slide-up');
    
    animatedElements.forEach(element => {
        if (isElementInViewport(element)) {
            element.classList.add('visible');
        }
    });
}

// Utility function to check if element is in viewport
function isElementInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0 &&
        rect.left <= (window.innerWidth || document.documentElement.clientWidth) &&
        rect.right >= 0
    );
}

// Counter animation for statistics
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const animate = () => {
        current += increment;
        element.textContent = Math.floor(current);
        
        if (current < target) {
            requestAnimationFrame(animate);
        } else {
            element.textContent = target;
        }
    };
    
    animate();
}

// Initialize counters when they come into view
const counterElements = document.querySelectorAll('.counter');
const counterObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = parseInt(entry.target.getAttribute('data-target'));
            animateCounter(entry.target, target);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

counterElements.forEach(counter => {
    counterObserver.observe(counter);
});

// Form handling
function initializeFormHandling() {
    // Validación del formulario de inicio de sesión
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar el formulario usando Bootstrap
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                return;
            }

            const formData = new FormData(this);
            const loginError = document.getElementById('loginError');
            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;

            // Deshabilitar el botón y mostrar indicador de carga
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Iniciando sesión...';

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar mensaje de éxito y redirigir
                    loginError.classList.remove('d-none', 'alert-danger');
                    loginError.classList.add('alert-success');
                    loginError.textContent = data.message;
                    
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    // Mostrar mensaje de error
                    loginError.classList.remove('d-none');
                    loginError.textContent = data.message;
                }
            })
            .catch(error => {
                loginError.classList.remove('d-none');
                loginError.textContent = 'Error al conectar con el servidor. Por favor, intenta de nuevo.';
            })
            .finally(() => {
                // Restaurar el botón
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            });
        });
    }

    // Password visibility toggle for login
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.querySelector('i').classList.toggle('fa-eye');
            togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
        });
    }

    // Password visibility toggle for registration
    const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
    const registerPasswordInput = document.getElementById('registerPassword');
    if (toggleRegisterPassword && registerPasswordInput) {
        toggleRegisterPassword.addEventListener('click', function() {
            const type = registerPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            registerPasswordInput.setAttribute('type', type);
            toggleRegisterPassword.querySelector('i').classList.toggle('fa-eye');
            toggleRegisterPassword.querySelector('i').classList.toggle('fa-eye-slash');
        });
    }

    // Google Sign In handling
    const googleButton = document.querySelector('.btn-outline-secondary');
    if (googleButton) {
        googleButton.addEventListener('click', function() {
            alert('Inicio de sesión con Google en desarrollo');
        });
    }
}

// Password validation
function validatePassword(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumbers = /\d/.test(password);
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    
    return {
        isValid: password.length >= minLength && hasUpperCase && hasLowerCase && hasNumbers && hasSpecialChar,
        errors: {
            length: password.length < minLength,
            upperCase: !hasUpperCase,
            lowerCase: !hasLowerCase,
            numbers: !hasNumbers,
            specialChar: !hasSpecialChar
        }
    };
} 