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
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Cennik Przychodni Okulistycznej OptiKonsulting </title>
		<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head>
<body onmousedown="eventDetails(event)" style="margin: 0; padding: 100px 0 0;">
	<?php include "navlogged.html" ?>

	<div class="container">
	<div id="pricelistcontent">
	<center><h1><a href="#pricelist">Cennik naszych usług:</a></h1></center><br>
	<center><table border="5">
		<tr>
			<th></th>
			<th>Uczniowie </th>
				<th>Studenci</th>
				<th>Emeryci</th>
		</tr>
		<tr>
			<th scope="row">Laser</th>
				<td colspan="2"><center>2000zł</center></td>
				<td>
					<table border="1">
							<tr>
								<td>Kompatanci Wojenni</td>
								<td>Inni</td>
							</tr>
							<tr>
								<td><center>1500zł</center></td>
								<td><center>3000zł</center></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<th scope="row">Konsultacja</th>
					<td colspan="2"><center>200zł</center></td>
					<td rowspan="2"><center>140zł</center></td>
				</tr>
				<tr>
					<th scope="row">Zakraplanie oczu</th>
					<td><center>100zł</center></td>
					<td><center>150zł</center></td>
				</tr>
		</table>
		</center>
		</div>

		<p id="pricelist"><b>Powyżej jest cennik naszych usług</b></p>
		<div id=footer>
  		<summary>Wszystkie prawa zastrzeżone 2004-2017.</summary>
  			<p> All Rights Reserved.</p>
  			<p>All content and graphics on this web site are the property of the company OptiKonsulting.</p>
		</details>
		</div>
		<div id="content-images" style="font-size: 100px; color: blue;"> Tutaj zmienia się tło!
		</div>
	</div>


<div class="container">
            <section >
                <div >
                    <div >
                        <img src="/img/twitter.png" width="50px" height="50px"/>
                        <h3>Twitter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper sapien in purus tincidunt, eu rhoncus ipsum cursus. Sed mattis. <a href="#" data-content="twitter" onclick="changeContentImage(this)">Read more</a></p>
                    </div>
                    <div class="about-image-box">
                        <img src="/img/snapchat.png" width="50px" height="50px"/>
                        <h3>Snapchat</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper sapien in purus tincidunt, eu rhoncus ipsum cursus. Sed mattis. <a href="#" data-content="snapchat" onclick="changeContentImage(this)">Read more</a></p>
                    </div>
                    <div class="about-image-box">
                        <img src="/img/viber.png" width="50px" height="50px"/>
                        <h3>Viber</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus semper sapien in purus tincidunt, eu rhoncus ipsum cursus. Sed mattis. <a href="#" data-content="viber" onclick="changeContentImage(this)">Read more</a></p>
                    </div>
                </div>
            </section>

</div>    

<script src="/js/customCss.js" type="text/javascript"></script>
    <script src="/js/app.js" type="text/javascript"></script>
    <script src="/js/dom.js" type="text/javascript"></script>
	</body>
	
</html>
<?php ob_end_flush(); ?>