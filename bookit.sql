-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Apr 2025 um 17:50
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bookit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `esemeny`
--

CREATE TABLE `esemeny` (
  `esemeny_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(50) NOT NULL,
  `leiras` longtext NOT NULL,
  `hely` varchar(50) NOT NULL,
  `kapacitas` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `foglalastol` int(11) NOT NULL DEFAULT 90,
  `foglalasig` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `esemeny`
--

INSERT INTO `esemeny` (`esemeny_id`, `user_id`, `nev`, `leiras`, `hely`, `kapacitas`, `ar`, `foglalastol`, `foglalasig`, `created_at`, `updated_at`) VALUES
(1, 5, 'Dolore reiciendis id dolore.', 'Maxime consequuntur excepturi corporis rerum. Repellendus aut quia natus atque natus quibusdam numquam. Rerum odit eius repellat voluptatem ipsum quia. Consequatur voluptatum placeat sapiente assumenda ut aut fugiat et.', 'Fritschmouth', 712, 25380, 149, 336, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(2, 7, 'Quaerat provident pariatur.', 'Quia quasi quis et accusamus quisquam suscipit sed est. Aut architecto veritatis consequatur maiores incidunt at. Quasi ut dolorem fugit ut repellendus ipsam laudantium.', 'Otisburgh', 952, 39919, 227, 352, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(3, 7, 'Nihil a dolorem quo.', 'Tempore ab tenetur voluptatibus nostrum blanditiis quia. Amet reprehenderit impedit saepe itaque. Dolorum voluptas veritatis repudiandae. Laborum ullam ut sit. Adipisci ab et aliquid quo quo dolorem neque.', 'Arnaldoville', 478, 6802, 21, 207, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(4, 8, 'Asperiores corrupti consequuntur.', 'Ad dignissimos nam repudiandae architecto nesciunt. Dolorem excepturi ipsam expedita itaque et accusamus. Accusantium fugit voluptatem sed neque placeat corporis suscipit. Consequuntur soluta illum voluptatum ipsa.', 'East Kirsten', 47, 24639, 344, 361, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(5, 3, 'Quae ex qui cumque.', 'Exercitationem corporis vel quis suscipit consectetur distinctio. Dolorem eaque aut ut officiis ut laboriosam quia. Qui error adipisci quia molestiae et ut. Vel voluptatem voluptatem qui numquam quibusdam.', 'Peytonhaven', 894, 34799, 172, 363, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(6, 1, 'Est voluptatum.', 'Aut dignissimos qui aperiam sequi ex distinctio. Cupiditate voluptatem neque vero exercitationem. Autem optio non accusantium accusamus reiciendis assumenda reiciendis. Maiores vero ut eius aut ipsum.', 'South Myrtie', 330, 32157, 34, 117, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(7, 4, 'Quia molestias debitis enim.', 'Rerum non voluptatum deserunt repellendus. Perspiciatis blanditiis quia maxime qui amet beatae et. Expedita at ut velit cum. Voluptatibus ad qui amet debitis aut consequatur.', 'South Jordonburgh', 955, 33440, 327, 357, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(8, 9, 'Quam et dignissimos.', 'Distinctio asperiores soluta accusantium quas facilis architecto. Quis a tenetur doloremque consectetur. Ipsum ea totam ducimus qui odio eaque a omnis. Repellat ipsam hic officiis recusandae repellat quaerat molestiae minus. Dignissimos minus placeat aut sit neque.', 'Rolandostad', 561, 40394, 134, 364, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(9, 2, 'Et ad aut.', 'Et perspiciatis iste nihil expedita. Qui molestiae cumque aut totam necessitatibus. Eaque ea nesciunt eos aut aut eos sit. Sint voluptas quia sapiente ab ratione voluptas reiciendis. Commodi odio sit velit voluptas dolorem.', 'Port Kaelatown', 360, 14191, 241, 290, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(10, 5, 'Reiciendis et repellendus sint.', 'Consequuntur voluptates rem et qui. Adipisci temporibus laudantium et ut praesentium nostrum. Corrupti sint est ipsum et incidunt laudantium veritatis. Qui sint doloribus ex corrupti.', 'Lake Ruben', 881, 29993, 14, 135, '2025-04-29 13:38:22', '2025-04-29 13:38:22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `foglalas`
--

CREATE TABLE `foglalas` (
  `foglalas_id` bigint(20) UNSIGNED NOT NULL,
  `rendezveny_id` bigint(20) UNSIGNED NOT NULL,
  `teljes_nev` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` bigint(20) UNSIGNED NOT NULL,
  `db` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `foglalas`
--

INSERT INTO `foglalas` (`foglalas_id`, `rendezveny_id`, `teljes_nev`, `email`, `telefon`, `db`, `created_at`, `updated_at`) VALUES
(1, 7, 'Mr. Dorcas Brekke', 'nmaggio@example.com', 873716360, 4, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(2, 10, 'Kyleigh Bogisich', 'garret.nienow@example.org', 407951342, 10, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(3, 10, 'Aryanna McCullough Jr.', 'parisian.gretchen@example.org', 811285509, 1, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(4, 6, 'Prof. Lyric Rau V', 'rwitting@example.net', 102081000, 3, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(5, 4, 'Roscoe Keeling', 'edyth.halvorson@example.com', 181819556, 4, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(6, 8, 'Marley Johnson', 'danika.macejkovic@example.net', 217389559, 3, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(7, 3, 'Norene Schaefer', 'will.okey@example.net', 455229377, 10, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(8, 4, 'Miss Shanel Gaylord Sr.', 'vicenta47@example.com', 291361510, 8, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(9, 7, 'Madge Kuhlman', 'lola77@example.org', 849546905, 4, '2025-04-29 13:38:23', '2025-04-29 13:38:23'),
(10, 6, 'Johnnie Rath DDS', 'zondricka@example.com', 184057728, 4, '2025-04-29 13:38:23', '2025-04-29 13:38:23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2025_03_17_181211_create_personal_access_tokens_table', 1),
(3, '2025_04_01_135957_create_esemenies_table', 1),
(4, '2025_04_01_140544_create_rendezs_table', 1),
(5, '2025_04_01_141619_create_foglalas_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rendez`
--

CREATE TABLE `rendez` (
  `rendezveny_id` bigint(20) UNSIGNED NOT NULL,
  `esemeny_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `nyitva` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `rendez`
--

INSERT INTO `rendez` (`rendezveny_id`, `esemeny_id`, `datum`, `nyitva`, `created_at`, `updated_at`) VALUES
(1, 7, '2025-05-15', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(2, 10, '2025-11-11', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(3, 7, '2026-06-24', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23'),
(4, 4, '2025-06-09', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23'),
(5, 10, '2026-09-11', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(6, 2, '2026-01-28', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23'),
(7, 6, '2025-09-07', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23'),
(8, 8, '2025-12-05', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23'),
(9, 10, '2026-12-29', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(10, 5, '2026-11-02', 0, '2025-04-29 13:38:22', '2025-04-29 13:38:23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `vezetek_nev` varchar(50) DEFAULT NULL,
  `kereszt_nev` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `egyeni_vegpont` varchar(5) NOT NULL,
  `telefon` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `vezetek_nev`, `kereszt_nev`, `password`, `egyeni_vegpont`, `telefon`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'testfelhasznalo@test.hu', NULL, 'Test', 'Nev', '$2y$12$a6/vlk9cjT3Ea.VSFd7gnup9jOjv1Io.Ifc6Vtm4tZ1xBuMA1.n9y', '9wx0v', 6121234567, NULL, '2025-04-29 13:38:18', '2025-04-29 13:38:18'),
(2, 'antonia.aufderhar', 'zbartoletti@example.net', NULL, 'Cremin', 'Kameron', '$2y$12$GZzcIQztGslKWxEkRmal1./oN0isnwSJNAEoaGs.9a3sCE1iclbEu', 'hvnx9', 3628194491, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(3, 'alana12', 'predovic.frederique@example.net', NULL, 'Cruickshank', 'Cortney', '$2y$12$jh/JecZkAJVfT6On3N9bjeNckoqvB5cQOs/ZUGskskt1QSfLpvYLy', 'idpbk', 3635387624, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(4, 'cristina85', 'jordon09@example.net', NULL, 'Schulist', 'Jayden', '$2y$12$aVqxgoiL4FdxJ1YpG7DEwePEbjP7YKZFH0UhybM6Wlc2UBIAIHaFa', '2msky', 3615280800, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(5, 'qdare', 'braynor@example.net', NULL, 'Runte', 'Josiane', '$2y$12$z8Q62FjIUXSBSl8Sdw09aOrhzHA/HmMqtPmdlh4MunVwGMiUjTB1m', 'jn9dz', 3682824314, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(6, 'stephon.haag', 'okirlin@example.com', NULL, 'Howe', 'Rosina', '$2y$12$bD0tDQvVd73hWCAVHkYJMuFIrne8Ys6SHYO52KG5wMhXzjM/av9c6', 'npwz9', 3634388117, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(7, 'laurence.weimann', 'ruth.romaguera@example.org', NULL, 'Frami', 'Yadira', '$2y$12$FackZXtGBYQxw/6UoY9tsOAfYiGKTc0U7KM98a6SzxwkYhcOHBVue', 'f2suo', 3686395851, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(8, 'kutch.karianne', 'ofritsch@example.net', NULL, 'Leuschke', 'Ona', '$2y$12$KHAQVR6zymMxZb6TP9l4r.YBwiVbLibOj0mb5c45lT3xLsURC9Z7W', 'cvuxn', 3666648666, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(9, 'savanna76', 'will.donnell@example.org', NULL, 'Hoppe', 'Dewitt', '$2y$12$c6CEOt4J4VJllCCc.Y/dC.F6opXWjwaebXz7rGTA4ifjSoTvliCcy', 'f0ere', 3675785033, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(10, 'willie.schoen', 'wilbert.dickinson@example.org', NULL, 'Fritsch', 'Kylie', '$2y$12$o7XlNx/hshKE4.jhzDF68Orf8eT7/LLtO1FUtGxgbBhhFVJ9SowCi', 'ugfc7', 3615141799, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22'),
(11, 'anderson.concepcion', 'ortiz.sedrick@example.net', NULL, 'Schroeder', 'Jovani', '$2y$12$R1jvYN.sBWJA8PPKurQgX.GZ3DWPGj0PaNV8rqpu8keiey5QN3FMe', 'vhlbj', 3682987184, NULL, '2025-04-29 13:38:22', '2025-04-29 13:38:22');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `esemeny`
--
ALTER TABLE `esemeny`
  ADD PRIMARY KEY (`esemeny_id`),
  ADD KEY `esemeny_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`foglalas_id`),
  ADD KEY `foglalas_rendezveny_id_foreign` (`rendezveny_id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indizes für die Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indizes für die Tabelle `rendez`
--
ALTER TABLE `rendez`
  ADD PRIMARY KEY (`rendezveny_id`),
  ADD KEY `rendez_esemeny_id_foreign` (`esemeny_id`);

--
-- Indizes für die Tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_egyeni_vegpont_unique` (`egyeni_vegpont`),
  ADD UNIQUE KEY `users_telefon_unique` (`telefon`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `esemeny`
--
ALTER TABLE `esemeny`
  MODIFY `esemeny_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglalas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rendez`
--
ALTER TABLE `rendez`
  MODIFY `rendezveny_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `esemeny`
--
ALTER TABLE `esemeny`
  ADD CONSTRAINT `esemeny_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `foglalas`
--
ALTER TABLE `foglalas`
  ADD CONSTRAINT `foglalas_rendezveny_id_foreign` FOREIGN KEY (`rendezveny_id`) REFERENCES `rendez` (`rendezveny_id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `rendez`
--
ALTER TABLE `rendez`
  ADD CONSTRAINT `rendez_esemeny_id_foreign` FOREIGN KEY (`esemeny_id`) REFERENCES `esemeny` (`esemeny_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
