/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : test_solusi

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 20/11/2023 21:15:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `qty` float NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `version` bigint(20) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (5);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NULL DEFAULT NULL,
  `currency` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dimention` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'GIVBIRU', 'Give Biru', 11000, 'IDR', '0', '8 cm x 5 cm', 'PCS', 'adm', 'adm', 'adm', '2023-11-20 14:12:54', '2023-11-20 14:12:57', '2023-11-20 14:13:01');
INSERT INTO `product` VALUES (2, 'SKLINPWG', 'SO Klin Pewangi', 15000, 'IDR', '10', '13 cm x 10 cm', 'PCS', 'adm', 'adm', 'adm', '2023-11-20 14:14:04', '2023-11-20 14:14:09', '2023-11-20 14:14:13');
INSERT INTO `product` VALUES (3, 'SOKLINLQD', 'SO Klin Liquid', 18000, 'IDR', '5', '13 cm x 10cm ', 'PCS', 'adm', 'adm', 'adm', '2023-11-20 14:15:30', '2023-11-20 14:15:32', '2023-11-20 14:15:37');

-- ----------------------------
-- Table structure for trans
-- ----------------------------
DROP TABLE IF EXISTS `trans`;
CREATE TABLE `trans`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `trans_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_price` float NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trans
-- ----------------------------

-- ----------------------------
-- Table structure for trans_product
-- ----------------------------
DROP TABLE IF EXISTS `trans_product`;
CREATE TABLE `trans_product`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_trans` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `product_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NULL DEFAULT NULL,
  `currency` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dimention` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trans_product
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deleted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'user1', 'user1-123', 'adm', 'adm', 'adm', '2023-11-20 14:10:04', '2023-11-20 14:10:08', '2023-11-20 14:10:11', 'Y');
INSERT INTO `user` VALUES (2, 'user2', 'user2-123', 'adm', 'adm', 'adm', '2023-11-20 14:10:46', '2023-11-20 14:10:49', '2023-11-20 14:10:55', 'Y');

SET FOREIGN_KEY_CHECKS = 1;
