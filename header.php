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
if (!defined("KIOSK")) { die(); }
require_once "login.php";

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">'."\n";
echo '<html>'."\n";
echo '<head>'."\n";
echo '<title>'.$kiosk_title.'</title>'."\n";
echo '<meta http-equiv="Content-Type" content="text/html; charset='.$kiosk_charset.'">'."\n";
if(defined("REDIRECT"))
  echo '<meta http-equiv="Refresh" content="1; url='.REDIRECT.'">'."\n";
echo '<meta name="description" content="'.$kiosk_description.'">'."\n";
echo '<link rel="stylesheet" href="css/admin.css" type="text/css">'."\n";
if(defined("JAVASCRIPT"))
  echo '<script language="javascript" src="js/'.JAVASCRIPT.'"></script>'."\n";
if(defined("JSCODE"))
  echo '<script language="javascript">'.JSCODE.'</script>'."\n";
// setting FAVICON  
$favicon = (IsSet($_SESSION['logged']))?"favicon":"login";  // Usa favicon personalizzata in base al login
echo '<link href="pics/'.$favicon.'.ico" rel="icon" type="image/x-icon" />'."\n";

echo '</head>'."\n";
echo '<body onLoad="document.frm.elements[0].focus()">'."\n";
// setting LOGO
echo '<div class="logo"><img src="'.$kiosk_logo.'"></div>';
// setting LOGIN
if(IsSet($_SESSION['logged']))
{
  require_once "menu.php"; 
}

?>
