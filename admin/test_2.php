<html>
	<?php include("../includes/header.php"); ?>
	<body>
		<nav class="navbar navbar-static-top navbar-fixed-top navbar-inverse">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../index.php">R&eacute;mi Gascou</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="../index_lab.php">Le LAB</a></li>
						<li><a href="../index_music.php">Musique</a></li>
						<li><a href="../index_photos.php">Photo</a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search" action='search_results.php' method='get'>
						<div class="form-group">
							<input type="text" name="search" class="form-control" placeholder="Rechercher">
						</div>
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>.</button>	
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../curriculum_vitae.php">C.V.</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<center><h1>Ajouter un article</h1></center>
			<br>
			<form role="form" method="post" action="test_2.php" enctype="multipart/form-data">
				<div class="form-group">
					<h3>Titre principal</h3>
					<input type="text" class="form-control" name="title" placeholder="Titre principal">
				</div>
				
					Select image to upload:
					<input type="file" name="header_img" id="fileToUpload">
				<div class="form-group">
					<h3>Titre de preview</h3>
					<textarea class="form-control" style="width:100%;" name="preview_text" placeholder="Titre de preview"></textarea>
				</div>
				<div class="form-group">
					<h3>Catégorie</h3>
					<center>
						<label class="radio-inline"><input type="radio" name="category" value="1">Le LAB</label>
						<label class="radio-inline"><input type="radio" name="category" value="2">Musique</label>
						<label class="radio-inline"><input type="radio" name="category" value="3">Musée de l'informatique</label>
					</center>
				</div>
				<div class="form-group">
					<h3>Texte de l'article</h3>
					<textarea class="form-control" style="width:100%;" rows="13" name="article_text" placeholder="Texte de l'article"></textarea>
				</div>
			<button type="submit" class="btn btn-primary" style="float:right;">Publier</button>
		  </form>
		</div>
		<?php
		// CREATE ID
				$db = mysql_connect('localhost', 'root', 'root');
				if(! $db )
				{
					die("<div class='alert alert-danger' role='alert'>Could not connect: " . mysql_error() . "</div>");
				}
				mysql_select_db('remi_gascou',$db);
				$sql = "SELECT id FROM articles ORDER BY id DESC LIMIT 1;";
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					// on fait une boucle qui va faire un tour pour chaque enregistrement
				while($data = mysql_fetch_assoc($req)){
					$id = $data['id'];
				}
				if($id = ' '){
					$id = 0;
				}
				echo $id;
				
			if(isset($_POST["title"]) && !empty($_POST["title"]) && isset($_POST["preview_text"]) && !empty($_POST["preview_text"]) && isset($_POST["category"]) && !empty($_POST["category"]) && isset($_POST["article_text"]) && !empty($_POST["article_text"])) {
				$title = $_POST['title'];
				$preview_text = $_POST['preview_text'];
				$category = $_POST['category'];
				$article_text = $_POST['article_text'];
				
				
				
				if(! $db )
					{
					  die("<div class='alert alert-danger' role='alert'>Could not connect: " . mysql_error() . "</div>");
					}
				// on sélectionne la base
				mysql_select_db('remi_gascou',$db);
				// on crée la requête SQL
				$sql = "INSERT INTO `remi_gascou`.`articles` (`id`, `title`, `category`, `date_written`, `preview_text`, `article_text`) VALUES ('" . $id . "', '" . $title . "', '" . $category . "', CURRENT_TIMESTAMP, '" . $preview_text . "', '" . $article_text . "');";
				//echo $sql;
				// on fait une boucle qui va faire un tour pour chaque enregistrement
					$data = mysql_query( $sql, $db );
					if(! $data )
					{
					  die("<div class='alert alert-danger' role='alert'>Could not enter data: " . mysql_error() . "</div>");
					}
					echo "<div class='alert alert-success' role='alert' style='margin-top:20px; margin-left:11.5%; margin-right:11.5%;'><center>L'article à été publié. Vous pouvez le consulter <a href='/article.php?id=" . $id . "'>ici</a>.</center></div>";
				// on ferme la connexion à mysql
				mysql_close();
			} else {
				echo "<div class='alert alert-danger' role='alert' style='margin-top:20px; margin-left:11.5%; margin-right:11.5%;'><center>Tout les champs doivent être remplis.</center></div>";
			}
			$tmp_name = $_FILES['header_img']['tmp_name'];
			$final_dir = '/var/www/meta/articles/' . $_FILES['header_img']['name'];
			move_uploaded_file($tmp_name, $final_dir);
			
		?>
		
		<?php include("includes/footer.php"); ?>
	</body>
</html>