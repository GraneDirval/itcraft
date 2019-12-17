<?php


namespace App\Tests;


use App\Service\EqualsSourceValidator;
use PHPUnit\Framework\TestCase;

class EqualsSourceValidatorTest extends TestCase
{
    public function testValidateWithExceptions()
    {
        $equalsSourceValidator = new EqualsSourceValidator();

        $source = [];
        $this->expectExceptionMessage('Array must contain at least 2 values');
        $this->expectException(\InvalidArgumentException::class);
        $equalsSourceValidator->validate($source);
    }

    public function testGetEqualsKeysRelativelySumWithTypeException()
    {
        $equalsSourceValidator = new EqualsSourceValidator();

        $source    = [1, 2, 0.8];
        $this->expectException(\UnexpectedValueException::class);
        $equalsSourceValidator->validate($source);
    }
}