<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

 $error = false;


$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
     
      $productByid = $db_handle->runQuery("SELECT * FROM tblproduct WHERE id='" . $_GET["id"] . "'");
      $itemArray = array($productByid[0]["id"]=>array('TERMIN'=>$productByid[0]["TERMIN"], 'id'=>$productByid[0]["id"], 'Godzina'=>$productByid[0]["Godzina"], 'quantity'=>$_POST["quantity"], 'Lekarz'=>$productByid[0]["Lekarz"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByid[0]["id"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByid[0]["id"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["id"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
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
<body style="margin: 0; padding: 150px 0 0;">
	<?php include "navlogged.html" ?>

<div id="shopping-cart">
<div class="txt-heading">Zapisany na wizyty <a id="btnEmpty" href="visitregister.php?action=empty">Wypisz ze wszystkich</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>  
<table cellpadding="100" cellspacing="100">
<tbody>
<tr>
	
<th style="text-align:left;"><strong>Termin</strong></th>

<th style="text-align:left;"><strong>Godzina</strong></th>
<th style="text-align:right;"><strong>Lekarz</strong></th>

<th style="text-align:center;"><strong>Action</strong></th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
    ?>
        <tr>
        
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["TERMIN"]."\t"; ?></strong></td>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["Godzina"]."\t"; ?></td>

       
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["Lekarz"]."\t"; ?></td>
        
        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="visitregister.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction">Wypisz</a></td>
        </tr>
        <?php
        $item_total += ($item["price"]*$item["quantity"]);
    }
    ?>


</tbody>
</table>    
  <?php
}
?>
</div>

<div id="product-grid">
  <div class="txt-heading">Wolne wizyty</div>
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE userID=0 ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item">
      <form method="post" action="visitregister.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
      <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
      <div><strong><?php echo "Termin: ".$product_array[$key]["TERMIN"]; ?><?php echo " ".$product_array[$key]["Godzina"]; ?></strong></div>
      
      <div class="product-price"><?php echo "Lekarz: ".$product_array[$key]["Lekarz"]; ?></div>
      <div><input type="submit" value="Zapisz" class="btnAddAction" /></div>
      </form>
    </div>
  <?php
      }
  }
  ?>
</div></center>
</body>
</html>
<?php ob_end_flush(); ?>