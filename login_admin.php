<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","gorgasal_wo","legolasi1","gorgasal_word");

$result = mysql_query("SELECT * FROM User WHERE user='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["Id"] = $row[Id];
$_SESSION["user"] = $row[user];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["Id"])) {
header("Location:adminmain.php");
}
?>