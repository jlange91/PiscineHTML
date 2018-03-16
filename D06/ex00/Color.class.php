<?php

class Color {

    public $red = 0;
    public $green = 0;
    public $blue = 0;
    static $verbose = FALSE;

    private function _hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        return ($rgb);
    }
    
    function __construct(array $rgb) {
        if (array_key_exists('rgb', $rgb))
        {
            $tab = $this->_hex2rgb($rgb['rgb']);
            $this->red = intval($tab[0]);
            $this->green = intval($tab[1]);
            $this->blue = intval($tab[2]);
        }
        if (array_key_exists('red', $rgb))
            $this->red = intval($rgb['red']);
        if (array_key_exists('green', $rgb))
            $this->green = intval($rgb['green']);
        if (array_key_exists('blue', $rgb))
            $this->blue = intval($rgb['blue']);
        if (self::$verbose)
        {
            print("Color( " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) constructed." . PHP_EOL);
        }
        return;
    }

    function __destruct() {
        if (self::$verbose)
        {
            print("Color( " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) destructed." . PHP_EOL);
        }
        return;
    }

}

$rgb = array('rgb' => 869394);
Color::$verbose = True;
$test = new Color($rgb);
$test->verbose = TRUE;

?>