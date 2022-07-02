<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Service view";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_contact_query = "SELECT * FROM contacts";
$contact_from_db = mysqli_query($db_conntect , $insert_contact_query);

$active_contact_count_query = "SELECT COUNT(*) AS active_count FROM contacts WHERE contact_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_contact_count_query);

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
    <h2>Contact View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Contact Address</th>
                <th>Contact Phone</th>
                <th>Contact Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($contact_from_db as $contact):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=$contact['contact_address']?></th>
                <td><?=$contact['contact_number']?></td>
                <td><?=$contact['contact_email']?></td>
                <td>
                  <?php if($contact['contact_status'] == 1): ?>
                    <a href="contact_status_change.php?contact_id=<?=$contact['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($contact['contact_status'] == 2): ?>
                    <a href="contact_status_change.php?contact_id=<?=$contact['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="contact_edit.php?contact_id=<?=$contact['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "contact_delete.php?contact_id=<?=$contact['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Contact Add</h2>
    <form method="post" action="contact_info_post.php">
      <div class="form-group">
        <label>Contact Address</label>
        <input type="text" class="form-control" placeholder="contact_address" name = "contact_address">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Contact Phone</label>
        <input type="text" class="form-control" placeholder="contact_number" name = "contact_number">
      </div>
      <div class="form-group">
        <label>Contact Email</label>
        <input type="email" name="contact_email" placeholder="contact_email" class="form-control">
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
