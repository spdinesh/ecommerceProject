
 <html>  
<head>  
   <title>Movie Store</title>   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="style/style.css"></script>
</head>  
<body>  
    
    <?php
     session_start();
    ?>
    
   <br/>  
   <div class="container" style="width:700px;"> 
    <br/>  
    <h3>Order Details</h3>  
    <div class="table-responsive">  
         <table class="table table-bordered">  
              <tr>  
                   <th>Movie Name</th>  
                   <th>Quantity</th>  
                   <th>Price</th>  
                   <th>Total</th>  
                   <th>Edit</th>  
              </tr>  
              <?php   
              if(!empty($_SESSION["moviestore"]))  
              {  
                   $total = 0;  
                   foreach($_SESSION["moviestore"] as $keys => $values)  
                   {  
              ?>  
              <tr>  
                   <td><?php echo $values["movie_name"]; ?></td>  
                   <td><?php echo $values["movie_quantity"]; ?></td>  
                   <td><?php echo $values["movie_price"]; ?></td>  
                   <td><?php echo number_format($values["movie_quantity"] * $values["movie_price"], 2); ?></td>  
                   <td><a href="home.php?action=delete&id=<?php echo $values["movie_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
              </tr>  
              <?php  
                        $total = $total + ($values["movie_quantity"] * $values["movie_price"]);  
                   }  
              ?>  
              <tr>  
                   <td colspan="3" align="right">Total</td>  
                   <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                   <td></td>  
              </tr>  
              <?php  
              }  
              ?>  
         </table>  
    </div>
       <form action = "cart.php" method = "post">
                <input type = "submit" onclick="alert('Order has been placed')" value = "Confirm Order">
                <input type = "button" onclick="location.href='home.php'" value = "Go To Movie" style="margin-left:40%";>
       </form>
                
     </div>
     </body>
</html>