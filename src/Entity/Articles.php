<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
     private $auteur;

     /**
     * @ORM\Column(type="string", length=1048)
     */
     private $description;

     /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_publication;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

     /**
      * Get the value of auteur
      */ 
     public function getAuteur()
     {
          return $this->auteur;
     }

     /**
      * Set the value of auteur
      *
      * @return  self
      */ 
     public function setAuteur($auteur)
     {
          $this->auteur = $auteur;

          return $this;
     }

     /**
      * Get the value of description
      */ 
     public function getDescription()
     {
          return $this->description;
     }

     /**
      * Set the value of description
      *
      * @return  self
      */ 
     public function setDescription($description)
     {
          $this->description = $description;

          return $this;
     }

    /**
     * Get the value of date_de_publication
     */ 
    public function getDate_de_publication()
    {
        return $this->date_de_publication;
    }

    /**
     * Set the value of date_de_publication
     *
     * @return  self
     */ 
    public function setDate_de_publication($date_de_publication)
    {
        $this->date_de_publication = $date_de_publication;

        return $this;
    }
}
