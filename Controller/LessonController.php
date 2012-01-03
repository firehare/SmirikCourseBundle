<?php

namespace Smirik\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Lesson Controller
 * @Route("/lessons")
 */
class LessonController extends Controller
{
	
	/**
	 * @Route("/{id}", name="lesson_show")
	 * @Template()
	 */
	public function showAction($id)
	{
    $lm = $this->get('lesson.manager');
		$lesson = $lm->find($id);
	  return array(
			'lesson' => $lesson,
	  );
	}
	
	/**
	 * @Route("/content/{id}", name="lesson_content")
	 * @Template()
	 */
	public function contentAction($id)
	{
		var_dump('stop');
		exit();
	}
	
}
