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
  top();
  $id_news = $_GET["id_news"];
?>
  <form action="insert_comment.php?id_news=<?php print $id_news ?>" method="POST" name="comment" id="comment">
    <table>
       <tr>
         <td>
           *Autore: 
           <?php
             if(!isset($_SESSION["utente"]))
               print "<br /><input size=\"30\" type=\"autore\" name=\"autore\" /><br /><br />";
             else
               print " $_SESSION[utente]<br /><br />";    
           ?>          
           *Testo:<br />
           <textarea cols="50" rows="15" name="testo" id="testo"></textarea><br /><br />
           <input type="submit" name="submit" id="submit" value="Lascia Commento" />
         </td>
       </tr>
     </table>
   </form>
<?php
   underMenu();
   credits();
   foot();
?>

