<?php

require __DIR__ . '/vendor/autoload.php';

//use Monolog\Logger as L;
//use Monolog\Handler\StreamHandler;
use BeholderHive\CursoSON\Hello;

// create a log channel
//$log = new L('name');
//$log->pushHandler(new StreamHandler('app.log', L::WARNING));
$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

// add records to the log
$log->warning((new Hello)->say('Maxwel'));
