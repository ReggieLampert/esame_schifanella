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
					<img alt="titolo" src="img/scrittalogo.png">
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
       
        <div class="main">
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
            
            </div>
           </div>
          </div>
         </div>
         
         
         <div>
     <aside id="social-widget">
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
			</aside>
			
  </div>   
            
      
  <script src="js/bootstrap.min.js"></script>
			<!-- Fine contenuti secondari -->
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
