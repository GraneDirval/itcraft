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
            $equal  = array_search(
                $neededSum - $currentValue,
                array_slice($source, $currentKey + 1, $length, true)
            );

            if (is_int($equal)) {
                $result[] = $equal;
                break;
            }
        }

        if (count($result) < 2) {
            return [];
        }

        return array_values($result);
    }
}