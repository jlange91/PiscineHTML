<?php session_start(); ?>
<?php

if (isset($_GET['del']))
{
	if (is_numeric($_GET['del']))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', 'root');
		$bdd->query("DELETE FROM `voitures` WHERE id = " . $_GET['del']);
		if (unlink("img/voitures/" . $_GET['del'] . ".png") == FALSE)
			echo "error\n";
		else
			echo "success\n";
	}
}


/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
$msg = '';
$path = "img/voitures/";
$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
$maxwidth = 3200;
$maxheight = 3200;

/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir($path) ) {
  if( !mkdir($path, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
	if ($_FILES['fichier']['error'] > 0)
		$msg = "Erreur lors du transfert. err :" . $_FILES['fichier']['error'];
	else if (!$_POST['msg'])
		$msg = "Erreur : pas de description";
	else
	{
		$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
		if (!in_array($extension_upload,$extensions_valides) )
			$msg = "Extension invalide (jpg, jpeg et png accepté)";
		else
		{
			$image_sizes = getimagesize($_FILES['fichier']['tmp_name']);
			if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
				$msg = "Image trop grande";
			else
			{
				$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', 'root');
				$rep = $bdd->query('SELECT * FROM voitures');
				$i = 0;
				while ($donnees = $rep->fetch())
					$i = $donnees['id'];
				$i++;	
				$nom = $path . $i . "." . $extension_upload;
				$result = move_uploaded_file($_FILES['fichier']['tmp_name'], $nom);
				if ($result)
				{
					$req = $bdd->prepare('INSERT INTO voitures(`id`, `path`, `txt`) VALUES (:id, :nom, :txt)');
					$req->execute(array(
						'id' => $i,
						'nom' => $nom,
						'txt' => $_POST['msg']
						));
					$msg = "Transfert réussi";
				}
				else
					$msg = "Unknow error";

			}
		}
	}

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>admin</title>
		  <style>
		.adm { display: flex;}
    .adm_id { display: inline;
		margin-right: 1px;
		width:10%;
		height:100%;
		border: 1px solid black;}
		.adm_img { display: inline;
		margin-right: 1px;
		width:400px;
		height:300px;
		border: 1px solid black;}
		.adm_img:hover { display: inline;
		margin-right: 10px;
		width:550px;
		height:450px;
		border: 1px solid black;}
		.adm_txt { display: inline;
		border: 1px solid black;
		width: 100%;
		height:10%;
		max-width:150px;
		max-height:500px;
		overflow: auto;}
  </style>
  </head>
  <body>
	<?php
      if( !empty($msg) ) 
      {
        echo '<div id="adm_">',"\n";
        echo "\t\t<strong>", htmlspecialchars($msg) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>

    <fieldset>
    	<?php

		$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', 'root');
		$rep = $bdd->query('SELECT * FROM voitures');
		while ($donnees = $rep->fetch())
		{
			echo "<div class=\"adm\"><div class=\"adm_id\">id: " . $donnees['id'] . "</div>";
			echo "<img class=\"adm_img\" src=\"" . $donnees['path'] ."\" alt=\"" . $donnees['id'] . "\" />";
			echo "<div class=\"adm_txt\">" . $donnees['txt'] . "</div></div><br/>";
		}

    	?>
    </fieldset>

    <!-- Formulaire upload fichier -->
   <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <legend>Ajouter une voiture</legend>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !"></label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input name="fichier" type="file" id="fichier_a_uploader" /><br/>
            <textarea name="msg" rows="8" cols="45" placeholder="Description de l'image"></textarea> 
            <input type="submit" name="submit" value="Uploader" />
      </fieldset>
    </form>
		<!-- Formulaire delete fichier -->
		<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <fieldset>
        <legend>Supprimer une voiture</legend>
            Identifiant à supprimer: <input type="text" name="del"/>
            <input type="submit"/>
      </fieldset>
    </form>
  </body>
</html>