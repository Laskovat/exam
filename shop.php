
<?php include 'header.php' ?>
<?php include 'navbar.php'
 ?>
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
        <?php 



        if (!empty($posts)):
          foreach ($posts as$post):
    //     if (isset($_POST['submit'])) {
    //         $quantity=$_POST['quantity'];
    //         $post_id=$post['id'];
    //         $post_price=$post['price'];
    //      $query="insert into order_details(`product_id`,`order_num`,`price_unit`,`quantity`) values('$post_id',5,'$post_price,'$quantity')";
    // $runquery=mysqli_query($conn,$query);
    //     if($runquery){
    //         $_SESSION['success']="category has addeded successfuly ";
    //         header("location: ../admin/view/layout.php");
    //     }else{
    //             $_SESSION['errors']=['error while processing try again'];
    //         header("location: ../admin/view/layout.php");
           
    //     }}
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
                    <form class="form" method="post" action="handle/handle_shop.php" >
                    
                    <h4><?php echo $post['id']; ?></h4>
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>" >
                    <input type="number" name="quantity"min="1">
                    <!-- <button type="submit" name="submit">Add</button> -->
                    <button type="submit"name="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
                    </form>
                    <!-- <a class="cart "><i class="fas fa-shopping-cart "></i></a>  -->
                     <!-- <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i></a>  -->
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
    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="">Next</span>
      </a>
    </li>
  </ul>
</nav>
    </section>

  


    <?php include 'footer.php' ?>