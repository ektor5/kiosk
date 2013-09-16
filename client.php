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

require_once "maincore.php";

if (isset($_GET['cmd']) && ! eregi("client", $_SERVER['HTTP_REFERER']))
  redirect('admin.php');

define("COLOR","#22aacc");
if(isset($_GET['cmd']) && ($_GET['cmd'] != '' ))
  define("REDIRECT","client.php");

//define("JAVASCRIPT","checks.js");
define("JSCODE","
function dcheck()
{
  if(confirm('ATTENZIONE! Questa operazione non e\' reversibile e non sara\' possibile riaccedere al terminale amministrativo senza un\'accensione manuale della macchina. Sei sicuro?'))
    return true;
  else
    return false;
 }
 function check()
{
  if(confirm('ATTENZIONE! Se continui dovrai attendere il riavvio completo della macchina per riaccedere al terminale amministrativo. Sei sicuro?'))
    return true;
  else
    return false;
 }
");
require_once "header.php";

if(!IsSet($_SESSION['logged']))
 redirect('admin.php');

// data index page

function draw_form()
{
  echo '<table align="center"><br>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;AZIONI SISTEMA&nbsp;</td>'."\n";
  echo '<form name="form" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="javascript: return dcheck()">'."\n";
  echo '<td>&nbsp;<input type="submit" name="cmd" value="SPENGI" title="Arresta la macchina"></td></form>'."\n";
  echo '<form name="form" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="javascript: return check()">'."\n";
  echo '<td>&nbsp;<input type="submit" name="cmd" value="RIAVVIA" title="Riavvia la macchina"></td></form>'."\n";
  echo '<form name="form" method="get" action="'.$_SERVER['PHP_SELF'].'">'."\n";
  echo '<td>&nbsp;<input type="submit" name="cmd" value="AGGIORNA" title="Aggiorna la pagina del client"></td></tr>'."\n";
  echo '</table><br></form>'."\n";
}

echo '<table width="100%"><tr><td class="page_head" style="background:'.COLOR.'">AMMINISTRA CLIENT</td></tr></table>',"\n";

if(isset($_GET['cmd']))
{
  switch($_GET['cmd'])
  {
  	case 'SPENGI':  // halt                         
      echo passthru('sudo /sbin/halt');
        message('Arresto in corso...');
        $_SESSION = array(); //Desetto tutte le variabili di sessione
	     session_destroy();   //Distruggo le sessioni
		break;
		
	case 'RIAVVIA':  // halt                         
      echo passthru('sudo /sbin/reboot');
        message('Riavvio in corso...');
        $_SESSION = array(); //Desetto tutte le variabili di sessione
	     session_destroy();   //Distruggo le sessioni
      break;
      
    case 'AGGIORNA':  // kill firefox                         
      echo passthru('sudo /usr/bin/killall firefox');
        message('Aggiornamento della pagina in corso...');
       break;
   }
}
else
{
  draw_form();
}

echo '<table width="100%"><tr><td style="background:'.COLOR.'"></td></tr></table>',"\n";
require_once "footer.php";


?>
