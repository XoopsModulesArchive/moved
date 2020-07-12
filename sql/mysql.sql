CREATE TABLE moved_ref (
   id int(8) NOT NULL auto_increment,
   module varchar(56) default NULL,
   referer varchar(255) default NULL,
   agent varchar(255) default NULL,
   visit int(8) unsigned default '0',
   date int(11) unsigned NOT NULL default '',
   PRIMARY KEY (id)
);
