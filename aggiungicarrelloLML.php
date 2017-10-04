<?php
        error_reporting(E_ALL);
        ini_set( 'display_errors','1');        

        session_start();

        if (isset($_SESSION["carrello"])) {
          $carrello=$_SESSION["carrello"]." ".$_REQUEST["id"];
        } else {
          $carrello=$_REQUEST["id"];
        }

        $_SESSION["carrello"]=$carrello;

        header('Location: carrelloLML.php');
        exit;
  ?>
