<?php
require_once "./vendor/autoload.php";
require './BaseMongoDB.php';


$db = new BaseMongoDB('cola','items');

$db->insert(1,'ivan');
$db->insert(2,'ivan');
$db->insert(3,'pablo');
$db->insert(5,'chachara');
$db->insert(6,'leo');
$db->insert(7,'daniel');
$db->insert(8,'matias');
$db->insert(4,'chachara');
$db->insert(3,'dario');

$db->update(3,'mauro');

$db->drop();
//$db->get(11);


$db->update(5,'seba');

$db->delete(8);



