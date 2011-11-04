<?php
  session_start();

  ##############################################
  ###-----------------FastNews----------------##
  ##############################################
  /*==========================================/*
  /*\\ Author    :  Alessandro Carrara(Alkz)\\/*
  /*\\ Version   :  3.0                     \\/*
  /*\\ Created   :  Aug 12  2007            \\/*
  /*\\ ----------------------------         \\/*
  /*\\ Last Update :   Nov 20  2009         \\/*
  /*\\ ----------------------------         \\/*
  /*\\ Country    :   Italy                 \\/*
  /*\\ City       :   Bergamo               \\/*
  /*\\ E-mail     :   alkzx@email.it        \\/*
  /*\\ MSN        :   alkzx@hotmail.it      \\/*
  /*\\ WWW        :   alkz.altrevista.org   \\/*
  /*\\                                      \\/*
  /*\\ ========================================\
  /*\\ ---------------------------------------*/

?>


<?php
  //includo il file contenete la struttura html della pagina
  require_once("structure.inc.php");
  //includo il file contenete le funzioni
  require_once("functions.inc.php");
  top();

  //ricavo i dati dalla query string
  $id_news = $_GET["id_news"];
  //$autore = $_POST["autore"];
  $testo = $_POST["testo"];
  

  if(isset($_SESSION[utente]))
     $autore = $_SESSION["utente"];
  else
     $autore = $_POST["autore"];

  if($testo == "" || !isset($testo) || $autore == "" || !isset($autore) || $id_news == "" || !isset($id_news))
  {
    redirect("form_comment.php?id_news=$id_news",4);
    die("Compila tutti i campi<br />");
  }
  
  //formatto il testo 
  $testo = addslashes(stripslashes($testo));
  $autore = addslashes(stripslashes($autore));
  
  $autore = str_replace("<", "&lt;", $autore);
  $autore = str_replace(">", "&gt;", $autore);
  $testo = nl2br($testo);

  $query = "INSERT INTO commenti(id_news, testo, autore, data) VALUES ('$id_news', '$testo', '$autore', NOW())";
  $conn=connect();

  if ($result = mysql_query($query, $conn))
    print"Commento Aggiunto, <a target=\"_self\" href=\"show_commenti.php?id_news=$id_news&start=0\">vedi commenti</a><br /><br />";
  else
    die("Errore esecuzione query<br />".mysql_error());

  underMenu();
  credits();
  foot();

?>

