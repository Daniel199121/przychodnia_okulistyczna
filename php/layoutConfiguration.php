<?php
    function GetLayoutColor($color)
    {
        $resultColor="";
       if($color == "silver"){
          $resultColor = "darkGrey"  ;
       }

       else if($color == "lime"){
          $resultColor = "darkGreen"  ;
       }

       else if($color == "lightBlue"){
          $resultColor = "blue"  ;
       }

       else if($color == "gold"){
          $resultColor = "darkOrange"  ;
       }
       else
       {
            $resultColor = "";
        }

       return $resultColor;
    }

    function GetTextColor($color)
    {
        $resultColor="";
       if($color == "silver"){
          $resultColor = "darkGrey"  ;
       }

       else if($color == "lime"){
          $resultColor = "darkGreen"  ;
       }

       else if($color == "lightBlue"){
          $resultColor = "blue"  ;
       }

       else if($color == "gold"){
          $resultColor = "darkOrange"  ;
       }
       else
       {
            $resultColor = "";
        }

        return $resultColor;
    }

    function GetTextFont($color)
    {
        $resultFont="";
       if($color == "silver"){
          $resultFont = "Impact"  ;
       }

       else if($color == "lime"){
          $resultFont = "Comic Sans MS"  ;
       }

       else if($color == "lightBlue"){
          $resultFont = "Verdana"  ;
       }

       else if($color == "gold"){
          $resultFont = "Tahoma"  ;
       }
       else
       {
            $resultFont = "";
        }

        return $resultFont;
    }
?>