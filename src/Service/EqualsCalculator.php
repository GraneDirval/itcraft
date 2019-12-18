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
        foreach ($source as $currentKey => $currentValue) {
            $equal = array_search(
                $neededSum - $currentValue,
                array_slice($source, $currentKey + 1, count($source), true)
            );

            if (is_int($equal)) {
                return [$currentKey, $equal];
            }
        }

        return [];
    }
}