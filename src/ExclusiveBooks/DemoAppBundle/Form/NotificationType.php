<?php

namespace ExclusiveBooks\DemoAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotificationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('smsText')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExclusiveBooks\DemoAppBundle\Entity\SmsNotification'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exclusivebooks_demoappbundle_smsnotification';
    }
}
