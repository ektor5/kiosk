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
require_once "header.php";
if(!IsSet($_SESSION['logged']))
{
?> 
 <div class="login">
  <form name="frm" method="post" action="admin.php">
   <table width="100%">
	<tr style="height:20px"><td></td></tr>
	<tr>
	 <td align="center">
	  PASSWORD: 
	  <input type="password" name="user_pass" style="width:150px">
	 </td>
	</tr>
	<tr style="height:50px">
	 <td align="center">
	   <input type="submit" name="login" value="Login">
	 </td>
	</tr>
   </table>
  </form>
 </div>
<?php
}
require_once "footer.php";
?>
