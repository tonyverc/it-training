<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use App\Entity\AlerteQualite;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire extends User
{

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $diplome = null;

    #[ORM\Column]
    private ?bool $prerequis_valide = null;

    /**
     * @var Collection<int, AlerteQualite>
     */
    #[ORM\OneToMany(targetEntity: AlerteQualite::class, mappedBy: 'stagiaire')]
    private Collection $alerteQualites;

    /**
     * @var Collection<int, NoteQualite>
     */
    #[ORM\OneToMany(targetEntity: NoteQualite::class, mappedBy: 'stagiaire_id')]
    private Collection $notesQualites;

    public function __construct()
    {
        $this->alerteQualites = new ArrayCollection();
        $this->notesQualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $alerteQualite->setStagiaireId($this);
        }

        return $this;
    }

    public function removeAlerteQualite(AlerteQualite $alerteQualite): static
    {
        if ($this->alerteQualites->removeElement($alerteQualite)) {
            // set the owning side to null (unless already changed)
            if ($alerteQualite->getStagiaireId() === $this) {
                $alerteQualite->setStagiaireId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NoteQualite>
     */
    public function getNotesQualites(): Collection
    {
        return $this->notesQualites;
    }

    public function addNotesQualite(NoteQualite $notesQualite): static
    {
        if (!$this->notesQualites->contains($notesQualite)) {
            $this->notesQualites->add($notesQualite);
            $notesQualite->setStagiaireId($this);
        }

        return $this;
    }

    public function removeNotesQualite(NoteQualite $notesQualite): static
    {
        if ($this->notesQualites->removeElement($notesQualite)) {
            // set the owning side to null (unless already changed)
            if ($notesQualite->getStagiaireId() === $this) {
                $notesQualite->setStagiaireId(null);
            }
        }

        return $this;
    }
}
