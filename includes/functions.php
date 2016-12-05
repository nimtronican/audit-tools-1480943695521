<?
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
		// Check the result and display it.
		if (sizeof($tags) == 0){
			return 'No META information was found!';
		}else{
			//print_r($tags);
			return $tags;
		}
	}
	
	function getURLStatus($url){
		if(strpos($url,'http://') !== 0 || strpos($url,'https://') !== 0){$url = "http://".$url;}
		$handle = curl_init($url);
		
		curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
		
		/* Get the HTML or whatever is linked in $url. */
		$response = curl_exec($handle);
		
		/* Check for 404 (file not found). */
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		if($httpCode == 0){$response = curl_exec($handle); $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);}
		
		if($httpCode == 200){$pageStatus = "Deployed";}
		else if($httpCode == 301){$pageStatus = "Perm Redirection";}
		else if($httpCode == 302){$pageStatus = "Temp Redirection";}
		else if($httpCode == 404){$pageStatus = "Not Found";}
		else{$pageStatus = "Error";}
		
		curl_close($handle);
		
		return $pageStatus;
	}
	
	function findRedirectURL($url){	
					
		/*$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		curl_setopt($ch, CURLOPT_URL, $url);
		$out = curl_exec($ch);
	
		// line endings is the wonkiest piece of this whole thing
		$out = str_replace("\r", "", $out);
	
		// only look at the headers
		$headers_end = strpos($out, "\n\n");
		if( $headers_end !== false ) { 
			$out = substr($out, 0, $headers_end);
		}   
	
		$headers = explode("\n", $out);
		foreach($headers as $header) {
			if( substr($header, 0, 10) == "Location: " ) { 
				$target = substr($header, 10);
				
				return $target;
				continue 2;
			}   
		}   
	
		return "No Redirection";*/
		
		$redirect_url = null;


		   if(function_exists("curl_init")){
			  $ch = curl_init($url);
			  curl_setopt($ch, CURLOPT_HEADER, true);
			  curl_setopt($ch, CURLOPT_NOBODY, true);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			  $response = curl_exec($ch);
			  curl_close($ch);
		   }
		   else{
			  $url_parts = parse_url($url);
			  $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80));
			  $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
			  $request .= 'Host: ' . $url_parts['host'] . "\r\n";
			  $request .= "Connection: Close\r\n\r\n";
			  fwrite($sock, $request);
			  $response = fread($sock, 2048);
			  fclose($sock);
		   }
		
		
		   $header = "Location: ";
		   $pos = strpos($response, $header);
		   if($pos === false){
			  return "No Redirection";
		   }
		   else{
			  $pos += strlen($header);
			  $redirect_url = substr($response, $pos, strpos($response, "\r\n", $pos)-$pos);
			  return $redirect_url;
		   }
		
	}
/**********FUNCTIONS******/
?>