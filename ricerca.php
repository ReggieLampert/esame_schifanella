<?php
        error_reporting(E_ALL);
        ini_set( 'display_errors','1');

        session_start();

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


        $connessione = new mysqli("localhost","root","root","maniluna");

        $query_ricerca = "SELECT * FROM prodotti where nome like '%".$_REQUEST["ricerca"]."%' limit 20";

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

      <script>
    var foto=false;

    var aggiungifoto=function() {
      foto=true;
      $("article.schedavg").each(function(){
        var foto=$(this).attr("data-src");
        $(this).prepend("<img class='img-thumbnail img-responsive prodotto hidden-xs' src='img/prodotti/"+foto+"' alt=''/>");
      })
    }


    $(document).ready(function(e) {
      if (document.documentElement.clientWidth>=768 && foto==false) {
        aggiungifoto();
      }



    });

    $(window).resize(function(e) {
      if (document.documentElement.clientWidth>=768 && foto==false) {
        aggiungifoto();
      }
    });

            </script>
      </head>
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
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="Chi_siamoLML.php"> Chi siamo </a></li>
        <li><a href="dove_siamoLML.php"> Dove siamo </a></li>
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
          <li><a href="carrelloLML.php"> Carrello (<?php echo count($carrello)?>)</a></li>
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
       
        <div class="row">
          <div id="colonna1" class="col-xs-12 col-sm-9 colonna">
        <div class="row">
          <div class="col-xs-12 colonna">
                <div class="page-header">
                  <h3>Risultati della ricerca</h3>
                </div>
            </div>
          </div>
            <?php

              if (!($risultato = $connessione->query($query_ricerca)))
                die("Query sui prodotti fallita!");

              $i=1;
              $n=0;
              while ($riga = $risultato->fetch_array()) {
                    $idprodotti=$riga["idprodotti"];
                    $nome = $riga["nome"];
                    $categoria=$riga["categoria"];
                    $descrizione=substr($riga["descrizione"],0,100)."...";
                    $prezzo=$riga["prezzo"];
                    $foto=$riga["foto"];

                    if ($i==1) {
                      echo "<div class='row'>";
                    }

                    echo "<div class='span3'>";
                    echo "<article class='schedavg' data-src='".$foto."'>";
                    echo "<a href='dettaglio_prodotto.php?id=$idprodotti'><img class='img-thumbnail prodotto' src='img/prodotti/$foto' alt=''/></a>";
                    echo "<h5><a href='dettaglio_prodotto.php?id=$idprodotti'>$nome </a></h5>";
                    echo "<p>$categoria";
                    echo " <span class='badge badge-success'>EUR $prezzo</span>";
                    echo "<a href='aggiungicarrello.php?id=".$idprodotti."'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a>";
                    echo "</p>";
                    echo "</article>";
                    echo "</div>";

                    if ($i==3) {
                      echo "</div>";
                      $i=1;
                    } else {
                      $i++;
                    }
                    $n++;
              }
              if ($n>0 && $i!=1) {
                echo "</div>";
              }

              if ($n==0) {
                echo "<p>Nessun prodotto soddisfa i tuoi criteri di ricerca!</p>";
              }

            ?>

          </div>
        </div>
        
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

      </div>
      </body>
      </html>
