<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Finder</title>
<script type="text/javascript">
function SelectContent (el) {
	
var elemToSelect = document.getElementById (el);

        if (window.getSelection) {  // all browsers, except IE before version 9
            var selection = window.getSelection ();
            var rangeToSelect = document.createRange ();
            rangeToSelect.selectNodeContents (elemToSelect);

            selection.removeAllRanges ();
            selection.addRange (rangeToSelect);



        }

    else       // Internet Explorer before version 9
          if (document.body.createTextRange) {    // Internet Explorer
                var rangeToSelect = document.body.createTextRange ();
                rangeToSelect.moveToElementText (elemToSelect);
                rangeToSelect.select ();

        }

  else if (document.createRange && window.getSelection) {         
          range = document.createRange();             
          range.selectNodeContents(el);             
    sel = window.getSelection();     
                  sel.removeAllRanges();             
    sel.addRange(range);              
 }  
}
</script>
</head>
<body style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
<h1>IWM Form Finder</h1>
<?php
error_reporting(0);
ini_set("display_errors", 0);
$targeturl = $_POST['urlverify'];
if($_POST['stval'] == "") $startnumber = 1; else $startnumber = $_POST['stval'];
?>
<form action="./" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="hard" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br />Start Value = <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br /><br />
<input type="submit" value="Find Forms" />
</form> 
<br /><br />
<input type="button" value="Select Table" onclick="SelectContent('formtbl');"> 
<?php
if($targeturl != "" && $targeturl != NULL){

	$turl = trim($targeturl);
    $turl = explode ("\n", $turl);
	$outputmain[0] = "<table id='formtbl' cellspacing='0' border='1' align='center' width='800'>";
	$psno = $startnumber;
    foreach ($turl as $purl) {
		//getSiteMeta($targeturl);
		$scont = getSiteContent($purl);
		
		$domc = new DOMDocument();
		$domc->loadHTML($scont);
		
		$links = $domc->getElementsByTagName('a');
		$nol = countLinks($links); //Number of links
		$nof = 1; //Number of Forms
		$output = "";
		
		for($i=0;$i<$nol;$i++){
			$atag = $domc->getElementsByTagName('a')->item($i);
			$hrefval = $atag->attributes->getNamedItem('href')->value;
			if(strpos($hrefval,'source=') && !strpos($hrefval,'source=swgmail') && !strpos($hrefval,'source=raq')){
				$output .= "<tr><td height='25'></td><td style='text-align:left'>".$hrefval."</td><td></td></tr>";
				$nof++;
			}
		}
		if($nof == 1){$kkt = "bgcolor='#F00'";}
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;font-weight:bold;'>".$purl."</td><td ".$kkt.">".($nof-1)."</td></tr>".$output;
		$kkt = "";
		
		//echo "Total Number of forms in this page:". $nof-1;
		$psno++;
	}
	$outputmain[$psno] = "</table>";
	foreach($outputmain as $v) echo $v, PHP_EOL;

//print_r($outputmain);
}

/**********FUNCTIONS******/
function getSiteContent($url){
	//$cookie = tmpfile();
	$userAgent = 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31' ;
	
	$ch = curl_init($url);
	
	$options = array(
		CURLOPT_CONNECTTIMEOUT => 20 , 
		CURLOPT_USERAGENT => $userAgent,
		CURLOPT_AUTOREFERER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_COOKIEFILE => $cookie,
		CURLOPT_COOKIEJAR => $cookie ,
		CURLOPT_SSL_VERIFYPEER => 0 ,
		CURLOPT_SSL_VERIFYHOST => 0
	);
	
	curl_setopt_array($ch, $options);
	$kl = curl_exec($ch);
	curl_close($ch);
	return $kl;
	}
	
	function countLinks($links){
	
		$numLinks = 0;
		$pUrl[] = "";
		$pHref[] = "";
		foreach ($links as $link) {
		
			// Exclude if not a link or has 'nofollow'
			preg_match_all('/\S+/', strtolower($link->getAttribute('rel')), $rel);
			if (!$link->hasAttribute('href') || in_array('nofollow', $rel[0])) {
				continue;
			}
		
			// Exclude if internal link
			$href = $link->getAttribute('href');		
		
			// Increment counter otherwise
			//echo 'URL: ' . $link->getAttribute('href') . "\n";
			$numLinks++;
		
		}
		
		return $numLinks;
	}
	
	function getSiteMeta($domain){
	
		$tags = get_meta_tags($domain);
		echo "<table>";
		// Check the result and display it.
		if (sizeof($tags) == 0){
			echo '<tr><td>No META information was found!</td></tr>';
		}
		
		  foreach ($tags as $key=>$value) {
			echo "<tr><td>$key: </td><td>$value</td></tr>";
		  }
	echo "</table>";
	}
/**********FUNCTIONS******/
?>
</body>
</html>