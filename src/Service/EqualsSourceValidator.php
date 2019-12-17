<?php


namespace App\Service;


class EqualsSourceValidator
{
    /**
     * @param array $source
     */
    public function validate(array $source): void
    {
        $length = count($source);

        if ($length < 2) {
            throw new \InvalidArgumentException('Array must contain at least 2 values');
        }

        array_walk($source, function ($value) {
            if (!is_int($value)) {
                throw new \UnexpectedValueException('Value must be integer');
            }
        });
    }
}