<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FamousQoute", mappedBy="author_id", orphanRemoval=true)
     */
    private $famousQoutes;

    public function __construct()
    {
        $this->famousQoutes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|FamousQoute[]
     */
    public function getFamousQoutes(): Collection
    {
        return $this->famousQoutes;
    }

    public function addFamousQoute(FamousQoute $famousQoute): self
    {
        if (!$this->famousQoutes->contains($famousQoute)) {
            $this->famousQoutes[] = $famousQoute;
            $famousQoute->setAuthorId($this);
        }

        return $this;
    }

    public function removeFamousQoute(FamousQoute $famousQoute): self
    {
        if ($this->famousQoutes->contains($famousQoute)) {
            $this->famousQoutes->removeElement($famousQoute);
            // set the owning side to null (unless already changed)
            if ($famousQoute->getAuthorId() === $this) {
                $famousQoute->setAuthorId(null);
            }
        }

        return $this;
    }
}
