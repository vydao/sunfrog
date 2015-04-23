ALTER TABLE `news` ADD COLUMN `view_count` INT(11) DEFAULT 0 NULL AFTER `meta_title`; 
 ALTER TABLE `news` ADD COLUMN `featured` TINYINT(1) DEFAULT 1 NULL AFTER `view_count`; 