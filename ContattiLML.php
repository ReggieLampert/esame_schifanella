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


   $connessione = new mysqli("localhost","root","root","maniluna");

?>

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

		<script type="text/javascript" src="js/jquery-1.10.1.js"></script>
       
        <link rel="stylesheet" href="css/style.css">
        


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
          <li><a href="carrelloLML.php"> Carrello (<?php echo count($carrello)?>)</a></li>
		  <li class="active"><a href="#"> Contatti</a></li>
		  
		  
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
			<div id="main">
			 <hr />
        <h2>Scrivici</h2>
        <form action="registracontatti.php"  method="post">
          <fieldset>
            <br>
            <label for="nome">Nome*:</label><br>
            <input type="text" id="nome" name="nome" required class="form-control" size="20"><br>
            <label for="cognome">Cognome*:</label><br>
            <input type="text" id="cognome" name="cognome" required class="form-control" size="20"><br>
            <label for="email">E-mail*:</label><br>
            <input type="email" id="email" name="email" required class="form-control" size="20"><br>
            
            <label for="oggetto_commento">Oggetto del messaggio</label><br>
			<input type="text" name="oggetto" id="oggetto" size="60"/><br><br>
			<label for="messaggio">Inserisci il testo del tuo messaggio*:</label><br>
			<textarea name="testo_messaggio" id="testo_messaggio" cols="50" rows="10" class="required"></textarea>
			<br> <br> <br>
			<input type="submit" value="Invio"> 
          </fieldset>
        
        </form>
      </div>	
			</div>
			
			<!-- Fine #main (contenuti principali) -->
			<!-- Inizio contenuti secondari -->
		<aside id="primaria">
				
				<!-- Inizio sezione ultimi commenti -->
				<div class="widget ultimi-commenti-widget" id="ultimi-commenti">
				<h3>Contatti</h3>
				
					<p>Le Mani e La Luna - P.zza Chiostri del Duomo 19-21, Piacenza (PC)
					<br>
    				lemanielaluna@gmail.com </p>
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
			
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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



