<?php

$chatAppConn = new PDO('mysql:host=localhost;dbname=diceLatteGamesDB;charset=utf8mb4', 'root', '');

?>

CREATE TABLE `diceLatteGamesDB`
(
    `id`        int(11) AUTO_INCREMENT PRIMARY KEY,
    `name`      varchar(255),
    `pubYear`       int,
    `minNumPlayers`  int,
    `maxNumPlayers`  int,
    `recNumPlayers` int,
    `bestNumPlayer` int,
    `expectedTime` int,
    `minTime` int,
    `maxTime` int,
    `minAge` int,
    `langDependence` int,
    `type` int,
    `bgg`: 
    {
        `bggId` int,
        `bayesianRating` int,
        `avgRating` int,
        `avgWeight` int,
        `rank` int
    } 
);

CREATE TABLE `dicelattegamesDirt`
(
    `id` bigint AUTO_INCREMENT PRIMARY KEY,
    `objectname` varchar(255),
    `objectid` int(11),
    `rating` int(11),
    `baverage` decimal(7, 6),
    `average` decimal(7, 6),
    `avgweight` decimal(6, 5),
    `rank` int(11),
    `originalname` varchar(255),
    `minplayers` tinyint,
    `maxplayers` tinyint,
    `playingtime` tinyint,
    `maxplaytime` smallint,
    `minplaytime` smallint,
    `yearpublished` smallint,
    `bggrecplayers` varchar(255),
    `bggbestplayers` tinyint,
    `bggrecagerange` varchar(255),
    `bgglanguagedependence` varchar(255),
    `imageid` varchar(255),
    `year` smallint,
    `language` varchar(255),
    `other` varchar(255),
    `itemtype` varchar(255)
);

LOAD DATA INFILE '/Applications/XAMPP/xamppfiles/htdocs/dicelatte/source/collection_2017_01_19.csv' 
INTO TABLE dicelattegamesDirt 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

CREATE TABLE `bggTable`
(
    `id` int(11) AUTO_INCREMENT PRIMARY KEY,
    `bggId` int(11),
    `bayesianRating` decimal(7, 5),
    `avgRating` decimal(7, 5),
    `avgWeight` decimal(5, 4),
    `rank` int(11)
);