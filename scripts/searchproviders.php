<?php

require_once 'helpers.php';
require_once 'DB.php';

if (isset($_POST['city']) && isset($_POST['types'])) {
    $input = clean($_POST);
    
    $city = $input['city'];
    $types = $input['types'];

    $sql = "SELECT * FROM `providers` WHERE city=? AND types=?";
    $stmt = DB::query($sql, [
        $city, $types
    ]);

    $providers = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (count($providers) > 0) {
        echo json_encode($providers);
    } else {
        echo '{"failed": true }';
    }
}
