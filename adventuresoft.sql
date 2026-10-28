-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2026 at 11:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adventuresoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `website`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Global FinTech Corp', 'client-1.svg', NULL, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(2, 'HealthCare Plus USA', 'client-2.svg', NULL, 2, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(3, 'Nordic Logistics', 'client-3.svg', NULL, 3, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(4, 'Apex Retail Global', 'client-4.svg', NULL, 4, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(5, 'CyberTrust Security', 'client-5.svg', NULL, 5, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `service_requested` varchar(255) DEFAULT NULL,
  `estimated_budget` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `status` enum('new','in_discussion','closed','spam') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `resume_path` varchar(255) NOT NULL,
  `cover_letter` text DEFAULT NULL,
  `status` enum('pending','reviewed','shortlisted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_postings`
--

CREATE TABLE `job_postings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `job_type` enum('full_time','part_time','contract','remote') NOT NULL DEFAULT 'full_time',
  `experience_level` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL DEFAULT 'Dhaka, Bangladesh',
  `salary_range` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `requirements` longtext NOT NULL,
  `deadline` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`id`, `title`, `slug`, `department`, `job_type`, `experience_level`, `location`, `salary_range`, `description`, `requirements`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Senior Full-Stack Engineer (Laravel & React)', 'senior-full-stack-engineer-laravel-react', 'Engineering', 'full_time', '5+ Years', 'Dhaka, Bangladesh / Hybrid', '৳ 1,50,000 - ৳ 2,50,000 / month', 'We are seeking a Senior Full-Stack Engineer to lead complex web architecture projects for international clients.', '1. 5+ years of hands-on experience in Laravel & Modern React.\n2. Deep knowledge of MySQL optimization & Redis.\n3. Experience with Docker & CI/CD.', '2026-10-03', 1, '2026-08-01 10:29:31', '2026-09-02 21:44:18'),
(2, 'Lead UI/UX & Motion Designer', 'lead-ui-ux-motion-designer', 'Design', 'full_time', '4+ Years', 'Dhaka, Bangladesh / Remote', '৳ 1,20,000 - ৳ 1,80,000 / month', 'Design cutting-edge glassmorphic web & mobile interfaces with rich GSAP animations.', '1. Mastery in Figma, Rive, and GSAP animations.\n2. Proven portfolio of modern SaaS & agency websites.', '2026-10-03', 1, '2026-08-01 10:29:31', '2026-09-02 21:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_08_01_000001_create_adventure_soft_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery_images`)),
  `challenge` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `impact_metrics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`impact_metrics`)),
  `tech_stack` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tech_stack`)),
  `project_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `client_name`, `category`, `thumbnail`, `gallery_images`, `challenge`, `solution`, `impact_metrics`, `tech_stack`, `project_url`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(6, 'CLMS — Certificate & License Management Solution', 'clms-certificate-license-management-solution', 'Local Government Division, Ministry of Local Government, Bangladesh', 'GovTech & E-Governance', 'portfolio-clms.jpg', NULL, 'The Ministry of Local Government required a unified digital platform for citizens to apply for, manage, and verify government certificates and business licenses securely and rapidly across local directorates.', 'Adventure Soft engineered a high-concurrency e-governance platform featuring Citizen Login portals, Admin & Monitoring Workflows, automated digital certificate generation, and live application status tracking.', '{\"Applications Processed\":\"1,000,000+\",\"Service Delivery Time\":\"80% Faster\",\"Security Rating\":\"100% Encrypted\"}', '[\"Laravel\",\"MySQL\",\"Redis\",\"Tailwind CSS\",\"REST APIs\"]', 'https://clms.com.bd/', 1, 1, '2026-08-01 10:59:16', '2026-08-01 10:59:16'),
(7, 'RBBD — Rebuilding Bangladesh (রিবিল্ডিং বাংলাদেশ)', 'rbbd-rebuilding-bangladesh', 'Rebuilding Bangladesh Foundation', 'Social Impact & Non-Profit Tech', 'portfolio-rbbd.jpg', NULL, 'Developing a comprehensive digital ecosystem to connect donors and volunteers with underprivileged children needing education, healthcare, emergency treatment, and safe shelter.', 'Engineered a modern web platform supporting transparent online donation processing, volunteer registration modules, campaign project showcases, and real-time impact tracking.', '{\"Children Supported\":\"50,000+\",\"Active Volunteers\":\"10,000+\",\"Donation Security\":\"Instant & Verified\"}', '[\"Laravel\",\"React\",\"MySQL\",\"Tailwind CSS\",\"Payment Gateway Integration\"]', 'https://rbbd.org.bd/', 1, 1, '2026-08-01 10:59:16', '2026-08-01 10:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` longtext NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `icon`, `short_description`, `long_description`, `features`, `display_order`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Enterprise Custom Software', 'enterprise-custom-software', 'code-bracket', 'Architecting scalable, resilient, mission-critical enterprise platforms tailored for global industry leaders.', 'Adventure Soft designs and engineers high-throughput enterprise software tailored specifically to your complex business workflows. From legacy modernization to cloud-native microservices.', '[\"Microservices Architecture\",\"High Concurrency Processing\",\"SOC2 & HIPAA Compliant\",\"Automated CI\\/CD Pipelines\"]', 1, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(2, 'Web Application Engineering', 'web-application-engineering', 'globe-alt', 'Ultra-fast, progressive web applications powered by modern frontend frameworks and robust cloud APIs.', 'We create visually captivating, lightning-fast web applications built for scale. Utilizing modern frameworks like React, Next.js, and Laravel, we ensure optimal performance, SEO, and user retention.', '[\"Single Page & SSR Apps\",\"Sub-second LCP Performance\",\"PWA Offline Capabilities\",\"API-First Headless Systems\"]', 2, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(3, 'Mobile App Development', 'mobile-app-development', 'device-phone-mobile', 'Native iOS & Android apps built for fluid touch interactions, biometric security, and offline syncing.', 'From fintech mobile wallets to healthcare remote monitoring apps, our mobile engineering team delivers cross-platform and native solutions with pixel-perfect UI and seamless backend integration.', '[\"Flutter & React Native\",\"Native Swift & Kotlin\",\"Biometric Auth Integration\",\"Offline Data Storage\"]', 3, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(4, 'Cloud Infrastructure & DevOps', 'cloud-infrastructure-devops', 'cloud', 'Automated cloud orchestration, Kubernetes clusters, zero-downtime deployments, and AWS/Azure scaling.', 'Transform your infrastructure with infrastructure-as-code (Terraform), Docker containerization, Kubernetes orchestration, and 24/7 proactive cloud security monitoring.', '[\"Kubernetes & Docker\",\"Multi-Cloud AWS\\/Azure\\/GCP\",\"Zero-Downtime Deployments\",\"Cost Optimization Audits\"]', 4, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(5, 'AI & Machine Learning Solutions', 'ai-machine-learning-solutions', 'sparkles', 'Predictive analytics, custom LLM integration, Computer Vision, and intelligent process automation.', 'Empower your enterprise with custom artificial intelligence. We integrate OpenAI, Claude, LLaMA models, custom NLP pipelines, and computer vision models into your core business applications.', '[\"Custom LLM Fine-Tuning\",\"Retrieval-Augmented Gen (RAG)\",\"Computer Vision & OCR\",\"Predictive Data Analytics\"]', 5, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(6, 'Software QA & Automation', 'software-qa-automation', 'check-badge', 'Comprehensive end-to-end automated testing suites ensuring 99.9% bug-free deployments.', 'Our dedicated QA engineers build continuous automated testing frameworks using Playwright, Cypress, Selenium, and JMeter for stress testing under peak user traffic.', '[\"Automated E2E Testing\",\"Load & Stress Testing\",\"Security Vulnerability Audits\",\"Continuous Integration Suites\"]', 6, 1, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(7, 'Dedicated Developers & Team Augmentation', 'dedicated-developers-team-augmentation', 'user-group', 'Scale your in-house engineering team with senior offshore developers, technical leads, and DevOps engineers.', 'Extend your core development team with battle-tested senior engineers from Adventure Soft. We handle hiring, onboarding, payroll, and technical oversight so your product scales seamlessly.', '[\"Top 1% Vetted Engineers\",\"Zero Onboarding Overhead\",\"Direct Slack & Jira Integration\",\"Flexible Monthly Retainers\"]', 7, 1, 1, '2026-08-01 10:35:32', '2026-08-01 10:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IaQvhFQYk1N5R4J7WamXQ1KMKydejMrMdWqKjKce', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2ExVXVFTmNrTVNFSG9EYzE1Z2N4c3VWbHJ3TFpiMFIwdmpJMlRKSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1789015075);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Adventure Soft', '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(2, 'tagline', 'Engineering Future-Proof Software for Global Enterprises', '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(3, 'contact_email', 'advsoftbd@gmail.com', '2026-08-01 10:29:31', '2026-09-02 05:21:21'),
(4, 'contact_phone', '01612302124', '2026-08-01 10:29:31', '2026-09-02 05:24:25'),
(5, 'office_address', 'J.S Tower- lift 5, Merul Badda, Dhaka-1212', '2026-08-01 10:29:31', '2026-09-02 00:05:43'),
(6, 'facebook_url', 'https://facebook.com/adventuresoft', '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(7, 'linkedin_url', 'https://linkedin.com/company/adventuresoft', '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(8, 'twitter_url', 'https://twitter.com/adventuresoft', '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(9, 'github_url', 'https://github.com/adventuresoft', '2026-08-01 10:29:31', '2026-08-01 10:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `display_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `department`, `photo`, `bio`, `social_links`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Imran Molla', 'Founder & Chief Executive Officer (CEO)', 'CEO & Founder', 'http://localhost:8000/storage/teams/nztociogapzSiCCth2spfP7SCUAmLt48WQqRGqF9.jpg', 'As the Founder & Chief Executive Officer (CEO) of AdventureSoft, Imran Molla leads the company with a clear vision of leveraging technology to create innovative, reliable, and impactful digital solutions. With a strong focus on software development, digital transformation, and technology-driven business solutions, he is committed to building products that simplify everyday life and empower businesses to grow. Under his leadership, AdventureSoft strives to deliver smart, scalable, and user-centric technology solutions while fostering a culture of innovation, excellence, and continuous improvement. His vision is to make technology more accessible, practical, and meaningful—creating a more comfortable life with technology.', '{\"linkedin\":\"https:\\/\\/www.linkedin.com\\/company\\/adventure-soft\\/posts\\/?feedView=all\",\"github\":\"https:\\/\\/github.com\\/adventuresoft\",\"twitter\":null}', 1, 1, '2026-09-02 22:02:41', '2026-09-02 22:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('frontend','backend','mobile','database','devops','ai_ml') NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `category`, `icon`, `description`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Laravel / PHP', 'backend', 'laravel', 'Robust MVC architecture, elegant Eloquent ORM, and enterprise-grade RESTful API systems.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(2, 'Node.js / Express', 'backend', 'nodejs', 'High-concurrency, asynchronous event-driven backend runtimes and real-time WebSockets.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(3, 'Python / Django / FastAPI', 'backend', 'python', 'Asynchronous microservices, high-throughput APIs, and AI pipeline orchestration.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(4, 'Go / Golang', 'backend', 'go', 'Ultra-low latency compiled backend microservices engineered for high concurrency.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(5, 'React.js / Next.js', 'frontend', 'react', 'Server-side rendered (SSR) web applications and lightning-fast reactive user interfaces.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(6, 'Vue.js / Nuxt.js', 'frontend', 'vuejs', 'Progressive, reactive UI frameworks with modular component ecosystems and fast rendering.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(7, 'Tailwind CSS', 'frontend', 'tailwindcss', 'Utility-first modern design architecture delivering bespoke, responsive UI experiences.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(8, 'TypeScript / Angular', 'frontend', 'typescript', 'Strictly typed client architectures and enterprise web applications with solid scalability.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(9, 'Flutter / Dart', 'mobile', 'flutter', 'Cross-platform native compilation delivering fluid 120fps UI on iOS and Android.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(10, 'React Native', 'mobile', 'react-native', 'Native bridge mobile apps sharing logic with React web codebases seamlessly.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(11, 'iOS / Swift', 'mobile', 'swift', 'Native Apple platform development with SwiftUI, high performance, and biometric security.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(12, 'Android / Kotlin', 'mobile', 'kotlin', 'Modern native Android apps utilizing Jetpack Compose and coroutines.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(13, 'MySQL / MariaDB', 'database', 'mysql', 'ACID-compliant relational database management for mission-critical transaction volumes.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(14, 'PostgreSQL / Supabase', 'database', 'postgresql', 'Advanced relational & JSON database systems with spatial indexing and strict data integrity.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(15, 'MongoDB / NoSQL', 'database', 'mongodb', 'Flexible schema, document-oriented NoSQL storage for large-scale distributed big data.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(16, 'Redis / In-Memory Cache', 'database', 'redis', 'Sub-millisecond latency in-memory data store for caching, message queues, and pub/sub.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(17, 'Docker Containerization', 'devops', 'docker', 'Standardized application containers ensuring reproducible environments across staging and prod.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(18, 'Kubernetes Orchestration', 'devops', 'kubernetes', 'Automated deployment, multi-region autoscaling, and resilient container cluster operations.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(19, 'AWS & Google Cloud', 'devops', 'aws', 'High-availability multi-cloud architecture, serverless computing, and enterprise VPCs.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(20, 'CI/CD & GitHub Actions', 'devops', 'githubactions', 'Automated end-to-end test pipelines, security scanning, and zero-downtime deployments.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(21, 'OpenAI / Claude LLMs', 'ai_ml', 'openai', 'Custom Large Language Model fine-tuning, RAG semantic pipelines, and autonomous AI agents.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(22, 'PyTorch Deep Learning', 'ai_ml', 'pytorch', 'Dynamic neural network modeling, GPU-accelerated training, and research prototyping.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(23, 'TensorFlow & Keras', 'ai_ml', 'tensorflow', 'Production-scale ML workflows, distributed training, and edge device AI deployments.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18'),
(24, 'Computer Vision & OpenCV', 'ai_ml', 'opencv', 'Real-time image classification, facial recognition, OCR parsing, and object detection.', 1, '2026-09-02 21:44:18', '2026-09-02 21:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT 5,
  `comment` text NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `designation`, `company`, `avatar`, `rating`, `comment`, `video_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Marcus Vance', 'Chief Technology Officer', 'Global FinTech Corp, USA', NULL, 5, 'Adventure Soft delivered our banking portal 3 weeks ahead of schedule. Their engineering quality, security standards, and attention to micro-animations surpass high-profile Silicon Valley agencies.', NULL, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(2, 'Elena Lindqvist', 'VP of Digital Innovation', 'Nordic Health Systems, Sweden', NULL, 5, 'Working with Adventure Soft has transformed our software delivery pipeline. Their team built our AI health portal seamlessly. Highly recommended!', NULL, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31'),
(3, 'David Sterling', 'Founder & CEO', 'Sterling Logistics EU', NULL, 5, 'The aesthetic, speed, and real-time tracking capabilities of our logistics dashboard are second to none. Adventure Soft is our go-to tech partner.', NULL, 1, '2026-08-01 10:29:31', '2026-08-01 10:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','admin','editor') NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imran Molla', 'imran.molla@gmail.com', '2026-08-01 11:05:59', '$2y$12$pbM5SD8GoY8Ec.lyldyqZueKZ5JkARJNEJOUgda5i2b3LFJWdbMcK', 'super_admin', NULL, NULL, '2026-08-01 10:29:31', '2026-09-02 21:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_postings_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_postings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
