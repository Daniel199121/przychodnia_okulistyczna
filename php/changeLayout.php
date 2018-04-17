 <?php
    require_once('php\cookiesManagement.php');
    require_once('php\loginManagement.php');
    require_once('php\layoutConfiguration.php');
    
    $lightBlue = "";
    $lime = "";
    $gold = "";
    $silver = "";
    $default = "";
    $color2 = "";
    $textColor = "";
    $font = "";
    $email = "";
    $hidden = "hidden";

    $color= getBackgroundColor();
    if(!isSet($color))
    {
        $color = "";
    }else{
        $$color = " selected";
    }

    $color2 = GetLayoutColor($color);
    $textColor = GetTextColor($color);
    $font = GetTextFont($color);
    if(isset($_COOKIE['PHPSESSID'])){
        session_start();
        $email = GetEmail();
        if($email == ""){
            $hidden = "hidden";
        }else{
            $hidden = "submit";
        }
    }
?>


