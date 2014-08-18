How to use this awesome bundle?
===============================

Form - EventListener
--------------------

__SetButtonsSubscriber__

SetButtonsSubscriber add 3 (or 4 if your object is already persisted) buttons in your FormType. This "trick"
is a very good way to manage your form by using `$this->form->get('button')->isClicked()`.

If you want to read more about this, just [read this][1].


Form - Extension
----------------

__ImageTypeExtension__

ImageTypeExtension is just a copy/paste of [this][2]


Form - Type
-----------

__TagType__

TagType is a simple type who extends TextType. He is useful if you want to use a simple widget for
multiple keywords like tags, meta keywords...

The TagType use the TextToTagTransformer who implode/explode comma-separated string.

If you want an into the wild application, use the
[XOXCO jQuery Tags Input][3] with this type.

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

__CustomChoiceListType__

TODO.

Form - Transformer
------------------

__ValueToChoiceOrTextTransformer__

This transformer add an "other" to the ChoiceList and allow a new value. It's a copy/paste of an answer of Bernhard on
[StackOverflow][6]

__ValueToModelOrNullTransformer__

This transformer can (reverse)transform values from your database without restriction to a specific entity/document/...


[1]: http://symfony.com/blog/new-in-symfony-2-3-buttons-support-in-forms
[2]: http://symfony.com/doc/current/cookbook/form/create_form_type_extension.html
[3]: http://xoxco.com/projects/code/tagsinput/
[4]: http://symfony.com/fr/doc/current/reference/forms/types/entity.html
[5]: http://api.symfony.com/2.2/Symfony/Component/Form/Extension/Core/ChoiceList/ChoiceListInterface.html
[6]: http://stackoverflow.com/a/11656057