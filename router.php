<?php

/**
 * Gère le routage du site.
 * 
 * @param string $uri L'URL courant du site.
 * @param array $routes Tableau contenant toutes les routes
 */
function routeToController($uri, $routes)
{
  // Normaliser l'URI en supprimant le slash final s'il est présent
  $uri = rtrim($uri, '/');

  // Supprimer les paramètres de requête de l'URI
  $uriWithoutQuery = parse_url($uri, PHP_URL_PATH);

  // Vérifier si l'URI sans query est dans les routes
  if (array_key_exists($uriWithoutQuery, $routes)) {
    // Extraire les paramètres de requête
    $queryString = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);
    $params = [];
    if ($queryString) {
      parse_str($queryString, $params);
    }
    // Passer les paramètres au contrôleur
    require $routes[$uriWithoutQuery];
    return $params;
  } else {
    abort();
  }
}

function abort($code = 404)
{
  http_response_code($code);
  require "views/{$code}.php";
  die();
}

// Extraire le chemin de l'URL sans les paramètres
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Liste des routes
$routes = [
  "" => "controllers/onboarding.php",
  "/patient-form" => "controllers/patient-form.php",
  "/appointment" => "controllers/appointment.php",
  "/success" => "controllers/success.php",
];

// Route vers le contrôleur et récupération des paramètres
$params = routeToController($uri, $routes);

// Si nécessaire, vous pouvez maintenant accéder aux paramètres $params dans les contrôleurs
if ($uri === "/patient-form" && isset($params['id'])) {
  $id = $params['id'];
  // Utiliser $id dans le contrôleur
}
