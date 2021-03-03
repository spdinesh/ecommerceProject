<?php   
 session_start();
 require('mysqli_connect.php');  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["moviestore"]))  
      {  
           $movie_array_id = array_column($_SESSION["moviestore"], "movie_id");
          
           if(!in_array($_GET["id"], $movie_array_id))  
           {  
                $count = count($_SESSION["moviestore"]);  
                $movie_array = array(  
                     'movie_id'      =>  $_GET["id"],  
                     'movie_name'    =>  $_POST["hidden_name"],  
                     'movie_price'   =>  $_POST["hidden_price"],  
                     'movie_quantity'=>  $_POST["quantity"]  
                );  
                $_SESSION["moviestore"][$count] = $movie_array;
               echo '<script>alert("Movie Added")</script>';
           }  
           else  
           {  
                echo '<script>alert("Movie Already Added")</script>';  
                echo '<script>window.location="home.php"</script>';  
           }  
      }  
      else  
      {  
           $movie_array = array(  
                'movie_id'          =>  $_GET["id"],  
                'movie_name'        =>  $_POST["hidden_name"],  
                'movie_price'       =>  $_POST["hidden_price"],  
                'movie_quantity'    =>  $_POST["quantity"]  
           );  
           $_SESSION["moviestore"][0] = $movie_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["moviestore"] as $keys => $values)  
           {  
                if($values["movie_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["moviestore"][$keys]);  
                     echo '<script>alert("Movie has been removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Movie Store</title>   
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="style/style.css"></script>
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:800px;">  
                <h3 align="center">Movie Store</h3><br />  
                <?php  
                $query = "SELECT * FROM movielist";  
                $result = mysqli_query($dbc, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div class = moviebox align="center">                              
                               <img src="<?php echo $row["image"]; ?>"/><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="number" name="quantity" class="qtyfield" max="10" min="1" />  
                               <input type="hidden" name="hidden_name"  value="<?php echo $row["name"]; ?>" /> 
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 
                               <input type="submit" name="add_to_cart" class = "addbutton" style="margin-top:5px; margin-bottom:25px;" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>
               
                <?php  
                     }  
                }
               
                ?>
               <input type = "submit" onclick="location.href='cart.php'" value = "Go To Cart" style="margin-left:45%";>
               
           </div>  
           <br />  
      </body>  
 </html>