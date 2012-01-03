<?php
namespace Smirik\CourseBundle\Entity;

use Doctrine\ORM\EntityManager;
use Smirik\CourseBundle\Entity\Course;

class CourseManager
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
	 * Get courses
	 * @method getCourses
	 * @return DoctrineCollection
	 */
	public function getCourses()
	{
		return $this->repository->findAll();
	}

}
