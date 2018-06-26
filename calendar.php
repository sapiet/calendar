<?php

ini_set('display_errors', 1);

const DAYS = [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche',
];

const MONTHS = [
    'Janvier',
    'Février',
    'Mars',
    'Avril',
    'Mai',
    'Juin',
    'Juillet',
    'Août',
    'Septembre',
    'Octobre',
    'Novembre',
    'Décembre',
];

class Calendar
{
    public function __construct(int $month = null, int $year = null)
    {
        if (is_null($month)) {
            $month = intval(date('m'));
        }

        if (is_null($year)) {
            $year = intval(date('Y'));
        }

        $this->month = $month;
        $this->year = $year;
    }

    public function toString()
    {
        return MONTHS[$this->month - 1].' '.$this->year;
    }

    public function getWeeksCount()
    {
        $start = $this->getFirstDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeksCount = intval($end->format('W')) - intval($start->format('W')) + 1;

        if ($weeksCount < 0) {
            $weeksCount = intval($start->format('W'));
        }

        return $weeksCount;
    }

    public function getCurrentDay()
    {
        $date = new DateTime();

        return (object) [
            'day' => DAYS[intval($date->format('N')) - 1],
            'date' => $date->format('j'),
        ];
    }

    public function getFirstDay()
    {
        return new DateTime($this->year.'-'.$this->month.'-01');
    }

    public function getLastMondayBeforeFirstDay()
    {
        return $this->getFirstDay()->modify('last monday');
    }

    public function get()
    {
        $today = date('d-m-Y');
        $firstDay = $this->getFirstDay();
        $month = $firstDay->format('m-Y');
        $lastMondayBeforeFirstDay = $this->getLastMondayBeforeFirstDay();
        $calendar = [];

        for($i = 0; $i < $this->getWeeksCount(); $i++) {
            $week = [];

            foreach (DAYS as $j => $day) {
                $date = (clone $lastMondayBeforeFirstDay)->modify('+'.($j + $i * 7).'days');

                $week[] = (object) [
                    'isActive' => $date->format('d-m-Y') === $today,
                    'isSameMonth' => $date->format('m-Y') === $month,
                    'date' => $date
                ];
            }

            $calendar[] = $week;
        }

        return $calendar;
    }

    public function getPreviousMonth()
    {
        return (object) [
            'month' => $this->month <= 1 ? 12 : $this->month - 1,
            'year' => $this->month <= 1 ? $this->year - 1 : $this->year,
        ];
    }

    public function getNextMonth()
    {
        return (object) [
            'month' => $this->month >= 12 ? 1 : $this->month + 1,
            'year' => $this->month >= 12 ? $this->year + 1 : $this->year,
        ];
    }
}
