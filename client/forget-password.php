<!doctype html>
<?php 
include('conf/config.php');
include('conf/checklogin.php');
?>
<html lang="en">
 <?php include("dist/_partials/head.php"); ?>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      <title>Send Reset Password Link</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Change Password 
            </div>
            <div class="card-body">
              <form action="send-password-reset.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required id="inputEmail">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="send-password-reset" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
 
   </body>
</html>