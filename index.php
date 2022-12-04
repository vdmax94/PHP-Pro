<?php

try {
    $pdo = new PDO(
        "mysql:host=db;dbname=test",
        'root',
        'secret'
    );
} catch (PDOException $exception){
    echo '<pre>'.print_r($exception->getMessage(), true).'</pre>';
    die();
}
?>