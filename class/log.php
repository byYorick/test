<?php


abstract class log
{
    protected static $current = '';

    public static function add($mess, $data)
    {
        self::dirLog();
        if (file_exists('log/log.txt')) {
            self::$current = file_get_contents('log/log.txt');
        }

        self::$current .= date('Y-m-d H:i:s') . ' ' . $mess . "\n" . ' ' . print_r($data, true) . "\n" . '----------' . "\n";
        file_put_contents('log/log.txt', self::$current);
    }

    protected static function dirLog()
    {
        if(!is_dir('log')){
            mkdir('log');
            return;
        }
        return;
    }
}