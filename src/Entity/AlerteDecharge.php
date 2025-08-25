<?php

namespace App\Entity;

use App\Repository\AlerteDechargeRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlerteDechargeRepository::class)]
class AlerteDecharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'alertesDecharge')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stagiaire $stagiaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formateur $formateur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $formation = null;

    #[ORM\ManyToOne(inversedBy: 'alerteDecharges')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Session $session = null;

    public function __construct() {
        $this->date = new DateTimeImmutable();
    }

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column]
    private ?bool $lu = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): static
    {
        $this->formateur = $formateur;

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

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): static
    {
        $this->session = $session;

        return $this;
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

    public function isLu(): ?bool
    {
        return $this->lu;
    }

    public function setLu(bool $lu): static
    {
        $this->lu = $lu;

        return $this;
    }
}
