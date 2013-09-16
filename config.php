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

if (isset($_GET['cmd']) && ! eregi("config", $_SERVER['HTTP_REFERER']))
  redirect('admin.php');

define("COLOR","#8888ff");
if(isset($_GET['cmd']) && ($_GET['cmd'] == '2' ))
  define("REDIRECT","admin.php");

require_once "header.php";

if(!IsSet($_SESSION['logged']))
 redirect('admin.php');

// data index page
function selectCollate($sel)
{
  global $giorni;
  $opt = array("NO","SI");
  echo '<select name="collate">';
  for($i=0;$i<sizeof($opt);$i++)
  {
    if ($i == $sel)
      echo '<option selected ';
    else
      echo '<option ';
    echo ' value="'.$i.'">'.$opt[$i].'</option>';
  }
  echo "</select>\n";
}

function draw_form($timeout,$hlimit,$tmnow,$tmafter,$tmweek,$tmrss,$collate)
{
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'"><table align="center">'."\n";
  echo '<input type="hidden">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;RICEVIMENTI MAX&nbsp;</td><td><input type="text" name="hlimit" value="'.$hlimit.'" class="textbox" size="2" maxlength="2" ></td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;TIMEOUT SESSIONE&nbsp;</td><td><input type="text" name="timeout" value="'.$timeout.'" class="textbox" size="4" maxlength="4" > s</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;TIMER ADESSO&nbsp;</td><td><input type="text" name="tmnow" value="'.$tmnow.'" class="textbox" size="6" maxlength="6" > ms</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;TIMER SUCCESSIVI&nbsp;</td><td><input type="text" name="tmafter" value="'.$tmafter.'" class="textbox" size="6" maxlength="6" > ms</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;TIMER SETTIMANALE&nbsp;</td><td><input type="text" name="tmweek" value="'.$tmweek.'" class="textbox" size="6" maxlength="6" > ms</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;TIMER RSS&nbsp;</td><td><input type="text" name="tmrss" value="'.$tmrss.'" class="textbox" size="6" maxlength="6" > ms</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;COLLATE RSS&nbsp;</td><td>';
  selectCollate($collate);
  echo '</td></tr>'."\n";
  echo '</td></tr></table><br>'."\n";
  echo '</div><input type="hidden" name="cmd" value="2">';
  echo '<div align="center"><input type="submit" value="CONFERMA" ></form>'."\n";
}

echo '<table width="100%"><tr><td class="page_head" style="background:'.COLOR.'">IMPOSTAZIONI</td></tr></table>',"\n";

if(isset($_GET['cmd']))
{
  switch($_GET['cmd'])
  {
    case '2':  // elimina
      $result = dbquery('UPDATE conf SET cnf_timeout='.isNum($_GET['timeout']).', cnf_hlimit='.isNum($_GET['hlimit']).', cnf_tmnow='.isNum($_GET['tmnow']).',cnf_tmafter='.isNum($_GET['tmafter']).', cnf_tmweek='.isNum($_GET['tmweek']).', cnf_tmrss='.isNum($_GET['tmrss']).',cnf_collate='.isNum($_GET['collate']));
      if($result && dbrows($result,"update"))
        message('Dati modificati con successo');
      else
        message("Impossibile effettuare l'operazione");
      break;
  }
}
else
{
  $result = dbquery("SELECT cnf_timeout, cnf_hlimit, cnf_tmnow, cnf_tmafter, cnf_tmweek, cnf_tmrss, cnf_collate FROM conf");
  $data = dbarray($result);
  draw_form($data['cnf_timeout'],$data['cnf_hlimit'],$data['cnf_tmnow'],$data['cnf_tmafter'],$data['cnf_tmweek'],$data['cnf_tmrss'],$data['cnf_collate']);
}

echo '<table width="100%"><tr><td style="background:'.COLOR.'"></td></tr></table>',"\n";
require_once "footer.php";

?>