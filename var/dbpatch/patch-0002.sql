-- Create Category Table
CREATE TABLE `categories` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    `name` text NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
