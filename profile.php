<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Profile";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';
?>


<div class="row">
  <div class="col-md-4 m-auto">
    <form method="post" action="profile_post.php">
      <div class="form-group">
      <?php if(isset($_SESSION['fill_up'])):
      ?>
      <div class="alert alert-danger">
        <?=$_SESSION['fill_up']?>
      </div>

    <?php endif;
    unset($_SESSION['fill_up'])
    ?>

    <?php if(isset($_SESSION['pass_match'])):
    ?>
         <div class="alert alert-danger">
           <?=$_SESSION['pass_match']?>
         </div>

    <?php endif;
    unset($_SESSION['pass_match'])
    ?>

    <?php if(isset($_SESSION['pass_ok'])):
    ?>
         <div class="alert alert-success">
           <?=$_SESSION['pass_ok']?>
         </div>

    <?php endif;
    unset($_SESSION['pass_ok'])
    ?>

        <label>Old Password</label>
        <input type="password" class="form-control" name = "old_password">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="password" class="form-control" name = "new_password">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control">
      </div>
      <div>
        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Change Password</button>
      </div>
    </form>
  </div>
</div>




<?php
require 'includes/dashboard/footer.php';
?>
