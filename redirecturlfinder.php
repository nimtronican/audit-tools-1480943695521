<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>URL Tester - Nimtronican</title>
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
<h1>Redirect URL Finder</h1>
<?php
error_reporting(0);
ini_set("display_errors", 0);
include_once("./includes/functions.php");
$targeturl = $_POST['urlverify'];
if($_POST['stval'] == "") $startnumber = 1; else $startnumber = $_POST['stval'];
?>
<form action="./redirecturlfinder.php" method="post">
<!--<input name="urlverify" type="text" value="<?php echo $targeturl?>" style="width:600px; border:1px solid #666;" />-->
<textarea name="urlverify" cols="8" rows="10" wrap="hard" style="width:600px; border:1px solid #666;" ><?=$targeturl?></textarea><br /><br />Start Value = <input name="stval" type="text" value="<?=$startnumber?>" style="width:20px; border:1px solid #666;" /><br /><br />
<input type="submit" value="Test URLs" />
</form> 
<br /><br />
<input type="button" value="Select Table" onclick="SelectContent('formtbl');"> 
<?php
if($targeturl != "" && $targeturl != NULL){

	$turl = trim($targeturl);
	
    $turl = explode ("\n", $turl);
	$outputmain[0] = "<table id='formtbl' cellspacing='0' border='1' align='center' width='800'><tr><td>Sno</td><td style='text-align:left;font-weight:bold;'>Current URL</td><td>New URL</td></tr>";
	$psno = $startnumber;
    foreach ($turl as $purl) {
		//echo getSiteMeta($turl);
		//Temporary Code to segregate the non / URLs
		$testpurl = explode(".",$purl);
		//print_r($testpurl); exit();
		if(!$testpurl[3]){$purl = $purl."/";}
		$scont = findRedirectURL($purl);
		$outputmain[$psno] .= "<tr><td>".$psno."</td><td style='text-align:left;font-weight:bold;'>".$purl."</td><td>".$scont."</td></tr>";
		$scont = "";		
		$psno++;
	}
	$outputmain[$psno] = "</table>";
	foreach($outputmain as $v) echo $v, PHP_EOL;

//print_r($outputmain);
}

/**********FUNCTIONS******/
	
/**********FUNCTIONS******/
?>
</body>
</html>