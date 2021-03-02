<?php 
require('mysqli_connect.php');
$query = "select * from movie";
$result = @mysqli_query($dbc,$query);
?>

<html>
    <head>
        <title>Movie store</title>
    </head>    
    <body>
        <table align="center" border = "1px" style="width:600px; line-height:40px;">
            <tr>
                <th colspan = "6"><h2>Movie List</h2></th>
            </tr>
            <t>
                <th>MovieID</th>
                <th>Movie Name</th>
                <th>Genre</th>
                <th>Stars</th>
                <th>Price</th>
                <th>Quantity</th>
            </t>
            <?php
                while($rows = mysqli_fetch_array($result)){
            ?> 
                <tr>
                    <td><?php echo $rows['movieid'] ?></td>
                    <td><?php echo $rows['moviename'] ?></td>
                    <td><?php echo $rows['moviegenre'] ?></td>
                    <td><?php echo $rows['moviecast'] ?></td>
                    <td><?php echo $rows['price'] ?></td>
                    <td><input type="number" id="quantity" name="quantity" min="0" max="10"></td>
                </tr>        
            <?php
            }
            ?> 
        </table>
    </body>
</html>