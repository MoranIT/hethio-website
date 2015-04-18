<?php

require_once ('vendor/autoload.php');



function getConnection() {
    try {
        $db_username = "hethio";
        if ($_SERVER['HTTP_HOST'] === "heth.io") {
            $db_password = "";
        } else {
            $db_password = "hVXsMBeYPD3T3sq3oPoZRwKTYg";
        }
        $conn = new PDO('mysql:host=hethio.moranit.com;dbname=hethio', $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}


function fetchRows($sql_query) {
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $results  = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbCon = null;
        if (count($results) > 0)
            return json_encode($results);
        else return '{"error":{"text":"Invalid Query"}}';
    }
    catch(PDOException $e) {
        return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}



?>