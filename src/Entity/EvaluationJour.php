<?php

namespace App\Entity;

use App\Repository\EvaluationJourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluationJourRepository::class)]
#[ORM\UniqueConstraint(fields: ['stagiaire','date'])]

class EvaluationJour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $stagiaire = null;

    #[ORM\Column(length: 255)]
    private ?string $formation = null;

    #[ORM\Column(length: 255)]
    private ?string $satisfaction = null;

    #[ORM\Column]
    private ?int $clarte = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $difficultes = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $suggestions = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStagiaire(): ?string
    {
        return $this->stagiaire;
    }

    public function setStagiaire(string $stagiaire): static
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getSatisfaction(): ?string
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(string $satisfaction): static
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getClarte(): ?int
    {
        return $this->clarte;
    }

    public function setClarte(int $clarte): static
    {
        $this->clarte = $clarte;

        return $this;
    }

    public function getDifficultes(): ?string
    {
        return $this->difficultes;
    }

    public function setDifficultes(?string $difficultes): static
    {
        $this->difficultes = $difficultes;

        return $this;
    }

    public function getSuggestions(): ?string
    {
        return $this->suggestions;
    }

    public function setSuggestions(?string $suggestions): static
    {
        $this->suggestions = $suggestions;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }
}
