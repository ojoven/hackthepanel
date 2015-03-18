<?php
require_once 'settings.php';
require_once 'characters.php';

$message = PANEL_MESSAGE;
$startingPoint = STARTING_POINT;


// Ok, let's start the script
$today = date('Y-m-d',time());

// The script will work just after the starting point
if (strtotime($startingPoint)>strtotime($today)) {
    exit();
}




?>