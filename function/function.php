<?php
$digits = function (int $length) {
    while ($length > 0) {
        yield mt_rand(0, 100);
        --$length;
    }
};