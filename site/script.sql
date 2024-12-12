-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           8.0.13 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table laravel. tools
CREATE TABLE IF NOT EXISTS `tools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.tools : ~0 rows (environ)
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
INSERT INTO `tools` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Marteau', 'pour frapper et enfoncer des clous dans du bois ou d\'autres matériaux.', '23.99', '2023-03-13 21:20:09', '2023-03-13 21:20:09'),
(2, 'Tournevis', 'pour serrer ou desserrer les vis.', '15.99', '2023-03-13 21:25:17', '2023-03-13 21:25:17'),
(3, 'Scie', 'pour couper le bois, le métal ou d\'autres matériaux.', '56.33', '2023-03-13 21:25:38', '2023-03-13 21:25:38'),
(4, 'Perceuse', 'pour faire des trous dans le bois, le métal ou le plastique.', '199.99', '2023-03-13 21:25:58', '2023-03-13 21:25:58'),
(5, 'Ponceuse', 'pour lisser et polir les surfaces rugueuses.', '21.48', '2023-03-13 21:26:35', '2023-03-13 21:26:35'),
(6, 'Clé à molette', 'pour serrer ou desserrer les boulons et les écrous.', '14.33', '2023-03-13 21:26:53', '2023-03-13 21:26:54'),
(7, 'Équerre', 'pour mesurer et tracer des angles droits.', '3.66', '2023-03-13 21:27:12', '2023-03-13 21:27:13'),
(8, 'Niveau à bulle', 'pour s\'assurer que les surfaces sont parfaitement horizontales ou verticales.', '14.88', '2023-03-13 21:27:31', '2023-03-13 21:27:32'),
(9, 'Mètre ruban', 'pour mesurer les distances et les dimensions.', '20.00', '2023-03-13 21:28:09', '2023-03-13 21:28:10'),
(10, 'Ciseaux à bois', 'pour sculpter et tailler le bois.', '34.99', '2023-03-13 21:28:31', '2023-03-13 21:28:32');
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;