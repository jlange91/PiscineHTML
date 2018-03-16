<?php

$filename = "../private/passwd";

if ($_POST["submit"] != "OK")
{
    echo "ERROR\n";
    exit();
}
if (($data = unserialize(file_get_contents($filename))) == FALSE)
{
    echo "ERROR\n";
    exit();
}
$test = 0;
foreach ($data as $key => $value)
{
    if ($value["login"] === $_POST["login"])
    {
        if ($value["passwd"] == hash("whirlpool", $_POST["oldpw"]))
        {
            $data[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
            $test = 1;
        }
    }
}
if ($test == 1)
{
    file_put_contents($filename, serialize($data));
    echo "OK\n";
}
else
    echo "ERROR\n";
?>