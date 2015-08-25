<?php

namespace Alm\RosterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CurriculumScheduleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('theoryFrom', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('theoryTo', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('practicalFrom', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('practicalTo', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('makeupFrom', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('makeupTo', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('clinicFrom', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
            ->add('clinicTo', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'MM/dd/yyyy',
                'required' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alm\RosterBundle\Entity\CurriculumSchedule'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'curriculum_schedule';
    }
}
