<?php

abstract class Fighter {
    public $name = "";

    public function __construct($str) {
            $this->name = $str;
    }

    abstract public function fight($target);
}

?>