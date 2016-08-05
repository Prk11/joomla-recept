CREATE TABLE IF NOT EXISTS `#__composition` )
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL DEFAULT 'Состав',
    `published` SMALLINT(5) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
} ENGINE=InnoDB DEFAULT CHARSER=utf8;

ALTER TABLE `#__ingredients_article`
    ADD COLUMN `composition_id` int(10) NOT NULL DEFAULT 1,
    ADD CONSTRAINT `fk_ingredients_article_composition_id` 
        FOREIGN KEY (`composition_id`) 
        REFERENCES `#__composition` (`id`)
        ON DELETE CASCADE;

ALTER TABLE `#__ingredients_basket`
    ADD COLUMN `user_session` VARCHAR(40),
    MODIFY COLUMN `user_id` int(10);

INSERT INTO `#__composition` (`id`) VALUES (1);