<?php require_once 'inc/conn.php';  ?>

<section id="header">
<a href="index.php">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">

        
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>

       



        <!-- <li class="link">
            <a href="blog.html">Blog</a>
        </li> -->
        <!-- <li class="link">
            <a href="about.html">About</a>
        </li> -->
        <!-- <li class="link">
            <a href="contact.html">Contact</a>
        </li> -->

        <?php 
            if (isset($_SESSION['user_id'])):
        ?>
                <li class="link">
            <a href="shop.php">Shop</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=ar">Arabic</a>
        </li>

        <li class="link">
            <a href="handle/handle_logout.php">Logout</a>
        </li>

        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <?php else: ?>

        <li class="link">
            <a href="login.php">Login</a>
        </li>
        <li class="link">
            <a href="signup.php">Signup</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=ar">Arabic</a>
        </li>
         <?php endif; ?>

        <a href="#" id="close"><i class="fas fa-times"></i> </a>
    </ul>

</div>

<div id="mobile">
    <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>