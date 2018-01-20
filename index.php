<!DOCTYPE html>

<html>


<?php

  require_once 'config.php';


  session_start();
  $logged = isset($_SESSION['username']) && !empty($_SESSION['username']);

  $show = $_GET['show'];

  include 'home.html';
?>
    <article class=".col-10" >
        <div class="col-md-10">
      <?php
        if ($show == 'dodaj')
        {
         include 'dodaj.php';
       }
        else if ($show == 'usun')
        {
            include 'usun.php';
        }

        else if ($show == 'lista')
        {
            include 'lista.php';
        }

      else if ($show == 'aktualizuj')
      {
          include 'aktualizuj.php';
      }
       ?>
	
    </article>
            
<style>
    .stopka
    {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #333333;
        color: white;
        text-align: center;
        height:3%;
        text-align: center;
    }

</style>
    <footer class="stopka">
    </footer>

</body>
</html>

