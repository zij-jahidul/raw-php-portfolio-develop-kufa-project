<?php
require 'includes/header.php';
require 'includes/db.php';
$read_query = "SELECT * FROM visitor_messages WHERE delete_status = 1";
$datas = mysqli_query($db_conntect, $read_query);

$total_messages_query = "SELECT COUNT(*) AS total_message FROM visitor_messages";
$total_connect_form_db = mysqli_query($db_conntect,$total_messages_query);
$total_message = mysqli_fetch_assoc($total_connect_form_db);

$unread_messages_query = "SELECT COUNT(*) AS unread_message FROM visitor_messages WHERE status = 1";
$unread_connect_form_db = mysqli_query($db_conntect,$unread_messages_query);
$unread_message = mysqli_fetch_assoc($unread_connect_form_db);

$read_messages_query = "SELECT COUNT(*) AS read_message FROM visitor_messages WHERE status = 2";
$read_connect_form_db = mysqli_query($db_conntect,$read_messages_query);
$read_message = mysqli_fetch_assoc($read_connect_form_db);

$soft_delete_messages_query = "SELECT COUNT(*) AS soft_delete_message FROM visitor_messages WHERE delete_status = 2";
$soft_delete_connect_form_db = mysqli_query($db_conntect,$soft_delete_messages_query);
$soft_delete_message = mysqli_fetch_assoc($soft_delete_connect_form_db);

?>


<div class="container">
    <div class="row">

      <div class="col-md-3 my-3">
        <h4>Total Messages : <?=$total_message['total_message']?></h4>
      </div>

      <div class="col-md-3 my-3">
        <h4>Read Messages : <?=$unread_message['unread_message']?></h4>
      </div>

      <div class="col-md-3 my-3">
        <h4>Unread Messages : <?=$read_message['read_message']?></h4>
      </div>

      <div class="col-md-3 my-3">
        <h4><a href="contact_restore.php" style="text-decoration:none; color:#222;">Soft_Del_Message :</a> <?=$soft_delete_message['soft_delete_message']?></h4>
      </div>

        <div class="col-md-12">
            <div class="card text-white bg-secondary">
                <h1 class="card-header text-center">Contact View Page</h1>
                <div class="card-body">

                    <table class="table table-dark">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Visitor_name</th>
                                <th>Visitor_email</th>
                                <th>Visitor_message</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                             foreach($datas as $data):
                            ?>

                            <tr>
                                <th><?=$data['id']?></th>
                                <td><?=$data['visitor_name']?></td>
                                <td><?=$data['visitor_email']?></td>
                                <td><?=$data['visitor_message']?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <?php if($data['status'] == 2): ?>
                                        <a href = "contact_read.php?id=<?=$data['id']?>" type="button" class="btn btn-success btn-sm">Mark As Read</a>
                                      <?php endif; ?>

                                      <?php if($data['delete_status'] == 1): ?>
                                        <a href = "contact_soft_delete.php?id=<?=$data['id']?>" type="button" class="btn btn-warning btn-sm">Soft Delete</a>
                                      <?php endif; ?>
                                    </div>
                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <a href="contact.php" class="btn btn-info">Click Here too Back</a>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>
