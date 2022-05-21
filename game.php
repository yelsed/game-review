<?php
session_start();
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
    require "src/class.igdb.php";

    $igdb = new IGDB("01skzfa4ayd97n6c1hkob3a2vw9j8c", "2sutaaqjmyjarukg8j8vwghhnrsqi3");

    // $query = 'search "riot"; fields id,name,cover; limit 250; offset 10;';
    $builder = new IGDBQueryBuilder();

    try {
        // executing the query
        $query = $builder
            // searching for games LIKE uncharted
            ->search($_POST['game'])
            // we want to see these fields in the results
            ->fields("id, name, summary, cover.image_id, genres.name")
            // we only need maximum 5 results per query (pagination)
            ->limit(500)
            // we would like to show the third page; fetch the results from the tenth element (pagination)
            ->offset(0)
            // process the configuration and return a string
            ->build();

        $games = $igdb->game($query);
        // return $games;
        // showing the results
        // var_dump($games);
    } catch (IGDBInvalidParameterException $e) {
        // an invalid parameter is passed to the query builder
        echo $e->getMessage();
    } catch (IGDBEnpointException $e) {
        // a non-successful response recieved from the IGDB API
        echo $e->getMessage();
    }
}
require_once("partials/nav.php");
require_once("partials/head.php");
?>

<html>

<head>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="containerbox">
        <?php if (isset($games)) : ?>
            <?php foreach ($games as $game) : ?>
                <?php if ($game->name === $_POST['game']) : ?>
                    <div class="box">
                        <div class="content">
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