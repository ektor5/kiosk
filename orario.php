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

if (isset($_GET['cmd']) && ! eregi("orario", $_SERVER['HTTP_REFERER']))
  redirect('admin.php');

define("COLOR","#44FF44");
if(isset($_GET['cmd']) && ($_GET['cmd'] == '2' || $_GET['cmd'] == '4' || $_GET['cmd'] == '6'))
  define("REDIRECT","orario.php");

define("JAVASCRIPT","jquery.js");
define("JSCODE","
function check_doc(f)
{
  if(f.nome.value == '')
  {
    alert('Nome mancante');
    f.nome.focus();
    return false;
  }
  return true;
}
function dcheck(url)
{
  if(confirm('Eliminare i dati selezionati?'))
    document.location = url;
}
function grey(){
  var value = $('#delete').attr('checked');
  if (value){
    $('#textbox').attr('disable',true);
    $('#textbox').attr('readonly',true);
    $('#textbox').attr('value','');
    $('#textbox').css('background-color','lightgrey');
  }else{
    $('#textbox').attr('disable',false);    
    $('#textbox').attr('readonly',false);    
    $('#textbox').css('background-color','white');
  }
}
");

require_once "header.php";

if(!IsSet($_SESSION['logged']))
 redirect('admin.php');

// data index page

function selectGiorno($sel)
{
  global $giorni;
  echo '<select name="giorno">';
  for($i=0;$i<sizeof($giorni);$i++)
  {
    if ($i == $sel)
      echo '<option selected ';
    else
      echo '<option ';
    echo ' value="'.$i.'">'.$giorni[$i].'</option>';
  }
  echo "</select>\n";
}
function selectOra($sel)
{
  $result = dbquery("SELECT COUNT(ore_id) FROM ore");
  $hours = dbsingle($result);

  echo '<select name="ora">';
  for($i=1;$i<=$hours;$i++)
  {
    if ($i == $sel)
      echo '<option selected ';
    else
      echo '<option ';
    echo ' value="'.$i.'">'.$i.'</option>';
  }
  echo "</select>\n";
}
function selectAula($sel)
{ 
  $result = dbquery("SELECT * FROM aule");
  echo '<select name="aula">';
  if ($sel == -1) // aggiungi nuova aula
    echo '<option>Aggiungi aula</option>';
  else
    echo '<option></option>';
  while	($aula = dbarray($result)) 
  {
    if ($aula['aule_id'] == $sel)
      echo '<option selected ';
    else
      echo '<option ';
    echo ' value="'.$aula['aule_id'].'">'.$aula['aule_nome'].'</option>';
  }
  echo "</select>\n";
}

function get_data() {
  $list = array();
  $result = dbquery("SELECT doc_id, doc_nome, aule_nome FROM docenti LEFT JOIN aule ON doc_aula = aule_id ORDER BY doc_nome");
  while ($data = dbarray($result))
  {
    $id = $data['doc_id'];
    $result1 = dbquery("SELECT ora_id, ora_giorno, ora_ora, ora_note FROM orario WHERE ora_docente = $id ORDER BY ora_giorno,ora_ora");
    $orario = array(); 
    while ($data1 = dbarray($result1))
       $orario[] = array($data1['ora_id'],$data1['ora_giorno'],$data1['ora_ora'],$data1['ora_note']); // array di ore per docente
    $list[] = array($id,$data['doc_nome'],$orario,$data['aule_nome']); // lista completa dell'orario
  }
  return $list;
}

function draw_list()
{
  global $giorni;
  $result = dbquery("SELECT COUNT(ore_id) FROM ore");
  $hours = dbsingle($result);
  $result = dbquery("SELECT cnf_hlimit FROM conf");
  $hlimit = dbsingle($result);
  echo '<table class="tablelist" align="center">'."\n";
  echo '<colgroup span="1" ></colgroup>'."\n";
  echo '<colgroup span="1" ></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  echo '<colgroup span="6" width="10px" class="tbl_days"></colgroup>'."\n";
  // Header nella tabella dati
  echo '<tr class="tbl_head"><td align="center" rowspan="2">&nbsp;NOME&nbsp;<br>'."\n";  
  echo '<a href="'.$_SERVER['PHP_SELF'].'?cmd=7"><img class=actions src=pics/add.png title="Aggiungi docente"></></></td>'."\n";

  echo '<td align="center" rowspan="2">&nbsp;AULA&nbsp;<br>'."\n";
  echo '<a href="'.$_SERVER['PHP_SELF'].'?cmd=8"><img class=actions src=pics/mod.gif title="Modifica/aggiungi aule"></></></td>'."\n";

  foreach($giorni as $g)
    echo '<td align="center" colspan="'.$hours.'">&nbsp;'.$g.'&nbsp;</td>'."\n";
  echo '<td align="center" rowspan="2">&nbsp;OPERAZIONI&nbsp;</td></tr>'."\n";
  echo '<tr class="tbl_head">';
  for($i=0;$i<sizeof($giorni);$i++)
    for($j=1;$j<=$hours;$j++)
      echo '<td align="center">'.$j.'</td>';  
  echo '</tr>'."\n";
  // Tabella orario
  $list = get_data();
  $row = 0;
  foreach ($list as $data)
  {
    $orari = $data[2];
    echo '<tr class="tbl_'.$row.'"><td>'.$data[1].'</td>'; // NOME
    echo '<td>'.$data[3].'</td>'; 			   // AULA
    // TABELLA ORE
    for($i=0;$i<sizeof($giorni);$i++)   
      for($j=1;$j<=$hours;$j++)
        if(sizeof($orari)>0) {   // salta se il docente non ha ore
          $flag=-1;
          for($a=0;$a<sizeof($orari);$a++)
            if($orari[$a][1] == $i && $orari[$a][2] == $j) // individua l'ora in cui il docente riceve il giorno "i" nell ora "j" 
              $flag=$a;                                    // e assegna la variabile "a"(n ore) ad una flag
          if($flag<0) 					   // che viene controllata e assegna 
            echo '<td width="16px"></td>';                 // valore nullo se non viene trovata la corrispondenza
          else  {
            if(strlen($orari[$flag][3])>0) 		   // o l'immagine corretta in base alla presenza note
              echo '<td align="center"><a href="'.$_SERVER['PHP_SELF'].'?cmd=1&id='.$orari[$flag][0].'" ><img class=actions src="pics/set_note.png" title="'.$orari[$flag][3].'"></a></td>';
            else
              echo '<td align="center"><a href="'.$_SERVER['PHP_SELF'].'?cmd=1&id='.$orari[$flag][0].'"><img class=actions src="pics/set.png"></a></td>';
          }
        }
        else
          echo '<td width="16px"></td>';
    echo '<td align="center">'; // OPERAZIONI
    echo '<a href="'.$_SERVER['PHP_SELF'].'?cmd=5&id='.$data[0].'"><img class=actions src="pics/mod.gif" title="MODIFICA NOME"></a>';
    if (sizeof($orari)<$hlimit)  // controlla se e' stato raggiunto il numero di ore consentito
    	echo '<a href="'.$_SERVER['PHP_SELF'].'?cmd=3&id='.$data[0].'"><img class=actions src="pics/time.png" title="AGGIUNGI"></a>';
    else
	 	echo '<img class=actions src="pics/time_denied.png" title="Limite raggiunto!">';
    echo '<a href="javascript:dcheck(\''.$_SERVER['PHP_SELF'].'?cmd=2&id='.$data[0].'\')" ><img class=actions src="pics/del.gif" title="ELIMINA"></a>';
    echo '</td></tr>'."\n";
    $row = ($row)?0:1;
  }
  echo "</table><br><br>\n";
//  echo '<div align="center"><a href="'.$_SERVER['PHP_SELF'].'?cmd=7">AGGIUNGI DOCENTE</a></div>'."\n";
}

function draw_form($id,$id_nome,$nome,$giorno,$ora,$note)
{
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'"><table align="center">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;NOME&nbsp;</td><td><b>'.$nome.'</b></td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;GIORNO&nbsp;</td><td>';
  selectGiorno($giorno);
  echo '</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;ORA&nbsp;</td><td>';
  selectOra($ora);
  echo '</td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;NOTE&nbsp;</td><td><input type="text" name="note" value="'.$note.'" class="textbox" size="20" maxlength="20" ></td></tr>'."\n";
  echo '</td></tr></table><br>'."\n";
  echo '</div><input type="hidden" name="cmd" value="4">';
  echo '</div><input type="hidden" name="id" value="'.$id.'">';
  echo '</div><input type="hidden" name="id_nome" value="'.$id_nome.'">';
  echo '<div align="center"><input type="submit" name="submit" value=';
  if($id>0)
    echo '"CONFERMA">&nbsp;<input type="submit" name="submit" value="ELIMINA" >';
  else
    echo '"INSERISCI">';
  echo '</form>'."\n";
}
function draw_dform($id,$nome,$aula)
{
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return check_doc(this)"><table align="center">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;NOME&nbsp;</td>';
  echo '<td><input type="text" name="nome" value="'.$nome.'" class="textbox" size="20" maxlength="20" ></td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;AULA&nbsp;</td><td>';
  selectAula($aula);
  echo '</td></tr></table><br>'."\n";
  echo '</div><input type="hidden" name="cmd" value="6">';
  echo '</div><input type="hidden" name="id" value="'.$id.'">';
  echo '<div align="center"><input type="submit" value="CONFERMA" ></div></form>'."\n";
}
function draw_aform()
{ 
  echo '<form name="frm" method="get" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return check_doc(this)"><table align="center">'."\n";
  echo '<tr><td class="tbl_form">&nbsp;NOME&nbsp;</td>';
  echo '<td><input type="text" name="nome" value="" id="textbox" size="20" maxlength="20" ></td></tr>'."\n";
  echo '<tr><td class="tbl_form">&nbsp;AULA&nbsp;</td><td>';
  selectAula(-1);
  echo '</td></tr><tr><td class="tbl_form">&nbsp;ELIMINA&nbsp;<td><input id="delete" onchange="grey()" type="checkbox" name="elimina"><br>';
  echo '</td></tr></table><br>'."\n";
  echo '<input type="hidden" name="cmd" value="9">';
  echo '<div align="center"><input type="submit" value="CONFERMA" ></div></form>'."\n";
}

echo '<table width="100%"><tr><td class="page_head" style="background:'.COLOR.'">ORARIO</td></tr></table>',"\n";

if(isset($_GET['cmd']))
{
  switch($_GET['cmd'])
  {
    case '1':   // modifica orario
      $id = isNum($_GET['id']);
      $sql =  "SELECT doc_id, doc_nome ";
      $sql .= "FROM orario, docenti";
      $sql .= "WHERE doc_id = ora_docente AND ora_id = $id";
      $result = dbquery($sql);
      $data = dbarray($result);
      $id_nome = $data['doc_id'];
      $nome = $data['doc_nome'];
      $result = dbquery('SELECT ora_giorno, ora_ora, ora_note FROM orario WHERE ora_id = '.$id.' ORDER BY ora_giorno,ora_ora');
      $orario = array();
      if ($data = dbarray($result))
         draw_form($id,$id_nome,$nome,$data['ora_giorno'],$data['ora_ora'],$data['ora_note']);
      break;
    case '2':  // elimina
      $result = dbquery('SELECT ora_docente FROM orario WHERE ora_docente='.isNum($_GET['id']).' LIMIT 1');
      if($result && !dbrows($result))
      {
        $result = dbquery('DELETE FROM docenti WHERE doc_id='.isNum($_GET['id']));
        if($result && dbrows($result,"update"))
          message('Dati eliminati con successo');
        break;
      } 
      message("Impossibile effettuare l'operazione");
      break;
    case '3':  // aggiungi orario
      $id = isNum($_GET['id']);
      $result = dbquery("SELECT doc_nome FROM docenti WHERE doc_id = $id");
      $nome = dbsingle($result);
      draw_form(0,$id,$nome,0,1,'');
      break;
    case '4':  //conferma modifica
      if($_GET['submit'] == "ELIMINA") {
        $result = dbquery('DELETE FROM orario WHERE ora_id='.isNum($_GET['id']));
        if($result && dbrows($result,"update"))
          message('Dati eliminati con successo');
        break;
      }
      if($_GET['id'])
      {
        $result = dbquery('UPDATE orario SET ora_giorno='.isNum($_GET['giorno']).', ora_ora='.isNum($_GET['ora']).',ora_note="'.isText($_GET['note']).'"  WHERE ora_id='.isNum($_GET['id']));
        if($result && dbrows($result,"update"))
          message('Dati modificati con successo');
      }
      else
      {
        $result = dbquery('INSERT INTO orario VALUES ( DEFAULT, '.isNum($_GET['id_nome']).','.isNum($_GET['giorno']).','.isNum($_GET['ora']).',"'.isText($_GET['note']).'")');
        if($result && dbrows($result,"insert"))
          message('Dati aggiunti con successo');
      }
      break;
    case '5':   // modifica nome e aula
      $result = dbquery('SELECT * FROM docenti WHERE doc_id='.isNum($_GET['id']));
      $data = dbarray($result);
      draw_dform($data['doc_id'],$data['doc_nome'], $data['doc_aula']);
      break;
    case '6':  //conferma modifica nome e aula	
      $aula = ($_GET['aula'])?isNum($_GET['aula']):"NULL";
      if($_GET['id'])
      {
	$sql = 'UPDATE docenti SET doc_nome = "'.isText($_GET['nome']).'" ';
	$sql .='		 , doc_aula = "'.$aula.'" ';
	$sql .=' 	       WHERE doc_id ='.isNum($_GET['id']);
        $result = dbquery($sql);
        if($result && dbrows($result,"update"))
          message('Dati modificati con successo');
      }
      else
      {
        $result = dbquery('INSERT INTO docenti VALUES ( DEFAULT, "'.isText($_GET['nome']).'", "'.$aula.'")');
        if($result && dbrows($result,"insert"))
          message('Dati aggiunti con successo');
      }
      break;
    case '7':	//aggiungi docente
      draw_dform(0,'',0);
      break;
    case '8':	//modifica aule
      draw_aform();
      break;
    case '9':	//conferma modifica/aggiunta aula
      if($_GET['aula'] && !isset($_GET['elimina'])) //modifica nome aula
      {
	if(strlen($_GET['nome']) > 2){
	  $sql = 'UPDATE aule SET aule_nome = "'.isText($_GET['nome']).'" ';
	  $sql .='WHERE aule_id ='.isNum($_GET['aula']);
	  $result = dbquery($sql);
	  if($result && dbrows($result,"update"))
	    message('Dati modificati con successo');
        } else {
	  message('Nome non valido');
        }
      }
      elseif($_GET['aula'] && isset($_GET['elimina'])) //elimina aula
      {
	  $result = dbquery('DELETE FROM aule WHERE aule_id="'.isNum($_GET['aula']).'"');
	  if($result && dbrows($result,"update"))
	    message('Dati eliminati con successo');
      }
      elseif(!$_GET['aula'] && !isset($_GET['elimina'])) //aggiungi aula
      {
        $result = dbquery('INSERT INTO aule VALUES ( DEFAULT, "'.isText($_GET['nome']).'")');
        if($result && dbrows($result,"insert"))
          message('Dati aggiunti con successo');
      } 
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