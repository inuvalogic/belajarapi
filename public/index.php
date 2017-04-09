<?php

ini_set('display_errors', 1);

include '../app/Core/Autoloader.php';

$api = new Api\Core\App;
$api->init();