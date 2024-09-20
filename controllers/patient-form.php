<?php

$formView = "views/patient-form.view.php";
$bgUrl = "../public/assets/images/register-img.png";
$size = "20%";
$options = [
  'male' => 'Male',
  'female' => 'Female'
];

// Initialisation des variables
$fullname = $email = $phone = $birth = $gender = $address = $occupation = '';
$emergency_contact = $emergency_phone = $primary_physician = '';
$insurance_provider = $insurance_policy = $allergies = '';
$medications = $family_medical_history = $past_medical_history = '';
$identification_type = $id_number = $id_document = '';
$consent_treatment = $consent_use_info = $consent_privacy_policy = false;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupération et nettoyage des données
  $fullname = trim($_POST['fullname'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $birth = trim($_POST['birth'] ?? '');
  $gender = trim($_POST['gender'] ?? '');
  $address = trim($_POST['address'] ?? '');
  $occupation = trim($_POST['occupation'] ?? '');
  $emergency_contact = trim($_POST['emergency_contact'] ?? '');
  $emergency_phone = trim($_POST['emergency_phone'] ?? '');
  $primary_physician = trim($_POST['primary_physician'] ?? '');
  $insurance_provider = trim($_POST['insurance_provider'] ?? '');
  $insurance_policy = trim($_POST['insurance_policy'] ?? '');
  $allergies = trim($_POST['allergies'] ?? '');
  $medications = trim($_POST['medications'] ?? '');
  $family_medical_history = trim($_POST['family_medical_history'] ?? '');
  $past_medical_history = trim($_POST['past_medical_history'] ?? '');
  $identification_type = trim($_POST['identification_type'] ?? '');
  $id_number = trim($_POST['id_number'] ?? '');
  $id_document = trim($_POST['id_document'] ?? '');
  $consent_treatment = isset($_POST['consent_treatment']);
  $consent_use_info = isset($_POST['consent_use_info']);
  $consent_privacy_policy = isset($_POST['consent_privacy_policy']);

  // Validation des champs obligatoires pour un rendez-vous médical
  if (empty($fullname)) {
    $errors['fullname'] = "Full name is required.";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email address.";
  }
  if (empty($phone)) {
    $errors['phone'] = "Phone number is required.";
  }
  if (empty($birth)) {
    $errors['birth'] = "Date of birth is required.";
  }
  if (empty($gender)) {
    $errors['gender'] = "Gender is required.";
  }
  if (empty($address)) {
    $errors['address'] = "Address is required.";
  }
  if (empty($primary_physician)) {
    $errors['primary_physician'] = "Primary care physician is required.";
  }
  if (empty($insurance_provider)) {
    $errors['insurance_provider'] = "Insurance provider is required.";
  }
  if (empty($insurance_policy)) {
    $errors['insurance_policy'] = "Insurance policy number is required.";
  }

  // Validation optionnelle pour d'autres champs
  if (empty($emergency_contact)) {
    $errors['emergency_contact'] = "Emergency contact name is required.";
  }
  if (empty($emergency_phone)) {
    $errors['emergency_phone'] = "Emergency phone number is required.";
  }

  // Validation des consentements
  if (!$consent_treatment) {
    $errors['consent_treatment'] = "You must consent to receive treatment.";
  }
  if (!$consent_use_info) {
    $errors['consent_use_info'] = "You must consent to the use of your information.";
  }
  if (!$consent_privacy_policy) {
    $errors['consent_privacy_policy'] = "You must acknowledge that you have read the privacy policy.";
  }

  // Si aucune erreur, procéder avec le traitement
  if (empty($errors)) {
    // Nettoyage des variables après soumission réussie
    $fullname = $email = $phone = $birth = $gender = $address = '';
    $occupation = $emergency_contact = $emergency_phone = '';
    $primary_physician = $insurance_provider = $insurance_policy = '';
    $allergies = $medications = $family_medical_history = '';
    $past_medical_history = $identification_type = $id_number = '';
    $id_document = '';
    $consent_treatment = $consent_use_info = $consent_privacy_policy = false;

    header("Location: /appointment");
    exit();
  }
}

// Passer les erreurs à la vue
require "views/partials/form_layout.php";
