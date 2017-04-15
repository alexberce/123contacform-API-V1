123ContactForm API V1 - PHP SDK
===============
Small PHP SDK and samples for version 1 of 123ContactForm API


### Installation

    $ git clone git://github.com/123contactform/123contacform-api-v1-php
    $ cd 123contactform-api-v1-php
    $ composer start
    $ navigate to http://127.0.0.1:8181
        

### Documentation

You can find the docs for API v1 at [https://developer.123contactform.com/api-v1/](https://developer.123contactform.com/api-v1/)

_Please note that a Basic user can perform up to 100 API calls per day._

### Authentication

123ContactForm API v1 requires a valid API key, which can be generated from the API Keys section of My Account page (after you login your 123ContactForm account).
* API keys generated on our [https://www.123contactform.com/](US-hosted platform) are 35 characters long.
* API keys generated on our [https://eu.123contactform.com/](EU-hosted platform) are 35 characters long and always start with the sequence: EU-

### Usage

    <?php
    
    use ContactForm\Api\V1\ApiClient;
    use ContactForm\Api\V1\Resources\Forms;
    
    require_once '../vendor/autoload.php';
    
    try {
        $apiClient = (new ApiClient())
            ->withApiKey('APY-KEY-HERE');
        
        $forms = (new Forms($apiClient))->getForms();   
    }  catch (\ContactForm\Api\V1\ApiException $e) {
        // log 123ContactForm API errors
        var_dump($e);
    }

_Make sure to replace the string APY-KEY-HERE with your actual API key_

### Examples

* [Get All Forms](/samples/getForms.php)
* [Get Single Form](/samples/getForm.php)
* [Get Form Fields](/samples/getFields.php)
* [Get Form Submissions](/samples/getSubmissions.php)
* [Get All SubUser Forms](/samples/getAllSubUserForms.php)
* [Get SubUser Form](/samples/getSubUserForm.php)

### License

Please see the [LICENSE](LICENSE.md) included in this repository for a full copy of the MIT license,
which this project is licensed under.

