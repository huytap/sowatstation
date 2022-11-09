ALTER TABLE `galleries` ADD `photo_mobile` VARCHAR(128) NULL DEFAULT NULL AFTER `photo`;
ALTER TABLE `projects` ADD `cover_detail` VARCHAR(128) NULL DEFAULT NULL AFTER `cover_mobile`;
ALTER TABLE `products` ADD `cover_detail` VARCHAR(128) NULL DEFAULT NULL AFTER `cover_mobile`;
ALTER TABLE `products` CHANGE `photos` `photos` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `projects` CHANGE `photos` `photos` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;