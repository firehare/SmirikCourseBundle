<?php

namespace Smirik\CourseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Smirik\CourseBundle\Entity\Lesson as Lesson;

class LoadLessonData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load($manager)
  {
    
		for ($i=0; $i<10; $i++)
		{
			$lesson = new Lesson();
			$lesson->setCourse($this->getReference('test_course'));
			$lesson->setTitle('Lesson #'.$i.' for course 1');
			
			$manager->persist($lesson);
			$manager->flush();
			$this->addReference('test_lesson1_'.$i, $lesson);
		}

		for ($i=0; $i<5; $i++)
		{
			$lesson = new Lesson();
			$lesson->setCourse($this->getReference('test_course_private'));
			$lesson->setTitle('Lesson #'.$i.' for course 2');
			
			$manager->persist($lesson);
			$manager->flush();
			$this->addReference('test_lesson2_'.$i, $lesson);
		}

  }

  public function getOrder()
  {
    return 8;
  }
  
}
