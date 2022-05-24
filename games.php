<?php
require('functions.php');
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
if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['search'])) {
    $fields = "id, name, cover.image_id";
    $games =  IGDBgameController($_POST['search'], $fields);
}
?>

<html>

<head>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="welcome">
        <!-- <?php if (isset($user)) : ?>
    Welcome back <?= htmlspecialchars($user["username"]) ?>
    <?php else : ?>
        <?php endif; ?> -->
    </div>
    <form method="post" action="" name="searchgames">
        <label class="custom-field">
            <span class="placeholder">Search your game</span>
            <input class="input_search" type="text" name="search" id="search" placeholder="&nbsp" ;></input>
            <button type="submit" class="boxbtn" value="search">Search</button>
        </label>
    </form>
    <div class="containerbox">
        <?php if (isset($games)) : ?>
            <?php foreach ($games as $game) : ?>
                <div class="box">
                    <div class="content">
                        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?php echo $game->cover->image_id; ?>.jpg">
                        <p><?php echo $game->name ?></p>
                        <form action="game.php" method="post">
                            <input type="hidden" name="game" id="game" value="<?= $game->name ?>">
                            <input type="submit" class="boxbtn" value="Read more">
                        </form>
                    </div>
            </div>
            <?php endforeach; ?>


        <?php else : ?>

            <?php //TODO: opvulling / DEV:YELSED 
            ?>


        <?php endif; ?>

    </div>

</body>
<?php
require_once("partials/footer.php");
?>

</html>