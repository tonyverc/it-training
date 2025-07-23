<?php

namespace App\Entity;

use App\Repository\NoteQualiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteQualiteRepository::class)]
class NoteQualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $valeur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'noteQualites')]
    private ?AlerteQualite $alerte_qualite = null;

    #[ORM\Column(length: 140)]
    private ?string $question = null;

    #[ORM\ManyToOne(inversedBy: 'notesQualites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stagiaire $stagiaire_id = null;

    #[ORM\Column(length: 20)]
    private ?string $typeEvaluation = null;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): static
    {
        $this->valeur = $valeur;

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

    public function getAlerteQualite(): ?AlerteQualite
    {
        return $this->alerte_qualite;
    }

    public function setAlerteQualite(?AlerteQualite $alerte_qualite): static
    {
        $this->alerte_qualite = $alerte_qualite;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getStagiaireId(): ?Stagiaire
    {
        return $this->stagiaire_id;
    }

    public function setStagiaireId(?Stagiaire $stagiaire_id): static
    {
        $this->stagiaire_id = $stagiaire_id;

        return $this;
    }

    public function getTypeEvaluation(): ?string
    {
        return $this->typeEvaluation;
    }

    public function setTypeEvaluation(string $typeEvaluation): static
    {
        $this->typeEvaluation = $typeEvaluation;

        return $this;
    }
}
