<?php

function auth($login, $passwd)
{
    $filename = "../private/passwd";
    if (($data = unserialize(file_get_contents($filename))) == FALSE)
        return FALSE;
    foreach ($data as $key => $value)
    {
        if ($value["login"] === $login)
            if ($value["passwd"] == hash("whirlpool", $passwd))
                return TRUE;
    }
    return FALSE;
}

?>