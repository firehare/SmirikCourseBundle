<?php

namespace Smirik\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smirik\CourseBundle\Entity\LessonContent
 *
 * @ORM\Table(name="smirik_lessons_content")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"text" = "TextContent", "url" = "UrlContent", "youtube" = "YoutubeContent"})
 */
class LessonContent
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
     * @ORM\ManyToOne(targetEntity="Smirik\CourseBundle\Entity\Lesson", inversedBy="smirik_lessons")
     * @ORM\JoinColumn(name="lesson_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $lesson;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=200)
     */
    private $title;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * @ORM\OneToMany(targetEntity="LessonContentFile", mappedBy="lesson_content")
     */
    private $files;

    public function __construct() {
			$this->files = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set lesson
     *
     * @param Smirik\CourseBundle\Entity\Lesson $lesson
     */
    public function setLesson(\Smirik\CourseBundle\Entity\Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get lesson
     *
     * @return Smirik\CourseBundle\Entity\Lesson 
     */
    public function getLesson()
    {
        return $this->lesson;
    }

    /**
     * Add files
     *
     * @param Smirik\CourseBundle\Entity\LessonContentFile $files
     */
    public function addLessonContentFile(\Smirik\CourseBundle\Entity\LessonContentFile $files)
    {
        $this->files[] = $files;
    }

    /**
     * Get files
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }

}