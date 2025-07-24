<?php

namespace App\Entity;

use App\Repository\AlerteQualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Stagiaire;

#[ORM\Entity(repositoryClass: AlerteQualiteRepository::class)]
class AlerteQualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 160)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'alerteQualites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stagiaire $stagiaire = null;

    #[ORM\OneToOne(mappedBy: 'alerte_qualite', cascade: ['persist', 'remove'])]
    private ?EvaluationJour $evaluationJour = null;

    #[ORM\ManyToOne(inversedBy: 'alertesQualite')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $formation = null;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStagiaire(): ?Stagiaire
    {
        return $this->stagiaire;
    }

    public function setStagiaire(?Stagiaire $stagiaire): static
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    public function getEvaluationJour(): ?EvaluationJour
    {
        return $this->evaluationJour;
    }

    public function setEvaluationJour(?EvaluationJour $evaluationJour): static
    {
        // unset the owning side of the relation if necessary
        if ($evaluationJour === null && $this->evaluationJour !== null) {
            $this->evaluationJour->setAlerteQualite(null);
        }

        // set the owning side of the relation if necessary
        if ($evaluationJour !== null && $evaluationJour->getAlerteQualite() !== $this) {
            $evaluationJour->setAlerteQualite($this);
        }

        $this->evaluationJour = $evaluationJour;

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
