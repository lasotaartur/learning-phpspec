<?php

class TimingBeltReplacementPredicate
{
    private $currentDateTime;

    public function __construct($currentDateTime = null)
    {
        $this->currentDateTime = $currentDateTime ?? new DateTime();
    }


    public function predicate(carDto $carDto): bool
    {
        if ($carDto->getMileage() >= 500) {
            return true;
        }

        $interval = $carDto->getDateOfConstruction()->diff($this->currentDateTime);
        if ($interval->days >= 1826) {
            return true;
        }

        return false;
    }
}
