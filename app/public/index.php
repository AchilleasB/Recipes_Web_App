<?php

session_start();

require __DIR__ . '/../routers/patternRouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);
