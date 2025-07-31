<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $min_participants = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?\DateTime $date_debut = null;

    #[ORM\Column]
    private ?\DateTime $date_fin = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $Formation = null;

    /**
     * @var Collection<int, AlerteDecharge>
     */
    #[ORM\OneToMany(targetEntity: AlerteDecharge::class, mappedBy: 'session', orphanRemoval: true)]
    private Collection $alertesDecharges;

    public function __construct()
    {
        $this->alertesDecharges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinParticipants(): ?int
    {
        return $this->min_participants;
    }

    public function setMinParticipants(int $min_participants): static
    {
        $this->min_participants = $min_participants;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTime $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTime $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->Formation;
    }

    public function setFormation(?Formation $Formation): static
    {
        $this->Formation = $Formation;

        return $this;
    }

    /**
     * @return Collection<int, AlerteDecharge>
     */
    public function getAlerteDecharges(): Collection
    {
        return $this->alertesDecharges;
    }

    public function addAlerteDecharge(AlerteDecharge $alerteDecharge): static
    {
        if (!$this->alertesDecharges->contains($alerteDecharge)) {
            $this->alertesDecharges->add($alerteDecharge);
            $alerteDecharge->setSession($this);
        }

        return $this;
    }

    public function removeAlerteDecharge(AlerteDecharge $alerteDecharge): static
    {
        if ($this->alertesDecharges->removeElement($alerteDecharge)) {
            // set the owning side to null (unless already changed)
            if ($alerteDecharge->getSession() === $this) {
                $alerteDecharge->setSession(null);
            }
        }

        return $this;
    }
}
