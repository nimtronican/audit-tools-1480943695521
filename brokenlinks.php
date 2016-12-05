<?php
 error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("./includes/addons.php");
//INITIALIZE VARIABLES
$pageToCheck    = "www.ibm.com/services/forms/signup.do?source=swg-jp&S_PKG=ov28704";
$badLinks       = array();
$goodLinks      = array();
$badStatusCodes = array('308', '404');
 
//INITIALIZE DOMDOCUMENT
$domDoc = new DOMDocument;
$domDoc->preserveWhiteSpace = false;
 
//IF THE PAGE BEING CHECKED LOADS
	$scont = getSiteContent($pageToCheck);
	$domDoc->loadHTML($pageToCheck); 
	print_r($domDoc);
	echo "I am in";
     //LOOP THROUGH ANCHOR TAGS IN THE MAIN CONTENT AREA
     $pageLinks = $domDoc->getElementsByTagName('img');
     foreach($pageLinks as $currLink) {
          //LOOP THROUGH ATTRIBUTES FOR CURRENT LINK
          foreach($currLink->attributes as $attributeName=>$attributeValue) {
               //IF CURRENT ATTRIBUTE CONTAINS THE WEBSITE ADDRESS
               if($attributeName == 'src') {
                    //INITIALIZE CURL AND TEST THE LINK
                    $ch = curl_init($attributeValue->value);
                    curl_setopt($ch, CURLOPT_NOBODY, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_exec($ch);
                    $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
 
                    //TRACK THE RESPONSE
                    if(in_array($returnCode, $badStatusCodes)) {
                         $badLinks[]  = array('name'=>$currLink->nodeValue, 'link'=>$attributeValue->value);
                    } else {
                         $goodLinks[] = array('name'=>$currLink->nodeValue, 'link'=>$attributeValue->value);
                    }
               }
          }
     }
 
     //DISPLAY RESULTS
     print '<h2>Bad Links</h2>';
     print '<pre>' . print_r($badLinks, true) . '</pre>';
     print '<h2>Good Links</h2>';
	 
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
		CURLOPT_SSL_VERIFYHOST => 0
	);
	
	curl_setopt_array($ch, $options);
	$kl = curl_exec($ch);
	curl_close($ch);
	return $kl;
	}
?>