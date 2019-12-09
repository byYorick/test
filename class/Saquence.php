<?php


class Sequence
{
    protected $m;
    protected $n = array();
    protected $logger;

    public function __construct(int $m, Logger $logger)
    {
        $this->logger = $logger;
        $this->m = $m;
    }

    /**
     * Добавить числа в массив
     * @param int $n
     */
    public function add(int $n)
    {
        if (count($this->n) < $this->m) {
            $this->n[] = $n;
            $this->logger->log("Добавить элемент в массив $n");
        } else {
            $min = min($this->n);
            if ($n > $min) {
                $this->logger->log("Заменить элемент массива $min на $n");
                $key = array_search($min, $this->n);
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