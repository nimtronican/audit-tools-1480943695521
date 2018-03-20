<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Marketplace PDP List Finder</title>
<style>
body{font-family:Arial,Verdana,san-serif; background:#E3E3E3;font-size:12px;}
input[type="text"],label,select{height:23px;font-size:14px;margin-top:10px;padding:3px;}
label{font-weight:bold;}
select{height:28px;}
h4{color:#B00002}
button,input[type="button"]{width:200px;font-size:14px; background:#188500; color:#FFFFFF; padding:10px; margin-top:10px;font-weight:bold; border:none; border:1px solid #00480A;border-radius:3px;cursor:pointer;}
input[type="button"]{ float:right;background-color:#00828C;margin-left:10px;}
table{width:100%;}
table th{text-align:center;padding:2px 0;}
table,td,tr{background:#FFFFFF;border-collapse:collapse;text-align:left;}
td{padding:10px;}
</style>
</head>
<body style="text-align:center;">
<h1>Find Marketplace PDP list for a Country</h1>
<h4>Enter "?" to list all pages (or) Category Listing URL (or) Search Term</h4>
<div id="inputdata" style="width:80%; padding:20px 10%; text-align:center; border:1px solid #CCC;background:#FFF9F9;font-size:14px;">
<form id="urlparameters">
<label><strong>Enter the Category Search URL</strong><br></label>Example: https://www.ibm.com/marketplace/search/sg/en-sg?category[]=Commerce<br>(or)<br>
<label><strong>Enter the Search Term URL</strong><br></label>Example: https://www.ibm.com/marketplace/search/sg/en-sg?terms=watson<br>
<input id="parameters" type="text" value="?" style="width:100%;" /><br><br>
<label>Select country</label><br>
<select id="country">
<!--AP-->
<option value="0">Select Country</option>
<option value="en-au">AP-Australia</option>
<option value="en-in">AP-India</option>
<option value="ko-kr">AP-Korea</option>
<option value="en-sg">AP-Singapore</option>
<option value="en-id">AP-Indonesia</option>
<option value="en-my">AP-Malaysia</option>
<option value="en-nz">AP-New Zealand</option>
<option value="en-ph">AP-Phillipines</option>
<option value="en-th">AP-Thailand</option>
<option value="en-vn">AP-Vietnam</option>
<option value="en-bd">AP-Bangladesh</option>
<option value="en-bn">AP-Brunei</option>
<option value="en-kh">AP-Cambodia</option>
<option value="en-lk">AP-SriLanka</option>
<option value="en-np">AP-Nepal</option>
<option value="vi-vn">AP-Vietnam(English)</option>
<!--AP/-->
<!--EU-->
<option value="en-cz">EU-Czech Republic</option>
<option value="de-de">EU-Germany</option>
<option value='en-dk'>EU-Denmark</option>
<option value="es-es">EU-Spain</option>
<option value="fr-fr">EU-France</option>
<option value="it-it">EU-Italy</option>
<option value="en-nl">EU-Netherlands</option>
<option value='pl-pl'>EU-Poland</option>
<option value="ru-ru">EU-Russia</option>
<option value='en-se'>EU-Sweden</option>
<option value="en-uk">EU-UK</option>
<option value='en-at'>EU-Austria</option>
<option value="en-be">EU-Belgium</option>
<option value='de-ch'>EU-Switzerland(German)</option>
<option value='fr-ch'>EU-Switzerland(French)</option>
<option value='en-ee'>EU-Estonia</option>
<option value='en-fi'>EU-Finland</option>
<option value='en-gr'>EU-Greece</option>
<option value='en-hu'>EU-Hungary</option>
<option value='en-ie'>EU-Ireland</option>
<option value='en-il'>EU-Israel</option>
<option value='en-lv'>EU-Latvia</option>
<option value='en-no'>EU-Norway</option>
<option value="pt-pt">EU-Portugal</option>
<option value="en-ai">EU-Anguilla</option>
<option value="fr-be">EU-Belgium(French)</option>
<option value="nl-be">EU-Belgium(Dutch)</option>
<option value="en-bg">EU-Bulgaria</option>
<option value="en-cy">EU-Cyprus</option>
<option value="en-gd">EU-Grenada</option>
<option value="en-hr">EU-Croatia</option>
<option value="en-kz">EU-Kazakhstan</option>
<option value="en-lt">EU-Lithuania</option>
<option value='en-ro'>EU-Romania</option>
<option value='en-rs'>EU-Serbia</option>
<option value='en-si'>EU-Slovenia</option>
<option value='en-sk'>EU-Slovakia</option>
<option value='en-ua'>EU-Ukraine</option>
<option value='en-uz'>EU-Uzbekistan</option>
<option value='en-vg'>EU-British Virgin Islands</option>
<!--EU/-->
<!--GCG-->
<option value="zh-cn">GCG-China</option>
<option value="en-hk">GCG-HongKong</option>
<option value="zh-tw">GCG-Taiwan</option>
<!--GCG/-->
<!--Japan-->
<option value="ja-jp">Japan-Japan</option>
<!--Japan/-->
<!--LA-->
<option value="es-ar">LA-Argentina</option>
<option value="pt-br">LA-Brazil</option>
<option value="es-cl">LA-Chile</option>
<option value="es-co">LA-Colombia</option>
<option value="es-mx">LA-Mexico</option>
<option value="es-pe">LA-Perú</option>
<option value="es-ec">LA-Ecuador</option>
<option value="es-uy">LA-Uruguay</option>
<option value="es-ve">LA-Venezuela</option>
<option value="es-bo">LA-Bolivia</option>
<option value="es-cr">LA-Costa Rica</option>
<option value="en-cw">LA-Curacao</option>
<option value="en-dm">LA-Dominica</option>
<option value="en-gy">LA-Guyana</option>
<option value="es-py">LA-Paraguay</option>
<!--LA/-->
<!--MEA-->
<option value="en-ae">MEA-UAE</option>
<option value="en-eg">MEA-Egypt</option>
<option value="en-sa">MEA-Saudi Arabia</option>
<option value="tr-tr">MEA-Turkey</option>
<option value="en-za">MEA-South Africa</option>
<option value="en-af">MEA-Afghanistan</option>
<option value="pt-ao">MEA-Angola</option>
<option value="fr-bf">MEA-Burkina Faso</option>
<option value="en-bh">MEA-Bahrain</option>
<option value="en-bw">MEA-Botswana</option>
<option value="fr-cd">MEA-Democratic Republic of Congo</option>
<option value="fr-cg">MEA-Congo Rep</option>
<option value="fr-ci">MEA-Ivory Coast</option>
<option value="en-cm">MEA-Cameroon</option>
<option value="fr-cm">MEA-Cameroon(French)</option>
<option value="fr-dz">MEA-Algeria</option>
<option value="en-et">MEA-Ethiopia</option>
<option value="fr-ga">MEA-Gabon</option>
<option value="en-gh">MEA-Ghana</option>
<option value="en-iq">MEA-Iraq</option>
<option value="en-jo">MEA-Jordan</option>
<option value="en-ke">MEA-Kenya</option>
<option value="en-kw">MEA-Kuwait</option>
<option value="en-lb">MEA-Lebanon</option>
<option value="en-ly">MEA-Libya</option>
<option value="fr-ma">MEA-Morocco</option>
<option value="fr-mg">MEA-Madagascar</option>
<option value="en-mu">MEA-Mauritius</option>
<option value="fr-mu">MEA-Mauritius(French)</option>
<option value="en-mw">MEA-Malawi</option>
<option value="pt-mz">MEA-Mozambique</option>
<option value="en-na">MEA-Namibia</option>
<option value="fr-ne">MEA-Niger</option>
<option value="en-ng">MEA-Nigeria</option>
<option value="en-om">MEA-Oman</option>
<option value="en-pk">MEA-Pakistan</option>
<option value="en-qa">MEA-Qatar</option>
<option value="en-sc">MEA-Seychelles</option>
<option value="fr-sc">MEA-Seychelles(French)</option>
<option value="en-sl">MEA-Sierra Leone</option>
<option value="fr-sn">MEA-Senegal</option>
<option value="fr-td">MEA-Chad</option>
<option value="fr-tn">MEA-Tunisia</option>
<option value="en-tz">MEA-Tanzania</option>
<option value="en-ug">MEA-Uganda</option>
<option value="en-ye">MEA-Yemen</option>
<option value="en-zm">MEA-Zambia</option>
<option value="en-zw">MEA-Zimbabwe</option>
<!--MEA/-->
<!--NA-->
<option value="fr-ca">NA-Canada(French)</option>
<option value="en-us">NA-USA</option>
<option value="en-aw">NA-Aruba</option>
<option value="en-bb">NA-Barbados</option>
<option value="en-bm">NA-Bermuda</option>
<option value="en-bs">NA-Bahamas</option>
<option value="en-ca">NA-Canada(English)</option>
<option value="en-jm">NA-Jamaica</option>
<option value="en-kn">NA-Saint Kitts and Nevis</option>
<option value="en-ky">NA-Cayman Islands</option>
<option value="en-ms">NA-Montserrat</option>
<option value="en-tt">NA-Trinidad and Tobago</option>
<option value="en-sr">NA-Suriname</option>
<option value="en-ag">NA-Antigua and Barbuda</option>
<option value="en-lc">NA-SaintLucia</option>
<option value="en-tc">NA-Turks and Caicos Islands</option>
<option value="en-vc">NA-Saint Vincent andthe Grenadines</option>
<!--NA/-->
</select><br>
<input type="checkbox" name="purchasable" id="purchasable" style="margin-top:20px;" /><label for="purchasable">Show only Purchasable Products</label><br>
<button id="findproducts">Find PDP List</button>
</form>
</div>

<div id="contentdata" style="padding:20px 1%; text-align:center; border:1px solid #CCC; border-top:none;background: #BBF0FF;font-size:14px;display:none;position:relative;">
</div>
<!--<div id="contacttoadd" style="background:#FFF; padding:10px 0; width:100%;position:static;bottom:0px;">Tool managed by <a href="mailto:ksehmbey@in.ibm.com">Kamaldeep</a> &amp; <a href="nimalakanth@in.ibm.com">Nimalakanth</a> for Marketplace &amp; Merchandising team.</div>-->
</body>
<!-- Additional JS Controllers -->
<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="./js/jquery.table2excel.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#findproducts").click(function(){
		$( "#contentdata").show();
		$("#contentdata").html("Loading...<br>");
		var urlval = $("#parameters").val();
		var cntry = $("#country").val();
		var purchflg = 0;
		var tnopurch = 0;
		if($('#purchasable').is(":checked")){
			purchflg = 1;
		}
		//alert(purchflg);
		if(urlval !="" && cntry != 0){
			var maincount = 0;
			var geturl = "";
			var geturl1 = "";
			urlval = $("#parameters").val().split("?");
			urlval = urlval[1];
			geturl = "//diver.mybluemix.net/marketplace/api/search/v2/api_search?"+urlval+"&productType=product&locale="+cntry;
			//alert(geturl);
			$.get(geturl, function( valdata ) {
				maincount = valdata["results"]["total"];
				//alert(geturl);
				$("#contentdata").append("Total of "+maincount+" found... Loading takes some time. Please wait...");
				if(purchflg){$("#contentdata").append("<br>Listing the Purchasable products");}
				geturl1 = "//diver.mybluemix.net/marketplace/api/search/v2/api_search?"+urlval+"&locale="+cntry+"&limit="+maincount+"&sortBy=doc.name.raw&sortOrder=asc&productType=product&fromPosition=0";
				//alert(geturl1);
					$.get( geturl1, function( data ) {
				  //alert(data["results"]["items"][1]["doc"]["contact"].toSource());
					var fulldata = '<table id="datatbl" border="1" cellpadding="0" cellspacing="0">';
					fulldata +='<tr><th>Sno</th><th>Product Name</th><th>Product URL</th><th>Taxonomy</th><th>Category</th><th>Contact Module<br>(Priority Code)</th><th>Other Contact Module Details</th><th>Primary CTA</th><th>Secondary CTA</th><th>Purchasable</th></tr>';
					var purchasable = "No";
					var cntry_code = cntry.split("-");
					cntry_code = cntry_code[0]+"_"+cntry_code[1].toUpperCase();
					//cntry_code = cntry_code[1]+"_"+cntry_code[0];
					//alert(cntry_code);
					for(var i=0;i<maincount;i++)
					{
						if(typeof data["results"]["items"][i] !== 'undefined'){
							
							if(typeof data["results"]["items"][i]["doc"]["commerce"] != 'undefined'){
								if(typeof data["results"]["items"][i]["doc"]["commerce"][cntry_code]['startingAtOfferingInfoDetail'] != 'undefined'){
								purchasable = "Yes";
								}
							}
							if(purchflg && purchasable == "Yes"){
								fulldata += '<tr><td>'+(tnopurch+1)+'</td><td>'+data["results"]["items"][i]["doc"]["name"]+'</td><td>'+data["results"]["items"][i]["doc"]["url"]+'</td>';
								if(typeof data["results"]["items"][i]["doc"]["taxonomy"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["taxonomy"]+'</td>';
								}else{
									fulldata += '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["category"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["category"]+'</td>';
								}else{
									fulldata += '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["contact"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["contact"][cntry_code]["priority"]+'</td>';
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["contact"][cntry_code]["contact-web-form"]+'</td>';
								}else{
									fulldata += '<td></td><td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["call-to-action-primary"]!= 'undefined'){
									var urxval = "";
									if(data["results"]["items"][i]["doc"]["call-to-action-primary"]["url"]==""){
									urxval = "URXForm:"+data["results"]["items"][i]["doc"]["call-to-action-primary"]["urx-form"]}
									else{urxval = "URL:"+data["results"]["items"][i]["doc"]["call-to-action-primary"]["url"]}
									
									fulldata += '<td>'+"CTA: "+data["results"]["items"][i]["doc"]["call-to-action-primary"]["label"]+ '<br>'+urxval+'</td>';
								}else{
									fulldata+= '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["call-to-action-secondary"]!= 'undefined'){
									if(data["results"]["items"][i]["doc"]["call-to-action-secondary"]["label"] != ""){
										var urxval = "";
										if(data["results"]["items"][i]["doc"]["call-to-action-secondary"]["url"]==""){
										urxval = "URXForm:"+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["urx-form"]}
										else{urxval = "URL:"+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["url"]}
										
										fulldata += '<td>'+"CTA: "+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["label"]+ '<br>'+urxval+'</td>';
									}
								}else{
									fulldata+= '<td></td>';
								}
								fulldata += '<td>'+purchasable+'</td>';
								tnopurch++;
							}else if(!purchflg){
								fulldata += '<tr><td>'+(i+1)+'</td><td>'+data["results"]["items"][i]["doc"]["name"]+'</td><td>'+data["results"]["items"][i]["doc"]["url"]+'</td>';
								if(typeof data["results"]["items"][i]["doc"]["taxonomy"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["taxonomy"]+'</td>';
								}else{
									fulldata += '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["category"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["category"]+'</td>';
								}else{
									fulldata += '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["contact"]!= 'undefined'){
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["contact"][cntry_code]["priority"]+'</td>';
									fulldata += '<td>'+data["results"]["items"][i]["doc"]["contact"][cntry_code]["contact-web-form"]+'<br>'
													  +data["results"]["items"][i]["doc"]["contact"][cntry_code]["live-chat"]+'<br>'
													  +data["results"]["items"][i]["doc"]["contact"][cntry_code]["phone"]+'</td>';
								}else{
									fulldata += '<td></td><td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["call-to-action-primary"]!= 'undefined'){
									
									var urxval = "";
									if(data["results"]["items"][i]["doc"]["call-to-action-primary"]["url"]==""){
									urxval = "URXForm:"+data["results"]["items"][i]["doc"]["call-to-action-primary"]["urx-form"]}
									else{urxval = "URL:"+data["results"]["items"][i]["doc"]["call-to-action-primary"]["url"]}
									
									fulldata += '<td>'+"CTA: "+data["results"]["items"][i]["doc"]["call-to-action-primary"]["label"]+ '<br>'+urxval+'</td>';
								}else{
									fulldata+= '<td></td>';
								}
								if(typeof data["results"]["items"][i]["doc"]["call-to-action-secondary"]!= 'undefined'){
									if(data["results"]["items"][i]["doc"]["call-to-action-secondary"]["label"] != ""){
										var urxval = "";
										if(data["results"]["items"][i]["doc"]["call-to-action-secondary"]["url"]==""){
										urxval = "URXForm:"+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["urx-form"]}
										else{urxval = "URL:"+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["url"]}
										
										fulldata += '<td>'+"CTA: "+data["results"]["items"][i]["doc"]["call-to-action-secondary"]["label"]+ '<br>'+urxval+'</td>';
									}
								}else{
									fulldata+= '<td></td>';
								}
								fulldata += '<td>'+purchasable+'</td>';
							}
							
							purchasable = "No";
							
						}
					}
					fulldata += '</table>';
				  $("#contentdata").html("");
				  $("#contentdata").append(fulldata);
				  $( "#contentdata" ).prepend('<input type="button" id="selecttbl" value="Select Table" onclick="SelectContent(\'datatbl\');" />'); 
				  $( "#contentdata" ).prepend('<input type="button" id="download" value="Download Table as Excel" onclick="downloadContent(\'datatbl\',\''+cntry_code+'\');">'); 
				  if(purchflg)maincount = tnopurch + " purchasable products";
				  $( "#contentdata" ).prepend("<h2 style='text-align:left;float:left;'>Total number of products found: "+maincount+"</h2>");
				  $("#contentdata").css("overflow-y","scroll");
				});
			});
			return false;
		}else{
			alert("URL & Country cannot be empty");
			return false;
		}
		
	});
	
});
function downloadContent(el,ccd) {
		//alert(el+ccd);
	$("#"+el).table2excel({
		 // exclude CSS class
	    exclude: ".noExl",
	    name: "mpurl_"+ccd,
	    filename: Math.floor(Math.random()*100000)+"_"+ccd.toLowerCase()
	  }); 
}
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
</html>
