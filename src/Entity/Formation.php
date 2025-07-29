<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 140)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $fiche_formation = null;

    /**
     * @var Collection<int, AlerteQualite>
     */
    #[ORM\OneToMany(targetEntity: AlerteQualite::class, mappedBy: 'formation')]
    private Collection $alertesQualite;

    /**
     * @var Collection<int, Session>
     */
    #[ORM\OneToMany(targetEntity: Session::class, mappedBy: 'Formation')]
    private Collection $sessions;

    public function __construct()
    {
        $this->alertesQualite = new ArrayCollection();
        $this->sessions = new ArrayCollection();
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

    public function getFicheFormation(): ?string
    {
        return $this->fiche_formation;
    }

    public function setFicheFormation(string $fiche_formation): static
    {
        $this->fiche_formation = $fiche_formation;

        return $this;
    }

    /**
     * @return Collection<int, AlerteQualite>
     */
    public function getAlertesQualite(): Collection
    {
        return $this->alertesQualite;
    }

    public function addAlertesQualite(AlerteQualite $alertesQualite): static
    {
        if (!$this->alertesQualite->contains($alertesQualite)) {
            $this->alertesQualite->add($alertesQualite);
            $alertesQualite->setFormation($this);
        }

        return $this;
    }

    public function removeAlertesQualite(AlerteQualite $alertesQualite): static
    {
        if ($this->alertesQualite->removeElement($alertesQualite)) {
            // set the owning side to null (unless already changed)
            if ($alertesQualite->getFormation() === $this) {
                $alertesQualite->setFormation(null);
            }
        }

        return $this;
    }
    public function __toString(): string
{
    return $this->nom; // ou autre champ : prénom, email, etc.
}

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setFormation($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getFormation() === $this) {
                $session->setFormation(null);
            }
        }

        return $this;
    }
}
