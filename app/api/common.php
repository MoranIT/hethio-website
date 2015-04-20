<?php

require_once ('vendor/autoload.php');

global $codes;
$codes[0] = "unknown";
$codes[1] = "david";
$codes[2] = "beta_pi";
$codes[3] = "delta_pi";
$codes[4] = "charlie";
$codes[5] = "martyna";
$codes[6] = "echo_pi";
$codes[7] = "foxtrot_pi";
$codes[8] = "gamma_pi";

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


function fetchResults($sql_query, $json = true) {
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $results  = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbCon = null;
        if (count($results) > 0) {
            if ($json)
                return json_encode($results);
            else return $results;
        } else {
            if ($json)
                return '{"error":{"text":"Invalid Query"}}';
            else return null;
        }
    }
    catch(PDOException $e) {
        return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}



?>