<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$about_id = $_GET['about_id'];
$about_query = "SELECT * FROM abouts WHERE id = $about_id";
$from_db = mysqli_query($db_conntect,$about_query);
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
      <li class="breadcrumb-item"><a href="about.php">About</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['about_me']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="about_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Protfolio Name</label>
        <input type="hidden" name="about_id" value="<?=$about_id?>">

        <input type="text" class="form-control" placeholder="icon" name = "about_me" value="<?=$after_assoc['about_me']?>">
      </div>
      <div class="form-group">
        <label>Protfolio Information</label>
        <input type="text" class="form-control" placeholder="title" name = "about_information" value="<?=$after_assoc['about_information']?>">

      </div>
      <div class="form-group">
        <label>Protfolio Image</label>
        <img src="\web_dev/uploads/about/<?=$after_assoc['about_image']?>" class = "py-3" alt="<?=$after_assoc['about_image']?>">

        <input type ="file" name="about_image" class ="form-control">

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
