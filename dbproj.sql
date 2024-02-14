-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 fév. 2024 à 11:38
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbproj`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_31_105652_create_sondages_table', 2),
(7, '2024_01_31_142448_add_programme_politique_id_to_sondages_table', 3),
(8, '2024_01_31_142731_add_programme_politique_id_to_sondages_table', 4),
(9, '2024_01_31_144111_add_programme_politique_id_to_users_table', 5),
(10, '2024_01_31_151643_create_sondages_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE `sondages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `programme_politique_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sondages`
--

INSERT INTO `sondages` (`id`, `user_id`, `programme_politique_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '2024-01-31 15:43:37', '2024-01-31 15:43:37'),
(2, 1, 6, 2, '2024-01-31 15:44:22', '2024-01-31 15:44:22'),
(3, 1, 7, 3, '2024-01-31 16:10:15', '2024-01-31 16:10:15'),
(4, 8, 4, 2, '2024-01-31 16:19:57', '2024-01-31 16:19:57'),
(5, 8, 7, 1, '2024-01-31 16:20:08', '2024-01-31 16:20:08'),
(6, 8, 5, 2, '2024-01-31 16:30:45', '2024-01-31 16:30:45'),
(7, 9, 4, 1, '2024-02-05 08:06:09', '2024-02-05 08:06:09'),
(8, 9, 6, 3, '2024-02-05 08:19:14', '2024-02-05 08:19:14'),
(9, 8, 6, 3, '2024-02-10 15:05:24', '2024-02-10 15:05:24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `programme_politique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `programme_politique`, `remember_token`, `created_at`, `updated_at`, `parti`) VALUES
(1, 'Anta', 'anta@gmail.com', NULL, '$2y$12$fOMMGT.LdqMU9FxhlRZ8sOvFH3LCGPtLwcq9ur03PqApPB7pugkBC', 0, NULL, NULL, '2024-01-28 22:19:43', '2024-01-28 22:19:43', NULL),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$n6P6qNmneNN9ceawBnf5XOTZDxpagwfSAFy5TNwLNNt4xoMHX1mnu', 1, NULL, NULL, '2024-01-28 23:05:27', '2024-01-28 23:05:27', NULL),
(4, 'Sonko', 'sonko@gmail.com', NULL, '$2y$12$1R.azDKDTAPdwHVJBFxACenhCIZCsm6Ld85IY2qhqNmkD817YpMRy', 2, 'Éducation Prioritaire\r\nRenforcement du système éducatif pour assurer une éducation de qualité à tous.\r\nInvestissement dans la formation des enseignants et l\'amélioration des infrastructures scolaires.\r\nPromotion de l\'éducation numérique et des programmes', NULL, '2024-01-29 10:33:24', '2024-01-30 14:51:39', 'PASTEF'),
(5, 'Amy', 'amy@gmail.com', NULL, '$2y$12$pEbMLrX7uebPmEddeV61UOSXwKqzUcDJFEoRoVOmu89KPx5KcK7MG', 2, 'Transition vers une économie verte pour lutter contre le changement climatique.\r\nEncouragement des énergies renouvelables et réduction de la dépendance aux combustibles fossiles.\r\nPromotion de pratiques agricoles durables et protection de la biodiversité.', NULL, '2024-01-29 16:00:27', '2024-01-30 14:54:51', 'YEWO'),
(6, 'Diediou', 'diediou@gmail.com', NULL, '$2y$12$9gm.FlLHks2qNmOySakfvupCK/8DgFx4ukIQcisZCFVaIGgRjQkVm', 2, 'Soutien à la recherche et développement.\nPromotion de l\'innovation dans les secteurs technologiques.\nInvestissement dans l\'éducation STEM (science, technologie, ingénierie et mathématiques).', NULL, '2024-01-30 12:47:13', '2024-01-30 12:47:13', 'Pastef'),
(7, 'Doudou', 'doudou@gmail.com', NULL, '$2y$12$d7xS8xZsl47VeN1yvV4az.CCt0LWh6/p8HzPc40ieSJNm..c6MCta', 2, 'Modernisation des infrastructures routières et des transports en commun.\r\nDéveloppement des infrastructures numériques (internet haut débit, technologies de l\'information).\r\nAmélioration de l\'accès à l\'eau potable et à l\'assainissement.', NULL, '2024-01-30 15:12:21', '2024-01-30 15:12:21', 'TEKI'),
(8, 'sophie', 'sophie@gmail.com', NULL, '$2y$12$dtRNl3O2/kQnXduW/X7Rl.X8//VrMvNTfXTEjAkwU01ikrsiskxmO', 0, NULL, NULL, '2024-01-30 15:22:21', '2024-01-30 15:22:21', NULL),
(9, 'Amath', 'amath@gmail.com', NULL, '$2y$12$TfixDk2ftmhLhGCIcMC9cuK3Azc4PVFSDfGQY6qbyxtjiM9AL3ONm', 0, NULL, NULL, '2024-01-30 15:22:44', '2024-01-30 15:22:44', NULL);

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Index pour la table `sondages`
--
ALTER TABLE `sondages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sondages`
--
ALTER TABLE `sondages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
