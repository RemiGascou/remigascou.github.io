<?php session_start(); $config = parse_ini_file("../includes/config.ini"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ******************************** begin header ******************************** -->
<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="/meta/favicon.png">
<title>Title</title>
<style media="screen">body {margin-top: 70px;}</style>
<!-- ******************************** end header ******************************** -->
    <link href="<?php echo $config['root_folder']; ?>styles/search-box.css" rel="stylesheet">


    <?php
        $err_code="500";
        $err_descr="Page introuvable";
    ?>

</head>
<body>
    <?php include($config["include_path"]."includes/navbar.inc.php"); ?>

    <!-- ******************************** begin ******************************** -->
    <div class="container">
        <center>
            <div class="" style="margin-top:10%;font-size: 250px;"><?php echo $err_code; ?></div>
            <div class="" style="font-size: 75px;"><?php echo $err_descr; ?></div>
        </center>
    </div>
    <!-- ******************************** end ********************************** -->

    <footer class="search-page">
        <?php include($config["include_path"]."includes/footer.inc.php"); ?>
    </footer>

    <?php include($config["include_path"]."includes/scripts.inc.php"); ?>
</body>
</html>
