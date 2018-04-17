<?php
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Blog">
    <meta name="keywords" content="HTML, CSS, JS, PHP, ASP.net">
    <title>BLOG</title>
    <script type="text/javascript" src="/static/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/static/css/menu.css">
</head>
<body style="margin: 0; padding: 100px 0 0;">

<?php include "nav.php" ?>
<?php
    $user = null;
    $user_data = null;
    $header = "Modyfikacja konta";
    $errors = null;

    $username = '';
    $email = '';
    $first_name = '';
    $last_name = '';
    $message = '';
    $db_error = '';

    if (isset($_SESSION['user']) || $_SESSION['user'] != null) {
        if ($user_data == null) {
            $con = mysqli_connect("localhost","root","","blog");
            $sql = sprintf("SELECT username, email, first_name, last_name FROM user WHERE username = '%s'", $_SESSION['user']);
            $result = mysqli_query($con, $sql);
            if ($result) {
                $obj = mysqli_fetch_object($result);
                $username = $obj->username;
                $email = $obj->email;
                $first_name = $obj->first_name;
                $last_name = $obj->last_name;
            }
            mysqli_close($con);
        }
    }
    else {
        $header = "Rejestracja";
    }

    if (isset($_POST['save'])) {
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        }
        else {
            $errors['username'] = 'To pole jest wymagane!';
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }
        else {
            $errors['password'] = 'To pole jest wymagane!';
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
        else {
            $errors['email'] = 'To pole jest wymagane!';
        }
        if (!empty($_POST['first_name'])) {
            $first_name = $_POST['first_name'];
        }
        else {
            $errors['first_name'] = 'To pole jest wymagane!';
        }
        if (!empty($_POST['last_name'])) {
            $last_name = $_POST['last_name'];
        }
        else {
            $errors['last_name'] = 'To pole jest wymagane!';
        }
        if ($errors == null) {
            $con = mysqli_connect("localhost","root","","blog");
            if (isset($_SESSION['user']) || $_SESSION['user'] != null) {
                $sql = sprintf("UPDATE `user` SET `username` = '%s', `password` = '%s', `email` = '%s', `first_name` = '%s', `last_name` = '$s' WHERE `user`.`username` = '%s';",
                    $username, $password, $email, $first_name, $last_name, $_SESSION['user']);
            }
            else {
                $sql = sprintf("INSERT INTO user (username, password, email, first_name, last_name) VALUES ('%s', '%s', '%s', '%s', '%s')",
                    $username, $password, $email, $first_name, $last_name);
            }
            $result = mysqli_query($con, $sql);
            $db_error = mysqli_error($con);
            mysqli_close($con);
            $username = '';
            $email = '';
            $first_name = '';
            $last_name = '';
            $message = sprintf("Użytkownik '%s' został dodany do bazy danych", $username);
        }
    }

?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $header ?>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <?php
                            if ($db_error != '') {
                                echo '<p class="alert alert-danger">'.$db_error.'</p>';
                            }
                            elseif ($message != '')
                                echo '<p class="alert alert-success">'.$message.'</p>';
                        ?>
                        <div class="form-group">
                            <label for="id_username">Nazwa użytkownika</label>
                            <input type="text" name="username" id="id_username" class="form-control" value="<?php echo $username ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_username">Hasło</label>
                            <input type="password" name="password" id="id_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_email">Email</label>
                            <input type="email" name="email" id="id_email" class="form-control" value="<?php echo $email ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_email">Imię</label>
                            <input type="text" name="first_name" id="id_first_name" class="form-control" value="<?php echo $first_name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_last_name">Nazwisko</label>
                            <input type="text" name="last_name" id="id_last_name" class="form-control" value="<?php echo $last_name ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Zapisz" name="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
