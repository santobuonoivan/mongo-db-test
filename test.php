<?php

require './BaseDeDatos.php';


$db = new BaseMongoDB;

$db->insert(1,'ivan');
$db->insert(2,'ivan');
$db->insert(3,'pablo');
$db->insert(5,'chachara');
$db->insert(6,'leo');
$db->insert(7,'daniel');
$db->insert(8,'matias');
$db->insert(4,'chachara');
$db->insert(3,'dario');

$db->update(1,'mauro');

//$db->get(11);

$db->delete(8);

$db->update(3,'seba');




