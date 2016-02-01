CREATE TABLE IF NOT EXISTS `#__ingredients_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unit` varchar(15) NOT NULL DEFAULT 'г.',
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__ingredients_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `ingredient_id` int(10) NOT NULL,
  `ingredient_count` DECIMAL(6,3) NOT NULL,  
  `published` SMALLINT(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_article_id` (`article_id`),
  KEY `idx_ingredient_id` (`ingredient_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `#__ingredients_article`
--   ADD CONSTRAINT `fk_ingredients_article_article_id` 
--     FOREIGN KEY (`article_id`) 
--     REFERENCES `#__k2_items` (`id`)
--     ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ingredients_article_ingredient_id` 
    FOREIGN KEY (`ingredient_id`) 
    REFERENCES `#__ingredients_list` (`id`)
    ON DELETE CASCADE
