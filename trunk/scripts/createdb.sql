-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 27, 2008 at 06:08 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `yatss`
-- 
DROP DATABASE `yatss`;
CREATE DATABASE `yatss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yatss`;

-- --------------------------------------------------------

-- 
-- Table structure for table `address`
-- 

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(5) NOT NULL auto_increment,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `address`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `admin_table`
-- 

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `user_id` int(5) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin_table`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `config`
-- 

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(5) NOT NULL auto_increment,
  `timer` int(15) NOT NULL,
  `timeout` int(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `config`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `events`
-- 

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(5) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `name` varchar(30) NOT NULL,
  `address_id` int(5) NOT NULL,
  `number_of_tickets` int(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `events`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `purchases`
-- 

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(5) NOT NULL auto_increment,
  `event_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `number_of_tickets` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `purchases`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ticket_type`
-- 

DROP TABLE IF EXISTS `ticket_type`;
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `id` int(5) NOT NULL auto_increment,
  `type` varchar(15) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `ticket_type`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tickets`
-- 

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(5) NOT NULL auto_increment,
  `event_id` int(5) NOT NULL,
  `ticket_type_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tickets`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL auto_increment,
  `address_id` int(5) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_address_fk` (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 

