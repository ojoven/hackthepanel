<?php
define('ROOT_PATH', __DIR__ . "/");
require_once 'app/app.php';

$app = new App();
$app->run();
