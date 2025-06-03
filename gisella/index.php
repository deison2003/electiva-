<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExploraQuibdó - Descubre la magia del Chocó</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;600&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./asser/css/styles.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span style="color: var(--secondary-color);">Explora</span>Quibdó
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destinos">Destinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experiencias">Experiencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section position-relative" id="inicio">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="video/Quibdo - video.mp4.mp4" type="video/mp4">
                Tu navegador no soporta el elemento de video.
            </video>
            <!-- Overlay para mejorar la legibilidad del texto -->
            <div class="video-overlay"></div>
        </div>
        
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 mx-auto slide-up text-center text-white">
                    <h1 class="display-4 fw-bold mb-4">Descubre la magia del Chocó</h1>
                    <p class="lead mb-5">Explora la riqueza cultural, la biodiversidad y las experiencias únicas que Quibdó tiene
                        para ofrecerte.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#destinos" class="btn btn-primary btn-lg pulse">Explorar Destinos</a>
                        <a href="#" class="btn btn-outline-light btn-lg" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 fade-in">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Rutas Turísticas</h3>
                        <p>Descubre los mejores recorridos por Quibdó y sus alrededores, guiados por expertos locales.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3>Gastronomía Local</h3>
                        <p>Prueba los sabores auténticos de la cocina chocoana, preparada con tradición y pasión.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-music"></i>
                        </div>
                        <h3>Cultura Viva</h3>
                        <p>Conoce las tradiciones, música y danzas que hacen único al pueblo afrocolombiano.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section class="py-5" id="destinos">
        <div class="container">
            <h2 class="text-center section-title slide-up">Destinos Imperdibles</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 slide-up">
                    <div class="card destination-card">
                        <img src="imagenes/cascada.jpg" class="card-img-top" alt="Cascada de Tutunendo">
                        <div class="card-body">
                            <h5 class="card-title">Cascada de Tutunendo</h5>
                            <p class="card-text">Una de las cascadas más hermosas del Chocó, con aguas cristalinas y un entorno
                                selvático único.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 slide-up">
                    <div class="card destination-card">
                        <img src="imagenes/icho.jpg" class="card-img-top" alt="Río Icho">
                        <div class="card-body">
                            <h5 class="card-title">Río Icho</h5>
                            <p class="card-text">Disfruta de un paseo en bote por este majestuoso río, rodeado de exuberante
                                vegetación.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 slide-up">
                    <div class="card destination-card">
                        <img src="imagenes/Catedral.jpg" class="card-img-top" alt="Malecón de Quibdó">
                        <div class="card-body">
                            <h5 class="card-title">Malecón de Quibdó</h5>
                            <p class="card-text">El corazón de la ciudad, donde convergen cultura, gastronomía y la belleza del
                                río Atrato.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 slide-up">
                <a href="#" class="btn btn-secondary btn-lg">Ver todos los destinos</a>
            </div>
        </div>
    </section>

    <!-- Parallax Section -->
    <section class="py-5 parallax">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="display-5 fw-bold mb-4">Vive experiencias únicas en Quibdó</h2>
                    <p class="lead mb-5">Desde recorridos por la selva hasta talleres de música tradicional, cada experiencia te
                        conectará con la esencia del Chocó.</p>
                    <a href="#experiencias" class="btn btn-primary btn-lg">Descubrir Experiencias</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Experiences Section -->
    <section class="py-5" id="experiencias">
        <div class="container">
            <h2 class="text-center section-title slide-up">Experiencias Destacadas</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 slide-up">
                    <div class="card h-100">
                        <img src="imagenes/taller.jpg" class="card-img-top" alt="Taller de cocina tradicional">
                        <div class="card-body">
                            <h5 class="card-title">Taller de Cocina Tradicional</h5>
                            <p class="card-text">Aprende a preparar platos típicos chocoanos con chefs locales.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Gastronomía</span>
                                <small class="text-muted">4.8 <i class="fas fa-star text-warning"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 slide-up">
                    <div class="card h-100">
                        <img src="imagenes/atrato.jpg" class="card-img-top" alt="Tour por el río Atrato">
                        <div class="card-body">
                            <h5 class="card-title">Tour por el Río Atrato</h5>
                            <p class="card-text">Navega por uno de los ríos más importantes de Colombia con guías expertos.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Naturaleza</span>
                                <small class="text-muted">4.9 <i class="fas fa-star text-warning"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 slide-up">
                    <div class="card h-100">
                        <img src="imagenes/danza.jpg" class="card-img-top" alt="Clase de danza afro">
                        <div class="card-body">
                            <h5 class="card-title">Clase de Danza Afro</h5>
                            <p class="card-text">Sumérgete en los ritmos y movimientos de la cultura afrocolombiana.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Cultura</span>
                                <small class="text-muted">4.7 <i class="fas fa-star text-warning"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 slide-up">
                    <div class="card h-100">
                        <img src="https://vivirenelpoblado.com/wp-content/uploads/2022/08/La-maravillosa-ruta-de-avistamiento-de-aves-del-sur-de-Colombia.jpg"
                            class="card-img-top" alt="Avistamiento de aves">
                        <div class="card-body">
                            <h5 class="card-title">Avistamiento de Aves</h5>
                            <p class="card-text">Descubre la increíble diversidad de aves en los bosques del Chocó.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Ecoturismo</span>
                                <small class="text-muted">4.9 <i class="fas fa-star text-warning"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Sobre ExploraQuibdó</h5>
                    <p>Descubre la magia del Chocó a través de experiencias auténticas y memorables.</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#destinos">Destinos</a></li>
                        <li><a href="#experiencias">Experiencias</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2024 ExploraQuibdó. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#">Términos y Condiciones</a> | <a href="#">Política de Privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="w-100 text-center">
                        <h4 class="modal-title fw-bold" id="loginModalLabel">¡Bienvenido de nuevo!</h4>
                        <p class="text-muted mb-0">Ingresa tus credenciales para continuar</p>
                    </div>
                    <button type="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <div class="login-form">
                        <!-- Botones de inicio rápido -->
                        <div class="quick-login mb-4">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-dark btn-lg">
                                    <i class="fab fa-google me-2"></i>Continuar con Google
                                </button>
                                <button type="button" class="btn btn-outline-dark btn-lg">
                                    <i class="fab fa-facebook me-2"></i>Continuar con Facebook
                                </button>
                            </div>
                        </div>

                        <div class="separator text-center mb-4">
                            <span class="separator-text">O inicia sesión con email</span>
                        </div>

                        <form id="loginForm" action="login.php" method="POST" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                           placeholder="tu@email.com" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingresa un correo electrónico válido.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <a href="#" class="text-primary text-decoration-none small" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password"
                                           placeholder="Ingresa tu contraseña" required minlength="8">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback">
                                        La contraseña debe tener al menos 8 caracteres.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
                                    <label class="form-check-label" for="rememberMe">Mantener sesión iniciada</label>
                                </div>
                            </div>

                            <div class="alert alert-danger d-none" id="loginError" role="alert">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <p class="mb-0">¿No tienes una cuenta? 
                        <a href="#" class="text-primary fw-bold" data-bs-toggle="modal" 
                           data-bs-target="#registerModal" data-bs-dismiss="modal">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="registerModalLabel">Crear Cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-3">
                    <div class="login-form">
                        <form id="registerForm">
                            <div class="mb-3">
                                <label for="registerName" class="form-label">Nombre completo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="registerName" placeholder="Tu nombre completo" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">Correo electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="registerEmail" placeholder="tu@email.com" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="registerPassword" placeholder="Mínimo 8 caracteres" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleRegisterPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">La contraseña debe tener al menos 8 caracteres</small>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">
                                        Acepto los <a href="#">términos y condiciones</a>
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-user-plus me-2"></i>Crear Cuenta
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <p class="mb-0">¿Ya tienes una cuenta? 
                        <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                            Inicia sesión
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="scripts.js"></script>
</body>

</html>