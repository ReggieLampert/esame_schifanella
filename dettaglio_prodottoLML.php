<?php
        error_reporting(E_ALL);
        ini_set( 'display_errors','1');

        session_start();  
 ?>
       
         <!DOCTYPE html>
      <html>
      <head>
      <meta charset="UTF-8">
		<title>Le mani e la luna</title>
        
        <meta name="keywords" content="leather, shop, craft, handicraft, handmade, artisan">
        <meta name="description" content="Shop">
        <meta name="authors" content="Anna Buonocore, Sara Mastaglia">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        

		
         <!--foglio di stile per bootstrap-colonne-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<script type="text/javascript" src="js/jquery-1.10.1.js"></script>

      </head>
      <body>

<?php
      
        if (!isset($_SESSION["carrello"])) {
          $_SESSION["carrello"]="";
        }

        //$_SESSION["carrello"]="7887";

        if ($_SESSION["carrello"]=="") {
          $carrello=array();
        } else {
          $carrello=explode(" ",trim($_SESSION["carrello"]));
          $carrello=array_unique($carrello);
        }

        if (isset($_REQUEST["id"])) {
          $idprodotti=$_REQUEST["id"];
        }

        $connessione = new mysqli("localhost","root","root","maniluna");


        $query_prodotto = "SELECT * FROM prodotti where idprodotti=$idprodotti ";

  ?>

       <body>
       	<div id="logo">
					<img alt="logo" src="img/logo-trasparente.png">
				</div>
				
    <nav class="navbar navbar-default">
  <div class="container">
				  <!--visualizzazione menù a panino da display piccolo-->
   <span class="social social-facebook"></span>
	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   
    </div>
     

    <!-- barra del menù -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"> Home <span class="sr-only">(current)</span></a></li>
        <li><a href="Chi_siamoLML.php"> Chi siamo </a></li>
        <li><a href="dove_siamoLML.php"> Dove siamo </a></li>
        <li class="active">
          <a href="prodottiLML.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Prodotti <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="AlbumAgende.php">Album e agende</a></li>
			<li><a href="Borse.php">Borse</a></li>
            <li><a href="Zaini.php">Zaini</a></li>
            <li><a href="Cartelle.php">Cartelle</a></li>
			<li><a href="Varie.php">Varie</a></li>
          </ul>  
        </li>
          <li><a href="PersonalizzazioniLML.php">Personalizzazioni</a></li>
          <li><a href="carrelloLML.php"> Carrello (<?php echo count($carrello)?>)</a></li>
		  <li><a href="ContattiLML.html">Contatti</a></li>
		  </div>
       
        <div class="row">
          <div id="colonna1" class="col-xs-12 col-sm-9 colonna">
        <div class="row">
          <div class="col-xs-12 colonna">

            <?php

              if (!($risultato = $connessione->query($query_prodotto)))
                die("Query su dettaglio prodotto fallita!");

              if ($riga = $risultato->fetch_array()) {
                    $idprodotti=$riga["idprodotti"];
                    $nome = $riga["nome"];
                    $categoria=$riga["categoria"];
                    $descrizione=$riga["descrizione"];
                    $prezzo=$riga["prezzo"];
                    $foto=$riga["foto"];

                    echo "<a href='dettaglio_prodottoLML.php?id=$idprodotti'><img class='img-thumbnail img-responsive dettaglio_prodottoLML' src='img/prodotti/$foto' alt=''/></a>";
                    echo "<h2>$nome</h2>";
                    echo "<h5>$categoria</h5>";
                    echo "<p>$descrizione";
                    echo " <span class='badge badge-success'>EUR $prezzo</span>";
                    echo "<a href='aggiungicarrelloLML.php?id=$idprodotti'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a>";
                    echo "</p>";
              }
            ?>
        <div class="page-header">
                 
                </div>
  <script src="js/bootstrap.min.js"></script>
			<!-- Fine contenuti secondari -->
     
    
      </body>
      </html>
