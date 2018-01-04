<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PostcodeTest extends TestCase
{
    public function testCanBeCreatedFromValidPostcode()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('AA99 9AA');
        $this->assertTrue(is_object($postcode));
        unset($postcode);
    }

    public function testInvalidPostcode()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Postcode');

        $postcode = new Benauld345\UkPostcodeParser\Postcode('invalid postcode');

        unset($postcode);
    }

    public function testPostcode1()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('ec1a1bb');

        $this->assertEquals('EC1A', $postcode->getOutwardCode());
        $this->assertEquals('1BB', $postcode->getInwardCode());
        $this->assertEquals('EC', $postcode->getArea());
        $this->assertEquals('1A', $postcode->getDistrict());
        $this->assertEquals('1', $postcode->getSector());
        $this->assertEquals('BB', $postcode->getUnit());
        $this->assertEquals('EC1A 1BB', $postcode->getFormattedPostcode());

        unset($postcode);
    }

    public function testPostcode2()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('w1a0ax');

        $this->assertEquals('W1A', $postcode->getOutwardCode());
        $this->assertEquals('0AX', $postcode->getInwardCode());
        $this->assertEquals('W', $postcode->getArea());
        $this->assertEquals('1A', $postcode->getDistrict());
        $this->assertEquals('0', $postcode->getSector());
        $this->assertEquals('AX', $postcode->getUnit());
        $this->assertEquals('W1A 0AX', $postcode->getFormattedPostcode());

        unset($postcode);
    }

    public function testPostcode3()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('m11ae');

        $this->assertEquals('M1', $postcode->getOutwardCode());
        $this->assertEquals('1AE', $postcode->getInwardCode());
        $this->assertEquals('M', $postcode->getArea());
        $this->assertEquals('1', $postcode->getDistrict());
        $this->assertEquals('1', $postcode->getSector());
        $this->assertEquals('AE', $postcode->getUnit());
        $this->assertEquals('M1 1AE', $postcode->getFormattedPostcode());

        unset($postcode);
    }

    public function testPostcode4()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('b338th');

        $this->assertEquals('B33', $postcode->getOutwardCode());
        $this->assertEquals('8TH', $postcode->getInwardCode());
        $this->assertEquals('B', $postcode->getArea());
        $this->assertEquals('33', $postcode->getDistrict());
        $this->assertEquals('8', $postcode->getSector());
        $this->assertEquals('TH', $postcode->getUnit());
        $this->assertEquals('B33 8TH', $postcode->getFormattedPostcode());

        unset($postcode);
    }

    public function testPostcode5()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('cr26xh');

        $this->assertEquals('CR2', $postcode->getOutwardCode());
        $this->assertEquals('6XH', $postcode->getInwardCode());
        $this->assertEquals('CR', $postcode->getArea());
        $this->assertEquals('2', $postcode->getDistrict());
        $this->assertEquals('6', $postcode->getSector());
        $this->assertEquals('XH', $postcode->getUnit());
        $this->assertEquals('CR2 6XH', $postcode->getFormattedPostcode());

        unset($postcode);
    }

    public function testPostcode6()
    {
        $postcode = new Benauld345\UkPostcodeParser\Postcode('dn551pt');

        $this->assertEquals('DN55', $postcode->getOutwardCode());
        $this->assertEquals('1PT', $postcode->getInwardCode());
        $this->assertEquals('DN', $postcode->getArea());
        $this->assertEquals('55', $postcode->getDistrict());
        $this->assertEquals('1', $postcode->getSector());
        $this->assertEquals('PT', $postcode->getUnit());
        $this->assertEquals('DN55 1PT', $postcode->getFormattedPostcode());

        unset($postcode);
    }
}
