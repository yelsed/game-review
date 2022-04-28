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

           $_SESSION["user_id"] = $user["id"];

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Login</h1>

    <?php if ($is_invalid): ?>
        <span style="color: red">Invalid login</span>
    <?php endif; ?>

    <form method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

            <label for="password">Password</label>
            <input type="password" id="password" name="password"> 

            <button>Login</button>
    </form>


</body>
</html>


