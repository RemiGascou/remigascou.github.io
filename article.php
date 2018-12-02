<html>
	<head>
	<?php include("/includes/header.php"); ?>
	</head>
	<body>
		<?php include("/includes/navbar.php"); ?>
		
			<?php
			if(isset($_GET["id"]) && !empty($_GET["id"])) {
				$article_id = $_GET['id'];
				$header_img_url = '/meta/articles/blank/header_img.jpg';
				// on se connecte à MySQL
				$db = mysql_connect('localhost', 'root', 'root');
				// on sélectionne la base
				mysql_select_db('remi_gascou',$db);
				// on crée la requête SQL
				$sql = "SELECT * FROM articles WHERE id = " . $article_id ;
				// on envoie la requête
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				// on fait une boucle qui va faire un tour pour chaque enregistrement
				while($data = mysql_fetch_assoc($req)){
					$headerimgurl_jpg = '/meta/articles/' . $data['id'] . '/header_img.jpg';
					$headerimgurl_png = '/meta/articles/' . $data['id'] . '/header_img.png';
					if (!file_exists($headerimgurl_jpg) && !file_exists($headerimgurl_png)) {
						$header_img_url = '/meta/articles/blank/header_img.jpg';
					}
					if (file_exists($headerimgurl_png)) {
						$header_img_url = '/meta/articles/' . $article_id . '/header_img.png';
					}
					if (file_exists($headerimgurl_jpg)) {
						$header_img_url = '/meta/articles/' . $article_id . '/header_img.jpg';
					}
				}
				echo '<img style="width: 100%;" src="' . $header_img_url . '" alt="">';
				// on ferme la connexion à mysql
				mysql_close();
			}
			?>
		
		<?php include("/includes/footer.php"); ?>
	</body>
</html>
