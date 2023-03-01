if exists (select * from sysdatabases where name = 'MusicData')
	drop database MusicData
create database MusicData
use MusicData
if exists (select * from sysobjects where name = 'Advertises')
	drop table Advertises
create table Advertises(
    id_advertises int PRIMARY KEY,
    title NVARCHAR(30),
    intro_image NVARCHAR(30),
    background NVARCHAR(30)
)
if exists (select * from sysobjects where name = 'Topics')
	drop table Topics
create table Topics(
    id_topics int PRIMARY KEY,
    name_topics NVARCHAR(30),
    topic_image NVARCHAR(30)
)
if exists (select * from sysobjects where name = 'Categories')
	drop table Categories
create table Categories(
    id_cate int PRIMARY KEY,
    name_cate NVARCHAR(30),
    cate_image NVARCHAR(30),
    id_topics int,
    FOREIGN KEY (id_topics) REFERENCES Topics(id_topics)
)
if exists (select * from sysobjects where name = 'Playlists')
	drop table Playlists
create table Playlists(
    id_playlist int PRIMARY KEY,
    name_playlist NVARCHAR(30),
    playlist_image NVARCHAR(30),
    create_at DATE
)
if exists (select * from sysobjects where name = 'Artists')
	drop table Artists
create table Artists(
    id_artists int PRIMARY KEY,
    bio NVARCHAR(30),
    name_artists NVARCHAR(30)
)
if exists (select * from sysobjects where name = 'Albums')
	drop table Albums
create table Albums(
    id_alb int PRIMARY KEY,
    name_alb NVARCHAR(30),
    id_artists int,
    FOREIGN KEY (id_artists) REFERENCES Artists(id_artists)
)
if exists (select * from sysobjects where name = 'Songs')
	drop table Songs
create table Songs(
    id_songs int PRIMARY KEY,
    name_songs NVARCHAR(30),
    duration TIME,
    release_date DATE,
    id_cate int,
    id_artists int,
    id_advertises int,
    FOREIGN KEY (id_cate) REFERENCES Categories(id_cate),
    FOREIGN KEY (id_artists) REFERENCES Artists(id_artists),
    FOREIGN KEY (id_advertises) REFERENCES Advertises(id_advertises)
)
if exists (select * from sysobjects where name = 'Users')
	drop table Users
create table Users(
    id_users int PRIMARY KEY,
    username NVARCHAR(30),
    email NVARCHAR(30),
    pass NVARCHAR(30),
    phone NVARCHAR(10),
    create_at DATE,
    id_songs int,
    FOREIGN KEY (id_songs) REFERENCES Songs(id_songs)
)
if exists (select * from sysobjects where name = 'Playlists_Songs')
	drop table Playlists_Songs
create table Playlists_Songs(
    id_playlist_song int PRIMARY KEY,
    id_songs int,
    id_playlist int,
    FOREIGN KEY (id_songs) REFERENCES Songs(id_songs),
    FOREIGN KEY (id_playlist) REFERENCES Playlists(id_playlist)
)