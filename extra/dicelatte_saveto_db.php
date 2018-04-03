<?php

$chatAppConn = new PDO('mysql:host=localhost;dbname=diceLatteGamesDB;charset=utf8mb4', 'root', '');

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
    
);


CREATE TABLE `DLsearchInputs`
(
    `id`        int(11) AUTO_INCREMENT PRIMARY KEY,
    `numPlayers`      int,
    `gameLength`       int,
    `date_time`  datetime,
    `EnglishNeeded`  varchar(255),
    `gameDifficulty` int

);

mysql -udlUser -p -h192.168.1.88 dicelattedb < dicelattedb.sql