<?php


    function getLangId($text, $array) {
            echo $text;
        if (strpos(strip_tags($text), "moderate") !== false) 
        {
            return 2;
        }
        else if (strpos($text, "Extensive") !== false) 
        {
            return 1;
        }
        else if (strpos($text, "No") !== false) 
        {
            return 3;
        }
        else if (strpos($text, "Some") !== false) 
        {
            return 4;
        }
        else if (strpos($text, "Unplayable") !== false) 
        {
            return 5;
        }
        else return 0;

    }

    $db = new PDO('mysql:host=localhost;dbname=dicelattedb;charset=utf8mb4', 'root', '');
    $sth = $db->prepare("SELECT * FROM langDep");
    if ( $sth->execute()) 
    {
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    } 
    else { print_r($sth->errorInfo()); }
   
    echo '<pre>';
    print_r($data);
    echo '</pre>';

    $sth = $db->prepare("SELECT `id`, `langDependence` FROM basicdldata");
    if ( $sth->execute()) 
    {
        $langkey = $sth->fetchAll(PDO::FETCH_ASSOC);
    } else { echo "2"; }

    for($i = 0; $i < count($langkey); $i++)
    {

       $langDepId = getLangId($langkey[$i]['langDependence'], $data);   
       echo "$langDepId <br />";
    }





?>