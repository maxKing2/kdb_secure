-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2022 at 11:53 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u749875070_kdb_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` decimal(10,6) NOT NULL,
  `base_currency` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `exchange_rate`, `base_currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '1.000000', 1, 1, NULL, NULL),
(2, 'EUR', '0.850000', 0, 1, NULL, NULL),
(3, 'USD', '74.500000', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `database_backups`
--

CREATE TABLE `database_backups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_methods`
--

CREATE TABLE `deposit_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) NOT NULL,
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `fixed_charge` decimal(10,2) NOT NULL,
  `charge_in_percentage` decimal(10,2) NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_requests`
--

CREATE TABLE `deposit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `method_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `transaction_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `name`, `slug`, `subject`, `email_body`, `sms_body`, `shortcode`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'Deposit Money', 'DEPOSIT_MONEY', 'Deposit Money', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your account has been credited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your account has been credited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(2, 'Deposit Request Approved', 'DEPOSIT_REQUEST_APPROVED', 'Deposit Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your deposit request has been approved. Your account has been credited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your deposit request has been approved. Your account has been credited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}} {{depositMethod}}', 0, 0, NULL, NULL),
(3, 'FDR Request Approved', 'FDR_REQUEST_APPROVED', 'FDR Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your FDR request of {{amount}} has been approved on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your FDR request of {{amount}} has been approved on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(4, 'Loan Request Approved', 'LOAN_REQUEST_APPROVED', 'Loan Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your loan request has been approved. Your account has been credited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your loan request has been approved. Your account has been credited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(5, 'Transfer Request Approved', 'TRANSFER_REQUEST_APPROVED', 'Transfer Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your transfer request has been approved. Your account has been debited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your transfer request has been approved. Your account has been debited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(6, 'Wire Transfer Request Approved', 'WIRE_TRANSFER_REQUEST_APPROVED', 'Wire Transfer Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your wire transfer request has been approved. Your account has been debited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your wire transfer request has been approved. Your account has been debited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(7, 'Withdraw Request Approved', 'WITHDRAW_REQUEST_APPROVED', 'Withdraw Request Approved', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your withdraw request has been approved. Your account has been debited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your withdraw request has been approved. Your account has been debited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(8, 'FDR Matured', 'FDR_MATURED', 'FDR Matured', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your FDR is already matured. Your account has been credited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your FDR is already matured. Your account has been credited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(9, 'Payment Request', 'PAYMENT_REQUEST', 'You have Received New Payment Request', '<div>Dear Sir,</div>\r\n<div>Your have received new payment request of {{amount}} on {{dateTime}}.</div>\r\n<div>&nbsp;</div>\r\n<div>{{payNow}}</div>', 'Dear Sir, Your have received new payment request of {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}} {{payNow}}', 0, 0, NULL, NULL),
(10, 'Payment Completed', 'PAYMENT_COMPLETED', 'Payment Completed', '<div>Dear Sir,</div>\r\n<div>Good news, You have received a payment of {{amount}} on {{dateTime}} from {{paidBy}}</div>', 'Dear Sir, Good news, You have received a payment of {{amount}} on {{dateTime}} from {{paidBy}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}} {{paidBy}}', 0, 0, NULL, NULL),
(11, 'Deposit Request Rejected', 'DEPOSIT_REQUEST_REJECTED', 'Deposit Request Rejected', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your deposit request of {{amount}} has been rejected.</div>\r\n<div>&nbsp;</div>\r\n<div>Amount:&nbsp;{{amount}}</div>\r\n<div>Deposit Method: {{depositMethod}}</div>\r\n</div>', 'Dear Sir, Your deposit request of {{amount}} has been rejected.', '{{name}} {{email}} {{phone}} {{amount}} {{depositMethod}}', 0, 0, NULL, NULL),
(12, 'FDR Request Rejected', 'FDR_REQUEST_REJECTED', 'FDR Request Rejected', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your FDR request has been rejected. Your FDR amount {{amount}} has returned back to your account.</div>\r\n</div>', 'Dear Sir, Your FDR request has been rejected. Your FDR amount {{amount}} has returned back to your account.', '{{name}} {{email}} {{phone}} {{amount}}', 0, 0, NULL, NULL),
(13, 'Loan Request Rejected', 'LOAN_REQUEST_REJECTED', 'Loan Request Rejected', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your loan request of {{amount}} has been rejected on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your loan request of {{amount}} has been rejected on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}}', 0, 0, NULL, NULL),
(14, 'Transfer Request Rejected', 'TRANSFER_REQUEST_REJECTED', 'Transfer Request Rejected', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your transfer request has been rejected. Your transferred amount {{amount}} has returned back to your account.</div>\r\n</div>', 'Dear Sir, Your transfer request has been rejected. Your transferred amount {{amount}} has returned back to your account.', '{{name}} {{email}} {{phone}} {{amount}}', 0, 0, NULL, NULL),
(15, 'Wire Transfer Rejected', 'WIRE_TRANSFER_REJECTED', 'Wire Transfer Rejected', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your wire transfer request has been rejected. Your transferred amount {{amount}} has returned back to your account.</div>\r\n</div>', 'Dear Sir, Your wire transfer request has been rejected. Your transferred amount {{amount}} has returned back to your account.', '{{name}} {{email}} {{phone}} {{amount}}', 0, 0, NULL, NULL),
(16, 'Withdraw Request Rejected', 'WITHDRAW_REQUEST_REJECTED', 'Withdraw Request Rejected', '<div>\r\n<div>Dear Sir, Your withdraw request has been rejected. Your transferred amount {{amount}} has returned back to your account.</div>\r\n</div>', 'Dear Sir, Your withdraw request has been rejected. Your transferred amount {{amount}} has returned back to your account.', '{{name}} {{email}} {{phone}} {{amount}}', 0, 0, NULL, NULL),
(17, 'Withdraw Money', 'WITHDRAW_MONEY', 'Withdraw Money', '<div>\r\n<div>Dear Sir,</div>\r\n<div>Your account has been debited by {{amount}} on {{dateTime}}</div>\r\n</div>', 'Dear Sir, Your account has been debited by {{amount}} on {{dateTime}}', '{{name}} {{email}} {{phone}} {{amount}} {{dateTime}} {{withdrawMethod}}', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2021-08-31 10:06:18', '2021-08-31 10:06:18'),
(2, 1, NULL, '2021-08-31 10:09:26', '2021-08-31 10:09:26'),
(3, 1, NULL, '2021-08-31 10:09:39', '2021-08-31 10:09:39'),
(4, 1, NULL, '2021-09-05 15:47:59', '2021-09-05 15:47:59'),
(5, 1, NULL, '2021-09-05 15:58:05', '2021-09-05 15:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `faq_translations`
--

CREATE TABLE `faq_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_translations`
--

INSERT INTO `faq_translations` (`id`, `faq_id`, `locale`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', 'How to open an account?', 'Account opening is very easy. Just need to click Sign Up and enter some initial details for opening account. After that you need to verify your email address and that\'s ready to go.', '2021-08-31 10:07:50', '2021-09-05 15:37:10'),
(2, 2, 'English', 'How to deposit money?', 'You can deposit money via online payment gateway such as PayPal, Stripe, Razorpay, Paystack, Flutterwave as well as BlockChain for bitcoin. You can also deposit money by coming to our office physically.', '2021-08-31 10:09:26', '2021-09-05 15:38:39'),
(3, 3, 'English', 'How to withdraw money from my account?', 'We have different types of withdraw method. You can withdraw money to your bank account as well as your mobile banking account.', '2021-08-31 10:09:39', '2021-09-05 15:47:11'),
(7, 4, 'English', 'How to Apply for Loan?', 'You can apply loan based on your collateral.', '2021-09-05 15:47:59', '2021-09-05 15:47:59'),
(8, 5, 'English', 'How to Apply for Fixed Deposit?', 'If you have available balance in your account then you can apply for fixed deposit.', '2021-09-05 15:58:05', '2021-09-05 15:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `fdrs`
--

CREATE TABLE `fdrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fdr_plan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL,
  `return_amount` decimal(10,2) NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approved_date` date DEFAULT NULL,
  `mature_date` date DEFAULT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `approved_user_id` bigint(20) DEFAULT NULL,
  `created_user_id` bigint(20) DEFAULT NULL,
  `updated_user_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdr_plans`
--

CREATE TABLE `fdr_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `interest_rate` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fdr_plans`
--

INSERT INTO `fdr_plans` (`id`, `name`, `minimum_amount`, `maximum_amount`, `interest_rate`, `duration`, `duration_type`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Basic', '10.00', '500.00', '8.00', 12, 'month', 1, NULL, '2021-08-09 14:34:14', '2021-09-05 13:39:27'),
(2, 'Standard', '100.00', '1000.00', '10.00', 24, 'month', 1, NULL, '2021-09-05 13:39:11', '2021-09-05 13:39:34'),
(3, 'Professional', '500.00', '20000.00', '15.00', 36, 'month', 1, NULL, '2021-09-05 13:40:06', '2021-09-05 13:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) DEFAULT NULL,
  `used_at` datetime DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_product_id` bigint(20) UNSIGNED NOT NULL,
  `borrower_id` bigint(20) UNSIGNED NOT NULL,
  `first_payment_date` date NOT NULL,
  `release_date` date DEFAULT NULL,
  `currency_id` bigint(20) NOT NULL,
  `applied_amount` decimal(10,2) NOT NULL,
  `total_payable` decimal(10,2) DEFAULT NULL,
  `total_paid` decimal(10,2) DEFAULT NULL,
  `late_payment_penalties` decimal(10,2) NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approved_date` date DEFAULT NULL,
  `approved_user_id` bigint(20) DEFAULT NULL,
  `created_user_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_collaterals`
--

CREATE TABLE `loan_collaterals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collateral_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_price` decimal(10,2) NOT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `paid_at` date NOT NULL,
  `late_penalties` decimal(10,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `amount_to_pay` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `repayment_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_products`
--

CREATE TABLE `loan_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` decimal(10,2) NOT NULL,
  `interest_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` int(11) NOT NULL,
  `term_period` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_products`
--

INSERT INTO `loan_products` (`id`, `name`, `minimum_amount`, `maximum_amount`, `description`, `interest_rate`, `interest_type`, `term`, `term_period`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Student Loan', '100.00', '1000.00', NULL, '5.00', 'flat_rate', 24, '+1 month', 1, '2021-08-09 11:06:19', '2021-08-10 07:47:20'),
(2, 'Business Loan', '1000.00', '100000.00', NULL, '12.00', 'mortgage', 12, '+1 month', 1, '2021-08-09 11:05:37', '2021-08-10 07:47:10'),
(3, 'Enterprise Loan', '5000.00', '50000.00', NULL, '12.00', 'mortgage', 36, '+1 month', 1, '2021-09-05 13:42:11', '2021-09-05 13:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayments`
--

CREATE TABLE `loan_repayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `repayment_date` date NOT NULL,
  `amount_to_pay` decimal(10,2) NOT NULL,
  `penalty` decimal(10,2) NOT NULL,
  `principal_amount` decimal(10,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_12_152015_create_email_templates_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_01_080940_create_settings_table', 1),
(6, '2020_07_02_145857_create_database_backups_table', 1),
(7, '2020_07_06_142817_create_roles_table', 1),
(8, '2020_07_06_143240_create_permissions_table', 1),
(9, '2021_03_22_071324_create_setting_translations', 1),
(10, '2021_07_02_145504_create_pages_table', 1),
(11, '2021_07_02_145952_create_page_translations_table', 1),
(12, '2021_08_06_104648_create_branches_table', 1),
(13, '2021_08_07_100944_create_other_banks_table', 1),
(14, '2021_08_07_111236_create_currency_table', 1),
(15, '2021_08_08_132702_create_payment_gateways_table', 1),
(16, '2021_08_08_152535_create_deposit_methods_table', 1),
(17, '2021_08_08_164152_create_withdraw_methods_table', 1),
(18, '2021_08_09_064023_create_transactions_table', 1),
(19, '2021_08_09_132854_create_fdr_plans_table', 1),
(20, '2021_08_10_075622_create_gift_cards_table', 1),
(21, '2021_08_10_095536_create_fdrs_table', 1),
(22, '2021_08_10_102503_create_support_tickets_table', 1),
(23, '2021_08_10_102527_create_support_ticket_messages_table', 1),
(24, '2021_08_20_092846_create_payment_requests_table', 1),
(25, '2021_08_20_150101_create_deposit_requests_table', 1),
(26, '2021_08_20_160124_create_withdraw_requests_table', 1),
(27, '2021_08_23_160216_create_notifications_table', 1),
(28, '2021_08_31_070908_create_services_table', 1),
(29, '2021_08_31_071002_create_service_translations_table', 1),
(30, '2021_08_31_075115_create_news_table', 1),
(31, '2021_08_31_075125_create_news_translations_table', 1),
(32, '2021_08_31_094252_create_faqs_table', 1),
(33, '2021_08_31_094301_create_faq_translations_table', 1),
(34, '2021_08_31_101309_create_testimonials_table', 1),
(35, '2021_08_31_101319_create_testimonial_translations_table', 1),
(36, '2021_08_31_201125_create_navigations_table', 1),
(37, '2021_08_31_201126_create_navigation_items_table', 1),
(38, '2021_08_31_201127_create_navigation_item_translations_table', 1),
(39, '2021_09_04_142110_create_teams_table', 1),
(40, '2021_10_04_082019_create_loan_products_table', 1),
(41, '2021_10_06_070947_create_loans_table', 1),
(42, '2021_10_06_071153_create_loan_collaterals_table', 1),
(43, '2021_10_09_110842_add_2fa_columns_to_users_table', 1),
(44, '2021_10_12_071843_add_allow_withdrawal_to_users_table', 1),
(45, '2021_10_12_104151_create_loan_repayments_table', 1),
(46, '2021_10_14_065743_create_loan_payments_table', 1),
(47, '2021_10_22_070458_create_email_sms_templates_table', 1),
(48, '2022_02_01_071417_add_account_number_to_users_table', 1),
(49, '2022_02_10_053301_add_document_verified_at_to_users_table', 1),
(50, '2022_02_10_063611_create_user_documents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Primary Menu', 1, '2021-08-31 11:11:31', '2021-08-31 11:11:31'),
(2, 'Quick Explore', 1, '2021-08-31 18:11:36', '2021-08-31 18:11:36'),
(3, 'Pages', 1, '2021-08-31 18:11:43', '2021-09-04 16:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `navigation_items`
--

CREATE TABLE `navigation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `css_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation_items`
--

INSERT INTO `navigation_items` (`id`, `navigation_id`, `type`, `page_id`, `url`, `icon`, `target`, `parent_id`, `position`, `status`, `css_class`, `css_id`, `created_at`, `updated_at`) VALUES
(6, 1, 'dynamic_url', NULL, '/', NULL, '_self', NULL, 1, 1, NULL, NULL, '2021-08-31 17:17:46', '2021-08-31 17:28:52'),
(7, 1, 'dynamic_url', NULL, '/about', NULL, '_self', NULL, 2, 1, NULL, NULL, '2021-08-31 17:17:58', '2021-08-31 17:28:52'),
(8, 1, 'dynamic_url', NULL, '/services', NULL, '_self', NULL, 3, 1, NULL, NULL, '2021-08-31 17:18:44', '2021-08-31 17:28:52'),
(10, 1, 'dynamic_url', NULL, 'faq', NULL, '_self', NULL, 4, 1, NULL, NULL, '2021-08-31 17:19:27', '2021-09-04 16:20:28'),
(11, 1, 'dynamic_url', NULL, '/contact', NULL, '_self', NULL, 5, 1, NULL, NULL, '2021-08-31 17:19:43', '2021-09-04 16:20:28'),
(15, 2, 'dynamic_url', NULL, '/contact', NULL, '_self', NULL, 1, 1, NULL, NULL, '2021-08-31 18:12:42', '2021-09-04 16:22:17'),
(20, 2, 'dynamic_url', NULL, '/about', NULL, '_self', NULL, 2, 1, NULL, NULL, '2021-09-04 16:21:32', '2021-09-04 16:22:17'),
(21, 2, 'dynamic_url', NULL, '/services', NULL, '_self', NULL, 3, 1, NULL, NULL, '2021-09-04 16:22:06', '2021-09-04 16:22:17'),
(22, 3, 'page', 2, NULL, NULL, '_self', NULL, 2, 1, NULL, NULL, '2021-09-04 16:22:58', '2021-09-04 16:23:26'),
(23, 3, 'page', 1, NULL, NULL, '_self', NULL, 1, 1, NULL, NULL, '2021-09-04 16:23:10', '2021-09-04 16:23:26'),
(24, 3, 'dynamic_url', NULL, '/faq', NULL, '_self', NULL, 3, 1, NULL, NULL, '2021-09-04 16:23:20', '2021-09-04 16:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `navigation_item_translations`
--

CREATE TABLE `navigation_item_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_item_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation_item_translations`
--

INSERT INTO `navigation_item_translations` (`id`, `navigation_item_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(6, 6, 'English', 'Home', '2021-08-31 17:17:46', '2021-08-31 17:17:46'),
(7, 7, 'English', 'About', '2021-08-31 17:17:58', '2021-08-31 17:17:58'),
(8, 8, 'English', 'Services', '2021-08-31 17:18:44', '2021-08-31 17:18:44'),
(10, 10, 'English', 'FAQ', '2021-08-31 17:19:27', '2021-08-31 17:19:27'),
(11, 11, 'English', 'Contact', '2021-08-31 17:19:43', '2021-08-31 17:19:43'),
(15, 15, 'English', 'Contact', '2021-08-31 18:12:42', '2021-09-04 16:22:15'),
(26, 20, 'English', 'About', '2021-09-04 16:21:32', '2021-09-04 16:21:32'),
(27, 21, 'English', 'Services', '2021-09-04 16:22:06', '2021-09-04 16:22:06'),
(28, 22, 'English', 'Terms & Condition', '2021-09-04 16:22:58', '2021-09-04 16:22:58'),
(29, 23, 'English', 'Privacy Policy', '2021-09-04 16:23:10', '2021-09-04 16:23:10'),
(30, 24, 'English', 'FAQ', '2021-09-04 16:23:20', '2021-09-04 16:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_translations`
--

CREATE TABLE `news_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_banks`
--

CREATE TABLE `other_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swift_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_currency` bigint(20) NOT NULL,
  `minimum_transfer_amount` decimal(10,2) NOT NULL,
  `maximum_transfer_amount` decimal(10,2) NOT NULL,
  `fixed_charge` decimal(10,2) NOT NULL,
  `charge_in_percentage` decimal(10,2) NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'privacy-policy', 1, '2021-08-31 10:42:32', '2021-08-31 10:42:32'),
(2, 'terms-condition', 1, '2021-08-31 10:44:42', '2021-08-31 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', 'Privacy Policy', '<h1>Privacy Policy for Livo Bank</h1>\r\n<p>At LivoBank, accessible from https://livo-bank.trickycode.xyz, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by LivoBank and how we use it.</p>\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in LivoBank. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href=\"https://www.termsfeed.com/privacy-policy-generator/\">TermsFeed Privacy Policy Generator</a>.</p>\r\n<h2>Consent</h2>\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n<h2>Information we collect</h2>\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n<h2>How we use your information</h2>\r\n<p>We use the information we collect in various ways, including to:</p>\r\n<ul>\r\n<li>Provide, operate, and maintain our website</li>\r\n<li>Improve, personalize, and expand our website</li>\r\n<li>Understand and analyze how you use our website</li>\r\n<li>Develop new products, services, features, and functionality</li>\r\n<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n<li>Send you emails</li>\r\n<li>Find and prevent fraud</li>\r\n</ul>\r\n<h2>Log Files</h2>\r\n<p>LivoBank follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of LivoBank.</p>\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on LivoBank, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n<p>Note that LivoBank has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n<h2>Third Party Privacy Policies</h2>\r\n<p>LivoBank\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p>\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n<p>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n<p>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>GDPR Data Protection Rights</h2>\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n<p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n<p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n<p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>\r\n<p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n<p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n<p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>Children\'s Information</h2>\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n<p>LivoBank does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', '2021-08-31 10:42:32', '2021-09-05 14:27:37'),
(2, 2, 'English', 'Terms & Condition', '<h2><strong>Terms and Conditions</strong></h2>\r\n<p>Welcome to LivoBank!</p>\r\n<p>These terms and conditions outline the rules and regulations for the use of Livo Bank\'s Website, located at https://livo-bank.trickycode.xyz.</p>\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use LivoBank if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company’s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n<h3><strong>Cookies</strong></h3>\r\n<p>We employ the use of cookies. By accessing LivoBank, you agreed to use cookies in agreement with the Livo Bank\'s Privacy Policy.</p>\r\n<p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n<h3><strong>License</strong></h3>\r\n<p>Unless otherwise stated, Livo Bank and/or its licensors own the intellectual property rights for all material on LivoBank. All intellectual property rights are reserved. You may access this from LivoBank for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n<p>You must not:</p>\r\n<ul>\r\n<li>Republish material from LivoBank</li>\r\n<li>Sell, rent or sub-license material from LivoBank</li>\r\n<li>Reproduce, duplicate or copy material from LivoBank</li>\r\n<li>Redistribute content from LivoBank</li>\r\n</ul>\r\n<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href=\"https://www.termsandconditionsgenerator.com\">Terms And Conditions Generator</a>.</p>\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Livo Bank does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Livo Bank,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Livo Bank shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n<p>Livo Bank reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n<p>You warrant and represent that:</p>\r\n<ul>\r\n<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n<p>You hereby grant Livo Bank a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n<ul>\r\n<li>Government agencies;</li>\r\n<li>Search engines;</li>\r\n<li>News organizations;</li>\r\n<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n<ul>\r\n<li>commonly-known consumer and/or business information sources;</li>\r\n<li>dot.com community sites;</li>\r\n<li>associations or other groups representing charities;</li>\r\n<li>online directory distributors;</li>\r\n<li>internet portals;</li>\r\n<li>accounting, law and consulting firms; and</li>\r\n<li>educational institutions and trade associations.</li>\r\n</ul>\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Livo Bank; and (d) the link is in the context of general resource information.</p>\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Livo Bank. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n<ul>\r\n<li>By use of our corporate name; or</li>\r\n<li>By use of the uniform resource locator being linked to; or</li>\r\n<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>\r\n</ul>\r\n<p>No use of Livo Bank\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n<h3><strong>iFrames</strong></h3>\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n<h3><strong>Content Liability</strong></h3>\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n<h3><strong>Your Privacy</strong></h3>\r\n<p>Please read Privacy Policy</p>\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n<h3><strong>Disclaimer</strong></h3>\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n<ul>\r\n<li>limit or exclude our or your liability for death or personal injury;</li>\r\n<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', '2021-08-31 10:44:42', '2021-09-05 14:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,6) DEFAULT NULL,
  `fixed_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge_in_percentage` decimal(10,2) NOT NULL DEFAULT 0.00,
  `minimum_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `maximum_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `slug`, `image`, `status`, `parameters`, `currency`, `supported_currencies`, `extra`, `exchange_rate`, `fixed_charge`, `charge_in_percentage`, `minimum_amount`, `maximum_amount`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 'PayPal', 'paypal.png', 0, '{\"client_id\":\"\",\"client_secret\":\"\",\"environment\":\"sandbox\"}', NULL, '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"USD\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(2, 'Stripe', 'Stripe', 'stripe.png', 0, '{\"secret_key\":\"\",\"publishable_key\":\"\"}', NULL, '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(3, 'Razorpay', 'Razorpay', 'razorpay.png', 0, '{\"razorpay_key_id\":\"\",\"razorpay_key_secret\":\"\"}', NULL, '{\"INR\":\"INR\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(4, 'Paystack', 'Paystack', 'paystack.png', 0, '{\"paystack_public_key\":\"\",\"paystack_secret_key\":\"\"}', NULL, '{\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(5, 'BlockChain', 'BlockChain', 'blockchain.png', 0, '{\"blockchain_api_key\":\"\",\"blockchain_xpub\":\"\"}', NULL, '{\"BTC\":\"BTC\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL),
(6, 'Flutterwave', 'Flutterwave', 'flutterwave.png', 0, '{\"public_key\":\"\",\"secret_key\":\"\",\"encryption_key\":\"\",\"environment\":\"sandbox\"}', NULL, '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', NULL, NULL, '0.00', '0.00', '0.00', '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` bigint(20) NOT NULL,
  `receiver_id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(2, '<i class=\"icofont-paper-plane\"></i>', '2021-08-31 07:34:38', '2021-09-05 15:33:22'),
(3, '<i class=\"icofont-money\"></i>', '2021-08-31 07:35:33', '2021-09-05 11:29:47'),
(4, '<i class=\"icofont-exchange\"></i>', '2021-08-31 07:38:26', '2021-09-05 11:30:04'),
(5, '<i class=\"icofont-bank-alt\"></i>', '2021-08-31 07:38:44', '2021-09-05 11:30:19'),
(6, '<i class=\"icofont-file-text\"></i>', '2021-08-31 07:39:01', '2021-09-05 11:30:32'),
(7, '<i class=\"icofont-pay\"></i>', '2021-08-31 07:39:19', '2021-09-05 11:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

CREATE TABLE `service_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_translations`
--

INSERT INTO `service_translations` (`id`, `service_id`, `locale`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 'English', 'Money Transfer', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:34:38', '2021-08-31 07:34:38'),
(2, 3, 'English', 'Multi Currency', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:35:33', '2021-09-05 11:34:07'),
(3, 4, 'English', 'Exchange Currency', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:38:26', '2021-08-31 07:38:26'),
(4, 5, 'English', 'Fixed Deposit', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:38:44', '2021-08-31 07:38:44'),
(5, 6, 'English', 'Apply Loan', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:39:01', '2021-08-31 07:39:01'),
(6, 7, 'English', 'Payment Request', 'Paragraph of text beneath the heading to explain the heading.', '2021-08-31 07:39:19', '2021-08-31 07:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'mail_type', 'smtp', NULL, NULL),
(2, 'backend_direction', 'ltr', NULL, NULL),
(3, 'language', 'English', NULL, NULL),
(4, 'email_verification', 'disabled', NULL, NULL),
(5, 'allow_singup', 'yes', NULL, NULL),
(6, 'company_name', 'KDB Secure Bank', '2022-04-17 11:52:43', '2022-04-17 11:52:43'),
(7, 'site_title', 'KDB Secure', '2022-04-17 11:52:43', '2022-04-17 11:52:43'),
(8, 'phone', '+447519975067', '2022-04-17 11:52:43', '2022-04-17 11:52:43'),
(9, 'email', 'info@kdbsecure.com', '2022-04-17 11:52:43', '2022-04-17 11:52:43'),
(10, 'timezone', 'Europe/London', '2022-04-17 11:52:43', '2022-04-17 11:52:43'),
(38, 'main_heading', 'Smart way to keep your money safe and secure', '2021-08-31 15:38:10', '2021-09-05 11:47:17'),
(39, 'sub_heading', 'Transfer money within minutes and save money for your future. All of your desired service in single platform.', '2021-08-31 15:39:15', '2021-09-05 11:47:17'),
(40, 'about_us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-08-31 15:39:15', '2021-08-31 15:57:30'),
(41, 'copyright', 'Copyright © 2021 <a href=\"#\" target=\"_blank\">Tricky Code</a>  -  All Rights Reserved.', '2021-08-31 15:39:15', '2021-09-05 11:24:45'),
(46, 'meta_keywords', '', '2021-08-31 15:39:15', '2021-08-31 15:39:15'),
(47, 'meta_content', '', '2021-08-31 15:39:15', '2021-08-31 15:39:15'),
(48, 'our_mission', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.</p>', '2021-08-31 15:54:44', '2021-08-31 15:54:44'),
(49, 'footer_about_us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-08-31 15:58:14', '2021-09-05 11:24:45'),
(51, 'primary_menu', '1', '2021-08-31 17:30:14', '2021-08-31 17:30:14'),
(52, 'footer_menu_1', '2', '2021-08-31 17:30:14', '2021-08-31 18:13:31'),
(53, 'footer_menu_1_title', 'Quick Explore', '2021-09-01 06:50:56', '2021-09-01 06:50:56'),
(54, 'footer_menu_2_title', 'Pages', '2021-09-01 06:50:56', '2021-09-05 11:24:45'),
(55, 'footer_menu_2', '3', '2021-09-01 06:50:56', '2021-09-01 06:50:56'),
(56, 'home_about_us_heading', 'About Us', '2021-09-05 10:52:18', '2021-09-05 10:54:38'),
(57, 'home_about_us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-09-05 10:52:18', '2021-09-05 10:52:18'),
(58, 'home_service_content', 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.', '2021-09-05 10:52:18', '2021-09-05 11:12:10'),
(59, 'home_fixed_deposit_heading', 'Fixed Deposit Plans', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(60, 'home_fixed_deposit_content', 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(61, 'home_loan_heading', 'Loan Packages', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(62, 'home_loan_content', 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(63, 'home_testimonial_heading', 'We served over 500+ Customers', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(64, 'home_testimonial_content', 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(65, 'home_partner_heading', 'Partners who support us', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(66, 'home_partner_content', 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.', '2021-09-05 10:52:18', '2021-09-05 11:19:41'),
(67, 'home_about_us_content', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-09-05 10:54:15', '2021-09-05 10:54:15'),
(68, 'home_service_heading', 'Our Services', '2021-09-05 10:54:38', '2021-09-05 11:12:10'),
(69, 'total_customer', '500', '2021-09-05 11:06:39', '2021-09-05 11:08:10'),
(70, 'total_branch', '5', '2021-09-05 11:06:39', '2021-09-05 11:11:53'),
(71, 'total_transactions', '1', '2021-09-05 11:06:39', '2021-09-05 11:11:53'),
(72, 'total_countries', '200', '2021-09-05 11:06:39', '2021-09-05 11:11:53'),
(73, 'about_page_title', ' Who We Are', '2021-09-05 15:07:18', '2021-09-05 15:07:18'),
(74, 'our_team_title', 'Meet Our Team', '2021-09-05 15:07:18', '2021-09-05 15:07:18'),
(75, 'our_team_sub_title', 'Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles', '2021-09-05 15:07:18', '2021-09-05 15:07:18'),
(76, 'about_us_content', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2021-09-05 15:08:15', '2021-09-05 15:08:15'),
(77, 'APP_VERSION', '1.3.2', '2022-04-17 12:52:43', '2022-04-17 12:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `priority` tinyint(4) NOT NULL DEFAULT 0,
  `created_user_id` bigint(20) NOT NULL,
  `operator_id` bigint(20) DEFAULT NULL,
  `closed_user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_messages`
--

CREATE TABLE `support_ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_translations`
--

CREATE TABLE `testimonial_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonial_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `currency_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dr_cr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_id` bigint(20) DEFAULT NULL,
  `ref_id` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `other_bank_id` bigint(20) DEFAULT NULL,
  `gateway_id` bigint(20) DEFAULT NULL,
  `created_user_id` bigint(20) DEFAULT NULL,
  `updated_user_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `transaction_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `sms_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_expires_at` datetime DEFAULT NULL,
  `allow_withdrawal` tinyint(4) NOT NULL DEFAULT 1,
  `document_verified_at` timestamp NULL DEFAULT NULL,
  `document_submitted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `account_number`, `user_type`, `role_id`, `branch_id`, `status`, `profile_picture`, `email_verified_at`, `sms_verified_at`, `password`, `provider`, `provider_id`, `country_code`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`, `two_factor_expires_at`, `otp`, `otp_expires_at`, `allow_withdrawal`, `document_verified_at`, `document_submitted_at`) VALUES
(1, 'kdbsecure', 'info@kdbsecure.com', NULL, NULL, 'admin', NULL, NULL, 1, 'default.png', '2022-04-17 11:49:46', NULL, '$2y$10$EIcoAQZK/AVBm9wJrQfU5ORUkloDYjR2Aw9UfkotxRmUHdhvp3MI2', NULL, NULL, NULL, NULL, '2022-04-17 11:49:46', '2022-04-17 11:49:46', NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) NOT NULL,
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `fixed_charge` decimal(10,2) NOT NULL,
  `charge_in_percentage` decimal(10,2) NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `method_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `transaction_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database_backups`
--
ALTER TABLE `database_backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_methods`
--
ALTER TABLE `deposit_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_translations_faq_id_locale_unique` (`faq_id`,`locale`);

--
-- Indexes for table `fdrs`
--
ALTER TABLE `fdrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdr_plans`
--
ALTER TABLE `fdr_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_collaterals`
--
ALTER TABLE `loan_collaterals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_products`
--
ALTER TABLE `loan_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_repayments`
--
ALTER TABLE `loan_repayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_items`
--
ALTER TABLE `navigation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navigation_items_parent_id_foreign` (`parent_id`),
  ADD KEY `navigation_items_page_id_foreign` (`page_id`),
  ADD KEY `navigation_items_navigation_id_index` (`navigation_id`);

--
-- Indexes for table `navigation_item_translations`
--
ALTER TABLE `navigation_item_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `navigation_item_translations_navigation_item_id_locale_unique` (`navigation_item_id`,`locale`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_translations_news_id_locale_unique` (`news_id`,`locale`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `other_banks`
--
ALTER TABLE `other_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_translations_service_id_locale_unique` (`service_id`,`locale`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonial_translations_testimonial_id_locale_unique` (`testimonial_id`,`locale`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `database_backups`
--
ALTER TABLE `database_backups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_methods`
--
ALTER TABLE `deposit_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq_translations`
--
ALTER TABLE `faq_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fdrs`
--
ALTER TABLE `fdrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdr_plans`
--
ALTER TABLE `fdr_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_collaterals`
--
ALTER TABLE `loan_collaterals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_products`
--
ALTER TABLE `loan_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_repayments`
--
ALTER TABLE `loan_repayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navigation_items`
--
ALTER TABLE `navigation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `navigation_item_translations`
--
ALTER TABLE `navigation_item_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_translations`
--
ALTER TABLE `news_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_banks`
--
ALTER TABLE `other_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_translations`
--
ALTER TABLE `service_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD CONSTRAINT `faq_translations_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `navigation_items`
--
ALTER TABLE `navigation_items`
  ADD CONSTRAINT `navigation_items_navigation_id_foreign` FOREIGN KEY (`navigation_id`) REFERENCES `navigations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `navigation_items_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `navigation_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `navigation_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `navigation_item_translations`
--
ALTER TABLE `navigation_item_translations`
  ADD CONSTRAINT `navigation_item_translations_navigation_item_id_foreign` FOREIGN KEY (`navigation_item_id`) REFERENCES `navigation_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  ADD CONSTRAINT `testimonial_translations_testimonial_id_foreign` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonials` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
