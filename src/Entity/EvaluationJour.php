<?php

namespace App\Entity;

use App\Repository\EvaluationJourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluationJourRepository::class)]

class EvaluationJour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $satisfaction = null;

    #[ORM\Column]
    private ?int $clarte = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $difficultes = null;


    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $suggestions = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\OneToOne(inversedBy: 'evaluationJour', cascade: ['persist', 'remove'])]
    private ?AlerteQualite $alerte_qualite = null;

    #[ORM\ManyToOne(inversedBy: 'evaluationsJour')]
    private ?Stagiaire $stagiaire = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $formation = null;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSatisfaction(): ?int
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(int $satisfaction): static
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

    public function getDifficultes()
    {
        return $this->difficultes;
    }

    public function setDifficultes($difficultes): static
    {
        $this->difficultes = $difficultes;

        return $this;
    }

    public function getSuggestions(): ?string
    {
        return $this->suggestions;
    }

    public function setSuggestions($suggestions): static
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

    public function getAlerteQualite(): ?AlerteQualite
    {
        return $this->alerte_qualite;
    }

    public function setAlerteQualite(?AlerteQualite $alerte_qualite): static
    {
        $this->alerte_qualite = $alerte_qualite;

        return $this;
    }

    public function getStagiaire(): ?Stagiaire
    {
        return $this->stagiaire;
    }

    public function setStagiaire(?Stagiaire $id_stagiaire): static
    {
        $this->stagiaire = $id_stagiaire;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }
}
