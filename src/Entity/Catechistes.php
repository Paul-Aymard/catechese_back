<?php

namespace App\Entity;

use App\Repository\CatechistesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatechistesRepository::class)]
class Catechistes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $mat_catechiste = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_catechiste = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_catechiste = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datenaissancecatechisteAt = null;

    #[ORM\Column(length: 255)]
    private ?string $lieunaissancecatechiste = null;

    #[ORM\Column(length: 255)]
    private ?string $professioncatechiste = null;

    #[ORM\Column(length: 255)]
    private ?string $numlogementcatechiste = null;

    #[ORM\Column(length: 255)]
    private ?string $quartiercatechiste = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sacrementcatechiste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatCatechiste(): ?int
    {
        return $this->mat_catechiste;
    }

    public function setMatCatechiste(int $mat_catechiste): static
    {
        $this->mat_catechiste = $mat_catechiste;

        return $this;
    }

    public function getNomCatechiste(): ?string
    {
        return $this->nom_catechiste;
    }

    public function setNomCatechiste(string $nom_catechiste): static
    {
        $this->nom_catechiste = $nom_catechiste;

        return $this;
    }

    public function getPrenomCatechiste(): ?string
    {
        return $this->prenom_catechiste;
    }

    public function setPrenomCatechiste(string $prenom_catechiste): static
    {
        $this->prenom_catechiste = $prenom_catechiste;

        return $this;
    }

    public function getDatenaissancecatechisteAt(): ?\DateTimeImmutable
    {
        return $this->datenaissancecatechisteAt;
    }

    public function setDatenaissancecatechisteAt(\DateTimeImmutable $datenaissancecatechisteAt): static
    {
        $this->datenaissancecatechisteAt = $datenaissancecatechisteAt;

        return $this;
    }

    public function getLieunaissancecatechiste(): ?string
    {
        return $this->lieunaissancecatechiste;
    }

    public function setLieunaissancecatechiste(string $lieunaissancecatechiste): static
    {
        $this->lieunaissancecatechiste = $lieunaissancecatechiste;

        return $this;
    }

    public function getProfessioncatechiste(): ?string
    {
        return $this->professioncatechiste;
    }

    public function setProfessioncatechiste(string $professioncatechiste): static
    {
        $this->professioncatechiste = $professioncatechiste;

        return $this;
    }

    public function getNumlogementcatechiste(): ?string
    {
        return $this->numlogementcatechiste;
    }

    public function setNumlogementcatechiste(string $numlogementcatechiste): static
    {
        $this->numlogementcatechiste = $numlogementcatechiste;

        return $this;
    }

    public function getQuartiercatechiste(): ?string
    {
        return $this->quartiercatechiste;
    }

    public function setQuartiercatechiste(string $quartiercatechiste): static
    {
        $this->quartiercatechiste = $quartiercatechiste;

        return $this;
    }

    public function getSacrementcatechiste(): ?string
    {
        return $this->sacrementcatechiste;
    }

    public function setSacrementcatechiste(?string $sacrementcatechiste): static
    {
        $this->sacrementcatechiste = $sacrementcatechiste;

        return $this;
    }
}
