<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FamousQouteRepository")
 */
class FamousQoute
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
    private $quote;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="famousQoutes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(string $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    public function getAuthorId(): ?Author
    {
        return $this->author_id;
    }

    public function setAuthorId(?Author $author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }
}
