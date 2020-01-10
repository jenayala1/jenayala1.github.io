#
# Table structure for table 'user'
#

CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(100) default NULL,
  `lastname` varchar(100) default NULL,
  `login` varchar(100) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM;



#
# Dumping data for table 'user'
#

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES("1", "Jatinder", "Thind", "phpsense", "ba018360fc26e0cc2e929b8e071f052d");

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES('2', 'ivan', 'santana', 'isantana', 'md5(kj6057)');