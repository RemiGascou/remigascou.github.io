<html>
	<?php include("includes/header.php"); ?>
	<body>
		<?php include("includes/navbar.php"); ?>
			
		<?php
		if(isset($_GET["search"])) {
			if(!empty($_GET["search"])){
				$results_number = 0;
				$results_info = "";
				$search = $_GET['search'];
				// on se connecte à MySQL
				$db = mysql_connect('localhost', 'root', 'root');
				// on sélectionne la base
				mysql_select_db('remi_gascou',$db);
				// on crée la requête SQL
				$sql = "SELECT * FROM articles WHERE title LIKE '%" . $search . "%'" ;
				// on envoie la requête
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				// on fait une boucle qui va faire un tour pour chaque enregistrement
				while($data = mysql_fetch_assoc($req)){	
					$results = $results . '<a href=article.php?id=' . $data['id'] . ' style="text-decoration:none;">' . "\r\n" . '<div class="col-sm-6 col-md-4">' . "\r\n" . '<div class="thumbnail">' . "\r\n" . '<img src="meta/articles/' . $data['id'] . '/preview_img.jpg" alt="">' . "\r\n" . '<div class="caption">' . "\r\n" . '<h3>' . $data['title'] . '</h3>' . "\r\n" . '<p>' . $data['preview_text'] . '</p>' . "\r\n" . '<p><span class="label label-primary">' . $data['category'] . '</span></p>' . "\r\n" . '</div>' . "\r\n" .'</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . "\r\n";
					$results_number = $results_number + 1;
				}
				// echo $results_number;
				// on ferme la connexion à mysql
				mysql_close();
				if($results_number == 1) {
					$results_info = "<div class='alert alert-success' role='alert'>There is <B>" . $results_number . "</B> result for your search : " . '"' . $search . '"</div>';
				} else {
					if($results_number == 0) {
						$results_info = "<div class='alert alert-danger' role='alert'>There isn't any result for your search : " . '"' . $search . '"</div>';
					} else {
						$results_info = "<div class='alert alert-success' role='alert'>There is <B>" . $results_number . "</B> results for your search : " . '"' . $search . '"</div>';
					}
				}
			}
		}
			echo $results_info;
		?>
		<div class="row">
			<?php echo $results; ?>
		</div>
		
		<?php $results_number=0; ?>
		<?php include("includes/footer.php"); ?>
	</body>
</html>




