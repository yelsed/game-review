<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetchAll();
}
  require_once("partials/nav.php");
  require_once("partials/head.php");

if(!empty($_POST["submit"])) {
	$pdo_statement=$pdo->prepare("delete from user  where user_id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
        session_destroy();
		header('location:index.php');
	}
}
// $pdo_statement = $pdo->prepare("SELECT * FROM user where user_id=" . $_GET["id"]);
// $pdo_statement->execute();
// $result = $pdo_statement->fetchAll();
?>

<html>
    <head>
    <link rel="stylesheet" href="css/profile.css">
    </head>
<body>

<div class="profilecontainer">
       <div class="pfbox">
       <div class="content">
       <form method="post" id="signup">
    
    <div class="signupbtn">
    <h1>Are you sure you want to delete this account.</h1>


<button type="submit" class="signbtn" value="save" name="submit" style="background-color:red;"><span>Delete</span></button>
    </div>
    </form>
            </div>
        </div>
</div>

</body>
<?php
require_once("partials/footer.php");
?>
</html>
