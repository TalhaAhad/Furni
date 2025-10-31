<div class="login-form1">
<form action="login.php" method="POST">
    <div class="reg">
    <h2>Login</h2>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <button class="btn" type="submit" name="login">Login</button>

    <p>Don't have an account?<a href="register.php">Register here.</a></p>

    <!-- <input style="width: 20px;" type="checkbox" name="terms" required> I agree to the <a href="#">Terms and Conditions</a><br> -->

    </div>
</form>
</div>

<?php
    include 'connect.php';
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from register where email = '$email' and password = '$password'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($run);
        if($run>0){
            while($data = mysqli_fetch_array($run)){
                if($data ['roletype'] == "user" ){
                    echo "<script>window.location.href='userdash.php'</script>";
                }else if($data ['roletype'] == "admin"){
                    echo "<script>window.location.href='admindash.php'</script>";
                }else{
                    echo "<script>alert('There is some error in this code');</script>";
                }
            }
        }
    }


?>