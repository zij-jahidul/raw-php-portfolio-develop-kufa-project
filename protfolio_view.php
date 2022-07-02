<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Portfolio View";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';


$protfolio_service_query = "SELECT * FROM protfolios";
$protfolios_from_db = mysqli_query($db_conntect , $protfolio_service_query);


$insert_service_query = "SELECT * FROM protfolios";
$service_from_db = mysqli_query($db_conntect , $insert_service_query);
$active_service_count_query = "SELECT COUNT(*) AS active_count FROM protfolios WHERE protfolio_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_service_count_query);


?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Portfolio Page</h1>
    <hr>
  </div>

</div>
<div class="row">
  <div class="col-md-8">
    <h2>Portfolio View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>

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
                <th>Protfolio Name</th>
                <th>Protfolio Information</th>
                <th>Protfolio Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($protfolios_from_db as $protfolio):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <th><?=ucwords(strtolower($protfolio['protfolio_name']))?></th>
                <td><?=$protfolio['protfolio_information']?></td>
                <td>
                  <img src="/web_dev/uploads/portfolio/<?=$protfolio['protfolio_file']?>" alt="<?=$protfolio['protfolio_file']?>">
                </td>

                <td>

                  <?php if($protfolio['protfolio_status'] == 1): ?>
                    <a href="protfolio_status_change.php?protfolio_id=<?=$protfolio['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($protfolio['protfolio_status'] == 2): ?>
                    <a href="protfolio_status_change.php?protfolio_id=<?=$protfolio['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="protfolio_edit.php?protfolio_id=<?=$protfolio['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value="protfolio_delete.php?protfolio_id=<?=$protfolio['id']?>">Delete</button>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

  </div>

  <div class="col-md-4">
    <h2>Service Add</h2>
    <form method="post" action="protfolio_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Portfolio Name</label>
        <input type="text" class="form-control" placeholder="Portfolio Name" name = "protfolio_name">
        <!-- <input type="hidden" name="id" value=""> -->
      </div>
      <div class="form-group">
        <label>Portfolio Information</label>
        <input type="text" class="form-control" placeholder="Portfolio Information" name = "protfolio_information">
      </div>
      <div class="form-group">
        <label>Portfolio Image</label>
        <input type="file" name="protfolio_file" class="form-control">
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
