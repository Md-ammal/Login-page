<?php
    // domain/host,username,password,dbname
    require_once('validlogin.php');
    require_once('connection.php');
    
    if(isset($_GET['delete_id'])) {
        if(!empty($_GET['delete_id'])){
            $query = 'select `profile_image` from register where id = '. $_GET['delete_id'];
            $response = mysqli_query($connection, $query);
            if(mysqli_num_rows($response) > 0) {
                $result = mysqli_fetch_assoc($response);
                if(isset($result['profile_image']) && !empty($result['profile_image'])) {
                    $img  = 'images/'.$result['profile_image'];
                    unlink($img);
                }
            }
            $query = 'delete from register where id = '. $_GET['delete_id'];
            mysqli_query($connection, $query);
        }
        header('location:listing.php');
        exit;
    }
 
    if(isset($_POST['id'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $education = $_POST['education'];
        $gender = $_POST['gender'];
        $hobbies = isset($_POST['hobbies']) ? implode(',', $_POST['hobbies']) : '';
        $email = $_POST['email'];
        $password =isset($_POST['password']) && !empty($_POST['password']) ? md5($_POST['password']) : '';
        $id = $_POST['id'];
        $image_name = $_POST['old_image'];


        if(isset($_FILES['image']) && !$_FILES['image']['error']) {
            $image_name = floor(microtime(true) * 1000).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "images/".$image_name);
        }
        
        if(!empty($id)) {
            $query = "update register set name = "."'".$name."'," . "education = "."'".$education."'," . "address = "."'".$address."',". "gender = "."'".$gender."',". "hobbies = "."'".$hobbies."',". "password = "."'".$password."',". "profile_image = "."'".$image_name."'". " where id= $id";
        } else {
            $query = "insert into register (`name`,`education`,`address`,`gender`,`hobbies`,`email`, `password`, `profile_image`) values ("."'".$name."',". "'".$education."',". "'".$address."'," ."'".$gender."',"."'".$hobbies."',"."'".$email."',". "'".$password."',"."'".$image_name."'".")";
        }
        
        // die($query);
        // insert into register (`name`,`education`,`address`,`gender`,`hobbies`,`email`, `password`) values (JAMES TEST, 10,100 HARBOUR PARADE
        // KATUSHIKAKU, male,gaming,reading,singing,admin@gmail.com, 123456)

        $res = mysqli_query($connection, $query);
        if($res) {
            echo "Thank you for your registration with us";
        } else {
            echo "Please try again";
        }

    }
    header('location:listing.php');
    

?>