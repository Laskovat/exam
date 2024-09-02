<?php
include "header.php";
include "navbar.php";
?>

<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
    
            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">create a new password</h3>
                <form class="form" action="handle/handle_forgetten_password.php" method="post">
                  <?php require_once 'inc/error.php' ?>
                  <div class="form-group">

                    <label>email *</label>
                    <input type="email" class="form-control p_input"name="email" id=""value=""  >
                  </div>
                  <div class="form-group">
                    <label> New Password *</label>
                    <input type="password" class="form-control p_input" name="password1" id="" >
                  </div>
                  <div class="form-group">
                    <label>Confirm Password *</label>
                    <input type="password" class="form-control p_input" name="password2" id="" >
                  </div>
                <!--   <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn" >Confirm</button>
                  </div>
               <!--    <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> -->
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php include "footer.php" ?>


