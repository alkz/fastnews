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

?>
  <fieldset><legend>Installazione FastNews</legend>
  <form action="install.php" method="post">
  <table>
    <tr>
      <td>
        <div id="important">Per Installare FastNews dovrai completare il seguente form.</div><br /><br />
        Nickname(con il quale accederai all'amministrazione di FastNews):<br />
        <input type="text" name="utente" id="utente" size="22" /><br /><br />
        Password(con la quale accederai all'amministrazione di FastNews):<br />
        <input size="22" type="password" name="pass1" id="pass1" /><br /><br />
        Conferma Password:<br />
        <input size="22" type="password" name="pass2" id="pass1" /><br /><br />
        Password FastNews(ti verra chiesta in FastNews per il resettamento del database):<br />
        <input size="22" type="password" name="pass_fast1" id="pass_fast1" /><br /><br />
        Conferma Password FastNews:<br />
        <input size="22" type="password" name="pass_fast2" id="pass_fast2" /><br /><br />
        <input type="submit" value="OK" />
      </td>
    </tr>
  </table>
</form>
</fieldset>
<?php
  credits();
  foot();
?>