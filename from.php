<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Service view";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_service_query = "SELECT * FROM services";
$service_from_db = mysqli_query($db_conntect , $insert_service_query);

$active_service_count_query = "SELECT COUNT(*) AS active_count FROM services WHERE service_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_service_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Service Page</h1>
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
    <h2>Service View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Service Icon</th>
                <th>Service Title</th>
                <th>Service Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($service_from_db as $service):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=$service['service_icon']?></th>
                <td><?=$service['service_title']?></td>
                <td><?=$service['service_describtion']?></td>
                <td>
                  <?php if($service['service_status'] == 1): ?>
                    <a href="service_status_change.php?service_id=<?=$service['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($service['service_status'] == 2): ?>
                    <a href="service_status_change.php?service_id=<?=$service['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="service_edit.php?service_id=<?=$service['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "service_delete.php?service_id=<?=$service['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Service Add</h2>
    <form method="post" action="service_post.php">
      <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name = "visitor_name" placeholder="Name">
      </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" class="form-control" placeholder="Email" name = "visitor_email">
      </div>

      <div class="form-group">
          <label for="exampleInputPassword1">Message</label>
          <textarea name = "visitor_message" rows="8" class = "form-control" placeholder="Message"></textarea>
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
