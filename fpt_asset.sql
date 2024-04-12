/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : fpt_asset

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 11/04/2024 17:09:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asset_details
-- ----------------------------
DROP TABLE IF EXISTS `asset_details`;
CREATE TABLE `asset_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `asset_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NULL DEFAULT NULL,
  `quantity` bigint NOT NULL DEFAULT 1,
  `receiver_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `asset_details_asset_id_foreign`(`asset_id` ASC) USING BTREE,
  INDEX `asset_details_room_id_foreign`(`room_id` ASC) USING BTREE,
  CONSTRAINT `asset_details_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `asset_details_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asset_details
-- ----------------------------
INSERT INTO `asset_details` VALUES (34, 14, 1, 1, '1', 1, '2024-03-28 06:07:20', '2024-03-29 01:31:50');
INSERT INTO `asset_details` VALUES (36, 13, 5, 1, '5', 1, '2024-03-28 06:08:58', '2024-04-05 08:35:33');
INSERT INTO `asset_details` VALUES (38, 13, 5, 1, '5', 1, '2024-03-28 06:09:30', '2024-04-05 09:07:50');
INSERT INTO `asset_details` VALUES (49, 14, 5, 1, '5', 1, '2024-03-29 01:31:50', '2024-04-05 09:07:50');
INSERT INTO `asset_details` VALUES (52, 24, 5, 200, '5', 1, '2024-03-29 01:46:49', '2024-04-05 09:07:50');
INSERT INTO `asset_details` VALUES (53, 24, 3, 150, '3', 1, '2024-03-29 01:48:06', '2024-04-05 08:58:54');
INSERT INTO `asset_details` VALUES (54, 25, 5, 2, '5', 1, '2024-03-29 02:02:59', '2024-04-05 08:17:42');
INSERT INTO `asset_details` VALUES (55, 26, 6, 1, '6', 1, '2024-03-29 02:02:59', '2024-04-05 08:20:58');
INSERT INTO `asset_details` VALUES (56, 27, 5, 3, '5', 1, '2024-03-29 02:02:59', '2024-03-29 03:31:32');
INSERT INTO `asset_details` VALUES (57, 25, NULL, 1, '3', 0, '2024-04-05 07:52:00', '2024-04-05 08:06:55');
INSERT INTO `asset_details` VALUES (58, 25, 6, 1, '6', 1, '2024-04-05 07:52:03', '2024-04-05 08:20:58');
INSERT INTO `asset_details` VALUES (59, 25, 5, 1, '5', 1, '2024-04-05 07:52:06', '2024-04-05 08:22:25');

-- ----------------------------
-- Table structure for assets
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `quantity` bigint NOT NULL,
  `category_asset_id` bigint UNSIGNED NULL DEFAULT NULL,
  `group_assets_id` bigint UNSIGNED NULL DEFAULT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `document_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `denominator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `material_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_of_use` date NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 1,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `assets_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `assets_category_asset_id_foreign`(`category_asset_id` ASC) USING BTREE,
  INDEX `assets_group_assets_id_foreign`(`group_assets_id` ASC) USING BTREE,
  CONSTRAINT `assets_category_asset_id_foreign` FOREIGN KEY (`category_asset_id`) REFERENCES `category_assets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `assets_group_assets_id_foreign` FOREIGN KEY (`group_assets_id`) REFERENCES `group_assets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES (13, NULL, 'Bàn làm việc HR231', 5, 2, 2, 1, 2000000, 4000000, '252461', NULL, '1C2D', 'Cái', '1', '3d18e4c96f6b169c8eacf060ec9aaac80e7980151d80e6acfbe9b9078b33bb08.jpg', NULL, '2024-03-27', 1, NULL, '2024-03-28 06:07:20', '2024-04-05 07:47:02');
INSERT INTO `assets` VALUES (14, NULL, 'TV TCL 65inch', 5, 2, 6, 2, 15000000, 30000000, '564641', NULL, '1K5C', 'Cái', '3', 'fae6a5bfd710521059ee522f49745d77658be3ed8df7c4e00f6cd77e921a0acf.png', NULL, '2024-03-27', 1, NULL, '2024-03-28 06:07:20', '2024-03-28 06:08:27');
INSERT INTO `assets` VALUES (24, NULL, 'Ghế đôn', 5, 350, 3, 1, 90000, 31500000, '12345', NULL, 'hd', 'Cái', '123', '49c2044e079031f84db3132cd3ba39ffac0b0be5eb7f2e5e54d57c2bc52fb38b.jpg', NULL, '2024-03-29', 1, NULL, '2024-03-29 01:45:31', '2024-04-05 07:51:43');
INSERT INTO `assets` VALUES (25, NULL, 'Ổ Cắm Điện Quang ĐQ ESK 02 143L5', 3, 5, 10, 1, 149840, 749200, '2013154', NULL, '1C24TAB', 'Cái', '3226', NULL, NULL, '2024-03-28', 1, NULL, '2024-03-29 02:02:59', '2024-04-05 08:05:36');
INSERT INTO `assets` VALUES (26, NULL, 'Sofa SB03', 5, 1, 12, 2, 5100000, 5100000, '2009813', '2', 'C23THB', 'Cái', '211', NULL, NULL, '2024-03-28', 1, NULL, '2024-03-29 02:02:59', '2024-04-05 07:51:02');
INSERT INTO `assets` VALUES (27, NULL, 'Bàn HRH1810C5', 5, 3, 11, 2, 2900000, 8700000, '2009813', '2', 'C23THB', 'Cái', '211', NULL, NULL, '2024-03-28', 1, NULL, '2024-03-29 02:02:59', '2024-03-29 02:02:59');

-- ----------------------------
-- Table structure for borrow_details
-- ----------------------------
DROP TABLE IF EXISTS `borrow_details`;
CREATE TABLE `borrow_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `borrow_id` bigint UNSIGNED NOT NULL,
  `category_assets_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `borrow_details_borrows_id_foreign`(`borrow_id` ASC) USING BTREE,
  INDEX `borrow_details_category_assets_id_foreign`(`category_assets_id` ASC) USING BTREE,
  CONSTRAINT `borrow_details_borrows_id_foreign` FOREIGN KEY (`borrow_id`) REFERENCES `borrows` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `borrow_details_category_assets_id_foreign` FOREIGN KEY (`category_assets_id`) REFERENCES `category_assets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrow_details
-- ----------------------------
INSERT INTO `borrow_details` VALUES (1, 19, 3, '2024-04-10 03:03:09', '2024-04-10 03:03:09', 250);
INSERT INTO `borrow_details` VALUES (2, 20, 3, '2024-04-10 03:34:05', '2024-04-10 03:34:05', 100);
INSERT INTO `borrow_details` VALUES (3, 21, 3, '2024-04-10 03:36:05', '2024-04-10 03:36:05', 1);
INSERT INTO `borrow_details` VALUES (4, 21, 10, '2024-04-10 03:36:05', '2024-04-10 03:36:05', 3);
INSERT INTO `borrow_details` VALUES (5, 22, 2, '2024-04-11 02:24:06', '2024-04-11 02:24:06', 2);

-- ----------------------------
-- Table structure for borrows
-- ----------------------------
DROP TABLE IF EXISTS `borrows`;
CREATE TABLE `borrows`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `borrows_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `borrows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrows
-- ----------------------------
INSERT INTO `borrows` VALUES (19, 3, '2024-04-10 13:00:00', '2024-04-10 17:00:00', 1, '2024-04-10 03:03:09', '2024-04-10 03:03:09');
INSERT INTO `borrows` VALUES (20, 3, '2024-04-10 13:00:00', '2024-04-10 16:00:00', 4, '2024-04-10 03:34:05', '2024-04-10 03:40:07');
INSERT INTO `borrows` VALUES (21, 3, '2024-04-10 12:00:00', '2024-04-10 12:59:00', 1, '2024-04-10 03:36:05', '2024-04-10 03:36:05');
INSERT INTO `borrows` VALUES (22, 5, '2024-04-11 13:00:00', '2024-04-12 13:00:00', 4, '2024-04-11 02:24:05', '2024-04-11 02:36:05');

-- ----------------------------
-- Table structure for category_assets
-- ----------------------------
DROP TABLE IF EXISTS `category_assets`;
CREATE TABLE `category_assets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `count_asset` bigint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_assets
-- ----------------------------
INSERT INTO `category_assets` VALUES (1, 'Ghế đen sinh viên', 1, 0, '2024-03-01 02:33:42', '2024-03-01 02:33:42');
INSERT INTO `category_assets` VALUES (2, 'Bàn làm việc', 1, 0, '2024-03-01 02:33:52', '2024-03-01 02:33:52');
INSERT INTO `category_assets` VALUES (3, 'Ghế đôn cam', 1, 0, '2024-03-01 02:34:14', '2024-03-01 02:34:14');
INSERT INTO `category_assets` VALUES (4, 'Bàn sinh viên có hộc', 1, 0, '2024-03-01 02:34:31', '2024-03-12 03:55:02');
INSERT INTO `category_assets` VALUES (5, 'Bàn sinh viên không hộc', 1, 0, '2024-03-01 02:34:40', '2024-03-12 03:55:10');
INSERT INTO `category_assets` VALUES (6, 'Tivi', 1, 0, '2024-03-01 02:34:59', '2024-03-28 09:38:55');
INSERT INTO `category_assets` VALUES (7, 'Bàn góc chữ L', 1, 0, '2024-03-12 03:54:48', '2024-03-12 03:54:48');
INSERT INTO `category_assets` VALUES (8, 'Ghế xếp hội trường', 1, 0, '2024-03-28 09:39:14', '2024-03-28 09:39:14');
INSERT INTO `category_assets` VALUES (9, 'Tủ lạnh', 1, 0, '2024-03-28 09:40:24', '2024-03-28 09:40:24');
INSERT INTO `category_assets` VALUES (10, 'Ổ điện', 1, 0, '2024-03-28 09:49:02', '2024-03-28 09:49:02');
INSERT INTO `category_assets` VALUES (11, 'Bàn họp', 1, 0, '2024-03-28 09:55:00', '2024-03-28 09:55:00');
INSERT INTO `category_assets` VALUES (12, 'Sofa', 1, 0, '2024-03-28 09:55:21', '2024-03-28 09:55:21');
INSERT INTO `category_assets` VALUES (13, 'Máy lọc nước', 1, 0, '2024-03-29 01:42:50', '2024-03-29 01:42:50');

-- ----------------------------
-- Table structure for category_rooms
-- ----------------------------
DROP TABLE IF EXISTS `category_rooms`;
CREATE TABLE `category_rooms`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_rooms
-- ----------------------------
INSERT INTO `category_rooms` VALUES (1, 'Phòng chức năng', 1, '2024-03-01 02:30:25', '2024-03-01 02:30:25');
INSERT INTO `category_rooms` VALUES (2, 'Phòng học', 1, '2024-03-01 02:30:34', '2024-03-01 02:30:34');
INSERT INTO `category_rooms` VALUES (3, 'Phòng kho', 1, '2024-03-01 02:30:43', '2024-03-01 02:30:43');
INSERT INTO `category_rooms` VALUES (4, 'Xưởng thực hành', 1, '2024-03-26 07:10:02', '2024-03-26 07:10:02');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
INSERT INTO `failed_jobs` VALUES (1, '30631d76-9f70-4254-bbf5-a82d3b8cb5da', 'database', 'default', '{\"uuid\":\"30631d76-9f70-4254-bbf5-a82d3b8cb5da\",\"displayName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendRemindEmail\\\":13:{s:11:\\\"\\u0000*\\u0000to_email\\\";s:18:\\\"khangnm6@fe.edu.vn\\\";s:10:\\\"\\u0000*\\u0000to_name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:0:{}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined index: name in D:\\xampp\\htdocs\\FPT-Asset\\storage\\framework\\views\\7e712d3e5a633b9c32214b04bfb8d940bdb760f0.php:7\nStack trace:\n#0 D:\\xampp\\htdocs\\FPT-Asset\\storage\\framework\\views\\7e712d3e5a633b9c32214b04bfb8d940bdb760f0.php(7): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined index...\', \'D:\\\\xampp\\\\htdocs...\', 7, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(107): require(\'D:\\\\xampp\\\\htdocs...\')\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(108): Illuminate\\Filesystem\\Filesystem::Illuminate\\Filesystem\\{closure}()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php(58): Illuminate\\Filesystem\\Filesystem->getRequire(\'D:\\\\xampp\\\\htdocs...\', Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php(61): Illuminate\\View\\Engines\\PhpEngine->evaluatePath(\'D:\\\\xampp\\\\htdocs...\', Array)\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php(37): Illuminate\\View\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(139): Facade\\Ignition\\Views\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(122): Illuminate\\View\\View->getContents()\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(91): Illuminate\\View\\View->renderContents()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(382): Illuminate\\View\\View->render()\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(355): Illuminate\\Mail\\Mailer->renderView(\'email.reminder\', Array)\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(273): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'email.reminder\', NULL, NULL, Array)\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.reminder\', Array, Object(Closure))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\ReminderEmail))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\ReminderEmail))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php(41): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\ReminderEmail))\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendRemindEmail->handle()\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendRemindEmail), false)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendRemindEmail))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 {main}\n\nNext Facade\\Ignition\\Exceptions\\ViewException: Undefined index: name (View: D:\\xampp\\htdocs\\FPT-Asset\\resources\\views\\email\\reminder.blade.php) in D:\\xampp\\htdocs\\FPT-Asset\\resources\\views/email/reminder.blade.php:7\nStack trace:\n#0 D:\\xampp\\htdocs\\FPT-Asset\\resources\\views/email/reminder.blade.php(7): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined index...\', \'D:\\\\xampp\\\\htdocs...\', 7, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(107): require(\'D:\\\\xampp\\\\htdocs...\')\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(108): Illuminate\\Filesystem\\Filesystem::Illuminate\\Filesystem\\{closure}()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php(58): Illuminate\\Filesystem\\Filesystem->getRequire(\'D:\\\\xampp\\\\htdocs...\', Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php(61): Illuminate\\View\\Engines\\PhpEngine->evaluatePath(\'D:\\\\xampp\\\\htdocs...\', Array)\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php(37): Illuminate\\View\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(139): Facade\\Ignition\\Views\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(122): Illuminate\\View\\View->getContents()\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(91): Illuminate\\View\\View->renderContents()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(382): Illuminate\\View\\View->render()\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(355): Illuminate\\Mail\\Mailer->renderView(\'email.reminder\', Array)\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(273): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'email.reminder\', NULL, NULL, Array)\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.reminder\', Array, Object(Closure))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\ReminderEmail))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\ReminderEmail))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php(41): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\ReminderEmail))\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendRemindEmail->handle()\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendRemindEmail), false)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendRemindEmail))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 {main}', '2024-03-19 08:00:15');
INSERT INTO `failed_jobs` VALUES (2, '67bbd2d7-6b0b-426f-9817-f786b42ad8c6', 'database', 'default', '{\"uuid\":\"67bbd2d7-6b0b-426f-9817-f786b42ad8c6\",\"displayName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendRemindEmail\\\":13:{s:11:\\\"\\u0000*\\u0000to_email\\\";s:18:\\\"khangnm6@fe.edu.vn\\\";s:10:\\\"\\u0000*\\u0000to_name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:1:{s:4:\\\"name\\\";s:17:\\\"Khang Nguyen Minh\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ArgumentCountError: Too few arguments to function App\\Mail\\ReminderEmail::__construct(), 1 passed in D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php on line 41 and exactly 2 expected in D:\\xampp\\htdocs\\FPT-Asset\\app\\Mail\\ReminderEmail.php:22\nStack trace:\n#0 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php(41): App\\Mail\\ReminderEmail->__construct(Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendRemindEmail->handle()\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendRemindEmail), false)\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendRemindEmail))\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2024-03-19 08:15:19');
INSERT INTO `failed_jobs` VALUES (3, '6dc15916-1c20-49f0-bb31-9151429962a9', 'database', 'default', '{\"uuid\":\"6dc15916-1c20-49f0-bb31-9151429962a9\",\"displayName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendRemindEmail\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendRemindEmail\\\":14:{s:11:\\\"\\u0000*\\u0000to_email\\\";s:18:\\\"khangnm6@fe.edu.vn\\\";s:10:\\\"\\u0000*\\u0000to_name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:1:{s:4:\\\"name\\\";s:17:\\\"Khang Nguyen Minh\\\";}s:10:\\\"\\u0000*\\u0000subject\\\";s:48:\\\"Nhắc nhờ hoàn trả tài sản đã mượn\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Illegal string offset \'name\' in D:\\xampp\\htdocs\\FPT-Asset\\storage\\framework\\views\\7e712d3e5a633b9c32214b04bfb8d940bdb760f0.php:7\nStack trace:\n#0 D:\\xampp\\htdocs\\FPT-Asset\\storage\\framework\\views\\7e712d3e5a633b9c32214b04bfb8d940bdb760f0.php(7): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Illegal string ...\', \'D:\\\\xampp\\\\htdocs...\', 7, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(107): require(\'D:\\\\xampp\\\\htdocs...\')\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(108): Illuminate\\Filesystem\\Filesystem::Illuminate\\Filesystem\\{closure}()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php(58): Illuminate\\Filesystem\\Filesystem->getRequire(\'D:\\\\xampp\\\\htdocs...\', Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php(61): Illuminate\\View\\Engines\\PhpEngine->evaluatePath(\'D:\\\\xampp\\\\htdocs...\', Array)\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php(37): Illuminate\\View\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(139): Facade\\Ignition\\Views\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(122): Illuminate\\View\\View->getContents()\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(91): Illuminate\\View\\View->renderContents()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(382): Illuminate\\View\\View->render()\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(355): Illuminate\\Mail\\Mailer->renderView(\'email.reminder\', Array)\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(273): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'email.reminder\', NULL, NULL, Array)\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.reminder\', Array, Object(Closure))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\ReminderEmail))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\ReminderEmail))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\ReminderEmail))\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendRemindEmail->handle()\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendRemindEmail), false)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendRemindEmail))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 {main}\n\nNext Facade\\Ignition\\Exceptions\\ViewException: Illegal string offset \'name\' (View: D:\\xampp\\htdocs\\FPT-Asset\\resources\\views\\email\\reminder.blade.php) in D:\\xampp\\htdocs\\FPT-Asset\\resources\\views/email/reminder.blade.php:7\nStack trace:\n#0 D:\\xampp\\htdocs\\FPT-Asset\\resources\\views/email/reminder.blade.php(7): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Illegal string ...\', \'D:\\\\xampp\\\\htdocs...\', 7, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(107): require(\'D:\\\\xampp\\\\htdocs...\')\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php(108): Illuminate\\Filesystem\\Filesystem::Illuminate\\Filesystem\\{closure}()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php(58): Illuminate\\Filesystem\\Filesystem->getRequire(\'D:\\\\xampp\\\\htdocs...\', Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php(61): Illuminate\\View\\Engines\\PhpEngine->evaluatePath(\'D:\\\\xampp\\\\htdocs...\', Array)\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\facade\\ignition\\src\\Views\\Engines\\CompilerEngine.php(37): Illuminate\\View\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(139): Facade\\Ignition\\Views\\Engines\\CompilerEngine->get(\'D:\\\\xampp\\\\htdocs...\', Array)\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(122): Illuminate\\View\\View->getContents()\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php(91): Illuminate\\View\\View->renderContents()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(382): Illuminate\\View\\View->render()\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(355): Illuminate\\Mail\\Mailer->renderView(\'email.reminder\', Array)\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(273): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'email.reminder\', NULL, NULL, Array)\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.reminder\', Array, Object(Closure))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\ReminderEmail))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\ReminderEmail))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendRemindEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\ReminderEmail))\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendRemindEmail->handle()\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendRemindEmail), false)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendRemindEmail))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendRemindEmail))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 {main}', '2024-03-19 08:40:42');
INSERT INTO `failed_jobs` VALUES (4, '97fd7cfe-ad0b-4694-ba2e-10d79fd67e2b', 'database', 'default', '{\"uuid\":\"97fd7cfe-ad0b-4694-ba2e-10d79fd67e2b\",\"displayName\":\"App\\\\Jobs\\\\SendNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendNotificationEmail\\\":15:{s:11:\\\"\\u0000*\\u0000to_email\\\";s:18:\\\"khangnm6@fe.edu.vn\\\";s:10:\\\"\\u0000*\\u0000to_name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:4:\\\"name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"details\\\";O:39:\\\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:23:\\\"App\\\\Models\\\\BorrowDetail\\\":30:{s:11:\\\"\\u0000*\\u0000fillable\\\";a:3:{i:0;s:9:\\\"borrow_id\\\";i:1;s:18:\\\"category_assets_id\\\";i:2;s:8:\\\"quantity\\\";}s:9:\\\"\\u0000*\\u0000hidden\\\";a:2:{i:0;s:10:\\\"created_at\\\";i:1;s:10:\\\"updated_at\\\";}s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";s:14:\\\"borrow_details\\\";s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:0;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:6:{s:2:\\\"id\\\";i:10;s:9:\\\"borrow_id\\\";i:8;s:18:\\\"category_assets_id\\\";i:2;s:10:\\\"created_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:8:\\\"quantity\\\";i:1;}s:11:\\\"\\u0000*\\u0000original\\\";a:6:{s:2:\\\"id\\\";i:10;s:9:\\\"borrow_id\\\";i:8;s:18:\\\"category_assets_id\\\";i:2;s:10:\\\"created_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:8:\\\"quantity\\\";i:1;}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:0:{}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:8:\\\"\\u0000*\\u0000dates\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:1:{s:8:\\\"category\\\";O:24:\\\"App\\\\Models\\\\CategoryAsset\\\":30:{s:11:\\\"\\u0000*\\u0000fillable\\\";a:3:{i:0;s:4:\\\"name\\\";i:1;s:6:\\\"status\\\";i:2;s:11:\\\"count_asset\\\";}s:9:\\\"\\u0000*\\u0000hidden\\\";a:2:{i:0;s:10:\\\"created_at\\\";i:1;s:10:\\\"updated_at\\\";}s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";s:15:\\\"category_assets\\\";s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:0;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:6:{s:2:\\\"id\\\";i:2;s:4:\\\"name\\\";s:16:\\\"Bàn làm việc\\\";s:6:\\\"status\\\";i:1;s:11:\\\"count_asset\\\";i:0;s:10:\\\"created_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:6:{s:2:\\\"id\\\";i:2;s:4:\\\"name\\\";s:16:\\\"Bàn làm việc\\\";s:6:\\\"status\\\";i:1;s:11:\\\"count_asset\\\";i:0;s:10:\\\"created_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:0:{}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:8:\\\"\\u0000*\\u0000dates\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:10:\\\"timestamps\\\";b:1;s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:1:{i:0;s:1:\\\"*\\\";}}}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:10:\\\"timestamps\\\";b:1;s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:1:{i:0;s:1:\\\"*\\\";}}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}}s:10:\\\"\\u0000*\\u0000subject\\\";s:43:\\\"Xác nhận mượn tài sản thành công\\\";s:12:\\\"\\u0000*\\u0000cc_emails\\\";a:2:{i:0;s:26:\\\"khangdeptrai2804@gmail.com\\\";i:1;s:21:\\\"khangnm2804@gmail.com\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host smtp.gmail.com :stream_socket_client(): php_network_getaddresses: getaddrinfo failed: No such host is known.  in D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'D:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'tcp://smtp.gmai...\', 0, \'php_network_get...\', 30, 4, Resource id #896)\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.notificat...\', Array, Object(Closure))\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\NotificationSuccessEmail))\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\NotificationSuccessEmail))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendNotificationEmail.php(45): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\NotificationSuccessEmail))\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendNotificationEmail->handle()\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendNotificationEmail), false)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendNotificationEmail))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2024-03-28 03:02:02');
INSERT INTO `failed_jobs` VALUES (5, 'cd3857af-d10b-453b-b853-2584513e3653', 'database', 'default', '{\"uuid\":\"cd3857af-d10b-453b-b853-2584513e3653\",\"displayName\":\"App\\\\Jobs\\\\SendNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendNotificationEmail\\\":15:{s:11:\\\"\\u0000*\\u0000to_email\\\";s:18:\\\"khangnm6@fe.edu.vn\\\";s:10:\\\"\\u0000*\\u0000to_name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:4:\\\"name\\\";s:17:\\\"Khang Nguyen Minh\\\";s:7:\\\"details\\\";O:39:\\\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\\\":2:{s:8:\\\"\\u0000*\\u0000items\\\";a:1:{i:0;O:23:\\\"App\\\\Models\\\\BorrowDetail\\\":30:{s:11:\\\"\\u0000*\\u0000fillable\\\";a:3:{i:0;s:9:\\\"borrow_id\\\";i:1;s:18:\\\"category_assets_id\\\";i:2;s:8:\\\"quantity\\\";}s:9:\\\"\\u0000*\\u0000hidden\\\";a:2:{i:0;s:10:\\\"created_at\\\";i:1;s:10:\\\"updated_at\\\";}s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";s:14:\\\"borrow_details\\\";s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:0;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:6:{s:2:\\\"id\\\";i:10;s:9:\\\"borrow_id\\\";i:8;s:18:\\\"category_assets_id\\\";i:2;s:10:\\\"created_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:8:\\\"quantity\\\";i:1;}s:11:\\\"\\u0000*\\u0000original\\\";a:6:{s:2:\\\"id\\\";i:10;s:9:\\\"borrow_id\\\";i:8;s:18:\\\"category_assets_id\\\";i:2;s:10:\\\"created_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-28 02:39:37\\\";s:8:\\\"quantity\\\";i:1;}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:0:{}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:8:\\\"\\u0000*\\u0000dates\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:1:{s:8:\\\"category\\\";O:24:\\\"App\\\\Models\\\\CategoryAsset\\\":30:{s:11:\\\"\\u0000*\\u0000fillable\\\";a:3:{i:0;s:4:\\\"name\\\";i:1;s:6:\\\"status\\\";i:2;s:11:\\\"count_asset\\\";}s:9:\\\"\\u0000*\\u0000hidden\\\";a:2:{i:0;s:10:\\\"created_at\\\";i:1;s:10:\\\"updated_at\\\";}s:13:\\\"\\u0000*\\u0000connection\\\";s:5:\\\"mysql\\\";s:8:\\\"\\u0000*\\u0000table\\\";s:15:\\\"category_assets\\\";s:13:\\\"\\u0000*\\u0000primaryKey\\\";s:2:\\\"id\\\";s:10:\\\"\\u0000*\\u0000keyType\\\";s:3:\\\"int\\\";s:12:\\\"incrementing\\\";b:1;s:7:\\\"\\u0000*\\u0000with\\\";a:0:{}s:12:\\\"\\u0000*\\u0000withCount\\\";a:0:{}s:19:\\\"preventsLazyLoading\\\";b:0;s:10:\\\"\\u0000*\\u0000perPage\\\";i:15;s:6:\\\"exists\\\";b:1;s:18:\\\"wasRecentlyCreated\\\";b:0;s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;s:13:\\\"\\u0000*\\u0000attributes\\\";a:6:{s:2:\\\"id\\\";i:2;s:4:\\\"name\\\";s:16:\\\"Bàn làm việc\\\";s:6:\\\"status\\\";i:1;s:11:\\\"count_asset\\\";i:0;s:10:\\\"created_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";}s:11:\\\"\\u0000*\\u0000original\\\";a:6:{s:2:\\\"id\\\";i:2;s:4:\\\"name\\\";s:16:\\\"Bàn làm việc\\\";s:6:\\\"status\\\";i:1;s:11:\\\"count_asset\\\";i:0;s:10:\\\"created_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";s:10:\\\"updated_at\\\";s:19:\\\"2024-03-01 02:33:52\\\";}s:10:\\\"\\u0000*\\u0000changes\\\";a:0:{}s:8:\\\"\\u0000*\\u0000casts\\\";a:0:{}s:17:\\\"\\u0000*\\u0000classCastCache\\\";a:0:{}s:21:\\\"\\u0000*\\u0000attributeCastCache\\\";a:0:{}s:8:\\\"\\u0000*\\u0000dates\\\";a:0:{}s:13:\\\"\\u0000*\\u0000dateFormat\\\";N;s:10:\\\"\\u0000*\\u0000appends\\\";a:0:{}s:19:\\\"\\u0000*\\u0000dispatchesEvents\\\";a:0:{}s:14:\\\"\\u0000*\\u0000observables\\\";a:0:{}s:12:\\\"\\u0000*\\u0000relations\\\";a:0:{}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:10:\\\"timestamps\\\";b:1;s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:1:{i:0;s:1:\\\"*\\\";}}}s:10:\\\"\\u0000*\\u0000touches\\\";a:0:{}s:10:\\\"timestamps\\\";b:1;s:10:\\\"\\u0000*\\u0000visible\\\";a:0:{}s:10:\\\"\\u0000*\\u0000guarded\\\";a:1:{i:0;s:1:\\\"*\\\";}}}s:28:\\\"\\u0000*\\u0000escapeWhenCastingToString\\\";b:0;}}s:10:\\\"\\u0000*\\u0000subject\\\";s:43:\\\"Xác nhận mượn tài sản thành công\\\";s:12:\\\"\\u0000*\\u0000cc_emails\\\";a:2:{i:0;s:26:\\\"khangdeptrai2804@gmail.com\\\";i:1;s:21:\\\"khangnm2804@gmail.com\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host smtp.gmail.com :stream_socket_client(): php_network_getaddresses: getaddrinfo failed: No such host is known.  in D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'D:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'tcp://smtp.gmai...\', 0, \'php_network_get...\', 30, 4, Resource id #893)\n#2 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(\'email.notificat...\', Array, Object(Closure))\n#8 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\NotificationSuccessEmail))\n#12 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\NotificationSuccessEmail))\n#13 D:\\xampp\\htdocs\\FPT-Asset\\app\\Jobs\\SendNotificationEmail.php(45): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\NotificationSuccessEmail))\n#14 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendNotificationEmail->handle()\n#15 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#21 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#22 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendNotificationEmail), false)\n#24 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#25 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendNotificationEmail))\n#26 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendNotificationEmail))\n#28 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 D:\\xampp\\htdocs\\FPT-Asset\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 D:\\xampp\\htdocs\\FPT-Asset\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2024-03-28 03:17:39');

-- ----------------------------
-- Table structure for group_assets
-- ----------------------------
DROP TABLE IF EXISTS `group_assets`;
CREATE TABLE `group_assets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_asset` bigint NOT NULL DEFAULT 0,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group_assets
-- ----------------------------
INSERT INTO `group_assets` VALUES (1, 'Công cụ dụng cụ', 0, 1, '2024-03-01 02:33:17', '2024-03-01 02:33:17');
INSERT INTO `group_assets` VALUES (2, 'Tài sản', 0, 1, '2024-03-01 02:33:29', '2024-03-01 02:33:29');

-- ----------------------------
-- Table structure for handovers
-- ----------------------------
DROP TABLE IF EXISTS `handovers`;
CREATE TABLE `handovers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `asset_details_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `handovers_asset_details_id_foreign`(`asset_details_id` ASC) USING BTREE,
  INDEX `handovers_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `handovers_asset_details_id_foreign` FOREIGN KEY (`asset_details_id`) REFERENCES `asset_details` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `handovers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of handovers
-- ----------------------------

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `denominator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique_denominator_symbol_invoice_number`(`denominator` ASC, `symbol` ASC, `invoice_number` ASC) USING BTREE,
  INDEX `FK_invoices_users`(`user_id` ASC) USING BTREE,
  CONSTRAINT `FK_invoices_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES (9, NULL, '1C24TAB', '3226', '1C24TAB3226.pdf', '2024-04-05 07:24:37', '2024-04-05 07:24:37', 3);
INSERT INTO `invoices` VALUES (11, '2', 'C23THB', '211', '2C23THB211.pdf', '2024-04-05 07:39:34', '2024-04-05 07:39:34', 3);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_11_28_024826_create_category_rooms_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_11_28_024826_create_rooms_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_11_29_133821_create_group_assets_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_11_29_133822_create_category_asset_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_12_06_022540_create_assets_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_12_06_023534_create_assets_detail_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_01_25_024847_create_handovers_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_02_19_075653_create_settings_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_02_21_072725_create_borrows_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_02_21_073246_create_borrows_details_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_02_27_025626_create_semesters_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_02_29_071258_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (17, '2024_03_19_073059_create_jobs_table', 2);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (4, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 6);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'categoryrooms.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (2, 'categoryrooms.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (3, 'categoryrooms.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (4, 'categoryrooms.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (5, 'categoryrooms.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (6, 'categoryrooms.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (25, 'room.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (26, 'room.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (27, 'room.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (28, 'room.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (29, 'room.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (30, 'room.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (31, 'assetdetails.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (32, 'assetdetails.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (33, 'assetdetails.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (34, 'assetdetails.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (35, 'assetdetails.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (37, 'assetdetails.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (38, 'asset.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (39, 'asset.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (40, 'asset.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (41, 'asset.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (42, 'asset.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (43, 'asset.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (51, 'borrows.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (52, 'borrows.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (53, 'borrows.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (54, 'borrows.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (55, 'borrows.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (56, 'borrows.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (57, 'categoryasset.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (58, 'categoryasset.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (59, 'categoryasset.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (60, 'categoryasset.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (61, 'categoryasset.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (62, 'categoryasset.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (63, 'groupasset.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (64, 'groupasset.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (65, 'groupasset.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (66, 'groupasset.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (67, 'groupasset.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (68, 'groupasset.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (69, 'handovers.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (70, 'handovers.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (71, 'handovers.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (72, 'handovers.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (73, 'handovers.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (74, 'handovers.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (75, 'role.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (76, 'role.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (77, 'role.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (78, 'role.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (79, 'role.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (80, 'role.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (81, 'semester.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (82, 'semester.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (83, 'semester.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (84, 'semester.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (85, 'semester.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (86, 'semester.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (87, 'user.index', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (88, 'user.store', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (89, 'user.edit', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (90, 'user.show', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (91, 'user.update', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (92, 'user.delete', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `permissions` VALUES (93, 'dashboard', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (40, 1);
INSERT INTO `role_has_permissions` VALUES (25, 2);
INSERT INTO `role_has_permissions` VALUES (28, 2);
INSERT INTO `role_has_permissions` VALUES (31, 2);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 2);
INSERT INTO `role_has_permissions` VALUES (34, 2);
INSERT INTO `role_has_permissions` VALUES (38, 2);
INSERT INTO `role_has_permissions` VALUES (39, 2);
INSERT INTO `role_has_permissions` VALUES (41, 2);
INSERT INTO `role_has_permissions` VALUES (42, 2);
INSERT INTO `role_has_permissions` VALUES (43, 2);
INSERT INTO `role_has_permissions` VALUES (51, 2);
INSERT INTO `role_has_permissions` VALUES (52, 2);
INSERT INTO `role_has_permissions` VALUES (53, 2);
INSERT INTO `role_has_permissions` VALUES (54, 2);
INSERT INTO `role_has_permissions` VALUES (55, 2);
INSERT INTO `role_has_permissions` VALUES (56, 2);
INSERT INTO `role_has_permissions` VALUES (69, 2);
INSERT INTO `role_has_permissions` VALUES (70, 2);
INSERT INTO `role_has_permissions` VALUES (71, 2);
INSERT INTO `role_has_permissions` VALUES (72, 2);
INSERT INTO `role_has_permissions` VALUES (73, 2);
INSERT INTO `role_has_permissions` VALUES (74, 2);
INSERT INTO `role_has_permissions` VALUES (93, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (2, 3);
INSERT INTO `role_has_permissions` VALUES (3, 3);
INSERT INTO `role_has_permissions` VALUES (4, 3);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (6, 3);
INSERT INTO `role_has_permissions` VALUES (25, 3);
INSERT INTO `role_has_permissions` VALUES (26, 3);
INSERT INTO `role_has_permissions` VALUES (27, 3);
INSERT INTO `role_has_permissions` VALUES (28, 3);
INSERT INTO `role_has_permissions` VALUES (29, 3);
INSERT INTO `role_has_permissions` VALUES (30, 3);
INSERT INTO `role_has_permissions` VALUES (31, 3);
INSERT INTO `role_has_permissions` VALUES (32, 3);
INSERT INTO `role_has_permissions` VALUES (33, 3);
INSERT INTO `role_has_permissions` VALUES (34, 3);
INSERT INTO `role_has_permissions` VALUES (35, 3);
INSERT INTO `role_has_permissions` VALUES (37, 3);
INSERT INTO `role_has_permissions` VALUES (38, 3);
INSERT INTO `role_has_permissions` VALUES (39, 3);
INSERT INTO `role_has_permissions` VALUES (40, 3);
INSERT INTO `role_has_permissions` VALUES (41, 3);
INSERT INTO `role_has_permissions` VALUES (42, 3);
INSERT INTO `role_has_permissions` VALUES (43, 3);
INSERT INTO `role_has_permissions` VALUES (51, 3);
INSERT INTO `role_has_permissions` VALUES (52, 3);
INSERT INTO `role_has_permissions` VALUES (53, 3);
INSERT INTO `role_has_permissions` VALUES (54, 3);
INSERT INTO `role_has_permissions` VALUES (55, 3);
INSERT INTO `role_has_permissions` VALUES (56, 3);
INSERT INTO `role_has_permissions` VALUES (57, 3);
INSERT INTO `role_has_permissions` VALUES (58, 3);
INSERT INTO `role_has_permissions` VALUES (59, 3);
INSERT INTO `role_has_permissions` VALUES (60, 3);
INSERT INTO `role_has_permissions` VALUES (61, 3);
INSERT INTO `role_has_permissions` VALUES (62, 3);
INSERT INTO `role_has_permissions` VALUES (63, 3);
INSERT INTO `role_has_permissions` VALUES (64, 3);
INSERT INTO `role_has_permissions` VALUES (65, 3);
INSERT INTO `role_has_permissions` VALUES (66, 3);
INSERT INTO `role_has_permissions` VALUES (67, 3);
INSERT INTO `role_has_permissions` VALUES (68, 3);
INSERT INTO `role_has_permissions` VALUES (69, 3);
INSERT INTO `role_has_permissions` VALUES (70, 3);
INSERT INTO `role_has_permissions` VALUES (71, 3);
INSERT INTO `role_has_permissions` VALUES (72, 3);
INSERT INTO `role_has_permissions` VALUES (73, 3);
INSERT INTO `role_has_permissions` VALUES (74, 3);
INSERT INTO `role_has_permissions` VALUES (75, 3);
INSERT INTO `role_has_permissions` VALUES (76, 3);
INSERT INTO `role_has_permissions` VALUES (77, 3);
INSERT INTO `role_has_permissions` VALUES (78, 3);
INSERT INTO `role_has_permissions` VALUES (79, 3);
INSERT INTO `role_has_permissions` VALUES (80, 3);
INSERT INTO `role_has_permissions` VALUES (81, 3);
INSERT INTO `role_has_permissions` VALUES (82, 3);
INSERT INTO `role_has_permissions` VALUES (83, 3);
INSERT INTO `role_has_permissions` VALUES (84, 3);
INSERT INTO `role_has_permissions` VALUES (85, 3);
INSERT INTO `role_has_permissions` VALUES (86, 3);
INSERT INTO `role_has_permissions` VALUES (87, 3);
INSERT INTO `role_has_permissions` VALUES (88, 3);
INSERT INTO `role_has_permissions` VALUES (89, 3);
INSERT INTO `role_has_permissions` VALUES (90, 3);
INSERT INTO `role_has_permissions` VALUES (91, 3);
INSERT INTO `role_has_permissions` VALUES (92, 3);
INSERT INTO `role_has_permissions` VALUES (93, 3);
INSERT INTO `role_has_permissions` VALUES (1, 4);
INSERT INTO `role_has_permissions` VALUES (2, 4);
INSERT INTO `role_has_permissions` VALUES (3, 4);
INSERT INTO `role_has_permissions` VALUES (4, 4);
INSERT INTO `role_has_permissions` VALUES (5, 4);
INSERT INTO `role_has_permissions` VALUES (6, 4);
INSERT INTO `role_has_permissions` VALUES (25, 4);
INSERT INTO `role_has_permissions` VALUES (26, 4);
INSERT INTO `role_has_permissions` VALUES (27, 4);
INSERT INTO `role_has_permissions` VALUES (28, 4);
INSERT INTO `role_has_permissions` VALUES (29, 4);
INSERT INTO `role_has_permissions` VALUES (30, 4);
INSERT INTO `role_has_permissions` VALUES (31, 4);
INSERT INTO `role_has_permissions` VALUES (32, 4);
INSERT INTO `role_has_permissions` VALUES (33, 4);
INSERT INTO `role_has_permissions` VALUES (34, 4);
INSERT INTO `role_has_permissions` VALUES (35, 4);
INSERT INTO `role_has_permissions` VALUES (37, 4);
INSERT INTO `role_has_permissions` VALUES (38, 4);
INSERT INTO `role_has_permissions` VALUES (39, 4);
INSERT INTO `role_has_permissions` VALUES (40, 4);
INSERT INTO `role_has_permissions` VALUES (41, 4);
INSERT INTO `role_has_permissions` VALUES (42, 4);
INSERT INTO `role_has_permissions` VALUES (43, 4);
INSERT INTO `role_has_permissions` VALUES (51, 4);
INSERT INTO `role_has_permissions` VALUES (52, 4);
INSERT INTO `role_has_permissions` VALUES (53, 4);
INSERT INTO `role_has_permissions` VALUES (54, 4);
INSERT INTO `role_has_permissions` VALUES (55, 4);
INSERT INTO `role_has_permissions` VALUES (56, 4);
INSERT INTO `role_has_permissions` VALUES (57, 4);
INSERT INTO `role_has_permissions` VALUES (58, 4);
INSERT INTO `role_has_permissions` VALUES (59, 4);
INSERT INTO `role_has_permissions` VALUES (60, 4);
INSERT INTO `role_has_permissions` VALUES (61, 4);
INSERT INTO `role_has_permissions` VALUES (62, 4);
INSERT INTO `role_has_permissions` VALUES (63, 4);
INSERT INTO `role_has_permissions` VALUES (64, 4);
INSERT INTO `role_has_permissions` VALUES (65, 4);
INSERT INTO `role_has_permissions` VALUES (66, 4);
INSERT INTO `role_has_permissions` VALUES (67, 4);
INSERT INTO `role_has_permissions` VALUES (68, 4);
INSERT INTO `role_has_permissions` VALUES (69, 4);
INSERT INTO `role_has_permissions` VALUES (70, 4);
INSERT INTO `role_has_permissions` VALUES (71, 4);
INSERT INTO `role_has_permissions` VALUES (72, 4);
INSERT INTO `role_has_permissions` VALUES (73, 4);
INSERT INTO `role_has_permissions` VALUES (74, 4);
INSERT INTO `role_has_permissions` VALUES (75, 4);
INSERT INTO `role_has_permissions` VALUES (76, 4);
INSERT INTO `role_has_permissions` VALUES (77, 4);
INSERT INTO `role_has_permissions` VALUES (78, 4);
INSERT INTO `role_has_permissions` VALUES (79, 4);
INSERT INTO `role_has_permissions` VALUES (80, 4);
INSERT INTO `role_has_permissions` VALUES (81, 4);
INSERT INTO `role_has_permissions` VALUES (82, 4);
INSERT INTO `role_has_permissions` VALUES (83, 4);
INSERT INTO `role_has_permissions` VALUES (84, 4);
INSERT INTO `role_has_permissions` VALUES (85, 4);
INSERT INTO `role_has_permissions` VALUES (86, 4);
INSERT INTO `role_has_permissions` VALUES (93, 4);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'teacher', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `roles` VALUES (2, 'staff', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `roles` VALUES (3, 'admin', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `roles` VALUES (4, 'manager', 'web', '2024-02-29 07:20:33', '2024-02-29 07:20:33');

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_room_id` bigint UNSIGNED NOT NULL,
  `manager_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `count_asset` bigint NOT NULL DEFAULT 0,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rooms_category_room_id_foreign`(`category_room_id` ASC) USING BTREE,
  INDEX `rooms_manager_id_foreign`(`manager_id` ASC) USING BTREE,
  INDEX `rooms_created_by_foreign`(`created_by` ASC) USING BTREE,
  CONSTRAINT `rooms_category_room_id_foreign` FOREIGN KEY (`category_room_id`) REFERENCES `category_rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rooms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rooms_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 1, 6, 'Phòng Hành Chính', 1, 1, 0, 3, '2024-03-01 02:31:27', '2024-03-29 01:41:23');
INSERT INTO `rooms` VALUES (2, 1, 2, 'Phòng CTSV', 1, 1, 0, 3, '2024-03-01 02:32:41', '2024-03-29 01:12:16');
INSERT INTO `rooms` VALUES (3, 1, 2, 'Phòng DVSV', 1, 1, 0, 3, '2024-03-01 02:32:59', '2024-03-29 01:12:32');
INSERT INTO `rooms` VALUES (4, 1, 2, 'P. Hội Trường', 1, 0, 0, 3, '2024-03-05 07:12:03', '2024-03-26 07:27:17');
INSERT INTO `rooms` VALUES (5, 4, 5, 'Software', 3, 1, 0, 5, '2024-03-26 07:13:17', '2024-03-26 07:13:17');
INSERT INTO `rooms` VALUES (6, 1, 1, 'P. Đào tạo', 1, 1, 0, 5, '2024-03-28 09:21:55', '2024-03-28 09:34:28');

-- ----------------------------
-- Table structure for semesters
-- ----------------------------
DROP TABLE IF EXISTS `semesters`;
CREATE TABLE `semesters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semesters
-- ----------------------------
INSERT INTO `semesters` VALUES (1, 'Spring 2024', '2023-12-01', '2024-04-30', '2024-03-04 07:50:58', '2024-03-08 08:01:39');
INSERT INTO `semesters` VALUES (2, 'Summer 2024', '2024-05-01', '2024-09-30', '2024-03-28 06:17:18', '2024-03-28 06:17:18');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `settings_key_unique`(`key` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'assets_borrowed', '[\"54\",\"58\",\"59\",\"36\",\"38\",\"52\",\"53\",\"34\"]', '2024-02-29 14:20:48', '2024-04-08 01:48:04');
INSERT INTO `settings` VALUES (2, 'cc_mails', '[\"khangdeptrai2804@gmail.com\",\"khangnm2804@gmail.com\"]', '2024-04-08 14:46:22', '2024-04-08 14:46:26');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Example User', 'teacher@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CIqjzgGH9bvSDJZE0IQqJU8ugsG53HhjetlBcD9u0IP68r7EZqxqUmvdkwbR', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (2, 'Example Staff User', 'staff@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KLxDEgq6Vkaf6HwVabgeisfzKYXZZbRrzfj9W788KFRYJIBFqGKYLY6Y3qp5', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (3, 'Example Admin User', 'admin@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '08Zuh0312rFAsNYHHVzDBAIQ5tFODZVKdSbeXimF6LKsFpNrBInOtpbG7rKN', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (4, 'Example Manger User', 'manager@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Y0Za9RLIf847OAMUXXw4zUhkhjLN3m42M7YIux8DFwvQjckIvipiF9VHRgUs', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (5, 'Khang Nguyen Minh', 'khangnm6@fe.edu.vn', NULL, NULL, NULL, '2024-03-08 02:06:55', '2024-03-08 02:06:55');
INSERT INTO `users` VALUES (6, 'Chau Cu Thi Minh', 'ChauCTM@fe.edu.vn', NULL, NULL, NULL, '2024-03-08 03:50:29', '2024-03-08 03:50:29');
INSERT INTO `users` VALUES (7, 'Nguyễn Minh Khang', 'admin1@example.com', NULL, '$2y$10$/zn04djEGBl6WvxL4X.zHOb/EHWJpvYcP1NqVQjfW.gJg3UmWJgpO', NULL, '2024-04-11 08:00:59', '2024-04-11 08:00:59');
INSERT INTO `users` VALUES (8, 'Spring 2024', 'admin11@example.com', NULL, '$2y$10$5sFsq0ABpugMZ5Z/M5e88eXYRMGNHSIlbyF.dGyFoRt/Q6lF9iYKq', NULL, '2024-04-11 08:35:50', '2024-04-11 08:35:50');

SET FOREIGN_KEY_CHECKS = 1;
