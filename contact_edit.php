<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$contact_id = $_GET['contact_id'];

$get_query = "SELECT * FROM contacts WHERE id = $contact_id";
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
      <li class="breadcrumb-item"><a href="protfolio_view.php">Contact</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['contact_email']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="contact_edit_post.php">
      <div class="form-group">
        <label>Contact Address</label>
        <input type="hidden" name="contact_id" value="<?=$contact_id?>">
        <input type="text" class="form-control" name = "contact_address" value="<?=$after_assoc['contact_address']?>">
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" name = "contact_number" value="<?=$after_assoc['contact_number']?>">
      </div>

      <div class="form-group">
        <label>Contact Email</label>
        <input type="text" class="form-control" name = "contact_email" value="<?=$after_assoc['contact_email']?>">
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
