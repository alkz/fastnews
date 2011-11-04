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


  $id = $_GET["id_new"];
  if(!isset($id))
    die("Accesso errato alla sezione");
  $query = "DELETE FROM news WHERE id = '$id'";
  $conn=connect();

  if (mysql_query($query, $conn))
    print"News Cancellata";
  else
    die("Errore inserimento News: ".mysql_error());

  ?>
   <br /><br /><a href="admin.php">Torna al menu</a><br />
  <?php

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>