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
		<title> Przychodnia Okulistyczna OptiKonsulting </title>
		<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head>

    <?php include "navlogged.html" ?>

	
<?php require_once ("php\changeLayout.php")?>
<body  padding: 100px <?php echo "STYLE='background-color:".$color.";font-family:".$font."'";?>>
    <div class= "container">
        <div id="header" <?php echo "STYLE='background-color:".$color2.";'";?>>
            <h1>Przychodnia okulistyczna</h1>
        </div>

        

        <div class="article">
        
            <h2 id="tittle"><i id="i1">W</i>itaj w świecie <mark id="mark1">Optikonsulting</mark></h2>
            
            <div <?php echo "STYLE='color:".$textColor.";'";?>>
                <h2>Cytaty na dziś</h2>
                <p>Jeśli chce się no­sić głowę w chmu­rach, trze­ba obiema no­gami stąpać po ziemi. - <i>Terry Pratchet</i></p>
                <p>Jeśli wyrwiemy komuś język, nie dowiedziemy, że kłamie, a tylko obwieścimy całemu światu, iż boimy się tego, co ma do powiedzenia.-<i>George R.R. Martin</i></p>
                <p id = "pImage">Nie jest nam dane decydowac w jakich czasach przyszlo nam zyc , ale mozemy decydowac co zrobimy z czasem jaki zostal nam dany.-<i>J.R.R. Tolkien</i></p>
            </div>

            <div class="container">
        <form onsubmit="simpleOnSubmit()" onreset="simpleOnReset()">
            <div >
                <input type="text" class="form-control" onfocus="simpleOnFocus(this)" onblur="changeFontColor(this)" value="Kolor tekstu">
                <label id="font_color">Kolor tekstu</label>
            </div>
            <div >
                <input type="text" class="form-control" value="Kolor tła" onfocus="simpleOnFocus(this)" onblur="changeBackgroundColor(this)">
                <div id="custom_color" style="width: 100px; height: 100px;">Kolor tła</div>
            </div>
            <div >
                <select onblur="changeFontFamily(this)" class="form-control">
                    <option value="Arial">Arial</option>
                    <option value="Times New Roman">Times New Roman</option>
                </select>
                <label id="custom_font">Custom font</label>
            </div>
            <button type="submit" >Submit</button>
            <button type="reset" >Reset</button>
        </form>
        
    </div>

            
            
            <form method='POST'><p id='txtorder'  >Wybierz styl: </p>
                <select name='layoutColor' id='layoutColor'>
                    <option value="lightBlue" <?php echo $lightBlue; ?> >blue</option>
                    <option value="lime" <?php echo $lime; ?> >green</option>
                    <option value="gold" <?php echo $gold; ?> >gold</option>
                    <option value="silver" <?php echo $silver; ?> >silver</option>
                    <option value="default" <?php echo $default; ?> >default</option>
                </select>
                <input type='submit' value='Zmien wyglad'/>
            </form>

        </div>

        <div id="footer" <?php echo "STYLE='background-color:".$color2.";'";?>>
            <p id="copy">&copy;<l id="daniel">Daniel</l> || <l id="kuznicki">Kuźnicki</l></p>
            <p><?php if(isset($_COOKIE['PHPSESSID']))
        {
            echo "SESSION ID FROM COOKIE: ".$_COOKIE['PHPSESSID'];
            echo " SESSION: ".implode(" | ",$_SESSION);
            echo " MAIL: ".$userRow['userEmail']; 
        }  ?></p>
        
        </div>
    </div>

    
    <script src="/js/app.js" type="text/javascript"></script>
<script src="/js/dom.js" type="text/javascript"></script>
<script src="/js/customCss.js" type="text/javascript"></script>	

	</body>
</html>
<?php ob_end_flush(); ?>