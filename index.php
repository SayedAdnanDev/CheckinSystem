<?php

$db = Database::getInstance();

$mysqli = $db->getConnection(); 
$sql_query = "SELECT * FROM .....";
$result = $mysqli->query($sql_query);

echo $result;

?>