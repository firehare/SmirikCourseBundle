<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UrlContentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
      $builder
        ->add('title', null, array('attr' => array('class' => 'xxlarge')))
        ->add('description', 'textarea', array('attr' => array('class' => 'tinymce xxlarge ylarge', 'tinymce' => '{"theme":"simple"}')))
        ->add('url', null, array('attr' => array('class' => 'xxlarge')))
      ;
    }

    public function getDefaultOptions(array $options)
    {
      return array(
        'data_class' => 'Smirik\CourseBundle\Entity\UrlContent',
      );
    }

    public function getName()
    {
      return 'smirik_coursebundle_urlcontenttype';
    }
}
