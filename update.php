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
    $user_id = $user['user_id'];

}
  require_once("partials/nav.php");
  require_once("partials/head.php");

if(!empty($_POST["submit"])) {
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT username, email FROM `user` WHERE username=?  OR email=?";
  $stmt = $PDO->prepare($sql);
  $stmt->execute([$_POST["username"], $_POST["email"]]);
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if(!$row['username'] == $result[0]['username']){
      if ($row['username'] === $_POST["username"]) {
          $errors[] = "Username is taken";
      }
    }
    if(!$row['email'] == $result[0]['email']){
      if ($row['email'] === $_POST["email"]) {
          $errors[] = "Email is taken";
      }
    }
  }
  if ($errors) {
    $_SESSION['msg1'] = $errors;
    var_dump($_SESSION['msg1']);
    header( "Location: update.php?id=$user_id" );
    die;
}

	$pdo_statement=$pdo->prepare("update user set naam='" . $_POST[ 'naam' ] . "', username='" . $_POST[ 'username' ]. "', email='" . $_POST[ 'email' ]. "' where user_id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
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
<div class="msg">
        <?php
        if (isset($_SESSION['msg1'])) {
          var_dump($_SESSION['msg1']);
echo "<br>";
            $errors = $_SESSION['msg1'];
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        }
        ?>
    </div>
<div class="profilecontainer">
  <div class="pfbox">
    <div class="content">
      <form method="post" id="signup">
        <div class="signupbtn">
          <h1>You can implement alterations to your account information here.</h1>
          <label class="custom-field">
            <input type="text" id="naam" name="naam" value="<?php echo $result[0]['naam']; ?>" required placeholder="&nbsp;" />
            <span class="placeholder">Name</span>
          </label>

          <label class="custom-field">
            <input type="text" id="username" name="username" value="<?php echo $result[0]['username']; ?>" required placeholder="&nbsp;"/>
            <span class="placeholder">Username</span>
          </label>

          <label class="custom-field">
            <input type="email" id="email" name="email" value="<?php echo $result[0]['email']; ?>" required placeholder="&nbsp;"/>
            <span class="placeholder">Email</span>
          </label>

          <button type="submit" class="signbtn" value="save" name="submit"><span>Update</span></button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<?php
require_once("partials/footer.php");
unset($_SESSION['msg1']);

?>
</html>
