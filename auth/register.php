<?php require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>
<?php 

if(isset($_POST['submit'])){
    if(empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username'])) {
        echo "<script>alert('One or more inputes are empty');</script>";
    }
    else{
        if($_POST['password'] == $_POST['confirmpassword']) {

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            // $image = $_POST['image'];
            $image = 'user.png';
            
            $insert = $conn ->prepare("INSERT INTO users (fullname, email, username, password, image) VALUES (:fullname, :email, :username, :password, :image) ");

            $insert -> execute(
                [
                    ':fullname' => $fullname,
                    ':email' => $email,
                    ':username' => $username,
                    ':password' => password_hash(($password), PASSWORD_DEFAULT) ,
                    ':image' => $image
                ]
                
            );
            //header( "Location: ".APPURL."/login.php" );
            
            // $result = mysqli_query($conn, $sql);
            // if($result){
            //     echo "<script>alert('Registration Successful');</script>";
            //     echo "<script>window.location.href = 'login.php';</script>";
            // }
            // else{
            //     echo "<script>alert('Registration Failed');</script>";
            // }
        }else{
            echo "<script>alert('Registration Failed');</script>";
            echo "Password does not match";
        }
    }
}
?>
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Register Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="register.php">
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="fullname" type="text" required="" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="email" required="" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="confirmpassword" type="password" required="" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <div class="col-md-12">
                                        <div class="checkbox">
                                            <input id="checkbox0" type="checkbox" name="terms">
                                            <label for="checkbox0" class="mb-0">I Agree with <a href="terms.html" class="text-light">Terms & Conditions</a> </label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php'; ?>