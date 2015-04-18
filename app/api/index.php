<?php
/**
 * http://www.phpgang.com/how-to-create-restful-api-webservice-with-slim-php-and-mysql_588.html
 * http://www.slimframework.com/
 */
require_once ("common.php");

$app = new \Slim\Slim();

$app->get('/raw', 'getRaw');
$app->get('/raw/:id', 'getRaw');
function getRaw($id = null) {
    $sql_query = "select * FROM raw";
    if (!is_null($id)) $sql_query .= " WHERE id='".$id."'";
    echo fetchRows($sql_query);
}

$app->get('/agent', 'getAgent');
$app->get('/agent/:agent', 'getAgent');
$app->get('/agent/:agent/:id', 'getAgent');
function getAgent($agent = null, $id = null) {
    $sql_query = "select * FROM agent";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    if (!is_null($agent) && !is_null($id)) $sql_query .= " AND id='".$id."'";
    echo fetchRows($sql_query);
}

$app->get('/agentstatus', 'getAgentStatus');
$app->get('/agentstatus/:agent', 'getAgentStatus');
function getAgentStatus($agent = null) {
    $sql_query = "select a.* from agent a inner join ( select max(timestamp) timestamp, agent from agent where status like 'daemon%'";
    if (!is_null($agent)) $sql_query .= " AND agent='".$agent."'";
    $sql_query .= " group by agent) j on a.agent=j.agent and a.timestamp=j.timestamp order by a.agent";
    echo fetchRows($sql_query);
}





$app->get('/speedtest', 'getSpeedTest');
$app->get('/speedtest/:agent', 'getSpeedTest');
$app->get('/speedtest/:agent/:id', 'getSpeedTest');
function getSpeedTest($agent = null, $id = null) {
    $sql_query = "select * FROM speedtest";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    if (!is_null($agent) && !is_null($id)) $sql_query .= " AND id='".$id."'";
    echo fetchRows($sql_query);
}

$app->get('/fail2ban', 'getFail2Ban');
$app->get('/fail2ban/:agent', 'getFail2Ban');
$app->get('/fail2ban/:agent/:id', 'getFail2Ban');
function getFail2Ban($agent = null, $id = null) {
    $sql_query = "select * FROM fail2ban";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    if (!is_null($agent) && !is_null($id)) $sql_query .= " AND id='".$id."'";
    echo fetchRows($sql_query);
}

$app->get('/heartbeat', 'getHeartbeat');
$app->get('/heartbeat/:agent', 'getHeartbeat');
$app->get('/heartbeat/:agent/:id', 'getHeartbeat');
function getHeartbeat($agent = null, $id = null) {
    $sql_query = "select * FROM heartbeat";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    if (!is_null($agent) && !is_null($id)) $sql_query .= " AND id='".$id."'";
    echo fetchRows($sql_query);
}

$app->get('/logged_in_users', 'getLoggedInUsers');
$app->get('/logged_in_users/:agent', 'getLoggedInUsers');
$app->get('/logged_in_users/:agent/:id', 'getLoggedInUsers');
function getLoggedInUsers($agent = null, $id = null) {
    $sql_query = "select * FROM logged_in_users";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    if (!is_null($agent) && !is_null($id)) $sql_query .= " AND id='".$id."'";
    echo fetchRows($sql_query);
}



$app->run();
