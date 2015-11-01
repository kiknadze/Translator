<?php
	include('config.php');
	//print_r($_POST);
	if (isset($_POST['text']) && isset($_POST['langId'])) {
		$sql = "SELECT Definition FROM words WHERE text=N'".$_POST['text']."' AND LangID=".$_POST['langId'];
		//$sql = "SELECT Definition FROM words WHERE text=N'ვაშლი' AND LangID=1";
		if (!$result = mysqli_query($connection, $sql)) {
			echo "Error!";
		}
		//echo mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		echo $row[0];
	}
?>