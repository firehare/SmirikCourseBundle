<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LessonContentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
      $builder
        ->add('title')
        ->add('description')
      ;
    }

    public function getDefaultOptions(array $options)
    {
      return array(
        'data_class' => 'Smirik\CourseBundle\Entity\LessonContent',
      );
    }

    public function getName()
    {
      return 'smirik_coursebundle_lessoncontenttype';
    }
}
