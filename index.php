<?php

use Nfq\Demo\Test1;
use Acme\Test2;
use Nfq\Demo\SubClass\AnotherClass;
use Nfq\Demo\SubClass\Sub\AnotherClassSub;
use Acme\Nfq\Demo\SubClass\Sub\AnotherClassSub as OtherPathClass;

require_once "Psr4Autoloader.php";

$autoloader = new Psr4Autoloader();
$autoloader
    ->add('Nfq\\Demo\\', __DIR__.'/src/')
    ->add('Acme\\', __DIR__.'/vendor/acme/')
    ->add('Acme\\Nfq\\Demo\\', __DIR__.'/vendor/OtherPath/src/')
    ->register();

$test1 = new Test1();
$test1->success();
$test2 = new Test2();
$test2->success();
$AnotherClass = new AnotherClass();
$AnotherClass->success();
$AnotherClassSub = new AnotherClassSub();
$AnotherClassSub->success();
$OtherPathClass = new OtherPathClass();
$OtherPathClass->success();
?>