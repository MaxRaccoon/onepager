CREATE TABLE `landing_data` (
  `id` int(10) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `key_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `key_value` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `position` int(10) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `image_thumb` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `request` (
  `id` int(10) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `dt_born` datetime DEFAULT NULL,
  `place_born` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `post_address` int(10) DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image_thumb` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(10) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `technology` (
  `id` int(10) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raccoon', 'enot.work@gmail.com', '$2y$10$.xYJunsp2D6psCG4Ldta.uptdqixpFWJpoPLG3IzIKa8.CemGT.2W', 'eXbFRGIw5W5qXi2paFbcwcUT8NkstvTK2qWZfQnCD4yr6lnIBV58fgvQUhqx', '2017-09-27 17:36:41', '2017-09-29 21:57:56');

ALTER TABLE `landing_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_name` (`key_name`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `landing_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `technology`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
