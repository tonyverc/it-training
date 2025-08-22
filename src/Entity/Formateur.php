<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur extends User
{

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $Cv = null;

    #[ORM\Column]
    private ?bool $EstValide = null;

    /**
     * @var Collection<int, Affecte>
     */
    #[ORM\OneToMany(targetEntity: Affecte::class, mappedBy: 'formateur')]
    private Collection $affectes;

    /**
     * @var Collection<int, SignalementStagiaire>
     */
    #[ORM\OneToMany(targetEntity: SignalementStagiaire::class, mappedBy: 'formateur')]
    private Collection $signalementStagiaires;

    public function __construct()
    {
        $this->affectes = new ArrayCollection();
        $this->signalementStagiaires = new ArrayCollection();
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

    public function getCv(): ?string
    {
        return $this->Cv;
    }

    public function setCv(string $Cv): static
    {
        $this->Cv = $Cv;

        return $this;
    }

    public function isEstValide(): ?bool
    {
        return $this->EstValide;
    }

    public function setEstValide(bool $EstValide): static
    {
        $this->EstValide = $EstValide;

        return $this;
    }

    /**
     * @return Collection<int, Affecte>
     */
    public function getAffectes(): Collection
    {
        return $this->affectes;
    }

    public function addAffecte(Affecte $affecte): static
    {
        if (!$this->affectes->contains($affecte)) {
            $this->affectes->add($affecte);
            $affecte->setFormateur($this);
        }

        return $this;
    }

    public function removeAffecte(Affecte $affecte): static
    {
        if ($this->affectes->removeElement($affecte)) {
            // set the owning side to null (unless already changed)
            if ($affecte->getFormateur() === $this) {
                $affecte->setFormateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SignalementStagiaire>
     */
    public function getSignalementStagiaires(): Collection
    {
        return $this->signalementStagiaires;
    }

    public function addSignalementStagiaire(SignalementStagiaire $signalementStagiaire): static
    {
        if (!$this->signalementStagiaires->contains($signalementStagiaire)) {
            $this->signalementStagiaires->add($signalementStagiaire);
            $signalementStagiaire->setFormateur($this);
        }

        return $this;
    }

    public function removeSignalementStagiaire(SignalementStagiaire $signalementStagiaire): static
    {
        if ($this->signalementStagiaires->removeElement($signalementStagiaire)) {
            // set the owning side to null (unless already changed)
            if ($signalementStagiaire->getFormateur() === $this) {
                $signalementStagiaire->setFormateur(null);
            }
        }

        return $this;
    }
}
