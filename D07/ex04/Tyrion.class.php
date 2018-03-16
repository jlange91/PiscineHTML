<?php
class Tyrion {
    function sleepWith($obj) {
        if (is_a($obj, "Lannister"))
            echo "Not even if I'm drunk !" . PHP_EOL;
        else
            echo "Let's do this." . PHP_EOL;
    }
}
?>