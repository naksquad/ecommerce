<!-- It's very important that you look at the header.php first. A lot of stuff works off of what was written there. -BV -->
<?php 
    $active='Home';
    include("includes/header.php");
?>

<ul><li><br></li></ul>

<!-- Mostly for visual effect. Not functionally complex -BV -->
<section class="header1 cid-rFZ2EzMFIg mbr-parallax-background" id="header16-4">

<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10 align-center">
            <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                Giorno Giovanni</h1>
                <ul><li></li></ul>
            <p class="mbr-text pb-3 mbr-fonts-style display-5">
                Welcome to our online apparel store, Giorno Giovanni,&nbsp;where you can find hats, shirts, sweatshirts, pants, or anything! All made it in super high quality fabric at a cheap price.</p>
            <div class="mbr-section-btn"><a class="btn btn-md btn-black-outline display-4" href="https://www.youtube.com/watch?v=44qM4qSQypA">LEARN MORE</a></div>
        </div>
    </div>
</div>
</section>

<!-- More containers. Not functionally complex, just nice space-fillers for the front page -BV -->
<section class="features1 cid-rFZ3EHj0Ai" id="features1-5">
<div class="container">
    <div class="media-container-row">

        <!-- Affordable Prices -->
        <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-img pb-3">
                <span class="mbr-iconfont mbri-cash"></span>
            </div>
            <div class="card-box">
                <h4 class="card-title py-3 mbr-fonts-style display-3">
                    Affordable Prices</h4>
                <p class="mbr-text mbr-fonts-style display-5">We offer high quality, affordable clothes to guarantee comfort and durability at competitive prices</p>
            </div>
        </div>

        <!-- Free Shipping -->
        <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-img pb-3">
                <span class="mbr-iconfont mbri-delivery"></span>
            </div>
            <div class="card-box">
                <h4 class="card-title py-3 mbr-fonts-style display-3">
                    Free Shipping</h4>
                <p class="mbr-text mbr-fonts-style display-5">
                    All our items are eligble for free shipping</p>
            </div>
        </div>

        <!-- Money Back -->
        <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-img pb-3">
                <span class="mbr-iconfont mbri-like"></span>
            </div>
            <div class="card-box">
                <h4 class="card-title py-3 mbr-fonts-style display-3">
                    30 Day Money Back Guarantee</h4>
                <p class="mbr-text mbr-fonts-style display-5">
                    Your purchases can be traded for credit and discounts on future deals!</p>
            </div>
        </div>
    </div>
</div>

</section>

<!-- This is where Bright's database starts to mix in. Conflicting styles make the sizes look like shit. Feel free to change stuff up in functions.php if you don't wanna use that commented-out style -BV -->
<section class="services1 cid-rFZ5i2Nvbp" id="services1-6">

    <div class="container">
        <div class="row justify-content-center">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left pb-3 mbr-fonts-style display-1">
                    Featured Items
                </h2>
                
            </div>

            <div id="content" class="container"><!-- container Begin -->
       
                <div class="row"><!-- row Begin -->
                
                    <?php 
                    
                    // Of course, if you want to change ANYTHING about the "Featured Items" section, go to the functions.php and look at the getPro section -BV //
                    getPro();
                    
                    ?>
                
                </div><!-- row Finish -->
       
            </div><!-- container Finish -->
            
        </div>
    </div>
</section>
   
<?php 
    
    include("includes/footer.php");
    
  
?>

<!-- Bright's script -BV -->
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