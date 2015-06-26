<?php

namespace Alm\RosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'Usuario'))
            ->add('email', null, array('label' => 'Email'))
            ->add('enabled', null, array(
                    'label' => 'Enabled',
                    'required' => false
                ))
            ->add('name')
            ->add('groups', null, array('label' => 'Groups'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alm\RosterBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'alm_usuariotype';
    }
}
