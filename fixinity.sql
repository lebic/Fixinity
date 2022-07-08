-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 27. Jun 2022 um 16:29
-- Server-Version: 5.7.34
-- PHP-Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fixinity`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_115948_create_offers_table', 1),
(6, '2022_06_13_115948_create_request_table', 1),
(7, '2022_06_13_115949_add_foreign_keys_to_offers_table', 1),
(8, '2022_06_13_115949_add_foreign_keys_to_request_table', 1),
(9, '2022_06_14_125149_contacts', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `estimated_price` int(11) NOT NULL,
  `estimated_start_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_end_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `offerstatus` enum('pending','accepted','close') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `offers`
--

INSERT INTO `offers` (`id`, `owner_id`, `request_id`, `estimated_price`, `estimated_start_time`, `estimated_end_time`, `offerstatus`) VALUES
(3, 1, 1, 333, '2022-06-26', '2022-06-26', 'close'),
(4, 2, 1, 333, '2022-06-26', '2022-06-26', 'pending'),
(5, 1, 2, 4444, '2022-06-27', '2022-06-27', 'pending'),
(6, 1, 2, 22223, '2022-06-27', '2022-06-27', 'pending');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('interior','exterior','both','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` enum('plumbery','hvac','electricity') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` enum('open','pending','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `request`
--

INSERT INTO `request` (`id`, `title`, `description`, `pictures`, `type`, `categories`, `date`, `status`, `users_id`, `company_id`) VALUES
(1, 'Broken Pipe', 'Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.Hello my Pipe is broken in the heating room.', 'https://img.freepik.com/free-photo/shocked-woman-calling-plumber-while-collecting-water-leaking-from-ceiling-using-utensil_657921-1199.jpg?t=st=1656256779~exp=1656257379~hmac=c1fcf86c92fc6a44b64ad5a4395f5e2768d50cb1532bb510f8774cdafe6c4bfc&w=2000', 'interior', 'plumbery', '2022-06-29', 'open', 2, NULL),
(2, 'Broken Water outlet', 'Hello my Water is broken', 'https://img.freepik.com/free-photo/natural-disasters-street-was-flooded-heavy-rains-no-body_673198-1035.jpg?w=2000', 'both', 'plumbery', '2022-06-27', 'open', 3, NULL),
(3, 'Broken Water outlet', 'Hello my Water is broken', 'https://img.freepik.com/free-photo/natural-disasters-street-was-flooded-heavy-rains-no-body_673198-1035.jpg?w=2000', 'both', 'plumbery', '2022-06-27', 'open', 3, NULL),
(4, 'Broken Water outlet', 'Hello my Water is broken', 'https://img.freepik.com/free-photo/natural-disasters-street-was-flooded-heavy-rains-no-body_673198-1035.jpg?w=2000', 'both', 'plumbery', '2022-06-27', 'open', 3, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` bigint(20) NOT NULL,
  `address_number` int(11) NOT NULL,
  `address_road` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country` enum('Luxembourg','Belgique','Allemagne','France') COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva_number` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('plumbery','hvac','electricity') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('client','company') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `profile_picture`, `phone_number`, `address_number`, `address_road`, `town`, `zipcode`, `country`, `company_name`, `tva_number`, `role`, `category`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bob(Company)', 'Dahl', 'https://img.freepik.com/free-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg?w=2000', 5252883622, 10, 'rue des bois', 'Luxembourg', 2427, 'Luxembourg', 'Plumermy', NULL, 'CEO', 'plumbery', 'company', 'bob@bob.com', NULL, '$2y$10$spj2prVTyPtCLWcpg2O4rurxFHHrChxGbWJJ7aUVXsDqSWlHK..iC', NULL, '2022-06-26 13:12:06', '2022-06-26 13:12:06'),
(2, 'Max', 'Musterman', 'https://img.freepik.com/free-photo/portrait-cheerful-attractive-young-woman-longsleeve-standing-with-arms-crossed-smiling_295783-39.jpg?t=st=1656256614~exp=1656257214~hmac=d6b7d3bc358085d4aa90ee15d929e754f15a32a5a973fda1f4bcc7d000bbdc01&w=2000', 242627222, 10, 'rue des sources', 'Strassen', 26272, 'Luxembourg', 'Strassen', NULL, NULL, NULL, 'client', 'max@max.com', NULL, '$2y$10$4zs4tas0MEAnBzx6T.omCebCDD.tdr34kNMjOfkWKf3BNbU45XkVm', NULL, '2022-06-26 13:13:08', '2022-06-26 13:13:08'),
(3, 'Peter', 'Verdura', 'https://img.freepik.com/free-photo/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction_176420-15187.jpg?t=st=1656256614~exp=1656257214~hmac=c56da1bf8199a29cecf674fe052cc579a1b7e7cdb1ac66da5f57fdf00b3fe347&w=2000', 2627282, 192, 'rue des mines', 'Bertrange', 2525, 'Luxembourg', 'Bertrange', NULL, NULL, NULL, 'client', 'peter@peter.com', NULL, '$2y$10$2D0B6S/Flr.sYozS1JWr.ORB6nQKGROwJbFT/rfBfOk43UbPM0uSG', NULL, '2022-06-26 13:14:36', '2022-06-26 13:14:36');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`owner_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indizes für die Tabelle `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `request2_id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`),
  ADD CONSTRAINT `users2_id` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `company3_id` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users3_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
