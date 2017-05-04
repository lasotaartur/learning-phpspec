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

    function it_return_true_if_car_has_500_kilometers_of_mileage_or_more()
    {
        $carDto = new CarDto(501, new DateTime());
        $this->predicate($carDto)->shouldReturn(true);

        $carDto = new CarDto(500, new DateTime());
        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_has_less_than_500_kilometers_of_mileage()
    {
        $carDto = new CarDto(499, new DateTime());
        $this->predicate($carDto)->shouldReturn(false);
    }

    function it_return_true_if_car_has_5_years_or_more()
    {
        $dateOfConstructionMore5Years = new DateTime('-1826days');
        $carDto = new CarDto(0, $dateOfConstructionMore5Years);

        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_less_than_5_years(CarDto $carDto)
    {
        $dateOfConstructionMore5Years = new DateTime('-1825days');
        $carDto = new CarDto(0, $dateOfConstructionMore5Years);
        $this->predicate($carDto)->shouldReturn(false);
    }

    function it_return_true_if_car_has_5_years_or_more_through_pass_current_time()
    {
        $this->beConstructedWith(new DateTime('2017-05-05 00:00'));

        $carDto = new CarDto(0, new DateTime('2012-05-05 00:00'));
        $this->predicate($carDto)->shouldReturn(true);

        $carDto = new CarDto(0, new DateTime('2012-05-04 00:00'));
        $this->predicate($carDto)->shouldReturn(true);
    }

    function it_return_false_if_car_less_than_5_years_through_pass_current_time()
    {
        $this->beConstructedWith(new DateTime('2017-05-04 00:00'));

        $carDto = new CarDto(0, new DateTime('2012-05-05 00:00'));
        $this->predicate($carDto)->shouldReturn(false);

        $carDto = new CarDto(0, new DateTime('2012-05-06 00:00'));
        $this->predicate($carDto)->shouldReturn(false);
    }
}
