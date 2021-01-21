<?php

$user = 'root';
$password = '';

try {
    $bdd = new PDO('mysql:host=localhost:3308;dbname=la_bourse_aux_potagers', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
