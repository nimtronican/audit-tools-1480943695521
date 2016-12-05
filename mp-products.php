<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Marketplace PDP List Finder</title>
<style>
body{font-family:Arial,Verdana,san-serif; background:#E3E3E3;font-size:12px;}
input[type="text"],label,select{height:23px;font-size:14px;margin-top:10px;padding:3px;}
select{height:28px;}
h4{color:#B00002}
button{width:200px;font-size:14px; background:#188500; color:#FFFFFF; padding:10px; margin-top:10px;font-weight:bold; border:none; border:1px solid #00480A;border-radius:3px; cursor:pointer;}
table{width:100%;}
table,td,tr{background:#FFFFFF;border-collapse:collapse;text-align:left;}
td{padding:10px;}
</style>
</head>
<body style="text-align:center;">
<h1>Find Marketplace PDP list under a category</h1>
<h4>Note: Only the Search URL's which contains "category[]=" is valid to use</h4>
<div id="inputdata" style="width:80%; padding:20px 10%; text-align:center; border:1px solid #CCC;background:#FFF9F9;font-size:14px;">
<form id="urlparameters">
<label>Enter the Search URL</label><br>
<input id="parameters" type="text" value="" style="width:100%;" /><br><br>
<label>Select country</label><br>
<select id="country">
<option value="0">Select Country</option>
<option value="en-in">India</option>
<option value="en-au">Australia</option>
<option value="en-nz">New Zealand</option>
<option value="en-sg">Singapore</option>
<option value="en-my">Malaysia</option>
<option value="en-id">Indonesia</option>
<option value="en-th">Thailand</option>
<option value="en-vn">Vietnam</option>
<option value="en-ph">Phillipines</option>
<option value="en-za">South Africa</option>
<option value="en-ae">UAE</option>

</select><br>
<button id="findproducts">Find PDP List</button>
</form>
</div>

<div id="contentdata" style="width:80%; padding:20px 10%; text-align:center; border:1px solid #CCC;background: #BBF0FF;font-size:14px;">
</div>

</body>
<!-- Additional JS Controllers -->
<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#findproducts").click(function(){
		var urlval = $("#parameters").val().split("?");
		urlval = urlval[1];
		var cntry = $("#country").val();
		if(urlval !="" && cntry != 0){
			var geturl = "//diver.mybluemix.net/marketplace/api/search/v2/api_search?"+urlval+"&locale="+cntry;
			//alert(geturl);
			$.get( geturl, function( data ) {
			  //alert(data["results"]["items"][1]["doc"]["contact"].toSource());
				var fulldata = '<table id="datatbl" border="1" cellpadding="0" cellspacing="0">';
				var maincount = data["results"]["total"];
				for(var i=0;i<maincount;i++)
				{
					if(typeof data["results"]["items"][i] !== 'undefined'){
					fulldata += '<tr><td>'+(i+1)+'</td><td>'+data["results"]["items"][i]["doc"]["name"]+'</td><td>'+data["results"]["items"][i]["doc"]["url"]+'</td>';
					}
				}
				fulldata += '</table>';
				$("#contentdata").html(fulldata);
			  
			  $( "#contentdata" ).prepend("<h2>Total number of PDP's: "+data["results"]["total"]+"</h2>");
			  //alert( "Load was performed." );
			});
			return false;
		}else{
			alert("URL & Country cannot be empty");
		}
	});
});

</script>
</html>
