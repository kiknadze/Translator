<?php
	include('session.php');
	include('config.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>განმარტებების დამატება/რედაქტირება</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!--<link href="style.css" rel="stylesheet" type="text/css">-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		var active = [false, false]; 
		function fun1(){
			$(profile).slideToggle();
			$(profile2).hide();
			
			if (!active[0]) {
				document.getElementById('activeList').children[0].className = 'active';
				active[0] = true;
			} else {
				document.getElementById('activeList').children[0].className = '';
				active[0] = false;
			}
			document.getElementById('activeList').children[1].className = '';
		}	
		function fun2(){
			$(profile2).slideToggle();
			$(profile).hide();
			
			if (!active[1]) {
				document.getElementById('activeList').children[1].className = 'active';
				active[1] = true;
			} else {
				document.getElementById('activeList').children[1].className = '';
				active[1] = false;
			}
			document.getElementById('activeList').children[0].className = '';
		}
		function fun3(){
			$(profile2).hide();
			$(profile).hide();
		}
		</script>
	</head>
	<body onload="fun3()">
	
		<!-- nav -->
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="profile.php">Dashboard</a>
			  <p class="navbar-text">მოგესალმები <?php echo $login_session; ?></p>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul id="activeList" class="nav navbar-nav">
				<li><a href="#" onclick="fun1()">სიტყვის დამატება</a></li>
				<li><a href="#" onclick="fun2()">ენის დამატება</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">გამოსვლა <span class="glyphicon glyphicon-log-out"></span></a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<!-- /.nav -->

		<div class="container" id="profile">
			<h2>სიტყვის დამატება</h2>
			<form name="form1" method="post" action="insert.php">
			<table class="table table-bordered" align="center">					
				<tr>
					<th>სიტყვა</th>
					<th>თარგმანი</th>
					<th>ენა</th>
				</tr>
				<tr>
					<td>
						<input class="form-control" fieldset="სიტყვა" name="name" type="text" id="name">
					</td>
					<td>
						<input class="form-control" fieldset="თარგმანი" name="targmani" type="text" id="targmani">
					</td>
					<td>
						<select class="form-control" name="ena_id">
						<?php
							$sql = "Select ID, Name from language";
							$result = mysqli_query($connection, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value='".$row["ID"]."' >".$row["Name"]."</option>";
							}
						?>
						</select> 
					</td>
				</tr>
				<tr>
					<td colspan="3"><input class="btn btn-default btn-block" type="submit" name="Submit" value="დამატება"></td>
				</tr>
			</table>
			</form>
		</div>
		
		<div class="container" id="profile2">
			<h2>ენის დამატება</h2>
			<!--form name="form1" method="post" action="insert.php">-->
			<table class="table table-bordered" align="center">					
				<tr>
					<td>
						<div class="input-group">
							<span class="input-group-addon">ენა</span>
							<input class="form-control" name="ena" type="text" id="ena">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input onclick="addLanguage()" class="form-control" type="submit" name="Submit" value="დამატება"></td>
				</tr>
			</table>
			<div id="outputMessage"></div>
			<!--</form>-->
		</div>
		<script>
		function addLanguage()
		{
			var language = document.getElementById('ena').value;
			var messageDiv = document.getElementById('outputMessage');
			if (language.trim() == '') {
				messageDiv.innerHTML = '<div class="alert alert-warning">ველები სრულად არ არის შევსებული!</div>';
				return;
			}
			var xhr;
			if (window.XMLHttpRequest) {
				xhr = new XMLHttpRequest();
			}
			else if (window.ActiveXObject) {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			}
			else {
				throw new Error("Ajax is not supported by this browser");
			}
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {
					if (xhr.status == 200 && xhr.status < 300) {
						messageDiv.innerHTML = xhr.responseText;
					}
				}
			}
			xhr.open('POST', 'insert.php');
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("ena=" + language); // set language name
		}
		</script>
	</body>
</html>