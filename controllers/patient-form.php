<?php

$formView = "views/patient-form.view.php";
$bgUrl = "../public/assets/images/register-img.png";
$size = "20%";
$options = [
  'male' => 'Male',
  'female' => 'Female'
];

// Initialisation des variables
$formData = [
  'fullname' => '',
  'email' => '',
  'phone' => '',
  'birth' => '',
  'gender' => '',
  'address' => '',
  'occupation' => '',
  'emergency_phone' => '',
  'emergency_contact' => '',
  'primary_physician' => '',
  'insurance_provider' => '',
  'insurance_policy' => '',
  'allergies' => '',
  'medications' => '',
  'family_medical_history' => '',
  'past_medical_history' => '',
  'identification_type' => '',
  'id_number' => '',
  'id_document' => '',
  'consent_treatment' => false,
  'consent_use_info' => false,
  'consent_privacy_policy' => false
];

$errors = [];

// Fonction pour nettoyer les données
function sanitizeInput($input)
{
  return trim($input ?? '');
}

// Fonction de validation des champs obligatoires
function validateRequired($field, $name, &$errors)
{
  if (empty($field)) {
    $errors[$name] = ucfirst($name) . " is required.";
  }
}

// Fonction pour valider l'email
function validateEmail($email, &$errors)
{
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email address.";
  }
}

// Fonction de validation du téléphone avec un pattern pour l'Afrique de l'Ouest
function validatePhone($phone, &$errors)
{
  // Pattern pour les numéros de téléphone ouest-africains (ex : +221 77XXXXXXX ou 77XXXXXXX)
  $pattern = "/^(?:\+?221)?\s?\(?7\d{2}\)?\s?\d{3}\s?\d{2}\s?\d{2}$/";

  if (empty($phone)) {
    $errors['phone'] = "Phone number is required.";
  } elseif (!preg_match($pattern, $phone)) {
    $errors['phone'] = "Invalid phone number format. Please use the format +221 77 XXX XX XX or 77XXXXXXX.";
  }
}

// Fonction pour valider les consentements
function validateConsent($consent, $field, &$errors)
{
  if (!$consent) {
    $errors[$field] = "You must consent to " . str_replace('_', ' ', $field) . ".";
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer et nettoyer les données du formulaire
  foreach ($formData as $key => $value) {
    $formData[$key] = sanitizeInput($_POST[$key] ?? '');
  }

  // Validation des champs obligatoires
  validateRequired($formData['fullname'], 'fullname', $errors);
  validateEmail($formData['email'], $errors);
  // validatePhone($formData['phone'], $errors);
  validateRequired($formData['birth'], 'birth', $errors);
  validateRequired($formData['gender'], 'gender', $errors);
  validateRequired($formData['address'], 'address', $errors);
  validateRequired($formData['primary_physician'], 'primary_physician', $errors);
  validateRequired($formData['insurance_provider'], 'insurance_provider', $errors);
  validateRequired($formData['insurance_policy'], 'insurance_policy', $errors);
  validateRequired($formData['emergency_contact'], 'emergency_contact', $errors);
  // validatePhone($formData['emergency_phone'], $errors);

  // Validation des consentements
  validateConsent($formData['consent_treatment'], 'consent_treatment', $errors);
  validateConsent($formData['consent_use_info'], 'consent_use_info', $errors);
  validateConsent($formData['consent_privacy_policy'], 'consent_privacy_policy', $errors);

  // Si aucune erreur, procéder avec le traitement
  if (empty($errors)) {
    // Réinitialisation des données du formulaire après soumission réussie
    $formData = array_fill_keys(array_keys($formData), '');

    header("Location: /appointment");
    exit();
  }
}

require "db.php";

$sql = "SELECT * FROM doctor";
$result = $connexion->query($sql);
$doctors = [];
if ($result->num_rows > 0) {
  // Affichage de chaque ligne de résultat
  while ($row = $result->fetch_assoc()) {
    $doctors[] = $row;
  }
}

$primary_care_physician = [];

foreach ($doctors as $value) {
  $primary_care_physician[$value["idDoctor"]] = $value["fullname"];
}

// Passer les erreurs à la vue
require "views/partials/form_layout.php";
