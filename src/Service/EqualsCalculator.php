<?php


namespace App\Service;


class EqualsCalculator
{
    /**
     * @param array $source
     * @param int   $neededSum
     *
     * @return array
     */
    public function getEqualsKeysRelativelySum(array $source, int $neededSum): array
    {
        $length = count($source);

        foreach ($source as $currentKey => $currentValue) {


            $result = [$currentKey];
            $result += array_flip(array_filter(
                array_slice($source, $currentKey + 1, $length, true),
                function ($value) use ($currentValue, $neededSum) {
                    return ($currentValue + $value) == $neededSum;
                }
            ));

            if (count($result) == 2) { // also can use while() construction instead foreach() to avoid this if()
                break;
            }
        }

        if (count($result) < 2) {
            return [];
        }

        return array_values($result);
    }
}