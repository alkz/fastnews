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


  $nick = $_POST["utente"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $oldpass = $_POST["oldpass"];
  $id = $_GET["id"];

  if (!isset($id))
  {
    redirect("form_edit_news.php",4);
    die("Stai accedendo in modo errato a questa pagina!");
  }

  //i campi vuoti li lascio tali
  if($nick=="")
    $nick=$_SESSION["utente"];
  if($pass1 == "" && $pass2 == "" && $oldpass == "")
    $pass1=$_SESSION["password"];
  if($pass1 != "" && $pass2 != "" && $pass1 != $pass2)
  {
    redirect("form_profilo.php", 4);
    die("le nuove password non coincidono!");
  }
  if(md5($oldpass) != $_SESSION["password"] && $oldpass != "")
   {
    redirect("form_profilo.php", 4);
    die("La vecchia password digitata non e' corretta!");
  } 
  if(($pass1 == "" || $pass2 == "") && $oldpass != "")
  {
    redirect("form_profilo.php", 4);
    die("Non hai inserito la nuova password!");
  }
  if($oldpass == "" && $pass1 != "" && $pass2 != "")
  {
    redirect("form_profilo.php", 4);
    die("Non hai inserito la vecchia password!");
  }
 
  if($pass1 != $_SESSION["passsword"])
      $pass1 = md5($pass1);
  
  $_SESSION["utente"]=$nick;
  $_SESSION["password"]=$pass1;
  
  $query = "UPDATE users SET utente = '$nick', password = '$pass1' WHERE id = '$id'";

  $conn=connect();

  if (mysql_query($query, $conn))
  {
      print"Profilo Modificato";
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
