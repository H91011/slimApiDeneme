<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';


$app->get('/usermail', function (Request $request, Response $response) {


    try {

        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbh = new PDO("mysql:host=$hostname;dbname=SlimApi", $username, $password);
        $sql = "SELECT * FROM User";
        $query = $dbh->prepare($sql);
        $query->execute();
        $myArray = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $myArray[] = $row;
        }


        if ($myArray) {
            $response->withJson($myArray);
        } else {
            throw new PDOException('No records found.');
        }
    } catch (PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
});


$app->get('/home', function() {

    return 'Home';
});


$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
