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

    $nick = $_POST["utente"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $permessi = $_POST["permessi"];

    if ($nick == "" || $pass1 == "" || $pass2 == "")
    {
      print "Devi compilare tutti i campi!";
      ?>
      <br /><br /><a href="admin.php">Torna al menu</a><br />
      <?php
      die();
    }

    if($pass1 != $pass2)
    {
      print "Le due password inserite non coincidono!";
      ?>
      <br /><br /><a href="admin.php">Torna al menu</a><br />
      <?php
      die();
    }

    //controllo se l'utente che voglio creare esiste gia'
    $query = "SELECT * FROM users";

    $conn=connect();

    if ($result = mysql_query($query, $conn))
    {
      while ($row = mysql_fetch_assoc($result))
      {
        if (strcmp($nick, $row[utente]) == 0)
        {
          print "Il NickName scelto e' gia' stato utilizzato";
           ?>
           <br /><br /><a href="admin.php">Torna al menu</a><br />
           <?php
           die();
        }
      }
    }
    else
      die("Errore Esecuzione Query".mysql_error());

    $pass = md5($pass1);
    $query2 = "INSERT INTO users(utente, password, permessi) VALUES ('$nick', '$pass', '$permessi')";

    if (mysql_query($query2, $conn))
      print "Utente Aggiunto!";
    else
      die("Errore Esecuzione Query2".mysql_error());

    ?>
    <br /><br /><a href="admin.php">Torna al menu</a><br />
    <?php
  }

  elseif ($_SESSION["permesso"] == 1)
  {
    print "Non hai i permessi per accedere a questa sezione";
    ?>
    <br /><br /><a href="menu.php">Torna al menu</a><br>
    <?php
    die();
  }
    

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>




