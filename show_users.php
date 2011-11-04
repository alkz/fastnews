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

    $query = "SELECT id, utente, password, permessi FROM users ORDER BY utente DESC";
    $conn=connect();
    if ($result = mysql_query($query, $conn))
    {
      ?>
      <table>
      <tr>
        <th><b>Nome Utente</b></th>
        <th><b>Permessi(2 = admin, 1 = moderator)</b></th>
        <th><b>Password Utente(md5)</b></th>
        <th></th>
      </tr>
      <?php
      while ($row = mysql_fetch_assoc($result))
      {
        ?>
        <tr>
          <td>
        <?php
            print "$row[utente]";
        ?>
          </td>
          <td align="center">
        <?php
            print "$row[permessi]";
        ?>
          </td>
          <td>
        <?php
            print "$row[password]";
        ?>
          </td>
          <td>
        <?php
            print "<a href=\"conferma_utente.php?id_utente=$row[id]&nick=$row[utente]\">Cancella Utente</a>";
        ?>
          </td>
        </tr>
        <?php
      }

      ?>
      </table>
      <?php
    }
    else
      die("Errore inserimento News: ".mysql_error());
    ?>

    <br /><br /><a href="admin.php">Torna al menu</a><br /><br />
    <?php

  }

  elseif ($_SESSION["permesso"] == 1)
  {
    print"Non hai i permessi per accedere a questa sezione";
    ?>
    <br /><br /><a href="admin.php">Torna al menu</a><br /><br />
    <?
    die();
  }

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>

