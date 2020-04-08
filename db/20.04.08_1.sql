ALTER TABLE `users`
ADD `role` int(11) unsigned NOT NULL DEFAULT '0' AFTER `id`;

UPDATE `users` SET
`role` = '3'
WHERE `id` = '1';

ALTER TABLE `pages`
CHANGE `meta_tags` `meta_keywords` text COLLATE 'utf8mb4_unicode_ci' NULL AFTER `meta_description`;

ALTER TABLE `pages`
CHANGE `data` `values` text COLLATE 'utf8mb4_unicode_ci' NULL AFTER `title`;