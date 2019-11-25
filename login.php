<?php
$errors = array();
$email = '';
$password = '';
$invalid = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$email = $_POST["email"];
    //echo "POST REQUEST = " . $email;
    if (isset($_POST['email']) and !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors["email"] = "Поле є обов'язковим";
    }

    if (isset($_POST['password']) and !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors["password"] = "Поле є обов'язковим";
    }

    if (count($errors) == 0) {
        include_once "connection_database.php";
        $query = $dbh->prepare('SELECT islock, password FROM tbl_users WHERE email = ?');
        $query->execute(array($email));

        if ($results = $query->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $results['password'])) {
                echo $results['islock'];
                header('Location: /?g=' . $email);
                exit;
            }
        } else {
            $invalid = "Не валідні дані";
        }
    }
}
?>

<?php
include "_header.php";
include_once "input-helper.php" ?>
    <div class="login-container">
        <div class="row">
            <div class="offset-md-3 col-md-6 login-form-1">
                <h3>Вхід</h3>
                <form method="post">
                    <?php create_input("email", "Електронна пошта", "text", $errors); ?>

                    <?php create_input("password", "Пароль", "password", $errors); ?>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Вхід"/>
                    </div>
                    <div class="form-group">
                        <a href="/register.php" class="ForgetPwd">Реєстрація</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

<?php
include "_footer.php";
?>