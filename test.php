<?php
    $PDO = require __DIR__ . "/db.php";
    require "src/class.igdb.php";

    // try {
    //     var_dump(IGDBUtils::authenticate("01skzfa4ayd97n6c1hkob3a2vw9j8c", "2oq86j5151la5mfckm4wcf1du4xgyr"));
    // } catch (Exception $e) {
    //     // something went wrong
    //     echo $e->getMessage();
    // }

    $igdb = new IGDB("01skzfa4ayd97n6c1hkob3a2vw9j8c", "2sutaaqjmyjarukg8j8vwghhnrsqi3");

    // $query = 'search "riot"; fields id,name,cover; limit 250; offset 10;';
    $builder = new IGDBQueryBuilder();
    
    
try {
    // executing the query
    $query = $builder
    // searching for games LIKE uncharted
    ->search("League")
    // we want to see these fields in the results
    ->fields("id, name, cover.image_id")
    // we only need maximum 5 results per query (pagination)
    ->limit(500)
    // we would like to show the third page; fetch the results from the tenth element (pagination)
    ->offset(10)
    // process the configuration and return a string
    ->build();

    $games = $igdb->game($query);

    // showing the results
    // var_dump($games);
} catch (IGDBInvalidParameterException $e) {
    // an invalid parameter is passed to the query builder
    echo $e->getMessage();
} catch (IGDBEnpointException $e) {
    // a non-successful response recieved from the IGDB API
    echo $e->getMessage();
}


foreach ($games as $game => $info) {
    var_dump($info);
    // $cover = $info->cover;
    // echo $cover . "<br>";
    foreach($info as $cover){
        var_dump($cover);
        echo "<br><br>";
        
    }
    // if (property_exists($info, 'genres')) {
    //     foreach ($info->genres as $genre) {
    //         $genre = $genre->cover;
    //         //TODO: meerdere genres meegeven.
    //     }
    // }
    // // $sql = "INSERT game (game_id,naam_game,genre) VALUES (?,?,?)"; // maak sql voor insert
    // // $sel = $PDO->prepare($sql);   // zet sql klaar voor transport
    // // $data = array($id, $name, $genre);   // zet alle data in array 
    // // $sel->execute($data);
}





?>
