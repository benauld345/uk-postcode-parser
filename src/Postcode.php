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
     * Mainland prefixes
     *
     * @var array
     */
    private $ukMainlandPrefixes = [
        'AL', 'B1', 'B10', 'B11', 'B12', 'B13', 'B14', 'B15', 'B16', 'B17',
        'B18', 'B19', 'B2', 'B20', 'B21', 'B22', 'B23', 'B24', 'B25', 'B26',
        'B27', 'B28', 'B29', 'B3', 'B30', 'B31', 'B32', 'B33', 'B34', 'B35',
        'B36', 'B37', 'B38', 'B39', 'B4', 'B40', 'B41', 'B42', 'B43', 'B44',
        'B45', 'B46', 'B47', 'B48', 'B49', 'B5', 'B50', 'B51', 'B52', 'B53',
        'B54', 'B55', 'B56', 'B57', 'B58', 'B59', 'B6', 'B60', 'B61', 'B62',
        'B63', 'B64', 'B65', 'B66', 'B67', 'B68', 'B69', 'B7', 'B70', 'B71',
        'B72', 'B73', 'B74', 'B75', 'B76', 'B77', 'B78', 'B79', 'B8', 'B80',
        'B81', 'B82', 'B83', 'B84', 'B85', 'B86', 'B87', 'B88', 'B89', 'B9',
        'B90', 'B91', 'B92', 'B93', 'B94', 'B95', 'B96', 'B97', 'B98', 'B99',
        'BA', 'BB', 'BD', 'BH', 'BL', 'BN', 'BR', 'BS', 'CA', 'CB', 'CF',
        'CH', 'CM', 'CO', 'CR', 'CT', 'CV', 'CW', 'DA', 'DD', 'DE', 'DG',
        'DH', 'DL', 'DN', 'DT', 'DY', 'E1', 'E10', 'E11', 'E12', 'E13', 'E14',
        'E15', 'E16', 'E17', 'E18', 'E19', 'E2', 'E20', 'E3', 'E4', 'E5',
        'E6', 'E7', 'E8', 'E9', 'EC', 'EH', 'EN', 'EX', 'FY', 'FY', 'G1',
        'GL', 'GU', 'HA', 'HD', 'HG', 'HP', 'HR', 'HU', 'HX', 'IG', 'IP',
        'KT', 'L1', 'L10', 'L11', 'L12', 'L13', 'L14', 'L15', 'L16', 'L17',
        'L18', 'L19', 'L2', 'L20', 'L21', 'L22', 'L23', 'L24', 'L25', 'L26',
        'L27', 'L28', 'L29', 'L3', 'L30', 'L31', 'L32', 'L33', 'L34', 'L35',
        'L36', 'L37', 'L38', 'L39', 'L4', 'L40', 'L41', 'L42', 'L43', 'L44',
        'L45', 'L46', 'L47', 'L48', 'L49', 'L5', 'L50', 'L51', 'L52', 'L53',
        'L54', 'L55', 'L56', 'L57', 'L58', 'L59', 'L6', 'L60', 'L61', 'L62',
        'L63', 'L64', 'L65', 'L66', 'L67', 'L68', 'L69', 'L7', 'L70', 'L71',
        'L72', 'L73', 'L74', 'L75', 'L76', 'L77', 'L78', 'L79', 'L8', 'L80',
        'L9', 'LA', 'LD', 'LE', 'LL', 'LN', 'LS', 'LU', 'M', 'M1', 'M11',
        'M12', 'M13', 'M14', 'M15', 'M16', 'M17', 'M18', 'M19', 'M2', 'M20',
        'M21', 'M22', 'M23', 'M24', 'M25', 'M26', 'M27', 'M28', 'M29', 'M3',
        'M30', 'M31', 'M32', 'M34', 'M35', 'M38', 'M4', 'M40', 'M41', 'M43',
        'M44', 'M45', 'M46', 'M60', 'M61', 'M8', 'M9', 'M90', 'M99', 'ME',
        'MK', 'ML', 'N', 'N1', 'N10', 'N11', 'N12', 'N13', 'N14', 'N15',
        'N16', 'N17', 'N18', 'N19', 'N2', 'N20', 'N21', 'N22', 'N3', 'N4',
        'N5', 'N6', 'N7', 'N8', 'N81', 'N9', 'NE', 'NG', 'NN', 'NP', 'NR',
        'NW', 'OL', 'OX', 'PE', 'PL', 'PO', 'PR', 'RG', 'RH', 'RM', 'S1',
        'S10', 'S11', 'S12', 'S13', 'S14', 'S17', 'S18', 'S19', 'S2', 'S20',
        'S21', 'S22', 'S25', 'S26', 'S3', 'S32', 'S33', 'S35', 'S36', 'S4',
        'S40', 'S41', 'S42', 'S43', 'S44', 'S45', 'S49', 'S5', 'S6', 'S60',
        'S61', 'S62', 'S63', 'S64', 'S65', 'S66', 'S7', 'S70', 'S71', 'S72',
        'S73', 'S74', 'S75', 'S8', 'S80', 'S81', 'S9', 'S95', 'S96', 'S97',
        'S98', 'S99', 'SA', 'SE', 'SG', 'SK', 'SL', 'SM', 'SN', 'SO', 'SP',
        'SR', 'SS', 'ST', 'SW', 'SY', 'TA', 'TF', 'TN', 'TQ', 'TR', 'TS',
        'TW', 'UB', 'W1', 'W10', 'W11', 'W12', 'W13', 'W14', 'W2', 'W3',
        'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'WA', 'WC', 'WD', 'WF', 'WN',
        'WR', 'WS', 'WV', 'YO'
    ];

    /**
     * Inputted postcode
     *
     * @var string
     */
    private $postcode;

    /**
     * Constructor
     *
     * @param string $postcode The postcode to parse
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
     */
    public function getOutwardCode()
    {
        return substr($this->postcode, 0, -3);
    }

    /**
     * Returns the Inward Code
     *
     * @return string
     */
    public function getInwardCode()
    {
        return substr($this->postcode, -3);
    }

    /**
     * Returns the Postcode Area
     *
     * @return string
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
     */
    public function getSector()
    {
        return substr($this->getInwardCode(), 0, 1);
    }

    /**
     * Returns the Postcode Unit
     *
     * @return string
     */
    public function getUnit()
    {
        return substr($this->getInwardCode(), 1, 2);
    }

    /**
     * Returns a formatted Postcode
     *
     * @return string
     */
    public function getFormattedPostcode()
    {
        return sprintf(
            '%s %s',
            $this->getOutwardCode(),
            $this->getInwardCode()
        );
    }

    /**
     * Checks if the given postcode is in the UK Mainland
     *
     * @return bool
     */
    public function isUkMainland()
    {
        if (in_array($this->getOutwardCode(), $this->ukMainlandPrefixes)) {
            return true;
        }

        if (in_array($this->getArea(), $this->ukMainlandPrefixes)) {
            return true;
        }

        return false;
    }
}
