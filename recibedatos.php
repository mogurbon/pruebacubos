<?php

require './vendor/autoload.php';

$mbd = new PDO('mysql:host=localhost;dbname=datoswebservice', 'root', 'petra123');


$app = new \Slim\App;
$app->post('/datos', function () use ($mbd)  {
    
    $sentencia = $mbd->prepare("INSERT INTO datos (datoa, datob) VALUES (:datoa, :datob)");
    $sentencia->bindParam(':datoa', $datoa);
    $sentencia->bindParam(':datob', $datob);
    
    
    $datoa = $_REQUEST['datoa'];
    $datob = $_REQUEST['datob'];
    
    $sentencia->execute();
});

$app->run();