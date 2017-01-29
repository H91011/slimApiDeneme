<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'SlimApi';


$mysqli = new mysqli($host, $user, $pass, $db);
$myArray = array();
if ($result = $mysqli->query("SELECT * FROM User ")) {

    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();