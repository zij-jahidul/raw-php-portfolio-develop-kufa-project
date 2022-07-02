<?php
session_start();
require_once 'includes/authchecking.php';
$title = "Header";
require_once 'includes/dashboard/header.php';
require_once 'includes/dashboard/sidebar.php';
require_once 'includes/db.php';

?>

<div class="row">
  <div class="col-md-12">
    <h1 class = "text-center text-primary">Header Page</h1>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <h2>Header View</h2>
    <hr>

    <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-warning">
      <?=$_SESSION['error']?>
    </div>
   <?php
  endif;
  unset($_SESSION['error']);
   ?>
    <table class="table table-dark" id="table_show">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Header Name</th>
                <th>Header Description</th>
                <th>Header Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
          <?php
          $serial = 1;
          $header_query = "SELECT * FROM headers";
          $headers_from_db = mysqli_query($db_conntect , $header_query);

           foreach($headers_from_db as $header):
          ?>

            <tr>
                <th><?=$serial++?></th>
                <td><?=$header['header_name']?></td>
                <td><?=$header['header_description']?></td>
                <td>
                  <img src="/web_dev/uploads/header/<?=$header['header_file']?>" alt="<?=$header['header_file']?>">
                </td>

                <td>
                  <?php if($header['header_status'] == 1): ?>
                    <a href="header_status_change.php?header_id=<?=$header['id']?>&btn=active" class = "btn btn-warning btn-sm">Active</a>
                  <?php endif; ?>

                  <?php if($header['header_status'] == 2): ?>
                    <a href="header_status_change.php?header_id=<?=$header['id']?>&btn=deactive" class = "btn btn-primary btn-sm">Deactive</a>
                  <?php endif; ?>

                  <a href="header_edit.php?header_id=<?=$header['id']?>" class = "btn btn-info btn-sm">Edit</a>

                  <button type="button" name="button" class="btn btn-sm btn-danger delete_btn" value= "header_delete.php?header_id=<?=$header['id']?>">
                    Delete</button>
                </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
    </table>
  </div>

  <div class="col-md-4">
    <h2>Header Add</h2>
    <hr>
    <form method="post" action="header_post.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Header Name</label>
        <input type="text" class="form-control" placeholder="title" name = "header_name">
      </div>
      <div class="form-group">
        <label>Header Describtion</label>
        <textarea name="header_description" rows="4" class = "form-control" placeholder="description"></textarea>
      </div>

      <div class="form-group">
        <label>Header Image</label>
        <input type="file" name="header_file" class = "form-control">
      </div>

      <div>
        <button type = "submit" class="btn btn-block btn-success btn-lg font-weight-medium">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php
require 'includes/dashboard/footer.php';
require_once 'delete_show.php';
?>
