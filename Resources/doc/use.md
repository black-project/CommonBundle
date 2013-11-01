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

#### TagType

TagType is a simple type who extends TextType. He is useful if you want to use a simple widget for
multiple keywords like tags, meta keywords...

The TagType use the TextToTagTransformer who implode/explode comma-separated string.

If you want a into the wild application, use the
[XOXCO jQuery Tags Input](http://xoxco.com/projects/code/tagsinput/) with this type.

```php
<?php

namespace Acme\Bundle\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DemoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addType('demo', 'black_common_tag');
    }
}
```







