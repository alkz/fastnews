<?php

  /*
    ATTENZIONE! LO SCRIPT CANCELLA TUTTO IL CONENUTO DELLE TABELLE: news,users,pass e commenti;
    SENZA CHIEDERE ALCUNA CONFERMA! MEDITARE BENE PRIMA DI ESEGUIRLO.
    E' CONSIGLIABILE NON UPPARLO FINCHE' NON SARA' NECESSARIO UTILIZZARLO(IN QUANTO ESENTE DA OGNI
    CONTROLLO DI AUTENTICAZIONE).
    UOMO AVVISATO...
  */

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

  //includo il file contenete le funzioni
  require_once("functions.inc.php");
  //includo il file contenete le funzioni
  require_once("structure.inc.php");

  top();

  $conn=connect();

  $query="DROP TABLE users,news,commenti,pass";

  if (mysql_query($query, $conn))
  {
    print "Cancellazione effettuata con successo<br />";
    redirect("view.php",6);
  }
  else
  {
    die("Errore durante la cancellazione delle tabelle: ".mysql_error());
  }

  mysql_close($conn);

  credits();
  foot();
?>

