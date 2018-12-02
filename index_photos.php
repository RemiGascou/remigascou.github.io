<html>
	<?php include("includes/header.php"); ?>
	<body>
		<?php include("includes/navbar.php"); ?>
		<?php
			$db = mysql_connect('localhost', 'root', 'root');
			// on sélectionne la base
			mysql_select_db('remi_gascou',$db);
			// on crée la requête SQL
			$sql = "SELECT * FROM articles WHERE category LIKE 'Photos' ORDER BY date_written DESC" ;
			// on envoie la requête
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			// on fait une boucle qui va faire un tour pour chaque enregistrement
			while($data = mysql_fetch_assoc($req)){
				$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg"';
				if (!file_exists($preview_img_url)) {
					$preview_img_url = '/meta/articles/blank/preview_img.jpg"';
				}
				if($results_number <=2){
					$results = $results . '<a href=article.php?id=' . $data['id'] . ' style="text-decoration:none;">' . "\r\n" . '<div class="col-sm-6 col-md-4">' . "\r\n" . '<div class="thumbnail">' . "\r\n" . '<img src="' . $preview_img_url . '" alt="">'. "\r\n" . '<div class="caption">' . "\r\n" . '<h3>' . $data['title'] . '</h3>' . "\r\n" . '<p>' . $data['preview_text'] . '</p>' . "\r\n" . '<p><span class="label label-primary">' . $data['category'] . '</span></p>' . "\r\n" . '</div>' . "\r\n" .'</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . "\r\n";
					$results_number = $results_number + 1;
				} else {
					break;
				}
			}
			//echo $results_number;
			echo $results;
			// on ferme la connexion à mysql
			mysql_close();
		?>
		<?php include("includes/footer.php"); ?>
	</body>
</html>