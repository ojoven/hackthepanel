<?php

require_once __DIR__.'/../settings.php';
require_once __DIR__.'/character.php';

class App {

    // Characters in pixels
    protected $characters;

    // Date when the script starts
    protected $startingPoint;

    // Today
    protected $today;

    // Message to print
    protected $message;

    // In pixels format
    protected $pixels;

    public function initialize() {

        $character = new Character();
        $this->characters = $character->getCharacters();
        $this->startingPoint = STARTING_POINT;
        $this->today = date('Y-m-d',time());
        $this->message = PANEL_MESSAGE;
        $this->pixels = $this->messageToPixels($this->message);

    }

    public function run() {

        $this->initialize();
        echo $this->pixels;

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

        echo "paint!";

    }

    private function messageToPixels() {

        $charactersMessage = str_split($this->message);
        $pixels = "";

        foreach ($charactersMessage as $character) {

            $array = $this->characters[$character];

            foreach ($array as $element) {
                $pixels .= $element;
            }

        }

        return $pixels;

    }

}