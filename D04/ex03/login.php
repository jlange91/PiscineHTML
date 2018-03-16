<?php session_start();

include("auth.php");


foreach ($_GET as $key => $value)
{
    if ($key == "login")
        $login = $value;
    else if ($key == "passwd")
        $passwd = $value;
}
if ($login == "" || $passwd == "" || !auth($login, $passwd))
{
    $_SESSION["logged_on_user"] = "";
    echo "ERROR\n";
}
else
{
    $_SESSION["logged_on_user"] = $login;
    echo "OK\n";
}

?>