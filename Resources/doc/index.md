Getting Started With BlackCommonBundle
======================================

This bundle is a suite of tools for your Symfony project and provides some usefull tools like
FormTypes, FormExtensions or DataTransformers.

## Prerequisites

This bundle requires Symfony 2.3+ and PHP 5.4

### Translations

If you wish to use default texts provided in this bundle, you have to make sur you have translator enabled in your
config.

``` yaml
# app/config/config.yml

framework:
    translator: ~
```

For more information about translations, check
[Symfony documentation](http://symfony.com/doc/current/book/translation.html).


Installation
------------

The recomanded way to install CommonBundle is through [Composer][1]:

```json
{
    "require": {
        "black/common-bundle": "@stable"
    }
}
```

__Protip:__ You should browse the [`black/common-bundle`][2] page to choose a stable version to use, avoid the `@stable`
 meta constraint.

Usage
-----

Just load BlackCommonBundle in your AppKernel.

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Black\Bundle\CommonBundle\BlackCommonBundle(),
    );
}
```

Champagne!
----------

Now that you have completed the basic installation of the BlackCommonBundle you are ready
to [use it](use.md)!

[1]: http://getcomposer.org/
[2]: https://packagist.org/packages/black/common-bundle



