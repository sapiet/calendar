<?php

class Calendar
{
    /**
     * Les jours de la semaine
     */
    const DAYS = [
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
        'Dimanche',
    ];

    /**
     * Les mois de l'année
     */
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

    /**
     * Initialize un calendrier pour un mois et une année donnée
     * @param int|null $month Le mois, par défaut le mois courant
     * @param int|null $year  L'année, par défaut l'année courante
     */
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

    /**
     * Retourne les jours en version courte
     * @return array Les jours en version courte
     */
    public static function getShortDays(): array
    {
        return array_map(function(string $day) {
            return substr($day, 0, 3);
        }, self::DAYS);
    }

    /**
     * Retourne le mois traduit en français
     * @param  int    $month Le mois
     * @return string        Le mois traduit en français
     * @throws Exception     Si le mois n'existe pas
     */
    public function getTranslatedMonth(int $month): string
    {
        if (!array_key_exists($month - 1, self::MONTHS)) {
            throw new Exception('Mois '.$month.' introuvable');
        }

        return self::MONTHS[$month - 1];
    }

    /**
     * Retourne le jour traduit en français
     * @param  int    $month Le jour
     * @return string        Le jour traduit en français
     * @throws Exception     Si le jour n'existe pas
     */
    public function getTranslatedDay(int $day): string
    {
        if (!array_key_exists($day - 1, self::DAYS)) {
            throw new Exception('Jour '.$day.' introuvable');
        }

        return self::DAYS[$day - 1];
    }

    /**
     * Retourne une chaîne contenant le mois en français et l'année
     * @return string La chaîne contenant le mois en français et l'année
     */
    public function toString(): string
    {
        return $this->getTranslatedMonth($this->month).' '.$this->year;
    }

    /**
     * Retourne le nombre de semaines comprises dans le mois donné
     * @return int Le nombre de semaines
     */
    public function getWeeksCount(): int
    {
        $start = $this->getFirstDay();
        $end = $start->modify('+1 month -1 day');
        $startWeek = intval($start->format('W'));
        $endWeek = intval($end->format('W'));

        if ($endWeek === 1) {
            $endWeek = $end->modify('-7 day')->format('W') + 1;
        }

        $weeksCount = $endWeek - $startWeek + 1;

        if ($weeksCount < 0) {
            $weeksCount = intval($end->format('W'));
        }

        return $weeksCount;
    }

    /**
     * Retourne les informations du jour courant
     * @return stdClass Les informations du jour courant
     */
    public function getCurrentDay(): stdClass
    {
        $date = new DateTime();

        return (object) [
            'day' => $this->getTranslatedDay($date->format('N')),
            'date' => $date->format('j'),
        ];
    }

    /**
     * Retourne le premier jour du mois
     * @return DateTimeInterface Le premier jour du mois
     */
    public function getFirstDay(): DateTimeInterface
    {
        return new DateTimeImmutable($this->year.'-'.$this->month.'-01');
    }

    /**
     * Retourne le lundi précédent le premier jour du mois
     * Ou le premier jour du mois si celui-ci est un lundi
     * @return DateTimeInterface Le lundi
     */
    public function getLastMondayBeforeFirstDay(): DateTimeInterface
    {
        $firstDay = $this->getFirstDay();
        return $firstDay->format('N') === '1' ? $firstDay : $this->getFirstDay()->modify('last monday');
    }

    /**
     * Retourne les semaines du mois
     * @return array Les semaines du mois
     */
    public function get(): array
    {
        $today = date('d-m-Y');
        $firstDay = $this->getFirstDay();
        $month = $firstDay->format('m-Y');
        $lastMondayBeforeFirstDay = $this->getLastMondayBeforeFirstDay();
        $calendar = [];

        for($i = 0; $i < $this->getWeeksCount(); $i++) {
            $week = [];

            foreach (self::DAYS as $j => $day) {
                $date = $lastMondayBeforeFirstDay->modify('+'.($j + $i * 7).' day');

                $week[] = (object) [
                    'isActive' => $date->format('d-m-Y') === $today,
                    'isSameMonth' => $date->format('m-Y') === $month,
                    'date' => $date->format('j'),
                ];
            }

            $calendar[] = $week;
        }

        return $calendar;
    }

    /**
     * Retourne le mois précédent
     * @return stdClass Le mois précédent
     */
    public function getPreviousMonth(): stdClass
    {
        return (object) [
            'month' => $this->month <= 1 ? 12 : $this->month - 1,
            'year' => $this->month <= 1 ? $this->year - 1 : $this->year,
        ];
    }

    /**
     * Retourne le mois suivant
     * @return stdClass Le mois suivant
     */
    public function getNextMonth(): stdClass
    {
        return (object) [
            'month' => $this->month >= 12 ? 1 : $this->month + 1,
            'year' => $this->month >= 12 ? $this->year + 1 : $this->year,
        ];
    }
}
