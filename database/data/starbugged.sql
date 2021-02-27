/*
MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 80018
Source Host           : localhost:3306
Source Database       : starbugged

Target Server Type    : MYSQL
Target Server Version : 80018
File Encoding         : 65001
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `issues`
-- ----------------------------
DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issues_project_id_foreign` (`project_id`),
  KEY `issues_user_id_foreign` (`user_id`),
  CONSTRAINT `issues_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of issues
-- ----------------------------
INSERT INTO `issues` VALUES ('1', '1', '2', 'Windows', 'Low', 'Runtime Error', '', 'error 1 project 1', 'Coder Charlotte', 'in progress', '2021-02-02 16:54:04', '2021-02-10 09:31:18');
INSERT INTO `issues` VALUES ('2', '1', '2', 'Windows', 'Low', 'Runtime Error', '', 'error 2 project 1', 'Coder Colin', 'resolved', '2021-02-02 16:54:48', '2021-02-07 15:06:02');
INSERT INTO `issues` VALUES ('3', '1', '2', 'Windows', 'High', 'Runtime Error', '', 'issue 3 project 1', 'Programmer Pauline', 'in progress', '2021-02-02 16:55:16', '2021-02-07 16:04:49');
INSERT INTO `issues` VALUES ('4', '1', '2', 'Windows', 'Low', 'Runtime Error', '', 'issue 4 lorem ipsum', 'Coder Caitlin', 'in progress', '2021-02-06 15:10:51', '2021-02-06 15:10:51');
INSERT INTO `issues` VALUES ('5', '1', '2', 'Mac', 'Medium', 'General Issue', '', 'issue 5 lorem ipsum', 'Programmer Pete', 'issue updated', '2021-02-06 15:12:38', '2021-02-06 15:12:38');
INSERT INTO `issues` VALUES ('6', '1', '2', 'Windows', 'High', 'Logic Error', '', 'issue 6 lorem ipsum', 'none', 'issue created', '2021-02-06 15:15:09', '2021-02-06 15:15:09');
INSERT INTO `issues` VALUES ('7', '1', '2', 'Android', 'Medium', 'Logic Error', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'none', 'issue created', '2021-02-07 14:25:54', '2021-02-07 14:25:54');
INSERT INTO `issues` VALUES ('8', '1', '2', 'Windows', 'Low', 'Runtime Error', '', 'Lorem Ipsum yet again', 'none', 'issue created', '2021-02-07 15:59:41', '2021-02-07 15:59:41');

-- ----------------------------
-- Table structure for `issue_user`
-- ----------------------------
DROP TABLE IF EXISTS `issue_user`;
CREATE TABLE `issue_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `issue_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of issue_user
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2020_07_21_195709_create_projects_table', '1');
INSERT INTO `migrations` VALUES ('5', '2020_07_21_195738_create_issues_table', '1');
INSERT INTO `migrations` VALUES ('6', '2020_08_22_114945_creates_issue_user_pivot_table', '1');
INSERT INTO `migrations` VALUES ('7', '2020_10_18_154855_add_profile_columns_to_users_table', '1');
INSERT INTO `migrations` VALUES ('8', '2020_12_19_155157_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('9', '2021_02_07_134131_add_title_column_to_issues_table', '2');
INSERT INTO `migrations` VALUES ('10', '2021_02_14_151529_acl_initialisation', '3');
INSERT INTO `migrations` VALUES ('14', '2021_02_20_164709_acl_update_auron', '4');
INSERT INTO `migrations` VALUES ('15', '2021_02_21_160534_remove_useraccountlevel_column_from_users_table', '5');

-- ----------------------------
-- Table structure for `model_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `model_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('2', 'App\\User', '1');
INSERT INTO `model_has_roles` VALUES ('2', 'App\\User', '2');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '3');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '4');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '5');
INSERT INTO `model_has_roles` VALUES ('7', 'App\\User', '6');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '7');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '8');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '9');
INSERT INTO `model_has_roles` VALUES ('3', 'App\\User', '10');
INSERT INTO `model_has_roles` VALUES ('3', 'App\\User', '11');
INSERT INTO `model_has_roles` VALUES ('3', 'App\\User', '12');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '13');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '14');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '15');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '16');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\User', '17');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '18');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '19');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\User', '20');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'admin.view', 'web', '2021-02-14 16:19:57', '2021-02-14 16:19:57');
INSERT INTO `permissions` VALUES ('2', 'admin.create.project', 'web', '2021-02-14 16:23:09', '2021-02-14 16:23:09');
INSERT INTO `permissions` VALUES ('3', 'admin.update.project', 'web', '2021-02-14 16:23:09', '2021-02-14 16:23:09');
INSERT INTO `permissions` VALUES ('4', 'admin.delete.project', 'web', '2021-02-14 16:23:09', '2021-02-14 16:23:09');
INSERT INTO `permissions` VALUES ('5', 'admin.update.project_users', 'web', '2021-02-14 16:23:09', '2021-02-14 16:23:09');
INSERT INTO `permissions` VALUES ('6', 'admin.permissions', 'web', '2021-02-20 17:50:12', '2021-02-20 17:50:12');
INSERT INTO `permissions` VALUES ('7', 'projects.view', 'web', '2021-02-20 17:50:12', '2021-02-20 17:50:12');
INSERT INTO `permissions` VALUES ('8', 'project.issue.create', 'web', '2021-02-20 17:50:13', '2021-02-20 17:50:13');
INSERT INTO `permissions` VALUES ('9', 'project.issues.view', 'web', '2021-02-20 17:50:14', '2021-02-20 17:50:14');
INSERT INTO `permissions` VALUES ('10', 'project.view.taskboard', 'web', '2021-02-20 17:50:14', '2021-02-20 17:50:14');
INSERT INTO `permissions` VALUES ('11', 'issues.view', 'web', '2021-02-20 17:50:15', '2021-02-20 17:50:15');
INSERT INTO `permissions` VALUES ('12', 'issues.view.priority', 'web', '2021-02-20 17:50:15', '2021-02-20 17:50:15');
INSERT INTO `permissions` VALUES ('13', 'issues.view.status', 'web', '2021-02-20 17:50:16', '2021-02-20 17:50:16');
INSERT INTO `permissions` VALUES ('14', 'issue.view', 'web', '2021-02-20 17:50:16', '2021-02-20 17:50:16');
INSERT INTO `permissions` VALUES ('15', 'issue.update', 'web', '2021-02-20 17:50:17', '2021-02-20 17:50:17');
INSERT INTO `permissions` VALUES ('16', 'issue.delete', 'web', '2021-02-20 17:50:17', '2021-02-20 17:50:17');
INSERT INTO `permissions` VALUES ('17', 'tasks.view', 'web', '2021-02-20 17:50:17', '2021-02-20 17:50:17');
INSERT INTO `permissions` VALUES ('18', 'tasks.assigned', 'web', '2021-02-20 17:50:18', '2021-02-20 17:50:18');
INSERT INTO `permissions` VALUES ('19', 'tasks.reported', 'web', '2021-02-20 17:50:18', '2021-02-20 17:50:18');
INSERT INTO `permissions` VALUES ('20', 'tasks.viewed', 'web', '2021-02-20 17:50:18', '2021-02-20 17:50:18');
INSERT INTO `permissions` VALUES ('21', 'tasks.watching', 'web', '2021-02-20 17:50:18', '2021-02-20 17:50:18');
INSERT INTO `permissions` VALUES ('22', 'profile.view', 'web', '2021-02-20 17:50:18', '2021-02-20 17:50:18');
INSERT INTO `permissions` VALUES ('23', 'profile.edit', 'web', '2021-02-20 17:50:19', '2021-02-20 17:50:19');
INSERT INTO `permissions` VALUES ('24', 'profile.update', 'web', '2021-02-20 17:50:19', '2021-02-20 17:50:19');
INSERT INTO `permissions` VALUES ('25', 'fast.logout', 'web', '2021-02-20 17:50:20', '2021-02-20 17:50:20');

-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_assigned` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_project_unique` (`project_name`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', '1', 'Warehouse Layout', 'Web Application development written in PHP/Laravel 6.2 (Origin branch PHP/HTML5) for efficient product selection, using web app for efficient placement of stock using layout planning with volumetrics (calculations using Mass , Volume and Density)', '[\"Paul Colley\"]', '2021-01-03 14:35:23', '2021-02-02 16:57:16');
INSERT INTO `projects` VALUES ('2', '1', 'Starbugged', 'Bug/Issue/project Tracker application that enables users to keep track of bugs and issues in their projects written using PHP and Laravel framework v6.2', '[\"Paul Colley\"]', '2021-01-03 14:36:02', '2021-02-08 10:10:16');
INSERT INTO `projects` VALUES ('3', '1', 'Motoring Conversion', 'Conversion Application Web Application development written in PHP/Laravel 6.2 /Vue for Converting motoring units such as Velocity, Torque, Fuel consumption etc.', null, '2021-01-03 14:36:37', '2021-01-03 14:36:37');
INSERT INTO `projects` VALUES ('4', '1', 'Digital Dictionary', 'Digital Dictionary Website - IT Encyclopedia website - with tables and videos Information technology website written using PHP and Laravel framework v6.2', null, '2021-01-03 14:37:26', '2021-01-03 14:37:26');
INSERT INTO `projects` VALUES ('5', '1', 'AmigoCara', 'Social Media website created in Laravel/PHP - Laravel Framework 7.9.2', null, '2021-01-03 14:38:00', '2021-01-03 14:38:00');
INSERT INTO `projects` VALUES ('6', '1', 'Viewbnb', 'Rent a room/lodgings website created in Laravel 7.0 /PHP', null, '2021-01-03 14:38:47', '2021-01-03 14:38:47');
INSERT INTO `projects` VALUES ('7', '1', 'Gareth Reed Photography', 'Photography website written in Laravel 6.2', null, '2021-01-03 14:39:19', '2021-01-03 14:39:19');
INSERT INTO `projects` VALUES ('8', '1', 'Suzy Bing Handmade Pictures', 'Handmade pictures website created in Laravel 6.2', null, '2021-01-03 14:39:47', '2021-01-03 14:39:47');
INSERT INTO `projects` VALUES ('9', '2', 'test project 6', 'teetsst', null, '2021-02-09 21:53:05', '2021-02-09 21:53:05');
INSERT INTO `projects` VALUES ('10', '2', 'test project 10', 'lorem ipsum', null, '2021-02-13 15:54:13', '2021-02-13 15:54:13');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_admin', 'web', '2020-12-24 12:44:45', '2020-12-24 12:44:45');
INSERT INTO `roles` VALUES ('2', 'admin', 'web', '2020-12-24 12:44:45', '2020-12-24 12:44:45');
INSERT INTO `roles` VALUES ('3', 'manager', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');
INSERT INTO `roles` VALUES ('4', 'coder', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');
INSERT INTO `roles` VALUES ('5', 'tester', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');
INSERT INTO `roles` VALUES ('6', 'reporter', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');
INSERT INTO `roles` VALUES ('7', 'guest', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');
INSERT INTO `roles` VALUES ('8', 'deactivated', 'web', '2020-12-24 12:44:46', '2020-12-24 12:44:46');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('16', '1');
INSERT INTO `role_has_permissions` VALUES ('17', '1');
INSERT INTO `role_has_permissions` VALUES ('18', '1');
INSERT INTO `role_has_permissions` VALUES ('19', '1');
INSERT INTO `role_has_permissions` VALUES ('20', '1');
INSERT INTO `role_has_permissions` VALUES ('21', '1');
INSERT INTO `role_has_permissions` VALUES ('22', '1');
INSERT INTO `role_has_permissions` VALUES ('23', '1');
INSERT INTO `role_has_permissions` VALUES ('24', '1');
INSERT INTO `role_has_permissions` VALUES ('25', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '2');
INSERT INTO `role_has_permissions` VALUES ('8', '2');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '2');
INSERT INTO `role_has_permissions` VALUES ('16', '2');
INSERT INTO `role_has_permissions` VALUES ('22', '2');
INSERT INTO `role_has_permissions` VALUES ('23', '2');
INSERT INTO `role_has_permissions` VALUES ('24', '2');
INSERT INTO `role_has_permissions` VALUES ('25', '2');
INSERT INTO `role_has_permissions` VALUES ('1', '3');
INSERT INTO `role_has_permissions` VALUES ('2', '3');
INSERT INTO `role_has_permissions` VALUES ('3', '3');
INSERT INTO `role_has_permissions` VALUES ('4', '3');
INSERT INTO `role_has_permissions` VALUES ('5', '3');
INSERT INTO `role_has_permissions` VALUES ('7', '3');
INSERT INTO `role_has_permissions` VALUES ('8', '3');
INSERT INTO `role_has_permissions` VALUES ('9', '3');
INSERT INTO `role_has_permissions` VALUES ('10', '3');
INSERT INTO `role_has_permissions` VALUES ('11', '3');
INSERT INTO `role_has_permissions` VALUES ('12', '3');
INSERT INTO `role_has_permissions` VALUES ('13', '3');
INSERT INTO `role_has_permissions` VALUES ('14', '3');
INSERT INTO `role_has_permissions` VALUES ('15', '3');
INSERT INTO `role_has_permissions` VALUES ('16', '3');
INSERT INTO `role_has_permissions` VALUES ('17', '3');
INSERT INTO `role_has_permissions` VALUES ('18', '3');
INSERT INTO `role_has_permissions` VALUES ('19', '3');
INSERT INTO `role_has_permissions` VALUES ('20', '3');
INSERT INTO `role_has_permissions` VALUES ('21', '3');
INSERT INTO `role_has_permissions` VALUES ('22', '3');
INSERT INTO `role_has_permissions` VALUES ('23', '3');
INSERT INTO `role_has_permissions` VALUES ('24', '3');
INSERT INTO `role_has_permissions` VALUES ('7', '4');
INSERT INTO `role_has_permissions` VALUES ('8', '4');
INSERT INTO `role_has_permissions` VALUES ('9', '4');
INSERT INTO `role_has_permissions` VALUES ('10', '4');
INSERT INTO `role_has_permissions` VALUES ('11', '4');
INSERT INTO `role_has_permissions` VALUES ('12', '4');
INSERT INTO `role_has_permissions` VALUES ('13', '4');
INSERT INTO `role_has_permissions` VALUES ('14', '4');
INSERT INTO `role_has_permissions` VALUES ('15', '4');
INSERT INTO `role_has_permissions` VALUES ('17', '4');
INSERT INTO `role_has_permissions` VALUES ('18', '4');
INSERT INTO `role_has_permissions` VALUES ('19', '4');
INSERT INTO `role_has_permissions` VALUES ('20', '4');
INSERT INTO `role_has_permissions` VALUES ('21', '4');
INSERT INTO `role_has_permissions` VALUES ('22', '4');
INSERT INTO `role_has_permissions` VALUES ('23', '4');
INSERT INTO `role_has_permissions` VALUES ('24', '4');
INSERT INTO `role_has_permissions` VALUES ('7', '5');
INSERT INTO `role_has_permissions` VALUES ('8', '5');
INSERT INTO `role_has_permissions` VALUES ('9', '5');
INSERT INTO `role_has_permissions` VALUES ('10', '5');
INSERT INTO `role_has_permissions` VALUES ('11', '5');
INSERT INTO `role_has_permissions` VALUES ('12', '5');
INSERT INTO `role_has_permissions` VALUES ('13', '5');
INSERT INTO `role_has_permissions` VALUES ('14', '5');
INSERT INTO `role_has_permissions` VALUES ('15', '5');
INSERT INTO `role_has_permissions` VALUES ('17', '5');
INSERT INTO `role_has_permissions` VALUES ('18', '5');
INSERT INTO `role_has_permissions` VALUES ('19', '5');
INSERT INTO `role_has_permissions` VALUES ('20', '5');
INSERT INTO `role_has_permissions` VALUES ('21', '5');
INSERT INTO `role_has_permissions` VALUES ('22', '5');
INSERT INTO `role_has_permissions` VALUES ('23', '5');
INSERT INTO `role_has_permissions` VALUES ('24', '5');
INSERT INTO `role_has_permissions` VALUES ('7', '6');
INSERT INTO `role_has_permissions` VALUES ('8', '6');
INSERT INTO `role_has_permissions` VALUES ('9', '6');
INSERT INTO `role_has_permissions` VALUES ('11', '6');
INSERT INTO `role_has_permissions` VALUES ('14', '6');
INSERT INTO `role_has_permissions` VALUES ('17', '6');
INSERT INTO `role_has_permissions` VALUES ('19', '6');
INSERT INTO `role_has_permissions` VALUES ('20', '6');
INSERT INTO `role_has_permissions` VALUES ('21', '6');
INSERT INTO `role_has_permissions` VALUES ('22', '6');
INSERT INTO `role_has_permissions` VALUES ('23', '6');
INSERT INTO `role_has_permissions` VALUES ('24', '6');
INSERT INTO `role_has_permissions` VALUES ('7', '7');
INSERT INTO `role_has_permissions` VALUES ('9', '7');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Administrator', 'Admin', 'Administrator', '/images/users/none.jpg', '', 'admin@starbugged.com', null, '$2y$10$r7YzhuaFrxsZqbgZObitXuH1yPOHPHm1X7bhAkPRjjFUN60pdJ456', null, '2020-12-24 12:44:38', '2021-02-14 18:36:41');
INSERT INTO `users` VALUES ('2', 'test Admin', 'Testuser', 'Grand Tester', '/images/users/test.jpg', 'Code tester afficinado', 'test@starbugged.com', null, '$2y$10$0G8/39njFfrjSJhY4ZJIFeMgvJOSYTYvGvLquo.4a0A2CRz9cwFfq', null, '2020-12-24 12:44:38', '2021-02-14 18:36:42');
INSERT INTO `users` VALUES ('3', 'Coder Caitlin', 'Coder Caitlin', 'Web Developer', '/images/users/none.jpg', '', 'ccat@starbugged.com', null, '$2y$10$Tmfpiy7ttdu5lcq/PkgA.O5ZoMSQ7qytF.m1QqfDP1G4E7.BF9gL6', null, '2020-12-24 12:44:39', '2021-01-16 15:05:12');
INSERT INTO `users` VALUES ('4', 'Coder Charlotte', 'Coder Charlotte', 'Android Developer', '/images/users/none.jpg', '', 'cchar@starbugged.com', null, '$2y$10$84880tCVaNgdT2d8HfAYTen/FRvHey/sFwrk8SiidWwo1sq2Pjj6W', null, '2020-12-24 12:44:39', '2021-02-14 18:36:42');
INSERT INTO `users` VALUES ('5', 'Coder Colin', 'Coder Colin', 'IOS Developer', '/images/users/none.jpg', '', 'codercolin@starbugged.com', null, '$2y$10$RBhTmY8OKzv7pOXH47srZ.jISVhb57k2ItXuC0bwntHo6i1h/vlCC', null, '2020-12-24 12:44:40', '2021-02-14 18:36:42');
INSERT INTO `users` VALUES ('6', 'Guest', 'Guest', 'Guest', '/images/users/none.jpg', '', 'guest@starbugged.com', null, '$2y$10$mdKw2K6J5kmx57xonDegMO2TY7dbAxZx/2BYYntXRA0Zl84YhRB5u', null, '2020-12-24 12:44:40', '2021-02-14 18:36:42');
INSERT INTO `users` VALUES ('7', 'Ian Issuereporter', 'Ian Issuereporter', 'QA Tester', '/images/users/none.jpg', '', 'Ianissue@coder.com', null, '$2y$10$uyeLgd7lfZj/UV.52C.O9.QblNUGdZLGXp2e1jney3VI6wnEfYZAG', null, '2020-12-24 12:44:41', '2021-02-14 18:36:43');
INSERT INTO `users` VALUES ('8', 'Isabella Issuereporter', 'Isabella Issuereporter', 'QA Tester', '/images/users/none.jpg', '', 'isabellis@starbugged.com', null, '$2y$10$lAqYafYXV7wrLTh6aWRWeuuE4ZJNsySMyi4HKQTXCeE.C8PzxEsGS', null, '2020-12-24 12:44:41', '2021-02-14 18:36:43');
INSERT INTO `users` VALUES ('9', 'Issac Issuereporter', 'Issac Issuereporter', 'QA Tester', '/images/users/none.jpg', '', 'iissue@starbugged.com', null, '$2y$10$IWwu1.fggvwxwhbHUy4qvOAytSBS4brsS4ZUKuxh1bFZGdatU0QV2', null, '2020-12-24 12:44:42', '2021-02-14 18:36:43');
INSERT INTO `users` VALUES ('10', 'Manager Maureen', 'Manager Maureen', 'Manager', '/images/users/none.jpg', '', 'mmaureen@starbugged.com', null, '$2y$10$.ezh5wOHzilKKypRKnlNhOACEnOLZkCge9gjUtgDZE2I6iYQWjXMK', null, '2020-12-24 12:44:42', '2020-12-24 12:44:42');
INSERT INTO `users` VALUES ('11', 'Manager Maurice', 'Manager Maurice', 'Manager', '/images/users/none.jpg', '', 'mmo@starbugged.com', null, '$2y$10$2QGK0mjp4Zcl03BiHFNyo.B4eBnfkinxD..12.u2mkTciN9Jc1J7m', null, '2020-12-24 12:44:42', '2020-12-24 12:44:42');
INSERT INTO `users` VALUES ('12', 'Manager Melonie', 'Manager Melonie', 'Manager', '/images/users/none.jpg', '', 'memelonie@starbugged.com', null, '$2y$10$SH6vVBo8isTJnAD2J3jaTOM9eRM/aOLFD47Q8OjpnkxrI6s.OiHGm', null, '2020-12-24 12:44:43', '2020-12-24 12:44:43');
INSERT INTO `users` VALUES ('13', 'Paul Colley', 'Paul Colley', 'Web Developer', '/images/users/none.jpg', '', 'pcolley@starbugged.com', null, '$2y$10$kocL.HBek9N.vsmgWM1QOOLreEIDJAbuw.u35ZgSAAhmaU7IUgzCm', null, '2020-12-24 12:44:43', '2021-02-14 18:36:43');
INSERT INTO `users` VALUES ('14', 'Programmer Pauline', 'Programmer Pauline', 'Web Developer', '/images/users/Programmer Pauline.jpg', '', 'ppauline@starbugged.com', null, '$2y$10$XA0e4lrK473gW23wgyGIHuR/Wdo2VExgd3H6rOMGvP9M4H26EqGsu', null, '2020-12-24 12:44:43', '2021-02-14 18:36:44');
INSERT INTO `users` VALUES ('15', 'Programmer Pete', 'Programmer Pete', 'Android Developer', '/images/users/none.jpg', '', 'ppete@starbugged.com', null, '$2y$10$OBPRBErKO9r6e47mPuNoFepX7iWeGvmdXGoRGr22MzE8wcNw7hSpC', null, '2020-12-24 12:44:43', '2021-02-14 18:36:44');
INSERT INTO `users` VALUES ('16', 'Programmer Phoebe', 'Programmer Phoebe', 'IOS Developer', '/images/users/none.jpg', '', 'ppho@starbugged.com', null, '$2y$10$cs/l5LDRWzBeTzzndBGgte/w1gIKY/PHuRXNTREdLa31F/iMeWWDy', null, '2020-12-24 12:44:44', '2021-02-14 18:36:44');
INSERT INTO `users` VALUES ('17', 'Programmer Patricia', 'Programmer Patricia', '.NET Developer', '/images/users/none.jpg', '', 'ppatricia@starbugged.com', null, '$2y$10$gmlI/Z6F3JOTSyzjs3SGOuqgY6yE.vYLST1IojjDhbERszyWqm1NC', null, '2020-12-24 12:44:44', '2021-02-14 18:36:45');
INSERT INTO `users` VALUES ('18', 'Tania Ticketreporter', 'Tania Ticketreporter', 'QA Tester', '/images/users/none.jpg', '', 'ttrepo@starbugged.com', null, '$2y$10$sn.UjFtxc1eHkPtE7LKLZ.1PJ9dl35M6dqWfuJbiafou2TlFZFFvu', null, '2020-12-24 12:44:44', '2021-02-14 18:36:45');
INSERT INTO `users` VALUES ('19', 'Terence Ticketreporter', 'Terence Ticketreporter', 'QA Tester', '/images/users/none.jpg', '', 'terencet@starbugged.com', null, '$2y$10$B4FpFWVEnXKYR88VMta/COVrU08qwCDq9W4mRUbRi/PkKhdiGqAmK', null, '2020-12-24 12:44:44', '2021-02-14 18:36:45');
INSERT INTO `users` VALUES ('20', 'Thomas Ticketreporter', 'Thomas Ticketreporter', 'QA Tester', '/images/users/none.jpg', '', 'tomtckt@starbugged.com', null, '$2y$10$QyN20w9UADgTbMQc8mrP9O31Cwlol8SwWvc0OUfNR0Z2erFKZUiTa', null, '2020-12-24 12:44:45', '2021-02-14 18:36:45');
