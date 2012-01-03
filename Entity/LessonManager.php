<?php
namespace Smirik\CourseBundle\Entity;

use Doctrine\ORM\EntityManager;
use Smirik\CourseBundle\Entity\Lesson;

class LessonManager
{
  
  protected $em;
  protected $class;
  protected $repository;

  public function __construct(EntityManager $em, $class)
  {
    $this->em         = $em;
    $this->class      = $em->getClassMetadata($class)->name;
    $this->repository = $em->getRepository($class);
  }

	/**
	 * Get lesssons by course
	 * @method getCourses
	 * @return DoctrineCollection
	 */
	public function getLessonsByCourse($course)
	{
		return $this->repository->findBy(array(
			'course' => $course,
		));
	}

	/**
	 * Find one Entity by primary key
	 * @param integer $id
	 * @return Course
	 */
	public function find($id)
	{
		return $this->repository->find($id);
	}

}
