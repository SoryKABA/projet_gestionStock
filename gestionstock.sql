-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 14 déc. 2024 à 07:57
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionstock`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_barre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `peremption` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `price`, `description`, `slug`, `code_barre`, `category_id`, `created_at`, `updated_at`, `image`, `quantity`, `peremption`) VALUES
(2, 'Robe manequine femme', 8000, NULL, 'robe-manequine-femme', '8132405145', 9, '2024-08-20 01:06:19', '2024-08-20 01:06:19', 'users/g9XdpSUfJmg4dhe7MsMkbRLatx1f0ZDSZ5S4m9mI.jpg', 50, NULL),
(3, 'Chemise manche courte femme', 6800, NULL, 'chemise-manche-courte-femme', '7795026424', 9, '2024-08-20 01:14:21', '2024-08-20 01:14:21', 'users/UAlGzFa0RxS3JdGVbC86pjiIln255gm1v192gCjh.jpg', 25, NULL),
(4, 'Veste Homme (Costume)', 50000, NULL, 'veste-homme-costume', '6885120665', 8, '2024-08-20 08:13:32', '2024-08-20 08:13:32', 'users/h03Ak4ttK3UYn5odTRap9ILPG6IoZipHuDKhhUdX.jpg', 62, NULL),
(5, 'Saucisson rouge viande', 1500, NULL, 'saucisson-rouge-viande', '8807213597', 7, '2024-08-20 08:14:50', '2024-08-20 08:14:50', 'users/BOdvk89Dibje2p5XGhyVW3qcfVQyrYCV0p3N7vx4.webp', 100, NULL),
(6, 'Paracetamol 500 (comprimé)', 1000, NULL, 'paracetamol-500', '6684617270', 13, '2024-08-21 15:23:03', '2024-08-23 16:29:36', 'articles/ZVCJ62ehtxZVguFAJjHWHY3iVDQqDxpohbWXY1sN.jpg', 100, NULL),
(7, 'Techno Camon 30', 230000, NULL, 'techno-camon-30', '4063338694', 4, '2024-08-23 16:29:00', '2024-08-23 16:29:00', 'articles/P6LQztcyAU9DCO4SE455phNQrCUZQgTNyYrycdBc.jpg', 150, NULL),
(8, 'Sel blanc de mer', 500, NULL, 'sel-blanc-de-mer', '1777719877', 3, '2024-08-26 22:27:21', '2024-08-26 22:27:21', 'articles/D33wnF6zU2YWgyMMxXINmqKMk3fk9hM34wJ8eP0V.jpg', 30, '2026-05-10'),
(9, 'La patte dentifrice', 1000, NULL, 'la-patte-dentifrice', '6734539649', 2, '2024-08-26 22:29:35', '2024-08-26 22:29:35', 'articles/9bbNZhaRztJVNcIgPrahF9mF9QWLdPuuRpcGivdx.webp', 150, '2025-01-15');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sucres blancs', 'sucre-blanc', '2024-08-16 20:26:31', '2024-08-16 23:43:49'),
(2, 'Casseroles 2', 'casseroles-2', '2024-08-16 20:28:03', '2024-08-16 20:28:03'),
(3, 'Marmites 1', 'marmites-1', '2024-08-16 20:29:44', '2024-08-16 20:29:44'),
(4, 'Périphérique Portable', 'peripherique-portable', '2024-08-16 20:30:46', '2024-08-16 20:30:46'),
(5, 'Ordinateurs 1', 'ordinateurs-1', '2024-08-16 20:31:10', '2024-08-16 20:31:10'),
(7, 'Viandes rouge', 'viandes-rouge', '2024-08-17 00:51:01', '2024-08-17 00:51:01'),
(8, 'Vêtement homme', 'vetement-homme', '2024-08-17 00:52:34', '2024-08-17 00:52:34'),
(9, 'Vêtement femme', 'vetement-femme', '2024-08-17 00:52:48', '2024-08-17 00:52:48'),
(10, 'Soulier Homme', 'soulier-homme', '2024-08-17 00:53:01', '2024-08-17 00:53:01'),
(11, 'Soulier Femme', 'soulier-femme', '2024-08-17 00:53:18', '2024-08-17 00:53:18'),
(12, 'Huiles', 'huiles', '2024-08-17 01:16:20', '2024-08-17 01:16:20'),
(13, 'Médicament', 'medicament', '2024-08-21 15:23:46', '2024-08-21 15:23:46');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2024_08_07_183031_create_sessions_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(11, '2019_08_19_000000_create_failed_jobs_table', 5),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(13, '2024_08_01_175858_create_user_roles_table', 5),
(14, '2024_08_02_144000_users', 5),
(15, '2024_08_02_154052_users', 5),
(16, '2024_08_09_185546_create_user_roles_table', 6),
(17, '2024_08_16_184640_create_categories_table', 7),
(18, '2024_08_16_192249_articles', 8),
(19, '2024_08_20_002346_articles', 9),
(20, '2024_08_26_221142_articles', 10),
(21, '2024_08_26_223700_create_users_communications_table', 11);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userrole`
--

CREATE TABLE `userrole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `userrole`
--

INSERT INTO `userrole` (`id`, `title`) VALUES
(1, 'Super Admin'),
(2, 'Gestionnaire de stock'),
(3, 'Gestionnaire des ventes'),
(4, 'Gestionnaire des achats'),
(5, 'Simple Vendeur'),
(6, 'Gestionnaire des finances');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageProfil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(8,2) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_roles_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `name`, `phone`, `imageProfil`, `salary`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_roles_id`) VALUES
(1, 'Soriba', 'Kaba', '766243405', 'users/hPiQRvNqz76j7UkFmkPdD3qc9XCsfmpTQzGMdDLi.jpg', 600000.00, 'skaba484@agence.gn', NULL, '$2y$10$Z2qvN1d6BUmmVmlIWgjTxeWJKvCSXmUysXeAYzQwMAHk0.2g6Phia', NULL, '2024-08-09 21:36:31', '2024-08-12 01:47:11', 1),
(2, 'Moussa', 'Cisse', '624555302', 'users/PdwRbnGgM4em8uRYGYYrX14LVO6P0Fqv3ivxmD93.jpg', 30000.00, 'mcisse133@agence.gn', NULL, '$2y$10$iAml2N9j1yu/NvGtuF6ePOmdrDIv7dJhISwVaZG2TQcjjQzO8pI36', NULL, '2024-08-09 21:39:58', '2024-08-16 16:52:16', 4),
(4, 'Aïcha', 'Nabe', '632102256', 'users/0Rkmt5QG1Std59RNfBsCCxyLgW9sz0y8Flmiw0aF.jpg', 360000.00, 'anabe368@agence.gn', NULL, '$2y$10$UcrYnx1RGBhRPlFJSWRDeeiYRMw9qL6XG.PLqQCm6rUIJ1VMMH.dm', NULL, '2024-08-09 23:38:19', '2024-08-16 18:16:37', 5),
(6, 'Minata', 'Camara', '621451278', 'users/PdwRbnGgM4em8uRYGYYrX14LVO6P0Fqv3ivxmD93.jpg\r\n', 500000.00, 'amicamara222@agence.gn', NULL, '$2y$10$KdPj.qVymY6u76b4FC2or.O0t2Okoh0GA.0fvEkKsyD7peVPBnp9G', NULL, NULL, NULL, 5),
(7, 'Fanta', 'Nabe', '625441122', 'users/PdwRbnGgM4em8uRYGYYrX14LVO6P0Fqv3ivxmD93.jpg\r\n', 650000.00, 'fnabe123@agence.gn', NULL, '00000000', NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users_communications`
--

CREATE TABLE `users_communications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `messages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_communications`
--

INSERT INTO `users_communications` (`id`, `messages`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'This portion of the documentation discusses authenticating users via the Laravel application starter kits, which includes UI scaffolding to help you get started quickly. If you would like to integrate with Laravel\'s authentication systems directly, check out the documentation on manually authenticating users.', 1, '2024-08-29 15:35:12', '2024-08-29 15:35:12'),
(2, 'First, you should install a Laravel application starter kit. Our current starter kits, Laravel Breeze and Laravel Jetstream, offer beautifully designed starting points for incorporating authentication into your fresh Laravel application.', 1, '2024-08-29 15:36:55', '2024-08-29 15:36:55'),
(3, 'First, you should install a Laravel application starter kit. Our current starter kits, Laravel Breeze and Laravel Jetstream, offer beautifully designed starting points for incorporating authentication into your fresh Laravel application.', 1, '2024-08-29 15:37:28', '2024-08-29 15:37:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_roles_id_foreign` (`user_roles_id`);

--
-- Index pour la table `users_communications`
--
ALTER TABLE `users_communications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_communications_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users_communications`
--
ALTER TABLE `users_communications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_roles_id_foreign` FOREIGN KEY (`user_roles_id`) REFERENCES `userrole` (`id`);

--
-- Contraintes pour la table `users_communications`
--
ALTER TABLE `users_communications`
  ADD CONSTRAINT `users_communications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
