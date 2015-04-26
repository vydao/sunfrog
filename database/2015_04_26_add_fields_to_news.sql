ALTER TABLE `news` ADD COLUMN `description` TEXT NULL AFTER `title`, ADD COLUMN `image` TEXT NULL AFTER `content`, CHANGE `featured` `featured` TINYINT(1) DEFAULT 1 NULL AFTER `view_count`; 
ALTER TABLE `news` CHANGE `featured` `featured` TINYINT(1) DEFAULT 0 NULL;