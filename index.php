<?php
require 'class/Saquence.php';
require 'class/logger.php';
require 'function/function.php';

$n = 20;
$m = 12;

$sequence = new Sequence($m);
foreach ($digits($n) as $number) {
    $sequence->add($number);
}

echo '<pre>';
print_r($sequence->getMaxNumbers());
echo '</pre>';


