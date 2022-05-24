<?php
session_start();
require('functions.php');
if (isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['game'])) {
    $fields = "id, name, summary, cover.image_id, genres.name";
    $games = IGDBgameController('Hollow Knight', $fields);
}
require_once("partials/nav.php");
require_once("partials/head.php");
?>

<html>

<head>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="gamecontainerbox">
        <?php if (isset($games)) : ?>
            <?php foreach ($games as $game) : ?>
                <?php if ($game->name === $_POST['game']) : ?>
                    <div class="gamebox">
                        <div class="gamecontent">
                            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?php echo $game->cover->image_id; ?>.jpg">
                            <h1><?php echo $game->name ?></h1>
                            <p>Genres</p>
                            <?php
                            foreach ($game->genres as $genres => $genre) {
                                if ($genres === array_key_last($game->genres)) {
                                    echo $genre->name;
                                } else {
                                    echo $genre->name . ", ";
                                }
                            }
                            ?>
                            <p><?php echo $game->summary ?></p>

                        </div>
                        <div class="gamecontent">
                            <!-- <div class="score"> -->
                            <h1>Critics</h1>
                            <div class="score">
                                <div class="scoreBall">10</div>
                                <p>vehicula. Suspendisse sit amet eros porttitor, accumsan ex non, egestas eros.
                                    Etiam bibendum rutrum efficitur. Ut dictum lacus ielementum convallis.
                                    Nullam mattis fringilla consequat. Cras luctus porttitor lectus.
                                    Suspendisse scelerisque non dui quis rhoncus. Integer tempus qui
                                </p>
                            </div>
                            <div class="smallReview">
                                <img class="userIMG" src="donnie.png" alt="user" />
                                <p>laoreet mi, sed tristique dui. Suspendisse scelerisque elementum convallis.
                                    Nullam mattis fringilla consequat. Cras luctus porttitor lectus.
                                    Suspendisse scelerisque non dui quis rhoncus. Integer tempus qui
                                    <span class="more" href="#">Read more</span>
                                </p>
                            </div>

                            <h1>Users</h1>
                            <div class="scoreBall">9.3</div>
                            <p>vehicula. Suspendisse sit amet eros porttitor, accumsan ex non, egestas eros.
                                Etiam bibendum rutrum efficitur. Ut dictum lacus ielementum convallis.
                                Nullam mattis fringilla consequat. Cras luctus porttitor lectus.
                                Suspendisse scelerisque non dui quis rhoncus. Integer tempus qui</p>
                            <div class="smallReview">
                                <img class="userIMG" src="donnie.png" alt="user" />
                                <p>laoreet mi, sed tristique dui. Suspendisse scelerisque elementum convallis.
                                    Nullam mattis fringilla consequat. Cras luctus porttitor lectus.
                                    Suspendisse scelerisque non dui quis rhoncus. Integer tempus qui
                                    <span class="more" href="#">Read more</span>
                                </p>
                            </div>
                            <button class="btn">Make your own review</button>
                            <!-- </div> -->
                        </div>
                    </div>
                <?php endif; ?>
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