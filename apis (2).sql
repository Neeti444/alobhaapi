-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 01:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apis`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `repository_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `repository_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'etst', '2025-07-11 01:35:31', '2025-07-11 01:35:31'),
(2, 3, 'repository', '2025-07-30 08:28:57', '2025-07-29 08:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `file_versions`
--

CREATE TABLE `file_versions` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `version` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_versions`
--

INSERT INTO `file_versions` (`id`, `file_id`, `file_path`, `version`, `created_at`, `updated_at`) VALUES
(1, 1, 'repository_2/1/v1/QA8qCc00WZfJDl9Wwias5mby7UAPS6opSbAxrSVT.pdf', 1, '2025-07-11 01:35:32', '2025-07-11 01:35:32'),
(2, 2, 'repository_2/1/v1/QA8qCc00WZfJDl9Wwias5mby7UAPS6opSbAxrSVT.pdf', 2, '2025-07-30 08:29:32', '2025-07-30 08:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_applied` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `expected_ctc` varchar(255) DEFAULT NULL,
  `current_ctc` varchar(255) DEFAULT NULL,
  `notice_period` varchar(255) DEFAULT NULL,
  `total_exp` varchar(255) DEFAULT NULL,
  `name_of_company` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`name_of_company`)),
  `qualification` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`qualification`)),
  `strengths` varchar(255) DEFAULT NULL,
  `improvement` varchar(255) DEFAULT NULL,
  `leaving_reason` varchar(255) DEFAULT NULL,
  `ach_last_com` varchar(255) DEFAULT NULL,
  `future_add` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `post_applied`, `name`, `dob`, `address`, `contact`, `email`, `expected_ctc`, `current_ctc`, `notice_period`, `total_exp`, `name_of_company`, `qualification`, `strengths`, `improvement`, `leaving_reason`, `ach_last_com`, `future_add`, `reference`, `created_at`, `updated_at`) VALUES
(1, 'Impedit ipsum labor', 'Richard Gibson', '2017-06-14', 'Autem et excepteur s', 'Tempor porro ex fugi', 'dafasif@mailinator.com', '43', '32', 'Commodo voluptas con', 'Earum et non incidid', '[\"Wipro\",\"Other\"]', '[\"MCA\",\"MBA\"]', 'Et irure dolor atque', 'Lorem est sed eu odi', 'Libero iste omnis ve', 'Corrupti aut eiusmo', 'Et necessitatibus vo', 'Provident voluptate', '2025-07-02 02:32:53', '2025-07-02 02:32:53'),
(2, 'Impedit ipsum labor', 'Richard Gibson', '2017-06-14', 'Autem et excepteur s', 'Tempor porro ex fugi', 'dafasif@mailinator.com', '43', '32', 'Commodo voluptas con', 'Earum et non incidid', '[\"Wipro\",\"Other\"]', '[\"MCA\",\"MBA\"]', 'Et irure dolor atque', 'Lorem est sed eu odi', 'Libero iste omnis ve', 'Corrupti aut eiusmo', 'Et necessitatibus vo', 'Provident voluptate', '2025-07-02 02:33:01', '2025-07-02 02:33:01'),
(3, 'Quod nihil quam saep', 'Renee Orr', '2013-06-19', 'Eiusmod tempor minus', 'Dignissimos consequa', 'pameteno@mailinator.com', '14', '18', 'Amet dolor iste inv', 'Laudantium autem do', '[\"Infosys\",\"Other\"]', '[\"Other\"]', 'Lorem aut enim volup', 'Tempore vel possimu', 'Dolorem cumque sunt', 'Exercitationem enim', 'Ut consectetur iste', 'Officia consequuntur', '2025-07-02 02:33:08', '2025-07-02 02:33:08'),
(4, 'Quod nihil quam saep', 'Renee Orr', '2013-06-19', 'Eiusmod tempor minus', 'Dignissimos consequa', 'pameteno@mailinator.com', '14', '18', 'Amet dolor iste inv', 'Laudantium autem do', '[\"Infosys\",\"Other\"]', '[\"Other\"]', 'Lorem aut enim volup', 'Tempore vel possimu', 'Dolorem cumque sunt', 'Exercitationem enim', 'Ut consectetur iste', 'Officia consequuntur', '2025-07-02 02:34:14', '2025-07-02 02:34:14'),
(5, 'Quod nihil quam saep', 'Renee Orr', '2013-06-19', 'Eiusmod tempor minus', 'Dignissimos consequa', 'pameteno@mailinator.com', '14', '18', 'Amet dolor iste inv', 'Laudantium autem do', '[\"Infosys\",\"Other\"]', '[\"Other\"]', 'Lorem aut enim volup', 'Tempore vel possimu', 'Dolorem cumque sunt', 'Exercitationem enim', 'Ut consectetur iste', 'Officia consequuntur', '2025-07-02 02:34:18', '2025-07-02 02:34:18'),
(6, 'Ad aut dolorum quis', 'Shaeleigh Bean', '1975-04-12', 'Dolorum deserunt ips', 'Ducimus commodi sun', 'voqevoqel@mailinator.com', '98', '4', 'Eveniet in quia dic', 'Et mollit in et recu', '[\"Infosys\"]', '[\"MCA\",\"Other\"]', 'Eum ut aliqua Dolor', 'Pariatur Iste praes', 'Tenetur ipsum labori', 'Sunt soluta perspici', 'Aut cillum sed vel i', 'Aperiam labore saepe', '2025-07-02 02:37:22', '2025-07-02 02:37:22'),
(7, 'Ad aut dolorum quis', 'Shaeleigh Bean', '1975-04-12', 'Dolorum deserunt ips', 'Ducimus commodi sun', 'voqevoqel@mailinator.com', '98', '4', 'Eveniet in quia dic', 'Et mollit in et recu', '[\"Infosys\"]', '[\"MCA\",\"Other\"]', 'Eum ut aliqua Dolor', 'Pariatur Iste praes', 'Tenetur ipsum labori', 'Sunt soluta perspici', 'Aut cillum sed vel i', 'Aperiam labore saepe', '2025-07-02 02:38:38', '2025-07-02 02:38:38'),
(8, 'Ad aut dolorum quis', 'Shaeleigh Bean', '1975-04-12', 'Dolorum deserunt ips', 'Ducimus commodi sun', 'voqevoqel@mailinator.com', '98', '4', 'Eveniet in quia dic', 'Et mollit in et recu', '[\"Infosys\"]', '[\"MCA\",\"Other\"]', 'Eum ut aliqua Dolor', 'Pariatur Iste praes', 'Tenetur ipsum labori', 'Sunt soluta perspici', 'Aut cillum sed vel i', 'Aperiam labore saepe', '2025-07-02 02:40:08', '2025-07-02 02:40:08'),
(9, 'Est deleniti commodi', 'Shelley Hinton', '2025-11-16', 'Eligendi quia quis c', 'Neque aliqua Quo qu', 'jakyhyvyt@mailinator.com', '13', '72', 'Quae ut ut est non v', 'Vero perferendis aut', '[\"Infosys\",\"Other\"]', '[\"MCA\",\"MBA\"]', 'Sapiente aut sequi q', 'Quasi commodi nulla', 'Quasi repudiandae te', 'Labore recusandae A', 'Perferendis consequa', 'Incidunt sint amet', '2025-07-02 02:40:24', '2025-07-02 02:40:24'),
(10, 'Est deleniti commodi', 'Shelley Hinton', '2025-11-16', 'Eligendi quia quis c', 'Neque aliqua Quo qu', 'jakyhyvyt@mailinator.com', '13', '72', 'Quae ut ut est non v', 'Vero perferendis aut', '[\"Infosys\",\"Other\"]', '[\"MCA\",\"MBA\"]', 'Sapiente aut sequi q', 'Quasi commodi nulla', 'Quasi repudiandae te', 'Labore recusandae A', 'Perferendis consequa', 'Incidunt sint amet', '2025-07-02 02:40:29', '2025-07-02 02:40:29'),
(11, 'Consequatur laudant', 'Nathan Sellers', '2003-05-01', 'Ea asperiores vitae', 'Occaecat at vel et e', 'gijoficu@mailinator.com', '15', '72', 'Quo placeat dolores', 'In autem ut qui dolo', '[\"TCS\",\"Wipro\",\"Other\"]', '[\"MBA\"]', 'Dolorem voluptate do', 'Amet perspiciatis', 'Quis exercitationem', 'Tenetur eius lorem s', 'Consequatur incidid', 'Minus debitis placea', '2025-07-10 01:10:26', '2025-07-10 01:10:26'),
(12, 'Excepturi nihil rati', 'Samantha Stein', '2011-09-14', 'Et ullam cum quibusd', 'Qui non et dicta ven', 'quqefeb@mailinator.com', '6', '32', 'Recusandae Amet ha', 'Nisi minim dignissim', '[\"Wipro\"]', '[\"Other\"]', 'Quod tempore omnis', 'Aut expedita volupta', 'Totam voluptatem Eu', 'Necessitatibus dolor', 'Fugiat expedita ist', 'Consequat Harum tem', '2025-07-10 01:14:58', '2025-07-10 01:14:58'),
(13, 'Iusto error repudian', 'Hadley Collier', '2023-12-24', 'Ut vero assumenda du', 'Odio asperiores et i', 'lafidu@mailinator.com', '2', '98', 'Enim nesciunt elit', 'Harum itaque volupta', '[\"Alobha\"]', '[\"B.Tech\"]', 'Ut anim aliquid temp', 'Illo neque non ea re', 'Culpa eveniet repu', 'Esse provident ut e', 'Cupidatat est vitae', 'Sint natus ut dolore', '2025-07-10 01:27:47', '2025-07-10 01:27:47'),
(14, 'Irure alias exercita', 'Drew Clarke', '1975-02-14', 'In esse obcaecati qu', 'Esse mollitia est ex', 'niruhi@mailinator.com', '72', '44', 'Aliquam laborum Hic', 'Ipsa cillum sunt m', '[\"TCS\"]', '[\"Other\"]', 'Assumenda rerum non', 'Obcaecati aliquid do', 'Anim necessitatibus', 'Sed ad aliquip accus', 'Esse animi recusand', 'Soluta itaque ipsum', '2025-07-10 01:31:21', '2025-07-10 01:31:21'),
(15, 'Irure alias exercita', 'Drew Clarke', '1975-02-14', 'In esse obcaecati qu', 'Esse mollitia est ex', 'niruhi@mailinator.com', '72', '44', 'Aliquam laborum Hic', 'Ipsa cillum sunt m', '[\"TCS\"]', '[\"Other\"]', 'Assumenda rerum non', 'Obcaecati aliquid do', 'Anim necessitatibus', 'Sed ad aliquip accus', 'Esse animi recusand', 'Soluta itaque ipsum', '2025-07-10 01:31:46', '2025-07-10 01:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repositories`
--

CREATE TABLE `repositories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repositories`
--

INSERT INTO `repositories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'MyFirstRepo', '2025-07-10 14:05:21', '2025-07-10 14:05:21'),
(2, 4, 'My First test', '2025-07-11 01:10:43', '2025-07-11 01:10:43'),
(3, 6, 'tyuo', '2025-07-11 02:43:31', '2025-07-11 02:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `repository_logs`
--

CREATE TABLE `repository_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repository_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repository_logs`
--

INSERT INTO `repository_logs` (`id`, `repository_id`, `user_id`, `action`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'test', 'Test log entry', '2025-07-11 04:53:04', '2025-07-11 04:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `repository_user`
--

CREATE TABLE `repository_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repository_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('read','write','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repository_user`
--

INSERT INTO `repository_user` (`id`, `repository_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'admin', '2025-07-11 03:41:06', '2025-07-11 03:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yyy', 'yyu@example.com', '$2y$12$HUSLZlggOm6GGJG1pttqMeqdQnM0RYsD.TGLeykFC/.f3HahVe4Ly', NULL, '2025-07-10 13:50:54', '2025-07-10 13:50:54'),
(2, 'Niti', 'niti@example.com', '$2y$12$VEtS2cQYbecyI3Z/sNz6QeZ8ZiTgoZAirX8Aw83ocbSVHuNfZNymG', NULL, '2025-07-10 13:56:10', '2025-07-10 13:56:10'),
(3, 'Test', 'test@example.com', '$2y$12$vyPIfQpdcEzku94sE5e80eZpXussPPgouRszRfb3xcVD/5OB1WAbK', NULL, '2025-07-10 14:04:27', '2025-07-10 14:04:27'),
(4, 'John Doe', 'john@example.com', '$2y$12$576.eJXxloNRnz2LaP0fIuWjtP.7pVncnuwpHu9C4uWw77jCf1ypK', NULL, '2025-07-11 01:05:07', '2025-07-11 01:05:07'),
(5, 'ff Doe', 'rr@example.com', '$2y$12$RHV0uURvN/buLC3RvsekJ.l4BFZWDCgrwFAdXPh9igx7eqiKB2wA2', NULL, '2025-07-11 02:09:05', '2025-07-11 02:09:05'),
(6, 'rr Doe', 'trt@example.com', '$2y$12$stCXq98pgWiLink9x3r6cubf4mypQFhqxNDgzJyBX2fRGoXph3HF2', NULL, '2025-07-11 02:20:12', '2025-07-11 02:20:12'),
(7, 'Admin', 'admin@example.com', '$2y$12$oewQ/HljysdD/865pI6XpeUfbS6t9RUj2GvPP8jg1wj12ZFTJ4L/O', NULL, '2025-07-11 03:34:07', '2025-07-11 03:34:07'),
(8, 'Admin', 'admin@gmail.com', '$2y$12$3lxGXDaU/10AS6Z1C.uAuuqom6MOkmv8MedFqGbecOnFLoz5IOMUe', NULL, '2025-07-11 04:09:58', '2025-07-11 04:09:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_versions`
--
ALTER TABLE `file_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repositories`
--
ALTER TABLE `repositories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `repository_logs`
--
ALTER TABLE `repository_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_user`
--
ALTER TABLE `repository_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_versions`
--
ALTER TABLE `file_versions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repositories`
--
ALTER TABLE `repositories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `repository_logs`
--
ALTER TABLE `repository_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repository_user`
--
ALTER TABLE `repository_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repositories`
--
ALTER TABLE `repositories`
  ADD CONSTRAINT `repositories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
