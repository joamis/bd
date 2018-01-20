<!DOCTYPE html>

<html>

<?php

require_once 'config.php';

  session_start();
  $logged = isset($_SESSION['username']) && !empty($_SESSION['username']);

  $show = $_GET['show'];


  include 'index.html';
?>
    <article class=".col-10" >
      <div class="col-md-10">
      <?php
        
	if ($show == 'zbior') {
          include 'dodaj_ksiazke.php';
        }
	?>
      </div>




    </article>


    <footer class=".col-12">
                <p class="logo"> Logo</p>
    </footer>

                </div>
    </body>
</html>

