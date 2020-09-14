-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `food_id` int(255) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(45) DEFAULT NULL,
  `price` varchar(8) DEFAULT NULL,
  `food_image` varchar(100) DEFAULT NULL,
  `was_price` varchar(8) DEFAULT NULL,
  `menuId` varchar(255) DEFAULT NULL,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `available` varchar(45) DEFAULT '1',
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `food` (`food_id`, `food_name`, `price`, `food_image`, `was_price`, `menuId`, `dateadded`, `available`) VALUES
(3,	'other food',	'20',	'c87fcee4e8_2019-08-28-15-09-17_4410_29412.jpg',	NULL,	'12',	'2019-10-26 11:57:32',	'1'),
(4,	'other food',	'20',	'breakfast_thumb.jpg',	NULL,	'12',	'2019-10-26 13:44:01',	'1'),
(5,	'samosa',	'10',	'slide2.jpg',	NULL,	'12',	'2019-10-26 14:07:44',	'1'),
(6,	'some food',	'20',	'istock-855098134.jpg',	NULL,	'5',	'2019-10-26 14:12:02',	'1'),
(7,	'lovely food',	'20',	'Karma-Indian-Restaurant-pattaya-kb6592.jpg',	NULL,	'5',	'2019-10-26 14:12:27',	'1'),
(8,	'small food',	'20',	'restaurant_2999753b.jpg',	NULL,	'5',	'2019-10-26 14:14:14',	'1'),
(9,	'Tamuu',	'20',	'c87fcee4e8_2019-08-28-15-09-17_4410_29413.jpg',	NULL,	'5',	'2019-10-29 05:03:32',	'1'),
(10,	'Sweet food',	'20',	'cook-366875__3401.jpg',	NULL,	'5',	'2019-10-29 14:45:28',	'1'),
(11,	'other food',	'gfgf',	'cook-366875__3402.jpg',	NULL,	'5',	'2019-10-29 14:46:31',	'1'),
(12,	'lovely food',	'gfgf',	'food-of-india.jpg',	NULL,	'5',	'2019-10-29 16:37:51',	'1');

DROP TABLE IF EXISTS `menu_list`;
CREATE TABLE `menu_list` (
  `menu_id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(45) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `for_who` int(255) DEFAULT NULL,
  `menu_slug` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_list` (`menu_id`, `menu_name`, `date_added`, `for_who`, `menu_slug`) VALUES
(5,	'better',	'2019-10-26 07:36:40',	2,	'better'),
(7,	'good',	'2019-10-29 16:36:28',	1,	'good'),
(8,	'better',	'2019-10-29 16:36:42',	2,	'better'),
(9,	'menu 1',	'2019-10-29 18:20:34',	4,	'menu-1');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `sub_total` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `restaurant_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `slug` varchar(90) DEFAULT NULL,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `restaurants` (`restaurant_id`, `name`, `location`, `logo`, `slug`, `dateadded`) VALUES
(1,	'Restaurant',	'mumbai',	'il_570xN_1431687786_w5a81.jpg',	'restaurant',	'2019-10-25 21:55:39'),
(2,	'Kitchen Place',	'Somewhere',	'logo.png',	'kitchen-place',	'2019-10-25 21:56:36'),
(4,	'JUMO',	'VIJAYNAGAR WORKS H',	'Restaurant-Logo-by-Koko-Store-580x386.jpg',	'jumo',	'2019-10-26 09:50:28'),
(5,	'mixes',	'kericho',	'organic-food-restaurant-logo-vector-171313801',	'mixes',	'2019-10-29 18:32:02');

DROP TABLE IF EXISTS `table_booking`;
CREATE TABLE `table_booking` (
  `book_id` int(255) NOT NULL AUTO_INCREMENT,
  `booked_by` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `restaurant_booked` varchar(255) NOT NULL,
  `book_date` varchar(15) NOT NULL,
  `book_time` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_when` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  `role` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`, `role`) VALUES
(1,	'Dan',	'frida@frida.com',	'e10adc3949ba59abbe56e057f20f883e',	'Male',	'0705710324',	'2019-10-29 08:46:53',	'2019-10-29 08:46:53',	1,	3),
(2,	'Dan',	'danruiyot@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'Male',	'0705710324',	'2019-10-29 18:50:12',	'2019-10-29 18:50:12',	1,	1),
(3,	'frida',	'gmail@gmail.com',	'202cb962ac59075b964b07152d234b70',	'Male',	'0705710324',	'2019-10-29 19:00:23',	'2019-10-29 19:00:23',	1,	3);

-- 2020-06-15 07:25:13
