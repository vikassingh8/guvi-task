<?php
    $email = $_POST['email'];
	$upswd2 = $_POST['upswd2'];   

    // Database connection
    if(isset($_POST['email'])){
	$con = new mysqli('localhost','root','','test');
    if($con->connect_error){
		echo "$con->connect_error";
		die("Connection Failed : ".$con->connect_error);
	} else {
        $stmt = $con->prepare("select * from registrationguvi where email= ?");
        $stmt ->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt ->get_result();
        if($stmt_result ->num_rows > 0){
            $data = $stmt_result ->fetch_assoc();
            if($data['upswd2'] === $upswd2){
                echo "<h2>Login Successfully</h2>";
            }else {
                echo "<h2>Invalid Email or Password</h2>";
            }
        }
        else{
            echo "<h2>Invalid Email or Password</h2>";
        }
    }
}
    ?>