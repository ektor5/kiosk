<?php
/*---------------------------------------------------+
| PHP-WASH Web Applications System Hosting
+----------------------------------------------------+
| Copyright  2010 Ettore Chimenti
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/

if (preg_match("/login.php/i", $_SERVER['PHP_SELF'])) die();
$result = dbquery("SELECT cnf_timeout FROM conf");
$time = dbsingle($result);
$ses = "SK";
session_set_cookie_params($time);
session_name($ses);
session_start();

// Reset the expiration time upon page load
if (isset($_COOKIE[$ses]))
  setcookie($ses, $_COOKIE[$ses], time() + $time, "/");

$password = (isset($_POST['user_pass']))?$_POST['user_pass']:"";
	
	//Controllo se la password non e' vuota
	if((!strlen($password) == 0))
	{
    $result = dbquery("SELECT cnf_pass FROM conf");
		$row = dbrow($result);
		//Controllo se l' utente e' stato trovato
		if(!strlen($row[0]) == 0 && $row[0] == md5($password))
		{
			//Effettuo il login
			$_SESSION['logged'] = $row[0];
		}
		//Libero la memoria
		mysql_free_result($result);

  }

if (isset($_GET['logout'])) 
{
  $_SESSION = array(); //Desetto tutte le variabili di sessione
	session_destroy(); //Distruggo le sessioni

}

?>
