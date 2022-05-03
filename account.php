<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
  require_once("partials/nav.php");
  require_once("partials/head.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="css/profile.css">
    </head>
<body>

<div class="profilecontainer">
       <div class="pfbox">
           <h1>Your Account</h1>
       <div class="content">
                <td><a class="boxbtnn" href='update.php?id=<?php echo $user['user_id']; ?>'>Edit Your information</a> </td><br>
                <td><a class="boxbtnn" href='delete.php?id=<?php echo $user['user_id']; ?>'>Delete Your Account</a> </td><br>
                <td><a class="boxbtnn" href='update.php?id=<?php echo $user['user_id']; ?>'>Show Your Profile</a> </td><br>
                <td><a class="boxbtnn" href='update.php?id=<?php echo $user['user_id']; ?>'>Show Followers</a> </td>
               </div> 
            </div>
</div>

</body>
<?php
require_once("partials/footer.php");
?>
</html>
