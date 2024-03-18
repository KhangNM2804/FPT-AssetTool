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

 Date: 15/03/2024 15:21:55
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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asset_details
-- ----------------------------
INSERT INTO `asset_details` VALUES (2, 2, 2, 250, '2', 0, '2024-03-01 02:50:37', '2024-03-08 08:33:44');
INSERT INTO `asset_details` VALUES (3, 3, 2, 20, '2', 1, '2024-03-01 02:50:37', '2024-03-14 02:45:26');
INSERT INTO `asset_details` VALUES (6, 2, 2, 250, '2', 1, '2024-03-01 02:51:57', '2024-03-01 02:58:34');
INSERT INTO `asset_details` VALUES (16, 5, 1, 5, '1', 1, '2024-03-14 02:34:39', '2024-03-14 02:48:45');
INSERT INTO `asset_details` VALUES (18, 5, 2, 4, '2', 1, '2024-03-14 02:37:49', '2024-03-14 02:48:45');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES (2, NULL, 'Ghế đôn phòng kho tầng 3', 3, 500, 3, 1, 100000, 50000000, '655541', '23', 'CK6', 'Cái', '511', NULL, NULL, '2024-03-01', 1, 'Ghi chú', '2024-03-01 02:50:37', '2024-03-01 02:50:37');
INSERT INTO `assets` VALUES (3, NULL, 'Bàn sinh viên có học phòng 402', 5, 20, 4, 2, 500000, 10000000, '125488', '56', 'KH', 'Cái', '121', NULL, NULL, '2024-03-01', 1, 'Ghi chú', '2024-03-01 02:50:37', '2024-03-13 07:56:46');
INSERT INTO `assets` VALUES (5, '957125', 'Bàn góc chữ L', 5, 9, 7, 2, 200000, 1800000, '2052461', NULL, '1C27TCD', 'Cái', '599', 'e332294c2533812a3c72776bf776236bea5e66e6b64ccb1f5b38daed3425379c.png', NULL, '1970-01-01', 1, NULL, '2024-03-14 02:34:39', '2024-03-14 02:48:45');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrow_details
-- ----------------------------
INSERT INTO `borrow_details` VALUES (1, 2, 3, '2024-03-08 07:49:12', '2024-03-08 07:49:12', 10);
INSERT INTO `borrow_details` VALUES (2, 3, 7, '2024-03-14 02:49:38', '2024-03-14 02:49:38', 1);
INSERT INTO `borrow_details` VALUES (3, 4, 7, '2024-03-14 02:49:43', '2024-03-14 02:49:43', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrows
-- ----------------------------
INSERT INTO `borrows` VALUES (2, 5, '2024-03-08 16:00:00', '2024-03-09 16:00:00', 3, '2024-03-08 07:49:12', '2024-03-08 07:58:06');
INSERT INTO `borrows` VALUES (3, 5, '2024-03-14 10:00:00', '2024-03-15 17:00:00', 3, '2024-03-14 02:49:38', '2024-03-14 02:50:25');
INSERT INTO `borrows` VALUES (4, 5, '2024-03-14 10:00:00', '2024-03-15 17:00:00', 4, '2024-03-14 02:49:43', '2024-03-14 02:50:05');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_assets
-- ----------------------------
INSERT INTO `category_assets` VALUES (1, 'Ghế đen sinh viên', 1, 0, '2024-03-01 02:33:42', '2024-03-01 02:33:42');
INSERT INTO `category_assets` VALUES (2, 'Bàn làm việc', 1, 0, '2024-03-01 02:33:52', '2024-03-01 02:33:52');
INSERT INTO `category_assets` VALUES (3, 'Ghế đôn cam', 1, 0, '2024-03-01 02:34:14', '2024-03-01 02:34:14');
INSERT INTO `category_assets` VALUES (4, 'Bàn sinh viên có hộc', 1, 0, '2024-03-01 02:34:31', '2024-03-12 03:55:02');
INSERT INTO `category_assets` VALUES (5, 'Bàn sinh viên không hộc', 1, 0, '2024-03-01 02:34:40', '2024-03-12 03:55:10');
INSERT INTO `category_assets` VALUES (6, 'TV TCL 65 inch', 1, 0, '2024-03-01 02:34:59', '2024-03-01 02:34:59');
INSERT INTO `category_assets` VALUES (7, 'Bàn góc chữ L', 1, 0, '2024-03-12 03:54:48', '2024-03-12 03:54:48');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_rooms
-- ----------------------------
INSERT INTO `category_rooms` VALUES (1, 'Phòng chức năng', 1, '2024-03-01 02:30:25', '2024-03-01 02:30:25');
INSERT INTO `category_rooms` VALUES (2, 'Phòng học', 1, '2024-03-01 02:30:34', '2024-03-01 02:30:34');
INSERT INTO `category_rooms` VALUES (3, 'Phòng kho', 1, '2024-03-01 02:30:43', '2024-03-01 02:30:43');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of handovers
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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 93 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 1, 2, 'Phòng Hành Chính', 2, 1, 0, 3, '2024-03-01 02:31:27', '2024-03-01 02:31:27');
INSERT INTO `rooms` VALUES (2, 1, 2, 'Phòng CTSV', 0, 1, 0, 3, '2024-03-01 02:32:41', '2024-03-01 02:32:41');
INSERT INTO `rooms` VALUES (3, 1, 2, 'Phòng DVSV', 3, 1, 0, 3, '2024-03-01 02:32:59', '2024-03-01 02:32:59');
INSERT INTO `rooms` VALUES (4, 1, 2, 'P. Hội Trường', 1, 1, 0, 3, '2024-03-05 07:12:03', '2024-03-05 07:12:03');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semesters
-- ----------------------------
INSERT INTO `semesters` VALUES (1, 'Spring 2024', '2023-12-01', '2024-04-30', '2024-03-04 07:50:58', '2024-03-08 08:01:39');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'assets_borrowed', '[\"16\"]', '2024-02-29 14:20:48', '2024-03-14 02:49:05');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Example User', 'teacher@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WgKRuUnKfUgzkK0aGDgLpCgr3Lc969xGBAdKm2i3GyaQNwWIikO0W0L9N9Bu', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (2, 'Example Staff User', 'staff@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lxBxYYDSIFexOsJHk6lbNdFvXgapyZZXWKGk43intv18MzNkjvOCTnkPY4re', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (3, 'Example Admin User', 'admin@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NT9snWq9gU5nCuaahlIdaytLQonlV39DkUdM4RgVIvbVxt640fWkkO0pFGGG', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (4, 'Example Manger User', 'manager@example.com', '2024-02-29 07:20:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Y0Za9RLIf847OAMUXXw4zUhkhjLN3m42M7YIux8DFwvQjckIvipiF9VHRgUs', '2024-02-29 07:20:33', '2024-02-29 07:20:33');
INSERT INTO `users` VALUES (5, 'Khang Nguyen Minh', 'khangnm6@fe.edu.vn', NULL, NULL, NULL, '2024-03-08 02:06:55', '2024-03-08 02:06:55');
INSERT INTO `users` VALUES (6, 'Chau Cu Thi Minh', 'ChauCTM@fe.edu.vn', NULL, NULL, NULL, '2024-03-08 03:50:29', '2024-03-08 03:50:29');

SET FOREIGN_KEY_CHECKS = 1;
