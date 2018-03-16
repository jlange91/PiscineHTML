<?php session_start();
if ($_GET['submit'] == "OK")
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method="get" action="index.php">
    Identifiant: <input type="text" name="login" id="login" value="<?php echo $_SESSION['login']; ?>" />
    <br />
    Mot de passe: <input type="password" name="passwd" id="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
    <input type="submit" name="submit" value="OK" />
</form><?php
    echo $_SESSION['login'] . "\n";
    echo $_SESSION['passwd'];?>
</body></html>
<?php
?>