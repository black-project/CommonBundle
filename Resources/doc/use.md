How to use this awesome bundle?
===============================

## Traits

We provide some Traits based on [schema](http://www.schema.org)

### Thing

`Thing` is the most generic type of item and because he is generic, it's a Trait! :)

#### For Doctrine ORM

```php
<?php

namespace Acme\Bundle\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Black\Bundle\CommonBundle\Traits\ThingEntityTrait

class Demo
{
    use ThingEntityTrait;
}

```

#### For Doctrine MongoDB

```php
<?php

namespace Acme\Bundle\DemoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Black\Bundle\CommonBundle\Traits\ThingDocumentTrait;

class Demo
{
    use ThingDocumentTrait;
}

```

### PostalAddress, ContactPoint and Image

These Traits are explicit and available for Doctrine ORM and Doctrine MongoDB. If you want to use
the ImageEntityTrait, don't forget to add the annotation `@ORM\HasLifecycleCallbacks` in your class !


### FormType

#### Thing
We have a ThingTrait so... We have a ThingType! I hope he save you lot of time.




