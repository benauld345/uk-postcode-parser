<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testValidPostcodes()
    {
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('EC1A 1BB'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('W1A 0AX'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('M1 1AE'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('B33 8TH'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('CR2 6XH'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('DN55 1PT'));

        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('ec1a 1bb'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('w1a 0ax'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('m1 1ae'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('b33 8th'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('cr2 6xh'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('dn55 1pt'));

        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('ec1a1bb'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('w1a0ax'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('m11ae'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('b338th'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('cr26xh'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('dn551pt'));

        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('EC1A1BB'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('W1A0AX'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('M11AE'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('B338TH'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('CR26XH'));
        $this->assertTrue(\Benauld345\UkPostcodeParser\Validator::check('DN551PT'));
    }

    public function testInvalidPostcodes()
    {
        $this->assertFalse(\Benauld345\UkPostcodeParser\Validator::check('invalid postcode'));
        $this->assertFalse(\Benauld345\UkPostcodeParser\Validator::check('EC1A'));
    }

    public function testSanitize()
    {
        $this->assertEquals('EC1A1BB', \Benauld345\UkPostcodeParser\Validator::sanitize('EC1 A_1B B'));
        $this->assertEquals('EC1A1BB', \Benauld345\UkPostcodeParser\Validator::sanitize('ec1a 1bb'));
    }
}
