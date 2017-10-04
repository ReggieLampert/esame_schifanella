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
        

	
        <link rel="stylesheet" href="css/flexslider.css">
         <!--foglio di stile per bootstrap-colonne-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
	    <link rel="stylesheet" href="css/style.css">
	    
		<script type="text/javascript" src="js/jquery-1.10.1.js"></script>
        
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        
		<script type="text/javascript">
			
			$(window).load(function() {
	
	if (document.documentElement.clientWidth >= 768) {
	$("#slide1").append("<a href='#'><img src='img/flexslider/1album.png' class='slide'></a>");
    $("#slide1").append("<p class='flex-caption'><a href='AlbumAgende.php'> Album </a></p>")
	
	$("#slide2").append("<a href='#'><img src='img/flexslider/2borse.png' class='slide'></a>");
    $("#slide2").append("<p class='flex-caption'><a href='Borse.php'> Borse </a></p>")
	
	$("#slide3").append("<a href='#'><img src='img/flexslider/3dettagli.png' class='slide'></a>");
    $("#slide3").append("<p class='flex-caption'><a href='PersonalizzazioniLML.php'> Attenzione per il dettaglio </a></p>")
	
}
	
  $('.flexslider').flexslider({
    animation: 'slide'
  });
});
		</script>
		
<?php	
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
			</header>

			<!-- Fine header -->

			<!-- Inizio slideshow contenuti in evidenza -->
            <div id="inevidenza" class="flexslider">
              <ul class="slides">
                <li id="slide1">
                </li>
                <li id="slide2">
                </li>
                <li id="slide3">
                </li>
              </ul>
            </div>
            <!-- Fine slideshow contenuti in evidenza -->

			<!-- Inizio #main (contenuti principali) -->
			<div id="main">
				<!-- Inizio sezione ultimi articoli -->
				<article class="post" id="post-1">
					<time datetime="2017-09-11">
						11 Settembre 2017
					</time>
					<h2><a href="#">Agende</a></h2>
					<img alt="agende" src="img/articoli/agende.jpg">
					<p>
						Cominciano le scuole e le agende 16 mesi stanno terminando: correte!
					</p>
				</article>
				
				<article class="post" id="post-2">
				<time datetime="2017-08-28">
						28 Agosto 2017
					</time>
					<h2><a href="#">Scopri i nostri saldi</a></h2>
					<img alt="saldi" src="img/articoli/saldi_sandali.jpg">
					<p>
						L'estate è agli sgoccioli: scopri i nostri saldi sugli articoli estivi.
					</p>
				</article>
				<article class="post" id="post-3">
					<time datetime="2012-03-18">
						18 Marzo 2012
					</time>
					<h2><a href="#">Nuove borse in arrivo</a></h2>
					<img alt="borse" src="img/articoli/borsa_pesci.JPG">
					<p>
						Nuove borse e pochette in pelle.
					</p>
				</article>
			
				<!-- Fine sezione articoli -->
			</div>
			
			<!-- Fine #main (contenuti principali) -->
			<!-- Inizio contenuti secondari -->
		<aside id="primaria">
				
				<!-- Inizio sezione ultimi commenti -->
				<div class="widget ultimi-commenti-widget" id="ultimi-commenti">
					<h3>Ultimi commenti</h3>
					<div class="commenti">
						<ul class="lista-commenti">
							<li>
								<span class="autore-commenti"><a href="#">Barbara
									Rossi</a></span>: <span class="testo-commenti">Magnifico negozio!!!</span>
							</li>
							<li>
								<span class="autore-commenti"><a href="#">Luigi
									Bianconi</a></span>: <span class="testo-commenti">Per lavori in cuoio di piccole, medie e grandi dimensioni.
                                    Gentilezza e cura dei dettagli sono di casa oltre che, se necessario, una rapidità eccezionale. </span>
							</li>
							<li>
								<span class="autore-commenti"><a href="#">Marco Lorenzi</a></span>: <span class="testo-commenti"> Ho commissionato una borsa porta computer e me l'hanno realizzata su misura! Perfetta e personalizzata. </span>
							</li>
							<li>
								<span class="autore-commenti"><a href="#">Monica
						          Navelli</a></span>: <span class="testo-commenti">Meravigliose! Per non parlare delle borse...</span>
							</li>
							
	
						</ul>
					</div>
				</div>
				<!-- Fine sezione ultimi commenti -->
			</aside>

			<aside id="secondaria">
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
  <!--! Fine #container -->

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