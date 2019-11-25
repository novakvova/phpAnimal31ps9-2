<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $email = $_POST["email"];
        echo "POST REQUEST = ".$email;

        header('Location: /?g='.$email);
        exit;
    }
?>

<?php
include "_header.php";
?>
        <div class="login-container">
            <div class="row">
                <div class="offset-md-3 col-md-6 login-form-1">
                    <h3>Login for Form 1</h3>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" 
                                name="email"
                                class="form-control" 
                                placeholder="Your Email *" 
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" 
                                name="password"
                                class="form-control" 
                                placeholder="Your Password *" 
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

<?php
include "_footer.php";
?>