<?php

$link = 'mysql:dbname=serc;host=localhost:3306';
$usuario = 'root';
$pass = '';
try {
    $pdo = new PDO($link, $usuario, $pass);
    
   // echo 'Conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>