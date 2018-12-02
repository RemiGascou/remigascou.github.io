<html>
	<?php include("../includes/header.php"); ?>
	<?php if (isset($_GET["article_id"]) && !empty($_GET["article_id"])){
		// on se connecte à MySQL
		$db = mysql_connect('localhost', 'root', 'root');
		if(! $db )
		{
			die("<div class='alert alert-danger' role='alert'>Could not connect: " . mysql_error() . "</div>");
		}
		// on sélectionne la base
		mysql_select_db('remi_gascou',$db);
		// on crée la requête SQL
		$sql = "UPDATE `remi_gascou`.`articles` SET `title` = '" .  . "',`category` = '" .  . "',`date_written` = CURRENT_TIMESTAMP ,`preview_text` = 'Ecrit un peu plus tot ',`article_text` = '" . $article_text . "' WHERE `articles`.`id` = " . $GET['article_id'] . ";";
		//echo $sql;
		// on fait une boucle qui va faire un tour pour chaque enregistrement
		$data = mysql_query( $sql, $db );
		if(! $data ){
			die("<div class='alert alert-danger' role='alert'>Could not enter data: " . mysql_error() . "</div>");
		}
		echo "<div class='alert alert-success' role='alert' style='margin-top:20px; margin-left:12.5%; margin-right:12.5%;'>Entered data successfully</div>";
		// on ferme la connexion à mysql
		mysql_close();
	} else {
		echo "<div class='alert alert-danger' role='alert' style='margin-top:20px; margin-left:12.5%; margin-right:12.5%;'>No article with this id.</div>";
	}
	?>
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
			<form role="form" method="post" action="add_article.php">
				<div class="form-group">
					<h3>Titre principal</h3>
					<input type="text" class="form-control" name="title" placeholder="Titre principal">
				</div>
				<div class="form-group">
					<h3>Titre de preview</h3>
					<textarea class="form-control" style="width:100%;" name="preview_text" placeholder="Titre de preview"></textarea>
				</div>
				<div class="form-group">
					<h3>Catégorie</h3>
					<input type="text" class="form-control" name="category" placeholder="Catégorie">
				</div>
				<div class="form-group">
					<h3>Texte de l'article</h3>
					<textarea class="form-control" style="width:100%;" rows="13" name="article_text" placeholder="Texte de l'article"></textarea>
				</div>
			<button type="submit" class="btn btn-primary" style="float:right;">Publier</button>
		  </form>
		</div>

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
		
		<?php include("includes/footer.php"); ?>
	</body>
</html>