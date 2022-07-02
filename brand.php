<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Portfolio View";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';


$brand_query = "SELECT * FROM brands";
$brand_from_db = mysqli_query($db_conntect , $brand_query);

$active_service_count_query = "SELECT COUNT(*) AS active_count FROM brands WHERE brand_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_service_count_query);

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Brand Page</h1>
    <hr>
  </div>

</div>
<div class="row">
  <div class="col-md-8">
    <h2>Brand View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>

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
                <th>Brand Name</th>
                <th>Brand Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($brand_from_db as $brand):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <td><?=$brand['brand_name']?></td>
                <td>
                  <img src="/web_dev/uploads/brand/<?=$brand['brand_image']?>" alt="<?=$brand['brand_image']?>">
                </td>
                <td>

                  <?php if($brand['brand_status'] == 1): ?>
                    <a href="brand_status_change.php?brand_id=<?=$brand['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($brand['brand_status'] == 2): ?>
                    <a href="brand_status_change.php?brand_id=<?=$brand['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="brand_edit.php?brand_id=<?=$brand['id']?>" class = "btn btn-info btn-sm">Edit</a>
                  
                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value="brand_delete.php?brand_id=<?=$brand['id']?>">Delete</button>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

  </div>

  <div class="col-md-4">
    <h2>Brand Add</h2>
    <form method="post" action="brand_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Brand Name</label>
        <input type="text" class="form-control" placeholder="Brand Name" name = "brand_name">
      </div>

      <div class="form-group">
        <label>Brand Image</label>
        <input type="file" name="brand_image" class="form-control">
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
