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

  if ($_SESSION["permesso"] == 2)
  {

    $id = $_GET["id_utente"];
    $nick = $_GET["nick"];

    if(!isset($id))
      die("Accesso errato alla sezione!");

    if($id == 1)
    {
      print "L'utente Amministratore non puo' essere cancellato!";
      ?>
      <br /><br /><a href="admin.php">Torna al menu</a><br />
      <?php
      die();
     }
     else
     {
       print "Sei sicuro di voler cancellare l'utente: $nick?<br />clicca <a href=\"delete_utente.php?id_utente=$id&nick=$nick\">qui</a>";
       ?>
       <br /><br /><a href="admin.php">Torna al menu</a><br />
       <?
     }
  }
  elseif ($_SESSION["permesso"] == 1)
  {
    print"Non hai i permessi per accedere a questa sezione";
    ?>
    <br /><br /><a href="admin.php">Torna al menu</a><br />
    <?php
    die();
  }

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>