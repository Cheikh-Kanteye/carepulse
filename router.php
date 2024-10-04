<?php


/**
 * Gere le routing du site
 * 
 * @param string $uri le url courrant du site
 * @param array $routes tableau contenant tous les routes 
 * * [uri => pointing_file]
 * */
function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
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


$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = [
  "/" => "controllers/onboarding.php",
  "/patient-form" => "controllers/patient-form.php",
  "/appointment" => "controllers/appointement.php",
  "/success" => "controllers/success.php",
];


routeToController($uri, $routes);
