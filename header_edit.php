<?php
session_start();
$title = "Header Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$header_id = $_GET['header_id'];
$header_query = "SELECT * FROM headers WHERE id = $header_id";
$header_from_db = mysqli_query($db_conntect,$header_query);
$after_assoc = mysqli_fetch_assoc($header_from_db);

?>


<div class="row">
  <div class="col-md-12">
    <h1>Header Edit</h1>
    <hr>
  </div>
</div>

<div class="row">
<div class="col-md-4 m-auto">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="header.php">Header</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['header_name']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="header_edit_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Header Name</label>
        <input type="hidden" name="header_id" value="<?=$header_id?>">
        <input type="text" class="form-control" placeholder="icon" name = "header_name" value="<?=$after_assoc['header_name']?>">
      </div>

      <div class="form-group">
        <label>Header Description</label>
        <input type="text" class="form-control" placeholder="title" name = "header_description" value="<?=$after_assoc['header_description']?>">
      </div>

      <div class="form-group">
        <label>Header Image</label>
        <img src="/web_dev/uploads/header/<?=$after_assoc['header_file']?>" alt="" class = "py-5">
      </div>

      <div class="form-group">
        <label>Header Image</label>
        <input type="file" class="form-control" name ="header_file">
      </div>

        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Edit</button>
      </div>
    </form>
  </div>
</div>


<?php
require 'includes/dashboard/footer.php';
?>
