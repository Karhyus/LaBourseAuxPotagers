<?php
session_start();
unset($_SESSION['user_account']); // unset permet de détruire la variable qui a été placé en argument donc de plus avoir d'utilisateur en ligne
header('Location: ../index.php');