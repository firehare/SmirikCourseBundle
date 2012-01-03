<?php

namespace Smirik\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Course Controller
 * @Route("/courses")
 */
class CourseController extends Controller
{
	
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction()
	{
    $cm = $this->get('course.manager');
		$courses = $cm->getCourses();
	  return array(
			'courses' => $courses,
	  );
	}
	
	/**
	 * @Route("/{id}/lessons", name="course_lessons")
	 * @Template()
	 */
	public function lessonsAction($id)
	{
		$id = (int)$id;
		
		$lm = $this->get('lesson.manager');
		$course = $this->get('course.manager')->find($id);
		$lessons = $lm->getLessonsByCourse($id);
		
		return array(
			'course'  => $course,
			'lessons' => $lessons,
		);
		
	}
	
}
