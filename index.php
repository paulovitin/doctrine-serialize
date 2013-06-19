<?php
require 'bootstrap.php';

$bar = $em->find('Bar', 1);
$foo = $bar->getFoo();

var_dump($foo->getId()); //retorna 1
echo "\n";

$foo_serial = serialize($foo);
$foo = unserialize($foo_serial);

echo "\n";
var_dump($foo->getId()); //retorna 0
