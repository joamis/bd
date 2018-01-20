<!DOCTYPE html>

<html>


<?php

  console.log('przed config.php');
  require_once 'config.php';

  console.log('Po dolaczeniu config.php');


  session_start();
  $logged = isset($_SESSION['username']) && !empty($_SESSION['username']);

  $show = $_GET['show'];


  include 'home.html';
?>
    <article class=".col-10" >
      <div class="col-md-10">
      <?php
        if ($show == 'dodaj_ksiazke') {
         include 'dodaj.php';
       } ?> 
      </div>
	
	
                
                    
    </article>
            

    <footer class=".col-12">
                <p class="logo"> Logo</p>
    </footer>
        
		</div>
    </body>
</html>

