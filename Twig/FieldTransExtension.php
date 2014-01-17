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


        //namespace operations
        $string = get_class($object);
        $separator = "\\";
        $elements = explode($separator, $string);
        $method = 'get' . ucwords($arguments[0]);

        //ladybug_dump_die(get_parent_class(call_user_func(array($object, $method))));
        //ladybug_dump_die($this->own_method($object,$method));

        $bundleName = preg_split('/(?=[A-Z])/', $elements[2]);
        $elements[2] = $bundleName[1];
        $message = "$elements[0].$elements[1].$elements[2].";

        if (!$transDomain) {
            $message .= 'type.';
        }

        $message .= "$elements[4].";

        // argument operation step1
        $separator = ".";
        $arguments = explode($separator, $arguments);

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
            $parent_class = get_parent_class($class_name);
            if ($parent_class !== false) return !method_exists($parent_class, $method_name);
            return true;
        } else return false;
    }


    public function getName()
    {
        return 'black_extension';
    }
}