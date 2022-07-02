<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$logo_id = $_GET['logo_id'];

$get_query = "SELECT * FROM logos WHERE id = $logo_id";
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
      <li class="breadcrumb-item"><a href="logo.php">Logo</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['logo_name']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="logo_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Protfolio Name</label>
        <input type="hidden" name="logo_id" value="<?=$logo_id?>">
        <input type="text" class="form-control" name = "logo_name" value="<?=$after_assoc['logo_name']?>">
      </div>

      <div class="form-group">
        <label>Protfolio Image</label>
        <img src="\web_dev/uploads/logo/<?=$after_assoc['logo_image']?>" class = "py-3" alt="<?=$after_assoc['logo_image']?>">
        <input type ="file" name="logo_image" class ="form-control" value="<?=$after_assoc['logo_image']?>">
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
