CREATE TABLE IF NOT EXISTS `#__ingredients_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `ingredient_count` DECIMAL(6,3) NOT NULL,  
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_article_id` (`article_id`),
  KEY `idx_ingredient_id` (`ingredient_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__ingredients_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(15) NOT NULL DEFAULT 'г.',
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
