<?php

class Logger
{
    //статические переменные
    public static $PATH = PATH;
    protected static $loggers = array();

    protected $name;
    protected $file;
    protected $fp;

    public function __construct($name, $file = null)
    {
        $this->name = $name;
        $this->file = $file;

        $this->open();
    }

    /**
     *Создать или открыть файл для записи
     */
    public function open()
    {
        if (self::$PATH == null) {
            return;
        }

        $this->fp = fopen($this->file == null ? self::$PATH . '/' . $this->name . '.log' : self::$PATH . '/' . $this->file, 'a+');
    }

    /**
     * Создать или получить логер
     * @param string $name
     * @param string null $file
     * @return Logger
     */
    public static function getLogger($name = 'root', $file = null)
    {
        if (!isset(self::$loggers[$name])) {
            self::$loggers[$name] = new Logger($name, $file);
        }

        return self::$loggers[$name];
    }

    /**
     * форматировать строку и записать
     * @param mixed $message
     */
    public function log($message)
    {
        if (!is_string($message)) {
            $this->logPrint($message);

            return;
        }

        $log = '';

        $log .= '[' . date('D M d H:i:s Y', time()) . '] ';
        if (func_num_args() > 1) {
            $params = func_get_args();

            $message = call_user_func_array('sprintf', $params);
        }

        $log .= $message;
        $log .= "\n";

        $this->_write($log);
    }

    /**
     * Преобразовать массив или обьект в строку
     * @param mixed $obj
     */
    public function logPrint($obj)
    {
        ob_start();

        print_r($obj);

        $ob = ob_get_clean();
        $this->log($ob);
    }

    /**
     *  Записать строку в файл
     * @param string $string
     */
    protected function _write($string)
    {
        fwrite($this->fp, $string);

        //echo $string;
    }

    public function __destruct()
    {
        fclose($this->fp);
    }
}