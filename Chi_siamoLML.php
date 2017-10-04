<?php
	error_reporting(E_ALL);
    ini_set( 'display_errors','1');
    session_start();

if (!isset($_SESSION["carrello"])) {
      $_SESSION["carrello"]="";
    }

    if ($_SESSION["carrello"]=="") {
     $carrello=array();
    } else {
     $carrello=explode(" ",trim($_SESSION["carrello"]));
     $carrello=array_unique($carrello);
    }


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

		<!--<script type="text/javascript" src="js/jquery-1.10.1.js"></script>-->
        
     	<link rel="stylesheet" href="css/style.css"> 
        <script src="js/jquery-1.11.3.js"></script>
		<script src="js/jquery.lazyload.js"></script>
        
       <script>
			$(document).ready( function(){
					$("img.lazy").lazyload({
						 effect : "fadeIn",
						 effect_speed:1100
					});
				});
		</script>
		

<!-- Formattazione menu per il mobile -->
<script type="text/javascript">
$(function() {
  var collapsed = true;
  $('nav>h2').click(function() {
    collapsed = !collapsed;
    formatSidebar();
  });
  $(window).resize(formatSidebar);
  formatSidebar();

  function formatSidebar() {
    if ($(window).width() > 767) {
      $('nav').removeClass('collapsible');
      $('nav ul#menu-principale').show();
    } else {
      $('nav').addClass('collapsible');
      if (collapsed) { 
        $('nav ul#menu-principale').hide("fast");
        $('nav > h2').removeClass('minus');
      } else {
        $('nav ul#menu-principale').show("fast");
        $('nav > h2').addClass('minus');
      }
    }
  };
});
</script>
<!-- Fine formattazione menu per il mobile -->
	</head>

	<body>
	
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
        <li class="active"> <a href="#"> Chi siamo </a></li>
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
			</header>

			<!-- Fine header -->


			<!-- Inizio #main (contenuti principali) -->
			<div id="main" class="col-xs-12 col-sm-9 colonna">
				<!-- Inizio sezione chi siamo-->
					<article>
					<h2>Gli inizi</h2>
					
					<p>
				    Siamo quattro donne che nel 1991 hanno rilanciato la bottega "LE MANI e LA LUNA" nata da un'esperienza cooperativa degli anni Ottanta.
					</p>
					<div>
			 		<img class="lazy" alt="agende" data-original="img/chi_siamo/1.jpg">
				    </div>
				    </article>
				    <article>
					<h2>Cosa facciamo</h2>
					
					<p>
					Siamo partite da semplici manufatti in cuoio cucito a mano per arrivare, oggi, a realizzare un'infinita gamma di articoli, anche su richiesta dei clienti, utilizzando molteplici tipi di pelli.
					</p>
					<img class="lazy" alt="saldi" data-original="img/chi_siamo/2.jpg">
					</article>
					<article>
					<h2>I materiali</h2>
					
					<p>
                    Oltre a porre molta attenzione alla scelta delle materie prime in modo da garantire una durata pressochè illimitata dei vostri prodotti, prestiamo particolare attenzione al rispetto dell'ambiente utilizzando preferibilmente pelli a concia vegetale.
					</p>
			        <img class="lazy" alt="borse" data-original="img/chi_siamo/3.jpg">
			        </article>
			        <h2>Altro</h2>
					<p>Non solo realizziamo i prodotti, ma è anche possibile richiedere delle personalizzazioni e rimodernare i vecchi pezzi non più utilizzati. Chiedete e vi aiuteremo nelle vostre scelte!</p>
				<br>
				<br>
				<br>
			</div>
			
			<!-- Fine contenuti principali -->
			
			<!-- Inizio contenuti secondari -->
		<aside id="social-widget" class="col-md-3 colonna">
				
		
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
  <!--! Fine #container-->

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