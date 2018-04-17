

 <?php

 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);




    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE userId=".$_SESSION['user'];
    $search_result = filterTable($query);
    


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbtest");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Rejestracja  na wizytę OptiKonsulting</title>
		  <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head><center>
<body style="margin: 0; padding: 200px 0 0;">
	<?php include "navlogged.html" ?>

<head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    
      
       
            
            <table>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Shaszowane hasło</th>
                    <th>Pesel</th>
                    <th>Email</th>
                    <th>Telefon</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['userName'];?></td>
                    <td><?php echo $row['userSurname'];?></td>
                    <td><?php echo $row['userPass'];?></td>
                    <td><?php echo $row['userPesel'];?></td>
                    <td><?php echo $row['userEmail'];?></td>
                    <td><?php echo $row['userTel'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
        <div><a href="Adnotacje.php">Adnotacje</a></div>
        <div><a href="Dokumenty.php">Dokumenty</a></div>


    </body>

</html>
<?php ob_end_flush(); ?>