<?php

require_once __DIR__.'/../settings.php';
require_once __DIR__.'/../characters.php';

class App {

    protected $startingPoint;
    protected $today;
    protected $message;

    public function initialize() {

        $this->startingPoint = STARTING_POINT;
        $this->today = date('Y-m-d',time());
        $this->$message = PANEL_MESSAGE;

    }

    public function run() {

        if ($this->isPaintingDay()) {
            $this->paintPixel();
        }

    }

    public function isPaintingDay() {

        // The script will work just after the starting point
        if (strtotime($this->startingPoint)>strtotime($this->today)) {
            return false;
        }




    }

    // Paint a pixel on green - by committing ~20 times
    public function paintPixel() {



    }

}