<?php

namespace Alm\RosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DropInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('refund')
            ->add('amount')
            ->add('date', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
            ))
            ->add('check')
            ->add('paid')
            ->add('comments')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alm\RosterBundle\Entity\DropInfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alm_rosterbundle_dropinfo';
    }
}
