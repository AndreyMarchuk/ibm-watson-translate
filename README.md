# IBM Watson Translate for PHP 
(adapted from findbrok/laravel-watson-translate)

This package provides a simple api to perform translations using the IBM Watson Language Translation service. 

To get a better understanding of how this package works read the documentation for Watson Language Translation service first.

- [Getting started with the Language Translation service](https://www.ibm.com/smarterplanet/us/en/ibmwatson/developercloud/doc/language-translation/)
- [API Explorer](https://watson-api-explorer.mybluemix.net/apis/language-translation-v2)
- [API reference](https://www.ibm.com/smarterplanet/us/en/ibmwatson/developercloud/language-translation/api/v2/)

## Installation
Begin by installing this package through Composer.

```php
{
    "require": {
        "AndreyMarchuk/laravel-watson-translate": "~1.0"
    }
}
```

## Configuration

Set your correct credentials and default configuration for using your IBM Watson Language translation service
```php
$config = [
    'watson-translate.service_credentials.username' => '',
    'watson-translate.service_credentials.password' => '',
    'watson-translate.api_endpoint' => 'https://gateway.watsonplatform.net/language-translator/api/',
    'watson-translate.x_watson_learning_opt_out' => false,
    
    // default model name
    'watson-translate.models.default' => 'en-fr',
    
    // custom model names (optional)
    //'watson-translate.models.[model-name]' => '',
];

```

## Usage

```php
$translate = new WatsonTranslateService($config);
```

Read the [Docs](https://github.com/findbrok/laravel-watson-translate/wiki)

## Credits

[![Percy Mamedy](https://img.shields.io/badge/Author-Percy%20Mamedy-orange.svg)](https://twitter.com/PercyMamedy)

Adapted from Laravel to generic PHP by Andrey Marchuk
