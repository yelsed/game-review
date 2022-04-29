<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">DesignX</label>
        <ul>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li class="dropdown">
            <img class="dropbtn"src="img/user.svg">
                <div class="dropdown-content">
                    <?php if (isset($user)) : ?>
                        Hello <?= htmlspecialchars($user["naam"]) ?>
                       <a href="logout.php">Log out</a>
                    <?php else : ?>
                        <a class="sticker-content" href="login.php">Login </a>
                        <a class="sticker-content" href="signup.php">Sign up</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
</nav>
