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

echo '<table align="left" cellspacing="10"><tr>'."\n";
echo '<td><a href="orario.php">ORARIO</a></td>'."\n";
echo '<td><a href="rss.php">RSS</a></td>'."\n";
echo '<td><a href="config.php">IMPOSTAZIONI</a></td>'."\n";
echo '<td><a href="passwd.php">PASSWORD</a></td>'."\n";
echo '<td><a href="client.php">CLIENT</a></td>'."\n";
echo '<td><a href="admin.php?logout=1">USCITA</a></td>'."\n";
echo '</tr></table>'."\n";
echo '<table cellpadding="0" cellspacing="0" border="0" align="right" valign="middle" frame="" rules=""><tr>'."\n";
echo '<td width="100%" align="right" valign="middle">Powered by:&nbsp;</td>'."\n";
echo '<td width="100%" align="right" valign="middle"><img class=powered src=pics/arch.png></><br><img class=powered src=pics/php.png></></td>'."\n";
echo '<td width="100%" align="right" valign="middle"><img class=powered src=pics/jquery.gif></><br><img class=powered src=pics/mysql.png></></td>'."\n";
echo '</tr></table>'."\n";

?>
