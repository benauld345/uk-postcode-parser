# UK Postcode Parser

## Installation

This package can be installed using composer:

	composer require benauld345/uk-postcode-parser

## Usage

### Parser/Postcode object

To create an instance of a postcode:

	use Benauld345\UkPostcodeParser\Postcode;
	
	$postcode = new Postcode('dn55 1pt');
	
	var_dump($postcode->getOutwardCode()); // DN55
	var_dump($postcode->getInwardCode()); // 1PT
	var_dump($postcode->getArea()); // DN
	var_dump($postcode->getDistrict()); // 55
	var_dump($postcode->getSector()); // 1
	var_dump($postcode->getUnit()); // PT
	var_dump($postcode->getFormattedPostcode()); // DN55 1PT

### Validator object

The Validator object is a static utility class with the following methods:

`check()`: This method is for checking if a postcode is valid. Excepts full postcodes only:

	use Benauld345\UkPostcodeParser\Validator;
	
	var_dump(Validator::check('dn55 1pt')); // true
	var_dump(Validator::check('dn551pt')); // true
	var_dump(Validator::check('DN55 1PT')); // true
	var_dump(Validator::check('not valid')); // false
	var_dump(Validator::check('dn55')); // false

`sanitize()`: This method is used to clean up any user input. Strips any non-alphanumeric characters and returns the cleaned version uppercased

	use Benauld345\UkPostcodeParser\Validator;
	
	var_dump(Validator::sanitize("dn55 1pt")); // DN551PT

## Issues/Bug Reporting

Please log any issues in [GitHub Issues](https://github.com/benauld345/uk-postcode-parser/issues) 