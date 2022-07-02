<?php
require 'includes/header.php';
require 'includes/db.php';
$read_query = "SELECT * FROM visitor_messages WHERE delete_status = 2";
$datas = mysqli_query($db_conntect, $read_query);


$soft_delete_messages_query = "SELECT COUNT(*) AS soft_delete_message FROM visitor_messages WHERE delete_status = 2";
$soft_delete_message_connect_form_db = mysqli_query($db_conntect,$soft_delete_messages_query);
$soft_delete_message = mysqli_fetch_assoc($soft_delete_message_connect_form_db);

// $datas_array = mysqli_fetch_assoc($datas);
// print_r($datas_array);

?>



<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card text-white bg-secondary">
                <h1 class="card-header text-center">Contact Restore Page</h1>
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

                            <?php foreach($datas as $data): ?>

                            <tr>
                                <th><?=$data['id']?></th>
                                <td><?=$data['visitor_name']?></td>
                                <td><?=$data['visitor_email']?></td>
                                <td><?=$data['visitor_message']?></td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic example">

                                      <?php if($data['delete_status'] == 2): ?>
                                        <a href = "restore.php?id=<?=$data['id']?>" type="button" class="btn btn-success btn-sm">Restore</a>
                                      <?php endif; ?>


                                      <?php if($data['delete_status'] == 2): ?>
                                        <a href = "delete.php?id=<?=$data['id']?>" type="button" class="btn btn-warning btn-sm">Delete</a>
                                      <?php endif; ?>







                                    </div>

                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <a href="contact_view.php" class="btn btn-info">Click Here too Back</a>

                </div>
            </div>

        </div>
    </div>
</div>
