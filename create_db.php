<html>
<body>

<?php
$servername = "localhost";
$username = "Daniel";
$password = "daniel1";
$base = "dbtest";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) 
    die("Connection failed: " . mysqli_connect_error());
else
	echo "Connected!<br>";

$sql = "DROP DATABASE IF EXISTS baza;";
if(mysqli_query($conn, $sql))
	echo "DATABASE CLEARED<br>";
$sql = "CREATE DATABASE dbtest;";
if(mysqli_query($conn, $sql))
	echo "DATABASE dbtest CREATED<br>";
$sql = "USE dbtest;";
mysqli_query($conn, $sql);




$sql = "CREATE TABLE users (
					  userId int(11) NOT NULL,
					  userName varchar(30) NOT NULL,
					  userSurname varchar(30) NOT NULL,
					  userPass varchar(255) NOT NULL,
					  userPesel varchar(30) NOT NULL,
					  userEmail varchar(60) NOT NULL,
					  userTel varchar(60) NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if(mysqli_query($conn, $sql))
	echo "TABLE users CREATED<br>";



$sql  = "INSERT INTO users (userId, userName, userSurname, userPass, userPesel, userEmail, userTel) 
VALUES (2, 'Jolanta', 'Kurtyka', '7104b8d02768a20466933d9f8253d41f891e689f57d458c33655f1c0f470f9c4', '22222222222', 'jola@mail.com', '222222222');";
$sql .=  "INSERT INTO users (userId, userName, userSurname, userPass, userPesel, userEmail, userTel) VALUES
(3, 'Jola', 'Kuznicka', 'd0356fed56b87d36a2c3e8d96a447333a9e3537b78fdb3f3b302429de275732a', '66554433227', 'jola123@mail.com', '765923012');";
$sql .= "INSERT INTO users (userId, userName, userSurname, userPass, userPesel, userEmail, userTel) VALUES
(4, 'Bogusz', 'Gajda', '9d191cd9416959fe2874283460fa176ceb7c7a1cc70d9d80bb176a2ff51c23a5', '88888888888', 'bogusz@mail.com', '888888888');";
$sql .= "INSERT INTO users (userId, userName, userSurname, userPass, userPesel, userEmail, userTel) VALUES
(5, 'Artur', 'Krzemien', '80de5bd4952917a647909465a7eaa41ff51551d362b3d99a7f1cd5610c563917', '77777777777', 'artur@mail.com', '666666666');";
$sql .= "INSERT INTO users (userId, userName, userSurname, userPass, userPesel, userEmail, userTel) VALUES
(6, 'Uzytkownik', 'Uzytkownik', 'a85760f597e20f88e43772dce6f60a6b2d1f32b9c762685e84a7c5057c9ab92d', '22222222227', 'uzytkownik@mail.com', '111111112');";

if(mysqli_multi_query($conn, $sql))
	echo "TABLE users FILLED<br>";



$conn = new mysqli($servername, $username, $password, $base);

$sql = "SELECT userID, userName, userSurname FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["userID"]. " - Name: " . $row["userName"]. " " . $row["userSurname"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "<br>";








$sql = "CREATE TABLE tblproduct (
				  id int(8) NOT NULL,
				  name varchar(255) NOT NULL,
				  code varchar(255) NOT NULL,
				  image text NOT NULL,
				  price double(10,2) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1";
if(mysqli_query($conn, $sql))
	echo "TABLE tblproduct CREATED<br>";



$sql  = "INSERT INTO tblproduct (id, name, code, image, price) VALUES
(1, 'Okulary 1', '123', 'product-images/glasses.png', 1500.00);";
$sql .=  "INSERT INTO tblproduct (id, name, code, image, price) VALUES
(2, 'Okulary 2', '234', 'product-images/indeks.jpg', 800.00);";
$sql .= "INSERT INTO tblproduct (id, name, code, image, price) VALUES
(3, 'Okulary 3', '345', 'product-images/okulary.jpg', 300.00);";

if(mysqli_multi_query($conn, $sql))
	echo "TABLE tblproduct FILLED<br>";



$conn = new mysqli($servername, $username, $password, $base);

$sql = "SELECT id, name, code FROM tblproduct";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " Code:" . $row["code"]. "<br>";
    }
} else {
    echo "0 results";
}

echo "<br>";





$conn->close();
?>

</body>
</html>