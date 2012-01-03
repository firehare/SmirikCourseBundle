<?php

namespace Smirik\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smirik\CourseBundle\Entity\Lesson
 *
 * @ORM\Table(name="smirik_lessons")
 * @ORM\Entity
 */
class Lesson
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Smirik\CourseBundle\Entity\Course", inversedBy="smirik_courses")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $course;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var date $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=TRUE)
     */
    protected $created_at;

    /**
     * @var date $updated_at
     *
     * @ORM\Column(type="datetime", nullable=TRUE)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="LessonContent", mappedBy="lesson")
     */
    private $lesson_content;

    /**
     * @ORM\OneToMany(targetEntity="TextContent", mappedBy="lesson")
     */
    private $text_content;

    /**
     * @ORM\OneToMany(targetEntity="YoutubeContent", mappedBy="lesson")
     */
    private $youtube_content;

    /**
     * @ORM\OneToMany(targetEntity="UrlContent", mappedBy="lesson")
     */
    private $url_content;


    public function __construct() {
			$this->lesson_content  = new \Doctrine\Common\Collections\ArrayCollection();
			$this->youtube_content = new \Doctrine\Common\Collections\ArrayCollection();
			$this->text_content    = new \Doctrine\Common\Collections\ArrayCollection();
			$this->url_content     = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set course_id
     *
     * @param integer $courseId
     */
    public function setCourseId($courseId)
    {
        $this->course_id = $courseId;
    }

    /**
     * Get course_id
     *
     * @return integer 
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set course
     *
     * @param Smirik\CourseBundle\Entity\Course $course
     */
    public function setCourse(\Smirik\CourseBundle\Entity\Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get course
     *
     * @return Smirik\CourseBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Add lesson_content
     *
     * @param Smirik\CourseBundle\Entity\LessonContent $lessonContent
     */
    public function addLessonContent(\Smirik\CourseBundle\Entity\LessonContent $lessonContent)
    {
        $this->lesson_content[] = $lessonContent;
    }

    /**
     * Get lesson_content
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLessonContent()
    {
        return $this->lesson_content;
    }

    /**
     * Add text_content
     *
     * @param Smirik\CourseBundle\Entity\TextContent $textContent
     */
    public function addTextContent(\Smirik\CourseBundle\Entity\TextContent $textContent)
    {
        $this->text_content[] = $textContent;
    }

    /**
     * Get text_content
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTextContent()
    {
        return $this->text_content;
    }

    /**
     * Add youtube_content
     *
     * @param Smirik\CourseBundle\Entity\YoutubeContent $youtubeContent
     */
    public function addYoutubeContent(\Smirik\CourseBundle\Entity\YoutubeContent $youtubeContent)
    {
        $this->youtube_content[] = $youtubeContent;
    }

    /**
     * Get youtube_content
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getYoutubeContent()
    {
        return $this->youtube_content;
    }

    /**
     * Add url_content
     *
     * @param Smirik\CourseBundle\Entity\UrlContent $urlContent
     */
    public function addUrlContent(\Smirik\CourseBundle\Entity\UrlContent $urlContent)
    {
        $this->url_content[] = $urlContent;
    }

    /**
     * Get url_content
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUrlContent()
    {
        return $this->url_content;
    }
}