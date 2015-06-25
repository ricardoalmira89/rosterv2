<?php

namespace Alm\RosterBundle\Form;

use Alm\RosterBundle\Entity\DropInfo;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('email')
            ->add('startDate', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
            ))
            ->add('endDate', 'datetime',array(
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
            ))
            ->add('homePhone')
            ->add('bussinessPhone')
            ->add('cellPhone')
            ->add('faxNumber')
            ->add('address')
            ->add('city')
            ->add('state')
            ->add('zip')
            ->add('country')
            ->add('creditTrans')
            ->add('refered')
            ->add('webPage')
            ->add('notes')
            ->add('attachment')
            ->add('location')
            ->add('status')
            ->add('comments')
            ->add('emergencyContactName')
            ->add('emergencyContactPhone1')
            ->add('emergencyContactPhone2')
            ->add('emergencyContactPhone3')
            ->add('cv')
            ->add('cvs')
            ->add('middleInitial')
            ->add('paymentInfo')
            ->add('paymentPlanAmount')
            ->add('eo')
            ->add('graduated', new GraduatedType())
            ->add('locker', 'entity' , array(
                'label' => false,
                'class' => 'Alm\RosterBundle\Entity\Locker',
                'empty_value' => 'Select Locker',
                'required' => false,
                'mapped' => true,
                'property' => 'name',
                'query_builder' => function(EntityRepository $er) use ($options){
                    return $er->createQueryBuilder('l','s')
                        ->leftJoin('l.student','s')
                        ->where('s is null')
                        ->orWhere('l.id = :lid')
                        ->setParameter('lid', $options['lockerId'])
                        ;
                }
            ))
            ->add('dropInfo', new DropInfoType())
            ->add('schedules')
            ->add('programs')
            ->add('file', null, array('label' => 'Picture'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Alm\RosterBundle\Entity\Student',
            'csrf_protection' => false,
            'lockerId' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'student';
    }
}
