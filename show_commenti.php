<?php
  session_start();

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
  //commenti per pagina
  define('STEP',10);
  //numero massimo di pagine da mostrare
  define('MAXPAGES',20);
  top();

  //ricavo i dati dalla query string che news sto guardando e da quale commento partire
  $id_news = $_GET["id_news"];
  $start = $_GET["start"];
  $step = STEP;

  if (!isset($start) || $start < 0)
    $start = 0;
  
  if (!isset($id_news))
    die("Impossibile leggere i commenti di questa news!");
   
  $commenti=0;
  $query = "SELECT * FROM news WHERE id = '$id_news'"; 
  $conn=connect();
  
  if ($result = mysql_query($query, $conn))  //della news che ho scelto
  {
    while ($row = mysql_fetch_assoc($result)) 
    {
      //stampo il contenuto
      ?>
        <div id="important"><?php print $row[titolo] ?></div><br /><br />
        <?php print $row[testo] ?>
        <br /><br /><br />
        <div id="subnews">
          Posted on: <?php print $row[data] ?> | By: <?php print $row[autore] ?> | Email: <a href="mailto: <?php print $row[mail] ?>">Write me</a></div><br /><br />
        <hr />
        <br />
        <div id="important">Commenti</div>
        <br /><br />
      <?php
      
      $query1 = "SELECT * FROM commenti WHERE id_news = '$id_news' ORDER BY data DESC LIMIT $start,$step";
      
      if ($result1 = mysql_query($query1, $conn))  //e mostro a video i commenti
      {
        while($row1 = mysql_fetch_assoc($result1))
        {
          ++$commenti;
          //stampo il commento
          ?>
            By: <?php print $row1[autore] ?> | Date: <?php print $row1[data];
            //controllo se ho i permessi per cancellare il commento
            if(isset($_SESSION["utente"]))
              print " | <a target=_self href=delete_comment.php?id_comm=$row1[id]&id_news=$row[id]>Cancella commento</a>";
            ?>
            <div id="comments">
            <?php print $row1[testo] ?>
            </div>
            <br /><br />
         <?php
        }
      }
      else
        die("Errore esecuzione Query: <br />".mysql_error());
    } 
  } 
  else
    die("Errore esecuzione Query: <br />".mysql_error());

  //conto i commenti per quella news
  $query2 = "SELECT count(*) AS commenti FROM commenti WHERE id_news='$id_news'";
  
  if($result2 = mysql_query($query2,$conn))
  {
    $row2 = mysql_fetch_assoc($result2);
    print "<br />";
    //calcolo delle pagine
    if ($start > 0)
    {
      $start_back = $start - $step;
      print "<a href=show_commenti.php?id_news=$id_news&start=$start_back>Precedenti 10</a><br />";
    } 
    if ($start + $step < $row2[news])
    {
      $start_next = $start + $step;
      print "<a href=show_commenti.php?id_news=$id_news&start=$start_next>Successivi 10</a><br />";
    }

    $pages = intval(($row2[commenti]-1) / $step)+1;
    for ($i = 0; $i < $pages && $i < MAXPAGES; $i++)
    {
      $start_page = $i * $step;
      print "<a href=show_commenti.php?id_news=$id_news&start=$start_page>".($i+1)."</a> ";
    } 
  }
  else
    die("Errore esecuzione Query: <br />".mysql_error());
    
  print "<br /><br />";
  
  ?>
  <a target="_self" href="form_comment.php?id_news=<?php print $id_news ?>">Lascia un commento</a><br />
  <a href="#" onClick="javascript:window.close()">Chiudi Finestra</a><br /><br /><br />
  <?php
  mysql_close($conn);

  credits();
  foot();
?>

