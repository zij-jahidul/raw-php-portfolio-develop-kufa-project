<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Portfolio View";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';


$insert_customer_query = "SELECT * FROM customers";
$customer_from_db = mysqli_query($db_conntect , $insert_customer_query);

$active_customer_count_query = "SELECT COUNT(*) AS active_count FROM customers WHERE customer_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_customer_count_query);


?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Customer Page</h1>
    <hr>
  </div>

</div>
<div class="row">
  <div class="col-md-8">
    <h2>Customer View (Active : <?=mysqli_fetch_assoc($active_from_db)['active_count']?>)</h2>

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
                <th>Customer Image</th>
                <th>Customer Message</th>
                <th>Customer Name</th>
                <th>Customer Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $serial = 1;
          foreach($customer_from_db as $customer):
            ?>
            <tr>
                <th><?=$serial++?></th>
                <td>
                  <img src="/web_dev/uploads/customer/<?=$customer['customer_image']?>" alt="<?=$customer['customer_image']?>">
                </td>

                <th><?=$customer['customer_message']?></th>
                <td><?=$customer['customer_name']?></td>
                <td><?=$customer['customer_position']?></td>
                <td>

                  <?php if($customer['customer_status'] == 1): ?>
                    <a href="customer_status_change.php?customer_id=<?=$customer['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($customer['customer_status'] == 2): ?>
                    <a href="customer_status_change.php?customer_id=<?=$customer['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="customer_edit.php?customer_id=<?=$customer['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value="customer_delete.php?customer_id=<?=$customer['id']?>">Delete</button>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

  </div>

  <div class="col-md-4">
    <h2>Service Add</h2>
    <form method="post" action="customer_post.php" enctype="multipart/form-data">

      <div class="form-group">
        <label>Customer Message</label>
        <input type="text" class="form-control" placeholder="Portfolio Name" name = "customer_message">
      </div>

      <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" placeholder="Portfolio Name" name = "customer_name">
      </div>

      <div class="form-group">
        <label>Customer Position</label>
        <input type="text" class="form-control" placeholder="Portfolio Information" name = "customer_position">
      </div>
      <div class="form-group">
        <label>Customer Image</label>
        <input type="file" name="customer_image" class="form-control">
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
