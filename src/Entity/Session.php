<?php

namespace App\Entity;

use App\Repository\SessionRepository;
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
    private ?\Date $date_debut = null;

    #[ORM\Column]
    private ?\Date $date_fin = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $Formation = null;

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

    public function getDateDebut(): ?\DateTimeImmutable
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeImmutable $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeImmutable
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeImmutable $date_fin): static
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
}
