# BillogramBundle

This bundle lets you use [Billogram](https://github.com/billogram/billogram-v2-api-php-lib) in your Symfony application.

Installation
------------

```bash
$ composer require jongotlin/billogram-bundle
```

Composer will install the bundle to `jongotlin/billogram-bundle` directory.

### Add the bundle to your application kernel

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new JGI\BillogramBundle\JGIBillogramBundle(),
        // ...
    );
}
```

Configuration
-------------

```yml
# app/config/config.yml
jgi_billogram:
    id: %billogram_id%
    password: %billogram_password%
    sandbox_id: %billogram_sandbox_id%
    sandbox_password: %billogram_sandbox_password%
    sandbox: %billogram_sandbox%
```

```yml
# app/config/parameters.yml
billogram_id: "5367-fl60Ku6p"
billogram_password: "d4934454228e704eef26e8d621d1461b"
billogram_sandbox_id: "1725-dqst7op6"
billogram_sandbox_password: "da2e4561a99e74f7872222ad310b81ac"
billogram_sandbox: true
```

```php
$this->getContainer()->get('jgi.billogram'); // Billogram\Api
```
