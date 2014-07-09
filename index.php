<?php

require_once 'vendor/autoload.php';

$symbols = array(
    'ZA' => 'audusd',
    'OB' => 'gbpusd',
    'OV' => 'cadusd',
    'ZC' => 'eurusd',
    'OJ' => 'jpyusd',
    'ZN' => 'nzdusd',
    'OF' => 'chfusd',
);
$app = new \Cme\Application();
$app->setTimezone('Europe/Moscow')
    ->setDirectory('data' . DIRECTORY_SEPARATOR . date('Ymd'))
    ->setParser(new \Cme\Parser())
    ->setSymbols($symbols)
    ->setMonth('AUG14');
$app->getMarketData();
$app->run();

