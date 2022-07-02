<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Service view";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_service_query = "SELECT * FROM expriences";
$exprience_from_db = mysqli_query($db_conntect , $insert_service_query);

$active_exprience_count_query = "SELECT COUNT(*) AS active_count FROM expriences WHERE exprience_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_exprience_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Expriences Page</h1>
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
          foreach($exprience_from_db as $exprience):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=$exprience['exprience_icon']?></th>
                <td><?=$exprience['exprience_number']?></td>
                <td><?=$exprience['exprience_title']?></td>
                <td>
                  <?php if($exprience['exprience_status'] == 1): ?>
                    <a href="exprience_status_change.php?exprience_id=<?=$exprience['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($exprience['exprience_status'] == 2): ?>
                    <a href="exprience_status_change.php?exprience_id=<?=$exprience['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="exprience_edit.php?exprience_id=<?=$exprience['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "exprience_delete.php?exprience_id=<?=$exprience['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Exprience Add</h2>
    <form method="post" action="exprience_post.php">
      <div class="form-group">
        <label>Exprience Icon</label>
        <input type="text" class="form-control" placeholder="exprience_icon" name = "exprience_icon">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Exprience Number</label>
        <input type="text" class="form-control" placeholder="exprience_number" name = "exprience_number">
      </div>
      <div class="form-group">
        <label>Exprience Title</label>
        <input type="text" class="form-control" placeholder="exprience_title" name="exprience_title">
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
