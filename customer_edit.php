<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$customer_id = $_GET['customer_id'];

$get_query = "SELECT * FROM customers WHERE id = $customer_id";
$from_db = mysqli_query($db_conntect,$get_query);
$after_assoc = mysqli_fetch_assoc($from_db);

?>
<div class="row">
  <div class="col-md-12">
    <h1>Edit Page</h1>
    <hr>
  </div>
</div>

<div class="row">
<div class="col-md-4 m-auto">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['customer_name']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="customer_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Customer Message</label>
        <input type="hidden" name="customer_id" value="<?=$customer_id?>">
        <input type="text" class="form-control" name = "customer_message" value="<?=$after_assoc['customer_message']?>">
      </div>
      <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" name = "customer_name" value="<?=$after_assoc['customer_name']?>">
      </div>
      <div class="form-group">
        <label>Customer Position</label>
        <input type="text" class="form-control" name = "customer_position" value="<?=$after_assoc['customer_position']?>">
      </div>

      <div class="form-group">
        <label>Customer Image</label>
        <img src="\web_dev/uploads/customer/<?=$after_assoc['customer_image']?>" class = "py-3" alt="<?=$after_assoc['customer_image']?>">
        <input type ="file" name="customer_image" class ="form-control">

      </div>
      <div>
        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Edit</button>
      </div>
    </form>
  </div>
</div>


<?php
require 'includes/dashboard/footer.php';
?>
