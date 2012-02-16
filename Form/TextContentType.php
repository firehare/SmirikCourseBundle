<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TextContentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
      $builder
        ->add('title')
        ->add('description', 'textarea', array('attr' => array('class' => 'tinymce description xxlarge ylarge', 'tinymce' => '{"theme":"simple"}')))
        ->add('text', 'textarea', array('attr' => array('class' => 'tinymce xxlarge yylarge', 'tinymce' => '{"theme":"simple"}')))
      ;
    }

    public function getDefaultOptions(array $options)
    {
      return array(
        'data_class' => 'Smirik\CourseBundle\Entity\TextContent',
      );
    }

    public function getName()
    {
      return 'smirik_coursebundle_textcontenttype';
    }
}
