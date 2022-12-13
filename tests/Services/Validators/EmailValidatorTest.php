<?php

namespace Tests\Services\Validators;

use App\Services\Validators\EmailValidator;
use Tests\TestCase;

class EmailValidatorTest extends TestCase
{
    public function testValidateEmailSuccess()
    {
        $result = EmailValidator::validateEmail('Example@example.com');
        $this->assertEquals($result, 'Example@example.com');
    }

    public function testValidateEmailFailure()
    {
        $result = EmailValidator::validateEmail('Example@examplecom');
        $this->assertEquals($result, false);
    }
}