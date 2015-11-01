<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<form method="post" action="getText.php">
			<input name="text" type="text" id="myText">
			<input name="langId" type="text" id="myLangId">
			<input onclick="sendInfo()" name="textGetBtn" type="button" value="Send">
		</form>
		<span id="result">RESULT</span>
		
		<script>
		function sendInfo() {
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("result").innerHTML=xmlhttp.responseText;
				}
			  }
			  
			var text = document.getElementById("myText").value;
			var langId = document.getElementById("myLangId").value;
			
			xmlhttp.open("POST","getText.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			var params = "text=" + text + "&langId=" + langId;
			xmlhttp.send(params);
		}
		</script>
	</body>
</html>