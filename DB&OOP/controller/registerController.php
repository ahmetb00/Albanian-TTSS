<?php 
include_once '../repository/userRepository.php';
include_once '../user.php';

if(isset($_POST['registerBtn'])){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
        echo "Please fill all fields!";
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = md5($password);
        $id = rand(100,999);
        $role = 2;

        $user = new User($id,$name,$email,$password2,$role);
        $userRepository = new UserRepository();
        $userRepository->insertUser($user);

        header("Location: ../../log&reg.php");
        exit();
    }
}else{
    echo "Something Went wrong!";
}


?>