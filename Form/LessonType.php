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
				->add('text_content', 'collection', array('type' => new TextContentType(), 'options' => array(
					'required' => false,
				), 'allow_add' => true))
				->add('url_content', 'collection', array('type' => new UrlContentType()))
				->add('youtube_content', 'collection', array('type' => new YoutubeContentType()))
			;

    }

    public function getName()
    {
        return 'smirik_coursebundle_lessontype';
    }
}
