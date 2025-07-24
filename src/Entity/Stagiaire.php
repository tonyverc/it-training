<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\AlerteQualite;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $diplome = null;

    #[ORM\Column]
    private ?bool $prerequis_valide = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @var Collection<int, AlerteQualite>
     */
    #[ORM\OneToMany(targetEntity: AlerteQualite::class, mappedBy: 'stagiaire')]
    private Collection $alerteQualites;
    /**
     * @var Collection<int, EvaluationJour>
     */
    #[ORM\OneToMany(targetEntity: EvaluationJour::class, mappedBy: 'id_stagiaire')]
    private Collection $evaluationsJour;

    public function __construct()
    {
        $this->alerteQualites = new ArrayCollection();
        $this->evaluationsJour = new ArrayCollection();
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): static
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function isPrerequisValide(): ?bool
    {
        return $this->prerequis_valide;
    }

    public function setPrerequisValide(bool $prerequis_valide): static
    {
        $this->prerequis_valide = $prerequis_valide;

        return $this;
    }

    /**
     * @return Collection<int, AlerteQualite>
     */
    public function getAlerteQualites(): Collection
    {
        return $this->alerteQualites;
    }

    public function addAlerteQualite(AlerteQualite $alerteQualite): static
    {
        if (!$this->alerteQualites->contains($alerteQualite)) {
            $this->alerteQualites->add($alerteQualite);
            $alerteQualite->setStagiaire($this);
        }

        return $this;
    }

    public function removeAlerteQualite(AlerteQualite $alerteQualite): static
    {
        if ($this->alerteQualites->removeElement($alerteQualite)) {
            // set the owning side to null (unless already changed)
            if ($alerteQualite->getStagiaire() === $this) {
                $alerteQualite->setStagiaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EvaluationJour>
     */
    public function getevaluationsJour(): Collection
    {
        return $this->evaluationsJour;
    }

    public function addEvaluationJour(EvaluationJour $evaluationJour): static
    {
        if (!$this->evaluationsJour->contains($evaluationJour)) {
            $this->evaluationsJour->add($evaluationJour);
            $evaluationJour->setStagiaire($this);
        }

        return $this;
    }

    public function removeEvaluationJour(EvaluationJour $evaluationJour): static
    {
        if ($this->evaluationsJour->removeElement($evaluationJour)) {
            // set the owning side to null (unless already changed)
            if ($evaluationJour->getStagiaire() === $this) {
                $evaluationJour->setStagiaire(null);
            }
        }

        return $this;
    }

    public function __toString(): string
{
    return $this->nom; // ou autre champ : prénom, email, etc.
}
}
