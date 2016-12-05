<!DOCTYPE html>
<html lang="en-US">

<head>
<meta charset="UTF-8">
</head>
<body>
<div id="inputdata">
<form id="urlparameters">
<label>Enter the Search URL</label>
<input id="parameters" type="text" value="" /><br>
<label>Select country</label>
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
</select><br>
<button id="findproducts">Find Product List</button>
</form>
</div>
<div id="contentdata">

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
			var geturl = "http://diver.mybluemix.net/marketplace/api/search/v2/api_search?"+urlval+"&locale="+cntry;
			alert(geturl);
			$.get( geturl, function( data ) {
			  //alert(data["results"]["items"][1]["doc"]["contact"].toSource());
				var fulldata = '<table border="1">';
				var maincount = data["results"]["total"];
				for(var i=0;i<maincount;i++)
				{
					if(typeof data["results"]["items"][i] !== 'undefined'){
					fulldata += '<tr><td>'+(i+1)+'</td><td>'+data["results"]["items"][i]["doc"]["name"]+'</td><td>'+data["results"]["items"][i]["doc"]["url"]+'</td>';
					}
				}
				fulldata += '</table>';
				$("#contentdata").html(fulldata);
			  
			  $( "#contentdata" ).prepend( data["results"]["total"]);
			  alert( "Load was performed." );
			});
			return false;
		}else{
			alert("URL & Country cannot be empty");
		}
	});
});

</script>
</html>