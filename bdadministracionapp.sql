-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 03:49:18
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdadministracionapp`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insert_segmento_usuario` (IN `id` BIGINT, IN `segmento` INT)  INSERT INTO tbl_movil_segmento_usuario SELECT u.Id_usuario,s.id FROM tbl_usuarios u INNER JOIN tbl_movil_segmentos s ON u.Id_usuario=id and s.id=segmento$$


DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_bitacora`
--

CREATE TABLE `tbl_movil_bitacora` (
  `id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `objeto_id` bigint(20) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `tbl_movil_bitacora`
--
DELIMITER $$
CREATE TRIGGER `tgr_movil_bitacora_deleted` BEFORE DELETE ON `tbl_movil_bitacora` FOR EACH ROW INSERT INTO tbl_movil_bitacora_deleted                  (id,usuario_id,objeto_id,accion,descripcion,fecha,user_delete,fecha_eliminacion) 
        values
        (OLD.id,OLD.usuario_id,OLD.objeto_id,OLD.accion,OLD.descripcion,OLD.fecha,OLD.token,CURRENT_USER,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_bitacora_deleted`
--

CREATE TABLE `tbl_movil_bitacora_deleted` (
  `id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `objeto_id` bigint(20) DEFAULT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `user_delete` varchar(100) DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_mensajes_chat`
--

CREATE TABLE `tbl_movil_mensajes_chat` (
  `id_mensaje` bigint(20) NOT NULL,
  `id_session_chat` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `flag_lectura` int(1) NOT NULL,
  `tipo_mensaje` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_noticias`
--

CREATE TABLE `tbl_movil_noticias` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(90) NOT NULL,
  `subtitulo` varchar(90) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_vencimiento` datetime NOT NULL,
  `remitente` varchar(45) NOT NULL,
  `segmento_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_noticia_recurso`
--

CREATE TABLE `tbl_movil_noticia_recurso` (
  `noticia_id` bigint(20) NOT NULL,
  `recurso_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_notificaciones`
--

CREATE TABLE `tbl_movil_notificaciones` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `remitente` varchar(45) DEFAULT NULL,
  `segmento_id` bigint(20) NOT NULL,
  `tipo_notificacion_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_parametros`
--

CREATE TABLE `tbl_movil_parametros` (
  `id` bigint(20) NOT NULL,
  `parametro` varchar(200) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `valor` varchar(45) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `creado_por` varchar(90) NOT NULL,
  `modificado_por` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_segmentos`
--

CREATE TABLE `tbl_movil_segmentos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `creado_por` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_segmento_usuario`
--

CREATE TABLE `tbl_movil_segmento_usuario` (
  `usuario_id` bigint(20) NOT NULL,
  `segmento_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_session_chats`
--

CREATE TABLE `tbl_movil_session_chats` (
  `id_session_chat` bigint(20) NOT NULL,
  `id_usuario1` bigint(20) NOT NULL,
  `id_usuario2` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_tipo_mensajes`
--

CREATE TABLE `tbl_movil_tipo_mensajes` (
  `id` int(11) NOT NULL,
  `tipo_mensaje` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_tipo_notificaciones`
--

CREATE TABLE `tbl_movil_tipo_notificaciones` (
  `id` int(11) NOT NULL,
  `tipo_notificacion` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_tipo_notificaciones`
--

INSERT INTO `tbl_movil_tipo_notificaciones` (`id`, `tipo_notificacion`, `descripcion`) VALUES
(1, 'NOTIFICACION', 'NOTIFICACIONES NORMALES'),
(2, 'NOTICIA', 'NOTIFICACIONES SOBRE NOTICIAS'),
(3, 'CHAT', 'NOTIFICACIONES DE MENSAJES DEL CHAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_tipo_recursos`
--

CREATE TABLE `tbl_movil_tipo_recursos` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_transacciones`
--

CREATE TABLE `tbl_movil_transacciones` (
  `id` int(11) NOT NULL,
  `fecha_envio` datetime DEFAULT NULL,
  `request_envio` varchar(45) DEFAULT NULL,
  `response` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_objetos`
--

CREATE TABLE `tbl_objetos` (
  `Id_objeto` bigint(20) NOT NULL,
  `objeto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_objetos`
--

INSERT INTO `tbl_objetos` (`Id_objeto`, `objeto`, `descripcion`) VALUES
(160, 'movil_bitacora_vista', ''),
(161, 'movil_chat_vista', ''),
(162, 'movil_crear_noticia_vista', ''),
(163, 'movil_crear_notificacion_vista', ''),
(164, 'movil_crear_parametros_vista', ''),
(165, 'movil_crear_segmento_vista', ''),
(166, 'movil_crear_tipo_mensaje_vista', ''),
(167, 'movil_crear_tipo_notificacion_vista', ''),
(168, 'movil_gestion_noticia_vista', ''),
(169, 'movil_gestion_notificaciones_vista', ''),
(170, 'movil_gestion_parametros_vista', ''),
(171, 'movil_gestion_segmentos_vista', ''),
(172, 'movil_gestion_transacciones_vista', ''),
(173, 'movil_llenar_segmento_vista', ''),
(174, 'movil_mantenimiento_tipo_mensaje_vista', ''),
(175, 'movil_mantenimiento_tipo_notificacion_vista', ''),
(176, 'movil_mantenimiento_tipo_recurso_vista', ''),
(177, 'movil_mantenimiento_ubicacionrecurso_vista', ''),
(178, 'movil_menu_gestion_vista', ''),
(179, 'movil_menu_mantenimiento_vista', ''),
(180, 'movil_menu_noticias_vista', ''),
(181, 'movil_menu_notificaciones_vista', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos_usuarios`
--

CREATE TABLE `tbl_permisos_usuarios` (
  `Id_permisos_usuario` bigint(20) NOT NULL,
  `Id_rol` bigint(20) NOT NULL,
  `Id_objeto` bigint(20) NOT NULL,
  `insertar` varchar(255) NOT NULL,
  `modificar` varchar(255) NOT NULL,
  `eliminar` varchar(255) NOT NULL,
  `visualizar` varchar(255) NOT NULL,
  `Fecha_creacion` datetime DEFAULT NULL,
  `Creado_por` varchar(255) DEFAULT NULL,
  `Modificado_por` varchar(255) DEFAULT NULL,
  `Fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_permisos_usuarios`
--

INSERT INTO `tbl_permisos_usuarios` (`Id_permisos_usuario`, `Id_rol`, `Id_objeto`, `insertar`, `modificar`, `eliminar`, `visualizar`, `Fecha_creacion`, `Creado_por`, `Modificado_por`, `Fecha_modificacion`) VALUES
(1, 46, 160, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(2, 46, 161, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(3, 46, 162, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(4, 46, 163, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(2, 46, 164, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(6, 46, 165, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(7, 46, 166, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(8, 46, 167, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(9, 46, 168, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(10, 46, 169, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(11, 46, 170, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(12, 46, 171, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(13, 46, 172, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(14, 46, 173, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(15, 46, 174, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(16, 46, 175, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(17, 46, 176, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(18, 46, 177, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(19, 46, 178, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(20, 46, 179, '1', '1', '1', '1', '2021-08-18 23:59:51', 'admin', 'admin', '2021-08-18 23:59:51'),
(21, 46, 180, '1', '1', '1', '1', '2021-08-18 23:59:52', 'admin', 'admin', '2021-08-18 23:59:52'),
(22, 46, 181, '1', '1', '1', '1', '2021-08-18 23:59:53', 'admin', 'admin', '2021-08-18 23:59:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `id_persona` bigint(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) NOT NULL,
  `identidad` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(25) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_tipo_persona` int(11) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `id_tipo_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`id_persona`, `nombres`, `apellidos`, `sexo`, `identidad`, `nacionalidad`, `estado_civil`, `fecha_nacimiento`, `id_tipo_persona`, `Estado`, `id_tipo_docente`) VALUES
(3, 'Daniel ', '20161002890', 'numero de cuenta', 'Alumno', NULL, NULL, NULL, 2, 'INACTIVO', 1),
(4, 'Helmer Ernesto ', 'Calix', 'numero de cuenta', 'Alumno', NULL, NULL, NULL, 2, 'INACTIVO', NULL),
(6, 'CHRISTEL NICOLE ', 'NEUMANN CALLEJAS', 'NUMERO_CUENTA', '0801-1996-15579', NULL, NULL, '2020-10-20', 2, 'INACTIVO', NULL),
(10, 'FANY', 'BARAHONA', 'FEMENINO', '0801-1997-23034', 'HODURENA', 'CASADO', '2020-01-02', 1, 'INACTIVO', NULL),
(14, 'SANDRA JANETH ', 'QUAN GOMEZ', 'FEMENINO', '080100000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 3, 'INACTIVO', NULL),
(15, 'EDIS JULIAN', 'REYES GARCIA', 'MASCULINO', '0808000000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(16, 'CAROLD ARGENTINA', 'RITHENHOUSE SABILLON', 'FEMENINO', '0808000000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(17, 'NELSON FRANCISCO', 'DIAZ VALLEJO', 'MASCULINO', '080800000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(18, 'ROSMERY CORRALES', 'APLICANO', 'FEMENINO', '0808000000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(19, 'MARTHA PATRICIA', 'ELLNER VILLALONGA', 'FEMENINO', '080800000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(20, 'FREDY ANDERSSON', 'MOTIÑO FLORES', 'MASCULINO', '0801199508298', 'HONDUREÑA', 'SOLTERO', '1995-05-04', 2, 'INACTIVO', NULL),
(21, 'DANIEL ENRIQUE', 'RAMIREZ', 'MASCULINO', '080800000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'INACTIVO', NULL),
(22, 'Linda Ceciclia', 'Villatoro Hernandez', 'Femenino', ' 0801-1111-1111_', NULL, NULL, '1997-06-12', 2, 'INACTIVO', NULL),
(23, 'DULCE MONSERRAT', 'DEL CID FIALLOS', 'FEMENINO', '0801000000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(24, 'GIANCARLO MARTINI', 'SCALICI AGUILAR', 'MASCULINO', '0808000000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(25, 'CRISTIAN JOSUE', 'RIVERA RAMIREZ', 'MASCULINO', '080800000000', 'HONDUREÑA', 'SOLTERO', '2021-03-01', 1, 'ACTIVO', NULL),
(26, 'Samanta', 'Ramirez', 'Femenino', ' 1111-1111-11111', NULL, NULL, '2021-03-05', 2, 'INACTIVO', NULL),
(27, 'Edward Alberto', 'Alvarenga Rodriguez', 'Masculino', ' 0801-2222-02022', NULL, NULL, '1992-07-17', 2, 'INACTIVO', NULL),
(39, 'ROSMERY ', 'CORRALES', 'FEMENINO', '0801-1273-33232', 'HONDUREÑA', 'CASADO', '2001-03-22', 1, 'INACTIVO', NULL),
(61, 'Enrique ', 'Rivera', 'Masculino', ' 2222-2222-22222', NULL, NULL, '2021-03-07', 2, 'INACTIVO', NULL),
(63, 'LESTER JOSUE ', 'FIALLOS PERALTA', 'MASCULINO', ' 0801-1990-01243', 'HONDUREÑA', 'SOLTERO', '1990-12-05', 1, 'ACTIVO', NULL),
(66, 'Fredy andersson', 'MOTINO FLORES', 'MASCULINO', '0801199508298', 'FRANCÉSA', 'SOLTERO', '2021-03-01', 2, 'INACTIVO', NULL),
(67, 'fredy', 'andersson cruz', 'FEMENINO', '0000000000000', 'AFGANA', 'SOLTERO', '2021-03-01', 1, 'INACTIVO', NULL),
(68, 'fredy', 'a', 'MASCULINO', '00000000000', 'AFGANA', 'SOLTERO', '2021-03-01', 1, 'INACTIVO', NULL),
(69, 'ander', 'fredy', '', '999999999999', 'AFGANA', 'UNION LIBRE', '2021-03-02', 1, 'INACTIVO', NULL),
(70, 'andersson', 'flores', '', '8888888888', 'AFGANA', 'SOLTERO', '2021-03-03', 1, 'INACTIVO', NULL),
(71, 'fredy', 'pao', 'MASCULINO', '9999999999', 'AFGANA', 'SOLTERO', '2021-03-02', 1, 'INACTIVO', NULL),
(72, 'fred', 'an', '', '5555555555555', 'AFGANA', 'SOLTERO', '2021-03-01', 1, 'INACTIVO', NULL),
(73, 'katherine andrea', 'alonzo', 'FEMENINO', ' 0801-1967-02806', 'AUSTRALIANA', 'SOLTERO', '1967-06-09', 1, 'INACTIVO', NULL),
(74, 'Lisa', 'Lucas', 'FEMENINO', ' 0801-1985-29999', 'ALEMANA', 'SOLTERO', '1985-06-01', 2, 'INACTIVO', NULL),
(77, 'HANSY NICOL', 'PONCE PONCE', 'Femenino', NULL, NULL, NULL, NULL, 2, 'INACTIVO', NULL),
(80, 'CARLOS GUSTAVO', 'ROMERO GALEANO', 'MASCULINO', '0805-1990-00123', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(81, 'CARMEN SUYAPA', 'GONZALEZ SANTOS', 'FEMENINO', '0801-1990-00135', 'HONDUREÑA', 'CASADO', '1990-04-05', 1, 'ACTIVO', NULL),
(82, 'CLAUDIA REGINA', 'NUÑEZ GALINDO', 'FEMENINO', '0901-1990-12300', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(83, 'DAVID MARTIN', 'ROVELO HERNANDEZ', 'MASCULINO', '0901-1990-12344', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(84, 'DILMA DORIS', 'ORTEGA TROCHE', 'FEMENINO', '0801-1990-00456', 'HONDUREÑA', 'CASADO', '1990-03-31', 1, 'ACTIVO', NULL),
(85, 'DINORA PATRICIA', 'VELASQUEZ VELASQUEZ', 'FEMENINO', '0801-1990-12345', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(86, 'DULIS PATRICIA', 'CORDOVA GALO', 'FEMENINO', '0901-1990-67890', 'HONDUREÑA', 'CASADO', '1990-03-29', 1, 'ACTIVO', NULL),
(87, 'HECTOR ALBERTO', 'BERRIOS RODRIGUEZ', 'MASCULINO', '0901-1990-67853', 'HONDUREÑA', 'CASADO', '1990-04-21', 1, 'ACTIVO', NULL),
(88, 'IRMA YADIRA', 'GAMEZ SUAZO', 'FEMENINO', '0801-1990-66543', 'HONDUREÑA', 'CASADO', '1990-03-07', 1, 'ACTIVO', NULL),
(89, 'ISAAC ARMANDO', 'DUBON SAM', 'MASCULINO', '0901-1990-12689', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(90, 'JORGE ALBERTO', 'REYES GARCIA', 'MASCULINO', '0901-1990-00565', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(91, 'KARLA MARIA', 'CHEVEZ FLORES', 'FEMENINO', '0801-1990-08654', 'HONDUREÑA', 'CASADO', '1990-04-13', 1, 'ACTIVO', NULL),
(92, 'LUIS EDUARDO', 'ERAZO TRIMARCHI', 'FEMENINO', '0801-1990-09876', 'HONDUREÑA', 'CASADO', '1990-04-05', 1, 'ACTIVO', NULL),
(93, 'MARCO ANTONIO', 'AVILA ORTEGA', 'MASCULINO', '0808-1990-21313', 'HONDUREÑA', 'CASADO', '1990-03-31', 1, 'ACTIVO', NULL),
(94, 'MARIA LORENA', 'ALVARADO LEVERON', 'FEMENINO', '0801-1990-98765', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(95, 'MARVIN JOSUE', 'AGUILAR ROMERO', 'MASCULINO', '0801-1990-87654', 'HONDUREÑA', 'CASADO', '1990-04-04', 1, 'ACTIVO', NULL),
(96, 'MARVIN LEONEL', 'MENDOZA DIAZ', 'MASCULINO', '0901-1990-11112', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(97, 'MARVIN NOE', 'JAIME MERINO', 'MASCULINO', '0801-1990-11111', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(98, 'MILVIA ESPERANZA', 'GUERRA', 'FEMENINO', '0901-1990-56789', 'HONDUREÑA', 'CASADO', '1990-01-06', 1, 'ACTIVO', NULL),
(99, 'OBED HUMBERTO', 'MARTINEZ REYES', 'FEMENINO', '0801-1990-04546', 'HONDUREÑA', 'CASADO', '1990-04-15', 1, 'ACTIVO', NULL),
(100, 'SANDRA JANETH', 'QUAN GOMEZ', 'FEMENINO', '0901-1990-45678', 'HONDUREÑA', 'CASADO', '1990-03-29', 1, 'ACTIVO', NULL),
(101, 'YOLANY MARITZA', 'FLORES NAZAR', 'FEMENINO', '0801-1990-65778', 'HONDUREÑA', 'CASADO', '1990-04-14', 1, 'ACTIVO', NULL),
(102, 'EDUARDO ENRIQUE', 'SANTOS CASTILLO', 'MASCULINO', '0801-1990-67890', 'HONDUREÑA', 'CASADO', '1990-04-13', 1, 'ACTIVO', NULL),
(103, 'KARLA MELISA', 'GARCIA PINEDA', 'FEMENINO', '0801-1990-16578', 'HONDUREÑA', 'CASADO', '1988-03-30', 1, 'ACTIVO', NULL),
(104, 'CARLOS EDUARDO', 'ORDOÑEZ RODRIGUEZ', 'MASCULINO', '0801-1990-43546', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(105, 'CESAR ALEJANDRO', 'MALDONADO CRUZ', 'MASCULINO', '0801-1990-90898', 'HONDUREÑA', 'CASADO', '1990-03-31', 1, 'ACTIVO', NULL),
(106, 'DILMA AURORA', 'MONCADA AVILA', 'FEMENINO', '0801-1990-88383', 'HONDUREÑA', 'CASADO', '1990-04-05', 1, 'ACTIVO', NULL),
(107, 'HEBER DE JESUS', 'AGUILERA RIVERA', 'MASCULINO', '0801-1990-55777', 'HONDUREÑA', 'CASADO', '1990-03-28', 1, 'ACTIVO', NULL),
(108, 'HECTOR ENRIQUE', 'HERNANDEZ PEDRANO', 'MASCULINO', '0801-1990-55141', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(109, 'JOSE ADALBERTO', 'SIERRA RODAS', 'MASCULINO', '0801-1990-53131', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(110, 'JOSE FRANCISCO', 'PAGOAGA ACOSTA', 'MASCULINO', '0801-1990-66372', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(111, 'JOSE MARIO', 'REYES AGUILAR', 'MASCULINO', '0801-1990-44151', 'HONDUREÑA', 'CASADO', '1990-04-06', 1, 'ACTIVO', NULL),
(112, 'LEONARDO ALFREDO', 'ZAMBRANA AGUILAR', 'MASCULINO', '0801-1990-17727', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(113, 'LESTER JOSUE', 'FIALLOS PERALTA', 'MASCULINO', '0801-1990-11188', 'HONDUREÑA', 'CASADO', '1990-03-31', 1, 'ACTIVO', NULL),
(114, 'REBECA ISABEL', 'ESPINAL DIAZ', 'FEMENINO', '0801-1990-65611', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(115, 'TANIA YESENIA', 'VALLADARES BAISA', 'FEMENINO', '0801-1990-11113', 'HONDUREÑA', 'CASADO', '1990-03-30', 1, 'ACTIVO', NULL),
(116, 'ANGELICA AMELISA', 'MUÑOZ SALINAS', 'FEMENINO', '0801-1990-66551', 'HONDUREÑA', 'CASADO', '1991-03-30', 1, 'ACTIVO', NULL),
(117, 'JOSE LUIS', 'RODRIGUEZ GARCIA', 'MASCULINO', '0801-1990-11101', 'HONDUREÑA', 'CASADO', '1990-04-20', 1, 'ACTIVO', NULL),
(118, 'HECTOR', 'GALINDO PINEDA', 'MASCULINO', '0801-1990-11103', 'HONDUREÑA', 'CASADO', '1990-04-21', 1, 'ACTIVO', NULL),
(130, 'Elia', 'Rivera', 'Femenino', ' 2222-2222-22222', NULL, NULL, '2021-04-02', 2, 'INACTIVO', NULL),
(148, 'PRUEBA', 'PRUEBA', 'MASCULINO', '0801-1999-88999', 'HONDUREÑA', 'UNION LIBRE', '1994-04-23', 1, 'ACTIVO', NULL),
(149, 'PRUEBA', 'PRUEBAA', 'FEMENINO', '0801-1887-88280', 'HONDUREÑA', 'SOLTERO', '2000-04-30', 1, 'ACTIVO', NULL),
(150, 'PRUEBAC', 'PRUEBAD', 'FEMENINO', '0801-1995-00433', 'HONDUREÑA', 'SOLTERO', '1995-04-15', 1, 'ACTIVO', NULL),
(151, 'Gabriel', 'Obando', 'Masculino', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(152, 'Gabriel', 'Obando', 'MASCULINO', '0801199902356', 'HONDUREÑA', 'SOLTERO', '1997-02-05', 2, NULL, NULL),
(153, 'Helmer', 'Calix', 'Masculino', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(154, 'Daniel Enrique ', 'Ramirez Rivera', 'Masculino', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(155, 'CRISTIANO', 'RONALDO', 'MASCULINO', '44445', 'PORTUGUÉSA', 'UNION LIBRE', '1992-05-12', 1, 'ACTIVO', 1),
(156, 'lucia fernanda', 'ponce avila', 'FEMENINO', '0801199615579', 'HONDUREÑA', 'UNION LIBRE', '1996-01-02', 1, NULL, NULL),
(157, 'ever', 'palada', 'Masculino', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(158, 'Isai', 'romero', 'masculino', '0801-2000-14525', 'HONDURAÑA', 'soltero', '1997-12-18', 2, 'ACTIVO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `Id_rol` bigint(20) NOT NULL,
  `Rol` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `Fecha_creacion` datetime DEFAULT NULL,
  `Creado_por` varchar(255) DEFAULT NULL,
  `Modificado_por` varchar(255) DEFAULT NULL,
  `Fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`Id_rol`, `Rol`, `descripcion`, `estado`, `Fecha_creacion`, `Creado_por`, `Modificado_por`, `Fecha_modificacion`) VALUES
(46, 'ADMIN', 'PRUEBA', 1, '2020-05-20 00:00:00', 'da', 'admin', '2020-05-22 20:45:47'),
(49, 'ESTUDIANTE', 'ES ESTUDIANTE', 1, '2020-06-11 00:19:42', 'ADMIN', NULL, NULL),
(51, 'PRUEBAE', 'DE PRUEBA', 1, '2020-08-05 16:38:41', 'ADMIN', NULL, NULL),
(53, 'OPERADOR', 'OPERADOR DE SOLICITUDES', 1, '2020-08-11 06:06:20', 'ADMIN', NULL, NULL),
(54, 'JEFE VINCULACION', 'JEFE DEL DEPTO DE VINCULACION', 1, '2020-08-18 16:43:56', 'ADMIN', NULL, NULL),
(55, 'VINCULACION', 'PERSONAL DE VINCULACION', 1, '2020-08-18 16:44:58', 'ADMIN', NULL, NULL),
(56, 'COORDINADORES', 'COORDINADORES DE CARRERA', 1, '2020-08-18 16:45:42', 'ADMIN', 'ADMIN', '2020-08-18 23:45:50'),
(57, 'COMITE AUTOMATIZACION', 'DOCENTES PERTENECIENTES COMITE', 1, '2020-08-18 16:46:57', 'ADMIN', NULL, NULL),
(59, 'PRACTICA PROFESIONAL', 'PRACTICA PROFESIONAL', 0, '2020-08-28 06:24:33', 'RCORRALES', NULL, NULL),
(61, 'PRUEBAEE', 'DF', 1, '2020-12-05 02:59:21', 'ADMIN', 'ADMIN', '2021-04-14 01:44:12'),
(62, 'PRUEBAX', 'PRUEBAX', 0, '2020-12-05 21:19:40', 'ADMIN', NULL, NULL),
(63, 'PRUEBAPRUEBA', 'PRUEBAS', 1, '2021-02-11 17:36:06', 'ADMIN', NULL, NULL),
(64, 'DOCENTE', 'prubando', 1, '2021-03-22 17:07:46', 'ADMIN', NULL, NULL),
(65, 'OPERATIVO', 'PAA EL PERSONAL OPERATIVO I', 1, '2021-04-04 18:22:31', 'RCORRALES', NULL, NULL),
(66, 'PRUEBAFINAL', 'FINAL FINAL', 1, '2021-04-14 00:27:34', 'ADMIN', NULL, NULL),
(67, 'PRUEBANINI', 'LLKJ', 1, '2021-04-14 01:40:32', 'ADMIN', 'ADMIN', '2021-04-14 01:41:18'),
(68, 'EJEMPLO', 'PRUEBA', 1, '2021-04-23 01:36:51', 'ADMIN', 'ADMIN', '2021-04-23 01:47:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_persona`
--

CREATE TABLE `tbl_tipos_persona` (
  `id_tipo_persona` int(11) NOT NULL DEFAULT 0,
  `tipo_persona` varchar(50) NOT NULL DEFAULT '',
  `descripcion` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipos_persona`
--

INSERT INTO `tbl_tipos_persona` (`id_tipo_persona`, `tipo_persona`, `descripcion`) VALUES
(1, 'DOCENTE', 'ingresado para prueba'),
(2, 'ESTUDIANTE', 'ingresado para prueba'),
(3, 'COORDINADOR', 'ingresado para prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_docente`
--

CREATE TABLE `tbl_tipo_docente` (
  `id_tipo_docente` int(11) NOT NULL,
  `tipo_docente` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_docente`
--

INSERT INTO `tbl_tipo_docente` (`id_tipo_docente`, `tipo_docente`, `descripcion`) VALUES
(1, 'SUED', ''),
(2, 'CU', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `Id_usuario` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Id_rol` bigint(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Intentos` int(11) DEFAULT NULL,
  `Ultima_conexion` datetime DEFAULT NULL,
  `Fec_vence_contrasena` datetime DEFAULT NULL,
  `Fecha_creacion` varchar(255) DEFAULT NULL,
  `Creado_por` varchar(255) DEFAULT NULL,
  `Modificado_por` varchar(255) DEFAULT NULL,
  `Fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`Id_usuario`, `id_persona`, `Usuario`, `Id_rol`, `estado`, `Contrasena`, `Intentos`, `Ultima_conexion`, `Fec_vence_contrasena`, `Fecha_creacion`, `Creado_por`, `Modificado_por`, `Fecha_modificacion`) VALUES
(1, 6, 'ADMIN', 46, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, '2020-09-21 00:00:00', '2023-11-29 10:13:57', '2020-09-21 00:00:00', NULL, 'ADMIN', '2021-04-14 01:52:38'),
(2, 20, 'ANDERMFL', 46, 1, 'SHcwQVp4OEFBeFZuM3B5SUpiSzQ0UT09', 0, NULL, '2022-03-18 21:22:59', NULL, NULL, NULL, NULL),
(43, 22, 'LVILLATORO', 49, 1, 'MjZROTgrU3RPV3pLMVNVNTEwSXU4QT09', 0, NULL, '2021-05-31 18:11:08', '2021-03-18 23:17:10', NULL, NULL, NULL),
(45, 14, 'SQUAN', 55, 2, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(46, 15, 'EREYES', 55, 1, 'SHcwQVp4OEFBeFZuM3B5SUpiSzQ0UT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(47, 16, 'CSABILLON', 55, 2, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(48, 17, 'NDIAZ', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(49, 18, 'RCORRALES', 46, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(50, 19, 'MVILLALONGA', 46, 1, 'UE0zU2h6NzlCZEVQR0gwdUc3Z2cwQT09', 2, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', 'MVILLALONGA', '2021-06-03 01:01:38'),
(51, 23, 'DFIALLOS', 56, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(52, 21, 'DRAMIREZ', 55, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-18', 'ADMIN', NULL, NULL),
(53, 23, 'SRAMIREZ', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-03-19 16:27:55', '2021-03-19 16:27:55', NULL, NULL, NULL),
(54, 27, 'EALVARENGA', 49, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-03-19 17:07:29', '2021-03-19 17:07:29', NULL, NULL, NULL),
(55, 10, 'FANY', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 61, 'ERIVERA', 49, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-03-23 22:18:39', '2021-03-23 22:18:39', NULL, NULL, NULL),
(59, 24, 'GSCALICI', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-25 00:00:00', 'ADMIN', NULL, NULL),
(60, 63, 'LFIALLOS', 46, 2, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-12-30 00:00:00', '2021-03-25 00:00:00', 'ADMIN', NULL, NULL),
(61, 77, 'HPONCE', 49, 2, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-04-06 19:09:57', '2021-04-06 19:09:57', NULL, NULL, NULL),
(63, 130, 'ERIVERA', 49, 1, 'SHcwQVp4OEFBeFZuM3B5SUpiSzQ0UT09', 0, NULL, '2021-06-03 00:00:47', '2021-04-19 20:53:49', NULL, NULL, NULL),
(64, 23, 'DCID', 56, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, '2021-04-30 11:10:27', '2023-11-29 10:13:57', NULL, 'ADMIN', NULL, NULL),
(65, 23, 'MCID', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-04-30 11:22:12', NULL, NULL, NULL, NULL),
(66, 83, 'DROVELO', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-04-30 11:46:12', NULL, NULL, NULL, NULL),
(69, 148, 'PRUEBA', 64, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2022-04-30 13:37:38', NULL, NULL, NULL, NULL),
(70, 151, 'GOBANDO', 49, 1, 'amhEMEVzRmRHUWF5OTk5dERDRzlMQT09', 0, NULL, '2021-05-18 17:10:27', '2021-05-18 17:10:27', NULL, NULL, NULL),
(71, 153, 'HCALIX', 49, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-05-19 17:58:30', '2021-05-19 17:58:30', NULL, NULL, NULL),
(73, 156, 'LUCIFER', 46, 0, 'SHcwQVp4OEFBeFZuM3B5SUpiSzQ0UT09', 0, NULL, NULL, NULL, NULL, 'LUCIFER', '2021-06-03 00:11:36'),
(74, 157, 'EPALADA', 49, 2, 'Q04wZTIwUlBsT3hXdEFsZzhDRUhBdz09', NULL, NULL, '2021-06-08 06:25:19', '2021-06-08 06:25:19', NULL, NULL, NULL),
(75, 158, 'IROMERO', 46, 1, 'RE9mSEpzSGJpQnAvTXpDUEdtZTFvUT09', 0, NULL, '2021-12-11 19:24:51', '2021-06-08 19:22:10', 'ADMIN', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_movil_bitacora`
--
ALTER TABLE `tbl_movil_bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_movil_bitacora_tbl_usuarios1_idx` (`usuario_id`),
  ADD KEY `fk_tbl_movil_bitacora_tbl_objetos1_idx` (`objeto_id`);

--
-- Indices de la tabla `tbl_movil_bitacora_deleted`
--
ALTER TABLE `tbl_movil_bitacora_deleted`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_movil_mensajes_chat`
--
ALTER TABLE `tbl_movil_mensajes_chat`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_tbl_movil_mensajes_chat_tbl_movil_session_chats_idx` (`id_session_chat`),
  ADD KEY `fk_tbl_movil_mensajes_chat_tbl_movil_tipo_mensajes_idx` (`tipo_mensaje`);

--
-- Indices de la tabla `tbl_movil_noticias`
--
ALTER TABLE `tbl_movil_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_movil_noticias_tbl_segmentos1_idx` (`segmento_id`);

--
-- Indices de la tabla `tbl_movil_noticia_recurso`
--
ALTER TABLE `tbl_movil_noticia_recurso`
  ADD KEY `fk_tbl_movil_noticia_recurso_tbl_movil_noticias_idx` (`noticia_id`),
  ADD KEY `fk_tbl_movil_noticia_recurso_tbl_movil_tipo_recursos1_idx` (`recurso_id`);

--
-- Indices de la tabla `tbl_movil_notificaciones`
--
ALTER TABLE `tbl_movil_notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_movil_notificaciones_tbl_movil_segmentos1_idx` (`segmento_id`),
  ADD KEY `fk_tbl_movil_notificaciones_tbl_movil_tipo_notificaciones1_idx` (`tipo_notificacion_id`);

--
-- Indices de la tabla `tbl_movil_parametros`
--
ALTER TABLE `tbl_movil_parametros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_movil_parametros_tbl_usuarios1_idx` (`modificado_por`);

--
-- Indices de la tabla `tbl_movil_segmentos`
--
ALTER TABLE `tbl_movil_segmentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_movil_segmento_usuario`
--
ALTER TABLE `tbl_movil_segmento_usuario`
  ADD KEY `fk_tbl_movil_segmento_usuario_tbl_usuarios1_idx` (`usuario_id`),
  ADD KEY `fk_tbl_movil_segmento_usuario_tbl_movil_segmentos1_idx` (`segmento_id`);

--
-- Indices de la tabla `tbl_movil_session_chats`
--
ALTER TABLE `tbl_movil_session_chats`
  ADD PRIMARY KEY (`id_session_chat`),
  ADD KEY `fk_tbl_movil_session_chats_tbl_usuarios1_idx` (`id_usuario1`),
  ADD KEY `fk_tbl_movil_session_chats_tbl_usuarios2_idx` (`id_usuario2`);

--
-- Indices de la tabla `tbl_movil_tipo_mensajes`
--
ALTER TABLE `tbl_movil_tipo_mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_movil_tipo_notificaciones`
--
ALTER TABLE `tbl_movil_tipo_notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_movil_tipo_recursos`
--
ALTER TABLE `tbl_movil_tipo_recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_movil_transacciones`
--
ALTER TABLE `tbl_movil_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_objetos`
--
ALTER TABLE `tbl_objetos`
  ADD PRIMARY KEY (`Id_objeto`);

--
-- Indices de la tabla `tbl_permisos_usuarios`
--
ALTER TABLE `tbl_permisos_usuarios`
  ADD PRIMARY KEY (`Id_permisos_usuario`),
  ADD KEY `cod_rol` (`Id_rol`),
  ADD KEY `cod_objeto` (`Id_objeto`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `FK_tbl_personas_tbl_tipo_docente` (`id_tipo_docente`),
  ADD KEY `tbl_personas_tbl_tipos_persona_id_tipo_persona_fk` (`id_tipo_persona`) USING BTREE;

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `tbl_tipos_persona`
--
ALTER TABLE `tbl_tipos_persona`
  ADD PRIMARY KEY (`id_tipo_persona`);

--
-- Indices de la tabla `tbl_tipo_docente`
--
ALTER TABLE `tbl_tipo_docente`
  ADD PRIMARY KEY (`id_tipo_docente`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `FK_personas_usuarios` (`id_persona`),
  ADD KEY `FK_rol_usuarios` (`Id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_movil_bitacora`
--
ALTER TABLE `tbl_movil_bitacora`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_mensajes_chat`
--
ALTER TABLE `tbl_movil_mensajes_chat`
  MODIFY `id_mensaje` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_noticias`
--
ALTER TABLE `tbl_movil_noticias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_notificaciones`
--
ALTER TABLE `tbl_movil_notificaciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_parametros`
--
ALTER TABLE `tbl_movil_parametros`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_segmentos`
--
ALTER TABLE `tbl_movil_segmentos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_session_chats`
--
ALTER TABLE `tbl_movil_session_chats`
  MODIFY `id_session_chat` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_mensajes`
--
ALTER TABLE `tbl_movil_tipo_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_notificaciones`
--
ALTER TABLE `tbl_movil_tipo_notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_recursos`
--
ALTER TABLE `tbl_movil_tipo_recursos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_transacciones`
--
ALTER TABLE `tbl_movil_transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos_usuarios`
--
ALTER TABLE `tbl_permisos_usuarios`
  MODIFY `Id_permisos_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `Id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_docente`
--
ALTER TABLE `tbl_tipo_docente`
  MODIFY `id_tipo_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `Id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_movil_bitacora`
--
ALTER TABLE `tbl_movil_bitacora`
  ADD CONSTRAINT `fk_tbl_movil_bitacora_tbl_objetos1` FOREIGN KEY (`objeto_id`) REFERENCES `tbl_objetos` (`Id_objeto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_bitacora_tbl_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_mensajes_chat`
--
ALTER TABLE `tbl_movil_mensajes_chat`
  ADD CONSTRAINT `fk_tbl_movil_mensajes_chat_tbl_movil_session_chats1` FOREIGN KEY (`id_session_chat`) REFERENCES `tbl_movil_session_chats` (`id_session_chat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_mensajes_chat_tbl_movil_tipo_mensajes1` FOREIGN KEY (`tipo_mensaje`) REFERENCES `tbl_movil_tipo_mensajes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_noticias`
--
ALTER TABLE `tbl_movil_noticias`
  ADD CONSTRAINT `fk_tbl_movil_noticias_tbl_segmentos1` FOREIGN KEY (`segmento_id`) REFERENCES `tbl_movil_segmentos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_noticia_recurso`
--
ALTER TABLE `tbl_movil_noticia_recurso`
  ADD CONSTRAINT `fk_tbl_movil_noticia_recurso_tbl_movil_noticias` FOREIGN KEY (`noticia_id`) REFERENCES `tbl_movil_noticias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_noticia_recurso_tbl_movil_tipo_recursos1` FOREIGN KEY (`recurso_id`) REFERENCES `tbl_movil_tipo_recursos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_notificaciones`
--
ALTER TABLE `tbl_movil_notificaciones`
  ADD CONSTRAINT `fk_tbl_movil_notificaciones_tbl_movil_segmentos1` FOREIGN KEY (`segmento_id`) REFERENCES `tbl_movil_segmentos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_notificaciones_tbl_movil_tipo_notificaciones1` FOREIGN KEY (`tipo_notificacion_id`) REFERENCES `tbl_movil_tipo_notificaciones` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_parametros`
--
ALTER TABLE `tbl_movil_parametros`
  ADD CONSTRAINT `fk_tbl_movil_parametros_tbl_usuarios1` FOREIGN KEY (`modificado_por`) REFERENCES `tbl_usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_segmento_usuario`
--
ALTER TABLE `tbl_movil_segmento_usuario`
  ADD CONSTRAINT `fk_tbl_movil_segmento_usuario_tbl_movil_segmentos1` FOREIGN KEY (`segmento_id`) REFERENCES `tbl_movil_segmentos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_segmento_usuario_tbl_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movil_session_chats`
--
ALTER TABLE `tbl_movil_session_chats`
  ADD CONSTRAINT `fk_tbl_movil_session_chats_tbl_usuarios1` FOREIGN KEY (`id_usuario1`) REFERENCES `tbl_usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbl_movil_session_chats_tbl_usuarios2` FOREIGN KEY (`id_usuario2`) REFERENCES `tbl_usuarios` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `FK_tbl_personas_tbl_tipo_docente` FOREIGN KEY (`id_tipo_docente`) REFERENCES `tbl_tipo_docente` (`id_tipo_docente`),
  ADD CONSTRAINT `FK_tbl_personas_tbl_tipos_persona` FOREIGN KEY (`id_tipo_persona`) REFERENCES `tbl_tipos_persona` (`id_tipo_persona`),
  ADD CONSTRAINT `tbl_personas_tbl_tipos_persona_id_tipo_persona_fk` FOREIGN KEY (`id_tipo_persona`) REFERENCES `tbl_tipos_persona` (`id_tipo_persona`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `FK_tbl_usuarios_tbl_roles` FOREIGN KEY (`Id_rol`) REFERENCES `tbl_roles` (`Id_rol`),
  ADD CONSTRAINT `FKpersonas_usuario` FOREIGN KEY (`id_persona`) REFERENCES `tbl_personas` (`id_persona`);

DELIMITER $$
--
-- Eventos
--
$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
