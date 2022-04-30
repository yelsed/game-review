<?php

$is_invalid = false;

// ALS DE METHODE GELIJK AAN POST IS DOE DAN HET VOLGENDE
if ($_SERVER["REQUEST_METHOD"] === "POST") {

// MET DE DATABASE CONNECTEN
    $PDO = require __DIR__ . "/db.php";

// HIER CHECK JE ALS DE EMAIL CORRECT IS 
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_POST["email"]]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

// HIER VERIFY JE HET WACHTWOORD MET DE HASH VARIANT EN ALS HET KLOPT KRIJG JE LOGIN SUCCESSFUL TE ZIEN
    if ($user) {
       if (password_verify($_POST["password"], $user["password"])) {

           session_start();

           // DIT DOEN WE OM EEN SESSION FIXATION ATTACK TE VERMIJDEN OMDAT IK AL EERDER EEN SESSION START HEB GEBRUIKT
           session_regenerate_id();

           $_SESSION["user_id"] = $user["user_id"];

           header("Location: index.php");
           exit;
       } 
    }
    $is_invalid = true;
}


?>

<!DOCTYPE html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <?php
require_once("partials/nav.php");
require_once("partials/head.php");
?>
</head>
<body>


    <div class="msg">
    <?php if ($is_invalid): ?>
        <span style="color: red">Invalid login</span>
    <?php endif; ?>
    </div>
    <form method="post">
    <div class="signupbtn">
    <h1>Login</h1>
    <label class="custom-field">
            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="&nbsp;"
                   value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <span class="placeholder">Email</span>
            </label>
    <label class="custom-field">
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="&nbsp;">  
            <span class="placeholder">Password</span>
            </label>
            <button class="signbtn"><span>Login</span></button>

            <p>Nieuwe klant? <a href="signup.php" style="color:dodgerblue">Meld je aan</a>.</p>
            <br>
            </div>
    </form>


</body>

<?php
require_once("partials/footer.php");
?>
</html>


