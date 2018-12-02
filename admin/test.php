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
		<!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
		<form action="test.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="header_img" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
		<?php
			// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
			// doit être utilisée à la place de la variable $_FILES.
			$tmp_name = $_FILES['header_img']['tmp_name'];
			$final_dir = '/var/www/meta/articles/' . $_FILES['header_img']['name'];
			move_uploaded_file($tmp_name, $final_dir);
			echo '<pre>';
			echo 'Voici quelques informations de débogage :';
			echo "\n\r" . 'Copied from : ' . $tmp_name . ' to : ' . $final_dir . "\n\r";
			print_r($_FILES);
			echo '</pre>';
		?>
	</body>
</html>
