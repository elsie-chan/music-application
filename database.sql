-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: March 8 2023 at 23:59 P.M
-- Server version: 8.0.31
-- PHP Version: 8.1.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- CREATE DATABASE
CREATE DATABASE MusicData;
USE MusicData;
-- 
-- CREATE TABLE
-- 
-- CREATE TABLE Advertises
-- 
CREATE TABLE `Advertises`(
    `id_advertises` int PRIMARY KEY,
    `title` TEXT,
    `intro_image` TEXT,
    `background` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Topics
-- 
CREATE TABLE `Topics`(
    `id_topics` int PRIMARY KEY,
    `name_topics` TEXT,
    `topic_image` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Categories
-- 
CREATE TABLE `Categories`(
    `id_cate` int PRIMARY KEY,
    `name_cate` TEXT,
    `cate_image` TEXT,
    `id_topics` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Playlists
-- 
CREATE TABLE `Playlists`(
    `id_playlist` int PRIMARY KEY,
    `name_playlist` TEXT,
    `playlist_image` TEXT,
    `create_at` DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Artists
-- 
CREATE TABLE `Artists`(
    `id_artists` int PRIMARY KEY,
    `name_artists` TEXT,
    `picture` TEXT,
    `facebook` TEXT,
    `instagram` TEXT,
    `youtube` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Albums
-- 
CREATE TABLE `Albums`(
    `id_alb` int PRIMARY KEY,
    `name_alb` TEXT,
    `id_artists` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Songs
-- 
CREATE TABLE `Songs`(
    `id_songs` int PRIMARY KEY,
    `name_songs` TEXT,
    `duration` TIME,
    `release_date` DATE,
    `id_cate` int,
    `id_artists` int,
    `id_advertises` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Users
-- 
CREATE TABLE `Users`(
    `id_users` int PRIMARY KEY,
    `username` TEXT,
    `email_users` TEXT,
    `pass_users` TEXT,
    `phone_users` TEXT,
    `create_at` DATE,
    `role` INT,
    `token_users` TEXT,
    `id_songs` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Playlists_Songs
-- 
CREATE TABLE `Playlists_Songs`(
    `id_playlist_song` int PRIMARY KEY,
    `id_songs` int,
    `id_playlist` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Admins
-- 
CREATE TABLE `Admins`(
    `id_admins` int PRIMARY KEY,
    `email_admins` TEXT,
    `pass_admins` TEXT,
    `token_admins` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- ADD FOREIGN KEY
-- 
-- FK for table Categories
-- 
ALTER TABLE `Categories`
ADD CONSTRAINT `FK_id_topics_Topics_Categories` FOREIGN KEY (`id_topics`) REFERENCES Topics(`id_topics`);
-- 
-- FK for table Albums
-- 
ALTER TABLE `Albums`
ADD CONSTRAINT `FK_id_artist_Albums_Artists` FOREIGN KEY (`id_artists`) REFERENCES Artists(`id_artists`);
-- 
-- FK for table Songs
-- 
ALTER TABLE `Songs`
ADD CONSTRAINT `FK_id_cate_Songs_Categories` FOREIGN KEY (`id_cate`) REFERENCES Categories(`id_cate`);
ALTER TABLE `Songs`
ADD CONSTRAINT `FK_id_artist_Songs_Artists` FOREIGN KEY (`id_artists`) REFERENCES Artists(`id_artists`);
ALTER TABLE `Songs`
ADD CONSTRAINT `FK_id_adver_Songs_Advertises` FOREIGN KEY (`id_advertises`) REFERENCES Advertises(`id_advertises`);
-- 
-- FK for table Playlists_Songs
-- 
ALTER TABLE `Playlists_Songs`
ADD CONSTRAINT `FK_id_songs_Playlists_Songs` FOREIGN KEY (`id_songs`) REFERENCES Songs(`id_songs`);
ALTER TABLE `Playlists_Songs`
ADD CONSTRAINT `FK_id_playlists_Playlists_Songs` FOREIGN KEY (`id_playlist`) REFERENCES Playlists(`id_playlist`);
