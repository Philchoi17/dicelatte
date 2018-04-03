<?php

//getting the keys for the tables we are creating in mysql
$all_str = file_get_contents("collection_2017_01_19.csv");
$all_str = trim($all_str);
echo($all_str);
$all_str = explode(PHP_EOL, $all_str);

$table_keys= explode(",", $all_str[0]);

echo(count($table_keys));
$single_table_keys = "id INT(6) AUTO_INCREMENT PRIMARY KEY, ";
$just_table_keys = "INSERT INTO `rawDLdata` (";
$the_question_marks = "VALUES (";

for( $i = 0; $i < count($table_keys)-1; $i++)
{
    $single_table_keys .= $table_keys[$i] . " VARCHAR(255)" . ", ";
    $just_table_keys .= $table_keys[$i] . ", ";
    $the_question_marks .= "?, ";
}



$single_table_keys .= trim($table_keys[22]) . " VARCHAR(255)";

$just_table_keys .= $table_keys[22] . ")";

$the_question_marks .= "?)";

$prepareDBLines = $just_table_keys . $the_question_marks;

// echo($prepareDBLines);


// $sql = "CREATE TABLE rawDLdata (" .  $single_table_keys . ")";

// $dbConn->exec($sql);

try
{
    $dbConn = new PDO('mysql:host=localhost;dbname=dicelattedb;charset=utf8mb4', 'root', '');
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP TABLE IF EXISTS rawDLdata; CREATE TABLE rawDLdata (" .  $single_table_keys . ")";

    $dbConn->exec($sql);
    echo "Table rawDLdata created successfully";
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}


//moving csv into MYSQL table rawDLdata

$csv = array_map('str_getcsv', file('collection_2017_01_19.csv'));
// $dbLine = $dbConn->prepare($prepareDBLines);
// $csvLines = [];
// $csvToMySQL = [];


for($x=1; $x < count($csv); $x++)
{
    $insertDataValue =[];
    for($j=0; $j < count($csv[1]); $j++)
    {
        $insertDataValue[] = $csv[$x][$j];
    }
    $dbLine = $dbConn->prepare($prepareDBLines);
    $dbLine->execute($insertDataValue);
}


// for( $x = 0; $x < count($all_str); $x++)
// {
//     $csvLines[] = $csv[$x];  
// }

// for( $y = 0; $y < count($csv[1]) - 1; $y++)
// {
//     $csvToMySQL[] = $csv[1][$y];
// }

// $csvToMySQL[]= $csv[1][count($csv[1])-1];
// // echo($csvToMySQL);


// // var_dump($csvToMySQL);


// $dbLine->execute($csvToMySQL);





// echo(count($csv));





$dbConn = null;

?>
