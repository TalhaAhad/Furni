<div class="register-form1">
<form action="" method="POST">
  <div class="reg">
    <h2>Register</h2>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="hidden" id="roletype" name="roletype" value="user">

    <button class="btn" type="submit" name="register">Register</button>

    <p>Already have an account? <a href="login.php">Login here.</a></p>
  </div>
</form>

</div>
<?php
    include "connect.php";
    if(isset($_POST['register'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $roletype = $_POST['roletype'];
        $select = "select * from register where email = '$email'";
        $run = mysqli_query($conn, $select);
        if(mysqli_num_rows($run)>0){
            echo "<script>alert('Email Already Taken By Someone')</script>";
        }else{
            $query = "insert into register(first_name, last_name, phone, email, password, roletype) values ('$first_name','$last_name','$phone_number','$email','$password','$roletype')";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>alert('Registeration Done');
                        window.location.href='login.php'
                </script>";
            }else{
                echo "<script>alert('Registeration not Done');
                        window.location.href='register.php'
                    </script>";
            }
        } 
    }


?>