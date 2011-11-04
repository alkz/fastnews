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

  $id_new = $_GET["id_new"];
  $query = "SELECT testo, titolo FROM news WHERE id = '$id_new'";
  $conn=connect();

  if ($result = mysql_query($query, $conn))
  {
    $row = mysql_fetch_assoc($result);
    print "<form action=\"edit_new.php?id_new=$id_new\" method=\"post\">";
    ?>
  *Modifica Titolo:<br />
  <input type="text" id="titolo" name="titolo" size="40" value="<?php print $row[titolo] ?>" /><br />
  *Modifica Testo:<br />
  <textarea cols="70" rows="30" name="testo"><?php print $row[testo] ?></textarea><br /><br />
  <input type="submit" name="submit" value="Modifica New" /><br />
</form>
<br /><a href="admin.php">Torna al menu</a><br /><br />
    <?php
  }
  else
    die("Errore Esecuzione Query".mysql_error());
                   

  mysql_close($conn);

  underMenu();
  credits();
  foot();

?>