<?php
	$name = $_POST['name'];	
	$email = $_POST['email']; 
	$password = $_POST['password'];
	$upswd2 = $_POST['upswd2'];

	// Database connection
	if(isset($_POST['email'])){
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registrationguvi 
		(name, email, password, upswd2 ) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $password, $upswd2);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
}
?>