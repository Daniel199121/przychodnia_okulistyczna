<?php
    function getBackgroundColor() {

        $hour = time() + 3600;
        if (isset($_POST['layoutColor']))
        {
            $color = $_POST['layoutColor'];
            setcookie("Background_color", $color, $hour);
        }
        else if(isset($_COOKIE['Background_color']))
        {
            $color = $_COOKIE['Background_color'];
        } 
        else
        {
            $color = "default";
        }

        return  $color;
    } 
?>