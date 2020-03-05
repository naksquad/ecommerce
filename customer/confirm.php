<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UHD Online Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <!-- Yousif and Ameen's header code for styles -BV -->
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body style='font-size:16px;'>
    <!-- This is the navigation bar at the top -BV -->
    <section class="menu cid-rFZ831p1p5" once="menu" id="menu1-b">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            
            <!-- No clue what this does. It seems to do nothing, but I'm too scared to remove it -BV -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <!-- This seems to be where the actual navbar begins -BV -->
            <div class="menu-logo">
                <div class="navbar-brand">
                    
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="../index.php" style="font-size:16px;">
                        Giorno Giovanni</a></span>
                </div>
            </div>

            <!-- Items on the right side of the navbar -BV -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    
                    <!-- Information about who is logged in -BV -->
                    <li class="nav-item link text-white display-4" style="font-size:16px;"> 
                        <?php 
                            if(!isset($_SESSION['customer_email'])){   
                                echo "Welcome: Guest";
                            }
                            else{
                                echo "Welcome: " . $_SESSION['customer_email'] . "";   
                            }
                        ?>
                    </li>

                    <!-- Dropdown menu for the shop section. -BV -->
                    <li class="nav-item dropdown"> 
                        <a class="nav-link link dropdown-toggle text-white display-4" data-toggle="dropdown-submenu" aria-expanded="true" style="font-size:16px;"><span class="mbri-shopping-bag mbr-iconfont mbr-iconfont-btn"></span>Shop</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-white display-4" href="../shop.php" aria-expanded="false" style="font-size:14px;">Browse</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=1" aria-expanded="false" style="font-size:14px;">Shirts & Tanks</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=2" aria-expanded="false" style="font-size:14px;">Sweatshirts</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=3" aria-expanded="false" style="font-size:14px;">Hats</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=4" aria-expanded="false" style="font-size:14px;">Outerwear</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=5" aria-expanded="false" style="font-size:14px;">Accessories</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?p_cat=6" aria-expanded="false" style="font-size:14px;">Bottoms</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?cat=1" aria-expanded="false" style="font-size:14px;">Men's Apparel</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?cat=2" aria-expanded="false" style="font-size:14px;">Women's Apparel</a>
                            <a class="dropdown-item text-white display-4" href="../shop.php?cat=3" aria-expanded="false" style="font-size:14px;">For Kids</a>
                        </div>
                    </li>
                    
                    <!-- The "My Account" button will only show up if you're logged in -BV -->
                    <?php
                        if(!isset($_SESSION['customer_email'])){   
                        }
                        else{
                            echo "<li class='nav-item'><a class='nav-link link text-white display-4' href='../customer/my_account.php?my_orders' style='font-size:16px;'>My Account</a></li>";   
                        }
                    ?>

                    <!-- Shopping Cart button -BV -->
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="../cart.php" style="font-size:16px;">Shopping Cart (<?php items(); ?>)</a>
                    </li>
                    
                    <!-- The "Register" button only shows up if you are not logged in -BV -->
                    <?php
                        if(!isset($_SESSION['customer_email'])){   
                            echo "<li class='nav-item'><a class='nav-link link text-white display-4' href='../customer_register.php' style='font-size:16px;'>Register</a></li>";
                        }
                    ?>
                    
                    <!-- alternates between "log in" and "log out" depending on your log status -BV -->
                    <li class="nav-item">
                        <?php 
                           
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a class='nav-link link text-white display-4' href='../checkout.php' style='font-size:16px;'>Log In</a>";
                            }
                            else{
                                echo " <a class='nav-link link text-white display-4' href='../logout.php' style='font-size:16px;'>Log Out</a> ";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <ul><li><br><br><br></li></ul>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <h1 align="center"> Please confirm your payment</h1>
                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Invoice No: </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required style='font-size:16px;'>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Amount Sent: </label>
                          
                          <input type="text" class="form-control" name="amount_sent" required style='font-size:16px;'>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Select Payment Mode: </label>
                          
                          <select name="payment_mode" class="form-control" style='font-size:16px;'><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Debit / Credit Card </option>
                              <option> Google Pay </option>
                              <option> Bank Check </option>
                              <option> PayPal </option>
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Transaction / Reference ID: </label>
                          
                          <input type="text" class="form-control" name="ref_no" required style='font-size:16px;'>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Account Number: </label>
                          
                          <input type="text" class="form-control" name="code" required style='font-size:16px;'>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Payment Date: </label>
                          
                          <input type="text" class="form-control" name="date" required style='font-size:16px;'>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                   </form><!-- form Finish -->
                   
                   <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    <!-- Yousif and Ameen's script -BV -->
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
<?php } ?>