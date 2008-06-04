
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP DATABASE  yatss ;
CREATE DATABASE  yatss  DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE  yatss ;


DROP TABLE IF EXISTS  address ;
CREATE TABLE IF NOT EXISTS  address  (
   id  int(5) NOT NULL auto_increment,
   address  varchar(30) NOT NULL,
   city  varchar(30) NOT NULL,
   state  varchar(30) NOT NULL,
   zip  int(5) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  admin_table ;
CREATE TABLE IF NOT EXISTS  admin_table  (
   user_id  int(5) NOT NULL,
  PRIMARY KEY  ( user_id )
) ENGINE=INNODB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS  config ;
CREATE TABLE IF NOT EXISTS  config  (
   id  int(5) NOT NULL auto_increment,
   timer  int(15) NOT NULL,
   timeout  int(30) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  events ;
CREATE TABLE IF NOT EXISTS  events  (
   id  int(5) NOT NULL auto_increment,
   date  datetime NOT NULL,
   name  varchar(30) NOT NULL,
   address_id  int(5) NOT NULL,
   number_of_tickets  int(50) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  purchases ;
CREATE TABLE IF NOT EXISTS  purchases  (
   id  int(5) NOT NULL auto_increment,
   event_id  int(5) NOT NULL,
   user_id  int(5) NOT NULL,
   date  datetime NOT NULL,
   number_of_tickets  int(10) NOT NULL,
  PRIMARY KEY  ( id ),
  key(event_id),
  key (user_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  ticket_type ;
CREATE TABLE IF NOT EXISTS  ticket_type  (
   id  int(5) NOT NULL auto_increment,
   type  varchar(15) NOT NULL,
   price  int(10) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS  tickets ;
CREATE TABLE IF NOT EXISTS  tickets  (
   id  int(5) NOT NULL auto_increment,
   event_id  int(5) NOT NULL,
   ticket_type_id  int(5) NOT NULL,
  PRIMARY KEY  ( id ),
  key(ticket_type_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS  users ;
CREATE TABLE IF NOT EXISTS  users  (
   id  int(5) NOT NULL auto_increment,
   username  varchar(30) NOT NULL,
   password  varchar(40) NOT NULL,
   address_id  int(5) NOT NULL,
   firstName  varchar(30) NOT NULL,
   middleName  varchar(30) NOT NULL,
   lastName  varchar(30) NOT NULL,
   email  varchar(30) NOT NULL,
  PRIMARY KEY  ( id ),
	key(address_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


alter table users add constraint user_address_fk foreign key(address_id) references address(id); 
alter table tickets add constraint ticket_tickettype_fk foreign key(ticket_type_id) references ticket_type(id); 
alter table purchases add constraint purchases_event_fk foreign key(event_id) references events(id); 
alter table purchases add constraint purchases_users_fk foreign key(user_id) references users(id); 
alter table admin_table add constraint user_admin_fk foreign key(user_id) references users(id); 
alter table events add constraint event_address_fk foreign key(address_id) references address(id); 
alter table tickets add constraint ticket_event_fk foreign key(event_id) references events(id); 



INSERT INTO address (id, address, city, state, zip) VALUES
(1, 'Montanastrasse', 'Leipzig', 'Sachsen', 04103);

-- default password for user roll = 1

INSERT INTO users (id, username, password, address_id, firstName, middleName, lastName, email) VALUES
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'admin', '', 'sysadmin', 'xxx@xxx.com');
