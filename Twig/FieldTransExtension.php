<?php
namespace Black\Bundle\CommonBundle\Twig;

use Symfony\Component\Translation\TranslatorInterface;

class FieldTransExtension extends \Twig_Extension
{
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getFunctions()
    {
        return array(
            'tr' => new \Twig_Function_Method($this, 'FieldTransFilter')
        );
    }

    public function FieldTransFilter($object, $arguments, $transDomain = null)
    {
        // argument operation step1, keep the method
        $separator = ".";
        $arguments = explode($separator, $arguments);
        $method = 'get' . ucwords($arguments[0]);
        // determine if the method is implemented in the current class or in parent
        $targetClass = $this->own_method($object,$method);
        //namespace operations
        $separator = "\\";
        $elements = explode($separator, $targetClass);
        $bundleName = preg_split('/(?=[A-Z])/', $elements[2]);
        $elements[2] = $bundleName[1];
        $message = "$elements[0].$elements[1].$elements[2].";

        if (!$transDomain) {
            $message .= 'type.';
        }

        $message .= "$elements[4].";

        // argument operation step2
        foreach ($arguments as $argument) {
            if ($argument === end($arguments)) {
                $message .= $argument;
            } else {
                $message .= $argument . '.';
            }
        }

        $message = strtolower($message);

        if (!$transDomain) {
            $transDomain = 'form';
        }
        $message = $this->translator->trans($message, $parameters = array(), $transDomain);

        return $message;
    }

    public function own_method($class_name, $method_name)
    {
        if (method_exists($class_name, $method_name)) {
            //the method is in the class not in the parent so, keep the current namespace:
            return get_class($class_name);
        } else {
            $parent_class = get_parent_class($class_name);

            return $parent_class;
        }
    }


    public function getName()
    {
        return 'black_extension';
    }
}