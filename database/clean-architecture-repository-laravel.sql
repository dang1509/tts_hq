/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100422 (10.4.22-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : clean-architecture-repository-laravel

 Target Server Type    : MySQL
 Target Server Version : 100422 (10.4.22-MariaDB)
 File Encoding         : 65001

 Date: 15/04/2025 09:22:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `prefix` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `method` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `input` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `ip` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  INDEX `shop_id`(`shop_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 154 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:23:22', '2025-02-28 07:23:22');
INSERT INTO `activity_log` VALUES (2, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:23:41', '2025-02-28 07:23:41');
INSERT INTO `activity_log` VALUES (3, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:24:24', '2025-02-28 07:24:24');
INSERT INTO `activity_log` VALUES (4, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:24:40', '2025-02-28 07:24:40');
INSERT INTO `activity_log` VALUES (5, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:25:20', '2025-02-28 07:25:20');
INSERT INTO `activity_log` VALUES (6, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:26:05', '2025-02-28 07:26:05');
INSERT INTO `activity_log` VALUES (7, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:26:31', '2025-02-28 07:26:31');
INSERT INTO `activity_log` VALUES (8, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:27:46', '2025-02-28 07:27:46');
INSERT INTO `activity_log` VALUES (9, NULL, 6, 'admin', 'POST', 'Đổi mật khẩu thành công', 'http://127.0.0.1:8000/admin/change-password', '{\"old_password\":\"123@@123\",\"password\":\"123@@123\",\"password_confirmation\":\"123@@123\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:27:53', '2025-02-28 07:27:53');
INSERT INTO `activity_log` VALUES (10, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:27:54', '2025-02-28 07:27:54');
INSERT INTO `activity_log` VALUES (11, NULL, 6, 'admin', 'POST', 'Đổi mật khẩu thành công', 'http://127.0.0.1:8000/admin/change-password', '{\"old_password\":\"123@@123\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\",\"password_confirmation\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:33:20', '2025-02-28 07:33:20');
INSERT INTO `activity_log` VALUES (12, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:33:21', '2025-02-28 07:33:21');
INSERT INTO `activity_log` VALUES (13, NULL, 6, 'admin', 'POST', 'Đổi mật khẩu cấp 2 thành công', 'http://127.0.0.1:8000/admin/change-password2', '{\"old_password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\",\"password_confirmation\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:34:14', '2025-02-28 07:34:14');
INSERT INTO `activity_log` VALUES (14, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:34:14', '2025-02-28 07:34:14');
INSERT INTO `activity_log` VALUES (15, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 07:46:16', '2025-02-28 07:46:16');
INSERT INTO `activity_log` VALUES (16, NULL, 6, 'admin', 'GET', 'Truy cập trang google cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:01:12', '2025-02-28 08:01:12');
INSERT INTO `activity_log` VALUES (17, NULL, 6, 'admin', 'GET', 'Truy cập trang google cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:01:26', '2025-02-28 08:01:26');
INSERT INTO `activity_log` VALUES (18, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:04:33', '2025-02-28 08:04:33');
INSERT INTO `activity_log` VALUES (19, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:04:40', '2025-02-28 08:04:40');
INSERT INTO `activity_log` VALUES (20, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:04:59', '2025-02-28 08:04:59');
INSERT INTO `activity_log` VALUES (21, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:05:07', '2025-02-28 08:05:07');
INSERT INTO `activity_log` VALUES (22, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:05:42', '2025-02-28 08:05:42');
INSERT INTO `activity_log` VALUES (23, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:08:17', '2025-02-28 08:08:17');
INSERT INTO `activity_log` VALUES (24, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-02-28 08:41:35', '2025-02-28 08:41:35');
INSERT INTO `activity_log` VALUES (25, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 03:40:18', '2025-03-03 03:40:18');
INSERT INTO `activity_log` VALUES (26, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '2025-03-03 03:44:01', '2025-03-03 03:44:01');
INSERT INTO `activity_log` VALUES (27, NULL, 6, 'admin', 'POST', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/login', '{\"username\":\"truongdev19\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:45:45', '2025-03-18 06:45:45');
INSERT INTO `activity_log` VALUES (28, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:45:49', '2025-03-18 06:45:49');
INSERT INTO `activity_log` VALUES (29, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:45:51', '2025-03-18 06:45:51');
INSERT INTO `activity_log` VALUES (30, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:45:53', '2025-03-18 06:45:53');
INSERT INTO `activity_log` VALUES (31, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:49:25', '2025-03-18 06:49:25');
INSERT INTO `activity_log` VALUES (32, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:54:38', '2025-03-18 06:54:38');
INSERT INTO `activity_log` VALUES (33, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:54:41', '2025-03-18 06:54:41');
INSERT INTO `activity_log` VALUES (34, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 06:54:42', '2025-03-18 06:54:42');
INSERT INTO `activity_log` VALUES (35, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:15:34', '2025-03-18 07:15:34');
INSERT INTO `activity_log` VALUES (36, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:16:04', '2025-03-18 07:16:04');
INSERT INTO `activity_log` VALUES (37, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:17:51', '2025-03-18 07:17:51');
INSERT INTO `activity_log` VALUES (38, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:18:03', '2025-03-18 07:18:03');
INSERT INTO `activity_log` VALUES (39, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:19:29', '2025-03-18 07:19:29');
INSERT INTO `activity_log` VALUES (40, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:20:07', '2025-03-18 07:20:07');
INSERT INTO `activity_log` VALUES (41, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:20:40', '2025-03-18 07:20:40');
INSERT INTO `activity_log` VALUES (42, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:21:39', '2025-03-18 07:21:39');
INSERT INTO `activity_log` VALUES (43, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:21:44', '2025-03-18 07:21:44');
INSERT INTO `activity_log` VALUES (44, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:21:46', '2025-03-18 07:21:46');
INSERT INTO `activity_log` VALUES (45, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:21:50', '2025-03-18 07:21:50');
INSERT INTO `activity_log` VALUES (46, NULL, 6, 'admin', 'GET', 'Truy cập trang setup cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa/setup', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:42:43', '2025-03-18 07:42:43');
INSERT INTO `activity_log` VALUES (47, NULL, 6, 'admin', 'POST', 'Kích hoạt bảo mật google2fa thành công ', 'http://127.0.0.1:8000/admin/security-2fa/setup', '{\"code\":\"151061\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:44:23', '2025-03-18 07:44:23');
INSERT INTO `activity_log` VALUES (48, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:44:31', '2025-03-18 07:44:31');
INSERT INTO `activity_log` VALUES (49, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:56:20', '2025-03-18 07:56:20');
INSERT INTO `activity_log` VALUES (50, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:56:22', '2025-03-18 07:56:22');
INSERT INTO `activity_log` VALUES (51, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 07:56:24', '2025-03-18 07:56:24');
INSERT INTO `activity_log` VALUES (52, NULL, 6, 'admin', 'POST', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/login', '{\"username\":\"truongdev19\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 10:02:07', '2025-03-18 10:02:07');
INSERT INTO `activity_log` VALUES (53, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 10:02:08', '2025-03-18 10:02:08');
INSERT INTO `activity_log` VALUES (54, NULL, 6, 'admin', 'POST', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/login', '{\"username\":\"truongdev19\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 07:41:10', '2025-03-19 07:41:10');
INSERT INTO `activity_log` VALUES (55, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 07:41:14', '2025-03-19 07:41:14');
INSERT INTO `activity_log` VALUES (56, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 07:45:31', '2025-03-19 07:45:31');
INSERT INTO `activity_log` VALUES (57, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 07:53:24', '2025-03-19 07:53:24');
INSERT INTO `activity_log` VALUES (58, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 07:59:08', '2025-03-19 07:59:08');
INSERT INTO `activity_log` VALUES (59, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:00:18', '2025-03-19 08:00:18');
INSERT INTO `activity_log` VALUES (60, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:09:14', '2025-03-19 08:09:14');
INSERT INTO `activity_log` VALUES (61, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"354773\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:09:43', '2025-03-19 08:09:43');
INSERT INTO `activity_log` VALUES (62, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"354773\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:10:17', '2025-03-19 08:10:17');
INSERT INTO `activity_log` VALUES (63, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:10:19', '2025-03-19 08:10:19');
INSERT INTO `activity_log` VALUES (64, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:10:23', '2025-03-19 08:10:23');
INSERT INTO `activity_log` VALUES (65, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:10:27', '2025-03-19 08:10:27');
INSERT INTO `activity_log` VALUES (66, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:14:19', '2025-03-19 08:14:19');
INSERT INTO `activity_log` VALUES (67, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:14:37', '2025-03-19 08:14:37');
INSERT INTO `activity_log` VALUES (68, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:15:34', '2025-03-19 08:15:34');
INSERT INTO `activity_log` VALUES (69, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:17:00', '2025-03-19 08:17:00');
INSERT INTO `activity_log` VALUES (70, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:17:02', '2025-03-19 08:17:02');
INSERT INTO `activity_log` VALUES (71, NULL, 6, 'admin', 'POST', 'Đăng xuất tài khoản ADMIN thành công', 'http://127.0.0.1:8000/admin/logout', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 08:17:16', '2025-03-19 08:17:16');
INSERT INTO `activity_log` VALUES (72, NULL, 6, 'admin', 'POST', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/login', '{\"username\":\"truongdev19\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:17:57', '2025-03-19 09:17:57');
INSERT INTO `activity_log` VALUES (73, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:28:53', '2025-03-19 09:28:53');
INSERT INTO `activity_log` VALUES (74, NULL, 6, 'admin', 'POST', 'Đăng xuất tài khoản ADMIN thành công', 'http://127.0.0.1:8000/admin/logout', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:28:55', '2025-03-19 09:28:55');
INSERT INTO `activity_log` VALUES (75, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpWjVQYUtkUGpQNG4zZytHL3dNRGZHWGNlS3NZSW5NbkpjdWdNcnhJMFA1RS96dUNSeEo3KzlHT3BxZThITHpiUEJ1eGlpSTY0dlNBdzJkcEc1Ti9TRDI=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:54:21', '2025-03-19 09:54:21');
INSERT INTO `activity_log` VALUES (76, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:54:22', '2025-03-19 09:54:22');
INSERT INTO `activity_log` VALUES (77, NULL, 6, 'admin', 'POST', 'Đăng xuất tài khoản ADMIN thành công', 'http://127.0.0.1:8000/admin/logout', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:54:25', '2025-03-19 09:54:25');
INSERT INTO `activity_log` VALUES (78, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpWVhCaERHVlJ2RC9BRTdLSExDekRwZkNTWEhZNTFlT2Rna3FocnhqQXNxWEdYWkF5RWRKd2YrUGhyTXQxL0N3MGMyTHRJUGFZNFpXaHJCUFN1WUx4YlA=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:54:41', '2025-03-19 09:54:41');
INSERT INTO `activity_log` VALUES (79, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:54:41', '2025-03-19 09:54:41');
INSERT INTO `activity_log` VALUES (80, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:58:12', '2025-03-19 09:58:12');
INSERT INTO `activity_log` VALUES (81, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:59:22', '2025-03-19 09:59:22');
INSERT INTO `activity_log` VALUES (82, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"601134\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 09:59:34', '2025-03-19 09:59:34');
INSERT INTO `activity_log` VALUES (83, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 10:21:57', '2025-03-19 10:21:57');
INSERT INTO `activity_log` VALUES (84, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 10:21:57', '2025-03-19 10:21:57');
INSERT INTO `activity_log` VALUES (85, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 10:22:01', '2025-03-19 10:22:01');
INSERT INTO `activity_log` VALUES (86, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 10:22:03', '2025-03-19 10:22:03');
INSERT INTO `activity_log` VALUES (87, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpWkY4aWU0RHlpdjRxamtkYjE1RnRPQmhOR3RKUmU3Y3RaN0YvL3FjVVNqY1RiNEJqZWFOZWRZNXJJTmJrbk50b0ZhbmZnbXVZUHFERWVOWGdhMDlxZ1E=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 02:35:03', '2025-03-26 02:35:03');
INSERT INTO `activity_log` VALUES (88, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 02:35:03', '2025-03-26 02:35:03');
INSERT INTO `activity_log` VALUES (89, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"793894\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 02:35:21', '2025-03-26 02:35:21');
INSERT INTO `activity_log` VALUES (90, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 02:35:46', '2025-03-26 02:35:46');
INSERT INTO `activity_log` VALUES (91, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 02:35:47', '2025-03-26 02:35:47');
INSERT INTO `activity_log` VALUES (92, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:17:40', '2025-03-26 03:17:40');
INSERT INTO `activity_log` VALUES (93, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:18:18', '2025-03-26 03:18:18');
INSERT INTO `activity_log` VALUES (94, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:20:44', '2025-03-26 03:20:44');
INSERT INTO `activity_log` VALUES (95, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:21:35', '2025-03-26 03:21:35');
INSERT INTO `activity_log` VALUES (96, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:22:22', '2025-03-26 03:22:22');
INSERT INTO `activity_log` VALUES (97, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:29:57', '2025-03-26 03:29:57');
INSERT INTO `activity_log` VALUES (98, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:31:10', '2025-03-26 03:31:10');
INSERT INTO `activity_log` VALUES (99, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:31:47', '2025-03-26 03:31:47');
INSERT INTO `activity_log` VALUES (100, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 03:32:11', '2025-03-26 03:32:11');
INSERT INTO `activity_log` VALUES (101, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpYWpOVERJMUpZVzlHVzFVcHRQZmE4NU9haCtXdnRmTW1seDZjdmxvU1Q4b1haN0NwQ2ovT1lGd3JZVE80NWFiK2w5S3pSQkN0UzRvekc5Smc3SUc2VTI=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:22:58', '2025-04-09 15:22:58');
INSERT INTO `activity_log` VALUES (102, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:22:59', '2025-04-09 15:22:59');
INSERT INTO `activity_log` VALUES (103, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"641349\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:23:17', '2025-04-09 15:23:17');
INSERT INTO `activity_log` VALUES (104, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:23:32', '2025-04-09 15:23:32');
INSERT INTO `activity_log` VALUES (105, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:24:29', '2025-04-09 15:24:29');
INSERT INTO `activity_log` VALUES (106, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:25:08', '2025-04-09 15:25:08');
INSERT INTO `activity_log` VALUES (107, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:25:30', '2025-04-09 15:25:30');
INSERT INTO `activity_log` VALUES (108, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:25:54', '2025-04-09 15:25:54');
INSERT INTO `activity_log` VALUES (109, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:26:22', '2025-04-09 15:26:22');
INSERT INTO `activity_log` VALUES (110, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:27:21', '2025-04-09 15:27:21');
INSERT INTO `activity_log` VALUES (111, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:27:49', '2025-04-09 15:27:49');
INSERT INTO `activity_log` VALUES (112, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:28:23', '2025-04-09 15:28:23');
INSERT INTO `activity_log` VALUES (113, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:28:58', '2025-04-09 15:28:58');
INSERT INTO `activity_log` VALUES (114, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:29:45', '2025-04-09 15:29:45');
INSERT INTO `activity_log` VALUES (115, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:30:10', '2025-04-09 15:30:10');
INSERT INTO `activity_log` VALUES (116, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:32:43', '2025-04-09 15:32:43');
INSERT INTO `activity_log` VALUES (117, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:32:56', '2025-04-09 15:32:56');
INSERT INTO `activity_log` VALUES (118, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:33:14', '2025-04-09 15:33:14');
INSERT INTO `activity_log` VALUES (119, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:33:31', '2025-04-09 15:33:31');
INSERT INTO `activity_log` VALUES (120, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:33:47', '2025-04-09 15:33:47');
INSERT INTO `activity_log` VALUES (121, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:34:12', '2025-04-09 15:34:12');
INSERT INTO `activity_log` VALUES (122, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:34:45', '2025-04-09 15:34:45');
INSERT INTO `activity_log` VALUES (123, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:35:33', '2025-04-09 15:35:33');
INSERT INTO `activity_log` VALUES (124, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:35:44', '2025-04-09 15:35:44');
INSERT INTO `activity_log` VALUES (125, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:36:06', '2025-04-09 15:36:06');
INSERT INTO `activity_log` VALUES (126, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:38:07', '2025-04-09 15:38:07');
INSERT INTO `activity_log` VALUES (127, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:38:16', '2025-04-09 15:38:16');
INSERT INTO `activity_log` VALUES (128, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:39:49', '2025-04-09 15:39:49');
INSERT INTO `activity_log` VALUES (129, NULL, 6, 'admin', 'GET', 'Vào form create permission', 'http://127.0.0.1:8000/admin/permission/create', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 15:39:51', '2025-04-09 15:39:51');
INSERT INTO `activity_log` VALUES (130, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpWThXclp6czhHaGYvOHM4dXpnbE9lWkxTU0xTbXVDQTZEbDkwbkd1Yk1jZ1FsbU5CSklLVEZRdVNIRlNodW1lRXBSM21qVFVERElkdW1Cay8yR2h0SVo=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:21:19', '2025-04-10 03:21:19');
INSERT INTO `activity_log` VALUES (131, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:21:20', '2025-04-10 03:21:20');
INSERT INTO `activity_log` VALUES (132, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:21:41', '2025-04-10 03:21:41');
INSERT INTO `activity_log` VALUES (133, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"835830\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:21:47', '2025-04-10 03:21:47');
INSERT INTO `activity_log` VALUES (134, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:21:56', '2025-04-10 03:21:56');
INSERT INTO `activity_log` VALUES (135, NULL, 6, 'admin', 'POST', 'Đổi mật khẩu thành công', 'http://127.0.0.1:8000/admin/change-password', '{\"old_password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\",\"password\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\",\"password_confirmation\":\"ZTIrZEtRY0pIeEVoWjhoajhKTFhsZz09\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:27:43', '2025-04-10 03:27:43');
INSERT INTO `activity_log` VALUES (136, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-10 03:27:43', '2025-04-10 03:27:43');
INSERT INTO `activity_log` VALUES (137, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpYXIxZnY2emwvVDMycEJwckYrVTN6R2xZRDVTOHh5SnhKQU5zd0VPUEJRdDV2SmxybkhnWVd6L0pQMWxyU3ZQQmU4ZlQ0UjkzUk41Njc3a2lYbXAyazg=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:01:33', '2025-04-11 15:01:33');
INSERT INTO `activity_log` VALUES (138, NULL, 6, 'admin', 'GET', 'Vào trang nhập mã bảo mật google2fa khi đăng nhập', 'http://127.0.0.1:8000/admin/security-2fa/very', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:01:33', '2025-04-11 15:01:33');
INSERT INTO `activity_log` VALUES (139, NULL, 6, 'admin', 'POST', 'Very bảo mật google2fa khi đăng nhập thành công', 'http://127.0.0.1:8000/admin/security-2fa/very', '{\"code\":\"277752\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:01:49', '2025-04-11 15:01:49');
INSERT INTO `activity_log` VALUES (140, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:01:52', '2025-04-11 15:01:52');
INSERT INTO `activity_log` VALUES (141, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:02:07', '2025-04-11 15:02:07');
INSERT INTO `activity_log` VALUES (142, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:03:24', '2025-04-11 15:03:24');
INSERT INTO `activity_log` VALUES (143, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:03:52', '2025-04-11 15:03:52');
INSERT INTO `activity_log` VALUES (144, NULL, 6, 'admin', 'POST', 'Tắt bảo mật google2fa thành công security-2fa', 'http://127.0.0.1:8000/admin/security-2fa/disable2fa', '{\"status\":\"0\",\"code\":\"577108\"}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:04:13', '2025-04-11 15:04:13');
INSERT INTO `activity_log` VALUES (145, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:04:13', '2025-04-11 15:04:13');
INSERT INTO `activity_log` VALUES (146, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:04:15', '2025-04-11 15:04:15');
INSERT INTO `activity_log` VALUES (147, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:04:16', '2025-04-11 15:04:16');
INSERT INTO `activity_log` VALUES (148, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:05:42', '2025-04-11 15:05:42');
INSERT INTO `activity_log` VALUES (149, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/permission', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:05:45', '2025-04-11 15:05:45');
INSERT INTO `activity_log` VALUES (150, NULL, 6, 'admin', 'GET', 'Vào form create permission', 'http://127.0.0.1:8000/admin/permission/create', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-11 15:05:47', '2025-04-11 15:05:47');
INSERT INTO `activity_log` VALUES (151, NULL, 6, 'admin', 'GET', 'Đăng nhập ADMIN thành công', 'http://127.0.0.1:8000/admin/callback-login/gmail/citrNnI2R3RjSWgrRFJBcFlkTXRUTzJ1a24yZ1YxODlNTjBaUW8wV2FpWXExU3FkSWtmeGRZU2VGa2dwaExwN2pzWmg0ZmdzYUYzKzdSYWJMQjlQZWpSQUdHOUJUaVlTUUNIUGFMUVYvWXR6ZmhvZjcxekJHUTFQanNIZVMzdkI=', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 07:03:19', '2025-04-14 07:03:19');
INSERT INTO `activity_log` VALUES (152, NULL, 6, 'admin', 'GET', 'Truy cập trang thông tin profile', 'http://127.0.0.1:8000/admin/profile', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 07:03:35', '2025-04-14 07:03:35');
INSERT INTO `activity_log` VALUES (153, NULL, 6, 'admin', 'GET', 'Truy cập trang cấu hình bảo mật google 2FA', 'http://127.0.0.1:8000/admin/security-2fa', '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-14 07:03:39', '2025-04-14 07:03:39');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `shop_id` int NULL DEFAULT NULL,
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
  `shop_id` int NULL DEFAULT NULL,
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
INSERT INTO `model_has_roles` VALUES (NULL, 1, 'App\\Infrastructure\\Persistence\\Models\\User', 6);

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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `parent_id` int NULL DEFAULT NULL,
  `order` int NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 876 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

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
  `int` int NULL DEFAULT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `access_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NULL DEFAULT NULL,
  `order` int NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_information` tinyint NULL DEFAULT NULL,
  `shop_access` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `shop_expect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, NULL, 'Admin', 'admin', 0, 1, NULL, 'web', NULL, NULL, NULL, '2020-06-23 19:41:11', '2024-06-14 11:47:47', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_id` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `account_type` tinyint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` datetime NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `password2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `balance` decimal(10, 2) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT NULL,
  `required_login_gmail` tinyint NULL DEFAULT NULL,
  `provider_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `google2fa_enable` tinyint NULL DEFAULT NULL,
  `google2fa_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (6, NULL, 'truongdev19', 'Đặng Văn Trường', 1, 'truongdv@hqplay.vn', NULL, '$2y$10$0E6o2ZyIhMvsfFFPgB4II.zqZt8ATSXwM6r6ngKtRuOi.nGwItkQm', '$2y$10$YIb4su4T4iNJUAHcfgtlquYYuVKcrqGUQoOspytkfBmvgaSuYqA/q', 0.00, NULL, 1, 1, NULL, 0, NULL, 'cc61603e41ed0c4b6ede7c7d548a4028', '2025-02-21 07:51:21', '2025-04-11 15:04:13');

SET FOREIGN_KEY_CHECKS = 1;
