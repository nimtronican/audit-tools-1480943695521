<?php

function createSelectBox($arrvaldisp,$sboxname,$defval){
	$output1.= "<select name='".$sboxname."' class='selbox'>";
	$selopt = "";
	foreach ($arrvaldisp as $v) {
	if($defval == $v[0]){$selopt="selected";}
      $output1.= '<option value="'.$v[0].'"'.$selopt.'>' . $v[1] . '</option>\n';$selopt="";
    }
	$output1.= "</select>";
	
	return $output1;
}
function endPacket(){
    ob_flush();
    flush();
	exit();
}
?>