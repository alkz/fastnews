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


?>
<div id="important">Modifica News</div><br />
<?php
  $query = "SELECT * FROM news ORDER BY data DESC";
  $conn=connect();
  if ($result = mysql_query($query, $conn))
  {
    ?>
<table>
  <tr>
    <th><b>Titolo & Autore News</b></th>
    <th><b>Data News</b></th>
  </tr>
    <?php
    while ($row = mysql_fetch_assoc($result))
    {
      ?>
  <tr>
    <td>
      <?php print "$row[titolo] - Article by:$row[autore]" ?>
    </td>
    <td>
      <?php print "$row[data]" ?>
    </td>
    <td>
      <?php print"<a href=\"delete_new.php?id_new=$row[id]\">Cancella News</a>" ?>
    </td>
    <td>
      <?php print"<a href=\"form_edit_new.php?id_new=$row[id]\">Modifica News</a>" ?>
    </td>
  </tr>
      <?php
    }
    ?>
</table>
<br /><br /><a href="admin.php">Torna al menu</a><br /><br />
<?php
  }
  else
    die("Errore esecuzione Query".mysql_error());

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>

