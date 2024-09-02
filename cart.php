<?php include 'header.php' ?>
<?php include 'navbar.php' ?>





        <section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
        </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Edit</td>
                    <td>Remove</td>
                </tr>
            </thead>
          
<?php require_once 'inc/conn.php' ;

$query = "select * from order_details where order_num=5";
      $runquery = mysqli_query($conn,$query);
      if (mysqli_num_rows($runquery)>0) {
          $order_product = mysqli_fetch_all($runquery,MYSQLI_ASSOC);
      }else {$msg = "no posts found";}

// require_once 'inc/error.php';
// require_once 'inc/success.php';
?>



<?php if (!empty($order_product)):
          foreach ($order_product as$post):
        ?>
            <tbody>
                <tr>
                    <td><img src="uploads/<?php echo $post['image'];?>" alt=""></td>
                    <td><?php echo $post['title']; ?></td>
                    <td><?php echo substr($post['description'],0,35)."...."; ?></td>
                    <td><?php echo $post['quantity']; ?></td>
                    <td><?php echo $post['price_unit']; ?></td>
                    <td><?php echo $post['subtotal']; ?></td>
                   
                    
                    <td></td>
                    
                    <!-- Remove any cart item  -->
                    <td><button type="submit"  class="btn btn-danger">Remove</button></td>
                    <?php 
        endforeach;
        else : echo $msg; 
        endif; 
        ?>
                    
                    
                </tr>
            </tbody>
                    
                
            <!-- confirm order  -->
            <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

    <!-- <?php include "footer.php" ?> -->

