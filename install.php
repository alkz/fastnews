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

  //includo il file contenete le funzioni
  require_once("functions.inc.php");
  //includo il file contenete la struttura html della pagina
  require_once("structure.inc.php");

  top();

  $nick = $_POST["utente"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"] ;
  $fast1 = $_POST["pass_fast1"];
  $fast2 = $_POST["pass_fast2"];

  //controllo dell'input
  if ($nick == "" || $pass1 == "" || $pass2 == "" || $fast1 == "" || $fast2 == "")
  {
    redirect("form_install.php",4);
    die("Devi compilare tutti i campi!");
  }

  if ($pass1 != $pass2)
  {
    redirect("form_install.php",4);
    die("Le Password utente non coincidono");
  }

  if ($fast1 != $fast2)
  {
    redirect("form_install.php",4);
    die("Le Password FastNews non coincidono");
  }

  if ($pass1 == $pass2 && $fast1 == $fast2)
  {
    $passmd5 = md5($pass1);

    //preparazione delle query di creazione tabelle
    $query1 = "CREATE TABLE users
                (
                  id INT (5) UNSIGNED not null AUTO_INCREMENT PRIMARY KEY,
                  utente VARCHAR (255) not null,
                  password VARCHAR(255) not null,
                  permessi INT (4) UNSIGNED not null DEFAULT 1
                )";

    $query2 = "CREATE TABLE pass
                (
                  pass VARCHAR(255) not null PRIMARY KEY
                )";

    $query3 = "CREATE TABLE commenti
               (
                 id INT (5) UNSIGNED not null AUTO_INCREMENT PRIMARY KEY,
                 id_news VARCHAR (5) not null,
                 testo TEXT not null,
                 autore VARCHAR (255) not null,
                 data DATETIME not null
               )";

    $pass1=md5($pass1);
    $fast1=md5($fast1);
    $query4 = "INSERT INTO users (utente, password, permessi) VALUES ('$nick','$pass1', '2')";
    $query5 = "INSERT INTO pass VALUES ('$fast1')";

    $conn=connect();

    //esecuzione query di creazione tabelle
    if (mysql_query($query1, $conn) && mysql_query($query2, $conn) && mysql_query($query3, $conn))
      print "Tabelle users, pass e commenti create<br />";
    else
    {
      redirect("form_install.php",6);
      die("Errore durante la creazione delle tabelle: ".mysql_error());
    }

    if (mysql_query($query4, $conn) && mysql_query($query5, $conn))
      print "Dati Inseriti<br />";
    else
    {
      redirect("form_install.php",6);
      die("Errore durante l'inserimento dei dati: ".mysql_error());
    }
  }

  //creazione della tabella news
  $query = "CREATE TABLE news
            (
              id INT (5) UNSIGNED not null AUTO_INCREMENT PRIMARY KEY,
              titolo VARCHAR (255) not null,
              testo TEXT not null,
              data DATETIME not null,
              autore VARCHAR (50) not null,
              mail VARCHAR (50)
            )";

  $query2 = "INSERT INTO news(titolo, testo, data, autore, mail) VALUES ('Benvenuto in FastNews  V$version', 'FastNews è stato installato correttamente<br />Grazie per aver scelto FastNews<br /><br />Alkz', NOW(), 'Alkz', 'alkzx@hotmail.it')";

  if (mysql_query($query, $conn) && mysql_query($query2, $conn))
  {
    print "Installazione del Database eseguita correttamente!<br />";
    redirect("view.php",6);
  }
  else
  {
    redirect("form_install.php",4);
    die("Errore durante l'installazione: ".mysql_error());
  }

  mysql_close($conn);

  credits();
  foot();
?>

