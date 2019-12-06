<?php


class Sequence
{
    protected $m;
    protected $n = array();

    public function __construct(int $m)
    {
        $this->m = $m;
        Logger::$PATH =  'log';
    }

    /**
     * Добавить числа в массив
     * @param int $n
     */
    public function add(int $n)
    {
        if (count($this->n) < $this->m) {
            $this->n[] = $n;
            Logger::getLogger('sequence')->log("Добавить элемент в массив $n");
        } else {
            $min = min($this->n);
            if ($n > $min) {
                Logger::getLogger('sequence')->log("Заменить элемент массива $min на $n");
                $key = array_search($min, $this->n);
                unset($this->n[$key]);
                $this->n[$key] = $n;
            }
        }

    }

    /**
     * Возратить массив с числами
     * @return array
     */
    public function getMaxNumbers(): array
    {
        return $this->n;
    }

    public function __destruct()
    {
        unset($this->n);
        unset($this->m);
    }
}