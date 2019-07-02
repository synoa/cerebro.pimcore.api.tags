# Description

This Extension is adding tags to the assets when received with the REST endpoint of pimcore

# Installation

Install with composer

```
composer config repositories.synoa_apitags git https://github.com/synoa/cerebro.pimcore.api.tags.git
COMPOSER_MEMORY_LIMIT=-1 composer require synoa/apitags
```

# Uninstall

```
COMPOSER_MEMORY_LIMIT=-1 composer remove synoa/apitags
composer config unset repositories.synoa_apitags
```

# How to use

Go to ```http://<host>/webservice/rest/asset/{id}?light=true```

## Request Params

### URL 

| Param | Description | Type |
| --- | --- | --- |
| id | The id of the asset | int |

### Query

| Param | Description | Type |
| --- | --- | --- | 
| light | Set it to "true" to receive meta information about the asset instead of base64 encoded asset data | boolean |

# Dependencies

| Software | Version |
| --- | --- |
| Pimcore | 5.7.0 or 6.0.0 |
