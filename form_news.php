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

?>

  <form method="POST" action="insert_news.php" name="insert" id="insert">
    *Titolo:<br />
    <input type="text" size="40" name="titolo" id="titolo" />
    <br /><br />
    Autore: <?php print $_SESSION["utente"]; ?>
    <br /><br />
    *E-mail:<br />
    <input type="text" size="40" name="mail" id="mail" />
    <br /><br />
    *Testo:<br />
    <textarea cols="70" rows="30" name="testo" id="testo"></textarea><br />
    <br /><br />
    <input type="submit" value="Posta News" />
  </form>
<br />
<a href="admin.php">Torna al menu</a><br /><br />
<?php
  underMenu();
  credits();
  foot();
?>