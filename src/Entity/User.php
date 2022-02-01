<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/** @ORM\Entity 
 *  @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_user_details", columns={"email"})})
*/
class User{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    
    /**
    * @ORM\Column(length="100")
   */
   private string $email;



    public function __construct (string $name, string $email){

    $this->name = $name;
    $this->email = $email;

    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


   /**
    * Get /*
    */ 
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set /*
    *
    * @return  self
    */ 
   public function setEmail($email)
   {
      $this->email = $email;

      return $this;
   }

}