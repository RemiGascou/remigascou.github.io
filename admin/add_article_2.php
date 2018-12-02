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
			<form role="form" method="post" action="function[add_article].php">
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
		<?php include("includes/footer.php"); ?>
	</body>
</html>