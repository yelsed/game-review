<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script> -->
    <script src="js/validation.js" defer></script>
</head>
<body>

    <h1>Signup</h1>
    
    <span style="color: red">
        <?php
        if (isset($_SESSION['msg'])) {
            $errors = $_SESSION['msg'];
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        }
        ?>
    </span>
    
    <form action="process-signup.php" method="post" id="signup" >
        <div>
            <label for="name">Name</label>
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

        <button>Sign up</button>
    </form>

</body>

</html>