<?php

namespace Smirik\CourseBundle\EventListener;

use Smirik\AdminBundle\Event\ConfigureMenuEvent;

class ConfigureMenuListener
{
    /**
     * @param \Smirik\AdminBundle\Event\ConfigureMenuEvent $event
     */
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();
        $menu->addChild('admin.course.menu.main', array('route' => 'admin_courses'));
        $menu->addChild('admin.course.menu.lessons', array('route' => 'admin_courses'));
        $cm = $event->container->get('course.manager');
        $courses = $cm->getCourses();
        foreach ($courses as $course)
        {
          $menu['admin.course.menu.lessons']->addChild($course->getTitle(), array('route' => 'admin_lessons', 'routeParameters' => array('course_id' => $course->getId())));
        }
    }
}