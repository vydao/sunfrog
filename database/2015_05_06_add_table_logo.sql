CREATE TABLE `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo` varchar(255) NOT NULL,
  `com` char(50) NOT NULL,
  PRIMARY KEY (`id`)
)


INSERT INTO `sunfrog`.`logo` (`id`, `name`, `photo`, `com`) VALUES (NULL, 'Logo', '', 'logo');
INSERT INTO `sunfrog`.`logo` (`id`, `name`, `photo`, `com`) VALUES (NULL, 'Slider', '', 'slider');