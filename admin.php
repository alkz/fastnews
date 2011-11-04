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

  <fieldset><legend>Benvenuto, <?php print $_SESSION["utente"] ?>!</legend>
  <?php
  if ($_SESSION["permesso"] == 2)
  {
    ?>
	
<?php

?>

<div id="important">FastNews Admin Menu</div><br /><br />

<b>*Gestione News*</b><br />
- <a href="view.php">Guarda News</a><br />
- <a href="form_news.php">Postare News</a><br />
- <a href="show_news.php">Modifica News</a><br /><br />
<b>*Gestione Utenti*</b><br />
- <a href="form_user.php">Aggiungi Utente</a><br />
- <a href="show_users.php">Cancella Utente</a><br /><br />

- <a href="form_reset.php">Reset Database</a><br />
- <a href="form_profilo.php">Modifica il tuo Profilo</a><br /><br />

<?php
?>

    <?php
  }

  else if ($_SESSION["permesso"] == 1)
  {
    ?>
<?php

?>

<div id="important">FastNews Mod Menu</div><br />

<b>*Gestione News*</b><br />
- <a href="form_news.php">Postare News</a><br />
- <a href="view.php">Guarda News</a><br />
- <a href="show_news.php">Modifica News</a><br /><br />

- <a href="form_profilo.php">Modifica il tuo Profilo</a><br /><br />

<?php
?>

    <?php
  }
  ?>
  </fieldset>
  <?php
  underMenu();
  credits();
  foot();

?>

