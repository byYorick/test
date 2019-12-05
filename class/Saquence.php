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
        $this->log('Добавить элемент в массив', $n);
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
        $this->log("Возрат массива с кол-во элементов {$this->m}", $temp);
        return $temp;
    }

    /**
     *Сортирует массив в порядке убывния
     */
    protected function sort()
    {
        rsort($this->n);
        $this->log("Сортировка массива в порядку убывания", $this->n);
    }

    protected function log($mess, $data)
    {
        $current = '';
        if (file_exists('log/log.txt')) {
            $current = file_get_contents('log/log.txt');
        }

        $current .= date('Y-m-d H:i:s') . ' ' . $mess . "\n" . ' ' . print_r($data, true) . "\n" . '----------' . "\n";
        file_put_contents('log/log.txt', $current);
    }


}