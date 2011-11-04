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
<div id="important">Modifica profilo</div>(lascia i campi vuoti se vuoi mantenere i dati correnti)<br />
<form action="edit_profilo.php?id=<?php print $_SESSION["id_utente"] ?>" method="POST">
  <table>
    <tr>
      <td>
        *Nickname<br />
        <input type="text" name="utente" id="utente" size="18" /><br />
        *Vecchia Password<br />
        <input size="18" type="password" name="oldpass" id="oldpass" /><br />
        *Nuova Password<br />
        <input size="18" type="password" name="pass1" id="pass1" /><br />
        *Conferma Nuova Password<br />
        <input size="18" type="password" name="pass2" id="pass2" /><br /><br />
        <input type="submit" value="Modifica" />
      </td>
    </tr>
  </table>
</form>
<br /><br /><a href="admin.php">Torna al menu</a><br>
<?php

  underMenu();
  credits();
  foot();
?>

