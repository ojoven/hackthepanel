<?php

require_once __DIR__.'/../settings.php';
require_once __DIR__.'/character.php';

class App {

    const MIN_COMMITS_PIXEL_ON = 18;
    const MAX_COMMITS_PIXEL_ON = 22;

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

        // Paint pixel if it's the day
        if ($this->isPaintingDay()) {
            $this->paintPixel();
        }

        // Take a shot of the panel
        $this->takeScreenshotContributionsPanel();

        // Save status
        $this->saveStatus();
    }

    public function saveStatus() {

        $message = date("Y-m-d H:i:s") . " -> ";
        $message .= ($this->isPaintingDay()) ? "paint!" : "no paint";
        $message .= "\n";
        file_put_contents(ROOT_PATH . "status", $message, FILE_APPEND);

    }

    public function takeScreenshotContributionsPanel() {

        $pathToPhantomJs = ROOT_PATH . "renderpanel.js";
        $screenshotFilename = ROOT_PATH . "screenshots/screenshot_" . $this->today . ".png";
        $extension = "png";

        // Generate screenshot panel
        $githubUserUrl = "https://github.com/" . GITHUB_USER;
        exec("phantomjs --ssl-protocol=any " . $pathToPhantomJs .  " " . $githubUserUrl . " " . $screenshotFilename . " " . $extension);

    }

    public function getPixels() {
        return $this->pixels;
    }

    public function isPaintingDay() {

        // The script will work just after the starting point
        if (strtotime($this->startingPoint)>strtotime($this->today)) {
            return false;
        }

        $diffDays = $this->_getDiffDates($this->startingPoint,$this->today);
        if ((int)$this->pixels[(int)$diffDays]==1) {
            return true;
        } else {
            return false;
        }

    }

    // Paint a pixel on green - by committing ~20 times
    public function paintPixel() {

        echo "paint!" . PHP_EOL;
        $numCommits = rand(self::MIN_COMMITS_PIXEL_ON, self::MAX_COMMITS_PIXEL_ON);

        for ($i=0;$i<=$numCommits;$i++) {
            file_put_contents(ROOT_PATH . "commit", $this->today . "\n", FILE_APPEND);
            exec("git add -A");
            exec("git commit -m \"paint pixel on http://github.com/" . GITHUB_USER . "\"");
            exec("git push -u origin master");
        }

    }

    private function messageToPixels() {

        $charactersMessage = preg_split('//u', $this->message, -1, PREG_SPLIT_NO_EMPTY);
        $pixels = "";

        foreach ($charactersMessage as $character) {

            $array = $this->characters[$character];

            foreach ($array as $element) {
                $pixels .= $element;
            }

        }

        $pixelsChunked = chunk_split($pixels,7);

        return $pixels;

    }

    private function _getDiffDates($date1,$date2) {

        $dStart = new DateTime($date1);
        $dEnd  = new DateTime($date2);
        $dDiff = $dStart->diff($dEnd);

        return $dDiff->days;
    }

    // For testing purposes
    public function setToday($today) {
        $this->today = $today;
    }

}