<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KebabRepository")
 */
class Kebab
{
    /**
     * @ORM\Id()
     * @ORM\Generatedvalue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $viande;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $sauce;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $legumes;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Viande", inversedBy="name")
     */
    private $viandes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgurl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getViande(): ?string
    {
        return $this->viande;
    }

    public function setViande(string $viande): self
    {
        $this->viande = $viande;

        return $this;
    }

    public function getSauce(): ?string
    {
        return $this->sauce;
    }

    public function setSauce(string $sauce): self
    {
        $this->sauce = $sauce;

        return $this;
    }

    public function getLegumes(): ?string
    {
        return $this->legumes;
    }

    public function setLegumes(string $legumes): self
    {
        $this->legumes = $legumes;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getViandes(): ?Viande
    {
        return $this->viandes;
    }

    public function setViandes(?Viande $viandes): self
    {
        $this->viandes = $viandes;

        return $this;
    }

    public function getImgurl(): ?string
    {
        return $this->imgurl;
    }

    public function setImgurl(string $imgurl): self
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
