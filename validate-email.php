<?php

$PDO = require __DIR__ . "/db.php";

$sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $PDO->real_escape_string($_GET["email"]));

$result = $PDO::query($sql);

$is_available = $result->num_rows === 0;


?>