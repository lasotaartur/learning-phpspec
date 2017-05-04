<?php

class CarDto
{
    private $dateOfConstruction;
    private $mileage;

    public function __construct(int $mileage, DateTime $dateOfConstruction)
    {
        $this->mileage = $mileage;
        $this->dateOfConstruction = $dateOfConstruction;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function getDateOfConstruction(): DateTime
    {
        return $this->dateOfConstruction;
    }
}
