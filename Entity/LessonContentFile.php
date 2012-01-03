<?php

namespace Smirik\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smirik\CourseBundle\Entity\LessonContentFile
 *
 * @ORM\Table(name="smirik_lessons_content_files")
 * @ORM\Entity
 */
class LessonContentFile
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
     * @ORM\ManyToOne(targetEntity="Smirik\CourseBundle\Entity\LessonContent", inversedBy="smirik_lessons_content")
     * @ORM\JoinColumn(name="lc_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $lesson_content;

    /**
     * @var string $file
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}