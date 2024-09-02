<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php require_once 'inc/conn.php' ?>

<!-- 
    <section id="hero">

        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more woth coupons & up to 70% off!</p>
        <button>Shop Now!</button>

    </section> -->

    <!-- End Hero -->

    <!-- start Feature-->
 <!--    <section id="feature" class="section-p1">
        <div class="fe-1">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f4.png" alt="">
            <h6>Promitions</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f6.png" alt="">
            <h6>F7/24 Support</h6>
        </div>
    </section> -->
    <!-- End Feature-->

    <!-- Start New Arrival or productCard Features -->

<?php  
$query = "select id , title , substring(description,1,20) as body  , image , price , quantity from products";
      $runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)>0) {
          $posts = mysqli_fetch_all($runquery,MYSQLI_ASSOC);
      }else {$msg = "no posts found";}

require_once 'inc/error.php';
require_once 'inc/success.php';
?>

    <section id="product1" class="section-p1">
     <!--    <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p> -->
        <div class="pro-container">
        <?php if (!empty($posts)):
          foreach ($posts as$post):
        ?>
            <div class="pro">

                <img src="uploads/<?php echo $post['image'];?>" alt="p1">
                <div class="des">
                    <span><?php echo $post['title']; ?></span>
                    <h5><?php echo $post['body'] . "......"; ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo $post['id']; ?></h4>
                    <!-- <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i></a> -->
                </div>
            </div>
        <?php 
        endforeach;
        else : echo $msg; 
        endif; 
        ?>
          
        </div>
    </section>
    <!-- End New Arrival -->
    <!-- Start bannar -->
   <!--  <section id="bannar" class="section-m1">
        <h4>Repair Service</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section> -->
    <!-- End bannar -->
    <section id="product1" class="section-p1">
       <!--  <h2>New Arrival</h2>
        <p>Summer Collection New Modren Desgin</p> -->
       <!--  <div class="pro-container">
            <div class="pro">
                <img src="img/products/n1.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n2.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n3.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n4.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n5.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n6.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n7.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="img/products/n8.jpg" alt="p1">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>78</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div> -->
    </section>
  <!--   <section id="sm-bannar" class="section-p1">
        <div class="bannar-box">
            <h4>Crazy Deals</h4>
            <h2>buy 1 get 1 Free</h2>
            <span>The best classic dress is on sale from cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="bannar-box bannar-box2">
            <h4>Spring/Summer</h4>
            <h2>buy 1 get 1 Free</h2>
            <span>The best classic dress is on sale from cara</span>
            <button class="white">Learn More</button>
        </div>
    </section> -->

    <<!-- section id="bannar3" class="section-p1">
        <div class="bannar-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
        <div class="bannar-box bannar-box2">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
        <div class="bannar-box bannar-box3">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection - 50% off</h3>
        </div>
    </section> -->

    <!-- <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning">Special Offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Enter Your E-mail...">
            <button class="normal">Sign Up</button>
        </div>
    </section> -->





<!-- <?php include 'footer.php' ?>