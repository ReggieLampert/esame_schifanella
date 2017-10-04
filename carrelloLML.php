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
        

		<link rel="stylesheet" href="css/style.css">
         <!--foglio di stile per bootstrap-colonne-->
        <link rel="stylesheet" href="css/bootstrap.min.css">

		<script type="text/javascript" src="js/jquery-1.10.1.js"></script>
        
		<script type="text/javascript">

  $(document).ready(function(e) {

    $("#svuotacarrello").click(function(event) {
      console.log("svuoto il carrello");
      window.location.href="svuotacarrelloLML.php";
    });

  });

  </script>
</head>
<body>

  <?php

  if (!isset($_SESSION["carrello"])) {
    $_SESSION["carrello"]="";
  }

//$_SESSION["carrello"]="18";

  if ($_SESSION["carrello"]=="") {
    $carrello=array();
  } else {
    $carrello=explode(" ",trim($_SESSION["carrello"]));
    $carrello=array_unique($carrello);
  }

  $connessione = new mysqli("localhost","root","root","maniluna");


  $totale=0;
  if (count($carrello)>0) {
    $carrello_string=implode(",", $carrello);
	  var_dump($carrello_string);
    $query_carrello="select * from prodotti where idprodotti in ($carrello_string)";
  }

  ?>

  <div id="container">
			<header>
				<!-- Inizio sezione logo -->
				<div id="logo">
					<img alt="logo" src="img/logo-trasparente.png">
					<img alt="titolo" src="img/scrittalogo.png">
				</div>
				<!-- Fine sezione logo -->
				
				
				<!-- Inizio barra di navigazione -->
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
        <li> <a href="Chi_siamoLML.php"> Chi siamo </a></li>
        <li> <a href="dove_siamoLML.php"> Dove siamo </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Prodotti <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="prodottiLML.php">Tutti i prodotti</a></li>
            <li><a href="AlbumAgende.php">Album e agende</a></li>
			<li><a href="Borse.php">Borse</a></li>
            <li><a href="Zaini.php">Zaini</a></li>
            <li><a href="Cartelle.php">Cartelle</a></li>
			<li><a href="Varie.php">Varie</a></li>
           </ul>  
          </li>
          <li><a href="PersonalizzazioniLML.php"> Personalizzazioni</a></li>
          <li class="active"><a href="#"> Carrello (<?php echo count($carrello)?>)</a></li>
		  <li><a href="ContattiLML.php"> Contatti</a></li>
		  
		  
	  <!-- Inizio box di ricerca -->
		<form class="navbar-form navbar-right" role="search" action="ricerca.php" method="post">
          <div class="input-group">
            <input name="ricerca" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
           </div>
       </form>
		<!-- Fine box di ricerca -->
	     
	   </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  
</nav>
				<!-- Fine navigazione principale -->
			</header>


    <div class="row">
      	<div id="colonna1" class="col-xs-12 col-sm-9 colonna">
        <div class="row">
          <div class="col-xs-12 colonna">
            <div class="page-header">
              <h3>Il tuo carrello</h3>
            </div>
            <?php

            if (count($carrello)>0) {

              $totale=0;
              if (!($risultato = $connessione->query($query_carrello)))
                die("Query su carrello fallita!".json_encode($connessione->error));

              echo '<table class="table table-striped">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>#</th>';
              echo '<th>Prodotto</th>';
              echo '<th>Prezzo</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              $i=1;
              while ($riga = $risultato->fetch_array()) {
                $idprodotti = $riga["idprodotti"];
                $nome = $riga["nome"];
                $prezzo=$riga["prezzo"];

                $totale=$totale+$prezzo;

                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td><a href='dettaglio_prodotto.php?id=$idprodotti'>$nome</a></td>";
                echo "<td>$prezzo</td>";
                echo "</tr>";

                $i++;
              }
              echo "</tbody>";
              echo "</table>";
              echo "<p>Totale: $totale EURO</p>";
              //echo "<form action='aggiungiordine.php' method='post'>";
              echo "<input type='hidden' name='totale' value='".$totale."'/>";
              echo "<button class='btn btn-primary' type='submit'> Prosegui con l'ordine </button>";
              echo "<button class='btn' type='button' id='svuotacarrello'>Svuota il carrello</button>";
              echo "</form>";

              echo "<p>Informativa sul regolamento di vendita <a href='#myModal' role='button' class='btn' data-toggle='modal'>link</a></p>";

            } else {
              echo "<p>Il tuo carrello &egrave; vuoto!</p>";
            }
            ?>

          </div>
        </div>
      </div>
    	
     <aside id="social-widget" class="col-md-3 colonna">
				<!-- Inizio sezione categorie e tag -->
				<div class="widget categorie-widget" id="categorie">
					<h3>Prodotti</h3>
					<ul>
						<li>
							<a href="AlbumAgende.php">Album e Agende</a>
						</li>
						<li>
							<a href="Borse.php">Borse</a>
						</li>
						<li>
							<a href="Zaini.php">Zaini</a>
						</li>
						<li>
							<a href="Cartelle.php">Cartelle</a>
						</li>
						<li>
							<a href="Varie.php">Varie</a>
						</li>
						<li>
							<a href="PersonalizzazioniLML.php">Personalizzazioni</a>
						</li>
					</ul>
					
					<h3>Social</h3>
						<!-- Inizio link e icone social -->
				<div class="widget social-widget" id="social">
					<ul>
                        <li>
							<a href="https://www.facebook.com/lemanielalunapiacenza/" id="facebook"> Seguici su Facebook </a>
						</li>
						<li>
							<a href="https://www.instagram.com/lemanielaluna/?hl=it" id="instagram"> Seguici su Instagram </a>
						</li>
						<li>
							<a href="#" id="mailinglist"> Mailing list </a>
						</li>
						
					</ul>
				</div>
				<!-- Fine link e icone social -->
				</div>
				<!-- Fine sezione categorie e tag -->			
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	</div>
     </div>
       

    <script src="js/bootstrap.min.js"></script>
    <!-- footer -->
	    <div>	
			<footer>
				<ul id="legal">
					<li>
						Le Mani e La Luna di Longinotti &amp; C. snc - P.zza Chiostri del Duomo 19-21, Piacenza (PC) </li>
					<li> P.IVA 01059120335 - Iscr. Trib. di Piacenza n°12292 - Iscr. Reg. Ditte n°124431 
					</li>
					<li>
						Tel: <a href="tel:+390523338117">+39 0523 338117</a>
					</li>
					<li>
						Written by Anna Buonocore and Sara Mastaglia
					</li>
				</ul>
			</footer>
		</div>
		<!-- Fine footer -->
		
		
</body>
</html>
