<?php


class Sequence
{
    protected $m;
    protected $n = array();

    public function __construct(int $m)
    {
        $this->m = $m;
    }

    /**
     * Добавить числа в массив
     * @param int $n
     */
    public function add(int $n)
    {
        Log::add('Добавить элемент в массив', $n);
        $this->n[] = $n;
    }

    /**
     * Возратить массив с числами в порядке убывания с кол0во элементов $m
     * @return array
     */
    public function getMaxNumbers(): array
    {
        $this->sort();

        for ($i = 0; $i < $this->m; $i++) {

            $temp[] = array_shift($this->n);
        }
        Log::add("Возрат массива с кол-во элементов {$this->m}", $temp);
        return $temp;
    }

    /**
     *Сортирует массив в порядке убывния
     */
    protected function sort()
    {
        rsort($this->n);
        Log::add("Сортировка массива в порядку убывания", $this->n);
    }



}