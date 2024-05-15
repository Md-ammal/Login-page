<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('validlogin.php');
    require_once('connection.php');

    $query = 'select * from register';
    $result = mysqli_query($connection, $query);
   

    $total_record = mysqli_num_rows($result); // total number of rows.

    // echo $total_record;

    // $res_fetch_array  = mysqli_fetch_array($result); //  will get result in both array ( index + associate )
    // echo "<br/>Fetch Array<br/>";
    // print_r($res_fetch_array);

    // echo $res_fetch_array[1];
    // echo $res_fetch_array['name'];
    // echo "<br/>Fetch Array end <br/>";


    // $res_assoc_array  = mysqli_fetch_assoc($result); // will get result in only associate array
    // echo "<br/>Fetch Associate Array<br/>";
    // print_r($res_assoc_array);
    // echo $res_assoc_array['name'];
    // echo "<br/>Fetch Associate Array end <br/>";


    // $res_object  = mysqli_fetch_object($result); // will get result in only object
    // echo "<br/>Fetch Object<br/>";
    // print_r($res_object); 
    // echo $res_object->name;
       
    ?>
    <a href="checklogin.php">Logout</a>
    <table border="1">
        <tr>
            <td>S.No</td>
            <td>Image</td>
            <td>Name</td>
            <td>Address</td>
            <td>Education</td>
            <td>Gender</td>
            <td>Hobbies</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
        <?php
            if(mysqli_num_rows($result) > 0) {
                $i = 1;
                while($d = mysqli_fetch_assoc($result)) {
                    // print_r($d);
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img height="100px" width="100px" src="images/<?php echo $d['profile_image']; ?>"/></td>
                <td><?php echo $d['name']; ?></td>
                <td><?php echo $d['address']; ?></td>
                <td><?php echo $d['education']; ?></td>
                <td><?php echo $d['gender']; ?></td>
                <td><?php echo $d['hobbies']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo '******'; ?></td>
                <td><a href="register.php?id=<?php echo $d['id']; ?>">Edit</a> / <a href="formdata.php?delete_id=<?php echo $d['id']; ?>"> Delete</a></td>
            </tr>
        <?php
            $i++;
                }
            } else {
                echo "<tr><td colspan='9'>No Record Found</td></tr>";
            }
        ?>
    </table>

</body>
</html>