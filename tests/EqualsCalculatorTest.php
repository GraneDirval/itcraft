<?php


namespace App\Tests;


use App\Service\EqualsCalculator;
use PHPUnit\Framework\TestCase;

class EqualsCalculatorTest extends TestCase
{
    public function testGetEqualsKeysRelativelySum()
    {
        $equalsCalculator = new EqualsCalculator();

        $source    = [3, 4, 2, 8];
        $neededSum = 12;
        $result    = $equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);
        $this->assertEquals([1, 3], $result);

        $neededSum = 11;
        $result    = $equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);
        $this->assertEquals([0, 3], $result);

        $neededSum = 7;
        $result    = $equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);
        $this->assertEquals([0, 1], $result);

        $neededSum = 6;
        $result    = $equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);
        $this->assertEquals([1, 2], $result);

        $neededSum = 0;
        $result    = $equalsCalculator->getEqualsKeysRelativelySum($source, $neededSum);
        $this->assertEquals([], $result);

    }
}