<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Analyzer - Nimtronican</title>
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
<h1>Page Analyzer</h1>
<?php
error_reporting(0);
ini_set("display_errors", 0);
include_once("./includes/functions.php");
$targeturl = $_POST['urlverify'];
if($_POST['stval'] == "") $startnumber = 1; else $startnumber = $_POST['stval'];
?>
<form action="./pageanalysis.php" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="hard" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br />Start Value = <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br /><br />
<input type="submit" value="Analyse Page" />
</form> 
<br /><br />
<input type="button" value="Select Table" onclick="SelectContent('formtbl');"> <br /><br />
<?php
if($targeturl != "" && $targeturl != NULL){

	$turl = trim($targeturl);
    $turl = explode ("\n", $turl);
	$outputmain[0] = "<table id='formtbl' cellspacing='0' border='1' align='center' width='1000'><tr  style='text-align:left;font-weight:bold;'><td>Sno</td><td >URL</td><td>LiveChat<br/>Skillset</td><td>LiveChat(Y/N)</td><td>OCM</td><td>OCM Details</td></tr>";
	$psno = $startnumber;
    foreach ($turl as $purl) {
		if(strpos($purl,'http://') !== 0){$purl = "http://".$purl;}
		//getSiteMeta($targeturl);
		$urlStatus = getURLStatus($purl);
		$scont = getSiteContent($purl);
		
		$domc = new DOMDocument();
		
		$domc->loadHTML($scont);
		
		
		$x = new DOMXPath($domc);
		
		/////////////////////Find Tabs////////////////////
		//$el = $x->query("//*[@id='ibm-primary-tabs']");
		//echo $el;
		//print_r($el->item(0));
		/*if (!$el==0) {
		$tabData = "";
       	foreach ($el as $el) {
				  $getContent = $el->childNodes;
				  foreach ($getContent as $attr) {
					 $tabData = preg_replace('/^\s+|\n|\r|\s+$/m', '<br>', $attr->nodeValue);					 
					 }
				  $tabData = str_replace('<br><br><br>','<br>',$tabData);
				  }
			   }*/
		/////////////////////Find Tabs////////////////////
		/////////////////////Find Contact Modules////////////////////
		$cm = $x->query("//*[@id='ibm-contact-module']");
		//echo $cm;
		//print_r($cm->item(0));
		if (!$cm==0) {
		$ocmAvail = "Yes";
		//$ocmDynAvail = "";
		$ocmContents = "";
       	foreach ($cm as $cm) {
				  $getContent = $cm->childNodes;
				  foreach ($getContent as $attr) {
					 if($attr->nodeName !== "#comment" && $attr->nodeName !== "#text"){
						$ocmContents = $attr->nodeValue;}
						break;
					 //else if($attr->nodeName === "#comment"){$ocmDynAvail = $attr->nodeValue;}
				  }
			   }
			}
		/////////////////////Find Contact Modules////////////////////
		/////////////////////No of IWM forms//////////////
		/*$links = $domc->getElementsByTagName('a');
		$nolnks = countLinks($links); //Number of links
		$nof = 1; //Number of Forms
		
		for($i=0;$i<$nolnks;$i++){
			$atag = $domc->getElementsByTagName('a')->item($i);
			$hrefval = $atag->attributes->getNamedItem('href')->value;
			if(strpos($hrefval,'source=') && !strpos($hrefval,'source=swgmail') && !strpos($hrefval,'source=raq')){
				//$output .= "<tr><td height='25'></td><td style='text-align:left'>".$hrefval."</td><td></td></tr>";
				$nof++;
			}
		}*/
		/////////////////////No of IWM forms//////////////
		
		/////////////////////LIVEPERSON///////////////////
		preg_match_all('#<script(.*?)</script>#is', $scont, $matches);
		//print_r($matches);
		$skillset = "";
		foreach ($matches[0] as $value) {
			$skcheck = strstr($value,'editskill');
			$skarr = explode('"',$skcheck);
			$skillset = $skarr[1];
			break;
		}
		$lcavail = "N";
		if($skillset != ""){$lcavail = "Y"}
		//echo $skilldata;
		/*$lcskill = $x->query('//script[string-length(text()) > 1]');
		//$js = "";
		foreach ($lcskill as $ppp) {
			$js .= $ppp."<br />";
		}
		echo $js;*/
		/////////////////////LIVEPERSON///////////////////
		
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;'>".$purl."</td><td >".$skillset."</td><td style='text-align:left' >".$lcavail."</td><td>".$ocmAvail."</td><td>".$ocmContents."</td></tr>";
		$output = "";
		$kkt = "";
		
		//echo "Total Number of forms in this page:". $nof-1;
		$psno++;
	}
	$outputmain[$psno] = "</table>";
	foreach($outputmain as $v) echo $v, PHP_EOL;

//print_r($outputmain);
}
?>
</body>
</html>