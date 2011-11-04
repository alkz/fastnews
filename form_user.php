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


  if ($_SESSION["permesso"] == 2) //se il permesso e' da admin
  {
    ?>
<form action="insert_user.php" method="POST" name="adduser" id ="adduser">
  <table>
    <tr>
      <td>
        Inserisci il NickName e la password dell'utente che vuoi aggiungere:<br /><br />
        *Nickname<br />
        <input type="text" name="utente" id="utente" size="18" /><br />
        *Password<br />
        <input size="18" type="password" name="pass1" id="pass1" /><br />
        *Conferma Password<br />
        <input size="18" type="password" name="pass2" id="pass2" /><br />
        *Permessi:<br />
        <select name="permessi" id="permessi">
          <option value="2">Admin</option>
          <option value="1">Moderator</option>
        </select><br /><br />
        <input type="submit" value="Aggiungi Utente" />
      </td>
    </tr>
  </table>
</form>
<br /><br /><a href="admin.php">Torna al menu</a><br>
    <?php
  }
  elseif ($_SESSION["permesso"] == 1)
    die("Non hai i permessi per accedere a questa sezione");

  underMenu();
  credits();
  foot();

?>

