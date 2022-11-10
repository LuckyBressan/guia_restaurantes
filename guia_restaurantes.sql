-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2022 às 21:32
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `guia_restaurantes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_restaurantes`
--

CREATE TABLE `cardapio_restaurantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `restaurante_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cardapio_restaurantes`
--

INSERT INTO `cardapio_restaurantes` (`id`, `nome`, `descricao`, `valor`, `restaurante_id`, `created_at`, `updated_at`) VALUES
(1, 'X-Cheddar', 'Pão, hamburguer, queijo cheddar, alface, cebola', '17.00', 2, '2022-11-08 17:43:44', '2022-11-10 18:34:18'),
(2, 'X-Bacon', 'Pão, Hamburguer, Bacon, Cheddar, Cebola', '20.00', 2, '2022-11-08 18:19:34', '2022-11-08 18:19:34'),
(3, 'X-Vegetariano', 'Pão, Hamburguer Vegetariano, Alface, Cebola Roxa, Tomate', '25.00', 2, '2022-11-08 18:26:46', '2022-11-08 18:26:46'),
(4, 'X-Salada', 'Pão, Hamburguer, Queijo, Tomate, Cebola Roxa, Alface, BBQ', '12.00', 2, '2022-11-08 18:32:33', '2022-11-08 18:32:33'),
(5, 'X-Saudável', 'Pão, hamburguer, tomate, alface, pepino, cebola roxa, queijo', '20.00', 2, '2022-11-08 18:34:53', '2022-11-08 18:34:53'),
(7, 'Pizza de Tomate e Rúcula', 'Mussarela, tomate, rúcula', '40.00', 1, '2022-11-08 19:58:26', '2022-11-08 19:58:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_pai` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `descricao`, `categoria_pai`, `created_at`, `updated_at`) VALUES
(1, 'Restaurantes', NULL, NULL, NULL),
(2, 'Pizzaria', 1, NULL, NULL),
(3, 'Hamburgueria', 1, NULL, NULL),
(4, 'Vegetariano', 1, NULL, NULL),
(5, 'Comida Chinesa', 1, NULL, NULL),
(6, 'Comida Japonesa', 1, NULL, NULL),
(7, 'Bares', NULL, NULL, NULL),
(8, 'Bar Americano', 7, NULL, NULL),
(9, 'Beer Bar', 7, NULL, NULL),
(10, 'Bar Boteco', 7, NULL, NULL),
(11, 'Cyber Café', 7, NULL, NULL),
(12, 'Bar Café', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
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
-- Estrutura da tabela `funcionario_restaurantes`
--

CREATE TABLE `funcionario_restaurantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL,
  `funcao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurante_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario_restaurantes`
--

INSERT INTO `funcionario_restaurantes` (`id`, `nome`, `idade`, `funcao`, `restaurante_id`, `created_at`, `updated_at`) VALUES
(1, 'Jorge Nogueira', 31, 'Chapeiro', 2, NULL, NULL),
(2, 'Rachel Vellez', 24, 'Garçonete', 2, NULL, NULL),
(3, 'Giovanni', 25, 'Garçom', 2, '2022-11-07 18:16:44', '2022-11-07 18:16:44'),
(5, 'Diogo Alberto', 25, 'Pizzaiolo', 1, '2022-11-08 19:50:23', '2022-11-08 19:50:23'),
(6, 'Carlos Nobre', 29, 'Pizzaiolo', 1, '2022-11-08 19:56:58', '2022-11-08 19:56:58'),
(7, 'Lucas Alberto', 30, 'Garçom', 1, '2022-11-09 17:35:26', '2022-11-09 17:35:26'),
(8, 'Rafael Augusto', 30, 'Chapeiro', 2, '2022-11-10 17:57:58', '2022-11-10 19:36:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_10_27_165527_create_restaurantes_table', 1),
(12, '2022_10_28_142835_create_categorias_table', 2),
(13, '2022_10_28_150239_update_table_categorias', 3),
(15, '2022_10_28_151325_update_table_restaurantes', 4),
(16, '2022_11_07_142519_create_funcionario_restaurantes_table', 5),
(17, '2022_11_08_140309_create_cardapio_restaurantes_table', 6),
(18, '2022_11_09_162858_update_tables_users', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
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
-- Estrutura da tabela `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `created_at`, `updated_at`, `nome`, `cidade`, `telefone`, `email`, `categoria_id`, `estado`, `rua`) VALUES
(1, NULL, NULL, 'Pizzaria do Juninho', 'Rio do Sul', '(47) 3532-4564', 'junin@pizza.com', 2, 'SC', 'Alameda Aristiliano Ramos - 54'),
(2, '2022-10-28 19:32:06', '2022-11-09 18:22:39', 'Mishiguene', 'Rio do Sul', '(47) 98845-4382', 'ricardao@hamb.com', 3, 'Santa Catarina', 'Avenida Governador Jorge Lacerda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Lucas', 'lucas.bressan@unidavi.edu.br', NULL, '$2y$10$Mkl3XIKQrPiqUI8VjBjIneTmoDFXnXC618bvAn0/pefUEtbHZM4WO', 'WQrxYTxNs44Fi7rfRXWyX73BKVNAf8am2YAGzOUYzLDxoVxokVajlmAe3rP8', '2022-11-04 16:49:11', '2022-11-04 16:49:11', 1),
(2, 'Natalia', 'Nati@gmail.com', NULL, '$2y$10$22BUjUlh8LA8sN.TzZQ/ie3W25jgTk7.9vbFGdr.Udr1O3/LGcvEG', NULL, '2022-11-09 19:55:25', '2022-11-09 19:55:25', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio_restaurantes`
--
ALTER TABLE `cardapio_restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cardapio_restaurantes_restaurante_id_foreign` (`restaurante_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_categoria_pai_foreign` (`categoria_pai`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `funcionario_restaurantes`
--
ALTER TABLE `funcionario_restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_restaurantes_restaurante_id_foreign` (`restaurante_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantes_categoria_id_foreign` (`categoria_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio_restaurantes`
--
ALTER TABLE `cardapio_restaurantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario_restaurantes`
--
ALTER TABLE `funcionario_restaurantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cardapio_restaurantes`
--
ALTER TABLE `cardapio_restaurantes`
  ADD CONSTRAINT `cardapio_restaurantes_restaurante_id_foreign` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`);

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_categoria_pai_foreign` FOREIGN KEY (`categoria_pai`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `funcionario_restaurantes`
--
ALTER TABLE `funcionario_restaurantes`
  ADD CONSTRAINT `funcionario_restaurantes_restaurante_id_foreign` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`);

--
-- Limitadores para a tabela `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
