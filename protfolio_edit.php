<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$protfolio_id = $_GET['protfolio_id'];

$get_query = "SELECT * FROM protfolios WHERE id = $protfolio_id";
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
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['protfolio_name']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="protfolio_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Protfolio Name</label>
        <input type="hidden" name="protfolio_id" value="<?=$protfolio_id?>">

        <input type="text" class="form-control" placeholder="icon" name = "protfolio_name" value="<?=$after_assoc['protfolio_name']?>">
      </div>
      <div class="form-group">
        <label>Protfolio Information</label>
        <input type="text" class="form-control" placeholder="title" name = "protfolio_information" value="<?=$after_assoc['protfolio_information']?>">

      </div>
      <div class="form-group">
        <label>Protfolio Image</label>
        <img src="\web_dev/uploads/portfolio/<?=$after_assoc['protfolio_file']?>" class = "py-3" alt="<?=$after_assoc['protfolio_file']?>">

        <input type ="file" name="protfolio_file" class ="form-control" placeholder="describtion" value="<?=$after_assoc['protfolio_file']?>">

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
