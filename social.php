<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Social Icon";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_social_query = "SELECT * FROM socials";
$social_from_db = mysqli_query($db_conntect , $insert_social_query);

$active_social_count_query = "SELECT COUNT(*) AS active_count FROM socials WHERE social_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_social_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Social Icon</h1>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-warning">
      <?=$_SESSION['error']?>
    </div>
   <?php
 endif;
 unset($_SESSION['error']);
   ?>
    <h2>Social Icon (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Social Link</th>
                <th>Social Icon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($social_from_db as $social):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=$social['social_link']?></th>
                <td><?=$social['social_icon']?></td>
                <td>
                  <?php if($social['social_status'] == 1): ?>
                    <a href="social_status_change.php?social_id=<?=$social['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>


                  <?php if($social['social_status'] == 2): ?>
                    <a href="social_status_change.php?social_id=<?=$social['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="social_edit.php?social_id=<?=$social['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "social_delete.php?social_id=<?=$social['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Service Add</h2>
    <form method="post" action="social_post.php">
      <div class="form-group">
        <label>Social Link</label>
        <input type="text" class="form-control" placeholder="social_link" name = "social_link">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Social Icon</label>
        <input type="text" class="form-control" placeholder="social_icon" name = "social_icon">
      </div>

      <div>
        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php
require 'includes/dashboard/footer.php';
require_once 'delete_show.php';
?>
