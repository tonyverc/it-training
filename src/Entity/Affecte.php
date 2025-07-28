<?php

namespace App\Entity;

use App\Repository\AffecteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffecteRepository::class)]
class Affecte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $confirme_presence = null;

    #[ORM\OneToOne(mappedBy: 'affecte', cascade: ['persist', 'remove'])]
    private ?Session $session = null;

    #[ORM\ManyToOne(inversedBy: 'affectes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formateur $formateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isConfirmePresence(): ?bool
    {
        return $this->confirme_presence;
    }

    public function setConfirmePresence(bool $confirme_presence): static
    {
        $this->confirme_presence = $confirme_presence;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): static
    {
        // unset the owning side of the relation if necessary
        if ($session === null && $this->session !== null) {
            $this->session->setAffecte(null);
        }

        // set the owning side of the relation if necessary
        if ($session !== null && $session->getAffecte() !== $this) {
            $session->setAffecte($this);
        }

        $this->session = $session;

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
}
