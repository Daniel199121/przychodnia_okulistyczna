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
<body style="margin: 0; padding: 60px 0 0;">
    <?php include "nav.html" ?>

	
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
    
    <div class="container">
        <div >
            <input type="text" size="50" onkeydown="uniKeyCode(event)">
            <span id="demo2"></span>
        </div>
    </div>
    <div class="container">
    <button type="reset" value="Reset" id="reset">Wyczyść</button>
    <button id="buttonevent">Info</button>
    </div>
    <script src="/js/app.js" type="text/javascript"></script>
<script src="/js/dom.js" type="text/javascript"></script>
<script src="/js/customCss.js" type="text/javascript"></script>	

	<body>
</html>
