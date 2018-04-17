<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = $_POST['name'];

  $surname = $_POST['surname'];

  $pesel = $_POST['pesel'];
  
  $email = $_POST['email'];
  
  $pass = $_POST['pass'];

  $tel = $_POST['tel'];
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

  // basic surname validation
  if (empty($surname)) {
   $error = true;
   $surnameError = "Please enter your full surname.";
  } else if (strlen($surname) < 3) {
   $error = true;
   $surnameError = "Surname must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
   $error = true;
   $surnameError = "Surname must contain alphabets and space.";
  }
  //basic pesel validation
  if (empty($pesel)) {
   $error = true;
   $peselError = "Please enter your full PESEL.";
  } else if (strlen($pesel) != 11) {
   $error = true;
   $peselError = "Surname must have 11 characters.";
  } else if (!preg_match("/^[0-9]+$/",$pesel)) {
   $error = true;
   $peselError = "Surname must contain numbers.";
  }// check email exist or not
   $query = "SELECT userPesel FROM users WHERE userPesel='$pesel'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $peselError = "Provided PESEL is already in use.";
   }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
//basic tel validation
  if (empty($tel)) {
   $error = true;
   $telError = "Please enter your full telephon number.";
  } else if (strlen($tel) <> 9) {
   $error = true;
   $telError = "Telephone number must have 9 characters.";
  } else if (!preg_match("/^[0-9]+$/",$tel)) {
   $error = true;
   $telError = "Telephone must contain numbers.";
  }// check email exist or not
   $query = "SELECT userTel FROM users WHERE userTel='$tel'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $telError = "Provided Telephone is already in use.";
   }

  // if there's no error, continue to signup
  if( !$error ) {
   $userId = $_SESSION['user'];
   $query = "UPDATE users SET userName = '$name' , userSurname = '$surname', userPesel='$pesel', userEmail='$email', userPass='$password', userTel='$tel' WHERE userId='".$userId."' LIMIT 1";
   $res = mysqli_query($conn, $query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($surname);
    unset($pesel);
    unset($email);
    unset($password);
    unset($tel);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  }
 } else{
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $surname = trim($_POST['surname']);
  $surname = strip_tags($surname);
  $surname = htmlspecialchars($surname);

  $pesel = trim($_POST['pesel']);
  $pesel = strip_tags($pesel);
  $pesel = htmlspecialchars($pesel);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $tel = trim($_POST['tel']);
  $tel = strip_tags($tel);
  $tel = htmlspecialchars($tel);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

  // basic surname validation
  if (empty($surname)) {
   $error = true;
   $surnameError = "Please enter your full surname.";
  } else if (strlen($surname) < 3) {
   $error = true;
   $surnameError = "Surname must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
   $error = true;
   $surnameError = "Surname must contain alphabets and space.";
  }
  //basic pesel validation
	if (empty($pesel)) {
   $error = true;
   $peselError = "Please enter your full PESEL.";
  } else if (strlen($pesel) != 11) {
   $error = true;
   $peselError = "Surname must have 11 characters.";
  } else if (!preg_match("/^[0-9]+$/",$pesel)) {
   $error = true;
   $peselError = "Surname must contain numbers.";
  }// check email exist or not
   $query = "SELECT userPesel FROM users WHERE userPesel='$pesel'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $peselError = "Provided PESEL is already in use.";
   }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
//basic tel validation
	if (empty($tel)) {
   $error = true;
   $telError = "Please enter your full telephon number.";
  } else if (strlen($tel) <> 9) {
   $error = true;
   $telError = "Telephone number must have 9 characters.";
  } else if (!preg_match("/^[0-9]+$/",$tel)) {
   $error = true;
   $telError = "Telephone must contain numbers.";
  }// check email exist or not
   $query = "SELECT userTel FROM users WHERE userTel='$tel'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $telError = "Provided Telephone is already in use.";
   }

  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName, userSurname, userPesel, userEmail,userPass, userTel) VALUES('$name','$surname','$pesel', '$email','$password','$tel')";
   $res = mysqli_query($conn, $query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($surname);
    unset($pesel);
    unset($email);
    unset($password);
    unset($tel);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  }
 }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Rejestracja  do OptiKonsulting</title>
		  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head>
<body style="margin: 0; padding: 60px 0 0;">
	<?php 
if( isset($_SESSION['user'])!="" ){
  include "navlogged.html";} else {
    include "nav.html";
  } ?>





	
<div class="container">	
	<div class="row" id="login-form">	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			<div class="col-sm-12"><h1>Formularz rejestracyjny:</h1></div>
					
			 		<?php
		   if ( isset($errMSG) ) {
		    
		    ?>
		<div class="form-group">
		             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
		    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
		                </div>
		             </div>
		                <?php
		   }
		   ?>

		   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="surname" class="form-control" placeholder="Enter Surname" maxlength="50" value="<?php echo $surname ?>" />
                </div>
                <span class="text-danger"><?php echo $surnameError; ?></span>
            </div>

			<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="pesel" class="form-control" placeholder="Enter Pesel" pattern="[0-9]{11}" value="<?php echo $pesel ?>" />
                </div>
                <span class="text-danger"><?php echo $peselError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="numbers" name="tel" class="form-control" placeholder="Enter Telephone" pattern="[0-9]{9}" value="<?php echo $tel ?>" />
                </div>
                <span class="text-danger"><?php echo $telError; ?></span>
            </div>

            
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup"><?php if( isset($_SESSION['user'])!="" ){  echo 'ZMIANA DANYCH';} else {    echo 'ZAREJESTRUJ';  } ?></button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
           


			
			<footer>
	  			<p><?php $str = "Hello world. (can you hear me?)"; echo quotemeta($str);
          $zmienna = 'zmienna1';
          $$zmienna='zmienna2';
          echo $zmienna.' teraz druga: ';
          echo $zmienna1;
          ;?></p>
	  			<p>Informacje kontaktowe: <a href="mailto:daniel123@wp.pl">
	 			daniel123@wp.pl</a>.</p>
			</footer>
	        
	</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>