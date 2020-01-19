<?php
  	session_start();

    $do = isset($_GET['do']) ? $_GET['do'] : 'show';
    if($do == 'show' )
    {
      $guest =isset($_GET['guest']) ? $_GET['guest']: 0;
      if($guest != 0){

	      $_SESSION['guest'] = 'guest';
	      $_SESSION['ID'] = $guest; //Register Session ID
	      header('Location: personal.php');
    }
    else {
	      header('Location: guests.php');
    	
    }
}
