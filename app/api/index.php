<?php
/**
 * http://www.phpgang.com/how-to-create-restful-api-webservice-with-slim-php-and-mysql_588.html
 * http://www.slimframework.com/
 */
require_once ("common.php");



function getRaw($id = null) {
    $sql_query = "select * FROM raw";
    if (!is_null($id)) $sql_query .= " WHERE id='".$id."'";
    echo fetchRows($sql_query);
}

function getAgent($agent = null) {
    $sql_query = "select * FROM agent";
    if (!is_null($agent)) $sql_query .= " WHERE agent='".$agent."'";
    echo fetchRows($sql_query);
}






$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/agent', 'getAgent');
$app->get('/agent/:agent', 'getAgent');

$app->get('/raw', 'getRaw');
$app->get('/raw/:id', 'getRaw');


$app->run();
