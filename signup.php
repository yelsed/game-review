<?php session_start(); ?>
<?php
require_once("partials/nav.php");
require_once("partials/head.php");
?>
<!DOCTYPE html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script> -->
    <!-- <script src="js/validation.js" defer></script> -->
</head>
<body>

<div class="msg">
        <?php
        if (isset($_SESSION['msg'])) {
            $errors = $_SESSION['msg'];
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        }
        ?>
    </div>

   
    
    <form action="process-signup.php" method="post" id="signup">
        <!-- <div class="buttonsbtn">
        <div>
            <label class="customfield" for="name">Name</label>
            <input type="text" id="name" name="name"> 
        </div>

        <div>
            <label for="name">Username</label>
            <input type="text" id="username" name="username"> 
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"> 
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"> 
        </div>

        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"> 
        </div>
    </div> -->
    
    <div class="signupbtn">
    <h1>Signup</h1>

    <p>Please fill in this form to create an account.</p>
    <hr>

    <label class="custom-field">
  <input type="text" id="name" name="name" placeholder="&nbsp;" />
  <span class="placeholder">Name</span>
</label>

<label class="custom-field">
  <input type="text" id="username" name="username" placeholder="&nbsp;"/>
  <span class="placeholder">Username</span>
</label>

<label class="custom-field">
  <input type="email" id="email" name="email"placeholder="&nbsp;"/>
  <span class="placeholder">Email</span>
</label>

<label class="custom-field">
  <input type="password" id="password" name="password" placeholder="&nbsp;"/>
  <span class="placeholder">Password</span>
</label>

<label class="custom-field">
  <input type="password" id="password_confirmation" name="password_confirmation" placeholder="&nbsp;"/>
  <span class="placeholder">Repeat Password</span>
</label>

<label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

<button class="signbtn" ONCLICK="alert('Signup successful.')">Sign up</button> 
    </div>
    </form>
</body>
<?php
require_once("partials/footer.php");
?>
</html>