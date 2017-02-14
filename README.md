123contactform-api-v1-php 
===============
[123ContactForm API v1](https://developer.123contactform.com/api-v1/) - PHP samples


### Installation

    $ git clone git://github.com/123contactform/123contacform-api-v1-php
    $ cd 123contactform-api-v1-php
	$ edit sample.php and enter paste your API key on the second line (see Authentication)
        

### Documentation

You can find the docs for API v1 at [https://developer.123contactform.com/api-v1/](https://developer.123contactform.com/api-v1/)

### Authentication

123ContactForm API v1 requires a valid API key, which can be generated from the API Keys section of My Account page (after you login your 123ContactForm account).
* API keys generated on our [https://www.123contactform.com/](US-hosted platform) are 35 characters long.
* API keys generated on our [https://eu.123contactform.com/](EU-hosted platform) are 35 characters long and always start with the sequence: EU-


### Examples

sample.php allows you to:

* Step 1: retrieves all forms in the given account (determined by the API key)
* Step 2: determines the first form in the account
* Step 3: counts submissions for that form
* Step 4: prints the last 200 submissions, divided into groups of 50
* Step 5: posts a new webhook to that form
* Step 6: gets all forms belonging to a subuser by his/her account e-mail address


