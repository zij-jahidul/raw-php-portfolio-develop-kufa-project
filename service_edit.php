<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$service_id = $_GET['service_id'];

$get_query = "SELECT * FROM services WHERE id = $service_id";
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
      <li class="breadcrumb-item"><a href="protfolio_view.php">Protfolio</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['service_title']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="service_edit_post.php">
      <div class="form-group">
        <label>Service Icon</label>
        <input type="hidden" name="service_id" value="<?=$service_id?>">
        <input type="text" class="form-control" name = "service_icon" value="<?=$after_assoc['service_icon']?>">
      </div>

      <div class="form-group">
        <label>Service Title</label>
        <input type="text" class="form-control" name = "service_title" value="<?=$after_assoc['service_title']?>">
      </div>

      <div class="form-group">
        <label>Service Description</label>
        <input type="text" class="form-control" name = "service_describtion" value="<?=$after_assoc['service_describtion']?>">
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
