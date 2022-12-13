# ************************************************************
# Sequel Ace SQL dump
# Version 20042
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: restaurant
# Generation Time: 2022-12-12 12:27:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_name` varchar(255) DEFAULT NULL,
  `menu_item_desc` varchar(255) DEFAULT NULL,
  `menu_item_price` float(7,2) unsigned DEFAULT NULL,
  `menu_item_image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_item_name`, `menu_item_desc`, `menu_item_price`, `menu_item_image`, `image_alt`)
VALUES
	(1,'Classic Burger','A delicious beef burger with all the fixings, including lettuce, tomato, onion, pickles, ketchup, and mustard',6.99,'https://images.unsplash.com/photo-1572448862527-d3c904757de6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Classic Burger'),
	(2,'BBQ Burger','A beef burger topped with smoky BBQ sauce, crispy onion rings, and melted cheddar cheese',7.99,'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1299&q=80','BBQ Burger'),
	(3,'Veggie Burger','A hearty veggie patty topped with avocado, sprouts, and spicy mayo.',8.99,'https://images.unsplash.com/photo-1585238341267-1cfec2046a55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1148&q=80','Veggie Burger'),
	(4,'Mushroom Swiss Burger','A beef burger topped with sauteed mushrooms and melted Swiss cheese.',7.99,'https://images.unsplash.com/photo-1552718752-c682d315b136?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGJ1cmdlcnxlbnwwfDJ8MHx8&auto=format&fit=crop&w=800&q=60','Mushroom Swiss Burger'),
	(5,'Bacon Cheeseburger','A classic beef burger topped with crispy bacon and your choice of cheese.',8.99,'https://images.unsplash.com/photo-1551360021-0ff7982d13dc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1210&q=80','Bacon Cheeseburger'),
	(6,'Black and Blue Burger','A beef burger topped with blue cheese crumbles and blackening seasoning.',8.99,'https://images.unsplash.com/photo-1606736692995-d03f14de3d3d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Black and Blue Burger'),
	(7,'The Works Burger','A chicken burger loaded with all the toppings, including lettuce, tomato, onion, pickles, ketchup, mustard, mayo, avocado, bacon, and your choice of cheese.',9.99,'https://images.unsplash.com/photo-1603903631889-b5f3ba4d5b9b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','The Works Burger'),
	(8,'Tex-Mex Burger','A chicken burger topped with guacamole, salsa, and jalapeno peppers.',9.99,'https://images.unsplash.com/photo-1601348637967-140ce3f53fa2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Tex-Mex Burger'),
	(9,'Greek Burger','A lamb burger topped with feta cheese, Kalamata olives, and a Greek-style tzatziki sauce.',9.99,'https://images.unsplash.com/photo-1553183733-81edd1223a95?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1162&q=80','Greek Burger'),
	(10,'Hawaiian Burger','A beef burger topped with grilled pineapple, ham, and teriyaki sauce.',9.99,'https://images.unsplash.com/photo-1604908814793-161d46e9dd4f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Hawaiian Burger'),
	(11,'French Fries','Thin and crispy American style fries.',3.75,'https://images.unsplash.com/photo-1639744091981-2f826321fae6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','French Fries'),
	(12,'Waffle Fries','Hot & Crispy fries right out the oven!',4.75,'https://images.unsplash.com/photo-1571800338428-60ca034df783?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Waffle Fries'),
	(13,'Curly Fries','Curly fries topped with crispy fried onions and cajun seasoning.',4.75,'https://images.unsplash.com/photo-1657865462048-dff8684fb356?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGZyaWVzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60','Curly Fries'),
	(14,'Potato Wedges','Chunky, peppery golden potato wedges.',3.75,'https://images.unsplash.com/photo-1658951863040-508467c9a1f4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTB8fHdhZmZsZSUyMGZyaWVzfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60','Potato Wedges'),
	(15,'Ribeye Steak','A tender and flavorful ribeye steak, grilled to perfection.',19.99,'https://images.unsplash.com/photo-1625937329935-287441889bce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Ribeye Steak'),
	(16,'T-Bone Steak','A classic T-bone steak, with a tender strip and a flavorful sirloin.',18.99,'https://images.unsplash.com/photo-1579366948929-444eb79881eb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','T-Bone Steak'),
	(17,'Filet Mignon','A tender and juicy filet mignon, grilled to your liking.',24.99,'https://images.unsplash.com/photo-1648995293978-8b33ec0b7aa0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Filet Mignon'),
	(18,'Surf and Turf','A combination of succulent shrimp and a juicy steak, served with a side of lemon butter sauce.',27.99,'https://images.unsplash.com/photo-1625943555419-56a2cb596640?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Surf and Turf'),
	(19,'Cowboy Steak','A large ribeye steak, served with crispy onion rings and a tangy BBQ sauce.',22.99,'https://images.unsplash.com/photo-1633237308525-cd587cf71926?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80','Cowboy Steak');

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` int(11) unsigned NOT NULL,
  `menu_item` int(11) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_items_orders` (`order_number`),
  KEY `fk_order_items_menu_items` (`menu_item`),
  CONSTRAINT `fk_order_items_menu_items` FOREIGN KEY (`menu_item`) REFERENCES `menu_items` (`id`),
  CONSTRAINT `fk_order_items_orders` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;

INSERT INTO `order_items` (`id`, `order_number`, `menu_item`, `quantity`)
VALUES
	(1,1,3,1),
	(2,1,12,1),
	(3,2,1,1),
	(4,2,11,1);

/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`%` */ /*!50003 TRIGGER `add_price_to_order_total` AFTER INSERT ON `order_items` FOR EACH ROW BEGIN
    DECLARE price FLOAT DEFAULT 0;
    SELECT `menu_items`.`menu_item_price` INTO price FROM `menu_items` WHERE `menu_items`.`id` = NEW.`menu_item`;
    UPDATE `orders`
    SET `orders`.`order_total` = `orders`.`order_total` + price * NEW.`quantity` WHERE `orders`.`order_number_id` = NEW.`order_number`;
END */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`%` */ /*!50003 TRIGGER `update_order_total_on_quantity_change` AFTER UPDATE ON `order_items` FOR EACH ROW BEGIN
    DECLARE price FLOAT DEFAULT 0;
    DECLARE price_change FLOAT SIGNED DEFAULT 0;
    SELECT `menu_items`.`menu_item_price` INTO price FROM `menu_items` WHERE `menu_items`.`id` = NEW.`menu_item`;
    SELECT (NEW.`quantity` - OLD.`quantity`) * price INTO price_change;
    UPDATE `orders`
    SET `orders`.`order_total` = `orders`.`order_total` + price_change WHERE `orders`.`order_number_id` = NEW.`order_number`;
END */;;
/*!50003 SET SESSION SQL_MODE="ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`%` */ /*!50003 TRIGGER `remove_price_to_order_total` AFTER DELETE ON `order_items` FOR EACH ROW BEGIN
    DECLARE price FLOAT DEFAULT 0;
    SELECT `menu_items`.`menu_item_price` INTO price FROM `menu_items` WHERE `menu_items`.`id` = OLD.`menu_item`;
    UPDATE `orders`
    SET `orders`.`order_total` = `orders`.`order_total` - price WHERE `orders`.`order_number_id` = OLD.`order_number`;
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_number_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `order_total` float(7,2) unsigned DEFAULT '0.00',
  `order_status` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`order_number_id`),
  KEY `fk_orders_order_statsuses` (`order_status`),
  CONSTRAINT `fk_orders_order_statsuses` FOREIGN KEY (`order_status`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`order_number_id`, `customer_name`, `customer_email`, `delivery_address`, `order_total`, `order_status`)
VALUES
	(1,'Donald Duck','therealDonald@duckmail.com','13 Bell St, St Andrews, Fife, KY16 9UR',13.74,2),
	(2,'Sherlock Holmes','sherlock.holmes@crimewatch.co.uk','221b Baker St, Marylebone, London NW1 6XE',10.74,1);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;

INSERT INTO `statuses` (`id`, `status`)
VALUES
	(1,'in progress'),
	(2,'completed');

/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
