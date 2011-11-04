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


  if ($_SESSION["permesso"] == 2)  //se il permesso e' da admin
  {
    ?>
Se vuoi resettare il database delle news dovrai inserire la <b>Password di Fastnews</b><br />
  <form action="reset.php" method="post">
    <input type="password" name="pass" size="13" />
    <input type="submit" name="submit" value="Reset" />
  </form>
  <br />
  <a href="admin.php">Torna al menu</a><br>
    <?php
  }
  elseif ($_SESSION["permesso"] == 1)
    die("Non hai i permessi per accedere a questa sezione");

?>
<br /><br />
<?php

  underMenu();
  credits();
  foot();
?>

