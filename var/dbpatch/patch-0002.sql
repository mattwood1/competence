-- Create Category Table
CREATE TABLE `categories` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` text NOT NULL DEFAULT '',
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    `deleted_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
