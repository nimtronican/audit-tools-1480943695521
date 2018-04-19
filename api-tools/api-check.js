var base_url = "http://localhost/gateway_main.php";
var base_url = "http://ibmnowtestapi.mybluemix.net/gateway_main.php";
ibmbox = {};
ibmbox.util = {};
ibmbox.util.doFeed = {
	init: function () {
		$('#result').val("Results will be displayed here...");
	},
	doAPI001: function () {
		var param = {'api_key':'API_KEY', 'api_name':'GET_POINT_COUNT', 'event_id':32,'customer_id':386,"customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199"};
		var url = base_url+"/api/event/get_customer_event_point.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	/*doAPI002: function () {
		var param = {'api_key':'API_KEY', 'event_code':'watsonsummit2017','customer_id':'386'};
		var url = base_url+"/api/event/get_customer_event_record_count.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI003: function () {
		var param = {'api_key':'API_KEY', 'event_code':'watsonsummit2017','customer_id':'342','exhibition_code':'47'};
		var url = base_url+"/api/event/get_customer_exhibition_application.php";
		var url = base_url ;
		this.getJSON(param,url);
	},*/
	doAPI004: function () {
		var param = {'api_key':'API_KEY','api_name':'GET_SESSION_APPLICATION', "customer_id":"342","customer_authkey":"1d8b4257910493fddff2211575d7fa2f","event_id":32};
		var url = base_url+"/api/event/get_customer_program_session_application.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI005: function () {
		var param = {'api_key':'API_KEY','api_name':'CREATE_EVENT_CHECKIN', 'event_id':32,"customer_authkey":"1d8b4257910493fddff2211575d7fa2f","customer_id":342,"device_type":'APP'};
		var url = base_url+"/api/event/create_customer_event_record.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI006: function () {

		var param = {'api_key':'API_KEY', 'api_name':'CREATE_POINT_ADJUST','event_id':32,'customer_id':386,"customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199",'point':10, "point_type":"LIVE_POLL",'record_date':'2018-02-18'};
		var url = base_url+"/api/event/create_customer_event_point.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI007: function () {
		var jsobj = new Object();
		jsobj.exhibition_id_list = "151,152,153,154,155,156,157,158,159";
		/*jsobj.exhibition_id_list = new Array('44','55');*/
		var param = {'api_key':'API_KEY','api_name':'CREATE_EXHIBITION_CHECKIN','event_id':32,"customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199",'customer_id':386,'exhibition_id_list':JSON.stringify(jsobj)};
		var url = base_url+"/api/event/create_customer_exhibition_record.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI008: function () {
		var jsobj = new Object();
		jsobj.session_id_list = "277,278,294,315,396";
		var param = {'api_key':'API_KEY', 'api_name':'CREATE_SESSION_CHECKIN','event_id':32,"customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199",'customer_id':386,'session_id_list':JSON.stringify(jsobj)};
		var url = base_url+"/api/event/create_customer_program_session_record.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	
	doAPI009: function () {
		var param = {'api_key':'API_KEY','api_name':'GET_USER_LOGIN', 'event_id':32,'login_email':'nimalakanth@in.ibm.com','login_pass':'shinsuke12haneda'};
		var url = base_url+"/api/event/check_user_login.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI010: function () {
		var param = {'api_key':'API_KEY','api_name':'GET_PROFILE_ALL','event_id':32,"customer_id":"0","customer_authkey":"hsjfhjads6w871687hjkdsf"};
		var url = base_url+"/api/event/get_customer_profile.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	/* doAPI011: function () {
		var param = {'api_key':'API_KEY','api_name':'GET_PROFILE_ALL','event_id':32,'customer_id':'386',"customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199","login_email":"nimalakanth@in.ibm.com", "url":"https://www.ibm.com/in-en/"};
		var url = base_url+"/api/event/customer_auto_login.php";
		var url = base_url ;
		this.getJSON(param,url);
	}, */
	doAPI012: function () {
		var param = {'api_key':'API_KEY', 'api_name':'GET_SESSION_EXHIBITION','event_id':32,"customer_id":"386","customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199"};
		var url = base_url+"/api/event/get_event.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	/* doAPI013: function () {

		var param = {'api_key':'API_KEY', 'api_name':'','event_code':'watsonsummit2017',"customer_id":"386","customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199","event_id":32,'program_session_code':'M2-2'};
		var url = base_url+"/api/event/create_customer_program_session_application.php";
		var url = base_url ;
		this.getJSON(param,url);
	}, */
	doAPI014: function () {

		var param = {'api_key':'API_KEY', 'api_name':'CREATE_EXHIBITION_ANALYZED','event_id':32,'customer_id':'386','customer_authkey':'e106ce3ed6c55b6588fb6df9d7c02199'};
		var url = base_url+"/api/event/create_analyze_exhibition.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI015: function () {
		var param = {'api_key':'API_KEY', 'api_name':'GET_EXHIBITION_RECOMMEND','event_id':32,'customer_id':'386','customer_authkey':'e106ce3ed6c55b6588fb6df9d7c02199'};
		var url = base_url+"/api/event/get_customer_event_recomended_exhibition.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	/* doAPI016: function () {
		var param = {'api_key':'API_KEY', 'api_name':'','event_code':'watsonsummit2017','customer_id':'342','device_id':'9847455','device_type':'APP','customer_authkey':'hsjfhjads6w871687hjkdsf'};
		var url = base_url+"/api/event/create_customer_event_change_device.php";
		var url = base_url ;
		this.getJSON(param,url);
	}, */
	doAPI017: function () {
		var param = {'api_key':'API_KEY', 'api_name':'CREATE_SESSION_CHANGES','event_id':32,'customer_id':'386','session_id':'294','customer_authkey':'e106ce3ed6c55b6588fb6df9d7c02199'};
		var url = base_url+"/api/event/create_program_session_change.php";
		var url = base_url ;
		this.getJSON(param,url);
	},
	doAPI018: function () {
		var param = {'api_key':'API_KEY', 'api_name':'CREATE_EXHIBITION_CHANGES','event_id':32,'customer_id':'386','exhibition_id':'154','customer_authkey':'e106ce3ed6c55b6588fb6df9d7c02199'};
		var url = base_url+"/api/event/create_program_exhibition_change.php";
		var url = base_url ;
		this.getJSON(param,url);
	},

	/* doAPI021: function () {
		var param = {'api_key':'API_KEY', 'api_name':'','event_id':32,"customer_authkey":"1d8b4257910493fddff2211575d7fa2f",'customer_id':342,'device_type':'APP',"event_checkedin":'Yes'};
		var url = base_url+"/api/event/create_event_checkin_pin.php" ;
		var url = base_url ;
		this.getJSON(param,url);
	}, */ 

	doAPI022: function () {
		var param = {'api_key':'API_KEY', 'api_name':'GET_PROFILE','event_id':32,"customer_id":"386","customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199"};
		var url = base_url+"/api/event/get_customer_profile.php";
		this.getJSON(param,url);
	}, 

	doAPI023: function () {
		var param = {'api_key':'API_KEY', 'api_name':'GET_SESSION_EXHIBITION','event_id':32,"customer_id":"386","customer_authkey":"e106ce3ed6c55b6588fb6df9d7c02199"};
		var url = base_url+"/api/event/get_event.php";
		this.getJSON(param,url);
	}, 
	doAPI024: function () {
		var param = {'api_key':'API_KEY', 'api_name':'SEND_EMAIL','event_id':32,'customer_id':342};
		var url = base_url+"/api/event/create_customer_sendmail.php" ;
		this.getJSON(param,url);
	}, 
	getJSON: function (param,url) {
		$.ajax({
			type: "POST",
			data: param,
			dataType:'json',
			url: url,
			timeout:10000,
			cache: false,
			success: function(res){
				console.log('Success:: geJSON:');
				ibmbox.util.doFeed.proceed(res);
			},
			error:function(res){
				console.log('Error:: cannot getJSON');
				console.log(res);
			}
		});
	},
	proceed: function (data) {
		console.log('Success:: proceed:'+JSON.stringify(data));
		$('#result').val(JSON.stringify(data));
	}
}

ibmbox.util.require = {
	loadlib: function (src, callback) {
		var done = false;
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.language='javascript';
		script.type='text/javascript';
		script.charset='utf-8';
		script.src = src;
		head.appendChild(script);
		script.onload = script.onreadystatechange = function() {
			if ( !done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") ) {
				done = true;
				callback();
				script.onload = script.onreadystatechange = null;
				if ( head && script.parentNode ) {
					head.removeChild( script );
				}
			}
		}
	}
}

if(typeof(jQuery) != 'function') {
	var jquery_url = "http://code.jquery.com/jquery-1.11.0.min.js";
	ibmbox.util.require.loadlib(jquery_url, function() {
		console.log("ibmbox.util.require.loadlib: "+jquery_url);
		if(typeof($) != 'function') {
			$ = jQuery;
		}
		$(function(){
			ibmbox.util.doFeed.init();
		});
	});
} else {
	if(typeof($) != 'function') {
		$ = jQuery;
	}
	$(function(){
		ibmbox.util.doFeed.init();
	});
}

