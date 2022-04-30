<?php
// JE ZET DE MAP DATABSE IN EEN VARIABLE DIE VERVOLGENS VERDER GEBRUIKT KAN WORDEN ZODAT JE DATA VAN ANDERE FILES KAN GEBRUIKEN
$PDO = require __DIR__ . "/db.php";

session_start();
unset($_SESSION['msg']);

// DE VOLGENDE VELDEN CHECKEN of ZE ZIJN INGEVULD
if (empty($_POST["name"])) {
    $errors[] = "Name is required";
}

if (empty($_POST["username"])) {
    $errors[] = "Username is required";
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email is required";
}
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT username, email FROM `user` WHERE username=? OR email=?";
$stmt = $PDO->prepare($sql);
$stmt->execute([$_POST["username"], $_POST["email"]]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['username'] === $_POST["username"]) {
        $errors[] = "Username is taken";
    }
    if ($row['email'] === $_POST["email"]) {
        $errors[] = "Email is taken";
    }
}

if (strlen($_POST["password"]) < 8) {
    $errors[] = "Password must be at least 8 characters";
}

if (! preg_match("/[a-z][0-9]/i", $_POST["password"])) {
    $errors[] = "Password must contain at least one letter and one number";
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $errors[] = "Passwords must match";
}
// WACHTWOORD BEVEILIGEN DOOR EEN HASH TE GEBRUIKEN
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// VOOR DE DATABASE INSERT VAN GEGEVENS
$sql = "INSERT INTO user (naam, email, password,username)
        VALUES (?,?,?,?)";
$stmt = $PDO->prepare($sql);

$data = array( $_POST["name"], $_POST["email"], $password_hash, $_POST['username']);

if ($errors) {
    $_SESSION['msg'] = $errors;
    var_dump($_SESSION['msg']);
    header('location: signup.php');
    die;
}
// ALS DE STMT IS GEEXECUTE ECHO SIGNUP SUCCESSFUL ANDERS LAAT ERROR ZIEN
if ($stmt->execute($data)) {
    header("Location: signup-success.php");
    exit;
}
