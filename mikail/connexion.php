<?php
if (isset($_POST['logout']))
{
	$_SERVER['PHP_AUTH_USER'] = "logout";
	$_SERVER['PHP_AUTH_PW'] = "logout";
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header('Location:' . $url);
}
if (!isset($_SERVER['PHP_AUTH_USER']))
{
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<h1>Access Denied!</h1>';
    exit;
}
else {
    if(!($_SERVER['PHP_AUTH_USER']=='admin' and md5($_SERVER['PHP_AUTH_PW'])=='098f6bcd4621d373cade4e832627b4f6'))
    {
        header('HTTP/1.0 401 Unauthorized');
    	if (isset($_POST['logout']))
	        echo '<h1>Disconnected</h1>';
    	else
        	echo '<h1>Access Denied!</h1>';
        exit;
    }
    else
    {
        $_SESSION['access'] = true;
        echo "<p>Vous êtes maintenant connecté(e).</p>";
    }
}
?>
<html>
    <head>
    </head>
    <body>
        <form method="POST">
            <button name="logout" type="submit">Log Out</button>
        </form>
        <a href="admin.php"><button>admin</button></a>
    </body>
</html>