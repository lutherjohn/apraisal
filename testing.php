<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<style type="text/css">

	</style>
	<script type="text/javascript">
	function ajaxFunction(id, url){
		var xmlHttp;
		try {// Firefox, Opera 8.0+, Safari
			xmlHttp = new XMLHttpRequest();		
		} catch (e) {// Internet Explorer
			try {
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					alert("Your browser does not support AJAX!");
					return false;
				}
			}
		}
		
		xmlHttp.onreadystatechange = function(){
			if (xmlHttp.readyState == 4) {
				//Get the response from the server and extract the section that comes in the body section of the second html page avoid inserting the header part of the second page in your first page's element
				var respText = xmlHttp.responseText.split('<body>');
				elem.innerHTML = respText[1].split('</body>')[0];
			}
		}

		var elem = document.getElementById(id);
		if (!elem) {
			alert('The element with the passed ID doesn\'t exists in your page');
			return;
		}
	
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	}		
</script>
</head>

<body>
	<div id="test"></div>
	<form>
		<input type="button" value="Make Ajax Call" id="ajax" onclick="ajaxFunction('test','one.htm');"/>
	</form>
</body>
</html>