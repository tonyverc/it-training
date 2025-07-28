<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column]
    private ?bool $prerequis_valide = null;

    /**
     * @var Collection<int, Session>
     */
    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'stagiaires')]
    private Collection $sessions;

    #[ORM\ManyToOne(inversedBy: 'stagiaires')]
    private ?Formation $formation = null;

    /**
     * @var Collection<int, AlerteDecharge>
     */
    #[ORM\OneToMany(targetEntity: AlerteDecharge::class, mappedBy: 'stagiaire')]
    private Collection $alerteDecharges;

    /**
     * @var Collection<int, SignalementStagiaire>
     */
    #[ORM\OneToMany(targetEntity: SignalementStagiaire::class, mappedBy: 'stagiaire')]
    private Collection $description;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
        $this->alerteDecharges = new ArrayCollection();
        $this->description = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): static
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
            $session->addStagiaire($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeStagiaire($this);
        }

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

    /**
     * @return Collection<int, AlerteDecharge>
     */
    public function getAlerteDecharges(): Collection
    {
        return $this->alerteDecharges;
    }

    public function addAlerteDecharge(AlerteDecharge $alerteDecharge): static
    {
        if (!$this->alerteDecharges->contains($alerteDecharge)) {
            $this->alerteDecharges->add($alerteDecharge);
            $alerteDecharge->setStagiaire($this);
        }

        return $this;
    }

    public function removeAlerteDecharge(AlerteDecharge $alerteDecharge): static
    {
        if ($this->alerteDecharges->removeElement($alerteDecharge)) {
            // set the owning side to null (unless already changed)
            if ($alerteDecharge->getStagiaire() === $this) {
                $alerteDecharge->setStagiaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SignalementStagiaire>
     */
    public function getDescription(): Collection
    {
        return $this->description;
    }

    public function addDescription(SignalementStagiaire $description): static
    {
        if (!$this->description->contains($description)) {
            $this->description->add($description);
            $description->setStagiaire($this);
        }

        return $this;
    }

    public function removeDescription(SignalementStagiaire $description): static
    {
        if ($this->description->removeElement($description)) {
            // set the owning side to null (unless already changed)
            if ($description->getStagiaire() === $this) {
                $description->setStagiaire(null);
            }
        }

        return $this;
    }
}
