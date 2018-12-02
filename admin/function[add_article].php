<?php
	if(isset($_POST["title"]) && !empty($_POST["title"]) && isset($_POST["preview_text"]) && !empty($_POST["preview_text"]) && isset($_POST["category"]) && !empty($_POST["category"]) && isset($_POST["article_text"]) && !empty($_POST["article_text"])) {
		$title = $_POST['title'];
		$preview_text = $_POST['preview_text'];
		$category = $_POST['category'];
		$article_text = $_POST['article_text'];
		
		// on se connecte à MySQL
		$db = mysql_connect('localhost', 'root', 'root');
		if(! $db )
			{
			  die("<div class='alert alert-danger' role='alert'>Could not connect: " . mysql_error() . "</div>");
			}
		// on sélectionne la base
		mysql_select_db('remi_gascou',$db);
		// on crée la requête SQL
		$sql = "INSERT INTO `remi_gascou`.`articles` (`id`, `title`, `category`, `date_written`, `preview_text`, `article_text`) VALUES (NULL, '" . $title . "', '" . $category . "', CURRENT_TIMESTAMP, '" . $preview_text . "', '" . $article_text . "');";
		//echo $sql;
		// on fait une boucle qui va faire un tour pour chaque enregistrement
			$data = mysql_query( $sql, $db );
			if(! $data )
			{
			  die("<div class='alert alert-danger' role='alert'>Could not enter data: " . mysql_error() . "</div>");
			}
			echo "<div class='alert alert-success' role='alert' style='margin-top:20px; margin-left:12.5%; margin-right:12.5%;'>Entered data successfully</div>";
		// on ferme la connexion à mysql
		mysql_close();
	} else {
		echo "<div class='alert alert-danger' role='alert' style='margin-top:20px; margin-left:12.5%; margin-right:12.5%;'>Tout les champs doivent être remplis.</div>";
	}
?>