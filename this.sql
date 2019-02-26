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
    uploader tinyint

);

CREATE TABLE music_songs (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid int NOT NULL,
    music varchar(250) NOT NULL,
    artist varchar(50) NOT NULL,
    tittle varchar(50) NOT NULL,
    cover varchar(250) NOT NULL,
    arraySongNumber int(10)not null
    FOREIGN KEY (userid) REFERENCES user(id)
);

