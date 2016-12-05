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
<h1>Meta Analyzer</h1>
<?php
error_reporting(0);
ini_set("display_errors", 0);
include_once("./includes/functions.php");
$targeturl = $_POST['urlverify'];
if($_POST['stval'] == "") $startnumber = 1; else $startnumber = $_POST['stval'];
?>
<form action="./metaanalysis.php" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="hard" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br />Start Value = <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br /><br />
<input type="submit" value="Analyse Page" />
</form> 
<br /><br />
<input type="button" value="Select Table" onclick="SelectContent('formtbl');"> <br /><br />
<?
$tags1 = get_meta_tags("http://www-03.ibm.com/software/products/ja/category/marketing-performance-optimization");
$tags2 = get_meta_tags("http://www-03.ibm.com/software/products/en/category/digital-marketing-optimization");
echo $tags1['dc_language'];
echo $tags2['dc_language'];
?>
<?php
if($targeturl != "" && $targeturl != NULL){

	$turl = trim($targeturl);
    $turl = explode ("\n", $turl);
	$outputmain[0] = "<table id='formtbl' cellspacing='0' border='1' align='center' width='1000'><tr  style='text-align:left;font-weight:bold;'><td>Sno</td><td >URL</td><td>Page Title</td><td>DC Subject</td><td>WTM Category</td></tr>";
	$psno = $startnumber;
    foreach ($turl as $purl) {
		if(strpos($purl,'http://') !== 0){$purl = "http://".$purl;}
		echo $purl;
		//$urlStatus = getURLStatus($purl);
		//$scont = getSiteContent($purl);
		$tags = get_meta_tags($purl);
		echo $psno.$tags['dc_subject']."<br>";
		//$datatoprint = preg_match_all("|<meta[^>]+name=\"([^\"]*)\"[^>]" . "+content=\"([^\"]*)\"[^>]+>|i",$scont, $out,PREG_PATTERN_ORDER);
		//print_r($datatoprint);
		
		//echo $metatags['dc_language'];
		//$pagetitle = $metatags['title'];
		/*$dcsubj = $metatags['dc_subject'];
		$wtmcat = $metatags['ibm_wtmcategory'];	
		
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;'>".$purl."</td><td style='text-align:left;'>&nbsp;</td><td style='text-align:left' >".$dcsubj."</td><td>".$wtmcat."</td></tr>";*/
		//echo "<tr><td>".$psno."</td><td style='text-align:left;'>".$purl."</td><td style='text-align:left;'>".$pagetitle."</td><td style='text-align:left' >".$dcsubj."</td><td>".$wtmcat."</td></tr>";
		
		//echo "Total Number of forms in this page:". $nof-1;
		$psno++;
	}
	print_r($metatags);
	//$outputmain[$psno] = "</table>";
	//print_r($outputmain);
	//echo "</table>";
	//foreach($outputmain as $v) echo $v, PHP_EOL;

//print_r($outputmain);
}
?>
</body>
</html>