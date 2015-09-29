<?php 
//start session
session_start();

require 'connect.php';

//empty variable to use for error messages
$error = '';

if(isset($_POST['login'])){
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $prepare = $db->prepare($sql);
    //Bind value.
    $prepare->bindValue(':username', $username);
    //Execute.
    $prepare->execute();
    //Fetch row.
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
    
    //If user doest not match
    if($user === false){
        $error = "Username or Password is invalid. Try again.";
    } else{
		//Retrieve the user account information for the given password.
		$sql = "SELECT id, username, password FROM users WHERE password = :password";
		$prepare = $db->prepare($sql);
		//Bind value.
		$prepare->bindValue(':password', $password);
		//Execute.
		$prepare->execute();
		//Fetch row.
		$pass = $prepare->fetch(PDO::FETCH_ASSOC);
        
        if(!$pass === false){
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in'] = time();
            header('Location: dashboard.php');
            exit;
        } else{
            //$password doest not match
            $error = "Username or Password is invalid. Try again.";
        }
    }  
}
?>