 <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $typ = $_POST['Typ'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE `$typ` LIKE '%".$valueToSearch."%' ";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbtest");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
    	
        
        <form action="search.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            
            <select name="Typ">
			<option>userName</option>
			<option selected="selected">userSurname</option>
				<option>userPass</option>
				<option>userPesel</option>
				<option>userEmail</option>
				<option>userTel</option>
			</select>
            <input type="submit" name="search" value="Filter"><br><br>
            <table>
                <tr>
                    <th>userName</th>
                    <th>userSurname</th>
                    <th>userPass</th>
                    <th>userPesel</th>
                    <th>userEmail</th>
                    <th>userTel</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['userName'];?></td>
                    <td><?php echo $row['userSurname'];?></td>
                    <td><?php echo $row['userPass'];?></td>
                    <td><?php echo $row['userPesel'];?></td>
                    <td><?php echo $row['userEmail'];?></td>
                    <td><?php echo $row['userTel'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
