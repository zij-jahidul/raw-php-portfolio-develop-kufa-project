<?php
session_start();
$title = "Portfolio Edit";
require_once 'includes/authchecking.php';
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require 'includes/db.php';

$education_id = $_GET['education_id'];

$get_query = "SELECT * FROM educations WHERE id = $education_id";
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
      <li class="breadcrumb-item"><a href="education.php">Education</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?=$after_assoc['edu_description']?></li>
    </ol>
  </nav>
</div>
</div>

<div class="row">
  <div class="col-md-6 m-auto">
    <h2>Edit Page</h2>

    <form method="post" action="education_edit_post.php">
      <div class="form-group">
        <label>Education Year</label>
        <input type="hidden" name="education_id" value="<?=$education_id?>">

        <input type="text" class="form-control" name = "edu_year" value="<?=$after_assoc['edu_year']?>">
      </div>
      <div class="form-group">
        <label>Education Description</label>
        <input type="text" class="form-control" name = "edu_description" value="<?=$after_assoc['edu_description']?>">

      </div>
      <div class="form-group">
        <label>Protfolio Percentage</label>
        <input type ="text" name="edu_per" class ="form-control" value="<?=$after_assoc['edu_per']?>">

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
