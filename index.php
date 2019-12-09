<?php
$time = microtime(true);
require 'class/Saquence.php';
require 'class/logger.php';
require 'function/function.php';
const PATH = 'log';
$n = 50000;
$m = 50;


$logger = new Logger('sequence');
$sequence = new Sequence($m, $logger);
foreach ($digits($n) as $number) {
    $sequence->add($number);
}


echo '<pre>';
print_r($sequence->getMaxNumbers());
echo '</pre>';

echo (microtime(true)-$time);
