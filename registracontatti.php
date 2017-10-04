<?php
  $email = $_REQUEST["email"];
  $nome = $_REQUEST["nome"];
  $cognome = $_REQUEST["cognome"];
  
  //$servername = "localhost";
  //$username = "root";
  //$pwdserver = "root";
  //$dbname = "mionegozio";
  
  //$conn = mysqli_connect($servername,$username,$pwdserver);

  $connessione = new mysqli("localhost","root","root","maniluna");
  
  
  $query_contatti = "INSERT INTO contatti(email, nome, cognome) VALUES ('$email','$nome','$cognome')";

 if (!($risultato = $connessione->query($query_contatti)))
                die("Query su contatti fallita!".json_encode($connessione->error));
  
  header('Location: ContattiLML.php');
  exit();
?>
