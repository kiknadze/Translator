<?php 
	require_once 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Translator</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!--<link rel="stylesheet" type="text/css" href="style.css">-->
		<script type="text/javascript">
		//monishnuli textis wakitxva da targetshi chawera
		if(!window.Kolich){
		  Kolich = {};
		}

		Kolich.Selector = {};
		Kolich.Selector.getSelected = function() {
		  var t = '';
		  if(window.getSelection){
			t = window.getSelection();
		  }else if(document.getSelection){
			t = document.getSelection();
		  }else if(document.selection){
			t = document.selection.createRange().text;
		  }
		  return t;
		}

		var st;
		Kolich.Selector.mouseup = function(){
		  st = Kolich.Selector.getSelected();
			
		  if(st != '') {
			//targetwordi
			var val, res = String(st).trim().split(" ");
			if (res.length > 1) {
				val = res[0];
			} else {
				val = res;
			}
			
			document.getElementById('targetWord').value = val;
		
			//
			sendInfo();
			//$('#resultWord').text("definision of word : " + st).show().fadeIn( 1000 );
		  }
		}

		$(document).ready(function(){
		  $(document).bind("mouseup", Kolich.Selector.mouseup);
		});
		//bazidan wamogeba

		//enis archeva
		
		</script>
	</head>
	<body>
		<div class="container">
			<br>
			<div class="row">
				<div class="col-xs-5">
					<input id="targetWord" type="text" class="form-control" placeholder="Selected text">
				</div>
				<div class="col-xs-2">
					<select class="form-control" id="langId" name="Language">
						<?php
							$sql = "Select ID, Name from language";
							$result = mysqli_query($connection, $sql);
							while ($row = mysqli_fetch_assoc($result))
								echo "<option value='".$row["ID"]."' >".$row["Name"]."</option>";
						?>
					</select>
				</div>
				<div class="col-xs-5">
					<input id="resultWord" type="text" class="form-control" placeholder="Output text">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<textarea class="form-control" rows="20" style="resize: vertical;" placeholder="Paste your text here...">ვაშლი Apple Albatrellus subrubescens is a species of polypore fungus in the family Albatrellaceae. The fruit bodies (mushrooms) of the fungus have whitish to pale buff-colored caps that can reach up to 14.5 cm (5.7 in) in diameter, and stems up to 7 cm (2.8 in) long and 2 cm (0.8 in) thick. On the underside of the caps are tiny light yellow to pale greenish-yellow pores, the site of spore production. When the fruit bodies are fresh, the cap and pores stain yellow where exposed, handled, or bruised. The species is found in Asia, Europe, and North America, where it grows on the ground in deciduous or mixed woods, usually in association with pine trees. It is closely related, and physically similar, to the more common Albatrellus ovinus, from which it may be distinguished macroscopically by differences in the color when bruised, and microscopically by the amyloid (staining bluish-black to black with Melzer's reagent) walls of the spores. The fruit bodies of A. subrubescens contain scutigeral, a bioactive chemical that has antibiotic activity. A. subrubescens mushrooms are mildly poisonous, and consuming them will result in a short-term gastrointestinal illness. (Full article...) Recently featured: December 1964 South Vietnamese coup – Murder of Leigh Leigh – 509th Composite Group	</textarea>
				</div>
			</div>
		</div>
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
						document.getElementById('resultWord').value = xmlhttp.responseText;
					}
				  }
				  
				var selection = document.getElementById("langId");
				var selectedValue = selection.options[selection.selectedIndex].value;
				
				xmlhttp.open("POST","getText.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				var params = "text=" + st + "&langId=" + selectedValue;
				xmlhttp.send(params);
			}	
		</script>
	</body>
</html>