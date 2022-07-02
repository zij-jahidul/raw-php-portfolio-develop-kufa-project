<?php
require 'includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-secondary">
                <h1 class="card-header text-center">Home Page</h1>
                <div class="card-body">


                    <form method="post" action="contact_post.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name = "visitor_name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" placeholder="Email" name = "visitor_email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Message</label>
                            <textarea name = "visitor_message" rows="8" class = "form-control" placeholder="Message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>
