<?php

class Character {

    public function getCharacters() {

        // http://awesomescreenshot.com/0434ng8p6f
        // Each 5 digit value represents the pixels that are lighted per column
        // The seven values per array are the seven rows of the character
        // We'll use just uppercases, cause the tails of the lowercases would need an extra row that we don't have
        $characters['a'] = array('01110','10001','10001','11111','10001','10001','10001');
        $characters['b'] = array('11110','10001','10001','11110','10001','10001','11110');
        $characters['c'] = array('01110','10001','10000','10000','10000','10001','01110');
        $characters['d'] = array('11100','10010','10001','10001','10001','10010','11100');
        $characters['e'] = array('11111','10000','10000','11110','10000','10000','11111');
        $characters['f'] = array('11111','10000','10000','11110','10000','10000','10000');
        $characters['g'] = array('01110','10001','10000','10111','10001','10001','01111');
        $characters['h'] = array('10001','10001','10001','11111','10001','10001','10001');
        $characters['i'] = array('01110','00100','00100','00100','00100','00100','01110');
        $characters['j'] = array('11111','00001','00001','00001','00001','10001','01110');
        $characters['k'] = array('10001','10010','10100','11000','10100','10010','10001');
        $characters['l'] = array('10000','10000','10000','10000','10000','10000','11111');
        $characters['m'] = array('10001','11011','10101','10101','10001','10001','10001');
        $characters['n'] = array('10001','10001','11001','10101','10011','10001','10001');
        $characters['o'] = array('01110','10001','10001','10001','10001','10001','01110');
        $characters['p'] = array('11110','10001','10001','11110','10000','10000','10000');
        $characters['q'] = array('01110','10001','10001','10001','10101','10010','01101');
        $characters['r'] = array('11110','10001','10001','11110','10100','10010','10001');
        $characters['s'] = array('01111','10000','10000','01110','00001','00001','11110');
        $characters['t'] = array('11111','00100','00100','00100','00100','00100','00100');
        $characters['u'] = array('10001','10001','10001','10001','10001','10001','01110');
        $characters['v'] = array('10001','10001','10001','10001','10001','01010','00100');
        $characters['w'] = array('10001','10001','10001','10101','10101','10101','01010');
        $characters['x'] = array('10001','10001','01010','00100','01010','10001','10001');
        $characters['y'] = array('10001','10001','10001','01010','00100','00100','00100');
        $characters['z'] = array('11111','00001','00010','00100','01000','10000','11111');

        $characters['1'] = array('00100','01100','00100','00100','00100','00100','01110');
        $characters['2'] = array('01110','10001','00001','00010','00100','01000','11111');
        $characters['3'] = array('11111','00010','00100','00010','00001','10001','01110');
        $characters['4'] = array('00010','00110','01010','10010','11111','00010','00010');

        $characters[' '] = array('0','0','0','0','0','0','0');
        $characters['♥'] = array('0110110','1001001','1000001','1000001','0100010','0010100','0001000');
        // TODO: Do the rest, http://fontmeme.com/pixel-fonts/


        // We wrote them down coded in rows, but we really need them in cols :(
        // This function will help us :)
        $characters = $this->_characterRowsToCols($characters);

        return $characters;
    }

    public function _characterRowsToCols($characters) {

        $characters['a'] = array('01110','10001','10001','11111','10001','10001','10001');

        $charsInCols = array();

        foreach ($characters as $index=>$characterInRows) {
            $charsInCols[$index] = array();

            for ($iteration=0;$iteration<=7;$iteration++) {
                $column = "";
                foreach ($characterInRows as $row) {
                    $rowArray = str_split($row);
                    if (isset($rowArray[$iteration])) {
                        $column .= $rowArray[$iteration];
                    }
                }
                if ($column!="") {
                    array_push($charsInCols[$index], $column);
                }
            }

        }

        return $charsInCols;

    }

}