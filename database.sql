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
    `image_song` TEXT,
    `release_date` DATE,
    `id_artists` int,
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
    `id_playlists_songs` int PRIMARY KEY AUTO_INCREMENT,
    `id_playlists` int,
    `id_songs` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `albums_songs`(
    `id_albums_songs` int PRIMARY KEY AUTO_INCREMENT,
    `id_albums` int,
    `id_songs` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users_artists`(
    `id_users_artists` int PRIMARY KEY AUTO_INCREMENT,
    `id_users` int,
    `id_artists` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users_albums`(
    `id_users_albums` int PRIMARY KEY AUTO_INCREMENT,
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

ALTER TABLE `albums_songs`
    ADD CONSTRAINT `FK_id_songs_albums_songs` FOREIGN KEY (`id_songs`) REFERENCES songs(`id_songs`);
ALTER TABLE `albums_songs`
    ADD CONSTRAINT `FK_id_albums_albums_songs` FOREIGN KEY (`id_albums`) REFERENCES albums(`id_albums`);

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
    (1,'src/public/assets/imgs/avt_users.jpg','admin','admin@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',1,'3oi4hi34u59hewf'),
    (2,'src/public/assets/imgs/avt_users.jpg','baola','baola@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf'),
    (3,'src/public/assets/imgs/avt_users.jpg','trongdat','trongdat@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf'),
    (4,'src/public/assets/imgs/avt_users.jpg','lamnhu','lamnhu@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf'),
    (5,'src/public/assets/imgs/avt_users.jpg','minhthu','minhthu@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf'),
    (6,'src/public/assets/imgs/avt_users.jpg','hoangphuc','hoangphuc@gmail.com','$2y$10$/Jj4b/w.6RNRzD6eeuFKMeyoYgHASRhQyXkkyQnlviwXQZhw8nE6q','0928416379',0,'3oi4hi34u59hewf');

INSERT INTO `artists` VALUES
                          (1, 'Erik','src/public/assets/imgs/artists/erik.jpg', '1997-10-13', 'https://www.youtube.com/@ERIKOfficial/featured'),
                          (2, 'W/n', 'src/public/assets/imgs/artists/wn.jpg', '1998-10-03', 'https://www.youtube.com/@Winhmm/featured'),
                          (3, 'JVKE', 'src/public/assets/imgs/artists/jvke.jpg', '2001-3-3', 'https://www.youtube.com/@JVKE/featured'),
                          (4, 'RPT MCK', 'src/public/assets/imgs/artists/mck.jpg', '1999-3-2', 'https://www.youtube.com/@hoanglongmck/featured'),
                          (5, 'Travis Scott', 'src/public/assets/imgs/artists/travisscott.jpg', '1991-4-30', 'https://www.youtube.com/@TravisScottXX/featured'),
                          (6, 'The Weeknd', 'src/public/assets/imgs/artists/theweeknd.jpg', '1990-2-16', 'https://www.youtube.com/@TheWeeknd/featured'),
                          (7, 'Tlinh', 'src/public/assets/imgs/artists/tlinh.jpg', '2000-10-7', 'https://www.youtube.com/@tlinhofficial/featured'),
                          (8, 'Thịnh Suy', 'src/public/assets/imgs/artists/thinhsuy.jpg', '1999-10-18', 'https://www.youtube.com/@ThinhSuy/featured'),
                          (9, 'SZA', 'src/public/assets/imgs/artists/sza.jpg', '1989-11-8', 'https://www.youtube.com/@sza/featured'),
                          (10, 'FIFTY FIFTY', 'src/public/assets/imgs/artists/ff.jpg', '2016-8-8', 'https://www.youtube.com/@WE_FIFTYFIFTY/featured'),
                          (11, 'BTS', 'src/public/assets/imgs/artists/bts.jpg', '2013-6-12', 'https://www.youtube.com/@BTS/featured'),
                          (12, 'keshi', 'src/public/assets/imgs/artists/keshi.jpg', '1994-11-4', 'https://www.youtube.com/@keshibeats/featured'),
                          (13, 'slchld', 'src/public/assets/imgs/artists/slchld.jpg', '1996-2-1', 'https://www.youtube.com/@slchldmusic/featured'),
                          (14, 'frad', 'src/public/assets/imgs/artists/frad.jpg', '2018-11-29', 'https://www.youtube.com/@fradfrad/featured'),
                          (15, 'Joji', 'src/public/assets/imgs/artists/joji.jpg', '1992-9-18', 'https://www.youtube.com/@joji/featured'),
                          (16, 'bbno$', 'src/public/assets/imgs/artists/bbno$.jpg', '1995-6-30', 'https://www.youtube.com/@bbnomoney/featured'),
                          (17, 'Ngọt', 'src/public/assets/imgs/artists/ngot.jpg', '2013-11-29', 'https://www.youtube.com/@Ngotband/featured'),
                          (18, 'YOASOBI', 'src/public/assets/imgs/artists/yoasobi.jpg', '2018-11-17', 'https://www.youtube.com/@Ayase_YOASOBI/featured'),
                          (19, 'BIG BANG', 'src/public/assets/imgs/artists/bigbang.jpg', '2006-9-23', 'https://www.youtube.com/@BIGBANG/featured'),
                          (20, 'Hoàng Dũng', 'src/public/assets/imgs/artists/hoangdung.jpg', '1995-11-4', 'https://www.youtube.com/@HoangDung_Official/featured');

INSERT INTO `albums` VALUES
                         (1,'Erik Radio','src/public/assets/imgs/img_albums/erikradio.jpg',1),
                         (2,'This is Erik','src/public/assets/imgs/img_albums/thisiserik.jpg',1),
                         (3,'W/n Radio','src/public/assets/imgs/img_albums/wnradio.jpg',2),
                         (4,'3 1 0 7','src/public/assets/imgs/img_albums/3107.jpg',2),
                         (5,'JVKE Radio','src/public/assets/imgs/img_albums/jvkeradio.jpg',3),
                         (6,'this is what ___ feels like','src/public/assets/imgs/img_albums/thisiswhatfeelslike.jpg',3),
                         (7,'MCK Radio','src/public/assets/imgs/img_albums/mckradio.jpg',4),
                         (8,'99%','src/public/assets/imgs/img_albums/99percent.jpg',4),
                         (9,'Travis Scott Radio','src/public/assets/imgs/img_albums/travisscottradio.jpg',5),
                         (10,'ASTROWORLD','src/public/assets/imgs/img_albums/astroworld.jpg',5),
                         (11,'The Weeknd Radio','src/public/assets/imgs/img_albums/theweekndradio.jpg',6),
                         (12,'Starboy','src/public/assets/imgs/img_albums/starboy.jpg',6),
                         (13,'Tlinh Radio','src/public/assets/imgs/img_albums/tlinhradio.jpg',7),
                         (14,'nếu lúc đó','src/public/assets/imgs/img_albums/neulucdo.jpg',7),
                         (15,'Thịnh Suy Radio','src/public/assets/imgs/img_albums/thinhsuyradio.jpg',8),
                         (16,'tiny things','src/public/assets/imgs/img_albums/tinythings.jpg',8),
                         (17,'SZA Radio','src/public/assets/imgs/img_albums/szaradio.jpg',9),
                         (18,'SOS','src/public/assets/imgs/img_albums/sos.jpg',9),
                         (19,'THE FIFTY','src/public/assets/imgs/img_albums/thefifty.jpg',10),
                         (20,'The Beginning: Cupid','src/public/assets/imgs/img_albums/thebeginningcupid.jpg',10),
                         (21,'BE','src/public/assets/imgs/img_albums/be.jpg',11),
                         (22,'MAP OF THE SOUL: PERSONA','src/public/assets/imgs/img_albums/mapofthesoulpersona.jpg',11),
                         (23,'GABRIEL','src/public/assets/imgs/img_albums/gabriel.jpg',12),
                         (24,'always','src/public/assets/imgs/img_albums/always.jpg',12),
                         (25,'headaches','src/public/assets/imgs/img_albums/headaches.jpg',13),
                         (26,'my insecurities, not yours','src/public/assets/imgs/img_albums/myinsecuritiesnotyours.jpg',13),
                         (27,'First Date','src/public/assets/imgs/img_albums/firstdate.jpg',14),
                         (28,'late night','src/public/assets/imgs/img_albums/latenight.jpg',14),
                         (29,'SMITHEREENS','src/public/assets/imgs/img_albums/smithereens.jpg',15),
                         (30,'BALLADS','src/public/assets/imgs/img_albums/ballads.jpg',15),
                         (31,'edaname','src/public/assets/imgs/img_albums/edaname.jpg',16),
                         (32,'bag or die','src/public/assets/imgs/img_albums/bagordie.jpg',16),
                         (33,'Thấy Chưa','src/public/assets/imgs/img_albums/thaychua.jpg',17),
                         (34,'Gieo','src/public/assets/imgs/img_albums/gieo.jpg',17),
                         (35,'THE BOOK','src/public/assets/imgs/img_albums/thebook.jpg',18),
                         (36,'YOASOBI Radio','src/public/assets/imgs/img_albums/yoasobiradio.jpg',18),
                         (37,'ALIVE','src/public/assets/imgs/img_albums/alive.jpg',19),
                         (38,'Still Life','src/public/assets/imgs/img_albums/stilllife.jpg',19),
                         (39,'Khi Em Lớn','src/public/assets/imgs/img_albums/khiemlon.jpg',20),
                         (40,'25','src/public/assets/imgs/img_albums/25.jpg',20);

INSERT INTO `playlists` VALUES
                            (1,'like songs','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',2),
                            (2,'like songs','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',3),
                            (3,'like songs','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',4),
                            (4,'like songs','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',5),
                            (5,'like songs','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',6),
                            (6,'Top 100','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',1),
                            (7,'US-UK Hits','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',1),
                            (8,'Indie Hits','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',1),
                            (9,'Rock Band','src/public/assets/imgs/like_songs.jpg','abcad','2023-4-9',1);
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
                    (1,'Chạy Về Khóc Với Anh','src/public/assets/songs/chayvekhocvoianh.mp3','src/public/assets/imgs/img_songs/chayvekhocvoianh.jpg',CURRENT_TIMESTAMP(),1,2),
                    (2,'Ghen','src/public/assets/songs/ghen.mp3','src/public/assets/imgs/img_songs/ghen.jpg',CURRENT_TIMESTAMP(),1,2),
                    (3,'Em Không Sai Chúng Ta Sai','src/public/assets/songs/emkhongsaichungtasai.mp3','src/public/assets/imgs/img_songs/emkhongsaichungtasai.jpg',CURRENT_TIMESTAMP(),1,2),
                    (4,'Chạm Đáy Nỗi Đau','src/public/assets/songs/chamdaynoidau.mp3','src/public/assets/imgs/img_songs/chamdaynoidau.jpg',CURRENT_TIMESTAMP(),1,2),
                    (5,'Sau Tất Cả','src/public/assets/songs/sautatca.mp3','src/public/assets/imgs/img_songs/sautatca.jpg',CURRENT_TIMESTAMP(),1,2),
                    (6,'3 1 0 7','src/public/assets/songs/3107.mp3','src/public/assets/imgs/img_songs/3107.jpg',CURRENT_TIMESTAMP(),2,9),
                    (7,'3 1 0 7 2','src/public/assets/songs/31072.mp3','src/public/assets/imgs/img_songs/31072.jpg',CURRENT_TIMESTAMP(),2,9),
                    (8,'3 1 0 7 3','src/public/assets/songs/31073.mp3','src/public/assets/imgs/img_songs/31073.jpg',CURRENT_TIMESTAMP(),2,9),
                    (9,'3 1 0 7 4','src/public/assets/songs/31074.mp3','src/public/assets/imgs/img_songs/31074.jpg',CURRENT_TIMESTAMP(),2,9),
                    (10,'3 1 0 7 7','src/public/assets/songs/31077.mp3','src/public/assets/imgs/img_songs/31077.jpg',CURRENT_TIMESTAMP(),2,9),
                    (11,'Im not okay','src/public/assets/songs/imnotokay.mp3','src/public/assets/imgs/img_songs/imnotokay.jpg',CURRENT_TIMESTAMP(),3,1),
                    (12,'Golden Hour','src/public/assets/songs/goldenhour.mp3','src/public/assets/imgs/img_songs/goldenhour.jpg',CURRENT_TIMESTAMP(),3,1),
                    (13,'This is what heartbreak feels like','src/public/assets/songs/thisiswhatheartbreakfeelslike.mp3','src/public/assets/imgs/img_songs/tiwfilfl.jpg',CURRENT_TIMESTAMP(),3,1),
                    (14,'This is what losing someone feels like','src/public/assets/songs/thisiswhatlosingsomeonefeels.mp3','src/public/assets/imgs/img_songs/tiwfilfl.jpg',CURRENT_TIMESTAMP(),3,1),
                    (15,'This is what falling in love feels like','src/public/assets/songs/thisiswhatfallinginlovefeelslike.mp3','src/public/assets/imgs/img_songs/tiwfilfl.jpg',CURRENT_TIMESTAMP(),3,1),
                    (16,'Anh Đã Ổn Hơn','src/public/assets/songs/anhondahon.mp3','src/public/assets/imgs/img_songs/99percent.jpg',CURRENT_TIMESTAMP(),4,4),
                    (17,'Show Me Love','src/public/assets/songs/showmelove.mp3','src/public/assets/imgs/img_songs/99percent.jpg',CURRENT_TIMESTAMP(),4,4),
                    (18,'Thờ Er','src/public/assets/songs/thoer.mp3','src/public/assets/imgs/img_songs/99percent.jpg',CURRENT_TIMESTAMP(),4,4),
                    (19,'Thôi Em Đừng Đi','src/public/assets/songs/thoiemdungdi.mp3','src/public/assets/imgs/img_songs/99percent.jpg',CURRENT_TIMESTAMP(),4,4),
                    (20,'Suit & Tie','src/public/assets/songs/suittie.mp3','src/public/assets/imgs/img_songs/99percent.jpg',CURRENT_TIMESTAMP(),4,4),
                    (21,'Trance','src/public/assets/songs/trance.mp3','src/public/assets/imgs/img_songs/trance.jpg',CURRENT_TIMESTAMP(),5,4),
                    (22,'SICKO MODE','src/public/assets/songs/sickomode.mp3','src/public/assets/imgs/img_songs/sickomode.jpg',CURRENT_TIMESTAMP(),5,4),
                    (23,'HIGHEST IN THE ROOM','src/public/assets/songs/highestintheroom.mp3','src/public/assets/imgs/img_songs/highestintheroom.jpg',CURRENT_TIMESTAMP(),5,4),
                    (24,'Fair Trade','src/public/assets/songs/fairtrade.mp3','src/public/assets/imgs/img_songs/fairtrade.jpg',CURRENT_TIMESTAMP(),5,4),
                    (25,'goosebumps','src/public/assets/songs/goosebumps.mp3','src/public/assets/imgs/img_songs/goosebumps.jpg',CURRENT_TIMESTAMP(),5,4),
                    (26,'The Hills','src/public/assets/songs/thehills.mp3','src/public/assets/imgs/img_songs/thehills.jpg',CURRENT_TIMESTAMP(),6,7),
                    (27,'Starboy','src/public/assets/songs/starboy.mp3','src/public/assets/imgs/img_songs/starboy.jpg',CURRENT_TIMESTAMP(),6,7),
                    (28,'Die For You','src/public/assets/songs/dieforyou-theweeknd.mp3','src/public/assets/imgs/img_songs/dieforyou-theweeknd.jpg',CURRENT_TIMESTAMP(),6,7),
                    (29,'Creepin','src/public/assets/songs/creepin.mp3','src/public/assets/imgs/img_songs/creepin.jpg',CURRENT_TIMESTAMP(),6,7),
                    (30,'Blinding Lights','src/public/assets/songs/blindinglights.mp3','src/public/assets/imgs/img_songs/blindinglights.png',CURRENT_TIMESTAMP(),6,7),
                    (31,'Gái Độc Thân','src/public/assets/songs/gaidocthan.mp3','src/public/assets/imgs/img_songs/gaidocthan.jpg',CURRENT_TIMESTAMP(),7,6),
                    (32,'Nếu Lúc Đó','src/public/assets/songs/neulucdo.mp3','src/public/assets/imgs/img_songs/neulucdo.jpg',CURRENT_TIMESTAMP(),7,6),
                    (33,'Rebound','src/public/assets/songs/rebound.mp3','src/public/assets/imgs/img_songs/rebound.jpg',CURRENT_TIMESTAMP(),7,6),
                    (34,'Em Là Châu Báu','src/public/assets/songs/emlachaubau.mp3','src/public/assets/imgs/img_songs/emlachaubau.jpg',CURRENT_TIMESTAMP(),7,6),
                    (35,'Thích Quá Rùi Nà','src/public/assets/songs/thichquaruina.mp3','src/public/assets/imgs/img_songs/thichquaruina.jpg',CURRENT_TIMESTAMP(),7,6),
                    (36,'Tiny Love','src/public/assets/songs/thichquaruina.mp3','src/public/assets/imgs/img_songs/tinylove.jpg',CURRENT_TIMESTAMP(),8,9),
                    (37,'Chết Trong Em','src/public/assets/songs/thichquaruina.mp3','src/public/assets/imgs/img_songs/chettrongem.jpg',CURRENT_TIMESTAMP(),8,9),
                    (38,'Một Đêm Say','src/public/assets/songs/thichquaruina.mp3','src/public/assets/imgs/img_songs/motdemsay.jpg',CURRENT_TIMESTAMP(),8,9),
                    (39,'Thắc Mắc','src/public/assets/songs/thacmac.mp3','src/public/assets/imgs/img_songs/thacmac.jpg',CURRENT_TIMESTAMP(),8,9),
                    (40,'Tình Yêu Xanh Lá','src/public/assets/songs/tinhyeuxanhla.mp3','src/public/assets/imgs/img_songs/tinhyeuxanhla.jpg',CURRENT_TIMESTAMP(),8,9),
                    (41,'Kill Bill','src/public/assets/songs/killbill.mp3','src/public/assets/imgs/img_songs/killbill.jpg',CURRENT_TIMESTAMP(),9,4),
                    (42,'Open Arms','src/public/assets/songs/openarms.mp3','src/public/assets/imgs/img_songs/openarms.jpg',CURRENT_TIMESTAMP(),9,4),
                    (43,'Kiss Me More','src/public/assets/songs/kissmemore.mp3','src/public/assets/imgs/img_songs/kissmemore.jpg',CURRENT_TIMESTAMP(),9,4),
                    (44,'Good Days','src/public/assets/songs/gooddays.mp3','src/public/assets/imgs/img_songs/gooddays.jpg',CURRENT_TIMESTAMP(),9,4),
                    (45,'I Hate U','src/public/assets/songs/ihateu.mp3','src/public/assets/imgs/img_songs/ihateu.jpg',CURRENT_TIMESTAMP(),9,4),
                    (46, 'Cupid', 'src/public/assets/songs/cupid.mp3','src/public/assets/imgs/img_songs/cupid.jpeg', CURRENT_TIMESTAMP(), 10, 7),
                    (47, 'On','src/public/assets/songs/on.mp3','src/public/assets/imgs/img_songs/on.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (48, 'Dynamite','src/public/assets/songs/dynamite.mp3','src/public/assets/imgs/img_songs/dynamite.png', CURRENT_TIMESTAMP(), 11, 5),
                    (49, 'Life Gose On','src/public/assets/songs/lifegoseon.mp3','src/public/assets/imgs/img_songs/lifegoseon.png', CURRENT_TIMESTAMP(), 11, 5),
                    (50, 'Fake Love', 'src/public/assets/songs/fakelove.mp3','src/public/assets/imgs/img_songs/fakelove.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (51, 'Boy With Luv','src/public/assets/songs/boywithluv.mp3','src/public/assets/imgs/img_songs/boywithluv.jpg', CURRENT_TIMESTAMP(), 11, 5),
                    (52, 'I Need U', 'src/public/assets/songs/ineedu.mp3', 'src/public/assets/imgs/img_songs/saveme.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (53, 'Save Me', 'src/public/assets/songs/saveme.mp3', 'src/public/assets/imgs/img_songs/saveme.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (54, 'Fire','src/public/assets/songs/fire.mp3', 'src/public/assets/imgs/img_songs/saveme.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (55, 'DNA','src/public/assets/songs/dna.mp3', 'src/public/assets/imgs/img_songs/dna.jpeg', CURRENT_TIMESTAMP(), 11, 5),
                    (56, 'LIMBO', 'src/public/assets/songs/limbo.mp3', 'src/public/assets/imgs/img_songs/keshi.jpeg', CURRENT_TIMESTAMP(), 12, 8),
                    (57, 'Its You', 'src/public/assets/songs/ityou.mp3', 'src/public/assets/imgs/img_songs/ityou.jpeg', CURRENT_TIMESTAMP(), 12, 8),
                    (58, 'Drunk', 'src/public/assets/songs/drunk.mp3', 'src/public/assets/imgs/img_songs/drunk.jpeg', CURRENT_TIMESTAMP(), 12, 8),
                    (59, 'Beside You', 'src/public/assets/songs/besideyou.mp3', 'src/public/assets/imgs/img_songs/besideyou.jpeg', CURRENT_TIMESTAMP(), 12, 8),
                    (60, 'Blue', 'src/public/assets/songs/blue.mp3', 'src/public/assets/imgs/img_songs/blue.jpeg', CURRENT_TIMESTAMP(), 12, 8),
                    (61, 'Headaches', 'src/public/assets/songs/headaches.mp3', 'src/public/assets/imgs/img_songs/headaches.jpeg', CURRENT_TIMESTAMP(), 13, 8),
                    (62, 'Almost', 'src/public/assets/songs/almost.mp3', 'src/public/assets/imgs/img_songs/almost.jpeg', CURRENT_TIMESTAMP(), 13, 8),
                    (63, 'You Wont Be There For Me', 'src/public/assets/songs/youwontbethereforme.mp3', 'src/public/assets/imgs/img_songs/youwontbethereforme.jpg', CURRENT_TIMESTAMP(), 13, 8),
                    (64, 'She Likes Spring, I Prefer Winter', 'src/public/assets/songs/shelikespring.mp3', 'src/public/assets/imgs/img_songs/shelikespring.png', CURRENT_TIMESTAMP(), 13, 8),
                    (65, 'Say Whats On Your Mind', 'src/public/assets/songs/saywhat.mp3', 'src/public/assets/imgs/img_songs/saywhat.jpeg', CURRENT_TIMESTAMP(), 13, 8),
                    (66, 'First Date', 'src/public/assets/songs/firstdate.mp3', 'src/public/assets/imgs/img_songs/firstdate.jpeg', CURRENT_TIMESTAMP(), 14, 7),
                    (67, 'Luv Letters','src/public/assets/songs/luvletters.mp3', 'src/public/assets/imgs/img_songs/luvletters.jpeg', CURRENT_TIMESTAMP(), 14, 7),
                    (68, 'The Time We Spent', 'src/public/assets/songs/thetimewespent.mp3', 'src/public/assets/imgs/img_songs/thetimewespent.jpeg', CURRENT_TIMESTAMP(), 14, 7),
                    (69, 'The Girl I Have A Crush', 'src/public/assets/songs/thegirlihaveacrush.mp3', 'src/public/assets/imgs/img_songs/thegirlihaveacrush.jpeg', CURRENT_TIMESTAMP(), 14, 7),
                    (70, 'While You Were Away', 'src/public/assets/songs/whileyouwereaway.mp3', 'src/public/assets/imgs/img_songs/whileyouwereaway.jpeg', CURRENT_TIMESTAMP(), 14, 7),
                    (71, 'Glimpse Of Us', 'src/public/assets/songs/glimpseofus.mp3', 'src/public/assets/imgs/img_songs/glimpseofus.jpeg', CURRENT_TIMESTAMP(), 15, 1),
                    (72, 'Slow Dancing In The Dark', 'src/public/assets/songs/slowdancing.mp3', 'src/public/assets/imgs/img_songs/slowdancing.jpeg', CURRENT_TIMESTAMP(), 15, 1),
                    (73, 'Die For You', 'src/public/assets/songs/dieforyou.mp3', 'src/public/assets/imgs/img_songs/dieforyou.png', CURRENT_TIMESTAMP(), 15, 1),
                    (74, 'Sanctuary', 'src/public/assets/songs/sanctuary.mp3', 'src/public/assets/imgs/img_songs/sanctuary.jpeg', CURRENT_TIMESTAMP(), 15, 1),
                    (75, 'Like You Do', 'src/public/assets/songs/likeyoudo.mp3', 'src/public/assets/imgs/img_songs/sanctuary.jpeg', CURRENT_TIMESTAMP(), 15, 1),
                    (76, 'Edamame', 'src/public/assets/songs/edamame.mp3', 'src/public/assets/imgs/img_songs/edamame.jpeg', CURRENT_TIMESTAMP(), 16, 1),
                    (77, 'Lalala', 'src/public/assets/songs/lalala.mp3', 'src/public/assets/imgs/img_songs/lalala.jpeg', CURRENT_TIMESTAMP(), 16, 1),
                    (78, 'Piccolo', 'src/public/assets/songs/piccolo.mp3', 'src/public/assets/imgs/img_songs/piccolo.jpeg', CURRENT_TIMESTAMP(), 16, 1),
                    (79, 'Top Gun', 'src/public/assets/songs/topgun.mp3', 'src/public/assets/imgs/img_songs/topgun.jpeg', CURRENT_TIMESTAMP(), 16, 1),
                    (80, 'I See London I See France', 'src/public/assets/songs/iseelondon.mp3', 'src/public/assets/imgs/img_songs/iseelondon.jpeg', CURRENT_TIMESTAMP(), 16, 1),
                    (81, 'Lần Cuối', 'src/public/assets/songs/lancuoi.mp3', 'src/public/assets/imgs/img_songs/lancuoi.jpeg', CURRENT_TIMESTAMP(), 17, 3),
                    (82, 'Thấy Chưa', 'src/public/assets/songs/thaychua.mp3', 'src/public/assets/imgs/img_songs/thaychua.jpeg', CURRENT_TIMESTAMP(), 17, 3),
                    (83, 'Mất Tích', 'src/public/assets/songs/mattich.mp3', 'src/public/assets/imgs/img_songs/mattich.jpeg', CURRENT_TIMESTAMP(), 17, 3),
                    (84, 'Để Quên', 'src/public/assets/songs/dequen.mp3', 'src/public/assets/imgs/img_songs/dequen.jpeg', CURRENT_TIMESTAMP(), 17, 3),
                    (85, 'Mấy Khi', 'src/public/assets/songs/maykhi.mp3', 'src/public/assets/imgs/img_songs/maykhi.jpeg', CURRENT_TIMESTAMP(), 17, 3),
                    (86, 'Racing Into The Night', 'src/public/assets/song/racinginto.mp3', 'src/public/assets/imgs/img_songs/racinginto.jpeg', CURRENT_TIMESTAMP(), 18, 3),
                    (87, 'Tabun', 'src/public/assets/song/tabun.mp3', 'src/public/assets/imgs/img_songs/tabun.jpeg', CURRENT_TIMESTAMP(), 18, 3),
                    (88, 'Gunjou', 'src/public/assets/songs/gunjou.mp3', 'src/public/assets/imgs/img_songs/gunjou.png', CURRENT_TIMESTAMP(), 18, 3),
                    (89, 'Monster', 'src/public/assets/songs/monster.mp3', 'src/public/assets/imgs/img_songs/monster.jpeg', CURRENT_TIMESTAMP(), 18, 3),
                    (90, 'Adventure', 'src/public/assets/songs/adventure.mp3', 'src/public/assets/imgs/img_songs/adventure.png', CURRENT_TIMESTAMP(), 18, 3),
                    (91, 'Loser', 'src/public/assets/songs/loser.mp3', 'src/public/assets/imgs/img_songs/loser.jpeg',CURRENT_TIMESTAMP(), 19, 5),
                    (92, 'Haru Haru', 'src/public/assets/songs/haruharu.mp3', 'src/public/assets/imgs/img_songs/haruharu.jpeg', CURRENT_TIMESTAMP(), 19, 5),
                    (93, 'Bang Bang Bang', 'src/public/assets/songs/bangbangbang.mp3', 'src/public/assets/imgs/img_songs/bangbangbang.jpeg', CURRENT_TIMESTAMP(), 19, 5),
                    (94, 'Fantastic Baby', 'src/public/assets/songs/fantasticbaby.mp3', 'src/public/assets/imgs/img_songs/fantasticbaby.jpeg', CURRENT_TIMESTAMP(), 19, 5),
                    (95, 'Still Life', 'src/public/assets/songs/stilllife.mp3', 'src/public/assets/imgs/img_songs/stilllife.jpeg', CURRENT_TIMESTAMP(), 19, 5),
                    (96, 'Đôi Lời', 'src/public/assets/songs/doiloi.mp3', 'src/public/assets/imgs/img_songs/doiloi.jpeg', CURRENT_TIMESTAMP(), 20, 2),
                    (97, 'Nàng Thơ', 'src/public/assets/songs/nangtho.mp3', 'src/public/assets/imgs/img_songs/nangtho.jpeg', CURRENT_TIMESTAMP(), 20, 2),
                    (98, 'Thói Quen', 'src/public/assets/songs/thoiquen.mp3', 'src/public/assets/imgs/img_songs/thoiquen.jpeg', CURRENT_TIMESTAMP(), 20, 2),
                    (99, 'Đoạn Kết Mới', 'src/public/assets/songs/doanketmoi.mp3', 'src/public/assets/imgs/img_songs/doanketmoi.jpeg', CURRENT_TIMESTAMP(), 20, 2),
                    (100, 'Tôi Là Ai Trong Em', 'src/public/assets/songs/toilaaitrongem.mp3', 'src/public/assets/imgs/img_songs/toilaaitrongem.jpeg', CURRENT_TIMESTAMP(), 20, 2);

INSERT INTO `albums_songs` (`id_albums`,`id_songs`) VALUES
                   (1,1),(1,2),(1,3),
                   (2,4),(2,5),
                   (3,6),(3,7),(3,8),
                   (4,9),(4,10),
                   (5,11),(5,12),(5,13),
                   (6,14),(6,15),
                   (7,16),(7,17),(7,18),
                   (8,19),(8,20),
                   (9,21),(9,22),(9,23),
                   (10,24),(10,25),
                   (11,26),(11,27),(11,28),
                   (12,29),(12,30),
                   (13,31),(13,32),(13,33),
                   (14,34),(14,35),
                   (15,36),(15,37),(15,38),
                   (16,39),(16,40),
                   (17,41),(17,42),(17,43),
                   (18,44),(18,45),
                   (19,46),(19,47),(19,48),
                   (20,49),(20,50),
                   (21,51),(21,52),(21,53),
                   (22,54),(22,55),
                   (23,56),(23,57),(23,58),
                   (24,59),(24,60),
                   (25,61),(25,62),(25,63),
                   (26,64),(26,65),
                   (27,66),(27,67),(27,68),
                   (28,69),(28,70),
                   (29,71),(29,72),(29,73),
                   (30,74),(30,75),
                   (31,76),(31,77),(31,78),
                   (32,79),(32,80),
                   (33,81),(33,82),(33,83),
                   (34,84),(34,85),
                   (35,86),(35,87),(35,88),
                   (36,89),(36,90),
                   (37,91),(37,92),(37,93),
                   (38,94),(38,95),
                   (39,96),(39,97),(39,98),
                   (40,99),(40,100);
INSERT INTO `playlists_songs` (`id_playlists`,`id_songs`) VALUES
                      (6, 46), (6, 62), (6, 26), (6, 64), (6, 5), (6, 1), (6, 41), (6, 12),
                      (6, 87), (6, 35), (7, 89), (7, 26), (7, 21), (7, 91), (7, 73), (7, 2),
                      (7, 33), (7, 85), (7, 72), (7, 59), (8, 2), (8, 92), (8, 79), (8, 56),
                      (8, 23), (8, 91), (8, 62), (8, 81), (8, 9), (8, 12), (9, 6), (9, 87),
                      (9, 59), (9, 67), (9, 30), (9, 32), (9, 69), (9, 12), (9, 47), (9,55);