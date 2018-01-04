<?php

namespace Benauld345\UkPostcodeParser;

/**
 * Postcode
 *
 * Parses a given postcode in the constructor and provides methods to extract
 * certain portions of the postcode
 *
 * @author Ben Auld <ben@benauld.com>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
class Postcode
{
    /**
     * Inputted postcode
     *
     * @var string
     * @access private
     */
    private $postcode;

    /**
     * Constructor
     *
     * @param string $postcode The postcode to parse
     * @access public
     * @throws \Exception If the postcode is invalid
     */
    public function __construct($postcode)
    {
        if (!Validator::check($postcode)) {
            throw new \Exception('Invalid Postcode');
        }

        $this->postcode = Validator::sanitize($postcode);
    }

    /**
     * Returns the Outward Code
     *
     * @return string
     * @access public
     */
    public function getOutwardCode()
    {
        return substr($this->postcode, 0, -3);
    }

    /**
     * Returns the Inward Code
     *
     * @return string
     * @access public
     */
    public function getInwardCode()
    {
        return substr($this->postcode, -3);
    }

    /**
     * Returns the Postcode Area
     *
     * @return string
     * @access public
     */
    public function getArea()
    {
        if (ctype_digit(substr($this->postcode, 1, 1))) {
            return substr($this->postcode, 0, 1);
        } else {
            return substr($this->postcode, 0, 2);
        }
    }

    /**
     * Returns the Postcode District
     *
     * @return string
     * @access public
     */
    public function getDistrict()
    {
        $outwardCode = $this->getOutwardCode();

        if (ctype_digit(substr($this->postcode, 1, 1))) {
            return substr($outwardCode, 1);
        } else {
            return substr($outwardCode, 2);
        }
    }

    /**
     * Returns the Postcode Sector
     *
     * @return int
     * @access public
     */
    public function getSector()
    {
        return substr($this->getInwardCode(), 0, 1);
    }

    /**
     * Returns the Postcode Unit
     *
     * @return string
     * @access public
     */
    public function getUnit()
    {
        return substr($this->getInwardCode(), 1, 2);
    }

    /**
     * Returns a formatted Postcode
     *
     * @return string
     * @access public
     */
    public function getFormattedPostcode()
    {
        return sprintf(
            '%s %s',
            $this->getOutwardCode(),
            $this->getInwardCode()
        );
    }
}
