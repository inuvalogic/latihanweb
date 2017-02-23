<?php

$hostname = 'localhost';
// $dbname = 'latihan';
// $username = 'root';
// $password = '';
$dbname = 'wisnuhaf_db';
$username = 'wisnuhaf_user';
$password = '(wnCT(9^}L]#^VA;u*';

try {
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Ada error nih: ".$e->getMessage();
}

?>