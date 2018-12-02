<html>
	<?php include("../includes/header.php"); ?>
	<body>
		<?php include("../includes/navbar.php"); ?>
		<?php
		if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["state"]) && !empty($_GET["state"])) {
			$id = $_GET['id'];
			$state = $_GET['state'];
			// ERREUR
			if($state = '-1') {
				
			}
			// Tout va bien
			if($state = '0') {
				
			}
			
			if($state = '1') {
				
			}
		} else {
			header("Location: /admin/index.php");
		}
		?>
		
		<?php include("includes/footer.php"); ?>
	</body>
</html>