CREATE TABLE `queue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `type` enum('Citizen','Anonymous') DEFAULT NULL,
  `service` enum('Council Tax','Benetifs','Rent') DEFAULT NULL,
  `queuedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `queue` (`id`, `firstName`, `lastName`, `organization`, `type`, `service`, `queuedDate`)
VALUES
	(1,'Doctor','Who',NULL,'Citizen','Benetifs','2017-05-01 00:00:00'),
	(2,'Arya','Stark','Winterfell','Citizen','Council Tax','2017-05-01 00:00:00'),
	(3,NULL,NULL,NULL,'Anonymous','Council Tax',NOW()),
	(4,'John','Snow','Winterfell','Citizen','Rent',NOW()),
	(5,'John','Smith',NULL,'Citizen','Rent',NOW()),
	(6,'Steve','Harris','Iron Maiden','Citizen','Benetifs',NOW()),
	(7,'John','Petrucci','Dream Theater','Citizen','Council Tax',NOW()),
	(8,'Steve','Vai',NULL,'Citizen','Council Tax',NOW()),
	(9,NULL,NULL,NULL,'Anonymous','Rent',NOW()),
	(10,NULL,NULL,NULL,'Anonymous','Benetifs',NOW());