Nombre de projets
<?php $bdd->query('SELECT COUNT(*) FROM project') ?>

Nombre d'agriculteurs
<?php $bdd->query('SELECT COUNT(*) FROM participant') ?>

Nombre d'investisseurs
<?php $bdd->query('SELECT COUNT(*) FROM project_investor') ?>

MODIFICATION DE COMPTE
Nom
<?php $bdd->prepare('UPDATE user_account SET last_name = ? WHERE id = ?')->execute(array($_POST['last_name'], $_SESSION['user_account']['id'])); ?>
Prenom
<?php $bdd->prepare('UPDATE user_account SET first_name = ? WHERE id = ?')->execute(array($_POST['first_name'], $_SESSION['user_account']['id'])); ?>
Username
<?php $bdd->prepare('UPDATE user_account SET user_name = ? WHERE id = ?')->execute(array($_POST['user_name'], $_SESSION['user_account']['id'])); ?>
Email
<?php $bdd->prepare('UPDATE user_account SET email = ? WHERE id = ?')->execute(array($_POST['email'], $_SESSION['user_account']['id'])); ?>
Date de naissance
<?php $bdd->prepare('UPDATE user_account SET date_of_birth = ? WHERE id = ?')->execute(array($_POST['date_of_birth'], $_SESSION['user_account']['id'])); ?>
