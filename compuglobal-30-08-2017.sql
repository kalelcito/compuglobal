-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-08-2017 a las 12:28:56
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compuglobal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellido`, `email`, `telefono`, `password`, `salt`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Cesar', 'Rios', 'cesar@innology.mx', '7227894562', '123456', NULL, 1, '2017-08-23 00:00:00', '2017-08-23 00:00:00'),
(2, 'Test', 'T.', 'test@innology.mx', '7418529630', '123456', NULL, 1, '2017-08-28 12:16:47', '2017-08-28 12:16:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci,
  `fuente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metakeys` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metadesc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `imagen`, `titulo`, `descripcion`, `contenido`, `fuente`, `activo`, `slug`, `metakeys`, `metadesc`, `created_at`, `updated_at`) VALUES
(1, '302ff6acd5085f716eb377a47e41e5b7.jpeg', 'La Tendencia Gaming', 'Acer asegura que es el año del Gaming.', '<p>Miguel Hern&aacute;ndez, Product Business Unit Manager PC &amp; Tablet de&nbsp;Acer Ib&eacute;rica, cuenta a prnoticias cu&aacute;les van a ser las&nbsp;tendencias tecnol&oacute;gicas imperantes este a&ntilde;o en el sector de la tecnolog&iacute;a. &ldquo;Un a&ntilde;o muy interesante&rdquo;, seg&uacute;n el directivo, que asegura que en el segmento de los port&aacute;tiles que giran sus pantallas 360&ordm; vamos a ver &ldquo;nuevos factores de forma, es decir, nuevos dise&ntilde;os&rdquo; que van creciendo y teniendo cada vez m&aacute;s pulgadas, que es lo que solicitan los usuarios. Sin olvidar un &aacute;rea en las que se van a presentar muchas novedades este a&ntilde;o:&nbsp;la del&nbsp;<em>gaming</em>, ya que &ldquo;se est&aacute; hablando much&iacute;simo de volver a jugar otra vez con el ordenador. Y esto es una realidad&rdquo;. Adem&aacute;s, esta tendencia no solo va a verse &ldquo;en la parte del jugador puro, el que utiliza estos ordenadores bastante grandotes y much&iacute;sima potencia&rdquo;, sino tambi&eacute;n en gamas m&aacute;s bajas, que ya cuentan con &ldquo;potencia suficiente para poder jugar y hacernos pasar un buen rato&rdquo;, a&ntilde;ade Miguel Hern&aacute;ndez.</p>\r\n\r\n<p><img alt=\"\" src=\"http://computol.com.mx/img/blog_2.png\" style=\"height:298px; width:1300px\" /></p>\r\n\r\n<p>Los usuarios demandan, adem&aacute;s de estos port&aacute;tiles con pantallas giratorias que pueden convertirse en tabletas, &ldquo;modelos muy, muy ligeros, donde puedan llevar cuatro documentos dentro, que no pesen nada y que puedan conectar en cualquier momento y en cualquier lugar. La verdad es que el usuario espa&ntilde;ol est&aacute; siendo cada vez m&aacute;s exigente con nosotros y est&aacute; haciendo que nos rompamos mucho la cabeza&rdquo;, atestigua el&nbsp;Product Business Unit Manager PC &amp; Tablet de&nbsp;Acer Ib&eacute;rica, que en esta entrevista tambi&eacute;n habla de los datos que baraja la compa&ntilde;&iacute;a para este 2016. As&iacute;, indica que &quot;calculamos crecer entre un 10 y un 12% en valor con respecto al a&ntilde;o pasado&rdquo;, a&ntilde;ade el directivo, que tambi&eacute;n habla del futuro del sector en esta entrevista.</p>', 'http://prnoticias.com/tecnologia/tendencias-de-tecnologia/20149681-tendencias-tech-2016-acer-gaming', 1, 'la-tendencia-gaming', 'acer,gaming', 'Acer asegura que es el año del Gaming', '2017-08-25 13:54:11', '2017-08-25 13:54:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_simple`
--

CREATE TABLE `articulo_simple` (
  `id` int(11) NOT NULL,
  `modals_id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articulo_simple`
--

INSERT INTO `articulo_simple` (`id`, `modals_id`, `imagen`, `titulo`, `subtitulo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 5, 'b2898ac0e871c3d5bc8b6ed97be6a1e0.jpeg', 'MOTO G5 PLUS UNBOXING (VIDEO)', 'ARTURO GOGA X JULIO 25, 2017', 1, '2017-08-24 13:41:48', '2017-08-24 13:41:48'),
(2, 4, '645925b961ea0439b1fe0e32fcf66ef6.jpeg', 'LAS RESPUESTAS INTELIGENTES DE GMAIL YA ESTÁN DISPONIBLES EN ESPAÑOL!', 'ARTURO GOGA X JULIO 25, 2017', 1, '2017-08-24 14:52:28', '2017-08-24 14:52:28'),
(3, 3, 'f5c5274cfe1d56393b5eefb8b0ca3d7f.jpeg', 'EL NOKIA 8, SMARTPHONE DE GAMA ALTA, SALDRÁ EL 16 DE AGOSTO', 'ARTURO GOGA X JULIO 25, 2017', 1, '2017-08-24 14:54:48', '2017-08-24 14:54:48'),
(4, 2, 'a2f8f3771cee5c59e0ae27a523c21433.jpeg', 'ASÍ CELEBRA NIKON SUS 100 AÑOS!', 'ARTURO GOGA X JULIO 25, 2017', 1, '2017-08-24 14:58:28', '2017-08-24 14:58:28'),
(5, 1, '30f336d9db5fff8bcb4bfc37e5209342.jpeg', 'ALCATEL A3 XL UNBOXING (VIDEO)', 'ARTURO GOGA X JULIO 25, 2017', 1, '2017-08-24 14:59:49', '2017-08-25 10:03:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlace` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `imagen`, `enlace`, `orden`, `tipo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Home 1', 'bdb2d3c127d640af6666e44c62edc71d.jpeg', NULL, 1, 1, 1, '2017-08-23 17:59:41', '2017-08-23 18:04:30'),
(2, 'Home 2', '2fc89fe1181972d5da0b4ab68cbebfab.jpeg', 'https://www.youtube.com/watch?v=bpOSxM0rNPM', 2, 1, 1, '2017-08-23 18:05:14', '2017-08-23 18:12:40'),
(3, 'Promo Slide 1', '6993cfadec2bf6ef564bf9d945563ae5.jpeg', NULL, 1, 2, 1, '2017-08-24 10:01:00', '2017-08-24 10:01:00'),
(4, 'Promo Slide 2', '74ebe943737ef4d2570ed270cba05e22.jpeg', NULL, 2, 2, 1, '2017-08-24 10:01:26', '2017-08-24 10:01:26'),
(5, 'Cursos Slide 1', '597c470dd180794e906c3e5e2dfeec49.jpeg', NULL, 1, 3, 1, '2017-08-24 10:06:39', '2017-08-24 10:06:39'),
(6, 'Cursos Slide 2', '014e5db68f9698846fe330b5bceffc65.jpeg', NULL, 2, 3, 1, '2017-08-24 10:07:06', '2017-08-24 10:07:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `tipo`, `nombre`, `color`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cómputo', 'rgb(255,51,0)', 1, '2017-08-29 14:38:19', '2017-08-29 14:38:19'),
(2, 1, 'Periféricos', 'rgb(0,114,196)', 1, '2017-08-29 14:39:34', '2017-08-29 14:39:34'),
(3, 1, 'Impresoras', 'rgb(237,125,49)', 1, '2017-08-29 14:40:14', '2017-08-29 14:40:14'),
(4, 1, 'Accesorios', 'rgb(255,192,0)', 1, '2017-08-29 14:40:49', '2017-08-29 14:40:49'),
(5, 2, 'Toda la tecnología y mucho más', 'rgb(128,0,128)', 1, '2017-08-29 14:42:22', '2017-08-29 14:42:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` longtext COLLATE utf8_unicode_ci,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `articulo_id`, `nickname`, `email`, `comentario`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'test@innology.mx', 'qwertyuio asdfghjk', 1, '2017-08-25 15:50:19', '2017-08-25 15:50:19'),
(2, 1, 'Prueba', 'test@innology.mx', 'zxcvbnm,qwertyuisdfghjkl', 1, '2017-08-28 11:23:20', '2017-08-28 11:23:20'),
(3, 1, 'testing', 'test@innology.mx', 'asdfghjklqwertyuiop', 1, '2017-08-28 11:25:00', '2017-08-28 11:25:00'),
(4, 1, 'Test', 'test@innology.mx', 'qazwsxedcrfvtgbyhnikjbhljdhjkdsf', 1, '2017-08-28 11:26:03', '2017-08-28 11:26:03'),
(5, 1, 'pruebas', 'prueba@innology.mx', 'qwertyasdfghzxcvbn', 1, '2017-08-28 11:28:39', '2017-08-28 11:28:39'),
(6, 1, 'Cesar', 'cesar@innology.mx', 'qwerty asdfgh zxcvbnm', 0, '2017-08-28 11:30:11', '2017-08-28 11:38:43'),
(7, 1, 'Test', 'test@innology.mx', 'qazwsxedc rfvtgbyhn', 1, '2017-08-28 11:33:19', '2017-08-28 11:33:19'),
(8, 1, 'test', 'prueba@innology.mx', 'qwertyuasdfghjzxcvbnm,.....', 1, '2017-08-28 11:36:20', '2017-08-28 11:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentarios` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `empresa`, `email`, `telefono`, `comentarios`, `created_at`, `updated_at`) VALUES
(1, 'Cesar', 'Innology', 'cesar@innology.mx', '7224151623', 'qwertyu asdfghjk', '2017-08-28 12:42:55', '2017-08-28 12:42:55'),
(2, 'test', 'innology', 'test@innology.mx', '7410852963', 'qwertyuiop[asdfghjkl;', '2017-08-28 12:51:19', '2017-08-28 12:51:19'),
(3, 'test', 'innology', 'test@innology.mx', '7410852963', 'qwertyuiop[asdfghjkl;', '2017-08-28 12:51:39', '2017-08-28 12:51:39'),
(4, 'Cesar', 'Innology', 'cesar@innology.mx', '7410852096', 'qwertyuiasdfghgbgvc v fgbsdfs', '2017-08-28 13:00:04', '2017-08-28 13:00:04'),
(5, 'cesar', NULL, 'cesar@innology.mx', NULL, 'asdfghjkl zxcvbnm,', '2017-08-28 13:03:24', '2017-08-28 13:03:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci,
  `color_fondo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_titulo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_fecha` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metakeys` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metadesc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `fecha`, `titulo`, `imagen`, `precio`, `contenido`, `color_fondo`, `color_titulo`, `color_fecha`, `activo`, `slug`, `metakeys`, `metadesc`, `created_at`, `updated_at`) VALUES
(1, '2017-09-09', 'El gerente coach en Ventas', 'be1461c7ed3f944050f884e9d0cfe06c.jpeg', 2100.00, '<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">OBJETIVO DEL CURSO</span></span></span></span></h2>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Desarrollar habilidades y ofrecer herramientas de un L&iacute;der-Coach a los gerentes que tienen a su cargo equipos comerciales con la finalidad de potencializar la creaci&oacute;n de resultados extraordinarios de forma estr&aacute;tegica inmediata provocando el cambio en la fuerza de ventas y organizacional.</span></span></span></span></p>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">TEMARIO Y M&Oacute;DULOS</span></span></span></span></h2>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Estos m&oacute;dulos te ayudar&aacute;n a gestionar de mejor manera tu liderazgo y a gerenciar de una mejor manera a tu equipo de trabajo.</span></span></span></span></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">EL L&Iacute;DER COACH Y LAS VENTAS</span></span></span></span></span></span></span></h2>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El coaching en ventas como herramienta.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El l&iacute;der coach, competencias y caracter&iacute;sticas.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Las 5 piezas m&aacute;s importantes en el juego interno de las </span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">ventas</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td>\r\n			<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">HERRAMIENTAS DE ALTO IMPACTO</span></span></span></span></span></span></span></h2>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Habilidades conversacionales (Escucha activa, ciclo de</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">coordinaci&oacute;n de acciones y feedback)</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Metas y resultados</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Preguntas poderosas</span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">LIDERAZGO Y COACHING</span></span></span></span></span></span></span></h2>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El l&iacute;der en ventas y desempe&ntilde;o visi&oacute;n y acci&oacute;n del l&iacute;der coach en ventas</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El l&iacute;der coach en ventas promoviendo la excelencia y gerenciando el cambio</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El l&iacute;der coach gerenciando el desempe&ntilde;o de sus colaboradores</span></span></span></span></span></span></p>\r\n			</td>\r\n			<td>\r\n			<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">COACHING DE EQUIPOS</span></span></span></span></span></span></span></h2>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Desarrollo de competencias de equipo</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">El l&iacute;der-coach en ventas y la direcci&oacute;n de reuniones</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Manejo de conflictos y negociaci&oacute;n en la venta</span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"left\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_coach.png\" style=\"height:225px; width:225px\" /></span></span></span></span></td>\r\n			<td>\r\n			<h2><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">IMPARTE</span></span></span></span></span></span></span></h2>\r\n\r\n			<h2><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\">Lic. Juli&aacute;n Robles Flores</span></span></span></span></span></span></span></h2>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Facilitador de los programas de formaci&oacute;n de Coaching profesional, de equipos y L&iacute;der HAZ-Coach, mentor de diferentes procesos de certificaci&oacute;n validando habilidades y competencias desarrolladas.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Coach transformacional y de equipos, orador y conferencista a nivel nacional, como tambi&eacute;n coaching ejecutivo de equipos y vida con m&aacute;s de 1,500 horas de experiencia (one to one) consultor y facilitador.</span></span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">Senior participando activamente en la creaci&oacute;n y facilitaci&oacute;n de diversos programas en temas de liderazgo, habilidades directivas, ventas m&eacute;todo SPIN, negociaci&oacute;n, change management, coaching, team building, protocolos de servicio al cliente.</span></span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"row\" style=\"-webkit-text-stroke-width:0px; margin-left:-15px; margin-right:-15px; text-align:start\">\r\n<div class=\"col-xs-6\" style=\"padding-left:15px; padding-right:15px; width:512px\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"row\" style=\"-webkit-text-stroke-width:0px; margin-left:-15px; margin-right:-15px; text-align:start\">\r\n<div class=\"col-xs-9\" style=\"padding-left:15px; padding-right:15px; width:768px\">\r\n<h2>&nbsp;</h2>\r\n</div>\r\n</div>\r\n\r\n<h2 style=\"text-align:start\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">EMPRESAS QUE HAN TOMADO NUESTRO TALLER</span></span></span></span></h2>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_1.png\" style=\"height:auto; width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_2.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_3.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_4.png\" style=\"width:100%\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_5.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_6.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_7.png\" style=\"width:100%\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_8.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_9.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_10.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/curso_inc_11.png\" style=\"width:100%\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">&iquest;QU&Eacute; INCLUYE EL TALLER?</span></span></span></span></h2>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Manual por escrito</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Din&aacute;micas de participaci&oacute;n</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Coffee Break continuo durante la sesi&oacute;n</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Alimentos inclu&iacute;dos</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Certificado de participaci&oacute;n con validez ante la STPS</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:18px\"><span style=\"color:black\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Asesor&iacute;a personalizada</span></span></span></span></p>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">ALGUNAS PERSONAS OPINAN</span></span></span></span></h2>\r\n\r\n<div class=\"row\" style=\"-webkit-text-stroke-width:0px; margin-left:-15px; margin-right:-15px; text-align:start\">\r\n<div class=\"col-xs-2\" style=\"padding-left:15px; padding-right:15px; width:170.656px\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><img class=\"img-responsive\" src=\"http://atestapp.com/compuglobal/assets/img/opinion.png\" style=\"border:0px; box-sizing:border-box; display:block; float:left; max-width:100%; vertical-align:middle\" /></span></span></span></span></div>\r\n\r\n<div class=\"col-xs-10\" style=\"padding-left:15px; padding-right:15px; width:853.328px\">\r\n<blockquote>\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:18px\"><span style=\"color:black\">&quot;El curso me pareci&oacute; muy fruct&iacute;fero, bastante completo y muy din&aacute;mico. Aprend&iacute; muchas cosas que sin problema puedo llevar a la pr&aacute;ctica en mi ambiente de trabajo&quot;.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"color:#333333\"><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif\"><span style=\"background-color:#ffffff\">Ana Lilia Bonifacio - Supervisor</span></span></span></span></p>\r\n</blockquote>\r\n</div>\r\n</div>\r\n\r\n<blockquote>\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\"><span style=\"color:black\">&quot;No sab&iacute;a que esperar del curso y tengo que reconocer que sobrepaso mis expectativas, cre&iacute; que no me servir&iacute;a, ya que me encuentro en un &aacute;rea de administrativa, sin embargo me di cuenta que aunque habemos personas que nunca hemos realizado una atenci&oacute;n con clientes para vender algo pero si a clientes internos en los cuales puedo aplicarlo&quot;.</span></span></p>\r\n\r\n<p>Mariana Orozco - Gerente de Recursos Humanos</p>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-size:18px\"><span style=\"color:black\">&quot;El curso realmente me gust&oacute;, el instructor fue muy profesional, toda la teor&iacute;a la explico muy detallada muy entendible, muy pr&aacute;ctica! y ya en los ejercicios de practica la dinamica fue muy interesante ya que si se llevaron a cabo todos los ejercicios, con un tiempo adecuado para cada uno...&quot;.</span></span></p>\r\n\r\n<p>Iliana Navarrete - Gerente de ventas</p>\r\n</blockquote>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">FOTOS DE CURSOS Y CAPACITACIONES</span></span></span></span></h2>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_1.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_2.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_3.png\" style=\"width:100%\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_4.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_5.png\" style=\"width:100%\" /></td>\r\n			<td><img alt=\"\" src=\"http://atestapp.com/compuglobal/assets/img/cursos_fotos_6.png\" style=\"width:100%\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:30px\"><span style=\"font-family:coolvetica,sans-serif\"><span style=\"color:#c20605\"><span style=\"background-color:#ffffff\">&iexcl;NO LO PIENSE MAS Y EMPODERE A SU EQUIPO DE TRABAJO!</span></span></span></span></h2>', 'rgb(194,6,5)', 'rgb(255,255,255)', 'rgb(249,142,0)', 1, 'el-gerente-coach-en-ventas', 'lider,coach,curso,compuglobal', 'Desarrollar habilidades y ofrecer herramientas de un Líder-Coach a los gerentes que tienen a su cargo equipos comerciales con la finalidad de potencializar la creación de resultados extraordinarios de forma estratégica inmediata provocando el cambio', '2017-08-28 15:20:02', '2017-08-29 10:16:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_log_entries`
--

CREATE TABLE `ext_log_entries` (
  `id` int(11) NOT NULL,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_translations`
--

CREATE TABLE `ext_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'e68595cd3bd3f0684083986aef9e72ad.png', 1, '2017-08-29 12:39:53', '2017-08-29 12:39:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_enlace`
--

CREATE TABLE `imagen_enlace` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlace` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagen_enlace`
--

INSERT INTO `imagen_enlace` (`id`, `imagen`, `enlace`, `tipo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'b3b0a99ef0e96bca6214a4173f21d661.jpeg', '#', 1, 1, '2017-08-24 11:37:58', '2017-08-24 11:48:36'),
(2, '56f3e4b7aef9a666a651a722a3784032.jpeg', '#', 2, 1, '2017-08-24 11:49:12', '2017-08-24 11:49:12'),
(3, 'ceb4c13bbb555f3a432658c3a7e02e22.jpeg', '#', 1, 1, '2017-08-24 11:49:33', '2017-08-24 11:49:33'),
(4, '1415c4e3542d39977d6c7e7c94a084e8.jpeg', '#', 3, 1, '2017-08-24 11:50:26', '2017-08-24 11:50:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_sinEnlace`
--

CREATE TABLE `imagen_sinEnlace` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagen_sinEnlace`
--

INSERT INTO `imagen_sinEnlace` (`id`, `imagen`, `tipo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'f12138ec56e1352f0612151edf077b7e.jpeg', 1, 1, '2017-08-28 12:04:04', '2017-08-28 12:04:04'),
(2, '282a96d2bea1c61c57876312c8c801eb.jpeg', 2, 1, '2017-08-28 12:07:30', '2017-08-28 12:07:30'),
(3, 'f0f83f6d072707e9aa3226d622ba7c0b.jpeg', 3, 1, '2017-08-28 12:08:23', '2017-08-28 12:08:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `curso_id`, `nombre`, `email`, `telefono`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cesar', 'cesar@innology.mx', '7224224818', 1, '2017-08-29 11:54:38', '2017-08-29 11:54:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marquees`
--

CREATE TABLE `marquees` (
  `id` int(11) NOT NULL,
  `texto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marquees`
--

INSERT INTO `marquees` (`id`, `texto`, `tipo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'marquee test admin', 1, 1, '2017-08-23 17:07:08', '2017-08-23 17:33:20'),
(2, 'tag admin', 2, 1, '2017-08-23 17:19:18', '2017-08-23 17:19:18'),
(3, 'capacitaciones admin', 3, 1, '2017-08-23 17:21:21', '2017-08-23 17:21:21'),
(4, 'nosotros admin', 4, 1, '2017-08-23 17:23:01', '2017-08-23 17:23:01'),
(5, 'cursos admin', 5, 1, '2017-08-23 17:24:43', '2017-08-23 17:24:43'),
(6, 'promo admin', 6, 1, '2017-08-23 17:31:48', '2017-08-23 17:31:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modals`
--

CREATE TABLE `modals` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_alternativo` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen_alternativa` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modals`
--

INSERT INTO `modals` (`id`, `tipo`, `imagen`, `titulo`, `descripcion`, `texto_alternativo`, `imagen_alternativa`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '23b96362ef3265f5afce0aa61b0f93bf.jpeg', 'ALCATEL A3 XL UNBOXING (VIDEO)', 'ARTURO GOGA X JULIO 25, 2017', NULL, NULL, 1, '2017-08-24 13:22:03', '2017-08-24 13:22:03'),
(2, 1, '66b8e3cfcf37e82c091ed2e7171461ba.jpeg', 'ASÍ CELEBRA NIKON SUS 100 AÑOS!', 'ARTURO GOGA X JULIO 25, 2017', NULL, NULL, 1, '2017-08-24 15:06:32', '2017-08-24 15:06:32'),
(3, 1, '501a4366acc92836d228f797267ad99d.jpeg', 'EL NOKIA 8, SMARTPHONE DE GAMA ALTA, SALDRÁ EL 16 ', 'ARTURO GOGA X JULIO 25, 2017', NULL, NULL, 1, '2017-08-24 15:09:30', '2017-08-24 15:09:30'),
(4, 1, '567c8090a88d324b04b767848b84ff74.jpeg', 'LAS RESPUESTAS INTELIGENTES DE GMAIL YA ESTÁN DISP', 'ARTURO GOGA X JULIO 25, 2017', NULL, NULL, 1, '2017-08-24 15:09:57', '2017-08-24 15:09:57'),
(5, 1, 'c4e44efb79c8e057c28997b1f7cddd72.jpeg', 'MOTO G5 PLUS UNBOXING (VIDEO)', 'ARTURO GOGA X JULIO 25, 2017', NULL, NULL, 1, '2017-08-24 15:10:31', '2017-08-24 15:10:31'),
(6, 1, '39994f3558a8e42faf0c1ac293b9177f.jpeg', 'Videovigilancia', 'Info de Videovigilancia', NULL, NULL, 1, '2017-08-24 17:42:07', '2017-08-24 17:42:07'),
(7, 1, 'b4c0e0058d615e183a4ad81626b3ad67.jpeg', 'Punto de Venta', 'Info de Punto de Venta', NULL, NULL, 1, '2017-08-24 17:42:48', '2017-08-24 17:42:48'),
(8, 1, '8669ac6f75bd25b1f3355479530a0799.jpeg', 'Respaldo Masivo', 'Info de Respaldo Masivo', NULL, NULL, 1, '2017-08-24 17:43:15', '2017-08-24 17:43:15'),
(9, 1, '2ffcc3bfb8a2436552774682b2b9b404.jpeg', 'Licenciamiento', 'Info de Licenciamiento', NULL, NULL, 1, '2017-08-24 17:43:37', '2017-08-24 17:43:37'),
(10, 2, '989b2e14962e379d18eea6cbc8f9530f.png', 'Productos Modal', 'Info de Productos', NULL, NULL, 1, '2017-08-24 17:58:22', '2017-08-24 17:58:22'),
(11, 3, '28d35ddd7c824ad95f75c7c4069eb53b.png', 'Marcas Modal', 'Info de Marcas', NULL, NULL, 1, '2017-08-24 17:59:12', '2017-08-24 17:59:12'),
(12, 4, '2110930a6b07fce625a8b1a406775f35.jpeg', 'Hot Sale Modal', 'Info de Hot Sale', NULL, NULL, 1, '2017-08-24 17:59:51', '2017-08-24 17:59:51'),
(13, 5, 'b8f4439fe82dd19f2e7620a99bde24cf.jpeg', 'EMPODERA A TU EQUIPO DE TRABAJO', 'Invierte en la preparación de tu equipo de trabajo, ellos harán más rentable tu negocio.', '< ¿POR QUÉ HACERLO? >', NULL, 1, '2017-08-24 18:08:32', '2017-08-24 18:12:21'),
(14, 6, '155b866b7b92dfa9957ceaf1a4c9bd41.jpeg', 'EL GERENTE ES LA CLAVE', 'Definamos que es un coach, es aquella persona facilitadora del aprendizaje que estímula la toma de conciencia, la visión integral de los hechos y la acción desde estrategias efectivas y diferentes', 'VER MÁS ACERCA DE ESTE ARTÍCULO >>', '58ea404695e4796630e38d257343f304.jpeg', 1, '2017-08-25 10:08:21', '2017-08-25 10:11:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `productos_id`, `nombre`, `email`, `telefono`, `cantidad`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cesar', 'cesar@innology.mx', '7410852963', 7, 43750.00, 1, '2017-08-30 11:45:59', '2017-08-30 11:45:59'),
(2, 2, 'Cesar', 'cesar@innology.mx', '7894561230', 10, 1150.00, 1, '2017-08-30 11:48:08', '2017-08-30 11:48:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `sku` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `sku`, `titulo`, `imagen`, `descripcion`, `precio`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'S45140', 'HP x240', '30fa163e984a424a3ee18b6d23f911bf.png', 'Procesador Ci7, Disco duro AMD A10, 8GB en Ram, DVD/RW.', 6250.00, 1, '2017-08-29 17:07:21', '2017-08-29 18:07:11'),
(2, 2, 'S45141', 'Mouse MVC45', '2c915d54316f8030f3c4ac9e8e61bcad.jpeg', 'Mouse Perfect Choice color Azul', 115.00, 1, '2017-08-29 17:13:17', '2017-08-29 17:13:17'),
(3, 3, 'S45142', 'Deskjet 7865', '41b755623b2a229913201628c863b542.png', 'Impresora HP color blanco', 975.50, 1, '2017-08-29 17:14:52', '2017-08-29 17:14:52'),
(4, 4, 'S45143', 'Mouse RTV74', 'b034a7f7687d4f3279b5abd149fac7da.jpeg', 'Mouse Perfect Choice color Rojo', 100.00, 1, '2017-08-29 17:15:45', '2017-08-29 17:15:45'),
(5, 5, 'S45144', 'Camara Canon', '06b8f362e94e3a98456bfa9c21434452.png', 'Camara Canon color negro', 1350.60, 1, '2017-08-29 17:16:38', '2017-08-29 17:16:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soluciones`
--

CREATE TABLE `soluciones` (
  `id` int(11) NOT NULL,
  `modals_id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `soluciones`
--

INSERT INTO `soluciones` (`id`, `modals_id`, `imagen`, `titulo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 6, 'bd42d1e632d44527dcb42ab1b906a8f4.jpeg', 'Videovigilancia', 1, '2017-08-24 16:43:20', '2017-08-24 17:44:00'),
(2, 7, 'cc58156dc7a7a57d0a4b483a3eb35822.jpeg', 'Punto de Venta', 1, '2017-08-24 16:45:26', '2017-08-24 17:44:22'),
(3, 8, 'a78cf0a546ea5b67181e3b029e99a906.jpeg', 'Respaldo Masivo', 1, '2017-08-24 16:45:53', '2017-08-24 17:44:30'),
(4, 9, '067315129f3b04cb965f9afe84f98bd9.jpeg', 'Licenciamiento', 1, '2017-08-24 16:46:19', '2017-08-24 17:44:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `nombre`, `email`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Cesar', 'cesar@innology.mx', 1, '2017-08-29 14:16:35', '2017-08-29 14:16:35'),
(2, 'Test', 'test@innology.mx', 1, '2017-08-29 14:17:35', '2017-08-29 14:17:35'),
(3, 'Prueba', 'prueba@innology.mx', 1, '2017-08-29 14:18:21', '2017-08-29 14:18:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `link_youtube` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `link_youtube`, `youtube_id`, `titulo`, `descripcion`, `orden`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=k_cFeI_2gL4', 'k_cFeI_2gL4', 'Kazunori Yamauchi, el genio detrás de Gran Turismo [FayerWayer TV]', 'El creador de una de los sagas más vendidos de PlayStation explica lo que significa mantenerse vigente en la industria de los videojuegos luego de 20', 1, 1, '2017-08-24 10:31:41', '2017-08-24 10:55:56'),
(2, 'https://www.youtube.com/watch?v=v-YA1azChcI', 'v-YA1azChcI', 'Innecesario: El Podcast de FayerWayer', 'Porque la tecnología que nos gusta es (a veces) innecesaria.', 2, 1, '2017-08-24 10:59:46', '2017-08-24 10:59:46'),
(3, 'https://www.youtube.com/watch?v=vba0hJEs87c', 'vba0hJEs87c', 'Samsung y la vida después del Note 7 [FayerWayer TV]', '¿Cómo se resurge después de un problema de tal calibre?', 3, 1, '2017-08-24 11:03:51', '2017-08-24 11:03:51'),
(4, 'https://www.youtube.com/watch?v=D6m3VAPTB2w', 'D6m3VAPTB2w', 'Fuimos a conocer el Galaxy S8 a Nueva York [FayerWayer TV]', 'Ahora con un 100% menos de explosiones.', 4, 1, '2017-08-24 11:04:53', '2017-08-24 11:04:53'),
(5, 'https://www.youtube.com/watch?v=3ZKHc1srgSU', '3ZKHc1srgSU', 'FayerWayer TV: Viajes con SpaceX, viajes con Uber, viajes con mutantes', 'Diversión garantizada.', 5, 1, '2017-08-24 11:05:34', '2017-08-24 11:05:34'),
(6, 'https://youtu.be/bpOSxM0rNPM', 'bpOSxM0rNPM', 'Do I Wanna Know?', 'Arctic Monkeys - AM', 6, 1, '2017-08-24 11:06:08', '2017-08-24 11:17:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo_simple`
--
ALTER TABLE `articulo_simple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulo_simple_modals_idx` (`modals_id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentarios_articulo1_idx` (`articulo_id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_class_lookup_idx` (`object_class`),
  ADD KEY `log_date_lookup_idx` (`logged_at`),
  ADD KEY `log_user_lookup_idx` (`username`),
  ADD KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`);

--
-- Indices de la tabla `ext_translations`
--
ALTER TABLE `ext_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  ADD KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_enlace`
--
ALTER TABLE `imagen_enlace`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_sinEnlace`
--
ALTER TABLE `imagen_sinEnlace`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripciones_curso1_idx` (`curso_id`);

--
-- Indices de la tabla `marquees`
--
ALTER TABLE `marquees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modals`
--
ALTER TABLE `modals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_productos1_idx` (`productos_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categoria1_idx` (`categoria_id`);

--
-- Indices de la tabla `soluciones`
--
ALTER TABLE `soluciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soluciones_modals1_idx` (`modals_id`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `articulo_simple`
--
ALTER TABLE `articulo_simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ext_translations`
--
ALTER TABLE `ext_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagen_enlace`
--
ALTER TABLE `imagen_enlace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `imagen_sinEnlace`
--
ALTER TABLE `imagen_sinEnlace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marquees`
--
ALTER TABLE `marquees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `modals`
--
ALTER TABLE `modals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `soluciones`
--
ALTER TABLE `soluciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo_simple`
--
ALTER TABLE `articulo_simple`
  ADD CONSTRAINT `FK_274FD13242F7FD5F` FOREIGN KEY (`modals_id`) REFERENCES `modals` (`id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_F54B3FC02DBC2FC9` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `FK_D30F49887CB4A1F` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_6716CCAAED07566B` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_767490E63397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `soluciones`
--
ALTER TABLE `soluciones`
  ADD CONSTRAINT `FK_AEF2843342F7FD5F` FOREIGN KEY (`modals_id`) REFERENCES `modals` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
