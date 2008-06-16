
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
   name  varchar(30) NOT NULL,
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


INSERT INTO address (id, address, city, state_id, zip) VALUES
(1, 'Leipzigstrasse', 'Sidney', 'MT', 04103);

-- default password for user roll = 1

INSERT INTO users (id, username, password, address_id, firstName, middleName, lastName, email) VALUES
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'admin', '', 'sysadmin', 'xxx@xxx.com');
insert into admin_table (user_id) values (1);

INSERT INTO users (id, username, password, address_id, firstName, middleName, lastName, email) VALUES
(2, 'roll', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 'registered', '', 'user', 'yyy@xxx.com');

-- drop view  if exists view_event_info;
-- CREATE VIEW  view_event_info  as 
-- 	select e.id as event_id, e.name, description ,date, a.address, city, s.name as state, zip, 
-- 		available_tickets, tt.id as ticket_type_id, tt.type as ticket_type, price
-- 	from events as e left join tickets as t on e.id=t.event_id
-- 	left join ticket_type as tt on (tt.id=t.ticket_type_id and t.ticket_type_id=tt.id), address as a, us_states as s, ticket_price as tp
-- 	where e.address_id = a.id and a.state_id = s.id and 
-- 	tp.event_id=e.id and tp.ticket_type_id=tt.id;

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
('2008-06-09 10:58:56', 'chris is doing pair programmin', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
"),
('2008-06-17 11:06:41', 'dxxxx', 1, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
");

INSERT INTO ticket_type (id, type) VALUES
(1, 'premium'),
(2, 'standard');  

INSERT INTO ticket_price (event_id, ticket_type_id, price) VALUES
(1, 1, 10),
(1, 2, 20);  


INSERT INTO tickets (event_id, ticket_type_id, num_of_tickets, available_tickets) VALUES
(1, 1, 10, 10),
(1, 2, 10, 10);


insert into config (basket_timer, session_timeout) values (600, 600);
	
drop view if exists view_purchase_history;
CREATE VIEW  view_purchase_history  as 
	select username, o.id as 'order number', o.date_of_order as 'order date', e.name as 'event name', date_format(date, 'Y-m-d H:i') as 'event date', tt.type as 'ticket type', t.transaction_total as 'transaction total'
	from transactions as t, orders as o, events as e, ticket_type as tt, users as u, ticket_price as tp
	where
		tt.id=t.ticket_type_id and 
		u.id=o.user_id and
		e.id=t.event_id and
		o.id = t.order_id and
		tp.event_id=e.id and tp.ticket_type_id=tt.id;

	
-- delete from basket where ticket_type_id=2
-- select id , start_of_transaction from basket where user_id = 1 and start_of_transaction < date_sub(CURRENT_TIMESTAMP, interval 600 second)

		
		
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




create procedure delete_from_basket(in basketid int(5), in userid int (5))
	delete from basket where id=basketid and user_id=userid;

create procedure reset_basket_timer(in userid int(5))
	update basket set start_of_transaction = CURRENT_TIMESTAMP where user_id = userid;


-- delimiter ;;
-- create procedure add_to_basket(in eventid int(5), in userid int(5), in tickettypeid int(5), in numoftickets int(5), out transactionid int(5))
-- begin
-- INSERT INTO basket (event_id, user_id, ticket_type_id, number_of_tickets) VALUES (eventid, userid, tickettypeid, numoftickets); 
-- select last_insert_id() into transactionid;
-- end;;

-- delimiter ;;
-- create procedure execute_purchase(in userid int(5), out orderid int(5))
-- begin
-- -- declare orderid int;
-- -- set orderid =0;
-- insert into orders (user_id) values(userid);
-- select last_insert_id() into orderid;
-- 
-- insert into transactions (order_id, event_id, ticket_type_id, number_of_tickets, transaction_total) 
-- 	select o.id, b.event_id, b.ticket_type_id, b.number_of_tickets, tp.price*b.number_of_tickets
-- 	from orders as o, basket as b, ticket_price as tp
-- 	where o.id=orderid and b.user_id=userid and b.event_id=tp.event_id and tp.ticket_type_id=b.ticket_type_id;
-- 	
-- delete from basket where user_id = userid;
-- 
-- end;;
-- 
-- call execute_purchase(1, @a);
-- 
-- 
-- 
-- lock tables orders write
-- insert into orders (user_id) values(1)
-- lock tables transactions write, orders read, basket read, ticket_price read
-- insert into transactions (order_id, event_id, ticket_type_id, number_of_tickets, transaction_total) select orders.id, basket.event_id, basket.ticket_type_id, basket.number_of_tickets, ticket_price.price*basket.number_of_tickets from orders, basket, ticket_price where orders.id=3 and basket.user_id=1 and basket.event_id=ticket_price.event_id and ticket_price.ticket_type_id=basket.ticket_type_id
-- lock tables basket write
-- delete from basket where user_id = 1
-- 
	
-- call reset_basket_timer(2);

-- select * from basket where user_id = 2 and 
-- call add_to_basket(1,1,1,2,@a);
-- call delete_from_basket(1);
-- $db->executeStoredProc("delete_from_basket",array(1));



-- select e.name, (num_of_tickets - available_tickets) as "tickets sold", available_tickets as "tickets unsold" from 
-- 	events as e, transactions as tr, tickets as t where 
-- 	   e.id = tr.event_id and e.id = t.event_id and t.ticket_type_id = tr.ticket_type_id;
