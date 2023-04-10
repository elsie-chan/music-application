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
CREATE DATABASE `music_data`;
USE `music_data`;
-- 
-- CREATE TABLE
--
-- 
-- CREATE TABLE Topics
-- 
CREATE TABLE `topics`(
    `id_topics` int PRIMARY KEY,
    `name_topics` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- 
-- CREATE TABLE playlists
-- 
CREATE TABLE `playlists`(
    `id_playlists` int PRIMARY KEY,
    `name_playlists` TEXT,
    `playlists_image` TEXT,
    `description` TEXT,
    `create_at` DATE,
    `id_users` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- 
-- CREATE TABLE artists
-- 
CREATE TABLE `artists`(
    `id_artists` int PRIMARY KEY,
    `name_artists` TEXT,
    `picture` TEXT,
    `birthday` DATE,
    `social_media` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- 
-- CREATE TABLE albums
-- 
CREATE TABLE `albums`(
    `id_albums` int PRIMARY KEY,
    `name_albums` TEXT,
    `image_albums` TEXT,
    `id_artists` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- 
-- CREATE TABLE songs
-- 
CREATE TABLE `songs`(
    `id_songs` int PRIMARY KEY,
    `name_songs` TEXT,
    `src` TEXT,
    `duration` TIME,
    `release_date` DATE,
    `id_artists` int,
    `id_albums` int,
    `id_topics` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- 
-- CREATE TABLE users
-- 
CREATE TABLE `users`(
    `id_users` int PRIMARY KEY,
    `avatar_users` TEXT,
    `username` TEXT,
    `email_users` TEXT,
    `pass_users` TEXT,
    `phone_users` TEXT,
    `role` INT,
    `token_users` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- INSERT ADMIN to Users
--
-- CREATE TABLE playlists_songs
--
CREATE TABLE `playlists_songs`(
    `id_playlists_songs` int PRIMARY KEY,
    `id_playlists` int,
    `id_songs` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users_artists`(
    `id_users_artists` int PRIMARY KEY,
    `id_users` int,
    `id_artists` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users_albums`(
    `id_users_albums` int PRIMARY KEY,
    `id_users` int,
    `id_albums` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ADD FOREIGN KEY
--
--
-- FK for table albums
--
ALTER TABLE `albums`
    ADD CONSTRAINT `FK_id_artist_albums_artists` FOREIGN KEY (`id_artists`) REFERENCES artists(`id_artists`);
--
-- FK for table songs
--
ALTER TABLE `songs`
    ADD CONSTRAINT `FK_id_artist_songs_artists` FOREIGN KEY (`id_artists`) REFERENCES artists(`id_artists`);
--
-- FK for table playlists
--
ALTER TABLE `playlists`
    ADD CONSTRAINT `FK_id_user_playlist_user` FOREIGN KEY (`id_users`) REFERENCES users(`id_users`);
--
-- FK for table playlists_songs
--
ALTER TABLE `playlists_songs`
    ADD CONSTRAINT `FK_id_songs_playlists_songs` FOREIGN KEY (`id_songs`) REFERENCES songs(`id_songs`);
ALTER TABLE `playlists_songs`
    ADD CONSTRAINT `FK_id_playlists_playlists_songs` FOREIGN KEY (`id_playlists`) REFERENCES playlists(`id_playlists`);

ALTER TABLE `users_artists`
    ADD CONSTRAINT `FK_id_users_users_artists` FOREIGN KEY (`id_users`) REFERENCES users(`id_users`);
ALTER TABLE `users_artists`
    ADD CONSTRAINT `FK_id_artists_users_artists` FOREIGN KEY (`id_artists`) REFERENCES artists(`id_artists`);

ALTER TABLE `users_albums`
    ADD CONSTRAINT `FK_id_users_users_albums` FOREIGN KEY (`id_users`) REFERENCES users(`id_users`);
ALTER TABLE `users_albums`
    ADD CONSTRAINT `FK_id_albums_users_albums` FOREIGN KEY (`id_albums`) REFERENCES albums(`id_albums`);

-- INSERT INTO TABLE
INSERT INTO `users` VALUE
    (1,'src/public/assets/imgs/avt_users.png','admin','admin@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',1,'3oi4hi34u59hewf'),
    (2,'src/public/assets/imgs/avt_users.png','baola','baola@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf');
INSERT INTO `artists` VALUES
                          (1, 'ns1', 'a', '1998-11-29', 'a'),
                          (2, 'ns2', 'a', '1998-11-29', 'a'),
                          (3, 'ns3', 'a', '1998-11-29', 'a');
INSERT INTO `albums` VALUES
                         (1,'alb1','a',1),
                         (2,'alb2','a',1),
                         (3,'alb3','a',1);
INSERT INTO `playlists` VALUES
                            (1,'playlist1','a','abcad','2023-4-9',1),
                            (2,'playlist2','a','abcad','2023-4-9',1),
                            (3,'playlist3','a','abcad','2023-4-9',1),
                            (4,'playlist4','a','abcad','2023-4-9',2),
                            (5,'playlist5','a','abcad','2023-4-9',2);
INSERT INTO `topics`VALUES
                    (1, 'US-UK'),
                    (2, 'V-pop'),
                    (3, 'Acoustic'),
                    (4, 'Rap'),
                    (5, 'K-pop'),
                    (6, 'Workout'),
                    (7, 'Meditation'),
                    (8, 'Motivation'),
                    (9, 'Indie');
INSERT INTO `songs` VALUES
                        (1,'tdtu song','src/public/assets/songs/tdtu.mp3','120','1995-4-9',1,1,1)