<?php

class CarDto
{
    private $dateOfConstruction;
    private $mileage;

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function getDateOfConstruction(): DateTime
    {
        return $this->dateOfConstruction;
    }
}
