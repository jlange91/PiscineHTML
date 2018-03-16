<?php

if ($_POST["submit"] == 'OK')
{
    foreach ($_POST as $key => $value)
    {
        if ($key == "login")
            $login = $value;
        else if ($key == "passwd")
            $passwd = $value;
    }
    if ($login == "" || $passwd == "")
    {
        echo "ERROR\n";
        exit();
    }
}
else
{
    echo "ERROR\n";
    exit();
}

$filename = "../private/passwd";
$pathname = "../private/";
$account["login"] = $login;
$account["passwd"] = hash("whirlpool", $passwd);

if (!file_exists($pathname))
    mkdir($pathname);

if(file_exists($filename))
    $data = unserialize(file_get_contents($filename));
else
    $data = array();
if ($data !== false)
{
    foreach ($data as $value)
    {
        if ($value["login"] === $login)
        {
            echo "ERROR\n";
            exit;
        }
    }
}
$account["login"] = $login;
$account["passwd"] = hash("whirlpool", $passwd);
$data[] = $account;
file_put_contents($filename, serialize($data));
echo "OK\n";
?>