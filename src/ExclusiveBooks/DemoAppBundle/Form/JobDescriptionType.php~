<?php

namespace ExclusiveBooks\DemoAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobDescriptionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jobIdentifier')
            ->add('jobName')
            ->add('jobComment')
            ->add('runType')
            ->add('cronSchedule')
            ->add('scriptLocation')
            ->add('scriptIdentifier')
            ->add('controlTable')
            ->add('jobArguments')
            ->add('escalationChain')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExclusiveBooks\DemoAppBundle\Entity\JobDescription'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'exclusivebooks_demoappbundle_jobdescription';
    }
}
