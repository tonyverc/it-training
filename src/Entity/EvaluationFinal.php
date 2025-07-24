<?php

namespace App\Entity;

use App\Repository\EvaluationFinalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluationFinalRepository::class)]
class EvaluationFinal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $accueil = null;

    #[ORM\Column]
    private ?int $salle = null;

    #[ORM\Column]
    private ?int $equipements = null;

    #[ORM\Column]
    private ?int $repas = null;

    #[ORM\Column]
    private ?int $contenuDeLaFormation = null;

    #[ORM\Column]
    private ?bool $recommandation = null;

    #[ORM\Column]
    private ?int $pedagogie = null;

    #[ORM\Column]
    private ?int $maitriseDuDomaine = null;

    #[ORM\Column]
    private ?int $disponibilite = null;

    #[ORM\Column]
    private ?int $reponsesAuxQuestions = null;

    #[ORM\Column]
    private ?int $techniquesDanimations = null;

    #[ORM\Column]
    private ?bool $autresProjets = null;

    #[ORM\Column]
    private ?int $satisfactionGeneral = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $avisFinal = null;

    #[ORM\Column]
    private ?\DateTime $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccueil(): ?int
    {
        return $this->accueil;
    }

    public function setAccueil(int $accueil): static
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getSalle(): ?int
    {
        return $this->salle;
    }

    public function setSalle(int $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getEquipements(): ?int
    {
        return $this->equipements;
    }

    public function setEquipements(int $equipements): static
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getRepas(): ?int
    {
        return $this->repas;
    }

    public function setRepas(int $repas): static
    {
        $this->repas = $repas;

        return $this;
    }

    public function getContenuDeLaFormation(): ?int
    {
        return $this->contenuDeLaFormation;
    }

    public function setContenuDeLaFormation(int $contenuDeLaFormation): static
    {
        $this->contenuDeLaFormation = $contenuDeLaFormation;

        return $this;
    }

    public function isRecommandation(): ?bool
    {
        return $this->recommandation;
    }

    public function setRecommandation(bool $recommandation): static
    {
        $this->recommandation = $recommandation;

        return $this;
    }

    public function getPedagogie(): ?int
    {
        return $this->pedagogie;
    }

    public function setPedagogie(int $pedagogie): static
    {
        $this->pedagogie = $pedagogie;

        return $this;
    }

    public function getMaitriseDuDomaine(): ?int
    {
        return $this->maitriseDuDomaine;
    }

    public function setMaitriseDuDomaine(int $maitriseDuDomaine): static
    {
        $this->maitriseDuDomaine = $maitriseDuDomaine;

        return $this;
    }

    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(int $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getReponsesAuxQuestions(): ?int
    {
        return $this->reponsesAuxQuestions;
    }

    public function setReponsesAuxQuestions(int $reponsesAuxQuestions): static
    {
        $this->reponsesAuxQuestions = $reponsesAuxQuestions;

        return $this;
    }

    public function getTechniquesDanimations(): ?int
    {
        return $this->techniquesDanimations;
    }

    public function setTechniquesDanimations(int $techniquesDanimations): static
    {
        $this->techniquesDanimations = $techniquesDanimations;

        return $this;
    }

    public function isAutresProjets(): ?bool
    {
        return $this->autresProjets;
    }

    public function setAutresProjets(bool $autresProjets): static
    {
        $this->autresProjets = $autresProjets;

        return $this;
    }

    public function getSatisfactionGeneral(): ?int
    {
        return $this->satisfactionGeneral;
    }

    public function setSatisfactionGeneral(int $satisfactionGeneral): static
    {
        $this->satisfactionGeneral = $satisfactionGeneral;

        return $this;
    }

    public function getAvisFinal(): ?string
    {
        return $this->avisFinal;
    }

    public function setAvisFinal(string $avisFinal): static
    {
        $this->avisFinal = $avisFinal;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }
}
