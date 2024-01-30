<?php 
session_start(); 
include_once "db_conn.php";

//shikojme nese email dhe password eshte shkruar ne formen e login
if (isset($_POST['loginBtn'])){

	//tani sigurojme qe inputi eshte correct ose i perdorshem
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$password1 = md5($password);

	
	//nese username dhe password nuk eshte dhene i zbrazet
	if (empty($email)) {
		header("Location: ../log&reg.php?message=Email nuk eshte valid!");
	    exit();
	}else if(empty($password)){
        header("Location: ../log&reg.php?message=Password nuk eshte valid!");
	    exit();
	}else{
		//marrim te dhenat nga databaza dhe shikojme nese nese kemi ndonje user te regjistruar
		try {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->startConnection();

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password1]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['name'] = $user['name'];
                $_SESSION['id'] = $user['user_ID'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['email'] = $user['email'];
                header("Location: ../index.php");
                exit();
            } else {
                header("Location: ../log&reg.php?message=Incorrect email or password!");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
	}
}else{
    header("Location: ../../log&reg.php?message=Keni shkruar passwordin ose email gabim!");
	exit();
}