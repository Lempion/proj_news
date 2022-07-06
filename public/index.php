<?php
require_once '../classes/init.php';

$route = Router::route($_SERVER['REQUEST_URI']);
$get = $route['get'];

include "../includes/head.php";

include $route['include'];

include "../includes/footer.php";