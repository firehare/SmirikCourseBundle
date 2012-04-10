<?php

namespace Smirik\CourseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Smirik\CourseBundle\Entity\Lesson as Lesson;
use Smirik\CourseBundle\Entity\TextContent as TextContent;
use Smirik\CourseBundle\Entity\UrlContent as UrlContent;
use Smirik\CourseBundle\Entity\YoutubeContent as YoutubeContent;
use Doctrine\Common\Persistence\ObjectManager;

class LoadLessonContentData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
   
 		/**
 		 * Add sample youtube content for lesson 0 for first course
 		 */
		$lc = new YoutubeContent();
		$lc->setLesson($this->getReference('test_lesson1_0'));
		$lc->setTitle('Youtube content for lesson 0');
		$lc->setDescription('Description for youtube content for lesson 0');
	  $lc->setUrl('http://www.youtube.com/watch?v=XrNWbuVHilA&feature=g-vrec&context=G2351e15RVAAAAAAAAAA');
	
		$manager->persist($lc);
		$manager->flush();
		
		$this->addReference('youtube_content', $lc);

		/**
		 * Add sample URL content  (related to google.com) for lesson 1 for first course
		 */
		$lc = new UrlContent();
		$lc->setLesson($this->getReference('test_lesson1_1'));
		$lc->setTitle('URL content for lesson 0');
		$lc->setDescription('Description for URL content for lesson 0');
	  $lc->setUrl('http://google.com');
	
		$manager->persist($lc);
		$manager->flush();
		
		$this->addReference('url_content', $lc);

		$lc = new TextContent();
		$lc->setLesson($this->getReference('test_lesson1_0'));
		$lc->setTitle('Content for Lesson #0 for course 1');
		$lc->setDescription('Description for content for lesson #0');
		$lc->setText('Text for content for lesson #0');
		
		$manager->persist($lc);
		$manager->flush();
		
		/**
		 * Add 10 text content to all lessons from first course.
		 */
		for ($i=0; $i<10; $i++)
		{
			$lc = new TextContent();
			$lc->setLesson($this->getReference('test_lesson1_'.$i));
			$lc->setTitle('Content for Lesson #'.$i.' for course 1');
			$lc->setDescription('Description for content for lesson #'.$i);
			$lc->setText('Text for content for lesson #'.$i);
			
			$manager->persist($lc);
			$manager->flush();
			$this->addReference('lesson1_content_'.$i, $lc);
		}

  }

  public function getOrder()
  {
    return 9;
  }
  
}
