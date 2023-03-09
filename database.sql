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
USE musicdata;
-- 
-- CREATE TABLE
-- 
-- CREATE TABLE Advertises
-- 
CREATE TABLE `advertises`(
    `id_advertises` int PRIMARY KEY,
    `title` TEXT,
    `intro_image` TEXT,
    `background` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Topics
-- 
CREATE TABLE `topics`(
    `id_topics` int PRIMARY KEY,
    `name_topics` TEXT,
    `topic_image` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE categories
-- 
CREATE TABLE `categories`(
    `id_cate` int PRIMARY KEY,
    `name_cate` TEXT,
    `cate_image` TEXT,
    `id_topics` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE playlists
-- 
CREATE TABLE `playlists`(
    `id_playlist` int PRIMARY KEY,
    `name_playlist` TEXT,
    `playlist_image` TEXT,
    `create_at` DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE artists
-- 
CREATE TABLE `artists`(
    `id_artists` int PRIMARY KEY,
    `name_artists` TEXT,
    `picture` TEXT,
    `facebook` TEXT,
    `instagram` TEXT,
    `youtube` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE albums
-- 
CREATE TABLE `albums`(
    `id_alb` int PRIMARY KEY,
    `name_alb` TEXT,
    `id_artists` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE songs
-- 
CREATE TABLE `songs`(
    `id_songs` int PRIMARY KEY,
    `name_songs` TEXT,
    `duration` TIME,
    `release_date` DATE,
    `id_cate` int,
    `id_artists` int,
    `id_advertises` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE users
-- 
CREATE TABLE `users`(
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
-- CREATE TABLE playlists_songs
-- 
CREATE TABLE `playlists_songs`(
    `id_playlist_song` int PRIMARY KEY,
    `id_songs` int,
    `id_playlist` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- CREATE TABLE Admins
-- 
-- 
-- ADD FOREIGN KEY
-- 
-- FK for table categories
-- 
ALTER TABLE `categories`
ADD CONSTRAINT `FK_id_topics_Topics_categories` FOREIGN KEY (`id_topics`) REFERENCES Topics(`id_topics`);
-- 
-- FK for table albums
-- 
ALTER TABLE `albums`
ADD CONSTRAINT `FK_id_artist_albums_artists` FOREIGN KEY (`id_artists`) REFERENCES artists(`id_artists`);
-- 
-- FK for table songs
-- 
ALTER TABLE `songs`
ADD CONSTRAINT `FK_id_cate_songs_categories` FOREIGN KEY (`id_cate`) REFERENCES categories(`id_cate`);
ALTER TABLE `songs`
ADD CONSTRAINT `FK_id_artist_songs_artists` FOREIGN KEY (`id_artists`) REFERENCES artists(`id_artists`);
ALTER TABLE `songs`
ADD CONSTRAINT `FK_id_adver_songs_Advertises` FOREIGN KEY (`id_advertises`) REFERENCES Advertises(`id_advertises`);
-- 
-- FK for table playlists_songs
-- 
ALTER TABLE `playlists_songs`
ADD CONSTRAINT `FK_id_songs_playlists_songs` FOREIGN KEY (`id_songs`) REFERENCES songs(`id_songs`);
ALTER TABLE `playlists_songs`
ADD CONSTRAINT `FK_id_playlists_playlists_songs` FOREIGN KEY (`id_playlist`) REFERENCES playlists(`id_playlist`);
