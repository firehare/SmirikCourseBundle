CourseBundle
==========

Introduction
------------

This bundle provides basic e-learning functionality as standalone symfony2 bundle.

**IMPORTANT** This bundle is in early development.

Future Features
------------

* Course management
* Every course could have unlimited lessons.
* Each lesson has content different types: text/images, url, youtube e.t.c.
* Administrator could add files to any lesson.
* Bundle would be i18n, see Resources/translations.

Requirements
------------

* Symfony2 with twig.
* Doctrine2, DoctrineExtension & DoctrineFixtures.
* [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle) (please see the installation steps [here](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/index.md)).
* Annotations for Controllers.
* Twitter Bootstrap css file (or with the same styles).

Installation
------------

**THIS IS TEMPORARY STEPS**

* Add routes to routing.yml:

 ```
  SmirikCourseBundle:
      resource: "@SmirikCourseBundle/Controller/"
      type:     annotation
      prefix:   /
  ```
* Update database and load fixtures

  ```
  php app/console doctrine:schema:update --force
  php app/console doctrine:fixtures:load --append
  ```
    
* Enjoy!

Database schema
---------------

How to use
----------

License
-------

Academic.
