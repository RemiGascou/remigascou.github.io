<html>
	<head>
	<?php include("includes/header.php"); ?>
	<!-- <link rel="stylesheet" href="/style/main_index.css" media="screen"> !-->
	</head>

	<body>
		<?php include("includes/navbar.php"); ?>
		<section style="padding-top:6%; background:url('/meta/img/lyon.jpg') no-repeat center; -webkit-background-size: cover; background-size: cover; width:101.5%; height:100%;" class="container-fluid" id="header-section">
				<h1 class="text-center v-center">Sectionalize.</h1>
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-2"><h3><center>Le LAB</center></h3>
									<p>
										<?php
											$db = mysql_connect('localhost', 'root', 'root');
											// on sélectionne la base
											mysql_select_db('remi_gascou',$db);
											// on crée la requête SQL
											$sql = "SELECT * FROM articles WHERE category LIKE '1' ORDER BY date_written DESC LIMIT 1" ;
											// on envoie la requête
											$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
											// on fait une boucle qui va faire un tour pour chaque enregistrement
											while($data = mysql_fetch_assoc($req)){
												$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg';
												if (!file_exists($preview_img_url)) {
													$preview_img_url = '/meta/articles/blank/preview_img.jpg';
												}
												$category = "Le LAB";
												$results = 
													$results . '
													<a href="article.php?id=' . $data['id'] . '" style="text-decoration:none;">' . "\r\n" . '
														<div class="row">
															<div class="col-sm-12 col-md-12">' . "\r\n" . '
																<div class="thumbnail">' . "\r\n" . '
																	<img src="' . $preview_img_url . '" alt="">' . "\r\n" . '
																	<div class="caption">' . "\r\n" . '
																	<h3>' . $data['title'] . '</h3>
																	' . "\r\n" . '
																	<p>' . $data['preview_text'] . '</p>' . "\r\n" . '
																	<p><span class="label label-primary">' . $category . '</span></p>' . "\r\n" . '
																	</div>' . "\r\n" .'
																</div>' . "\r\n" . '
															</div>
														</div>' . "\r\n" . '
													</a>' . "\r\n" . "\r\n";
											}
											//echo $results_number;
											echo $results;
											$results = '';
											// on ferme la connexion à mysql
											mysql_close();
										?>
									<!--<i class="fa fa-cog fa-5x fa-spin"></i>!-->
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1"><h3><center>Musique</center></h3>
								<p>
									<?php
										$db = mysql_connect('localhost', 'root', 'root');
										// on sélectionne la base
										mysql_select_db('remi_gascou',$db);
										// on crée la requête SQL
										$sql = "SELECT * FROM articles WHERE category LIKE '2' ORDER BY date_written DESC LIMIT 1" ;
										// on envoie la requête
										$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
										// on fait une boucle qui va faire un tour pour chaque enregistrement
										while($data = mysql_fetch_assoc($req)){
											$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg';
											if (!file_exists($preview_img_url)) {
												$preview_img_url = '/meta/articles/blank/preview_img.jpg';
											}
											$category = "Musique";
											$results = 
												$results . '
												<a href="article.php?id=' . $data['id'] . '" style="text-decoration:none;">' . "\r\n" . '
													<div class="row">
														<div class="col-sm-12 col-md-12">' . "\r\n" . '
															<div class="thumbnail">' . "\r\n" . '
																<img src="' . $preview_img_url . '" alt="">' . "\r\n" . '
																<div class="caption">' . "\r\n" . '
																<h3>' . $data['title'] . '</h3>
																' . "\r\n" . '
																<p>' . $data['preview_text'] . '</p>' . "\r\n" . '
																<p><span class="label label-primary">' . $category . '</span></p>' . "\r\n" . '
																</div>' . "\r\n" .'
															</div>' . "\r\n" . '
														</div>
													</div>' . "\r\n" . '
												</a>' . "\r\n" . "\r\n";
										}
										//echo $results_number;
										echo $results;
										$results = '';
										// on ferme la connexion à mysql
										mysql_close();
									?>
									<!--<i class="fa fa-user fa-5x"></i>!-->
								</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10"><h3><center>Mus&eacute;e de l'informatique</center></h3>
									<p>
										<?php
											$db = mysql_connect('localhost', 'root', 'root');
											// on sélectionne la base
											mysql_select_db('remi_gascou',$db);
											// on crée la requête SQL
											$sql = "SELECT * FROM articles WHERE category='3' ORDER BY date_written DESC LIMIT 1" ;
											// on envoie la requête
											$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
											// on fait une boucle qui va faire un tour pour chaque enregistrement
											while($data = mysql_fetch_assoc($req)){
												$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg';
												if (!file_exists($preview_img_url)) {
													$preview_img_url = '/meta/articles/blank/preview_img.jpg';
												}
												$category = "Musée de l'informatique";
												$results = 
													$results . '
													<a href="article.php?id=' . $data['id'] . '" style="text-decoration:none;">' . "\r\n" . '
														<div class="row">
															<div class="col-sm-12 col-md-12">' . "\r\n" . '
																<div class="thumbnail">' . "\r\n" . '
																	<img src="' . $preview_img_url . '" alt="">' . "\r\n" . '
																	<div class="caption">' . "\r\n" . '
																	<h3>' . $data['title'] . '</h3>
																	' . "\r\n" . '
																	<p>' . $data['preview_text'] . '</p>' . "\r\n" . '
																	<p><span class="label label-primary">' . $category . '</span></p>' . "\r\n" . '
																	</div>' . "\r\n" .'
																</div>' . "\r\n" . '
															</div>
														</div>' . "\r\n" . '
													</a>' . "\r\n" . "\r\n";
											}
											//echo $results_number;
											echo $results;
											// on ferme la connexion à mysql
											mysql_close();
										?>
										<!--<i class="fa fa-mobile fa-5x"></i>!-->
									</p>
								</div>
							</div>
						</div>
					  </div><!--/row-->
					<div class="row"><br></div>
				</div><!--/container-->
		</section>
		
		
		
		<section style="padding-top:6%; background:url('/meta/img/lyon.jpg') no-repeat center; -webkit-background-size: cover; background-size: cover; width:101.5%; height:100%;" class="container-fluid" id="header-section">
				<h1 class="text-center v-center">Sectionalize.</h1>
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-2"><h3><center>Le LAB</center></h3>
									<p>
									<!--<i class="fa fa-cog fa-5x fa-spin"></i>!-->
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1"><h3><center>Musique</center></h3>
								<p>
									<!--<i class="fa fa-user fa-5x"></i>!-->
								</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-10 text-center"><h3><center>Mus&eacute;e de l'informatique</center></h3>
									<p>
										<!--<i class="fa fa-mobile fa-5x"></i>!-->
									</p>
								</div>
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
					$sql = "SELECT * FROM articles WHERE 1 ORDER BY date_written DESC LIMIT 3" ;
					// on envoie la requête
					$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					// on fait une boucle qui va faire un tour pour chaque enregistrement
					while($data = mysql_fetch_assoc($req)){
						$preview_img_url = '/meta/articles/' . $data['id'] . '/preview_img.jpg';
						if (!file_exists($preview_img_url)) {
							$preview_img_url = '/meta/articles/blank/preview_img.jpg';
						}
						$category = "Non classé";
						if($data['category'] = '1'){
							$category = "Le LAB";
						}
						if($data['category'] = '2'){
							$category = "Musique";
						}
						if($data['category'] = '3'){
							$category = "Musée de l'informatique";
						}
						$results = $results . '<a href="article.php?id=' . $data['id'] . '" style="text-decoration:none;">' . "\r\n" . '<div class="col-sm-6 col-md-4">' . "\r\n" . '<div class="thumbnail">' . "\r\n" . '<img src="' . $preview_img_url . '" alt="">' . "\r\n" . '<div class="caption">' . "\r\n" . '<h3>' . $data['title'] . '</h3>' . "\r\n" . '<p>' . $data['preview_text'] . '</p>' . "\r\n" . '<p><span class="label label-primary">' . $category . '</span></p>' . "\r\n" . '</div>' . "\r\n" .'</div>' . "\r\n" . '</div>' . "\r\n" . '</a>' . "\r\n" . "\r\n";
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