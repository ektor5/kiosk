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

if (preg_match("/maincore.php/", $_SERVER['PHP_SELF'])) die();

// If register_globals is turned off, extract super globals (php 4.2.0+)
if (ini_get('register_globals') != 1)
{
  $glb = array("_REQUEST","_ENV","_SERVER","_POST","_GET","_COOKIE","_SESSION","_FILES","_GLOBALS");
  foreach ($glb as $__s)
  {
    if ((isset($$__s) == true) && (is_array($$__s) == true)) extract($$__s, EXTR_OVERWRITE);
  }
  unset($glb);
}

// Prevent any possible XSS attacks via $_GET.
foreach ($_GET as $check_url) 
{
  if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||
  (preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||
  (preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||
  (preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||
  (preg_match("/\"/", $check_url))) 
  {
    die ();
  }
}
unset($check_url);

// Start Output Buffering
ob_start();

define("BASEURL",$_SERVER['HTTP_HOST']);
define("KIOSK", TRUE);
$user = 0;

$kiosk_title = "KIOSK";
$kiosk_charset = "iso-8859-1";
$kiosk_description = "Applicazione PHP";
$kiosk_logo = "pics/logo.jpg";

// database settings
$db_host = "localhost";
$db_name = "kiosk";
$db_user = "user";
$db_pass = "123456";

$giorni = array("LUNEDI'","MARTEDI'","MERCOLEDI'","GIOVEDI'","VENERDI'","SABATO");

setlocale(LC_TIME, "it");

// MySQL database functions
function dbquery($query)
{
//  sqllog($query);
  $result = @mysql_query($query);
  if (!$result) 
  {
      message(mysql_error());
    return false;
  } 
  else 
  {
    return $result;
  }
}

function dbcount($field,$table,$conditions="")
{
  $cond = ($conditions ? " WHERE ".$conditions : "");
  $result = @mysql_query("SELECT Count".$field." FROM ".$db_prefix.$table.$cond);
  if (!$result) 
  {
      message(mysql_error());
    return false;
  }
  else
  {
    $rows = mysql_result($result, 0);
    return $rows;
  }
}

function dbresult($query, $row=0) 
{
  $result = @mysql_result($query, $row);
  if (!$result) 
  {
      message(mysql_error());
    return false;
  }
  else
  {
    return $result;
  }
}

function dbrows($query, $cmd="select")
{
  if (strcasecmp($cmd, "select"))
    $result = @mysql_affected_rows();
  else
    $result = @mysql_num_rows($query);
  return $result;
}

function dbarray($query)
{
  return @mysql_fetch_assoc($query);
}

function dbrow($query)
{
  $result = @mysql_fetch_row($query);
  if (!$result)
  {
  message(mysql_error());
  return false;
  }
  else
    return $result;
}

function dbsingle($query)
{
  $result = @mysql_fetch_row($query);
  if (!$result)
  {
  message(mysql_error());
  return false;
  }
  else
    return $result[0];
}

function dbconnect($db_host, $db_user, $db_pass, $db_name)
{
  $db_connect = @mysql_connect($db_host, $db_user, $db_pass);
  $db_select = @mysql_select_db($db_name);
  if (!$db_connect)
  {
    die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to establish connection to MySQL</b><br>".mysql_errno()." : ".mysql_error()."</div>");
  }
  elseif (!$db_select)
  {
    die("<div style='font-family:Verdana;font-size:11px;text-align:center;'><b>Unable to select MySQL database</b><br>".mysql_errno()." : ".mysql_error()."</div>");
  }
}

// Redirect browser using the header function
function redirect($location, $type="header")
{
  if ($type == "header")
  {
    header("Location: ".$location);
  }
  else
  {
    echo "<script type='text/javascript'>document.location.href='".$location."'</script>\n";
  }
}

// Fallback to safe area in event of unauthorised access
function fallback($location)
{
  header("Location: ".$location);
  exit;
}

// Strip Input Function, prevents HTML in unwanted places
function stripinput($text)
{
//  return @mysql_escape_string($text);
  $search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
  $replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
  $text = str_replace($search, $replace, $text);
  return $text;
}

// stripslash function, only stripslashes if magic_quotes_gpc is on
function stripslash($text) {
	if (QUOTES_GPC) $text = stripslashes($text);
	return $text;
}

// stripslash function, add correct number of slashes depending on quotes_gpc
function addslash($text) {
	if (!QUOTES_GPC) {
		$text = addslashes(addslashes($text));
	} else {
		$text = addslashes($text);
	}
	return $text;
}

// Trim a line of text to a preferred length
function trimlink($text, $length) {
	$dec = array("\"", "'", "\\", '\"', "\'", "<", ">");
	$enc = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;");
	$text = str_replace($enc, $dec, $text);
	if (strlen($text) > $length) $text = substr($text, 0, ($length-3))."...";
	$text = str_replace($dec, $enc, $text);
	return $text;
}

// Validate numeric input
function isNum($value) {
	if(preg_match("/^[0-9]+$/", $value))
          return $value;
        else
          return 0;
}
function isDouble($value) {
	if(preg_match("/^[0-9]+\.?[0-9]*$/", $value))
          return $value;
        else
          return 0;
}
function isText($text)
{
//  return @mysql_escape_string($text);
  $search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
  $replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
  $text = str_replace($search, $replace, $text);
  $text = str_replace("&lt;br&gt;", "<br>", $text);
  return trim($text);
}

function message($text)
{
  if($text)
    echo '<br><br><div align="center"><h2>'.$text.'</h2></div><br><br>';
}

// Establish mySQL database connection
$link = dbconnect($db_host, $db_user, $db_pass, $db_name);

?>
