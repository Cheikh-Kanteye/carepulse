<?php

$server = "localhost";
$dbname = "carepulse";
$user = "root";
$pwd = "";

$connexion = new mysqli($server, $user, $pwd, $dbname);

if ($connexion->connect_error) {
  die("connexion echoué " . $connexion->connect_error);
}
