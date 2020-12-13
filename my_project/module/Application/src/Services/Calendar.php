<?php
namespace Application\Services;

class Calendar
{
    const DEFAULT_CMD = "cal -y";
    protected $cmd;
    protected $cal = null;

    public function getCalendar(int $year, string $cmd = null)
    {
        $year = $year ?? Date('Y');
        $cmd  = $cmd  ?? self::DEFAULT_CMD;

        if(!$this->cal)
        {
            $cmd .= ' '.$year;
            $cal = shell_exec($cmd);
            $this->cal = $cal;
        }
        return $this->cal;
    }
}