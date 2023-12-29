-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2020 at 02:37 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
-- There are totally 4 tables users,admin,votes,candidates_request
--


--
-- Users
--
create table users values(name varchar(128),regno varchar(128),email varchar(128),phoneno int,password varchar(128),gender varchar(128));


--
-- candidates_request
--
create table candidates_request values(name varchar(128),regno varchar(128),status varchar(128));

--
--votes
--
create table candidates_request values(name varchar(128),regno varchar(128),candidate_name varchar(128),candidate_regno varchar(128));

--
-- Dumping data for table `admin`
--
Create table admin values(id int,name varchar(128),email varchar(128),password varchar(128));
INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'gobi', 'example@gmail.com', '1234'),
(2, 'arul kumar', 'example@gmail.com', '1234');

