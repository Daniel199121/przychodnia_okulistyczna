<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Kontakt Przychodni Okulistycznej OptiKonsulting </title>
        <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
</head>
<body style="margin: 0; padding: 60px 0 0;">
	<?php include "nav.html" ?>
	
	
<?php
    $categories = array("Zgłoszenia", "Recepta", "Wiadomość do lekarzy", "Zażalenie", "Pochwały");

    $data['ip'] = $_SERVER['REMOTE_ADDR'];

    function find_and_replace_naughty_words($text) {
        preg_match_all("/dupa/", $text, $bad_words);
        return preg_replace("/dupa/", "pupa", $text);
    }

    function get_data($key) {
        if (isset($_POST[$key])) {
            return find_and_replace_naughty_words($_POST[$key]);
        }
        return null;
    }

    if (isset($_POST)) {
        $data['temat'] = get_data('temat');
        $data['tresc'] = get_data('tresc');
        $data['kategoria'] = get_data('kategoria');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Wyślij wiadomość</h1>
        </div>
        <div class="col-sm-12">
            <form class="form-horizontal" method="post">
                 <div class="form-group">
                     <label>Temat</label>
                     <input type="text" name="temat" id="id_temat" class="form-control" value="<?php echo $data['temat'] ?>">
                 </div>
                <div class="form-group">
                    <label>Treść</label>
                    <textarea name="tresc" id="id_tresc" class="form-control" rows="10"><?php echo $data['tresc'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Kategoria</label>
                    <select name="kategoria" id="id_kategoria" class="form-control">
                        <?php
                            foreach ($categories as $cat)
                                if ($cat == $data['kategoria']) {
                                    echo "<option value=".$cat." selected>".$cat."</option>";
                                }
                                else {
                                    echo "<option value=".$cat.">".$cat."</option>";
                                }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Zapisz">
                </div>
            </form>
 
            <?php
                foreach ($data as $key => $value) {
                    echo $key." = ".$value." <br/>";
                }
//POKAZANIE innych funkcji                
            ?>
            <?php
            $site = "https://www.pwr.edu.pl/";
            fopen($site,"r")
            or die("Unable to connect to $site");
            ?>
            <?php  
            for ($x = 0; $x <= 10; $x++) {
              echo "The number is: $x <br>";
            }
            ?>  
            <?php
            $cars=array("Volvo","BMW","Toyota");
            echo count($cars);
            ?>
            <?php
            $people = array("Peter", "Joe", "Glenn", "Cleveland");

            echo current($people) . "<br>";
            echo next($people) . "<br>";

            echo reset($people);
            ?>

            <?php
            $dodatkowa_zmienna = 'PHP'; // i tak nie wykorzystamy
            $ciag_znakow = "To jest \$dodatkowa_zmienna";

            echo $ciag_znakow;
            $ciag_znakow = "To jest $dodatkowa_zmienna";

            echo $ciag_znakow;
            ?>

            <?php
            $people=array("Peter","Joe","Glenn","Cleveland");
            echo "The key from the current position is: " . key($people);
            ?>
            <?php
                $imiona = Array('Marcin', 'Daniel', 'Magda', 'Paulina');
                echo "<hr />\n";
                echo "\n$imiona[0]\n"; // wyświetli Marcin
                echo" $imiona[1]\n"; // wyświetli Magda
                $imiona[2] = 'Katarzyna'; // zmiana wartości
                echo "$imiona[2]\n";
            ?>

                <?php
            $sTemp = '5';
            echo "Pierwsza: $sTemp ,";
            $mVar = (string) $sTemp; // $mZm jest typu string (5)
            echo "Druga: $mVar ,";
            $mVar = $mVar + 8; // $mZm staje się liczbą całkowitą (13)
            echo "Trzecia: $mVar ,";
            $mVar = $mVar + 2.2 / 3 * 3; // $mZm staje się liczbą zmiennoprzecinkową (15.2)
            echo "Czwarta: $mVar ,";
            $mVar = 'wynik: ' . $mVar; // $mZm staje się łańcuchem znaków (wynik: 15.2)
            echo $mVar;

            ?>

            <?php
            $mVar = '5';
            echo "Pierwsza: $mVar ,";
            $mVar2 = $mVar + 8; // $mZm staje się liczbą całkowitą (13)
            echo "Druga: $mVar2
             ,";
            if ($mVar<$mVar2){
                echo "Pierwsza większa";
            }elseif($mVar>$mVar2){
                echo"Druga wieksza";
            }else{
                echo "Rowne sobie";
            }

            ?>
        </div>
    </div>
</div>
</body>

</html>