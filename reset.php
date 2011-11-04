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

  $pass=$_POST["pass"];

  //controllo se la password e' corretta
  $query1 = "SELECT pass FROM pass";

  $conn=connect();
  if($result1=mysql_query($query1,$conn))
  {
    $row=mysql_fetch_assoc($result1);
    if(strcmp($pass,$row[pass])!=0)  //se le password non coincidono
      die("La password non e' corretta!");   //blocco subito
  }
  else
    die("Errore esecuzione Query1: <br />".mysql_error());

  if ($_SESSION["permesso"] == 2)
  {
    $query = "DELETE FROM news";
    $query2 = "DELETE FROM commenti";

    if (mysql_query($query, $conn) && mysql_query($query2, $conn))
    {
      print"Resettamento del Database delle News effettuato con successo, attendi qualche istante verrai reindirizzato all'homepage...<br /><br />";
      redirect("/index.php",5);
    }
    else
      die("Errore nella cancellazione del Database delle news");
  }
  elseif ($_SESSION["permesso"] == 1)
    die("Non hai i permessi per accedere a questa sezione");

  mysql_close($conn);

  underMenu();
  credits();
  foot();
?>