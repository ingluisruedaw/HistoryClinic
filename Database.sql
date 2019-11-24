-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-12-2017 a las 19:20:05
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `histclinic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(1, 'www', 7, '2017-01-27 17:45:24'),
(2, 'eeee', 7, '2017-01-27 17:45:30'),
(4, 'sdsdsdsds', 7, '2017-01-27 17:45:39'),
(5, 'ADAD', 12, '2017-03-08 13:18:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo` bigint(20) NOT NULL,
  `id` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_doc` int(1) NOT NULL,
  `eps` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` int(1) NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `escolaridad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` int(1) NOT NULL,
  `acompanante` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `parentezco` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `id`, `tipo_doc`, `eps`, `nombres`, `apellidos`, `nacimiento`, `sexo`, `ocupacion`, `email`, `escolaridad`, `estado_civil`, `acompanante`, `parentezco`) VALUES
(1, '1045705248', 1, 'CAFESALUD', 'LUIS DOMINGO', 'RUEDA WILCHES', '1992-03-08', 1, 'INDEPENDIENTE', 'LUISRUEDAW@GMAIL.COM', 'PROFESIONAL', 4, 'LINA RUEDA', 'HERMANA'),
(3, '60283544', 1, 'CAFESALUD EPS', 'AMPARO', 'WILCHES RUEDA', '2017-01-11', 2, 'AMA DE CASA', 'AMPARO@GMAIL.COM', 'BACHILLERATO', 1, 'ORLANDO WILCHES', 'HERMANO'),
(4, '123456', 1, 'CAPRECOM', 'ANDRES', 'PEREZ', '2017-03-08', 1, 'ESTUDIANTE', 'demo@gmail.com', 'BACHILLER', 1, 'NINGUNO', 'HERMANO'),
(5, '1234', 1, 'CAPRECOM', 'FULANITO', 'SUTANEJO', '2017-04-26', 1, 'empleado', 'fulanito@sutanejo.com', 'doctorado', 1, 'perceo', 'hermano'),
(6, '1234567890', 1, 'ninguna', 'sd', 'sdsds', '2017-04-12', 1, 'sdsd', 'ssdsdsd@gmail.com', 'sdsd', 1, 'dsdsd', 'sdsdsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_actual`
--

CREATE TABLE `enfermedad_actual` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermedad_actual`
--

INSERT INTO `enfermedad_actual` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(7, 'sdsdsd', 7, '2017-01-26 19:26:53'),
(11, 'www', 7, '2017-01-27 17:44:19'),
(13, 'ADAD', 12, '2017-03-08 13:18:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_fisico`
--

CREATE TABLE `examen_fisico` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `examen_fisico`
--

INSERT INTO `examen_fisico` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(3, '54', 7, '2017-01-26 18:43:39'),
(4, 'qqqqqqqqqqqq', 7, '2017-01-27 17:53:27'),
(7, 'rrrrrrrrrrrrrrrrrrr', 7, '2017-01-27 17:53:47'),
(8, 'yyyyyyyyyyyyyyy', 7, '2017-01-27 17:53:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_codigo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`id`, `fecha`, `cliente_codigo`) VALUES
(7, '2017-01-22 21:50:24', 3),
(11, '2017-01-27 16:31:32', 1),
(12, '2017-03-08 13:18:43', 4),
(13, '2017-04-19 14:48:48', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresion_diagnostica`
--

CREATE TABLE `impresion_diagnostica` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `impresion_diagnostica`
--

INSERT INTO `impresion_diagnostica` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(2, 'wwwwwwwwwwwwwww', 7, '2017-01-27 17:58:00'),
(3, 'eeeeeeeeeeeeeeee', 7, '2017-01-27 17:58:07'),
(6, 'ooooooooooooooooo', 7, '2017-01-27 17:58:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_consulta`
--

CREATE TABLE `motivo_consulta` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `motivo_consulta`
--

INSERT INTO `motivo_consulta` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(30, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 7, '2017-01-27 20:44:13'),
(31, 'DATOS DE PRUEBA\r\n\r\nADSD\r\nSD\r\nS\r\nD\r\nS\r\nD\r\nSD\r\nS\r\nD\r\nSD\r\nSD', 12, '2017-03-08 13:18:58'),
(32, 'consulta general', 13, '2017-04-19 14:49:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia`
--

CREATE TABLE `residencia` (
  `id` bigint(20) NOT NULL,
  `cliente_codigo` bigint(20) NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `residencia`
--

INSERT INTO `residencia` (`id`, `cliente_codigo`, `ciudad`, `direccion`, `telefono`, `barrio`) VALUES
(23, 1, 'BARRANQUILLA', 'CALLE 52#48-143', '3321153', 'ABAJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_por_sistemas`
--

CREATE TABLE `revision_por_sistemas` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `revision_por_sistemas`
--

INSERT INTO `revision_por_sistemas` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(4, '54', 7, '2017-01-26 18:43:39'),
(5, 'qqqqq', 7, '2017-01-27 17:50:14'),
(7, 'tttttt', 7, '2017-01-27 17:50:24'),
(8, 'uiuiuiuiui', 7, '2017-01-27 17:50:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` bigint(20) NOT NULL,
  `det` text COLLATE utf8_spanish_ci NOT NULL,
  `historia_clinica_id` bigint(20) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `det`, `historia_clinica_id`, `fecha`) VALUES
(1, 'wwwwwwwwwwwwwww', 7, '2017-01-27 17:53:33'),
(2, 'qqqqqqqqqqq', 7, '2017-01-27 18:08:54'),
(4, 'tttttttttttttttttttttt', 7, '2017-01-27 18:09:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`) VALUES
('demo', '$2y$10$uhRU17NsfWX/mcAuWfTsA.yFBHkRtOtFQG06LcK8BZu2bJLpPUpxy'),
('lrueda9', '$2y$10$zIKcbH7Hwg23o6dT5VroUO1XNPvhFMGVweVoTAM.SMlyY8ezD/Z16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antecedentes_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `enfermedad_actual`
--
ALTER TABLE `enfermedad_actual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enfermedad_actual_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evolucion_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_examen_fisico_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historia_clinica_cliente1_idx` (`cliente_codigo`);

--
-- Indices de la tabla `impresion_diagnostica`
--
ALTER TABLE `impresion_diagnostica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_impresion_diagnostica_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `motivo_consulta`
--
ALTER TABLE `motivo_consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_motivo_consulta_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_residencia_cliente1_idx` (`cliente_codigo`);

--
-- Indices de la tabla `revision_por_sistemas`
--
ALTER TABLE `revision_por_sistemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_revision_por_sistemas_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tratamiento_historia_clinica1_idx` (`historia_clinica_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `enfermedad_actual`
--
ALTER TABLE `enfermedad_actual`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `impresion_diagnostica`
--
ALTER TABLE `impresion_diagnostica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `motivo_consulta`
--
ALTER TABLE `motivo_consulta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `residencia`
--
ALTER TABLE `residencia`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `revision_por_sistemas`
--
ALTER TABLE `revision_por_sistemas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `fk_antecedentes_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `enfermedad_actual`
--
ALTER TABLE `enfermedad_actual`
  ADD CONSTRAINT `fk_enfermedad_actual_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD CONSTRAINT `fk_evolucion_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  ADD CONSTRAINT `fk_examen_fisico_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `fk_historia_clinica_cliente1` FOREIGN KEY (`cliente_codigo`) REFERENCES `cliente` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `impresion_diagnostica`
--
ALTER TABLE `impresion_diagnostica`
  ADD CONSTRAINT `fk_impresion_diagnostica_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `motivo_consulta`
--
ALTER TABLE `motivo_consulta`
  ADD CONSTRAINT `fk_motivo_consulta_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `residencia`
--
ALTER TABLE `residencia`
  ADD CONSTRAINT `fk_residencia_cliente1` FOREIGN KEY (`cliente_codigo`) REFERENCES `cliente` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `revision_por_sistemas`
--
ALTER TABLE `revision_por_sistemas`
  ADD CONSTRAINT `fk_revision_por_sistemas_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `fk_tratamiento_historia_clinica1` FOREIGN KEY (`historia_clinica_id`) REFERENCES `historia_clinica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
