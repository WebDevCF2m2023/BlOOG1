-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 23 juin 2024 à 17:42
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `bioog`
--
DROP DATABASE IF EXISTS `bioog`;
CREATE DATABASE IF NOT EXISTS `bioog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bioog`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `article_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `article_title` varchar(160) NOT NULL,
                                         `article_slug` varchar(160) NOT NULL,
                                         `article_text` text NOT NULL,
                                         `article_date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                         `article_date_update` timestamp NULL DEFAULT NULL,
                                         `article_date_publish` timestamp NULL DEFAULT NULL,
                                         `article_is_published` tinyint UNSIGNED NOT NULL DEFAULT '0',
                                         `user_user_id` int UNSIGNED DEFAULT NULL,
                                         PRIMARY KEY (`article_id`),
                                         UNIQUE KEY `article_slug_UNIQUE` (`article_slug`),
                                         KEY `fk_article_user1_idx` (`user_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article_has_category`
--

DROP TABLE IF EXISTS `article_has_category`;
CREATE TABLE IF NOT EXISTS `article_has_category` (
                                                      `article_article_id` int UNSIGNED NOT NULL,
                                                      `category_category_id` int UNSIGNED NOT NULL,
                                                      PRIMARY KEY (`article_article_id`,`category_category_id`),
                                                      KEY `fk_article_has_category_category1_idx` (`category_category_id`),
                                                      KEY `fk_article_has_category_article1_idx` (`article_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
                                          `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                          `category_name` varchar(100) NOT NULL,
                                          `category_slug` varchar(100) NOT NULL,
                                          `category_description` varchar(300) DEFAULT NULL,
                                          `category_parent` int UNSIGNED DEFAULT '0',
                                          PRIMARY KEY (`category_id`),
                                          UNIQUE KEY `category_slug_UNIQUE` (`category_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
                                         `comment_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `comment_text` varchar(500) NOT NULL,
                                         `comment_parent` int UNSIGNED DEFAULT '0',
                                         `comment_date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                         `comment_date_update` timestamp NULL DEFAULT NULL,
                                         `comment_date_publish` timestamp NULL DEFAULT NULL,
                                         `comment_is_published` tinyint UNSIGNED DEFAULT '0',
                                         PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_text`, `comment_parent`, `comment_date_create`, `comment_date_update`, `comment_date_publish`, `comment_is_published`) VALUES
                                                                                                                                                                         (1, 'test d\'insertion école\r\n\r\nyep iuy', NULL, '2024-06-22 13:38:45', '2024-06-22 12:06:50', NULL, 0),
                                                                                                                                                                         (2, 'coucou \'yêp', 0, '2024-06-22 14:07:01', '2024-06-22 12:19:22', NULL, 0),
                                                                                                                                                                         (4, 'dtr(ryt tfrhg', 0, '2024-06-22 14:16:21', '2024-06-22 12:16:27', NULL, 0),
                                                                                                                                                                         (5, 'eryt\'èy iuyh  dtz', 0, '2024-06-22 14:32:10', '2024-06-22 12:33:49', NULL, 0),
                                                                                                                                                                         (7, 'Lorem ipsum', 0, '2024-06-22 15:03:52', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment_has_article`
--

DROP TABLE IF EXISTS `comment_has_article`;
CREATE TABLE IF NOT EXISTS `comment_has_article` (
                                                     `comment_comment_id` int UNSIGNED DEFAULT NULL,
                                                     `article_article_id` int UNSIGNED DEFAULT NULL,
                                                     KEY `fk_comment_has_article_article1_idx` (`article_article_id`),
                                                     KEY `fk_comment_has_article_comment1_idx` (`comment_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment_has_user`
--

DROP TABLE IF EXISTS `comment_has_user`;
CREATE TABLE IF NOT EXISTS `comment_has_user` (
                                                  `comment_comment_id` int UNSIGNED DEFAULT NULL,
                                                  `user_user_id` int UNSIGNED DEFAULT NULL,
                                                  KEY `fk_comment_has_user_user1_idx` (`user_user_id`),
                                                  KEY `fk_comment_has_user_comment1_idx` (`comment_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment_has_user`
--

INSERT INTO `comment_has_user` (`comment_comment_id`, `user_user_id`) VALUES
                                                                          (1, 1),
                                                                          (7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
                                       `image_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                       `image_url` varchar(60) NOT NULL,
                                       `image_description` varchar(150) DEFAULT NULL,
                                       `article_article_id` int UNSIGNED DEFAULT NULL,
                                       PRIMARY KEY (`image_id`),
                                       KEY `fk_image_article1_idx` (`article_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
                                            `permission_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `permission_name` varchar(45) NOT NULL,
                                            `permission_description` varchar(300) DEFAULT NULL,
                                            PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_name`, `permission_description`) VALUES
                                                                                            (1, 'Administrator', 'Administrateur du site'),
                                                                                            (2, 'Moderator', 'Modérateur du site');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
                                     `tag_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                     `tag_slug` varchar(60) NOT NULL,
                                     PRIMARY KEY (`tag_id`),
                                     UNIQUE KEY `tag_slug_UNIQUE` (`tag_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag_has_article`
--

DROP TABLE IF EXISTS `tag_has_article`;
CREATE TABLE IF NOT EXISTS `tag_has_article` (
                                                 `tag_tag_id` int UNSIGNED DEFAULT NULL,
                                                 `article_article_id` int UNSIGNED DEFAULT NULL,
                                                 KEY `fk_tag_has_article_article1_idx` (`article_article_id`),
                                                 KEY `fk_tag_has_article_tag1_idx` (`tag_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
                                      `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'case sensitive',
                                      `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'case sensitive',
                                      `user_full_name` varchar(160) DEFAULT NULL,
                                      `user_mail` varchar(180) NOT NULL,
                                      `user_status` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 pas actif\n1 actif\n2 banni',
                                      `user_secret_key` varchar(80) NOT NULL,
                                      `permission_permission_id` int UNSIGNED DEFAULT NULL,
                                      PRIMARY KEY (`user_id`),
                                      UNIQUE KEY `user_login_UNIQUE` (`user_login`),
                                      UNIQUE KEY `user_mail_UNIQUE` (`user_mail`),
                                      KEY `fk_user_permission_idx` (`permission_permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_full_name`, `user_mail`, `user_status`, `user_secret_key`, `permission_permission_id`) VALUES
    (1, 'admin', '$2y$10$CyZmG6iq6tWx6lJTgUEss.NRbDT9YZA9My15LGpB8W8i6wNGMFv82', 'Mike Pols', 'mike@cf2m.be', 1, '66785d6052d032.48607400', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `article_has_category`
--
ALTER TABLE `article_has_category`
    ADD CONSTRAINT `fk_article_has_category_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_article_has_category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comment_has_article`
--
ALTER TABLE `comment_has_article`
    ADD CONSTRAINT `fk_comment_has_article_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`) ON DELETE SET NULL,
    ADD CONSTRAINT `fk_comment_has_article_comment1` FOREIGN KEY (`comment_comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `comment_has_user`
--
ALTER TABLE `comment_has_user`
    ADD CONSTRAINT `fk_comment_has_user_comment1` FOREIGN KEY (`comment_comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE SET NULL,
    ADD CONSTRAINT `fk_comment_has_user_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
    ADD CONSTRAINT `fk_image_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `tag_has_article`
--
ALTER TABLE `tag_has_article`
    ADD CONSTRAINT `fk_tag_has_article_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_tag_has_article_tag1` FOREIGN KEY (`tag_tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
    ADD CONSTRAINT `fk_user_permission` FOREIGN KEY (`permission_permission_id`) REFERENCES `permission` (`permission_id`) ON DELETE SET NULL;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
