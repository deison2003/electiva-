-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2025 a las 05:58:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exploraquibdo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `visitas` int(11) DEFAULT 0,
  `reservas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id`, `id_publicacion`, `fecha`, `visitas`, `reservas`) VALUES
(1, 1, '2025-06-01', 45, 3),
(2, 1, '2025-06-02', 32, 2),
(3, 2, '2025-06-01', 28, 0),
(4, 3, '2025-06-01', 75, 15),
(5, 4, '2025-06-02', 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_usuario` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `fecha_agregado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_usuario`, `id_publicacion`, `fecha_agregado`) VALUES
(2, 1, '2025-06-02 15:02:24'),
(2, 3, '2025-06-02 15:02:24'),
(3, 2, '2025-06-02 15:02:24'),
(5, 1, '2025-06-02 15:02:24'),
(5, 4, '2025-06-02 15:02:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `id_remitente` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` datetime DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_remitente`, `id_destinatario`, `mensaje`, `fecha_envio`, `leido`) VALUES
(1, 2, 3, 'Hola, me interesa el tour por el río Atrato. ¿Qué incluye?', '2025-06-02 15:02:24', 1),
(2, 3, 2, 'El tour incluye transporte, guía y almuerzo tradicional', '2025-06-02 15:02:24', 1),
(3, 5, 4, 'Gracias por compartir la receta, quedó deliciosa', '2025-06-02 15:02:24', 0),
(4, 4, 5, 'Me alegra que te haya gustado, es una receta de familia', '2025-06-02 15:02:24', 0),
(5, 2, 3, '¿Hay disponibilidad para el 15 de julio?', '2025-06-02 15:02:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo_publicacion` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` enum('gastronomia','ruta','hospedaje','danza','evento','leyenda','foto','video','receta') NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `imagen_url` text DEFAULT NULL,
  `precio_aproximado` decimal(10,2) DEFAULT NULL,
  `estado_publicacion` enum('pendiente','aprobado','rechazado') DEFAULT 'pendiente',
  `tipo_contenido` enum('experiencia','relato','receta','foto','video','leyenda') NOT NULL,
  `url_multimedia` text DEFAULT NULL,
  `id_autor` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `cantidad_visitas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo_publicacion`, `descripcion`, `categoria`, `ubicacion`, `fecha_evento`, `imagen_url`, `precio_aproximado`, `estado_publicacion`, `tipo_contenido`, `url_multimedia`, `id_autor`, `fecha_creacion`, `cantidad_visitas`) VALUES
(1, 'Tour por el río Atrato', 'Recorrido guiado por el majestuoso río Atrato', 'ruta', 'Río Atrato, Quibdó', '2025-07-15', 'https://example.com/atrato.jpg', 50000.00, 'aprobado', 'experiencia', NULL, 3, '2025-06-02 15:02:24', 120),
(2, 'Receta de sancocho de pescado', 'Receta tradicional de sancocho de pescado chocoano', 'gastronomia', NULL, NULL, 'https://example.com/sancocho.jpg', NULL, 'aprobado', 'receta', NULL, 4, '2025-06-02 15:02:24', 85),
(3, 'Festival de la Chirimía', 'Evento anual de música tradicional del Chocó', 'evento', 'Plaza Principal, Quibdó', '2025-08-20', 'https://example.com/chirimia.jpg', 20000.00, 'aprobado', '', NULL, 3, '2025-06-02 15:02:24', 200),
(4, 'Leyenda del Cacique Quibdó', 'Historia ancestral del cacique que dio nombre a la ciudad', 'leyenda', NULL, NULL, 'https://example.com/cacique.jpg', NULL, 'aprobado', 'leyenda', NULL, 4, '2025-06-02 15:02:24', 65),
(5, 'Hospedaje Río Verde', 'Cabañas ecológicas a orillas del río', 'hospedaje', 'Vía al río Verde, Quibdó', NULL, 'https://example.com/hospedaje.jpg', 120000.00, 'aprobado', 'experiencia', NULL, 3, '2025-06-02 15:02:24', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_reseña` int(11) DEFAULT NULL,
  `id_usuario_reporter` int(11) NOT NULL,
  `motivo_reporte` varchar(100) NOT NULL,
  `fecha_reporte` datetime DEFAULT current_timestamp(),
  `validado_por_admin` tinyint(1) DEFAULT 0,
  `comentario_admin` text DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `id_publicacion`, `id_reseña`, `id_usuario_reporter`, `motivo_reporte`, `fecha_reporte`, `validado_por_admin`, `comentario_admin`, `id_admin`) VALUES
(1, NULL, 4, 3, 'Comentario inapropiado', '2025-06-02 15:02:24', 1, NULL, 1),
(2, 3, NULL, 4, 'Información incorrecta sobre fechas', '2025-06-02 15:02:24', 0, NULL, NULL),
(3, NULL, 2, 3, 'Calificación injusta', '2025-06-02 15:02:24', 1, NULL, 1),
(4, 5, NULL, 2, 'Fotos no corresponden al lugar', '2025-06-02 15:02:24', 0, NULL, NULL),
(5, NULL, 1, 4, 'Spam', '2025-06-02 15:02:24', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_experiencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_reserva` datetime DEFAULT current_timestamp(),
  `fecha_evento` date NOT NULL,
  `estado_reserva` enum('pendiente','confirmada','cancelada','completada') DEFAULT 'pendiente',
  `cantidad_personas` int(11) DEFAULT 1,
  `detalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_experiencia`, `id_usuario`, `fecha_reserva`, `fecha_evento`, `estado_reserva`, `cantidad_personas`, `detalles`) VALUES
(1, 1, 2, '2025-06-02 15:02:24', '2025-07-15', 'confirmada', 2, 'Sin restricciones alimenticias'),
(2, 1, 5, '2025-06-02 15:02:24', '2025-07-15', 'confirmada', 4, 'Una persona con movilidad reducida'),
(3, 3, 2, '2025-06-02 15:02:24', '2025-08-20', 'pendiente', 3, NULL),
(4, 3, 5, '2025-06-02 15:02:24', '2025-08-20', 'confirmada', 2, NULL),
(5, 5, 2, '2025-06-02 15:02:24', '2025-09-10', 'pendiente', 2, 'Quiero cabaña con vista al río');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL CHECK (`calificacion` between 1 and 5),
  `comentario` text DEFAULT NULL,
  `id_experiencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_comentario` datetime DEFAULT current_timestamp(),
  `estado` enum('activo','oculto') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id`, `calificacion`, `comentario`, `id_experiencia`, `id_usuario`, `fecha_comentario`, `estado`) VALUES
(1, 5, 'Excelente experiencia, los guías son muy conocedores', 1, 2, '2025-06-02 15:02:24', 'activo'),
(2, 4, 'Muy buena atención, el lugar es hermoso', 1, 5, '2025-06-02 15:02:24', 'activo'),
(3, 5, 'La receta es auténtica, tal como la prepara mi abuela', 2, 5, '2025-06-02 15:02:24', 'activo'),
(4, 3, 'El evento estuvo bien pero faltó más organización', 3, 2, '2025-06-02 15:02:24', 'activo'),
(5, 5, 'Me encantó conocer esta leyenda de nuestra cultura', 4, 5, '2025-06-02 15:02:24', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo_usuario` enum('turista','prestador','comunidad','administrador') NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `estado` enum('pendiente','activo','suspendido') DEFAULT 'pendiente',
  `token_verificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo_usuario`, `nombre_completo`, `correo`, `password`, `telefono`, `fecha_registro`, `estado`, `token_verificacion`) VALUES
(1, 'administrador', 'Admin Principal', 'admin@exploraquibdo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1234567890', '2025-06-02 15:02:24', 'activo', NULL),
(2, 'turista', 'Juan Pérez', 'juan.perez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3101234567', '2025-06-02 15:02:24', 'activo', NULL),
(3, 'prestador', 'María Gómez', 'maria.gomez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3209876543', '2025-06-02 15:02:24', 'activo', NULL),
(4, 'comunidad', 'Carlos Andrade', 'carlos.andrade@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3001122334', '2025-06-02 15:02:24', 'activo', NULL),
(5, 'turista', 'Ana Rodríguez', 'ana.rodriguez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3156789012', '2025-06-02 15:02:24', 'activo', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_publicacion` (`id_publicacion`,`fecha`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_usuario`,`id_publicacion`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_remitente` (`id_remitente`),
  ADD KEY `id_destinatario` (`id_destinatario`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_reseña` (`id_reseña`),
  ADD KEY `id_usuario_reporter` (`id_usuario_reporter`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_experiencia` (`id_experiencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_experiencia` (`id_experiencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`id_reseña`) REFERENCES `reseñas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reportes_ibfk_3` FOREIGN KEY (`id_usuario_reporter`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_experiencia`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`id_experiencia`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
