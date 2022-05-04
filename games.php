<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// $sql = "SELECT * FROM game";
// $stmt = $PDO->prepare($sql);
// $stmt->execute();
// $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($games);
  require_once("partials/nav.php");
  require_once("partials/head.php");
if (!isset($_SESSION["user_id"])) {
    header('Location: login.php'); 
    exit;
}
if(isset($_POST['search'])){

    require "src/class.igdb.php";

    $igdb = new IGDB("01skzfa4ayd97n6c1hkob3a2vw9j8c", "2sutaaqjmyjarukg8j8vwghhnrsqi3");

    // $query = 'search "riot"; fields id,name,cover; limit 250; offset 10;';
    $builder = new IGDBQueryBuilder();

    try {
    // executing the query
    $query = $builder
    // searching for games LIKE uncharted
    ->search($_POST['search'])
    // we want to see these fields in the results
    ->fields("id, name, cover.image_id")
    // we only need maximum 5 results per query (pagination)
    ->limit(500)
    // we would like to show the third page; fetch the results from the tenth element (pagination)
    ->offset(10)
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
        <input class="input_search" type="text" name="search" id="search" placeholder="&nbsp";></input>
        <button type="submit" value="search">Search</button>
    </label>
</form>
    <div class="containerbox">
    <?php if(isset( $games)) :?>
        <?php foreach($games as $game) :?>
            <div class="box">
                <div class="content">
                <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?php echo $game->cover->image_id; ?>.jpg"> 
                        <p><?php echo $game->name?></p>
                <a class="boxbtn" href="#">Read more</a>
                </div>
            </div>
        <?php endforeach ; ?>


    <?php else :?>

    <?php //TODO: opvulling / DEV:YELSED ?>


    <?php endif ;?>

    </div>

</body>
<?php
require_once("partials/footer.php");
?>
</html>
