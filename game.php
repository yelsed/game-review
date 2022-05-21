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
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mi dolor, feugiat eu consequat nec, elementum id nibh. Proin aliquam elit sed enim molestie ultrices. Sed lorem felis, mollis vel ornare eget, volutpat a odio. Quisque vitae enim non libero vestibulum porttitor id et urna. Quisque non purus venenatis, porta neque sit amet, fringilla nulla. Sed congue varius vehicula. Suspendisse sit amet eros porttitor, accumsan ex non, egestas eros. Etiam bibendum rutrum efficitur. Ut dictum lacus in tellus euismod molestie. Etiam semper dignissim risus sit amet ornare. Etiam id bibendum neque. Phasellus nibh risus, vestibulum eu urna eu, sagittis mattis nibh. Pellentesque faucibus dolor lorem, et elementum lorem finibus nec. Morbi et augue commodo, vehicula justo sed, molestie dui.

Pellentesque vehicula scelerisque ultrices. Praesent a laoreet mi, sed tristique dui. Suspendisse scelerisque elementum convallis. Nullam mattis fringilla consequat. Cras luctus porttitor lectus. Suspendisse scelerisque non dui quis rhoncus. Integer tempus quis augue eu auctor. Pellentesque sagittis suscipit massa, facilisis semper lectus elementum vitae. Sed quis lacinia elit. Integer scelerisque finibus neque. Nulla tincidunt suscipit eros eget placerat. Mauris placerat elit sit amet felis aliquam, vitae tempor libero dignissim. Praesent cursus massa ante, et tincidunt velit venenatis ac. Quisque congue convallis massa, at consequat lectus efficitur eget. Morbi eu massa nulla.

Suspendisse vel lorem ultricies, sollicitudin nisl vitae, accumsan eros. In sed elementum massa. Suspendisse potenti. Cras sapien turpis, molestie a porttitor et, blandit at erat. Vestibulum scelerisque arcu metus, sed suscipit mi aliquet vel. Maecenas in ante lectus. Maecenas sed nunc tellus. Quisque justo leo, cursus quis urna sit amet, ullamcorper efficitur nisl. Nam laoreet vulputate felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

Sed iaculis mauris in sapien auctor dapibus. Nullam elementum mauris vitae nulla vehicula, ut pellentesque arcu euismod. Suspendisse eu purus ac sapien cursus vestibulum. Etiam a sapien ultricies, ullamcorper metus at, commodo arcu. Fusce sed neque quis velit blandit gravida. Nunc dapibus urna ut luctus facilisis. Nullam a odio mollis est convallis interdum. Quisque massa arcu, rhoncus auctor cursus nec, euismod at erat. Vestibulum vel pellentesque erat, ac consequat justo. Donec ultricies, lectus nec tincidunt cursus, quam eros ultrices magna, quis commodo sapien lacus in felis. Morbi tristique augue libero, non tristique nibh accumsan egestas. Donec mi urna, pellentesque quis iaculis ut, lobortis ut felis. Vivamus dignissim, eros sit amet molestie suscipit, ligula lacus scelerisque leo, sit amet rutrum lorem ex at sem. Integer id ex est.

Integer tempus nibh nec commodo viverra. Integer sit amet est vitae nibh euismod pretium. Vestibulum id eleifend lorem. Aenean interdum arcu vitae dui pulvinar lacinia. Vivamus aliquam cursus sem in maximus. Sed gravida varius vestibulum. Nulla facilisi. Praesent consectetur, sem ac fermentum elementum, dolor lorem ultricies nulla, sed accumsan lacus nibh sit amet mauris. Maecenas sit amet sem risus. Nam id purus vitae diam convallis luctus. Mauris eget tellus sit amet ex suscipit luctus. Nunc vitae hendrerit magna.
                            </p>
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