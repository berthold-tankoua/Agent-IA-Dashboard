-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 30 nov. 2025 à 20:13
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agentia`
--

-- --------------------------------------------------------

--
-- Structure de la table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_img` text DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `desc1` text DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `desc2` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkeldin_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `api_credentials`
--

CREATE TABLE `api_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_page_id` varchar(255) DEFAULT NULL,
  `meta_instagram_id` varchar(255) DEFAULT NULL,
  `meta_acces_token` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auto_publishes`
--

CREATE TABLE `auto_publishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `social_media` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `prompt` text DEFAULT NULL,
  `media_url` varchar(255) DEFAULT NULL,
  `modif_img` varchar(10) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `auto_publishes`
--

INSERT INTO `auto_publishes` (`id`, `user_id`, `social_media`, `title`, `slug`, `prompt`, `media_url`, `modif_img`, `extension`, `description`, `status`, `publish_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'All', 'Feodal Japon art', 'feodal-japon-art', 'genere une video a partir de l\'image fourni', 'upload/medias/videos/1840713473806639.jpeg', '0', 'video', 'Illustration de anime d\'une image feodal', 'Attente', '2025-08-17 13:32:43', '2025-08-17 13:32:43', NULL),
(2, 1, 'All', 'Feodal Japon fan-art', 'feodal-japon-fan-art', 'À partir de l’image fournie, génère une courte vidéo de 10 secondes.\r\nL’image doit être utilisée comme point central', 'upload/medias/videos/1840715925130941.jpeg', '0', 'video', 'Animation d\'une fresque médiéval epique', 'Attente', '2025-08-18 11:00:00', '2025-08-17 14:11:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `others` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc1` text DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_comments`
--

CREATE TABLE `media_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `social_media` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `agent_ia` int(10) NOT NULL DEFAULT 0,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_comments`
--

INSERT INTO `media_comments` (`id`, `user_id`, `social_media`, `post_id`, `comment_id`, `message`, `agent_ia`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'facebook', '107858398796400_697220113189241', '697220113189241_1607358829942840', 'Agency ai', 0, 'Attente', '2025-07-06 21:27:12', '2025-07-06 21:27:12'),
(2, 1, 'facebook', '107858398796400_697220113189241', '697220113189241_594437547039083', 'Agent IA', 0, 'Attente', '2025-07-06 21:27:12', '2025-07-06 21:27:12'),
(3, 1, 'facebook', '107858398796400_696023466642239', '696023466642239_1226411915926034', 'Quel accomplissements', 0, 'Attente', '2025-07-06 21:27:13', '2025-07-06 21:27:13'),
(4, 1, 'facebook', '107858398796400_696023466642239', '696023466642239_741871975192518', '🔥 *SUPER QASH – LA CLÉ DE LA RÉUSSITE*\n\nhttps://super-qash.com/reg/NGAKODuval\n\n*LA PREMIÈRE DES CHOSES À SAVOIR  LUNAQASH EST UN SITE DE SERVICE📥 ET NON D\'INVESTISSEMENT❌*\n\n💸 *Le projet qui change les règles, c’est SUPER QASH!* 💸🥳\n📌 *Inscription: 2800 FCFA* ✅🔥\n🚀 *Aucun frais caché, tout est clair et transparent!*\n\n💰 *COMMENT GAGNER DE L’ARGENT AVEC SUPER QASH?*\n1️⃣ *Regardez des vidéos YouTube et TikTok (10 secondes max)*\n2️⃣ *Jouez au casino 🎰 ou faites des spins*\n3️⃣ *Répondez à des quiz et soyez payés*\n\n🌟 *SUPER QASH AGENCIES VOUS OFFRE AUSSI DES FORMATIONS UNIQUES:*\n✅ *Création de logos et flyers pour votre business*\n✅ *Ajout automatique de 1,000 à 2,000 contacts chaque semaine* pour booster votre visibilité\n✅ *Formation à la création de cartes de visite digitales* 🔥🥳\n✅ *Maîtrise des applications CapCut, Canva, InShot et bien d’autres*\n✅ *Booster vos comptes TikTok, Facebook, etc., gratuitement*\n✅ *Formation en trading avec tutoriels suivis*\n✅ *Achat et vente depuis la Chine*\n\n📢 *SYSTÈME D’AFFILIATION – DES COMMISSIONS À CHAQUE RECOMMANDATION!*\n💰 *Si tu t’inscris et que tu parraines quelqu’un, voici ce que tu gagnes:*\n\n1️⃣ *Jean s’inscrit et envoie son lien à Paul → Jean reçoit 1,700 FCFA 🔥*\n2️⃣ *Paul s’inscrit et envoie son lien à Pierre → Paul reçoit 1,700 FCFA et Jean 750 FCFA 🚀*\n3️⃣ *Pierre s’inscrit et envoie son lien à Marie → Pierre reçoit 1,700 FCFA, Paul 750 FCFA et Jean 350 FCFA 💰*\n\n✅ *Niveau 1: 1,700 FCFA*\n✅ *Niveau 2: 750 FCFA*\n✅ *Niveau 3: 350 FCFA*\n\n🚀 *Avec SUPER QASH, tu peux gagner au moins 10,000 FCFA par jour, sans compter les formations offertes!*\n📌 *Avec seulement 2 800 FCFA, tu accèdes à une opportunité UNIQUE!*\n\n🔥 *SUPER QASH n’est pas un système Ponzi, c’est un business d’affiliation sérieux!*\n💰 *Les retraits sont disponibles 7j/7 et 24h/24, sans interruption!*\n\n👊 *Inscrivez-vous, activez votre compte et prenez votre avenir en main!*\n💡 *Esprit de guerrier, mental de titan – la réussite est entre vos mains!* 🚀🔥🙌\nLET’S GO! 💯🔥🔥\n*Ne regarde pas les autres réussir… Fais partie de ceux qui gagnent!*\n💸 *SUPER QASH, C’EST LA CLÉ DU SUCCÈS!*\n🚀🔥🙌\n\nhttps://super-qash.com/reg/NGAKODuval', 0, 'Attente', '2025-07-06 21:27:13', '2025-07-06 21:27:13');

-- --------------------------------------------------------

--
-- Structure de la table `media_posts`
--

CREATE TABLE `media_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `social_media` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_posts`
--

INSERT INTO `media_posts` (`id`, `user_id`, `social_media`, `post_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'facebook', '107858398796400_699965272914725', '📱✨ Vous voulez augmenter la visibilité de votre business et attirer de nouveaux clients ?\nJe vous propose un service complet pour booster votre présence en ligne grâce à une page Facebook professionnelle bien optimisée et des campagnes publicitaires efficaces.\n✅ Création ou optimisation de votre page Facebook\n✅ Visuels et textes percutants pour capter l’attention\n✅ Publicités ciblées pour toucher les bons clients\n✅ Stratégie adaptée à votre secteur d’activité\n✅ Suivi des performances et ajustements réguliers\n🎯 Gagnez en visibilité, attirez plus de prospects, et développez vos ventes grâce à une présence digitale maîtrisée.\n📲 Contactez-moi dès maintenant pour faire passer votre business à un autre niveau !', 'Attente', '2025-07-07 09:32:38', '2025-07-07 09:32:38'),
(7, 1, 'facebook', '107858398796400_698876136356972', 'Initiez-vous à l\'IA et automatisez vos tâches\nInitiez-vous à l\'IA et automatisez vos tâches efficacement\nFormation : Initiez-vous à l\'IA et automatisez vos tâches efficacement ! 🚀🤖\nL’intelligence artificielle (IA) révolutionne notre façon de travailler, et vous pouvez en tirer parti dès aujourd’hui ! Cette formation vidéo vous guide pas à pas pour comprendre les bases de l’IA et apprendre à automatiser vos tâches quotidiennes. Que vous soyez entrepreneur, marketeur ou simplement curieux, cette formation vous permettra de gagner du temps et d’optimiser votre productivité grâce à des outils accessibles et performants.', 'Attente', '2025-07-07 09:32:39', '2025-07-07 09:32:39'),
(8, 1, 'facebook', '107858398796400_697220113189241', '🤖 Découvrez la puissance des Agents IA : Une révolution pour votre activité en 2025\nVous êtes entrepreneur, commerçant, prestataire de services, ou simplement débordé par des tâches répétitives ?\nVous entendez parler de l’intelligence artificielle partout, mais vous ne savez pas par où commencer ?\n\n➡️ https://shopixup.com/agent-ia\n\n🚀 Pourquoi se lancer en 2025 ?\nL’année 2025 marque une accélération mondiale de l’automatisation dans tous les secteurs : commerce, services, santé, éducation, communication…\nCeux qui maîtrisent l’IA dès maintenant auront un avantage concurrentiel décisif.\n💵 Nos offres\n🎓 Formation \"Découvrir et utiliser un Agent IA\"\n\n👉 Tarif : 5 000 FCFA seulement\n⏱️ Durée : 100 % en ligne\n🎯 Objectif : Comprendre comment fonctionne un Agent IA et comment il peut vous faire gagner du temps.\n\n🔧 Création & mise en place d’un Agent IA personnalisé\n\n👉 À partir de 50 000 FCFA (selon complexité)\nInclus : paramétrage, tests, configuration, accès à votre tableau de contrôle.\n\n❌ Ceux qui ne s’adaptent pas continueront à perdre du temps, de l’énergie, et de l’argent.\n\n✅ Un Agent IA bien configuré vous permet de :\n\nAutomatiser vos tâches chronophages\n\nRépondre rapidement à vos clients\n\nTravailler même pendant vos absences\n\nRéduire les erreurs humaines\n\nOptimiser vos ressources', 'Attente', '2025-07-07 09:32:39', '2025-07-07 09:32:39'),
(9, 1, 'facebook', '107858398796400_696023466642239', 'Vous êtes entrepreneur, une entreprise ou simplement débordé par des tâches répétitives ?\n🎯 Ne perdez plus de temps. Grâce à un Agent IA sur mesure, vous pouvez :\n✅ Automatiser vos tâches quotidiennes\n✅ Améliorer votre productivité\n✅ Réduire vos coûts\n✅ Travailler 24h/24, même quand vous dormez !\n⚙️ Exemples de tâches qu’on peut automatiser :\n💬 Répondre automatiquement à vos clients (chat, e-mail)\n➡️ Fournit des réponses instantanées et cohérentes à vos clients, 24h/24, même en dehors des heures de travail.\n📅 Planifier et publier sur vos réseaux sociaux\n➡️ Automatise vos publications sur Facebook, Instagram, LinkedIn, etc. selon un calendrier défini, sans que vous ayez à intervenir.\n📊 Créer des rapports automatiquement\n➡️ Génère des rapports (ventes, performances, suivi d’activité...) à intervalle régulier pour vous aider à piloter votre activité sans effort.\n⏰ Gérer vos rendez-vous et relances\n➡️ Envoie automatiquement des rappels, confirmations ou suivis par e-mail ou SMS pour ne rater aucune opportunité.\n📂 Vous assister dans la gestion de projets ou documents\n➡️ Organise, classe, et vous rappelle les tâches à faire ou les documents importants à traiter, selon vos priorités.\n📈 Analyser vos données pour de meilleures décisions\n➡️ Regroupe et interprète vos données clés (clients, ventes, interactions...) pour vous aider à prendre des décisions stratégiques basées sur des faits.', 'Attente', '2025-07-07 09:32:39', '2025-07-07 09:32:39'),
(10, 1, 'facebook', '107858398796400_695998949978024', '📝 Description principale :\nVous êtes entrepreneur, une entreprise ou simplement débordé par des tâches répétitives ?\n🎯 Ne perdez plus de temps. Grâce à un Agent IA sur mesure, vous pouvez :\n✅ Automatiser vos tâches quotidiennes\n✅ Améliorer votre productivité\n✅ Réduire vos coûts\n✅ Travailler 24h/24, même quand vous dormez !\n\n⚙️ Exemples de tâches qu’on peut automatiser :\n\n💬 Répondre automatiquement à vos clients (chat, e-mail)\n➡️ Fournit des réponses instantanées et cohérentes à vos clients, 24h/24, même en dehors des heures de travail.\n\n📅 Planifier et publier sur vos réseaux sociaux\n➡️ Automatise vos publications sur Facebook, Instagram, LinkedIn, etc. selon un calendrier défini, sans que vous ayez à intervenir.\n\n📊 Créer des rapports automatiquement\n➡️ Génère des rapports (ventes, performances, suivi d’activité...) à intervalle régulier pour vous aider à piloter votre activité sans effort.\n\n⏰ Gérer vos rendez-vous et relances\n➡️ Envoie automatiquement des rappels, confirmations ou suivis par e-mail ou SMS pour ne rater aucune opportunité.\n\n📂 Vous assister dans la gestion de projets ou documents\n➡️ Organise, classe, et vous rappelle les tâches à faire ou les documents importants à traiter, selon vos priorités.\n\n📈 Analyser vos données pour de meilleures décisions\n➡️ Regroupe et interprète vos données clés (clients, ventes, interactions...) pour vous aider à prendre des décisions stratégiques basées sur des faits.', 'Attente', '2025-07-07 09:32:39', '2025-07-07 09:32:39'),
(11, 1, 'instagram', '18063335299627608', 'publication Instagram', 'Attente', '2025-07-08 08:02:01', '2025-07-08 08:02:01'),
(12, 1, 'instagram', '18022354601379182', 'publication Instagram', 'Attente', '2025-07-08 08:02:01', '2025-07-08 08:02:01'),
(13, 1, 'instagram', '18028050980254669', 'publication Instagram', 'Attente', '2025-07-08 08:02:01', '2025-07-08 08:02:01'),
(14, 1, 'instagram', '18023363300369907', 'publication Instagram', 'Attente', '2025-07-08 08:02:01', '2025-07-08 08:02:01'),
(15, 1, 'instagram', '17909493249004154', 'publication Instagram', 'Attente', '2025-07-08 08:02:01', '2025-07-08 08:02:01');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_03_02_224015_create_sessions_table', 1),
(12, '2024_03_06_121118_create_categories_table', 1),
(13, '2024_03_09_100745_create_abouts_table', 1),
(14, '2024_03_10_191355_create_push_subscriptions_table', 1),
(15, '2025_06_23_122244_create_auto_publishes_table', 1),
(16, '2025_07_06_191759_create_media_comments_table', 2),
(17, '2025_07_06_201230_create_media_posts_table', 2),
(18, '2025_07_08_212914_create_api_credentials_table', 3),
(19, '2025_08_17_093945_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cCr9dvrdQBkaKSLZmXNsHxZaPktajBr2dVzf1hpP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia0RpWGh1cnZZTUdJUkN6dVJlSHBaQmNBeEJsb1JXQ2oyTG9YNzBxbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL25vdGlmaWNhdGlvbi92aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkYmgzaFhSc2QuL2xKV29LeDI2LmhUZXp0ZFBWVnRwaDBPRUJHU0hVSkwvZTBUQ2pRZlB2aGEiO30=', 1755500255),
('YkzfFT8k4fHMl7u0FNg1TmZNpp6NvEm0JVdKONIQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQXlZT09wR0ZPeTBnZW5zclBNTHZHcnhRckxRTVVKaWVxQ3gzS0pZaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZC92aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ub3RpZmljYXRpb24vdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkYmgzaFhSc2QuL2xKV29LeDI2LmhUZXp0ZFBWVnRwaDBPRUJHU0hVSkwvZTBUQ2pRZlB2aGEiO30=', 1755459287);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Brecht', 'brtankoua@gmail.com', NULL, '$2y$10$bh3hXRsd./lJWoKx26.hTeztdPVVtph0OEBGSHUJL/e0TCjQfPvha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `api_credentials`
--
ALTER TABLE `api_credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_credentials_meta_page_id_unique` (`meta_page_id`),
  ADD UNIQUE KEY `api_credentials_meta_instagram_id_unique` (`meta_instagram_id`),
  ADD UNIQUE KEY `api_credentials_meta_acces_token_unique` (`meta_acces_token`) USING HASH;

--
-- Index pour la table `auto_publishes`
--
ALTER TABLE `auto_publishes`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `media_comments`
--
ALTER TABLE `media_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_posts`
--
ALTER TABLE `media_posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Index pour la table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT pour la table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `api_credentials`
--
ALTER TABLE `api_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `auto_publishes`
--
ALTER TABLE `auto_publishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media_comments`
--
ALTER TABLE `media_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `media_posts`
--
ALTER TABLE `media_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
