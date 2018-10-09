<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ViandeRepository")
 */
class Viande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kebab", mappedBy="viandes")
     */
    private $name;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Kebab[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Kebab $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
            $name->setViandes($this);
        }

        return $this;
    }

    public function removeName(Kebab $name): self
    {
        if ($this->name->contains($name)) {
            $this->name->removeElement($name);
            // set the owning side to null (unless already changed)
            if ($name->getViandes() === $this) {
                $name->setViandes(null);
            }
        }

        return $this;
    }
}
