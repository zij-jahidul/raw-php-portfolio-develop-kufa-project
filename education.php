<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Service view";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_education_query = "SELECT * FROM educations";
$education_from_db = mysqli_query($db_conntect , $insert_education_query);

$active_education_count_query = "SELECT COUNT(*) AS active_count FROM educations WHERE edu_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_education_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Education Page</h1>
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
    <h2>Education View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Education Year</th>
                <th>Education Description</th>
                <th>Education Percentage</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($education_from_db as $education):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=$education['edu_year']?></th>
                <td><?=$education['edu_description']?></td>
                <td><?=$education['edu_per']?></td>

                <td>
                  <?php if($education['edu_status'] == 1): ?>
                    <a href="education_status_change.php?education_id=<?=$education['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($education['edu_status'] == 2): ?>
                    <a href="education_status_change.php?education_id=<?=$education['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="education_edit.php?education_id=<?=$education['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "education_delete.php?education_id=<?=$education['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Service Add</h2>
    <form method="post" action="education_post.php">
      <div class="form-group">
        <label>Education Year</label>
        <input type="text" class="form-control" placeholder="Year" name = "edu_year">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Education Description</label>
        <input type="text" class="form-control" placeholder="Description" name = "edu_description">
      </div>
      <div class="form-group">
        <label>Education Percentage</label>
        <input type="text" name="edu_per" class = "form-control">
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
