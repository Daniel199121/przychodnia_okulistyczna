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
		<title> Informacje o twórcy witryny Przychodni Okulistycznej OptiKonsulting </title>
		<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" href ="/css/informationstyle.css" type="text/css"/>
</head>
<body style="margin: 0; padding: 100px 0 0;">
  <?php include "navlogged.html" ?>
	
<div class="container">
	<div id="content">
		<h2> Lista Narzędzie wykorzystanych do stworzenia witryny (kliknij w obrazek, żeby pobrać):</h2>
		<ul>
			<li><a href="https://www.sublimetext.com/3" id="solution_link"><img src ="/img/sublime.png" width="50px" height="50px" alt="sublime 3 text editor logo"></a> <b>Sublime 3 Text editor </b></li>
			<li><a href="https://www.google.pl/chrome/browser/desktop/index.html"><img src ="/img/chromelogo.png" width="50px" height="50px" alt="chrome logo"></a><b>Google Chrome</b></li>
			<li><a href="https://www.mozilla.org/pl/firefox/new/?scene=2"><img src ="/img/mozilla.png" width="50px" height="50px" alt="mozilla logo"></a><b>Mozilla Firefox</b></li>
		</ul>

		<h3> Lista użytych technologii do stworzenia witryny: </h3>
		<ol>
			<li><img src="/img/html.png" width="50px" height="50px" alt="html logo"></a> <b>HTML </b></li>
			<li><img src="/img/css.png" width="50px" height="50px" alt="css logo"></a> <b>CSS </b></li>
		</ol>
</div>
</div>
	<div class="container">
		<div id=footer>
  		<summary>Wszystkie prawa zastrzeżone 2004-2017.</summary>
  			<p> All Rights Reserved.</p>
  			<p>All content and graphics on this web site are the property of the company OptiKonsulting.</p>
		</details>
	</div>
</div>
<div class="container"> 
    <div style="margin-bottom: 50px;">
        <div class="col-12">
            Na tej stronie znajdują się <span id="images_count"></span> obrazki.<br />
            <span id="links_count"></span> linków, <span id="forms_count"></span> formularzy, <span id="anchors_count"></span> kotwic<br /><br />
            Pierwszy obraz na stronie to: <span id="first_image"><img alt="to_replace"/></span><br/>
            Pierwszy nazwany link na stronie to: <span id="first_link"></span>
        </div>
    </div>
</div>
</body>
<div class="container">
<div class="parent">
  <span onclick="this.parentNode.style.display = 'none';" class="closebtn">&times;</span>
  <p>Nasza strona internetowa używa plików cookies (tzw. ciasteczka) w celach statystycznych, reklamowych oraz funkcjonalnych. Dzięki nim możemy indywidualnie dostosować stronę do twoich potrzeb. Każdy może zaakceptować pliki cookies albo ma możliwość wyłączenia ich w przeglądarce, dzięki czemu nie będą zbierane żadne informacje.</p>
</div>
</div>
<div class="container">
<ul id="myList">
  <li>Okulary</li>
  <li>Szkło</li>
</ul>

<p>Kliknij by dodać element do listy.</p>
</div>
<div class="container">
<button onclick="myFunction2()">Dodaj</button>
<p>
<div class="square" onmousemove="myMoveFunction()">
  <p class="square">onmousemove: <br> <span id="demo">Mouse move!</span></p>
</div>

<div class="square" onmousedown="myDownFunction()">
  <p class="square">onmousedown: <br> <span id="demo2">Mouse down!</span></p>
</div>

<div class="square" onmouseover="myOverFunction()">
  <p class="square">onmouseover: <br> <span id="demo3">Mouse over me!</span></p>
</div>

<div class="square" onmouseout="myOutFunction()">
  <p class="square">onmouseout: <br> <span id="demo4">Mouse out!</span></p>
</div>

</p>
</div>
<script src="/js/app.js" type="text/javascript"></script>
    <script src="/js/dom.js" type="text/javascript"></script>
    <script type="text/javascript">
    var imie = prompt("Podaj swoje imie");
    alert("Czesc " + imie);
</script>
<script type="text/javascript">
    countElements();
</script>
		
	<body>
</html>
<?php ob_end_flush(); ?>