-- MySQL dump 10.13  Distrib 5.5.43, for Linux (x86_64)
--
-- Host: localhost    Database: sunfrogshirt_web
-- ------------------------------------------------------
-- Server version	5.5.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Best Sellers',1),(2,'Automotive',2),(3,'Camping',3),(4,'Faith',4),(5,'Fishing',5);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `keyword` text CHARACTER SET utf8,
  `com` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'<p>gioi thieu</p>\r\n<p>trai&nbsp;</p>\r\n<p>day</p>','gioi thieu','gioi thieu des','GIOI THIEU KEY','about'),(2,'<p>contact</p>\r\n<p>tai day</p>\r\n<p>day</p>','title contact','des contact','key contact','contact'),(3,'<p><strong><span style=\"color: #ff0000;\">Setting Footer tai day</span></strong></p>\r\n<p>We enjoy helping groups, individuals, business, non-profits, or anyone looking to make their event, business, or fund-raiser more profitable.</p>\r\n<p>SunFrog wholeale offers a complete apparel product line and a wide variety of color choices. Get started by contacting a sales representative of SunFrog today.</p>',NULL,NULL,NULL,'footer'),(4,'<iframe width=\"100%\" height=\"200\" src=\"https://www.youtube.com/embed/NTFTXfXqfp4\" frameborder=\"0\" allowfullscreen></iframe>',NULL,NULL,NULL,'video');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) NOT NULL,
  `com` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo`
--

LOCK TABLES `logo` WRITE;
/*!40000 ALTER TABLE `logo` DISABLE KEYS */;
INSERT INTO `logo` VALUES (1,'Logo Banner','0a46b1d5a4e6ec72e6c36d5ea6ad6adc.png','logo'),(2,'Slider','af85eeae078fd98689172fdd610707b8.jpg','slider');
/*!40000 ALTER TABLE `logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'zcvzxvzxv','<p>zxvzxvzxvzxz afasf afa faf</p>','<p>af a fasf asf asf asfafa</p>','800a61a7f2a828ee1cab14a4d1b1da6c.jpg','as fasf','a fasf as','a fasfa',1,0,1431693285,1430094913);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(5) DEFAULT NULL,
  `name` char(255) NOT NULL,
  `image` char(255) DEFAULT NULL,
  `description` text,
  `size` text,
  `price` double DEFAULT NULL,
  `details` text,
  `original_url` char(255) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `deteled_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (11,1,'US Armed Forces - Fallen Soldier','US-Armed-Forces--Fallen-Soldier.jpg','US Armed Forces - Fallen Soldier','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',21,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/US-Armed-Forces--Fallen-Soldier.html','2015-05-14 00:00:00',NULL),(12,1,'Never Enough','Never-Enough.jpg','No matter how long we have them, its never enough','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Never-Enough.html','2015-05-14 00:00:00',NULL),(13,1,'Quality Dutch Ovens','Quality-Dutch-Ovens.jpg','People have died from low quality ones.','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',22,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Quality-Dutch-Ovens.html','2015-05-14 00:00:00',NULL),(14,1,'Dog Person','Dog-Person.jpg','Dog Person','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Dog-Person-40863663-Guys.html','2015-05-14 00:00:00',NULL),(15,1,'Fun Till Your Friends Find Out','fat-chix2.jpg','It\'s all fun and games until someone finds out.','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/fat-chicks.html','2015-05-14 00:00:00',NULL),(16,1,'Leave Me Alone - Dog','Leave-Me-Alone--Dog.jpg','Leave Me Alone Im Only Speaking To My Dog Today','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Leave-Me-Alone--Dog.html','2015-05-14 00:00:00',NULL),(17,1,'Puppy Shades','puppyshades2_black.jpg','Puppy Shades','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Puppy-Shades.html','2015-05-14 00:00:00',NULL),(18,1,'Vitruvian Guitar Man','Vitruvian-Guitar-Man.jpg','Love to play guitar? You must get this one. It is designed exclusively and very unique and classic.','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',19,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Vitruvian-Guitar-Man.html','2015-05-14 00:00:00',NULL),(19,NULL,'Part Time Job Roasting Chicken','131.jpg','Part Time Job Roasting Chickens.','<table class=\"size_specs leftd\" style=\"width:230px;\">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class=\"size\">S</td><td>18</td><td>27</td></tr>  		<tr><td class=\"size\">M</td><td>19</td><td>28</td></tr>  		<tr><td class=\"size\">L</td><td>21</td><td>29</td></tr>  		<tr><td class=\"size\">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class=\"size\">2X</td><td>25</td><td>31</td></tr>  		<tr><td class=\"size\">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>',24.95,'<ul class=\"sizespecs leftd\">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style=\"list-style-type:none\">&nbsp;</li>          <li style=\"list-style-type:none\">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>','http://www.sunfrogshirts.com/Part-Time-Job-Roasting-Chicken-Black-38616179-Guys.html','2015-05-15 00:00:00',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'123456',1);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support`
--

LOCK TABLES `support` WRITE;
/*!40000 ALTER TABLE `support` DISABLE KEYS */;
INSERT INTO `support` VALUES (1,'How Much Are Hoodies?','<p><span style=\"color: #6c6c6c; font-family: Helvetica, Arial, sans-serif; font-size: 14.6666669845581px; line-height: 22px;\">Our shirt prices are set by the artist selling the design. Prices can vary from $29-$45 USD for hoodies.</span></p>','<p>Our shirt prices are set by the artist selling the design. Prices can vary from $29-$45 USD for hoodies.</p>','1ad67f9e01227e7bed2d390cc214c963.png','as fasf','a fasf as','a fasfa',2,0,1431612018,1430094913),(2,'How Much Does It Cost?','','<p>Our shirt prices are set by the artist selling the design. Prices can vary from $19-$35 USD for t-shirts and $29-$45 USD for hoodies.</p>',NULL,NULL,NULL,NULL,3,0,1431693296,1431611198);
/*!40000 ALTER TABLE `support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(25) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `password_reset_token` char(255) DEFAULT NULL,
  `email` char(255) NOT NULL,
  `auth_key` char(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','$2y$13$OaBT9.00E9ihPnkWvl/Z9.fyHmSDyXV2ULkmWdcfbKdwwVMnTvkFi','Y9PonJISL4RiOdlU7g9EZkdZzWljNCKl_1428828435','vynguyendao@gmail.com','QD2lVB99QpxpWfn1jC2R4AL-Tm84tIqY',10,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-18 12:46:24
