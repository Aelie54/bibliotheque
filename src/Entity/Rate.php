<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/*
 * @ORM\Entity
 */
class Rate
{
    /*
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private int $id;

    /*
     * @ORM\Column(length="512")
    */
    private string $comment;

    /*
     * @ORM\Column(type="integer")
    */
    private int $note;

    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="book", referencedColumnName="id", onDelete="CASCADE")
    */
    private Book $book;


    public function __construct(string $comment, string $note, Book $book)
    {
        $this->comment = $comment;
        $this->note = $note;
        $this->book = $book;
    }


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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }


}