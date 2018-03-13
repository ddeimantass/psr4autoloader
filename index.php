<?php

use Nfq\Demo\Test1;
use Acme\Test2;

require_once "Psr4Autoloader.php";

$autoloader = new Psr4Autoloader();
$autoloader
    ->add('Nfq\\Demo\\', __DIR__.'/src/')
    ->add('Acme\\', __DIR__.'/vendor/acme/')
    ->register();

$test1 = new Test1();
$test1->success();
$test2 = new Test2();
$test2->success();

?>