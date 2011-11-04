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
  require("structure.inc.php");
  top();
  //file controllore della sessione
  require("controller.inc.php");

  //includo il file contenente le informazioni sul database
  require("functions.inc.php");



  //ditruggo tutti id ati della sessione e dell'array $_SESSION
  $_SESSION["utente"] = NULL;
  $_SESSION["password"] = NULL;
  $_SESSION["permesso"] = NULL;
  $_SESSION["id_utente"] = NULL;
  session_destroy();

  print "Logout Effettuato con successo, attendere qualche istante...<br /><br />";
  redirect("/index.php",5);

  underMenu();
  credits();
  foot();

?>