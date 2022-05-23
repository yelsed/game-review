<?php

function IGDBgameController($search, $fields)
{
    require "src/class.igdb.php";

    $igdb = new IGDB("01skzfa4ayd97n6c1hkob3a2vw9j8c", "2sutaaqjmyjarukg8j8vwghhnrsqi3");

    // $query = 'search "riot"; fields id,name,cover; limit 250; offset 10;';
    $builder = new IGDBQueryBuilder();

    try {
        // executing the query
        $query = $builder
            // searching for games LIKE uncharted
            ->search($search)
            // we want to see these fields in the results
            ->fields($fields)
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
    return $games;
}