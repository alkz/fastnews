<?php

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
  top();
  //file controllore della sessione
  require_once("controller.inc.php");
  //includo il file contenete le funzioni
  require_once("functions.inc.php");


  $titolo = $_POST["titolo"];
  $autore = $_SESSION["utente"];
  $mail = $_POST["mail"];
  $testo = $_POST["testo"];

  if (trim($titolo) == "" || trim($testo) == "" || trim($mail) == "")
  {
    redirect("form_news.php",4);
    die("Compila i campi!");
  }

  //formatto il testo togliendo caratteri speciali ecc...
  $titolo = addslashes(stripslashes($titolo));
  $mail = addslashes(stripslashes($mail));
  $testo = addslashes(stripslashes($testo));

  $titolo = str_replace("<", "&lt;", $titolo);
  $titolo = str_replace(">", "&gt;", $titolo);
  $autore = str_replace("<", "&lt;", $autore);
  $autore = str_replace(">", "&gt;", $autore);
  $testo = nl2br($testo);

  $query = "INSERT INTO news (titolo, testo, data, autore, mail) VALUES ('$titolo', '$testo', NOW(), '$autore', '$mail')";

  $conn=connect();
  if (mysql_query($query, $conn))
    print"News Inserita!<br /><br /><a href=\"admin.php\">Torna al menu</a><br /><br />";
  else
    die("Errore inserimento News: ".mysql_error());


  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>