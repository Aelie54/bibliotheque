<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/*
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_article_details", columns={"n_isbn"})})
 */
class Book
{
    /*
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private int $id;
    /*
     * @ORM\Column(length="100")
     */
    private string $title;

    /*
     * @ORM\Column(length="512")
    */
    private string $summary;

    /*
     * @ORM\Column(type="integer")
    */
    private int $n_isbn;

    /*
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="author", referencedColumnName="id", nullable=true, onDelete="SET NULL")
    */
    private Author $author;

    /**
     * @ORM\ManyToOne(targetEntity="Editor")
     * @ORM\JoinColumn(name="editor", referencedColumnName="id", nullable=true, onDelete="SET NULL")
    */
    private Editor $editor;

    
    /**
     * Get /*
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get /*
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getN_isbn()
    {
        return $this->n_isbn;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setN_isbn($n_isbn)
    {
        $this->n_isbn = $n_isbn;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of editor
     */ 
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @return  self
     */ 
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }
}