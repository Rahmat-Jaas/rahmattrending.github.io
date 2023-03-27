<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$cName = $_POST['cName'];
	$dName = $_POST['sType'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','hire');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into hiringform(firstName, lastName, cName, sType, gender, email, password, number) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssi", $firstName, $lastName, $cName, $sType, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Now Your Hiring procedure has been completed Successfully. Don't worry we will connect you soon...";
		echo ' <a href="index1.php">Back To Homepage</a>';
		$stmt->close();
		$conn->close();
	}
?>