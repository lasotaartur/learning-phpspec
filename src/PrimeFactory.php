<?php

class PrimeFactory
{
    public function generate($number): array
    {
        $result = [];
        for ($candidate = 2; $number > 1; $candidate++) {

            for (; $number % $candidate == 0; $number /= $candidate) {
                $result[] = $candidate;
            }
        }

        return $result;
    }
}
