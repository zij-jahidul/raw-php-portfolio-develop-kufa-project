<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Portfolio View";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';


$insert_logo_query = "SELECT * FROM logos";
$logo_from_db = mysqli_query($db_conntect , $insert_logo_query);

$active_logo_count_query = "SELECT COUNT(*) AS active_count FROM logos WHERE logo_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_logo_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Logo Page</h1>
    <hr>
  </div>

</div>
<div class="row">
  <div class="col-md-8">
    <h2>Logo View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>

    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-warning">
      <?=$_SESSION['error']?>
    </div>
   <?php
 endif;
 unset($_SESSION['error']);
   ?>

    <table class="table table-dark" id="table_search" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Logo Name</th>
                <th>Logo Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($logo_from_db as $logo):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=ucwords(strtolower($logo['logo_name']))?></th>
                <td>
                  <img src="/web_dev/uploads/logo/<?=$logo['logo_image']?>" alt="<?=$logo['logo_image']?>">
                </td>

                <td>

                  <?php if($logo['logo_status'] == 1): ?>
                    <a href="logo_status_change.php?logo_id=<?=$logo['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($logo['logo_status'] == 2): ?>
                    <a href="logo_status_change.php?logo_id=<?=$logo['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="logo_edit.php?logo_id=<?=$logo['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value="logo_delete.php?logo_id=<?=$logo['id']?>">Delete</button>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

  </div>

  <div class="col-md-4">
    <h2>Logo Add</h2>
    <form method="post" action="logo_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Logo Name</label>
        <input type="text" class="form-control" placeholder="Logo Name" name = "logo_name">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Logo Image</label>
        <input type="file" class="form-control" name = "logo_image">
      </div>

      <div>
        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Submit</button>
      </div>
    </form>
  </div>
  </div>
</div>

<?php
require 'includes/dashboard/footer.php';
require_once 'delete_show.php';
?>
