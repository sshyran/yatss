
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP DATABASE if exists yatss ;
CREATE DATABASE  yatss  DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE  yatss ;


DROP TABLE IF EXISTS  address ;
CREATE TABLE IF NOT EXISTS  address  (
   id  int(5) NOT NULL auto_increment,
   address  varchar(30) NOT NULL,
   city  varchar(30) NOT NULL,
   state_id  varchar(2) NOT NULL,
   zip  int(5) NOT NULL,
  PRIMARY KEY  ( id ),
	key(state_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  admin_table ;
CREATE TABLE IF NOT EXISTS  admin_table  (
   user_id  int(5) NOT NULL,
  PRIMARY KEY  ( user_id )
) ENGINE=INNODB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS  config ;
CREATE TABLE IF NOT EXISTS  config  (
   id  int(5) NOT NULL auto_increment,
   basket_timer  int(15) NOT NULL,
   session_timeout  int(30) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  events ;
CREATE TABLE IF NOT EXISTS  events  (
   id  int(5) NOT NULL auto_increment,
   date  datetime NOT NULL,
   name  varchar(50) NOT NULL,
   address_id  int(5) NOT NULL,
	description text,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  transactions ;
CREATE TABLE IF NOT EXISTS  transactions  (
   id  int(5) NOT NULL auto_increment,
   order_id int(5) not null,
   event_id  int(5) NOT NULL,
   ticket_type_id int(5) not null,
   number_of_tickets  int(10)  NOT NULL,
   transaction_total int(10)  not null,
  PRIMARY KEY  ( id ),
  key(order_id),
  key(event_id),
  key (ticket_type_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS  ticket_price ;
CREATE TABLE IF NOT EXISTS  ticket_price  (
   id  int(5) NOT NULL auto_increment,
   event_id  int(5) NOT NULL,
   ticket_type_id int(5) not null,
   price  int(10) unsigned NOT NULL,
  PRIMARY KEY  ( id ),
  key(event_id),
  key (ticket_type_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS  orders ;
CREATE TABLE IF NOT EXISTS  orders  (
 id  int(5) NOT NULL auto_increment,
 date_of_order  timestamp NOT NULL default CURRENT_TIMESTAMP,
user_id  int(5) NOT NULL,
PRIMARY KEY  ( id ),
key(user_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS  ticket_type ;
CREATE TABLE IF NOT EXISTS  ticket_type  (
   id  int(5) NOT NULL auto_increment,
   type  varchar(15) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS  tickets ;
CREATE TABLE IF NOT EXISTS  tickets  (
  -- id  int(5) NOT NULL auto_increment,
   event_id  int(5) NOT NULL,
   ticket_type_id  int(5) NOT NULL,
   num_of_tickets  int(5) NOT NULL,
   available_tickets  int(5) NOT NULL,
  PRIMARY KEY  ( event_id, ticket_type_id ),
  key(ticket_type_id),
	key(event_id)
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


DROP TABLE IF EXISTS  us_states ;
CREATE TABLE IF NOT EXISTS  us_states  (
   id  varchar(2) NOT NULL,
   name  varchar(20) NOT NULL,
  PRIMARY KEY  ( id )
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- TODO: check start_of_transaction agains config.timer

DROP TABLE IF EXISTS  basket ;
CREATE TABLE IF NOT EXISTS  basket  (
 id  int(5) NOT NULL auto_increment,
 event_id  int(5) NOT NULL,
 user_id  int(5) NOT NULL,
 start_of_transaction  timestamp NOT NULL default CURRENT_TIMESTAMP,
 ticket_type_id int(5) not null,
 number_of_tickets  int(5) NOT NULL,
PRIMARY KEY  ( id ),
key(event_id),
key (user_id),
key (ticket_type_id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




alter table users add constraint user_address_fk foreign key(address_id) references address(id); 
alter table tickets add constraint ticket_tickettype_fk foreign key(ticket_type_id) references ticket_type(id); 
alter table ticket_price add constraint ticket_price_event_fk foreign key(event_id) references events(id); 
alter table orders add constraint orders_users_fk foreign key(user_id) references users(id); 
alter table admin_table add constraint user_admin_fk foreign key(user_id) references users(id); 
alter table events add constraint event_address_fk foreign key(address_id) references address(id); 
alter table tickets add constraint ticket_event_fk foreign key(event_id) references events(id); 
alter table address add constraint address_state_fk foreign key(state_id) references us_states(id); 
alter table ticket_price add constraint ticket_price_ticket_type_fk foreign key(ticket_type_id) references ticket_type(id); 
alter table transactions add constraint transactions_order_fk foreign key(order_id) references orders(id); 

INSERT INTO us_states (id, name) VALUES
('AL','Alabama'),('AK','Alaska'),('AZ','Arizona'),('AR','Arkansas'),('CA','California'),('CO','Colorado'),('CT','Connecticut'),('DE','Delaware'),('DC','District of Columbia'),('FL','Florida'),('GA','Georgia'),('HI','Hawaii'),('ID','Idaho'),('IL','Illinois'),('IN','Indiana'),('IA','Iowa'),('KS','Kansas'),('KY','Kentucky'),('LA','Louisiana'),('ME','Maine'),('MD','Maryland'),('MA','Massachusetts'),('MI','Michigan'),('MN','Minnesota'),('MS','Mississippi'),('MO','Missouri'),('MT','Montana'),('NE','Nebraska'),('NV','Nevada'),('NH','New Hampshire'),('NJ','New Jersey'),('NM','New Mexico'),('NY','New York'),('NC','North Carolina'),('ND','North Dakota'),('OH','Ohio'),('OK','Oklahoma'),('OR','Oregon'),('PA','Pennsylvania'),('RI','Rhode Island'),('SC','South Carolina'),('SD','South Dakota'),('TN','Tennessee'),('TX','Texas'),('UT','Utah'),('VT','Vermont'),('VA','Virginia'),('WA','Washington'),('WV','West Virginia'),('WI','Wisconsin'),('WY','Wyoming');


INSERT INTO address (address, city, state_id, zip) VALUES
('1 2nd street e', 'New Leipzig', 'nd', 58562),
('4th St SE', 'Sidney', 'Mt', 59270),
('19 Old Fulton St', 'Brooklyn', 'ny', 11201),
('1650 Colorado Blvd', 'Los Angeles', 'ca', 90041),
('901 F St NW', 'Washington', 'dc', 20004);

-- default password for user roll = 1

INSERT INTO users (id, username, password, address_id, firstName, middleName, lastName, email) VALUES
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'admin', '', 'sysadmin', 'xxx@xxx.com');
insert into admin_table (user_id) values (1);

INSERT INTO users (username, password, address_id, firstName, middleName, lastName, email) VALUES
('roll', '356a192b7913b04c54574d18c28d46e6395428ab', 2, 'roll', 'registered', 'user', 'yyy@xxx.com'),
('bush', '356a192b7913b04c54574d18c28d46e6395428ab', 3, 'george', 'monkey', 'bush', 'bob@texas.com'),
('bgates', '356a192b7913b04c54574d18c28d46e6395428ab', 4, 'bill', '', 'gates', 'bgates@microsoft.com'),
('jobs', '356a192b7913b04c54574d18c28d46e6395428ab', 5, 'Steve', '', 'jobs', 'jobs@mac.com');

drop view  if exists view_event_info;
CREATE VIEW  view_event_info  as
select e.id as event_id, e.name, description ,date, a.address, city, s.name as state, zip, 
	tt.type as ticket_type, available_tickets, tt.id as ticket_type_id, price
from events as e left join tickets as t on e.id=t.event_id
	left join ticket_type as tt on (tt.id=t.ticket_type_id and t.ticket_type_id=tt.id)
	left join address as a on (e.address_id=a.id)
	join us_states as s on (s.id=a.state_id)
	left join ticket_price as tp on (tp.event_id=e.id and tp.ticket_type_id=tt.id);


-- create events
INSERT INTO events (date, name, address_id, description) VALUES
('2008-07-09 19:00:00', 'Tuesdays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-10 19:00:00', 'Wednesdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-11 19:00:00', 'Thursdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-12 19:00:00', 'Fridays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-13 14:00:00', 'Saturdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-13 19:00:00', 'Saturdays eve event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-13 14:00:00', 'Sundays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-14 19:00:00', 'Tuesdays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-15 19:00:00', 'Wednesdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-16 19:00:00', 'Thursdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-17 19:00:00', 'Fridays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-18 14:00:00', 'Saturdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-19 19:00:00', 'Saturdays eve event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-20 14:00:00', 'Sundays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-21 19:00:00', 'Tuesdays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-22 19:00:00', 'Wednesdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-23 19:00:00', 'Thursdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-24 19:00:00', 'Fridays event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-25 14:00:00', 'Saturdays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-26 19:00:00', 'Saturdays eve event', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-07-27 14:00:00', 'Sundays event', 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
")
;

INSERT INTO ticket_type (id, type) VALUES
(1, 'premium'),(2, 'standard'),(3, 'unleaded');  

INSERT INTO ticket_price (event_id, ticket_type_id, price) VALUES
(1, 1, 20),(1, 2, 10),(2, 1, 20),(2, 2, 10),(3, 1, 20),(3, 2, 10),
(4, 1, 20),(4, 2, 10),(4, 3, 25),(5, 1, 20),(5, 2, 10),(6, 1, 20),
(6, 2, 10),(7, 1, 20),(7, 2, 10);


INSERT INTO tickets (event_id, ticket_type_id, num_of_tickets, available_tickets) VALUES
(1, 1, 5, 5),(1, 2, 5, 5),(2, 1, 5, 5),(2, 2, 5, 5),(3, 1, 5, 5),(3, 2, 5, 5),(4, 1, 5, 5),
(4, 2, 5, 5),(4, 3, 2, 2),(5, 1, 5, 5),(5, 2, 5, 5),(6, 1, 5, 5),(6, 2, 5, 5),(7, 1, 5, 5),(7, 2, 5, 5);


insert into config (basket_timer, session_timeout) values (600, 600);
	
drop view if exists view_purchase_history;
CREATE VIEW  view_purchase_history  as 
	select username, o.id as 'order number', o.date_of_order as 'order date', e.name as 'event name', date_format(date, '%Y-%m-%d %H:%i') as 'event date', tt.type as 'ticket type', t.transaction_total as 'transaction total'
	from transactions as t, orders as o, events as e, ticket_type as tt, users as u, ticket_price as tp
	where
		tt.id=t.ticket_type_id and 
		u.id=o.user_id and
		e.id=t.event_id and
		o.id = t.order_id and
		tp.event_id=e.id and tp.ticket_type_id=tt.id;

drop trigger if exists delete_invalid_transactions;
create trigger delete_invalid_transactions after delete on basket
	for each row 
		update tickets set available_tickets=available_tickets+old.number_of_tickets where old.event_id=event_id and old.ticket_type_id=ticket_type_id;

drop trigger if exists ticket_in_basket;
create trigger ticket_in_basket after insert on basket
	for each row
		update tickets set available_tickets=available_tickets-new.number_of_tickets where new.event_id=event_id and new.ticket_type_id=ticket_type_id;

drop trigger if exists add_to_transactions;
create trigger add_to_transaction after insert on transactions
	for each row
		update tickets set available_tickets=available_tickets-new.number_of_tickets where new.event_id=event_id and new.ticket_type_id=ticket_type_id;


create or replace view view_statistics as
	select 
			e.id, 
			e.name  as "event_name", date_format(e.date, '%Y-%m-%d %H:%i') as "date",
			sum(ifnull(tr.number_of_tickets,0))  as "tickets_sold", 
			sum(ifnull(t.available_tickets,0)+ifnull(b.number_of_tickets,0)) as "tickets_unsold" , 
			sum(ifnull(tr.transaction_total,0)) as "revenue"
		from events as e left join tickets as t on e.id=t.event_id 
			left join transactions as tr using (event_id, ticket_type_id)
			left join basket as b using(event_id, ticket_type_id)
		group by e.id
		
