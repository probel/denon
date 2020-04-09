ALTER TABLE `pages` ADD `ordermenu` INT(11) NOT NULL DEFAULT '0' AFTER `id`;
UPDATE `products` SET `category_id` = 16;
