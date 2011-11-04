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
  //includo il file contenete le funzioni
  require_once("functions.inc.php");
  //news per pagina
  define('STEP',3);
  //numero massimo di pagine da mostrare
  define('MAXPAGES',20);
  top();

  //ricavo dalla query string da che news partire
  $start = $_GET["start"];
  $step = STEP;

  if (!isset($start) || $start < 0)
    $start = 0;

  $query = "SELECT * FROM news ORDER BY data DESC LIMIT $start,$step";
  
  $conn=connect();

  if ($result = mysql_query($query, $conn))  //per ogni news del database
  {
    while ($row = mysql_fetch_assoc($result)) 
    {
      $query1 = "SELECT * FROM commenti WHERE id_news = '$row[id]'";

      if ($result1 = mysql_query($query1, $conn))  //seleziona tutti i commenti 
      {
        $commenti = 0;
        while($row1 = mysql_fetch_assoc($result1))  
        {
          if($row1[id_news] == $row[id])  //e conta quanti sono se gli id corrispondono
          {
            ++$commenti;
          }
        }
      }
      else
        die("Errore esecuzione Query1: <br />".mysql_error());

      //poi stampa la news
      ?>
        <div id="important"><?php print $row[titolo] ?></div><br /><br />
        <?php print $row[testo] ?>
        <br /><br /><br />
        <div id="subnews">
          Posted on: <?php print $row[data] ?> | By: <?php print $row[autore] ?> | Email: <a href="mailto: <?php print $row[mail] ?>">Write me</a></div><br /><br />
          <?php
            //preparo l'url per il popup JS
            $url="show_commenti.php?id_news=".$row[id]."&start=0";
          ?>
          Commenti(<a href="#" onClick="<?php print "javascript:window.open('$url','FastNews- Commenti','scrollbars=yes,resizable=yes, width=800,height=600,status=no,location=no,toolbar=no'); " ?>"><?php print $commenti ?></a>)
        <br /><br />
        <hr />
        <?php

    }  //fine while per ogni news
  }
  else
    die("Errore esecuzione Query: <br />".mysql_error());
 
  //conto le news totali
  $query2 = "SELECT count(*) AS news FROM news";
  
  if($result2 = mysql_query($query2,$conn))
  {
    $row2 = mysql_fetch_assoc($result2);
    print "<br />";
    //calcolo delle pagine
    if ($start > 0)
    {
      $start_back = $start - $step;
      print "<a href=view.php?start=$start_back>Precedenti 3</a><br />";
    } 
    if ($start + $step < $row2[news])
    {
      $start_next = $start + $step;
      print "<a href=view.php?start=$start_next>Successive 3</a><br />";
    }

    $pages = intval(($row2[news]-1) / $step)+1;
    for ($i = 0; $i < $pages && $i < MAXPAGES; $i++)
    {
      $start_page = $i * $step;
      print "<a href=view.php?id_news=$id_news&start=$start_page>".($i+1)."</a> ";
    } 
  }
  else
    die("Errore esecuzione Query: <br />".mysql_error());
  
  mysql_close($conn);
  
  print "<br /><br />";
  
  underMenu();
  credits();
  foot();
?>

