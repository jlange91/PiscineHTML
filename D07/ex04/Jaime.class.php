<?php

class Jaime extends Lannister{
    function sleepWith($obj) {
        $class = get_class($obj);
        if ($class == "Tyrion")
            echo "Not even if I'm drunk !" . PHP_EOL;
        else if ($class == "Cersei")
            echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
        else
            echo "Let's do this." . PHP_EOL;
    }
}

?>