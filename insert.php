<?php

	include('session.php');
	include('config.php');
	
	if (isset($_POST['ena'])) {
		$ena = $_POST['ena'];
		$sql = "INSERT INTO language(Name) VALUES(N'$ena')";
		$result = mysqli_query($connection, $sql);

		if ($result) {
			echo '<div class="alert alert-success">ენა წარმატებით დაემატა.</div>';
		} else {
			echo '<div class="alert alert-danger">დაფიქსირდა შეცდომა!</div>';
		}
	} elseif (isset($_POST['name']) AND isset($_POST['targmani']) AND isset($_POST['ena_id'])) {
		// Get values from form 
		$name = $_POST['name'];
		$targmani = $_POST['targmani'];
		$ena_id = $_POST['ena_id'];

		$sql="INSERT INTO words(text, Definition, LangID) VALUES(N'$name', '$targmani', '$ena_id')";
		$result=mysqli_query($connection, $sql);

		if($result) {
			echo '<div class="alert alert-success">ენა წარმატებით დაემატა.</div>';
		} else {
			echo '<div class="alert alert-danger">დაფიქსირდა შეცდომა!</div>';
		}
	} else {
		echo '<div class="alert alert-warning">ველები სრულად არ არის შევსებული!</div>';
	}
?> 