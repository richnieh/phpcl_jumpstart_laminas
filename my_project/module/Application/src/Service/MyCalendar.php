<?php
namespace Application\Service;

class MyCalendar{
    const DEFAULT_CMD = 'cal -y';
    protected $cmd;
    protected $cal = NULL;

    public function getCalendar(int $year = NULL, string $cmd = NULL)
    {
        $year = $year ?? date('Y');
        $cmd  = $cmd ?? self::DEFAULT_CMD;

        if(!$this->cal){
            $cmd .= ' '.$year;
            $cal = shell_exec($cmd);
            $this->cal = $cal;
        }
        return $this->cal;
    }
}