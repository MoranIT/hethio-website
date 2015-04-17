<?php

require_once ('vendor/autoload.php');



function getConnection() {
    try {
        $db_username = "hethio";
        $db_password = "M0r@n!T";
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
        //echo '{"agent": ' . json_encode($agents) . '}';
        return json_encode($results);
    }
    catch(PDOException $e) {
        return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}



?>