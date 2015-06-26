<?php

namespace Alm\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa', null, array('label' => 'Empresa'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('nivel', 'choice', array(
                    'label' => 'Nivel',
                    'choices' => array(0 => 0, 1 => 1)
                ))
            ->add('activo', 'checkbox', array('label' => 'Activo', 'required' => false))
            ->add('file', null, array('label' => 'Imagen'))
            ->add('groups', null, array('label' => 'Grupos', 'required' => false))
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'alm_user_registration';
    }
}
