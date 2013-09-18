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

if (isset($_GET['cmd']) && ! eregi("passwd", $_SERVER['HTTP_REFERER']))
  redirect('admin.php');

define("COLOR","#88ff00");
if(isset($_GET['cmd']) && ($_GET['cmd'] == '2' || $_GET['cmd'] == '4'))
  define("REDIRECT","passwd.php");

//define("JAVASCRIPT","checks.js");
define("JSCODE","
function check(f)
{
  if(f.user_pass.value == '')
  {
    alert('Password non valida');
    f.user_pass.focus();
    return false;
  }
  if(f.user_pass.value != f.user_pass2.value) {
    alert('Password non coincidenti. Riprova!');
    f.user_pass.value = '';
    f.user_pass2.value = '';
    f.user_pass.focus();
    return false;  
  }
  return true;
}

");
require_once "header.php";

if(!IsSet($_SESSION['logged']))
 redirect('admin.php');

// data index page

function draw_form()
{
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return check(this)"><table align="center">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;PASSWORD&nbsp;</td><td><input type="password" name="user_pass" class="textbox" size="20" maxlength="32" ></td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;RIPETI&nbsp;</td><td><input type="password" name="user_pass2" class="textbox" size="20" maxlength="32" ></td></tr>'."\n";
  echo '</td></tr></table><br>'."\n";
  echo '</div><input type="hidden" name="cmd" value="2">';
  echo '<div align="center"><input type="submit" value="CONFERMA" ></form>'."\n";
}

echo '<table width="100%"><tr><td class="page_head" style="background:'.COLOR.'">CAMBIO PASSWORD</td></tr></table>',"\n";

if(isset($_GET['cmd']))
{
  switch($_GET['cmd'])
  {
    case '2':  // modifica                         
      $result = dbquery('UPDATE conf SET cnf_pass = md5("'.isText($_GET['user_pass']).'")');
      if($result && dbrows($result,"update"))
        message('Dati modificati con successo');
      else
        message("Impossibile effettuare l'operazione");
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