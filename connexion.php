<?php
session_start();
require_once 'config.php';

$user = $_POST['user'];
$mdp = $_POST['mdp'];

$check = $bdd->prepare('SELECT NOMCOMPTE, USER, MDP, TYPEPROFIL FROM COMPTE WHERE USER = ? AND MDP = ?');
$check->execute(array($user, $mdp));
$data = $check->fetch();
$row = $check->rowCount();

if ($row == 1) {
    $_SESSION['user'] = $data['USER'];
    $_SESSION['type'] = $data['TYPEPROFIL'];
    $_SESSION['pseudo'] = $data['NOMCOMPTE'];
    header('Location: ../index.php');
} else {
    header('Location: accueil.php?login_err=already');
}
