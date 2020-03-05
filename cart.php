<?php 

    $active='Cart';
    include("includes/header.php");

?>

<ul><li><br><br><br></li></ul>

    <div id="content" style='font-size:16px;'><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
               
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Cart
                    </li>
                </ul><!-- breadcrumb Finish -->
               
            </div><!-- col-md-12 Finish -->
           
            <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
                <div class="box"><!-- box Begin -->
                   
                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                        <h1>Shopping Cart</h1>
                       
                        <?php 
                       
                        $ip_add = getRealIpUser();
                       
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                        $run_cart = mysqli_query($con,$select_cart);
                       
                        $count = mysqli_num_rows($run_cart);
                       
                        ?>
                       
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                       
                        <div class="table-responsive"><!-- table-responsive Begin -->
                           
                            <table class="table"><!-- table Begin -->
                               
                                <thead><!-- thead Begin -->
                                   
                                    <tr><!-- tr Begin -->
                                       
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                       
                                    </tr><!-- tr Finish -->
                                   
                                </thead><!-- thead Finish -->
                               
                                <tbody><!-- tbody Begin -->
                                  
                                    <?php 
                                   
                                        $total = 0;
                                    
                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                        
                                        $pro_id = $row_cart['p_id'];
                                        
                                            $pro_size = $row_cart['size'];
                                        
                                            $pro_qty = $row_cart['qty'];
                                        
                                            $get_products = "select * from products where product_id='$pro_id'";
                                        
                                            $run_products = mysqli_query($con,$get_products);
                                        
                                        while($row_products = mysqli_fetch_array($run_products)){
                                            
                                            $product_title = $row_products['product_title'];
                                            
                                            $product_img1 = $row_products['product_img1'];
                                            
                                            $only_price = $row_products['product_price'];
                                            
                                            $sub_total = $row_products['product_price']*$pro_qty;
                                            
                                            $total += $sub_total;
                                           
                                    ?>
                                   
                                    <tr><!-- tr Begin -->
                                       
                                        <td>
                                           
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                                           
                                        </td>
                                       
                                        <td>
                                           
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                           
                                        </td>
                                       
                                        <td>
                                          
                                            <?php echo $pro_qty; ?>
                                           
                                        </td>
                                       
                                        <td>
                                           
                                            <?php echo $only_price; ?>
                                           
                                        </td>
                                       
                                        <td>
                                           
                                            <?php echo $pro_size; ?>
                                           
                                        </td>
                                       
                                        <td>
                                           
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                           
                                        </td>
                                       
                                        <td>
                                           
                                            $<?php echo $sub_total; ?>
                                           
                                        </td>
                                       
                                    </tr><!-- tr Finish -->
                                   
                                    <?php } } ?>
                                   
                                </tbody><!-- tbody Finish -->
                               
                                <tfoot><!-- tfoot Begin -->
                                   
                                    <tr><!-- tr Begin -->
                                       
                                        <th colspan="5">Total</th>
                                        <th colspan="2">$<?php echo $total; ?></th>
                                       
                                    </tr><!-- tr Finish -->
                                    
                                </tfoot><!-- tfoot Finish -->
                               
                            </table><!-- table Finish -->
                           
                        </div><!-- table-responsive Finish -->
                       
                        <div class="box-footer"><!-- box-footer Begin -->
                           
                            <div class="pull-left"><!-- pull-left Begin -->
                               
                                <a href="shop.php" class="btn btn-default" style='font-size:16px;'><!-- btn btn-default Begin -->
                                   
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                                </a><!-- btn btn-default Finish -->
                               
                            </div><!-- pull-left Finish -->
                           
                            <div class="pull-right"><!-- pull-right Begin -->
                               
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default" style='font-size:16px;'><!-- btn btn-default Begin -->
                                   
                                    <i class="fa fa-refresh"></i> Update Cart
                                   
                                </button><!-- btn btn-default Finish -->
                               
                                <a href="checkout.php" class="btn btn-primary" style='font-size:16px;'>
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                                </a>
                               
                            </div><!-- pull-right Finish -->
                           
                        </div><!-- box-footer Finish -->
                       
                    </form><!-- form Finish -->
                   
                </div><!-- box Finish -->
               
                <?php 
               
                    function update_cart(){
                        
                        global $con;
                        
                        if(isset($_POST['update'])){
                            
                            foreach($_POST['remove'] as $remove_id){
                                
                                $delete_product = "delete from cart where p_id='$remove_id'";
                                
                                $run_delete = mysqli_query($con,$delete_product);
                                
                                if($run_delete){
                                    
                                    echo "<script>window.open('cart.php','_self')</script>";
                                    
                                }
                                
                            }
                            
                        }
                        
                    }
               
                    echo @$up_cart = update_cart();
               
                ?>
               
                <div><!-- box Begin -->
                       
                    <h1 style="text-align:center">Products you might like</h1><br><br>
   
                    <?php 
                       
                        $get_products = "select * from products order by rand() LIMIT 0,4";
                           
                        $run_products = mysqli_query($con,$get_products);
                           
                        while($row_products=mysqli_fetch_array($run_products)){
                                       
                            $pro_id = $row_products['product_id'];
                                       
                            $pro_title = $row_products['product_title'];
                                       
                            $pro_img1 = $row_products['product_img1'];
                                   
                            $pro_price = $row_products['product_price'];
                                       
                            echo "
                                       
                                <div class='col-md-3 col-sm-6 center-responsive'>
                                           
                                    <div class='product same-height'>
                                               
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                        </a>
                                                   
                                        <div class='text'>
                                            <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                            <p class='price'> $ $pro_price </p>    
                                        </div>    
                                    </div>    
                                </div>    
                            ";        
                        }
                       
                    ?>
                      
                </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order All Sub-Total </td>
                                   <th> $<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> $0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <th> $0 </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th> $<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/parallax/jarallax.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/formoid/formoid.min.js"></script>
</body>
</html>