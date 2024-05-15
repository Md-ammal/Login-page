<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
    <script src="js/jqueryfile.js" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="checklogin.php" onsubmit="return false">
        <div>
            <label>Email</label>
            <input type="text" class="" name="email" id="email" value=""/>
            <span id="e_email" class="error"></span>
        </div>
        <div>
            <label>Password</label>
            <input type="password" class="" name="password" id="password" value=""/>
            <span id="e_password" class="error"></span>
            <span class="error">
                <?php
                    if(isset($_GET['error']) && $_GET['error'] == true) {
                        echo "Username or Password is wrong";
                    }
                ?>
            </span>
        </div>
        <div>
            <input type="button" name="" id="" value="submit" onclick="checkValidation()"/>
        </div>
    </form>
</body>
<script>

function checkValidation() {
    // var email = document.getElementById('email').value;
    var email = $('#email').val(); 
    // . ==> class
    // # ==> id
    // var email = jQuery()
    // var password = document.getElementById('password').value;
    var password = $('#password').val(); 
    if(!email.trim() && !password.trim()) {
        $('#email').focus();
        $('#e_email').html('Please enter email');
        $('#e_password').html('Please enter password');
    } else if(!email.trim()) {
        $('#email').focus();
        $('#e_email').html('Please enter email');
    } else if(!password.trim()) {
        $('#password').focus();
        $('#e_password').html('Please enter password');
    } else {
        
       $.ajax({
         url: 'checklogin.php',
         data: {email: email, password: password},
         type: 'POST',
         success: function(res) {
            if(res == '1') {
                location.href = 'listing.php';
            } else {
                $('#e_password').html('Email or Password is wrong');
            }
         }   
       });



    }
     
    
}    

</script>
</html>