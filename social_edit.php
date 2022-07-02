<?php
session_start();
$title = "Social Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$social_id = $_GET['social_id'];
$social_query = "SELECT * FROM socials WHERE id = $social_id";
$from_db = mysqli_query($db_conntect,$social_query);
$after_assoc = mysqli_fetch_assoc($from_db);

?>
<div class="row">
  <div class="col-md-12">
    <h1>Social Edit</h1>
    <hr>
  </div>
</div>

<div class="row">
<div class="col-md-4 m-auto">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="social.php">Social Icon</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['social_icon']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Social Edit</h2>

    <form method="post" action="social_edit_post.php">
      <div class="form-group">
        <label>Social Link</label>
        <input type="hidden" name="social_id" value="<?=$social_id?>">

        <input type="text" class="form-control" name = "social_link" value="<?=$after_assoc['social_link']?>">
      </div>
      <div class="form-group">
        <label>Social Icon</label>
        <input type="text" class="form-control" name = "social_icon" value="<?=$after_assoc['social_icon']?>">
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
