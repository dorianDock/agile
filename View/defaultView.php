<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Avis citoyen</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.0.0/examples/justified-nav/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <!--<h3 class="text-muted">Avis citoyen</h3>-->
        <ul class="nav nav-justified">
          <li id="accueil"><a href="index.php">Accueil</a></li>
          <li id="idees"><a href="#">Toutes les idées</a></li>
          <li id="qui-sommes-nous"><a href="who-we-are">Qui sommes-nous ?</a></li>
        </ul>
      </div>

     <?php echo $_html; ?>
	
	<!-- Site footer -->
	<div class="footer">
		<p>&copy; Mines Douai 2013</p>
	</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>