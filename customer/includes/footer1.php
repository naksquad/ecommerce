<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Pages</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!-- ul Begin -->
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='../checkout.php'>Login</a>";
                               
                           }else{
                               
                              echo"<a href='my_account.php?my_orders'>My Account</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li>
                    
                            <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='../checkout.php'>Login</a>";
                               
                           }else{
                               
                              echo"<a href='my_account.php?edit_account'>Edit Account</a>"; 
                               
                           }
                           
                           ?>
                    
                    </li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Top Products Categories</h4>
                
                <ul><!-- ul Begin -->
                
                    <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='../shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Find Us</h4>

                <p><!--p end-->

                    <strong>UHD BookStore</strong>
                    <br/>1 Main St Suite 351
                    <br/>Houston
                    <br/>TX, US 77002-3651
                    <br/>Go To http://www.uhd.edu
                    <br/><strong>UHD</strong>

                </p><!--p end-->

             

                <hr class="hidden-md hidden-lg">

            </div><!--col-sm-6 col-md-3 end-->

            <div class="col-sm-6 col-md-3">

                <h4>Get The News</h4>

                <p class="text-muted">
                     Check on your order status using the tracking number from your order status email. For easy checkout and tracking, create an account. Registered users can track orders within their eFollett Accounts
                </p>
                
                <form action="" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->
                        
                        <input type="text" class="form-control" name="email">

                        <span class="input-group-btn"><!--input-group-btn start-->

                            <input type="submit"  value="subscribe" class="btn btn-default">

                        </span><!--input-group-btn end-->

                    </div><!--input-group end-->
                </form><!--form start-->

                <hr>

                <h4>Keep In Touch</h4>

                <p class="social">
                    <a href="../#" class="fa fa-facebook"></a>
                    <a href="../#" class="fa fa-twitter"></a>
                    <a href="../#" class="fa fa-instagram"></a>
                    <a href="../#" class="fa fa-google-plus"></a>
                    <a href="../#" class="fa fa-envelope"></a>
                </p>


            </div>

        </div><!--row end-->
    </div><!--container end-->
</div><!--footer end-->

<div id="copyright"><!--copyright start-->
    <div class="container"><!--container start-->
        <div class="col-md-6"><!--col-md-6 start-->

            <p class="pull-left">&copy; NAKSQAUD Store All Right Reserve</p>

        </div><!--col-md-6 end-->
        <div class="col-md-6"><!--col-md-6 start-->

            <p class="pull-left"> Theme by: <a href="#">NAK</p>

        </div><!--col-md-6 end-->
    </div><!--container end-->
</div><!--copyright end-->