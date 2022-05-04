<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo">Tatamoc ;)</a>
        <ul>
            <li><a href="/index.php">Home</a></li>
            <li><a href="/games.php">Games</a></li>
            <li><a href="/test.php">Services</a></li>
            <li><a href="/test.php">Contact</a></li>
            <li class="dropdown">
            <img class="dropbtn" src="img/user.svg">
                <div class="dropdown-content">
                    <?php if (isset($_SESSION["user_id"])) : ?>
                       <a class="sticker-content" href="/account.php">My Account</a>
                       <a class="sticker-content" href="/logout.php">Log out</a>
                    <?php else : ?>
                        <a class="sticker-content" href="/login.php">Login </a>
                        <a class="sticker-content" href="/signup.php">Sign up</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
</nav>
