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

<div id="important">Login FastNews</div><br />
<form action="login.php" method="post">
  <table>
    <tr>
      <td>
        *Nickname<br />
        <input type="text" name="utente" id="utente" size="18" /><br />
        *Password<br />
        <input size="18" type="password" name="password" id="password" /><br /><br />
        <input type="submit" value="Login" />
      </td>
    </tr>
  </table>
</form>


<?php

underMenu();
credits();
foot();

?>