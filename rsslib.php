<?php
if (eregi("rsslib.php", $_SERVER['PHP_SELF'])) die();


function RSS_Tags($item)
{
		$y = array();
		$tnl = $item->getElementsByTagName("title");
		$tnl = $tnl->item(0);
		$title = $tnl->firstChild->textContent;

		$tnl = $item->getElementsByTagName("description");
		$tnl = $tnl->item(0);
		$description = $tnl->firstChild->textContent;

    $n = strpos($description,"<");
    if( $n != false) {
       $description = substr($description,0,$n);
    }
		$y[0] = $title;
		$y[1] = $description;
		
		return $y;
}


function RSS_Channel($content,$channel,$i,$j)
{
  $sort = $i * $j + $i;
  if($sort == 0)
    $sort = $sort + $j;
	$items = $channel->getElementsByTagName("item");
	if($j == 0) {
    $sort = $i * 100;
    $j = 1;
  }
	foreach($items as $item)
	{
		$y = RSS_Tags($item);	// get description of article, type 1
    $y[2] = $sort;
		$content[] = $y;
    $sort = $sort + $j;
	}
  return $content;
}

function RSS_Retrieve($url,$i,$j)
{
	$content = array();

	$doc  = new DOMDocument();
	$doc->load($url);

	$channels = $doc->getElementsByTagName("channel");
	
	foreach($channels as $channel)
	{
		 $content = RSS_Channel($content,$channel,$i,$j);
	}
  return $content;
}

function RSS_main($urls, $collate) {
  $items = array();
  $i = 0;
  $j = $collate * 100;
  foreach($urls as $url) {
		$content = RSS_Retrieve($url,$i,$j);
		$items = array_merge($items,$content);
    $i = $i + 1;
  }
  usort($items,"array_cmp");
  return $items;
}

function array_cmp($a, $b)
{
    if ($a[2] == $b[2]) {
        return 0;
    }
    return ($a[2] < $b[2]) ? -1 : 1;
}



/***
* 
*  funzione di test: richiede un'array di url-xml dei feeds ed un flag per il raggruppamento
*
 ********************************************************************************/

function test() {

//  $urls = array("http://www.ansa.it/web/notizie/rubriche/politica/politica_rss.xml","http://www.ansa.it/web/notizie/rubriche/spettacolo/spettacolo_rss.xml");
  $urls = array("http://www.ansa.it/web/notizie/rubriche/spettacolo/spettacolo_rss.xml");

  $items = RSS_main($urls,1);

  echo "\n";
	foreach($items as $article) {
		$title = $article[0];
		$description = $article[1];
    $w = $article[2];

   	if($description == false)
	  {
		  $description == "";
	  }
    echo '[' . $w . ']  ' . $title . "\n          " . $description . "\n";
    echo "\n";
  }
}

function test1() {

//  $urls = array("http://www.ansa.it/web/notizie/rubriche/politica/politica_rss.xml","http://www.ansa.it/web/notizie/rubriche/spettacolo/spettacolo_rss.xml");
  $urls = array("http://www.ansa.it/web/notizie/rubriche/spettacolo/spettacolo_rss.xml");

  $items = RSS_main($urls,1);

  echo "var feed = new Array();\n";
  $i = 0;
	foreach($items as $article) {
		$title = $article[0];
		$description = $article[1];
    $w = $article[2];

   	if($description == false)
	  {
		  $description == "";
	  }
    echo 'feed[' . $i . '] = "<b>' . $title . '</b><br>&nbsp;&nbsp;&nbsp;' . $description . '"' . "\n";
    $i++;
  }
  echo "\n";
}
?>
