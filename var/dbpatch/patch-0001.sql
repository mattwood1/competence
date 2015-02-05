-- Create Users Table
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    `firstname` varchar(50) NOT NULL DEFAULT '',
    `surname` varchar(50) NOT NULL DEFAULT '',
    `emailaddress` varchar(255) NOT NULL DEFAULT '',
    `password` char(128) NOT NULL DEFAULT '',
    `role` char(50) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`),
    KEY `email_address` (`email_address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
