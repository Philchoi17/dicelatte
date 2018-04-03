<?php

$all_str = file_get_contents("collection_2017_01_19.csv");
$all_str = trim($all_str);
$all_str = explode(PHP_EOL, $all_str);

$table_keys= explode(",", $all_str[0]);

// echo($table_keys[0]);
