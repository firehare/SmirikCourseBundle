<?php

namespace Smirik\CourseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Smirik\CourseBundle\Entity\Course;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCourseData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    
		$course = new Course();
		$course->setTitle('Test course #1');
		$course->setDescription('Description for test course #1');
		$course->setIsPublic(true);
		$course->setIsActive(true);
		
		$manager->persist($course);
		$manager->flush();
		
		$this->addReference('test_course', $course);
		
		$course = new Course();
		$course->setParent($this->getReference('test_course'));
		$course->setTitle('Test course #2');
		$course->setDescription('Description for test course #2');
		$course->setIsPublic(false);
		$course->setIsActive(true);
		
		$manager->persist($course);
		$manager->flush();
    
    $this->addReference('test_course_private', $course);
    
  }

  public function getOrder()
  {
    return 7;
  }
  
}
