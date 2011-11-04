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

  function connect()
  {
    $conn = mysql_connect($GLOBALS[host_db], $GLOBALS[user_db], $GLOBALS[pass_db]);
    if ($conn == FALSE)
      die("Errore connessione a MySQL!");

    $select = mysql_select_db($GLOBALS[name_db], $conn);
    return $conn;
  }

  function redirect($url, $seconds = FALSE)
  {
    if (!headers_sent() && $seconds == FALSE)
      header("Location: " . $url);
    else
    {
      if ($seconds == FALSE)
        $seconds = "0";
      print "<meta http-equiv=\"refresh\" content=\"$seconds;url=$url\">";
    }
  }

?>



