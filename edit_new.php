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


  $testo = $_POST["testo"];
  $titolo = $_POST["titolo"];
  $id_new = $_GET["id_new"];

  if (trim($titolo) == "" || trim($testo) == "" || !isset($id_new))
  {
    redirect("form_edit_news.php",4);
    die("Compila i campi!");
  }

  //formatto il testo togliendo caratteri speciali ecc...
  $titolo = addslashes(stripslashes($titolo));
  $testo = addslashes(stripslashes($testo));

  $titolo = str_replace("<", "&lt;", $titolo);
  $titolo = str_replace(">", "&gt;", $titolo);
  $testo = nl2br($testo);

  $testo = addslashes(stripslashes($testo));
  $titolo = addslashes(stripslashes($titolo));

  $query = "UPDATE news SET testo = '$testo', titolo = '$titolo' WHERE id = '$id_new'";

  $conn=connect();

  if (mysql_query($query, $conn))
  {
      print"News Modificata";
      ?>
      <br /><br /><a href="admin.php">Torna al menu</a><br>
      <?php
  }
  else
    die("Errore durante la modifica della new".mysql_error());


  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>