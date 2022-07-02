<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Service view";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

$insert_about_query = "SELECT * FROM abouts";
$about_from_db = mysqli_query($db_conntect , $insert_about_query);

$active_about_count_query = "SELECT COUNT(*) AS active_count FROM abouts WHERE about_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_about_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">About Me</h1>
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
    <h2>About View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>About Me</th>
                <th>About Information</th>
                <th>About Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($about_from_db as $about):
            ?>
            <tr>
                <td><?=$serial++?></td>
                <td><?=$about['about_me']?></td>
                <td><?=$about['about_information']?></td>
                <td>
                  <img src="/web_dev/uploads/about/<?=$about['about_image']?>" alt="<?=$about['about_image']?>">
                </td>
                <td>

                  <?php if($about['about_status'] == 1): ?>
                    <a href="about_status_change.php?about_id=<?=$about['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($about['about_status'] == 2): ?>
                    <a href="about_status_change.php?about_id=<?=$about['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="about_edit.php?about_id=<?=$about['id']?>" class = "btn btn-info btn-sm">Edit</a>
                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "about_delete.php?about_id=<?=$about['id']?>">
                    Delete</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>About Me Add</h2>
    <form method="post" action="about_post.php" enctype="multipart/form-data">

      <div class="form-group">
        <label>About Me</label>
        <input type="text" class="form-control" placeholder="about_information" name = "about_me">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>

      <div class="form-group">
        <label>About Information</label>
        <input type="text" class="form-control" placeholder="about_information" name = "about_information">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>

      <div class="form-group">
        <label>About Image</label>
        <input type="file" class="form-control" name = "about_image">
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
