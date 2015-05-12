CREATE TABLE IF NOT EXISTS `support` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `content` text NOT NULL,
  `image` text,
  `meta_keyword` text,
  `meta_description` text,
  `meta_title` text,
  `view_count` int(11) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  `updated_date` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;