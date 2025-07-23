<?php

namespace App\Entity;

use App\Repository\AlerteQualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Stagiaire;

#[ORM\Entity(repositoryClass: AlerteQualiteRepository::class)]
class AlerteQualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\Column(length: 160)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'alerteQualites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stagiaire $stagiaire = null;

    /**
     * @var Collection<int, NoteQualite>
     */
    #[ORM\OneToMany(targetEntity: NoteQualite::class, mappedBy: 'alerte_qualite')]
    private Collection $noteQualites;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
        $this->noteQualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStagiaireId(): ?Stagiaire
    {
        return $this->stagiaire;
    }

    public function setStagiaireId(?Stagiaire $stagiaire): static
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    /**
     * @return Collection<int, NoteQualite>
     */
    public function getNoteQualites(): Collection
    {
        return $this->noteQualites;
    }

    public function addNoteQualite(NoteQualite $noteQualite): static
    {
        if (!$this->noteQualites->contains($noteQualite)) {
            $this->noteQualites->add($noteQualite);
            $noteQualite->setAlerteQualite($this);
        }

        return $this;
    }

    public function removeNoteQualite(NoteQualite $noteQualite): static
    {
        if ($this->noteQualites->removeElement($noteQualite)) {
            // set the owning side to null (unless already changed)
            if ($noteQualite->getAlerteQualite() === $this) {
                $noteQualite->setAlerteQualite(null);
            }
        }

        return $this;
    }

}
