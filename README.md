```

 @@@@@@@@&  @@@@@@@@   @@@@@@@@  @@@   @@@   @@@  &@@@@@@@@  @@@@@@@@@   @@@@@@ 
@@@/   @@@  @@@   @@@ (@@   #@@  @@@   @@@   @@@  @@@    @@@ @@@   @@@* @@@     
@@@/   @@@  @@@   @@@  @@@@      @@@   @@@   @@@  @@@  @@@@  @@@   @@@* @@@     
@@@/   @@@  @@@   @@@     @@@@   @@@   @@@   @@@  @@@@@@     @@@   @@@* @@@     
@@@/   @@@  @@@   @@@ @@@   @@@@ @@@   @@@   @@@  @@@    @@@ @@@   @@@* @@@     
,@@@   @@@  @@@   @@@ @@@%  #@@@ @@@   @@@   @@@  @@@   @@@. @@@   @@@* @@@     
 %@@@@@@@@  @@@   @@@  /@@@@@@.   @@@@@@/@@@@@@    @@@@@@@    @@@@@@@@* @@@  @@@
 
```

# Econt pickup point bundle
Econt integration for Symfony.  
Documentation of the API can be found here: https://ee.econt.com/services/Nomenclatures/

## Installation

* install with Composer
```
composer require answear/econt-pickup-point-bundle
```

`Answear\EcontBundle\AnswearEcontBundle::class => ['all' => true],`  
should be added automatically to your `config/bundles.php` file by Symfony Flex.

## Usage

### Get Offices

```php
use Answear\EcontBundle\Command\GetOffices;
use Answear\EcontBundle\Request\GetOfficesRequest;

/** @var GetOffices $getOfficesCommand */
$getOfficeResponse = $getOfficesCommand->getOffices(new GetOfficesRequest());
```


Final notes
------------

Feel free to open pull requests with new features, improvements or bug fixes. The Answear team will be grateful for any comments.

