<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('is_public')
            ->add('is_active')
            ->add('parent',  null, array('empty_value' => ''))
        ;
    }

    public function getName()
    {
        return 'smirik_coursebundle_coursetype';
    }
}
