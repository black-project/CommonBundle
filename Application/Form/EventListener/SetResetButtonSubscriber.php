<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\CommonBundle\Application\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;

/**
 * Class SetResetButtonSubscriber
 *
 * SetResetButtonSubscriber add "reset" button for your FormType.
 *
 * @author  Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class SetResetButtonSubscriber implements EventSubscriberInterface
{
    /**
     * List events for this subscriber
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'preSetData'];
    }

    /**
     * Pre set Data form the subscriber and add button
     *
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addResetButton($form);
    }

    /**
     * Add the button
     *
     * @param FormInterface $form
     */
    private function addResetButton(FormInterface $form)
    {
        $form
            ->add('reset', 'reset', [
                    'label' => 'black.bundle.common.eventListener.setButtonsSubscriber.button.reset.label'
                ]
            );
    }
}
