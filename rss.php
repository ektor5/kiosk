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

if (isset($_GET['cmd']) && ! eregi("rss", $_SERVER['HTTP_REFERER']))
  redirect('admin.php');

define("COLOR","#ff8800");
if(isset($_GET['cmd']) && ($_GET['cmd'] == '2' || $_GET['cmd'] == '4'))
  define("REDIRECT","rss.php");

//define("JAVASCRIPT","checks.js");
define("JSCODE","
function check(f)
{
  if(f.rss.value == '')
  {
    alert('RSS mancante');
    return false;
  }
  if(f.rss.value.substr(-4) != '.xml') {
    alert('RSS non supportato');
    return false;  
  }
  return true;
}
function dcheck()
{
  return confirm('Eliminare i dati selezionati?');
}
");
require_once "header.php";

if(!IsSet($_SESSION['logged']))
 redirect('admin.php');

// data index page

function draw_list()
{
  echo '<table align="center"><tr class="tbl_head"><td>&nbsp;NOME&nbsp;</td><td>&nbsp;OPERAZIONI&nbsp;</td></tr>'."\n";
  $result = dbquery("SELECT rss_link FROM rss");
  $row = 0;
  while ($data = dbarray($result))
  {
    echo '<tr class="tbl_'.$row.'"><td>'.$data['rss_link'].'</td>';
    echo '<td align="center"><a href="'.$_SERVER['PHP_SELF'].'?cmd=2&rss='.$data['rss_link'].'" onclick="return dcheck();"><img class=actions src="pics/del.gif" title="ELIMINA"></a>';
    echo '</td></tr>'."\n";
    $row = ($row)?0:1;
  }
  echo "</table><br><br>\n";
  echo '<div align="center"><a href="'.$_SERVER['PHP_SELF'].'?cmd=3">AGGIUNGI RSS</a></div>'."\n";
}

function draw_form($rss)
{
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return check(this)"><table align="center">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;RSS&nbsp;</td><td><input type="text" name="rss" value="'.$rss.'" class="textbox" size="80" maxlength="128" ></td></tr>'."\n";
  echo '</td></tr></table><br>'."\n";
  echo '</div><input type="hidden" name="cmd" value="4">';
  echo '<div align="center"><input type="submit" value="CONFERMA" ></form>'."\n";
}

echo '<table width="100%"><tr><td class="page_head" style="background:'.COLOR.'">RSS</td></tr></table>',"\n";

if(isset($_GET['cmd']))
{
  switch($_GET['cmd'])
  {
    case '2':  // elimina
      $result = dbquery('DELETE FROM rss WHERE rss_link="'.isText($_GET['rss']).'"');
      if($result && dbrows($result,"update"))
        message('Dati eliminati con successo');
      else
        message("Impossibile effettuare l'operazione");
      break;
    case '3':  // aggiungi
      draw_form('');
      break;
    case '4':
      $result = dbquery('INSERT INTO rss VALUES ( "'.isText($_GET['rss']).'")');
      if($result && dbrows($result,"insert"))
        message('Dati aggiunti con successo');
      break;
  }
}
else
{
  draw_list();
}

echo '<table width="100%"><tr><td style="background:'.COLOR.'"></td></tr></table>',"\n";
require_once "footer.php";

?>