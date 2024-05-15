<?php
// print_r($_POST);
// die;
if(isset($_POST['email']) && isset($_POST['password'])) {
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        require_once('connection.php');
        $query = "select * from register where email="."'".$_POST['email']."' and password ="."'".md5($_POST['password'])."'";
        $response = mysqli_query($connection, $query);
        if(mysqli_num_rows($response) > 0) {
            $result = mysqli_fetch_assoc($response);   
            session_start();
            $_SESSION['userdata'] = $result;
            echo 1;
            // header('location:listing.php');
            exit;
        } else {
            session_start();
            unset($_SESSION['userdata']);
            // header('location:login.php?error=true');
            echo 0;   
            exit;                     
        }
        
    } else {
        session_start();
        unset($_SESSION['userdata']);
        echo 0;   
        exit; 
    }
} else {
    session_start();
    unset($_SESSION['userdata']);
    header('location:login.php');
}
// echo 0;


?>