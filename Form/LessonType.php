<?php

namespace Smirik\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
			$builder
			  ->add('course')
			  ->add('title')
			;

      $builder
				->add('text_content', 'collection', array('type' => new TextContentType(), 'allow_add' => true, 'by_reference' => false))
				->add('url_content', 'collection', array('type' => new UrlContentType(), 'allow_add' => true, 'by_reference' => false))
				->add('youtube_content', 'collection', array('type' => new YoutubeContentType(), 'allow_add' => true, 'by_reference' => false))
			;

    }

    public function getName()
    {
        return 'smirik_coursebundle_lessontype';
    }
}
