<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$brand_id = $_GET['brand_id'];

$get_query = "SELECT * FROM brands WHERE id = $brand_id";
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
      <li class="breadcrumb-item"><a href="brand.php">Brand</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['brand_name']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="brand_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Brand Name</label>
        <input type="hidden" name="brand_id" value="<?=$brand_id?>">
        <input type="text" class="form-control" name = "brand_name" value="<?=$after_assoc['brand_name']?>">
      </div>

      <div class="form-group">
        <label>Brand Image</label>
        <img src="\web_dev/uploads/brand/<?=$after_assoc['brand_image']?>" class = "py-3" alt="<?=$after_assoc['brand_image']?>">

        <input type ="file" name="brand_image" class ="form-control">

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
