<?php

class NightsWatch {
    private $_tab = array();

    function recruit($obj) {
        if ($obj instanceof Ifighter)
            $this->_tab[] = $obj;
    }
    function fight(){
        foreach ($this->_tab as $value)
            $value->fight();
    }
}

?>