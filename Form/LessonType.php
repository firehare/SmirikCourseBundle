<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('course')
        ;
    }

    public function getName()
    {
        return 'smirik_coursebundle_lessontype';
    }
}
