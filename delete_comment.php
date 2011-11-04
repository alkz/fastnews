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

  $id_comm = $_GET["id_comm"];
  $id_news = $_GET["id_news"];

  if($_SESSION["permesso"] == 1 || $_SESSION["permesso"] == 2)
  {
    $query = "DELETE FROM commenti WHERE id = '$id_comm'";
    $conn=connect();

    if ($result = mysql_query($query, $conn))
      print "Commento Cancellato<br />";
    else
        die("Errore esecuzione Query: <br />".mysql_error());
    ?>
    <br /><a href="show_commenti.php?id_news=<?php print $id_news ?>&start=0">Indietro</a><br /><br />
    <?php
  }
  else
  {
    print "Non hai i permessi necessari per accedere a questa sezione";
    ?>
    <br /><a href="show_commenti.php?id_news=<?php print $id_news ?>&start=0">Indietro</a><br /><br />
    <?php
    die();
  }


  underMenu();
  credits();
  foot();

?>

