-- Create Questions Table
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `categoryid` INT NOT NULL,
  `type` text NOT NULL,
  `level` int(11) NOT NULL,
  `question` text NOT NULL,
  `answers` text NOT NULL,
  `version` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Versionable
CREATE TABLE IF NOT EXISTS `questions_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `categoryid` int(11) NOT NULL,
  `type` text NOT NULL,
  `level` int(11) NOT NULL,
  `question` text NOT NULL,
  `answers` text NOT NULL,
  `version` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE questions_version ADD FOREIGN KEY (id) REFERENCES questions(id) ON UPDATE CASCADE ON DELETE CASCADE;