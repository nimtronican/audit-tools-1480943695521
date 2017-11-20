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
<option value="0">Select Country</option>
<option value="en-in">AP-India</option>
<option value="en-au">AP-Australia</option>
<option value="en-nz">AP-New Zealand</option>
<option value="en-sg">AP-Singapore</option>
<option value="en-my">AP-Malaysia</option>
<option value="en-id">AP-Indonesia</option>
<option value="en-th">AP-Thailand</option>
<option value="en-vn">AP-Vietnam</option>
<option value="en-ph">AP-Phillipines</option>
<option value="ko-kr">AP-Korea</option>
<option value="ja-jp">Japan-Japan</option>
<option value="en-za">MEA-South Africa</option>
<option value="en-ae">MEA-UAE</option>
<option value="en-sa">MEA-Saudi Arabia</option>
<option value="en-eg">MEA-Egypt</option>
<option value="zh-cn">China-China</option>
<option value="zh-tw">China-Taiwan</option>
<option value="es-mx">SSA-Mexico</option>
<option value="es-ar">SSA-Argentina</option>
<option value="es-co">SSA-Colombia</option>
<option value="es-cl">SSA-Chile</option>
<option value="es-pe">SSA-Perú</option>
<option value="fr-fr">Europe-France</option>
<option value="de-de">Europe-Germany</option>
<option value="en-de">Europe-Germany(English)</option>
<option value="it-it">Europe-Italy</option>
<option value="es-es">Europe-Spain</option>
<option value="pt-br">Europe-Brazil</option>
<option value="fr-fr">Europe-France</option>
<option value="tr-tr">Europe-Turkey</option>
<option value="ru-ru">Europe-Russia</option>
<option value="pl-pl">Europe-Portugal</option>
<option value="en-uk">Europe-UK</option>
<option value='en-ie'>Europe-UKI-Ireland</option>
<option value='en-ch'>Europe-Switzerland</option>
<option value='en-at'>Europe-Austria</option>
<option value="en-nl">Europe-Netherlands</option>
<option value="en-be">Europe-Belgium</option>
<option value="en-lu">Europe-Lexumburg</option>
<option value='en-lv'>Europe-CEE-Latvia</option>
<option value='en-ro'>Europe-CEE-Romania</option>
<option value='en-hr'>Europe-CEE-Croatia</option>
<option value='en-lt'>Europe-CEE-Lithuania</option>
<option value='en-ee'>Europe-CEE-Estonia</option>
<option value='en-cz'>Europe-CEE-Czech Republic</option>
<option value='en-hu'>Europe-CEE-Hungary</option>
<option value='en-az'>Europe-CEE-Azerbaijan</option>
<option value='pl-pl'>Europe-CEE-Poland</option>
<option value='en-no'>Europe-Nordics-Norway</option>
<option value='en-fi'>Europe-Nordics-Finland</option>
<option value='en-dk'>Europe-Nordics-Denmark</option>
<option value='en-se'>Europe-Nordics-Sweden</option>
<option value="en-us">NA-USA</option>
<option value="en-ca">NA-Canada(English)</option>
<option value="fr-ca">NA-Canada(french)</option>
<option value="en-kw">MEA-Kuwait</option>
<option value="en-bh">MEA-Bahrain</option>
<option value="en-om">MEA-Oman</option>
<option value="en-qa">MEA-Qatar</option>
<option value="en-pk">MEA-Pakistan</option>
<option value="en-jo">MEA-Jordan</option>
<option value="en-lb">MEA-Lebanon</option>
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