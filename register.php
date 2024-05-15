<!DOCTYPE html>
<html>
    <head>
        <title>
            Registration form
        </title>
    </head>
    <body>
        <h1>
            Registration form
        </h1>
        <br>
        <?php
            require_once('connection.php');
            if(isset($_GET['id']) && !empty($_GET['id'])) {
                $query = "select * from register where id = " .$_GET['id'];
                $response = mysqli_query($connection, $query);
                if(mysqli_num_rows($response) > 0) {
                    $result = mysqli_fetch_assoc($response);
                    $hobbies = explode(',', $result['hobbies']);
                }
                
            }
        
        
        ?>
        <form id="ID_form" name="form" enctype="multipart/form-data" class="ClassForm" method="post" action="formdata.php">
            <label for="name"> Name : </label><br>
            <input type="text" name="name" id="ID_name" class="" value="<?php if(isset($result)) { echo $result['name']; }?>">
            <input type="hidden" name="id" id="id" class="" value="<?php if(isset($result)) { echo $result['id']; }?>">
            <br><br><br>
            <label for="address">Address :</label>
            <br>
            <textarea id="ID_adress" name="address" class="" rows="8" cols="25"><?php if(isset($result)) { echo $result['address']; }?></textarea>
            <br><br><br>
            <label for="education">highest level of education :</label>
            <select id="ID_education" name="education" class="">
                <option value="">Choose one</option>
                <option <?php if(isset($result) && $result['education'] == '10' ) { echo 'selected'; }?> value="10">High School</option>
                <option <?php if(isset($result) && $result['education'] == '12' ) { echo 'selected'; }?>value="12">Sr. Secondary</option>
                <option <?php if(isset($result) && $result['education'] == 'bachelor' ) { echo 'selected'; }?>value="bachelor"> Bachelor</option>
                <option <?php if(isset($result) && $result['education'] == 'master' ) { echo 'selected'; }?>value="master">Master</option>
                <option <?php if(isset($result) && $result['education'] == 'phd' ) { echo 'selected'; }?>value="phd">PhD</option>
            </select>
            <br><br><br>
            <label for="gender"> gender :</label>
            <br><br>
            <input type="radio" id="male" value="male" name="gender" <?php if(isset($result) && $result['gender'] == 'male' ) { echo 'checked'; }?>><label for="male">Male</label>  
            <input type="radio" id="female" value="female" name="gender" <?php if(isset($result) && $result['gender'] == 'female' ) { echo 'checked'; }?>><label for="female">Female</label> <br>
            <br><br>
            <label for="hobbies"> Hobbies :</label>
            <br>
            <input type="checkbox" id="ID_gaming" name="hobbies[]" <?php if(isset($hobbies) && in_array('gaming', $hobbies) ) { echo 'checked'; }?> value="gaming">Gaming <br>
            <input type="checkbox" id="ID_reading" name="hobbies[]" <?php if(isset($hobbies) && in_array('reading', $hobbies) ) { echo 'checked'; }?> value="reading">Reading<br>
            <input type="checkbox" id="ID_singing" name="hobbies[]" <?php if(isset($hobbies) && in_array('singing', $hobbies) ) { echo 'checked'; }?> value="singing"> singing <br>
            
            <br><br>

            <label for="email">email :</label><br>
            <input type="text" id="email" name="email" <?php if(isset($result)) { echo 'readonly';  }?> value="<?php if(isset($result)) { echo $result['email'];  }?>">
            <br><br>

            <label for="password">Create Password :</label> <br>

            <input type="password" id="password" name="password" value="<?php if(isset($result)) { echo $result['password']; }?>" >

            <br><br><br>

            <label for="password">Select Profile Image</label> <br>
            <?php
                if(isset($result)) {
                    echo "<img src='images/$result[profile_image]' height='100px' width='100px' />";
                }
            ?>    
            <input type="hidden" id="old_image" name="old_image" value="<?php if(isset($result)) { echo $result['profile_image']; }?>" >
            <input type="file" id="image" name="image" value="<?php if(isset($result)) { echo $result['password']; }?>" >

            <br><br><br>
            <input type="submit">


        </form>
    </body>
</html>