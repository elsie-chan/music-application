-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: March 8 2023 at 23:59 P.M
-- Server version: 8.0.31
-- PHP Version: 8.1.6
create database MusicData
use MusicData
create table `Advertises`(
    `id_advertises` int PRIMARY KEY,
    `title` VARCHAR(30),
    `intro_image` VARCHAR(30),
    `background` VARCHAR(30)
)
create table `Topics`(
    `id_topics` int PRIMARY KEY,
    `name_topics` VARCHAR(30),
    `topic_image` VARCHAR(30)
)
create table `Categories`(
    `id_cate` int PRIMARY KEY,
    `name_cate` VARCHAR(30),
    `cate_image` VARCHAR(30),
    `id_topics` int,
    -- FOREIGN KEY (id_topics) REFERENCES Topics(id_topics)
)
create table `Playlists`(
    `id_playlist` int PRIMARY KEY,
    `name_playlist` VARCHAR(30),
    `playlist_image` VARCHAR(30),
    `create_at` DATE
)
create table `Artists`(
    `id_artists` int PRIMARY KEY,
    `bio` VARCHAR(30),
    `name_artists` VARCHAR(30)
)
create table `Albums`(
    `id_alb` int PRIMARY KEY,
    `name_alb` VARCHAR(30),
    `id_artists` int,
    -- FOREIGN KEY (id_artists) REFERENCES Artists(id_artists)
)
create table `Songs`(
    `id_songs` int PRIMARY KEY,
    `name_songs` VARCHAR(30),
    `duration` TIME,
    `release_date` DATE,
    `id_cate`int,
    `id_artists` int,
    `id_advertises` int,
    -- FOREIGN KEY (id_cate) REFERENCES Categories(id_cate),
    -- FOREIGN KEY (id_artists) REFERENCES Artists(id_artists),
    -- FOREIGN KEY (id_advertises) REFERENCES Advertises(id_advertises)
)
create table `Users`(
    `id_users` int PRIMARY KEY,
    `username` VARCHAR(30),
    `email` VARCHAR(30),
    `pass` VARCHAR(30),
    `phone` VARCHAR(10),
    `create_at` DATE,
    `id_songs` int DEFAULT NULL,
    -- FOREIGN KEY (id_songs) REFERENCES Songs(id_songs)
)
create table `Playlists_Songs`(
    `id_playlist_song` int PRIMARY KEY,
    `id_songs` int,
    `id_playlist` int,
    -- FOREIGN KEY (id_songs) REFERENCES Songs(id_songs),
    -- FOREIGN KEY (id_playlist) REFERENCES Playlists(id_playlist)
)
