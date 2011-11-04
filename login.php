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
  //news per pagina
  define('STEP',3);
  //numero massimo di pagine da mostrare
  define('MAXPAGES',20);
  top();

  $conn=connect();

  $nick = $_POST["utente"];
  $pass = md5($_POST["password"]);
  $login=false;

  $query = "SELECT * FROM users WHERE utente = '$nick'";

  if ($result = mysql_query($query, $conn))
  {
    //cerco l'utente inserito nel database
    while ($row = mysql_fetch_assoc($result))
    {
      if (strcmp($row[utente], $nick) == 0)   //se lo trovo
      {
        if ($row[password] == $pass)  //e la password e' esatta
        {
          //salvo i dati dell'utente nella sessione
          $_SESSION["utente"] = $nick;
          $_SESSION["password"] = $pass;
          $_SESSION["permesso"] = $row[permessi];
          $_SESSION["id_utente"] = $row[id];
          $login = true;
          break;
        }
      }
    }
  }
  else
  {
    $msg = mysql_error();
    die("Errore Esecuzione Query<br />$msg");
  }

  if($login == true)
  {
    print "Benvenuto $nick! tra poco sarai reindirizzato al menu' privato...<br /><br />";
    redirect("admin.php",5);
  }
  elseif ($login == false)
  {
    print "Username o Password errati! <br /><br />";
    redirect("form_login.php",5);
  }

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>




