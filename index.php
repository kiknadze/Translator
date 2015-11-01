<?php
	include('login.php'); // Includes Login Script
?>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>შესვლა</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body>
		<div class="loginWrapper" id="main">
			<h1>სიტყვების დამატება</h1>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>შესვლის ფორმა</h2>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<table class="table">
							<tr>
								<th>მომხმარებელი:</th>
								<td>
									<input id="name" class="form-control" name="username" placeholder="ნიკი" type="text">
								</td>
							</tr>
							<tr>
								<th>პაროლი:</th>
								<td>
									<input id="password" class="form-control" name="password" placeholder="**********" type="password">
								</td>
							</tr>
							<tr>
								<td><!-- empty --></td>
								<td>
									<input class="btn btn-primary btn-block" name="submit" type="submit" value="შესვლა">
								</td>
							</tr>
							<?php echo $error; ?>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>