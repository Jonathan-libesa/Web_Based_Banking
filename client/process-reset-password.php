<?php
include('conf/config.php');
$token = $_POST["token"];

$token_hash = hash("sha256", $token);

//$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM ib_clients
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$ib_clients = $result->fetch_assoc();

if ($ib_clients === null) {
    die("token not found");
}

if (strtotime($ib_clients["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE ib_clients
        SET password_hash = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

//$stmt = $mysqli->prepare($sql);
if($stmt = $mysqli->prepare($sql)) { // assuming $mysqli is the connection
   $stmt->bind_param("ss", $password_hash, $ib_clients["id"]);;
   $stmt->execute();
    // any additional code you need would go here.
} else {
    
   echo "Password updated. You can now login.";
}

