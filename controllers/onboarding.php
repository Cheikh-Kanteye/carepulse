<?php

// Initialisation des variables
$fullname = $email = $phone = "";
$fullnameErr = $emailErr = $phoneErr = "";

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

  // Validation du nom
  if (empty(trim($_POST['fullname']))) {
    $fullnameErr = "Full name is required.";
  } else {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
  }

  // Validation de l'email
  if (empty(trim($_POST['email']))) {
    $emailErr = "Email is required.";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email address.";
  } else {
    $email = htmlspecialchars(trim($_POST['email']));
  }

  // Validation du numéro de téléphone
  if (empty(trim($_POST['phone']))) {
    $phoneErr = "Phone number is required.";
  } else {
    $phone = htmlspecialchars(trim($_POST['phone']));
  }

  // Si aucune erreur, redirection
  if (empty($fullnameErr) && empty($emailErr) && empty($phoneErr)) {
    header("Location: /patient-form?id=1");
    exit();
  }
}

// Chargement de la vue
$formView = "views/onboarding.view.php";
$bgUrl = "../public/assets/images/onboarding-img.png";
$size = "45%";
require "views/partials/form_layout.php";
