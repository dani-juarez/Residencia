-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2021 a las 21:32:37
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_edad_genero`
--

CREATE TABLE `alumnos_edad_genero` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_nuevos` varchar(200) DEFAULT NULL,
  `mujeres_nuevos` varchar(200) DEFAULT NULL,
  `hombres_re` varchar(200) DEFAULT NULL,
  `mujeres_re` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_lengua` varchar(200) DEFAULT NULL,
  `mujeres_lengua` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_edad_genero2`
--

CREATE TABLE `alumnos_edad_genero2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_nuevos` varchar(200) DEFAULT NULL,
  `mujeres_nuevos` varchar(200) DEFAULT NULL,
  `hombres_re` varchar(200) DEFAULT NULL,
  `mujeres_re` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_lengua` varchar(200) DEFAULT NULL,
  `mujeres_lengua` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE `becas` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `hombres_primero` varchar(200) DEFAULT NULL,
  `mujeres_primero` varchar(200) DEFAULT NULL,
  `hombres_segundo` varchar(200) DEFAULT NULL,
  `mujeres_segundo` varchar(200) DEFAULT NULL,
  `hombres_tercero` varchar(200) DEFAULT NULL,
  `mujeres_tercero` varchar(200) DEFAULT NULL,
  `hombres_cuarto` varchar(200) DEFAULT NULL,
  `mujeres_cuarto` varchar(200) DEFAULT NULL,
  `hombres_quinto` varchar(200) DEFAULT NULL,
  `mujeres_quinto` varchar(200) DEFAULT NULL,
  `hombres_sexto` varchar(200) DEFAULT NULL,
  `mujeres_sexto` varchar(200) DEFAULT NULL,
  `hombres_septimo` varchar(200) DEFAULT NULL,
  `mujeres_septimo` varchar(200) DEFAULT NULL,
  `hombres_octavo` varchar(200) DEFAULT NULL,
  `mujeres_octavo` varchar(200) DEFAULT NULL,
  `hombres_noveno` varchar(200) DEFAULT NULL,
  `mujeres_noveno` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas2`
--

CREATE TABLE `becas2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `hombres_primero` varchar(200) DEFAULT NULL,
  `mujeres_primero` varchar(200) DEFAULT NULL,
  `hombres_segundo` varchar(200) DEFAULT NULL,
  `mujeres_segundo` varchar(200) DEFAULT NULL,
  `hombres_tercero` varchar(200) DEFAULT NULL,
  `mujeres_tercero` varchar(200) DEFAULT NULL,
  `hombres_cuarto` varchar(200) DEFAULT NULL,
  `mujeres_cuarto` varchar(200) DEFAULT NULL,
  `hombres_quinto` varchar(200) DEFAULT NULL,
  `mujeres_quinto` varchar(200) DEFAULT NULL,
  `hombres_sexto` varchar(200) DEFAULT NULL,
  `mujeres_sexto` varchar(200) DEFAULT NULL,
  `hombres_septimo` varchar(200) DEFAULT NULL,
  `mujeres_septimo` varchar(200) DEFAULT NULL,
  `hombres_octavo` varchar(200) DEFAULT NULL,
  `mujeres_octavo` varchar(200) DEFAULT NULL,
  `hombres_noveno` varchar(200) DEFAULT NULL,
  `mujeres_noveno` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_computo`
--

CREATE TABLE `centro_computo` (
  `id` int(200) NOT NULL,
  `concepto` varchar(200) DEFAULT NULL,
  `cantidad` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_informacion`
--

CREATE TABLE `centro_informacion` (
  `id` int(200) NOT NULL,
  `concepto` varchar(200) DEFAULT NULL,
  `cantidad` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conformidad`
--

CREATE TABLE `conformidad` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `asignados` varchar(200) DEFAULT NULL,
  `aprobados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conformidad2`
--

CREATE TABLE `conformidad2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `asignados` varchar(200) DEFAULT NULL,
  `aprobados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios_vinculacion`
--

CREATE TABLE `convenios_vinculacion` (
  `id` int(200) NOT NULL,
  `nombre_empresa` varchar(200) DEFAULT NULL,
  `ubicacion` varchar(200) DEFAULT NULL,
  `ano_creacion` varchar(200) DEFAULT NULL,
  `sector` varchar(200) DEFAULT NULL,
  `giro` varchar(200) DEFAULT NULL,
  `tamano` varchar(200) DEFAULT NULL,
  `n_empleados` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `alcance` varchar(200) DEFAULT NULL,
  `area_conocimiento` varchar(200) DEFAULT NULL,
  `inicio` varchar(200) DEFAULT NULL,
  `termino` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseño`
--

CREATE TABLE `diseño` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseño2`
--

CREATE TABLE `diseño2` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresados_titulados`
--

CREATE TABLE `egresados_titulados` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_egresados` varchar(200) DEFAULT NULL,
  `mujeres_egresados` varchar(200) DEFAULT NULL,
  `hombres_titulados` varchar(200) DEFAULT NULL,
  `mujeres_titulados` varchar(200) DEFAULT NULL,
  `total_egresados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresados_titulados2`
--

CREATE TABLE `egresados_titulados2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_egresados` varchar(200) DEFAULT NULL,
  `mujeres_egresados` varchar(200) DEFAULT NULL,
  `hombres_titulados` varchar(200) DEFAULT NULL,
  `mujeres_titulados` varchar(200) DEFAULT NULL,
  `total_egresados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_docente`
--

CREATE TABLE `evaluacion_docente` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `calif_promedio` varchar(200) DEFAULT NULL,
  `total_docentes` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_docente2`
--

CREATE TABLE `evaluacion_docente2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `calif_promedio` varchar(200) DEFAULT NULL,
  `total_docentes` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_cbasicas`
--

CREATE TABLE `eventos_cbasicas` (
  `id` int(200) NOT NULL,
  `basicas` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_cbasicas2`
--

CREATE TABLE `eventos_cbasicas2` (
  `id` int(200) NOT NULL,
  `basicas` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_local`
--

CREATE TABLE `eventos_local` (
  `id` int(200) NOT NULL,
  `local` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_local2`
--

CREATE TABLE `eventos_local2` (
  `id` int(200) NOT NULL,
  `local` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_nacional`
--

CREATE TABLE `eventos_nacional` (
  `id` int(200) NOT NULL,
  `nacional` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_nacional2`
--

CREATE TABLE `eventos_nacional2` (
  `id` int(200) NOT NULL,
  `nacional` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_regional`
--

CREATE TABLE `eventos_regional` (
  `id` int(200) NOT NULL,
  `regional` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_regional2`
--

CREATE TABLE `eventos_regional2` (
  `id` int(200) NOT NULL,
  `regional` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extraescolares`
--

CREATE TABLE `extraescolares` (
  `id` int(200) NOT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extraescolares2`
--

CREATE TABLE `extraescolares2` (
  `id` int(200) NOT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_empresarial`
--

CREATE TABLE `gestion_empresarial` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_empresarial2`
--

CREATE TABLE `gestion_empresarial2` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardware`
--

CREATE TABLE `hardware` (
  `id` int(200) NOT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `plataforma` varchar(200) DEFAULT NULL,
  `arquitectura` varchar(200) DEFAULT NULL,
  `procesador` varchar(200) DEFAULT NULL,
  `memoria` varchar(200) DEFAULT NULL,
  `disco_duro` varchar(200) DEFAULT NULL,
  `monitor` varchar(200) DEFAULT NULL,
  `cache` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `red` varchar(20) DEFAULT NULL,
  `sonido` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `raton` varchar(200) DEFAULT NULL,
  `teclado` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` int(200) NOT NULL,
  `instalacion` varchar(200) DEFAULT NULL,
  `cantidad` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `hombre_nuevo` varchar(200) DEFAULT NULL,
  `mujer_nuevo` varchar(200) DEFAULT NULL,
  `hombre_reingreso` varchar(200) DEFAULT NULL,
  `mujer_reingreso` varchar(200) DEFAULT NULL,
  `totales` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_talento_emprendedor`
--

CREATE TABLE `modelo_talento_emprendedor` (
  `id` int(200) NOT NULL,
  `indicador` varchar(200) DEFAULT NULL,
  `resultado` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo_talento_emprendedor`
--

INSERT INTO `modelo_talento_emprendedor` (`id`, `indicador`, `resultado`, `id_usuarios`) VALUES
(2, 'Cantidad de empresas incubadas a través del modelo institucional de incubación empresarial', '', NULL),
(3, 'Cantidad de estudiantes que participen en el modelo talento-emprendedor (Hombres)', '', NULL),
(5, 'Cantidad de estudiantes que participen en el modelo talento-emprendedor (Mujeres)', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdi`
--

CREATE TABLE `pdi` (
  `id` int(200) NOT NULL,
  `eje` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `objetivo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `linea_accion` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `proyecto` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `numero_indicador` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `indicador` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `unidad_medida` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `metodo_calculo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `numerador` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `denominador` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `area_responsable` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `mil` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `dosmil` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tresmil` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `cuatromil` varchar(200) DEFAULT NULL,
  `cincomil` varchar(200) DEFAULT NULL,
  `ffpsr` varchar(200) DEFAULT NULL,
  `ai` varchar(200) DEFAULT NULL,
  `pp` varchar(200) DEFAULT NULL,
  `eje_estructura` varchar(200) DEFAULT NULL,
  `objetivo_estructura` varchar(200) DEFAULT NULL,
  `la` varchar(200) DEFAULT NULL,
  `proyecto_estructura` varchar(200) DEFAULT NULL,
  `numero_indicador_estructura` varchar(200) DEFAULT NULL,
  `id_usuario` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pdi`
--

INSERT INTO `pdi` (`id`, `eje`, `objetivo`, `linea_accion`, `proyecto`, `numero_indicador`, `indicador`, `unidad_medida`, `metodo_calculo`, `numerador`, `denominador`, `area_responsable`, `mil`, `dosmil`, `tresmil`, `cuatromil`, `cincomil`, `ffpsr`, `ai`, `pp`, `eje_estructura`, `objetivo_estructura`, `la`, `proyecto_estructura`, `numero_indicador_estructura`, `id_usuario`) VALUES
(0, '﻿', '', '\"1.1. Mejorar la calidad', ' la pertinencia y la evaluación de los programas académicos de licenciatura y posgrado hacia un nivel de competencia internacional.\"', '1.1.2 - Autoevaluación de los programas educativos', '2', 'Propuesta de evaluación elaborada', 'Propuesta de evaluación elaborada', 'Evaluación elaborada en el año N', '', '', 'SAC/ECONOMICO ADMIN', '', '', '', '', '', '2530', '5', 'E010', '1', '1', '1', '2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos_financieros`
--

CREATE TABLE `recursos_financieros` (
  `id` int(200) NOT NULL,
  `recursos` varchar(200) DEFAULT NULL,
  `enero` varchar(200) DEFAULT NULL,
  `febrero` varchar(200) DEFAULT NULL,
  `marzo` varchar(200) DEFAULT NULL,
  `abril` varchar(200) DEFAULT NULL,
  `mayo` varchar(200) DEFAULT NULL,
  `junio` varchar(200) DEFAULT NULL,
  `julio` varchar(200) DEFAULT NULL,
  `agosto` varchar(200) DEFAULT NULL,
  `septiembre` varchar(200) DEFAULT NULL,
  `octubre` varchar(200) DEFAULT NULL,
  `noviembre` varchar(200) DEFAULT NULL,
  `diciembre` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia_profesional`
--

CREATE TABLE `residencia_profesional` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia_profesional2`
--

CREATE TABLE `residencia_profesional2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia_profesional_empresas`
--

CREATE TABLE `residencia_profesional_empresas` (
  `id` int(200) NOT NULL,
  `empresas` varchar(200) DEFAULT NULL,
  `nombre_proyecto` varchar(200) DEFAULT NULL,
  `creacion` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia_profesional_empresas2`
--

CREATE TABLE `residencia_profesional_empresas2` (
  `id` int(200) NOT NULL,
  `empresas` varchar(200) DEFAULT NULL,
  `nombre_proyecto` varchar(200) DEFAULT NULL,
  `creacion` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id` int(200) NOT NULL,
  `responsable` varchar(200) DEFAULT NULL,
  `departamento` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id`, `responsable`, `departamento`, `id_usuarios`) VALUES
(1, 'ING. PEDRO AGUIRRE RAMOS', 'Jefe de Departamento de Servicios Escolares', NULL),
(2, 'ING. ROMMEL BAILLERES MORALES', 'Jefe de Division de Estudios Profesionales', NULL),
(3, 'ING. ADRIAN ALEJANDRO VAZQUEZ ZAMBRANO/ING. LAURA PATRICIA CALCANEO GONZALEZ', 'Jefe del Departamento de Planeacion / Encargada del Departamento de Extraescolares', NULL),
(4, 'MTRA. MARIA PATRICIA JASSO MELO /MTRO. SAMUEL RENE RUIZ MARTINEZ', 'Departamento de Ciencias Basicas/Ingenierias/Economico-Admin', NULL),
(5, 'M.A. ENRIQUETA HERNANDEZ IBAÑEZ', 'Subdirectora Administrativa', NULL),
(6, 'ING. ANGELICA SANTIAGO NOGUEZ', 'Encargado del Centro de Informacion', NULL),
(7, 'MTRO. JORGE MISAEL RUIZ MARTINEZ', 'Encargado del Centro de Cómputo', NULL),
(8, 'M.A. JOSE ANTONIO CHAVEZ HUITRON', 'Jefe del Departamento de Desarrollo Académico', NULL),
(9, 'LIC. EUNICE MERARI SIL SANCHEZ', 'Encargada del Departamento de Gestion Tecnologica y Vinculacion', NULL),
(10, 'LIC. ALFREDO LUNA RODRIGUEZ', 'Jefe del Departamento de Recursos Materiales y Servicios Generales', NULL),
(11, 'MTRA. MARIA DEL CARMEN RODRIGUEZ BARRERA', 'Jefa del Departamento Economico Administrativas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos`
--

CREATE TABLE `r_humanos` (
  `id` int(200) NOT NULL,
  `prof_tiempo_completo` varchar(200) DEFAULT NULL,
  `licenciatura` varchar(200) DEFAULT NULL,
  `especialidad` varchar(200) DEFAULT NULL,
  `maestria` varchar(200) DEFAULT NULL,
  `maestria_s_a` varchar(200) DEFAULT NULL,
  `doctorado` varchar(200) DEFAULT NULL,
  `doctorado_s_a` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_1`
--

CREATE TABLE `r_humanos_1` (
  `id` int(200) NOT NULL,
  `prof_trescuartos_tiempo` varchar(200) DEFAULT NULL,
  `licenciatura` varchar(200) DEFAULT NULL,
  `especialidad` varchar(200) DEFAULT NULL,
  `maestria` varchar(200) DEFAULT NULL,
  `maestria_s_a` varchar(200) DEFAULT NULL,
  `doctorado` varchar(200) DEFAULT NULL,
  `doctorado_s_a` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_2`
--

CREATE TABLE `r_humanos_2` (
  `id` int(200) NOT NULL,
  `prof_medio_tiempo` varchar(200) DEFAULT NULL,
  `licenciatura` varchar(200) DEFAULT NULL,
  `especialidad` varchar(200) DEFAULT NULL,
  `maestria` varchar(200) DEFAULT NULL,
  `maestria_s_a` varchar(200) DEFAULT NULL,
  `doctorado` varchar(200) DEFAULT NULL,
  `doctorado_s_a` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_3`
--

CREATE TABLE `r_humanos_3` (
  `id` int(200) NOT NULL,
  `prof_hora_tiempo` varchar(200) DEFAULT NULL,
  `licenciatura` varchar(200) DEFAULT NULL,
  `especialidad` varchar(200) DEFAULT NULL,
  `maestria` varchar(200) DEFAULT NULL,
  `maestria_s_a` varchar(200) DEFAULT NULL,
  `doctorado` varchar(200) DEFAULT NULL,
  `doctorado_s_a` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_capacitacion`
--

CREATE TABLE `r_humanos_capacitacion` (
  `id` int(200) NOT NULL,
  `capacitacion` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_docentes`
--

CREATE TABLE `r_humanos_docentes` (
  `id` int(200) NOT NULL,
  `docentes` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_funcionarios`
--

CREATE TABLE `r_humanos_funcionarios` (
  `id` int(200) NOT NULL,
  `funcionarios` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_funciones`
--

CREATE TABLE `r_humanos_funciones` (
  `id` int(200) NOT NULL,
  `estudios` varchar(200) DEFAULT NULL,
  `hombres_servicio` varchar(200) DEFAULT NULL,
  `mujeres_servicio` varchar(200) DEFAULT NULL,
  `hombres_administrativas` varchar(200) DEFAULT NULL,
  `mujeres_administrativas` varchar(200) DEFAULT NULL,
  `hombres_analistas` varchar(200) DEFAULT NULL,
  `mujeres_analistas` varchar(200) DEFAULT NULL,
  `hombres_docencia` varchar(200) DEFAULT NULL,
  `mujeres_docencia` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_personal`
--

CREATE TABLE `r_humanos_personal` (
  `id` int(200) NOT NULL,
  `personal` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_personal_cap`
--

CREATE TABLE `r_humanos_personal_cap` (
  `id` int(200) NOT NULL,
  `capacitado` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_humanos_total`
--

CREATE TABLE `r_humanos_total` (
  `id` int(200) NOT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `hombres_20` varchar(200) DEFAULT NULL,
  `mujeres_20` varchar(200) DEFAULT NULL,
  `hombres_24` varchar(200) DEFAULT NULL,
  `mujeres_24` varchar(200) DEFAULT NULL,
  `hombres_29` varchar(200) DEFAULT NULL,
  `mujeres_29` varchar(200) DEFAULT NULL,
  `hombres_34` varchar(200) DEFAULT NULL,
  `mujeres_34` varchar(200) DEFAULT NULL,
  `hombres_39` varchar(200) DEFAULT NULL,
  `mujeres_39` varchar(200) DEFAULT NULL,
  `hombres_44` varchar(200) DEFAULT NULL,
  `mujeres_44` varchar(200) DEFAULT NULL,
  `hombres_49` varchar(200) DEFAULT NULL,
  `mujeres_49` varchar(200) DEFAULT NULL,
  `hombres_54` varchar(200) DEFAULT NULL,
  `mujeres_54` varchar(200) DEFAULT NULL,
  `hombres_59` varchar(200) DEFAULT NULL,
  `mujeres_59` varchar(200) DEFAULT NULL,
  `hombres_64` varchar(200) DEFAULT NULL,
  `mujeres_64` varchar(200) DEFAULT NULL,
  `hombres_65` varchar(200) DEFAULT NULL,
  `mujeres_65` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_egresados`
--

CREATE TABLE `seguimiento_egresados` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `nivel` varchar(200) DEFAULT NULL,
  `educativo` varchar(200) DEFAULT NULL,
  `primario` varchar(200) DEFAULT NULL,
  `secundario` varchar(200) DEFAULT NULL,
  `terciario` varchar(200) DEFAULT NULL,
  `publica` varchar(200) DEFAULT NULL,
  `privada` varchar(200) DEFAULT NULL,
  `si` varchar(200) DEFAULT NULL,
  `noo` varchar(200) DEFAULT NULL,
  `parcial` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_egresados2`
--

CREATE TABLE `seguimiento_egresados2` (
  `id` int(200) NOT NULL,
  `programa2` varchar(200) DEFAULT NULL,
  `nivel2` varchar(200) DEFAULT NULL,
  `educativo2` varchar(200) DEFAULT NULL,
  `primario2` varchar(200) DEFAULT NULL,
  `secundario2` varchar(200) DEFAULT NULL,
  `terciario2` varchar(200) DEFAULT NULL,
  `publica2` varchar(200) DEFAULT NULL,
  `privada2` varchar(200) DEFAULT NULL,
  `si2` varchar(200) DEFAULT NULL,
  `noo2` varchar(200) DEFAULT NULL,
  `parcial2` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_social`
--

CREATE TABLE `servicio_social` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_social2`
--

CREATE TABLE `servicio_social2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_social_empresas`
--

CREATE TABLE `servicio_social_empresas` (
  `id` int(200) NOT NULL,
  `empresas` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_social_empresas2`
--

CREATE TABLE `servicio_social_empresas2` (
  `id` int(200) NOT NULL,
  `empresas` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int(200) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `n_licencias` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitantes`
--

CREATE TABLE `solicitantes` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `capacidad_instalada` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitantes2`
--

CREATE TABLE `solicitantes2` (
  `id` int(200) NOT NULL,
  `programa` varchar(200) DEFAULT NULL,
  `modalidad` varchar(200) DEFAULT NULL,
  `capacidad_instalada` varchar(200) DEFAULT NULL,
  `hombres_solicitantes` varchar(200) DEFAULT NULL,
  `mujeres_solicitantes` varchar(200) DEFAULT NULL,
  `hombres_aceptados` varchar(200) DEFAULT NULL,
  `mujeres_aceptados` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tics`
--

CREATE TABLE `tics` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tics2`
--

CREATE TABLE `tics2` (
  `id` int(200) NOT NULL,
  `edad` varchar(200) DEFAULT NULL,
  `hombres` varchar(200) DEFAULT NULL,
  `mujeres` varchar(200) DEFAULT NULL,
  `hombres_dis` varchar(200) DEFAULT NULL,
  `mujeres_dis` varchar(200) DEFAULT NULL,
  `hombres_total` varchar(200) DEFAULT NULL,
  `mujeres_total` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `id_usuarios` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `privilegio` varchar(200) DEFAULT NULL,
  `fecha_registro` varchar(200) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `password`, `privilegio`, `fecha_registro`) VALUES
(1, 'Jefe del Departamento de Planeación', 'Ing. Adrian Alejandro VZ', 'Planeacion@gmail.com', '12345', '1', 'current_timestamp()'),
(2, 'Jefe del Departamento de Servicios Escolares', 'Ing. Pedro Aguirre Ramos', 'escolares@itao.edu.mx', '12345678', '2', '2020-11-09 18:12:13'),
(3, 'Jefe de Division de Estudios Profesionales', 'Ing. Romel Bailleres Morales', 'planeacion@itao.edu.mx', '12345', '2', '2020-12-05 00:11:12'),
(4, 'Departamento de Ciencias Basicas', 'Mtra. Maria Patricia Jasseo Melo', 'cbasicas@itao.edu.mx', '12345', '2', 'current_timestamp()'),
(5, 'Subdirectora Administrativa', 'M.A. Enriqueta Hernandez Ibañez', 'subadministrativa@itao.edu.mx', '12345', '2', '2020-12-14 23:47:55'),
(6, 'Encargado del Centro de Información', 'Ing. Angelica Santiago Noguez', 'centroinfo@itao.edu.mx', '12345', '2', '2020-12-14 23:50:11'),
(7, 'Encargado del Centro de Computo', 'Mtro. Jorge Misael Ruiz Martinez', 'centrocomputo@itao.edu.mx', '12345', '2', 'current_timestamp()'),
(8, 'Jefe de Departamento de Desarrollo Academico', 'M.A. Jose Antonio Chavez Huitron', 'acad@itao.edu.mx', '12345', '2', '2020-12-14 23:54:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_edad_genero`
--
ALTER TABLE `alumnos_edad_genero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `alumnos_edad_genero2`
--
ALTER TABLE `alumnos_edad_genero2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `becas2`
--
ALTER TABLE `becas2`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `centro_computo`
--
ALTER TABLE `centro_computo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `centro_informacion`
--
ALTER TABLE `centro_informacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `conformidad`
--
ALTER TABLE `conformidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `conformidad2`
--
ALTER TABLE `conformidad2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `convenios_vinculacion`
--
ALTER TABLE `convenios_vinculacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `diseño`
--
ALTER TABLE `diseño`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `diseño2`
--
ALTER TABLE `diseño2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `egresados_titulados`
--
ALTER TABLE `egresados_titulados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `egresados_titulados2`
--
ALTER TABLE `egresados_titulados2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `evaluacion_docente`
--
ALTER TABLE `evaluacion_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `evaluacion_docente2`
--
ALTER TABLE `evaluacion_docente2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_cbasicas`
--
ALTER TABLE `eventos_cbasicas`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_cbasicas2`
--
ALTER TABLE `eventos_cbasicas2`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_local`
--
ALTER TABLE `eventos_local`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_local2`
--
ALTER TABLE `eventos_local2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_nacional`
--
ALTER TABLE `eventos_nacional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_nacional2`
--
ALTER TABLE `eventos_nacional2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_regional`
--
ALTER TABLE `eventos_regional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `eventos_regional2`
--
ALTER TABLE `eventos_regional2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `extraescolares`
--
ALTER TABLE `extraescolares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `extraescolares2`
--
ALTER TABLE `extraescolares2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `gestion_empresarial`
--
ALTER TABLE `gestion_empresarial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `gestion_empresarial2`
--
ALTER TABLE `gestion_empresarial2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `modelo_talento_emprendedor`
--
ALTER TABLE `modelo_talento_emprendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `pdi`
--
ALTER TABLE `pdi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recursos_financieros`
--
ALTER TABLE `recursos_financieros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `residencia_profesional`
--
ALTER TABLE `residencia_profesional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `residencia_profesional2`
--
ALTER TABLE `residencia_profesional2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `residencia_profesional_empresas`
--
ALTER TABLE `residencia_profesional_empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `residencia_profesional_empresas2`
--
ALTER TABLE `residencia_profesional_empresas2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos`
--
ALTER TABLE `r_humanos`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_1`
--
ALTER TABLE `r_humanos_1`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_2`
--
ALTER TABLE `r_humanos_2`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_3`
--
ALTER TABLE `r_humanos_3`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_capacitacion`
--
ALTER TABLE `r_humanos_capacitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_docentes`
--
ALTER TABLE `r_humanos_docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_funcionarios`
--
ALTER TABLE `r_humanos_funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_funciones`
--
ALTER TABLE `r_humanos_funciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_personal`
--
ALTER TABLE `r_humanos_personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_personal_cap`
--
ALTER TABLE `r_humanos_personal_cap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `r_humanos_total`
--
ALTER TABLE `r_humanos_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `seguimiento_egresados`
--
ALTER TABLE `seguimiento_egresados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `seguimiento_egresados2`
--
ALTER TABLE `seguimiento_egresados2`
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `servicio_social`
--
ALTER TABLE `servicio_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `servicio_social2`
--
ALTER TABLE `servicio_social2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `servicio_social_empresas`
--
ALTER TABLE `servicio_social_empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `servicio_social_empresas2`
--
ALTER TABLE `servicio_social_empresas2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `solicitantes2`
--
ALTER TABLE `solicitantes2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `tics`
--
ALTER TABLE `tics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `tics2`
--
ALTER TABLE `tics2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_edad_genero`
--
ALTER TABLE `alumnos_edad_genero`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alumnos_edad_genero2`
--
ALTER TABLE `alumnos_edad_genero2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `centro_computo`
--
ALTER TABLE `centro_computo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `centro_informacion`
--
ALTER TABLE `centro_informacion`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `conformidad`
--
ALTER TABLE `conformidad`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `conformidad2`
--
ALTER TABLE `conformidad2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `convenios_vinculacion`
--
ALTER TABLE `convenios_vinculacion`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `diseño`
--
ALTER TABLE `diseño`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `diseño2`
--
ALTER TABLE `diseño2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `egresados_titulados`
--
ALTER TABLE `egresados_titulados`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `egresados_titulados2`
--
ALTER TABLE `egresados_titulados2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluacion_docente`
--
ALTER TABLE `evaluacion_docente`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evaluacion_docente2`
--
ALTER TABLE `evaluacion_docente2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos_local`
--
ALTER TABLE `eventos_local`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos_local2`
--
ALTER TABLE `eventos_local2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos_nacional`
--
ALTER TABLE `eventos_nacional`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos_nacional2`
--
ALTER TABLE `eventos_nacional2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos_regional`
--
ALTER TABLE `eventos_regional`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos_regional2`
--
ALTER TABLE `eventos_regional2`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `extraescolares`
--
ALTER TABLE `extraescolares`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_edad_genero`
--
ALTER TABLE `alumnos_edad_genero`
  ADD CONSTRAINT `alumnos_edad_genero_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos_edad_genero2`
--
ALTER TABLE `alumnos_edad_genero2`
  ADD CONSTRAINT `alumnos_edad_genero2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `becas`
--
ALTER TABLE `becas`
  ADD CONSTRAINT `becas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `becas2`
--
ALTER TABLE `becas2`
  ADD CONSTRAINT `becas2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `centro_computo`
--
ALTER TABLE `centro_computo`
  ADD CONSTRAINT `centro_computo_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `centro_informacion`
--
ALTER TABLE `centro_informacion`
  ADD CONSTRAINT `centro_informacion_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conformidad`
--
ALTER TABLE `conformidad`
  ADD CONSTRAINT `conformidad_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conformidad2`
--
ALTER TABLE `conformidad2`
  ADD CONSTRAINT `conformidad2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `convenios_vinculacion`
--
ALTER TABLE `convenios_vinculacion`
  ADD CONSTRAINT `convenios_vinculacion_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `diseño`
--
ALTER TABLE `diseño`
  ADD CONSTRAINT `diseño_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `diseño2`
--
ALTER TABLE `diseño2`
  ADD CONSTRAINT `diseño2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `egresados_titulados`
--
ALTER TABLE `egresados_titulados`
  ADD CONSTRAINT `egresados_titulados_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `egresados_titulados2`
--
ALTER TABLE `egresados_titulados2`
  ADD CONSTRAINT `egresados_titulados2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_docente`
--
ALTER TABLE `evaluacion_docente`
  ADD CONSTRAINT `evaluacion_docente_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_docente2`
--
ALTER TABLE `evaluacion_docente2`
  ADD CONSTRAINT `evaluacion_docente2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_cbasicas`
--
ALTER TABLE `eventos_cbasicas`
  ADD CONSTRAINT `eventos_cbasicas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_cbasicas2`
--
ALTER TABLE `eventos_cbasicas2`
  ADD CONSTRAINT `eventos_cbasicas2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_local`
--
ALTER TABLE `eventos_local`
  ADD CONSTRAINT `eventos_local_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_local2`
--
ALTER TABLE `eventos_local2`
  ADD CONSTRAINT `eventos_local2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_nacional`
--
ALTER TABLE `eventos_nacional`
  ADD CONSTRAINT `eventos_nacional_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_nacional2`
--
ALTER TABLE `eventos_nacional2`
  ADD CONSTRAINT `eventos_nacional2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_regional`
--
ALTER TABLE `eventos_regional`
  ADD CONSTRAINT `eventos_regional_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos_regional2`
--
ALTER TABLE `eventos_regional2`
  ADD CONSTRAINT `eventos_regional2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `extraescolares`
--
ALTER TABLE `extraescolares`
  ADD CONSTRAINT `extraescolares_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `extraescolares2`
--
ALTER TABLE `extraescolares2`
  ADD CONSTRAINT `extraescolares2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_empresarial`
--
ALTER TABLE `gestion_empresarial`
  ADD CONSTRAINT `gestion_empresarial_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_empresarial2`
--
ALTER TABLE `gestion_empresarial2`
  ADD CONSTRAINT `gestion_empresarial2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `instalaciones_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo_talento_emprendedor`
--
ALTER TABLE `modelo_talento_emprendedor`
  ADD CONSTRAINT `modelo_talento_emprendedor_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pdi`
--
ALTER TABLE `pdi`
  ADD CONSTRAINT `pdi_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recursos_financieros`
--
ALTER TABLE `recursos_financieros`
  ADD CONSTRAINT `recursos_financieros_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `residencia_profesional`
--
ALTER TABLE `residencia_profesional`
  ADD CONSTRAINT `residencia_profesional_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `residencia_profesional2`
--
ALTER TABLE `residencia_profesional2`
  ADD CONSTRAINT `residencia_profesional2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `residencia_profesional_empresas`
--
ALTER TABLE `residencia_profesional_empresas`
  ADD CONSTRAINT `residencia_profesional_empresas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `residencia_profesional_empresas2`
--
ALTER TABLE `residencia_profesional_empresas2`
  ADD CONSTRAINT `residencia_profesional_empresas2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `responsables_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos`
--
ALTER TABLE `r_humanos`
  ADD CONSTRAINT `r_humanos_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_1`
--
ALTER TABLE `r_humanos_1`
  ADD CONSTRAINT `r_humanos_1_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_2`
--
ALTER TABLE `r_humanos_2`
  ADD CONSTRAINT `r_humanos_2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_3`
--
ALTER TABLE `r_humanos_3`
  ADD CONSTRAINT `r_humanos_3_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_capacitacion`
--
ALTER TABLE `r_humanos_capacitacion`
  ADD CONSTRAINT `r_humanos_capacitacion_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_docentes`
--
ALTER TABLE `r_humanos_docentes`
  ADD CONSTRAINT `r_humanos_docentes_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_funcionarios`
--
ALTER TABLE `r_humanos_funcionarios`
  ADD CONSTRAINT `r_humanos_funcionarios_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_funciones`
--
ALTER TABLE `r_humanos_funciones`
  ADD CONSTRAINT `r_humanos_funciones_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_personal`
--
ALTER TABLE `r_humanos_personal`
  ADD CONSTRAINT `r_humanos_personal_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_personal_cap`
--
ALTER TABLE `r_humanos_personal_cap`
  ADD CONSTRAINT `r_humanos_personal_cap_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_humanos_total`
--
ALTER TABLE `r_humanos_total`
  ADD CONSTRAINT `r_humanos_total_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento_egresados`
--
ALTER TABLE `seguimiento_egresados`
  ADD CONSTRAINT `seguimiento_egresados_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento_egresados2`
--
ALTER TABLE `seguimiento_egresados2`
  ADD CONSTRAINT `seguimiento_egresados2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_social`
--
ALTER TABLE `servicio_social`
  ADD CONSTRAINT `servicio_social_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_social2`
--
ALTER TABLE `servicio_social2`
  ADD CONSTRAINT `servicio_social2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_social_empresas`
--
ALTER TABLE `servicio_social_empresas`
  ADD CONSTRAINT `servicio_social_empresas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_social_empresas2`
--
ALTER TABLE `servicio_social_empresas2`
  ADD CONSTRAINT `servicio_social_empresas2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `software_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD CONSTRAINT `solicitantes_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitantes2`
--
ALTER TABLE `solicitantes2`
  ADD CONSTRAINT `solicitantes2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tics`
--
ALTER TABLE `tics`
  ADD CONSTRAINT `tics_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tics2`
--
ALTER TABLE `tics2`
  ADD CONSTRAINT `tics2_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
