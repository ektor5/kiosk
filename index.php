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
  //require_once "rsslib.php";
  //require_once('FirePHPCore/FirePHP.class.php');

  //ob_start($output_callback = null, $chunk_size = null, $erase = null);
date_default_timezone_set("UTC");

  function getGiornalieroA($day) {
    $sql = 'SELECT ore_inizio, ore_fine, doc_nome, ora_note, aule_nome ';
    $sql .= 'FROM ore, orario, docenti LEFT JOIN aule ON doc_aula = aule_id ';
    $sql .= 'WHERE ora_docente = doc_id AND ora_ora = ore_id ';
    $sql .= 'AND ora_giorno = '. $day;
    $result = 	dbquery($sql);
    $var 	= 	array();
    $names 	= 	array();
    $start 	= 	"";
    $end 	= 	""; 
    $note 	= 	"";
    $aula	=	"";
    while ($data = dbarray($result))
    {
      $name = $data['doc_nome'];
      $note = $data['ora_note'];
      $aula = $data['aule_nome'];

      if($data['ore_inizio'] != $start) 
        if($start != "") { 
           $var[] = array("start"=>$start,"end"=>$end,"docs"=>$names);
           $names = array(); 
        }
      $names[$name] = array("note"=>$note,"aula"=>$aula);
      $start =  $data['ore_inizio'];
      $end =  $data['ore_fine'];      
      /*if($names != "")
        $names .= '<br>';*/

    } 
    $var[] = array("start"=>$start,"end"=>$end,"docs"=>$names);
    return $var;
  }

  function getGiornaliero() {
    $day = getGiornalieroA(date('w')-1);
    $var = "var giornaliero = new Array();\n";
    $index = 0;
    foreach($day as $hour) {
      $var .= 'giornaliero['.$index.'] = ';
      $var .= 'new Array("'.$hour['start'].'","'.$hour['end'].'",';
      $var .= '"<br><table>';
      foreach($hour['docs'] as $docente => $dati){  
      	$var .= '<tr><td width=\'50%\' style=text-align:left;>'.$docente.'</td>';
      	$var .= '<td width=\'50%\' style=text-align:right;>'.$dati['note'].'</td></tr>';
      }
  		$var .= '</table>");'."\n";
      $index++;
    }
    return $var;
  }
  
  function getSettimanale() {  
  
    global $giorni;
    $loop = array(5,0,1,2,3,4,5,0,1);
    $week = '<table cellspacing="0" cellpadding="0"><tr>';
    foreach($loop as $day)
      $week .= '<td><h3>'.$giorni[$day].'</h3></td>';
    $week .= "</tr>\n<tr>";
    foreach($loop as $day) {
      $week .= '<td valign="top">';
      $var = getGiornalieroA($day);
      foreach($var as $hour) {
        $first_tr = "";
        $week .= '<div class="week_block"><table width="100%">';
        $week .= '<tr><td colspan="3">';
        $week .= '<b>'.$hour['start'].' - '.$hour['end'].'</b></td></tr>';
        foreach($hour['docs'] as $docente => $dati){
        	$week .= '<tr><td width="50%" style="text-align:left;">'.$docente.'</td>';
		$week .= '<td width="50%" style="text-align:right;"><i>'.$dati['aula'].'</i></td></tr>';
     	  }
     	 $week .= '</table></div>';
      }
      $week .= '</td>'."\n";
    }
    $week .= '</tr></table>'; 
    return $week;
  }
  
  //~ function getRss() {
    //~ $sql = 'SELECT rss_link FROM rss';
    //~ $result = dbquery($sql);
    //~ $var = array();
    //~ while ($data = dbarray($result))
      //~ $var[] = $data['rss_link'];
    //~ $var = RSS_main($var,1);
    //~ $rss = "var feed = new Array();\n";
    //~ if ( $var[0] != '' ) {
    	//~ $index = 0;
    	//~ foreach($var as $item) {
    	  //~ $rss .= 'feed['.$index.'] = "<b>'.str_replace('"',"'",$item[0]);
    	  //~ $rss .= '</b><br>&nbsp;&nbsp;&nbsp;'.str_replace('"',"'",$item[1]).'";'."\n";
    	  //~ $index++;
    	//~ }
    	//~ return $rss;
    //~ }
    //~ $rss .= 'feed[0] = "<b>Nessun feed RSS trovato.</b><br>';
    //~ $rss .= '&nbsp;&nbsp;&nbsp;Controllare la connessione ad internet. "';
    //~ return $rss;
  //~ }

 function getConf() {
	$result = dbquery('SELECT cnf_tmnow,cnf_tmafter,cnf_tmweek,cnf_tmrss FROM conf');
	$data = dbarray($result);

	echo "$(document).ready(function() { setTimers(" ;
	echo $data['cnf_tmnow'].  " , ";
	echo $data['cnf_tmafter']." , ";
	echo $data['cnf_tmweek']. " , ";
	echo $data['cnf_tmrss'].  ") } );";

}
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it-it" lang="it-it" >
<head>
  <meta http-equiv="content-type" content="text/html; <?php echo $kiosk_charset ?> charset=utf-8" />
  <meta name="description" content="kiosk" />
  <title><?php echo $kiosk_title ?></title>
  <link rel="stylesheet" href="css/kiosk.css" type="text/css" />
  <script type="text/javascript" src="js/coolclock.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.corners.js"></script>
  <script type="text/javascript" src="js/update.js"></script>
  <script type = "text/javascript" >

  
<?php echo getGiornaliero(date("w")-1); ?>

<?php //echo getRss();
 ?>

<?php echo getConf(); ?>

</script>

</head>

<body>
  <div id="week">
		<table width="100%"><tr><td class="week_title">SETTIMANALE</td></tr></table>    
		<div id=week_main>
			<?php echo getSettimanale(); ?>
    </div>
	</div>
	<div id="day">
		<table width="100%">
			<tr><td class="day_title">GIORNALIERO</td></tr>  
			<tr><td><canvas id="clockid" class="CoolClock"></canvas></td></tr>
			<tr><td><div id="oggi"></div></td></tr>
			<tr><td class="day_title"></td></tr>  
			<tr><td><i>RICEVONO:<i></td></tr> 
			<tr><td><div id="d1" style="display: none;"></div></td></tr>
		        <tr><td class="day_title"></td></tr> 
			<tr><td><div id="d2" style="display: none;"></div></td></tr>
	 </table>
	</div>
	<div id="news">
	</div>	
</body>
</html>
