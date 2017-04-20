<?php

namespace spec;

use CarDto;
use DateTime;
use PhpSpec\ObjectBehavior;
use TimingBeltReplacementPredicate;

class TimingBeltReplacementPredicateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TimingBeltReplacementPredicate::class);
    }

    function it_return_true_if_car_has_500_kilometers_of_mileage_or_more(CarDto $carDto)
    {
        $carDto->getMileage()->willReturn(500);

        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_has_less_than_500_kilometers_of_mileage(CarDto $carDto)
    {
        $carDto->getMileage()->willReturn(499);
        $carDto->getDateOfConstruction()->willReturn(new DateTime());

        $this->predicate($carDto)->shouldReturn(false);
    }

    function it_return_true_if_car_has_5_years_or_more(CarDto $carDto)
    {
        $carDto->getMileage()->willReturn(0);
        $dateOfConstructionMore5Years = new DateTime('-1826days');
        $carDto->getDateOfConstruction()->willReturn($dateOfConstructionMore5Years);

        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_less_than_5_years(CarDto $carDto)
    {
        $carDto->getMileage()->willReturn(0);
        $dateOfConstructionMore5Years = new DateTime('-1825days');
        $carDto->getDateOfConstruction()->willReturn($dateOfConstructionMore5Years);

        $this->predicate($carDto)->shouldReturn(false);
    }

    function it_return_true_if_car_has_5_years_or_more_through_pass_current_time(CarDto $carDto)
    {
        $this->beConstructedWith(new DateTime('2012-04-20 00:00'));

        $carDto->getMileage()->willReturn(0);
        $carDto->getDateOfConstruction()->willReturn(new DateTime('2017-04-20 00:00'));

        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_less_than_5_years_through_pass_current_time(CarDto $carDto)
    {
        $this->beConstructedWith(new DateTime('2012-04-20 00:00'));

        $carDto->getMileage()->willReturn(0);
        $carDto->getDateOfConstruction()->willReturn(new DateTime('2017-04-19 00:00'));

        $this->predicate($carDto)->shouldReturn(false);
    }
}
