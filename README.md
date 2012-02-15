CourseBundle
==========

Introduction
------------

This bundle provides basic e-learning functionality as standalone symfony2 bundle.

**IMPORTANT** This bundle is in development.

Core Features
------------

* Course management
* Every course could have unlimited lessons.
* Each lesson has content different types: text, links, youtube e.t.c.
* Administrator could add files to any lesson.
* Bundle is translated, see Resources/translations.

Requirements
------------

* Symfony2 with twig.
* Doctrine2, DoctrineExtension & DoctrineFixtures.
* Highly recommended [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle) (please see the installation steps [here](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/index.md)).
* Annotations for Controllers.
* jQuery + twitter bootstrap js.
* Twitter Bootstrap css file (or with the same styles).
* It is recommended to use this bundle with [SmirikAdminBundle](https://github.com/smirik/SmirikAdminBundle) which provides public assets (including twitter bootstrap & jquery) + menu + core classes.

Installation
------------

* Add bundle to your `deps` file:

  ```
  [SmirikCourseBundle]
    git=git://github.com/smirik/SmirikCourseBundle.git
    target=/bundles/Smirik/CourseBundle
  ```

* Register the namespace in `autoload.php` (if you don't use other Smirik* bundles):

  ```
  $loader->registerNamespaces(array(
      ...
      'Smirik'           => __DIR__.'/../vendor/bundles',
  ));
  ```

* Register bundle in your `AppKernel.php`:

  ```
  $bundles = array(
      ...
      new Smirik\CourseBundle\SmirikCourseBundle(),
      ...
  );
  ```

* Add routes to `routing.yml`:

 ```
  SmirikCourseBundle:
      resource: "@SmirikCourseBundle/Controller/"
      type:     annotation
      prefix:   /
  ```
* Update database and load test fixtures to see admin functionality

  ```
  php app/console doctrine:schema:update --force
  php app/console doctrine:fixtures:load --append
  ```

* See test courses at `http://host/admin/courses/`

* Please check that `bootstrap.css` file is loaded. 
    
* Enjoy!


Database schema
---------------

License
-------

Academic.
