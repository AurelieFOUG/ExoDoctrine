<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 21/11/2018
 * Time: 15:08
 */

namespace AppBundle\Entity;

//On cherche l'adresse de la classe Mapping, on importe le namespace pour utiliser la classe Mapping qui porte l'alias ORM
use Doctrine\ORM\Mapping as ORM;

// (@ORM => La class Autor sera défini comme une classe)
//(@ORM\Table => Défini la Table)
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AutorRepository")
 * @ORM\Table(name="autor")
 */
class Autor
{

     //Doctrine positionne l'Id en required
     //Id est une clé primaire
    //@ORM\GeneratedValue, n'est mise qu'au niveau de la clé primaire, sur l'Id
     /**
      * @ORM\Column(type="integer")
      * @ORM\Id
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     private $id;

     /**
      *
      * @ORM\Column(type="datetime", name="borned_at", nullable=true)
      */
     private $bornedat;

    /**
     * @ORM\Column(type="datetime", name="dead_at")
     */
    private $deadat;


     /**
      * @ORM\Column(type="text")
      */
     private $biography;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    

    /**
     * @return mixed
     */
    public function getBornedat()
    {
        return $this->bornedat;
    }

    /**
     * @param mixed $bornedat
     */
    public function setBornedat($bornedat)
    {
        $this->bornedat = $bornedat;
    }

    /**
     * @return mixed
     */
    public function getDeadat()
    {
        return $this->deadat;
    }

    /**
     * @param mixed $deadat
     */
    public function setDeadat($deadat)
    {
        $this->deadat = $deadat;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $pays;

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }


}