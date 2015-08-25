<?php

namespace Alm\RosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GraduatedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licensed')
            ->add('temporary')
            ->add('employmentStatus')
            ->add('companyName')
            ->add('companyAddress')
            ->add('companyCity')
            ->add('companyState')
            ->add('companyZip')
            ->add('companyPhone')
            ->add('fullTime')
            ->add('diplomaPrinted', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('diplomaReceived')
            ->add('startWorking', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('supervisorPhone')
            ->add('supervisorName')
            ->add('jobTitle')
            ->add('employerAddress')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alm\RosterBundle\Entity\Graduated'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alm_rosterbundle_graduated';
    }
}
