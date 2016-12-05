<? 
error_reporting(1);
ini_set("display_errors", "E_ALL");
include_once("./includes/addons.php");
ignore_user_abort(true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HTML Tag Data Finder</title>
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
<h1>HTML Tag Data Finder</h1>
<?php
$targeturl = $_POST['urlverify'];
$taginput = $_POST['tagname'];
$tagfmatch = $_POST['matchdata'];
$seltagarr=array(
				 array("h1","Heading 1"),
				 array("h2","Heading 2"),
				 array("h3","Heading 3"),
				 array("h4","Heading 4"),
				 array("h5","Heading 5"),
				 array("div","Div tag"),
				 array("a","A tag"),
				 array("span","SPAN tag"),
				 array("li","Unordered List"),
				 array("ol","Ordered List")
				 );
if($_POST['stval'] == "") {$startnumber = 1;} else {$startnumber = $_POST['stval'];}
?>
<form action="./taganalysis.php" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="hard" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br /><!--Start Value : <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br />-->
Select the Tag to Audit : <?=createSelectBox($seltagarr,"tagname",$taginput)?><br /><br />
Format to Match: <input type="text" value="<?=$tagfmatch?>" width="400" name="matchdata" />
<br /><br />
<input type="submit" value="Find Tag Data" />
</form> 
<br /><br />
<input type="button" value="Select Table" onclick="SelectContent('formtbl');"> 
<?php
if($targeturl != "" && $targeturl != NULL){
$time_start = microtime(true);
	$turl = trim($targeturl);
    $turl = explode ("\n", $turl);
	$outputmain[0] = "<table id='formtbl' cellspacing='0' border='1' align='center' width='800'>\n<tr style='text-align:center;font-weight:bold;background:#CFC;'><td>Sno.</td><td >URL</td><td>Tagcount</td><td>Value</td>";
	$outputmain[0] .= "</tr>";
	$psno = $startnumber;
    foreach ($turl as $purl) {
		if(connection_aborted()){endPacket();}else{
		$scont = getSiteContent($purl);
		print_r($scont);
		$domc = new DOMDocument();
		$domc->loadHTML($scont);
		echo $purl;
		//print_r($domc);
		$findtag = $domc->getElementsByTagName($taginput);
		$notgs = $findtag->length; //Number of tags
		$output = "";
		if($notgs != 0){
		for($i=0;$i<$notgs;$i++){
			$tagdata = $domc->getElementsByTagName($taginput)->item($i);
			print_r($tagdata);
				if($taginput == "a"){
					$taghref = $tagdata->getAttribute('href');
					//if(preg_match("/\/marketplace\//", $taghref) != "" && preg_match("/www.ibm.com/", $taghref) != ""){
						$tagval = $tagdata->nodeValue;
						//if($tagval != "Shop (US)"){
							$output .= $tagval."<br>".$taghref."<br>";
						//}
						$nof++;
					//}
				}else{
					$tagval = $tagdata->nodeValue;
					$output .= $tagval."<br>";
					$nof++;
				}
			}
		if($nof == 1){$kkt = "bgcolor='#F00'";}
		}
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;font-weight:bold;'>".$purl."</td><td>".$notgs."</td><td style='text-align:left;'>".$output."</td></tr>";
		$kkt = "";
		$scont = "";
		$domc = "";
		
		//echo "Total Number of forms in this page:". $nof-1;
		$psno++;}
	}
	$outputmain[$psno] = "</table>";
	foreach($outputmain as $v) echo $v, PHP_EOL;
$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;
echo '<div style="position:absolute; top:0px; right:50px; border:1px solid #CCC;"><strong>Total Execution Time:</strong> '.$execution_time.' Mins</div>';
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
		//CURLOPT_COOKIEFILE => $cookie,
		//CURLOPT_COOKIEJAR => $cookie ,
		CURLOPT_SSL_VERIFYPEER => 0 ,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_PORT => 8089
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