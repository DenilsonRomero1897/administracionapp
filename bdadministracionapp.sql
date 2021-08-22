-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2021 a las 22:16:43
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

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
-- Volcado de datos para la tabla `tbl_movil_bitacora`
--

INSERT INTO `tbl_movil_bitacora` (`id`, `usuario_id`, `objeto_id`, `accion`, `descripcion`, `fecha`, `token`) VALUES
(1, 75, 128, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-16 20:12:53', ''),
(2, 75, 15, 'INGRESO', 'A CREAR SEGMENTOS', '2021-08-16 20:28:54', ''),
(3, 75, 127, 'inserto', 'INSERT INTO TBL_MOVIL_SEGMENTOS VALUES (NULL,\'EXAMEN\',\'METODOS\',\'75\',SYSDATE())', '2021-08-16 20:28:59', ''),
(4, 75, 125, 'Ingreso', 'A llenar Segmento', '2021-08-16 20:28:59', ''),
(5, 75, 128, 'INGRESO', 'A CREAR NOTICIA', '2021-08-16 20:31:15', ''),
(6, 75, 128, 'INSERTO', 'INSERT INTO TBL_MOVIL_NOTICIAS (TITULO,SUBTITULO,DESCRIPCION,FECHA,FECHA_VENCIMIENTO,REMITENTE,SEGMENTO_ID) VALUES (\'NUEVA\',\'SEGUNDO PARCIAL\',\'HOLA RICCY\',\'2021-08-17 21:32:00\',\'2021-09-18 23:34:00\',\'ADMIN\',1)', '2021-08-16 20:31:56', ''),
(7, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:31:57', ''),
(8, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:32:03', ''),
(9, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:32:25', ''),
(10, 75, 128, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'NUEVA\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA RICCY\', FECHA = \'2021-08-17 21:32:00\',FECHA_VENCIMIENTO = \'2021-09-18 23:34:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 1', '2021-08-16 20:32:32', ''),
(11, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:32:50', ''),
(12, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:33:08', ''),
(13, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:45:12', ''),
(14, 75, 128, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'NUEVA\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA RICCY\', FECHA = \'2021-08-17 21:32:00\',FECHA_VENCIMIENTO = \'2021-09-18 23:34:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 1', '2021-08-16 20:45:43', ''),
(15, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:45:43', ''),
(16, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:45:46', ''),
(17, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:46:12', ''),
(18, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:49:38', ''),
(19, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:49:45', ''),
(20, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:49:46', ''),
(21, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:49:50', ''),
(22, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:55:24', ''),
(23, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:55:28', ''),
(24, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:55:35', ''),
(25, 75, 128, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'NUEVA\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA RICCY\', FECHA = \'2021-08-17 21:32:00\',FECHA_VENCIMIENTO = \'2021-09-18 23:34:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 1', '2021-08-16 20:55:45', ''),
(26, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:55:46', ''),
(27, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-16 20:55:49', ''),
(28, 75, 128, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-16 20:56:46', ''),
(29, 75, 128, 'INGRESO', 'A CREAR NOTIFICACIÓN', '2021-08-16 21:02:30', ''),
(30, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 11:01:34', ''),
(31, 75, 16, 'INGRESO', 'A GESTIÓN DE SEGMENTOS ', '2021-08-17 11:01:45', ''),
(32, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:01:55', ''),
(33, 75, 128, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-17 11:02:09', ''),
(34, 75, 128, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-17 11:04:13', ''),
(35, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:04:31', ''),
(36, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:05:20', ''),
(37, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:07:24', ''),
(38, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:08:22', ''),
(39, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:08:52', ''),
(40, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:09:21', ''),
(41, 75, 2, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-17 11:11:57', ''),
(42, 75, 127, 'INGRESO', 'MANTENIMIENTO TIPO RECURSO ', '2021-08-17 11:12:01', ''),
(43, 75, 128, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-17 11:12:12', ''),
(44, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:00:56', ''),
(45, 75, 11, 'INGRESO', 'A CREAR PARÁMETROS', '2021-08-17 21:01:00', ''),
(46, 75, 12, 'INSERTO', 'INSERT INTO TBL_MOVIL_PARAMETROS (PARAMETRO,DESCRIPCION,VALOR,FECHA_MODIFICACION,CREADO_POR) VALUES (\'NUEVO PARAMETRO\', \'CATEGORIA NUEVA\', \'42\',SYSDATE(),\'IROMERO\')', '2021-08-17 21:01:17', ''),
(47, 75, 12, 'INSERTO', 'INSERT INTO TBL_MOVIL_PARAMETROS (PARAMETRO,DESCRIPCION,VALOR,FECHA_MODIFICACION,CREADO_POR,MODIFICADO_POR) VALUES (\'NUEVO PARAMETRO\', \'CATEGORIA NUEVA\', \'42\',SYSDATE(),\'IROMERO\',NULL)', '2021-08-17 21:06:43', ''),
(48, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:06:43', ''),
(49, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:06:48', ''),
(50, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:07:14', ''),
(51, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:08:36', ''),
(52, 75, 11, 'INGRESO', 'A CREAR PARÁMETROS', '2021-08-17 21:08:38', ''),
(53, 75, 12, 'INSERTO', 'INSERT INTO TBL_MOVIL_PARAMETROS (PARAMETRO,DESCRIPCION,VALOR,FECHA_MODIFICACION,CREADO_POR,MODIFICADO_POR) VALUES (\'PRUEBAS\', \'CATEGORIANUEVA\', \'42\',SYSDATE(),\'IROMERO\',1)', '2021-08-17 21:08:43', ''),
(54, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:08:43', ''),
(55, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:08:47', ''),
(56, 75, 12, 'INGRESO', 'A GESTIÓN DE PARAMETROS ', '2021-08-17 21:23:40', ''),
(57, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 21:23:49', ''),
(58, 75, 128, 'INGRESO', 'A CREAR NOTIFICACIÓN', '2021-08-17 21:23:52', ''),
(59, 75, 128, 'INGRESO', 'A CREAR NOTIFICACIÓN', '2021-08-17 21:26:15', ''),
(60, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 21:26:16', ''),
(61, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 21:26:24', ''),
(62, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:20:42', ''),
(63, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:22:50', ''),
(64, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:23:44', ''),
(65, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:23:56', ''),
(66, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:25:49', ''),
(67, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:29:13', ''),
(68, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:29:31', ''),
(69, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:31:17', ''),
(70, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:31:31', ''),
(71, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:40:07', ''),
(72, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:41:42', ''),
(73, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:43:42', ''),
(74, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:44:19', ''),
(75, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:45:11', ''),
(76, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:45:18', ''),
(77, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:45:29', ''),
(78, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:45:48', ''),
(79, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:47:30', ''),
(80, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:48:11', ''),
(81, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:49:05', ''),
(82, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:51:09', ''),
(83, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:51:27', ''),
(84, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:51:48', ''),
(85, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 22:52:04', ''),
(86, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:08:05', ''),
(87, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:08:27', ''),
(88, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:11:18', ''),
(89, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:11:28', ''),
(90, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:20:03', ''),
(91, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:20:53', ''),
(92, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:21:04', ''),
(93, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:22:43', ''),
(94, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:22:52', ''),
(95, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:23:40', ''),
(96, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:23:56', ''),
(97, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:24:35', ''),
(98, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:24:43', ''),
(99, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:25:05', ''),
(100, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:25:20', ''),
(101, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:26:21', ''),
(102, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:27:40', ''),
(103, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:32:42', ''),
(104, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:34:48', ''),
(105, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:36:52', ''),
(106, 75, 127, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTIFICACIONES SET TITULO = \'PRUEBA NOTIFICACION\', DESCRIPCION = \'NUEVA NOTIFICACION\', FECHA = \'2021-08-18 05:24:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1, TIPO_NOTIFICACION_ID = 1, IMAGE_URL =  WHERE ID = 1', '2021-08-17 23:37:09', ''),
(107, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:38:57', ''),
(108, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:39:00', ''),
(109, 75, 127, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTIFICACIONES SET TITULO = \'PRUEBA NOTIFICACION\', DESCRIPCION = \'NUEVA NOTIFICACION\', FECHA = \'2021-08-18 05:24:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1, TIPO_NOTIFICACION_ID = 1, IMAGE_URL = HTTPS://APIAPPINFOMATICA.000WEBHOSTAPP.COM/A', '2021-08-17 23:39:20', ''),
(110, 75, 127, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTIFICACIONES SET TITULO = \'PRUEBA NOTIFICACION\', DESCRIPCION = \'NUEVA NOTIFICACION\', FECHA = \'2021-08-18 05:24:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1, TIPO_NOTIFICACION_ID = 1, IMAGE_URL = HTTPS://APIAPPINFOMATICA.000WEBHOSTAPP.COM/A', '2021-08-17 23:39:57', ''),
(111, 75, 127, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTIFICACIONES SET TITULO = \'PRUEBA NOTIFICACION\', DESCRIPCION = \'NUEVA NOTIFICACION\', FECHA = \'2021-08-18 05:24:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1, TIPO_NOTIFICACION_ID = 1, IMAGE_URL = HTTPS://APIAPPINFOMATICA.000WEBHOSTAPP.COM/A', '2021-08-17 23:41:20', ''),
(112, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:42:37', ''),
(113, 75, 127, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTIFICACIONES SET TITULO = \'PRUEBA NOTIFICACION\', DESCRIPCION = \'NUEVA NOTIFICACION\', FECHA = \'2021-08-18 05:24:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1, TIPO_NOTIFICACION_ID = 1, IMAGE_URL =  WHERE ID = 1', '2021-08-17 23:42:41', ''),
(114, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-17 23:45:38', ''),
(115, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:08:01', ''),
(116, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:08:09', ''),
(117, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:08:20', ''),
(118, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:08:46', ''),
(119, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:09:05', ''),
(120, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:09:11', ''),
(121, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:13:01', ''),
(122, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:13:07', ''),
(123, 75, 127, 'MODIFICO', 'INSERT INTO TBL_MOVIL_TRANSACCIONES VALUES (NULL,SYSDATE(),\'ENVIO DE NOTIFICACIONES\',\'NO SE ENCONTRARON DATOS\',\'COMPLETADA\')', '2021-08-18 00:13:18', ''),
(124, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:13:18', ''),
(125, 75, 14, 'INGRESO', 'GESTION DE TRANSACCIONES', '2021-08-18 00:13:36', ''),
(126, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:15:02', ''),
(127, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:15:11', ''),
(128, 75, 127, 'MODIFICO', 'INSERT INTO TBL_MOVIL_TRANSACCIONES VALUES (NULL,SYSDATE(),\'ENVIO DE NOTIFICACIONES\',\'NO SE ENCONTRARON DATOS\',\'COMPLETADA\')', '2021-08-18 00:16:44', ''),
(129, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:16:44', ''),
(130, 75, 14, 'INGRESO', 'GESTION DE TRANSACCIONES', '2021-08-18 00:17:01', ''),
(131, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:17:11', ''),
(132, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:17:19', ''),
(133, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:18:39', ''),
(134, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:19:10', ''),
(135, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:19:45', ''),
(136, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:19:58', ''),
(137, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:34:50', ''),
(138, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:35:45', ''),
(139, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:36:30', ''),
(140, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:37:00', ''),
(141, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:37:32', ''),
(142, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:37:46', ''),
(143, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:39:11', ''),
(144, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:39:32', ''),
(145, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:40:03', ''),
(146, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:40:33', ''),
(147, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:42:23', ''),
(148, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:42:29', ''),
(149, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:43:03', ''),
(150, 75, 123, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 00:44:31', ''),
(151, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:12:25', ''),
(152, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:12:43', ''),
(153, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:17:05', ''),
(154, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:18:03', ''),
(155, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:19:30', ''),
(156, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:19:52', ''),
(157, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:22:07', ''),
(158, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:22:38', ''),
(159, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:23:00', ''),
(160, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:24:32', ''),
(161, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:24:58', ''),
(162, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-18 16:25:41', ''),
(163, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-18 16:29:56', ''),
(164, 75, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-18 16:36:35', ''),
(165, 75, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-18 16:36:38', ''),
(166, 75, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-18 16:36:42', ''),
(167, 75, 180, 'INGRESO', 'A MENU NOTICIAS', '2021-08-18 16:36:47', ''),
(168, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-18 16:36:49', ''),
(169, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-18 16:36:52', ''),
(170, 75, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-18 16:37:00', ''),
(171, 75, 175, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-18 16:37:02', ''),
(172, 75, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-18 16:37:05', ''),
(173, 75, 174, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-18 16:37:09', ''),
(174, 75, 166, 'INGRESO', 'A CREAR TIPO MENSAJE', '2021-08-18 16:37:14', ''),
(175, 75, 128, 'INSERTO', 'INSERT into tbl_movil_tipo_mensajes (id,tipo_mensaje) VALUES (null,\'MENSAJE\')', '2021-08-18 16:37:19', ''),
(176, 75, 174, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-18 16:37:19', ''),
(177, 75, 174, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-18 16:37:23', ''),
(178, 75, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-18 16:37:26', ''),
(179, 75, 176, 'INGRESO', 'MANTENIMIENTO TIPO RECURSO ', '2021-08-18 16:37:27', ''),
(180, 75, 176, 'INGRESO', 'MANTENIMIENTO TIPO RECURSO ', '2021-08-18 16:37:39', ''),
(181, 75, 178, 'INGRESO', 'A MENU GESTION', '2021-08-18 16:38:56', ''),
(182, 75, 172, 'INGRESO', 'GESTION DE TRANSACCIONES', '2021-08-18 16:38:58', ''),
(183, 1, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-22 01:10:48', ''),
(184, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 01:10:50', ''),
(185, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 01:24:03', ''),
(186, 1, 163, 'INGRESO', 'A CREAR NOTIFICACIÓN', '2021-08-22 01:24:10', ''),
(187, 1, 163, 'INGRESO', 'A CREAR NOTIFICACIÓN', '2021-08-22 01:36:49', ''),
(188, 1, 169, 'INSERTO', 'INSERT INTO TBL_MOVIL_NOTIFICACIONES  VALUES (NULL,\'PRUEBAS INFORMATICAS\',\'PRUEBAS\',\'2021-08-22 02:40:00\',\'ADMIN\',1,1,\'\')', '2021-08-22 01:41:03', ''),
(189, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 01:41:04', ''),
(190, 1, 180, 'INGRESO', 'A MENU NOTICIAS', '2021-08-22 01:41:15', ''),
(191, 1, 162, 'INGRESO', 'A CREAR NOTICIA', '2021-08-22 01:41:17', ''),
(192, 1, 168, 'INSERTO', 'INSERT INTO TBL_MOVIL_NOTICIAS (TITULO,SUBTITULO,DESCRIPCION,FECHA,FECHA_VENCIMIENTO,REMITENTE,SEGMENTO_ID) VALUES (\'PRUEBAS INFORMATICAS\',\'SEGUNDO PARCIAL\',\'HOLA MUNDO AJAS\',\'2021-08-23 02:44:00\',\'2021-09-23 01:43:00\',\'ADMIN\',1)', '2021-08-22 01:44:01', ''),
(193, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:44:02', ''),
(194, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:44:11', ''),
(195, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:56:45', ''),
(196, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:56:50', ''),
(197, 1, 168, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'PRUEBAS INFORMATICAS\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA MUNDO AJAS\', FECHA = \'2021-08-23 02:44:00\',FECHA_VENCIMIENTO = \'2021-09-23 01:43:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 2', '2021-08-22 01:56:53', ''),
(198, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:56:53', ''),
(199, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:13', ''),
(200, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:16', ''),
(201, 1, 168, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'PRUEBAS INFORMATICAS\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA MUNDO AJAS\', FECHA = \'2021-08-23 02:44:00\',FECHA_VENCIMIENTO = \'2021-09-23 01:43:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 2', '2021-08-22 01:59:21', ''),
(202, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:22', ''),
(203, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:24', ''),
(204, 1, 168, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'PRUEBAS INFORMATICAS\', SUBTITULO = \'SEGUNDO PARCIAL\', DESCRIPCION = \'HOLA MUND\', FECHA = \'2021-08-23 02:44:00\',FECHA_VENCIMIENTO = \'2021-09-23 01:43:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 2', '2021-08-22 01:59:31', ''),
(205, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:32', ''),
(206, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:35', ''),
(207, 1, 168, 'MODIFICO', 'UPDATE TBL_MOVIL_NOTICIAS SET TITULO = \'PRUBEAS\', SUBTITULO = \'HOLA\', DESCRIPCION = \'HOLA MUND\', FECHA = \'2021-08-23 02:44:00\',FECHA_VENCIMIENTO = \'2021-09-23 01:43:00\', REMITENTE = \'ADMIN\', SEGMENTO_ID = 1 WHERE ID = 2', '2021-08-22 01:59:45', ''),
(208, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 01:59:45', ''),
(209, 1, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-22 01:59:51', ''),
(210, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 01:59:52', ''),
(211, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 02:02:47', ''),
(212, 1, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-22 11:33:50', ''),
(213, 1, 176, 'INGRESO', 'MANTENIMIENTO TIPO RECURSO ', '2021-08-22 11:34:03', ''),
(214, 1, 176, 'INGRESO', 'MANTENIMIENTO TIPO RECURSO ', '2021-08-22 11:38:12', ''),
(215, 1, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-22 11:38:18', ''),
(216, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 11:38:20', ''),
(217, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 11:43:07', ''),
(218, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 11:45:36', ''),
(219, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 11:46:05', ''),
(220, 1, 169, 'INGRESO', 'A GESTIÓN DE NOTIFICACIONES ', '2021-08-22 11:47:09', ''),
(221, 1, 181, 'INGRESO', 'A MENU NOTIFICACIONES', '2021-08-22 12:13:45', ''),
(222, 1, 180, 'INGRESO', 'A MENU NOTICIAS', '2021-08-22 12:13:49', ''),
(223, 1, 168, 'INGRESO', 'A GESTIÓN DE NOTICIAS ', '2021-08-22 12:13:51', ''),
(224, 1, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-22 12:13:56', ''),
(225, 1, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-22 12:16:58', ''),
(226, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-22 12:17:12', ''),
(227, 75, 161, 'INGRESO', 'A LA VISTA DEL CHAT ', '2021-08-22 12:18:20', ''),
(228, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:18:33', ''),
(229, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:19:19', ''),
(230, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:19:48', ''),
(231, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:20:03', ''),
(232, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:20:29', ''),
(233, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:21:10', ''),
(234, 75, 160, 'INGRESO', 'A BITÁCORA DEL SISTEMA MÓVIL', '2021-08-22 12:21:19', ''),
(235, 75, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-22 12:22:36', ''),
(236, 75, 175, 'INGRESO', 'MANTENIMIENTO TIPO NOTIFICACIÓN', '2021-08-22 12:22:39', ''),
(237, 75, 179, 'INGRESO', 'A MENU MANTENIMIENTO ', '2021-08-22 12:23:25', ''),
(238, 75, 174, 'INGRESO', 'MANTENIMIENTO TIPO MENSAJE', '2021-08-22 12:23:27', ''),
(239, 75, 178, 'INGRESO', 'A MENU GESTION', '2021-08-22 12:23:31', ''),
(240, 75, 171, 'INGRESO', 'A GESTIÓN DE SEGMENTOS ', '2021-08-22 12:23:33', ''),
(241, 75, 173, 'Ingreso', 'A llenar Segmento', '2021-08-22 12:23:39', ''),
(242, 75, 171, 'INGRESO', 'A GESTIÓN DE SEGMENTOS ', '2021-08-22 12:24:24', ''),
(243, 75, 178, 'INGRESO', 'A MENU GESTION', '2021-08-22 12:24:29', ''),
(244, 75, 172, 'INGRESO', 'GESTION DE TRANSACCIONES', '2021-08-22 12:24:30', ''),
(245, 75, 172, 'INGRESO', 'GESTION DE TRANSACCIONES', '2021-08-22 13:09:52', '');

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

--
-- Volcado de datos para la tabla `tbl_movil_mensajes_chat`
--

INSERT INTO `tbl_movil_mensajes_chat` (`id_mensaje`, `id_session_chat`, `id_usuario`, `mensaje`, `flag_lectura`, `tipo_mensaje`, `fecha`) VALUES
(1, 1, 1, 'hola', 0, 1, '2021-08-18 16:12:35');

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

--
-- Volcado de datos para la tabla `tbl_movil_noticias`
--

INSERT INTO `tbl_movil_noticias` (`id`, `titulo`, `subtitulo`, `descripcion`, `fecha`, `fecha_vencimiento`, `remitente`, `segmento_id`) VALUES
(1, 'NUEVA', 'SEGUNDO PARCIAL', 'hola riccy', '2021-08-17 21:32:00', '2021-09-18 23:34:00', 'ADMIN', 1),
(2, 'Prubeas', 'Hola', 'hola mund', '2021-08-23 02:44:00', '2021-09-23 01:43:00', 'ADMIN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_noticia_recurso`
--

CREATE TABLE `tbl_movil_noticia_recurso` (
  `noticia_id` bigint(20) NOT NULL,
  `recurso_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_noticia_recurso`
--

INSERT INTO `tbl_movil_noticia_recurso` (`noticia_id`, `recurso_id`) VALUES
(1, 2),
(1, 1);

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
  `image_url` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_notificaciones`
--

INSERT INTO `tbl_movil_notificaciones` (`id`, `titulo`, `descripcion`, `fecha`, `remitente`, `segmento_id`, `tipo_notificacion_id`, `image_url`, `estado`) VALUES
(1, 'PRUEBA NOTIFICACION', 'NUEVA NOTIFICACION', '2021-08-18 05:24:00', 'ADMIN', 1, 1, 'https://apiappinfomatica.000webhostapp.com/archivos/movil/notificacion/chat v1.0.PNG', 1),
(2, 'Pruebas informaticas', 'Pruebas', '2021-08-22 02:40:00', 'ADMIN', 1, 1, '', 0);

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

--
-- Volcado de datos para la tabla `tbl_movil_parametros`
--

INSERT INTO `tbl_movil_parametros` (`id`, `parametro`, `descripcion`, `valor`, `fecha_modificacion`, `creado_por`, `modificado_por`) VALUES
(4, 'NUEVO PARAMETRO', 'CATEGORIA NUEVA', '42', '2021-08-17 21:06:42', 'IROMERO', NULL),
(5, 'PRUEBAS', 'CATEGORIANUEVA', '42', '2021-08-17 21:08:43', 'IROMERO', 1);

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

--
-- Volcado de datos para la tabla `tbl_movil_segmentos`
--

INSERT INTO `tbl_movil_segmentos` (`id`, `nombre`, `descripcion`, `creado_por`, `fecha_creacion`) VALUES
(1, 'EXAMEN', 'METODOS', '75', '2021-08-16 20:28:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_segmento_usuario`
--

CREATE TABLE `tbl_movil_segmento_usuario` (
  `usuario_id` bigint(20) NOT NULL,
  `segmento_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_segmento_usuario`
--

INSERT INTO `tbl_movil_segmento_usuario` (`usuario_id`, `segmento_id`) VALUES
(59, 1),
(55, 1),
(53, 1),
(74, 1),
(75, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_session_chats`
--

CREATE TABLE `tbl_movil_session_chats` (
  `id_session_chat` bigint(20) NOT NULL,
  `id_usuario1` bigint(20) NOT NULL,
  `id_usuario2` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_session_chats`
--

INSERT INTO `tbl_movil_session_chats` (`id_session_chat`, `id_usuario1`, `id_usuario2`) VALUES
(1, 1, 1),
(2, 1, 55),
(3, 1, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movil_tipo_mensajes`
--

CREATE TABLE `tbl_movil_tipo_mensajes` (
  `id` int(11) NOT NULL,
  `tipo_mensaje` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_movil_tipo_mensajes`
--

INSERT INTO `tbl_movil_tipo_mensajes` (`id`, `tipo_mensaje`) VALUES
(1, 'mensaje normal'),
(2, 'mensaje audio');

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

--
-- Volcado de datos para la tabla `tbl_movil_tipo_recursos`
--

INSERT INTO `tbl_movil_tipo_recursos` (`id`, `descripcion`, `url`) VALUES
(1, 'archivo subido desde crear noticia', '../archivos/movil/4.png'),
(2, 'archivo subido desde crear noticia', '../archivos/movil/3.png');

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

--
-- Volcado de datos para la tabla `tbl_movil_transacciones`
--

INSERT INTO `tbl_movil_transacciones` (`id`, `fecha_envio`, `request_envio`, `response`, `estado`) VALUES
(1, '2021-08-18 00:13:18', 'envio de notificaciones', 'No se encontraron datos', 'completada'),
(2, '2021-08-18 00:16:44', 'envio de notificaciones', 'No se encontraron datos', 'completada'),
(3, '2021-08-22 01:41:04', 'envio de notificaciones', 'Error con las variables enviadas a la API RES', 'completada');

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
(1, 'Creación de preguntas ', 'Creacion de preguntas de seguridad'),
(2, 'Gestión de preguntas ', 'Gestionar las preguntas de seguridad'),
(3, 'Registro de usuario', 'Registrar los usuarios del sistema'),
(4, 'Gestión de usuario', 'Gestionar los usuarios'),
(5, 'Creación  de roles', 'Crear de roles'),
(6, 'Gestión de roles', 'Gestionar los roles'),
(7, 'Gestión de parámetros ', 'Gestionar los parámetros '),
(8, 'Bitácora ', 'Bitacora del sistema'),
(9, 'Creación de permisos a usuarios', 'Dar permisos a los roles de los usuarios'),
(10, 'Gestión de permisos a usuarios', 'Gestionar permisos a usuarios'),
(11, 'Gestión de respuestas de preguntas de seguridad', 'Gestionar las respuestas de preguntas de seguridad'),
(12, 'Cambiar contraseña\r\n', 'Cambiar contraseña dentro del sistema'),
(13, 'Inscripción para charla PPS', 'Inscripción de los estudiantes para charla de pps'),
(14, 'Gestión de asistencia a charla PPS', 'Gestión de asistencia a charla de PPS'),
(15, 'Registro de clases aprobadas', 'Registro de clases aprobadas para constancia'),
(16, 'Gestión de clases aprobadas', 'Gestión de clases aprobadas'),
(17, 'Registro de datos de empresa', 'Registro de datos de empresa por PPS'),
(18, 'Historial de constancias y/o cartas', 'Historial de constancias y/o cartas'),
(19, 'Entrega de documentación ', 'Documentación de PPS'),
(20, 'Recepción/supervisión de documentos', 'Recepción/supervisión de documentos de PPS'),
(21, 'Aprobación/rechazo de PPS', 'Aprobación/rechazo de PPS'),
(22, 'Registro de egresados', 'Registro de egresados de IA'),
(23, 'Gestión de egresados', 'Gestion de egresados de IA'),
(24, 'Registro de proyectos', 'Registro de proyectos vinculación universidad sociedad'),
(25, 'Gestión de proyectos', 'Gestion de proyectos vinculación universidad sociedad'),
(26, 'Supervisar documentación de PPS', 'Comite de vinculación supervisa documentacion de PPS'),
(27, 'Historial de prácticas aprobadas', 'Historial de prácticas aprobadas'),
(28, 'Historial de prácticas rechazadas', 'Historial de prácticas rechazadas'),
(29, 'Solicitud de finalización de práctica', 'Solicitud de finalización de práctica alumno'),
(30, 'Cambio de carrera', 'Solicitud cambio de carrera alumno'),
(31, 'Carta de egresado', 'Solicitud carta de egresado'),
(32, 'Equivalencias', 'Solicitud de equivalencias'),
(33, 'Cancelación de clases', 'Solicitud de cancelacion de clases'),
(34, 'Revisión de finalización de PPS ', 'Coordinador revision finalizacion practica'),
(35, 'Revisión de cambio carrera', 'Coordinador revision cambio carrera'),
(36, 'Revisión de carta egresado', 'Coordinador revision carta egresado'),
(37, 'Revisión de equivalencias', 'Coordinador revision equivalencias'),
(38, 'Revisión de cancelacion de clases', 'Coordinador revision cancelacion de clases'),
(39, 'Solicitud de PPS', 'Solicitud de pp1 y pps2'),
(40, 'Menú de solicitud de PPS ', 'Menú de solicitud de pps'),
(41, 'Creación de asignaturas ', 'Crear asignaturas'),
(42, 'Gestión de asignaturas', 'Gestionar asignaturas'),
(43, 'Solicitud de examen del himno', 'Solicitud para la realizacion del examnen del himno'),
(44, 'Revisión de alumnos himno', 'Revisión de coordinación de los alumnos disponibles para realizar el examen del himno'),
(45, 'Menú de carga académica ', 'Creacion de carga académica '),
(46, 'Creación de carga académica ', 'Generar carga académica '),
(47, 'Gestión de carga académica ', 'Editar carga académica '),
(48, 'Historial de carga académica ', 'Control y revision de la carga académica '),
(49, 'Menú de docentes', 'Creacion de registro docentes'),
(50, 'Registro de  docentes', 'Crear nuevos docentes'),
(51, 'Gestión de docentes', 'Gestionar docentes'),
(52, 'Comisiones y actividades docentes', 'Agregar comisiones y actividades'),
(53, 'Reporte carga academica docentes', 'Mostrar reporte carga academica docentes'),
(54, 'Perfil docentes', 'Mostrar perfil docentes'),
(55, 'Mantenimiento periodo', 'Mantenimiento gestion periodo'),
(56, 'Mantenimiento jornadas docente', 'Mantenimiento gestion jornadas'),
(57, 'Mantenimiento comisiones docente', 'Mantenimiento gestion comisiones'),
(58, 'Mantenimiento edificio', 'Mantenimiento gestion edificios'),
(59, 'Mantenimiento categorías ', 'Mantenimiento gestion categorias'),
(60, 'Mantenimiento aulas', 'Mantenimiento gestion aulas'),
(61, 'Mantenimiento grados académicos ', 'Mantenimiento gestion grados academicos'),
(62, 'Mantenimiento estado civil', 'Mantenimiento gestion estados civil'),
(63, 'Mantenimiento crear periodo', 'Mantenimiento crear nuevo periodo'),
(64, 'Mantenimiento crear comisiones', 'Mantenimiento crear comisiones'),
(65, 'Mantenimiento crear grados', 'Mantenimiento crear grados academicos'),
(66, 'Mantenimiento crear categorías ', 'Mantenimiento crear categorias docentes'),
(67, 'Mantenimiento crear jornadas', 'Mantenimiento crear jornadas'),
(68, 'Mantenimiento crear estado civil', 'Mantenimiento crear estado civil'),
(69, 'Menú supervisión vista', 'Menú para gestionar las supervisiones'),
(70, 'Menú mantenimientos', 'Menú para todos los mantenimientos existentes'),
(71, 'Menú ayuda', 'Menú los manuales de usuario'),
(72, 'Menú vinculación ', 'Menú de vinculacion'),
(73, 'Mantenimiento crear genero', 'Mantenimiento crear genero'),
(74, 'Mantenimiento actividades', 'Mantenimiento gestion actividades'),
(75, 'Mantenimiento crear actividades', 'Mantenimiento crear actividades'),
(76, 'Mantenimiento crear departamento', 'Mantenimiento crear departamento'),
(77, 'Mantenimiento departamento', 'Mantenimiento gestion departamento'),
(78, 'Mantenimiento crear municipio', 'Mantenimiento crear municipio'),
(79, 'Mantenimiento municipio', 'Mantenimiento gestion municipio'),
(80, 'Mantenimiento atributos', 'Mantenimiento gestion atributos'),
(81, 'Mantenimiento crear atributos', 'Mantenimiento crear atributos'),
(82, 'Mantenimiento crear aula', 'Mantenimiento crear aulas'),
(83, 'Mantenimiento crear edificios', 'Mantenimiento crear edificios'),
(84, 'Mantenimiento genero', 'Mantenimiento gestion genero'),
(85, 'Mantenimiento horario', 'Mantenimiento gestion horario'),
(86, 'Mantenimiento crear horario', 'Mantenimiento crear horario'),
(87, 'Menú práctica profesional', 'Menú para solicitar pps'),
(88, 'Mantenimiento crear carrera', 'Crear carrera'),
(89, 'Mantenimiento carrera', 'Gestionar carrera'),
(90, 'Mantenimiento nacionalidad', 'Mantenimiento gestion nacionalidad'),
(91, 'Mantenimiento crear nacionalidad', 'Mantenimiento crear nacionalidad'),
(92, 'Mantenimiento feriados', 'Mantenimiento de días feriados'),
(93, 'Mantenimiento áreas asignaturas', 'Mantenimiento áreas asignaturas'),
(94, 'Menu mantenimientos Carga', 'Menu mantenimientos Carga'),
(95, 'Menu mantenimiento plan de estudios', 'Menu mantenimientos plan'),
(96, 'Crear plan de estudio', 'Crear plan de estudio'),
(97, 'Historial plan de estudio', 'Historial plan de estudio'),
(98, 'Gestion plan de estudio', 'Gestion plan de estudio'),
(99, 'Mantenimiento crear periodo plan', 'Mantenimiento crear periodo plan'),
(100, 'Mantenimiento periodo plan', 'Mantenimiento periodo plan'),
(101, 'Mantenimiento crear tipo plan', 'Mantenimiento crear tipo plan'),
(102, 'Mantenimiento tipo plan', 'Mantenimiento tipo plan'),
(103, 'Menu plan de estudio', 'Menu plan de estudio'),
(104, 'menu uno', 'menu uno'),
(105, 'menu dos', 'menu dos'),
(106, 'crear', 'crear'),
(107, 'gestion', 'gestion'),
(109, 'crear_registro', 'crear_registro'),
(110, 'gestion_usuario', 'gestion_usuario'),
(111, 'menu implementacion', 'menu imple'),
(112, 'prueba1', 'prueba1'),
(113, 'prueba2', 'prueba2'),
(114, 'menu estudiantes', 'menu estudiantes'),
(115, 'crear estudiantes', 'crear estudiantes'),
(116, 'gestion estudiantes', 'gestion estudiantes'),
(117, 'historial estudiantes', 'historial estudiantes'),
(118, 'g_cargajefatura', 'g_cargajefatura'),
(119, 'g_reasignacionjefatura', 'g_reasignacionjefatura'),
(120, 'g_planificacionjefatura', 'g_planificacionjefatura'),
(121, 'jefatura', 'jefatura'),
(122, 'crear_notificacion_vista', 'creacion de notificaciones'),
(123, 'gestion_notificaciones_vista', 'gestionar notificaciones'),
(124, 'crear_noticia_vista', 'creacion de noticias'),
(125, 'gestion_noticias_vista', 'gestionar noticias'),
(126, 'crear_segmento_vista', 'creacion de nuevos segmentos'),
(127, 'gestion_segmentos_vista', 'gestionar segmentos existentes'),
(128, 'movil_bitacora_vista', 'bitacora movil'),
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
-- Estructura de tabla para la tabla `tbl_parametros`
--

CREATE TABLE `tbl_parametros` (
  `Id_parametro` bigint(20) NOT NULL,
  `Id_usuario` bigint(20) NOT NULL,
  `Parametro` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Valor` varchar(255) NOT NULL,
  `Modificado_por` varchar(255) NOT NULL,
  `Fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parametros`
--

INSERT INTO `tbl_parametros` (`Id_parametro`, `Id_usuario`, `Parametro`, `Descripcion`, `Valor`, `Modificado_por`, `Fecha_modificacion`) VALUES
(1, 1, 'INTENTOS', 'INTENTOS SESIONES', '3', ' ADMIN', '2021-02-11 17:41:37'),
(2, 1, 'Tamano_min_clave', 'TAMANO MINIMO DE LA CLAVE', '8', 'ADMIN', '2020-05-11 00:00:00'),
(4, 1, 'Cantidad_preguntas', 'PREGUNTAS INGRESADAS', '3', 'ADMIN', '2020-05-11 00:00:00'),
(5, 1, 'Tamano_max_clave', 'TAMANO MAXIMO DE CLAVE', '10', 'ADMIN', '2020-05-11 00:00:00'),
(6, 1, 'Tamano_clave_correo', 'TAMANO POR EL CORREO', '8', 'ADMIN', '2020-05-11 00:00:00'),
(7, 1, 'CAMBIO_CLAVE', 'TIEMPO PARA CAMBIAR CLAVE', '30', 'ADMIN', '2020-05-11 00:00:00'),
(8, 1, 'correo_institucional', 'CORREO DE LA EMPRESA', 'ainformatica2020@gmail.com', ' ADMIN', '2020-05-23 23:53:27'),
(9, 1, 'clave_correo', 'CLAVE DEL CORREO', 'Mumu123*', ' ADMIN', '2020-05-23 23:54:16'),
(10, 1, 'Puerto', 'PUERTO DEL GMAIL', '465', 'admin', '2020-05-12 00:00:00'),
(11, 1, 'HOST_SMTP', 'HOST DEL SERVIDOR', 'smtp.gmail.com', 'admin', '2020-05-11 00:00:00'),
(12, 1, 'Admin_correo', 'PERSONA QUE ADMINISTRA EL CORRE', 'Comite de Automatizacion ', ' ADMIN', '2021-05-29 04:48:34'),
(13, 1, 'AUTO_REGISTRO', 'AUTO REGISTRO USUARIO', '1', ' ADMIN', '2021-04-14 01:51:29'),
(16, 1, 'DOCENTE_VINCULACION_MATUTINA_1', 'DOCENTE ENCARGADO DE CHARLA', 'MSC. SANDRA QUAN ', 'ADMIN', '2020-06-04 17:49:38'),
(17, 1, 'DOCENTE_VINCULACION_MATUTINA_2', 'DOCENTE ENCARGADO DE CHARLA', 'MSC. ANGELICA MUÑOZ', ' ADMIN', '2020-08-11 06:08:06'),
(18, 1, 'DOCENTE_VINCULACION_VESPERTINA_1', 'DOCENTE ENCARGADO DE CHARLA', 'MSC. CAROLD RITHENHOUSE', 'ADMIN', '2020-06-04 00:00:00'),
(20, 1, 'DOCENTE_VINCULACION_VESPERTINA_2', 'DOCENTE ENCARGADO DE CHARLA', 'LIC. JULIAN ', 'ADMIN', '2020-06-04 00:00:00'),
(21, 1, 'DIAS_CHARLA', 'VALIDACION EN DIAS , PARA FECHA VALIDAS PARA CHARLA ', '90', 'ADMIN', '2020-06-04 00:00:00'),
(22, 1, 'CANTIDAD_DOCUMENTOS', 'MÁXIMA CANTIDAD DE DOCUMENTOS DEL PRACTICANTE.', '9', 'ADMIN', '2020-06-04 00:00:00'),
(23, 1, 'mayoria_edad', 'validacion para mayoria edad', '18', 'ADMIN', '2021-03-16 18:35:16'),
(24, 1, 'num_periodo_maximo', 'el maximo de periodos en un año', '3', 'ADMIN', '2021-04-08 10:14:07');

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
(1, 46, 1, '1', '1', '1', '1', NULL, NULL, 'ADMIN', '2021-05-12 05:59:16'),
(2, 46, 2, '1', '1', '1', '1', NULL, NULL, 'admin', '2020-05-22 20:45:26'),
(4, 46, 8, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(5, 46, 3, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(6, 46, 4, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(7, 46, 5, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(8, 46, 6, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(9, 46, 7, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(10, 46, 9, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(11, 46, 10, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(12, 46, 11, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(14, 46, 12, '1', '1', '1', '1', '2020-05-22 22:32:56', ' admin ', NULL, NULL),
(40, 46, 13, '1', '1', '1', '1', '2020-05-28 22:57:35', ' ADMIN ', NULL, NULL),
(41, 46, 14, '1', '1', '1', '1', '2020-05-28 22:57:37', ' ADMIN ', NULL, NULL),
(42, 46, 15, '1', '1', '1', '1', '2020-05-28 22:57:39', ' ADMIN ', NULL, NULL),
(43, 46, 16, '1', '1', '1', '1', '2020-05-28 22:57:41', ' ADMIN ', NULL, NULL),
(44, 46, 17, '1', '1', '1', '1', '2020-05-28 22:57:44', ' ADMIN ', NULL, NULL),
(45, 46, 18, '1', '1', '1', '1', '2020-05-28 22:57:46', ' ADMIN ', NULL, NULL),
(46, 46, 19, '1', '1', '1', '1', '2020-05-28 22:57:48', ' ADMIN ', NULL, NULL),
(47, 46, 20, '1', '1', '1', '1', '2020-05-28 22:57:50', ' ADMIN ', NULL, NULL),
(48, 46, 21, '1', '1', '1', '1', '2020-05-28 22:57:52', ' ADMIN ', NULL, NULL),
(49, 46, 22, '1', '1', '1', '1', '2020-05-28 22:57:54', ' ADMIN ', NULL, NULL),
(50, 46, 23, '1', '1', '1', '1', '2020-05-28 22:57:57', ' ADMIN ', NULL, NULL),
(51, 46, 24, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(52, 46, 25, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(53, 46, 26, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(54, 49, 13, '1', '0', '0', '1', '2020-06-24 23:41:47', ' ADMIN ', NULL, NULL),
(55, 49, 17, '1', '1', '0', '1', '2020-06-24 23:41:51', ' ADMIN ', 'ADMIN', '2021-03-05 23:59:28'),
(56, 49, 19, '1', '0', '0', '1', '2020-06-24 23:41:54', ' ADMIN ', NULL, NULL),
(57, 46, 27, '1', '1', '1', '1', '2020-06-24 23:44:09', ' ADMIN ', NULL, NULL),
(58, 46, 28, '1', '1', '1', '1', '2020-06-24 23:44:12', ' ADMIN ', NULL, NULL),
(59, 46, 29, '1', '1', '1', '1', '2020-07-30 19:32:01', ' ADMIN ', 'ADMIN', '2021-04-14 01:38:03'),
(60, 46, 30, '1', '1', '0', '1', '2020-07-30 19:32:04', ' ADMIN ', NULL, NULL),
(61, 46, 31, '1', '1', '0', '1', '2020-07-30 19:32:07', ' ADMIN ', NULL, NULL),
(62, 46, 32, '1', '1', '0', '1', '2020-07-30 19:32:11', ' ADMIN ', NULL, NULL),
(63, 46, 33, '1', '1', '0', '1', '2020-07-30 19:32:14', ' ADMIN ', NULL, NULL),
(64, 46, 34, '1', '1', '0', '1', '2020-07-30 19:32:17', ' ADMIN ', NULL, NULL),
(65, 46, 35, '1', '1', '0', '1', '2020-07-30 19:32:20', ' ADMIN ', NULL, NULL),
(66, 46, 36, '1', '1', '0', '1', '2020-07-30 19:32:23', ' ADMIN ', NULL, NULL),
(67, 46, 37, '1', '1', '1', '1', '2020-07-30 19:32:26', ' ADMIN ', 'ADMIN', '2021-04-14 01:43:21'),
(68, 46, 38, '1', '1', '1', '1', '2020-07-30 19:32:29', ' ADMIN ', 'ADMIN', '2021-04-14 01:42:40'),
(69, 49, 29, '1', '1', '1', '1', '2020-08-03 10:04:32', ' ADMIN ', NULL, NULL),
(70, 49, 30, '1', '1', '1', '1', '2020-08-03 10:04:32', ' ADMIN ', NULL, NULL),
(71, 49, 31, '1', '1', '1', '1', '2020-08-03 10:04:32', ' ADMIN ', NULL, NULL),
(72, 49, 32, '1', '1', '1', '1', '2020-08-03 10:04:32', ' ADMIN ', NULL, NULL),
(73, 49, 33, '1', '1', '1', '1', '2020-08-03 10:04:32', ' ADMIN ', NULL, NULL),
(74, 51, 13, '0', '0', '0', '1', '2020-08-05 16:46:08', ' ADMIN ', NULL, NULL),
(75, 53, 29, '1', '0', '0', '1', '2020-08-11 06:07:25', ' ADMIN ', 'RCORRALES', '2021-04-04 18:52:13'),
(76, 53, 30, '0', '0', '0', '1', '2020-08-11 06:07:25', ' ADMIN ', NULL, NULL),
(77, 54, 1, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(78, 54, 2, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(79, 54, 3, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(80, 54, 4, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(81, 54, 5, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(82, 54, 6, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(83, 54, 7, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(84, 54, 8, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(85, 54, 9, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(86, 54, 10, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(87, 54, 11, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(88, 54, 12, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(89, 54, 13, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(90, 54, 14, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(91, 54, 15, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(92, 54, 16, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(93, 54, 17, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(94, 54, 18, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(95, 54, 19, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(96, 54, 20, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(97, 54, 21, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(98, 54, 22, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(99, 54, 23, '1', '1', '0', '1', '2020-08-18 22:55:03', ' ADMIN ', NULL, NULL),
(100, 54, 24, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(101, 54, 25, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(102, 54, 26, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(103, 54, 27, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(104, 54, 28, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(105, 54, 29, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(106, 54, 30, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(107, 54, 31, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(108, 54, 32, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(109, 54, 33, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(110, 54, 34, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(111, 54, 35, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(112, 54, 36, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(113, 54, 37, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(114, 54, 38, '1', '1', '0', '1', '2020-08-18 22:55:04', ' ADMIN ', NULL, NULL),
(115, 55, 11, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(116, 55, 12, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(117, 55, 13, '0', '0', '0', '0', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:53:34'),
(118, 55, 14, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:49:30'),
(119, 55, 15, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(120, 55, 16, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(121, 55, 17, '0', '0', '0', '0', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:54:29'),
(122, 55, 18, '0', '0', '0', '0', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:57:35'),
(123, 55, 19, '0', '0', '0', '0', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:56:58'),
(124, 55, 20, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', 'ADMIN', '2021-03-19 15:56:23'),
(125, 55, 21, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(126, 55, 22, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(127, 55, 23, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(128, 55, 24, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(129, 55, 25, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(130, 55, 26, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(131, 55, 27, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(132, 55, 28, '1', '1', '0', '1', '2020-08-18 22:56:43', ' ADMIN ', NULL, NULL),
(133, 56, 11, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(134, 56, 12, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(135, 56, 29, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(136, 56, 30, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(137, 56, 31, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(138, 56, 32, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(139, 56, 33, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(140, 56, 34, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(141, 56, 35, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(142, 56, 36, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(143, 56, 37, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(144, 56, 38, '1', '1', '0', '1', '2020-08-18 22:57:37', ' ADMIN ', NULL, NULL),
(145, 57, 1, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(146, 57, 2, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(147, 57, 3, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(148, 57, 4, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(149, 57, 5, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(150, 57, 6, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(151, 57, 7, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(152, 57, 8, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(153, 57, 9, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(154, 57, 10, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(155, 57, 11, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(156, 57, 12, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(157, 57, 13, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(158, 57, 14, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(159, 57, 15, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(160, 57, 16, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(161, 57, 17, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(162, 57, 18, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(163, 57, 19, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(164, 57, 20, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(165, 57, 21, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(166, 57, 22, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(167, 57, 23, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(168, 57, 24, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(169, 57, 25, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(170, 57, 26, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(171, 57, 27, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(172, 57, 28, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(173, 57, 29, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(174, 57, 30, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(175, 57, 31, '1', '1', '0', '1', '2020-08-18 22:58:42', ' ADMIN ', NULL, NULL),
(176, 57, 32, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(177, 57, 33, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(178, 57, 34, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(179, 57, 35, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(180, 57, 36, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(181, 57, 37, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(182, 57, 38, '1', '1', '0', '1', '2020-08-18 22:58:43', ' ADMIN ', NULL, NULL),
(183, 46, 39, '1', '1', '1', '1', '2020-08-29 02:49:22', ' ADMIN ', NULL, NULL),
(184, 46, 40, '1', '1', '1', '1', '2020-08-29 02:49:22', ' ADMIN ', NULL, NULL),
(185, 46, 41, '1', '1', '1', '1', '2020-08-31 20:18:46', ' ADMIN ', NULL, NULL),
(186, 46, 42, '1', '1', '1', '1', '2020-08-31 20:18:46', ' ADMIN ', NULL, NULL),
(187, 46, 43, '1', '1', '1', '1', '2020-10-19 19:15:21', ' ADMIN ', NULL, NULL),
(188, 46, 44, '1', '1', '1', '1', '2020-10-19 19:15:25', ' ADMIN ', NULL, NULL),
(189, 49, 43, '1', '0', '0', '1', '2020-10-22 19:57:13', ' ADMIN ', NULL, NULL),
(190, 49, 39, '1', '0', '0', '1', '2020-10-27 21:53:44', ' ADMIN ', NULL, NULL),
(191, 49, 40, '1', '0', '0', '1', '2020-10-27 21:53:47', ' ADMIN ', NULL, NULL),
(192, 49, 41, '1', '0', '0', '1', '2020-10-27 21:53:50', ' ADMIN ', NULL, NULL),
(193, 49, 42, '1', '0', '0', '1', '2020-10-27 21:53:53', ' ADMIN ', NULL, NULL),
(194, 49, 15, '1', '0', '0', '1', '2020-10-27 22:04:07', ' ADMIN ', NULL, NULL),
(195, 49, 16, '1', '0', '0', '1', '2020-10-27 22:04:10', ' ADMIN ', NULL, NULL),
(196, 46, 45, '1', '1', '1', '1', '2020-11-02 16:34:35', ' ADMIN ', NULL, NULL),
(197, 46, 46, '1', '1', '1', '1', '2020-11-02 16:34:38', ' ADMIN ', NULL, NULL),
(198, 46, 47, '1', '1', '1', '1', '2020-11-02 16:34:42', ' ADMIN ', NULL, NULL),
(199, 46, 48, '1', '1', '1', '1', '2020-11-02 16:34:45', ' ADMIN ', NULL, NULL),
(200, 46, 49, '1', '1', '1', '1', '2020-11-02 19:42:23', ' ADMIN ', NULL, NULL),
(201, 46, 50, '1', '1', '1', '1', '2020-11-02 19:42:25', ' ADMIN ', 'ADMIN', '2020-11-03 19:47:05'),
(202, 46, 51, '1', '1', '1', '1', '2020-11-02 19:42:26', ' ADMIN ', NULL, NULL),
(203, 46, 52, '1', '1', '1', '1', '2020-11-02 19:42:28', ' ADMIN ', NULL, NULL),
(204, 46, 53, '1', '1', '1', '1', '2020-11-02 19:42:29', ' ADMIN ', NULL, NULL),
(205, 46, 54, '1', '1', '1', '1', '2020-11-02 19:42:31', ' ADMIN ', NULL, NULL),
(206, 46, 55, '1', '1', '1', '1', '2020-11-28 20:11:55', ' ADMIN ', NULL, NULL),
(207, 46, 56, '1', '1', '1', '1', '2020-12-02 00:51:57', ' ADMIN ', NULL, NULL),
(208, 46, 57, '1', '1', '1', '1', '2020-12-02 20:47:09', ' ADMIN ', NULL, NULL),
(209, 46, 58, '1', '1', '1', '1', '2020-12-02 22:27:11', ' ADMIN ', NULL, NULL),
(210, 46, 59, '1', '1', '1', '1', '2020-12-02 22:54:55', ' ADMIN ', NULL, NULL),
(211, 46, 60, '1', '1', '1', '1', '2020-12-02 23:25:41', ' ADMIN ', NULL, NULL),
(212, 46, 61, '1', '1', '1', '1', '2020-12-03 00:24:52', ' ADMIN ', NULL, NULL),
(213, 46, 62, '1', '1', '1', '1', '2020-12-04 22:00:52', ' ADMIN ', NULL, NULL),
(214, 46, 63, '1', '1', '1', '1', '2020-12-05 23:45:34', ' ADMIN ', NULL, NULL),
(215, 46, 64, '1', '1', '1', '1', '2020-12-05 23:45:35', ' ADMIN ', NULL, NULL),
(216, 46, 65, '1', '1', '1', '1', '2020-12-05 23:45:37', ' ADMIN ', NULL, NULL),
(217, 46, 66, '1', '1', '1', '1', '2020-12-05 23:45:38', ' ADMIN ', NULL, NULL),
(218, 46, 67, '1', '1', '1', '1', '2020-12-05 23:45:39', ' ADMIN ', NULL, NULL),
(219, 46, 68, '1', '1', '1', '1', '2020-12-05 23:45:41', ' ADMIN ', NULL, NULL),
(220, 63, 41, '1', '1', '0', '0', '2021-02-11 17:37:47', ' ADMIN ', 'ADMIN', '2021-02-11 17:38:54'),
(221, 49, 18, '1', '0', '0', '1', '2021-03-05 23:07:01', ' ADMIN ', NULL, NULL),
(222, 46, 69, '1', '1', '1', '1', '2021-03-10 22:49:46', ' ADMIN ', NULL, NULL),
(223, 46, 70, '1', '1', '1', '1', '2021-03-11 04:59:42', ' ADMIN ', NULL, NULL),
(224, 46, 72, '1', '1', '1', '1', '2021-03-17 05:58:17', ' ADMIN ', NULL, NULL),
(225, 46, 76, '1', '1', '1', '1', '2021-03-17 18:14:10', ' ADMIN ', NULL, NULL),
(226, 46, 77, '1', '1', '1', '1', '2021-03-17 18:14:12', ' ADMIN ', NULL, NULL),
(227, 46, 78, '1', '1', '1', '1', '2021-03-17 22:51:32', ' ADMIN ', NULL, NULL),
(228, 46, 79, '1', '1', '1', '1', '2021-03-17 22:51:33', ' ADMIN ', NULL, NULL),
(229, 46, 87, '1', '1', '1', '1', '2021-03-18 22:47:32', ' ADMIN ', NULL, NULL),
(230, 46, 88, '1', '1', '1', '1', '2021-03-19 01:45:33', ' ADMIN ', NULL, NULL),
(231, 46, 89, '1', '1', '1', '1', '2021-03-19 01:45:35', ' ADMIN ', NULL, NULL),
(232, 46, 73, '1', '1', '1', '1', '2021-03-19 03:29:43', ' ADMIN ', NULL, NULL),
(233, 46, 74, '1', '1', '1', '1', '2021-03-19 03:29:45', ' ADMIN ', NULL, NULL),
(234, 46, 75, '1', '1', '1', '1', '2021-03-19 03:29:47', ' ADMIN ', NULL, NULL),
(235, 46, 80, '1', '1', '1', '1', '2021-03-19 03:29:49', ' ADMIN ', NULL, NULL),
(236, 46, 81, '1', '1', '1', '1', '2021-03-19 03:29:50', ' ADMIN ', NULL, NULL),
(237, 46, 82, '1', '1', '1', '1', '2021-03-19 03:29:51', ' ADMIN ', NULL, NULL),
(238, 46, 83, '1', '1', '1', '1', '2021-03-19 03:29:53', ' ADMIN ', NULL, NULL),
(239, 46, 84, '1', '1', '1', '1', '2021-03-19 03:29:54', ' ADMIN ', NULL, NULL),
(240, 46, 85, '1', '1', '1', '1', '2021-03-19 03:29:57', ' ADMIN ', NULL, NULL),
(241, 46, 86, '1', '1', '1', '1', '2021-03-19 03:29:58', ' ADMIN ', NULL, NULL),
(242, 46, 90, '1', '1', '1', '1', '2021-03-19 03:30:02', ' ADMIN ', NULL, NULL),
(243, 46, 91, '1', '1', '1', '1', '2021-03-19 03:30:04', ' ADMIN ', NULL, NULL),
(244, 64, 49, '1', '1', '1', '1', '2021-03-23 00:10:57', ' ADMIN ', NULL, NULL),
(245, 64, 50, '0', '0', '0', '0', '2021-03-23 00:10:58', ' ADMIN ', 'ADMIN', '2021-04-08 22:07:18'),
(246, 64, 51, '0', '0', '0', '0', '2021-03-23 00:11:00', ' ADMIN ', 'ADMIN', '2021-04-08 22:03:23'),
(247, 64, 54, '1', '1', '1', '1', '2021-03-23 00:11:01', ' ADMIN ', NULL, NULL),
(248, 65, 24, '1', '0', '0', '1', '2021-04-04 18:53:18', ' RCORRALES ', NULL, NULL),
(249, 65, 51, '0', '1', '0', '0', '2021-04-04 18:57:41', ' RCORRALES ', NULL, NULL),
(250, 46, 92, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(251, 54, 92, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(252, 55, 92, '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(253, 64, 53, '1', '1', '1', '1', '2021-04-08 22:05:20', ' ADMIN ', NULL, NULL),
(254, 46, 93, '1', '1', '1', '1', '2021-04-11 05:32:53', ' ADMIN ', NULL, NULL),
(255, 46, 94, '1', '1', '1', '1', '2021-04-21 08:06:55', ' ADMIN ', NULL, NULL),
(256, 68, 1, '1', '0', '1', '1', '2021-04-23 01:58:16', ' ADMIN ', 'ADMIN', '2021-04-23 02:03:55'),
(257, 68, 3, '1', '1', '0', '1', '2021-04-23 01:58:17', ' ADMIN ', NULL, NULL),
(258, 56, 45, '1', '1', '1', '1', '2021-04-30 19:18:28', ' ADMIN ', NULL, NULL),
(259, 56, 47, '1', '1', '1', '1', '2021-04-30 19:18:29', ' ADMIN ', NULL, NULL),
(260, 56, 48, '1', '1', '1', '1', '2021-04-30 19:18:30', ' ADMIN ', NULL, NULL),
(261, 56, 49, '1', '1', '1', '1', '2021-04-30 19:18:32', ' ADMIN ', NULL, NULL),
(262, 56, 51, '1', '1', '1', '1', '2021-04-30 19:18:34', ' ADMIN ', NULL, NULL),
(263, 56, 55, '1', '1', '1', '1', '2021-04-30 19:18:35', ' ADMIN ', NULL, NULL),
(264, 56, 56, '1', '1', '1', '1', '2021-04-30 19:18:37', ' ADMIN ', NULL, NULL),
(265, 56, 57, '1', '1', '1', '1', '2021-04-30 19:18:38', ' ADMIN ', NULL, NULL),
(266, 56, 58, '1', '1', '1', '1', '2021-04-30 19:18:40', ' ADMIN ', NULL, NULL),
(267, 56, 59, '1', '1', '1', '1', '2021-04-30 19:18:42', ' ADMIN ', NULL, NULL),
(268, 56, 60, '1', '1', '1', '1', '2021-04-30 19:18:43', ' ADMIN ', NULL, NULL),
(269, 56, 61, '1', '1', '1', '1', '2021-04-30 19:18:45', ' ADMIN ', NULL, NULL),
(270, 56, 62, '1', '1', '1', '1', '2021-04-30 19:18:47', ' ADMIN ', NULL, NULL),
(271, 56, 63, '1', '1', '1', '1', '2021-04-30 19:18:49', ' ADMIN ', NULL, NULL),
(272, 56, 64, '1', '1', '1', '1', '2021-04-30 19:18:51', ' ADMIN ', NULL, NULL),
(273, 56, 65, '1', '1', '1', '1', '2021-04-30 19:18:52', ' ADMIN ', NULL, NULL),
(274, 56, 66, '1', '1', '1', '1', '2021-04-30 19:18:53', ' ADMIN ', NULL, NULL),
(275, 56, 67, '1', '1', '1', '1', '2021-04-30 19:18:55', ' ADMIN ', NULL, NULL),
(276, 56, 68, '1', '1', '1', '1', '2021-04-30 19:18:57', ' ADMIN ', NULL, NULL),
(277, 56, 69, '1', '1', '1', '1', '2021-04-30 19:18:59', ' ADMIN ', NULL, NULL),
(278, 56, 70, '1', '1', '1', '1', '2021-04-30 19:19:00', ' ADMIN ', NULL, NULL),
(279, 56, 71, '1', '1', '1', '1', '2021-04-30 19:19:02', ' ADMIN ', NULL, NULL),
(280, 56, 73, '1', '1', '1', '1', '2021-04-30 19:19:04', ' ADMIN ', NULL, NULL),
(281, 56, 74, '1', '1', '1', '1', '2021-04-30 19:19:06', ' ADMIN ', NULL, NULL),
(282, 56, 75, '1', '1', '1', '1', '2021-04-30 19:19:07', ' ADMIN ', NULL, NULL),
(283, 56, 76, '1', '1', '1', '1', '2021-04-30 19:19:09', ' ADMIN ', NULL, NULL),
(284, 56, 77, '1', '1', '1', '1', '2021-04-30 19:19:10', ' ADMIN ', NULL, NULL),
(285, 56, 78, '1', '1', '1', '1', '2021-04-30 19:19:13', ' ADMIN ', NULL, NULL),
(286, 56, 79, '1', '1', '1', '1', '2021-04-30 19:19:15', ' ADMIN ', NULL, NULL),
(287, 56, 80, '1', '1', '1', '1', '2021-04-30 19:19:16', ' ADMIN ', NULL, NULL),
(288, 56, 81, '1', '1', '1', '1', '2021-04-30 19:19:18', ' ADMIN ', NULL, NULL),
(289, 56, 82, '1', '1', '1', '1', '2021-04-30 19:19:21', ' ADMIN ', NULL, NULL),
(290, 56, 83, '1', '1', '1', '1', '2021-04-30 19:19:23', ' ADMIN ', NULL, NULL),
(291, 56, 84, '1', '1', '1', '1', '2021-04-30 19:19:25', ' ADMIN ', NULL, NULL),
(292, 56, 85, '1', '1', '1', '1', '2021-04-30 19:19:26', ' ADMIN ', NULL, NULL),
(293, 56, 86, '1', '1', '1', '1', '2021-04-30 19:19:29', ' ADMIN ', NULL, NULL),
(294, 56, 88, '1', '1', '1', '1', '2021-04-30 19:19:30', ' ADMIN ', NULL, NULL),
(295, 56, 89, '1', '1', '1', '1', '2021-04-30 19:19:32', ' ADMIN ', NULL, NULL),
(296, 56, 90, '1', '1', '1', '1', '2021-04-30 19:19:33', ' ADMIN ', NULL, NULL),
(297, 56, 91, '1', '1', '1', '1', '2021-04-30 19:19:35', ' ADMIN ', NULL, NULL),
(298, 56, 92, '1', '1', '1', '1', '2021-04-30 19:19:37', ' ADMIN ', NULL, NULL),
(299, 56, 93, '1', '1', '1', '1', '2021-04-30 19:19:39', ' ADMIN ', NULL, NULL),
(300, 56, 94, '1', '1', '1', '1', '2021-04-30 19:19:40', ' ADMIN ', NULL, NULL),
(301, 46, 95, '1', '1', '1', '1', '2021-05-28 23:32:08', ' ADMIN ', NULL, NULL),
(302, 46, 99, '1', '1', '1', '1', '2021-05-28 23:32:35', ' ADMIN ', NULL, NULL),
(303, 46, 100, '1', '1', '1', '1', '2021-05-28 23:32:49', ' ADMIN ', NULL, NULL),
(304, 46, 101, '1', '1', '1', '1', '2021-05-28 23:33:03', ' ADMIN ', NULL, NULL),
(305, 46, 102, '1', '1', '1', '1', '2021-05-28 23:33:10', ' ADMIN ', NULL, NULL),
(306, 46, 96, '1', '1', '1', '1', '2021-05-28 23:48:39', ' ADMIN ', NULL, NULL),
(307, 46, 97, '1', '1', '1', '1', '2021-05-28 23:48:40', ' ADMIN ', NULL, NULL),
(308, 46, 98, '1', '1', '1', '1', '2021-05-28 23:48:44', ' ADMIN ', NULL, NULL),
(309, 46, 103, '1', '1', '1', '1', '2021-05-28 23:48:50', ' ADMIN ', NULL, NULL),
(310, 46, 104, '1', '1', '1', '1', '2021-06-04 20:47:53', ' ADMIN ', NULL, NULL),
(311, 46, 105, '1', '1', '1', '1', '2021-06-04 20:47:56', ' ADMIN ', NULL, NULL),
(312, 46, 106, '1', '1', '1', '1', '2021-06-04 21:16:41', ' ADMIN ', NULL, NULL),
(313, 46, 107, '1', '1', '1', '1', '2021-06-04 21:16:46', ' ADMIN ', NULL, NULL),
(314, 46, 109, '1', '1', '1', '1', '2021-06-04 21:54:35', ' ADMIN ', NULL, NULL),
(315, 46, 110, '1', '1', '1', '1', '2021-06-04 21:54:44', ' ADMIN ', NULL, NULL),
(316, 46, 111, '1', '1', '1', '1', '2021-06-04 22:32:27', ' ADMIN ', NULL, NULL),
(317, 46, 112, '1', '1', '1', '1', '2021-06-04 22:32:28', ' ADMIN ', NULL, NULL),
(318, 46, 113, '1', '1', '1', '1', '2021-06-04 22:32:29', ' ADMIN ', NULL, NULL),
(319, 46, 114, '1', '1', '1', '1', '2021-06-04 23:33:33', ' ADMIN ', NULL, NULL),
(320, 46, 115, '1', '1', '1', '1', '2021-06-04 23:33:41', ' ADMIN ', NULL, NULL),
(321, 46, 116, '1', '1', '1', '1', '2021-06-04 23:33:45', ' ADMIN ', NULL, NULL),
(330, 46, 160, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(331, 46, 161, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(332, 46, 162, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(333, 46, 163, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(334, 46, 164, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(335, 46, 165, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(336, 46, 166, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(337, 46, 167, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(338, 46, 168, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(339, 46, 169, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(340, 46, 170, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(341, 46, 171, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(342, 46, 172, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(343, 46, 173, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(344, 46, 174, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(345, 46, 175, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(346, 46, 176, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(347, 46, 177, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(348, 46, 178, '1', '1', '1', '1', '2021-08-18 23:59:50', 'admin', 'admin', '2021-08-18 23:59:50'),
(349, 46, 179, '1', '1', '1', '1', '2021-08-18 23:59:51', 'admin', 'admin', '2021-08-18 23:59:51'),
(350, 46, 180, '1', '1', '1', '1', '2021-08-18 23:59:52', 'admin', 'admin', '2021-08-18 23:59:52'),
(351, 46, 181, '1', '1', '1', '1', '2021-08-18 23:59:53', 'admin', 'admin', '2021-08-18 23:59:53');

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
-- Indices de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  ADD PRIMARY KEY (`Id_parametro`),
  ADD KEY `FK_usuarios_parametros` (`Id_usuario`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_mensajes_chat`
--
ALTER TABLE `tbl_movil_mensajes_chat`
  MODIFY `id_mensaje` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_noticias`
--
ALTER TABLE `tbl_movil_noticias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_notificaciones`
--
ALTER TABLE `tbl_movil_notificaciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_parametros`
--
ALTER TABLE `tbl_movil_parametros`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_segmentos`
--
ALTER TABLE `tbl_movil_segmentos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_session_chats`
--
ALTER TABLE `tbl_movil_session_chats`
  MODIFY `id_session_chat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_mensajes`
--
ALTER TABLE `tbl_movil_tipo_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_notificaciones`
--
ALTER TABLE `tbl_movil_tipo_notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_tipo_recursos`
--
ALTER TABLE `tbl_movil_tipo_recursos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_movil_transacciones`
--
ALTER TABLE `tbl_movil_transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos_usuarios`
--
ALTER TABLE `tbl_permisos_usuarios`
  MODIFY `Id_permisos_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
