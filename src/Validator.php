<?php

namespace Benauld345\UkPostcodeParser;

/**
 * Validator
 *
 * Validator class used for checking syntax of a UK Postcode and that it's valid.
 * Also has a built in sanitize() method to clean the input to strip out any
 * non-alphanumeric characters before validating.
 *
 * @author Ben Auld <ben@benauld.com>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */
class Validator
{
    /**
     * Postcode validation expression
     *
     * @var string
     */
    private static $validPostcode = "/^([Gg][Ii][Rr]0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))[0-9][A-Za-z]{2})$/";

    /**
     * Checks if a postcode is valid
     *
     * @param string $postcode The postcode to check
     * @return bool True if valid, false if invalid
     */
    public static function check($postcode)
    {
        $postcode = self::sanitize($postcode);

        if (strlen($postcode) >= 5 &&
            strlen($postcode) <= 7 &&
            preg_match(self::$validPostcode, $postcode)
        ) {
            return true;
        }

        return false;
    }

    /**
     * Cleans the input and normalizes. Removes non-alphanumeric characters and
     * uppercases the result
     *
     * @param string $postcode Postcode to sanitize
     * @return string
     */
    public static function sanitize($postcode)
    {
        return preg_replace("/[^A-Za-z0-9]/", '', strtoupper($postcode));
    }
}
