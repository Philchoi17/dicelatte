<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $db = new PDO('mysql:host=localhost;dbname=dicelattedb;charset=utf8mb4', 'root', '');
        $sth = $db->prepare('
        SELECT `numPlayers`, `gameLength`, `date_time`, `EnglishNeeded`, `gameDifficulty`
        FROM `DLsearchInputs`
        ');

        if($sth->execute()){
            $customerHistory = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        // echo("<pre>");
        // print_r($customerHistory);
        // echo("</pre>");

        $sth = $db->prepare('
        SELECT * 
        FROM `basicDLdata`
        ');

        if($sth->execute()){
            $basicGameData = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        // echo("<pre>");
        // print_r($basicGameData);
        // echo("</pre>");

        $sth = $db->prepare('
        SELECT *
        FROM `bggTable`
        ');

        if($sth->execute()){
            $bbgeekData = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        // echo("<pre>");
        // print_r($bbgeekData);
        // echo("</pre>");
    ?>
</body>
</html>