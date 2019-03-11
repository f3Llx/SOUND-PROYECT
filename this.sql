CREATE DATABASE music;
CREATE TABLE user (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    lastname varchar(50) NOT NULL,
    username varchar(20) NOT NULL,
    email varchar(20) NOT NULL,
    password varchar(500) NOT NULL,
    username_color varchar(200) DEFAULT '#ffffff',
    username_img_url varchar(500) DEFAULT 'img/phoenix.png',
    banner_img_url varchar(500) DEFAULT 'img/phoenix.png',
    is_artist tinyint DEFAULT '0',
    biography text (500),
    link1 varchar(250),
    link2 varchar(250),
    link3 varchar (250)

);

CREATE TABLE music_songs (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid int NOT NULL,
    music varchar(250) NOT NULL,
    artist varchar(50) NOT NULL,
    tittle varchar(50) NOT NULL,
    cover varchar(250) NOT NULL,
    FOREIGN KEY (userid) REFERENCES user(id)
);

