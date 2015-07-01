<?php

namespace ExclusiveBooks\DemoAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupportUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName')
            ->add('userEmail')
            ->add('userEmailAlt')
            ->add('userContact')
            ->add('userContactAlt')
            ->add('cerberusID')
            ->add('givenName')
            ->add('avatar')
            ->add('userContactInternal')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExclusiveBooks\DemoAppBundle\Entity\SupportUser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exclusivebooks_demoappbundle_supportuser';
    }
}
