-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 06:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunfrog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(3) unsigned NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `keyword` text CHARACTER SET utf8,
  `com` char(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `content`, `title`, `description`, `keyword`, `com`) VALUES
(1, '<p>gioi thieu</p>\r\n<p>trai&nbsp;</p>\r\n<p>day</p>', 'gioi thieu', 'gioi thieu des', 'GIOI THIEU KEY', 'about'),
(2, '<p>contact</p>\r\n<p>tai day</p>\r\n<p>day</p>', 'title contact', 'des contact', 'key contact', 'contact'),
(3, '<p>We enjoy helping groups, individuals, business, non-profits, or anyone looking to make their event, business, or fund-raiser more profitable.</p>\r\n<p>SunFrog wholeale offers a complete apparel product line and a wide variety of color choices. Get started by contacting a sales representative of SunFrog today.</p>', NULL, NULL, NULL, 'footer'),
(4, '<iframe width="100%" height="200" src="https://www.youtube.com/embed/NTFTXfXqfp4" frameborder="0" allowfullscreen></iframe>', NULL, NULL, NULL, 'video');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `meta_title` text,
  `updated_date` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `meta_keyword`, `meta_description`, `meta_title`, `updated_date`, `created_date`) VALUES
(1, 'sdgsd', '<p>gsdgsdgsgsdg</p>\r\n<p>sd</p>\r\n<p>gs</p>\r\n<p>dgs</p>', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) unsigned NOT NULL,
  `category_id` int(5) DEFAULT NULL,
  `name` char(255) NOT NULL,
  `image` char(255) DEFAULT NULL,
  `description` text,
  `size` text,
  `details` text,
  `original_url` char(255) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `deteled_ts` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `image`, `description`, `size`, `details`, `original_url`, `created_ts`, `deteled_ts`) VALUES
(3, NULL, 'Missouri Nebraska Country', 'Missouri-Nebraska-Country.jpg', 'Get this shirt and represent by wearing it proudly!', '<table class="size_specs leftd" style="width:230px;">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class="size">S</td><td>18</td><td>27</td></tr>  		<tr><td class="size">M</td><td>19</td><td>28</td></tr>  		<tr><td class="size">L</td><td>21</td><td>29</td></tr>  		<tr><td class="size">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class="size">2X</td><td>25</td><td>31</td></tr>  		<tr><td class="size">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>', '<ul class="sizespecs leftd">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style="list-style-type:none">&nbsp;</li>          <li style="list-style-type:none">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>', 'http://www.sunfrogshirts.com/Sports/Missouri-Nebraska-Country.html', '2015-04-20 00:00:00', NULL),
(4, NULL, 'Crappie Day T-Shirt', 'Crappie-Day-T-Shirt.jpg', 'Yep! It''s Gonna Be A Crappie Day Today For Sure! T-Shirt Dedicated To Fishing Fanatics!', '<table class="size_specs leftd" style="width:230px;">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class="size">S</td><td>18</td><td>27</td></tr>  		<tr><td class="size">M</td><td>19</td><td>28</td></tr>  		<tr><td class="size">L</td><td>21</td><td>29</td></tr>  		<tr><td class="size">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class="size">2X</td><td>25</td><td>31</td></tr>  		<tr><td class="size">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>', '<ul class="sizespecs leftd">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style="list-style-type:none">&nbsp;</li>          <li style="list-style-type:none">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>', 'http://www.sunfrogshirts.com/Fishing/Crappie-Day-T-Shirt.html', '2015-04-20 00:00:00', NULL),
(5, NULL, 'Fishing importanter', 'SF%20Hoodie53.jpg', 'Fishing importanter', '<table class="size_specs leftd" style="width:230px;">  			<tbody><tr><th>SIZE</th>  			<th>CHEST in/cm</th>  			<th>LENGTH in/cm</th>  			</tr>  			<tr><td class="size">S</td><td>20 / 51</td><td>26 / 66</td></tr>  			<tr><td class="size">M</td><td>22 / 56</td><td>27 / 69</td></tr>  			<tr><td class="size">L</td><td>24 / 61</td><td>28 / 71</td></tr>  			<tr><td class="size">XL</td><td>26 / 66</td><td>29 / 74</td></tr>  			<tr><td class="size">2XL</td><td>28 / 71</td><td>30 / 76</td></tr>  			<tr><td class="size">3XL</td><td>30 / 76</td><td>31 / 79</td></tr>  			<tr><td class="size">4XL</td><td>32 / 81</td><td>32 / 81</td></tr>  			</tbody>  		</table>', '<ul class="sizespecs leftd">  			  			<li>Air jet yarn for softness and no-pill performance</li>  			<li>Double-lined hood with matching drawstring</li>  			<li>Double-needle stitching</li>  			<li>Pouch pocket</li>  			<li>Double-needle cuffs</li>  			<li>1 X 1 athletic rib with spandex</li>  			<li>Quarter-turned to eliminate center crease</li>  		</ul>', 'http://www.sunfrogshirts.com/Fishing/Fishing-importanter-White-11472113-Hoodie.html', '2015-04-20 00:00:00', NULL),
(6, NULL, 'Fishing - Evolution', 'lyokiller_54c67cb7acc96.jpg', 'Fishing - Evolution', '<table class="size_specs leftd" style="width:230px;">  			<tbody><tr><th>SIZE</th>  			<th>CHEST in/cm</th>  			<th>LENGTH in/cm</th>  			</tr>  			<tr><td class="size">S</td><td>20 / 51</td><td>26 / 66</td></tr>  			<tr><td class="size">M</td><td>22 / 56</td><td>27 / 69</td></tr>  			<tr><td class="size">L</td><td>24 / 61</td><td>28 / 71</td></tr>  			<tr><td class="size">XL</td><td>26 / 66</td><td>29 / 74</td></tr>  			<tr><td class="size">2XL</td><td>28 / 71</td><td>30 / 76</td></tr>  			<tr><td class="size">3XL</td><td>30 / 76</td><td>31 / 79</td></tr>  			<tr><td class="size">4XL</td><td>32 / 81</td><td>32 / 81</td></tr>  			</tbody>  		</table>', '<ul class="sizespecs leftd">  			  			<li>Air jet yarn for softness and no-pill performance</li>  			<li>Double-lined hood with matching drawstring</li>  			<li>Double-needle stitching</li>  			<li>Pouch pocket</li>  			<li>Double-needle cuffs</li>  			<li>1 X 1 athletic rib with spandex</li>  			<li>Quarter-turned to eliminate center crease</li>  		</ul>', 'http://www.sunfrogshirts.com/Fishing/Fishing--Evolution-6579-Black-20616652-Hoodie.html', '2015-04-20 00:00:00', NULL),
(7, NULL, 'Keep Calm and Fish On', 'keep-calm-and-fish-on-shirt-green.jpg', 'Calm down...youll scare the fish.', '<table class="size_specs leftd" style="width:230px;">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class="size">S</td><td>18</td><td>27</td></tr>  		<tr><td class="size">M</td><td>19</td><td>28</td></tr>  		<tr><td class="size">L</td><td>21</td><td>29</td></tr>  		<tr><td class="size">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class="size">2X</td><td>25</td><td>31</td></tr>  		<tr><td class="size">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>', '<ul class="sizespecs leftd">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style="list-style-type:none">&nbsp;</li>          <li style="list-style-type:none">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>', 'http://www.sunfrogshirts.com/Fishing/keep-calm-and-fish-on-shirt-green.html', '2015-04-20 00:00:00', NULL),
(8, NULL, 'Fishing importanter', 'SF Hoodie53.jpg', 'Fishing importanter', '<table class="size_specs leftd" style="width:230px;">  			<tbody><tr><th>SIZE</th>  			<th>CHEST in/cm</th>  			<th>LENGTH in/cm</th>  			</tr>  			<tr><td class="size">S</td><td>20 / 51</td><td>26 / 66</td></tr>  			<tr><td class="size">M</td><td>22 / 56</td><td>27 / 69</td></tr>  			<tr><td class="size">L</td><td>24 / 61</td><td>28 / 71</td></tr>  			<tr><td class="size">XL</td><td>26 / 66</td><td>29 / 74</td></tr>  			<tr><td class="size">2XL</td><td>28 / 71</td><td>30 / 76</td></tr>  			<tr><td class="size">3XL</td><td>30 / 76</td><td>31 / 79</td></tr>  			<tr><td class="size">4XL</td><td>32 / 81</td><td>32 / 81</td></tr>  			</tbody>  		</table>', '<ul class="sizespecs leftd">  			  			<li>Air jet yarn for softness and no-pill performance</li>  			<li>Double-lined hood with matching drawstring</li>  			<li>Double-needle stitching</li>  			<li>Pouch pocket</li>  			<li>Double-needle cuffs</li>  			<li>1 X 1 athletic rib with spandex</li>  			<li>Quarter-turned to eliminate center crease</li>  		</ul>', 'http://www.sunfrogshirts.com/Fishing/Fishing-importanter-White-11472113-Hoodie.html', '2015-04-20 00:00:00', NULL),
(9, NULL, 'Its All About the Rack', 'hunting-shirt-its-about-the-rack.jpg', 'For some of those hunters chasing white tails, its all about the rack! Funny hunting t shirt and great conversation starter!', '<table class="size_specs leftd" style="width:230px;">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class="size">S</td><td>18</td><td>27</td></tr>  		<tr><td class="size">M</td><td>19</td><td>28</td></tr>  		<tr><td class="size">L</td><td>21</td><td>29</td></tr>  		<tr><td class="size">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class="size">2X</td><td>25</td><td>31</td></tr>  		<tr><td class="size">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>', '<ul class="sizespecs leftd">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style="list-style-type:none">&nbsp;</li>          <li style="list-style-type:none">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>', 'http://www.sunfrogshirts.com/hunting-white-tail-rack-funny-shirt.html', '2015-04-20 00:00:00', NULL),
(10, NULL, 'Its All About the Rack', 'hunting-shirt-its-about-the-rack.jpg', 'For some of those hunters chasing white tails, its all about the rack! Funny hunting t shirt and great conversation starter!', '<table class="size_specs leftd" style="width:230px;">  		<tbody><tr><th>SIZE</th>  		<th>CHEST in</th>  		<th>LENGTH in</th>  		</tr>  		<tr><td class="size">S</td><td>18</td><td>27</td></tr>  		<tr><td class="size">M</td><td>19</td><td>28</td></tr>  		<tr><td class="size">L</td><td>21</td><td>29</td></tr>  		<tr><td class="size">XL</td><td>23</td>	<td>30</td></tr>  		<tr><td class="size">2X</td><td>25</td><td>31</td></tr>  		<tr><td class="size">3X</td><td>27</td><td>32</td></tr>  		</tbody>  	</table>', '<ul class="sizespecs leftd">  		          <li>100% Cotton Adult 30/1s Tee Shirt</li>  		<li>4.3 oz 100% Ringspun Cotton, Preshrunk Jersey</li>  		<li>Tubular</li>  		<li>3/4 inch Seamless Rib Knit Collar</li>  		<li>Taped neck and shoulders</li>  		<li>Double-Needle Sleeve and Bottom Hem</li>          <li>Shirts run small</li>          <li style="list-style-type:none">&nbsp;</li>          <li style="list-style-type:none">* <em>Sports Grey and Dark Heather are made of 50% Cotton / 50% Polyester</em></li>            	</ul>', 'http://www.sunfrogshirts.com/hunting-white-tail-rack-funny-shirt.html', '2015-04-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`id` int(10) unsigned NOT NULL,
  `name` char(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `deleted_ts` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) unsigned NOT NULL,
  `username` char(25) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `password_reset_token` char(255) DEFAULT NULL,
  `email` char(255) NOT NULL,
  `auth_key` char(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$13$OaBT9.00E9ihPnkWvl/Z9.fyHmSDyXV2ULkmWdcfbKdwwVMnTvkFi', 'Y9PonJISL4RiOdlU7g9EZkdZzWljNCKl_1428828435', 'vynguyendao@gmail.com', 'QD2lVB99QpxpWfn1jC2R4AL-Tm84tIqY', 10, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
