<?php

namespace Tests\Services\Validators;

use Tests\TestCase;
use App\Services\Validators\QuantityValidator;

class QuantityValidatorTest extends TestCase
{
    public function testValidateQuantityGivenOneReturnsTrue()
    {
        $result = QuantityValidator::validateQuantity(1);
        $this->assertTrue($result);
    }

    public function testValidateQuantityGivenZeroReturnsFalse()
    {
        $result = QuantityValidator::validateQuantity(0);
        $this->assertFalse($result);
    }

    public function testValidateQuantityGivenArrayReturnsFalse()
    {
        $arr = [];
        $this->expectException(\TypeError::class);
        QuantityValidator::validateQuantity($arr);
    }
}
