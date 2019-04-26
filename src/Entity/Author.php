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
     * @ORM\OneToMany(targetEntity="App\Entity\FamousQuote", mappedBy="author", orphanRemoval=true)
     */
    private $famousQuotes;

    public function __construct()
    {
        $this->famousQuotes = new ArrayCollection();
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
     * @return Collection|FamousQuote[]
     */
    public function getFamousQuotes(): Collection
    {
        return $this->famousQuotes;
    }

    public function addFamousQuote(FamousQuote $famousQuote): self
    {
        if (!$this->famousQuotes->contains($famousQuote)) {
            $this->famousQuotes[] = $famousQuote;
            $famousQuote->setAuthor($this);
        }

        return $this;
    }

    public function removeFamousQuote(FamousQuote $famousQuote): self
    {
        if ($this->famousQuotes->contains($famousQuote)) {
            $this->famousQuotes->removeElement($famousQuote);
            // set the owning side to null (unless already changed)
            if ($famousQuote->getAuthor() === $this) {
                $famousQuote->setAuthor(null);
            }
        }

        return $this;
    }
}
