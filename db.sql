/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 12.0.2-MariaDB : Database - isoftro_website
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`isoftro_website` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `isoftro_website`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`email`,`password_hash`,`created_at`) values 
(1,'admin','admin@isoftro.com','$2y$12$6BnwP5D.JuKrDW3BctLtp.arn.ohi9NJnaYSfboWPhCzjFKHbBJEC','2026-06-13 09:22:57');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_published` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`logo_url`,`website_url`,`sort_order`,`is_published`,`created_at`,`updated_at`) values 
(1,'Club abhiyanta','/my-website/uploads/brands/6a395438593e9.jpg','https://app.ektamultipurposecoop.com.np/',1,1,'2026-06-22 21:11:48','2026-06-22 21:11:48');

/*Table structure for table `email_logs` */

DROP TABLE IF EXISTS `email_logs`;

CREATE TABLE `email_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `direction` enum('in','out') NOT NULL,
  `from_email` varchar(190) DEFAULT NULL,
  `to_email` varchar(190) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body_preview` text DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `email_logs` */

/*Table structure for table `leads` */

DROP TABLE IF EXISTS `leads`;

CREATE TABLE `leads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `email` varchar(190) NOT NULL,
  `phone` varchar(80) DEFAULT NULL,
  `company` varchar(190) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `service_needed` varchar(190) DEFAULT NULL,
  `budget_range` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `preferred_contact` varchar(80) DEFAULT NULL,
  `status` enum('new','contacted','qualified','converted','rejected') DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `leads` */

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `mime_type` varchar(120) NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `media` */

/*Table structure for table `pricing_plans` */

DROP TABLE IF EXISTS `pricing_plans`;

CREATE TABLE `pricing_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `target_audience` varchar(255) DEFAULT NULL,
  `price` varchar(120) DEFAULT NULL,
  `price_note` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT 'NPR',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_popular` tinyint(1) DEFAULT 0,
  `is_published` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `category` varchar(120) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `pricing_plans` */

insert  into `pricing_plans`(`id`,`name`,`target_audience`,`price`,`price_note`,`currency`,`features`,`is_popular`,`is_published`,`sort_order`,`category`,`created_at`,`updated_at`) values 
(1,'Starter App','Existing ecommerce site to Android app','Rs. 60,000','Best for small stores getting started.','NPR','[\"Android app\",\"Basic features\",\"Payment gateway integration\",\"2-4 week delivery\"]',0,1,1,'ecommerce','2026-06-13 09:22:57','2026-06-13 09:22:57'),
(2,'Growth App','Android + iOS + push + order tracking','Rs. 90,000','Ideal for growing businesses.','NPR','[\"Android + iOS apps\",\"Push notifications\",\"Order tracking\",\"4-6 week delivery\"]',1,1,2,'ecommerce','2026-06-13 09:22:57','2026-06-13 09:22:57'),
(3,'Advanced App','Large stores and custom needs','Custom Pricing','For larger stores and custom needs.','NPR','[\"Custom features\",\"ERP\\/CRM integration\",\"Multi-vendor support\",\"Dedicated project manager\"]',0,1,3,'ecommerce','2026-06-13 09:22:57','2026-06-13 09:22:57'),
(4,'Website Development','Business website or ecommerce site','Custom Quote','Designed around scope and content.','NPR','[\"Premium UI\",\"SEO basics\",\"Responsive build\",\"Contact flows\"]',0,1,4,'website','2026-06-13 09:22:57','2026-06-13 09:22:57'),
(5,'AI Chatbot','Support, lead and FAQ automation','Monthly','Automation plans by channel and volume.','NPR','[\"FAQ assistant\",\"Lead qualification\",\"Inbox handoff\",\"Analytics\"]',0,1,5,'ai','2026-06-13 09:22:57','2026-06-13 09:22:57');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `slug` varchar(190) NOT NULL,
  `category` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` enum('live','beta','coming_soon','dev') DEFAULT 'dev',
  `pricing_note` varchar(255) DEFAULT NULL,
  `cta_label` varchar(120) DEFAULT NULL,
  `cta_url` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`slug`,`category`,`description`,`logo`,`status`,`pricing_note`,`cta_label`,`cta_url`,`is_published`,`sort_order`,`created_at`,`updated_at`) values 
(1,'Ecommerce App Package','ecommerce-app-package','Mobile Commerce','Android/iOS app starter for existing ecommerce websites.',NULL,'live','Starting Rs. 60,000','View Package','ecommerce-app.php',1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(2,'Custom ERP Starter Kit','custom-erp-starter-kit','ERP','Reusable business modules for roles, reports, inventory, billing and admin workflows.',NULL,'dev','Custom Quote','Start ERP Project','#contact',1,2,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(3,'iSoftro AI','isoftro-ai','AI Automation','Business assistants for support, FAQs, leads, emails and ecommerce guidance.',NULL,'beta','Monthly Plans','Build AI Solution','#contact',1,3,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(4,'School Management System','school-management-system','Education','Student, staff, fees, attendance and reporting modules for schools.',NULL,'dev','Custom Quote','Discuss Product','#contact',1,4,'2026-06-13 09:22:57','2026-06-13 09:22:57');

/*Table structure for table `project_categories` */

DROP TABLE IF EXISTS `project_categories`;

CREATE TABLE `project_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `slug` varchar(190) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `project_categories` */

insert  into `project_categories`(`id`,`name`,`slug`) values 
(1,'Ecommerce','ecommerce'),
(2,'Astrology','astrology'),
(3,'Cooperative','cooperative'),
(4,'ERP/CRM','erp-crm'),
(5,'Education','education'),
(6,'News Portal','news-portal'),
(7,'Community','community');

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(190) NOT NULL,
  `slug` varchar(190) NOT NULL,
  `client_name` varchar(190) DEFAULT NULL,
  `industry` varchar(120) DEFAULT NULL,
  `country` varchar(120) DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `long_desc` mediumtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `tech_stack` text DEFAULT NULL,
  `live_url` varchar(255) DEFAULT NULL,
  `app_url` varchar(255) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_published` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `projects_category_fk` (`category_id`),
  CONSTRAINT `projects_category_fk` FOREIGN KEY (`category_id`) REFERENCES `project_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`title`,`slug`,`client_name`,`industry`,`country`,`category_id`,`short_desc`,`long_desc`,`thumbnail`,`tech_stack`,`live_url`,`app_url`,`status`,`year`,`is_featured`,`is_published`,`sort_order`,`created_at`,`updated_at`) values 
(1,'Easy Shopping ARS','easy-shopping-ars','ARS eCommerce','Ecommerce','Nepal',1,'Ecommerce platform and app-ready shopping experience.','Ecommerce platform and app-ready shopping experience.','assets/portfolio/ars.jpg',NULL,'https://easyshoppingars.com',NULL,'Launched','2026',1,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(2,'Divya Jyotish','divya-jyotish','Divya Jyotish','Astrology','Nepal',2,'Astrology platform with services, content and customer workflows.','Astrology platform with services, content and customer workflows.','assets/portfolio/divyajyotish.svg',NULL,'https://www.divyajyotish.com',NULL,'Launched','2026',1,1,2,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(3,'Ekta Cooperative Society','ekta-cooperative','Ekta Cooperative','Cooperative','Nepal',3,'Cooperative website and member-oriented digital presence.','Cooperative website and member-oriented digital presence.','assets/portfolio/ekta.jpg',NULL,'https://ektamultipurposecoop.com.np',NULL,'Launched','2026',1,1,3,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(4,'Nepal ERP / Codex','nepal-erp-codex','Nepal ERP','ERP/CRM','Nepal',4,'ERP platform for business operations, reporting and workflows.','ERP platform for business operations, reporting and workflows.','assets/portfolio/codex.png',NULL,'',NULL,'Launched','2026',1,1,4,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(5,'School Management System','school-management-system','School','Education','Nepal',5,'School management modules for students, staff and administration.','School management modules for students, staff and administration.','assets/portfolio/school.png',NULL,'',NULL,'Launched','2026',0,1,5,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(6,'BIT College Library','bit-college-library','BIT College','Education','Nepal',5,'Library management system for academic workflows.','Library management system for academic workflows.','assets/portfolio/bit.png',NULL,'',NULL,'Launched','2026',0,1,6,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(7,'News Portal','news-portal','Publisher','News Portal','Nepal',6,'Digital publishing portal with categories and editorial workflows.','Digital publishing portal with categories and editorial workflows.','assets/portfolio/news.png',NULL,'',NULL,'Launched','2026',0,1,7,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(8,'Club Abhiyanta-BIT','club-abhiyanta-bit','Club Abhiyanta','Community','Nepal',7,'Community site for events, members and college activities.','Community site for events, members and college activities.','assets/portfolio/club.png',NULL,'',NULL,'Launched','2026',0,1,8,'2026-06-13 09:22:57','2026-06-13 09:22:57');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(190) NOT NULL,
  `slug` varchar(190) NOT NULL,
  `icon` varchar(80) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `long_desc` mediumtext DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_published` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`title`,`slug`,`icon`,`image`,`short_desc`,`long_desc`,`sort_order`,`is_featured`,`is_published`,`created_at`,`updated_at`) values 
(1,'Website Development','website-development','globe-2',NULL,'Fast, premium websites for brands, services, ecommerce, and product launches.','Fast, premium websites for brands, services, ecommerce, and product launches.',1,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(2,'Ecommerce Mobile App Development','ecommerce-mobile-app-development','smartphone',NULL,'Turn an existing ecommerce website into Android/iOS apps with push, checkout, payments, and publishing.','Turn an existing ecommerce website into Android/iOS apps with push, checkout, payments, and publishing.',2,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(3,'Custom Web Application Development','custom-web-application-development','blocks',NULL,'Business portals, dashboards, booking systems, internal tools, and workflow software.','Business portals, dashboards, booking systems, internal tools, and workflow software.',3,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(4,'Mobile App Development','mobile-app-development','tablet-smartphone',NULL,'Android and iOS apps for commerce, services, communities, and business workflows.','Android and iOS apps for commerce, services, communities, and business workflows.',4,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(5,'ERP / CRM Development','erp-crm-development','database',NULL,'Inventory, accounts, leads, HR, reports, roles, permissions, and operational dashboards.','Inventory, accounts, leads, HR, reports, roles, permissions, and operational dashboards.',5,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(6,'SaaS Product Development','saas-product-development','cloud-cog',NULL,'Multi-tenant SaaS platforms with onboarding, subscriptions, admin panels, and analytics.','Multi-tenant SaaS platforms with onboarding, subscriptions, admin panels, and analytics.',6,1,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(7,'AI Chatbots & Automation','ai-chatbots-automation','bot',NULL,'Customer support, lead qualification, ecommerce assistants, FAQ bots, and business automation.','Customer support, lead qualification, ecommerce assistants, FAQ bots, and business automation.',7,0,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(8,'Payment Gateway Integration','payment-gateway-integration','credit-card',NULL,'eSewa, Khalti, cards, wallets, order tracking, invoices, and secure transaction flows.','eSewa, Khalti, cards, wallets, order tracking, invoices, and secure transaction flows.',8,0,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(9,'UI/UX & Product Design','ui-ux-product-design','pen-tool',NULL,'Product planning, wireframes, high-fidelity interfaces, dashboards, and conversion flows.','Product planning, wireframes, high-fidelity interfaces, dashboards, and conversion flows.',9,0,1,'2026-06-13 09:22:57','2026-06-13 09:22:57'),
(10,'Maintenance & Support','maintenance-support','life-buoy',NULL,'Hosting help, bug fixes, upgrades, monitoring, backups, and ongoing product improvements.','Hosting help, bug fixes, upgrades, monitoring, backups, and ongoing product improvements.',10,0,1,'2026-06-13 09:22:57','2026-06-13 09:22:57');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key_name` varchar(190) NOT NULL,
  `value` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_name` (`key_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key_name`,`value`,`updated_at`) values 
(1,'site_name','iSoftro Solutions','2026-06-13 09:22:57'),
(2,'hero_headline','Build, Launch & Scale Digital Products.','2026-06-13 09:22:57'),
(3,'hero_subheadline','iSoftro Solutions builds modern websites, ecommerce mobile apps, ERP systems, SaaS platforms, AI chatbots, automation tools, and custom software for businesses across Nepal and beyond.','2026-06-13 09:22:57'),
(4,'contact_email','hello@isoftro.com','2026-06-13 09:22:57'),
(5,'location','Nepal','2026-06-13 09:22:57'),
(6,'footer_text','Premium software agency and product studio building websites, apps, ERP, SaaS and AI automation.','2026-06-13 09:22:57'),
(7,'metric_projects','10+','2026-06-13 09:22:57'),
(8,'metric_industries','5+','2026-06-13 09:22:57'),
(9,'metric_delivery','2-6','2026-06-13 09:22:57'),
(10,'metric_support','360','2026-06-13 09:22:57');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(190) NOT NULL,
  `business_name` varchar(190) DEFAULT NULL,
  `project_id` bigint(20) unsigned DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` tinyint(4) DEFAULT 5,
  `photo` varchar(255) DEFAULT NULL,
  `country` varchar(120) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 1,
  `is_published` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `testimonials_project_fk` (`project_id`),
  CONSTRAINT `testimonials_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`client_name`,`business_name`,`project_id`,`review`,`rating`,`photo`,`country`,`is_featured`,`is_approved`,`is_published`,`sort_order`,`created_at`) values 
(1,'ARS Team','Easy Shopping ARS',NULL,'iSoftro transformed our ecommerce workflow into a smoother digital experience. The team was clear, fast and supportive.',5,NULL,'Nepal',1,1,1,1,'2026-06-13 09:22:57'),
(2,'Business Owner','Local Retail Brand',NULL,'The app package gave our customers a faster checkout and better repeat shopping experience.',5,NULL,'Nepal',1,1,1,2,'2026-06-13 09:22:57');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
