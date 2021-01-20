<?php

$user = 'root';
$password = 'root';

try {
    $bdd = new PDO('mysql:host=localhost:8889;dbname=la_bourse_aux_potagers', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
