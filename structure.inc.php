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

  //includo il file contenente le informazioni sul database
  require_once("config.inc.php");

  //head della pagina html
  function top() {
    ?>
<html>
<head>
  <title>FastNews <?php print "V$GLOBALS[version]" ?> - By Alkz</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
  }//<fieldset><legend>FastNews - Benvenuto <? print $_SESSION["utente2"]; </legend><br>

  //footer della pagina html
  function foot() {
    ?>
</body>
</html>
    <?php
  }

  function underMenu() {
?>
<a target="_blank" href="disclaimer.php">Disclaimer</a> - <a target="_blank" href="/index.php">View News</a> - <a target="_blank" href="form_login.php">Login</a> - <a target="_blank" href="admin.php">Admin PdC</a><?php if(isset($_SESSION["utente"])) { ?> - <a target="_self" href="logout.php">Logout</a> <?php } ?>
<?php
  }

  function credits() {
?>
<br />FastNews <?php print "V$GLOBALS[version]" ?> - Copyright By alkz 2007-2010</div>
<?php
  }
?>
