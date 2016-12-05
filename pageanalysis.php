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
error_reporting(1);
ini_set("display_errors", 1);
include_once("./includes/functions.php");
include_once("./includes/simple_html_dom.php");
$targeturl = $_POST['urlverify'];
if($_POST['stval'] == "") $startnumber = 1; else $startnumber = $_POST['stval'];
?>
<form action="./pageanalysis.php" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="soft" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br />Start Value = <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br /><br />
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
		
		$urlStatus = getURLStatus($purl);
		$scont = getSiteContent($purl);
		
		$domc = new DOMDocument();
		
		$domc->loadHTML($scont);
		
		
		$x = new DOMXPath($domc);
		//$cmodule = $domc->getElementById('ibm-contact-module');
		
		/////////////////////Find Contact Modules////////////////////<br />
		$ocmAvail = "No";
		$ocmContents = "";
		if($domc->getElementById('ibm-contact-module')!==NULL){
			$cmdata = $x->query("//*[@id='ibm-contact-module']");
			$cm = $domc->saveHTML($cmdata->item(0));
			//print_r($cm);
			//print_r($cm->item(0));
			$cmhtml = str_get_html($cm);
			if ($cmhtml!=="") {
				$ocmAvail="Yes";
				foreach($cmhtml->find('a') as $cmldata){
					$ocmContents .= "<strong>".$cmldata->innertext."</strong><br />";
					$ocmContents .= $cmldata->href."<br />";
				}
				foreach($cmhtml->find('span') as $cmldata){
					if(!isset($cmldata->class)){
					$ocmContents .= "Priority Code<br />";
					$ocmContents .= $cmldata->innertext."<br />";
					}
				}
				//$ocmContents = "<div style='font-size:10px!important;'>".$cm."</div>";
			}
			$ocmAvail = "Yes";
		}
		else if($domc->getElementById('slideout-button')!==NULL){
			$ocmAvail = "Yes";
			$ocmContents = "Content cannot be parsed";
		}
		//$ocmDynAvail = "";
		/*
       	foreach ($cm as $cm) {
				  $getContent = $cm->childNodes;
				  echo $getContent->nodeValue;
				  foreach ($getContent as $attr) {
					 //if($attr->nodeName !== "#comment" && $attr->nodeName !== "#text"){
						$ocmContents = $attr->nodeValue;
						$ocmAvail="Yes";
						//}
					 //else if($attr->nodeName === "#comment"){$ocmDynAvail = $attr->nodeValue;}
				  }
			   }
			}*/
		/////////////////////Find Contact Modules////////////////////
		
		/////////////////////LIVEPERSON///////////////////
		preg_match_all('#<script(.*?)</script>#is', $scont, $matches);
		//print_r($matches);
		$skset="";
		foreach ($matches[0] as $value) {
			$skcheck = strstr($value,'editskill');
			//print_r($skcheck);
			$skarr = explode('"',$skcheck);
			$skset .= $skarr[1];
			if($skset != "")break;
		}
		$lcavail = "Y";
		if($skset == ""){$lcavail = "N";}
		/////////////////////LIVEPERSON///////////////////
		
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;'>".$purl."</td><td style='text-align:left'>".$skset."</td><td>".$lcavail."</td><td>".$ocmAvail."</td><td style='text-align:left;'>".$ocmContents."</td></tr>";
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