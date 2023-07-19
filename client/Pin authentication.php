<?php
include('conf/config.php');
$Pin= sha1(md5($_POST['Pin']));
//PIN AUTHETICATION
  $stmt = $mysqli->prepare("SELECT Pin  FROM ib_bankaccounts   WHERE account_id=?"); //sql to log in user
  $stmt->bind_param('s',$account_id); //bind fetched parameters
  $stmt->execute(); //execute bind
  $stmt->bind_result($pin ); //bind result
  $stmt->fetch();
  $stmt->close();


   if ( $Pin !== $pin ) {
        $err = "Please Check Your Pin";
        
    } else {
      ?>
        <script>
          window.location.replace("pages_check_client_acc_balance.php?account_id=<?php echo $row->account_id; ?>&acccount_number=<?php echo $row->account_number; ?>");
          alert("<?php echo "your password has been succesful reset"?>");
        </script>
      <?php
    }

?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>
<body>
<div class="col-md-2 form-group">
  <label for="exampleInputPassword1">Enter Pin</label>
  <input type="password" name="Pin" class="form-control" placeholder="PIN" required autofocus>
</div>
</body>
</html>