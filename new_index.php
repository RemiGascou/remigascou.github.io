<html>
	<head>
	<?php include("includes/header.php"); ?>
	<!-- <link rel="stylesheet" href="/style/main_index.css" media="screen"> !-->
	</head>

	<body>
		<?php include("includes/navbar.php"); ?>
		<section style="padding-top:7%; background:url('/meta/img/lyon.jpg') no-repeat center; -webkit-background-size: cover; background-size: cover; width:101.5%; height:100%;" class="container-fluid" id="header-section">
				<h1 class="text-center v-center">Sectionalize.</h1>
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-2 text-center"><h3>Robust</h3><p>There is other content and snippets of details or features that can be placed here..</p><i class="fa fa-cog fa-5x"></i></div>
							</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="row">
								  <div class="col-sm-10 col-sm-offset-1 text-center"><h3>Simple</h3><p>You may also want to create content that compells users to scroll down more..</p><i class="fa fa-user fa-5x"></i></div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="row">
									<div class="col-sm-10 text-center"><h3>Clean</h3><p>In the first 30 seconds of a user's visit to your site they decide if they're going to stay..</p><i class="fa fa-mobile fa-5x"></i></div>
								</div>
							</div>
					  </div><!--/row-->
					<div class="row"><br></div>
				</div><!--/container-->
		</section>
		
		<!--<img style="width: 100%; height:99.5%;" src="/meta/img/lyon.jpg" alt=""/>-->

		
		<div class="row">
			<div class="col-lg-12">
				<?php
					$db = mysql_connect('localhost', 'root', 'root');
					// on sélectionne la base
					mysql_select_db('remi_gascou',$db);
					// on crée la requête SQL
					$sql = "SELECT * FROM articles WHERE 1 ORDER BY date_written DESC" ;
					// on envoie la requête
					$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					// on fait une boucle qui va faire un tour pour chaque enregistrement
					while($data = mysql_fetch_assoc($req)){
						$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg';
						if (!file_exists($preview_img_url)) {
							$preview_img_url = '/meta/articles/blank/preview_img.jpg';
						}
						if($results_number <=2){
							$results = $results . '<a href="article.php?id=' . $data['id'] . '" style="text-decoration:none;">' . "\r\n" . '<div class="col-sm-6 col-md-4">' . "\r\n" . '<div class="thumbnail">' . "\r\n" . '<img src="' . $preview_img_url . '" alt="">' . "\r\n" . '<div class="caption">' . "\r\n" . '<h3>' . $data['title'] . '</h3>' . "\r\n" . '<p>' . $data['preview_text'] . '</p>' . "\r\n" . '<p><span class="label label-primary">' . $data['category'] . '</span></p>' . "\r\n" . '</div>' . "\r\n" .'</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . "\r\n";
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
			</div>
		</div>
		<?php include("includes/footer.php"); ?>
	</body>
</html>