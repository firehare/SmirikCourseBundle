<?php

namespace Smirik\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Smirik\CourseBundle\Entity\Lesson;
use Smirik\CourseBundle\Form\LessonType;

/**
 * Lesson controller.
 *
 * @Route("/admin/lessons")
 */
class AdminLessonController extends Controller
{
    /**
     * Lists all Lesson entities.
     *
     * @Route("/", name="admin_lessons")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
				
				$course_id = $this->getRequest()->query->get('course_id', false); 
				if ($course_id)
				{
					$course = $em->getRepository('SmirikCourseBundle:Course')->findOneById($course_id);
					$entities = $em->getRepository('SmirikCourseBundle:Lesson')->findBy(array(
						'course' => $course_id,
					));
				} else
				{
	        $entities = $em->getRepository('SmirikCourseBundle:Lesson')->findAll();
					$course = false;
				}

        return array(
					'entities' => $entities,
					'course' => $course,
				);
    }

    /**
     * Finds and displays a Lesson entity.
     *
     * @Route("/{id}/show", name="admin_lessons_show")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SmirikCourseBundle:Lesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lesson entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Lesson entity.
     *
     * @Route("/new", name="admin_lessons_new")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:new.html.twig")
     */
    public function newAction()
    {
        $entity = new Lesson();
        $form   = $this->createForm(new LessonType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Lesson entity.
     *
     * @Route("/create", name="admin_lessons_create")
     * @Method("post")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Lesson();
        $request = $this->getRequest();
        $form    = $this->createForm(new LessonType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_lessons_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Lesson entity.
     *
     * @Route("/{id}/edit", name="admin_lessons_edit")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SmirikCourseBundle:Lesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lesson entity.');
        }

        $editForm = $this->createForm(new LessonType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Lesson entity.
     *
     * @Route("/{id}/update", name="admin_lessons_update")
     * @Method("post")
  	 * @Template("SmirikCourseBundle:Admin\Lesson:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SmirikCourseBundle:Lesson')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lesson entity.');
        }

        $editForm   = $this->createForm(new LessonType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_lessons_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Lesson entity.
     *
     * @Route("/{id}/delete", name="admin_lessons_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SmirikCourseBundle:Lesson')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lesson entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_lessons'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
