CREATE TABLE IF NOT EXISTS `#__recept_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `ingredient_count` DECIMAL(6,3) NOT NULL,  
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  `trash` SMALLINT(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_article_id` (`article_id`),
  KEY `idx_ingredient_id` (`ingredient_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__recept_ingredient_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  `trash` SMALLINT(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
