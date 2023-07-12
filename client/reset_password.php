<?php
include('conf/config.php');
$token = $_GET["token"];

$token_hash = hash("sha256", $token);

//$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM ib_clients
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$ib_clients= $result->fetch_assoc();

if ($ib_clients === null) {
    die("token not found");
}

if (strtotime($ib_clients["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
 <?php include("dist/_partials/head.php"); ?>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
  
</head>
<body>
<!-- /Change Password -->
<title>Reset Password</title>

<br><br><br><br>
                                            
                                            <div class="tab-pane" id="Change_Password">
                                                <form method="post" class="form-horizontal" action="process-reset-password.php">
                                                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" class="form-control" required id="inputEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name='password_confirmation' class="form-control" required id="inputName2" n>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" name="change_client_password" class="btn btn-outline-success">Change Password</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
  
</html>