<?php
define('ROOT_PATH', __DIR__ . "/");
require_once 'app/app.php';

// No browser access
if (php_sapi_name() != "cli") { exit("Sorry, no access man!"); }

// Let's run!
$app = new App();
$app->run();
